
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FixMate LK | Login</title>

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
            background: var(--bg);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
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
            border: 1px solid var(--border);
            background: rgba(198,166,107,.12);
            color: var(--gold);
            display: grid;
            place-items: center;
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
            padding: 65px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading {
            font-size: 31px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .form-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 35px;
        }

        .form-label {
            color: var(--white);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 9px;
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
            height: 52px;
            background: #222326;
            border: 1px solid #393A3D;
            border-radius: 10px;
            color: var(--white);
            padding: 12px 43px;
            font-size: 13px;
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

        .form-check-input {
            background-color: #222326;
            border-color: #555;
        }

        .form-check-input:checked {
            background-color: var(--gold);
            border-color: var(--gold);
        }

        .form-check-label {
            font-size: 11px;
            color: var(--muted);
        }

        .forgot-link, .signup-link {
            color: var(--gold);
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot-link:hover, .signup-link:hover {
            color: var(--gold-light);
        }

        .login-btn {
            width: 100%;
            height: 53px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(120deg, #B89457, #E8D9B8);
            color: #171717;
            font-weight: 800;
            font-size: 13px;
            transition: .3s;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(198,166,107,.2);
        }

        .separator {
            height: 1px;
            background: var(--border);
            margin: 30px 0 22px;
        }

        .signup-text {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
        }

        .back-home {
            display: block;
            text-align: center;
            color: #888;
            text-decoration: none;
            font-size: 11px;
            margin-top: 28px;
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
            .login-container { grid-template-columns: 1fr; max-width: 520px; }
            .visual-panel { min-height: 300px; padding: 30px; }
            .visual-content h1 { font-size: 32px; }
            .visual-art { display: none; }
            .visual-footer { margin-top: 25px; }
            .form-panel { padding: 40px 35px; }
        }

        @media(max-width: 480px) {
            body { padding: 15px; }
            .visual-panel { min-height: 260px; }
            .form-panel { padding: 35px 23px; }
            .form-heading { font-size: 27px; }
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

<div class="login-container">

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
                YOUR HOME, OUR PRIORITY
            </div>

            <h1>
                Reliable Repairs.<br>
                <span>Peace of Mind.</span>
            </h1>

            <p>
                Professional home repair services made simple.
                Book trusted technicians and take care of your
                home with confidence.
            </p>
        </div>

        <div class="visual-art">
            <div class="art-circle">
                <i class="bi bi-house-gear"></i>
            </div>
        </div>

        <div class="visual-footer">
            © {{ date('Y') }} FixMate LK. All Rights Reserved.
        </div>

    </section>

    <!-- RIGHT LOGIN PANEL -->
    <section class="form-panel">

        <h2 class="form-heading">Welcome Back</h2>

        <p class="form-description">
            Please enter your details to access your account.
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Email Address</label>

                <div class="input-wrap">
                    <i class="bi bi-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
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
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >

                    <button type="button" class="toggle-password"
                        onclick="togglePassword()">
                        <i class="bi bi-eye" id="passwordIcon"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">
                    <input
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                        id="remember"
                        value="1"
                    >
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <a href="#" class="forgot-link">Forgot Password?</a>

            </div>

            <button type="submit" class="login-btn">
                Sign In to Your Account
                <i class="bi bi-arrow-right ms-2"></i>
            </button>

        </form>

        <div class="separator"></div>

        <p class="signup-text">
            Don't have an account?
            <a href="/register" class="signup-link">Create Account</a>
        </p>

        <a href="/" class="back-home">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Home
        </a>

    </section>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>
