<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'showLandingPage'])->name('landing');



Route::get('contact-us', [PagesController::class, 'createContact'])->name('contact');
// Route::get('about-us', [PagesController::class, 'showAboutPage'])->name('about');
// Route::get('profile-me', [PagesController::class, 'showProfile'])->name('profile');

Route::post('contacts', [PagesController::class, 'store'])->name('contacts.store');

