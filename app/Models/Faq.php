<?php
// app/Models/Faq.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'side',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    // Scope for active FAQs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for left side FAQs
    public function scopeLeft($query)
    {
        return $query->where('side', 'left');
    }

    // Scope for right side FAQs
    public function scopeRight($query)
    {
        return $query->where('side', 'right');
    }

    // Scope ordered by order column
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }

    // Get FAQs grouped by side
    public static function getGroupedBySide()
    {
        $faqs = self::active()->ordered()->get();
        
        return [
            'left' => $faqs->where('side', 'left'),
            'right' => $faqs->where('side', 'right')
        ];
    }
    
}