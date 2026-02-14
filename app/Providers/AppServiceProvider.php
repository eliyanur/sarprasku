<?php

namespace App\Providers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        if (Auth::check()) {
            $notifs = Peminjaman::where('user_id', Auth::id())
                ->where('status', 'disetujui')
                ->whereDate('tanggal_kembali', '<', now())
                ->get();

            $view->with('notif_terlambat', $notifs);
        }
    });
    }
}
