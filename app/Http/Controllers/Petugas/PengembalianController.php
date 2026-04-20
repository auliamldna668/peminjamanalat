<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Http\Controllers\Admin\LogAktivitasController; 

class PengembalianController extends Controller
{
    public function monitoring()
    {
        $data = Pengembalian::with(['peminjaman.alat', 'peminjaman.user'])
                ->latest()
                ->get();

        return view('petugas.monitoring.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'kondisi' => 'required|string|max:255',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        $tanggalKembali = Carbon::now();
        $tanggalJatuhTempo = Carbon::parse($peminjaman->tanggal_kembali);

        $hariTelat = 0;
        if ($tanggalKembali->gt($tanggalJatuhTempo)) {
            $hariTelat = $tanggalKembali->diffInDays($tanggalJatuhTempo);
        }

        $denda = $hariTelat * 1000;

        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'tanggal_kembali' => $tanggalKembali,
            'kondisi' => $request->kondisi,
            'denda' => $denda,
        ]);
        
        LogAktivitasController::storeLog('Petugas menyetujui peminjaman');
        LogAktivitasController::storeLog('Petugas menolak peminjaman');

        $peminjaman->update([
            'status' => 'dikembalikan'
        ]);

        if ($peminjaman->alat) {
            $peminjaman->alat->increment('stok');
        }

        return redirect()->back()->with('success', 'Pengembalian berhasil. Denda: Rp ' . $denda);
    }
}