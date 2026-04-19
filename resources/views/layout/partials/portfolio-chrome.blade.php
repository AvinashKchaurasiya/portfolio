@php
    $chromeResume = $resumeUrl ?? asset('admin/resumes/Avinash-Kumar-Web-Developer.pdf');
    $h = route('home');
@endphp
<div id="cursor"></div>
<div id="cursor-trail"></div>
<canvas id="bg-canvas"></canvas>

<nav>
    <div class="container nav-inner">
        <a href="{{ $h }}" class="nav-logo" style="text-decoration:none">AK</a>
        <ul class="nav-links">
            <li><a href="{{ $h }}#hero">Home</a></li>
            <li><a href="{{ $h }}#about">About</a></li>
            <li><a href="{{ $h }}#skills">Skills</a></li>
            <li><a href="{{ $h }}#experience">Experience</a></li>
            <li><a href="{{ $h }}#education">Education</a></li>
            <li><a href="{{ $h }}#portfolio">Portfolio</a></li>
            <li><a href="{{ $h }}#services">Services</a></li>
            <li><a href="{{ $h }}#contact">Contact</a></li>
        </ul>
        <a href="{{ $chromeResume }}" class="nav-cta" target="_blank" rel="noopener">Resume ↗</a>
    </div>
</nav>
