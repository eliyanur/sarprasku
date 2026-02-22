<?php

namespace App\Http\Controllers;
use App\Models\Alat;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
 
public function index()
{
    // Total alat
    $totalAlat = Alat::count();

    // Peminjaman hari ini
    $hariIni = Peminjaman::whereDate('tanggal_pinjam', Carbon::today())->count();

    // Peminjaman aktif (sudah disetujui tapi belum dikembalikan)
    $aktif = Peminjaman::where('status', 'disetujui')->count();

    // Terlambat
    $terlambat = Peminjaman::where('status', 'disetujui')
                    ->whereDate('tanggal_kembali', '<', Carbon::today())
                    ->count();

    // 5 data terbaru
    $terbaru = Peminjaman::with(['user','alat'])
                    ->latest()
                    ->take(5)
                    ->get();

    return view('petugas.dashboard', compact(
        'totalAlat',
        'hariIni',
        'aktif',
        'terlambat',
        'terbaru'
    ));
}

}
