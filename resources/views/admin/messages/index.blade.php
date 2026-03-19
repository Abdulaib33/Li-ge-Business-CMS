@extends('layouts.admin', ['title' => 'Messages'])

@section('content')
    <h1 class="text-2xl font-bold">Messages</h1>

    @if(session('status'))
        <div class="mt-4 p-3 border">{{ session('status') }}</div>
    @endif

    <div class="mt-6 border rounded overflow-hidden">
        <table class="w-full">
            <thead class="border-b">
                <tr>
                    <th class="text-left p-3">Date</th>
                    <th class="text-left p-3">Name</th>
                    <th class="text-left p-3">Email</th>
                    <th class="text-left p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $m)
                    <tr class="border-b">
                        <td class="p-3">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-3">{{ $m->name }}</td>
                        <td class="p-3">{{ $m->email }}</td>
                        <td class="p-3 flex gap-3">
                            <a class="underline" href="{{ route('admin.messages.show', $m) }}">View</a>

                            <form method="POST" action="{{ route('admin.messages.destroy', $m) }}"
                                  onsubmit="return confirm('Delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button class="underline btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $messages->links() }}</div>
@endsection
