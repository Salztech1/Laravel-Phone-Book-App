@extends('layouts.app')

@section('content')
<h2 class="mt-3 contact">Create Contact</h2>
<div style="background-color: #F5F5F5; border: 1px #F5F5F5; height: 821px; " class="mt-5 ">
    <div class="contact">
        <div class="d-flex ">
            <h2><i class="bi bi-arrow-left-short"></i> </h2>
            <button style="position: fixed; right: 0; margin: 10px; background-color: #463FF1;color:white; border: none; padding: 5px 5px;">Save Contact <i class="bi bi-box-arrow-in-down"></i></button>
        </div>
        <div style="margin-left:70px;">
            <img src="{{URL('images/profile.png')}}" alt="">
        </div>
        <hr />
        <p>Details</p>
        <i class="bi bi-person"></i>
        <input type="text" name="firstName" placeholder="First Name" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:20px; "/>
        
        <input type="text" name="firstName" placeholder="Last Name" class="w-50" style="padding: 15px 10px; border:none; background-color:#CCCCCC;border-radius: 5px; margin-left:40px; margin-top:15px; "/>
    </div>
</div>

@endsection