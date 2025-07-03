@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Profile Details</h3>

        <div class="row g-4">
            <!-- Left Side: Profile Image and Upload Button -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ $profile->image_url ?? asset('images/default-profile.png') }}" alt="Profile Image"
                            class="img-fluid rounded mb-3" style="max-height: 250px;">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Side: Tabs for Details and Resume -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details" type="button" role="tab" aria-controls="details"
                                    aria-selected="true">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="resume-tab" data-bs-toggle="tab" data-bs-target="#resume"
                                    type="button" role="tab" aria-controls="resume"
                                    aria-selected="false">Resume</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Details Tab -->
                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="details-tab">
                                <p><strong>Name:</strong> {{ $profile->name }}</p>
                                <p><strong>Email:</strong> {{ $profile->email }}</p>
                                <p><strong>Phone:</strong> {{ $profile->phone }}</p>
                                <p><strong>Address:</strong> {{ $profile->location }}</p>
                                <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                            </div>
                            <!-- Resume Tab -->
                            <div class="tab-pane fade" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                                @if ($profile->resume_url)
                                    <a href="{{ $profile->resume_url }}" target="_blank"
                                        class="btn btn-outline-secondary mb-2">View Resume</a>
                                    <iframe src="{{ $profile->resume_url }}" style="width:100%;height:400px;"
                                        frameborder="0"></iframe>
                                @else
                                    <p>No resume uploaded.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
