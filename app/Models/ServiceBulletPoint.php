<?php
// app/Models/ServiceBulletPoint.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceBulletPoint extends Model
{
    protected $fillable = [
        'service_id',
        'bullet_point',
        'icon',
        'order'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}