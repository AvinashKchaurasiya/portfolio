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
        <h3 class="mb-2">Add Experiences</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Add Experience Form</h5>
                        <a href="{{ route('admin.experiences') }}" class="btn btn-primary">
                            Cancel
                        </a>
                    </div>
                    <div class="card shadow-sm">
                        <form action="{{ route('admin.experienceSave') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- Job Title --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="jobTitle" name="title" class="form-control" required />
                                    <label class="form-label" for="jobTitle">Job Title</label>
                                </div>

                                {{-- Company Name --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="companyName" name="company" class="form-control" required />
                                    <label class="form-label" for="companyName">Company Name</label>
                                </div>

                                {{-- Location --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="location" name="location" class="form-control" />
                                    <label class="form-label" for="location">Location (Optional)</label>
                                </div>

                                {{-- From Date --}}
                                <div class="form-outline mb-4">
                                    <input type="date" id="fromDate" name="from_date" class="form-control" required />
                                    <label class="form-label" for="fromDate">From Date</label>
                                </div>

                                {{-- To Date --}}
                                <div class="form-outline mb-4" id="toDateContainer">
                                    <input type="date" id="toDate" name="to_date" class="form-control" />
                                    <label class="form-label" for="toDate">To Date</label>
                                </div>

                                {{-- Currently Working --}}
                                <div class="form-check mb-4">
                                    <input type="checkbox" id="currentlyWorking" name="currently_working"
                                        class="form-check-input" value="1" />
                                    <label class="form-check-label" for="currentlyWorking">I am currently working
                                        here</label>
                                </div>

                                {{-- Description --}}
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                    <label class="form-label" for="description">Description</label>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Add Experience</button>
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
            // From Date Click
            document.querySelector(".form-outline input#fromDate").closest(".form-outline").addEventListener(
                "click",
                function() {
                    document.getElementById("fromDate").showPicker && document.getElementById("fromDate")
                        .showPicker();
                });

            // To Date Click
            document.querySelector(".form-outline input#toDate").closest(".form-outline").addEventListener("click",
                function() {
                    document.getElementById("toDate").showPicker && document.getElementById("toDate")
                        .showPicker();
                });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const checkBox = document.getElementById('currentlyWorking');
            const toDateContainer = document.getElementById('toDateContainer');

            checkBox.addEventListener('change', function() {
                if (this.checked) {
                    toDateContainer.style.display = 'none';
                    document.getElementById('toDate').value = '';
                } else {
                    toDateContainer.style.display = 'block';
                }
            });

            // Hide on load if already checked
            if (checkBox.checked) {
                toDateContainer.style.display = 'none';
            }
        });

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
        // Initialize TinyMCE after the DOM is fully loaded
        function initTinyMCE() {
            tinymce.init({
                selector: '#description',
                height: 250,
                menubar: false,
                plugins: 'lists link code',
                toolbar: 'undo redo | bold italic underline | bullist numlist | link code',
                branding: false
            });
        }

        // Initialize when page loads
        document.addEventListener("DOMContentLoaded", function() {
            initTinyMCE();
        });
    </script>
@endsection
