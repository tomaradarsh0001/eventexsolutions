<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarouselPost extends Model
{
    protected $table = 'carousel_posts';
    
    protected $fillable = [
        'title',
        'image_path',
        'status',
        'order'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image_path ? Storage::disk('public')->url($this->image_path) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }
}