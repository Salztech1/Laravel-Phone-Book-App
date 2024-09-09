@extends('layouts.app')

@section('content')
<h2 class="mt-3 contact">Create Contact</h2>
<div>
    <hr />
    <div class="d-flex">
        <h2><i class="bi bi-arrow-left-short"></i> </h2>
        <button style="position: fixed; right: 0; margin: 10px; background-color: #463FF1;color:white; border: none; padding: 5px 5px;">Save Contact <i class="bi bi-box-arrow-in-down"></i></button>
    </div>
    <img src="{{URL('images/profile.png')}}" alt="">

</div>

@endsection