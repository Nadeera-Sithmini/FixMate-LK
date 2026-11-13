
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | FixMate LK</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #101113;
            --panel: #191A1D;
            --gold: #C6A66B;
            --gold-light: #E8D9B8;
            --white: #F5F3EE;
            --muted: #A6A6A6;
            --border: rgba(198,166,107,.2);
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 35px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            color: var(--white);
            font-family: 'Inter', sans-serif;
        }

        .register-container {
            width: 100%;
            max-width: 1100px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(0,0,0,.45);
            animation: appear .7s ease;
        }

        /* LEFT PANEL */

        .visual-panel {
            position: relative;
            overflow: hidden;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background:
                radial-gradient(circle at 75% 35%, rgba(198,166,107,.23), transparent 35%),
                linear-gradient(145deg, #29251E, #171717 75%);
        }

        .visual-panel::before,
        .visual-panel::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(198,166,107,.15);
            border-radius: 50%;
            width: 400px;
            height: 400px;
            right: -150px;
            top: 100px;
        }

        .visual-panel::after {
            width: 300px;
            height: 300px;
            right: -100px;
            top: 150px;
        }

        .brand {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--white);
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border: 1px solid var(--border);
            background: rgba(198,166,107,.12);
            color: var(--gold);
            border-radius: 13px;
            font-size: 23px;
        }

        .brand span { color: var(--gold); }

        .visual-content {
            position: relative;
            z-index: 2;
            max-width: 430px;
        }

        .visual-label {
            display: inline-block;
            color: var(--gold-light);
            background: rgba(198,166,107,.1);
            border: 1px solid var(--border);
            border-radius: 30px;
            padding: 9px 15px;
            font-size: 11px;
            letter-spacing: 1.5px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .visual-content h1 {
            font-size: clamp(32px, 4vw, 47px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -2px;
        }

        .visual-content h1 span { color: var(--gold); }

        .visual-content p {
            color: #B8B4AB;
            font-size: 14px;
            line-height: 1.9;
            margin-top: 18px;
        }

        .visual-art {
            position: relative;
            z-index: 2;
            height: 175px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .art-circle {
            width: 155px;
            height: 155px;
            border: 1px solid rgba(198,166,107,.45);
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: var(--gold);
            font-size: 75px;
            background: radial-gradient(circle, rgba(198,166,107,.17), transparent 70%);
            box-shadow: 0 0 70px rgba(198,166,107,.12);
            animation: float 4s ease-in-out infinite;
        }

        .visual-footer {
            position: relative;
            z-index: 2;
            color: #918D84;
            font-size: 11px;
        }

        /* RIGHT PANEL */

        .form-panel {
            padding: 45px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 9px;
        }

        .form-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .form-label {
            color: var(--white);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-wrap { position: relative; }

        .input-wrap > i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            z-index: 2;
        }

        .form-control {
            height: 48px;
            background: #222326;
            border: 1px solid #393A3D;
            border-radius: 10px;
            color: var(--white);
            padding: 10px 43px;
            font-size: 12px;
        }

        .form-control::placeholder { color: #777; }

        .form-control:focus {
            background: #222326;
            color: var(--white);
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(198,166,107,.1);
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--muted);
            z-index: 3;
        }

        .toggle-password:hover { color: var(--gold); }

        .register-btn {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(120deg, #B89457, #E8D9B8);
            color: #171717;
            font-weight: 800;
            font-size: 13px;
            transition: .3s;
        }

        .register-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(198,166,107,.2);
        }

        .separator {
            height: 1px;
            background: var(--border);
            margin: 24px 0 20px;
        }

        .login-text {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        .login-link {
            color: var(--gold);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link:hover { color: var(--gold-light); }

        .back-home {
            display: block;
            text-align: center;
            color: #888;
            text-decoration: none;
            font-size: 11px;
            margin-top: 22px;
        }

        .back-home:hover { color: var(--gold); }

        .alert {
            font-size: 12px;
            border-radius: 9px;
        }

        @keyframes appear {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @media(max-width: 850px) {
            .register-container {
                grid-template-columns: 1fr;
                max-width: 520px;
            }

            .visual-panel {
                min-height: 270px;
                padding: 30px;
            }

            .visual-content h1 { font-size: 32px; }
            .visual-art { display: none; }
            .visual-footer { margin-top: 22px; }

            .form-panel { padding: 38px 35px; }
        }

        @media(max-width: 480px) {
            body { padding: 15px; }
            .visual-panel { min-height: 250px; }
            .form-panel { padding: 35px 23px; }
            .form-heading { font-size: 26px; }
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

<div class="register-container">

    <!-- LEFT VISUAL PANEL -->
    <section class="visual-panel">

        <a href="/" class="brand">
            <div class="brand-icon">
                <i class="bi bi-tools"></i>
            </div>
            FixMate<span>LK.</span>
        </a>

        <div class="visual-content">

            <div class="visual-label">
                <i class="bi bi-stars me-2"></i>
                JOIN THE FIXMATE COMMUNITY
            </div>

            <h1>
                A Better Home<br>
                Starts <span>Here.</span>
            </h1>

            <p>
                Create your account and enjoy a simple,
                reliable way to find professional home
                repair services whenever you need them.
            </p>

        </div>

        <div class="visual-art">
            <div class="art-circle">
                <i class="bi bi-house-heart"></i>
            </div>
        </div>

        <div class="visual-footer">
            © {{ date('Y') }} FixMate LK. All Rights Reserved.
        </div>

    </section>

    <!-- RIGHT REGISTER PANEL -->
    <section class="form-panel">

        <h2 class="form-heading">Create Account</h2>

        <p class="form-description">
            Join FixMate LK and get started with trusted home repair services.
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Full Name</label>

                <div class="input-wrap">
                    <i class="bi bi-person"></i>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                    >
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>

                <div class="input-wrap">
                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email address"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>

                <div class="input-wrap">
                    <i class="bi bi-lock"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Create a password"
                        autocomplete="new-password"
                        required
                    >

                    <button type="button" class="toggle-password"
                        onclick="togglePassword('password', 'passwordIcon')">
                        <i class="bi bi-eye" id="passwordIcon"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>

                <div class="input-wrap">
                    <i class="bi bi-shield-lock"></i>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="confirmPassword"
                        class="form-control"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                        required
                    >

                    <button type="button" class="toggle-password"
                        onclick="togglePassword('confirmPassword', 'confirmIcon')">
                        <i class="bi bi-eye" id="confirmIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="register-btn">
                Create My Account
                <i class="bi bi-arrow-right ms-2"></i>
            </button>

        </form>

        <div class="separator"></div>

        <p class="login-text">
            Already have an account?
            <a href="/login" class="login-link">Sign In</a>
        </p>

        <a href="/" class="back-home">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Home
        </a>

    </section>

</div>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>
