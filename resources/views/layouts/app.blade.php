<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Phone Book</title>
</head>

<body>
    <main>
        <div class="d-flex   ">
            <div class="mt-2 col-2 ">
                <h2 style="font-size: 25px;">
                    <a href="/"><i class="bi bi-person-fill  "></i> <span class="text-white">My Phonebook</span> </a>
                </h2>

                <div class="create_contact">
                    <a href="{{ route('contact')}}">
                        <button style="background-color: #272727; padding:0px 50px 0px 10px; border: none; border-radius: 10px; display: flex;   text-align: center;">
                            <span class="bi bi-plus" style="background-color: #2B2881; color: white; font-size: 24px; padding: 10px; border-radius: 30%; display: flex;  margin-bottom: 5px; ">
                            </span>
                            <div style="margin-left: 5px;">
                            <span style="color: #A3A3A3;">
                                Create new
                            </span><br/>
                            <span class="text-white">
                                Contact
                            </span>
                            </div>
                        </button>
                        <br />
                    </a>

                    <a href="/">
                    <button style="background-color: #404040;   padding: 0px 80px 0px 20px; border: none; border-radius: 5px;" class="mt-3">
                    <span class="bi bi-person-fill " style="color:#463FF1;">
                        <span class="text-white">Contacts</span></span>
                    </button>
                    </a>
                </div>

            </div>

            <div class="col-10 mt-2 bg-white content">
                <!-- Where content will be displayed -->
                @yield('content')
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </main>
</body>

</html>