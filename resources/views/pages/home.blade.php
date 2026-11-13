
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101113">
    <title>FixMate LK | Premium Home Repair Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg: #101113;
            --secondary: #18191C;
            --card: #202124;
            --gold: #C6A66B;
            --gold-light: #E8D9B8;
            --white: #F5F3EE;
            --muted: #A6A6A6;
            --border: rgba(198,166,107,.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--white);
            overflow-x: hidden;
        }

        a { text-decoration: none; }

        /* NAVBAR */

        .navbar {
            background: rgba(16,17,19,.88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border);
            padding: 17px 0;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: 800;
            color: var(--white) !important;
            letter-spacing: -.8px;
        }

        .brand-icon { color: var(--gold); margin-right: 8px; }

        .nav-link {
            color: var(--muted);
            margin: 0 10px;
            font-size: 14px;
            font-weight: 500;
            transition: .3s;
        }

        .nav-link:hover { color: var(--gold-light); }

        .navbar-toggler {
            border: 1px solid var(--border);
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* BUTTONS */

        .btn-gold {
            background: linear-gradient(135deg, #C6A66B, #E8D9B8);
            color: #171717;
            padding: 13px 25px;
            border-radius: 7px;
            font-weight: 700;
            border: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-gold:hover {
            background: #E8D9B8;
            color: #111;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(198,166,107,.2);
        }

        .btn-outline-gold {
            border: 1px solid var(--gold);
            color: var(--gold-light);
            padding: 12px 24px;
            border-radius: 7px;
            transition: .3s;
        }

        .btn-outline-gold:hover {
            background: var(--gold);
            color: #111;
        }

        /* HERO */

        .hero {
            min-height: 650px;
            display: flex;
            align-items: center;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 75% 35%, rgba(198,166,107,.14), transparent 38%),
                radial-gradient(ellipse at 10% 90%, rgba(198,166,107,.07), transparent 35%),
                var(--bg);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border: 1px solid rgba(198,166,107,.12);
            border-radius: 50%;
            top: -200px;
            right: -100px;
            animation: orbit 18s linear infinite;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(198,166,107,.08);
            border-radius: 50%;
            bottom: -170px;
            left: 20%;
            animation: orbit 24s linear infinite reverse;
        }

        @keyframes orbit {
            to { transform: rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeUp 1s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-badge {
            display: inline-block;
            border: 1px solid var(--border);
            background: rgba(198,166,107,.08);
            color: var(--gold-light);
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 12px;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(40px, 5vw, 68px);
            font-weight: 800;
            line-height: 1.13;
            margin-bottom: 25px;
            letter-spacing: -2px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.9;
            max-width: 530px;
            margin-bottom: 32px;
        }

        .hero-image-wrap {
            position: relative;
            z-index: 2;
            animation: imageReveal 1.2s ease both;
        }

        @keyframes imageReveal {
            from { opacity: 0; transform: translateX(40px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .hero-image {
            width: 100%;
            height: 430px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid var(--border);
            filter: brightness(.83);
            box-shadow: 0 25px 70px rgba(0,0,0,.45);
        }

        .image-label {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(16,17,19,.88);
            border: 1px solid var(--border);
            padding: 13px 18px;
            border-radius: 8px;
            color: var(--gold-light);
            font-size: 13px;
            backdrop-filter: blur(10px);
        }

        /* STATS */

        .stats {
            background: var(--secondary);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 35px 0;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: var(--gold);
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        /* SECTIONS */

        .section { padding: 95px 0; }

        .section-label {
            color: var(--gold);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .section-title {
            font-size: clamp(29px, 4vw, 43px);
            font-weight: 800;
            margin: 16px 0;
            letter-spacing: -1px;
        }

        .section-description {
            color: var(--muted);
            max-width: 620px;
            line-height: 1.9;
        }

        /* SERVICES */

        .service-card {
            background: linear-gradient(145deg, #222326, #191A1D);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 13px;
            padding: 30px;
            height: 100%;
            transition: .4s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            transition: .6s;
        }

        .service-card:hover::before { left: 100%; }

        .service-card:hover {
            transform: translateY(-9px);
            border-color: rgba(198,166,107,.5);
            box-shadow: 0 18px 40px rgba(0,0,0,.3);
        }

        .service-icon {
            width: 58px;
            height: 58px;
            border-radius: 12px;
            background: rgba(198,166,107,.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 26px;
            margin-bottom: 24px;
            transition: .3s;
        }

        .service-card:hover .service-icon {
            background: var(--gold);
            color: #171717;
            transform: rotate(-5deg);
        }

        .service-card h5 {
            font-weight: 700;
            margin-bottom: 13px;
        }

        .service-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
            min-height: 75px;
        }

        .service-link {
            color: var(--gold);
            font-weight: 600;
            font-size: 14px;
        }

        .service-link:hover { color: var(--gold-light); }

        /* ABOUT */

        .about-section {
            background: var(--secondary);
            border-top: 1px solid rgba(255,255,255,.04);
            border-bottom: 1px solid rgba(255,255,255,.04);
        }

        .about-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 13px;
            filter: brightness(.8);
        }

        .about-text {
            color: var(--muted);
            line-height: 1.9;
        }

        .feature-item {
            margin-top: 20px;
            color: var(--white);
            font-size: 14px;
        }

        .feature-item i {
            color: var(--gold);
            margin-right: 10px;
        }

        /* CTA */

        .cta {
            background:
                radial-gradient(circle at 90% 20%, rgba(255,255,255,.15), transparent 30%),
                linear-gradient(120deg, #8D7042, #C6A66B, #A98751);
            border-radius: 15px;
            padding: 65px 25px;
            text-align: center;
            color: #171717;
            position: relative;
            overflow: hidden;
        }

        .cta h2 { font-weight: 800; }

        .cta p { color: #302719; }

        .btn-dark-custom {
            display: inline-block;
            background: #171717;
            color: var(--gold-light);
            padding: 14px 27px;
            border-radius: 7px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-dark-custom:hover {
            background: #292929;
            color: white;
            transform: translateY(-3px);
        }

        /* FOOTER */

        footer {
            background: #0B0C0E;
            border-top: 1px solid var(--border);
            padding: 40px 0;
            color: var(--muted);
        }

        .footer-brand {
            color: var(--white);
            font-weight: 800;
            font-size: 21px;
        }

        .footer-brand span { color: var(--gold); }

        /* SCROLL REVEAL */

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .8s ease, transform .8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 991px) {
            .navbar-nav { padding: 15px 0; }
            .navbar .d-flex { padding-bottom: 10px; }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 75px 0;
                min-height: auto;
            }

            .hero h1 { letter-spacing: -1px; }

            .hero-image {
                height: 290px;
                margin-top: 35px;
            }

            .section { padding: 65px 0; }

            .about-image { height: 290px; }

            .cta { padding: 45px 20px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand" href="/">
            <i class="bi bi-tools brand-icon"></i>FixMate<span style="color:#C6A66B">LK</span>
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <div class="d-flex gap-2">
                <a href="/login" class="btn btn-outline-gold">Login</a>
                <a href="/login" class="btn-gold">Book Now</a>
            </div>

        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6 hero-content">

                <span class="hero-badge">
                    <i class="bi bi-stars me-2"></i>
                    PREMIUM HOME REPAIR SERVICES
                </span>

                <h1>
                    Your Home Deserves
                    <span>Expert Care.</span>
                </h1>

                <p>
                    Experience a smarter way to manage home repairs.
                    Connect with skilled professionals, book services
                    easily and enjoy reliable support right at your doorstep.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="#services" class="btn-gold">
                        Explore Services
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="#about" class="btn-outline-gold">
                        Discover More
                    </a>
                </div>

            </div>

            <div class="col-lg-6 hero-image-wrap">
                <div class="position-relative">
                    <img class="hero-image"
                        src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=1000"
                        alt="Professional home repair technician">

                    <div class="image-label">
                        <i class="bi bi-patch-check-fill me-2"></i>
                        Professional Home Care
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- STATS -->
<section class="stats">
    <div class="container">
        <div class="row text-center g-4">

            <div class="col-6 col-md-3">
                <div class="stat-number">
                    <span class="counter" data-target="500">500</span>+
                </div>
                <div class="stat-label">Happy Customers</div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-number">
                    <span class="counter" data-target="50">50</span>+
                </div>
                <div class="stat-label">Expert Technicians</div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-number">
                    <span class="counter" data-target="1000">1000</span>+
                </div>
                <div class="stat-label">Repairs Completed</div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Booking Access</div>
            </div>

        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="section" id="services">
    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="section-label">WHAT WE OFFER</span>
            <h2 class="section-title">Our Professional Services</h2>
            <p class="section-description mx-auto">
                Complete home maintenance and repair solutions
                delivered by skilled professionals.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-snow"></i></div>
                    <h5>AC Repair</h5>
                    <p>Professional air conditioner repair, cleaning and maintenance services.</p>
                    <a href="/login" class="service-link">Book Service <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-refrigerator"></i></div>
                    <h5>Refrigerator Repair</h5>
                    <p>Expert diagnosis and repair for refrigerator cooling and electrical issues.</p>
                    <a href="/login" class="service-link">Book Service <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-droplet"></i></div>
                    <h5>Washing Machine Repair</h5>
                    <p>Reliable washing machine repair and maintenance for your home.</p>
                    <a href="/login" class="service-link">Book Service <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-lightning-charge"></i></div>
                    <h5>Electrical Repair</h5>
                    <p>Safe and professional electrical troubleshooting and repair services.</p>
                    <a href="/login" class="service-link">Book Service <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-water"></i></div>
                    <h5>Plumbing Repair</h5>
                    <p>Solutions for leaking taps, blocked pipes and household plumbing issues.</p>
                    <a href="/login" class="service-link">Book Service <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section about-section" id="about">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6 reveal">
                <img class="about-image"
                    src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1000"
                    alt="Technician working on home maintenance">
            </div>

            <div class="col-lg-6 reveal">
                <span class="section-label">WHY CHOOSE US</span>

                <h2 class="section-title">
                    Reliable Repairs.
                    <span style="color:var(--gold)">Peace of Mind.</span>
                </h2>

                <p class="about-text">
                    FixMate LK makes home maintenance simple. Connect with
                    skilled technicians, schedule repairs and follow your
                    booking from one convenient platform.
                </p>

                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Skilled and verified technicians
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Easy online booking process
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Transparent booking updates
                </div>

                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    Convenient service management
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA / CONTACT -->
<section class="section" id="contact">
    <div class="container reveal">
        <div class="cta">

            <span class="section-label" style="color:#302719">
                LET'S GET IT FIXED
            </span>

            <h2 class="fw-bold mb-3 mt-3">
                Your Home. Our Priority.
            </h2>

            <p class="mb-4">
                Book a professional technician and experience
                convenient home repair services.
            </p>

            <a href="/login" class="btn-dark-custom">
                Book Your Service
                <i class="bi bi-arrow-right ms-2"></i>
            </a>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row align-items-center gy-3">

            <div class="col-md-6">
                <div class="footer-brand">
                    <i class="bi bi-tools me-2" style="color:var(--gold)"></i>
                    FixMate<span>LK</span>
                </div>
                <p class="mb-0 mt-2">Your trusted home repair partner.</p>
            </div>

            <div class="col-md-6 text-md-end">
                <p class="mb-0">© 2026 FixMate LK. All Rights Reserved.</p>
            </div>

        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Scroll reveal animation
    const revealElements = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealElements.forEach(element => {
        revealObserver.observe(element);
    });

    // Statistics count-up animation
    const counters = document.querySelectorAll('.counter');

    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = Number(counter.dataset.target);
                const duration = 1500;
                const startTime = performance.now();

                function updateCounter(currentTime) {
                    const progress = Math.min((currentTime - startTime) / duration, 1);
                    const easedProgress = 1 - Math.pow(1 - progress, 3);

                    counter.textContent = Math.floor(target * easedProgress);

                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                }

                requestAnimationFrame(updateCounter);
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
</script>

</body>
</html>
