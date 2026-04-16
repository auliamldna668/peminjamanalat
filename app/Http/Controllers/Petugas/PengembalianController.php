<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;

class PengembalianController extends Controller // ✅ Pengembalian
{
  public function monitoring()
{
   $data = Pengembalian::with(['peminjaman.alat', 'peminjaman.user'])->latest()->get();
    
    // ✅ Sesuaikan dengan file yang sudah kamu buat
    return view('petugas.monitoring.index', compact('data'));
}
}