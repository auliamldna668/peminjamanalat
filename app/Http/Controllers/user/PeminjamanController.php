<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\Alat;

class PeminjamanController extends Controller
{

public function create($id)
{
    $alat = Alat::findOrFail($id);
    return view('user.peminjaman.create', compact('alat'));
}
public function store(Request $request)
{
    $request->validate([
        'alat_id' => 'required',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date',
        'jumlah' => 'required|integer|min:1'
    ]);

    \App\Models\Peminjaman::create([
        'user_id' => auth()->id(),
        'alat_id' => $request->alat_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'jumlah' => $request->jumlah,
        'status' => 'pending'
    ]);

    return redirect()->route('user.alat.index')
        ->with('success', 'Peminjaman berhasil diajukan');
}
}
