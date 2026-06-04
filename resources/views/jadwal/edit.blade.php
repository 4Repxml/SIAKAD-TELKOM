<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reschedule Jadwal Perkuliahan') }}
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
            --border: #E5E7EB;
        }

        .je-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 1.75rem 1.25rem 3rem;
        }

        /* ── Banner ── */
        .je-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            border-radius: 20px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.75rem;
            position: relative;
            overflow: hidden;
            color: white;
        }
        .je-banner::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }
        .je-banner .glow {
            position: absolute;
            top: -70px; right: -50px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(204,0,0,.32) 0%, transparent 65%);
            border-radius: 50%;
        }
        .je-banner-inner {
            position: relative; z-index: 1;
            display: flex; align-items: center; gap: 1.25rem;
        }
        .je-banner-icon {
            width: 58px; height: 58px; border-radius: 16px;
            background: rgba(255,255,255,.12);
            border: 1.5px solid rgba(255,255,255,.22);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; flex-shrink: 0;
        }
        .je-banner-text .breadcrumb {
            font-size: .72rem; font-weight: 600;
            color: rgba(255,255,255,.4);
            text-transform: uppercase; letter-spacing: .5px;
            margin-bottom: .3rem;
        }
        .je-banner-text .breadcrumb a {
            color: rgba(255,255,255,.4); text-decoration: none;
            transition: color .15s;
        }
        .je-banner-text .breadcrumb a:hover { color: var(--gold); }
        .je-banner-text .breadcrumb span { color: var(--gold); }
        .je-banner-text h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem; color: white;
            margin: 0 0 .2rem; line-height: 1.2;
        }
        .je-banner-text p { font-size: .8rem; color: rgba(255,255,255,.5); margin: 0; }

        /* ── Jadwal lama info strip ── */
        .je-old-strip {
            background: var(--gold-soft);
            border: 1px solid #FDE68A;
            border-radius: 12px;
            padding: .9rem 1.25rem;
            margin-bottom: 1.5rem;
            display: flex; align-items: center; gap: .75rem; flex-wrap: wrap;
        }
        .je-old-strip-label {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .5px;
            color: #92400E; flex-shrink: 0;
        }
        .je-old-strip-items {
            display: flex; gap: 1rem; flex-wrap: wrap;
        }
        .je-old-item { font-size: .8rem; color: #78350F; }
        .je-old-item strong { font-weight: 700; }

        /* ── Card ── */
        .je-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            animation: fadeUp .45s ease both;
        }
        .je-card-header {
            display: flex; align-items: center; gap: .875rem;
            padding: 1.1rem 1.75rem;
            background: #FAFAFA;
            border-bottom: 1px solid var(--border);
        }
        .je-card-icon {
            width: 38px; height: 38px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }
        .je-card-icon.gold { background: var(--gold-soft); }
        .je-card-title    { font-size: .88rem; font-weight: 700; color: var(--text); margin: 0; }
        .je-card-subtitle { font-size: .73rem; color: var(--muted); margin: 0; }

        .je-card-body { padding: 1.75rem; }

        /* ── Section divider ── */
        .je-section { margin-bottom: 1.6rem; }
        .je-section:last-of-type { margin-bottom: 0; }
        .je-section-title {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .8px;
            color: var(--muted);
            padding-bottom: .6rem;
            border-bottom: 1px dashed var(--border);
            margin-bottom: 1.1rem;
        }

        /* ── Fields ── */
        .je-field { display: flex; flex-direction: column; gap: .38rem; margin-bottom: 1rem; }
        .je-field:last-child { margin-bottom: 0; }

        .je-label {
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px;
            color: var(--muted);
        }
        .je-label .req { color: var(--red); margin-left: 2px; }

        .je-input,
        .je-select {
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
        .je-input:focus,
        .je-select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(204,0,0,.1);
            background: white;
        }
        .je-input::placeholder { color: #C4C9D4; }
        .je-input.readonly {
            background: #F3F4F6; color: var(--muted); cursor: default;
        }
        .je-input.has-error,
        .je-select.has-error { border-color: #EF4444; background: #FFF5F5; }

        /* select arrow */
        .je-select-wrap { position: relative; }
        .je-select-wrap::after {
            content: '▾';
            position: absolute; right: .9rem; top: 50%;
            transform: translateY(-50%);
            color: var(--muted); font-size: .75rem;
            pointer-events: none;
        }
        .je-select { padding-right: 2.2rem; cursor: pointer; }

        /* hari pill selector */
        .je-hari-pills { display: flex; flex-wrap: wrap; gap: .5rem; margin-top: .1rem; }
        .je-hari-pill input[type="radio"] { display: none; }
        .je-hari-pill label {
            display: inline-flex; align-items: center; justify-content: center;
            padding: .42rem .9rem; border-radius: 99px;
            font-size: .8rem; font-weight: 600;
            border: 1.5px solid var(--border);
            color: var(--muted); background: #FAFAFA;
            cursor: pointer;
            transition: all .15s;
            user-select: none;
        }
        .je-hari-pill input[type="radio"]:checked + label {
            background: var(--red); color: white; border-color: var(--red);
        }
        .je-hari-pill label:hover { border-color: var(--red); color: var(--red); }
        .je-hari-pill input[type="radio"]:checked + label:hover {
            background: var(--red-deep); color: white;
        }

        /* hints & errors */
        .je-hint  { font-size: .72rem; color: var(--muted); margin-top: .2rem; line-height: 1.5; }
        .je-error { font-size: .72rem; color: #DC2626; margin-top: .2rem; }

        /* change indicator */
        .je-changed-badge {
            display: none;
            font-size: .68rem; font-weight: 700;
            background: var(--gold-soft); color: #92400E;
            border: 1px solid #FDE68A; border-radius: 99px;
            padding: .15rem .55rem; margin-left: .5rem;
            vertical-align: middle;
        }
        .je-changed-badge.show { display: inline; }

        /* ── Footer ── */
        .je-footer {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem;
            padding: 1.2rem 1.75rem;
            background: #FAFAFA;
            border-top: 1px solid var(--border);
        }
        .je-footer-left { font-size: .78rem; color: var(--muted); }
        .je-footer-left strong { color: var(--red); }
        .je-btn-row { display: flex; align-items: center; gap: .65rem; }

        .je-btn {
            display: inline-flex; align-items: center; gap: .5rem;
            padding: .58rem 1.35rem; border-radius: 10px;
            font-size: .855rem; font-weight: 600; font-family: inherit;
            border: none; cursor: pointer; text-decoration: none;
            transition: background .15s, transform .1s;
        }
        .je-btn:active { transform: scale(.97); }
        .je-btn-primary { background: var(--red); color: white; }
        .je-btn-primary:hover { background: var(--red-deep); color: white; }
        .je-btn-ghost { background: #F3F4F6; color: #374151; border: 1px solid var(--border); }
        .je-btn-ghost:hover { background: #E9EAEC; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 580px) {
            .je-banner-inner { flex-direction: column; align-items: flex-start; gap: .75rem; }
            .je-footer { flex-direction: column; align-items: flex-start; }
            .je-old-strip { flex-direction: column; align-items: flex-start; gap: .5rem; }
        }
    </style>

    <div class="je-wrapper">

        {{-- ── Banner ── --}}
        <div class="je-banner">
            <div class="glow"></div>
            <div class="je-banner-inner">
                <div class="je-banner-icon">🗓️</div>
                <div class="je-banner-text">
                    <div class="breadcrumb">
                        <a href="{{ route('jadwal.index') }}">Jadwal Perkuliahan</a>
                        / <span>Reschedule</span>
                    </div>
                    <h1>{{ $jadwal->mataKuliah->nama_mk }}</h1>
                    <p>{{ $jadwal->mataKuliah->kode_mk }} &nbsp;·&nbsp; {{ $jadwal->dosen->nama_lengkap }} &nbsp;·&nbsp; {{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</p>
                </div>
            </div>
        </div>

        {{-- ── Jadwal lama strip ── --}}
        <div class="je-old-strip">
            <span class="je-old-strip-label">📌 Jadwal Saat Ini</span>
            <div class="je-old-strip-items">
                <span class="je-old-item"><strong>Hari:</strong> {{ $jadwal->hari }}</span>
                <span class="je-old-item"><strong>Jam:</strong> {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</span>
                <span class="je-old-item"><strong>Ruangan:</strong> {{ $jadwal->ruangan }}</span>
                <span class="je-old-item"><strong>Dosen:</strong> {{ $jadwal->dosen->nama_lengkap }}</span>
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
        <div class="je-card">
            <div class="je-card-header">
                <div class="je-card-icon gold">✏️</div>
                <div>
                    <p class="je-card-title">Formulir Reschedule Jadwal</p>
                    <p class="je-card-subtitle">Kolom bertanda <span style="color:var(--red);font-weight:700;">*</span> wajib diisi</p>
                </div>
            </div>

            <form action="{{ route('jadwal.update', $jadwal) }}" method="POST" novalidate>
                @csrf
                @method('PATCH')

                <div class="je-card-body">

                    {{-- ── Section 1: Mata Kuliah & Dosen ── --}}
                    <div class="je-section">
                        <p class="je-section-title">📚 Mata Kuliah & Dosen</p>

                        {{-- Mata Kuliah --}}
                        <div class="je-field">
                            <label class="je-label" for="mata_kuliah_id">
                                Mata Kuliah <span class="req">*</span>
                                <span class="je-changed-badge" id="badge-mk">✎ Diubah</span>
                            </label>
                            <div class="je-select-wrap">
                                <select class="je-select {{ $errors->has('mata_kuliah_id') ? 'has-error' : '' }}"
                                    id="mata_kuliah_id" name="mata_kuliah_id"
                                    data-original="{{ $jadwal->mata_kuliah_id }}"
                                    onchange="trackChange(this, 'badge-mk')"
                                    required>
                                    @foreach($mataKuliahs as $mk)
                                        <option value="{{ $mk->id }}"
                                            {{ old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $mk->id ? 'selected' : '' }}>
                                            {{ $mk->nama_mk }} — {{ $mk->kode_mk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mata_kuliah_id')
                                <p class="je-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dosen (admin only) --}}
                        @if(auth()->user()->role === 'admin')
                        <div class="je-field">
                            <label class="je-label" for="dosen_id">
                                Dosen Pengajar <span class="req">*</span>
                                <span class="je-changed-badge" id="badge-dosen">✎ Diubah</span>
                            </label>
                            <div class="je-select-wrap">
                                <select class="je-select {{ $errors->has('dosen_id') ? 'has-error' : '' }}"
                                    id="dosen_id" name="dosen_id"
                                    data-original="{{ $jadwal->dosen_id }}"
                                    onchange="trackChange(this, 'badge-dosen')"
                                    required>
                                    @foreach($dosens as $d)
                                        <option value="{{ $d->id }}"
                                            {{ old('dosen_id', $jadwal->dosen_id) == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama_lengkap }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('dosen_id')
                                <p class="je-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                        @else
                        <div class="je-field">
                            <label class="je-label">Dosen Pengajar</label>
                            <input class="je-input readonly" type="text"
                                value="{{ auth()->user()->dosen->nama_lengkap }}" readonly>
                            <input type="hidden" name="dosen_id" value="{{ auth()->user()->dosen->id }}">
                            <p class="je-hint">🔒 Dosen diisi otomatis berdasarkan akun yang login.</p>
                        </div>
                        @endif
                    </div>

                    {{-- ── Section 2: Lokasi ── --}}
                    <div class="je-section">
                        <p class="je-section-title">🏫 Lokasi Perkuliahan</p>

                        <div class="je-field">
                            <label class="je-label" for="ruangan">
                                Ruangan <span class="req">*</span>
                                <span class="je-changed-badge" id="badge-ruangan">✎ Diubah</span>
                            </label>
                            <input class="je-input {{ $errors->has('ruangan') ? 'has-error' : '' }}"
                                id="ruangan" name="ruangan" type="text"
                                value="{{ old('ruangan', $jadwal->ruangan) }}"
                                data-original="{{ $jadwal->ruangan }}"
                                placeholder="Contoh: Gedung A-301, Lab Komputer 2"
                                oninput="trackChangeInput(this, 'badge-ruangan')"
                                required>
                            @error('ruangan')
                                <p class="je-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ── Section 3: Waktu Perkuliahan ── --}}
                    <div class="je-section" style="margin-bottom:0;">
                        <p class="je-section-title">🕐 Waktu Perkuliahan</p>

                        {{-- Hari pill selector --}}
                        <div class="je-field">
                            <label class="je-label">
                                Hari <span class="req">*</span>
                                <span class="je-changed-badge" id="badge-hari">✎ Diubah</span>
                            </label>
                            <div class="je-hari-pills">
                                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                    <div class="je-hari-pill">
                                        <input type="radio" id="hari_{{ $hari }}" name="hari"
                                            value="{{ $hari }}"
                                            data-original="{{ $jadwal->hari }}"
                                            onchange="trackChangePill('badge-hari', '{{ $jadwal->hari }}')"
                                            {{ old('hari', $jadwal->hari) == $hari ? 'checked' : '' }}>
                                        <label for="hari_{{ $hari }}">{{ $hari }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('hari')
                                <p class="je-error" style="margin-top:.5rem;">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jam --}}
                        <div class="je-field">
                            <label class="je-label" for="jam">
                                Jam Mulai <span class="req">*</span>
                                <span class="je-changed-badge" id="badge-jam">✎ Diubah</span>
                            </label>
                            <input class="je-input {{ $errors->has('jam') ? 'has-error' : '' }}"
                                id="jam" name="jam" type="time"
                                value="{{ old('jam', \Carbon\Carbon::parse($jadwal->jam)->format('H:i')) }}"
                                data-original="{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}"
                                style="max-width:200px;"
                                onchange="trackChangeInput(this, 'badge-jam')"
                                required>
                            <p class="je-hint">⏱ Jam mulai perkuliahan yang baru.</p>
                            @error('jam')
                                <p class="je-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Info akun readonly --}}
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:.5rem;">
                            <div class="je-field" style="margin-bottom:0;">
                                <label class="je-label">Dibuat Pada</label>
                                <input class="je-input readonly" type="text"
                                    value="{{ $jadwal->created_at->format('d M Y, H:i') }}" readonly>
                            </div>
                            <div class="je-field" style="margin-bottom:0;">
                                <label class="je-label">Terakhir Diubah</label>
                                <input class="je-input readonly" type="text"
                                    value="{{ $jadwal->updated_at->format('d M Y, H:i') }}" readonly>
                            </div>
                        </div>
                    </div>

                </div>{{-- /je-card-body --}}

                {{-- ── Footer ── --}}
                <div class="je-footer">
                    <p class="je-footer-left">Kolom dengan tanda <strong>*</strong> wajib diisi sebelum menyimpan.</p>
                    <div class="je-btn-row">
                        <a href="{{ route('jadwal.index') }}" class="je-btn je-btn-ghost">
                            ✕ Batal
                        </a>
                        <button type="submit" class="je-btn je-btn-primary">
                            💾 Perbarui Jadwal
                        </button>
                    </div>
                </div>

            </form>
        </div>{{-- /je-card --}}

    </div>{{-- /je-wrapper --}}

    <script>
        /* Tampilkan badge "Diubah" jika value berbeda dari nilai asli */
        function trackChange(el, badgeId) {
            const badge   = document.getElementById(badgeId);
            const changed = el.value != el.dataset.original;
            badge.classList.toggle('show', changed);
        }

        function trackChangeInput(el, badgeId) {
            const badge   = document.getElementById(badgeId);
            const changed = el.value.trim() !== el.dataset.original.trim();
            badge.classList.toggle('show', changed);
        }

        function trackChangePill(badgeId, original) {
            const checked = document.querySelector('input[name="hari"]:checked');
            const badge   = document.getElementById(badgeId);
            badge.classList.toggle('show', checked && checked.value !== original);
        }
    </script>

</x-app-layout>