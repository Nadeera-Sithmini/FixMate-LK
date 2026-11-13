
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Dashboard | FixMate LK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #101113;
            --sidebar: #18191C;
            --card: #202124;
            --gold: #C6A66B;
            --gold-light: #E8D9B8;
            --white: #F5F3EE;
            --muted: #A6A6A6;
            --border: rgba(198,166,107,.2);
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--bg);
            color: var(--white);
            font-family: 'Inter', sans-serif;
        }

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            padding: 25px 18px;
            transition: transform .3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            font-size: 25px;
            font-weight: 800;
            color: var(--gold-light);
            text-decoration: none;
            padding: 5px 12px 30px;
            letter-spacing: -1px;
        }

        .sidebar-brand span { color: var(--gold); }

        .sidebar-label {
            color: #777;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            border-radius: 10px;
            transition: .2s;
        }

        .sidebar-link i {
            font-size: 18px;
            width: 22px;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(198,166,107,.13);
            color: var(--gold-light);
        }

        .sidebar-link.active {
            border-left: 3px solid var(--gold);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 18px;
        }

        .sidebar-user {
            padding: 12px;
            margin-bottom: 12px;
            background: rgba(255,255,255,.035);
            border-radius: 12px;
            overflow-wrap: anywhere;
        }

        .sidebar-user strong {
            display: block;
            color: var(--gold-light);
            font-size: 13px;
        }

        .sidebar-user small {
            color: var(--muted);
            font-size: 11px;
        }

        .logout-link {
            width: 100%;
            border: none;
            background: transparent;
            text-align: left;
            cursor: pointer;
            color: #F87171;
        }

        .logout-link:hover {
            background: rgba(239,68,68,.1);
            color: #FCA5A5;
        }

        .sidebar-overlay { display: none; }

        /* MAIN LAYOUT */

        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            min-height: 70px;
            padding: 15px 30px;
            background: var(--sidebar);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title {
            color: var(--gold-light);
            font-weight: 700;
            font-size: 15px;
        }

        .mobile-menu-btn {
            display: none;
            border: 1px solid var(--border);
            color: var(--gold-light);
            background: var(--card);
            border-radius: 8px;
            padding: 7px 11px;
        }

        .main-content {
            width: 100%;
            max-width: 1500px;
            padding: 35px;
            margin: 0 auto;
            flex: 1;
        }

        /* WELCOME */

        .welcome {
            background:
                radial-gradient(circle at 90% 10%, rgba(198,166,107,.15), transparent 35%),
                linear-gradient(120deg, #242019, #202124);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 32px;
            margin-bottom: 30px;
        }

        .welcome-label {
            color: var(--gold);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .welcome h2 {
            color: var(--gold-light);
            font-size: 30px;
            font-weight: 800;
        }

        .muted { color: var(--muted); }

        /* CARDS */

        .stat-card,
        .job-card,
        .profile-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
        }

        .stat-card {
            padding: 24px;
            height: 100%;
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: var(--gold);
            box-shadow: 0 12px 30px rgba(0,0,0,.15);
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: rgba(198,166,107,.12);
            color: var(--gold);
            font-size: 21px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 800;
            margin-top: 15px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
        }

        .section-title {
            color: var(--gold-light);
            font-weight: 800;
        }

        /* JOB DETAILS */

        .job-card {
            padding: 24px;
            margin-bottom: 20px;
            transition: .25s;
            scroll-margin-top: 90px;
            position: relative;
        }

        .job-card:hover {
            border-color: rgba(198,166,107,.55);
        }

        .job-card h5 {
            color: var(--gold-light);
            font-weight: 700;
            margin: 0;
        }

        .detail {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .detail i {
            color: var(--gold);
            margin-right: 8px;
            width: 15px;
        }

        .job-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        /* STATUS */

        .badge-status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 30px;
            background: rgba(198,166,107,.13);
            color: var(--gold-light);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-completed {
            background: rgba(34,197,94,.12);
            color: #4ADE80;
        }

        .status-rejected,
        .status-cancelled {
            background: rgba(239,68,68,.12);
            color: #F87171;
        }

        .status-progress {
            background: rgba(59,130,246,.13);
            color: #93C5FD;
        }

        .status-pending {
            background: rgba(245,158,11,.13);
            color: #FBBF24;
        }

        /* JOB ACTION BUTTONS */

        .job-actions {
            display: flex !important;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 15px;
            position: relative;
            z-index: 20;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .job-action-form {
            display: inline-block !important;
            position: relative;
            z-index: 21;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .btn-gold {
            background: var(--gold);
            color: #101113;
            border: 1px solid var(--gold);
            font-weight: 700;
            padding: 9px 18px;
            border-radius: 8px;
        }

        .btn-gold:hover {
            background: var(--gold-light);
            border-color: var(--gold-light);
            color: #101113;
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--gold-light);
            border: 1px solid var(--gold);
            font-weight: 700;
            padding: 9px 18px;
            border-radius: 8px;
        }

        .btn-outline-gold:hover {
            background: var(--gold);
            color: #101113;
        }

        .job-actions button {
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
            pointer-events: auto !important;
            cursor: pointer;
        }

        /* FORMS */

        .form-control {
            background: #151619;
            border: 1px solid #393A3D;
            color: var(--white);
            border-radius: 8px;
        }

        .form-control:focus {
            background: #151619;
            color: var(--white);
            border-color: var(--gold);
            box-shadow: 0 0 0 .2rem rgba(198,166,107,.12);
        }

        .form-control::placeholder { color: #777; }

        /* PROFILE */

        .profile-card {
            padding: 24px;
            scroll-margin-top: 90px;
        }

        .profile-name {
            color: var(--gold-light);
            font-weight: 700;
        }

        .profile-divider {
            border-color: var(--border);
            opacity: 1;
            margin: 18px 0;
        }

        /* EMPTY STATE */

        .empty-state {
            background: var(--card);
            border: 1px dashed var(--border);
            border-radius: 16px;
            padding: 55px 20px;
            text-align: center;
        }

        .alert { border-radius: 12px; }

        /* FOOTER */

        footer {
            padding: 22px;
            background: var(--sidebar);
            border-top: 1px solid var(--border);
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 991px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 1040;
                background: rgba(0,0,0,.65);
            }

            .main-wrapper { margin-left: 0; }
            .mobile-menu-btn { display: inline-block; }
            .topbar { padding: 14px 18px; }
            .main-content { padding: 25px 18px; }
        }

        @media (max-width: 575px) {
            .welcome { padding: 23px 18px; }
            .welcome h2 { font-size: 23px; }

            .job-card,
            .profile-card,
            .stat-card { padding: 19px; }

            .main-content { padding: 20px 14px; }
            .topbar-title { font-size: 13px; }
        }

        @media(prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->

<aside class="sidebar" id="sidebar">

    <a href="{{ route('dashboard') }}" class="sidebar-brand">
        FixMate<span>LK.</span>
    </a>

    <div class="sidebar-label">MAIN MENU</div>

    <nav class="sidebar-menu">

        <a href="#dashboard" class="sidebar-link active" data-menu="dashboard">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="#jobs" class="sidebar-link" data-menu="jobs">
            <i class="bi bi-clipboard-check"></i>
            My Assigned Jobs
        </a>

        <a href="#profile" class="sidebar-link" data-menu="profile">
            <i class="bi bi-person-badge"></i>
            My Profile
        </a>

    </nav>

    <div class="sidebar-bottom">

        <div class="sidebar-user">
            <strong>{{ $user->name }}</strong>
            <small>Technician Account</small>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="sidebar-link logout-link">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>

    </div>

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- MAIN WRAPPER -->

<div class="main-wrapper">

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button type="button"
                    class="mobile-menu-btn"
                    id="menuToggle"
                    aria-label="Open navigation menu"
                    aria-expanded="false">
                <i class="bi bi-list fs-5"></i>
            </button>

            <span class="topbar-title">Technician Dashboard</span>

        </div>

        <span class="muted small">
            <i class="bi bi-person-circle me-1"></i>
            {{ $user->name }}
        </span>

    </header>

    <main class="main-content" id="dashboard">

        <!-- WELCOME -->

        <section class="welcome">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <p class="welcome-label mb-2">TECHNICIAN WORKSPACE</p>

                    <h2>Welcome back, {{ $user->name }}!</h2>

                    <p class="muted mb-0">
                        Manage your assigned jobs and track your work progress.
                    </p>

                </div>

                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    @if($technician->is_verified)
                        <span class="badge-status status-completed">
                            <i class="bi bi-patch-check-fill me-1"></i>
                            Verified Technician
                        </span>
                    @else
                        <span class="badge-status status-pending">
                            <i class="bi bi-clock me-1"></i>
                            Verification Pending
                        </span>
                    @endif

                </div>

            </div>

        </section>

        <!-- ALERTS -->

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please check the submitted details:</strong>

                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- STATISTICS -->

        <div class="row g-3 mb-5">

            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="stat-number">{{ $totalJobs }}</div>
                    <div class="stat-label">Total Assigned Jobs</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="stat-number">{{ $pendingJobs }}</div>
                    <div class="stat-label">Pending Jobs</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-number">{{ $completedJobs }}</div>
                    <div class="stat-label">Completed Jobs</div>
                </div>
            </div>

        </div>

        <!-- JOBS AND PROFILE -->

        <div class="row g-4 align-items-start">

            <!-- ASSIGNED JOBS -->

            <section class="col-lg-8" id="jobs">

                <h4 class="section-title mb-4">
                    <i class="bi bi-clipboard-check me-2"></i>
                    My Assigned Jobs
                </h4>

                @forelse($assignments as $assignment)

                    @php
                        $booking = $assignment->booking;
                        $status = strtolower(trim($assignment->status ?? 'pending'));

                        $statusClass = match($status) {
                            'completed' => 'status-completed',
                            'rejected', 'cancelled' => 'status-rejected',
                            'in_progress' => 'status-progress',
                            'pending' => 'status-pending',
                            default => '',
                        };
                    @endphp

                    <article class="job-card">

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">

                            <h5>
                                {{ $booking?->service?->name ?? 'Service' }}
                            </h5>

                            <span class="badge-status {{ $statusClass }}">
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </span>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <p class="detail">
                                    <i class="bi bi-person"></i>
                                    Customer: {{ $booking?->user?->name ?? 'N/A' }}
                                </p>

                                <p class="detail">
                                    <i class="bi bi-tools"></i>
                                    Appliance: {{ $booking?->appliance_name ?? 'N/A' }}
                                </p>

                                <p class="detail">
                                    <i class="bi bi-calendar"></i>
                                    Date:
                                    {{ $booking?->booking_date ? \Illuminate\Support\Carbon::parse($booking->booking_date)->format('d M Y') : 'N/A' }}
                                </p>

                                <p class="detail">
                                    <i class="bi bi-clock"></i>
                                    Time: {{ $booking?->booking_time ?? 'N/A' }}
                                </p>

                            </div>

                            <div class="col-md-6">

                                <p class="detail">
                                    <i class="bi bi-geo-alt"></i>
                                    {{ $booking?->address ?? 'N/A' }},
                                    {{ $booking?->city ?? '' }}
                                </p>

                                <p class="detail">
                                    <i class="bi bi-telephone"></i>
                                    {{ $booking?->phone ?? 'N/A' }}
                                </p>

                                <p class="detail">
                                    <i class="bi bi-cash"></i>
                                    Estimated Cost:
                                    Rs. {{ number_format((float) $assignment->estimated_cost, 2) }}
                                </p>

                            </div>

                        </div>

                        <div class="border-top my-3"
                             style="border-color:var(--border)!important"></div>

                        <p class="job-description mb-4">
                            {{ $booking?->problem_description ?? 'No description provided.' }}
                        </p>

                        <!-- PENDING JOB ACTIONS -->

                        @if($status === 'pending')

                            <div class="job-actions">

                                <form method="POST"
                                      action="{{ route('technician.assignments.accept', ['id' => $assignment->id]) }}"
                                      class="job-action-form">
                                    @csrf

                                    <button type="submit" class="btn btn-gold btn-sm">
                                        <i class="bi bi-check-lg me-1"></i>
                                        Accept Job
                                    </button>
                                </form>

                                <form method="POST"
                                      action="{{ route('technician.assignments.reject', ['id' => $assignment->id]) }}"
                                      class="job-action-form"
                                      onsubmit="return confirm('Are you sure you want to reject this job?')">
                                    @csrf

                                    <button type="submit" class="btn btn-outline-gold btn-sm">
                                        <i class="bi bi-x-lg me-1"></i>
                                        Reject Job
                                    </button>
                                </form>

                            </div>

                        @endif

                        <!-- ACCEPTED JOB -->

                        @if($status === 'accepted')

                            <form method="POST"
                                  action="{{ route('technician.assignments.status', ['id' => $assignment->id]) }}"
                                  class="job-action-form"
                                  onsubmit="return confirm('Do you want to start this job?')">
                                @csrf

                                <input type="hidden" name="status" value="in_progress">

                                <button type="submit" class="btn btn-gold btn-sm">
                                    <i class="bi bi-play-fill me-1"></i>
                                    Start Job
                                </button>

                            </form>

                        @endif

                        <!-- IN PROGRESS JOB -->

                        @if($status === 'in_progress')

                            <form method="POST"
                                  action="{{ route('technician.assignments.status', ['id' => $assignment->id]) }}"
                                  class="row g-2 align-items-end job-action-form"
                                  onsubmit="return confirm('Are you sure you have completed this job?')">
                                @csrf

                                <input type="hidden" name="status" value="completed">

                                <div class="col-md-5">
                                    <label class="form-label muted small">Final Cost (Rs.)</label>
                                    <input type="number"
                                           name="final_cost"
                                           min="0"
                                           step="0.01"
                                           class="form-control form-control-sm"
                                           placeholder="Enter final cost">
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label muted small">Work Notes</label>
                                    <input type="text"
                                           name="notes"
                                           class="form-control form-control-sm"
                                           placeholder="Optional notes">
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-gold btn-sm w-100">
                                        <i class="bi bi-check-lg me-1"></i>
                                        Complete
                                    </button>
                                </div>

                            </form>

                        @endif

                        <!-- COMPLETED JOB -->

                        @if($status === 'completed')

                            <p class="text-success small mb-0">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                Job completed successfully
                            </p>

                        @endif

                        <!-- REJECTED JOB -->

                        @if($status === 'rejected')

                            <p class="text-danger small mb-0">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                Job rejected
                            </p>

                        @endif

                        <!-- CANCELLED JOB -->

                        @if($status === 'cancelled')

                            <p class="text-danger small mb-0">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                This booking was cancelled
                            </p>

                        @endif

                    </article>

                @empty

                    <div class="empty-state">
                        <i class="bi bi-inbox fs-1" style="color:var(--gold)"></i>
                        <h5 class="mt-3">No Assigned Jobs Yet</h5>
                        <p class="muted mb-0">
                            New jobs assigned to you will appear here.
                        </p>
                    </div>

                @endforelse

            </section>

            <!-- PROFILE -->

            <section class="col-lg-4" id="profile">

                <h4 class="section-title mb-4">
                    <i class="bi bi-person-badge me-2"></i>
                    My Profile
                </h4>

                <div class="profile-card">

                    <div class="text-center mb-3">

                        <div class="stat-icon mx-auto mb-3"
                             style="width:65px;height:65px;font-size:28px;">
                            <i class="bi bi-person"></i>
                        </div>

                        <h5 class="profile-name mb-1">
                            {{ $user->name }}
                        </h5>

                        <p class="muted small mb-0">
                            {{ $user->email }}
                        </p>

                    </div>

                    <hr class="profile-divider">

                    <p class="detail">
                        <i class="bi bi-wrench-adjustable"></i>
                        {{ $technician->specialization ?? 'Not specified' }}
                    </p>

                    <p class="detail">
                        <i class="bi bi-star"></i>
                        {{ $technician->experience_years ?? 0 }} Years Experience
                    </p>

                    <p class="detail">
                        <i class="bi bi-telephone"></i>
                        {{ $technician->phone ?? 'N/A' }}
                    </p>

                    <p class="detail">
                        <i class="bi bi-geo-alt"></i>
                        {{ $technician->address ?? 'N/A' }}
                    </p>

                    <p class="detail">
                        <i class="bi bi-tools"></i>
                        @if(is_array($technician->skills))
                            {{ implode(', ', $technician->skills) }}
                        @else
                            {{ $technician->skills ?? 'N/A' }}
                        @endif
                    </p>

                    <hr class="profile-divider">

                    <div class="d-flex justify-content-between align-items-center">

                        <span class="muted small">Availability</span>

                        @if($technician->is_available)
                            <span class="badge bg-success">Available</span>
                        @else
                            <span class="badge bg-secondary">Unavailable</span>
                        @endif

                    </div>

                    <div class="mt-3">

                        @if($technician->is_verified)
                            <span class="badge-status status-completed">
                                <i class="bi bi-patch-check-fill me-1"></i>
                                Verified Technician
                            </span>
                        @else
                            <span class="badge-status status-pending">
                                Verification Pending
                            </span>
                        @endif

                    </div>

                </div>

            </section>

        </div>

    </main>

    <footer>
        © {{ date('Y') }} FixMate LK. All rights reserved.
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const menuToggle = document.getElementById('menuToggle');

    function closeSidebar() {
        sidebar?.classList.remove('show');
        overlay?.classList.remove('show');

        menuToggle?.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    function openSidebar() {
        sidebar?.classList.add('show');
        overlay?.classList.add('show');

        menuToggle?.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    menuToggle?.addEventListener('click', function () {
        if (sidebar.classList.contains('show')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    overlay?.addEventListener('click', closeSidebar);

    // Sidebar navigation

    document.querySelectorAll('.sidebar-link[data-menu]').forEach(function (link) {
        link.addEventListener('click', function () {
            document.querySelectorAll('.sidebar-link[data-menu]').forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');
            closeSidebar();
        });
    });

    // Prevent double submission

    document.querySelectorAll('.job-action-form').forEach(function (form) {

        form.addEventListener('submit', function () {

            const button = form.querySelector('button[type="submit"]');

            if (button) {
                button.disabled = true;
                button.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-1"></span> Processing...';
            }

        });

    });

});
</script>

</body>
</html>
