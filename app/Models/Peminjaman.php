<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans'; // 🔥 TAMBAHKAN INI

    protected $fillable = [
    'user_id',
    'alat_id',
    'tanggal_pinjam',
    'tanggal_kembali',
    'jumlah',
    'status'
];


    public function alat()
{
    return $this->belongsTo(Alat::class);
}

public function pengembalian()
{
    return $this->hasOne(Pengembalian::class, 'peminjaman_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}