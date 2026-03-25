<?php
// app/Http/Controllers/GalleryController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


class GalleryController extends Controller
{
    public function index()
    {
        $events = Event::with(['images', 'videos'])->orderBy('created_at', 'desc')->paginate(9);
        $totalImages = GalleryImage::count();
        $totalVideos = GalleryVideo::count();
        
        return view('admin.gallery.index', compact('events', 'totalImages', 'totalVideos'));
    }
    
    public function create()
    {
        return view('admin.gallery.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'videos.*' => 'nullable|mimes:mp4,mov,avi,webm|max:151200',
        ]);
        
        $event = Event::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
            'description' => $request->description,
        ]);
        
        // Upload photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('gallery/photos', 'public');
                $event->images()->create([
                    'path' => $path,
                    'order' => 0,
                    'is_active' => true,
                ]);
            }
        }
        
        // Upload videos
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('gallery/videos', 'public');
                $event->videos()->create([
                    'path' => $path,
                    'order' => 0,
                    'is_active' => true,
                ]);
            }
        }
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Event created successfully!');
    }
    
    public function show($id)
    {
        $event = Event::with(['images', 'videos'])->findOrFail($id);
        return view('admin.gallery.event', compact('event'));
    }
    
     public function edit($id)
    {
        $event = Event::with(['images', 'videos'])->findOrFail($id);
        
        // Format the date for the input field
        if ($event->event_date) {
            $event->event_date = Carbon::parse($event->event_date)->format('Y-m-d');
        }
        
        return view('admin.gallery.create', compact('event'));
    }
    
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'videos.*' => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
        ]);
        
        // Parse and format the date properly
        $eventDate = null;
        if ($request->event_date) {
            $eventDate = Carbon::parse($request->event_date)->format('Y-m-d');
        }
        
        $event->update([
            'name' => $request->name,
            'event_date' => $eventDate,
            'description' => $request->description,
        ]);
        
        // Remove deleted photos
        if ($request->has('remove_photos')) {
            foreach ($request->remove_photos as $photoId) {
                $photo = GalleryImage::find($photoId);
                if ($photo) {
                    Storage::disk('public')->delete($photo->path);
                    $photo->delete();
                }
            }
        }
        
        // Remove deleted videos
        if ($request->has('remove_videos')) {
            foreach ($request->remove_videos as $videoId) {
                $video = GalleryVideo::find($videoId);
                if ($video) {
                    Storage::disk('public')->delete($video->path);
                    $video->delete();
                }
            }
        }
        
        // Upload new photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('gallery/photos', 'public');
                $event->images()->create([
                    'path' => $path,
                    'order' => 0,
                    'is_active' => true,
                ]);
            }
        }
        
        // Upload new videos
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('gallery/videos', 'public');
                $event->videos()->create([
                    'path' => $path,
                    'order' => 0,
                    'is_active' => true,
                ]);
            }
        }
        
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Event updated successfully!');
    }
    
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Delete all photos
        foreach ($event->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }
        
        // Delete all videos
        foreach ($event->videos as $video) {
            Storage::disk('public')->delete($video->path);
            $video->delete();
        }
        
        $event->delete();
        
        return response()->json(['success' => true]);
    }

    // Fixed publicGallery method without using 'with' as a variable
    public function publicGallery(Request $request)
    {
        $limit = $request->get('limit', 6);
        $offset = $request->get('offset', 0);
        
        $events = Event::with(['images', 'videos'])
            ->where(function($query) {
                $query->whereHas('images', function($q) {
                    $q->where('is_active', true);
                })
                ->orWhereHas('videos', function($q) {
                    $q->where('is_active', true);
                });
            })
            ->orderBy('event_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();
        
        $totalEvents = Event::where(function($query) {
            $query->whereHas('images', function($q) {
                $q->where('is_active', true);
            })
            ->orWhereHas('videos', function($q) {
                $q->where('is_active', true);
            });
        })->count();
        
        return response()->json([
            'events' => $events,
            'totalEvents' => $totalEvents,
            'hasMore' => ($offset + $limit) < $totalEvents
        ]);
    }
}