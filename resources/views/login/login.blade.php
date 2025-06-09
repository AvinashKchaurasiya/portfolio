@extends('login.layouts.baseLayout')
@section('content')
    <div class="container" id="login-form">
        <div class="row justify-content-center">
            <div class="col-md-6 wow fadeInDown">
                <div class="card shadow-4">
                    <div class="card-body p-5 text-center">Admin Login</h3>

                        <form action="{{ route("loginProccess") }}" method="POST">
                            @csrf

                            <div class="form-outline mb-4">
                                <input type="email" name="email" class="form-control" required />
                                <label class="form-label">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" class="form-control" required />
                                <label class="form-label">Password</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4" id="loginBtn">
                                Login
                            </button>
                        </form>

                        <small class="text-muted">© Z1I Innovations</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fullPageSpinner"
        class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center"
        style="z-index: 9999;">
        <div class="text-center text-white">
            <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;"></div>
            <div class="mt-3 fs-5">Processing...</div>
        </div>
    </div>
@endsection
