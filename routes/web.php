<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PagesController::class, 'showLandingPage'])->name('landing');
//Route::get('/landing', [PagesController::class, 'showLandingPage'])->name('landing');
Route::get('/', [PagesController::class, 'showLandingPage'])->name('showLandingPage');


Route::get('contact-us', [PagesController::class, 'createContact'])->name('contact');
// Route::get('about-us', [PagesController::class, 'showAboutPage'])->name('about');
// Route::get('profile-me', [PagesController::class, 'showProfile'])->name('profile');
// In your web.php
Route::get('/contacts', [PagesController::class, 'index'])->name('contacts.index');
//Route::get('/contacts/{id}', [PagesController::class, 'showContact'])->name('contacts.show');



Route::post('contacts', [PagesController::class, 'store'])->name('contacts.store');

Route::get('/contacts/{id}', [PagesController::class, 'showContact'])->name('contacts.show');

// Edit contact form
Route::get('/contacts/{id}/edit', [PagesController::class, 'edit'])->name('contacts.edit');

// Update contact in the database
Route::put('/contacts/{id}', [PagesController::class, 'update'])->name('contacts.update');
