<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $fillable = ['whyus_paragraph'];

    public function items()
    {
        return $this->hasMany(WhyUsItem::class);
    }
}
