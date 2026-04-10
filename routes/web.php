<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteDetailController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventEnquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CarouselController;


use Illuminate\Support\Facades\Route;
use App\Models\WhyUs;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    $whyus = WhyUs::with('items')->first();
    
    // Fixed: Properly eager load relationships with whereHas conditions
    $galleryEvents = Event::with(['images', 'videos'])
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
        ->take(6)
        ->get();
    
    // Fetch FAQs
    $leftFaqs = App\Models\Faq::where('is_active', true)
        ->where('side', 'left')
        ->orderBy('order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    
    $rightFaqs = App\Models\Faq::where('is_active', true)
        ->where('side', 'right')
        ->orderBy('order', 'asc')
        ->orderBy('id', 'asc')
        ->get();
    
    // Fetch latest 2 active testimonials
    $testimonials = App\Models\Testimonial::where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();
    
    return view('welcome', compact('whyus', 'galleryEvents', 'leftFaqs', 'rightFaqs', 'testimonials'));
});

// API route for loading more galleries (optional)
Route::get('/api/gallery/load-more', [GalleryController::class, 'publicGallery'])->name('api.gallery.load-more');

// Gallery all page route
Route::get('/gallery', function () {
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
        ->paginate(12);
    
    return view('gallery.all', compact('events'));
})->name('gallery.all');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// In your routes file (web.php)

Route::post('/enquire', [EventEnquiryController::class, 'store'])->name('enquire.store');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
Route::get('/admin/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
Route::post('/admin/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('admin.contacts.read');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

// routes/web.php
// routes/web.php

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Gallery Routes
    Route::prefix('gallery')->name('admin.gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/', [GalleryController::class, 'store'])->name('store');
        Route::get('/event/{id}', [GalleryController::class, 'show'])->name('event');
        Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('destroy');
    });
});

// ✅ Admin routes should be INSIDE auth middleware
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/enquiries', [EventEnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{id}', [EventEnquiryController::class, 'show'])->name('enquiries.show');
    Route::put('/enquiries/{id}/status', [EventEnquiryController::class, 'updateStatus'])->name('enquiries.update-status');
    Route::delete('/enquiries/{id}', [EventEnquiryController::class, 'destroy'])->name('enquiries.destroy');
    Route::post('/enquiries/bulk-action', [EventEnquiryController::class, 'bulkAction'])->name('enquiries.bulk-action');
    
    // Add these missing routes
    Route::patch('/enquiries/{id}/mark-read', [EventEnquiryController::class, 'markRead'])->name('enquiries.mark-read');
    Route::patch('/enquiries/{id}/mark-unread', [EventEnquiryController::class, 'markUnread'])->name('enquiries.mark-unread');
});
Route::middleware('auth')->group(function () {
   Route::prefix('admin')->name('admin.')->group(function () {
    // Website Details Routes
    Route::resource('website-details', WebsiteDetailController::class);
    
    // Optional: Additional custom routes
    Route::get('website-details/{websiteDetail}/duplicate', [WebsiteDetailController::class, 'duplicate'])
        ->name('website-details.duplicate');
    Route::post('website-details/bulk-delete', [WebsiteDetailController::class, 'bulkDelete'])
        ->name('website-details.bulk-delete');
    Route::get('website-details/export/csv', [WebsiteDetailController::class, 'exportCSV'])
        ->name('website-details.export-csv');
});

// Admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('faqs', [FaqController::class, 'index'])->name('admin.faqs.index');
    Route::get('faqs/create', [FaqController::class, 'create'])->name('admin.faqs.create');
    Route::post('faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
    Route::get('faqs/{faq}', [FaqController::class, 'show'])->name('admin.faqs.show');
    Route::get('faqs/{faq}/edit', [FaqController::class, 'edit'])->name('admin.faqs.edit');
    Route::put('faqs/{faq}', [FaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('faqs/{faq}', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');
    Route::post('faqs/update-order', [FaqController::class, 'updateOrder'])->name('admin.faqs.update-order');
    Route::post('faqs/{faq}/toggle-status', [FaqController::class, 'toggleStatus'])->name('admin.faqs.toggle-status');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    
    // Testimonial Routes
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show');
    Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::post('testimonials/update-order', [TestimonialController::class, 'updateOrder'])->name('testimonials.update-order');
    Route::post('testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    Route::get('/admin/whyus', [WhyUsController::class, 'index'])->name('whyus.index');
    Route::get('/admin/whyus/create', [WhyUsController::class, 'create'])->name('whyus.create');
    Route::post('/admin/whyus/store', [WhyUsController::class, 'store'])->name('whyus.store');
    Route::get('/admin/whyus/edit', [WhyUsController::class, 'edit'])->name('whyus.edit');
    Route::post('/admin/whyus/update', [WhyUsController::class, 'update'])->name('whyus.update');
    Route::delete('/admin/whyus/delete', [App\Http\Controllers\WhyUsController::class, 'destroy'])->name('whyus.destroy');
    Route::put('/admin/whyus/update', [WhyUsController::class, 'update'])->name('whyus.update');

});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    Route::post('services/update-order', [ServiceController::class, 'updateOrder'])->name('services.update-order');
    Route::post('services/bulk-delete', [ServiceController::class, 'bulkDelete'])->name('services.bulk-delete');
    Route::post('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
    Route::post('services/{service}/duplicate', [ServiceController::class, 'duplicate'])->name('services.duplicate');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Carousel Posts Routes
  Route::resource('carousel', CarouselController::class)->except(['show']);
    // Additional custom routes
    Route::post('carousel/{carouselPost}/toggle-status', [CarouselController::class, 'toggleStatus'])->name('carousel.toggle-status');
    Route::post('carousel/update-order', [CarouselController::class, 'updateOrder'])->name('carousel.update-order');
    Route::get('carousel/{carouselPost}/image', [CarouselController::class, 'getImage'])->name('carousel.get-image');

});

});

require __DIR__.'/auth.php';
