@extends('layout.portfolio')

@section('content')
    @include('layout.partials.portfolio-chrome')

    <div class="pf-inner">
        <div class="container">
        <div class="pf-panel thank-wrap fade-up">
            <div class="thank-icon" aria-hidden="true">✓</div>
            <h1 class="thank-title">Thank <span>You</span></h1>
            <p class="thank-text">
                Thank you for reaching out. Your message is on its way — I will get back to you as soon as I can.
            </p>
            <div class="hero-btns" style="justify-content:center">
                <a href="{{ route('home') }}" class="btn-primary">Back to home</a>
                <a href="{{ route('home') }}#contact" class="btn-ghost">Send another message</a>
            </div>
        </div>
        </div>
    </div>

    <footer>
        <div class="container">
        <p style="margin-bottom:0.5rem">
            <span style="font-size:1.1rem">⌨️</span> &nbsp; Designed &amp; Developed by
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">Avinash Kumar</a> &nbsp;|&nbsp;
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">Z1i Innovations</a>
        </p>
        <p style="margin-top:0.4rem;opacity:0.5">© {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>
@endsection
