<?php
// app/Mail/EventEnquiryConfirmation.php

namespace App\Mail;

use App\Models\EventEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventEnquiryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    public function __construct(EventEnquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    public function build()
    {
        return $this->subject('Thank you for your event enquiry')
                    ->markdown('emails.event-enquiry-confirmation');
    }
}