<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::all();
       return view('petugas.persetujuan.index', compact('data'));
    }

    public function setujui($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->status = 'disetujui';
        $data->save();

        return back()->with('success', 'Disetujui');
    }

    public function tolak($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->status = 'ditolak';
        $data->save();

        return back()->with('success', 'Ditolak');
    }

    public function pending($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->status = 'pending';
        $data->save();

        return back()->with('success', 'Dikembalikan ke pending');
    }
}       