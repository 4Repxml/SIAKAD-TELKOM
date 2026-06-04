<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        :root {
            --red: #CC0000; --red-deep: #990000; --red-soft: #FFF0F0;
            --navy: #0B1F3A; --navy-mid: #1A3560;
            --gold: #F5A623; --gold-soft: #FFFBEB;
            --green: #16A34A; --green-soft: #F0FDF4;
            --blue: #1D4ED8; --blue-soft: #EFF6FF;
            --text: #111827; --muted: #6B7280;
            --border: #E5E7EB; --bg: #F3F4F8;
        }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            color: white;
        }
        .welcome-banner::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }
        .welcome-banner .glow {
            position: absolute;
            top: -60px; right: -40px;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(204,0,0,.35) 0%, transparent 65%);
            border-radius: 50%;
        }
        .welcome-inner { position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem; }
        .welcome-text .greeting { font-size: .8rem; font-weight: 600; color: rgba(255,255,255,.5); letter-spacing: .5px; text-transform: uppercase; margin-bottom: .35rem; }
        .welcome-text h1 { font-family: 'DM Serif Display', serif; font-size: 1.75rem; color: white; margin-bottom: .35rem; }
        .welcome-text span { font-style: italic; color: var(--gold); }
        .welcome-text p { font-size: .875rem; color: rgba(255,255,255,.6); }
        .welcome-date {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 14px;
            padding: 1rem 1.5rem;
            text-align: center;
        }
        .welcome-date .day { font-size: 2.5rem; font-weight: 800; line-height: 1; color: white; }
        .welcome-date .month-year { font-size: .78rem; color: rgba(255,255,255,.5); margin-top: .25rem; }

        /* Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: transform .25s, box-shadow .25s;
            animation: fadeUp .5s ease both;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0,0,0,.09); }
        .stat-card:nth-child(2) { animation-delay: .07s; }
        .stat-card:nth-child(3) { animation-delay: .14s; }
        .stat-card:nth-child(4) { animation-delay: .21s; }

        .stat-card .accent-bar {
            position: absolute; top: 0; left: 0; right: 0; height: 3px;
            border-radius: 16px 16px 0 0;
        }
        .stat-card.red .accent-bar { background: linear-gradient(90deg, var(--red), var(--red-deep)); }
        .stat-card.blue .accent-bar { background: linear-gradient(90deg, var(--blue), #3B82F6); }
        .stat-card.green .accent-bar { background: linear-gradient(90deg, var(--green), #22C55E); }
        .stat-card.gold .accent-bar { background: linear-gradient(90deg, var(--gold), #FBBF24); }

        .stat-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; }
        .stat-icon {
            width: 44px; height: 44px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
        }
        .stat-icon.red { background: var(--red-soft); }
        .stat-icon.blue { background: var(--blue-soft); }
        .stat-icon.green { background: var(--green-soft); }
        .stat-icon.gold { background: var(--gold-soft); }

        .stat-badge {
            font-size: .7rem; font-weight: 600;
            padding: .2rem .55rem; border-radius: 100px;
        }
        .stat-badge.up { background: var(--green-soft); color: var(--green); }
        .stat-badge.neutral { background: var(--blue-soft); color: var(--blue); }

        .stat-num { font-size: 2rem; font-weight: 800; color: var(--navy); line-height: 1; margin-bottom: .3rem; }
        .stat-label { font-size: .82rem; color: var(--muted); font-weight: 500; }
        .stat-sub { font-size: .72rem; color: var(--muted); margin-top: .4rem; }

        /* Main grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.5rem;
        }

        /* Section card */
        .section-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            animation: fadeUp .5s .2s ease both;
        }
        .card-head {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
        }
        .card-title { font-size: .95rem; font-weight: 700; color: var(--navy); display: flex; align-items: center; gap: 8px; }
        .card-title svg { width: 17px; height: 17px; color: var(--red); }
        .card-action {
            font-size: .78rem; font-weight: 600; color: var(--red);
            text-decoration: none;
        }
        .card-action:hover { text-decoration: underline; }

        /* Quick Menu */
        .quick-grid {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: .75rem;
        }
        .quick-item {
            display: flex; flex-direction: column; align-items: center; gap: .6rem;
            padding: 1.25rem .75rem;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            text-decoration: none;
            transition: background .2s, border-color .2s, transform .2s;
            text-align: center;
        }
        .quick-item:hover { background: var(--red-soft); border-color: rgba(204,0,0,.2); transform: translateY(-2px); }
        .quick-item:hover .quick-icon { background: linear-gradient(135deg, var(--red), var(--red-deep)); color: white; }
        .quick-icon {
            width: 44px; height: 44px; border-radius: 12px;
            background: white;
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            transition: background .2s, color .2s;
        }
        .quick-label { font-size: .75rem; font-weight: 600; color: var(--navy); }

        /* Table styles */
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table th {
            padding: .75rem 1.5rem;
            text-align: left;
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px;
            color: var(--muted);
            background: #FAFAFA;
            border-bottom: 1px solid var(--border);
        }
        .data-table td {
            padding: .875rem 1.5rem;
            font-size: .85rem;
            color: var(--text);
            border-bottom: 1px solid #F3F4F6;
        }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:hover td { background: #FAFAFA; }

        .badge {
            display: inline-flex; align-items: center;
            font-size: .7rem; font-weight: 600;
            padding: .2rem .65rem; border-radius: 100px;
        }
        .badge-green { background: var(--green-soft); color: var(--green); }
        .badge-red { background: var(--red-soft); color: var(--red); }
        .badge-yellow { background: #FFFBEB; color: #B45309; }
        .badge-blue { background: var(--blue-soft); color: var(--blue); }

        /* Right column */
        .right-col { display: flex; flex-direction: column; gap: 1.5rem; }

        /* Activity feed */
        .activity-list { padding: .5rem 0; }
        .activity-item {
            display: flex; align-items: flex-start; gap: 12px;
            padding: .875rem 1.5rem;
            border-bottom: 1px solid #F3F4F6;
            transition: background .15s;
        }
        .activity-item:last-child { border-bottom: none; }
        .activity-item:hover { background: #FAFAFA; }
        .activity-dot {
            width: 8px; height: 8px; border-radius: 50%;
            margin-top: 5px; flex-shrink: 0;
        }
        .activity-dot.red { background: var(--red); }
        .activity-dot.green { background: var(--green); }
        .activity-dot.gold { background: var(--gold); }
        .activity-dot.blue { background: var(--blue); }
        .activity-body { flex: 1; }
        .activity-text { font-size: .82rem; color: var(--text); line-height: 1.4; }
        .activity-time { font-size: .7rem; color: var(--muted); margin-top: .2rem; }

        /* Mini calendar week */
        .week-strip { padding: 1.25rem 1.5rem; display: flex; gap: .5rem; justify-content: space-between; }
        .day-pill {
            flex: 1; text-align: center; padding: .6rem .3rem;
            border-radius: 10px;
            font-size: .72rem;
        }
        .day-pill .day-name { font-weight: 600; color: var(--muted); display: block; margin-bottom: .3rem; }
        .day-pill .day-num { font-weight: 800; font-size: .9rem; color: var(--navy); display: block; }
        .day-pill.today { background: linear-gradient(135deg, var(--red), var(--red-deep)); }
        .day-pill.today .day-name, .day-pill.today .day-num { color: white; }
        .day-pill.has-event .day-num::after {
            content: ''; display: block; width: 4px; height: 4px;
            background: var(--red); border-radius: 50%;
            margin: 2px auto 0;
        }
        .day-pill.today .day-num::after { background: white; }

        /* Empty state */
        .empty-state { padding: 2.5rem; text-align: center; color: var(--muted); font-size: .875rem; }
        .empty-state .icon { font-size: 2rem; margin-bottom: .75rem; }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 900px) {
            .dashboard-grid { grid-template-columns: 1fr; }
            .right-col { display: contents; }
        }
        @media (max-width: 640px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: .75rem; }
            .quick-grid { grid-template-columns: repeat(3, 1fr); }
            .welcome-banner { padding: 1.5rem; }
        }
    </style>

    <!-- ── WELCOME BANNER ── -->
    <div class="welcome-banner" style="animation: fadeUp .4s ease both;">
        <div class="glow"></div>
        <div class="welcome-inner">
            <div class="welcome-text">
                <div class="greeting">Selamat Datang Kembali</div>
                <h1>Halo, {{ Auth::user()->name }} 👋</h1>
                <p>Berikut ringkasan aktivitas akademik hari ini di SIAKAD Telkom.</p>
            </div>
            <div class="welcome-date" id="date-display">
                <div class="day" id="clock-day">—</div>
                <div class="month-year" id="clock-date">—</div>
            </div>
        </div>
    </div>

    <!-- ── STAT CARDS ── -->
    <div class="stats-grid">
        <div class="stat-card red">
            <div class="accent-bar"></div>
            <div class="stat-header">
                <div class="stat-icon red">📚</div>
                <span class="stat-badge neutral">Aktif</span>
            </div>
            <div class="stat-num" id="count-mk">—</div>
            <div class="stat-label">Mata Kuliah</div>
            <div class="stat-sub">Semester berjalan</div>
        </div>
        <div class="stat-card blue">
            <div class="accent-bar"></div>
            <div class="stat-header">
                <div class="stat-icon blue">👨‍🏫</div>
                <span class="stat-badge up">Terdaftar</span>
            </div>
            <div class="stat-num" id="count-dosen">—</div>
            <div class="stat-label">Dosen</div>
            <div class="stat-sub">Pengajar aktif</div>
        </div>
        <div class="stat-card green">
            <div class="accent-bar"></div>
            <div class="stat-header">
                <div class="stat-icon green">🎓</div>
                <span class="stat-badge up">Aktif</span>
            </div>
            <div class="stat-num" id="count-mhs">—</div>
            <div class="stat-label">Mahasiswa</div>
            <div class="stat-sub">Mahasiswa terdaftar</div>
        </div>
        <div class="stat-card gold">
            <div class="accent-bar"></div>
            <div class="stat-header">
                <div class="stat-icon gold">📅</div>
                <span class="stat-badge neutral">Terjadwal</span>
            </div>
            <div class="stat-num" id="count-jadwal">—</div>
            <div class="stat-label">Jadwal Kuliah</div>
            <div class="stat-sub">Sesi per minggu</div>
        </div>
    </div>

    <!-- ── MAIN GRID ── -->
    <div class="dashboard-grid">

        <!-- LEFT: Quick Menu + Jadwal Table -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">

            <!-- Quick Access -->
            <div class="section-card">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/>
                        </svg>
                        Akses Cepat
                    </div>
                </div>
                <div class="quick-grid">
                    @can('viewAny', App\Models\MataKuliah::class)
                    <a href="{{ route('mata-kuliah.index') }}" class="quick-item">
                        <div class="quick-icon">📚</div>
                        <span class="quick-label">Mata Kuliah</span>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\Jadwal::class)
                    <a href="{{ route('jadwal.index') }}" class="quick-item">
                        <div class="quick-icon">📅</div>
                        <span class="quick-label">Jadwal</span>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\Bimbingan::class)
                    <a href="{{ route('bimbingan.index') }}" class="quick-item">
                        <div class="quick-icon">🤝</div>
                        <span class="quick-label">Bimbingan</span>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\Mahasiswa::class)
                    <a href="{{ route('mahasiswa.index') }}" class="quick-item">
                        <div class="quick-icon">🎓</div>
                        <span class="quick-label">Mahasiswa</span>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\Dosen::class)
                    <a href="{{ route('dosen.index') }}" class="quick-item">
                        <div class="quick-icon">👨‍🏫</div>
                        <span class="quick-label">Dosen</span>
                    </a>
                    @endcan
                    <a href="{{ route('profile.edit') }}" class="quick-item">
                        <div class="quick-icon">⚙️</div>
                        <span class="quick-label">Profil</span>
                    </a>
                </div>
            </div>

            <!-- Jadwal Terbaru -->
            <div class="section-card" style="animation-delay:.28s">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        Jadwal Perkuliahan
                    </div>
                    <a href="{{ route('jadwal.index') }}" class="card-action">Lihat Semua →</a>
                </div>
                @php
                    $user = auth()->user();
                    $j_query = \App\Models\Jadwal::with(['mataKuliah', 'dosen']);
                    if ($user->role === 'dosen') {
                        $j_query->where('dosen_id', $user->dosen->id);
                    }
                    $jadwals = $j_query->latest()->take(5)->get();
                @endphp
                @if($jadwals->isEmpty())
                    <div class="empty-state">
                        <div class="icon">📭</div>
                        Belum ada jadwal terdaftar.
                        <br><a href="{{ route('jadwal.create') }}" style="color:var(--red);font-weight:600;">Buat jadwal baru →</a>
                    </div>
                @else
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>Hari & Jam</th>
                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $j)
                                <tr>
                                    <td>
                                        <div style="font-weight:600;">{{ $j->mataKuliah->nama_mk ?? '-' }}</div>
                                        <div style="font-size:.72rem;color:var(--muted);">{{ $j->mataKuliah->kode_mk ?? '' }}</div>
                                    </td>
                                    <td>{{ $j->dosen->nama_lengkap ?? '-' }}</td>
                                    <td>
                                        <span class="badge badge-blue">{{ $j->hari }}</span>
                                        <span style="font-size:.78rem;margin-left:.4rem;">{{ $j->jam }}</span>
                                    </td>
                                    <td style="font-weight:500;">{{ $j->ruangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Mahasiswa Terbaru -->
            <div class="section-card" style="animation-delay:.35s">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                        Mahasiswa Terbaru
                    </div>
                    <a href="{{ route('mahasiswa.index') }}" class="card-action">Lihat Semua →</a>
                </div>
                @php
                    $mahasiswas = \App\Models\Mahasiswa::latest()->take(5)->get();
                @endphp
                @if($mahasiswas->isEmpty())
                    <div class="empty-state">
                        <div class="icon">🎓</div>
                        Belum ada data mahasiswa.
                    </div>
                @else
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswas as $mhs)
                                <tr>
                                    <td style="font-family:monospace;font-size:.8rem;">{{ $mhs->nim }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.show', $mhs) }}" style="font-weight:600;color:var(--navy);text-decoration:none;">
                                            {{ $mhs->nama_lengkap }}
                                        </a>
                                    </td>
                                    <td style="font-size:.8rem;">{{ $mhs->prodi }}</td>
                                    <td>
                                        <span class="badge {{ $mhs->status == 'Aktif' ? 'badge-green' : ($mhs->status == 'DO' ? 'badge-red' : 'badge-yellow') }}">
                                            {{ $mhs->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="right-col">

            <!-- Week strip -->
            <div class="section-card" style="animation-delay:.1s">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                        </svg>
                        Minggu Ini
                    </div>
                </div>
                <div class="week-strip" id="week-strip">
                    <!-- generated by JS -->
                </div>
            </div>

            <!-- Bimbingan Status -->
            <div class="section-card" style="animation-delay:.18s">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        Status Bimbingan
                    </div>
                    <a href="{{ route('bimbingan.index') }}" class="card-action">Semua →</a>
                </div>
                @php
                    $bimbingans = \App\Models\Bimbingan::with(['mahasiswa','dosen'])->latest()->take(5)->get();
                @endphp
                @if($bimbingans->isEmpty())
                    <div class="empty-state">
                        <div class="icon">🤝</div>
                        Belum ada pengajuan bimbingan.
                    </div>
                @else
                    <div class="activity-list">
                        @foreach($bimbingans as $b)
                            <div class="activity-item">
                                <div class="activity-dot {{ $b->status == 'Disetujui' ? 'green' : ($b->status == 'Ditolak' ? 'red' : 'gold') }}"></div>
                                <div class="activity-body">
                                    <div class="activity-text" style="font-weight:600;">{{ $b->mahasiswa->nama_lengkap ?? '-' }}</div>
                                    <div class="activity-text" style="color:var(--muted);">{{ Str::limit($b->topik, 40) }}</div>
                                    <div style="margin-top:.35rem;">
                                        <span class="badge {{ $b->status == 'Disetujui' ? 'badge-green' : ($b->status == 'Ditolak' ? 'badge-red' : 'badge-yellow') }}">
                                            {{ $b->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Dosen Terbaru -->
            <div class="section-card" style="animation-delay:.25s">
                <div class="card-head">
                    <div class="card-title">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                        </svg>
                        Dosen
                    </div>
                    <a href="{{ route('dosen.index') }}" class="card-action">Semua →</a>
                </div>
                @php
                    $dosens = \App\Models\Dosen::with('user')->latest()->take(4)->get();
                @endphp
                @if($dosens->isEmpty())
                    <div class="empty-state">
                        <div class="icon">👨‍🏫</div>
                        Belum ada data dosen.
                    </div>
                @else
                    <div class="activity-list">
                        @foreach($dosens as $d)
                            <div class="activity-item">
                                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#CC0000,#F5A623);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:800;color:white;flex-shrink:0;">
                                    {{ strtoupper(substr($d->nama_lengkap, 0, 2)) }}
                                </div>
                                <div class="activity-body">
                                    <div class="activity-text" style="font-weight:600;">{{ $d->nama_lengkap }}</div>
                                    <div class="activity-time">{{ $d->nidn }} · {{ $d->user->email ?? '' }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // ── Clock & Date ──
        function updateClock() {
            const now = new Date();
            const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            const months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            const dayEl = document.getElementById('clock-day');
            const dateEl = document.getElementById('clock-date');
            if(dayEl) dayEl.textContent = now.getDate();
            if(dateEl) dateEl.textContent = days[now.getDay()] + ', ' + months[now.getMonth()] + ' ' + now.getFullYear();
        }
        updateClock();
        setInterval(updateClock, 60000);

        // ── Week Strip ──
        (function() {
            const strip = document.getElementById('week-strip');
            if(!strip) return;
            const now = new Date();
            const todayIdx = now.getDay(); // 0=Sun
            const dayNames = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
            const hasEvent = [1, 3, 5]; // Mon, Wed, Fri have events (demo)

            for (let i = 0; i < 7; i++) {
                const d = new Date(now);
                d.setDate(now.getDate() - todayIdx + i);
                const isToday = (i === todayIdx);
                const pill = document.createElement('div');
                pill.className = 'day-pill' + (isToday ? ' today' : '') + (hasEvent.includes(i) ? ' has-event' : '');
                pill.innerHTML = `<span class="day-name">${dayNames[i]}</span><span class="day-num">${d.getDate()}</span>`;
                strip.appendChild(pill);
            }
        })();

        // ── Stat counters ──
        @php
            $user = auth()->user();
            if ($user->role === 'dosen') {
                $countMk = \App\Models\MataKuliah::where('dosen_id', $user->dosen->id)->count();
                $countJadwal = \App\Models\Jadwal::where('dosen_id', $user->dosen->id)->count();
                $countMhs = \App\Models\Mahasiswa::count(); // Lecturers see all students?
                $countDosen = \App\Models\Dosen::count();
            } else {
                $countMk = \App\Models\MataKuliah::count();
                $countJadwal = \App\Models\Jadwal::count();
                $countMhs = \App\Models\Mahasiswa::count();
                $countDosen = \App\Models\Dosen::count();
            }
        @endphp
        document.getElementById('count-mk').textContent     = '{{ $countMk }}';
        document.getElementById('count-dosen').textContent  = '{{ $countDosen }}';
        document.getElementById('count-mhs').textContent    = '{{ $countMhs }}';
        document.getElementById('count-jadwal').textContent = '{{ $countJadwal }}';

        // ── Animated count-up ──
        document.querySelectorAll('.stat-num').forEach(el => {
            const target = parseInt(el.textContent) || 0;
            let current = 0;
            const step = Math.max(1, Math.floor(target / 30));
            const timer = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = current;
                if (current >= target) clearInterval(timer);
            }, 30);
        });
    </script>
    @endpush
</x-app-layout>
