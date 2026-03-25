<?php
// app/Models/GalleryVideo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    protected $fillable = ['event_id', 'path', 'title', 'order'];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}