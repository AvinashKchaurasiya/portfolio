@extends('layout.baseApp')
@section('content')
    <main class="main">
        <section id="hero" class="hero section dark-background">

            <img src="{{ URL::asset('assets/img/hero-bg.png') }}" alt="" data-aos="fade-in" class="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ $personalInfo->name ?? 'Avinash Kumar' }}</h2>
                <p class="mb-2">
                    I'm <span class="typed" data-typed-items="Website Designer, Website Developer">Website Developer</span>
                    <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                </p>
                <div class="mt-4">
                    <a href="{{ $personalInfo->resume ? URL::asset($personalInfo->resume) : URL::asset('assets/resume/Avinash-Kumar-Web Developer.pdf') }}"
                        target="_blank" class="btn btn-outline-light me-2">
                        <i class="bi bi-box-arrow-up-right me-1"></i> View Resume
                    </a>
                    <a href="#contact" class="btn btn-outline-light">
                        <i class="bi bi-envelope me-1"></i> Contact Me
                    </a>
                </div>
            </div>
        </section>


        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>
                    I am a passionate <strong>Web Developer and Designer</strong> with a strong foundation in both frontend
                    and backend technologies. With a keen eye for detail and a creative mindset, I craft visually appealing,
                    user-friendly, and fully responsive websites that not only look great but also perform seamlessly.
                </p>
                <p>
                    From designing elegant frontend structures to developing dynamic web applications, I specialize in
                    turning ideas into real digital experiences. I have hands-on experience in technologies like
                    <strong>HTML, CSS, JavaScript, jQuery, PHP, Laravel, MySQL</strong>, and popular frameworks.
                </p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4">
                        <img src="{{ $personalInfo->image ? URL::asset($personalInfo->image) : URL::asset('assets/img/about-logo.png') }}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 content">
                        <h2>Web Developer.</h2>
                        <p class="fst-italic py-3">
                            I'm a passionate and results-driven <strong>Web Developer</strong> with over
                            <strong>{{ $experienceData['totalExp'] }} of experience</strong>, including
                            <strong>{{ $experienceData['freelanceExp'] }} of freelancing</strong> and
                            <strong>{{ $experienceData['companyExp'] }} of corporate experience</strong>.
                            I enjoy transforming ideas into real, functional, and scalable web applications.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>10 Aug
                                            2001</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <a href="{{ $personalInfo->website ? URL::asset($personalInfo->website) : 'https://www.z1iinnovation.com' }}"
                                            target="_blank">{{ $personalInfo->website ?? 'www.z1iinnovation.com' }}</a>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                        <span>{{ $personalInfo->mobile ?? '+91-8650163913' }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>
                                        <span>{{ $personalInfo->location ?? 'Delhi' }}, India</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    @php
                                        use Carbon\Carbon;
                                        $birthdate = Carbon::createFromDate(2001, 8, 10);
                                        $age = $birthdate->age;
                                    @endphp

                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $age }}
                                            years</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                        <span>{{ $latestEducation->cource ?? 'B.Tech' }} -
                                            ({{ $latestEducation->specialization ?? 'Computer Science & Engineering' }})</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span>{{ $personalInfo->email ?? 'avinash8564kumar@gmail.com' }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span>Available</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="py-3">
                            I have developed a wide range of web solutions including ERP systems, e-commerce platforms,
                            transport company websites, real estate listing portals, and IT company profiles. I specialize
                            in <strong>HTML, CSS, JavaScript, jQuery, PHP, Laravel, MySQL</strong> and believe in writing
                            clean, optimized, and scalable code. My focus is always on building reliable, secure, and
                            user-friendly web experiences.
                        </p>
                    </div>

                </div>

            </div>

        </section>
        <section id="stats" class="stats section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalClients }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Happy Clients</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Projects</strong></p>
                        </div>
                    </div>

                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                        </div>
                    </div> --}}

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hard Workers</strong></p>
                        </div>
                    </div>

                </div>

            </div>

        </section>


        <section id="skills" class="skills section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Skills</h2>
                <p>I have hands-on experience in both frontend and backend development. Below are the technologies I work
                    with regularly:</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row skills-content skills-animation">
                    @if (isset($skills) && count($skills) > 0)
                        @foreach ($skills as $skill)
                            <div class="col-md-2 col-sm-6 mb-4">
                                <div class="card skill-card shadow h-100">
                                    <div class="card-body">
                                        <div class="skill-icon mb-3 text-center">
                                            <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}"
                                                class="img-fluid" style="width: 60px; height: 60px;">
                                        </div>
                                        <h5 class="card-title text-center">{{ $skill->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>No skills found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section id="resume" class="resume section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Resume</h2>
                <p>A passionate and experienced PHP Laravel Web Developer with a strong background in backend and frontend
                    development, specialized in crafting efficient, scalable, and SEO-friendly web applications.</p>
            </div>
            <div class="container">
                <div class="row">
                    <!-- Summary & Education -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Summary</h3>
                        <div class="resume-item pb-0">
                            <h4>Avinash Kumar</h4>
                            <p><em>Motivated PHP and Laravel Developer with
                                    <strong>{{ $experienceData['totalExp'] }}</strong> of
                                    experience
                                    (including freelance),
                                    focused on delivering robust and maintainable web applications. Skilled in backend
                                    development, debugging, third-party integration, and team collaboration.</em></p>
                            <ul>
                                <li>{{ $personalInfo->location ?? 'Delhi' }}, India</li>
                                <li>{{ $personalInfo->mobile ?? '+91-8650163913' }}</li>
                                <li>{{ $personalInfo->email ?? 'avinash8564kumar@gmail.com' }}</li>
                            </ul>
                        </div>

                        <h3 class="resume-title">Education</h3>

                        @if (isset($educations) && count($educations) > 0)
                            @foreach ($educations as $education)
                                <div class="resume-item">
                                    <h4>{{ $education->cource }} -
                                        ({{ $education->specialization }})
                                    </h4>
                                    <h5>
                                        {{ \Carbon\Carbon::parse($education->from_date)->format('Y') }}
                                        –
                                        {{ $education->to_date ? \Carbon\Carbon::parse($education->to_date)->format('Y') : 'Present' }}
                                    </h5>
                                    <p><em>{{ $education->collage_name ?? '' }}</em></p>
                                    <p>{!! $education->description ?? '' !!}</p>
                                    <p><strong>Mini Project:</strong> {{ $education->mini_project }}</p>
                                    <p><strong>Major Project:</strong> {{ $education->major_project }}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="resume-item">
                                <p>No education records found.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Experience -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title">Professional Experience</h3>
                        @if (isset($experiences) && count($experiences) > 0)
                            @foreach ($experiences as $experience)
                                <div class="resume-item">
                                    @if ($experience->company === 'NA')
                                        <h4>{{ $experience->title }}</h4>
                                    @else
                                        <h4>{{ $experience->title }} - {{ $experience->company }}</h4>
                                    @endif
                                    <h5>
                                        {{ \Carbon\Carbon::parse($experience->from_date)->format('M Y') }} –
                                        {{ $experience->to_date ? \Carbon\Carbon::parse($experience->to_date)->format('M Y') : 'Present' }}
                                    </h5>

                                    <p><em>{{ $experience->location }}</em></p>
                                    {!! $experience->description !!}
                                </div>
                            @endforeach
                        @else
                            <div class="resume-item">
                                <p>I am a fresher.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>
                    Explore some of the professional projects I’ve worked on — including custom websites, ERP systems, real
                    estate platforms, and Android applications. Each project showcases my skills in frontend and backend
                    development, user experience, and performance optimization.
                </p>
            </div>
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    @if (isset($projects) && count($projects) > 0)
                        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($services as $service1)
                                @php
                                    $title = $service1->title;
                                    $filterClass = $title ? 'filter-' . strtolower(explode(' ', $title)[0]) : '';
                                @endphp
                                <li data-filter=".{{ $filterClass }}">
                                    {{ $service1->title ?? '' }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">No projects available.</p>
                    @endif
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @if (isset($projects) && count($projects) > 0)
                            @foreach ($projects as $project)
                                @php
                                    $title = optional($project->service)->title;
                                    $filterClass = $title ? 'filter-' . strtolower(explode(' ', $title)[0]) : '';
                                @endphp

                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $filterClass }}">
                                    <div class="portfolio-content h-100">
                                        <div
                                            style="width: 100%; height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9;">
                                            <img src="{{ URL::asset($project->thumbnail) }}" class="img-fluid"
                                                alt="{{ $project->project_name }}"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                        <div class="portfolio-info">
                                            <h4>{{ $project->project_name }}</h4>
                                            <p>{{ $project->project_name }}</p>
                                            <a href="{{ URL::asset($project->thumbnail) }}"
                                                title="{{ $project->project_name }}"
                                                data-gallery="portfolio-gallery-website" class="glightbox preview-link">
                                                <i class="bi bi-zoom-in"></i>
                                            </a>
                                            <a href="{{ route('projectDetails', $project->id) }}" title="More Details"
                                                class="details-link"><i class="bi bi-link-45deg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p>No projects available.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section id="services" class="services section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>I offer professional and reliable digital solutions to help individuals and businesses grow online. Below
                    are the services I specialize in:</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    @if (isset($services) && count($services) > 0)
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                                <!-- Icon image from DB -->
                                <div class="icon flex-shrink-0 me-3">
                                    <img src="{{ URL::asset($service->icon) }}" alt="{{ $service->title }}"
                                        style="width: 35px; height: 35px;">
                                </div>
                                <div>
                                    <!-- Service Title -->
                                    <h4 class="title">
                                        <a href="#" class="stretched-link">{{ $service->title }}</a>
                                    </h4>
                                    <!-- Service Description -->
                                    <p class="description" style="text-align:justify;">{{ $service->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">No services available.</p>
                    @endif
                </div>

            </div>
        </section>

        <section id="testimonials" class="testimonials section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                                },
                                "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 1
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                        rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                        risus at semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="{{ URL::asset('assets/img/testimonials/testimonials-1.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                        malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim
                                        culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="{{ URL::asset('assets/img/testimonials/testimonials-2.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                        veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                        minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="{{ URL::asset('assets/img/testimonials/testimonials-3.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore
                                        illum veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="{{ URL::asset('assets/img/testimonials/testimonials-4.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi
                                        cillum quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <img src="{{ URL::asset('assets/img/testimonials/testimonials-5.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <section id="contact" class="contact section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Have a project in mind or want to collaborate? I'm just a message away — feel free to get in touch!</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <!-- Contact Info -->
                    <div class="col-lg-5">
                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>{{ $personalInfo->location ?? 'Delhi' }}, Uttar Pradesh, India</p>
                                </div>
                            </div>
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Me</h3>
                                    <p>{{ $personalInfo->mobile ?? '+91 8650163913' }}</p>
                                </div>
                            </div>
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Me</h3>
                                    <p>{{ $personalInfo->email ?? 'avinash8564kumar@gmail.com' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-7">
                        <form action="{{ route('contactFormSave') }}" method="post" id="php-email-form"
                            data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field">
                                </div>
                                <div class="col-md-4">
                                    <label for="phone-field" class="pb-2">Your Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone-field">
                                </div>
                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field">
                                </div>
                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="7" id="message-field"></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
