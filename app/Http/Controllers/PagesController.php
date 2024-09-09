<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function createContact () {
        return view('contact');
    }

    public function showAboutPage() {
        return view('about');
    }

    public function showProfile() {
        return view('profile');
    }
    
}
