<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreContactMessageRequest;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('public.contact');
    }

    public function submit(StoreContactMessageRequest $request)
    {
        $contactMessage = ContactMessage::create($request->validated());

        // $to = config('app.business_contact_email');
        $to = config('business.contact_email');

        if ($to) {
            Mail::to($to)->send(new ContactMessageReceived($contactMessage));
        }

        return redirect()
            ->route('contact.show')
            ->with('status', 'Message sent. We will contact you soon.');
    }
}
