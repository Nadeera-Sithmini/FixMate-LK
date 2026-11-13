
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | FixMate LK</title>

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
            transition: all .3s ease;
            text-decoration: none;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(198,166,107,.12);
            color: var(--gold-light);
            transform: translateX(4px);
        }

        .logout-btn {
            width: 100%;
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

        /* WELCOME */

        .welcome-panel {
            background:
                radial-gradient(circle at 90% 10%, rgba(198,166,107,.17), transparent 35%),
                linear-gradient(120deg, #202124, #18191C);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 32px;
            overflow: hidden;
        }

        /* PANELS */

        .panel {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 24px;
        }

        /* STATISTICS */

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 23px;
            height: 100%;
            transition: .3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(198,166,107,.6);
            box-shadow: 0 15px 35px rgba(0,0,0,.2);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            background: rgba(198,166,107,.12);
            border: 1px solid var(--border);
            color: var(--gold-light);
            border-radius: 13px;
            font-size: 22px;
        }

        .stat-number {
            font-size: 31px;
            font-weight: 800;
            color: var(--white);
        }

        .section-title {
            font-weight: 800;
        }

        /* FORMS */

        .form-control,
        .form-select {
            color: var(--white);
        }

        .form-control::placeholder {
            color: #858585;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #101113;
            color: var(--white);
            border-color: var(--gold);
            box-shadow: 0 0 0 .2rem rgba(198,166,107,.12);
        }

        .form-select option {
            background: #18191C;
            color: var(--white);
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
            white-space: nowrap;
        }

        .table tbody td {
            padding-top: 17px;
            padding-bottom: 17px;
        }

        .table-hover tbody tr:hover {
            --bs-table-hover-bg: rgba(198,166,107,.05);
            --bs-table-hover-color: var(--white);
        }

        /* BOOKING STATUS */

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

        /* TECHNICIAN BADGES */

        .tech-verified {
            background: rgba(34,197,94,.15);
            color: #86EFAC;
        }

        .tech-unverified {
            background: rgba(245,158,11,.15);
            color: #FBBF24;
        }

        .tech-available {
            background: rgba(34,197,94,.15);
            color: #86EFAC;
        }

        .tech-unavailable {
            background: rgba(239,68,68,.15);
            color: #FCA5A5;
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

        /* SECTION SCROLL OFFSET */

        #users,
        #services,
        #bookings,
        #technician-management,
        #assign-technicians {
            scroll-margin-top: 30px;
        }

        /* RESPONSIVE */

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

            .welcome-panel {
                padding: 24px 20px;
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

                <a href="#users" class="nav-link">
                    <i class="bi bi-people me-2"></i>
                    Users
                </a>

                <a href="#services" class="nav-link">
                    <i class="bi bi-tools me-2"></i>
                    Services
                </a>

                <a href="#bookings" class="nav-link">
                    <i class="bi bi-calendar-check me-2"></i>
                    Bookings
                </a>

                <a href="#assign-technicians" class="nav-link">
                    <i class="bi bi-person-check me-2"></i>
                    Assignments
                </a>

                <a href="#technician-management" class="nav-link">
                    <i class="bi bi-person-gear me-2"></i>
                    Technician Management
                </a>

                <form action="{{ route('logout') }}" method="POST">
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

            <div class="topbar d-flex justify-content-between align-items-center mb-4 fade-up">

                <div>
                    <h2 class="page-title">Admin Dashboard</h2>

                    <p class="muted mb-0">
                        Manage and monitor your FixMate LK platform.
                    </p>
                </div>

                <div class="text-end">
                    <i class="bi bi-shield-check fs-3 gold-text"></i>

                    <div class="small mt-1">
                        {{ $user->name }}
                    </div>

                    <small class="muted">Administrator</small>
                </div>

            </div>


            <!-- WELCOME PANEL -->

            <div class="welcome-panel mb-4 fade-up">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <span class="gold-text small fw-bold text-uppercase">
                            Administration Portal
                        </span>

                        <h2 class="fw-bold mt-2">
                            Welcome back, {{ $user->name }}!
                        </h2>

                        <p class="muted mt-3 mb-0">
                            Here is an overview of your repair service platform.
                            Monitor customers, services, bookings and technicians from one place.
                        </p>

                    </div>

                    <div class="col-lg-4 text-center d-none d-lg-block">
                        <i class="bi bi-buildings gold-text" style="font-size:100px;"></i>
                    </div>

                </div>

            </div>


            <!-- GLOBAL SUCCESS / ERROR MESSAGES -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">

                    <strong>
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Please check the following errors:
                    </strong>

                    @foreach($errors->all() as $error)
                        <div class="mt-1">{{ $error }}</div>
                    @endforeach

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>
            @endif


            <!-- STATISTICS -->

            <div class="row g-3 mb-5">

                <div class="col-sm-6 col-xl-3" id="users">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Total Users</p>
                                <div class="stat-number">{{ $totalUsers }}</div>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-people"></i>
                            </div>

                        </div>

                        <small class="muted">Registered platform users</small>

                    </div>

                </div>


                <div class="col-sm-6 col-xl-3" id="services">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Total Services</p>
                                <div class="stat-number">{{ $totalServices }}</div>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-tools"></i>
                            </div>

                        </div>

                        <small class="muted">Available repair services</small>

                    </div>

                </div>


                <div class="col-sm-6 col-xl-3" id="bookings">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Total Bookings</p>
                                <div class="stat-number">{{ $totalBookings }}</div>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>

                        </div>

                        <small class="muted">All service requests</small>

                    </div>

                </div>


                <div class="col-sm-6 col-xl-3">

                    <div class="stat-card">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <p class="muted mb-2">Pending Bookings</p>
                                <div class="stat-number">{{ $pendingBookings }}</div>
                            </div>

                            <div class="stat-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>

                        </div>

                        <small class="muted">Waiting for confirmation</small>

                    </div>

                </div>

            </div>


            <!-- RECENT BOOKINGS -->

            <section class="panel mb-4" id="recent-bookings">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="section-title mb-1">
                            Recent Bookings
                        </h4>

                        <p class="muted small mb-0">
                            Latest service requests from customers.
                        </p>
                    </div>

                    <i class="bi bi-calendar2-week gold-text fs-3"></i>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($recentBookings as $booking)

                                <tr>

                                    <td>
                                        <span class="gold-text fw-bold">
                                            #FM{{ str_pad($booking->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $booking->user->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $booking->service->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $booking->booking_date
                                            ? $booking->booking_date->format('d M Y')
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
                                    <td colspan="5" class="text-center muted py-5">
                                        <i class="bi bi-calendar-x fs-2 d-block mb-2 gold-text"></i>
                                        No bookings found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- TECHNICIAN ASSIGNMENT SECTION -->

            <section class="panel mb-4" id="assign-technicians">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="section-title mb-1">
                            Technician Assignments
                        </h4>

                        <p class="muted small mb-0">
                            Assign available technicians to customer bookings.
                        </p>
                    </div>

                    <i class="bi bi-person-gear gold-text fs-2"></i>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>
                            <tr>
                                <th>Booking</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Technician</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($bookings as $booking)

                                @php
                                    $assignment = $activeAssignments->get($booking->id);
                                @endphp

                                <tr>

                                    <td>
                                        <span class="gold-text fw-bold">
                                            #FM{{ str_pad($booking->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $booking->user->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $booking->service->name ?? 'N/A' }}
                                    </td>

                                    <td>
                                        <span class="status status-{{ $booking->status }}">
                                            {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                        </span>
                                    </td>

                                    <td>

                                        @if($assignment)

                                            <span class="gold-text fw-semibold">
                                                {{ $assignment->technician->user->name ?? 'Technician' }}
                                            </span>

                                            <small class="muted d-block">
                                                {{ ucfirst($assignment->status) }}
                                            </small>

                                        @elseif(in_array($booking->status, ['completed', 'cancelled']))

                                            <span class="muted">Not assignable</span>

                                        @else

                                            <form
                                                action="{{ route('admin.bookings.assign', $booking->id) }}"
                                                method="POST"
                                                class="d-flex gap-2"
                                            >
                                                @csrf

                                                <select
                                                    name="technician_id"
                                                    class="form-select form-select-sm"
                                                    required
                                                    style="min-width:160px; background:#18191C; color:#F5F3EE; border-color:rgba(198,166,107,.3);"
                                                >
                                                    <option value="">Select Technician</option>

                                                    @foreach($technicians as $technician)
                                                        <option value="{{ $technician->id }}">
                                                            {{ $technician->user->name ?? 'Technician' }}
                                                            - {{ $technician->specialization }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm"
                                                    style="background:#C6A66B; color:#101113; font-weight:700; white-space:nowrap;"
                                                >
                                                    Assign
                                                </button>

                                            </form>

                                        @endif

                                    </td>

                                    <td>

                                        @if($assignment)

                                            <span class="gold-text small">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Assigned
                                            </span>

                                        @elseif(in_array($booking->status, ['completed', 'cancelled']))

                                            <span class="muted small">Closed</span>

                                        @else

                                            <span class="muted small">Awaiting assignment</span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center muted py-4">
                                        No bookings available.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                @if($technicians->isEmpty())

                    <div class="alert alert-warning mt-3 mb-0">
                        No available and verified technicians found.
                        Please verify an available technician in Technician Management.
                    </div>

                @endif

            </section>


            <!-- ========================================== -->
            <!-- TECHNICIAN MANAGEMENT SECTION -->
            <!-- ========================================== -->

            <section class="panel mb-4" id="technician-management">

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                    <div>
                        <h4 class="section-title mb-1">
                            <i class="bi bi-person-gear gold-text me-2"></i>
                            Technician Management
                        </h4>

                        <p class="muted small mb-0">
                            Create, verify and manage your repair technicians.
                        </p>
                    </div>

                    <span class="badge rounded-pill px-3 py-2"
                          style="background:rgba(198,166,107,.15); color:#E8D9B8;">
                        {{ $allTechnicians->count() }} Technicians
                    </span>

                </div>


                <!-- CREATE TECHNICIAN FORM -->

                <div class="panel mb-4" style="background:#18191C;">

                    <h5 class="section-title mb-3">
                        <i class="bi bi-person-plus gold-text me-2"></i>
                        Create New Technician
                    </h5>

                    <p class="muted small mb-4">
                        Add a new technician account to the FixMate LK platform.
                    </p>


                    <form action="{{ route('admin.technicians.store') }}" method="POST">

                        @csrf

                        <div class="row g-3">

                            <!-- NAME -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Full Name *
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter technician name"
                                    value="{{ old('name') }}"
                                    required
                                    maxlength="255"
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- EMAIL -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Email Address *
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="technician@example.com"
                                    value="{{ old('email') }}"
                                    required
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- PASSWORD -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Password *
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Minimum 8 characters"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- CONFIRM PASSWORD -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Confirm Password *
                                </label>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- SPECIALIZATION -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Specialization *
                                </label>

                                <select
                                    name="specialization"
                                    class="form-select"
                                    required
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                                    <option value="">Select Specialization</option>

                                    <option value="AC Repair"
                                        {{ old('specialization') == 'AC Repair' ? 'selected' : '' }}>
                                        AC Repair
                                    </option>

                                    <option value="Refrigerator Repair"
                                        {{ old('specialization') == 'Refrigerator Repair' ? 'selected' : '' }}>
                                        Refrigerator Repair
                                    </option>

                                    <option value="Washing Machine Repair"
                                        {{ old('specialization') == 'Washing Machine Repair' ? 'selected' : '' }}>
                                        Washing Machine Repair
                                    </option>

                                    <option value="Electrical Repair"
                                        {{ old('specialization') == 'Electrical Repair' ? 'selected' : '' }}>
                                        Electrical Repair
                                    </option>

                                    <option value="Plumbing Repair"
                                        {{ old('specialization') == 'Plumbing Repair' ? 'selected' : '' }}>
                                        Plumbing Repair
                                    </option>

                                </select>

                            </div>


                            <!-- EXPERIENCE -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Experience (Years) *
                                </label>

                                <input
                                    type="number"
                                    name="experience_years"
                                    class="form-control"
                                    min="0"
                                    max="60"
                                    placeholder="Example: 3"
                                    value="{{ old('experience_years', 0) }}"
                                    required
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- PHONE -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Enter phone number"
                                    value="{{ old('phone') }}"
                                    maxlength="20"
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- ADDRESS -->

                            <div class="col-md-6">

                                <label class="form-label small">
                                    Address
                                </label>

                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    placeholder="Enter address"
                                    value="{{ old('address') }}"
                                    maxlength="500"
                                    style="background:#101113; border-color:rgba(198,166,107,.3);"
                                >

                            </div>


                            <!-- SUBMIT -->

                            <div class="col-12 mt-4">

                                <button
                                    type="submit"
                                    class="btn px-4 py-2"
                                    style="background:#C6A66B; color:#101113; font-weight:700;"
                                >
                                    <i class="bi bi-person-plus me-2"></i>
                                    Create Technician Account
                                </button>

                            </div>

                        </div>

                    </form>

                </div>


                <!-- REGISTERED TECHNICIANS -->

                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                    <div>
                        <h5 class="section-title mb-1">
                            Registered Technicians
                        </h5>

                        <p class="muted small mb-0">
                            Manage technician verification and availability.
                        </p>
                    </div>

                    <i class="bi bi-people gold-text fs-3"></i>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>
                                <th>Technician</th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Verification</th>
                                <th>Availability</th>
                                <th>Actions</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse($allTechnicians as $technician)

                                <tr>

                                    <!-- TECHNICIAN DETAILS -->

                                    <td>

                                        <div class="fw-semibold">
                                            {{ $technician->user->name ?? 'Unknown' }}
                                        </div>

                                        <small class="muted">
                                            {{ $technician->user->email ?? 'No email' }}
                                        </small>

                                        @if($technician->phone)

                                            <small class="muted d-block">
                                                {{ $technician->phone }}
                                            </small>

                                        @endif

                                    </td>


                                    <!-- SPECIALIZATION -->

                                    <td>
                                        <span class="gold-text">
                                            {{ $technician->specialization }}
                                        </span>
                                    </td>


                                    <!-- EXPERIENCE -->

                                    <td>
                                        {{ $technician->experience_years }}
                                        {{ $technician->experience_years == 1 ? 'Year' : 'Years' }}
                                    </td>


                                    <!-- VERIFICATION STATUS -->

                                    <td>

                                        @if($technician->is_verified)

                                            <span class="badge rounded-pill tech-verified">
                                                <i class="bi bi-patch-check me-1"></i>
                                                Verified
                                            </span>

                                        @else

                                            <span class="badge rounded-pill tech-unverified">
                                                <i class="bi bi-clock me-1"></i>
                                                Not Verified
                                            </span>

                                        @endif

                                    </td>


                                    <!-- AVAILABILITY STATUS -->

                                    <td>

                                        @if($technician->is_available)

                                            <span class="badge rounded-pill tech-available">
                                                Available
                                            </span>

                                        @else

                                            <span class="badge rounded-pill tech-unavailable">
                                                Unavailable
                                            </span>

                                        @endif

                                    </td>


                                    <!-- ACTION BUTTONS -->

                                    <td>

                                        <div class="d-flex flex-column gap-2"
                                             style="min-width:130px;">

                                            <!-- VERIFY / UNVERIFY -->

                                            <form
                                                action="{{ route('admin.technicians.verification', $technician->id) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm w-100"
                                                    style="background:rgba(198,166,107,.15); color:#E8D9B8; border:1px solid rgba(198,166,107,.3);"
                                                >

                                                    @if($technician->is_verified)

                                                        <i class="bi bi-x-circle me-1"></i>
                                                        Unverify

                                                    @else

                                                        <i class="bi bi-patch-check me-1"></i>
                                                        Verify

                                                    @endif

                                                </button>

                                            </form>


                                            <!-- AVAILABILITY -->

                                            <form
                                                action="{{ route('admin.technicians.availability', $technician->id) }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm w-100"
                                                    style="background:rgba(96,165,250,.12); color:#93C5FD; border:1px solid rgba(96,165,250,.25);"
                                                >

                                                    @if($technician->is_available)

                                                        <i class="bi bi-toggle-on me-1"></i>
                                                        Set Unavailable

                                                    @else

                                                        <i class="bi bi-toggle-off me-1"></i>
                                                        Set Available

                                                    @endif

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center muted py-5">

                                        <i class="bi bi-person-x fs-1 d-block mb-3 gold-text"></i>

                                        No technicians registered yet.

                                        <div class="small mt-2">
                                            Create your first technician account using the form above.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>


            <!-- FOOTER -->

            <footer class="text-center muted mt-5 small">
                &copy; {{ date('Y') }} FixMate LK. Admin Panel.
            </footer>

        </main>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
