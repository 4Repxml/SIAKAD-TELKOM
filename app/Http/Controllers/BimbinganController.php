<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Bimbingan::class);
        $user = Auth::user();
        $query = Bimbingan::with(['mahasiswa', 'dosen']);

        if ($user->role == 'mahasiswa') {
            $query->where('mahasiswa_id', $user->mahasiswa->id);
        } elseif ($user->role == 'dosen') {
            $query->where('dosen_id', $user->dosen->id);
        }

        $bimbingans = $query->get();
        return view('bimbingan.index', compact('bimbingans'));
    }

    public function create()
    {
        $this->authorize('create', Bimbingan::class);

        $dosens = Dosen::all();
        return view('bimbingan.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Bimbingan::class);
        $validated = $request->validate([
            'dosen_id' => 'required|exists:dosens,id',
            'topik' => 'required',
        ]);

        Bimbingan::create([
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
            'dosen_id' => $validated['dosen_id'],
            'topik' => $validated['topik'],
            'status' => 'Pending',
        ]);

        return redirect()->route('bimbingan.index')->with('success', 'Request bimbingan berhasil diajukan.');
    }

    public function edit(Bimbingan $bimbingan)
    {
        $this->authorize('update', $bimbingan);

        return view('bimbingan.edit', compact('bimbingan'));
    }

    public function update(Request $request, Bimbingan $bimbingan)
    {
        $this->authorize('update', $bimbingan);
        $user = Auth::user();

        if ($user->role == 'mahasiswa') {
            $validated = $request->validate([
                'topik' => 'required',
            ]);
            $bimbingan->update($validated);
        } elseif ($user->role == 'dosen') {
            $validated = $request->validate([
                'status' => 'required|in:Pending,Disetujui,Ditolak',
                'catatan' => 'nullable',
            ]);
            $bimbingan->update($validated);
        }

        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil diperbarui.');
    }

    public function destroy(Bimbingan $bimbingan)
    {
        $this->authorize('delete', $bimbingan);

        $bimbingan->delete();
        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil dihapus/dibatalkan.');
    }
}
