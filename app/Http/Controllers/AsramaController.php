<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use Illuminate\Http\Request;

class AsramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $asramas = Asrama::with('kamars')->get();

        return view('asrama.index', compact('asramas'));
    }

    public function create()
    {
        return view('asrama.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_asrama' => 'required|max:100',
            'gedung' => 'required|max:50',
            'alamat' => 'required',
        ]);

        Asrama::create($data);

        return redirect()->route('asramas.index')
            ->with('success', 'Data asrama berhasil ditambahkan.');
    }

    public function edit(Asrama $asrama)
    {
        return view('asrama.edit', compact('asrama'));
    }

    public function update(Request $request, Asrama $asrama)
    {
        $data = $request->validate([
            'nama_asrama' => 'required|max:100',
            'gedung' => 'required|max:50',
            'alamat' => 'required',
        ]);

        $asrama->update($data);

        return redirect()->route('asramas.index')
            ->with('success', 'Data asrama berhasil diperbarui.');
    }

    public function destroy(Asrama $asrama)
    {
        $asrama->delete();

        return redirect()->route('asramas.index')
            ->with('success', 'Data asrama berhasil dihapus.');
    }
}