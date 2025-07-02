<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Company Dashboard | Smart Software Solutions for Smarter Business' }}</title>
    <link rel="icon" href="{{ URL::asset('assets/img/about-logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/font/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="{{ URL::asset('admin/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/izi8w6l6mn5tifdrblhk2h63gu64vadc7ecsudr8tfhhmu46/tinymce/7/tinymce.min.js">
    </script>
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
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @yield('content')

    <script src="{{ URL::asset('admin/assets/js/mdb.umd.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/mdb.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/SweetAlert2.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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

        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                columnDefs: [{
                    orderable: false,
                    targets: 3
                }]
            });
        });
    </script>
    <script>
        // Toggle sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('mainContent').classList.toggle('collapsed');
        });
    </script>
</body>

</html>
