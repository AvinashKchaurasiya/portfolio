<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        <img src="{{ URL::asset('assets/img/about-logo.png') }}" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">Avinash Kumar</h1>
    </a>

    <div class="social-links text-center">
        <a href="{{ $personalInfo->linkedin_url ?? 'https://www.linkedin.com/in/avinash-kumar-websitedevelopmentexpert/' }}"
            class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
            <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
            <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
    </nav>

</header>
