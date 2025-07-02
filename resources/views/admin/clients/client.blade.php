@extends('admin.layouts.baseLayout')
<style>
    .blur-background {
        filter: blur(3px);
        pointer-events: none;
    }
</style>

@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Services</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Service List</h5>
                        <a href="javascript:void(0);" class="btn btn-primary" data-mdb-toggle="modal"
                            data-mdb-target="#addServiceModal">
                            Add Service
                        </a>
                    </div>
                    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('admin.serviceSave') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="techName" name="name" class="form-control"
                                                required />
                                            <label class="form-label" for="techName">Service Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" id="techDesc" name="description" rows="3" required></textarea>
                                            <label class="form-label" for="techDesc">Description</label>
                                        </div>
                                        <div class="form-outline mb-2">
                                            <img id="iconPreview" src="{{ URL::asset('admin/images/image_preview.png') }}"
                                                class="img-thumbnail"
                                                style="width: 80px; height: 80px; object-fit: contain;" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="file" id="iconInput" name="icon" accept="image/*" hidden
                                                onchange="previewIcon(event)" />
                                            <label for="iconInput" class="btn btn-outline-primary btn-sm mt-2">
                                                <i class="fas fa-upload me-1"></i> Upload Icon
                                            </label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-mdb-dismiss="modal">Cancel</button>
                                        <button type="submit" id="addBtn" class="btn btn-primary">Add</button>
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
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    {{-- {{ dd($service->); }} --}}
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                            <img src="{{ URL::asset($service->icon) }}" alt="{{ $service->title }}"
                                                class="img-fluid" style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ substr($service->description, 0, 150) }}...</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm edit-btn"
                                                data-href="{{ route('admin.editService', $service->id) }}">
                                                <i class="fas fa-edit me-1 fs-5"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.updateStatus', $service->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="status"
                                                    value="{{ $service->is_active ? 0 : 1 }}">
                                                <button type="button"
                                                    class="btn status-btn btn-{{ $service->is_active ? 'success' : 'danger' }} btn-sm">
                                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.deleteService', $service->id) }}" method="POST"
                                                class="d-inline delete-form">
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
            const myModal = new mdb.Modal(document.getElementById('addServiceModal'));
            myModal.show();
        </script>
    @endif
    <script>
        function previewIcon(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.getElementById('iconPreview');
                img.src = reader.result;
            };
            if (input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("addServiceModal");
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

        // Handle status toggle

        document.querySelectorAll('.status-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const form = this.closest('form');
                const newStatus = form.querySelector('input[name="status"]').value == 1 ? 'activate' :
                    'deactivate';

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to ${newStatus} this service.`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, confirm!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
