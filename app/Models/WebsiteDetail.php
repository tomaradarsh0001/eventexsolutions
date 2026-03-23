<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model
{
    use HasFactory;

    protected $table = 'website_details';

    protected $fillable = [
        'website_name',
        'phone_number_1',
        'phone_number_2',
        'phone_number_3',
        'email',
        'address',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'justdial_link',
        'instamart_link',
        'whatsapp_link',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Helper method to get all phone numbers as an array
    public function getPhoneNumbersAttribute()
    {
        $phones = [];
        if ($this->phone_number_1) $phones[] = $this->phone_number_1;
        if ($this->phone_number_2) $phones[] = $this->phone_number_2;
        if ($this->phone_number_3) $phones[] = $this->phone_number_3;
        return $phones;
    }

    // Helper method to get all social links
    public function getSocialLinksAttribute()
    {
        return [
            'facebook' => $this->facebook_link,
            'instagram' => $this->instagram_link,
            'linkedin' => $this->linkedin_link,
            'justdial' => $this->justdial_link,
            'instamart' => $this->instamart_link,
            'whatsapp' => $this->whatsapp_link,
        ];
    }
}