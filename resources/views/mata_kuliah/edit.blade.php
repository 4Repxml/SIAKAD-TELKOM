<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Mata Kuliah') }}
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
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #94a3b8;
            margin-bottom: 1.5rem;
        }
        .ed-breadcrumb a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.15s;
        }
        .ed-breadcrumb a:hover { color: #4f46e5; }
        .ed-breadcrumb-sep { color: #cbd5e1; }

        /* === CARD === */
        .ed-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Header strip — amber/orange tone to distinguish from "create" */
        .ed-card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1c1917 60%, #0f172a 100%);
            padding: 1.75rem 2rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .ed-card-header::before {
            content: '';
            position: absolute;
            top: -50px; right: -50px;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(245,158,11,0.28) 0%, transparent 70%);
        }
        .ed-card-header::after {
            content: '';
            position: absolute;
            bottom: -60px; left: 20%;
            width: 260px; height: 160px;
            background: radial-gradient(circle, rgba(249,115,22,0.15) 0%, transparent 70%);
        }
        .ed-card-header-icon {
            width: 48px; height: 48px;
            background: rgba(245,158,11,0.18);
            border: 1px solid rgba(245,158,11,0.35);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
            position: relative; z-index: 1;
        }
        .ed-card-header-text { position: relative; z-index: 1; flex: 1; }
        .ed-card-header-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #f8fafc;
        }
        .ed-card-header-sub {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 2px;
        }
        .ed-current-badge {
            position: relative; z-index: 1;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(245,158,11,0.15);
            border: 1px solid rgba(245,158,11,0.3);
            color: #fcd34d;
            font-size: 0.72rem;
            font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
            padding: 0.3rem 0.75rem;
            border-radius: 999px;
            white-space: nowrap;
            letter-spacing: 0.03em;
        }

        /* Change indicator banner */
        .ed-change-banner {
            display: none;
            align-items: center;
            gap: 0.5rem;
            background: #fffbeb;
            border-bottom: 1px solid #fde68a;
            padding: 0.65rem 2rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: #92400e;
        }
        .ed-change-banner.visible { display: flex; }

        /* Form body */
        .ed-card-body { padding: 2rem; }

        .ed-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .ed-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }
        .ed-label-hint {
            font-size: 0.73rem;
            color: #94a3b8;
            font-weight: 500;
            text-transform: none;
            letter-spacing: 0;
            margin-left: 0.4rem;
        }

        .ed-input-wrap { position: relative; }
        .ed-input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            transition: color 0.2s;
        }
        .ed-input-wrap:focus-within .ed-input-icon { color: #f59e0b; }

        .ed-input {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 2.6rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.9rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a;
            background: #fafafa;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            box-sizing: border-box;
        }
        .ed-input:focus {
            border-color: #f59e0b;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(245,158,11,0.12);
        }
        .ed-input.changed {
            border-color: #f59e0b;
            background: #fffbeb;
        }
        .ed-input.has-error {
            border-color: #ef4444;
            background: #fff5f5;
        }
        .ed-input.has-error:focus {
            box-shadow: 0 0 0 3px rgba(239,68,68,0.12);
        }
        .ed-input-mono {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            letter-spacing: 0.04em;
        }

        /* Original value hint */
        .ed-original-hint {
            display: none;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.73rem;
            color: #f59e0b;
            font-weight: 500;
            margin-top: 0.35rem;
        }
        .ed-original-hint.visible { display: flex; }

        .ed-error {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            color: #ef4444;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 0.4rem;
        }

        /* Quick-select buttons */
        .ed-sks-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 0.4rem;
            margin-top: 0.6rem;
            max-width: 320px;
        }
        .ed-sem-grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 0.4rem;
            margin-top: 0.6rem;
            max-width: 320px;
        }
        .ed-quick-btn {
            padding: 0.4rem 0;
            text-align: center;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            background: #fafafa;
            transition: all 0.15s;
            user-select: none;
        }
        .ed-quick-btn:hover {
            border-color: #f59e0b;
            color: #b45309;
            background: #fffbeb;
        }
        .ed-quick-btn.active {
            border-color: #f59e0b;
            background: #f59e0b;
            color: #fff;
        }
        .ed-quick-btn.original {
            border-color: #6366f1;
            color: #6366f1;
        }

        /* Preview / diff card */
        .ed-diff-card {
            background: #fafafa;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            margin-top: 1.5rem;
        }
        .ed-diff-title {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #94a3b8;
            margin-bottom: 0.75rem;
        }
        .ed-diff-rows { display: flex; flex-direction: column; gap: 0.5rem; }
        .ed-diff-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.83rem;
        }
        .ed-diff-field {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #94a3b8;
            width: 80px;
            flex-shrink: 0;
        }
        .ed-diff-old {
            color: #94a3b8;
            text-decoration: line-through;
            font-size: 0.82rem;
        }
        .ed-diff-arrow { color: #cbd5e1; font-size: 0.75rem; }
        .ed-diff-new { font-weight: 600; color: #0f172a; }
        .ed-diff-unchanged { color: #64748b; }
        .ed-badge-kode {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            background: #eff6ff;
            color: #3b82f6;
            border: 1px solid #bfdbfe;
            padding: 0.15rem 0.5rem;
            border-radius: 5px;
        }
        .ed-badge-sks {
            background: #f0fdf4;
            color: #059669;
            border: 1px solid #a7f3d0;
            padding: 0.15rem 0.5rem;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        /* Footer */
        .ed-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            padding: 1.5rem 2rem;
            background: #fafafa;
            border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
        }
        .ed-btn-cancel {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem; font-weight: 600;
            font-family: inherit;
            color: #64748b; background: #f1f5f9;
            border: none; text-decoration: none; cursor: pointer;
            transition: all 0.15s;
        }
        .ed-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .ed-btn-reset {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.1rem;
            border-radius: 12px;
            font-size: 0.82rem; font-weight: 600;
            font-family: inherit;
            color: #92400e; background: #fffbeb;
            border: 1px solid #fde68a; cursor: pointer;
            transition: all 0.15s;
        }
        .ed-btn-reset:hover { background: #fef3c7; }
        .ed-btn-save {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.75rem;
            border-radius: 12px;
            font-size: 0.875rem; font-weight: 700;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, #f59e0b, #f97316);
            border: none; cursor: pointer;
            box-shadow: 0 4px 14px rgba(245,158,11,0.35);
            transition: all 0.18s;
        }
        .ed-btn-save:hover {
            box-shadow: 0 6px 20px rgba(245,158,11,0.45);
            transform: translateY(-1px);
        }
        .ed-btn-save:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        .ed-btn-right { display: flex; align-items: center; gap: 0.75rem; }

        @media (max-width: 600px) {
            .ed-grid-2 { grid-template-columns: 1fr; }
            .ed-sks-grid { grid-template-columns: repeat(4, 1fr); }
            .ed-sem-grid { grid-template-columns: repeat(4, 1fr); }
            .ed-card-body { padding: 1.25rem; }
            .ed-actions { padding: 1rem 1.25rem; }
            .ed-current-badge { display: none; }
        }
    </style>

    <div class="ed-wrapper">

        {{-- Breadcrumb --}}
        <div class="ed-breadcrumb">
            <a href="{{ route('mata-kuliah.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                Mata Kuliah
            </a>
            <span class="ed-breadcrumb-sep">›</span>
            <span>Edit</span>
            <span class="ed-breadcrumb-sep">›</span>
            <span style="color:#0f172a;font-weight:600;">{{ $mataKuliah->kode_mk }}</span>
        </div>

        <div class="ed-card">

            {{-- Card Header --}}
            <div class="ed-card-header">
                <div class="ed-card-header-icon">✏️</div>
                <div class="ed-card-header-text">
                    <div class="ed-card-header-title">Ubah Mata Kuliah</div>
                    <div class="ed-card-header-sub">Perbarui data mata kuliah yang sudah terdaftar di sistem.</div>
                </div>
                <div class="ed-current-badge">
                    {{ $mataKuliah->kode_mk }}
                </div>
            </div>

            {{-- Change warning banner --}}
            <div class="ed-change-banner" id="changeBanner">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Ada perubahan yang belum disimpan
            </div>

            <form action="{{ route('mata-kuliah.update', $mataKuliah) }}" method="POST" id="editForm">
                @csrf
                @method('PATCH')

                <div class="ed-card-body">

                    {{-- Row 1: Kode + Nama --}}
                    <div class="ed-grid-2" style="margin-bottom:1.25rem;">

                        {{-- Kode MK --}}
                        <div>
                            <label class="ed-label" for="kode_mk">
                                Kode MK
                                <span class="ed-label-hint">— unik</span>
                            </label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                <input
                                    id="kode_mk"
                                    type="text"
                                    name="kode_mk"
                                    value="{{ old('kode_mk', $mataKuliah->kode_mk) }}"
                                    autocomplete="off"
                                    required
                                    data-original="{{ $mataKuliah->kode_mk }}"
                                    class="ed-input ed-input-mono {{ $errors->has('kode_mk') ? 'has-error' : '' }}"
                                    oninput="onFieldChange(this)"
                                >
                            </div>
                            <div class="ed-original-hint" id="hint_kode_mk">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mataKuliah->kode_mk }}</strong>
                            </div>
                            @error('kode_mk')
                                <div class="ed-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Nama MK --}}
                        <div>
                            <label class="ed-label" for="nama_mk">Nama Mata Kuliah</label>
                            <div class="ed-input-wrap">
                                <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                <input
                                    id="nama_mk"
                                    type="text"
                                    name="nama_mk"
                                    value="{{ old('nama_mk', $mataKuliah->nama_mk) }}"
                                    required
                                    data-original="{{ $mataKuliah->nama_mk }}"
                                    class="ed-input {{ $errors->has('nama_mk') ? 'has-error' : '' }}"
                                    oninput="onFieldChange(this)"
                                >
                            </div>
                            <div class="ed-original-hint" id="hint_nama_mk">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Sebelumnya: <strong>{{ $mataKuliah->nama_mk }}</strong>
                            </div>
                            @error('nama_mk')
                                <div class="ed-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- SKS --}}
                    <div style="margin-bottom:1.25rem;">
                        <label class="ed-label" for="sks">
                            Jumlah SKS
                            <span class="ed-label-hint">— Satuan Kredit Semester</span>
                        </label>
                        <div class="ed-input-wrap" style="max-width:200px;">
                            <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <input
                                id="sks"
                                type="number"
                                name="sks"
                                value="{{ old('sks', $mataKuliah->sks) }}"
                                min="1" max="6"
                                required
                                data-original="{{ $mataKuliah->sks }}"
                                class="ed-input {{ $errors->has('sks') ? 'has-error' : '' }}"
                                oninput="syncSksButtons(this.value); onFieldChange(this)"
                            >
                        </div>
                        <div class="ed-sks-grid">
                            @foreach([1,2,3,4,5,6] as $s)
                                <div
                                    class="ed-quick-btn {{ old('sks', $mataKuliah->sks) == $s ? 'active' : ($mataKuliah->sks == $s ? 'original' : '') }}"
                                    onclick="pickSks({{ $s }})"
                                >{{ $s }}</div>
                            @endforeach
                        </div>
                        <div class="ed-original-hint" id="hint_sks">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                            Sebelumnya: <strong>{{ $mataKuliah->sks }} SKS</strong>
                        </div>
                        @error('sks')
                            <div class="ed-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Semester --}}
                    <div>
                        <label class="ed-label" for="semester">
                            Semester
                            <span class="ed-label-hint">— 1 s/d 8</span>
                        </label>
                        <div class="ed-input-wrap" style="max-width:200px;">
                            <svg class="ed-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <input
                                id="semester"
                                type="number"
                                name="semester"
                                value="{{ old('semester', $mataKuliah->semester) }}"
                                min="1" max="8"
                                required
                                data-original="{{ $mataKuliah->semester }}"
                                class="ed-input {{ $errors->has('semester') ? 'has-error' : '' }}"
                                oninput="syncSemButtons(this.value); onFieldChange(this)"
                            >
                        </div>
                        <div class="ed-sem-grid">
                            @foreach([1,2,3,4,5,6,7,8] as $s)
                                <div
                                    class="ed-quick-btn {{ old('semester', $mataKuliah->semester) == $s ? 'active' : ($mataKuliah->semester == $s ? 'original' : '') }}"
                                    onclick="pickSem({{ $s }})"
                                >{{ $s }}</div>
                            @endforeach
                        </div>
                        <div class="ed-original-hint" id="hint_semester">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                            Sebelumnya: <strong>Semester {{ $mataKuliah->semester }}</strong>
                        </div>
                        @error('semester')
                            <div class="ed-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
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
                    <a href="{{ route('mata-kuliah.index') }}" class="ed-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <div class="ed-btn-right">
                        <button type="button" class="ed-btn-reset" id="resetBtn" style="display:none;" onclick="resetAll()">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.47"/></svg>
                            Reset
                        </button>
                        <button type="submit" class="ed-btn-save" id="saveBtn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Original values from server
        const originals = {
            kode_mk:  '{{ $mataKuliah->kode_mk }}',
            nama_mk:  '{{ $mataKuliah->nama_mk }}',
            sks:      '{{ $mataKuliah->sks }}',
            semester: '{{ $mataKuliah->semester }}',
        };

        const labels = { kode_mk: 'Kode MK', nama_mk: 'Nama MK', sks: 'SKS', semester: 'Semester' };

        function onFieldChange(input) {
            const id   = input.id;
            const val  = input.value.trim();
            const orig = originals[id];
            const changed = val !== String(orig);

            input.classList.toggle('changed', changed && !input.classList.contains('has-error'));

            const hint = document.getElementById('hint_' + id);
            if (hint) hint.classList.toggle('visible', changed);

            refreshState();
        }

        function refreshState() {
            const fields   = ['kode_mk', 'nama_mk', 'sks', 'semester'];
            const anyChange = fields.some(f => {
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
                const el  = document.getElementById(f);
                if (!el) return;
                const val  = el.value.trim();
                const orig = String(originals[f]);

                if (val === orig) {
                    html += `<div class="ed-diff-row">
                        <span class="ed-diff-field">${labels[f]}</span>
                        <span class="ed-diff-unchanged">${formatVal(f, orig)}</span>
                    </div>`;
                } else {
                    html += `<div class="ed-diff-row">
                        <span class="ed-diff-field">${labels[f]}</span>
                        <span class="ed-diff-old">${formatVal(f, orig)}</span>
                        <span class="ed-diff-arrow">→</span>
                        <span class="ed-diff-new">${formatVal(f, val)}</span>
                    </div>`;
                }
            });

            rows.innerHTML = html;
        }

        function formatVal(field, val) {
            if (field === 'kode_mk') return `<span class="ed-badge-kode">${val}</span>`;
            if (field === 'sks')     return `<span class="ed-badge-sks">${val} SKS</span>`;
            if (field === 'semester') return `Semester ${val}`;
            return val;
        }

        function pickSks(val) {
            const el = document.getElementById('sks');
            el.value = val;
            syncSksButtons(val);
            onFieldChange(el);
        }
        function syncSksButtons(val) {
            document.querySelectorAll('.ed-sks-grid .ed-quick-btn').forEach((btn, i) => {
                const v = i + 1;
                btn.classList.remove('active', 'original');
                if (v == val)             btn.classList.add('active');
                else if (v == originals.sks) btn.classList.add('original');
            });
        }

        function pickSem(val) {
            const el = document.getElementById('semester');
            el.value = val;
            syncSemButtons(val);
            onFieldChange(el);
        }
        function syncSemButtons(val) {
            document.querySelectorAll('.ed-sem-grid .ed-quick-btn').forEach((btn, i) => {
                const v = i + 1;
                btn.classList.remove('active', 'original');
                if (v == val)                  btn.classList.add('active');
                else if (v == originals.semester) btn.classList.add('original');
            });
        }

        function resetAll() {
            ['kode_mk', 'nama_mk', 'sks', 'semester'].forEach(f => {
                const el = document.getElementById(f);
                if (!el) return;
                el.value = originals[f];
                el.classList.remove('changed');
                const hint = document.getElementById('hint_' + f);
                if (hint) hint.classList.remove('visible');
            });
            syncSksButtons(originals.sks);
            syncSemButtons(originals.semester);
            refreshState();
        }

        // Init on load
        document.addEventListener('DOMContentLoaded', () => {
            ['kode_mk', 'nama_mk', 'sks', 'semester'].forEach(f => {
                const el = document.getElementById(f);
                if (el) onFieldChange(el);
            });
        });
    </script>
</x-app-layout>