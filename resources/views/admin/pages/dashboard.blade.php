@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Welcome, {{ Auth::user()->name }} 👋</h3>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card-summary">
                    <span class="material-icons">folder</span>
                    <h5>Projects</h5>
                    <p><strong>12 Active</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary">
                    <span class="material-icons">work_history</span>
                    <h5>Experince</h5>
                    <p><strong>{{ $experienceData['totalExp'] }}</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-summary">
                    <span class="material-icons">supervisor_account</span>
                    <h5>Clients</h5>
                    <p><strong>{{ $totalClients }}+</strong></p>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="card-summary">
                    <span class="material-icons">event_busy</span>
                    <h5>Leaves</h5>
                    <p>3 Pending</p>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
