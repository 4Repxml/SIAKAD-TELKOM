<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Mahasiswa') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .mhs-wrapper { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── HEADER CARD ── */
        .mhs-header-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.75rem;
        }
        .mhs-header-card::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(56,189,248,0.3) 0%, transparent 70%);
            border-radius: 50%;
        }
        .mhs-header-card::after {
            content: '';
            position: absolute;
            bottom: -80px; left: 30%;
            width: 300px; height: 200px;
            background: radial-gradient(circle, rgba(99,102,241,0.18) 0%, transparent 70%);
            border-radius: 50%;
        }
        .mhs-header-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #f8fafc;
            line-height: 1.2;
        }
        .mhs-header-subtitle {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .mhs-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(56,189,248,0.18);
            border: 1px solid rgba(56,189,248,0.35);
            color: #7dd3fc;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 999px;
            letter-spacing: 0.03em;
        }

        /* ── STATS ROW ── */
        .mhs-stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 1.75rem;
        }
        .mhs-stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .mhs-stat-card:hover {
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }
        .mhs-stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .mhs-stat-icon.sky     { background: #f0f9ff; }
        .mhs-stat-icon.amber   { background: #fffbeb; }
        .mhs-stat-icon.violet  { background: #f5f3ff; }
        .mhs-stat-icon.rose    { background: #fff1f2; }
        .mhs-stat-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }
        .mhs-stat-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
            margin-top: 2px;
        }

        /* ── ALERT ── */
        .mhs-alert-success {
            display: flex; align-items: center; gap: 0.6rem;
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #166534; padding: 0.75rem 1rem;
            border-radius: 12px; font-size: 0.875rem;
            font-weight: 500; margin-bottom: 1.25rem;
        }

        /* ── TABLE CARD ── */
        .mhs-table-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
        }

        /* Toolbar inside card */
        .mhs-card-toolbar {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .mhs-search-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
            max-width: 380px;
        }
        .mhs-search-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            width: 16px;
        }
        .mhs-search-input {
            width: 100%;
            padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.875rem;
            font-family: inherit;
            background: #fff;
            color: #0f172a;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .mhs-search-input:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56,189,248,0.12);
        }
        .mhs-filter-select {
            padding: 0.625rem 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.875rem;
            font-family: inherit;
            background: #fff;
            color: #475569;
            cursor: pointer;
            outline: none;
            min-width: 150px;
        }
        .mhs-filter-select:focus { border-color: #38bdf8; }
        .mhs-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.625rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            transition: all 0.18s;
            white-space: nowrap;
            text-decoration: none;
        }
        .mhs-btn-add {
            background: linear-gradient(135deg, #0ea5e9, #6366f1);
            color: #fff;
            box-shadow: 0 4px 14px rgba(14,165,233,0.35);
        }
        .mhs-btn-add:hover {
            box-shadow: 0 6px 20px rgba(14,165,233,0.45);
            transform: translateY(-1px);
        }
        .mhs-count-info {
            font-size: 0.78rem;
            color: #94a3b8;
            white-space: nowrap;
            margin-left: auto;
        }

        /* ── TABLE ── */
        .mhs-table { width: 100%; border-collapse: collapse; }
        .mhs-table thead {
            background: #f8fafc;
            border-bottom: 1.5px solid #e2e8f0;
        }
        .mhs-table thead th {
            padding: 0.875rem 1.25rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
        }
        .mhs-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }
        .mhs-table tbody tr:last-child { border-bottom: none; }
        .mhs-table tbody tr:hover { background: #f8fbff; }
        .mhs-table td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            color: #1e293b;
            vertical-align: middle;
        }

        /* NIM badge */
        .mhs-nim-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            background: #f0f9ff;
            color: #0369a1;
            border: 1px solid #bae6fd;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            letter-spacing: 0.02em;
        }

        /* Avatar + name */
        .mhs-name-cell { display: flex; align-items: center; gap: 0.75rem; }
        .mhs-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .mhs-name-link {
            font-weight: 700;
            color: #0f172a;
            text-decoration: none;
            transition: color 0.15s;
        }
        .mhs-name-link:hover { color: #0ea5e9; }
        .mhs-angkatan {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 1px;
        }

        /* Prodi chip */
        .mhs-prodi-chip {
            display: inline-flex; align-items: center;
            background: #eff6ff; color: #3b82f6;
            border: 1px solid #bfdbfe;
            font-size: 0.78rem; font-weight: 600;
            padding: 0.2rem 0.6rem; border-radius: 6px;
        }

        /* Status badges */
        .mhs-status {
            display: inline-flex; align-items: center; gap: 0.3rem;
            padding: 0.22rem 0.65rem;
            border-radius: 999px;
            font-size: 0.775rem;
            font-weight: 600;
        }
        .mhs-status::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
        }
        .mhs-status-aktif  { background: #f0fdf4; color: #16a34a; }
        .mhs-status-aktif::before  { background: #22c55e; }
        .mhs-status-cuti   { background: #fffbeb; color: #d97706; }
        .mhs-status-cuti::before   { background: #f59e0b; }
        .mhs-status-lulus  { background: #f5f3ff; color: #7c3aed; }
        .mhs-status-lulus::before  { background: #8b5cf6; }
        .mhs-status-do     { background: #fff1f2; color: #ef4444; }
        .mhs-status-do::before     { background: #ef4444; }

        /* Action buttons */
        .mhs-actions { display: flex; align-items: center; gap: 0.5rem; justify-content: center; }
        .mhs-btn-edit {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #eff6ff; color: #3b82f6;
            border: 1px solid #bfdbfe;
            padding: 0.3rem 0.7rem; border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: all 0.15s;
        }
        .mhs-btn-edit:hover { background: #dbeafe; color: #1d4ed8; }
        .mhs-btn-delete {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #fff1f2; color: #ef4444;
            border: 1px solid #fecaca;
            padding: 0.3rem 0.7rem; border-radius: 8px;
            font-size: 0.78rem; font-weight: 600;
            cursor: pointer; font-family: inherit;
            transition: all 0.15s;
        }
        .mhs-btn-delete:hover { background: #fee2e2; color: #b91c1c; }

        /* Empty */
        .mhs-empty { text-align: center; padding: 4rem 1rem; color: #94a3b8; }
        .mhs-empty-icon { font-size: 3rem; margin-bottom: 1rem; }
        .mhs-empty-title { font-size: 1rem; font-weight: 600; color: #475569; }

        /* Footer */
        .mhs-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 1px solid #f1f5f9;
            font-size: 0.8rem; color: #94a3b8;
            flex-wrap: wrap; gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .mhs-stats-row { grid-template-columns: repeat(2, 1fr); }
            .mhs-header-card { padding: 1.5rem; }
            .mhs-header-title { font-size: 1.35rem; }
        }
        @media (max-width: 480px) {
            .mhs-stats-row { grid-template-columns: 1fr; }
        }
    </style>

    <div class="mhs-wrapper">

        {{-- ── HEADER CARD ── --}}
        <div class="mhs-header-card">
            <div style="position:relative;z-index:1;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
                <div>
                    <div class="mhs-header-badge" style="margin-bottom:0.6rem;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        SIAKAD · Telkom University
                    </div>
                    <h1 class="mhs-header-title">Manajemen Mahasiswa</h1>
                    <p class="mhs-header-subtitle">Kelola data mahasiswa, status akademik, dan program studi.</p>
                </div>
                @can('create', App\Models\Mahasiswa::class)
                <a href="{{ route('mahasiswa.create') }}" class="mhs-btn mhs-btn-add" style="align-self:center;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Daftarkan Mahasiswa
                </a>
                @endcan
            </div>
        </div>

        {{-- ── STATS ROW ── --}}
        <div class="mhs-stats-row">
            <div class="mhs-stat-card">
                <div class="mhs-stat-icon sky">🎓</div>
                <div>
                    <div class="mhs-stat-number">{{ $mahasiswas->where('status','Aktif')->count() }}</div>
                    <div class="mhs-stat-label">Mahasiswa Aktif</div>
                </div>
            </div>
            <div class="mhs-stat-card">
                <div class="mhs-stat-icon amber">⏸️</div>
                <div>
                    <div class="mhs-stat-number">{{ $mahasiswas->where('status','Cuti')->count() }}</div>
                    <div class="mhs-stat-label">Sedang Cuti</div>
                </div>
            </div>
            <div class="mhs-stat-card">
                <div class="mhs-stat-icon violet">🏆</div>
                <div>
                    <div class="mhs-stat-number">{{ $mahasiswas->where('status','Lulus')->count() }}</div>
                    <div class="mhs-stat-label">Sudah Lulus</div>
                </div>
            </div>
            <div class="mhs-stat-card">
                <div class="mhs-stat-icon rose">❌</div>
                <div>
                    <div class="mhs-stat-number">{{ $mahasiswas->where('status','DO')->count() }}</div>
                    <div class="mhs-stat-label">Drop Out</div>
                </div>
            </div>
        </div>

        {{-- ── ALERT ── --}}
        @if(session('success'))
            <div class="mhs-alert-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- ── TABLE CARD ── --}}
        <div class="mhs-table-card">

            {{-- Toolbar --}}
            <div class="mhs-card-toolbar">
                <div class="mhs-search-wrap">
                    <svg class="mhs-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="mhsSearch" class="mhs-search-input" placeholder="Cari nama atau NIM...">
                </div>
                <select id="mhsFilterStatus" class="mhs-filter-select" onchange="filterMhs()">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Lulus">Lulus</option>
                    <option value="DO">Drop Out</option>
                </select>
                <div class="mhs-count-info" id="mhsCount">{{ $mahasiswas->count() }} mahasiswa</div>
            </div>

            @if($mahasiswas->isEmpty())
                <div class="mhs-empty">
                    <div class="mhs-empty-icon">🎓</div>
                    <div class="mhs-empty-title">Belum ada data mahasiswa</div>
                    <p style="font-size:0.875rem;margin-top:0.25rem;">Mulai dengan mendaftarkan mahasiswa baru.</p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="mhs-table" id="mhsTable">
                        <thead>
                            <tr>
                                <th style="width:44px;text-align:center;">#</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Studi</th>
                                <th>Status</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswas as $i => $mhs)
                                @php
                                    $initials = collect(explode(' ', $mhs->nama_lengkap))
                                        ->take(2)->map(fn($w) => strtoupper(substr($w,0,1)))->join('');
                                    $statusClass = match($mhs->status) {
                                        'Aktif' => 'mhs-status-aktif',
                                        'Cuti'  => 'mhs-status-cuti',
                                        'Lulus' => 'mhs-status-lulus',
                                        'DO'    => 'mhs-status-do',
                                        default => 'mhs-status-aktif',
                                    };
                                @endphp
                                <tr>
                                    <td style="text-align:center;color:#94a3b8;font-size:0.78rem;font-weight:500;">{{ $i + 1 }}</td>
                                    <td><span class="mhs-nim-badge">{{ $mhs->nim }}</span></td>
                                    <td>
                                        <div class="mhs-name-cell">
                                            <div class="mhs-avatar">{{ $initials }}</div>
                                            <div>
                                                <a href="{{ route('mahasiswa.show', $mhs) }}" class="mhs-name-link">{{ $mhs->nama_lengkap }}</a>
                                                <div class="mhs-angkatan">Angkatan {{ $mhs->tahun_angkatan }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mhs-prodi-chip">{{ $mhs->prodi }}</span></td>
                                    <td><span class="mhs-status {{ $statusClass }}">{{ $mhs->status }}</span></td>
                                    <td>
                                        <div class="mhs-actions">
                                            @can('update', $mhs)
                                            <a href="{{ route('mahasiswa.edit', $mhs) }}" class="mhs-btn-edit">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                Ubah
                                            </a>
                                            @endcan
                                            @can('delete', $mhs)
                                            <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mahasiswa {{ addslashes($mhs->nama_lengkap) }}?')" style="margin:0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mhs-btn-delete">
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

            <div class="mhs-footer">
                <span>Menampilkan {{ $mahasiswas->count() }} mahasiswa</span>
                <span>SIAKAD · Telkom University</span>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        const mhsSearch = document.getElementById('mhsSearch');
        const mhsFilter = document.getElementById('mhsFilterStatus');
        const mhsCount  = document.getElementById('mhsCount');

        function filterMhs() {
            const kw     = mhsSearch.value.toLowerCase();
            const status = mhsFilter.value.toLowerCase();
            const rows   = document.querySelectorAll('#mhsTable tbody tr');
            let visible  = 0;

            rows.forEach(row => {
                const text    = row.textContent.toLowerCase();
                const badge   = row.querySelector('.mhs-status');
                const rowSts  = badge ? badge.textContent.trim().toLowerCase() : '';
                const matched = text.includes(kw) && (!status || rowSts === status);
                row.style.display = matched ? '' : 'none';
                if (matched) visible++;
            });

            mhsCount.textContent = visible + ' mahasiswa';
        }

        mhsSearch.addEventListener('input', filterMhs);
    </script>
    @endpush
</x-app-layout>