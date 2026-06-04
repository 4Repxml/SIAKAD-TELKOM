<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftarkan Mahasiswa Baru') }}
        </h2>
    </x-slot>

    <style>
        :root {
            --red: #CC0000; --red-deep: #990000; --red-soft: #FFF0F0;
            --navy: #0B1F3A; --navy-mid: #1A3560;
            --gold: #F5A623; --gold-soft: #FFFBEB;
            --green: #16A34A; --green-soft: #F0FDF4;
            --text: #111827; --muted: #6B7280;
            --border: #E5E7EB; --bg: #F3F4F8;
        }

        /* ── Page wrapper ── */
        .mc-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 1.75rem 1.25rem 3rem;
        }

        /* ── Banner ── */
        .mc-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            border-radius: 20px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.75rem;
            position: relative;
            overflow: hidden;
            color: white;
        }
        .mc-banner::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }
        .mc-banner .glow {
            position: absolute;
            top: -70px; right: -50px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(204,0,0,.32) 0%, transparent 65%);
            border-radius: 50%;
        }
        .mc-banner-inner {
            position: relative; z-index: 1;
            display: flex; align-items: center; gap: 1.25rem;
        }
        .mc-banner-icon {
            width: 56px; height: 56px; border-radius: 16px;
            background: rgba(255,255,255,.12);
            border: 1.5px solid rgba(255,255,255,.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; flex-shrink: 0;
        }
        .mc-banner-text .breadcrumb {
            font-size: .72rem; font-weight: 600;
            color: rgba(255,255,255,.4);
            text-transform: uppercase; letter-spacing: .5px;
            margin-bottom: .3rem;
        }
        .mc-banner-text .breadcrumb a {
            color: rgba(255,255,255,.4);
            text-decoration: none;
            transition: color .15s;
        }
        .mc-banner-text .breadcrumb a:hover { color: var(--gold); }
        .mc-banner-text .breadcrumb span { color: var(--gold); }
        .mc-banner-text h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem; color: white;
            margin: 0 0 .2rem; line-height: 1.2;
        }
        .mc-banner-text p { font-size: .8rem; color: rgba(255,255,255,.5); margin: 0; }

        /* ── Form card ── */
        .mc-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            animation: fadeUp .45s ease both;
        }

        .mc-card-header {
            display: flex; align-items: center; gap: .875rem;
            padding: 1.1rem 1.75rem;
            background: #FAFAFA;
            border-bottom: 1px solid var(--border);
        }
        .mc-card-icon {
            width: 38px; height: 38px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }
        .mc-card-icon.red   { background: var(--red-soft); }
        .mc-card-icon.navy  { background: #EEF1F8; }
        .mc-card-icon.gold  { background: var(--gold-soft); }
        .mc-card-title { font-size: .88rem; font-weight: 700; color: var(--text); margin: 0; }
        .mc-card-subtitle { font-size: .73rem; color: var(--muted); margin: 0; }

        .mc-card-body { padding: 1.75rem; }

        /* ── Section divider inside card ── */
        .mc-section { margin-bottom: 1.75rem; }
        .mc-section:last-of-type { margin-bottom: 0; }
        .mc-section-title {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .8px;
            color: var(--muted);
            padding-bottom: .6rem;
            border-bottom: 1px dashed var(--border);
            margin-bottom: 1.1rem;
        }

        /* ── Field grid ── */
        .mc-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .mc-grid-1 { display: grid; grid-template-columns: 1fr; gap: 1rem; }

        .mc-field { display: flex; flex-direction: column; gap: .38rem; margin-bottom: 1rem; }
        .mc-field:last-child { margin-bottom: 0; }

        .mc-label {
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px;
            color: var(--muted);
        }
        .mc-label .required { color: var(--red); margin-left: 2px; }

        .mc-input,
        .mc-select {
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
        .mc-input:focus,
        .mc-select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(204,0,0,.1);
            background: white;
        }
        .mc-input::placeholder { color: #C4C9D4; }
        .mc-input.has-error,
        .mc-select.has-error {
            border-color: #EF4444;
            background: #FFF5F5;
        }

        /* select arrow */
        .mc-select-wrap { position: relative; }
        .mc-select-wrap::after {
            content: '▾';
            position: absolute; right: .9rem; top: 50%;
            transform: translateY(-50%);
            color: var(--muted); font-size: .75rem;
            pointer-events: none;
        }
        .mc-select { padding-right: 2.2rem; cursor: pointer; }

        /* password wrap */
        .mc-pass-wrap { position: relative; }
        .mc-pass-wrap .mc-input { padding-right: 2.8rem; }
        .mc-toggle-pass {
            position: absolute; right: .75rem; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: var(--muted); cursor: pointer; padding: 0;
            font-size: .9rem; line-height: 1;
            transition: color .15s;
        }
        .mc-toggle-pass:hover { color: var(--text); }

        /* strength */
        .mc-strength-bars { display: flex; gap: 3px; margin-top: .4rem; }
        .mc-sbar {
            height: 3px; flex: 1; border-radius: 99px;
            background: var(--border); transition: background .25s;
        }
        .mc-sbar.weak   { background: #EF4444; }
        .mc-sbar.medium { background: #F59E0B; }
        .mc-sbar.strong { background: var(--green); }

        /* hint & error */
        .mc-hint  { font-size: .72rem; color: var(--muted); margin-top: .2rem; }
        .mc-error { font-size: .72rem; color: #DC2626; margin-top: .2rem; }

        /* status badge (NIM prefix preview) */
        .mc-nim-preview {
            display: inline-flex; align-items: center; gap: .35rem;
            font-size: .72rem; font-weight: 600; margin-top: .3rem;
            color: var(--navy); background: #EEF1F8;
            border: 1px solid #D0D9EE; border-radius: 99px;
            padding: .2rem .6rem; opacity: 0;
            transition: opacity .2s;
        }
        .mc-nim-preview.show { opacity: 1; }

        /* ── Footer buttons ── */
        .mc-footer {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem;
            padding: 1.25rem 1.75rem;
            background: #FAFAFA;
            border-top: 1px solid var(--border);
        }
        .mc-footer-left { font-size: .78rem; color: var(--muted); }
        .mc-footer-left strong { color: var(--red); }
        .mc-btn-row { display: flex; align-items: center; gap: .65rem; }

        .mc-btn {
            display: inline-flex; align-items: center; gap: .5rem;
            padding: .58rem 1.35rem; border-radius: 10px;
            font-size: .855rem; font-weight: 600; font-family: inherit;
            border: none; cursor: pointer; text-decoration: none;
            transition: background .15s, transform .1s;
        }
        .mc-btn:active { transform: scale(.97); }
        .mc-btn-primary { background: var(--red); color: white; }
        .mc-btn-primary:hover { background: var(--red-deep); color: white; }
        .mc-btn-ghost { background: #F3F4F6; color: #374151; border: 1px solid var(--border); }
        .mc-btn-ghost:hover { background: #E9EAEC; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 580px) {
            .mc-grid-2 { grid-template-columns: 1fr; }
            .mc-banner-inner { flex-direction: column; align-items: flex-start; gap: .75rem; }
            .mc-footer { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="mc-wrapper">

        {{-- ── Banner ── --}}
        <div class="mc-banner">
            <div class="glow"></div>
            <div class="mc-banner-inner">
                <div class="mc-banner-icon">🎓</div>
                <div class="mc-banner-text">
                    <div class="breadcrumb">
                        <a href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
                        / <span>Pendaftaran Baru</span>
                    </div>
                    <h1>Daftarkan Mahasiswa Baru</h1>
                    <p>Isi semua data dengan benar. Akun login akan dibuat otomatis.</p>
                </div>
            </div>
        </div>

        {{-- ── Global error alert ── --}}
        @if ($errors->any())
            <div style="background:#FEF2F2; border:1px solid #FECACA; border-radius:12px; padding:1rem 1.25rem; margin-bottom:1.25rem; display:flex; gap:.75rem; align-items:flex-start;">
                <span style="font-size:1.1rem; flex-shrink:0;">⚠️</span>
                <div>
                    <p style="font-size:.83rem; font-weight:700; color:#DC2626; margin:0 0 .35rem;">Terdapat {{ $errors->count() }} kesalahan pada form:</p>
                    <ul style="margin:0; padding-left:1.1rem;">
                        @foreach ($errors->all() as $error)
                            <li style="font-size:.8rem; color:#DC2626; margin-bottom:.2rem;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- ── Form card ── --}}
        <div class="mc-card">
            <div class="mc-card-header">
                <div class="mc-card-icon red">📋</div>
                <div>
                    <p class="mc-card-title">Formulir Pendaftaran Mahasiswa</p>
                    <p class="mc-card-subtitle">Kolom bertanda <span style="color:var(--red);font-weight:700;">*</span> wajib diisi</p>
                </div>
            </div>

            <form action="{{ route('mahasiswa.store') }}" method="POST" id="createForm" novalidate>
                @csrf
                <div class="mc-card-body">

                    {{-- ── Section 1: Identitas Akademik ── --}}
                    <div class="mc-section">
                        <p class="mc-section-title">📌 Identitas Akademik</p>

                        <div class="mc-grid-2">
                            {{-- NIM --}}
                            <div class="mc-field">
                                <label class="mc-label" for="nim">NIM <span class="required">*</span></label>
                                <input class="mc-input {{ $errors->has('nim') ? 'has-error' : '' }}"
                                    id="nim" name="nim" type="text"
                                    value="{{ old('nim') }}"
                                    placeholder="Contoh: 1234567890"
                                    maxlength="12"
                                    oninput="previewNIM(this.value)"
                                    required autofocus>
                                <span class="mc-nim-preview" id="nimPreview">🎓 <span id="nimText"></span></span>
                                @error('nim')
                                    <p class="mc-error">⚠ {{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tahun Angkatan --}}
                            <div class="mc-field">
                                <label class="mc-label" for="tahun_angkatan">Tahun Angkatan <span class="required">*</span></label>
                                <div class="mc-select-wrap">
                                    <select class="mc-select {{ $errors->has('tahun_angkatan') ? 'has-error' : '' }}"
                                        id="tahun_angkatan" name="tahun_angkatan" required>
                                        <option value="">— Pilih Tahun —</option>
                                        @for ($year = date('Y') + 1; $year >= 2018; $year--)
                                            <option value="{{ $year }}" {{ old('tahun_angkatan') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('tahun_angkatan')
                                    <p class="mc-error">⚠ {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Program Studi --}}
                        <div class="mc-field">
                            <label class="mc-label" for="prodi">Program Studi <span class="required">*</span></label>
                            <div class="mc-select-wrap">
                                <select class="mc-select {{ $errors->has('prodi') ? 'has-error' : '' }}"
                                    id="prodi" name="prodi" required>
                                    <option value="">— Pilih Program Studi —</option>
                                    @foreach ([
                                        'S1 Teknik Industri',
                                        'S1 Sistem Informasi',
                                        'S1 Manajemen Rekayasa Industri',
                                        'S1 Teknik Logistik',
                                    ] as $p)
                                        <option value="{{ $p }}" {{ old('prodi') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('prodi')
                                <p class="mc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ── Section 2: Data Diri ── --}}
                    <div class="mc-section">
                        <p class="mc-section-title">👤 Data Diri Mahasiswa</p>

                        {{-- Nama Lengkap --}}
                        <div class="mc-field">
                            <label class="mc-label" for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                            <input class="mc-input {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}"
                                id="nama_lengkap" name="nama_lengkap" type="text"
                                value="{{ old('nama_lengkap') }}"
                                placeholder="Sesuai KTP / dokumen resmi"
                                required>
                            @error('nama_lengkap')
                                <p class="mc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mc-field">
                            <label class="mc-label" for="email">Alamat Email <span class="required">*</span></label>
                            <input class="mc-input {{ $errors->has('email') ? 'has-error' : '' }}"
                                id="email" name="email" type="email"
                                value="{{ old('email') }}"
                                placeholder="contoh@student.telkomuniversity.ac.id"
                                required>
                            <p class="mc-hint">💡 Email ini akan digunakan sebagai akun login mahasiswa.</p>
                            @error('email')
                                <p class="mc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ── Section 3: Keamanan Akun ── --}}
                    <div class="mc-section" style="margin-bottom:0;">
                        <p class="mc-section-title">🔒 Keamanan Akun</p>

                        <div class="mc-field">
                            <label class="mc-label" for="password">Password Default <span class="required">*</span></label>
                            <div class="mc-pass-wrap">
                                <input class="mc-input {{ $errors->has('password') ? 'has-error' : '' }}"
                                    id="password" name="password" type="password"
                                    placeholder="Min. 8 karakter"
                                    oninput="checkStrength(this.value)"
                                    required>
                                <button type="button" class="mc-toggle-pass" onclick="togglePass()" aria-label="Tampilkan password">
                                    <span id="passEye">👁</span>
                                </button>
                            </div>
                            <div class="mc-strength-bars">
                                <div class="mc-sbar" id="sb1"></div>
                                <div class="mc-sbar" id="sb2"></div>
                                <div class="mc-sbar" id="sb3"></div>
                                <div class="mc-sbar" id="sb4"></div>
                            </div>
                            <p class="mc-hint" id="strengthHint">Mahasiswa dapat mengubah password setelah login pertama.</p>
                            @error('password')
                                <p class="mc-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>{{-- /mc-card-body --}}

                {{-- ── Footer ── --}}
                <div class="mc-footer">
                    <p class="mc-footer-left">Kolom dengan tanda <strong>*</strong> wajib diisi sebelum menyimpan.</p>
                    <div class="mc-btn-row">
                        <a href="{{ route('mahasiswa.index') }}" class="mc-btn mc-btn-ghost">
                            ✕ Batal
                        </a>
                        <button type="submit" class="mc-btn mc-btn-primary">
                            💾 Simpan & Daftarkan
                        </button>
                    </div>
                </div>

            </form>
        </div>{{-- /mc-card --}}

    </div>{{-- /mc-wrapper --}}

    <script>
        /* NIM preview */
        function previewNIM(val) {
            const preview = document.getElementById('nimPreview');
            const text    = document.getElementById('nimText');
            if (val.length >= 3) {
                text.textContent = val;
                preview.classList.add('show');
            } else {
                preview.classList.remove('show');
            }
        }

        /* Password toggle */
        function togglePass() {
            const inp = document.getElementById('password');
            const eye = document.getElementById('passEye');
            inp.type  = inp.type === 'password' ? 'text' : 'password';
            eye.textContent = inp.type === 'password' ? '👁' : '🙈';
        }

        /* Password strength */
        function checkStrength(val) {
            const bars = ['sb1','sb2','sb3','sb4'].map(id => document.getElementById(id));
            const hint = document.getElementById('strengthHint');
            bars.forEach(b => b.className = 'mc-sbar');
            if (!val) { hint.textContent = 'Mahasiswa dapat mengubah password setelah login pertama.'; hint.style.color = ''; return; }

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const map = {
                1: { cls: 'weak',   label: 'Lemah',       color: '#EF4444' },
                2: { cls: 'medium', label: 'Sedang',      color: '#F59E0B' },
                3: { cls: 'strong', label: 'Kuat',        color: '#16A34A' },
                4: { cls: 'strong', label: 'Sangat Kuat', color: '#16A34A' },
            };
            const info = map[score] || map[1];
            for (let i = 0; i < score; i++) bars[i].classList.add(info.cls);
            hint.textContent  = '🔐 Kekuatan: ' + info.label;
            hint.style.color  = info.color;
        }
    </script>

</x-app-layout>