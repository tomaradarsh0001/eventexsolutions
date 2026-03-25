<?php
// app/Http/Controllers/Admin/FaqController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the FAQs.
     */
    public function index()
    {
        $faqs = Faq::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
        $groupedFaqs = Faq::getGroupedBySide();
        
        return view('admin.faqs.index', compact('faqs', 'groupedFaqs'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        // Get the next order number
        $nextOrder = Faq::max('order') + 1;
        
        return view('admin.faqs.create', compact('nextOrder'));
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'side' => 'required|in:left,right',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Auto-assign order if not set
        $order = $request->order ?? Faq::max('order') + 1;

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'side' => $request->side,
            'order' => $order,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified FAQ.
     */
    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'side' => 'required|in:left,right',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'side' => $request->side,
            'order' => $request->order,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    /**
     * Update FAQ order
     */
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:faqs,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        foreach ($request->orders as $index => $faqId) {
            Faq::where('id', $faqId)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle FAQ status
     */
    public function toggleStatus(Faq $faq)
    {
        $faq->update(['is_active' => !$faq->is_active]);

        return redirect()->back()
            ->with('success', 'FAQ status updated successfully.');
    }

    /**
     * Display FAQs on frontend
     */
    public function publicIndex()
{
    // Get active FAQs grouped by side, ordered by order and id
    $leftFaqs = Faq::where('is_active', true)
        ->where('side', 'left')
        ->orderBy('order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    
    $rightFaqs = Faq::where('is_active', true)
        ->where('side', 'right')
        ->orderBy('order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    
    return view('welcome', compact('leftFaqs', 'rightFaqs'));
}

}