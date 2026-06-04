<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Jadwal::class);
        $user = auth()->user();
        $query = Jadwal::with(['mataKuliah', 'dosen']);

        if ($user->role === 'dosen') {
            $query->where('dosen_id', $user->dosen->id);
        }

        $jadwals = $query->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $this->authorize('create', Jadwal::class);
        $user = auth()->user();
        
        if ($user->role === 'dosen') {
            $mataKuliahs = MataKuliah::where('dosen_id', $user->dosen->id)->get();
            $dosens = Dosen::where('id', $user->dosen->id)->get();
        } else {
            $mataKuliahs = MataKuliah::all();
            $dosens = Dosen::all();
        }
        
        return view('jadwal.create', compact('mataKuliahs', 'dosens'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Jadwal::class);
        $user = auth()->user();

        $validated = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => $user->role === 'admin' ? 'required|exists:dosens,id' : 'nullable',
            'ruangan' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        if ($user->role === 'dosen') {
            $validated['dosen_id'] = $user->dosen->id;
        }

        Jadwal::create($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    public function edit(Jadwal $jadwal)
    {
        $this->authorize('update', $jadwal);
        $user = auth()->user();

        if ($user->role === 'dosen') {
            $mataKuliahs = MataKuliah::where('dosen_id', $user->dosen->id)->get();
            $dosens = Dosen::where('id', $user->dosen->id)->get();
        } else {
            $mataKuliahs = MataKuliah::all();
            $dosens = Dosen::all();
        }

        return view('jadwal.edit', compact('jadwal', 'mataKuliahs', 'dosens'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $this->authorize('update', $jadwal);
        $user = auth()->user();

        $validated = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => $user->role === 'admin' ? 'required|exists:dosens,id' : 'nullable',
            'ruangan' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        if ($user->role === 'dosen') {
            $validated['dosen_id'] = $user->dosen->id;
        }

        $jadwal->update($validated);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $this->authorize('delete', $jadwal);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
