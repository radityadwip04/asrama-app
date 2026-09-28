<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Santri;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('santri')->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $santris = Santri::all();

        return view('pembayaran.create', compact('santris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'tanggal_pembayaran' => 'required|date',
            'jenis_pembayaran' => 'required|max:50',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required|max:20',
            'keterangan' => 'nullable',
        ]);

        Pembayaran::create($data);

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $santris = Santri::all();

        return view('pembayaran.edit', compact('pembayaran', 'santris'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $data = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'tanggal_pembayaran' => 'required|date',
            'jenis_pembayaran' => 'required|max:50',
            'jumlah' => 'required|numeric|min:0',
            'status' => 'required|max:20',
            'keterangan' => 'nullable',
        ]);

        $pembayaran->update($data);

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}