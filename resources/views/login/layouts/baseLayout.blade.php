<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Company Dashboard | Smart Software Solutions for Smarter Business' }}</title>
    <link rel="icon" href="{{ URL::asset('admin/images/logo/logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/font/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/js/jquery-3.7.1.min.js') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/sweetalert2.min.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #d5dbdd, #dde1e2, #999b9c);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 1rem;
        }

        .blur-background {
            filter: blur(3px);
            pointer-events: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @elseif (Session::has('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
        });
    </script>
</head>

<body>

    @yield('content')

    <script src="{{ URL::asset('admin/assets/js/mdb.umd.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/mdb.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/SweetAlert2.js') }}"></script>
    <!-- Navbar Scroll Effect -->
    <script>
        new WOW().init();

        window.addEventListener("scroll", function() {
            let navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("login-form");
            form.addEventListener("submit", function() {
                document.getElementById("fullPageSpinner").classList.remove("d-none");
                document.getElementById("loginBtn").disabled = true;

                // Optional blur
                const wrapper = document.getElementById("formWrapper");
                if (wrapper) wrapper.classList.add("blur-background");
            });
        });
    </script>
</body>

</html>
