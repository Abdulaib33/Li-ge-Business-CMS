<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::orderBy('key')->get(),
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());

        return redirect()
            ->route('admin.pages.index')
            ->with('status', 'Page updated successfully.');
    }
}
