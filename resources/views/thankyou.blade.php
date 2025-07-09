@extends('layout.baseApp')
@section('content')
    <main class="main">
        <section id="hero" class="hero section dark-background">

            <img src="{{ URL::asset('assets/img/hero-bg.png') }}" alt="" data-aos="fade-in" class="">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row px-4">
                    <div class="col-md-8 ">
                        <h2>Thank You!</h2>
                        <p>Thank you for contacting with me! I will get back to you shortly.</p>
                        <a href="{{ route('home') }}" class="btn btn-light">Go Back to Home</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
