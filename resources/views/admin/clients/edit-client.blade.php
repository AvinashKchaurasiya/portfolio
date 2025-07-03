@extends('admin.layouts.baseLayout')
@section('content')
    <style>
        .blur-background {
            filter: blur(3px);
            pointer-events: none;
        }

        #fromDate,
        #toDate {
            cursor: pointer;
        }
    </style>
    <div id="mainContent" class="main">
        <h3 class="mb-2">Add Clients</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Client</h5>
                        <a href="{{ route('admin.clients') }}" class="btn btn-primary">
                            Cancel
                        </a>
                    </div>
                    <div class="card shadow-sm">
                        <form action="{{ route('admin.updateClient', $client->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- Name --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', $client->name) }}" required />
                                    <label class="form-label" for="name">Name</label>
                                </div>

                                {{-- Company Name --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="companyName" name="company_name" class="form-control"
                                        value="{{ old('company_name', $client->company_name) }}" />
                                    <label class="form-label" for="companyName">Company Name (Optional)</label>
                                </div>
                                {{-- Email --}}
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $client->email) }}" />
                                    <label class="form-label" for="email">Email (Optional)</label>
                                </div>

                                {{-- Phone --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{ old('phone', $client->phone) }}" required />
                                    <label class="form-label" for="phone">Phone</label>
                                </div>
                                {{-- Address --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ old('address', $client->address) }}" required />
                                    <label class="form-label" for="address">Address</label>
                                </div>

                                {{-- City --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="city" name="city" class="form-control"
                                        value="{{ old('city', $client->city) }}" required />
                                    <label class="form-label" for="city">City</label>
                                </div>
                                {{-- State --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="state" name="state" class="form-control"
                                        value="{{ old('state', $client->state) }}" required />
                                    <label class="form-label" for="state">State</label>
                                </div>
                                {{-- Country --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="country" name="country" class="form-control"
                                        value="{{ old('country', $client->country) }}" required />
                                    <label class="form-label" for="country">Country</label>
                                </div>
                                {{-- Postal Code --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="postalCode" name="pincode" class="form-control"
                                        value="{{ old('postal_code', $client->postal_code) }}" required />
                                    <label class="form-label" for="postalCode">Postal Code</label>
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Update Client</button>
                            </div>
                        </form>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const forms = document.querySelectorAll("form");

            forms.forEach(function(form) {
                form.addEventListener("submit", function() {
                    const spinner = document.getElementById("fullPageSpinner");
                    if (spinner) {
                        spinner.classList.remove("d-none");
                    }
                });
            });
        });
    </script>
@endsection
