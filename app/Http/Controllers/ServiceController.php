<?php
// app/Http/Controllers/Admin/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceBulletPoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('bulletPoints')->ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'is_active' => 'boolean',
            'bullet_points' => 'array',
            'bullet_points.*.text' => 'required|string',
            'bullet_points.*.icon' => 'nullable|string'
        ]);

        $service = Service::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'],
            'is_active' => $request->has('is_active'),
            'order' => Service::max('order') + 1
        ]);

        if (!empty($validated['bullet_points'])) {
            foreach ($validated['bullet_points'] as $index => $bullet) {
                $service->bulletPoints()->create([
                    'bullet_point' => $bullet['text'],
                    'icon' => $bullet['icon'] ?? 'fas fa-check-circle',
                    'order' => $index
                ]);
            }
        }

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load('bulletPoints');
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'is_active' => 'boolean',
            'bullet_points' => 'array',
            'bullet_points.*.id' => 'nullable|exists:service_bullet_points,id',
            'bullet_points.*.text' => 'required|string',
            'bullet_points.*.icon' => 'nullable|string'
        ]);

        $service->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'],
            'is_active' => $request->has('is_active')
        ]);

        // Handle bullet points
        $existingIds = [];
        if (!empty($validated['bullet_points'])) {
            foreach ($validated['bullet_points'] as $index => $bullet) {
                if (isset($bullet['id'])) {
                    // Update existing
                    $bulletPoint = ServiceBulletPoint::find($bullet['id']);
                    if ($bulletPoint) {
                        $bulletPoint->update([
                            'bullet_point' => $bullet['text'],
                            'icon' => $bullet['icon'] ?? 'fas fa-check-circle',
                            'order' => $index
                        ]);
                        $existingIds[] = $bulletPoint->id;
                    }
                } else {
                    // Create new
                    $newBullet = $service->bulletPoints()->create([
                        'bullet_point' => $bullet['text'],
                        'icon' => $bullet['icon'] ?? 'fas fa-check-circle',
                        'order' => $index
                    ]);
                    $existingIds[] = $newBullet->id;
                }
            }
        }

        // Delete removed bullet points
        $service->bulletPoints()->whereNotIn('id', $existingIds)->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->orders as $orderData) {
            Service::where('id', $orderData['id'])
                ->update(['order' => $orderData['order']]);
        }

        return response()->json(['success' => true]);
    }
}