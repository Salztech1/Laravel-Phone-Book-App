@extends('layouts.app')

@section('content')

<div>
<div>
    <div class="home">
        <h2>Contacts</h2>
        <div class="d-flex">
            <form method="GET" action="{{ route('contacts.index') }}" style="display: flex; width: 100%;">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." aria-label="Search" style="background-color: #F5F5F5; outline: none; border: none; padding: 5px 5px; border-radius: 10px; width: 180%;">
                </div>

                <select name="sort" onchange="this.form.submit()" style="background-color: #F5F5F5; border: none; padding: 5px 5px; margin-left: auto; margin-right:20px;">
                    <option value="A-Z" {{ request('sort') == 'A-Z' ? 'selected' : '' }}>Sort by: A-Z</option>
                    <option value="Z-A" {{ request('sort') == 'Z-A' ? 'selected' : '' }}>Sort by: Z-A</option>
                </select>
            </form>
        </div>
    </div>
</div>




</div>

<div class="container-fluid mt-4" style="background-color: #F5F5F5;">
    <table class="table w-100">
        <thead style="border-bottom: 1px solid black;">
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
    <p>Contacts</p>
    <table class="table w-100">
    <tbody>
        @foreach($contacts as $contact)
            <tr style="padding-bottom: 20px; border: none;">
                <td style="padding: 10px 0; border: none; display: flex; align-items: center;">
                    @if($contact->image)
                        <img src="{{ asset('storage/' . $contact->image) }}" alt="Profile Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; margin-top: 5px;">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Default Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; margin-top: 5px;">
                    @endif
                    <a href="{{ route('contacts.show', $contact->id) }}" style="text-decoration: none; color: #000;">
                        {{ $contact->firstName }} {{ $contact->lastName }}
                    </a>
                </td>
                <td style="padding: 10px 0; border: none;">{{ $contact->phoneNumber }}</td>
                <td style="padding: 10px 0; border: none;">{{ $contact->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection
