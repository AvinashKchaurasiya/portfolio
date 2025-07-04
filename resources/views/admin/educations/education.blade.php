@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Educations</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Education List</h5>
                        <a href="{{ route('admin.createEducation') }}" class="btn btn-primary">
                            Add Education
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cource</th>
                                    <th>specialization</th>
                                    <th>From Date</th>
                                    <th>To-Date</th>
                                    <th>Currently Studying</th>
                                    <th>College Name</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educations as $education)
                                    {{-- {{ dd($education->); }} --}}
                                    <tr>
                                        <td>{{ $education->id }}</td>
                                        <td>{{ $education->cource }}</td>
                                        <td>{{ $education->specialization }}</td>
                                        <td>{{ $education->from_date }}</td>
                                        <td>{{ $education->to_date ? $education->to_date : 'Present' }}</td>
                                        <td>
                                            {{ $education->currently_study ? 'Yes' : 'No' }}
                                        </td>
                                        <td>{{ $education->collage_name }}</td>
                                        <td>{{ Str::limit($education->description, 150, '...') }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm edit-btn"
                                                data-href="{{ route('admin.editEducation', $education->id) }}">
                                                <i class="fas fa-edit me-1 fs-5"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.deleteEducation', $education->id) }}"
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
    <script>
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
