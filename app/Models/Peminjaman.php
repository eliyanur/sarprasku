<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //use HasFactory;

    protected $fillable = [
        'user_id',
        'id_alat',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat');
    }
    
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}