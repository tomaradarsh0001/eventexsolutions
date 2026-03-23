<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteDetailController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


// Public routes

});

require __DIR__.'/auth.php';
