<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Dosen') }}
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

        .de-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 1.75rem 1.25rem 3rem;
        }

        /* ── Banner ── */
        .de-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            border-radius: 20px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.75rem;
            position: relative;
            overflow: hidden;
            color: white;
        }
        .de-banner::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 44px 44px;
        }
        .de-banner .glow {
            position: absolute;
            top: -70px; right: -50px;
            width: 280px; height: 280px;
            background: radial-gradient(circle, rgba(204,0,0,.32) 0%, transparent 65%);
            border-radius: 50%;
        }
        .de-banner-inner {
            position: relative; z-index: 1;
            display: flex; align-items: center; gap: 1.25rem;
        }
        .de-banner-avatar {
            width: 58px; height: 58px; border-radius: 16px;
            background: rgba(255,255,255,.12);
            border: 1.5px solid rgba(255,255,255,.22);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; font-weight: 700; color: white;
            flex-shrink: 0; letter-spacing: -.5px;
        }
        .de-banner-text .breadcrumb {
            font-size: .72rem; font-weight: 600;
            color: rgba(255,255,255,.4);
            text-transform: uppercase; letter-spacing: .5px;
            margin-bottom: .3rem;
        }
        .de-banner-text .breadcrumb a {
            color: rgba(255,255,255,.4); text-decoration: none;
            transition: color .15s;
        }
        .de-banner-text .breadcrumb a:hover { color: var(--gold); }
        .de-banner-text .breadcrumb span { color: var(--gold); }
        .de-banner-text h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem; color: white;
            margin: 0 0 .2rem; line-height: 1.2;
        }
        .de-banner-text p { font-size: .8rem; color: rgba(255,255,255,.5); margin: 0; }

        /* ── Card ── */
        .de-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            animation: fadeUp .45s ease both;
        }
        .de-card-header {
            display: flex; align-items: center; gap: .875rem;
            padding: 1.1rem 1.75rem;
            background: #FAFAFA;
            border-bottom: 1px solid var(--border);
        }
        .de-card-icon {
            width: 38px; height: 38px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem; flex-shrink: 0;
        }
        .de-card-icon.gold { background: var(--gold-soft); }
        .de-card-title    { font-size: .88rem; font-weight: 700; color: var(--text); margin: 0; }
        .de-card-subtitle { font-size: .73rem; color: var(--muted); margin: 0; }

        .de-card-body { padding: 1.75rem; }

        /* ── Section divider ── */
        .de-section { margin-bottom: 1.6rem; }
        .de-section:last-of-type { margin-bottom: 0; }
        .de-section-title {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .8px;
            color: var(--muted);
            padding-bottom: .6rem;
            border-bottom: 1px dashed var(--border);
            margin-bottom: 1.1rem;
        }

        /* ── Fields ── */
        .de-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .de-field { display: flex; flex-direction: column; gap: .38rem; margin-bottom: 1rem; }
        .de-field:last-child { margin-bottom: 0; }

        .de-label {
            font-size: .72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .5px;
            color: var(--muted);
        }
        .de-label .req { color: var(--red); margin-left: 2px; }

        .de-input {
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
        }
        .de-input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(204,0,0,.1);
            background: white;
        }
        .de-input::placeholder { color: #C4C9D4; }
        .de-input.readonly {
            background: #F3F4F6; color: var(--muted); cursor: default;
        }
        .de-input.has-error { border-color: #EF4444; background: #FFF5F5; }

        /* phone prefix */
        .de-phone-wrap { display: flex; }
        .de-phone-prefix {
            padding: .62rem .9rem;
            background: #F3F4F6;
            border: 1px solid var(--border);
            border-right: none;
            border-radius: 10px 0 0 10px;
            font-size: .875rem; color: var(--muted);
            font-weight: 600; white-space: nowrap; flex-shrink: 0;
        }
        .de-phone-wrap .de-input { border-radius: 0 10px 10px 0; }

        /* badges */
        .de-info-badge {
            display: inline-flex; align-items: center; gap: .35rem;
            font-size: .7rem; font-weight: 600;
            background: #EEF1F8; color: var(--navy);
            border: 1px solid #D0D9EE; border-radius: 99px;
            padding: .18rem .6rem; margin-top: .3rem;
        }

        /* hints & errors */
        .de-hint  { font-size: .72rem; color: var(--muted); margin-top: .2rem; line-height: 1.5; }
        .de-error { font-size: .72rem; color: #DC2626; margin-top: .2rem; }

        /* ── Footer ── */
        .de-footer {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem;
            padding: 1.2rem 1.75rem;
            background: #FAFAFA;
            border-top: 1px solid var(--border);
        }
        .de-footer-left { font-size: .78rem; color: var(--muted); }
        .de-footer-left strong { color: var(--red); }
        .de-btn-row { display: flex; align-items: center; gap: .65rem; }

        .de-btn {
            display: inline-flex; align-items: center; gap: .5rem;
            padding: .58rem 1.35rem; border-radius: 10px;
            font-size: .855rem; font-weight: 600; font-family: inherit;
            border: none; cursor: pointer; text-decoration: none;
            transition: background .15s, transform .1s;
        }
        .de-btn:active { transform: scale(.97); }
        .de-btn-primary { background: var(--red); color: white; }
        .de-btn-primary:hover { background: var(--red-deep); color: white; }
        .de-btn-ghost { background: #F3F4F6; color: #374151; border: 1px solid var(--border); }
        .de-btn-ghost:hover { background: #E9EAEC; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 580px) {
            .de-grid-2 { grid-template-columns: 1fr; }
            .de-banner-inner { flex-direction: column; align-items: flex-start; gap: .75rem; }
            .de-footer { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="de-wrapper">

        {{-- ── Banner ── --}}
        <div class="de-banner">
            <div class="glow"></div>
            <div class="de-banner-inner">
                <div class="de-banner-avatar" id="bannerAvatar">
                    {{ strtoupper(substr($dosen->nama_lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', $dosen->nama_lengkap)[1] ?? '', 0, 1)) }}
                </div>
                <div class="de-banner-text">
                    <div class="breadcrumb">
                        <a href="{{ route('dosen.index') }}">Data Dosen</a>
                        / <span>Edit Data</span>
                    </div>
                    <h1>{{ $dosen->nama_lengkap }}</h1>
                    <p>NIDN {{ $dosen->nidn }} &nbsp;·&nbsp; {{ $dosen->user->email }}</p>
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
        <div class="de-card">
            <div class="de-card-header">
                <div class="de-card-icon gold">✏️</div>
                <div>
                    <p class="de-card-title">Formulir Edit Data Dosen</p>
                    <p class="de-card-subtitle">Kolom bertanda <span style="color:var(--red);font-weight:700;">*</span> wajib diisi</p>
                </div>
            </div>

            <form action="{{ route('dosen.update', $dosen) }}" method="POST" novalidate>
                @csrf
                @method('PATCH')

                <div class="de-card-body">

                    {{-- ── Section 1: Identitas Akademik ── --}}
                    <div class="de-section">
                        <p class="de-section-title">🪪 Identitas Akademik</p>
                        <div class="de-grid-2">
                            <div class="de-field">
                                <label class="de-label" for="nidn">NIDN <span class="req">*</span></label>
                                <input class="de-input {{ $errors->has('nidn') ? 'has-error' : '' }}"
                                    id="nidn" name="nidn" type="text"
                                    value="{{ old('nidn', $dosen->nidn) }}"
                                    placeholder="Nomor Induk Dosen Nasional"
                                    maxlength="12"
                                    required autofocus>
                                <span class="de-info-badge">📌 ID Akademik Unik</span>
                                @error('nidn')
                                    <p class="de-error">⚠ {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="de-field">
                                <label class="de-label" for="nama_lengkap">Nama Lengkap <span class="req">*</span></label>
                                <input class="de-input {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}"
                                    id="nama_lengkap" name="nama_lengkap" type="text"
                                    value="{{ old('nama_lengkap', $dosen->nama_lengkap) }}"
                                    placeholder="Sesuai dokumen resmi"
                                    oninput="updateAvatar(this.value)"
                                    required>
                                @error('nama_lengkap')
                                    <p class="de-error">⚠ {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- ── Section 2: Kontak ── --}}
                    <div class="de-section">
                        <p class="de-section-title">📞 Informasi Kontak</p>

                        <div class="de-field">
                            <label class="de-label" for="email">Alamat Email <span class="req">*</span></label>
                            <input class="de-input {{ $errors->has('email') ? 'has-error' : '' }}"
                                id="email" name="email" type="email"
                                value="{{ old('email', $dosen->user->email) }}"
                                placeholder="email@telkomuniversity.ac.id"
                                required>
                            <p class="de-hint">💡 Email ini digunakan sebagai akun login dosen.</p>
                            @error('email')
                                <p class="de-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="de-field">
                            <label class="de-label" for="no_hp">Nomor HP <span class="req">*</span></label>
                            <div class="de-phone-wrap">
                                <span class="de-phone-prefix">+62</span>
                                <input class="de-input {{ $errors->has('no_hp') ? 'has-error' : '' }}"
                                    id="no_hp" name="no_hp" type="text"
                                    value="{{ old('no_hp', $dosen->no_hp) }}"
                                    placeholder="81234567890"
                                    maxlength="13"
                                    oninput="this.value=this.value.replace(/\D/g,'')"
                                    required>
                            </div>
                            @error('no_hp')
                                <p class="de-error">⚠ {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- ── Section 3: Info Akun (readonly) ── --}}
                    <div class="de-section" style="margin-bottom:0;">
                        <p class="de-section-title">🔒 Informasi Akun</p>
                        <div class="de-grid-2">
                            <div class="de-field">
                                <label class="de-label">Role</label>
                                <input class="de-input readonly" type="text" value="Dosen" readonly>
                            </div>
                            <div class="de-field">
                                <label class="de-label">Dibuat Pada</label>
                                <input class="de-input readonly" type="text"
                                    value="{{ $dosen->created_at->format('d M Y, H:i') }}" readonly>
                            </div>
                        </div>
                        <p class="de-hint">
                            🔐 Untuk mengubah password, gunakan halaman <strong>Reset Password</strong> melalui menu manajemen akun.
                        </p>
                    </div>

                </div>{{-- /de-card-body --}}

                {{-- ── Footer ── --}}
                <div class="de-footer">
                    <p class="de-footer-left">Kolom dengan tanda <strong>*</strong> wajib diisi sebelum menyimpan.</p>
                    <div class="de-btn-row">
                        <a href="{{ route('dosen.index') }}" class="de-btn de-btn-ghost">
                            ✕ Batal
                        </a>
                        <button type="submit" class="de-btn de-btn-primary">
                            💾 Simpan Perubahan
                        </button>
                    </div>
                </div>

            </form>
        </div>{{-- /de-card --}}

    </div>{{-- /de-wrapper --}}

    <script>
        function updateAvatar(name) {
            const parts    = name.trim().split(' ').filter(Boolean);
            const initials = ((parts[0]?.[0] ?? '') + (parts[1]?.[0] ?? '')).toUpperCase();
            document.getElementById('bannerAvatar').textContent = initials || '??';
        }
    </script>

</x-app-layout>