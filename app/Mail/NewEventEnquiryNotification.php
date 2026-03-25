<?php
// app/Mail/NewEventEnquiryNotification.php

namespace App\Mail;

use App\Models\EventEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEventEnquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    public function __construct(EventEnquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    public function build()
    {
        return $this->subject('New Event Enquiry Received')
                    ->markdown('emails.new-event-enquiry-notification');
    }
}