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
        $kategori = $request->kategori;

        $alat = Alat::with('kategori')
            ->when($kategori && $kategori !== 'Semua', function ($query) use ($kategori) {
                $query->whereHas('kategori', function ($q) use ($kategori) {
                    $q->where('nama_kategori', $kategori);
                });
            })
            ->get();

        $data_kategori = Kategori::all();

        return view('user.alat', compact(
            'alat',
            'data_kategori',
            'kategori'
        ))->with('title', 'Daftar Alat');
    }
}
