<?php
// app/Http/Controllers/EventEnquiryController.php

namespace App\Http\Controllers;

use App\Models\EventEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EventEnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Log the incoming request
        Log::info('Event enquiry submission received', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'data' => $request->except(['_token'])
        ]);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|min:10|max:20',
            'purpose' => 'required|string|in:wedding,corporate,birthday,anniversary,product,concert,private,other',
            'message' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            Log::warning('Event enquiry validation failed', [
                'errors' => $validator->errors()->toArray(),
                'data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please check your input.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Log::info('Creating event enquiry record', [
                'validated_data' => $validator->validated()
            ]);

            // Create enquiry
            $enquiry = EventEnquiry::create($validator->validated());

            Log::info('Event enquiry created successfully', [
                'enquiry_id' => $enquiry->id,
                'email' => $enquiry->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your enquiry! We will get back to you within 24 hours.',
                'data' => [
                    'id' => $enquiry->id,
                    'name' => $enquiry->name,
                    'email' => $enquiry->email
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Event enquiry creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your enquiry. Please try again later.',
                'error_details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    // Admin methods with logging
    public function index(Request $request)
    {
        Log::info('Admin viewing enquiries list', [
            'user_id' => auth()->id(),
            'filters' => $request->all()
        ]);

        $query = EventEnquiry::query();

        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('read_filter')) {
            if ($request->read_filter == 'unread') {
                $query->where('is_read', false);
            } elseif ($request->read_filter == 'read') {
                $query->where('is_read', true);
            }
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $enquiries = $query->latest()->paginate(20);

        $stats = [
            'total' => EventEnquiry::count(),
            'pending' => EventEnquiry::pending()->count(),
            'unread' => EventEnquiry::unread()->count(),
            'contacted' => EventEnquiry::where('status', 'contacted')->count(),
            'completed' => EventEnquiry::where('status', 'completed')->count(),
        ];

        return view('admin.enquiries.index', compact('enquiries', 'stats'));
    }

    public function show($id)
    {
        Log::info('Admin viewing enquiry details', [
            'user_id' => auth()->id(),
            'enquiry_id' => $id
        ]);

        $enquiry = EventEnquiry::findOrFail($id);
        
        if (!$enquiry->is_read) {
            $enquiry->update(['is_read' => true]);
            Log::info('Enquiry marked as read', ['enquiry_id' => $id]);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, $id)
    {
        Log::info('Admin updating enquiry status', [
            'user_id' => auth()->id(),
            'enquiry_id' => $id,
            'new_status' => $request->status
        ]);

        $enquiry = EventEnquiry::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,contacted,completed',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid status update.');
        }

        $enquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'contacted_at' => $request->status == 'contacted' ? now() : $enquiry->contacted_at
        ]);

        Log::info('Enquiry status updated', [
            'enquiry_id' => $id,
            'old_status' => $enquiry->getOriginal('status'),
            'new_status' => $enquiry->status
        ]);

        return redirect()->route('admin.enquiries.show', $enquiry->id)
            ->with('success', 'Enquiry status updated successfully.');
    }

    public function destroy($id)
    {
        Log::warning('Admin deleting enquiry', [
            'user_id' => auth()->id(),
            'enquiry_id' => $id
        ]);

        $enquiry = EventEnquiry::findOrFail($id);
        $enquiry->delete();

        Log::info('Enquiry deleted', ['enquiry_id' => $id]);

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }

    public function bulkAction(Request $request)
    {
        Log::info('Admin performing bulk action on enquiries', [
            'user_id' => auth()->id(),
            'action' => $request->action,
            'ids' => $request->ids
        ]);

        $ids = $request->ids;
        $action = $request->action;

        if (empty($ids)) {
            return redirect()->back()->with('error', 'No enquiries selected.');
        }

        switch ($action) {
            case 'delete':
                $count = EventEnquiry::whereIn('id', $ids)->delete();
                $message = "{$count} enquiries deleted successfully.";
                Log::info('Bulk delete completed', ['count' => $count]);
                break;
            case 'mark_read':
                $count = EventEnquiry::whereIn('id', $ids)->update(['is_read' => true]);
                $message = "{$count} enquiries marked as read.";
                break;
            case 'mark_unread':
                $count = EventEnquiry::whereIn('id', $ids)->update(['is_read' => false]);
                $message = "{$count} enquiries marked as unread.";
                break;
            case 'status_pending':
                $count = EventEnquiry::whereIn('id', $ids)->update(['status' => 'pending']);
                $message = "{$count} enquiries status updated to pending.";
                break;
            case 'status_contacted':
                $count = EventEnquiry::whereIn('id', $ids)->update(['status' => 'contacted', 'contacted_at' => now()]);
                $message = "{$count} enquiries status updated to contacted.";
                break;
            case 'status_completed':
                $count = EventEnquiry::whereIn('id', $ids)->update(['status' => 'completed']);
                $message = "{$count} enquiries status updated to completed.";
                break;
            default:
                return redirect()->back()->with('error', 'Invalid action.');
        }

        return redirect()->back()->with('success', $message);
    }

     public function markRead($id)
    {
        Log::info('Admin marking enquiry as read', [
            'user_id' => auth()->id(),
            'enquiry_id' => $id
        ]);

        $enquiry = EventEnquiry::findOrFail($id);
        
        $enquiry->update([
            'is_read' => true,
            'read_at' => now()
        ]);

        Log::info('Enquiry marked as read', ['enquiry_id' => $id]);

        return redirect()->back()->with('success', 'Enquiry marked as read successfully.');
    }

    /**
     * Mark enquiry as unread
     */
    public function markUnread($id)
    {
        Log::info('Admin marking enquiry as unread', [
            'user_id' => auth()->id(),
            'enquiry_id' => $id
        ]);

        $enquiry = EventEnquiry::findOrFail($id);
        
        $enquiry->update([
            'is_read' => false,
            'read_at' => null
        ]);

        Log::info('Enquiry marked as unread', ['enquiry_id' => $id]);

        return redirect()->back()->with('success', 'Enquiry marked as unread successfully.');
    }
}