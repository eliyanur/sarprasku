<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Alat;
use App\Models\LogAktivitas;

class PengembalianController extends Controller
{
    /**
     * Proses pengembalian alat
     */
    public function kembalikan(Request $request, $id)
{
    $request->validate([
        'kondisi' => 'required|in:baik,rusak,hilang',
    ]);

    $peminjaman = Peminjaman::with('user')->findOrFail($id);
    $alat = Alat::findOrFail($peminjaman->id_alat);

    // TAMBAH STOK
    $alat->jumlah_tersedia += $peminjaman->jumlah;
    $alat->save();

    // Simpan pengembalian
    Pengembalian::create([
        'peminjaman_id' => $peminjaman->id,
        'kondisi' => $request->kondisi
    ]);

    // UPDATE STATUS
    $peminjaman->status = 'dikembalikan';
    $peminjaman->save();

    // TAMBAHAN BLOCK USER
    if ($request->kondisi == 'rusak' || $request->kondisi == 'hilang') {
        $peminjaman->user->is_blocked = true;
        $peminjaman->user->save();
    }

    return redirect()->route('petugas.peminjaman')
        ->with('success', 'Pengembalian berhasil');
}
}
