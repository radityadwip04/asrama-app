<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Asrama;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $kamars = Kamar::with('asrama')->get();

        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        $asramas = Asrama::all();

        return view('kamar.create', compact('asramas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'asrama_id' => 'required|exists:asramas,id',
            'nomor_kamar' => 'required|max:20',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|max:20',
        ]);

        Kamar::create($data);

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function edit(Kamar $kamar)
    {
        $asramas = Asrama::all();

        return view('kamar.edit', compact('kamar', 'asramas'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $data = $request->validate([
            'asrama_id' => 'required|exists:asramas,id',
            'nomor_kamar' => 'required|max:20',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|max:20',
        ]);

        $kamar->update($data);

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }
}