<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Contact;

class PagesController extends Controller
{
    public function createContact () {
        return view('contact');
    }

    // public function showAboutPage() {
    //     return view('about');
    // }

    // public function showProfile() {
    //     return view('profile');
    // }

    public function store(Request $request) {
        // return view('contacts.store');
        $data = $request->all();
       // dd($data);
        //echo 'Data stored';

        $contact = new Contact;
        $contact->firstName = $data['firstName'];
        $contact->lastName = $data['lastName'];
        $contact->phoneNumber = $data['phoneNumber'];
        //$contact->image = $data['images'];
        $contact->category = $data['category'];
        $contact->email = $data['email'];
        $contact->save();

       // dd($contact);
       return redirect()->route('landing');
    }

    public function showLandingPage()
{
    // Retrieve all contacts from the database
    $contacts = Contact::all();

    // Pass the contacts data to the welcome view
    return view('welcome', ['contacts' => $contacts]);
}



public function index(Request $request)
{
    $sort = $request->input('sort');

    if ($sort == 'A-Z') {
        // Sort contacts by name in ascending order
        $contacts = Contact::orderBy('firstName', 'asc')->get();
    } elseif ($sort == 'Z-A') {
        // Sort contacts by name in descending order
        $contacts = Contact::orderBy('firstName', 'desc')->get();
    } else {
        // Default: return contacts without sorting
        $contacts = Contact::all();
    }

    return view('welcome', compact('contacts'));
}


    
};
