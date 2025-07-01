@extends('admin.layouts.baseLayout')
<style>
    .blur-background {
        filter: blur(3px);
        pointer-events: none;
    }
</style>
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Experiences</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Experience List</h5>
                        <a href="javascript:void(0);" class="btn btn-primary" data-mdb-toggle="modal"
                            data-mdb-target="#addExperienceModal">
                            Add Experience
                        </a>
                    </div>
                    <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.experienceSave') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addExperienceModalLabel">Add Experience</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        {{-- Job Title --}}
                                        <div class="form-outline mb-4">
                                            <input type="text" id="jobTitle" name="title" class="form-control"
                                                required />
                                            <label class="form-label" for="jobTitle">Job Title</label>
                                        </div>

                                        {{-- Company Name --}}
                                        <div class="form-outline mb-4">
                                            <input type="text" id="companyName" name="company" class="form-control"
                                                required />
                                            <label class="form-label" for="companyName">Company Name</label>
                                        </div>

                                        {{-- Location --}}
                                        <div class="form-outline mb-4">
                                            <input type="text" id="location" name="location" class="form-control" />
                                            <label class="form-label" for="location">Location (Optional)</label>
                                        </div>

                                        {{-- From Date --}}
                                        <div class="form-outline mb-4">
                                            <input type="date" id="fromDate" name="from_date" class="form-control"
                                                required />
                                            <label class="form-label" for="fromDate">From Date</label>
                                        </div>

                                        {{-- To Date --}}
                                        <div class="form-outline mb-4" id="toDateContainer">
                                            <input type="date" id="toDate" name="to_date" class="form-control" />
                                            <label class="form-label" for="toDate">To Date</label>
                                        </div>

                                        {{-- Currently Working Checkbox --}}
                                        <div class="form-check mb-4">
                                            <input type="checkbox" id="currentlyWorking" name="currently_working"
                                                class="form-check-input" value="1" />
                                            <label class="form-check-label" for="currentlyWorking">I am currently working
                                                here</label>
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                            <label class="form-label" for="description">Description</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-mdb-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Add Experience</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>From Date</th>
                                    <th>To-Date</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experiences as $experience)
                                    {{-- {{ dd($experience->); }} --}}
                                    <tr>
                                        <td>{{ $experience->id }}</td>
                                        <td>{{ $experience->title }}</td>
                                        <td>{{ $experience->company }}</td>
                                        <td>{{ $experience->from_date }}</td>
                                        <td>{{ $experience->to_date ? $experience->to_date : 'Present' }}</td>
                                        <td>{{ $experience->location }}</td>
                                        <td>{{ substr($experience->description, 0, 150) }}...</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm edit-btn"
                                                data-href="{{ route('admin.editExperience', $sxperince->id) }}">
                                                <i class="fas fa-edit me-1 fs-5"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.deleteExperience', $experience->id) }}"
                                                method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash-alt fs-5"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    @if ($errors->any())
        <script>
            const myModal = new mdb.Modal(document.getElementById('addExperienceModal'));
            myModal.show();
        </script>
    @endif
    <script>
        function initTinyMCE() {
            if (tinymce.get('description')) {
                tinymce.get('description').remove(); // remove if already exists
            }

            tinymce.init({
                selector: '#description',
                height: 250,
                menubar: false,
                plugins: 'lists link preview fullscreen',
                toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | removeformat',
                branding: false
            });
        }

        // Init TinyMCE when modal is opened
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('addExperienceModal');

            if (modal) {
                modal.addEventListener('shown.bs.modal', function() {
                    initTinyMCE();
                });

                modal.addEventListener('hidden.bs.modal', function() {
                    if (tinymce.get('description')) {
                        tinymce.get('description').remove();
                    }
                });
            }
        });
        document.getElementById('currentlyWorking').addEventListener('change', function() {
            const toDate = document.getElementById('toDateContainer');
            if (this.checked) {
                toDate.style.display = 'none';
                document.getElementById('toDate').value = ''; // clear value
            } else {
                toDate.style.display = 'block';
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("addExperienceModal");
            form.addEventListener("submit", function() {
                document.getElementById("fullPageSpinner").classList.remove("d-none");
                document.getElementById("addBtn").disabled = true;

                // Optional blur
                const wrapper = document.getElementById("formWrapper");
                if (wrapper) wrapper.classList.add("blur-background");
            });
        });

        // Handle Delete Button
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });

        // Handle Edit Button (optional alert before redirect)
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                Swal.fire({
                    icon: 'info',
                    title: 'Redirecting...',
                    text: 'Opening edit form',
                    showConfirmButton: false,
                    timer: 1200,
                    timerProgressBar: true
                });

                // Slight delay before redirect
                setTimeout(() => {
                    window.location.href = this.getAttribute('data-href');
                }, 1200);
            });
        });
    </script>
@endsection
