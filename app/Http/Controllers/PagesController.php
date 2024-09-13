<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Models\Contact;

class PagesController extends Controller
{
    //returns the view where a user can create a new contact
    public function createContact()
    {
        return view('contact');
    }

    //Handles the form submission to create a new contact.
    public function store(Request $request)
{
    // Validate input with unique email check
    $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'phoneNumber' => 'required|string|max:20',
        'email' => 'nullable|email|unique:contacts,email|max:255', // Added unique validation
        'category' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
    ], [
        'email.unique' => 'Sorry,this email has already been used.', // Custom error message for duplicate email
    ]);

    // Proceed with storing the contact if validation passes
    $contact = new Contact();
    $contact->firstName = $request->firstName;
    $contact->lastName = $request->lastName;
    $contact->phoneNumber = $request->phoneNumber;
    $contact->email = $request->email;
    $contact->category = $request->category;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $contact->image = $path;
    }

    $contact->save();

    return redirect('/')->with('success', 'Contact created successfully');
}


    //Displays the landing page and retrieves all contacts from the database to be passed to the view.
    public function showLandingPage()
    {
        // Retrieve all contacts
        $contacts = Contact::all();
        return view('welcome', compact('contacts'));
    }

    //Displays a filtered and sorted list of contacts based on search input or sorting options
    public function index(Request $request)
    {
        $query = Contact::query();

        // Search by name or phone number
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('firstName', 'LIKE', "%{$search}%")
                    ->orWhere('lastName', 'LIKE', "%{$search}%")
                    ->orWhere('phoneNumber', 'LIKE', "%{$search}%");
            });
        }

        // Sort alphabetically
        if ($request->filled('sort')) {
            if ($request->input('sort') == 'A-Z') {
                $query->orderBy('firstName', 'asc');
            } elseif ($request->input('sort') == 'Z-A') {
                $query->orderBy('firstName', 'desc');
            }
        }

        $contacts = $query->get();

        return view('welcome', compact('contacts'));
    }


    //Displays details of a single contact based on the provided id
    public function showContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    //Displays a form to edit the contact
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }


    //Updates an existing contact's information
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',

        ]);

        if ($request->hasFile('image')) {
            if ($contact->image) {
                Storage::delete('public/' . $contact->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $contact->image = $path;
        }

        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->phoneNumber = $request->phoneNumber;
        $contact->email = $request->email;
        $contact->category = $request->category;

        $contact->save();

        return redirect('/')->with('success', 'Contact updated successfully');
    }

    //Deletes a contact from the database
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
