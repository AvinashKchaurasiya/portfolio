@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Profile Details</h3>

        <div class="row g-4">
            <!-- Left Side: Profile Image and Upload Button -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img id="profileImagePreview"
                            src="{{ $profile && $profile->image ? URL::asset($profile->image) : URL::asset('admin/images/image_preview.png') }}"
                            alt="Profile Image" class="img-fluid rounded-circle mb-3 shadow"
                            style="width: 150px; height: 150px; object-fit: contain; background: #f8f9fa;" />
                        <form id="profileImageForm" action="{{ route('admin.saveProfileImage') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button type="button" class="btn btn-primary btn-sm mb-2"
                                onclick="document.getElementById('profileImageInput').click();">Upload Image</button>
                            <input type="file" id="profileImageInput" name="profile_image" class="form-control d-none"
                                accept="image/*" required>
                        </form>
                    </div>
                    <script>
                        document.getElementById('profileImageInput').addEventListener('change', function(e) {
                            const file = e.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(event) {
                                    document.getElementById('profileImagePreview').src = event.target.result;
                                    setTimeout(() => {
                                        document.getElementById('profileImageForm').submit();
                                    }, 500);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
                </div>
            </div>

            <!-- Right Side: Tabs for Details and Resume -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <ul class="nav nav-tabs md-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="details-tab" data-mdb-toggle="tab" href="#details"
                                    role="tab" aria-controls="details" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="link-tab" data-mdb-toggle="tab" href="#link" role="tab"
                                    aria-controls="resume" aria-selected="false">Links</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="resume-tab" data-mdb-toggle="tab" href="#resume" role="tab"
                                    aria-controls="resume" aria-selected="false">Resume</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Details Tab -->
                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="details-tab">
                                {{-- @if ($profile) --}}
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <p><strong>Name:</strong> <span id="profileName">{{ $profile->name ?? '' }}</span>
                                        </p>
                                        <p><strong>Email:</strong> <span
                                                id="profileEmail">{{ $profile->email ?? '' }}</span>
                                        </p>
                                        <p><strong>Phone:</strong> <span
                                                id="profilePhone">{{ $profile->mobile ?? '' }}</span>
                                        </p>
                                        <p><strong>Address:</strong> <span
                                                id="profileLocation">{{ $profile->location ?? '' }}</span></p>
                                        <p><strong>Bio:</strong> <span id="profileBio">{{ $profile->bio ?? '' }}</span></p>
                                    </div>
                                    <button id="editProfileBtn" class="btn btn-link p-0" style="font-size:1.3rem;"
                                        title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </div>
                                <form id="editProfileForm"
                                    action="{{ route('admin.saveProfileDetails', $profile->id ?? '') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Name:</strong></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $profile->name ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Email:</strong></label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $profile->email ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Phone:</strong></label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $profile->mobile ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Address:</strong></label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ $profile->location ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Bio:</strong></label>
                                        <textarea name="bio" class="form-control" rows="3">{{ $profile->bio ?? '' }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <button type="button" id="cancelEditBtn"
                                        class="btn btn-secondary btn-sm">Cancel</button>
                                </form>
                                <script>
                                    document.getElementById('editProfileBtn').addEventListener('click', function() {
                                        document.getElementById('editProfileForm').classList.remove('d-none');
                                        this.closest('.d-flex').classList.add('d-none');
                                    });
                                    document.getElementById('cancelEditBtn').addEventListener('click', function() {
                                        document.getElementById('editProfileForm').classList.add('d-none');
                                        document.querySelector('.tab-pane .d-flex').classList.remove('d-none');
                                    });
                                </script>
                                {{-- @else
                                    <p>No profile data available.</p>
                                @endif --}}
                            </div>
                            <!-- Links Tab -->
                            <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <p><strong>LinkedIn:</strong>
                                            <span id="profileLinkedin">
                                                @if (!empty($profile->linkedin_url))
                                                    <a href="{{ $profile->linkedin_url }}"
                                                        target="_blank">{{ $profile->linkedin_url }}</a>
                                                @endif
                                            </span>
                                        </p>
                                        <p><strong>Website:</strong>
                                            <span id="profileWebsite">
                                                @if (!empty($profile->website))
                                                    <a href="{{ $profile->website }}"
                                                        target="_blank">{{ $profile->website }}</a>
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                    <button id="editLinksBtn" class="btn btn-link p-0" style="font-size:1.3rem;"
                                        title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </div>
                                <form id="editLinksForm"
                                    action="{{ route('admin.saveProfileSocialLinks', $profile->id ?? '') }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label class="form-label"><strong>LinkedIn:</strong></label>
                                        <input type="url" name="linkedin_url" class="form-control"
                                            value="{{ $profile->linkedin_url ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Website:</strong></label>
                                        <input type="url" name="website" class="form-control"
                                            value="{{ $profile->website ?? '' }}">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <button type="button" id="cancelEditLinksBtn"
                                        class="btn btn-secondary btn-sm">Cancel</button>
                                </form>
                                <script>
                                    document.getElementById('editLinksBtn').addEventListener('click', function() {
                                        document.getElementById('editLinksForm').classList.remove('d-none');
                                        this.closest('.d-flex').classList.add('d-none');
                                    });
                                    document.getElementById('cancelEditLinksBtn').addEventListener('click', function() {
                                        document.getElementById('editLinksForm').classList.add('d-none');
                                        document.querySelector('#link .d-flex').classList.remove('d-none');
                                    });
                                </script>
                            </div>
                            <!-- Resume Tab -->
                            <div class="tab-pane fade" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                                <form id="resumeUploadForm"
                                    action="{{ route('admin.saveProfileResume', $profile->id ?? '') }}" method="POST"
                                    enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label class="form-label"><strong>Upload Resume (PDF):</strong></label>
                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                            onclick="document.getElementById('resumeInput').click();">
                                            Select PDF
                                        </button>
                                        <input type="file" id="resumeInput" name="resume"
                                            class="form-control d-none" accept="application/pdf">
                                    </div>
                                    <div id="resumePreview" class="mt-2" style="display:none;">
                                        <iframe id="resumeIframe" style="width:100%;height:400px;"
                                            frameborder="0"></iframe>
                                    </div>
                                    <script>
                                        document.getElementById('resumeInput').addEventListener('change', function(e) {
                                            const file = e.target.files[0];
                                            if (file && file.type === "application/pdf") {
                                                const reader = new FileReader();
                                                reader.onload = function(event) {
                                                    document.getElementById('resumePreview').style.display = 'block';
                                                    document.getElementById('resumeIframe').src = event.target.result;
                                                };
                                                reader.readAsDataURL(file);
                                            } else {
                                                document.getElementById('resumePreview').style.display = 'none';
                                                document.getElementById('resumeIframe').src = '';
                                            }
                                        });
                                    </script>
                                    <button type="submit" class="btn btn-primary btn-sm">Upload Resume</button>
                                </form>

                                @if (!empty($profile->resume))
                                    <a href="{{ $profile->resume }}" target="_blank"
                                        class="btn btn-outline-secondary mb-2">View Resume</a>
                                    <iframe src="{{ URL::asset($profile->resume) }}" style="width:100%;height:400px;"
                                        frameborder="0"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
