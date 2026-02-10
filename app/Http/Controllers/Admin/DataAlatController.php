<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DataAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alat = Alat::with('kategori')->orderBy('nama_alat')->get();

        return view('admin.alat.index', compact('alat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('admin.alat.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'      => 'required|exists:kategoris,id',
            'nama_alat'        => 'required|string|max:255',
            'jumlah_total'     => 'required|integer|min:1',
            'kondisi'          => 'required|string',
        ]);

        Alat::create([
            'kategori_id'      => $request->kategori_id,
            'nama_alat'        => $request->nama_alat,
            'jumlah_total'     => $request->jumlah_total,
            'jumlah_tersedia'  => $request->jumlah_total, // awal = total
            'kondisi'          => $request->kondisi,
        ]);

        return redirect()
            ->route('admin.alat.index')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alat = Alat::with('kategori')->findOrFail($id);

        return view('admin.alat.show', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alat = Alat::findOrFail($id);
        $kategori = Kategori::all();

        return view('admin.alat.edit', compact('alat', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alat = Alat::findOrFail($id);

        $request->validate([
            'kategori_id'      => 'required|exists:kategoris,id',
            'nama_alat'        => 'required|string|max:255',
            'jumlah_total'     => 'required|integer|min:1',
            'jumlah_tersedia'  => 'required|integer|min:0',
            'kondisi'          => 'required|string',
        ]);

        // jaga agar tersedia tidak lebih dari total
        $jumlahTersedia = min($request->jumlah_tersedia, $request->jumlah_total);

        $alat->update([
            'kategori_id'      => $request->kategori_id,
            'nama_alat'        => $request->nama_alat,
            'jumlah_total'     => $request->jumlah_total,
            'jumlah_tersedia'  => $jumlahTersedia,
            'kondisi'          => $request->kondisi,
        ]);

        return redirect()
            ->route('admin.alat.index')
            ->with('success', 'Data alat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alat = Alat::findOrFail($id);
        $alat->delete();

        return redirect()
            ->route('admin.alat.index')
            ->with('success', 'Data alat berhasil dihapus');
    }
}
