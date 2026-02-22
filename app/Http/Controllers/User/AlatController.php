<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
   public function index(Request $request)
{
    $kategori = $request->kategori ?? 'Semua';
    $search   = $request->search;

    $query = Alat::with('kategori');

    // FILTER KATEGORI
    if ($kategori !== 'Semua') {
        $query->whereHas('kategori', function ($q) use ($kategori) {
            $q->where('nama_kategori', $kategori);
        });
    }

    // SEARCH NAMA ALAT
    if ($search) {
        $query->where('nama_alat', 'like', '%' . $search . '%');
    }

    $alat = $query->latest()->get();
    $data_kategori = Kategori::all();

    return view('user.alat', compact(
        'alat',
        'data_kategori',
        'kategori',
        'search'
    ))->with('title', 'Daftar Alat');
}

}
