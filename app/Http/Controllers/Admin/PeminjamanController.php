<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {

 $peminjamans = Peminjaman::with('alat') // 🔥 DI SINI
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

     $data = Peminjaman::with(['user', 'alat'])->get();
        return view('admin.peminjam.index', compact('data'));
    }

public function setujui($id)
{
    $data = Peminjaman::findOrFail($id);
    $data->status = 'disetujui';
    $data->save();

    return back()->with('success', 'Peminjaman disetujui');
}

public function pengembalian()
{
    return $this->hasOne(Pengembalian::class, 'peminjaman_id');
}

public function tolak($id)
{
    $data = Peminjaman::findOrFail($id);
    $data->status = 'ditolak';
    $data->save();

    return back()->with('success', 'Peminjaman ditolak');
}

}