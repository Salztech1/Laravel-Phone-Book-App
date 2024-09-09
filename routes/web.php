<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact-us', [PagesController::class, 'createContact'])->name('contact');
Route::get('about-us', [PagesController::class, 'showAboutPage'])->name('about');
Route::get('profile-me', [PagesController::class, 'showProfile'])->name('profile');

