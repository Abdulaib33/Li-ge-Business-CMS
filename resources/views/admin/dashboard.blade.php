@extends('layouts.admin', ['title' => 'Dashboard'])

@section('content')
    <div class="grid gap-6 md:grid-cols-3">
        <div class="card">
            <div class="card-body">
                <p class="text-sm text-slate-500">Services</p>
                <p class="mt-2 text-3xl font-bold">{{ $stats['services'] }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p class="text-sm text-slate-500">Posts</p>
                <p class="mt-2 text-3xl font-bold">{{ $stats['posts'] }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p class="text-sm text-slate-500">Messages</p>
                <p class="mt-2 text-3xl font-bold">{{ $stats['messages'] }}</p>
            </div>
        </div>
    </div>
@endsection
{{-- $user = \App\Models\User::where('email', 'Abdulaibayo08@gmail.com')->first();
$user->is_admin = true;
$user->save(); --}}
