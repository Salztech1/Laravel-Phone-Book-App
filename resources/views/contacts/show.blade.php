<!-- resources/views/contacts/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="">
    <h1 class="mt-5 contact">Contact Info</h1>

    <div style="background-color: #F5F5F5; border: 1px solid #F5F5F5; height: 821px; " class="mt-5 ">


        <div class="d-flex mt-3 contact  ">
            <h2>
                <a href="/"><i class="bi bi-arrow-left-short text-dark"></i></a>
            </h2>

            <span style="margin-left: auto;">
                <a href="{{ route('contacts.edit', $contact->id) }}"> <button style=" background-color: #463FF1; color: white; border: none; padding: 5px 5px;" type="submit">
                        Edit Contact <i class="bi bi-pen"></i>
                    </button> </a>
                <!-- Delete Contact Form -->
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: red;">
                        <i class="bi bi-trash3"></i>
                    </button>
                </form>
            </span>
        </div>



        <div class="contact">
            <div class="contact-image">
                @if($contact->image)
                <img src="{{ asset('storage/' . $contact->image) }}" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">
                @else
                <img src="{{ asset('images/contact-image.png') }}" alt="Default Image" style="width: 100px; height: 100px; border-radius: 50%;">
                @endif
            </div>
            <h2 class="mt-3"> {{ $contact->firstName }} {{ $contact->lastName }}</h2>
            <hr />
            <div class="contact-info">
                <h6>Contact details</h6>
                <div style="margin-left: 30px; ">
                    <p><strong><img src="{{URL('images/phone.png')}}"></strong> {{ $contact->phoneNumber }}</p>
                    <p><strong> <img src="{{URL('images/email.png')}}"></strong> {{ $contact->email }}</p>
                    <p><strong><img src="{{URL('images/category.png')}}"></strong> {{ $contact->category }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection