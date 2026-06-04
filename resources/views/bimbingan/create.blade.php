<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Bimbingan Baru') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap');

        * { box-sizing: border-box; }

        .bc-wrapper {
            font-family: 'Sora', sans-serif;
            max-width: 720px;
            margin: 0 auto;
        }

        /* ── BREADCRUMB ── */
        .bc-breadcrumb {
            display: flex; align-items: center; gap: .4rem;
            font-size: .8rem; color: #94a3b8; margin-bottom: 1.5rem;
        }
        .bc-breadcrumb a {
            color: #6366f1; text-decoration: none;
            font-weight: 600; transition: color .15s;
        }
        .bc-breadcrumb a:hover { color: #4f46e5; }
        .bc-sep { color: #cbd5e1; }

        /* ── MAIN CARD ── */
        .bc-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(99,102,241,.06);
        }

        /* Header */
        .bc-header {
            background: linear-gradient(130deg, #0c1445 0%, #1a237e 45%, #0d1b5e 100%);
            padding: 2rem 2.25rem;
            position: relative; overflow: hidden;
            display: flex; align-items: center; gap: 1.1rem;
        }
        .bc-header::before {
            content: ''; position: absolute; top: -60px; right: -60px;
            width: 230px; height: 230px; border-radius: 50%;
            background: radial-gradient(circle, rgba(99,102,241,.38) 0%, transparent 65%);
        }
        .bc-header::after {
            content: ''; position: absolute; bottom: -70px; left: 30%;
            width: 280px; height: 180px; border-radius: 50%;
            background: radial-gradient(circle, rgba(129,140,248,.2) 0%, transparent 65%);
        }
        .bc-header-icon {
            width: 52px; height: 52px; border-radius: 15px;
            background: rgba(99,102,241,.2); border: 1px solid rgba(99,102,241,.4);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0; position: relative; z-index: 1;
        }
        .bc-header-text { position: relative; z-index: 1; }
        .bc-header-tag {
            display: inline-flex; align-items: center; gap: .3rem;
            background: rgba(99,102,241,.18); border: 1px solid rgba(99,102,241,.38);
            color: #a5b4fc; font-size: .68rem; font-weight: 600;
            letter-spacing: .05em; padding: .2rem .65rem;
            border-radius: 999px; margin-bottom: .45rem;
        }
        .bc-header-title { font-size: 1.2rem; font-weight: 800; color: #f8fafc; }
        .bc-header-sub   { font-size: .8rem; color: #94a3b8; margin-top: 2px; }

        /* Step progress strip */
        .bc-steps {
            display: flex; align-items: center;
            padding: 1.1rem 2.25rem;
            background: #fafafa; border-bottom: 1px solid #f1f5f9;
            gap: 0;
        }
        .bc-step {
            display: flex; align-items: center; gap: .55rem; flex: 1;
        }
        .bc-step-circle {
            width: 28px; height: 28px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: .72rem; font-weight: 700; flex-shrink: 0;
            transition: all .2s;
        }
        .bc-step-circle.done   { background: #6366f1; color: #fff; }
        .bc-step-circle.active { background: #6366f1; color: #fff; box-shadow: 0 0 0 4px rgba(99,102,241,.18); }
        .bc-step-circle.idle   { background: #f1f5f9; color: #94a3b8; }
        .bc-step-label {
            font-size: .75rem; font-weight: 600;
            color: #94a3b8; white-space: nowrap;
        }
        .bc-step-label.active { color: #6366f1; }
        .bc-step-label.done   { color: #22c55e; }
        .bc-step-connector {
            flex: 1; height: 2px; background: #e2e8f0; margin: 0 .5rem;
            border-radius: 1px; min-width: 20px;
        }
        .bc-step-connector.done { background: #6366f1; }

        /* Body */
        .bc-body { padding: 2rem 2.25rem; }

        /* Section labels */
        .bc-section-lbl {
            display: flex; align-items: center; gap: .5rem;
            font-size: .68rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .08em; color: #94a3b8; margin-bottom: 1rem;
        }
        .bc-section-lbl::after {
            content: ''; flex: 1; height: 1px; background: #f1f5f9;
        }

        /* Label */
        .bc-label {
            display: block; font-size: .78rem; font-weight: 700;
            color: #374151; text-transform: uppercase;
            letter-spacing: .05em; margin-bottom: .5rem;
        }
        .bc-label-hint {
            font-size: .71rem; color: #94a3b8; font-weight: 500;
            text-transform: none; letter-spacing: 0; margin-left: .35rem;
        }

        /* Input wrap */
        .bc-input-wrap { position: relative; }
        .bc-input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: #94a3b8;
            pointer-events: none; transition: color .2s;
        }
        .bc-input-wrap:focus-within .bc-input-icon { color: #6366f1; }

        .bc-input {
            width: 100%; padding: .72rem 1rem .72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: .9rem; font-family: 'Sora', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .bc-input:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .bc-input.has-error { border-color: #ef4444; background: #fff5f5; }

        /* Select custom */
        .bc-select-wrap { position: relative; }
        .bc-select-wrap::after {
            content: '';
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            width: 0; height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid #94a3b8;
            pointer-events: none;
        }
        .bc-select {
            width: 100%; padding: .72rem 2.5rem .72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: .9rem; font-family: 'Sora', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            appearance: none; cursor: pointer;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .bc-select:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .bc-select.has-error { border-color: #ef4444; background: #fff5f5; }

        /* Dosen card preview */
        .bc-dosen-preview {
            margin-top: .85rem;
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
            border: 1.5px solid #ddd6fe; border-radius: 13px;
            padding: 1rem 1.25rem;
            display: none;
            align-items: center; gap: 1rem;
        }
        .bc-dosen-preview.show { display: flex; }
        .bc-dosen-av {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: #fff; font-size: .9rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .bc-dosen-name { font-weight: 700; font-size: .925rem; color: #0f172a; }
        .bc-dosen-tag  {
            display: inline-flex; align-items: center; gap: .3rem;
            background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25);
            color: #6366f1; font-size: .7rem; font-weight: 600;
            padding: .15rem .55rem; border-radius: 999px; margin-top: 3px;
        }

        /* Topik suggestions */
        .bc-suggestions {
            display: flex; flex-wrap: wrap; gap: .45rem;
            margin-top: .75rem;
        }
        .bc-sug-chip {
            display: inline-flex; align-items: center; gap: .3rem;
            padding: .3rem .75rem; border-radius: 999px;
            border: 1.5px solid #e2e8f0; background: #fafafa;
            font-size: .75rem; font-weight: 500; color: #64748b;
            cursor: pointer; font-family: 'Sora', sans-serif;
            transition: all .15s;
        }
        .bc-sug-chip:hover {
            border-color: #6366f1; color: #6366f1; background: #f5f3ff;
        }

        /* Character counter */
        .bc-char-count {
            display: flex; justify-content: flex-end;
            font-size: .7rem; color: #94a3b8; margin-top: .35rem;
            font-family: 'JetBrains Mono', monospace;
        }
        .bc-char-count.warn { color: #f59e0b; }
        .bc-char-count.over { color: #ef4444; }

        /* Error message */
        .bc-error {
            display: flex; align-items: center; gap: .35rem;
            color: #ef4444; font-size: .75rem; font-weight: 500; margin-top: .4rem;
        }

        /* Preview card (bottom) */
        .bc-preview {
            background: #f8fafc; border: 1.5px dashed #e2e8f0;
            border-radius: 14px; padding: 1.1rem 1.4rem;
            margin-top: 1.5rem;
        }
        .bc-preview-title {
            font-size: .67rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .08em; color: #94a3b8; margin-bottom: .65rem;
        }
        .bc-preview-row {
            display: flex; align-items: flex-start; gap: .6rem;
            font-size: .82rem; color: #64748b; margin-bottom: .35rem;
        }
        .bc-preview-row:last-child { margin-bottom: 0; }
        .bc-preview-key {
            font-size: .68rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .06em; color: #94a3b8; width: 70px; flex-shrink: 0;
            margin-top: 1px;
        }
        .bc-preview-val { font-weight: 600; color: #0f172a; line-height: 1.4; }
        .bc-preview-empty { color: #cbd5e1; font-style: italic; font-size: .83rem; }
        .bc-status-pill {
            display: inline-flex; align-items: center; gap: .3rem;
            background: #fffbeb; border: 1px solid #fde68a; color: #92400e;
            font-size: .72rem; font-weight: 700; padding: .18rem .6rem;
            border-radius: 999px;
        }

        /* Footer */
        .bc-footer {
            display: flex; align-items: center; justify-content: flex-end; gap: .75rem;
            padding: 1.4rem 2.25rem;
            background: #fafafa; border-top: 1px solid #f1f5f9;
        }
        .bc-btn-cancel {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .65rem 1.25rem; border-radius: 12px;
            font-size: .875rem; font-weight: 600; font-family: 'Sora', sans-serif;
            color: #64748b; background: #f1f5f9; border: none;
            text-decoration: none; cursor: pointer; transition: all .15s;
        }
        .bc-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .bc-btn-submit {
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .7rem 1.75rem; border-radius: 12px;
            font-size: .875rem; font-weight: 700; font-family: 'Sora', sans-serif;
            color: #fff; background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none; cursor: pointer;
            box-shadow: 0 4px 16px rgba(99,102,241,.38);
            transition: all .2s;
        }
        .bc-btn-submit:hover {
            box-shadow: 0 6px 22px rgba(99,102,241,.5);
            transform: translateY(-1px);
        }
        .bc-btn-submit:disabled {
            opacity: .5; cursor: not-allowed;
            transform: none; box-shadow: none;
        }

        @media (max-width: 580px) {
            .bc-body   { padding: 1.25rem; }
            .bc-footer { padding: 1rem 1.25rem; }
            .bc-steps  { padding: .9rem 1.25rem; }
            .bc-header { padding: 1.5rem; }
        }
    </style>

    <div class="bc-wrapper">

        {{-- Breadcrumb --}}
        <div class="bc-breadcrumb">
            <a href="{{ route('bimbingan.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Bimbingan
            </a>
            <span class="bc-sep">›</span>
            <span>Ajukan Baru</span>
        </div>

        <div class="bc-card">

            {{-- Header --}}
            <div class="bc-header">
                <div class="bc-header-icon">📝</div>
                <div class="bc-header-text">
                    <div class="bc-header-tag">
                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        Mahasiswa · SIAKAD
                    </div>
                    <div class="bc-header-title">Ajukan Bimbingan Baru</div>
                    <div class="bc-header-sub">Pilih dosen wali dan tuliskan topik yang ingin dibahas.</div>
                </div>
            </div>

            {{-- Step Progress --}}
            <div class="bc-steps">
                <div class="bc-step">
                    <div class="bc-step-circle active" id="step1circle">1</div>
                    <span class="bc-step-label active" id="step1label">Pilih Dosen</span>
                </div>
                <div class="bc-step-connector" id="conn1"></div>
                <div class="bc-step">
                    <div class="bc-step-circle idle" id="step2circle">2</div>
                    <span class="bc-step-label" id="step2label">Tulis Topik</span>
                </div>
                <div class="bc-step-connector" id="conn2"></div>
                <div class="bc-step">
                    <div class="bc-step-circle idle" id="step3circle">3</div>
                    <span class="bc-step-label" id="step3label">Kirim</span>
                </div>
            </div>

            <form action="{{ route('bimbingan.store') }}" method="POST" id="bimForm">
                @csrf
                <div class="bc-body">

                    {{-- ── SECTION 1: DOSEN ── --}}
                    <div style="margin-bottom:1.75rem;">
                        <div class="bc-section-lbl">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Dosen Pembimbing
                        </div>

                        <label class="bc-label" for="dosen_id">
                            Pilih Dosen Wali
                            <span class="bc-label-hint">— wajib dipilih</span>
                        </label>

                        <div class="bc-select-wrap">
                            <svg class="bc-input-icon" style="left:14px;top:50%;transform:translateY(-50%);position:absolute;pointer-events:none;color:#94a3b8;z-index:1;" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <select
                                id="dosen_id"
                                name="dosen_id"
                                class="bc-select {{ $errors->has('dosen_id') ? 'has-error' : '' }}"
                                onchange="onDosenChange(this)"
                            >
                                <option value="">-- Pilih Dosen --</option>
                                @foreach($dosens as $d)
                                    <option
                                        value="{{ $d->id }}"
                                        data-name="{{ $d->nama_lengkap }}"
                                        {{ old('dosen_id') == $d->id ? 'selected' : '' }}
                                    >{{ $d->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('dosen_id')
                            <div class="bc-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Dosen card preview --}}
                        <div class="bc-dosen-preview" id="dosenPreview">
                            <div class="bc-dosen-av" id="dosenAvatar">—</div>
                            <div>
                                <div class="bc-dosen-name" id="dosenName">—</div>
                                <div class="bc-dosen-tag">
                                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                    Dosen Wali
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── SECTION 2: TOPIK ── --}}
                    <div>
                        <div class="bc-section-lbl">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            Topik Bimbingan
                        </div>

                        <label class="bc-label" for="topik">
                            Topik / Keluhan
                            <span class="bc-label-hint">— jelaskan secara singkat</span>
                        </label>

                        <div class="bc-input-wrap">
                            <svg class="bc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            <input
                                id="topik"
                                type="text"
                                name="topik"
                                value="{{ old('topik') }}"
                                placeholder="mis. Kesulitan memahami materi algoritma..."
                                required
                                maxlength="120"
                                autocomplete="off"
                                class="bc-input {{ $errors->has('topik') ? 'has-error' : '' }}"
                                oninput="onTopikInput(this)"
                            >
                        </div>
                        <div class="bc-char-count" id="charCount">0 / 120</div>

                        @error('topik')
                            <div class="bc-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Quick suggestions --}}
                        <div style="margin-top:.6rem;">
                            <div style="font-size:.7rem;font-weight:600;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.45rem;">
                                💡 Topik Umum
                            </div>
                            <div class="bc-suggestions">
                                @foreach([
                                    'Kesulitan Belajar',
                                    'Permasalahan Akademik',
                                    'Rencana Studi Semester',
                                    'Konsultasi KRS',
                                    'Masalah Nilai',
                                    'Bimbingan Karir',
                                    'Persiapan Tugas Akhir',
                                    'Masalah Keuangan',
                                ] as $sug)
                                    <button type="button" class="bc-sug-chip" onclick="applySuggestion('{{ $sug }}')">
                                        {{ $sug }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- ── PREVIEW CARD ── --}}
                    <div class="bc-preview" id="previewCard">
                        <div class="bc-preview-title">📋 Ringkasan Pengajuan</div>
                        <div class="bc-preview-row">
                            <span class="bc-preview-key">Dosen</span>
                            <span class="bc-preview-val" id="pvDosen">
                                <span class="bc-preview-empty">Belum dipilih</span>
                            </span>
                        </div>
                        <div class="bc-preview-row">
                            <span class="bc-preview-key">Topik</span>
                            <span class="bc-preview-val" id="pvTopik">
                                <span class="bc-preview-empty">Belum diisi</span>
                            </span>
                        </div>
                        <div class="bc-preview-row">
                            <span class="bc-preview-key">Status</span>
                            <span class="bc-preview-val">
                                <span class="bc-status-pill">
                                    <svg width="7" height="7" viewBox="0 0 24 24" fill="#f59e0b"><circle cx="12" cy="12" r="10"/></svg>
                                    Pending — menunggu konfirmasi dosen
                                </span>
                            </span>
                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="bc-footer">
                    <a href="{{ route('bimbingan.index') }}" class="bc-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="bc-btn-submit" id="submitBtn" disabled>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // ── DOSEN CHANGE ──
        function onDosenChange(sel) {
            const opt    = sel.options[sel.selectedIndex];
            const name   = opt.value ? opt.dataset.name : '';
            const preview = document.getElementById('dosenPreview');
            const avEl    = document.getElementById('dosenAvatar');
            const nameEl  = document.getElementById('dosenName');
            const pvDosen = document.getElementById('pvDosen');

            if (name) {
                const words    = name.split(' ').filter(Boolean);
                const initials = words.slice(0,2).map(w => w[0].toUpperCase()).join('');
                avEl.textContent  = initials;
                nameEl.textContent = name;
                preview.classList.add('show');
                pvDosen.innerHTML = `<strong>${name}</strong>`;
            } else {
                preview.classList.remove('show');
                pvDosen.innerHTML = '<span class="bc-preview-empty">Belum dipilih</span>';
            }

            updateSteps();
            updateSubmit();
        }

        // ── TOPIK INPUT ──
        function onTopikInput(input) {
            const val     = input.value;
            const len     = val.length;
            const counter = document.getElementById('charCount');
            const pvTopik = document.getElementById('pvTopik');

            counter.textContent = `${len} / 120`;
            counter.className   = 'bc-char-count' + (len > 100 ? (len >= 120 ? ' over' : ' warn') : '');

            pvTopik.innerHTML = val.trim()
                ? `<strong>${val}</strong>`
                : '<span class="bc-preview-empty">Belum diisi</span>';

            updateSteps();
            updateSubmit();
        }

        // ── SUGGESTIONS ──
        function applySuggestion(text) {
            const input = document.getElementById('topik');
            input.value = text;
            onTopikInput(input);
            input.focus();
        }

        // ── STEP PROGRESS ──
        function updateSteps() {
            const dosenVal = document.getElementById('dosen_id').value;
            const topikVal = document.getElementById('topik').value.trim();

            const s1c = document.getElementById('step1circle');
            const s1l = document.getElementById('step1label');
            const s2c = document.getElementById('step2circle');
            const s2l = document.getElementById('step2label');
            const s3c = document.getElementById('step3circle');
            const s3l = document.getElementById('step3label');
            const c1  = document.getElementById('conn1');
            const c2  = document.getElementById('conn2');

            if (!dosenVal) {
                // step 1 active
                setStep(s1c, s1l, 'active');
                setStep(s2c, s2l, 'idle');
                setStep(s3c, s3l, 'idle');
                c1.classList.remove('done'); c2.classList.remove('done');
            } else if (dosenVal && !topikVal) {
                // step 1 done, step 2 active
                setStep(s1c, s1l, 'done', '✓');
                setStep(s2c, s2l, 'active');
                setStep(s3c, s3l, 'idle');
                c1.classList.add('done'); c2.classList.remove('done');
            } else {
                // all done
                setStep(s1c, s1l, 'done', '✓');
                setStep(s2c, s2l, 'done', '✓');
                setStep(s3c, s3l, 'active');
                c1.classList.add('done'); c2.classList.add('done');
            }
        }

        function setStep(circle, label, state, icon) {
            circle.className = 'bc-step-circle ' + state;
            label.className  = 'bc-step-label '  + state;
            if (icon) circle.textContent = icon;
            else if (state !== 'done') {
                // restore number
                const num = circle.closest('.bc-step')
                    .previousElementSibling?.previousElementSibling
                    ? (circle.closest('.bc-steps').children[4] === circle.closest('.bc-step') ? '3'
                     : circle.closest('.bc-steps').children[2] === circle.closest('.bc-step') ? '2' : '1')
                    : '1';
                // simpler: read from data
            }
        }

        // ── SUBMIT BUTTON ──
        function updateSubmit() {
            const dosenVal = document.getElementById('dosen_id').value;
            const topikVal = document.getElementById('topik').value.trim();
            document.getElementById('submitBtn').disabled = !(dosenVal && topikVal);
        }

        // ── INIT on load (for old() values after validation) ──
        document.addEventListener('DOMContentLoaded', () => {
            // Reset step numbers properly
            document.getElementById('step1circle').textContent = '1';
            document.getElementById('step2circle').textContent = '2';
            document.getElementById('step3circle').textContent = '3';

            const sel = document.getElementById('dosen_id');
            if (sel.value) onDosenChange(sel);

            const topikEl = document.getElementById('topik');
            if (topikEl.value) onTopikInput(topikEl);

            updateSteps();
            updateSubmit();
        });
    </script>
</x-app-layout>