<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
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

        return back()->with('success', 'Peminjaman berhasil disetujui');
    }

    // TOLAK
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'ditolak';
        $peminjaman->save();

        return back()->with('success', 'Peminjaman berhasil ditolak');
    }

    // KEMBALIKAN
    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        return redirect()->route('petugas.peminjaman')->with('success', 'Pengembalian berhasil');
    }
}
