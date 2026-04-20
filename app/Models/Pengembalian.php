<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians';

        protected $fillable = [
     'user_id',
    'peminjaman_id',
    'tanggal_kembali',
    'denda',
    'kondisi_barang',
    'catatan'
];

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

public function peminjaman()
{
    return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
}



}