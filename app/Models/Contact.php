<?php
// app/Models/Contact.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile', // Added mobile field
        'message',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
    public static function getCounts()
{
    return [
        'unread' => self::where('is_read', false)->count(),
        'read' => self::where('is_read', true)->count(),
        'total' => self::count()
    ];
}

// Scope for unread contacts
public function scopeUnread($query)
{
    return $query->where('is_read', false);
}

// Scope for read contacts
public function scopeRead($query)
{
    return $query->where('is_read', true);
}

// Mark as read
public function markAsRead()
{
    $this->is_read = true;
    return $this->save();
}

}

