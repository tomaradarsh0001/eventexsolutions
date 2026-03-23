<?php

namespace App\Http\Controllers;

use App\Models\WebsiteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websiteDetails = WebsiteDetail::all();
        return view('admin.website-details.index', compact('websiteDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.website-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|string|max:255',
            'phone_number_1' => 'nullable|string|max:20',
            'phone_number_2' => 'nullable|string|max:20',
            'phone_number_3' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'justdial_link' => 'nullable|url|max:255',
            'instamart_link' => 'nullable|url|max:255',
            'whatsapp_link' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        WebsiteDetail::create($request->all());

        return redirect()->route('admin.website-details.index')
            ->with('success', 'Website details created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteDetail $websiteDetail)
    {
        return view('admin.website-details.show', compact('websiteDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteDetail $websiteDetail)
    {
        return view('admin.website-details.edit', compact('websiteDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteDetail $websiteDetail)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|string|max:255',
            'phone_number_1' => 'nullable|string|max:20',
            'phone_number_2' => 'nullable|string|max:20',
            'phone_number_3' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'justdial_link' => 'nullable|url|max:255',
            'instamart_link' => 'nullable|url|max:255',
            'whatsapp_link' => 'nullable|url|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $websiteDetail->update($request->all());

        return redirect()->route('admin.website-details.index')
            ->with('success', 'Website details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteDetail $websiteDetail)
    {
        $websiteDetail->delete();

        return redirect()->route('admin.website-details.index')
            ->with('success', 'Website details deleted successfully!');
    }
}