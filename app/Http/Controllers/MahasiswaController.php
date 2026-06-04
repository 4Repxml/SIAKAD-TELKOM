<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Mahasiswa::class);
        $mahasiswas = Mahasiswa::with('user')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $this->authorize('create', Mahasiswa::class);
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Mahasiswa::class);
        $validated = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'tahun_angkatan' => 'required|integer',
            'prodi' => 'required|in:S1 Teknik Industri,S1 Sistem Informasi,S1 Manajemen Rekayasa Industri,S1 Teknik Logistik',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $validated['nim'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'tahun_angkatan' => $validated['tahun_angkatan'],
            'prodi' => $validated['prodi'],
            'status' => 'Aktif',
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil didaftarkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $this->authorize('view', $mahasiswa);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $this->authorize('update', $mahasiswa);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->authorize('update', $mahasiswa);
        $validated = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user_id,
            'tahun_angkatan' => 'required|integer',
            'prodi' => 'required|in:S1 Teknik Industri,S1 Sistem Informasi,S1 Manajemen Rekayasa Industri,S1 Teknik Logistik',
            'status' => 'required|in:Aktif,Cuti,Lulus,DO',
        ]);

        $mahasiswa->user->update([
            'name' => $validated['nama_lengkap'],
            'email' => $validated['email'],
        ]);

        $mahasiswa->update([
            'nim' => $validated['nim'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'tahun_angkatan' => $validated['tahun_angkatan'],
            'prodi' => $validated['prodi'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->authorize('delete', $mahasiswa);
        $mahasiswa->user->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
