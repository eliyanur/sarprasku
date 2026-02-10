<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alat extends Model
{
  use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_alat',
        'jumlah_total',
        'jumlah_tersedia',
        'kondisi',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    } 
}
