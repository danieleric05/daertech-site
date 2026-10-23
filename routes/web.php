<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/conseil-informatique', [PageController::class, 'conseil'])->name('conseil');
Route::get('/developpement-web-applications', [PageController::class, 'developpement'])->name('developpement');
Route::get('/formation-assistance', [PageController::class, 'formation'])->name('formation');
Route::get('/actualites', [PostController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{post:slug}', [PostController::class, 'show'])->name('actualites.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->middleware('throttle:5,10')->name('contact.send');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [Admin\LoginController::class, 'show'])->name('login');
        Route::post('login', [Admin\LoginController::class, 'login'])->middleware('throttle:5,1');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [Admin\LoginController::class, 'logout'])->name('logout');
        Route::get('/', Admin\DashboardController::class)->name('dashboard');

        Route::resource('pages', Admin\PageController::class)->only(['index', 'edit', 'update']);
        Route::resource('services', Admin\ServiceController::class)->except('show');
        Route::patch('services/{service}/status', [Admin\ServiceController::class, 'status'])->name('services.status');
        Route::resource('posts', Admin\PostController::class)->except('show');
        Route::patch('posts/{post}/publish', [Admin\PostController::class, 'publish'])->name('posts.publish');
        Route::resource('banners', Admin\BannerController::class)->except('show');
        Route::resource('messages', Admin\MessageController::class)->only(['index', 'show', 'destroy']);
        Route::get('settings', [Admin\SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
    });
});
