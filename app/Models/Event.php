<?php
// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = ['name', 'event_date', 'description'];
    
    protected $casts = [
        'event_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    // Accessor to always return formatted date
    public function getEventDateAttribute($value)
    {
        if ($value) {
            return Carbon::parse($value)->format('Y-m-d');
        }
        return null;
    }
    
    // Mutator to ensure proper format
    public function setEventDateAttribute($value)
    {
        if ($value) {
            $this->attributes['event_date'] = Carbon::parse($value)->format('Y-m-d');
        } else {
            $this->attributes['event_date'] = null;
        }
    }
    
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
    
    public function videos()
    {
        return $this->hasMany(GalleryVideo::class);
    }
}