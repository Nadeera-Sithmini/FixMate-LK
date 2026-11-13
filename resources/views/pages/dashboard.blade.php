
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Dashboard | FixMate LK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 25px;
        }

        body {
            background: var(--bg);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        /* SIDEBAR */

        .sidebar {
            background: var(--secondary);
            height: 100vh;
            min-height: 100vh;
            position: sticky;
            top: 0;
            align-self: flex-start;
            overflow-y: auto;
            overflow-x: hidden;
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            z-index: 1000;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(198,166,107,.35);
            border-radius: 10px;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            color: var(--gold);
            margin-bottom: 45px;
            letter-spacing: -1px;
            white-space: nowrap;
        }

        .brand span {
            color: var(--white);
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            color: var(--muted);
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 9px;
            transition: .3s;
            text-decoration: none;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(198,166,107,.12);
            color: var(--gold-light);
            transform: translateX(4px);
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            text-align: left;
            background: none;
            border: none;
            color: var(--muted);
            padding: 13px 15px;
            border-radius: 10px;
            transition: .3s;
        }

        .logout-btn:hover {
            background: rgba(198,166,107,.12);
            color: var(--gold-light);
        }

        /* MAIN CONTENT */

        .main-content {
            padding: 35px;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-weight: 800;
            letter-spacing: -1px;
        }

        .muted {
            color: var(--muted);
        }

        .gold-text {
            color: var(--gold-light);
        }

        /* CARDS */

        .card-box {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 23px;
            height: 100%;
            transition: .3s ease;
        }

        .card-box:hover {
            border-color: rgba(198,166,107,.55);
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0,0,0,.2);
        }

        .welcome-card {
            background:
                radial-gradient(circle at 90% 10%, rgba(198,166,107,.17), transparent 35%),
                linear-gradient(120deg, #202124, #18191C);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 35px;
            overflow: hidden;
        }

        .stat-icon,
        .service-icon {
            display: grid;
            place-items: center;
            background: rgba(198,166,107,.12);
            color: var(--gold-light);
            border: 1px solid var(--border);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            font-size: 21px;
        }

        .service-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            font-size: 25px;
        }

        /* BUTTONS */

        .gold-btn {
            background: var(--gold);
            color: #171717;
            border: 1px solid var(--gold);
            border-radius: 9px;
            padding: 11px 19px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .gold-btn:hover {
            background: var(--gold-light);
            border-color: var(--gold-light);
            color: #171717;
            transform: translateY(-2px);
        }

        .outline-btn {
            border: 1px solid var(--gold);
            color: var(--gold-light);
            background: transparent;
            border-radius: 9px;
            padding: 10px 16px;
            transition: .3s;
        }

        .outline-btn:hover {
            background: var(--gold);
            color: #171717;
        }

        .service-price {
            color: var(--gold-light);
            font-weight: 700;
            font-size: 18px;
        }

        /* TABLE */

        .table {
            --bs-table-bg: transparent;
            --bs-table-color: var(--white);
            --bs-table-border-color: var(--border);
        }

        .table thead th {
            color: var(--gold-light);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom-width: 1px;
        }

        .table tbody td {
            padding-top: 17px;
            padding-bottom: 17px;
        }

        /* STATUS */

        .status {
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
        }

        .status-pending {
            background: rgba(245,158,11,.15);
            color: #FBBF24;
        }

        .status-confirmed,
        .status-assigned {
            background: rgba(96,165,250,.15);
            color: #93C5FD;
        }

        .status-in_progress {
            background: rgba(168,85,247,.15);
            color: #C4B5FD;
        }

        .status-completed {
            background: rgba(34,197,94,.13);
            color: #86EFAC;
        }

        .status-cancelled {
            background: rgba(239,68,68,.15);
            color: #FCA5A5;
        }

        /* BOOKING MODAL */

        .modal-content {
            background: #202124;
            color: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
        }

        .modal-header,
        .modal-footer {
            border-color: var(--border);
        }

        .btn-close {
            filter: invert(1);
        }

        .form-label {
            color: var(--gold-light);
            font-size: 13px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background: #151619;
            border: 1px solid #393A3D;
            color: var(--white);
            border-radius: 9px;
            padding: 11px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            background: #151619;
            border-color: var(--gold);
            color: var(--white);
            box-shadow: 0 0 0 .2rem rgba(198,166,107,.12);
        }

        .form-control::placeholder {
            color: #777;
        }

        .form-control::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        .form-select option {
            background: #202124;
            color: var(--white);
        }

        .alert {
            border-radius: 12px;
        }

        .section-heading {
            font-weight: 800;
            margin-bottom: 20px;
        }

        /* SCROLL TARGETS */

        #profile,
        #services,
        #bookings {
            scroll-margin-top: 30px;
        }

        /* ANIMATION */

        .fade-up {
            animation: fadeUp .7s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* MOBILE */

        @media(max-width: 767px) {

            .sidebar {
                position: relative;
                top: auto;
                height: auto;
                min-height: auto;
                overflow: visible;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 20px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .welcome-card {
                padding: 25px 20px;
            }

            .topbar {
                flex-wrap: wrap;
                gap: 15px;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->

        <aside class="col-md-3 col-lg-2 sidebar align-self-start">

            <div class="brand">
                FixMate<span>LK.</span>
            </div>

            <nav class="nav flex-column">

                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="bi bi-grid me-2"></i>
                    Dashboard
                </a>

                <a href="#services" class="nav-link">
                    <i class="bi bi-tools me-2"></i>
                    Services
                </a>

                <a href="#bookings" class="nav-link">
                    <i class="bi bi-calendar-check me-2"></i>
                    My Bookings
                </a>

                <a href="#profile" class="nav-link">
                    <i class="bi bi-person me-2"></i>
                    My Profile
                </a>

                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf

                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </button>
                </form>

            </nav>

        </aside>


        <!-- MAIN CONTENT -->

        <main class="col-md-9 col-lg-10 main-content">

            <!-- TOPBAR -->

            <div class="topbar fade-up">

                <div>
                    <h2 class="page-title">Dashboard</h2>
                    <p class="muted mb-0">
                        Manage your home repair services.
                    </p>
                </div>

                <div class="text-end">
                    <i class="bi bi-person-circle fs-3 gold-text"></i>
                    <span class="ms-2">{{ $user->name }}</span>
                </div>

            </div>


            <!-- MESSAGES -->

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please check the booking form:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- WELCOME / PROFILE -->

            <div class="welcome-card mb-4 fade-up" id="profile">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <span class="gold-text small fw-bold text-uppercase">
                            Customer Portal
                        </span>

                        <h2 class="fw-bold mt-2">
                            Hello, {{ $user->name }}! 👋
                        </h2>

                        <p class="muted mt-3">
                            Need help with a home repair?
                            Book a trusted professional with FixMate LK.
                        </p>

                        <a href="#services" class="gold-btn mt-2">
                            <i class="bi bi-plus-lg me-1"></i>
                            Book a Service
                        </a>

                        <div class="muted small mt-3">
                            <i class="bi bi-envelope me-1 gold-text"></i>
                            {{ $user->email }}
                        </div>

                    </div>

                    <div class="col-lg-4 text-center d-none d-lg-block">
                        <i class="bi bi-house-gear gold-text" style="font-size:100px;"></i>
                    </div>

                </div>

            </div>


            <!-- STATISTICS -->

            <div class="row g-3 mb-5">

                <div class="col-sm-6 col-xl-4">
                    <div class="card-box">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Total Bookings</p>
                                <h2 class="fw-bold mb-0">{{ $totalBookings }}</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="col-sm-6 col-xl-4">
                    <div class="card-box">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Pending Bookings</p>
                                <h2 class="fw-bold mb-0">{{ $pendingBookings }}</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="col-sm-6 col-xl-4">
                    <div class="card-box">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Completed Jobs</p>
                                <h2 class="fw-bold mb-0">{{ $completedBookings }}</h2>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            <!-- SERVICES -->

            <section id="services" class="mb-5">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="section-heading mb-1">Our Services</h4>
                        <p class="muted small">
                            Choose a service and book your appointment.
                        </p>
                    </div>

                    <span class="gold-text small">Professional Repairs</span>

                </div>


                <div class="row g-3">

                    @forelse($services as $service)

                        <div class="col-sm-6 col-xl-4">

                            <div class="card-box">

                                <div class="service-icon mb-3">
                                    <i class="bi bi-tools"></i>
                                </div>

                                <h5 class="fw-bold">
                                    {{ $service->name }}
                                </h5>

                                <p class="muted small" style="min-height:45px;">
                                    {{ $service->description ?? 'Professional repair services by experienced technicians.' }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-3">

                                    <div>
                                        <small class="muted d-block">Starting from</small>

                                        <span class="service-price">
                                            Rs. {{ number_format((float) $service->base_price, 2) }}
                                        </span>
                                    </div>

                                    <button
                                        type="button"
                                        class="gold-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#bookingModal{{ $service->id }}">
                                        Book Now
                                        <i class="bi bi-arrow-right ms-1"></i>
                                    </button>

                                </div>

                            </div>

                        </div>


                        <!-- BOOKING MODAL -->

                        <div class="modal fade"
                             id="bookingModal{{ $service->id }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                <div class="modal-content">

                                    <form action="{{ route('bookings.store') }}" method="POST">

                                        @csrf

                                        <input type="hidden"
                                               name="service_id"
                                               value="{{ $service->id }}">

                                        <div class="modal-header">

                                            <div>
                                                <h5 class="modal-title fw-bold gold-text">
                                                    Book {{ $service->name }}
                                                </h5>

                                                <small class="muted">
                                                    Complete the details below to request your service.
                                                </small>
                                            </div>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>

                                        </div>


                                        <div class="modal-body">

                                            <div class="alert alert-dark border mb-4">

                                                <span class="muted">Selected Service:</span>

                                                <strong class="gold-text ms-2">
                                                    {{ $service->name }}
                                                </strong>

                                                <span class="float-end gold-text">
                                                    Rs. {{ number_format((float) $service->base_price, 2) }}
                                                </span>

                                            </div>


                                            <div class="row g-3">

                                                <div class="col-md-6">
                                                    <label class="form-label">Appliance Name</label>

                                                    <input
                                                        type="text"
                                                        name="appliance_name"
                                                        class="form-control"
                                                        placeholder="e.g. Samsung Refrigerator"
                                                        value="{{ old('appliance_name') }}"
                                                        required>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Booking Date</label>

                                                    <input
                                                        type="date"
                                                        name="booking_date"
                                                        class="form-control"
                                                        min="{{ now()->toDateString() }}"
                                                        value="{{ old('booking_date') }}"
                                                        required>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Preferred Time</label>

                                                    <input
                                                        type="time"
                                                        name="booking_time"
                                                        class="form-control"
                                                        value="{{ old('booking_time') }}"
                                                        required>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>

                                                    <input
                                                        type="tel"
                                                        name="phone"
                                                        class="form-control"
                                                        placeholder="07XXXXXXXX"
                                                        value="{{ old('phone') }}"
                                                        required>
                                                </div>


                                                <div class="col-12">
                                                    <label class="form-label">Problem Description</label>

                                                    <textarea
                                                        name="problem_description"
                                                        class="form-control"
                                                        rows="3"
                                                        placeholder="Describe the problem..."
                                                        required>{{ old('problem_description') }}</textarea>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">City</label>

                                                    <input
                                                        type="text"
                                                        name="city"
                                                        class="form-control"
                                                        placeholder="Enter your city"
                                                        value="{{ old('city') }}"
                                                        required>
                                                </div>


                                                <div class="col-md-6">
                                                    <label class="form-label">Full Address</label>

                                                    <input
                                                        type="text"
                                                        name="address"
                                                        class="form-control"
                                                        placeholder="Street, house number..."
                                                        value="{{ old('address') }}"
                                                        required>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="modal-footer">

                                            <button type="button"
                                                    class="outline-btn"
                                                    data-bs-dismiss="modal">
                                                Cancel
                                            </button>

                                            <button type="submit" class="gold-btn">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Confirm Booking
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="card-box text-center muted">
                                <i class="bi bi-tools fs-2 gold-text d-block mb-2"></i>
                                No services available at the moment.
                            </div>

                        </div>

                    @endforelse

                </div>

            </section>


            <!-- MY BOOKINGS -->

            <section id="bookings">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="section-heading mb-1">My Bookings</h4>

                        <p class="muted small">
                            Track your recent service requests.
                        </p>
                    </div>

                    <span class="gold-text small">
                        {{ $totalBookings }} Total
                    </span>

                </div>


                <div class="card-box">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($bookings->take(5) as $booking)

                                    <tr>

                                        <td>
                                            <span class="gold-text fw-bold">
                                                #FM{{ str_pad($booking->id, 3, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $booking->service->name ?? 'Service unavailable' }}
                                        </td>

                                        <td>
                                            {{ $booking->booking_date
                                                ? \Carbon\Carbon::parse($booking->booking_date)->format('d M Y')
                                                : 'N/A' }}
                                        </td>

                                        <td>
                                            <span class="status status-{{ $booking->status }}">
                                                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center muted py-5">

                                            <i class="bi bi-calendar-x fs-2 d-block mb-2 gold-text"></i>

                                            No bookings yet.

                                            Choose a service above to make your first booking.

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>


            <!-- FOOTER -->

            <footer class="text-center muted mt-5 small">
                © {{ date('Y') }} FixMate LK. All Rights Reserved.
            </footer>

        </main>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
