@extends('layout.baseApp')
@section('content')
    <main class="main">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4 p-5">
                                <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->project_name }}" class="img-fluid rounded-start" title="{{ $project->project_name }}" style="width:250px; height: 250px;" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->project_name }} - {{ $project->service->title }}</h5>
                                    @if($project->url != '')
                                        <a href="{{ $project->url  }}" style="text-decoration: none;">{{ $project->url }}</a>
                                    @endif
                                    <hr/>
                                    <p class="card-text">{!! $project->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Technology Used - {{ $project->technology }}</p>
                            <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
