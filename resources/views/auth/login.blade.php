<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — {{ config('app.name', 'SIAKAD Telkom') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red: #CC0000;
            --red-deep: #990000;
            --red-soft: #FFF0F0;
            --navy: #0B1F3A;
            --navy-mid: #1A3560;
            --gold: #F5A623;
            --text: #111827;
            --muted: #6B7280;
            --border: #E5E7EB;
            --bg: #F3F4F6;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: var(--bg);
            color: var(--text);
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            width: 48%;
            background: linear-gradient(145deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem;
        }

        .left-panel .grid-bg {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 52px 52px;
        }

        .glow-1 {
            position: absolute;
            top: -80px; right: -80px;
            width: 420px; height: 420px;
            background: radial-gradient(circle, rgba(204,0,0,.38) 0%, transparent 65%);
            border-radius: 50%;
            animation: breathe 7s ease-in-out infinite;
        }
        .glow-2 {
            position: absolute;
            bottom: -100px; left: -60px;
            width: 380px; height: 380px;
            background: radial-gradient(circle, rgba(245,166,35,.15) 0%, transparent 65%);
            border-radius: 50%;
            animation: breathe 9s ease-in-out infinite reverse;
        }
        @keyframes breathe {
            0%, 100% { transform: scale(1); }
            50%       { transform: scale(1.15); }
        }

        .left-top { position: relative; z-index: 2; }
        .left-logo {
            display: flex; align-items: center; gap: 12px;
            text-decoration: none;
        }
        .left-logo .icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, var(--red), var(--red-deep));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 16px rgba(204,0,0,.4);
        }
        .left-logo .icon svg { width: 22px; height: 22px; fill: white; }
        .left-logo .brand { font-size: 1.05rem; font-weight: 800; color: white; letter-spacing: -.3px; }
        .left-logo .sub { font-size: .68rem; font-weight: 500; color: rgba(255,255,255,.5); letter-spacing: .4px; text-transform: uppercase; }

        .left-main { position: relative; z-index: 2; }
        .left-tagline {
            font-size: .78rem; font-weight: 700;
            letter-spacing: .8px; text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1rem;
            display: flex; align-items: center; gap: 8px;
        }
        .left-tagline::before {
            content: '';
            display: block; width: 28px; height: 2px;
            background: var(--gold);
        }
        .left-heading {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2rem, 3vw, 2.8rem);
            line-height: 1.15;
            color: white;
            margin-bottom: 1.2rem;
        }
        .left-heading .italic { font-style: italic; color: var(--gold); }
        .left-desc {
            font-size: .9rem;
            line-height: 1.75;
            color: rgba(255,255,255,.6);
            max-width: 380px;
            margin-bottom: 2.5rem;
        }

        /* Feature pills */
        .features-list { display: flex; flex-direction: column; gap: .7rem; }
        .feat {
            display: flex; align-items: center; gap: 12px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.09);
            border-radius: 12px;
            padding: .75rem 1rem;
            color: rgba(255,255,255,.85);
            font-size: .85rem; font-weight: 500;
            transition: background .2s;
        }
        .feat:hover { background: rgba(255,255,255,.1); }
        .feat-icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }
        .feat-icon.r { background: rgba(204,0,0,.2); }
        .feat-icon.g { background: rgba(74,222,128,.15); }
        .feat-icon.a { background: rgba(245,166,35,.15); }

        .left-bottom {
            position: relative; z-index: 2;
            font-size: .75rem;
            color: rgba(255,255,255,.3);
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: white;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
        }

        .login-head { margin-bottom: 2.5rem; }
        .login-head h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 2rem;
            color: var(--navy);
            margin-bottom: .4rem;
        }
        .login-head p {
            font-size: .9rem;
            color: var(--muted);
        }
        .login-head a {
            color: var(--red);
            font-weight: 600;
            text-decoration: none;
        }
        .login-head a:hover { text-decoration: underline; }

        /* Session status */
        .session-status {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
            font-size: .85rem;
            padding: .75rem 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        /* Form */
        .form-group { margin-bottom: 1.25rem; }
        .form-label {
            display: block;
            font-size: .85rem; font-weight: 600;
            color: var(--navy);
            margin-bottom: .45rem;
        }

        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--muted);
            width: 18px; height: 18px;
            pointer-events: none;
        }
        .form-input {
            width: 100%;
            padding: .75rem 1rem .75rem 2.75rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .9rem;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            background: #FAFAFA;
            color: var(--text);
            transition: border-color .2s, box-shadow .2s, background .2s;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(204,0,0,.1);
            background: white;
        }
        .form-input.has-error { border-color: #F87171; }

        /* Password toggle */
        .pw-toggle {
            position: absolute;
            right: 14px; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: var(--muted);
            padding: 0; display: flex; align-items: center;
        }
        .pw-toggle:hover { color: var(--navy); }
        .pw-toggle svg { width: 18px; height: 18px; }

        .form-error {
            font-size: .78rem;
            color: #DC2626;
            margin-top: .4rem;
            display: flex; align-items: center; gap: 4px;
        }
        .form-error::before { content: '⚠'; font-size: .72rem; }

        /* Remember + Forgot row */
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }
        .checkbox-label {
            display: flex; align-items: center; gap: 8px;
            font-size: .85rem; color: var(--muted);
            cursor: pointer; user-select: none;
        }
        .checkbox-label input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--red);
            cursor: pointer;
        }
        .forgot-link {
            font-size: .85rem; font-weight: 600;
            color: var(--red);
            text-decoration: none;
        }
        .forgot-link:hover { text-decoration: underline; }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: .875rem;
            background: linear-gradient(135deg, var(--red), var(--red-deep));
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .95rem; font-weight: 700;
            border: none; border-radius: 10px;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            box-shadow: 0 4px 16px rgba(204,0,0,.35);
            transition: transform .2s, box-shadow .2s;
            letter-spacing: .2px;
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(204,0,0,.45);
        }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit svg { width: 18px; height: 18px; }

        /* Divider */
        .divider {
            display: flex; align-items: center; gap: 1rem;
            margin: 1.75rem 0;
            color: var(--muted); font-size: .8rem;
        }
        .divider::before, .divider::after {
            content: ''; flex: 1; height: 1px;
            background: var(--border);
        }

        /* Register link */
        .register-row {
            text-align: center;
            font-size: .875rem;
            color: var(--muted);
        }
        .register-row a {
            color: var(--red); font-weight: 700;
            text-decoration: none;
        }
        .register-row a:hover { text-decoration: underline; }

        /* Back to home */
        .back-home {
            display: flex; align-items: center; gap: 6px;
            font-size: .82rem; font-weight: 600;
            color: var(--muted);
            text-decoration: none;
            margin-top: 2rem;
            justify-content: center;
            transition: color .2s;
        }
        .back-home:hover { color: var(--navy); }
        .back-home svg { width: 15px; height: 15px; }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .left-panel { display: none; }
            .right-panel {
                background: linear-gradient(160deg, var(--navy) 0%, var(--navy-mid) 100%);
            }
            .login-box {
                background: white;
                border-radius: 20px;
                padding: 2.5rem 2rem;
                box-shadow: 0 20px 60px rgba(0,0,0,.3);
            }
        }

        /* Entrance animation */
        .login-box { animation: slideUp .5s ease both; }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- ── LEFT PANEL ── -->
    <div class="left-panel">
        <div class="grid-bg"></div>
        <div class="glow-1"></div>
        <div class="glow-2"></div>

        <!-- Logo -->
        <div class="left-top">
            <a href="/" class="left-logo">
                <div class="icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <div class="brand">SIAKAD Telkom</div>
                    <div class="sub">Sistem Informasi Akademik</div>
                </div>
            </a>
        </div>

        <!-- Main copy -->
        <div class="left-main">
            <div class="left-tagline">Portal Akademik</div>
            <h2 class="left-heading">
                Satu Portal,<br>
                <span class="italic">Semua Kebutuhan</span><br>
                Akademik Anda
            </h2>
            <p class="left-desc">
                Masuk untuk mengakses jadwal kuliah, nilai, bimbingan, dan berbagai layanan akademik Telkom University secara digital.
            </p>

            <div class="features-list">
                <div class="feat">
                    <div class="feat-icon r">📅</div>
                    <span>Kelola jadwal & mata kuliah dengan mudah</span>
                </div>
                <div class="feat">
                    <div class="feat-icon g">📊</div>
                    <span>Pantau nilai dan progress akademik real-time</span>
                </div>
                <div class="feat">
                    <div class="feat-icon a">🤝</div>
                    <span>Atur jadwal bimbingan dengan dosen</span>
                </div>
            </div>
        </div>

        <div class="left-bottom">
            &copy; {{ date('Y') }} SIAKAD Telkom. All rights reserved.
        </div>
    </div>

    <!-- ── RIGHT PANEL ── -->
    <div class="right-panel">
        <div class="login-box">

            <div class="login-head">
                <h1>Selamat Datang</h1>
                <p>Silakan masuk dengan akun Anda.</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <input
                            id="email"
                            class="form-input {{ $errors->has('email') ? 'has-error' : '' }}"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@telkom.ac.id"
                        />
                    </div>
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrap">
                        <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input
                            id="password"
                            class="form-input {{ $errors->has('password') ? 'has-error' : '' }}"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                        />
                        <button type="button" class="pw-toggle" id="pw-toggle" aria-label="Toggle password visibility">
                            <svg id="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="form-row">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                    </svg>
                    Masuk ke Akun
                </button>

                

            </form>

            <a href="/" class="back-home">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M19 12H5M12 5l-7 7 7 7"/>
                </svg>
                Kembali ke Beranda
            </a>

        </div>
    </div>

    <script>
        // Password toggle
        const toggle = document.getElementById('pw-toggle');
        const pwInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        const eyeOpen = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
        const eyeOff  = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;

        toggle.addEventListener('click', () => {
            const isPassword = pwInput.type === 'password';
            pwInput.type = isPassword ? 'text' : 'password';
            eyeIcon.innerHTML = isPassword ? eyeOff : eyeOpen;
        });
    </script>

</body>
</html>