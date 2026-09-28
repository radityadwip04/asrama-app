<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Santri;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('santri')->get();

        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $santris = Santri::all();

        return view('absensi.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'tanggal' => 'required|date',
            'status' => 'required|max:20',
            'keterangan' => 'nullable',
        ]);

        Absensi::create($data);

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(Absensi $absensi)
    {
        $santris = Santri::all();

        return view('absensi.edit', compact('absensi', 'santris'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $data = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'tanggal' => 'required|date',
            'status' => 'required|max:20',
            'keterangan' => 'nullable',
        ]);

        $absensi->update($data);

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}