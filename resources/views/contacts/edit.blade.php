@extends('layouts.app')

@section('content')
<h2 class="mt-3 contact">Edit Contact</h2>
<form method="POST" action="{{ route('contacts.update', $contact->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div style="background-color: #F5F5F5; border: 1px solid #F5F5F5; height: 821px;" class="mt-5">
        <div class="contact">
            <div class="d-flex">
                <h2><a href="/"><i class="bi bi-arrow-left-short text-dark"></a></i> </h2>
                <button style="position: fixed; right: 0; margin: 10px; background-color: #463FF1;color:white; border: none; padding: 5px 5px;" type="submit">Save Changes <i class="bi bi-box-arrow-in-down"></i></button>
            </div>

            <!-- Image Upload Section -->
            <div style="margin-left:70px;">
            <img id="profileImage" src="{{ $contact->image ? asset('storage/' . $contact->image) : URL('images/profile.png') }}" alt="Profile Image" style="cursor: pointer; width: 150px; height: 150px; border-radius: 50%;">

                <input type="file" name="image" id="imageUpload" style="display: none;" accept="image/*">
            </div>

            <hr />
            <p>Details</p>
            <i class="bi bi-person"></i>
            <input type="text" name="firstName" placeholder="First Name" class="w-50" style="padding: 15px 10px; border:none; border-radius: 5px; margin-left:20px;outline:none;" value="{{ $contact->firstName }}" />

            <input type="text" name="lastName" placeholder="Last Name" class="w-50" style="padding: 15px 10px; border:none; border-radius: 5px; margin-left:40px; margin-top:15px;outline:none;" value="{{ $contact->lastName }}" />

            <div>
                <img src="{{URL('images/phone.png')}}">
                <select id="countrySelect">
                    <option value="us" data-flag="🇺🇸">United States</option>
                    <option value="fr" data-flag="🇫🇷">France</option>
                    <option value="de" data-flag="🇩🇪">Germany</option>
                    <option value="jp" data-flag="🇯🇵">Japan</option>
                </select>
                <input type="tel" name="phoneNumber" placeholder="Phone Number" class="number" style="padding: 15px 10px; border:none; border-radius: 5px; margin-left:10px; margin-top:15px;outline:none;" value="{{ $contact->phoneNumber }}" />
            </div>

            <div>
                <img src="{{URL('images/email.png')}}">
                <input type="email" name="email" placeholder="Email" class="w-50" style="padding: 15px 10px; border:none; border-radius: 5px; margin-left:10px; margin-top:15px; outline:none;" value="{{ $contact->email }}" />
            </div>

            <div>
                <img src="{{URL('images/category.png')}}">
                <input type="text" name="category" placeholder="Category" class="w-50" style="padding: 15px 10px; border:none; border-radius: 5px; margin-left:10px; margin-top:15px; outline:none;" value="{{ $contact->category }}" />
            </div>
        </div>
    </div>
</form>

<script>
    // Get the image and file input elements
    const profileImage = document.getElementById('profileImage');
    const imageUpload = document.getElementById('imageUpload');

    // Trigger the file input when the image is clicked
    profileImage.addEventListener('click', function() {
        imageUpload.click();
    });

    // Display the uploaded image on selection
    imageUpload.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Set the profile image src to the uploaded image
                profileImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
