@extends('layouts.app')

@section('content')

<div >
    <div class=" home">
        <h2>Contacts</h2>
        <div class="d-flex">
            <div>
                <input type="text" class="" placeholder="Search..." aria-label="Search" style="background-color: #F5F5F5; outline: none;   border: none; padding: 5px 5px; border-radius: 10px; width: 180%;">
            </div>
            <button class="" style="position: fixed; right: 0; margin: 10px;">Sorted By</button>
        </div>
    </div>
    <!-- <div class="input-group w-50"  >
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
            
        </div> -->


</div>

<div class="container-fluid mt-4" style="background-color: #F5F5F5;">
    <table class="table table-striped w-100">
        <thead style="border-bottom: 1px solid black;">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
    <p>Contacts</p>
    <table class=" table-striped w-100">
        <tbody>
            <tr>
                <td></td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection