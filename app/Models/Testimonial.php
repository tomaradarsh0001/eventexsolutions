<?php
// app/Models/Testimonial.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'review_text',
        'rating',
        'date',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'rating' => 'integer',
        'date' => 'date'
    ];

    // Scope for active testimonials
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope ordered by order column
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }

    // Scope for high rated testimonials
    public function scopeHighRated($query, $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating);
    }

    // Get star rating HTML
    public function getStarRatingAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->rating) {
                $stars .= '<span class="material-icons text-yellow-400">star</span>';
            } else {
                $stars .= '<span class="material-icons text-gray-300">star_border</span>';
            }
        }
        return $stars;
    }

    // Get formatted date
    public function getFormattedDateAttribute()
    {
        if ($this->date) {
            return $this->date->format('M d, Y');
        }
        return $this->created_at->format('M d, Y');
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/testimonials/' . $this->image);
        }
        return asset('images/default-avatar.png');
    }
}