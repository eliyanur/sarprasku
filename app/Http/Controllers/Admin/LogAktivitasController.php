<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogAktivitas;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $logs = LogAktivitas::with('user')
                    ->latest()
                    ->paginate(10);

        return view('admin.logaktivitas', compact('logs'));
    }
}
