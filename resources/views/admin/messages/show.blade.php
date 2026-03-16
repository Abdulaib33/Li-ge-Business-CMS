@extends('layouts.admin', ['title' => 'Message'])

@section('content')
    <a class="underline" href="{{ route('admin.messages.index') }}">← Back</a>

    <h1 class="mt-4 text-2xl font-bold">Message</h1>

    <div class="mt-4 border p-4 space-y-2">
        <div><strong>Date:</strong> {{ $contactMessage->created_at->format('Y-m-d H:i') }}</div>
        <div><strong>Name:</strong> {{ $contactMessage->name }}</div>
        <div><strong>Email:</strong> {{ $contactMessage->email }}</div>
        <div><strong>Phone:</strong> {{ $contactMessage->phone ?? '-' }}</div>
        <div class="pt-2"><strong>Message:</strong></div>
        <div class="whitespace-pre-line">{{ $contactMessage->message }}</div>
    </div>
@endsection
