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
        $data = $request->all();
    
        $contact = new Contact;
        $contact->firstName = $data['firstName'];
        $contact->lastName = $data['lastName'];
        $contact->phoneNumber = $data['phoneNumber'];
        $contact->category = $data['category'];
        $contact->email = $data['email'];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/uploads'), $imageName);
            $contact->image = 'images/uploads/' . $imageName;
        }
    
        $contact->save();
    
        // Redirect to the landing page
        return redirect()->route('showLandingPage');
    }
    
    public function showLandingPage()
    {
        // Retrieve all contacts
        $contacts = Contact::all();
    
        // Pass contacts to the view
        return view('welcome', compact('contacts'));
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


// PagesController.php

// PagesController.php

public function showContact($id)
{
    $contact = Contact::findOrFail($id);
    return view('contacts.show', compact('contact'));
}

    
};
