{{-- resources/views/emails/event-enquiry-confirmation.blade.php --}}
@component('mail::message')
# Thank You for Your Enquiry!

Dear {{ $enquiry->name }},

Thank you for reaching out to us about your {{ $enquiry->purpose_label }}. We have received your enquiry and our team will get back to you within 24 hours.

## Enquiry Details:
- **Event Type:** {{ $enquiry->purpose_label }}
- **Name:** {{ $enquiry->name }}
- **Email:** {{ $enquiry->email }}
- **Phone:** {{ $enquiry->phone }}

@if($enquiry->message)
**Message:**
{{ $enquiry->message }}
@endif

In the meantime, feel free to:
- Visit our website for inspiration
- Follow us on social media
- Call us at +1 (234) 567-8900 for urgent inquiries

We look forward to helping you create an extraordinary event!

Best regards,
**Events Team**

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent
@endcomponent