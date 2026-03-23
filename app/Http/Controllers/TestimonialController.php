<?php
// app/Http/Controllers/Admin/TestimonialController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
        $activeCount = Testimonial::where('is_active', true)->count();
        $averageRating = Testimonial::where('is_active', true)->avg('rating') ?? 0;
        
        return view('admin.testimonials.index', compact('testimonials', 'activeCount', 'averageRating'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        $nextOrder = Testimonial::max('order') + 1;
        return view('admin.testimonials.create', compact('nextOrder'));
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'review_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'review_text' => $request->review_text,
            'rating' => $request->rating,
            'date' => $request->date,
            'order' => $request->order ?? Testimonial::max('order') + 1,
            'is_active' => $request->has('is_active')
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('testimonials', $filename, 'public');
            $data['image'] = $filename;
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified testimonial.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'review_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'review_text' => $request->review_text,
            'rating' => $request->rating,
            'date' => $request->date,
            'order' => $request->order,
            'is_active' => $request->has('is_active')
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($testimonial->image) {
                Storage::disk('public')->delete('testimonials/' . $testimonial->image);
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('testimonials', $filename, 'public');
            $data['image'] = $filename;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete image if exists
        if ($testimonial->image) {
            Storage::disk('public')->delete('testimonials/' . $testimonial->image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Update testimonial order
     */
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:testimonials,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        foreach ($request->orders as $index => $id) {
            Testimonial::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle testimonial status
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);

        return redirect()->back()
            ->with('success', 'Testimonial status updated successfully.');
    }

    /**
     * Display testimonials on frontend
     */
    public function publicIndex()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        $averageRating = Testimonial::where('is_active', true)->avg('rating') ?? 0;
        
        return view('frontend.testimonials.index', compact('testimonials', 'averageRating'));
    }
}