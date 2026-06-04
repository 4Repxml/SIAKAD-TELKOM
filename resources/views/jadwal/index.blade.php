<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Perkuliahan') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .jd-wrapper { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── HEADER CARD ── */
        .jd-header-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            position: relative; overflow: hidden;
            margin-bottom: 1.75rem;
        }
        .jd-header-card::before {
            content: '';
            position: absolute; top: -60px; right: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(16,185,129,0.3) 0%, transparent 70%);
            border-radius: 50%;
        }
        .jd-header-card::after {
            content: '';
            position: absolute; bottom: -80px; left: 30%;
            width: 300px; height: 200px;
            background: radial-gradient(circle, rgba(6,182,212,0.18) 0%, transparent 70%);
            border-radius: 50%;
        }
        .jd-header-title { font-size: 1.75rem; font-weight: 800; color: #f8fafc; line-height: 1.2; }
        .jd-header-subtitle { color: #94a3b8; font-size: 0.875rem; margin-top: 0.25rem; }
        .jd-header-badge {
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: rgba(16,185,129,0.18); border: 1px solid rgba(16,185,129,0.35);
            color: #6ee7b7; font-size: 0.75rem; font-weight: 600;
            padding: 0.3rem 0.75rem; border-radius: 999px; letter-spacing: 0.03em;
        }

        /* ── STATS ROW ── */
        .jd-stats-row {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 1rem; margin-bottom: 1.75rem;
        }
        .jd-stat-card {
            background: #fff; border: 1px solid #e2e8f0; border-radius: 14px;
            padding: 1.25rem 1.5rem; display: flex; align-items: center; gap: 1rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .jd-stat-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.08); transform: translateY(-2px); }
        .jd-stat-icon {
            width: 44px; height: 44px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; flex-shrink: 0;
        }
        .jd-stat-icon.emerald { background: #ecfdf5; }
        .jd-stat-icon.sky     { background: #f0f9ff; }
        .jd-stat-icon.violet  { background: #f5f3ff; }
        .jd-stat-icon.amber   { background: #fffbeb; }
        .jd-stat-number { font-size: 1.5rem; font-weight: 800; color: #0f172a; line-height: 1; }
        .jd-stat-label  { font-size: 0.75rem; color: #64748b; font-weight: 500; margin-top: 2px; }

        /* ── ALERT ── */
        .jd-alert-success {
            display: flex; align-items: center; gap: 0.6rem;
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #166534; padding: 0.75rem 1rem;
            border-radius: 12px; font-size: 0.875rem; font-weight: 500;
            margin-bottom: 1.25rem;
        }

        /* ── TABLE CARD ── */
        .jd-table-card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 18px; overflow: hidden;
        }
        .jd-card-toolbar {
            padding: 1.25rem 1.5rem; border-bottom: 1px solid #f1f5f9;
            display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;
        }
        .jd-search-wrap {
            position: relative; flex: 1; min-width: 220px; max-width: 380px;
        }
        .jd-search-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: #94a3b8; width: 16px;
        }
        .jd-search-input {
            width: 100%; padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: 0.875rem; font-family: inherit; background: #fff; color: #0f172a;
            outline: none; transition: border-color 0.2s, box-shadow 0.2s;
        }
        .jd-search-input:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16,185,129,0.12); }
        .jd-filter-select {
            padding: 0.625rem 1rem; border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: 0.875rem; font-family: inherit; background: #fff;
            color: #475569; cursor: pointer; outline: none; min-width: 140px;
        }
        .jd-filter-select:focus { border-color: #10b981; }
        .jd-btn-add {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.625rem 1.25rem; border-radius: 12px;
            font-size: 0.875rem; font-weight: 700; font-family: inherit;
            cursor: pointer; border: none; white-space: nowrap; text-decoration: none;
            background: linear-gradient(135deg, #10b981, #0891b2);
            color: #fff;
            box-shadow: 0 4px 14px rgba(16,185,129,0.35);
            transition: all 0.18s;
        }
        .jd-btn-add:hover { box-shadow: 0 6px 20px rgba(16,185,129,0.45); transform: translateY(-1px); }
        .jd-count-info { font-size: 0.78rem; color: #94a3b8; white-space: nowrap; margin-left: auto; }

        /* ── TABLE ── */
        .jd-table { width: 100%; border-collapse: collapse; }
        .jd-table thead { background: #f8fafc; border-bottom: 1.5px solid #e2e8f0; }
        .jd-table thead th {
            padding: 0.875rem 1.25rem; text-align: left;
            font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: #64748b;
        }
        .jd-table tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
        .jd-table tbody tr:last-child { border-bottom: none; }
        .jd-table tbody tr:hover { background: #f0fdf9; }
        .jd-table td { padding: 1rem 1.25rem; font-size: 0.875rem; color: #1e293b; vertical-align: middle; }

        /* MK cell */
        .jd-mk-name { font-weight: 700; color: #0f172a; }
        .jd-kode-badge {
            font-family: 'JetBrains Mono', monospace; font-size: 0.72rem;
            background: #eff6ff; color: #3b82f6; border: 1px solid #bfdbfe;
            padding: 0.15rem 0.5rem; border-radius: 5px; margin-top: 2px;
            display: inline-block;
        }

        /* Dosen cell */
        .jd-dosen-cell { display: flex; align-items: center; gap: 0.65rem; }
        .jd-dosen-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(135deg, #14b8a6, #0891b2);
            color: #fff; font-size: 0.78rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .jd-dosen-name { font-weight: 600; color: #0f172a; font-size: 0.875rem; }

        /* Hari badge */
        .jd-hari-badge {
            display: inline-flex; align-items: center; gap: 0.35rem;
            font-size: 0.8rem; font-weight: 700;
            padding: 0.25rem 0.65rem; border-radius: 8px;
        }
        .jd-hari-senin    { background: #eff6ff; color: #3b82f6; }
        .jd-hari-selasa   { background: #f0fdf4; color: #16a34a; }
        .jd-hari-rabu     { background: #fdf4ff; color: #9333ea; }
        .jd-hari-kamis    { background: #fff7ed; color: #ea580c; }
        .jd-hari-jumat    { background: #fefce8; color: #ca8a04; }
        .jd-hari-sabtu    { background: #f0f9ff; color: #0284c7; }
        .jd-hari-default  { background: #f8fafc; color: #64748b; }
        .jd-jam-text { font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; color: #64748b; margin-top: 2px; }

        /* Ruangan badge */
        .jd-ruangan-badge {
            display: inline-flex; align-items: center; gap: 0.35rem;
            background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;
            font-size: 0.8rem; font-weight: 600;
            padding: 0.25rem 0.65rem; border-radius: 8px;
        }

        /* Actions */
        .jd-actions { display: flex; align-items: center; gap: 0.5rem; justify-content: center; }
        .jd-btn-edit {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #eff6ff; color: #3b82f6; border: 1px solid #bfdbfe;
            padding: 0.3rem 0.7rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600;
            text-decoration: none; transition: all 0.15s;
        }
        .jd-btn-edit:hover { background: #dbeafe; color: #1d4ed8; }
        .jd-btn-delete {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #fff1f2; color: #ef4444; border: 1px solid #fecaca;
            padding: 0.3rem 0.7rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600;
            cursor: pointer; font-family: inherit; transition: all 0.15s;
        }
        .jd-btn-delete:hover { background: #fee2e2; color: #b91c1c; }

        /* Empty */
        .jd-empty { text-align: center; padding: 4rem 1rem; color: #94a3b8; }
        .jd-empty-icon { font-size: 3rem; margin-bottom: 1rem; }
        .jd-empty-title { font-size: 1rem; font-weight: 600; color: #475569; }

        /* Footer */
        .jd-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1rem 1.5rem; border-top: 1px solid #f1f5f9;
            font-size: 0.8rem; color: #94a3b8; flex-wrap: wrap; gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .jd-stats-row { grid-template-columns: repeat(2, 1fr); }
            .jd-header-card { padding: 1.5rem; }
            .jd-header-title { font-size: 1.35rem; }
        }
    </style>

    <div class="jd-wrapper">

        {{-- ── HEADER CARD ── --}}
        <div class="jd-header-card">
            <div style="position:relative;z-index:1;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
                <div>
                    <div class="jd-header-badge" style="margin-bottom:0.6rem;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        SIAKAD · Telkom University
                    </div>
                    <h1 class="jd-header-title">Jadwal Perkuliahan</h1>
                    <p class="jd-header-subtitle">Kelola jadwal mata kuliah, dosen pengampu, dan ruangan kelas.</p>
                </div>
                @can('create', App\Models\Jadwal::class)
                <a href="{{ route('jadwal.create') }}" class="jd-btn-add" style="align-self:center;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Buat Jadwal Baru
                </a>
                @endcan
            </div>
        </div>

        {{-- ── STATS ROW ── --}}
        <div class="jd-stats-row">
            <div class="jd-stat-card">
                <div class="jd-stat-icon emerald">📅</div>
                <div>
                    <div class="jd-stat-number">{{ $jadwals->count() }}</div>
                    <div class="jd-stat-label">Total Jadwal</div>
                </div>
            </div>
            <div class="jd-stat-card">
                <div class="jd-stat-icon sky">📚</div>
                <div>
                    <div class="jd-stat-number">{{ $jadwals->pluck('mata_kuliah_id')->unique()->count() }}</div>
                    <div class="jd-stat-label">Mata Kuliah</div>
                </div>
            </div>
            <div class="jd-stat-card">
                <div class="jd-stat-icon violet">👨‍🏫</div>
                <div>
                    <div class="jd-stat-number">{{ $jadwals->pluck('dosen_id')->unique()->count() }}</div>
                    <div class="jd-stat-label">Dosen Mengajar</div>
                </div>
            </div>
            <div class="jd-stat-card">
                <div class="jd-stat-icon amber">🚪</div>
                <div>
                    <div class="jd-stat-number">{{ $jadwals->pluck('ruangan')->unique()->count() }}</div>
                    <div class="jd-stat-label">Ruangan Dipakai</div>
                </div>
            </div>
        </div>

        {{-- ── ALERT ── --}}
        @if(session('success'))
            <div class="jd-alert-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- ── TABLE CARD ── --}}
        <div class="jd-table-card">

            {{-- Toolbar --}}
            <div class="jd-card-toolbar">
                <div class="jd-search-wrap">
                    <svg class="jd-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="jdSearch" class="jd-search-input" placeholder="Cari mata kuliah atau dosen...">
                </div>
                <select id="jdFilterHari" class="jd-filter-select" onchange="filterJadwal()">
                    <option value="">Semua Hari</option>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                        <option value="{{ $hari }}">{{ $hari }}</option>
                    @endforeach
                </select>
                <div class="jd-count-info" id="jdCount">{{ $jadwals->count() }} jadwal</div>
            </div>

            @if($jadwals->isEmpty())
                <div class="jd-empty">
                    <div class="jd-empty-icon">📭</div>
                    <div class="jd-empty-title">Belum ada jadwal perkuliahan</div>
                    <p style="font-size:0.875rem;margin-top:0.25rem;">Mulai dengan membuat jadwal baru.</p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="jd-table" id="jdTable">
                        <thead>
                            <tr>
                                <th style="width:44px;text-align:center;">#</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen Pengampu</th>
                                <th>Hari & Jam</th>
                                <th>Ruangan</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $i => $j)
                                @php
                                    $initials = collect(explode(' ', $j->dosen->nama_lengkap))
                                        ->take(2)->map(fn($w) => strtoupper(substr($w,0,1)))->join('');
                                    $hariLower = strtolower($j->hari);
                                    $hariClass = match($hariLower) {
                                        'senin'  => 'jd-hari-senin',
                                        'selasa' => 'jd-hari-selasa',
                                        'rabu'   => 'jd-hari-rabu',
                                        'kamis'  => 'jd-hari-kamis',
                                        'jumat'  => 'jd-hari-jumat',
                                        'sabtu'  => 'jd-hari-sabtu',
                                        default  => 'jd-hari-default',
                                    };
                                @endphp
                                <tr>
                                    <td style="text-align:center;color:#94a3b8;font-size:0.78rem;font-weight:500;">{{ $i + 1 }}</td>
                                    <td>
                                        <div class="jd-mk-name">{{ $j->mataKuliah->nama_mk }}</div>
                                        <span class="jd-kode-badge">{{ $j->mataKuliah->kode_mk }}</span>
                                    </td>
                                    <td>
                                        <div class="jd-dosen-cell">
                                            <div class="jd-dosen-avatar">{{ $initials }}</div>
                                            <span class="jd-dosen-name">{{ $j->dosen->nama_lengkap }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="jd-hari-badge {{ $hariClass }}">{{ $j->hari }}</span>
                                        <div class="jd-jam-text">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline;vertical-align:-1px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $j->jam)->format('H:i') }} WIB
                                        </div>
                                    </td>
                                    <td>
                                        <span class="jd-ruangan-badge">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            {{ $j->ruangan }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="jd-actions">
                                            @can('update', $j)
                                            <a href="{{ route('jadwal.edit', $j) }}" class="jd-btn-edit">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                Reschedule
                                            </a>
                                            @endcan
                                            @can('delete', $j)
                                            <form action="{{ route('jadwal.destroy', $j) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan jadwal ini?')" style="margin:0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="jd-btn-delete">
                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                    Batalkan
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

            <div class="jd-footer">
                <span>Menampilkan {{ $jadwals->count() }} jadwal</span>
                <span>SIAKAD · Telkom University</span>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        const jdSearch = document.getElementById('jdSearch');
        const jdFilter = document.getElementById('jdFilterHari');
        const jdCount  = document.getElementById('jdCount');

        function filterJadwal() {
            const kw    = jdSearch.value.toLowerCase();
            const hari  = jdFilter.value.toLowerCase();
            const rows  = document.querySelectorAll('#jdTable tbody tr');
            let visible = 0;

            rows.forEach(row => {
                const text   = row.textContent.toLowerCase();
                const hBadge = row.querySelector('.jd-hari-badge');
                const rowHari = hBadge ? hBadge.textContent.trim().toLowerCase() : '';
                const matched = text.includes(kw) && (!hari || rowHari === hari);
                row.style.display = matched ? '' : 'none';
                if (matched) visible++;
            });

            jdCount.textContent = visible + ' jadwal';
        }

        jdSearch.addEventListener('input', filterJadwal);
    </script>
    @endpush

</x-app-layout>