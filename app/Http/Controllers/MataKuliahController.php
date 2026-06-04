<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', MataKuliah::class);
        $search = $request->input('search');
        $user = auth()->user();

        $query = MataKuliah::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_mk', 'like', "%{$search}%")
                             ->orWhere('kode_mk', 'like', "%{$search}%");
            });

        if ($user->role === 'dosen') {
            $query->where('dosen_id', $user->dosen->id);
        }

        $mataKuliahs = $query->get();

        return view('mata_kuliah.index', compact('mataKuliahs', 'search'));
    }

    public function create()
    {
        $this->authorize('create', MataKuliah::class);
        return view('mata_kuliah.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', MataKuliah::class);
        $validated = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        if (auth()->user()->role === 'dosen') {
            $validated['dosen_id'] = auth()->user()->dosen->id;
        }

        MataKuliah::create($validated);

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $this->authorize('update', $mataKuliah);
        return view('mata_kuliah.edit', compact('mataKuliah'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $this->authorize('update', $mataKuliah);
        $validated = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,' . $mataKuliah->id,
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
        ]);

        $mataKuliah->update($validated);

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $this->authorize('delete', $mataKuliah);
        $mataKuliah->delete();

        return redirect()->route('mata-kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
