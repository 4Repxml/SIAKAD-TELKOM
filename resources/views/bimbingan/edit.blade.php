<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Respon/Ubah Bimbingan') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap');

        * { box-sizing: border-box; }

        .be-wrapper {
            font-family: 'Sora', sans-serif;
            max-width: 760px;
            margin: 0 auto;
        }

        /* ── BREADCRUMB ── */
        .be-breadcrumb {
            display: flex; align-items: center; gap: .4rem;
            font-size: .8rem; color: #94a3b8; margin-bottom: 1.5rem;
        }
        .be-breadcrumb a { color: #6366f1; text-decoration: none; font-weight: 600; transition: color .15s; }
        .be-breadcrumb a:hover { color: #4f46e5; }
        .be-sep { color: #cbd5e1; }

        /* ── MAIN CARD ── */
        .be-card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 22px; overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,.05);
        }

        /* ── HEADER (role-based) ── */
        .be-header {
            padding: 2rem 2.25rem; position: relative; overflow: hidden;
            display: flex; align-items: center; gap: 1.1rem;
        }
        .be-header.mhs-header {
            background: linear-gradient(130deg, #0c1445 0%, #1a237e 45%, #0d1b5e 100%);
        }
        .be-header.dsn-header {
            background: linear-gradient(130deg, #1a0533 0%, #3b1278 45%, #1a0a3d 100%);
        }
        .be-header.adm-header {
            background: linear-gradient(130deg, #0a1628 0%, #0f3460 45%, #091225 100%);
        }
        .be-header::before {
            content: ''; position: absolute; top: -55px; right: -55px;
            width: 220px; height: 220px; border-radius: 50%;
            pointer-events: none;
        }
        .mhs-header::before { background: radial-gradient(circle, rgba(99,102,241,.38) 0%, transparent 65%); }
        .dsn-header::before { background: radial-gradient(circle, rgba(167,139,250,.38) 0%, transparent 65%); }
        .adm-header::before { background: radial-gradient(circle, rgba(56,189,248,.35) 0%, transparent 65%); }
        .be-header::after {
            content: ''; position: absolute; bottom: -65px; left: 28%;
            width: 280px; height: 175px; border-radius: 50%;
            pointer-events: none; opacity: .5;
        }
        .mhs-header::after { background: radial-gradient(circle, rgba(129,140,248,.25) 0%, transparent 65%); }
        .dsn-header::after { background: radial-gradient(circle, rgba(196,181,253,.22) 0%, transparent 65%); }
        .adm-header::after { background: radial-gradient(circle, rgba(14,165,233,.22) 0%, transparent 65%); }

        .be-header-icon {
            width: 52px; height: 52px; border-radius: 15px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; flex-shrink: 0; position: relative; z-index: 1;
        }
        .mhs-header .be-header-icon { background: rgba(99,102,241,.2); border: 1px solid rgba(99,102,241,.4); }
        .dsn-header .be-header-icon { background: rgba(167,139,250,.2); border: 1px solid rgba(167,139,250,.4); }
        .adm-header .be-header-icon { background: rgba(56,189,248,.2);  border: 1px solid rgba(56,189,248,.4); }

        .be-header-text { position: relative; z-index: 1; }
        .be-header-tag {
            display: inline-flex; align-items: center; gap: .3rem;
            font-size: .68rem; font-weight: 600; letter-spacing: .05em;
            padding: .2rem .65rem; border-radius: 999px; margin-bottom: .45rem;
        }
        .mhs-header .be-header-tag { background: rgba(99,102,241,.18); border: 1px solid rgba(99,102,241,.35); color: #a5b4fc; }
        .dsn-header .be-header-tag { background: rgba(167,139,250,.18); border: 1px solid rgba(167,139,250,.35); color: #c4b5fd; }
        .adm-header .be-header-tag { background: rgba(56,189,248,.18);  border: 1px solid rgba(56,189,248,.35);  color: #7dd3fc; }

        .be-header-title { font-size: 1.2rem; font-weight: 800; color: #f8fafc; }
        .be-header-sub   { font-size: .8rem; color: #94a3b8; margin-top: 2px; }

        /* ── INFO STRIP (detail bimbingan) ── */
        .be-info-strip {
            display: grid; grid-template-columns: repeat(2, 1fr);
            gap: 0; border-bottom: 1px solid #f1f5f9;
        }
        .be-info-cell {
            padding: 1.1rem 1.75rem;
            border-right: 1px solid #f1f5f9;
            display: flex; flex-direction: column; gap: .25rem;
        }
        .be-info-cell:last-child { border-right: none; }
        .be-info-cell:nth-child(3),
        .be-info-cell:nth-child(4) { border-top: 1px solid #f1f5f9; }
        .be-info-key {
            font-size: .67rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .07em; color: #94a3b8;
        }
        .be-info-val {
            font-size: .875rem; font-weight: 600; color: #0f172a;
            display: flex; align-items: center; gap: .5rem;
        }
        .be-info-nim {
            font-family: 'JetBrains Mono', monospace;
            font-size: .72rem; color: #6366f1;
            background: #f5f3ff; border: 1px solid #ddd6fe;
            padding: .1rem .45rem; border-radius: 5px;
        }

        /* Status badge */
        .be-status-badge {
            display: inline-flex; align-items: center; gap: .3rem;
            padding: .22rem .65rem; border-radius: 999px;
            font-size: .72rem; font-weight: 700;
        }
        .be-status-dot { width: 6px; height: 6px; border-radius: 50%; }
        .st-pending  { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .st-pending  .be-status-dot { background: #f59e0b; }
        .st-approve  { background: #f0fdf4; color: #14532d; border: 1px solid #bbf7d0; }
        .st-approve  .be-status-dot { background: #22c55e; }
        .st-reject   { background: #fff1f2; color: #881337; border: 1px solid #fecdd3; }
        .st-reject   .be-status-dot { background: #f43f5e; }

        /* ── FORM BODY ── */
        .be-body { padding: 1.75rem 2.25rem; }

        /* Section label */
        .be-section-lbl {
            display: flex; align-items: center; gap: .5rem;
            font-size: .68rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .08em; color: #94a3b8; margin-bottom: 1rem;
        }
        .be-section-lbl::after { content: ''; flex: 1; height: 1px; background: #f1f5f9; }

        /* Label */
        .be-label {
            display: block; font-size: .78rem; font-weight: 700; color: #374151;
            text-transform: uppercase; letter-spacing: .05em; margin-bottom: .5rem;
        }
        .be-label-hint { font-size: .71rem; color: #94a3b8; font-weight: 500; text-transform: none; letter-spacing: 0; margin-left: .3rem; }

        /* Input */
        .be-input-wrap { position: relative; }
        .be-input-icon {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%); color: #94a3b8; pointer-events: none; transition: color .2s;
        }
        .be-input-wrap.ta .be-input-icon { top: 14px; transform: none; }
        .be-input-wrap:focus-within .be-input-icon { color: #6366f1; }

        .be-input {
            width: 100%; padding: .72rem 1rem .72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: .9rem; font-family: 'Sora', sans-serif;
            color: #0f172a; background: #fafafa; outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .be-input:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .be-input.changed { border-color: #f59e0b; background: #fffbeb; }
        .be-input.has-error { border-color: #ef4444; background: #fff5f5; }

        .be-textarea {
            width: 100%; padding: .72rem 1rem .72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: .875rem; font-family: 'Sora', sans-serif;
            color: #0f172a; background: #fafafa; outline: none; resize: vertical;
            min-height: 110px; line-height: 1.6;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .be-textarea:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .be-textarea.has-error { border-color: #ef4444; background: #fff5f5; }

        /* Custom select */
        .be-select-wrap { position: relative; }
        .be-select-wrap::after {
            content: ''; position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%); pointer-events: none;
            width: 0; height: 0;
            border-left: 5px solid transparent; border-right: 5px solid transparent;
            border-top: 6px solid #94a3b8;
        }
        .be-select {
            width: 100%; padding: .72rem 2.5rem .72rem 2.6rem;
            border: 1.5px solid #e2e8f0; border-radius: 12px;
            font-size: .9rem; font-family: 'Sora', sans-serif;
            color: #0f172a; background: #fafafa; outline: none; appearance: none; cursor: pointer;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .be-select:focus {
            border-color: #6366f1; background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,.12);
        }
        .be-select.has-error { border-color: #ef4444; }

        /* Original hint */
        .be-orig-hint {
            display: none; align-items: center; gap: .3rem;
            font-size: .72rem; color: #f59e0b; font-weight: 500; margin-top: .35rem;
        }
        .be-orig-hint.visible { display: flex; }

        /* Change banner */
        .be-change-banner {
            display: none; align-items: center; gap: .5rem;
            background: #fffbeb; border-bottom: 1px solid #fde68a;
            padding: .65rem 2.25rem; font-size: .8rem; font-weight: 600; color: #92400e;
        }
        .be-change-banner.visible { display: flex; }

        /* Error */
        .be-error {
            display: flex; align-items: center; gap: .35rem;
            color: #ef4444; font-size: .75rem; font-weight: 500; margin-top: .4rem;
        }

        /* ── STATUS RADIO CARDS (for dosen) ── */
        .be-status-cards {
            display: grid; grid-template-columns: repeat(3, 1fr); gap: .75rem;
            margin-bottom: 1.5rem;
        }
        .be-status-card {
            position: relative; cursor: pointer;
        }
        .be-status-card input[type="radio"] {
            position: absolute; opacity: 0; width: 0; height: 0;
        }
        .be-status-card-inner {
            border: 2px solid #e2e8f0; border-radius: 14px;
            padding: 1rem 1.1rem; transition: all .18s;
            display: flex; flex-direction: column; gap: .4rem;
            background: #fafafa;
        }
        .be-status-card:hover .be-status-card-inner {
            border-color: #94a3b8; background: #fff;
        }
        .be-status-card input:checked + .be-status-card-inner {
            border-width: 2px; background: #fff;
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
        }
        /* individual checked colors */
        .be-status-card.card-pending input:checked + .be-status-card-inner  { border-color: #f59e0b; background: #fffbeb; }
        .be-status-card.card-approve input:checked + .be-status-card-inner  { border-color: #22c55e; background: #f0fdf4; }
        .be-status-card.card-reject  input:checked + .be-status-card-inner  { border-color: #f43f5e; background: #fff1f2; }

        .be-status-card-icon { font-size: 1.5rem; line-height: 1; }
        .be-status-card-title {
            font-size: .85rem; font-weight: 700; color: #0f172a;
        }
        .be-status-card-desc {
            font-size: .72rem; color: #64748b; line-height: 1.4;
        }
        .be-status-card-check {
            position: absolute; top: 10px; right: 10px;
            width: 20px; height: 20px; border-radius: 50%;
            border: 2px solid #e2e8f0; background: #fff;
            display: flex; align-items: center; justify-content: center;
            transition: all .15s;
        }
        .be-status-card input:checked ~ .be-status-card-check {
            border-color: #6366f1; background: #6366f1;
        }
        .be-status-card.card-pending input:checked ~ .be-status-card-check { border-color: #f59e0b; background: #f59e0b; }
        .be-status-card.card-approve input:checked ~ .be-status-card-check { border-color: #22c55e; background: #22c55e; }
        .be-status-card.card-reject  input:checked ~ .be-status-card-check { border-color: #f43f5e; background: #f43f5e; }

        /* Catatan char counter */
        .be-char-row {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: .35rem;
        }
        .be-char-count {
            font-size: .7rem; color: #94a3b8;
            font-family: 'JetBrains Mono', monospace;
        }
        .be-char-count.warn { color: #f59e0b; }

        /* Catatan quick templates */
        .be-tpl-row {
            display: flex; flex-wrap: wrap; gap: .4rem; margin-top: .6rem;
        }
        .be-tpl-chip {
            display: inline-flex; align-items: center; gap: .28rem;
            padding: .25rem .65rem; border-radius: 999px;
            border: 1.5px solid #e2e8f0; background: #fafafa;
            font-size: .72rem; font-weight: 500; color: #64748b;
            cursor: pointer; font-family: 'Sora', sans-serif; transition: all .15s;
        }
        .be-tpl-chip:hover { border-color: #6366f1; color: #6366f1; background: #f5f3ff; }

        /* ── FOOTER ── */
        .be-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.4rem 2.25rem; background: #fafafa; border-top: 1px solid #f1f5f9;
            flex-wrap: wrap; gap: .75rem;
        }
        .be-btn-cancel {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .65rem 1.25rem; border-radius: 12px;
            font-size: .875rem; font-weight: 600; font-family: 'Sora', sans-serif;
            color: #64748b; background: #f1f5f9; border: none;
            text-decoration: none; cursor: pointer; transition: all .15s;
        }
        .be-btn-cancel:hover { background: #e2e8f0; color: #374151; }
        .be-btn-reset {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .65rem 1.1rem; border-radius: 12px;
            font-size: .82rem; font-weight: 600; font-family: 'Sora', sans-serif;
            color: #92400e; background: #fffbeb; border: 1px solid #fde68a;
            cursor: pointer; transition: all .15s; display: none;
        }
        .be-btn-reset:hover { background: #fef3c7; }
        .be-btn-save {
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .7rem 1.75rem; border-radius: 12px;
            font-size: .875rem; font-weight: 700; font-family: 'Sora', sans-serif;
            color: #fff; border: none; cursor: pointer; transition: all .2s;
        }
        .be-btn-save.mhs-save {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            box-shadow: 0 4px 16px rgba(99,102,241,.38);
        }
        .be-btn-save.dsn-save {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            box-shadow: 0 4px 16px rgba(139,92,246,.38);
        }
        .be-btn-save:hover { box-shadow: 0 6px 22px rgba(99,102,241,.5); transform: translateY(-1px); }
        .be-footer-right { display: flex; align-items: center; gap: .65rem; }

        @media (max-width: 600px) {
            .be-info-strip { grid-template-columns: 1fr; }
            .be-info-cell  { border-right: none; border-top: 1px solid #f1f5f9; }
            .be-info-cell:first-child { border-top: none; }
            .be-status-cards { grid-template-columns: 1fr; }
            .be-body   { padding: 1.25rem; }
            .be-footer { padding: 1rem 1.25rem; }
            .be-header { padding: 1.5rem; }
        }
    </style>

    <div class="be-wrapper">

        @php $role = Auth::user()->role; @endphp

        {{-- Breadcrumb --}}
        <div class="be-breadcrumb">
            <a href="{{ route('bimbingan.index') }}">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline;vertical-align:-2px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Bimbingan
            </a>
            <span class="be-sep">›</span>
            <span>{{ $role === 'dosen' ? 'Respons' : 'Ubah' }}</span>
            <span class="be-sep">›</span>
            <span style="color:#0f172a;font-weight:600;">{{ Str::limit($bimbingan->topik, 30) }}</span>
        </div>

        <div class="be-card">

            {{-- Header --}}
            <div class="be-header {{ $role === 'dosen' ? 'dsn-header' : ($role === 'admin' ? 'adm-header' : 'mhs-header') }}">
                <div class="be-header-icon">
                    {{ $role === 'dosen' ? '🎓' : ($role === 'admin' ? '⚙️' : '✏️') }}
                </div>
                <div class="be-header-text">
                    <div class="be-header-tag">
                        @if($role === 'dosen')
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            Dosen Wali
                        @elseif($role === 'admin')
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                            Admin
                        @else
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                            Mahasiswa
                        @endif
                        · SIAKAD
                    </div>
                    <div class="be-header-title">
                        {{ $role === 'dosen' ? 'Respons Pengajuan Bimbingan' : 'Ubah Pengajuan Bimbingan' }}
                    </div>
                    <div class="be-header-sub">
                        {{ $role === 'dosen'
                            ? 'Tentukan status dan tambahkan catatan untuk mahasiswa.'
                            : 'Perbarui topik bimbingan yang sudah diajukan.' }}
                    </div>
                </div>
            </div>

            {{-- Change banner --}}
            <div class="be-change-banner" id="changeBanner">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                Ada perubahan yang belum disimpan
            </div>

            {{-- Info strip --}}
            @php
                $stClass = match($bimbingan->status) {
                    'Disetujui' => 'st-approve',
                    'Ditolak'   => 'st-reject',
                    default     => 'st-pending',
                };
            @endphp
            <div class="be-info-strip">
                <div class="be-info-cell">
                    <span class="be-info-key">Mahasiswa</span>
                    <span class="be-info-val">
                        {{ $bimbingan->mahasiswa->nama_lengkap }}
                        <span class="be-info-nim">{{ $bimbingan->mahasiswa->nim }}</span>
                    </span>
                </div>
                <div class="be-info-cell">
                    <span class="be-info-key">Dosen Wali</span>
                    <span class="be-info-val">{{ $bimbingan->dosen->nama_lengkap }}</span>
                </div>
                <div class="be-info-cell">
                    <span class="be-info-key">Topik</span>
                    <span class="be-info-val" style="font-size:.85rem;">{{ $bimbingan->topik }}</span>
                </div>
                <div class="be-info-cell">
                    <span class="be-info-key">Status Saat Ini</span>
                    <span class="be-info-val">
                        <span class="be-status-badge {{ $stClass }}">
                            <span class="be-status-dot"></span>
                            {{ $bimbingan->status }}
                        </span>
                    </span>
                </div>
            </div>

            {{-- FORM --}}
            <form action="{{ route('bimbingan.update', $bimbingan) }}" method="POST" id="editForm">
                @csrf
                @method('PATCH')

                <div class="be-body">

                    {{-- ══════════════════════════════════════ --}}
                    {{-- MAHASISWA VIEW                         --}}
                    {{-- ══════════════════════════════════════ --}}
                    @if($role === 'mahasiswa')

                        <div class="be-section-lbl">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            Ubah Topik Bimbingan
                        </div>

                        <div style="max-width:520px;">
                            <label class="be-label" for="topik">
                                Topik Bimbingan
                                <span class="be-label-hint">— perbarui jika perlu</span>
                            </label>
                            <div class="be-input-wrap">
                                <svg class="be-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                                <input
                                    id="topik" type="text" name="topik"
                                    value="{{ old('topik', $bimbingan->topik) }}"
                                    data-original="{{ $bimbingan->topik }}"
                                    required maxlength="120" autocomplete="off"
                                    class="be-input {{ $errors->has('topik') ? 'has-error' : '' }}"
                                    oninput="onMhsTopikChange(this)"
                                >
                            </div>
                            <div class="be-orig-hint" id="topikHint">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                                Semula: <strong>{{ $bimbingan->topik }}</strong>
                            </div>
                            @error('topik')
                                <div class="be-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Quick suggestions --}}
                            <div style="margin-top:.7rem;">
                                <div style="font-size:.68rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.4rem;">💡 Topik Cepat</div>
                                <div class="be-tpl-row">
                                    @foreach(['Kesulitan Belajar','Konsultasi KRS','Persiapan Tugas Akhir','Masalah Nilai','Bimbingan Karir','Rencana Studi'] as $s)
                                        <button type="button" class="be-tpl-chip" onclick="applyTopik('{{ $s }}')">{{ $s }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Info note: only pending can be edited meaningfully --}}
                        @if($bimbingan->status !== 'Pending')
                            <div style="display:flex;align-items:flex-start;gap:.5rem;margin-top:1.25rem;background:#fffbeb;border:1px solid #fde68a;border-radius:11px;padding:.75rem 1rem;max-width:520px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5" style="flex-shrink:0;margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                <span style="font-size:.78rem;color:#92400e;line-height:1.5;">
                                    Status bimbingan ini sudah <strong>{{ $bimbingan->status }}</strong>. Anda masih dapat memperbarui topik, namun dosen perlu merespons ulang.
                                </span>
                            </div>
                        @endif

                    {{-- ══════════════════════════════════════ --}}
                    {{-- DOSEN VIEW                             --}}
                    {{-- ══════════════════════════════════════ --}}
                    @elseif($role === 'dosen')

                        {{-- Status radio cards --}}
                        <div style="margin-bottom:1.75rem;">
                            <div class="be-section-lbl">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                Tentukan Status
                            </div>
                            <div class="be-status-cards">
                                {{-- Pending --}}
                                <label class="be-status-card card-pending">
                                    <input type="radio" name="status" value="Pending"
                                        {{ old('status', $bimbingan->status) === 'Pending' ? 'checked' : '' }}
                                        onchange="onStatusChange(this)">
                                    <div class="be-status-card-inner">
                                        <div class="be-status-card-icon">⏳</div>
                                        <div class="be-status-card-title">Pending</div>
                                        <div class="be-status-card-desc">Masih dalam antrian, belum diputuskan.</div>
                                    </div>
                                    <div class="be-status-card-check">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    </div>
                                </label>
                                {{-- Disetujui --}}
                                <label class="be-status-card card-approve">
                                    <input type="radio" name="status" value="Disetujui"
                                        {{ old('status', $bimbingan->status) === 'Disetujui' ? 'checked' : '' }}
                                        onchange="onStatusChange(this)">
                                    <div class="be-status-card-inner">
                                        <div class="be-status-card-icon">✅</div>
                                        <div class="be-status-card-title">Disetujui</div>
                                        <div class="be-status-card-desc">Bimbingan diterima dan dijadwalkan.</div>
                                    </div>
                                    <div class="be-status-card-check">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    </div>
                                </label>
                                {{-- Ditolak --}}
                                <label class="be-status-card card-reject">
                                    <input type="radio" name="status" value="Ditolak"
                                        {{ old('status', $bimbingan->status) === 'Ditolak' ? 'checked' : '' }}
                                        onchange="onStatusChange(this)">
                                    <div class="be-status-card-inner">
                                        <div class="be-status-card-icon">❌</div>
                                        <div class="be-status-card-title">Ditolak</div>
                                        <div class="be-status-card-desc">Pengajuan tidak dapat dipenuhi saat ini.</div>
                                    </div>
                                    <div class="be-status-card-check">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    </div>
                                </label>
                            </div>
                            @error('status')
                                <div class="be-error">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Catatan --}}
                        <div>
                            <div class="be-section-lbl">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                Catatan / Log Pertemuan
                            </div>
                            <label class="be-label" for="catatan">
                                Catatan
                                <span class="be-label-hint">— opsional, max 500 karakter</span>
                            </label>
                            <div class="be-input-wrap ta">
                                <svg class="be-input-icon" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                <textarea
                                    id="catatan" name="catatan"
                                    maxlength="500"
                                    placeholder="Tuliskan catatan, agenda pertemuan, atau alasan penolakan..."
                                    class="be-textarea {{ $errors->has('catatan') ? 'has-error' : '' }}"
                                    oninput="onCatatanInput(this)"
                                >{{ old('catatan', $bimbingan->catatan) }}</textarea>
                            </div>
                            <div class="be-char-row">
                                @error('catatan')
                                    <div class="be-error" style="margin:0;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <span></span>
                                <span class="be-char-count" id="catatanCount">0 / 500</span>
                            </div>

                            {{-- Template catatan --}}
                            <div style="margin-top:.6rem;">
                                <div style="font-size:.68rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.4rem;">✍️ Template Cepat</div>
                                <div class="be-tpl-row">
                                    @foreach([
                                        'Mahasiswa diminta hadir pada jam bimbingan reguler.',
                                        'Silakan hubungi kembali setelah UTS.',
                                        'Bimbingan telah dilaksanakan. Topik selanjutnya ditetapkan.',
                                        'Mohon lengkapi berkas terlebih dahulu.',
                                    ] as $tpl)
                                        <button type="button" class="be-tpl-chip" onclick="applyCatatan('{{ $tpl }}')">
                                            {{ Str::limit($tpl, 35) }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif

                </div>

                {{-- Footer --}}
                <div class="be-footer">
                    <a href="{{ route('bimbingan.index') }}" class="be-btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <div class="be-footer-right">
                        <button type="button" class="be-btn-reset" id="resetBtn" onclick="resetForm()">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.47"/></svg>
                            Reset
                        </button>
                        <button type="submit" class="be-btn-save {{ $role === 'dosen' ? 'dsn-save' : 'mhs-save' }}">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            {{ $role === 'dosen' ? 'Simpan Respons' : 'Simpan Perubahan' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const origTopik   = '{{ addslashes($bimbingan->topik) }}';
        const origStatus  = '{{ $bimbingan->status }}';
        const origCatatan = `{{ addslashes($bimbingan->catatan ?? '') }}`;

        function showBanner(show) {
            document.getElementById('changeBanner').classList.toggle('visible', show);
            const btn = document.getElementById('resetBtn');
            if (btn) btn.style.display = show ? 'inline-flex' : 'none';
        }

        /* ── MAHASISWA: topik change ── */
        function onMhsTopikChange(input) {
            const changed = input.value.trim() !== origTopik;
            input.classList.toggle('changed', changed);
            const hint = document.getElementById('topikHint');
            if (hint) hint.classList.toggle('visible', changed);
            showBanner(changed);
        }

        function applyTopik(text) {
            const input = document.getElementById('topik');
            input.value = text;
            onMhsTopikChange(input);
            input.focus();
        }

        /* ── DOSEN: status change ── */
        function onStatusChange(radio) {
            const statusChanged  = radio.value !== origStatus;
            const catatanEl      = document.getElementById('catatan');
            const catatanChanged = catatanEl ? catatanEl.value.trim() !== origCatatan : false;
            showBanner(statusChanged || catatanChanged);
        }

        /* ── DOSEN: catatan input ── */
        function onCatatanInput(ta) {
            const len     = ta.value.length;
            const counter = document.getElementById('catatanCount');
            if (counter) {
                counter.textContent = `${len} / 500`;
                counter.className   = 'be-char-count' + (len > 400 ? ' warn' : '');
            }
            const statusEl      = document.querySelector('input[name="status"]:checked');
            const statusChanged = statusEl ? statusEl.value !== origStatus : false;
            showBanner(statusChanged || ta.value.trim() !== origCatatan);
        }

        function applyCatatan(text) {
            const ta = document.getElementById('catatan');
            if (!ta) return;
            ta.value = text;
            onCatatanInput(ta);
            ta.focus();
        }

        /* ── RESET ── */
        function resetForm() {
            const topikEl = document.getElementById('topik');
            if (topikEl) {
                topikEl.value = origTopik;
                topikEl.classList.remove('changed');
                const hint = document.getElementById('topikHint');
                if (hint) hint.classList.remove('visible');
            }
            const catatanEl = document.getElementById('catatan');
            if (catatanEl) {
                catatanEl.value = origCatatan;
                onCatatanInput(catatanEl);
            }
            // reset radio
            document.querySelectorAll('input[name="status"]').forEach(r => {
                r.checked = r.value === origStatus;
            });
            showBanner(false);
        }

        /* ── INIT ── */
        document.addEventListener('DOMContentLoaded', () => {
            // char counter init for catatan
            const catatanEl = document.getElementById('catatan');
            if (catatanEl) onCatatanInput(catatanEl);

            // topik hint init for old() after validation error
            const topikEl = document.getElementById('topik');
            if (topikEl && topikEl.value.trim() !== origTopik) {
                onMhsTopikChange(topikEl);
            }
        });
    </script>
</x-app-layout>