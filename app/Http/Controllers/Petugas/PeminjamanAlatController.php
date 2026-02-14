<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\DB;
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

  public function setujui($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $alat = Alat::findOrFail($peminjaman->id_alat);

    $alat->jumlah_tersedia -= $peminjaman->jumlah;
    $alat->save();

    $peminjaman->status = 'disetujui';
    $peminjaman->save();

    return back();
}


    // TOLAK
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->status = 'ditolak';
        $peminjaman->save();
       
        LogAktivitas::create([
        'user_id'   => auth()->id(),
        'aktivitas' => 'Menolak peminjaman ' . $peminjaman->alat->nama_alat,
        'status'    => 'ditolak',
        'waktu'     => now()
    ]);

        return back()->with('success', 'Peminjaman berhasil ditolak');
    }

   public function kembalikan($id)
{
    DB::beginTransaction();

    try {

        $peminjaman = Peminjaman::lockForUpdate()->findOrFail($id);

        // CEK STATUS
        if ($peminjaman->status !== 'disetujui') {
            return back()->with('error', 'Belum bisa dikembalikan');
        }

        $alat = Alat::lockForUpdate()->findOrFail($peminjaman->id_alat);

        // TAMBAH STOK
        $alat->jumlah_tersedia += $peminjaman->jumlah;
        $alat->save();

        // UPDATE STATUS
        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        LogAktivitas::create([
            'user_id'   => auth()->id(),
            'aktivitas' => 'Mengembalikan alat ' . $alat->nama_alat,
            'status'    => 'dikembalikan',
            'waktu'     => now()
        ]);

        DB::commit();

        return redirect()->route('petugas.peminjaman')
            ->with('success', 'Pengembalian berhasil');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan');
    }
}
}
