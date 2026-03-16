<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

use App\Http\Controllers\Public\PageController as PublicPageController;
use App\Http\Controllers\Public\ServiceController as PublicServiceController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Http\Controllers\Public\ContactController as PublicContactController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

// Blog / News
Route::get('/news', [PublicPostController::class, 'index'])->name('posts.index');
Route::get('/news/{slug}', [PublicPostController::class, 'show'])->name('posts.show');

// Services
Route::get('/services', [PublicServiceController::class, 'index'])->name('services.index');

// Contact (form)
Route::get('/contact', [PublicContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [PublicContactController::class, 'submit'])->name('contact.submit');

// Home page = "/" (redirect to the CMS page "home")
Route::get('/', function () {
    return redirect()->route('page.show', 'home');
})->name('home');

// CMS pages (ONLY these keys allowed)
// IMPORTANT: keep this BELOW the explicit public routes above
Route::get('/{key}', [PublicPageController::class, 'show'])
    ->whereIn('key', ['home', 'about', 'contact'])
    ->name('page.show');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Pages (edit-only)
        Route::get('/pages', [AdminPageController::class, 'index'])->name('admin.pages.index');
        Route::get('/pages/{page}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
        Route::put('/pages/{page}', [AdminPageController::class, 'update'])->name('admin.pages.update');

        // Services CRUD
        Route::resource('/services', AdminServiceController::class)->names('admin.services');

        // Posts CRUD (admin only)
        Route::resource('/posts', AdminPostController::class)->names('admin.posts')->except(['show']);

        // Contact messages inbox
        Route::get('/messages', [AdminMessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/messages/{contactMessage}', [AdminMessageController::class, 'show'])->name('admin.messages.show');
        Route::delete('/messages/{contactMessage}', [AdminMessageController::class, 'destroy'])->name('admin.messages.destroy');

        // Settings
        Route::get('/settings', [AdminSettingController::class, 'edit'])->name('admin.settings.edit');
        Route::put('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    });

require __DIR__.'/auth.php';
