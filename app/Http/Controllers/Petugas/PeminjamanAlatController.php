<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanAlatController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        $query = Peminjaman::with(['user', 'alat']);

        if ($status) {
            $query->where('status', $status);
        }

        $peminjaman = $query->latest()->get();

        return view('petugas.peminjaman', compact('peminjaman'));
    }

    // SETUJUI
    public function setujui($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'disetujui';
        $peminjaman->save();
        
         LogAktivitas::create([
        'user_id'   => auth()->id(),
        'aktivitas' => 'Menyetujui peminjaman ' . $peminjaman->alat->nama,
        'status'    => 'disetujui',
        'waktu'     => now()
    ]);

        return back()->with('success', 'Peminjaman berhasil disetujui');
    }

    // TOLAK
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'ditolak';
        $peminjaman->save();
       
        LogAktivitas::create([
        'user_id'   => auth()->id(),
        'aktivitas' => 'Menolak peminjaman ' . $peminjaman->alat->nama,
        'status'    => 'ditolak',
        'waktu'     => now()
    ]);

        return back()->with('success', 'Peminjaman berhasil ditolak');
    }

    // KEMBALIKAN
    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

         LogAktivitas::create([
        'user_id'   => auth()->id(),
        'aktivitas' => 'Mengmbalikan alat ' . $peminjaman->alat->nama,
        'status'    => 'dikembalikan',
        'waktu'     => now()
    ]);
        return redirect()->route('petugas.peminjaman')->with('success', 'Pengembalian berhasil');
    }
}
