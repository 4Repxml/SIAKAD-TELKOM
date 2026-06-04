<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <style>
        :root {
            --red: #CC0000; --red-deep: #990000; --red-soft: #FFF0F0;
            --navy: #0B1F3A; --navy-mid: #1A3560;
            --gold: #F5A623;
            --green: #16A34A; --green-soft: #F0FDF4;
            --blue: #1D4ED8; --blue-soft: #EFF6FF;
            --amber-soft: #FFFBEB;
            --text: #111827; --muted: #6B7280;
            --border: #E5E7EB; --bg: #F3F4F8;
        }

        .profile-page {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 1.75rem;
            align-items: start;
            animation: fadeUp .45s ease both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Identity Card ── */
        .identity-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            position: sticky;
            top: 1.5rem;
        }
        .id-banner {
            height: 88px;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #0d2b50 100%);
            position: relative; overflow: hidden;
        }
        .id-banner::before {
            content: ''; position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 36px 36px;
        }
        .id-banner::after {
            content: ''; position: absolute; top: -40px; right: -40px;
            width: 160px; height: 160px;
            background: radial-gradient(circle, rgba(204,0,0,.4) 0%, transparent 65%);
            border-radius: 50%;
        }

        .id-body { padding: 0 1.5rem 1.5rem; }

        .avatar-wrap { margin-top: -34px; margin-bottom: .9rem; width: 68px; position: relative; }
        .avatar-circle {
            width: 68px; height: 68px; border-radius: 50%;
            background: linear-gradient(135deg, var(--red), var(--gold));
            border: 4px solid white;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; font-weight: 800; color: white;
            box-shadow: 0 4px 16px rgba(0,0,0,.15);
            letter-spacing: -.5px;
        }
        .avatar-online {
            position: absolute; bottom: 4px; right: 0;
            width: 13px; height: 13px;
            background: #22C55E; border-radius: 50%; border: 2px solid white;
        }

        .id-name  { font-size: 1rem; font-weight: 800; color: var(--navy); margin-bottom: .1rem; }
        .id-email { font-size: .75rem; color: var(--muted); margin-bottom: .85rem; }

        .id-role-badge {
            display: inline-flex; align-items: center; gap: 4px;
            background: var(--red-soft); border: 1px solid rgba(204,0,0,.15);
            color: var(--red); font-size: .7rem; font-weight: 700;
            padding: .25rem .7rem; border-radius: 100px;
        }
        .id-role-badge::before { content: '●'; font-size: .45rem; }

        .id-meta {
            margin: 1rem 0; padding: 1rem 0;
            border-top: 1px solid var(--border);
            display: flex; flex-direction: column; gap: .55rem;
        }
        .id-meta-row { display: flex; align-items: center; gap: 8px; font-size: .78rem; color: var(--muted); }
        .id-meta-row svg { width: 13px; height: 13px; flex-shrink: 0; }
        .id-meta-row strong { color: var(--navy); font-weight: 600; }

        .id-nav { border-top: 1px solid var(--border); padding-top: 1rem; display: flex; flex-direction: column; gap: .2rem; }
        .id-nav-btn {
            display: flex; align-items: center; gap: 9px;
            padding: .6rem .75rem; border-radius: 10px;
            font-size: .83rem; font-weight: 500;
            color: var(--muted); background: none; border: none;
            cursor: pointer; width: 100%; text-align: left;
            transition: background .2s, color .2s;
        }
        .id-nav-btn svg { width: 15px; height: 15px; }
        .id-nav-btn:hover { background: var(--bg); color: var(--navy); }
        .id-nav-btn.active { background: var(--red-soft); color: var(--red); font-weight: 700; }
        .id-nav-btn.danger:hover { background: #FEF2F2; color: #DC2626; }

        /* ── Forms ── */
        .forms-stack { display: flex; flex-direction: column; gap: 1.5rem; }

        .form-card {
            background: white; border: 1px solid var(--border);
            border-radius: 20px; overflow: hidden;
            transition: box-shadow .2s;
        }
        .form-card:hover { box-shadow: 0 4px 24px rgba(0,0,0,.07); }

        .fc-head {
            padding: 1.4rem 1.6rem; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 12px;
        }
        .fc-icon {
            width: 42px; height: 42px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .fc-icon.blue  { background: var(--blue-soft); }
        .fc-icon.amber { background: var(--amber-soft); }
        .fc-icon.red   { background: #FEF2F2; }
        .fc-title { font-size: .95rem; font-weight: 700; color: var(--navy); }
        .fc-desc  { font-size: .77rem; color: var(--muted); margin-top: .1rem; }
        .fc-body  { padding: 1.6rem; }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }

        .fg { margin-bottom: 1.2rem; }
        .fg:last-child { margin-bottom: 0; }
        .fg label { display: block; font-size: .81rem; font-weight: 600; color: var(--navy); margin-bottom: .42rem; }
        .fg label .req { color: var(--red); }

        .input-wrap { position: relative; }
        .i-icon {
            position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
            color: #9CA3AF; width: 16px; height: 16px; pointer-events: none;
        }
        .fi {
            width: 100%; padding: .72rem 1rem .72rem 2.55rem;
            font-family: inherit; font-size: .875rem;
            border: 1.5px solid var(--border); border-radius: 10px;
            background: #FAFAFA; color: var(--text); outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .fi:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(204,0,0,.1); background: white; }
        .fi.err   { border-color: #F87171; }
        .fi.has-eye { padding-right: 2.5rem; }

        .pw-eye {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: #9CA3AF; padding: 0; line-height: 1; transition: color .2s;
        }
        .pw-eye:hover { color: var(--navy); }
        .pw-eye svg   { width: 16px; height: 16px; }

        .fe { font-size: .74rem; color: #DC2626; margin-top: .32rem; display: flex; align-items: center; gap: 3px; }
        .fe::before { content: '⚠'; font-size: .66rem; }

        .strength-wrap { margin-top: .5rem; display: none; }
        .strength-wrap.visible { display: block; }
        .s-bar { height: 4px; border-radius: 4px; background: var(--border); overflow: hidden; margin-bottom: .3rem; }
        .s-fill { height: 100%; border-radius: 4px; width: 0; transition: width .35s, background .35s; }
        .s-label { font-size: .69rem; color: var(--muted); }

        .alert {
            display: flex; align-items: center; gap: 9px;
            padding: .7rem 1rem; border-radius: 10px;
            font-size: .81rem; font-weight: 500; margin-bottom: 1.2rem;
        }
        .alert svg { width: 15px; height: 15px; flex-shrink: 0; }
        .alert-green { background: var(--green-soft); color: var(--green); border: 1px solid #BBF7D0; }
        .alert-amber { background: var(--amber-soft); color: #B45309; border: 1px solid #FDE68A; }

        .fc-foot {
            display: flex; align-items: center; gap: 1rem;
            padding-top: 1.25rem; margin-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex; align-items: center; gap: 6px;
            padding: .62rem 1.4rem; font-family: inherit;
            font-size: .875rem; font-weight: 700;
            border-radius: 10px; border: none; cursor: pointer;
            transition: transform .2s, box-shadow .2s, background .2s;
        }
        .btn svg { width: 15px; height: 15px; }
        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: linear-gradient(135deg, var(--red), var(--red-deep)); color: white; box-shadow: 0 3px 12px rgba(204,0,0,.28); }
        .btn-primary:hover { box-shadow: 0 6px 20px rgba(204,0,0,.38); }
        .btn-ghost { background: white; color: var(--navy); border: 1.5px solid var(--border); }
        .btn-ghost:hover { border-color: var(--navy); background: var(--bg); }
        .btn-red-ghost { background: #FEF2F2; color: #DC2626; border: 1.5px solid #FECACA; }
        .btn-red-ghost:hover { background: #FEE2E2; box-shadow: none; }

        .danger-zone { border-color: #FECACA; }
        .danger-zone .fc-head { background: #FEF2F2; border-color: #FECACA; }

        .dz-content { display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap; padding: 1.5rem 1.6rem; }
        .dz-text h3 { font-size: .88rem; font-weight: 700; color: #991B1B; margin-bottom: .3rem; }
        .dz-text p  { font-size: .79rem; color: #B91C1C; line-height: 1.55; max-width: 380px; }

        /* Modal */
        .modal-bg {
            display: none; position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,.5); backdrop-filter: blur(4px);
            align-items: center; justify-content: center; padding: 1.5rem;
        }
        .modal-bg.open { display: flex; }
        .modal-box {
            background: white; border-radius: 20px; padding: 2rem;
            width: 100%; max-width: 440px;
            box-shadow: 0 24px 60px rgba(0,0,0,.25);
            animation: popIn .25s ease both;
        }
        @keyframes popIn {
            from { opacity: 0; transform: scale(.94); }
            to   { opacity: 1; transform: scale(1); }
        }
        .modal-icon-wrap { width: 50px; height: 50px; border-radius: 14px; background: #FEF2F2; margin-bottom: 1.2rem; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; }
        .modal-title { font-size: 1.05rem; font-weight: 800; color: var(--navy); margin-bottom: .45rem; }
        .modal-desc  { font-size: .83rem; color: var(--muted); line-height: 1.6; margin-bottom: 1.4rem; }
        .modal-foot  { display: flex; gap: .75rem; justify-content: flex-end; margin-top: 1.25rem; }

        @media (max-width: 1024px) {
            .profile-page { grid-template-columns: 1fr; }
            .identity-card { position: static; }
            .id-nav { flex-direction: row; flex-wrap: wrap; }
            .id-nav-btn { flex: 1; min-width: 100px; justify-content: center; }
        }
        @media (max-width: 640px) {
            .grid-2 { grid-template-columns: 1fr; }
            .fc-head, .fc-body { padding: 1.2rem; }
            .dz-content { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="profile-page">

        {{-- LEFT: Identity Card --}}
        <div class="identity-card">
            <div class="id-banner"></div>
            <div class="id-body">
                <div class="avatar-wrap">
                    <div class="avatar-circle">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                    <div class="avatar-online"></div>
                </div>
                <div class="id-name">{{ Auth::user()->name }}</div>
                <div class="id-email">{{ Auth::user()->email }}</div>
                <span class="id-role-badge">{{ ucfirst(Auth::user()->role ?? 'Pengguna') }}</span>

                <div class="id-meta">
                    <div class="id-meta-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                    <div class="id-meta-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <span>Bergabung <strong>{{ Auth::user()->created_at->translatedFormat('M Y') }}</strong></span>
                    </div>
                    <div class="id-meta-row">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <span>Status: <strong style="color:#16A34A">Aktif</strong></span>
                    </div>
                </div>

                <div class="id-nav">
                    <button class="id-nav-btn active" onclick="navTo('section-info', this)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        Informasi Akun
                    </button>
                    <button class="id-nav-btn" onclick="navTo('section-password', this)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        Ubah Password
                    </button>
                    <button class="id-nav-btn danger" style="color:#DC2626;" onclick="navTo('section-danger', this)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14H6L5 6"/>
                            <path d="M10 11v6"/><path d="M14 11v6"/>
                            <path d="M9 6V4h6v2"/>
                        </svg>
                        Hapus Akun
                    </button>
                </div>
            </div>
        </div>

        {{-- RIGHT: Forms --}}
        <div class="forms-stack">

            {{-- Form 1: Info Profil --}}
            <div class="form-card" id="section-info">
                <div class="fc-head">
                    <div class="fc-icon blue">👤</div>
                    <div>
                        <div class="fc-title">Informasi Profil</div>
                        <div class="fc-desc">Perbarui nama dan alamat email akun Anda.</div>
                    </div>
                </div>
                <div class="fc-body">

                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Profil berhasil diperbarui.
                        </div>
                    @endif

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="grid-2">
                            <div class="fg">
                                <label for="name">Nama Lengkap <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    <input id="name" name="name" type="text"
                                        class="fi {{ $errors->has('name') ? 'err' : '' }}"
                                        value="{{ old('name', $user->name) }}"
                                        required autofocus autocomplete="name"
                                        placeholder="Nama lengkap Anda" />
                                </div>
                                @error('name') <div class="fe">{{ $message }}</div> @enderror
                            </div>

                            <div class="fg">
                                <label for="email">Alamat Email <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                    <input id="email" name="email" type="email"
                                        class="fi {{ $errors->has('email') ? 'err' : '' }}"
                                        value="{{ old('email', $user->email) }}"
                                        required autocomplete="username"
                                        placeholder="email@telkom.ac.id" />
                                </div>
                                @error('email') <div class="fe">{{ $message }}</div> @enderror

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="alert alert-amber" style="margin-top:.6rem;margin-bottom:0;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                                            <line x1="12" y1="9" x2="12" y2="13"/>
                                            <line x1="12" y1="17" x2="12.01" y2="17"/>
                                        </svg>
                                        Email belum terverifikasi.
                                        <button form="send-verification" style="margin-left:.4rem;font-weight:700;color:#B45309;background:none;border:none;cursor:pointer;font-size:.8rem;">Kirim ulang →</button>
                                    </div>
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="alert alert-green" style="margin-top:.5rem;margin-bottom:0;">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                            Link verifikasi telah dikirim.
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="fc-foot">
                            <button type="submit" class="btn btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                    <polyline points="17 21 17 13 7 13 7 21"/>
                                    <polyline points="7 3 7 8 15 8"/>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Form 2: Ubah Password --}}
            <div class="form-card" id="section-password">
                <div class="fc-head">
                    <div class="fc-icon amber">🔐</div>
                    <div>
                        <div class="fc-title">Ubah Password</div>
                        <div class="fc-desc">Gunakan password yang kuat dan unik untuk keamanan akun.</div>
                    </div>
                </div>
                <div class="fc-body">

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Password berhasil diperbarui.
                        </div>
                    @endif

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="fg">
                            <label for="current_password">Password Saat Ini <span class="req">*</span></label>
                            <div class="input-wrap">
                                <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                <input id="current_password" name="current_password" type="password"
                                    class="fi has-eye {{ $errors->updatePassword->has('current_password') ? 'err' : '' }}"
                                    autocomplete="current-password" placeholder="Password saat ini" />
                                <button type="button" class="pw-eye" onclick="toggleEye('current_password', this)">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            @error('current_password', 'updatePassword') <div class="fe">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid-2">
                            <div class="fg">
                                <label for="password">Password Baru <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    </svg>
                                    <input id="password" name="password" type="password"
                                        class="fi has-eye {{ $errors->updatePassword->has('password') ? 'err' : '' }}"
                                        autocomplete="new-password" placeholder="Min. 8 karakter"
                                        oninput="checkStrength(this.value)" />
                                    <button type="button" class="pw-eye" onclick="toggleEye('password', this)">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="strength-wrap" id="strength-wrap">
                                    <div class="s-bar"><div class="s-fill" id="s-fill"></div></div>
                                    <div class="s-label" id="s-label"></div>
                                </div>
                                @error('password', 'updatePassword') <div class="fe">{{ $message }}</div> @enderror
                            </div>

                            <div class="fg">
                                <label for="password_confirmation">Konfirmasi Password <span class="req">*</span></label>
                                <div class="input-wrap">
                                    <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    </svg>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="fi has-eye" autocomplete="new-password"
                                        placeholder="Ulangi password baru" />
                                    <button type="button" class="pw-eye" onclick="toggleEye('password_confirmation', this)">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('password_confirmation', 'updatePassword') <div class="fe">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="fc-foot">
                            <button type="submit" class="btn btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Form 3: Hapus Akun --}}
            <div class="form-card danger-zone" id="section-danger">
                <div class="fc-head">
                    <div class="fc-icon red">🗑️</div>
                    <div>
                        <div class="fc-title" style="color:#991B1B;">Hapus Akun</div>
                        <div class="fc-desc" style="color:#B91C1C;">Tindakan ini tidak dapat dibatalkan.</div>
                    </div>
                </div>
                <div class="dz-content">
                    <div class="dz-text">
                        <h3>Zona Bahaya</h3>
                        <p>Setelah akun dihapus, semua data termasuk profil, jadwal, dan riwayat bimbingan akan hilang selamanya. Pastikan Anda sudah mengunduh data yang diperlukan sebelum melanjutkan.</p>
                    </div>
                    <button type="button" class="btn btn-red-ghost" id="btn-open-modal">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:15px;height:15px;">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14H6L5 6"/>
                            <path d="M10 11v6"/><path d="M14 11v6"/>
                            <path d="M9 6V4h6v2"/>
                        </svg>
                        Hapus Akun Saya
                    </button>
                </div>
            </div>

        </div>{{-- end forms-stack --}}
    </div>{{-- end profile-page --}}

    {{-- Delete Modal --}}
    <div class="modal-bg" id="delete-modal">
        <div class="modal-box">
            <div class="modal-icon-wrap">🗑️</div>
            <div class="modal-title">Hapus Akun Secara Permanen?</div>
            <div class="modal-desc">
                Semua data Anda — profil, jadwal, dan riwayat bimbingan — akan dihapus secara permanen dan tidak dapat dipulihkan. Masukkan password untuk mengonfirmasi tindakan ini.
            </div>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="fg">
                    <label for="del_password">Password <span class="req">*</span></label>
                    <div class="input-wrap">
                        <svg class="i-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        <input id="del_password" name="password" type="password"
                            class="fi" placeholder="Masukkan password Anda" autofocus />
                    </div>
                    @error('password', 'userDeletion') <div class="fe">{{ $message }}</div> @enderror
                </div>
                <div class="modal-foot">
                    <button type="button" class="btn btn-ghost" id="btn-close-modal">Batal</button>
                    <button type="submit" class="btn btn-red-ghost">Ya, Hapus Akun</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const eyeOpen = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
        const eyeOff  = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;

        function toggleEye(id, btn) {
            const input = document.getElementById(id);
            const show  = input.type === 'text';
            input.type  = show ? 'password' : 'text';
            btn.querySelector('svg').innerHTML = show ? eyeOpen : eyeOff;
        }

        function checkStrength(val) {
            const wrap  = document.getElementById('strength-wrap');
            const fill  = document.getElementById('s-fill');
            const label = document.getElementById('s-label');
            if (!val) { wrap.classList.remove('visible'); return; }
            wrap.classList.add('visible');
            let s = 0;
            if (val.length >= 8)  s++;
            if (val.length >= 12) s++;
            if (/[A-Z]/.test(val)) s++;
            if (/[0-9]/.test(val)) s++;
            if (/[^A-Za-z0-9]/.test(val)) s++;
            const lvls = [
                {w:'20%',c:'#EF4444',t:'Sangat Lemah'},
                {w:'40%',c:'#F97316',t:'Lemah'},
                {w:'60%',c:'#EAB308',t:'Cukup'},
                {w:'80%',c:'#3B82F6',t:'Kuat'},
                {w:'100%',c:'#16A34A',t:'Sangat Kuat'},
            ];
            const l = lvls[Math.max(0, s - 1)];
            fill.style.width      = l.w;
            fill.style.background = l.c;
            label.textContent     = l.t;
            label.style.color     = l.c;
        }

        function navTo(id, btn) {
            document.querySelectorAll('.id-nav-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const el = document.getElementById(id);
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        const modal    = document.getElementById('delete-modal');
        const openBtn  = document.getElementById('btn-open-modal');
        const closeBtn = document.getElementById('btn-close-modal');
        openBtn.addEventListener('click',  () => modal.classList.add('open'));
        closeBtn.addEventListener('click', () => modal.classList.remove('open'));
        modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('open'); });

        @if ($errors->userDeletion->isNotEmpty())
            modal.classList.add('open');
        @endif
    </script>
    @endpush
</x-app-layout>