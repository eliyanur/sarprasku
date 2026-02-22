<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   
public function index()
{
    // CARD STATISTIK
    $total = Peminjaman::count();

    $menunggu = Peminjaman::where('status','pending')->count();

    $disetujui = Peminjaman::where('status','disetujui')->count();

    $dikembalikan = Peminjaman::where('status','dikembalikan')->count();

    // DATA BULANAN UNTUK CHART
    $bulanan = Peminjaman::select(
            DB::raw('MONTH(tanggal_pinjam) as bulan'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('tanggal_pinjam', Carbon::now()->year)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total','bulan');

    // PEMINJAMAN TERBARU
    $terbaru = Peminjaman::with('user')
                ->latest()
                ->take(5)
                ->get();

    return view('admin.dashboard', compact(
        'total',
        'menunggu',
        'disetujui',
        'dikembalikan',
        'bulanan',
        'terbaru'
    ));
}

}
