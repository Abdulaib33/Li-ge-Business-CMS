<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard', [
            'stats' => [
                'services' => Service::count(),
                'posts' => Post::count(),
                'messages' => ContactMessage::count(),
            ],
        ]);
    }
}
