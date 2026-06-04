<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mata Kuliah') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .cr-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
            max-width: 760px;
            margin: 0 auto;
        }

        /* === BREADCRUMB === */
        .cr-breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #94a3b8;
            margin-bottom: 1.5rem;
        }
        .cr-breadcrumb a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.15s;
        }
        .cr-breadcrumb a:hover { color: #4f46e5; }
        .cr-breadcrumb-sep { color: #cbd5e1; }

        /* === FORM CARD === */
        .cr-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
        }

        /* Header strip */
        .cr-card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #0f172a 100%);
            padding: 1.75rem 2rem;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .cr-card-header::before {
            content: '';
            position: absolute;
            top: -50px; right: -50px;
            width: 180px; height: 180px;
            background: radial-gradient(circle, rgba(99,102,241,0.3) 0%, transparent 70%);
        }
        .cr-card-header-icon {
            width: 48px; height: 48px;
            background: rgba(99,102,241,0.2);
            border: 1px solid rgba(99,102,241,0.35);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
            position: relative; z-index: 1;
        }
        .cr-card-header-text { position: relative; z-index: 1; }
        .cr-card-header-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #f8fafc;
        }
        .cr-card-header-sub {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-top: 2px;
        }

        /* Form body */
        .cr-card-body {
            padding: 2rem;
        }

        /* Form grid */
        .cr-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }
        .cr-field { margin-bottom: 0; }

        /* Label */
        .cr-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }
        .cr-label-hint {
            font-size: 0.73rem;
            color: #94a3b8;
            font-weight: 500;
            text-transform: none;
            letter-spacing: 0;
            margin-left: 0.4rem;
        }

        /* Input wrapper */
        .cr-input-wrap {
            position: relative;
        }
        .cr-input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            transition: color 0.2s;
        }
        .cr-input-wrap:focus-within .cr-input-icon { color: #6366f1; }

        /* Input */
        .cr-input {
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
        .cr-input:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        }
        .cr-input.has-error {
            border-color: #ef4444;
            background: #fff5f5;
        }
        .cr-input.has-error:focus {
            box-shadow: 0 0 0 3px rgba(239,68,68,0.12);
        }
        .cr-input-mono {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem;
            letter-spacing: 0.04em;
        }

        /* Error */
        .cr-error {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            color: #ef4444;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 0.4rem;
        }

        /* SKS quick select */
        .cr-sks-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 0.4rem;
            margin-top: 0.6rem;
        }
        .cr-sks-btn {
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
        .cr-sks-btn:hover {
            border-color: #6366f1;
            color: #6366f1;
            background: #f5f3ff;
        }
        .cr-sks-btn.active {
            border-color: #6366f1;
            background: #6366f1;
            color: #fff;
        }

        /* Semester quick select */
        .cr-sem-grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 0.4rem;
            margin-top: 0.6rem;
        }
        .cr-sem-btn {
            padding: 0.4rem 0;
            text-align: center;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            background: #fafafa;
            transition: all 0.15s;
            user-select: none;
        }
        .cr-sem-btn:hover {
            border-color: #6366f1;
            color: #6366f1;
            background: #f5f3ff;
        }
        .cr-sem-btn.active {
            border-color: #6366f1;
            background: #6366f1;
            color: #fff;
        }

        /* Divider */
        .cr-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 1.75rem 0;
        }

        /* Preview card */
        .cr-preview {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border: 1.5px dashed #cbd5e1;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            margin-top: 1.5rem;
        }
        .cr-preview-title {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #94a3b8;
            margin-bottom: 0.75rem;
        }
        .cr-preview-row {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }
        .cr-preview-kode {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
            background: #eff6ff;
            color: #3b82f6;
            border: 1px solid #bfdbfe;
            padding: 0.25rem 0.65rem;
            border-radius: 6px;
        }
        .cr-preview-nama {
            font-weight: 700;
            font-size: 0.95rem;
            color: #0f172a;
        }
        .cr-preview-sks {
            font-size: 0.8rem;
            background: #f0fdf4;
            color: #059669;
            border: 1px solid #a7f3d0;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            font-weight: 700;
        }
        .cr-preview-sem {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: #6366f1;
        }
        .cr-preview-placeholder {
            font-size: 0.85rem;
            color: #cbd5e1;
            font-style: italic;
        }

        /* Footer actions */
        .cr-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.75rem;
            padding: 1.5rem 2rem;
            background: #fafafa;
            border-top: 1px solid #f1f5f9;
        }
        .cr-btn-cancel {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.25rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: inherit;
            color: #64748b;
            background: #f1f5f9;
            border: none;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.15s;
        }
        .cr-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .cr-btn-submit {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 700;
            font-family: inherit;
            color: #fff;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(99,102,241,0.35);
            transition: all 0.18s;
        }
        .cr-btn-submit:hover {
            box-shadow: 0 6px 20px rgba(99,102,241,0.45);
            transform: translateY(-1px);
        }
        .cr-btn-submit:active { transform: translateY(0); }

        @media (max-width: 600px) {
            .cr-grid-2 { grid-template-columns: 1fr; }
            .cr-sks-grid { grid-template-columns: repeat(4, 1fr); }
            .cr-sem-grid { grid-template-columns: repeat(4, 1fr); }
            .cr-card-body { padding: 1.25rem; }
            .cr-actions { padding: 1rem 1.25rem; }
        }
    </style>

    <div class="cr-wrapper">

        {{-- Breadcrumb --}}
        <div class="cr-breadcrumb">
            <a href="{{ route('mata-kuliah.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                Mata Kuliah
            </a>
            <span class="cr-breadcrumb-sep">›</span>
            <span>Tambah Baru</span>
        </div>

        <div class="cr-card">

            {{-- Card Header --}}
            <div class="cr-card-header">
                <div class="cr-card-header-icon">📚</div>
                <div class="cr-card-header-text">
                    <div class="cr-card-header-title">Tambah Mata Kuliah Baru</div>
                    <div class="cr-card-header-sub">Isi semua field di bawah untuk mendaftarkan mata kuliah baru ke sistem.</div>
                </div>
            </div>

            {{-- Form Body --}}
            <form action="{{ route('mata-kuliah.store') }}" method="POST" id="mkForm">
                @csrf
                <div class="cr-card-body">

                    {{-- Row 1: Kode MK & Nama MK --}}
                    <div class="cr-grid-2" style="margin-bottom:1.25rem;">

                        {{-- Kode MK --}}
                        <div class="cr-field">
                            <label class="cr-label" for="kode_mk">
                                Kode MK
                                <span class="cr-label-hint">— unik, wajib diisi</span>
                            </label>
                            <div class="cr-input-wrap">
                                <svg class="cr-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                <input
                                    id="kode_mk"
                                    type="text"
                                    name="kode_mk"
                                    value="{{ old('kode_mk') }}"
                                    placeholder="mis. IF3020"
                                    autocomplete="off"
                                    required
                                    class="cr-input cr-input-mono {{ $errors->has('kode_mk') ? 'has-error' : '' }}"
                                    oninput="updatePreview()"
                                >
                            </div>
                            @error('kode_mk')
                                <div class="cr-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Nama MK --}}
                        <div class="cr-field">
                            <label class="cr-label" for="nama_mk">Nama Mata Kuliah</label>
                            <div class="cr-input-wrap">
                                <svg class="cr-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                <input
                                    id="nama_mk"
                                    type="text"
                                    name="nama_mk"
                                    value="{{ old('nama_mk') }}"
                                    placeholder="mis. Pemrograman Web"
                                    required
                                    class="cr-input {{ $errors->has('nama_mk') ? 'has-error' : '' }}"
                                    oninput="updatePreview()"
                                >
                            </div>
                            @error('nama_mk')
                                <div class="cr-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Row 2: SKS --}}
                    <div class="cr-field" style="margin-bottom:1.25rem;">
                        <label class="cr-label" for="sks">
                            Jumlah SKS
                            <span class="cr-label-hint">— Satuan Kredit Semester</span>
                        </label>
                        <div class="cr-input-wrap" style="max-width:200px;">
                            <svg class="cr-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <input
                                id="sks"
                                type="number"
                                name="sks"
                                value="{{ old('sks') }}"
                                min="1" max="6"
                                placeholder="0"
                                required
                                class="cr-input {{ $errors->has('sks') ? 'has-error' : '' }}"
                                oninput="syncSksButtons(this.value); updatePreview()"
                            >
                        </div>
                        {{-- Quick pick --}}
                        <div class="cr-sks-grid" style="max-width:320px;">
                            @foreach([1,2,3,4,5,6] as $s)
                                <div class="cr-sks-btn {{ old('sks') == $s ? 'active' : '' }}" onclick="pickSks({{ $s }})">{{ $s }}</div>
                            @endforeach
                        </div>
                        @error('sks')
                            <div class="cr-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Row 3: Semester --}}
                    <div class="cr-field">
                        <label class="cr-label" for="semester">
                            Semester
                            <span class="cr-label-hint">— 1 s/d 8</span>
                        </label>
                        <div class="cr-input-wrap" style="max-width:200px;">
                            <svg class="cr-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <input
                                id="semester"
                                type="number"
                                name="semester"
                                value="{{ old('semester') }}"
                                min="1" max="8"
                                placeholder="0"
                                required
                                class="cr-input {{ $errors->has('semester') ? 'has-error' : '' }}"
                                oninput="syncSemButtons(this.value); updatePreview()"
                            >
                        </div>
                        {{-- Quick pick --}}
                        <div class="cr-sem-grid" style="max-width:320px;">
                            @foreach([1,2,3,4,5,6,7,8] as $s)
                                <div class="cr-sem-btn {{ old('semester') == $s ? 'active' : '' }}" onclick="pickSem({{ $s }})">{{ $s }}</div>
                            @endforeach
                        </div>
                        @error('semester')
                            <div class="cr-error">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Live Preview --}}
                    <div class="cr-preview">
                        <div class="cr-preview-title">✨ Preview Kartu Mata Kuliah</div>
                        <div class="cr-preview-row" id="previewRow">
                            <span class="cr-preview-placeholder">Isi form di atas untuk melihat preview...</span>
                        </div>
                    </div>

                </div>

                {{-- Footer Actions --}}
                <div class="cr-actions">
                    <a href="{{ route('mata-kuliah.index') }}" class="cr-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="cr-btn-submit">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Mata Kuliah
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function pickSks(val) {
            document.getElementById('sks').value = val;
            syncSksButtons(val);
            updatePreview();
        }
        function syncSksButtons(val) {
            document.querySelectorAll('.cr-sks-btn').forEach((btn, i) => {
                btn.classList.toggle('active', (i + 1) == val);
            });
        }

        function pickSem(val) {
            document.getElementById('semester').value = val;
            syncSemButtons(val);
            updatePreview();
        }
        function syncSemButtons(val) {
            document.querySelectorAll('.cr-sem-btn').forEach((btn, i) => {
                btn.classList.toggle('active', (i + 1) == val);
            });
        }

        function updatePreview() {
            const kode  = document.getElementById('kode_mk').value.trim();
            const nama  = document.getElementById('nama_mk').value.trim();
            const sks   = document.getElementById('sks').value;
            const sem   = document.getElementById('semester').value;
            const row   = document.getElementById('previewRow');

            if (!kode && !nama && !sks && !sem) {
                row.innerHTML = '<span class="cr-preview-placeholder">Isi form di atas untuk melihat preview...</span>';
                return;
            }

            let html = '';
            if (kode) html += `<span class="cr-preview-kode">${kode}</span>`;
            if (nama) html += `<span class="cr-preview-nama">${nama}</span>`;
            if (sks)  html += `<span class="cr-preview-sks">${sks} SKS</span>`;
            if (sem)  html += `<span class="cr-preview-sem"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Semester ${sem}</span>`;

            row.innerHTML = html || '<span class="cr-preview-placeholder">Isi form di atas untuk melihat preview...</span>';
        }

        // Init quick-select state on page load (for old() values after validation error)
        document.addEventListener('DOMContentLoaded', () => {
            const sksVal = document.getElementById('sks').value;
            const semVal = document.getElementById('semester').value;
            if (sksVal) syncSksButtons(sksVal);
            if (semVal) syncSemButtons(semVal);
            updatePreview();
        });
    </script>
</x-app-layout>