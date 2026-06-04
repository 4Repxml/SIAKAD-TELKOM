<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dosen Baru') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap');

        .dc-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif;
            max-width: 780px;
            margin: 0 auto;
        }

        /* ── BREADCRUMB ── */
        .dc-breadcrumb {
            display: flex; align-items: center; gap: 0.4rem;
            font-size: 0.8rem; color: #94a3b8; margin-bottom: 1.5rem;
        }
        .dc-breadcrumb a {
            color: #0d9488; text-decoration: none; font-weight: 500; transition: color 0.15s;
        }
        .dc-breadcrumb a:hover { color: #0f766e; }
        .dc-breadcrumb-sep { color: #cbd5e1; }

        /* ── CARD ── */
        .dc-card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 20px; overflow: hidden;
        }

        /* Header */
        .dc-card-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #0f172a 100%);
            padding: 1.75rem 2rem; position: relative; overflow: hidden;
            display: flex; align-items: center; gap: 1rem;
        }
        .dc-card-header::before {
            content: ''; position: absolute; top: -50px; right: -50px;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(20,184,166,0.28) 0%, transparent 70%);
        }
        .dc-card-header::after {
            content: ''; position: absolute; bottom: -60px; left: 30%;
            width: 260px; height: 160px;
            background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%);
        }
        .dc-header-icon {
            width: 48px; height: 48px;
            background: rgba(20,184,166,0.18); border: 1px solid rgba(20,184,166,0.35);
            border-radius: 14px; display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; flex-shrink: 0; position: relative; z-index: 1;
        }
        .dc-header-text { position: relative; z-index: 1; }
        .dc-header-title { font-size: 1.1rem; font-weight: 700; color: #f8fafc; }
        .dc-header-sub { font-size: 0.8rem; color: #94a3b8; margin-top: 2px; }

        /* Section divider */
        .dc-section {
            padding: 1.5rem 2rem 0;
        }
        .dc-section-label {
            display: flex; align-items: center; gap: 0.5rem;
            font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: #94a3b8; margin-bottom: 1rem;
        }
        .dc-section-label::after {
            content: ''; flex: 1; height: 1px; background: #f1f5f9;
        }

        /* Grid */
        .dc-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }

        /* Label */
        .dc-label {
            display: block; font-size: 0.8rem; font-weight: 700;
            color: #374151; text-transform: uppercase;
            letter-spacing: 0.05em; margin-bottom: 0.5rem;
        }
        .dc-label-hint {
            font-size: 0.72rem; color: #94a3b8; font-weight: 500;
            text-transform: none; letter-spacing: 0; margin-left: 0.35rem;
        }

        /* Input wrap */
        .dc-input-wrap { position: relative; }
        .dc-input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: #94a3b8;
            pointer-events: none; transition: color 0.2s;
        }
        .dc-input-wrap:focus-within .dc-input-icon { color: #0d9488; }

        /* Input */
        .dc-input {
            width: 100%; padding: 0.72rem 1rem 0.72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: 0.9rem; font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            box-sizing: border-box;
        }
        .dc-input:focus {
            border-color: #14b8a6; background: #fff;
            box-shadow: 0 0 0 3px rgba(20,184,166,0.12);
        }
        .dc-input.has-error { border-color: #ef4444; background: #fff5f5; }
        .dc-input.has-error:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.12); }
        .dc-input-mono {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.875rem; letter-spacing: 0.04em;
        }

        /* Password eye toggle */
        .dc-pw-toggle {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            cursor: pointer; color: #94a3b8;
            background: none; border: none; padding: 0;
            transition: color 0.15s; display: flex; align-items: center;
        }
        .dc-pw-toggle:hover { color: #0d9488; }
        .dc-input-pw { padding-right: 2.8rem; }

        /* Password strength */
        .dc-pw-strength { margin-top: 0.5rem; }
        .dc-pw-bars {
            display: flex; gap: 3px; margin-bottom: 0.3rem;
        }
        .dc-pw-bar {
            flex: 1; height: 3px; border-radius: 2px;
            background: #e2e8f0; transition: background 0.3s;
        }
        .dc-pw-bar.active-weak    { background: #ef4444; }
        .dc-pw-bar.active-fair    { background: #f59e0b; }
        .dc-pw-bar.active-good    { background: #10b981; }
        .dc-pw-bar.active-strong  { background: #0d9488; }
        .dc-pw-label {
            font-size: 0.72rem; font-weight: 600; color: #94a3b8; transition: color 0.3s;
        }

        /* Error */
        .dc-error {
            display: flex; align-items: center; gap: 0.35rem;
            color: #ef4444; font-size: 0.75rem; font-weight: 500; margin-top: 0.4rem;
        }

        /* Live avatar preview */
        .dc-avatar-preview {
            background: linear-gradient(135deg, #f0fdfa, #ecfeff);
            border: 1.5px dashed #99f6e4;
            border-radius: 14px; padding: 1.25rem 1.5rem;
            margin: 1.5rem 2rem;
            display: flex; align-items: center; gap: 1.25rem;
        }
        .dc-avatar-circle {
            width: 56px; height: 56px; border-radius: 50%;
            background: linear-gradient(135deg, #14b8a6, #0891b2);
            color: #fff; font-size: 1.2rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; letter-spacing: 0.02em;
            transition: all 0.2s;
        }
        .dc-avatar-info-name {
            font-size: 1rem; font-weight: 700; color: #0f172a;
            transition: all 0.2s;
        }
        .dc-avatar-info-sub {
            font-size: 0.8rem; color: #64748b; margin-top: 2px;
            display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;
        }
        .dc-avatar-placeholder { color: #b2d8d4; font-style: italic; font-size: 0.875rem; }
        .dc-av-badge {
            display: inline-flex; align-items: center; gap: 0.3rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.72rem; font-weight: 500;
            background: #ccfbf1; color: #0d9488;
            border: 1px solid #99f6e4;
            padding: 0.15rem 0.5rem; border-radius: 5px;
        }

        /* Form body bottom padding */
        .dc-card-body { padding: 0 0 1.5rem; }

        /* Footer */
        .dc-actions {
            display: flex; align-items: center; justify-content: flex-end; gap: 0.75rem;
            padding: 1.25rem 2rem;
            background: #fafafa; border-top: 1px solid #f1f5f9;
        }
        .dc-btn-cancel {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.25rem; border-radius: 12px;
            font-size: 0.875rem; font-weight: 600; font-family: inherit;
            color: #64748b; background: #f1f5f9; border: none;
            text-decoration: none; cursor: pointer; transition: all 0.15s;
        }
        .dc-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .dc-btn-submit {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.65rem 1.75rem; border-radius: 12px;
            font-size: 0.875rem; font-weight: 700; font-family: inherit;
            color: #fff; background: linear-gradient(135deg, #14b8a6, #0891b2);
            border: none; cursor: pointer;
            box-shadow: 0 4px 14px rgba(20,184,166,0.38);
            transition: all 0.18s;
        }
        .dc-btn-submit:hover {
            box-shadow: 0 6px 20px rgba(20,184,166,0.48);
            transform: translateY(-1px);
        }

        @media (max-width: 600px) {
            .dc-grid-2 { grid-template-columns: 1fr; }
            .dc-card-header { padding: 1.25rem; }
            .dc-section { padding: 1.25rem 1.25rem 0; }
            .dc-avatar-preview { margin: 1.25rem; }
            .dc-actions { padding: 1rem 1.25rem; }
        }
    </style>

    <div class="dc-wrapper">

        {{-- Breadcrumb --}}
        <div class="dc-breadcrumb">
            <a href="{{ route('dosen.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Dosen
            </a>
            <span class="dc-breadcrumb-sep">›</span>
            <span>Tambah Baru</span>
        </div>

        <div class="dc-card">

            {{-- Header --}}
            <div class="dc-card-header">
                <div class="dc-header-icon">👨‍🏫</div>
                <div class="dc-header-text">
                    <div class="dc-header-title">Tambah Dosen Baru</div>
                    <div class="dc-header-sub">Daftarkan dosen beserta akun login ke dalam sistem akademik.</div>
                </div>
            </div>

            <form action="{{ route('dosen.store') }}" method="POST" id="dosenForm">
                @csrf
                <div class="dc-card-body">

                    {{-- ── SECTION: INFO AKADEMIK ── --}}
                    <div class="dc-section">
                        <div class="dc-section-label">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            Identitas Akademik
                        </div>

                        <div class="dc-grid-2">
                            {{-- NIDN --}}
                            <div>
                                <label class="dc-label" for="nidn">
                                    NIDN
                                    <span class="dc-label-hint">— Nomor Induk Dosen Nasional</span>
                                </label>
                                <div class="dc-input-wrap">
                                    <svg class="dc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                    <input
                                        id="nidn" type="text" name="nidn"
                                        value="{{ old('nidn') }}"
                                        placeholder="mis. 0123456789"
                                        autocomplete="off" required autofocus
                                        class="dc-input dc-input-mono {{ $errors->has('nidn') ? 'has-error' : '' }}"
                                        oninput="updatePreview()"
                                    >
                                </div>
                                @error('nidn')
                                    <div class="dc-error">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Nama Lengkap --}}
                            <div>
                                <label class="dc-label" for="nama_lengkap">
                                    Nama Lengkap
                                    <span class="dc-label-hint">— beserta gelar</span>
                                </label>
                                <div class="dc-input-wrap">
                                    <svg class="dc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    <input
                                        id="nama_lengkap" type="text" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}"
                                        placeholder="mis. Dr. Budi Santoso, M.T."
                                        required
                                        class="dc-input {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}"
                                        oninput="updatePreview()"
                                    >
                                </div>
                                @error('nama_lengkap')
                                    <div class="dc-error">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- ── SECTION: KONTAK ── --}}
                    <div class="dc-section" style="margin-top:1.5rem;">
                        <div class="dc-section-label">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6 6l.91-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
                            Informasi Kontak
                        </div>

                        <div class="dc-grid-2">
                            {{-- Email --}}
                            <div>
                                <label class="dc-label" for="email">Email</label>
                                <div class="dc-input-wrap">
                                    <svg class="dc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    <input
                                        id="email" type="email" name="email"
                                        value="{{ old('email') }}"
                                        placeholder="mis. budi@telkom.ac.id"
                                        required
                                        class="dc-input {{ $errors->has('email') ? 'has-error' : '' }}"
                                        oninput="updatePreview()"
                                    >
                                </div>
                                @error('email')
                                    <div class="dc-error">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- No HP --}}
                            <div>
                                <label class="dc-label" for="no_hp">Nomor HP</label>
                                <div class="dc-input-wrap">
                                    <svg class="dc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                    <input
                                        id="no_hp" type="text" name="no_hp"
                                        value="{{ old('no_hp') }}"
                                        placeholder="mis. 08123456789"
                                        required
                                        class="dc-input dc-input-mono {{ $errors->has('no_hp') ? 'has-error' : '' }}"
                                    >
                                </div>
                                @error('no_hp')
                                    <div class="dc-error">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- ── SECTION: AKUN LOGIN ── --}}
                    <div class="dc-section" style="margin-top:1.5rem;">
                        <div class="dc-section-label">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Akun Login Sistem
                        </div>

                        {{-- Password --}}
                        <div style="max-width:400px;">
                            <label class="dc-label" for="password">
                                Password
                                <span class="dc-label-hint">— min. 8 karakter</span>
                            </label>
                            <div class="dc-input-wrap">
                                <svg class="dc-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                <input
                                    id="password" type="password" name="password"
                                    placeholder="Masukkan password..."
                                    required
                                    class="dc-input dc-input-pw {{ $errors->has('password') ? 'has-error' : '' }}"
                                    oninput="checkStrength(this.value)"
                                >
                                <button type="button" class="dc-pw-toggle" onclick="togglePw()" id="pwToggleBtn">
                                    <svg id="eyeIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                            {{-- Strength meter --}}
                            <div class="dc-pw-strength" id="pwStrength" style="display:none;">
                                <div class="dc-pw-bars">
                                    <div class="dc-pw-bar" id="bar1"></div>
                                    <div class="dc-pw-bar" id="bar2"></div>
                                    <div class="dc-pw-bar" id="bar3"></div>
                                    <div class="dc-pw-bar" id="bar4"></div>
                                </div>
                                <div class="dc-pw-label" id="pwLabel">—</div>
                            </div>
                            @error('password')
                                <div class="dc-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Info note --}}
                        <div style="display:flex;align-items:flex-start;gap:0.5rem;margin-top:1rem;background:#f0fdfa;border:1px solid #99f6e4;border-radius:10px;padding:0.75rem 1rem;max-width:500px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#0d9488" stroke-width="2.5" style="flex-shrink:0;margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            <span style="font-size:0.78rem;color:#115e59;line-height:1.5;">
                                Email dan password di atas akan digunakan dosen untuk login ke sistem. Pastikan email belum terdaftar sebelumnya.
                            </span>
                        </div>
                    </div>

                    {{-- ── LIVE PREVIEW ── --}}
                    <div class="dc-avatar-preview" id="avatarPreview">
                        <div class="dc-avatar-circle" id="avatarCircle">?</div>
                        <div>
                            <div class="dc-avatar-info-name dc-avatar-placeholder" id="previewName">
                                Isi form untuk melihat preview dosen...
                            </div>
                            <div class="dc-avatar-info-sub" id="previewSub" style="display:none;">
                                <span id="previewNidn"></span>
                                <span id="previewEmail" style="color:#94a3b8;"></span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="dc-actions">
                    <a href="{{ route('dosen.index') }}" class="dc-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="dc-btn-submit">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Dosen
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        /* ── LIVE PREVIEW ── */
        function updatePreview() {
            const nama  = document.getElementById('nama_lengkap').value.trim();
            const nidn  = document.getElementById('nidn').value.trim();
            const email = document.getElementById('email').value.trim();

            const circle  = document.getElementById('avatarCircle');
            const nameEl  = document.getElementById('previewName');
            const subEl   = document.getElementById('previewSub');
            const nidnEl  = document.getElementById('previewNidn');
            const emailEl = document.getElementById('previewEmail');

            if (!nama && !nidn && !email) {
                circle.textContent = '?';
                nameEl.textContent = 'Isi form untuk melihat preview dosen...';
                nameEl.classList.add('dc-avatar-placeholder');
                subEl.style.display = 'none';
                return;
            }

            // Initials
            const words = nama.split(' ').filter(Boolean);
            const initials = words.slice(0,2).map(w => w[0].toUpperCase()).join('') || '?';
            circle.textContent = initials;

            // Name
            nameEl.textContent = nama || '—';
            nameEl.classList.remove('dc-avatar-placeholder');

            // Sub info
            subEl.style.display = 'flex';
            nidnEl.innerHTML = nidn
                ? `<span class="dc-av-badge">${nidn}</span>`
                : '';
            emailEl.textContent = email || '';
        }

        /* ── PASSWORD VISIBILITY ── */
        function togglePw() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eyeIcon');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            icon.innerHTML = isHidden
                ? `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`
                : `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
        }

        /* ── PASSWORD STRENGTH ── */
        function checkStrength(val) {
            const wrap  = document.getElementById('pwStrength');
            const label = document.getElementById('pwLabel');
            const bars  = [1,2,3,4].map(i => document.getElementById('bar' + i));

            if (!val) { wrap.style.display = 'none'; return; }
            wrap.style.display = 'block';

            let score = 0;
            if (val.length >= 8)  score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const levels = ['weak','fair','good','strong'];
            const labels = ['Lemah','Cukup','Baik','Kuat'];
            const colors = { weak:'#ef4444', fair:'#f59e0b', good:'#10b981', strong:'#0d9488' };
            const cls    = levels[score - 1] || 'weak';
            const activeClass = 'active-' + cls;

            bars.forEach((b, i) => {
                b.className = 'dc-pw-bar';
                if (i < score) b.classList.add(activeClass);
            });

            label.textContent = labels[score - 1] || 'Terlalu pendek';
            label.style.color = score > 0 ? colors[cls] : '#94a3b8';
        }

        // Init old() values on load
        document.addEventListener('DOMContentLoaded', updatePreview);
    </script>
</x-app-layout>