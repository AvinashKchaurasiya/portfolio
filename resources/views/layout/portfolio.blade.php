<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Avinash Kumar — PHP Laravel Developer' }}</title>
    <meta name="description"
        content="PHP & Laravel developer — scalable web apps, REST APIs, and ERP systems. Portfolio of Avinash Kumar.">
    <link rel="icon" href="{{ asset('assets/img/about-logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=JetBrains+Mono:wght@300;400;700&family=Syne:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="portfolio-page">
    <div id="form-overlay" style="display:none;">
        <div class="pf-spinner" role="status"><span class="visually-hidden">Loading</span></div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: @json(session('error')),
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        (function() {
            var form = document.getElementById('php-email-form');
            var overlay = document.getElementById('form-overlay');
            if (form && overlay) {
                form.addEventListener('submit', function() {
                    overlay.style.display = 'flex';
                });
            }
        })();
    </script>
</body>

</html>
