<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Alat;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{

public function store(Request $request)
{
    $request->validate([
        'id_alat' => 'required|exists:alats,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal_kembali' => 'required|date|after_or_equal:today',
    ]);

    $alat = Alat::findOrFail($request->id_alat);

    // CEK STOK
    if ($request->jumlah > $alat->jumlah_tersedia) {
        return back()->with('error', 'Stok tidak mencukupi!');
    }

    // SIMPAN (STATUS MENUNGGU DULU)
    Peminjaman::create([
        'user_id' => auth()->id(),
        'id_alat' => $request->id_alat,
        'jumlah' => $request->jumlah,
        'tanggal_pinjam' => now(),
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Pengajuan peminjaman berhasil dikirim!');
}
}