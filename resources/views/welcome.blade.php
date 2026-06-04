<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SIAKAD Telkom') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --red-primary: #CC0000;
            --red-deep: #990000;
            --red-light: #FF1A1A;
            --red-soft: #FFF0F0;
            --navy: #0B1F3A;
            --navy-mid: #1A3560;
            --gold: #F5A623;
            --text-main: #111827;
            --text-muted: #6B7280;
            --bg-light: #F8F9FC;
            --border: #E5E7EB;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-light);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(229,231,235,0.8);
            transition: box-shadow .3s;
        }
        .navbar.scrolled { box-shadow: 0 4px 24px rgba(0,0,0,.08); }
        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .logo-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, var(--red-primary), var(--red-deep));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 12px rgba(204,0,0,.35);
        }
        .logo-icon svg { width: 22px; height: 22px; fill: white; }
        .logo-text { line-height: 1.1; }
        .logo-text .brand { font-size: 1rem; font-weight: 800; color: var(--navy); letter-spacing: -.3px; }
        .logo-text .sub { font-size: .7rem; font-weight: 500; color: var(--text-muted); letter-spacing: .4px; text-transform: uppercase; }
        .nav-links { display: flex; align-items: center; gap: .5rem; }
        .nav-btn-ghost {
            padding: .5rem 1.2rem;
            font-size: .875rem; font-weight: 600;
            color: var(--navy); text-decoration: none;
            border-radius: 8px;
            transition: background .2s, color .2s;
        }
        .nav-btn-ghost:hover { background: var(--red-soft); color: var(--red-primary); }
        .nav-btn-solid {
            padding: .5rem 1.4rem;
            font-size: .875rem; font-weight: 700;
            color: white; text-decoration: none;
            background: linear-gradient(135deg, var(--red-primary), var(--red-deep));
            border-radius: 8px;
            box-shadow: 0 3px 12px rgba(204,0,0,.3);
            transition: transform .2s, box-shadow .2s;
        }
        .nav-btn-solid:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(204,0,0,.4); }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding-top: 68px;
        }
        .hero-bg {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, #0B1F3A 0%, #1A3560 50%, #0B1F3A 100%);
        }
        .hero-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }
        .hero-glow-1 {
            position: absolute;
            top: -10%; right: -5%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(204,0,0,.35) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 6s ease-in-out infinite;
        }
        .hero-glow-2 {
            position: absolute;
            bottom: -10%; left: -5%;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(245,166,35,.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 8s ease-in-out infinite reverse;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50%       { transform: scale(1.12); opacity: .7; }
        }

        .hero-content {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-left { color: white; }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(245,166,35,.15);
            border: 1px solid rgba(245,166,35,.4);
            color: var(--gold);
            font-size: .78rem; font-weight: 700;
            letter-spacing: .6px; text-transform: uppercase;
            padding: .35rem .9rem;
            border-radius: 100px;
            margin-bottom: 1.5rem;
            animation: fadeUp .6s ease both;
        }
        .hero-badge::before { content: '✦'; font-size: .65rem; }

        .hero-title {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2.6rem, 5vw, 3.8rem);
            line-height: 1.1;
            margin-bottom: 1.2rem;
            animation: fadeUp .6s .1s ease both;
        }
        .hero-title .accent { color: var(--gold); font-style: italic; }

        .hero-desc {
            font-size: 1.05rem;
            line-height: 1.75;
            color: rgba(255,255,255,.75);
            margin-bottom: 2.5rem;
            max-width: 480px;
            animation: fadeUp .6s .2s ease both;
        }

        .hero-cta {
            display: flex; gap: 1rem; flex-wrap: wrap;
            animation: fadeUp .6s .3s ease both;
        }
        .cta-primary {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, var(--red-primary), var(--red-deep));
            color: white; text-decoration: none;
            padding: .85rem 2rem;
            border-radius: 12px;
            font-size: .95rem; font-weight: 700;
            box-shadow: 0 6px 24px rgba(204,0,0,.45);
            transition: transform .2s, box-shadow .2s;
        }
        .cta-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(204,0,0,.55); }
        .cta-primary svg { width: 18px; height: 18px; }

        .cta-secondary {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.25);
            color: white; text-decoration: none;
            padding: .85rem 2rem;
            border-radius: 12px;
            font-size: .95rem; font-weight: 600;
            transition: background .2s, border-color .2s;
        }
        .cta-secondary:hover { background: rgba(255,255,255,.18); border-color: rgba(255,255,255,.4); }

        /* Stats */
        .hero-stats {
            display: flex; gap: 2.5rem; margin-top: 3rem;
            animation: fadeUp .6s .4s ease both;
        }
        .stat-item { }
        .stat-num {
            font-size: 1.8rem; font-weight: 800;
            color: white; line-height: 1;
        }
        .stat-num span { color: var(--gold); }
        .stat-label { font-size: .78rem; color: rgba(255,255,255,.55); margin-top: 3px; letter-spacing: .3px; }

        /* Hero Right — Card Mockup */
        .hero-right {
            animation: fadeIn .8s .3s ease both;
        }
        .hero-card {
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            color: white;
        }
        .card-header {
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .card-avatar {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(135deg, var(--red-primary), var(--gold));
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1rem;
        }
        .card-user { line-height: 1.3; }
        .card-user .name { font-weight: 700; font-size: .95rem; }
        .card-user .role { font-size: .78rem; color: rgba(255,255,255,.55); }
        .card-badge {
            margin-left: auto;
            background: rgba(39,174,96,.2);
            border: 1px solid rgba(39,174,96,.4);
            color: #4ade80;
            font-size: .7rem; font-weight: 600;
            padding: .2rem .7rem;
            border-radius: 100px;
        }

        .card-modules { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; margin-bottom: 1.5rem; }
        .module-item {
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 12px;
            padding: .9rem 1rem;
            transition: background .2s;
        }
        .module-item:hover { background: rgba(255,255,255,.1); }
        .module-icon { font-size: 1.3rem; margin-bottom: .4rem; }
        .module-name { font-size: .8rem; font-weight: 600; margin-bottom: .1rem; }
        .module-count { font-size: .7rem; color: rgba(255,255,255,.45); }

        .card-activity { }
        .activity-title { font-size: .78rem; color: rgba(255,255,255,.45); font-weight: 600; text-transform: uppercase; letter-spacing: .5px; margin-bottom: .75rem; }
        .activity-list { display: flex; flex-direction: column; gap: .5rem; }
        .activity-row {
            display: flex; align-items: center; gap: 10px;
            font-size: .82rem;
        }
        .activity-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
        .activity-dot.red { background: var(--red-light); }
        .activity-dot.gold { background: var(--gold); }
        .activity-dot.green { background: #4ade80; }
        .activity-text { color: rgba(255,255,255,.8); }
        .activity-time { margin-left: auto; font-size: .72rem; color: rgba(255,255,255,.35); }

        /* ── FEATURES ── */
        .features {
            background: white;
            padding: 6rem 2rem;
        }
        .section-label {
            text-align: center;
            font-size: .78rem; font-weight: 700;
            letter-spacing: .8px; text-transform: uppercase;
            color: var(--red-primary);
            margin-bottom: .75rem;
        }
        .section-title {
            text-align: center;
            font-family: 'DM Serif Display', serif;
            font-size: clamp(2rem, 4vw, 2.75rem);
            color: var(--navy);
            margin-bottom: 1rem;
        }
        .section-desc {
            text-align: center;
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 560px;
            margin: 0 auto 3.5rem;
            line-height: 1.7;
        }

        .features-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }
        .feature-card {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            transition: transform .25s, box-shadow .25s, border-color .25s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--red-primary), var(--gold));
            opacity: 0;
            transition: opacity .25s;
        }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,.1); border-color: transparent; }
        .feature-card:hover::before { opacity: 1; }

        .feature-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.2rem;
        }
        .icon-red { background: var(--red-soft); }
        .icon-blue { background: #EEF2FF; }
        .icon-green { background: #F0FDF4; }
        .icon-amber { background: #FFFBEB; }
        .icon-purple { background: #FAF5FF; }
        .icon-cyan { background: #ECFEFF; }

        .feature-title { font-size: 1.05rem; font-weight: 700; margin-bottom: .5rem; color: var(--navy); }
        .feature-desc { font-size: .875rem; color: var(--text-muted); line-height: 1.65; }

        /* ── STATS SECTION ── */
        .stats-section {
            background: linear-gradient(135deg, var(--navy), var(--navy-mid));
            padding: 5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .stats-section::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        .stats-inner {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            text-align: center;
        }
        .big-stat { color: white; }
        .big-num {
            font-family: 'DM Serif Display', serif;
            font-size: 3.5rem;
            line-height: 1;
            margin-bottom: .4rem;
            color: white;
        }
        .big-num span { color: var(--gold); }
        .big-label { font-size: .85rem; color: rgba(255,255,255,.55); font-weight: 500; }

        /* ── HOW IT WORKS ── */
        .how-section {
            background: var(--bg-light);
            padding: 6rem 2rem;
        }
        .steps-grid {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            position: relative;
        }
        .steps-grid::before {
            content: '';
            position: absolute;
            top: 32px; left: calc(16.67% + 1rem); right: calc(16.67% + 1rem);
            height: 2px;
            background: linear-gradient(90deg, var(--red-primary), var(--gold));
            z-index: 0;
        }
        .step-card { text-align: center; position: relative; z-index: 1; }
        .step-num {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--red-primary), var(--red-deep));
            color: white;
            font-size: 1.3rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.2rem;
            box-shadow: 0 6px 20px rgba(204,0,0,.35);
            border: 4px solid var(--bg-light);
        }
        .step-title { font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: .5rem; }
        .step-desc { font-size: .85rem; color: var(--text-muted); line-height: 1.6; }

        /* ── CTA SECTION ── */
        .cta-section {
            background: white;
            padding: 6rem 2rem;
        }
        .cta-box {
            max-width: 780px;
            margin: 0 auto;
            background: linear-gradient(135deg, var(--navy), var(--navy-mid));
            border-radius: 24px;
            padding: 4rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .cta-box::before {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(204,0,0,.25) 0%, transparent 70%);
            border-radius: 50%;
        }
        .cta-box .section-title { color: white; text-align: center; position: relative; }
        .cta-box .section-desc { color: rgba(255,255,255,.7); position: relative; margin-bottom: 2.5rem; }
        .cta-buttons { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; position: relative; }
        .cta-btn-white {
            display: inline-flex; align-items: center; gap: 8px;
            background: white; color: var(--navy);
            text-decoration: none; padding: .875rem 2.2rem;
            border-radius: 12px;
            font-size: .95rem; font-weight: 700;
            box-shadow: 0 4px 16px rgba(0,0,0,.15);
            transition: transform .2s, box-shadow .2s;
        }
        .cta-btn-white:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(0,0,0,.25); }

        /* ── FOOTER ── */
        .footer {
            background: var(--navy);
            color: rgba(255,255,255,.6);
            padding: 2.5rem;
            text-align: center;
            font-size: .85rem;
            border-top: 1px solid rgba(255,255,255,.06);
        }
        .footer a { color: rgba(255,255,255,.6); text-decoration: none; }
        .footer a:hover { color: white; }
        .footer-inner { max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: gap; gap: 1rem; }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        /* Observer-based scroll animations */
        .animate-on-scroll { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .animate-on-scroll.visible { opacity: 1; transform: translateY(0); }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .hero-content { grid-template-columns: 1fr; gap: 3rem; }
            .hero-right { display: none; }
            .features-grid { grid-template-columns: 1fr 1fr; }
            .stats-inner { grid-template-columns: 1fr 1fr; }
            .steps-grid { grid-template-columns: 1fr; }
            .steps-grid::before { display: none; }
        }
        @media (max-width: 600px) {
            .features-grid { grid-template-columns: 1fr; }
            .stats-inner { grid-template-columns: 1fr 1fr; }
            .cta-box { padding: 2.5rem 1.5rem; }
        }
    </style>
</head>
<body>

    <!-- ── NAVBAR ── -->
    <header class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <div class="logo-text">
                    <div class="brand">SIAKAD Telkom</div>
                    <div class="sub">Sistem Informasi Akademik</div>
                </div>
            </a>

            <nav class="nav-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-btn-ghost">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-btn-ghost">Masuk</a>
                        
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- ── HERO ── -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-grid"></div>
        <div class="hero-glow-1"></div>
        <div class="hero-glow-2"></div>

        <div class="hero-content">
            <div class="hero-left">
                <div class="hero-badge">Portal Akademik Resmi</div>
                <h1 class="hero-title">
                    Kelola Akademik<br>dengan <span class="accent">Lebih Mudah</span>
                </h1>
                <p class="hero-desc">
                    Platform terintegrasi untuk mahasiswa, dosen, dan staf akademik Telkom University. Akses jadwal, nilai, bimbingan, dan administrasi perkuliahan dalam satu sistem.
                </p>

                @if (!Auth::check())
                    <div class="hero-cta">
                        <a href="{{ route('login') }}" class="cta-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                            </svg>
                            Masuk Sekarang
                        </a>
                        
                    </div>
                @else
                    <div class="hero-cta">
                        <a href="{{ url('/dashboard') }}" class="cta-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                                <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                            </svg>
                            Ke Dashboard
                        </a>
                    </div>
                @endif

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-num">12<span>K+</span></div>
                        <div class="stat-label">Mahasiswa Aktif</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">480<span>+</span></div>
                        <div class="stat-label">Dosen</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-num">99<span>%</span></div>
                        <div class="stat-label">Uptime Sistem</div>
                    </div>
                </div>
            </div>

            <!-- Hero Card Mockup -->
            <div class="hero-right">
                <div class="hero-card">
                    <div class="card-header">
                        <div class="card-avatar">MR</div>
                        <div class="card-user">
                            <div class="name">Muhammad Rizky</div>
                            <div class="role">Mahasiswa — S1 Teknik Informatika</div>
                        </div>
                        <span class="card-badge">● Online</span>
                    </div>

                    <div class="card-modules">
                        <div class="module-item">
                            <div class="module-icon">📅</div>
                            <div class="module-name">Jadwal</div>
                            <div class="module-count">6 Mata Kuliah</div>
                        </div>
                        <div class="module-item">
                            <div class="module-icon">📊</div>
                            <div class="module-name">Nilai</div>
                            <div class="module-count">IPK 3.78</div>
                        </div>
                        <div class="module-item">
                            <div class="module-icon">🎓</div>
                            <div class="module-name">Bimbingan</div>
                            <div class="module-count">3 Sesi</div>
                        </div>
                        <div class="module-item">
                            <div class="module-icon">📝</div>
                            <div class="module-name">Mata Kuliah</div>
                            <div class="module-count">18 SKS</div>
                        </div>
                    </div>

                    <div class="card-activity">
                        <div class="activity-title">Aktivitas Terbaru</div>
                        <div class="activity-list">
                            <div class="activity-row">
                                <div class="activity-dot red"></div>
                                <div class="activity-text">Jadwal Algoritma diperbarui</div>
                                <div class="activity-time">2 mnt lalu</div>
                            </div>
                            <div class="activity-row">
                                <div class="activity-dot gold"></div>
                                <div class="activity-text">Bimbingan TA dijadwalkan</div>
                                <div class="activity-time">1 jam lalu</div>
                            </div>
                            <div class="activity-row">
                                <div class="activity-dot green"></div>
                                <div class="activity-text">Nilai UTS Basis Data masuk</div>
                                <div class="activity-time">3 jam lalu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── FEATURES ── -->
    <section class="features">
        <div class="section-label">Fitur Unggulan</div>
        <h2 class="section-title">Semua yang Anda Butuhkan</h2>
        <p class="section-desc">Dirancang untuk memudahkan pengelolaan akademik secara digital, cepat, dan transparan.</p>

        <div class="features-grid">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon icon-red">📅</div>
                <div class="feature-title">Manajemen Jadwal</div>
                <div class="feature-desc">Kelola jadwal kuliah, ujian, dan kegiatan akademik secara real-time. Notifikasi otomatis jika ada perubahan jadwal.</div>
            </div>
            <div class="feature-card animate-on-scroll" style="transition-delay:.08s">
                <div class="feature-icon icon-blue">🎓</div>
                <div class="feature-title">Data Mahasiswa</div>
                <div class="feature-desc">Profil mahasiswa lengkap, riwayat akademik, dan status kelulusan dapat diakses kapan saja dengan mudah.</div>
            </div>
            <div class="feature-card animate-on-scroll" style="transition-delay:.16s">
                <div class="feature-icon icon-green">👨‍🏫</div>
                <div class="feature-title">Portal Dosen</div>
                <div class="feature-desc">Dosen dapat mengelola mata kuliah, menginput nilai, dan menjadwalkan bimbingan langsung dari dashboard.</div>
            </div>
            <div class="feature-card animate-on-scroll" style="transition-delay:.04s">
                <div class="feature-icon icon-amber">📚</div>
                <div class="feature-title">Mata Kuliah</div>
                <div class="feature-desc">Informasi lengkap setiap mata kuliah: silabus, SKS, kode, dan dosen pengampu tersaji secara terstruktur.</div>
            </div>
            <div class="feature-card animate-on-scroll" style="transition-delay:.12s">
                <div class="feature-icon icon-purple">🤝</div>
                <div class="feature-title">Sistem Bimbingan</div>
                <div class="feature-desc">Penjadwalan bimbingan akademik antara dosen dan mahasiswa berjalan lebih efisien dan terorganisir.</div>
            </div>
            <div class="feature-card animate-on-scroll" style="transition-delay:.2s">
                <div class="feature-icon icon-cyan">🔒</div>
                <div class="feature-title">Keamanan Data</div>
                <div class="feature-desc">Sistem autentikasi berlapis memastikan data akademik Anda terlindungi dan hanya dapat diakses oleh pihak berwenang.</div>
            </div>
        </div>
    </section>

    <!-- ── STATS ── -->
    <section class="stats-section">
        <div class="stats-inner">
            <div class="big-stat animate-on-scroll">
                <div class="big-num">12<span>K</span></div>
                <div class="big-label">Mahasiswa Terdaftar</div>
            </div>
            <div class="big-stat animate-on-scroll" style="transition-delay:.1s">
                <div class="big-num">480<span>+</span></div>
                <div class="big-label">Tenaga Pengajar</div>
            </div>
            <div class="big-stat animate-on-scroll" style="transition-delay:.2s">
                <div class="big-num">320<span>+</span></div>
                <div class="big-label">Mata Kuliah Aktif</div>
            </div>
            <div class="big-stat animate-on-scroll" style="transition-delay:.3s">
                <div class="big-num">99<span>%</span></div>
                <div class="big-label">Uptime Layanan</div>
            </div>
        </div>
    </section>

    <!-- ── HOW IT WORKS ── -->
    <section class="how-section">
        <div class="section-label">Cara Penggunaan</div>
        <h2 class="section-title">Mudah dalam 3 Langkah</h2>
        <p class="section-desc">Mulai gunakan SIAKAD Telkom dengan langkah sederhana dan intuitif.</p>

        <div class="steps-grid">
            <div class="step-card animate-on-scroll">
                <div class="step-num">1</div>
                <div class="step-title">Masuk ke Akun</div>
                <div class="step-desc">Gunakan akun institusi Telkom Anda untuk masuk ke dalam sistem.</div>
            </div>
            <div class="step-card animate-on-scroll" style="transition-delay:.1s">
                <div class="step-num">2</div>
                <div class="step-title">Akses Dashboard</div>
                <div class="step-desc">Setelah masuk, Anda akan diarahkan ke dashboard utama sesuai dengan peran Anda.</div>
            </div>
            <div class="step-card animate-on-scroll" style="transition-delay:.2s">
                <div class="step-num">3</div>
                <div class="step-title">Kelola Akademik</div>
                <div class="step-desc">Nikmati kemudahan mengelola jadwal, nilai, bimbingan, dan seluruh kebutuhan akademik Anda.</div>
            </div>
        </div>
    </section>

    <!-- ── CTA SECTION ── -->
    @if (!Auth::check())
    <section class="cta-section">
        <div class="cta-box">
            <h2 class="section-title">Siap Memulai?</h2>
            <p class="section-desc">Bergabunglah dengan ribuan mahasiswa dan dosen yang telah menggunakan SIAKAD Telkom untuk pengalaman akademik yang lebih baik.</p>
            <div class="cta-buttons">
                <a href="{{ route('login') }}" class="cta-btn-white">
                    Masuk ke Akun →
                </a>
                
            </div>
        </div>
    </section>
    @endif

    <!-- ── FOOTER ── -->
    <footer class="footer">
        <div class="footer-inner">
            <div>
                &copy; {{ date('Y') }} <strong style="color:white">SIAKAD Telkom</strong>. Seluruh hak cipta dilindungi.
            </div>
            <div style="display:flex; gap:1.5rem;">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Bantuan</a>
                <a href="#">Kontak</a>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 20);
        });

        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    observer.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    </script>

</body>
</html>