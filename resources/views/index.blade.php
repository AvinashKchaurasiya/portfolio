@extends('layout.portfolio')

@section('content')
    @php
        $fullName = $personalInfo->name ?? 'Avinash Kumar';
        $nameParts = preg_split('/\s+/', trim($fullName), 2, PREG_SPLIT_NO_EMPTY);
        $firstName = $nameParts[0] ?? 'Avinash';
        $lastName = $nameParts[1] ?? 'Kumar';

        $birthdate = \Carbon\Carbon::createFromDate(2001, 8, 10);
        $age = $birthdate->age;

        preg_match('/(\d+)/', $experienceData['totalExp'] ?? '', $expYearsMatch);
        $heroYears = isset($expYearsMatch[1]) ? max(1, (int) $expYearsMatch[1]) : 5;

        $companyJobs = isset($experiences)
            ? $experiences->filter(function ($e) {
                return strtolower((string) $e->company) !== 'na';
            })
            : collect();
        $companyCount = $companyJobs->count();

        $resumeUrl = !empty($personalInfo->resume)
            ? asset($personalInfo->resume)
            : asset('admin/resumes/Avinash-Kumar-Web-Developer.pdf');

        $profileImg = !empty($personalInfo->image)
            ? asset($personalInfo->image)
            : asset('assets/img/about-logo.png');

        $dotStyles = [
            '',
            'background:var(--blue);box-shadow:0 0 12px var(--blue)',
            'background:var(--purple);box-shadow:0 0 12px var(--purple)',
            'background:var(--muted);box-shadow:0 0 12px rgba(136,146,164,0.5)',
        ];
    @endphp

    @include('layout.partials.portfolio-chrome', ['resumeUrl' => $resumeUrl])

    <section id="hero">
        <div class="container hero-shell">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Available for opportunities
            </div>
            <div class="hero-name">
                <span>{{ $firstName }}</span>
                <span>{{ $lastName }}</span>
            </div>
            <div class="hero-role">
                &gt; <span id="typed-text"></span><span class="cursor-blink"></span>
            </div>
            <p class="hero-desc">
                PHP &amp; Laravel specialist building
                <strong>scalable web applications</strong>, RESTful APIs, and ERP
                systems. {{ $heroYears }}+ years of turning complex problems into elegant digital
                solutions.
            </p>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-num">{{ $heroYears }}+</div>
                    <div class="stat-label">Years Exp.</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">{{ max(1, $companyCount) }}+</div>
                    <div class="stat-label">Companies</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">{{ isset($skills) ? count($skills) : 0 }}+</div>
                    <div class="stat-label">Skills</div>
                </div>
                <div class="stat-item">
                    <div class="stat-num">∞</div>
                    <div class="stat-label">Coffee ☕</div>
                </div>
            </div>
            <div class="hero-btns">
                <a href="#portfolio" class="btn-primary">View My Work</a>
                <a href="#contact" class="btn-ghost">Get In Touch</a>
            </div>
        </div>

        <div class="hero-3d-card">
            <div class="code-card">
                <div class="code-header">
                    <div class="dot r"></div>
                    <div class="dot y"></div>
                    <div class="dot g"></div>
                    <span class="code-file">ApiController.php</span>
                </div>
                <div class="code-body">
                    <div><span class="ln">01</span><span class="cm">// Government API — RV Solutions</span></div>
                    <div><span class="ln">02</span><span class="kw">class </span><span class="cn">ApiController</span>
                    </div>
                    <div><span class="ln">03</span><span class="op">{</span></div>
                    <div><span class="ln">04</span>&nbsp;&nbsp;<span class="kw">public function </span><span
                            class="fn">store</span><span class="op">(</span><span class="cn">Request</span> <span
                            class="op">$req)</span></div>
                    <div><span class="ln">05</span>&nbsp;&nbsp;<span class="op">{</span></div>
                    <div><span class="ln">06</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">$req-&gt;</span><span
                            class="fn">validate</span><span class="op">([</span></div>
                    <div><span class="ln">07</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                            class="str">'data'</span> <span class="op">=&gt;</span> <span
                            class="str">'required|json'</span></div>
                    <div><span class="ln">08</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">]);</span></div>
                    <div><span class="ln">09</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="kw">return </span><span
                            class="cn">Response</span><span class="op">::</span><span class="fn">success</span><span
                            class="op">();</span></div>
                    <div><span class="ln">10</span>&nbsp;&nbsp;<span class="op">}</span></div>
                    <div><span class="ln">11</span><span class="op">}</span></div>
                </div>
            </div>
        </div>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section id="about">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 01. about_me</span>
            <h2 class="section-title">Who Am <span>I?</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="about-grid">
            <div class="about-avatar fade-in">
                <div style="position:relative;display:inline-block">
                    <div class="avatar-border"></div>
                    <div class="avatar-frame">
                        <img src="{{ $profileImg }}" alt="{{ $fullName }}" class="avatar-img" width="320"
                            height="380">
                        <div class="avatar-overlay"></div>
                        <div class="avatar-overlay2"></div>
                        <div class="avatar-scan"></div>
                        <div class="avatar-scanline"></div>
                        <div class="corner tl"></div>
                        <div class="corner tr"></div>
                        <div class="corner bl"></div>
                        <div class="corner br"></div>
                    </div>
                </div>
                <div class="about-info-grid">
                    <div class="info-item">
                        <div class="info-label">Location</div>
                        <div class="info-value">{{ $personalInfo->location ?? 'Noida' }}, India</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Age</div>
                        <div class="info-value">{{ $age }} years</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Birthday</div>
                        <div class="info-value">10 Aug 2001</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Degree</div>
                        <div class="info-value">{{ $latestEducation->cource ?? 'B.Tech' }}
                            ({{ $latestEducation->specialization ?? 'CSE' }})</div>
                    </div>
                    <div class="info-item" style="grid-column:span 2">
                        <div class="info-label">Email</div>
                        <div class="info-value" style="font-size:0.82rem">
                            {{ $personalInfo->email ?? 'avinashchaurasiya@zohomail.in' }}</div>
                    </div>
                </div>
            </div>
            <div class="fade-up">
                <p class="about-text">
                    I'm a passionate <strong>Full-Stack Web Developer</strong> with
                    <strong>{{ $experienceData['totalExp'] ?? '5+ years' }} of hands-on experience</strong> building web
                    applications that scale. My journey started in 2021 with freelance
                    projects — real estate portals, transport websites, corporate
                    profiles — and has grown into developing
                    <strong>government-grade REST APIs</strong> at RV Solutions.
                </p>
                <p class="about-text">
                    My stack revolves around <strong>PHP &amp; Laravel</strong> on the
                    backend, with solid frontend skills in
                    <strong>JavaScript, jQuery, and Bootstrap</strong>. I write clean,
                    maintainable code with a strong focus on
                    <strong>security, performance, and scalability</strong>.
                </p>
                <p class="about-text">
                    Whether it's architecting an ERP system from scratch or optimizing a
                    slow API endpoint, I bring both
                    <strong>creative problem-solving</strong> and
                    <strong>engineering discipline</strong> to every challenge.
                </p>
                <div class="freelance-badge">
                    <span class="badge-dot" style="width:6px;height:6px"></span>
                    Open to Full-Time Roles &amp; Freelance
                </div>
            </div>
        </div>
        </div>
    </section>

    <section id="skills">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 02. tech_stack</span>
            <h2 class="section-title">Skills &amp; <span>Technologies</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="skills-grid">
            @forelse ($skills ?? [] as $skill)
                <div class="skill-card fade-up">
                    <div class="skill-icon">
                        <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}">
                    </div>
                    <div class="skill-name">{{ $skill->name }}</div>
                </div>
            @empty
                <p class="about-text" style="grid-column:1/-1">No skills added yet.</p>
            @endforelse
        </div>
        </div>
    </section>

    <section id="experience">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 03. work_experience</span>
            <h2 class="section-title">Career <span>Journey</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="timeline">
            @forelse ($experiences ?? [] as $experience)
                @php
                    $dotStyle = $dotStyles[$loop->index % count($dotStyles)];
                    $isCurrent = !empty($experience->currently_working);
                    $fromLabel = \Carbon\Carbon::parse($experience->from_date)->format('M Y');
                    $toLabel = $isCurrent
                        ? 'Present'
                        : ($experience->to_date
                            ? \Carbon\Carbon::parse($experience->to_date)->format('M Y')
                            : 'Present');
                    $isFreelance = strtolower((string) $experience->company) === 'na';
                    $companyLine = $isFreelance
                        ? '💻 Remote — Self Employed'
                        : '🏢 ' . $experience->company . ($experience->location ? ' — ' . $experience->location : '');
                @endphp
                <div class="timeline-item fade-up">
                    <div class="timeline-dot" @if ($dotStyle) style="{{ $dotStyle }}" @endif></div>
                    <div class="tl-header">
                        <div>
                            <div class="tl-role">{{ $experience->title }}</div>
                            <div class="tl-company">{{ $companyLine }}</div>
                        </div>
                        <div style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center">
                            @if ($isCurrent)
                                <span class="tl-current">● Current</span>
                            @endif
                            <span class="tl-date">{{ $fromLabel }} – {{ $toLabel }}</span>
                        </div>
                    </div>
                    <div class="tl-desc">{!! $experience->description !!}</div>
                </div>
            @empty
                <p class="about-text">No experience entries yet.</p>
            @endforelse
        </div>
        </div>
    </section>

    <section id="education">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 04. education</span>
            <h2 class="section-title">Academic <span>Background</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="edu-grid">
            @forelse ($educations ?? [] as $education)
                <div class="edu-card fade-up">
                    <div class="edu-year">
                        {{ \Carbon\Carbon::parse($education->from_date)->format('Y') }} –
                        {{ $education->to_date ? \Carbon\Carbon::parse($education->to_date)->format('Y') : 'Present' }}
                    </div>
                    <div class="edu-degree">{{ $education->cource }} —
                        {{ $education->specialization }}</div>
                    <div class="edu-inst">{{ $education->collage_name ?? '' }}</div>
                    @if (!empty($education->description))
                        <div class="edu-projects" style="margin-bottom:1rem;font-size:0.85rem;color:var(--muted)">
                            {!! $education->description !!}</div>
                    @endif
                    <div class="edu-projects">
                        @if (!empty($education->mini_project))
                            <div class="edu-proj"><strong>Mini Project:</strong> {{ $education->mini_project }}</div>
                        @endif
                        @if (!empty($education->major_project))
                            <div class="edu-proj"><strong>Major Project:</strong> {{ $education->major_project }}</div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="about-text">No education records yet.</p>
            @endforelse
        </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 05. portfolio</span>
            <h2 class="section-title">Featured <span>Projects</span></h2>
            <div class="section-line"></div>
        </div>
        @if (isset($projects) && count($projects) > 0)
            <div class="portfolio-filter fade-up">
                <button type="button" class="filter-btn active" data-filter="all">All</button>
                @foreach ($services ?? [] as $svc)
                    <button type="button" class="filter-btn"
                        data-filter="{{ \Illuminate\Support\Str::slug($svc->title) }}">{{ $svc->title }}</button>
                @endforeach
            </div>
            <div class="projects-grid">
                @foreach ($projects as $project)
                    @php
                        $svcTitle = optional($project->service)->title;
                        $filterSlug = $svcTitle ? \Illuminate\Support\Str::slug($svcTitle) : 'general';
                    @endphp
                    <a href="{{ route('projectDetails', ['ref' => \App\Support\ProjectRef::encode($project->id)]) }}"
                        class="project-card fade-up"
                        data-category="{{ $filterSlug }}">
                        @if (!empty($project->thumbnail))
                            <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->project_name }}"
                                class="project-img" loading="lazy">
                            <div class="project-overlay"></div>
                        @else
                            <div
                                style="height:180px;display:flex;align-items:center;justify-content:center;border-bottom:1px solid var(--glass-border);background:linear-gradient(135deg,var(--dark3),rgba(0,245,212,0.04))">
                                <div style="text-align:center;color:var(--muted)">
                                    <div style="font-size:2.5rem;margin-bottom:0.5rem">📁</div>
                                    <div style="font-family:'JetBrains Mono',monospace;font-size:0.75rem">Project</div>
                                </div>
                            </div>
                        @endif
                        <div class="project-body">
                            <div class="project-title">{{ $project->project_name }}</div>
                            <div class="project-desc">{{ \Illuminate\Support\Str::limit(strip_tags($project->description ?? ''), 160) }}
                            </div>
                            @if ($svcTitle)
                                <span class="project-type">{{ $svcTitle }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="about-text fade-up">No projects available yet.</p>
        @endif
        </div>
    </section>

    <section id="services">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 06. what_i_do</span>
            <h2 class="section-title">Services I <span>Offer</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="services-grid">
            @forelse ($services ?? [] as $service)
                <div class="service-card fade-up">
                    <div class="service-icon">
                        <img src="{{ asset($service->icon) }}" alt="">
                    </div>
                    <div class="service-title">{{ $service->title }}</div>
                    <div class="service-desc">{{ $service->description }}</div>
                </div>
            @empty
                <p class="about-text" style="grid-column:1/-1">No services listed yet.</p>
            @endforelse
        </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
        <div class="section-header fade-up">
            <span class="section-tag">// 07. contact_me</span>
            <h2 class="section-title">Let's <span>Connect</span></h2>
            <div class="section-line"></div>
        </div>
        <div class="contact-grid">
            <div class="fade-up">
                <p style="color:var(--muted);font-size:1rem;line-height:1.8;margin-bottom:0.5rem">
                    Got a project in mind, a role to fill, or just want to say hi? I'm
                    always open to interesting conversations and exciting opportunities.
                </p>
                <div class="contact-info-list">
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-text">
                            <p>Location</p>
                            <p>{{ $personalInfo->location ?? 'Noida' }}, Uttar Pradesh, India</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-text">
                            <p>Phone</p>
                            <p>{{ $personalInfo->mobile ?? '+91 8650163913' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-text">
                            <p>Email</p>
                            <p>{{ $personalInfo->email ?? 'avinashchaurasiya@zohomail.in' }}</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">🌐</div>
                        <div class="contact-text">
                            <p>Website</p>
                            <p>
                                <a href="{{ !empty($personalInfo->website) ? (\Illuminate\Support\Str::startsWith($personalInfo->website, ['http://', 'https://']) ? $personalInfo->website : 'https://' . ltrim($personalInfo->website, '/')) : 'https://z1iinnovation.com' }}"
                                    style="color:var(--cyan);text-decoration:none" target="_blank"
                                    rel="noopener">{{ $personalInfo->website ?? 'z1iinnovation.com' }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form fade-up">
                <form action="{{ route('contactFormSave') }}" method="post" id="php-email-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pf-name">Your Name</label>
                            <input id="pf-name" type="text" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="pf-email">Your Email</label>
                            <input id="pf-email" type="email" name="email" placeholder="john@company.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pf-phone">Phone</label>
                            <input id="pf-phone" type="tel" name="phone" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="form-group">
                            <label for="pf-subject">Subject</label>
                            <input id="pf-subject" type="text" name="subject" placeholder="Project Discussion" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pf-message">Message</label>
                        <textarea id="pf-message" name="message" placeholder="Tell me about your project, role, or idea..."
                            required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message →</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div class="container">
        <p style="margin-bottom:0.5rem">
            <span style="font-size:1.1rem">⌨️</span> &nbsp; Designed &amp;
            Developed by
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">{{ $fullName }}</a> &nbsp;|&nbsp;
            <a href="https://z1iinnovation.com" target="_blank" rel="noopener">Z1i Innovations</a>
        </p>
        <p style="margin-top:0.4rem;opacity:0.5">© {{ date('Y') }} All Rights Reserved</p>
        </div>
    </footer>
@endsection
