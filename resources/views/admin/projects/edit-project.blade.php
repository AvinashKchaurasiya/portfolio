@extends('admin.layouts.baseLayout')
@section('content')
    <style>
        .blur-background {
            filter: blur(3px);
            pointer-events: none;
        }
    </style>
    <div id="mainContent" class="main">
        <h3 class="mb-2">Edit Project</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Project Form</h5>
                        <a href="{{ route('admin.projects') }}" class="btn btn-primary">
                            Cancel
                        </a>
                    </div>
                    <div class="card shadow-sm">
                        <form action="{{ route('admin.updateProject', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- Project Name --}}
                                <div class="form-outline mb-4">
                                    <input type="text" id="projectName" name="name" class="form-control"
                                        value="{{ old('name', $project->project_name) }}" required />
                                    <label class="form-label" for="projectName">Project Name</label>
                                </div>

                                {{-- Project URL --}}
                                <div class="form-outline mb-4">
                                    <input type="url" id="projectUrl" name="url" class="form-control"
                                        value="{{ old('url', $project->url) }}" />
                                    <label class="form-label" for="projectUrl">Project URL (Optional)</label>
                                </div>

                                {{-- Category --}}
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="category">Category</label>
                                    <select id="category" name="category" class="form-select" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach ($services as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category', $project->service_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Technologies --}}
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="technologies">Technologies</label>
                                    <select id="technologies" name="technologies[]" class="form-select select2" multiple
                                        required>
                                        @foreach ($technologies as $technology)
                                            <option value="{{ $technology->name }}"
                                                @php
$selectedTechnologies = old('technologies');
                                                    if (is_null($selectedTechnologies)) {
                                                        if (is_iterable($project->technology)) {
                                                            $selectedTechnologies = [];
                                                            foreach ($project->technology as $tech) {
                                                                $selectedTechnologies[] = is_object($tech) ? $tech->name : $tech;
                                                            }
                                                        } elseif (is_string($project->technology)) {
                                                            $selectedTechnologies = array_map('trim', explode(',', $project->technology));
                                                        } else {
                                                            $selectedTechnologies = [];
                                                        }
                                                    } @endphp
                                                @if (in_array($technology->name, $selectedTechnologies)) selected @endif>
                                                {{ $technology->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Select2 CSS -->
                                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                    rel="stylesheet" />
                                <!-- Select2 JS -->
                                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        $('#technologies').select2({
                                            placeholder: "Select Technology",
                                            allowClear: true,
                                            width: '100%'
                                        });
                                    });
                                </script>

                                {{-- Description --}}
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $project->description) }}</textarea>
                                    <label class="form-label" for="description">Description</label>
                                </div>
                                <div class="form-outline mb-2">
                                    <img id="iconPreview"
                                        src="{{ $project->thumbnail ? asset($project->thumbnail) : URL::asset('admin/images/image_preview.png') }}"
                                        class="img-thumbnail" style="width: 80px; height: 80px; object-fit: contain;" />
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="file" id="iconInput" name="icon" accept="image/*" hidden
                                        onchange="previewIcon(event)" />
                                    <label for="iconInput" class="btn btn-outline-primary btn-sm mt-2">
                                        <i class="fas fa-upload me-1"></i> Upload Icon
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Update Project</button>
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
                height: 300,
                menubar: true,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount',
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | removeformat | code fullscreen preview',
                branding: false,
                image_advtab: true,
                paste_as_text: true
            });
        }

        // Initialize when page loads
        document.addEventListener("DOMContentLoaded", function() {
            initTinyMCE();
        });
    </script>
@endsection
