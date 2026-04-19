@extends('layout.portfolio')

@section('content')
    @php
        $svcTitle = optional($project->service)->title;
        $thumb = $project->thumbnail ?? '';
        $extUrl = trim((string) ($project->url ?? ''));
    @endphp

    @include('layout.partials.portfolio-chrome')

    <div class="pf-inner fade-up">
        <div class="container">
        <a href="{{ route('home') }}#portfolio" class="pf-back">← Back to portfolio</a>

        <div class="pf-panel">
            <div class="pf-proj-grid">
                <div class="pf-proj-media fade-in">
                    @if ($thumb !== '')
                        <img class="pf-proj-img" src="{{ asset($thumb) }}" alt="{{ $project->project_name }}"
                            loading="lazy">
                    @else
                        <div class="pf-proj-img"
                            style="display:flex;align-items:center;justify-content:center;background:var(--dark2);color:var(--muted);font-family:'JetBrains Mono',monospace;font-size:0.85rem">
                            No preview</div>
                    @endif
                </div>
                <div>
                    <h1 class="pf-proj-title">{{ $project->project_name }}</h1>
                    <div class="pf-proj-meta">
                        @if ($svcTitle)
                            <span style="color:var(--cyan)">{{ $svcTitle }}</span>
                            <span style="opacity:0.5;margin:0 0.35rem">·</span>
                        @endif
                        @if ($extUrl !== '')
                            <a href="{{ $extUrl }}" target="_blank" rel="noopener noreferrer">{{ $extUrl }}</a>
                        @endif
                    </div>
                    <div class="pf-proj-body">
                        {!! $project->description !!}
                    </div>
                    @if (!empty($project->technology))
                        <div class="pf-tech">Technology — {{ $project->technology }}</div>
                    @endif
                </div>
            </div>

            <div class="pf-actions">
                <a href="{{ route('home') }}#portfolio" class="btn-primary">All projects</a>
                @if ($extUrl !== '')
                    <a href="{{ $extUrl }}" class="btn-ghost" target="_blank" rel="noopener noreferrer">Live site ↗</a>
                @endif
            </div>
        </div>
        </div>
    </div>

    <footer>
        <div class="container">
        <p style="margin-bottom:0.5rem">
            <span style="font-size:1.1rem">⌨️</span> &nbsp; Designed &amp; Developed by
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">Avinash Kumar</a> &nbsp;|&nbsp;
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">Z1i Innovations</a>
        </p>
        <p style="margin-top:0.4rem;opacity:0.5">© {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>
@endsection
