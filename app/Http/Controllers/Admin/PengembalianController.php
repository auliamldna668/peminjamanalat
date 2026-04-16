<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $data = Pengembalian::with(['peminjaman.alat', 'peminjaman.user'])
        ->latest()
        ->get();
        return view('admin.pengembalian.index', compact('data'));
    }

    public function create()
    {  
    return view('admin.pengembalian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required',
            'tanggal_kembali' => 'required|date',
        ]);

        Pengembalian::create($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $data = Pengembalian::findOrFail($id);
        return view('admin.pengembalian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pengembalian::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pengembalian::findOrFail($id)->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil dihapus');
    }
}