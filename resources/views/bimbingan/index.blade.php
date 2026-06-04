<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bimbingan Konseling') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap');

        * { box-sizing: border-box; }

        .bim-wrap {
            font-family: 'Sora', sans-serif;
        }

        /* ── HEADER ── */
        .bim-header {
            position: relative;
            border-radius: 22px;
            padding: 2.25rem 2.5rem;
            margin-bottom: 1.75rem;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.25rem;
        }

        /* role-based header backgrounds */
        .bim-header.role-mahasiswa {
            background: linear-gradient(130deg, #0c1445 0%, #1a237e 45%, #0d1b5e 100%);
        }
        .bim-header.role-dosen {
            background: linear-gradient(130deg, #1a0533 0%, #3b1278 45%, #1a0a3d 100%);
        }
        .bim-header.role-admin {
            background: linear-gradient(130deg, #0a1628 0%, #0f3460 45%, #091225 100%);
        }

        /* decorative blobs */
        .bim-header-blob1 {
            position: absolute; top: -70px; right: -70px;
            width: 260px; height: 260px; border-radius: 50%;
            pointer-events: none;
        }
        .role-mahasiswa .bim-header-blob1 { background: radial-gradient(circle, rgba(99,102,241,.4) 0%, transparent 65%); }
        .role-dosen     .bim-header-blob1 { background: radial-gradient(circle, rgba(167,139,250,.4) 0%, transparent 65%); }
        .role-admin     .bim-header-blob1 { background: radial-gradient(circle, rgba(56,189,248,.4) 0%, transparent 65%); }

        .bim-header-blob2 {
            position: absolute; bottom: -80px; left: 28%;
            width: 320px; height: 220px; border-radius: 50%;
            pointer-events: none;
            opacity: .5;
        }
        .role-mahasiswa .bim-header-blob2 { background: radial-gradient(circle, rgba(129,140,248,.3) 0%, transparent 65%); }
        .role-dosen     .bim-header-blob2 { background: radial-gradient(circle, rgba(196,181,253,.25) 0%, transparent 65%); }
        .role-admin     .bim-header-blob2 { background: radial-gradient(circle, rgba(14,165,233,.25) 0%, transparent 65%); }

        .bim-header-left { position: relative; z-index: 1; }
        .bim-role-tag {
            display: inline-flex; align-items: center; gap: .35rem;
            font-size: .7rem; font-weight: 600; letter-spacing: .06em;
            padding: .25rem .75rem; border-radius: 999px; margin-bottom: .6rem;
        }
        .role-mahasiswa .bim-role-tag { background: rgba(99,102,241,.2); border: 1px solid rgba(99,102,241,.4); color: #a5b4fc; }
        .role-dosen     .bim-role-tag { background: rgba(167,139,250,.2); border: 1px solid rgba(167,139,250,.4); color: #c4b5fd; }
        .role-admin     .bim-role-tag { background: rgba(56,189,248,.2);  border: 1px solid rgba(56,189,248,.4);  color: #7dd3fc; }

        .bim-header-title {
            font-size: 1.8rem; font-weight: 800; color: #f8fafc; line-height: 1.15;
        }
        .bim-header-sub { font-size: .85rem; color: #94a3b8; margin-top: .3rem; }

        .bim-btn-ajukan {
            position: relative; z-index: 1;
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .7rem 1.5rem; border-radius: 12px;
            font-size: .875rem; font-weight: 700; font-family: 'Sora', sans-serif;
            color: #fff; border: none; cursor: pointer; text-decoration: none;
            transition: all .2s;
        }
        .role-mahasiswa .bim-btn-ajukan {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            box-shadow: 0 4px 18px rgba(99,102,241,.45);
        }
        .role-mahasiswa .bim-btn-ajukan:hover {
            box-shadow: 0 6px 24px rgba(99,102,241,.58); transform: translateY(-2px);
        }

        /* ── STATS ── */
        .bim-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 1.75rem;
        }
        .bim-stat {
            background: #fff; border: 1px solid #e2e8f0; border-radius: 14px;
            padding: 1.1rem 1.35rem;
            display: flex; align-items: center; gap: .9rem;
            transition: box-shadow .2s, transform .2s;
        }
        .bim-stat:hover { box-shadow: 0 8px 24px rgba(0,0,0,.07); transform: translateY(-2px); }
        .bim-stat-icon {
            width: 42px; height: 42px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem; flex-shrink: 0;
        }
        .si-all     { background: #f0f9ff; }
        .si-pending { background: #fffbeb; }
        .si-approve { background: #f0fdf4; }
        .si-reject  { background: #fff1f2; }
        .bim-stat-num { font-size: 1.45rem; font-weight: 800; color: #0f172a; line-height: 1; }
        .bim-stat-lbl { font-size: .72rem; color: #64748b; font-weight: 500; margin-top: 2px; }

        /* ── ALERTS ── */
        .bim-alert-ok  {
            display: flex; align-items: center; gap: .6rem;
            background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534;
            padding: .75rem 1rem; border-radius: 12px; font-size: .875rem;
            font-weight: 500; margin-bottom: 1.25rem;
        }
        .bim-alert-err {
            display: flex; align-items: center; gap: .6rem;
            background: #fff1f2; border: 1px solid #fecaca; color: #991b1b;
            padding: .75rem 1rem; border-radius: 12px; font-size: .875rem;
            font-weight: 500; margin-bottom: 1.25rem;
        }

        /* ── FILTER BAR ── */
        .bim-filterbar {
            display: flex; align-items: center; gap: .65rem;
            margin-bottom: 1.1rem; flex-wrap: wrap;
        }
        .bim-filter-btn {
            display: inline-flex; align-items: center; gap: .35rem;
            padding: .35rem .9rem; border-radius: 999px;
            font-size: .78rem; font-weight: 600; font-family: 'Sora', sans-serif;
            cursor: pointer; border: 1.5px solid #e2e8f0;
            background: #fff; color: #64748b;
            transition: all .15s;
        }
        .bim-filter-btn:hover    { border-color: #94a3b8; color: #374151; }
        .bim-filter-btn.active   { border-color: #6366f1; background: #6366f1; color: #fff; }
        .bim-filter-dot {
            width: 7px; height: 7px; border-radius: 50%;
        }
        .bim-filter-lbl { font-size: .7rem; color: #94a3b8; font-weight: 500; white-space: nowrap; }

        /* ── CARD wrapper ── */
        .bim-card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 18px; overflow: hidden;
        }
        .bim-card-head {
            padding: 1rem 1.5rem; border-bottom: 1px solid #f1f5f9;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
        }
        .bim-card-head-title {
            font-size: .875rem; font-weight: 700; color: #0f172a;
            display: flex; align-items: center; gap: .45rem;
        }
        .bim-total-pill {
            font-size: .7rem; font-weight: 700; padding: .15rem .55rem;
            border-radius: 999px; background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0;
        }

        /* ── TABLE ── */
        .bim-table { width: 100%; border-collapse: collapse; }
        .bim-table thead {
            background: #f8fafc; border-bottom: 1.5px solid #e2e8f0;
        }
        .bim-table thead th {
            padding: .875rem 1.25rem; text-align: left;
            font-size: .68rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .08em; color: #64748b;
        }
        .bim-table tbody tr {
            border-bottom: 1px solid #f1f5f9; transition: background .15s;
        }
        .bim-table tbody tr:last-child { border-bottom: none; }
        .bim-table tbody tr:hover { background: #fafbff; }
        .bim-table td {
            padding: 1rem 1.25rem; font-size: .875rem;
            color: #1e293b; vertical-align: middle;
        }
        .bim-table tr.hidden-row { display: none; }

        /* Person cell */
        .bim-person {
            display: flex; align-items: center; gap: .65rem;
        }
        .bim-avatar {
            width: 34px; height: 34px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: .78rem; font-weight: 700; color: #fff; flex-shrink: 0;
        }
        .av-mhs  { background: linear-gradient(135deg, #6366f1, #8b5cf6); }
        .av-dsn  { background: linear-gradient(135deg, #0891b2, #0e7490); }
        .bim-person-name { font-weight: 600; color: #0f172a; font-size: .85rem; }

        /* Topik */
        .bim-topik {
            max-width: 220px; font-size: .85rem; color: #334155;
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }

        /* Status badge */
        .bim-status {
            display: inline-flex; align-items: center; gap: .3rem;
            padding: .25rem .75rem; border-radius: 999px;
            font-size: .73rem; font-weight: 700; white-space: nowrap;
        }
        .bim-status-dot { width: 6px; height: 6px; border-radius: 50%; }
        .st-pending  { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .st-pending  .bim-status-dot { background: #f59e0b; }
        .st-approve  { background: #f0fdf4; color: #14532d; border: 1px solid #bbf7d0; }
        .st-approve  .bim-status-dot { background: #22c55e; }
        .st-reject   { background: #fff1f2; color: #881337; border: 1px solid #fecdd3; }
        .st-reject   .bim-status-dot { background: #f43f5e; }

        /* Tanggal */
        .bim-date {
            font-family: 'JetBrains Mono', monospace;
            font-size: .75rem; color: #94a3b8;
        }

        /* Action buttons */
        .bim-acts { display: flex; align-items: center; gap: .4rem; }
        .bim-act-detail {
            display: inline-flex; align-items: center; gap: .28rem;
            background: #f0f9ff; color: #0284c7;
            border: 1px solid #bae6fd; padding: .28rem .65rem;
            border-radius: 7px; font-size: .75rem; font-weight: 600;
            text-decoration: none; transition: all .15s;
        }
        .bim-act-detail:hover { background: #e0f2fe; color: #0369a1; }
        .bim-act-cancel {
            display: inline-flex; align-items: center; gap: .28rem;
            background: #fff1f2; color: #e11d48;
            border: 1px solid #fecdd3; padding: .28rem .65rem;
            border-radius: 7px; font-size: .75rem; font-weight: 600;
            cursor: pointer; font-family: 'Sora', sans-serif;
            transition: all .15s;
        }
        .bim-act-cancel:hover { background: #ffe4e6; color: #be123c; }

        /* Empty state */
        .bim-empty { text-align: center; padding: 4rem 1rem; }
        .bim-empty-icon { font-size: 2.75rem; margin-bottom: .75rem; }
        .bim-empty-title { font-size: 1rem; font-weight: 700; color: #475569; }
        .bim-empty-sub   { font-size: .85rem; color: #94a3b8; margin-top: .25rem; }

        /* Footer */
        .bim-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: .9rem 1.5rem; border-top: 1px solid #f1f5f9;
            font-size: .78rem; color: #94a3b8; flex-wrap: wrap; gap: .5rem;
        }

        /* Role info banner for dosen */
        .bim-info-banner {
            display: flex; align-items: center; gap: .6rem;
            background: #faf5ff; border: 1px solid #e9d5ff; color: #6b21a8;
            padding: .7rem 1rem; border-radius: 12px;
            font-size: .82rem; font-weight: 500; margin-bottom: 1.25rem;
        }

        @media (max-width: 768px) {
            .bim-stats { grid-template-columns: repeat(2, 1fr); }
            .bim-header { padding: 1.5rem; }
            .bim-header-title { font-size: 1.35rem; }
        }
        @media (max-width: 480px) {
            .bim-stats { grid-template-columns: 1fr; }
        }
    </style>

    <div class="bim-wrap">

        @php
            $role = Auth::user()->role;
            $totalAll     = $bimbingans->count();
            $totalPending = $bimbingans->where('status','Pending')->count();
            $totalDisetujui = $bimbingans->where('status','Disetujui')->count();
            $totalDitolak   = $bimbingans->where('status','Ditolak')->count();
        @endphp

        {{-- ── HEADER ── --}}
        <div class="bim-header role-{{ $role }}">
            <div class="bim-header-blob1"></div>
            <div class="bim-header-blob2"></div>
            <div class="bim-header-left">
                <div class="bim-role-tag">
                    @if($role === 'mahasiswa')
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        Mahasiswa · SIAKAD
                    @elseif($role === 'dosen')
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Dosen Wali · SIAKAD
                    @else
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                        Admin · SIAKAD
                    @endif
                </div>
                <h1 class="bim-header-title">Bimbingan Konseling</h1>
                <p class="bim-header-sub">
                    @if($role === 'mahasiswa') Ajukan dan pantau sesi bimbingan dengan dosen wali Anda.
                    @elseif($role === 'dosen')  Tinjau dan respons pengajuan bimbingan dari mahasiswa bimbingan Anda.
                    @else                       Pantau seluruh pengajuan bimbingan lintas dosen dan mahasiswa.
                    @endif
                </p>
            </div>
            @if($role === 'mahasiswa')
                <a href="{{ route('bimbingan.create') }}" class="bim-btn-ajukan">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Ajukan Bimbingan
                </a>
            @endif
        </div>

        {{-- ── STATS ── --}}
        <div class="bim-stats">
            <div class="bim-stat">
                <div class="bim-stat-icon si-all">📋</div>
                <div>
                    <div class="bim-stat-num">{{ $totalAll }}</div>
                    <div class="bim-stat-lbl">Total Pengajuan</div>
                </div>
            </div>
            <div class="bim-stat">
                <div class="bim-stat-icon si-pending">⏳</div>
                <div>
                    <div class="bim-stat-num">{{ $totalPending }}</div>
                    <div class="bim-stat-lbl">Menunggu</div>
                </div>
            </div>
            <div class="bim-stat">
                <div class="bim-stat-icon si-approve">✅</div>
                <div>
                    <div class="bim-stat-num">{{ $totalDisetujui }}</div>
                    <div class="bim-stat-lbl">Disetujui</div>
                </div>
            </div>
            <div class="bim-stat">
                <div class="bim-stat-icon si-reject">❌</div>
                <div>
                    <div class="bim-stat-num">{{ $totalDitolak }}</div>
                    <div class="bim-stat-lbl">Ditolak</div>
                </div>
            </div>
        </div>

        {{-- ── ALERTS ── --}}
        @if(session('success'))
            <div class="bim-alert-ok">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bim-alert-err">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- ── INFO BANNER (dosen) ── --}}
        @if($role === 'dosen')
            <div class="bim-info-banner">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Anda dapat mengubah status dan menambahkan catatan pada setiap pengajuan bimbingan yang masuk.
            </div>
        @endif

        {{-- ── FILTER BAR ── --}}
        @if($totalAll > 0)
        <div class="bim-filterbar">
            <span class="bim-filter-lbl">Filter:</span>
            <button class="bim-filter-btn active" onclick="filterStatus('all', this)">
                Semua <span style="background:#fff3;border-radius:999px;padding:0 5px;font-size:.68rem;">{{ $totalAll }}</span>
            </button>
            <button class="bim-filter-btn" onclick="filterStatus('Pending', this)">
                <span class="bim-filter-dot" style="background:#f59e0b;"></span>
                Pending <span style="background:#fef3c7;color:#92400e;border-radius:999px;padding:0 5px;font-size:.68rem;">{{ $totalPending }}</span>
            </button>
            <button class="bim-filter-btn" onclick="filterStatus('Disetujui', this)">
                <span class="bim-filter-dot" style="background:#22c55e;"></span>
                Disetujui <span style="background:#dcfce7;color:#14532d;border-radius:999px;padding:0 5px;font-size:.68rem;">{{ $totalDisetujui }}</span>
            </button>
            <button class="bim-filter-btn" onclick="filterStatus('Ditolak', this)">
                <span class="bim-filter-dot" style="background:#f43f5e;"></span>
                Ditolak <span style="background:#ffe4e6;color:#881337;border-radius:999px;padding:0 5px;font-size:.68rem;">{{ $totalDitolak }}</span>
            </button>
        </div>
        @endif

        {{-- ── TABLE CARD ── --}}
        <div class="bim-card">
            <div class="bim-card-head">
                <div class="bim-card-head-title">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    Daftar Pengajuan Bimbingan
                    <span class="bim-total-pill" id="visibleCount">{{ $totalAll }} pengajuan</span>
                </div>
            </div>

            @if($bimbingans->isEmpty())
                <div class="bim-empty">
                    <div class="bim-empty-icon">📭</div>
                    <div class="bim-empty-title">Belum ada pengajuan bimbingan</div>
                    <p class="bim-empty-sub">
                        @if($role === 'mahasiswa')
                            Mulai dengan mengajukan bimbingan ke dosen wali.
                        @else
                            Belum ada mahasiswa yang mengajukan bimbingan.
                        @endif
                    </p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="bim-table" id="bimTable">
                        <thead>
                            <tr>
                                <th style="width:44px;text-align:center;">#</th>
                                @if($role !== 'mahasiswa')
                                    <th>Mahasiswa</th>
                                @endif
                                @if($role !== 'dosen')
                                    <th>Dosen Wali</th>
                                @endif
                                <th>Topik</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bimbingans as $i => $b)
                                @php
                                    $mhsInit = collect(explode(' ', $b->mahasiswa->nama_lengkap))->take(2)->map(fn($w)=>strtoupper(substr($w,0,1)))->join('');
                                    $dsnInit = collect(explode(' ', $b->dosen->nama_lengkap))->take(2)->map(fn($w)=>strtoupper(substr($w,0,1)))->join('');
                                    $stClass = match($b->status) {
                                        'Disetujui' => 'st-approve',
                                        'Ditolak'   => 'st-reject',
                                        default     => 'st-pending',
                                    };
                                @endphp
                                <tr data-status="{{ $b->status }}">
                                    <td style="text-align:center;color:#94a3b8;font-size:.78rem;font-weight:600;">{{ $i + 1 }}</td>

                                    @if($role !== 'mahasiswa')
                                        <td>
                                            <div class="bim-person">
                                                <div class="bim-avatar av-mhs">{{ $mhsInit }}</div>
                                                <span class="bim-person-name">{{ $b->mahasiswa->nama_lengkap }}</span>
                                            </div>
                                        </td>
                                    @endif

                                    @if($role !== 'dosen')
                                        <td>
                                            <div class="bim-person">
                                                <div class="bim-avatar av-dsn">{{ $dsnInit }}</div>
                                                <span class="bim-person-name">{{ $b->dosen->nama_lengkap }}</span>
                                            </div>
                                        </td>
                                    @endif

                                    <td>
                                        <span class="bim-topik" title="{{ $b->topik }}">{{ $b->topik }}</span>
                                        @if($b->catatan)
                                            <div style="font-size:.72rem;color:#94a3b8;margin-top:2px;">
                                                💬 {{ Str::limit($b->catatan, 40) }}
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="bim-status {{ $stClass }}">
                                            <span class="bim-status-dot"></span>
                                            {{ $b->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="bim-date">{{ $b->created_at->format('d M Y') }}</span>
                                    </td>

                                    <td>
                                        <div class="bim-acts" style="justify-content:center;">
                                            <a href="{{ route('bimbingan.edit', $b) }}" class="bim-act-detail">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                {{ $role === 'dosen' ? 'Respons' : 'Detail' }}
                                            </a>
                                            @if(Auth::user()->role === 'admin' || (Auth::user()->role === 'mahasiswa' && $b->status === 'Pending'))
                                                <form action="{{ route('bimbingan.destroy', $b) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin membatalkan pengajuan bimbingan ini?')" style="margin:0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bim-act-cancel">
                                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                                                        Batal
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="bim-footer">
                <span id="footerCount">Menampilkan {{ $totalAll }} pengajuan</span>
                <span>SIAKAD · Telkom University</span>
            </div>
        </div>

    </div>

    <script>
        function filterStatus(status, btn) {
            // Toggle active button
            document.querySelectorAll('.bim-filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const rows = document.querySelectorAll('#bimTable tbody tr');
            let visible = 0;
            rows.forEach(row => {
                const rowStatus = row.dataset.status;
                const show = status === 'all' || rowStatus === status;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            // Update count displays
            const label = status === 'all' ? `${visible} pengajuan` : `${visible} pengajuan · ${status}`;
            document.getElementById('visibleCount').textContent = label;
            document.getElementById('footerCount').textContent  = `Menampilkan ${visible} pengajuan`;
        }
    </script>
</x-app-layout>