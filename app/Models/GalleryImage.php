<?php
// app/Models/GalleryImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['event_id', 'path', 'title', 'order'];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}