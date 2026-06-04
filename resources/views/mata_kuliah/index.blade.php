<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Mata Kuliah') }}
        </h2>
    </x-slot>

    {{-- Inline styles untuk design custom --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .mk-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* === HEADER CARD === */
        .mk-header-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 1.75rem;
        }
        .mk-header-card::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(99,102,241,0.35) 0%, transparent 70%);
            border-radius: 50%;
        }
        .mk-header-card::after {
            content: '';
            position: absolute;
            bottom: -80px; left: 30%;
            width: 300px; height: 200px;
            background: radial-gradient(circle, rgba(16,185,129,0.18) 0%, transparent 70%);
            border-radius: 50%;
        }
        .mk-header-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #f8fafc;
            line-height: 1.2;
        }
        .mk-header-subtitle {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .mk-header-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(99,102,241,0.2);
            border: 1px solid rgba(99,102,241,0.4);
            color: #a5b4fc;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 999px;
            letter-spacing: 0.03em;
        }

        /* === STATS ROW === */
        .mk-stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.75rem;
        }
        .mk-stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .mk-stat-card:hover {
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }
        .mk-stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }
        .mk-stat-icon.blue   { background: #eff6ff; }
        .mk-stat-icon.violet { background: #f5f3ff; }
        .mk-stat-icon.emerald{ background: #ecfdf5; }
        .mk-stat-number {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }
        .mk-stat-label {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 500;
            margin-top: 2px;
        }

        /* === TOOLBAR === */
        .mk-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }
        .mk-search-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
            max-width: 380px;
        }
        .mk-search-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            width: 16px;
        }
        .mk-search-input {
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
        .mk-search-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }
        .mk-btn {
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
        }
        .mk-btn-search {
            background: #f1f5f9;
            color: #475569;
        }
        .mk-btn-search:hover { background: #e2e8f0; }
        .mk-btn-add {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff;
            box-shadow: 0 4px 14px rgba(99,102,241,0.35);
        }
        .mk-btn-add:hover {
            box-shadow: 0 6px 20px rgba(99,102,241,0.45);
            transform: translateY(-1px);
        }

        /* === ALERT === */
        .mk-alert-success {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
        }

        /* === TABLE CARD === */
        .mk-table-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
        }
        .mk-table {
            width: 100%;
            border-collapse: collapse;
        }
        .mk-table thead {
            background: #f8fafc;
            border-bottom: 1.5px solid #e2e8f0;
        }
        .mk-table thead th {
            padding: 0.875rem 1.25rem;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
        }
        .mk-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }
        .mk-table tbody tr:last-child { border-bottom: none; }
        .mk-table tbody tr:hover { background: #fafbff; }
        .mk-table td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            color: #1e293b;
            vertical-align: middle;
        }

        /* Kode MK badge */
        .mk-kode-badge {
            display: inline-flex;
            align-items: center;
            background: #eff6ff;
            color: #3b82f6;
            border: 1px solid #bfdbfe;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            letter-spacing: 0.02em;
        }

        /* SKS pill */
        .mk-sks-pill {
            display: inline-flex;
            align-items: center;
            background: #f0fdf4;
            color: #059669;
            border: 1px solid #a7f3d0;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.2rem 0.7rem;
            border-radius: 999px;
        }

        /* Semester badge */
        .mk-semester-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
        }

        /* Action buttons */
        .mk-action-wrap { display: flex; align-items: center; gap: 0.5rem; }
        .mk-action-edit {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #eff6ff; color: #3b82f6;
            border: 1px solid #bfdbfe;
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
        }
        .mk-action-edit:hover { background: #dbeafe; color: #1d4ed8; }
        .mk-action-delete {
            display: inline-flex; align-items: center; gap: 0.3rem;
            background: #fff1f2; color: #ef4444;
            border: 1px solid #fecaca;
            padding: 0.3rem 0.75rem;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            font-family: inherit;
        }
        .mk-action-delete:hover { background: #fee2e2; color: #b91c1c; }

        /* Empty state */
        .mk-empty {
            text-align: center;
            padding: 4rem 1rem;
            color: #94a3b8;
        }
        .mk-empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .mk-empty-title {
            font-size: 1rem;
            font-weight: 600;
            color: #475569;
        }
        .mk-empty-desc {
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Pagination area */
        .mk-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            border-top: 1px solid #f1f5f9;
            font-size: 0.8rem;
            color: #94a3b8;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        @media (max-width: 640px) {
            .mk-stats-row { grid-template-columns: 1fr; }
            .mk-toolbar { flex-direction: column; align-items: stretch; }
            .mk-search-wrap { max-width: 100%; }
            .mk-header-card { padding: 1.5rem; }
            .mk-header-title { font-size: 1.35rem; }
        }
    </style>

    <div class="mk-wrapper">

        {{-- ===== HEADER CARD ===== --}}
        <div class="mk-header-card">
            <div style="position:relative;z-index:1;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
                <div>
                    <div class="mk-header-badge" style="margin-bottom:0.6rem;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        SIAKAD · Telkom University
                    </div>
                    <h1 class="mk-header-title">Manajemen Mata Kuliah</h1>
                    <p class="mk-header-subtitle">Kelola data mata kuliah, SKS, dan semester kurikulum.</p>
                </div>
                @can('create', App\Models\MataKuliah::class)
                <a href="{{ route('mata-kuliah.create') }}" class="mk-btn mk-btn-add" style="align-self:center;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah Mata Kuliah
                </a>
                @endcan
            </div>
        </div>

        {{-- ===== STATS ===== --}}
        <div class="mk-stats-row">
            <div class="mk-stat-card">
                <div class="mk-stat-icon blue">📚</div>
                <div>
                    <div class="mk-stat-number">{{ $mataKuliahs->count() }}</div>
                    <div class="mk-stat-label">Total Mata Kuliah</div>
                </div>
            </div>
            <div class="mk-stat-card">
                <div class="mk-stat-icon emerald">🎯</div>
                <div>
                    <div class="mk-stat-number">{{ $mataKuliahs->sum('sks') }}</div>
                    <div class="mk-stat-label">Total SKS</div>
                </div>
            </div>
            <div class="mk-stat-card">
                <div class="mk-stat-icon violet">📅</div>
                <div>
                    <div class="mk-stat-number">{{ $mataKuliahs->pluck('semester')->unique()->count() }}</div>
                    <div class="mk-stat-label">Semester Aktif</div>
                </div>
            </div>
        </div>

        {{-- ===== SUCCESS ALERT ===== --}}
        @if(session('success'))
            <div class="mk-alert-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- ===== TABLE CARD ===== --}}
        <div class="mk-table-card">

            {{-- Toolbar --}}
            <div style="padding:1.25rem 1.5rem;border-bottom:1px solid #f1f5f9;">
                <div class="mk-toolbar" style="margin:0;">
                    <form action="{{ route('mata-kuliah.index') }}" method="GET" style="display:flex;align-items:center;gap:0.6rem;flex:1;flex-wrap:wrap;">
                        <div class="mk-search-wrap">
                            <svg class="mk-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            <input
                                type="text"
                                name="search"
                                placeholder="Cari kode atau nama mata kuliah..."
                                value="{{ $search ?? '' }}"
                                class="mk-search-input"
                            >
                        </div>
                        <button type="submit" class="mk-btn mk-btn-search">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            Cari
                        </button>
                        @if($search ?? '')
                            <a href="{{ route('mata-kuliah.index') }}" class="mk-btn" style="background:#fff1f2;color:#ef4444;font-size:0.8rem;padding:0.55rem 0.9rem;">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                Reset
                            </a>
                        @endif
                    </form>
                    <div style="font-size:0.78rem;color:#94a3b8;white-space:nowrap;">
                        {{ $mataKuliahs->count() }} mata kuliah
                    </div>
                </div>
            </div>

            {{-- Table --}}
            @if($mataKuliahs->isEmpty())
                <div class="mk-empty">
                    <div class="mk-empty-icon">📭</div>
                    <div class="mk-empty-title">Tidak ada mata kuliah ditemukan</div>
                    <p class="mk-empty-desc">
                        @if($search ?? '')
                            Hasil pencarian untuk <strong>"{{ $search }}"</strong> tidak ditemukan.
                        @else
                            Belum ada data mata kuliah. Mulai dengan menambahkan mata kuliah baru.
                        @endif
                    </p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="mk-table">
                        <thead>
                            <tr>
                                <th style="width:48px;text-align:center;">#</th>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th style="text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mataKuliahs as $index => $mk)
                                <tr>
                                    <td style="text-align:center;color:#94a3b8;font-size:0.78rem;font-weight:500;">{{ $index + 1 }}</td>
                                    <td>
                                        <span class="mk-kode-badge">{{ $mk->kode_mk }}</span>
                                    </td>
                                    <td>
                                        <span style="font-weight:600;color:#0f172a;">{{ $mk->nama_mk }}</span>
                                    </td>
                                    <td>
                                        <span class="mk-sks-pill">{{ $mk->sks }} SKS</span>
                                    </td>
                                    <td>
                                        <span class="mk-semester-badge">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:#6366f1;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                            Semester {{ $mk->semester }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="mk-action-wrap" style="justify-content:center;">
                                            @can('update', $mk)
                                            <a href="{{ route('mata-kuliah.edit', $mk) }}" class="mk-action-edit">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                                Ubah
                                            </a>
                                            @endcan
                                            @can('delete', $mk)
                                            <form action="{{ route('mata-kuliah.destroy', $mk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah {{ addslashes($mk->nama_mk) }}?')" style="margin:0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mk-action-delete">
                                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                    Hapus
                                                </button>
                                            </form>
                                            @endcan
                                            @if(!auth()->user()->can('update', $mk) && !auth()->user()->can('delete', $mk))
                                                <span class="text-xs text-gray-400">Read-only</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- Footer --}}
            <div class="mk-footer">
                <span>Menampilkan {{ $mataKuliahs->count() }} data</span>
                <span>SIAKAD · Telkom University</span>
            </div>
        </div>

    </div>
</x-app-layout>