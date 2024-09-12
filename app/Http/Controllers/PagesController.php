<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Models\Contact;

class PagesController extends Controller
{
    public function createContact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

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


    public function showLandingPage()
    {
        // Retrieve all contacts
        $contacts = Contact::all();

        // Pass contacts to the view
        return view('welcome', compact('contacts'));
    }


    // public function index(Request $request)
    // {
    //     $sort = $request->input('sort');

    //     if ($sort == 'A-Z') {
    //         // Sort contacts by name in ascending order
    //         $contacts = Contact::orderBy('firstName', 'asc')->get();
    //     } elseif ($sort == 'Z-A') {
    //         // Sort contacts by name in descending order
    //         $contacts = Contact::orderBy('firstName', 'desc')->get();
    //     } else {
    //         // Default: return contacts without sorting
    //         $contacts = Contact::all();
    //     }

    //     return view('welcome', compact('contacts'));
    // }


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



    public function showContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }


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


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
