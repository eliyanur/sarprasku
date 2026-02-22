<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Alat;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $sedangDipinjam = Peminjaman::where('user_id', $user->id)
        ->where('status', 'dipinjam')
        ->count();

    $telat = Peminjaman::where('user_id', $user->id)
        ->where('status', 'dipinjam')
        ->whereDate('tanggal_kembali', '<', Carbon::today())
        ->count();

    $alatTersedia = Alat::where('jumlah_tersedia', '>', 0)->count();

    return view('user.dashboard', compact(
        'sedangDipinjam',
        'telat',
        'alatTersedia'
    ));
}

}
