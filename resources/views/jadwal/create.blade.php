<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Jadwal Perkuliahan') }}
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

        .jc-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 1.75rem 1.25rem 3rem;
        }

        /* ── Banner ── */
        .jc-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            border-radius: 20px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.75rem;
            position: relative;
            overflow: hidden;
            color: white;
        }
        .jc-banner::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }
        .jc-banner .glow {
            position: absolute;
            top: -70px; right: -50px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(204,0,0,.32) 0%, transparent 65%);
            border-radius: 50%;
        }
        .jc-banner-inner {
            position: relative; z-index: 1;
            display: flex; align-items: center; gap: 1.25rem;
        }
        .jc-banner-icon {
            width: 58px; height: 58px; border-radius: 16px;
            background: rgba(255,255,255,.12);
            border: 1.5px solid rgba(255,255,255,.22);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; flex-shrink: 0;
        }
        .jc-banner-text .breadcrumb {
            font-size: .72rem; font-weight: 600;
            color: rgba(255,255,255,.4);
            text-transform: uppercase; letter-spacing: .5px;
            margin-bottom: .3rem;
        }
        .jc-banner-text .breadcrumb a {
            color: rgba(255,255,255,.4); text-decoration: none;
            transition: color .15s;
        }
        .jc-banner-text .breadcrumb a:hover { color: var(--gold); }
        .jc-banner-text .breadcrumb span { color: var(--gold); }
        .jc-banner-text h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem; color: white;
            margin: 0 0 .2rem; line-height: 1.2;
        }
        .jc-banner-text p { font-size: .8rem; color: rgba(255,255,255,.5); margin: 0; }

        /* ── Card ── */
        .jc-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            animation: fadeUp .45s ease both;
        }
        .jc-card-header {
            display: flex; align-items: center; gap: .875rem;
            padding: 1.1rem 1.75rem;
            background: #FAFAFA;
            border-bottom: 1px solid var(--border);
        }
        .jc-card-icon {
            width: 38px; height: 38px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }
        .jc-card-icon.blue { background: var(--blue-soft); }
        .jc-card-title    { font-size: .88rem; font-weight: 700; color: var(--text); margin: 0; }
        .jc-card-subtitle { font-size: .73rem; color: var(--muted); margin: 0; }

        .jc-card-body { padding: 1.75rem; }

        /* ── Section divider ── */
        .jc-section { margin-bottom: 1.6rem; }
        .jc-section:last-of-type { margin-bottom: 0; }
        .jc-section-title {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .8px;
            color: var(--muted);
            padding-bottom: .6rem;
            border-bottom: 1px dashed var(--border);
            margin-bottom: 1.1rem;
        }

        /* ── Fields ── */
        .jc-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .jc-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; }

        .jc-field { display: flex; flex-direction: column; gap: .38rem; margin-bottom: 1rem; }
        .jc-field:last-child { margin-bottom: 0; }

        .jc-label {
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px;
            color: var(--muted);
        }
        .jc-label .req { color: var(--red); margin-left: 2px; }

        .jc-input,
        .jc-select {
            width: 100%; box-sizing: border-box;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .62rem .9rem;
            font-size: .875rem;
            font-family: inherit;
            color: var(--text);
            background: #FAFAFA;
            outline: none;
            transition: border-color .18s, box-shadow .18s, background .18s;
            appearance: none;
            -webkit-appearance: none;
        }
        .jc-input:focus,
        .jc-select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(204,0,0,.1);
            background: white;
        }
        .jc-input::placeholder { color: #C4C9D4; }
        .jc-input.has-error,
        .jc-select.has-error { border-color: #EF4444; background: #FFF5F5; }

        /* select arrow */
        .jc-select-wrap { position: relative; }
        .jc-select-wrap::after {
            content: '▾';
            position: absolute; right: .9rem; top: 50%;
            transform: translateY(-50%);
            color: var(--muted); font-size: .75rem;
            pointer-events: none;
        }
        .jc-select { padding-right: 2.2rem; cursor: pointer; }

        /* time input styling */
        .jc-input[type="time"] { cursor: pointer; }

        /* hints & errors */
        .jc-hint  { font-size: .72rem; color: var(--muted); margin-top: .2rem; line-height: 1.5; }
        .jc-error { font-size: .72rem; color: #DC2626; margin-top: .2rem; }

        /* hari pill selector */
        .jc-hari-pills {
            display: flex; flex-wrap: wrap; gap: .5rem; margin-top: .1rem;
        }
        .jc-hari-pill input[type="radio"] { display: none; }
        .jc-hari-pill label {
            display: inline-flex; align-items: center; justify-content: center;
            padding: .42rem .9rem; border-radius: 99px;
            font-size: .8rem; font-weight: 600;
            border: 1.5px solid var(--border);
            color: var(--muted); background: #FAFAFA;
            cursor: pointer;
            transition: all .15s;
            user-select: none;
        }
        .jc-hari-pill input[type="radio"]:checked + label {
            background: var(--red); color: white; border-color: var(--red);
        }
        .jc-hari-pill label:hover {
            border-color: var(--red); color: var(--red);
        }
        .jc-hari-pill input[type="radio"]:checked + label:hover {
            background: var(--red-deep); color: white;
        }

        /* preview card */
        .jc-preview {
            background: linear-gradient(135deg, #EEF1F8 0%, #F3F6FF 100%);
            border: 1px solid #D0D9EE;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-top: 1.5rem;
            display: none;
        }
        .jc-preview.show { display: block; }
        .jc-preview-title {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .6px;
            color: var(--navy); margin-bottom: .75rem;
        }
        .jc-preview-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: .75rem; }
        .jc-preview-item { }
        .jc-preview-item-label { font-size: .68rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: .4px; }
        .jc-preview-item-val   { font-size: .875rem; font-weight: 700; color: var(--navy); margin-top: .15rem; }

        /* ── Footer ── */
        .jc-footer {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem;
            padding: 1.2rem 1.75rem;
            background: #FAFAFA;
            border-top: 1px solid var(--border);
        }
        .jc-footer-left { font-size: .78rem; color: var(--muted); }
        .jc-footer-left strong { color: var(--red); }
        .jc-btn-row { display: flex; align-items: center; gap: .65rem; }

        .jc-btn {
            display: inline-flex; align-items: center; gap: .5rem;
            padding: .58rem 1.35rem; border-radius: 10px;
            font-size: .855rem; font-weight: 600; font-family: inherit;
            border: none; cursor: pointer; text-decoration: none;
            transition: background .15s, transform .1s;
        }
        .jc-btn:active { transform: scale(.97); }
        .jc-btn-primary { background: var(--red); color: white; }
        .jc-btn-primary:hover { background: var(--red-deep); color: white; }
        .jc-btn-ghost { background: #F3F4F6; color: #374151; border: 1px solid var(--border); }
        .jc-btn-ghost:hover { background: #E9EAEC; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 620px) {
            .jc-grid-2, .jc-grid-3 { grid-template-columns: 1fr; }
            .jc-preview-grid { grid-template-columns: 1fr 1fr; }
            .jc-banner-inner { flex-direction: column; align-items: flex-start; gap: .75rem; }
            .jc-footer { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="jc-wrapper">

        {{-- ── Banner ── --}}
        <div class="jc-banner">
            <div class="glow"></div>
            <div class="jc-banner-inner">
                <div class="jc-banner-icon">📅</div>
                <div class="jc-banner-text">
                    <div class="breadcrumb">
                        <a href="{{ route('jadwal.index') }}">Jadwal Perkuliahan</a>
                        / <span>Buat Jadwal Baru</span>
                    </div>
                    <h1>Buat Jadwal Perkuliahan</h1>
                    <p>Tentukan mata kuliah, dosen, ruangan, hari, dan jam perkuliahan.</p>
                </div>
            </div>
        </div>

        {{-- ── Global error alert ── --}}
        @if ($errors->any())
            <div style="background:#FEF2F2;border:1px solid #FECACA;border-radius:12px;padding:1rem 1.25rem;margin-bottom:1.25rem;display:flex;gap:.75rem;align-items:flex-start;">
                <span style="font-size:1.1rem;flex-shrink:0;">⚠️</span>
                <div>
                    <p style="font-size:.83rem;font-weight:700;color:#DC2626;margin:0 0 .35rem;">
                        Terdapat {{ $errors->count() }} kesalahan pada form:
                    </p>
                    <ul style="margin:0;padding-left:1.1rem;">
                        @foreach ($errors->all() as $error)
                            <li style="font-size:.8rem;color:#DC2626;margin-bottom:.2rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- ── Form card ── --}}
        <div class="jc-card">
            <div class="jc-card-header">
                <div class="jc-card-icon blue">📋</div>
                <div>
                    <p class="jc-card-title">Formulir Jadwal Perkuliahan</p>
                    <p class="jc-card-subtitle">Kolom bertanda <span style="color:var(--red);font-weight:700;">*</span> wajib diisi</p>
                </div>
            </div>

            <form action="{{ route('jadwal.store') }}" method="POST" novalidate id="jadwalForm">
                @csrf

                <div class="jc-card-body">

                    {{-- ── Section 1: Mata Kuliah & Dosen ── --}}
                    <div class="jc-section">
                        <p class="jc-section-title">📚 Mata Kuliah & Dosen</p>

                        {{-- Mata Kuliah --}}
                        <div class="jc-field">
                            <label class="jc-label" for="mata_kuliah_id">Mata Kuliah <span class="req">*</span></label>
                            <div class="jc-select-wrap">
                                <select class="jc-select {{ $errors->has('mata_kuliah_id') ? 'has-error' : '' }}"
                                    id="mata_kuliah_id" name="mata_kuliah_id"
                                    onchange="updatePreview()" required>
                                    <option value="">— Pilih Mata Kuliah —</option>
                                    @foreach($mataKuliahs as $mk)
                                        <option value="{{ $mk->id }}"
                                            data-label="{{ $mk->nama_mk }} ({{ $mk->kode_mk }})"
                                            data-sks="{{ $mk->sks }}"
                                            data-semester="{{ $mk->semester }}"
                                            {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                                            {{ $mk->nama_mk }} — {{ $mk->kode_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="jc-hint">💡 Pilih mata kuliah yang akan dijadwalkan.</p>
                            @error('mata_kuliah_id')
                                <p class="jc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dosen (hanya tampil untuk admin) --}}
                        @if(auth()->user()->role === 'admin')
                        <div class="jc-field">
                            <label class="jc-label" for="dosen_id">Dosen Pengajar <span class="req">*</span></label>
                            <div class="jc-select-wrap">
                                <select class="jc-select {{ $errors->has('dosen_id') ? 'has-error' : '' }}"
                                    id="dosen_id" name="dosen_id"
                                    onchange="updatePreview()" required>
                                    <option value="">— Pilih Dosen —</option>
                                    @foreach($dosens as $d)
                                        <option value="{{ $d->id }}"
                                            data-label="{{ $d->nama_lengkap }}"
                                            {{ old('dosen_id') == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama_lengkap }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('dosen_id')
                                <p class="jc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                        @else
                        {{-- Dosen sudah terkunci sesuai akun login --}}
                        <div class="jc-field">
                            <label class="jc-label">Dosen Pengajar</label>
                            <input class="jc-input" type="text"
                                value="{{ auth()->user()->dosen->nama_lengkap }}" readonly
                                style="background:#F3F4F6;color:var(--muted);cursor:default;">
                            <input type="hidden" name="dosen_id" value="{{ auth()->user()->dosen->id }}">
                            <p class="jc-hint">🔒 Dosen diisi otomatis berdasarkan akun yang login.</p>
                        </div>
                        @endif
                    </div>

                    {{-- ── Section 2: Lokasi ── --}}
                    <div class="jc-section">
                        <p class="jc-section-title">🏫 Lokasi Perkuliahan</p>

                        <div class="jc-field">
                            <label class="jc-label" for="ruangan">Ruangan <span class="req">*</span></label>
                            <input class="jc-input {{ $errors->has('ruangan') ? 'has-error' : '' }}"
                                id="ruangan" name="ruangan" type="text"
                                value="{{ old('ruangan') }}"
                                placeholder="Contoh: Gedung A-301, Lab Komputer 2"
                                oninput="updatePreview()"
                                required>
                            @error('ruangan')
                                <p class="jc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ── Section 3: Waktu Perkuliahan ── --}}
                    <div class="jc-section" style="margin-bottom:0;">
                        <p class="jc-section-title">🕐 Waktu Perkuliahan</p>

                        {{-- Hari sebagai pill selector --}}
                        <div class="jc-field">
                            <label class="jc-label">Hari <span class="req">*</span></label>
                            <div class="jc-hari-pills">
                                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                    <div class="jc-hari-pill">
                                        <input type="radio" id="hari_{{ $hari }}" name="hari"
                                            value="{{ $hari }}"
                                            onchange="updatePreview()"
                                            {{ old('hari', '') == $hari ? 'checked' : '' }}>
                                        <label for="hari_{{ $hari }}">{{ $hari }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('hari')
                                <p class="jc-error" style="margin-top:.5rem;">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jam --}}
                        <div class="jc-field">
                            <label class="jc-label" for="jam">Jam Mulai <span class="req">*</span></label>
                            <input class="jc-input {{ $errors->has('jam') ? 'has-error' : '' }}"
                                id="jam" name="jam" type="time"
                                value="{{ old('jam') }}"
                                style="max-width: 200px;"
                                onchange="updatePreview()"
                                required>
                            <p class="jc-hint">⏱ Masukkan jam mulai perkuliahan.</p>
                            @error('jam')
                                <p class="jc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Live preview --}}
                        <div class="jc-preview" id="jadwalPreview">
                            <p class="jc-preview-title">👁 Pratinjau Jadwal</p>
                            <div class="jc-preview-grid">
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">Mata Kuliah</p>
                                    <p class="jc-preview-item-val" id="prev-mk">—</p>
                                </div>
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">Dosen</p>
                                    <p class="jc-preview-item-val" id="prev-dosen">—</p>
                                </div>
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">Ruangan</p>
                                    <p class="jc-preview-item-val" id="prev-ruangan">—</p>
                                </div>
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">Hari</p>
                                    <p class="jc-preview-item-val" id="prev-hari">—</p>
                                </div>
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">Jam Mulai</p>
                                    <p class="jc-preview-item-val" id="prev-jam">—</p>
                                </div>
                                <div class="jc-preview-item">
                                    <p class="jc-preview-item-label">SKS</p>
                                    <p class="jc-preview-item-val" id="prev-sks">—</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>{{-- /jc-card-body --}}

                {{-- ── Footer ── --}}
                <div class="jc-footer">
                    <p class="jc-footer-left">Kolom dengan tanda <strong>*</strong> wajib diisi sebelum menyimpan.</p>
                    <div class="jc-btn-row">
                        <a href="{{ route('jadwal.index') }}" class="jc-btn jc-btn-ghost">
                            ✕ Batal
                        </a>
                        <button type="submit" class="jc-btn jc-btn-primary">
                            💾 Simpan Jadwal
                        </button>
                    </div>
                </div>

            </form>
        </div>{{-- /jc-card --}}

    </div>{{-- /jc-wrapper --}}

    <script>
        function updatePreview() {
            const mkEl     = document.getElementById('mata_kuliah_id');
            const dosenEl  = document.getElementById('dosen_id');
            const ruangan  = document.getElementById('ruangan')?.value.trim() || '';
            const hariEl   = document.querySelector('input[name="hari"]:checked');
            const jam      = document.getElementById('jam')?.value || '';

            const mkOpt    = mkEl?.options[mkEl.selectedIndex];
            const dosenOpt = dosenEl?.options[dosenEl?.selectedIndex];

            const mkLabel    = (mkOpt?.value)    ? mkOpt.dataset.label : '—';
            const sks        = (mkOpt?.value)    ? (mkOpt.dataset.sks + ' SKS') : '—';
            const dosenLabel = dosenEl
                ? ((dosenOpt?.value) ? dosenOpt.dataset.label : '—')
                : '{{ auth()->user()->role !== "admin" ? auth()->user()->dosen->nama_lengkap : "" }}';
            const hariLabel  = hariEl ? hariEl.value : '—';
            const jamLabel   = jam ? jam : '—';

            document.getElementById('prev-mk').textContent      = mkLabel;
            document.getElementById('prev-dosen').textContent   = dosenLabel || '—';
            document.getElementById('prev-ruangan').textContent = ruangan || '—';
            document.getElementById('prev-hari').textContent    = hariLabel;
            document.getElementById('prev-jam').textContent     = jamLabel;
            document.getElementById('prev-sks').textContent     = sks;

            const hasAny = mkLabel !== '—' || ruangan || hariLabel !== '—' || jamLabel !== '—';
            document.getElementById('jadwalPreview').classList.toggle('show', hasAny);
        }

        document.addEventListener('DOMContentLoaded', updatePreview);
    </script>

</x-app-layout>