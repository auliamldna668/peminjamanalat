<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class LaporanController extends Controller
{
    public function cetak()
    {
        $peminjaman = Peminjaman::with(['user', 'alat'])->latest()->get();

        $pengembalian = Pengembalian::with([
            'user',
            'peminjaman.alat'
        ])->latest()->get();

        return view('petugas.laporan.index', compact('peminjaman', 'pengembalian'));
    }
}
