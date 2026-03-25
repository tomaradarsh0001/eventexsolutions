<?php
// app/Models/EventEnquiry.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EventEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'purpose',
        'message',
        'status',
        'is_read',
        'contacted_at',
        'admin_notes'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'contacted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::created(function ($enquiry) {
            Log::info('New event enquiry created', [
                'enquiry_id' => $enquiry->id,
                'name' => $enquiry->name,
                'email' => $enquiry->email,
                'purpose' => $enquiry->purpose
            ]);
        });
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
    
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
    
    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }
    
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}