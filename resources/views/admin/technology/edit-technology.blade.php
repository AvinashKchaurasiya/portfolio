@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Edit Technology</h3>
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Technology</h5>
                    </div>
                    <form action="{{ route('admin.updateTechnology', $technology->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-outline mb-4">
                                <input type="text" id="techName" name="name" class="form-control"
                                    value="{{ $technology->name }}" required />
                                <label class="form-label" for="techName">Technology Name</label>
                            </div>
                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="techDesc" name="description" rows="3" required>{{ $technology->description }}</textarea>
                                <label class="form-label" for="techDesc">Description</label>
                            </div>
                            <div class="form-outline mb-2">
                                <img id="iconPreview" src="{{ URL::asset($technology->icon) }}" class="img-thumbnail"
                                    style="width: 80px; height: 80px; object-fit: contain;" />
                            </div>
                            <div class="form-outline mb-4">
                                <input type="file" id="iconInput" name="icon" accept="image/*" hidden
                                    onchange="previewIcon(event)" />
                                <label for="iconInput" class="btn btn-outline-primary btn-sm mt-2">
                                    <i class="fas fa-upload me-1"></i> Upload Icon
                                </label>
                            </div>
                            <div class="form-outline mb-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Update Technology
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    </script>
@endsection
