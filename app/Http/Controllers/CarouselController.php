<?php

namespace App\Http\Controllers;

use App\Models\CarouselPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CarouselController extends Controller
{
    public function index()
    {
        $posts = CarouselPost::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.carousel.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        try {
            // Store the image
            $imagePath = $request->file('image')->store('carousel', 'public');
            
            // Get the maximum order value
            $maxOrder = CarouselPost::max('order') ?? 0;
            
            // Create the post
            $carouselPost = CarouselPost::create([
                'title' => $request->title,
                'image_path' => $imagePath,
                'status' => $request->has('status') ? (bool)$request->status : true,
                'order' => $maxOrder + 1,
            ]);
            
            Log::info('Carousel post created successfully', ['id' => $carouselPost->id]);
            
            return redirect()->route('admin.carousel.index')
                ->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            Log::error('Carousel store error: ' . $e->getMessage());
            
            // Delete the uploaded image if something went wrong
            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            
            return redirect()->route('admin.carousel.index')
                ->with('error', 'Failed to create post: ' . $e->getMessage());
        }
    }

    public function update(Request $request, CarouselPost $carouselPost)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240'
        ]);

        try {
            $carouselPost->title = $request->title;

            if ($request->hasFile('image')) {
                // Delete old image
                if ($carouselPost->image_path && Storage::disk('public')->exists($carouselPost->image_path)) {
                    Storage::disk('public')->delete($carouselPost->image_path);
                }
                
                // Store new image
                $path = $request->file('image')->store('carousel', 'public');
                $carouselPost->image_path = $path;
            }

            $carouselPost->save();
            
            Log::info('Carousel post updated successfully', ['id' => $carouselPost->id]);

            return redirect()->route('admin.carousel.index')
                ->with('success', 'Post updated successfully!');
        } catch (\Exception $e) {
            Log::error('Carousel update error: ' . $e->getMessage());
            return redirect()->route('admin.carousel.index')
                ->with('error', 'Failed to update post: ' . $e->getMessage());
        }
    }

    public function destroy(CarouselPost $carouselPost)
    {
        try {
            // Delete the image file
            if ($carouselPost->image_path && Storage::disk('public')->exists($carouselPost->image_path)) {
                Storage::disk('public')->delete($carouselPost->image_path);
            }
            
            // Delete the database record
            $carouselPost->delete();
            
            Log::info('Carousel post deleted successfully', ['id' => $carouselPost->id]);
            
            return redirect()->route('admin.carousel.index')
                ->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Carousel delete error: ' . $e->getMessage());
            return redirect()->route('admin.carousel.index')
                ->with('error', 'Failed to delete post: ' . $e->getMessage());
        }
    }

    public function toggleStatus(CarouselPost $carouselPost)
    {
        try {
            $carouselPost->status = !$carouselPost->status;
            $carouselPost->save();
            
            return response()->json([
                'success' => true,
                'status' => $carouselPost->status,
                'message' => $carouselPost->status ? 'Post activated' : 'Post deactivated'
            ]);
        } catch (\Exception $e) {
            Log::error('Status toggle error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:carousel_posts,id',
            'orders.*.position' => 'required|integer|min:0'
        ]);

        try {
            foreach ($request->orders as $order) {
                CarouselPost::where('id', $order['id'])->update(['order' => $order['position']]);
            }
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Order update error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getImage(CarouselPost $carouselPost)
    {
        try {
            return response()->json([
                'image_url' => $carouselPost->image_path ? Storage::disk('public')->url($carouselPost->image_path) : null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'image_url' => null,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}