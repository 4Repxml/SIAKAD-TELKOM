<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .ed-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
            max-width: 760px;
            margin: 0 auto;
        }

        /* === BREADCRUMB === */
        .ed-breadcrumb {
            display: flex; align-items: center; gap: 0.4rem;
            font-size: 0.8rem; color: #94a3b8; margin-bottom: 1.5rem;
        }
        .ed-breadcrumb a {
            color: #0ea5e9; text-decoration: none;
            font-weight: 500; transition: color 0.15s;
        }
        .ed-breadcrumb a:hover { color: #0284c7; }
        .ed-breadcrumb-sep { color: #cbd5e1; }

        /* === CARD === */
        .ed-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Header strip */
        .ed-card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #0f172a 100%);
            padding: 1.75rem 2rem;
            position: relative; overflow: hidden;
            display: flex; align-items: center; gap: 1rem;
        }
        .ed-card-header::before {
            content: '';
            position: absolute; top: -50px; right: -50px;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(56,189,248,0.28) 0%, transparent 70%);
        }
        .ed-card-header::after {
            content: '';
            position: absolute; bottom: -60px; left: 20%;
            width: 260px; height: 160px;
            background: radial-gradient(circle, rgba(99,102,241,0.18) 0%, transparent 70%);
        }
        .ed-card-header-icon {
            width: 48px; height: 48px;
            background: rgba(56,189,248,0.18);
            border: 1px solid rgba(56,189,248,0.35);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; flex-shrink: 0;
            position: relative; z-index: 1;
        }
        .ed-card-header-text { position: relative; z-index: 1; flex: 1; }
        .ed-card-header-title { font-size: 1.1rem; font-weight: 700; color: #f8fafc; }
        .ed-card-header-sub   { font-size: 0.8rem; color: #94a3b8; margin-top: 2px; }
        .ed-current-badge {
            position: relative; z-index: 1;
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: rgba(56,189,248,0.15);
            border: 1px solid rgba(56,189,248,0.3);
            color: #7dd3fc;
            font-size: 0.72rem; font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
            padding: 0.3rem 0.75rem; border-radius: 999px;
            white-space: nowrap; letter-spacing: 0.03em;
        }

        /* Change banner */
        .ed-change-banner {
            display: none; align-items: center; gap: 0.5rem;
            background: #eff6ff; border-bottom: 1px solid #bfdbfe;
            padding: 0.65rem 2rem;
            font-size: 0.8rem; font-weight: 600; color: #1e40af;
        }
        .ed-change-banner.visible { display: flex; }

        /* Form body */
        .ed-card-body { padding: 2rem; }
        .ed-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }
        .ed-field { margin-bottom: 1.25rem; }

        /* Label */
        .ed-label {
            display: block;
            font-size: 0.8rem; font-weight: 700; color: #374151;
            text-transform: uppercase; letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }
        .ed-label-hint {
            font-size: 0.73rem; color: #94a3b8;
            font-weight: 500; text-transform: none; letter-spacing: 0;
            margin-left: 0.4rem;
        }

        /* Input */
        .ed-input-wrap { position: relative; }
        .ed-input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8; pointer-events: none;
            transition: color 0.2s;
        }
        .ed-input-wrap:focus-within .ed-input-icon { color: #0ea5e9; }

        .ed-input {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: 0.9rem; font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            box-sizing: border-box;
        }
        .ed-input:focus {
            border-color: #0ea5e9; background: #fff;
            box-shadow: 0 0 0 3px rgba(14,165,233,0.12);
        }
        .ed-input.changed { border-color: #0ea5e9; background: #f0f9ff; }
        .ed-input.has-error { border-color: #ef4444; background: #fff5f5; }
        .ed-input.has-error:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.12); }
        .ed-input-mono { font-family: 'JetBrains Mono', monospace; font-size: 0.875rem; letter-spacing: 0.04em; }

        /* Select (no icon padding) */
        .ed-select {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: 0.9rem; font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            box-sizing: border-box;
        }
        .ed-select:focus {
            border-color: #0ea5e9; background: #fff;
            box-shadow: 0 0 0 3px rgba(14,165,233,0.12);
        }
        .ed-select.changed { border-color: #0ea5e9; background: #f0f9ff; }

        /* Original hint */
        .ed-original-hint {
            display: none; align-items: center; gap: 0.3rem;
            font-size: 0.73rem; color: #0ea5e9;
            font-weight: 500; margin-top: 0.35rem;
        }
        .ed-original-hint.visible { display: flex; }

        /* Error */
        .ed-error {
            display: flex; align-items: center; gap: 0.35rem;
            color: #ef4444; font-size: 0.75rem; font-weight: 500; margin-top: 0.4rem;
        }

        /* Quick-select buttons for angkatan */
        .ed-quick-grid {
            display: flex; flex-wrap: wrap; gap: 0.4rem;
            margin-top: 0.6rem;
        }
        .ed-quick-btn {
            padding: 0.35rem 0.75rem;
            border: 1.5px solid #e2e8f0; border-radius: 8px;
            font-size: 0.78rem; font-weight: 700; color: #64748b;
            cursor: pointer; background: #fafafa;
            transition: all 0.15s; user-select: none;
        }
        .ed-quick-btn:hover { border-color: #0ea5e9; color: #0284c7; background: #f0f9ff; }
        .ed-quick-btn.active { border-color: #0ea5e9; background: #0ea5e9; color: #fff; }
        .ed-quick-btn.original { border-color: #6366f1; color: #6366f1; }

        /* Divider */
        .ed-divider {
            border: none; border-top: 1px solid #f1f5f9; margin: 1.5rem 0;
        }

        /* Section label */
        .ed-section-label {
            font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 1rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .ed-section-label::after {
            content: ''; flex: 1; height: 1px; background: #f1f5f9;
        }

        /* Diff preview card */
        .ed-diff-card {
            background: #fafafa; border: 1.5px solid #e2e8f0;
            border-radius: 14px; padding: 1.25rem 1.5rem; margin-top: 1.5rem;
        }
        .ed-diff-title { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 0.75rem; }
        .ed-diff-rows  { display: flex; flex-direction: column; gap: 0.5rem; }
        .ed-diff-row   { display: flex; align-items: center; gap: 0.75rem; font-size: 0.83rem; }
        .ed-diff-field { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #94a3b8; width: 100px; flex-shrink: 0; }
        .ed-diff-old   { color: #94a3b8; text-decoration: line-through; font-size: 0.82rem; }
        .ed-diff-arrow { color: #cbd5e1; font-size: 0.75rem; }
        .ed-diff-new   { font-weight: 600; color: #0f172a; }
        .ed-diff-unchanged { color: #64748b; }
        .ed-badge-nim {
            font-family: 'JetBrains Mono', monospace; font-size: 0.75rem;
            background: #f0f9ff; color: #0369a1;
            border: 1px solid #bae6fd; padding: 0.15rem 0.5rem; border-radius: 5px;
        }
        .ed-badge-status {
            display: inline-flex; align-items: center; gap: 0.3rem;
            padding: 0.15rem 0.55rem; border-radius: 999px; font-size: 0.75rem; font-weight: 700;
        }
        .ed-status-aktif  { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .ed-status-cuti   { background: #fffbeb; color: #d97706; border: 1px solid #fde68a; }
        .ed-status-lulus  { background: #f5f3ff; color: #7c3aed; border: 1px solid #ddd6fe; }
        .ed-status-do     { background: #fff1f2; color: #ef4444; border: 1px solid #fecaca; }

        /* Footer */
        .ed-actions {
            display: flex; align-items: center; justify-content: space-between;
            gap: 0.75rem;
            padding: 1.5rem 2rem;
            background: #fafafa; border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
        }
        .ed-btn-cancel {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.25rem; border-radius: 12px;
            font-size: 0.875rem; font-weight: 600; font-family: inherit;
            color: #64748b; background: #f1f5f9;
            border: none; text-decoration: none; cursor: pointer;
            transition: all 0.15s;
        }
        .ed-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .ed-btn-reset {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.1rem; border-radius: 12px;
            font-size: 0.82rem; font-weight: 600; font-family: inherit;
            color: #1e40af; background: #eff6ff;
            border: 1px solid #bfdbfe; cursor: pointer;
            transition: all 0.15s;
        }
        .ed-btn-reset:hover { background: #dbeafe; }
        .ed-btn-save {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.75rem; border-radius: 12px;
            font-size: 0.875rem; font-weight: 700; font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, #0ea5e9, #6366f1);
            border: none; cursor: pointer;
            box-shadow: 0 4px 14px rgba(14,165,233,0.35);
            transition: all 0.18s;
        }
        .ed-btn-save:hover { box-shadow: 0 6px 20px rgba(14,165,233,0.45); transform: translateY(-1px); }
        .ed-btn-right { display: flex; align-items: center; gap: 0.75rem; }

        @media (max-width: 600px) {
            .ed-grid-2 { grid-template-columns: 1fr; }
            .ed-card-body { padding: 1.25rem; }
            .ed-actions { padding: 1rem 1.25rem; }
            .ed-current-badge { display: none; }
        }
    </style>

    <div class="ed-wrapper">

        {{-- Breadcrumb --}}
        <div class="ed-breadcrumb">
            <a href="{{ route('mahasiswa.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Mahasiswa
            </a>
            <span class="ed-breadcrumb-sep">›</span>
            <a href="{{ route('mahasiswa.show', $mahasiswa) }}">{{ $mahasiswa->nama_lengkap }}</a>
            <span class="ed-breadcrumb-sep">›</span>
            <span style="color:#0f172a;font-weight:600;">Edit</span>
        </div>

        <div class="ed-card">

            {{-- Card Header --}}
            <div class="ed-card-header">
                <div class="ed-card-header-icon">✏️</div>
                <div class="ed-card-header-text">
                    <div class="ed-card-header-title">Ubah Data Mahasiswa</div>
                    <div class="ed-card-header-sub">Perbarui informasi akademik mahasiswa yang sudah terdaftar.</div>
                </div>
                <div class="ed-current-badge">{{ $mahasiswa->nim }}</div>
            </div>

            {{-- Change banner --}}
            <div class="ed-change-banner" id="changeBanner">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Ada perubahan yang belum disimpan
            </div>

            <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" id="editForm">
                @csrf
                @method('PATCH')

                <div class="ed-card-body">

                    {{-- Section: Identitas --}}
                    <div class="ed-section-label">Identitas Mahasiswa</div>

                    {{-- Row 1: NIM + Nama --}}
                    <div class="ed-grid-2">
                        {{-- NIM --}}
                        <div class="ed-field">
                            <label class="ed-label" for="nim">NIM <span class="ed-label-hint">— unik</span></label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                <input id="nim" type="text" name="nim"
                                    value="{{ old('nim', $mahasiswa->nim) }}"
                                    autocomplete="off" required
                                    data-original="{{ $mahasiswa->nim }}"
                                    class="ed-input ed-input-mono {{ $errors->has('nim') ? 'has-error' : '' }}"
                                    oninput="onFieldChange(this)">
                            </div>
                            <div class="ed-original-hint" id="hint_nim">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mahasiswa->nim }}</strong>
                            </div>
                            @error('nim')
                                <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nama Lengkap --}}
                        <div class="ed-field">
                            <label class="ed-label" for="nama_lengkap">Nama Lengkap</label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <input id="nama_lengkap" type="text" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}"
                                    required
                                    data-original="{{ $mahasiswa->nama_lengkap }}"
                                    class="ed-input {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}"
                                    oninput="onFieldChange(this)">
                            </div>
                            <div class="ed-original-hint" id="hint_nama_lengkap">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mahasiswa->nama_lengkap }}</strong>
                            </div>
                            @error('nama_lengkap')
                                <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="ed-field">
                        <label class="ed-label" for="email">Email <span class="ed-label-hint">— akun login</span></label>
                        <div class="ed-input-wrap">
                            <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            <input id="email" type="email" name="email"
                                value="{{ old('email', $mahasiswa->user->email) }}"
                                required
                                data-original="{{ $mahasiswa->user->email }}"
                                class="ed-input {{ $errors->has('email') ? 'has-error' : '' }}"
                                oninput="onFieldChange(this)">
                        </div>
                        <div class="ed-original-hint" id="hint_email">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                            Sebelumnya: <strong>{{ $mahasiswa->user->email }}</strong>
                        </div>
                        @error('email')
                            <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="ed-divider">
                    {{-- Section: Akademik --}}
                    <div class="ed-section-label">Informasi Akademik</div>

                    {{-- Row: Prodi + Status --}}
                    <div class="ed-grid-2">
                        {{-- Prodi --}}
                        <div class="ed-field">
                            <label class="ed-label" for="prodi">Program Studi</label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                                <select id="prodi" name="prodi"
                                    data-original="{{ $mahasiswa->prodi }}"
                                    class="ed-select {{ $errors->has('prodi') ? 'has-error' : '' }}"
                                    onchange="onFieldChange(this)">
                                    <option value="S1 Teknik Industri" {{ old('prodi', $mahasiswa->prodi) == 'S1 Teknik Industri' ? 'selected' : '' }}>S1 Teknik Industri</option>
                                    <option value="S1 Sistem Informasi" {{ old('prodi', $mahasiswa->prodi) == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                                    <option value="S1 Manajemen Rekayasa Industri" {{ old('prodi', $mahasiswa->prodi) == 'S1 Manajemen Rekayasa Industri' ? 'selected' : '' }}>S1 Manajemen Rekayasa Industri</option>
                                    <option value="S1 Teknik Logistik" {{ old('prodi', $mahasiswa->prodi) == 'S1 Teknik Logistik' ? 'selected' : '' }}>S1 Teknik Logistik</option>
                                </select>
                            </div>
                            <div class="ed-original-hint" id="hint_prodi">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mahasiswa->prodi }}</strong>
                            </div>
                            @error('prodi')
                                <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="ed-field">
                            <label class="ed-label" for="status">Status Akademik</label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                <select id="status" name="status"
                                    data-original="{{ $mahasiswa->status }}"
                                    class="ed-select {{ $errors->has('status') ? 'has-error' : '' }}"
                                    onchange="onFieldChange(this)">
                                    <option value="Aktif"  {{ old('status', $mahasiswa->status) == 'Aktif'  ? 'selected' : '' }}>Aktif</option>
                                    <option value="Cuti"   {{ old('status', $mahasiswa->status) == 'Cuti'   ? 'selected' : '' }}>Cuti</option>
                                    <option value="Lulus"  {{ old('status', $mahasiswa->status) == 'Lulus'  ? 'selected' : '' }}>Lulus</option>
                                    <option value="DO"     {{ old('status', $mahasiswa->status) == 'DO'     ? 'selected' : '' }}>Drop Out (DO)</option>
                                </select>
                            </div>
                            <div class="ed-original-hint" id="hint_status">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mahasiswa->status }}</strong>
                            </div>
                            @error('status')
                                <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Tahun Angkatan --}}
                    <div class="ed-field">
                        <label class="ed-label" for="tahun_angkatan">Tahun Angkatan</label>
                        <div class="ed-input-wrap" style="max-width:220px;">
                            <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <input id="tahun_angkatan" type="number" name="tahun_angkatan"
                                value="{{ old('tahun_angkatan', $mahasiswa->tahun_angkatan) }}"
                                min="2010" max="{{ date('Y') + 1 }}"
                                required
                                data-original="{{ $mahasiswa->tahun_angkatan }}"
                                class="ed-input {{ $errors->has('tahun_angkatan') ? 'has-error' : '' }}"
                                oninput="syncAngkatanBtns(this.value); onFieldChange(this)">
                        </div>
                        {{-- Quick-select angkatan --}}
                        <div class="ed-quick-grid">
                            @for ($y = date('Y'); $y >= date('Y') - 7; $y--)
                                <div class="ed-quick-btn {{ old('tahun_angkatan', $mahasiswa->tahun_angkatan) == $y ? 'active' : ($mahasiswa->tahun_angkatan == $y ? 'original' : '') }}"
                                    onclick="pickAngkatan({{ $y }})">{{ $y }}</div>
                            @endfor
                        </div>
                        <div class="ed-original-hint" id="hint_tahun_angkatan">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                            Sebelumnya: <strong>Angkatan {{ $mahasiswa->tahun_angkatan }}</strong>
                        </div>
                        @error('tahun_angkatan')
                            <div class="ed-error"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Diff Preview --}}
                    <div class="ed-diff-card" id="diffCard" style="display:none;">
                        <div class="ed-diff-title">📝 Ringkasan Perubahan</div>
                        <div class="ed-diff-rows" id="diffRows"></div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="ed-actions">
                    <a href="{{ route('mahasiswa.index') }}" class="ed-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <div class="ed-btn-right">
                        <button type="button" class="ed-btn-reset" id="resetBtn" style="display:none;" onclick="resetAll()">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.47"/></svg>
                            Reset
                        </button>
                        <button type="submit" class="ed-btn-save">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        const originals = {
            nim:            '{{ $mahasiswa->nim }}',
            nama_lengkap:   '{{ addslashes($mahasiswa->nama_lengkap) }}',
            email:          '{{ $mahasiswa->user->email }}',
            prodi:          '{{ addslashes($mahasiswa->prodi) }}',
            status:         '{{ $mahasiswa->status }}',
            tahun_angkatan: '{{ $mahasiswa->tahun_angkatan }}',
        };

        const labels = {
            nim: 'NIM', nama_lengkap: 'Nama', email: 'Email',
            prodi: 'Prodi', status: 'Status', tahun_angkatan: 'Angkatan',
        };

        function onFieldChange(input) {
            const id      = input.id;
            const val     = input.value.trim();
            const orig    = String(originals[id] || '');
            const changed = val !== orig;

            if (!input.classList.contains('has-error')) {
                input.classList.toggle('changed', changed);
            }
            const hint = document.getElementById('hint_' + id);
            if (hint) hint.classList.toggle('visible', changed);

            refreshState();
        }

        function refreshState() {
            const fields     = ['nim','nama_lengkap','email','prodi','status','tahun_angkatan'];
            const anyChange  = fields.some(f => {
                const el = document.getElementById(f);
                return el && el.value.trim() !== String(originals[f]);
            });

            document.getElementById('changeBanner').classList.toggle('visible', anyChange);
            document.getElementById('resetBtn').style.display = anyChange ? 'inline-flex' : 'none';
            updateDiff(fields, anyChange);
        }

        function updateDiff(fields, anyChange) {
            const card = document.getElementById('diffCard');
            const rows = document.getElementById('diffRows');
            if (!anyChange) { card.style.display = 'none'; return; }

            card.style.display = 'block';
            let html = '';

            fields.forEach(f => {
                const el   = document.getElementById(f);
                if (!el) return;
                const val  = el.value.trim();
                const orig = String(originals[f]);

                if (val === orig) {
                    html += `<div class="ed-diff-row">
                        <span class="ed-diff-field">${labels[f]}</span>
                        <span class="ed-diff-unchanged">${fmtVal(f, orig)}</span>
                    </div>`;
                } else {
                    html += `<div class="ed-diff-row">
                        <span class="ed-diff-field">${labels[f]}</span>
                        <span class="ed-diff-old">${fmtVal(f, orig)}</span>
                        <span class="ed-diff-arrow">→</span>
                        <span class="ed-diff-new">${fmtVal(f, val)}</span>
                    </div>`;
                }
            });

            rows.innerHTML = html;
        }

        function fmtVal(field, val) {
            if (field === 'nim')    return `<span class="ed-badge-nim">${val}</span>`;
            if (field === 'tahun_angkatan') return `Angkatan ${val}`;
            if (field === 'status') {
                const cls = { Aktif:'ed-status-aktif', Cuti:'ed-status-cuti', Lulus:'ed-status-lulus', DO:'ed-status-do' };
                return `<span class="ed-badge-status ${cls[val]||''}">${val}</span>`;
            }
            return val || '<em style="color:#cbd5e1">—</em>';
        }

        function pickAngkatan(val) {
            const el = document.getElementById('tahun_angkatan');
            el.value = val;
            syncAngkatanBtns(val);
            onFieldChange(el);
        }

        function syncAngkatanBtns(val) {
            document.querySelectorAll('.ed-quick-btn').forEach(btn => {
                const v = parseInt(btn.textContent.trim());
                btn.classList.remove('active', 'original');
                if (v === parseInt(val))                    btn.classList.add('active');
                else if (v === parseInt(originals.tahun_angkatan)) btn.classList.add('original');
            });
        }

        function resetAll() {
            ['nim','nama_lengkap','email','prodi','status','tahun_angkatan'].forEach(f => {
                const el = document.getElementById(f);
                if (!el) return;
                el.value = originals[f];
                el.classList.remove('changed');
                const hint = document.getElementById('hint_' + f);
                if (hint) hint.classList.remove('visible');
            });
            syncAngkatanBtns(originals.tahun_angkatan);
            refreshState();
        }

        document.addEventListener('DOMContentLoaded', () => {
            ['nim','nama_lengkap','email','prodi','status','tahun_angkatan'].forEach(f => {
                const el = document.getElementById(f);
                if (el) onFieldChange(el);
            });
        });
    </script>

</x-app-layout>