<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1351B4 0%, #071D41 100%);
            color: #fff;
        }
        .section-light-blue {
            background-color: #f0f8ff;
        }
        .section-dark-blue {
            background-color: #0d47a1;
            color: #fff;
        }
        .section-gray {
            background-color: #f8f9fa;
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(42, 21, 6, 0.4);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#programs">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#data">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#contact">Contact</a>
                    </li>
                    @if (Route::has('login'))
                        <li class="nav-item">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary ms-lg-3">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary ms-lg-3">Log in</a>
                            @endauth
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center justify-content-center text-center vh-100 position-relative parallax-bg"
        style="background-image: url('https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=1120&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="bg-overlay"></div>
        <div class="container position-relative" style="z-index: 2;">
            <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">Base Project Starter Kit</h1>
            <p class="lead mb-5 animate__animated animate__fadeInUp">Laravel + Jetstream + Livewire + Bootstrap
</p>
            <div class="animate__animated animate__fadeInUp animate__delay-1s">
                <a href="#programs" class="btn btn-primary btn-lg rounded-pill px-5 me-3 scroll-link">Explore Programs</a>
                <a href="#contact" class="btn btn-outline-light btn-lg rounded-pill px-5 scroll-link">Get in Touch</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 section-gray">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-primary mb-3 px-3 py-2">About Us</span>
                    <h2 class="display-5 fw-bold mb-4">Our Mission: Driving Sustainable Growth</h2>
                    <p class="lead text-muted mb-4">We are dedicated to fostering national integration and equitable development, ensuring prosperity for all regions.</p>
                    <p class="mb-4">With innovative programs and strategic partnerships, we address key challenges and unlock the full potential of local economies.</p>
                    <a href="/about" class="btn btn-primary rounded-pill px-4">Learn More</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1598333690981-d30ea723b8fd?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-4 shadow-lg" alt="Nature, blue/green landscape">
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge bg-primary mb-3 px-3 py-2">Our Solutions</span>
                <h2 class="display-5 fw-bold mb-3">Programs and Initiatives</h2>
                <p class="lead text-muted">Discover how we can support your growth</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=2070&auto=format&fit=crop" class="card-img-top" alt="Farming/agriculture" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">Rural Credit Access</h5>
                            <p class="card-text text-muted">Facilitating financial resources for agricultural producers to boost productivity and sustainability.</p>
                            <a href="/programs/rural-credit" class="btn btn-link text-primary p-0 fw-semibold">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=2070&auto=format&fit=crop" class="card-img-top" alt="Group learning/discussion" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">Capacity Building</h5>
                            <p class="card-text text-muted">Providing training and technical assistance to empower local communities and professionals.</p>
                            <a href="/programs/training" class="btn btn-link text-primary p-0 fw-semibold">Learn More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=2070&auto=format&fit=crop" class="card-img-top" alt="Modern infrastructure road" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-3">Infrastructure Projects</h5>
                            <p class="card-text text-muted">Investing in essential infrastructure to connect regions and enhance economic flow.</p>
                            <a href="/programs/infrastructure" class="btn btn-link text-primary p-0 fw-semibold">Learn More →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/programs" class="btn btn-primary rounded-pill px-5 py-3">View All Programs</a>
            </div>
        </div>
    </section>

    <!-- Partner Institutions -->
    <section class="py-5 section-dark-blue">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h2 class="display-5 fw-bold text-white mb-4">Partner Institutions</h2>
                    <p class="lead text-white-50 mb-5">Collaborating with leading financial institutions to foster regional growth and development.</p>
                    <a href="/credit/application" class="btn btn-light btn-lg rounded-pill px-5">Apply for Credit</a>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <h4 class="fw-bold mb-4">Our Financial Partners</h4>
                            <div class="row g-4">
                                <div class="col-6 text-center">
                                    <div class="bg-light rounded p-4 mb-2">
                                        <img src="https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?w=200&auto=format&fit=crop"
                                            alt="Partner Bank" class="img-fluid">
                                    </div>
                                    <small class="text-muted">Bank of America</small>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="bg-light rounded p-4 mb-2">
                                        <img src="https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?w=200&auto=format&fit=crop"
                                            alt="Partner Bank" class="img-fluid">
                                    </div>
                                    <small class="text-muted">Chase Bank</small>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="bg-light rounded p-4 mb-2">
                                        <img src="https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?w=200&auto=format&fit=crop"
                                            alt="Partner Bank" class="img-fluid">
                                    </div>
                                    <small class="text-muted">Wells Fargo</small>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="bg-light rounded p-4 mb-2">
                                        <img src="https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?w=200&auto=format&fit=crop"
                                            alt="Partner Bank" class="img-fluid">
                                    </div>
                                    <small class="text-muted">Citibank</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Target Audience -->
    <section class="py-5 section-light-blue">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge bg-primary mb-3 px-3 py-2">For You</span>
                <h2 class="display-5 fw-bold mb-3">Who Can Participate</h2>
                <p class="lead text-muted">Our programs cater to diverse audiences</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Rural Producers</h5>
                        <p class="text-muted small">Small and medium producers seeking growth and sustainability</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Banking Institutions</h5>
                        <p class="text-muted small">Financial partners supporting regional development</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                                <path
                                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Academic Community</h5>
                        <p class="text-muted small">Researchers and educational institutions interested in the topic</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg>
                        </div>
                        <h5 class="fw-bold mb-2">Citizens</h5>
                        <p class="text-muted small">All interested in monitoring and participating in the actions</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News and Updates -->
    <section id="news" class="py-5 section-gray">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8">
                    <span class="badge bg-primary mb-3 px-3 py-2">Stay Informed</span>
                    <h2 class="display-5 fw-bold mb-3">News and Updates</h2>
                    <p class="lead text-muted mb-0">Follow the latest news on regional development</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/news" class="btn btn-primary rounded-pill px-4">View All News</a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <article class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=2070&auto=format&fit=crop"
                            class="card-img-top" alt="Infrastructure News" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary-subtle text-primary me-2">Infrastructure</span>
                                <small class="text-muted">September 15, 2025</small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">New highway connects three northern states</h5>
                            <p class="card-text text-muted">Investment of R$ 850 million benefits over 200,000
                                inhabitants and strengthens the flow of local production.</p>
                            <a href="/news/northern-highway" class="btn btn-link text-primary p-0 fw-semibold">Read
                                more →</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=2070&auto=format&fit=crop"
                            class="card-img-top" alt="Rural Credit News" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-success-subtle text-success me-2">Rural Credit</span>
                                <small class="text-muted">September 10, 2025</small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">Credit program reaches 50,000 assisted producers</h5>

                            <p class="card-text text-muted">Special financing line has already released over R$ 1.2
                                billion for small and medium rural producers across the country.</p>
                            <a href="/news/rural-credit" class="btn btn-link text-primary p-0 fw-semibold">Read
                                more →</a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="card border-0 shadow-sm h-100">
                        <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=2070&auto=format&fit=crop"
                            class="card-img-top" alt="Solar Energy News" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-warning-subtle text-warning me-2">Sustainability</span>
                                <small class="text-muted">September 05, 2025</small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">Solar energy pilot project benefits isolated communities</h5>
                            <p class="card-text text-muted">Initiative will bring clean energy to 35 communities in
                                remote areas, directly impacting 15,000 people.</p>
                            <a href="/news/solar-energy" class="btn btn-link text-primary p-0 fw-semibold">Read
                                more →</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Data and Transparency -->
    <section id="data" class="py-5 position-relative overflow-hidden section-dark-blue parallax-bg"
        style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=2070&auto=format&fit=crop');">
        <div class="bg-overlay"></div>
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="text-center mb-5">
                <span class="badge bg-light text-dark mb-3 px-3 py-2">Transparency</span>
                <h2 class="display-5 fw-bold mb-3 text-white">Open Data and Indicators</h2>
                <p class="lead text-white-50">Monitor results and regional development indicators</p>
            </div>

            <div class="row g-4 text-white">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 section-blue text-white">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-white bg-opacity-10 rounded p-3 me-3">
                                    <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1">Indicators Panel</h4>
                                    <p class="text-white-50 mb-0">Visualize real-time data</p>
                                </div>
                            </div>
                            <p class="mb-4 text-white-75">Access our interactive panel with socioeconomic indicators, investment maps, and data on ongoing programs.</p>
                            <a href="/data/panel" class="btn btn-light rounded-pill px-4">Access Panel</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100 section-blue text-white">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-white bg-opacity-10 rounded p-3 me-3">
                                    <svg width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1">Reports and Studies</h4>
                                    <p class="text-white-50 mb-0">Technical documents and analyses</p>
                                </div>
                            </div>
                            <p class="mb-4 text-white-75">Download management reports, technical studies, and analyses on regional development and implemented public policies.</p>
                            <a href="/data/reports" class="btn btn-light rounded-pill px-4">View Documents</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Geographic Coverage -->
    <section id="geographic-coverage" class="py-5 section-light-blue">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge bg-primary mb-3 px-3 py-2">Where We Operate</span>
                <h2 class="display-5 fw-bold mb-3">Projects Across United States of America</h2>
                <p class="lead text-muted">Discover the regions benefiting from our programs</p>
            </div>

            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <div class="bg-light rounded-4 p-5 shadow-sm" style="min-height: 500px; position: relative;">
                        <img src="https://images.unsplash.com/photo-1594935975218-a3596da034a3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="World map with connections" class="img-fluid rounded-3"
                            style="width: 100%; height: 100%; object-fit: cover;">
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-overlay-darker">
                            <div class="text-center bg-white rounded-3 shadow p-4">
                                <h5 class="fw-bold mb-2">Interactive Map Coming Soon</h5>
                                <p class="text-muted mb-0 small">Visualize projects by region</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <h3 class="fw-bold mb-4">National Presence</h3>
                    <p class="mb-4 text-muted">Our programs reach all regions of the country, with a special focus on priority areas for regional development.</p>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">North Region</span>
                            <span class="text-muted">432 projects</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 85%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">Northeast Region</span>
                            <span class="text-muted">687 projects</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 95%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">Central-West Region</span>
                            <span class="text-muted">298 projects</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 70%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">Southeast Region</span>
                            <span class="text-muted">254 projects</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 60%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">South Region</span>
                            <span class="text-muted">176 projects</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 50%"></div>
                        </div>
                    </div>

                    <a href="/projects/map" class="btn btn-outline-primary rounded-pill px-4 mt-3">View All
                        Projects</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-5 position-relative overflow-hidden section-dark-blue parallax-bg"
        style="background-image: url('https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="bg-overlay"></div>
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="text-center mb-5">
                <span class="badge bg-light text-dark mb-3 px-3 py-2">Success Stories</span>
                <h2 class="display-5 fw-bold mb-3 text-white">Who Has Already Benefited</h2>
                <p class="lead text-white-50">Discover real transformation stories</p>
            </div>

            <div class="row g-4 text-dark">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                    <path
                                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                            </div>
                            <p class="mb-4">"Thanks to the rural credit program, I was able to modernize my
                                property and triple production. Today I employ 15 people from the community."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&dpr=1"
                                    alt="John Doe" class="rounded-circle me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">John Doe</h6>
                                    <small class="text-muted">Rural Producer - Newark</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                    <path
                                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                            </div>
                            <p class="mb-4">"The training we received transformed our cooperative. We learned
                                new techniques and today we export to three countries."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.pexels.com/photos/1181690/pexels-photo-1181690.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&dpr=1"
                                    alt="Sophia Jones" class="rounded-circle me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">Sophia Smith</h6>
                                    <small class="text-muted">Cooperative - Stamford</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <svg width="40" height="40" fill="#1351B4" viewBox="0 0 16 16">
                                    <path
                                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z" />
                                </svg>
                            </div>
                            <p class="mb-4">"The infrastructure that arrived here changed everything. Now we have access to
                                markets and our production has gained value."</p>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100&auto=format&fit=crop"
                                    alt="Pedro Oliveira" class="rounded-circle me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-0">Noah Jones</h6>
                                    <small class="text-muted">Producer - Yonkers</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-5 section-light-blue">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <span class="badge bg-primary mb-3 px-3 py-2">Have Questions?</span>
                    <h2 class="display-5 fw-bold mb-4">Frequently Asked Questions</h2>
                    <p class="lead text-muted mb-4">Find answers to common questions about our programs and services.</p>
                    <p class="mb-4">Didn't find what you were looking for? Contact us through our service channels.</p>
                    <a href="#contact" class="btn btn-primary rounded-pill px-4 scroll-link">Contact Us</a>
                </div>

                <div class="col-lg-7">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    How can I apply for credit for my rural property?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    To apply for credit, you must contact one of our partner banking institutions with personal documentation, property documents, and a technical project. Our team also offers free guidance for the process.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Which regions are prioritized for the programs?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    We prioritize regions with greater socioeconomic challenges, including semi-arid areas, Legal Amazon, and municipalities with low HDI. However, we serve the entire national territory.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How does the training process work?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    We offer in-person and online courses, with recognized certification. Topics include rural management, production techniques, associativism, and market access. Registration is free.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Can small producers participate in the programs?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Yes! Our programs are especially aimed at small and medium producers. We have specific credit lines and facilitated conditions for this audience.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How to monitor the progress of projects?
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    We provide a public panel with updated information on all projects, including investments, schedules, and results. Access it through our transparency portal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section id="final-cta" class="py-5 position-relative overflow-hidden hero-section parallax-bg"
        style="background-image: url('https://images.pexels.com/photos/572897/pexels-photo-572897.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
        <div class="bg-overlay"></div>
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-4 fw-bold text-white mb-4">Be Part of This Transformation</h2>
                    <p class="lead text-white mb-5" style="opacity: 0.95;">Together, we build a more integrated,
                        developed United States of America with opportunities for all Americans.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="#programs"
                            class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold scroll-link">Discover
                            Programs</a>
                        <a href="#contact"
                            class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-semibold scroll-link">Get
                            in
                            Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-5 section-gray">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <span class="badge bg-primary mb-3 px-3 py-2">Contact Us</span>
                    <h2 class="display-5 fw-bold mb-4">Get in Touch</h2>
                    <p class="lead mb-5">Our team is ready to assist you and clarify all your questions.</p>

                    <div class="mb-4 d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <svg width="24" height="24" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Service Center</h5>
                            <p class="text-muted mb-1">0800 123 4567</p>
                            <small class="text-muted">Mon to Fri, 8 AM to 6 PM</small>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <svg width="24" height="24" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Email</h5>
                            <p class="text-muted mb-0">contact@us.gov</p>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                            <svg width="24" height="24" fill="#1351B4" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Address</h5>
                            <p class="text-muted mb-0">Esplanada dos Ministérios, Block E<br>New York, NY 10001
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <a href="https://facebook.com/midr" target="_blank"
                            class="btn btn-outline-primary rounded-circle"
                            style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/midr" target="_blank"
                            class="btn btn-outline-primary rounded-circle"
                            style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </a>
                        <a href="https://instagram.com/midr" target="_blank"
                            class="btn btn-outline-primary rounded-circle"
                            style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                        </a>
                        <a href="https://telegram.me/midr" target="_blank"
                            class="btn btn-outline-primary rounded-circle"
                            style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Institutional</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/institutional/about"
                                class="text-white-50 text-decoration-none">About the
                                Ministry</a></li>
                        <li class="mb-2"><a href="/institutional/structure"
                                class="text-white-50 text-decoration-none">Structure</a>
                        </li>
                        <li class="mb-2"><a href="/institutional/legislation"
                                class="text-white-50 text-decoration-none">Legislation</a></li>
                        <li class="mb-2"><a href="/institutional/competences"
                                class="text-white-50 text-decoration-none">Competences</a></li>
                        <li class="mb-2"><a href="/institutional/history"
                                class="text-white-50 text-decoration-none">History</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/services/rural-credit"
                                class="text-white-50 text-decoration-none">Rural
                                Credit</a></li>
                        <li class="mb-2"><a href="/services/training"
                                class="text-white-50 text-decoration-none">Training</a></li>
                        <li class="mb-2"><a href="/services/projects"
                                class="text-white-50 text-decoration-none">Projects</a>
                        </li>
                        <li class="mb-2"><a href="/services/partnerships"
                                class="text-white-50 text-decoration-none">Partnerships</a>
                        </li>
                        <li class="mb-2"><a href="/services/consultations"
                                class="text-white-50 text-decoration-none">Consultations</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Transparency</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/transparency/open-data"
                                class="text-white-50 text-decoration-none">Open
                                Data</a></li>
                        <li class="mb-2"><a href="/transparency/accountability"
                                class="text-white-50 text-decoration-none">Accountability</a></li>
                        <li class="mb-2"><a href="/transparency/bids"
                                class="text-white-50 text-decoration-none">Bids</a></li>
                        <li class="mb-2"><a href="/transparency/contracts"
                                class="text-white-50 text-decoration-none">Contracts</a>
                        </li>
                        <li class="mb-2"><a href="/transparency/ombudsman"
                                class="text-white-50 text-decoration-none">Ombudsman</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-3">Quick Access</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/news"
                                class="text-white-50 text-decoration-none">News</a>
                        </li>
                        <li class="mb-2"><a href="/agenda" class="text-white-50 text-decoration-none">Agenda</a>
                        </li>
                        <li class="mb-2"><a href="/publications"
                                class="text-white-50 text-decoration-none">Publications</a></li>
                        <li class="mb-2"><a href="/faq" class="text-white-50 text-decoration-none">FAQ</a></li>
                        <li class="mb-2"><a href="/contact" class="text-white-50 text-decoration-none">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-top border-secondary pt-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="text-white-50 mb-0 small">&copy; {{ date('Y') }} Ministry of Integration and
                            Regional Development of the United States of America. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <a href="/privacy-policy" class="text-white-50 text-decoration-none small me-3">Privacy
                            Policy</a>
                        <a href="/terms-of-use" class="text-white-50 text-decoration-none small me-3">Terms of Use</a>
                        <a href="/accessibility" class="text-white-50 text-decoration-none small">Accessibility</a>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-primary rounded-circle position-fixed bottom-0 end-0 m-4"
        style="width: 50px; height: 50px; display: none; z-index: 1000; align-items: center; justify-content: center;">
        <svg width="20" height="20" fill="white" viewBox="0 0 16 16">
            <path
                d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for anchor links
            const scrollLinks = document.querySelectorAll('.scroll-link');

            scrollLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Back to top button
            const backToTopButton = document.getElementById('backToTop');

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.style.display = 'flex';
                } else {
                    backToTopButton.style.display = 'none';
                }
            });

            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Contact form validation
            const contactForm = document.getElementById('contactForm');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Basic validation
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const message = document.getElementById('message').value;

                    if (!name || !email || !message) {
                        alert('Please fill in all required fields.');
                        return;
                    }

                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Please enter a valid email address.');
                        return;
                    }

                    // Simulation of sending
                    alert('Message sent successfully! We will contact you shortly.');
                    this.reset();
                });
            }
        });
    </script>

</body>

</html>