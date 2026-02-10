<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori =kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_kategori' => 'required',
            'deskripsi'    => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
    }
}
