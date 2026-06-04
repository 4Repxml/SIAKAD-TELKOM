<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Direktori Dosen') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .ds-wrapper { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── HEADER CARD ── */
        .ds-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 55%, #0f172a 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .ds-header::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 240px; height: 240px;
            background: radial-gradient(circle, rgba(20,184,166,0.3) 0%, transparent 70%);
        }
        .ds-header::after {
            content: '';
            position: absolute;
            bottom: -80px; left: 25%;
            width: 300px; height: 200px;
            background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%);
        }
        .ds-header-left { position: relative; z-index: 1; }
        .ds-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(20,184,166,0.18);
            border: 1px solid rgba(20,184,166,0.35);
            color: #5eead4;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.28rem 0.7rem;
            border-radius: 999px;
            letter-spacing: 0.04em;
            margin-bottom: 0.6rem;
        }
        .ds-header-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #f8fafc;
            line-height: 1.2;
        }
        .ds-header-sub {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .ds-btn-add {
            position: relative; z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.65rem 1.4rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 700;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, #14b8a6, #0891b2);
            border: none;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(20,184,166,0.4);
            transition: all 0.18s;
            white-space: nowrap;
        }
        .ds-btn-add:hover {
            box-shadow: 0 6px 20px rgba(20,184,166,0.5);
            transform: translateY(-1px);
        }

        /* ── STATS ── */
        .ds-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.75rem;
        }
        .ds-stat {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .ds-stat:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.07); transform: translateY(-2px); }
        .ds-stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; flex-shrink: 0;
        }
        .ds-stat-icon.teal    { background: #f0fdfa; }
        .ds-stat-icon.cyan    { background: #ecfeff; }
        .ds-stat-icon.sky     { background: #f0f9ff; }
        .ds-stat-num  { font-size: 1.5rem; font-weight: 800; color: #0f172a; line-height: 1; }
        .ds-stat-lbl  { font-size: 0.75rem; color: #64748b; font-weight: 500; margin-top: 2px; }

        /* ── ALERT ── */
        .ds-alert {
            display: flex; align-items: center; gap: 0.6rem;
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #166534; padding: 0.75rem 1rem;
            border-radius: 12px; font-size: 0.875rem;
            font-weight: 500; margin-bottom: 1.25rem;
        }

        /* ── TABLE CARD ── */
        .ds-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
        }
        .ds-card-toolbar {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .ds-toolbar-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #0f172a;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .ds-count-pill {
            background: #f0fdfa;
            color: #0d9488;
            border: 1px solid #99f6e4;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.15rem 0.55rem;
            border-radius: 999px;
        }

        /* Table */
        .ds-table { width: 100%; border-collapse: collapse; }
        .ds-table thead {
            background: #f8fafc;
            border-bottom: 1.5px solid #e2e8f0;
        }
        .ds-table thead th {
            padding: 0.875rem 1.25rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
        }
        .ds-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }
        .ds-table tbody tr:last-child { border-bottom: none; }
        .ds-table tbody tr:hover { background: #f8fffe; }
        .ds-table td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            color: #1e293b;
            vertical-align: middle;
        }

        /* Avatar */
        .ds-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #14b8a6, #0891b2);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            letter-spacing: 0.02em;
        }
        .ds-name-cell {
            display: flex; align-items: center; gap: 0.75rem;
        }
        .ds-name-link {
            font-weight: 700;
            color: #0f172a;
            text-decoration: none;
            transition: color 0.15s;
        }
        .ds-name-link:hover { color: #0d9488; }

        /* NIDN badge */
        .ds-nidn-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            background: #f0fdfa;
            color: #0d9488;
            border: 1px solid #99f6e4;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            letter-spacing: 0.02em;
        }

        /* Email */
        .ds-email {
            display: inline-flex; align-items: center; gap: 0.35rem;
            font-size: 0.825rem; color: #64748b;
        }

        /* Phone */
        .ds-phone {
            display: inline-flex; align-items: center; gap: 0.35rem;
            font-size: 0.825rem; color: #64748b;
            font-family: 'JetBrains Mono', monospace;
        }

        /* Actions */
        .ds-actions { display: flex; align-items: center; gap: 0.5rem; }
        .ds-btn-detail {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #f0fdfa; color: #0d9488;
            border: 1px solid #99f6e4;
            padding: 0.3rem 0.7rem; border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: all 0.15s;
        }
        .ds-btn-detail:hover { background: #ccfbf1; color: #0f766e; }
        .ds-btn-edit {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #eff6ff; color: #3b82f6;
            border: 1px solid #bfdbfe;
            padding: 0.3rem 0.7rem; border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: all 0.15s;
        }
        .ds-btn-edit:hover { background: #dbeafe; color: #1d4ed8; }
        .ds-btn-delete {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #fff1f2; color: #ef4444;
            border: 1px solid #fecaca;
            padding: 0.3rem 0.7rem; border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            cursor: pointer; font-family: inherit;
            transition: all 0.15s;
        }
        .ds-btn-delete:hover { background: #fee2e2; color: #b91c1c; }

        /* Empty */
        .ds-empty { text-align: center; padding: 4rem 1rem; color: #94a3b8; }
        .ds-empty-icon { font-size: 3rem; margin-bottom: 1rem; }
        .ds-empty-title { font-size: 1rem; font-weight: 600; color: #475569; }

        /* Footer */
        .ds-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 1px solid #f1f5f9;
            font-size: 0.8rem; color: #94a3b8;
            flex-wrap: wrap; gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .ds-stats { grid-template-columns: 1fr; }
            .ds-header { padding: 1.5rem; }
            .ds-header-title { font-size: 1.35rem; }
        }
    </style>

    <div class="ds-wrapper">

        {{-- ── HEADER ── --}}
        <div class="ds-header">
            <div class="ds-header-left">
                <div class="ds-header-badge">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    SIAKAD · Telkom University
                </div>
                <h1 class="ds-header-title">Direktori Dosen</h1>
                <p class="ds-header-sub">Kelola data dosen, NIDN, kontak, dan akun sistem.</p>
            </div>
            @can('create', App\Models\Dosen::class)
            <a href="{{ route('dosen.create') }}" class="ds-btn-add">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Dosen
            </a>
            @endcan
        </div>

        {{-- ── STATS ── --}}
        <div class="ds-stats">
            <div class="ds-stat">
                <div class="ds-stat-icon teal">👨‍🏫</div>
                <div>
                    <div class="ds-stat-num">{{ $dosens->count() }}</div>
                    <div class="ds-stat-lbl">Total Dosen</div>
                </div>
            </div>
            <div class="ds-stat">
                <div class="ds-stat-icon cyan">🎓</div>
                <div>
                    <div class="ds-stat-num">{{ $dosens->count() }}</div>
                    <div class="ds-stat-lbl">Akun Aktif</div>
                </div>
            </div>
            <div class="ds-stat">
                <div class="ds-stat-icon sky">📋</div>
                <div>
                    <div class="ds-stat-num">{{ $dosens->whereNotNull('nidn')->count() }}</div>
                    <div class="ds-stat-lbl">Terverifikasi NIDN</div>
                </div>
            </div>
        </div>

        {{-- ── ALERT ── --}}
        @if(session('success'))
            <div class="ds-alert">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- ── TABLE CARD ── --}}
        <div class="ds-card">
            <div class="ds-card-toolbar">
                <div class="ds-toolbar-title">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Daftar Dosen
                    <span class="ds-count-pill">{{ $dosens->count() }} dosen</span>
                </div>
            </div>

            @if($dosens->isEmpty())
                <div class="ds-empty">
                    <div class="ds-empty-icon">👨‍🏫</div>
                    <div class="ds-empty-title">Belum ada data dosen</div>
                    <p style="font-size:0.875rem;margin-top:0.25rem;">Mulai dengan menambahkan dosen baru.</p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="ds-table">
                        <thead>
                            <tr>
                                <th style="width:44px;text-align:center;">#</th>
                                <th>Nama Dosen</th>
                                <th>NIDN</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dosens as $i => $dosen)
                                @php
                                    $initials = collect(explode(' ', $dosen->nama_lengkap))
                                        ->take(2)->map(fn($w) => strtoupper(substr($w,0,1)))->join('');
                                @endphp
                                <tr>
                                    <td style="text-align:center;color:#94a3b8;font-size:0.78rem;font-weight:500;">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="ds-name-cell">
                                            <div class="ds-avatar">{{ $initials }}</div>
                                            <a href="{{ route('dosen.show', $dosen) }}" class="ds-name-link">
                                                {{ $dosen->nama_lengkap }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="ds-nidn-badge">{{ $dosen->nidn }}</span>
                                    </td>
                                    <td>
                                        <span class="ds-email">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                            {{ $dosen->user->email }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="ds-phone">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6 6l.91-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
                                            {{ $dosen->no_hp }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="ds-actions" style="justify-content:center;">
                                            <a href="{{ route('dosen.show', $dosen) }}" class="ds-btn-detail">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                                Detail
                                            </a>
                                            @can('update', $dosen)
                                            <a href="{{ route('dosen.edit', $dosen) }}" class="ds-btn-edit">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                Ubah
                                            </a>
                                            @endcan
                                            @can('delete', $dosen)
                                            <form action="{{ route('dosen.destroy', $dosen) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen {{ addslashes($dosen->nama_lengkap) }}?')" style="margin:0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ds-btn-delete">
                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="ds-footer">
                <span>Menampilkan {{ $dosens->count() }} dosen</span>
                <span>SIAKAD · Telkom University</span>
            </div>
        </div>

    </div>
</x-app-layout>