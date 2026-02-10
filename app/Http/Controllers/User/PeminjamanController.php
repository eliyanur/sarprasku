<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Alat;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validasi
        $request->validate([
            'alat_id'      => 'required|exists:alat,id',
            'jumlah'       => 'required|integer|min:1',
            'tgl_pinjam'   => 'required|date',
            'tgl_kembali'  => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        $alat = Alat::findOrFail($request->alat_id);

        // ✅ Cek stok
        if ($request->jumlah > $alat->jumlah_tersedia) {
            return back()->with('error', 'Jumlah melebihi stok tersedia!');
        }

        // ✅ Simpan ke tabel peminjaman
        $peminjaman = Peminjaman::create([
            'user_id'      => Auth::id(),
            'tgl_pinjam'   => $request->tgl_pinjam,
            'tgl_kembali'  => $request->tgl_kembali,
            'status'       => 'menunggu',
        ]);
}
}
