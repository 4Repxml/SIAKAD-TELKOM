<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Dosen::class);
        $dosens = Dosen::with('user')->get();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $this->authorize('create', Dosen::class);
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Dosen::class);
        $validated = $request->validate([
            'nidn' => 'required|numeric|unique:dosens',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|numeric',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'dosen',
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nidn' => $validated['nidn'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'no_hp' => $validated['no_hp'],
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        $this->authorize('view', $dosen);
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        $this->authorize('update', $dosen);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $this->authorize('update', $dosen);
        $validated = $request->validate([
            'nidn' => 'required|numeric|unique:dosens,nidn,' . $dosen->id,
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email,' . $dosen->user_id,
            'no_hp' => 'required|numeric',
        ]);

        $dosen->user->update([
            'name' => $validated['nama_lengkap'],
            'email' => $validated['email'],
        ]);

        $dosen->update([
            'nidn' => $validated['nidn'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'no_hp' => $validated['no_hp'],
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $this->authorize('delete', $dosen);
        $dosen->user->delete(); // This will also delete dosen due to cascade
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
