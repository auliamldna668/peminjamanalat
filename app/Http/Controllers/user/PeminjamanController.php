<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\LogAktivitas;
use App\Http\Controllers\Admin\LogAktivitasController;


class PeminjamanController extends Controller
{

// FORM PINJAM
public function create($id)
{
    $alat = Alat::findOrFail($id);
    return view('user.peminjaman.create', compact('alat'));
}


// SIMPAN PEMINJAMAN
public function store(Request $request)
{
    $request->validate([
        'alat_id' => 'required',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date',
        'jumlah' => 'required|integer|min:1'
    ]);

    Peminjaman::create([
        'user_id' => auth()->id(),
        'alat_id' => $request->alat_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'jumlah' => $request->jumlah,
        'status' => 'menunggu' // 🔥 GANTI DARI pending
    ]);

LogAktivitasController::storeLog('User meminjam alat');

    return redirect()->route('user.peminjaman.store')
        ->with('success', 'Peminjaman berhasil diajukan');
}


// HALAMAN "PEMINJAMAN SAYA"
public function index()
{
    $peminjamans = \App\Models\Peminjaman::with('alat')
        ->where('user_id', auth()->id())
        ->get();

    return view('user.peminjaman.index', compact('peminjamans'));
}


// BATALKAN
public function batal($id)
{
    $peminjaman = Peminjaman::where('user_id', auth()->id())
        ->findOrFail($id);

    if ($peminjaman->status == 'menunggu') {
        $peminjaman->delete();

        return back()->with('success', 'Peminjaman berhasil dibatalkan');
    }

    return back()->with('error', 'Tidak bisa dibatalkan');
}



}