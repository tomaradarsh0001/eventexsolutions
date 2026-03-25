{{-- resources/views/emails/new-event-enquiry-notification.blade.php --}}
@component('mail::message')
# New Event Enquiry

You have received a new event enquiry from **{{ $enquiry->name }}**.

## Enquiry Details:
- **Event Type:** {{ $enquiry->purpose_label }}
- **Name:** {{ $enquiry->name }}
- **Email:** {{ $enquiry->email }}
- **Phone:** {{ $enquiry->phone }}
- **Submitted:** {{ $enquiry->created_at->format('F j, Y, g:i a') }}

@if($enquiry->message)
**Message:**
{{ $enquiry->message }}
@endif

@component('mail::button', ['url' => route('admin.enquiries.show', $enquiry->id)])
View Enquiry Details
@endcomponent

Best regards,
**Events System**
@endcomponent