<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUsItem extends Model
{
    protected $fillable = [
        'why_us_id',
        'icon',
        'title',
        'description'
    ];

    public function whyUs()
    {
        return $this->belongsTo(WhyUs::class);
    }
}
