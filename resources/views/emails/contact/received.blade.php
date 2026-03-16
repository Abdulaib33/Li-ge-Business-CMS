@component('mail::message')
# New Contact Message

**Name:** {{ $msg->name }}  
**Email:** {{ $msg->email }}  
**Phone:** {{ $msg->phone ?? '-' }}

---

**Message:**

{{ $msg->message }}

@endcomponent
