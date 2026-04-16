<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alats';

    protected $fillable = [
    'kode_alat',
    'nama_alat',
    'kategori_id',
    'stok'
];
    // 👇 RELASI KATEGORI
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}