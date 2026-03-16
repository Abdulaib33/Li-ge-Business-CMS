<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(string $key)
    {
        $page = Page::published()->where('key', $key)->firstOrFail();

        return view('public.page', [
            'page' => $page,
        ]);
    }
}