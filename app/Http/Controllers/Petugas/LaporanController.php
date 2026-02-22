<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use App\Models\User;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['user','alat','pengembalian']);

        // FILTER TANGGAL
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal_pinjam', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        $data = $query->latest()->get();

        // SUMMARY
        $total = $data->count();
        $dikembalikan = $data->where('status', 'dikembalikan')->count();
        $terlambat = $data->where('status', 'disetujui')
                          ->where('tanggal_kembali', '<', today())
                          ->count();

        $rusak = Pengembalian::where('kondisi_pengembalian','rusak')->count();
        $hilang = Pengembalian::where('kondisi_pengembalian','hilang')->count();
        $blocked = User::where('is_blocked', true)->count();

        return view('petugas.laporan', compact(
            'data','total','dikembalikan','terlambat',
            'rusak','hilang','blocked'
        ));
    }
    public function exportPDF(Request $request)
{
    $data = Peminjaman::with(['user','alat'])->get();

    $pdf = Pdf::loadView('petugas.laporan_pdf', compact('data'));

    return $pdf->download('laporan_peminjaman.pdf');
}

public function exportExcel()
{
    return Excel::download(new LaporanExport, 'laporan_peminjaman.xlsx');
}


}
