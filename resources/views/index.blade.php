@extends('layout.baseApp')
@section('content')
    <main class="main">
        <section id="hero" class="hero section dark-background">

            <img src="{{ URL::asset('assets/img/hero-bg.png') }}" alt="" data-aos="fade-in" class="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <h2>Avinash Kumar</h2>
                <p class="mb-2">
                    I'm <span class="typed" data-typed-items="Website Designer, Website Developer">Website Developer</span>
                    <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                </p>
                <div class="mt-4">
                    <a href="{{ URL::asset('assets/resume/Avinash-Kumar-Web Developer.pdf') }}" target="_blank"
                        class="btn btn-outline-light me-2">
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
                        <img src="{{ URL::asset('assets/img/about-logo.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 content">
                        <h2>Web Developer.</h2>
                        <p class="fst-italic py-3">
                            I'm a passionate and results-driven <strong>Web Developer</strong> with over <strong>4.3 years
                                of experience</strong>, including <strong>3 years of freelancing</strong> and <strong>1.3
                                years of corporate experience</strong>. I enjoy transforming ideas into real, functional,
                            and scalable web applications.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>10 Aug
                                            2001</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <a href="https://z1iinnovation.com/" target="_blank">www.z1iinnovation.com</a>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                        <span>+91-8650163913</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Delhi, India</span>
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
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>B.Tech (Computer
                                            Science & Engineering)</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span>avinash8564kumar@gmail.com</span>
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
                            <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1"
                                class="purecounter"></span>
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
                                            <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}" class="img-fluid"
                                                style="width: 60px; height: 60px;">
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
                            <p><em>Motivated PHP and Laravel Developer with 4.3+ years of experience (including freelance),
                                    focused on delivering robust and maintainable web applications. Skilled in backend
                                    development, debugging, third-party integration, and team collaboration.</em></p>
                            <ul>
                                <li>Noida, India</li>
                                <li>+91-8650163913</li>
                                <li>avinash8564kumar@gmail.com</li>
                            </ul>
                        </div>

                        <h3 class="resume-title">Education</h3>

                        <div class="resume-item">
                            <h4>B.Tech – Computer Science & Engineering</h4>
                            <h5>2021 – 2024</h5>
                            <p><em>Kanpur Institute of Technology, Kanpur</em></p>
                            <p>
                                Studied core subjects like Data Structures, Algorithms, Web Technologies, and Software
                                Engineering. Gained practical skills in backend development using PHP and Laravel.
                                <br><br>
                                <strong>Mini Project:</strong> Developed a <em>Quiz Mobile Application</em> using Android
                                and Firebase for real-time quiz taking and scoring.<br>
                                <strong>Major Project:</strong> Built a fully functional <em>School ERP System</em> with
                                modules like student registration, attendance, exam management, and admin control using
                                Laravel and MySQL.
                            </p>
                        </div>

                        <div class="resume-item">
                            <h4>Diploma – Computer Science & Engineering</h4>
                            <h5>2017 – 2020</h5>
                            <p><em>Government Polytechnic, Saharanpur</em></p>
                            <p>
                                Built a strong foundation in programming, database management, and web fundamentals. Worked
                                on real-time academic projects and learned the basics of software development.
                                <br><br>
                                <strong>Mini Project:</strong> Created a <em>Hotel Management System</em> using PHP, MySQL,
                                HTML, CSS, JavaSCript to
                                manage bookings, customer details, and billing.<br>
                                <strong>Major Project:</strong> Developed a <em>Library Management System</em> using PHP
                                and MySQL to automate book issuing, returns, and student record tracking.
                            </p>
                        </div>

                    </div>

                    <!-- Experience -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title">Professional Experience</h3>

                        <div class="resume-item">
                            <h4>Web Developer – Internet Moguls</h4>
                            <h5>Apr 2025 – Present</h5>
                            <p><em>Delhi, India</em></p>
                            <ul>
                                <li>Designing and developing dynamic web applications for hospitality and event management
                                    clients.</li>
                                <li>Maintaining, optimizing, and enhancing legacy systems with modern technologies.</li>
                                <li>Specialized in feature enhancements and system scalability.</li>
                            </ul>
                        </div>

                        <div class="resume-item">
                            <h4>Web Developer – Nirvaat Internet Pvt. Ltd.</h4>
                            <h5>Apr 2024 – Apr 2025</h5>
                            <p><em>Noida, India</em></p>
                            <ul>
                                <li>Worked on PHP, Laravel, Magento, MySQL, and React.js for multiple dynamic websites.</li>
                                <li>Collaborated with teams to deliver seamless features and user experiences.</li>
                                <li>Participated in code reviews and adhered to best practices.</li>
                            </ul>
                        </div>

                        <div class="resume-item">
                            <h4>Freelance Web Developer</h4>
                            <h5>2021 – 2024</h5>
                            <p><em>Remote</em></p>
                            <ul>
                                <li>Built and delivered websites for clients in real estate, transport, education, and
                                    corporate sectors.</li>
                                <li>Focused on full-stack development using Laravel, PHP, HTML, CSS, JS, jQuery, and SEO
                                    techniques.</li>
                                <li>Managed end-to-end development including UI, backend logic, database, and hosting.</li>
                            </ul>
                        </div>
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
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-product">Product</li>
                        <li data-filter=".filter-branding">Branding</li>
                        <li data-filter=".filter-books">Books</li>
                    </ul>
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>App 1</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/app-1.jpg') }}" title="App 1"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/product-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Product 1</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/product-1.jpg') }}" title="Product 1"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/branding-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Branding 1</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/branding-1.jpg') }}" title="Branding 1"
                                        data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/books-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Books 1</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/books-1.jpg') }}" title="Branding 1"
                                        data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/app-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>App 2</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/app-2.jpg') }}" title="App 2"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/product-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Product 2</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/product-2.jpg') }}" title="Product 2"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/branding-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Branding 2</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/branding-2.jpg') }}" title="Branding 2"
                                        data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/books-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Books 2</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/books-2.jpg') }}" title="Branding 2"
                                        data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/app-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>App 3</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/app-3.jpg') }}" title="App 3"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/product-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Product 3</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/product-3.jpg') }}" title="Product 3"
                                        data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/branding-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Branding 3</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/branding-3.jpg') }}" title="Branding 2"
                                        data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <img src="{{ URL::asset('assets/img/portfolio/books-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="portfolio-info">
                                    <h4>Books 3</h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                    <a href="{{ URL::asset('assets/img/portfolio/books-3.jpg') }}" title="Branding 3"
                                        data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
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
                                        style="width: 50px; height: 50px;">
                                </div>
                                <div>
                                    <!-- Service Title -->
                                    <h4 class="title">
                                        <a href="#" class="stretched-link">{{ $service->title }}</a>
                                    </h4>
                                    <!-- Service Description -->
                                    <p class="description">{{ $service->description }}</p>
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
                                    <p>Noida, Uttar Pradesh, India</p>
                                </div>
                            </div>
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Me</h3>
                                    <p>+91 8650163913</p>
                                </div>
                            </div>
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Me</h3>
                                    <p>avinash8564kumar@gmail.com</p>
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
