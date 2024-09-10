@extends('layouts.app')

@section('content')
<h2 class="mt-3 contact">Create Contact</h2>
<form method="POST" action="{{route('contacts.store')}}">
    @csrf
    <div style="background-color: #F5F5F5; border: 1px solid #F5F5F5; height: 821px; " class="mt-5 ">
        <div class="contact">
            <div class="d-flex ">
                <h2><a href="/"><i class="bi bi-arrow-left-short text-dark"></a></i> </h2>
                <button style="position: fixed; right: 0; margin: 10px; background-color: #463FF1;color:white; border: none; padding: 5px 5px;" type="submit">Save Contact <i class="bi bi-box-arrow-in-down"></i></button>
            </div>

            <div style="margin-left:70px;">
                <img src="{{URL('images/profile.png')}}" alt="">
            </div>

            <hr />
            <p>Details</p>
            <i class="bi bi-person"></i>
            <input type="text" name="firstName" placeholder="First Name" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:20px;outline:none; " />

            <input type="text" name="lastName" placeholder="Last Name" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:40px; margin-top:15px;outline:none; " />
            <div>
                <img src="{{URL('images/phone.png')}}">
                <select id="countrySelect">
                    <option value="us" data-flag="🇺🇸">United States</option>
                    <option value="fr" data-flag="🇫🇷">France</option>
                    <option value="de" data-flag="🇩🇪">Germany</option>
                    <option value="jp" data-flag="🇯🇵">Japan</option>
                </select>
                <input type="tel" name="phoneNumber" placeholder="Phone Number" class="number" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:10px; margin-top:15px;outline:none; " />
            </div>

            <div>
                <img src="{{URL('images/email.png')}}">
                <input type="text" name="email" placeholder="Email" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:10px; margin-top:15px; outline:none; " />
            </div>
            <div>
                <img src="{{URL('images/category.png')}}">
                <input type="text" name="category" placeholder="Category" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:10px; margin-top:15px; outline:none; " />
            </div>
</form>
</div>
</div>

@endsection