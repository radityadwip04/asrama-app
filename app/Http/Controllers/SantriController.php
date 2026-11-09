<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Kamar;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $santris = Santri::with('kamar')->get();

        return view('santri.index', compact('santris'));
    }

    public function create()
    {
        $kamars = Kamar::all();

        return view('santri.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'nis' => 'required|max:30|unique:santris,nis',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required|max:20',
            'status' => 'required|max:20',
        ]);

        Santri::create($data);

        return redirect()->route('santris.index')
            ->with('success', 'Data santri berhasil ditambahkan.');
    }

    public function edit(Santri $santri)
    {
        $kamars = Kamar::all();

        return view('santri.edit', compact('santri', 'kamars'));
    }

    public function update(Request $request, Santri $santri)
    {
        $data = $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'nis' => 'required|max:30|unique:santris,nis,' . $santri->id,
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required|max:20',
            'status' => 'required|max:20',
        ]);

        $santri->update($data);

        return redirect()->route('santris.index')
            ->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy(Santri $santri)
    {
        $santri->delete();

        return redirect()->route('santris.index')
            ->with('success', 'Data santri berhasil dihapus.');
    }
}