<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\LogAktivitas;

class PengembalianController extends Controller
{
    /**
     * Proses pengembalian alat
     */
    public function kembalikan(Request $request, $id)
    {
        // Validasi input dari modal
        $request->validate([
            'kondisi' => 'required|in:baik,rusak,hilang',
        ]);

        // Ambil peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Simpan data pengembalian
        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'kondisi' => $request->kondisi
        ]);

        // Update status peminjaman
        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        LogAktivitas::create([
        'user_id'   => auth()->id(),
        'aktivitas' => 'Mengmbalikan alat ' . $peminjaman->alat->nama,
        'status'    => 'dikembalikan',
        'waktu'     => now()
    ]);

        // Redirect kembali ke halaman daftar peminjaman petugas
        return redirect()->route('petugas.peminjaman')->with('success', 'Pengembalian berhasil');
    }
}
