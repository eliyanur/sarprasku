<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
