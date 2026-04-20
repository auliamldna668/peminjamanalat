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
        $data = Pengembalian::all(); // ambil data
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
        $data = Pengembalian::all();
return view('admin.pengembalian.index', compact('pengembalians'));
    }

    // public function edit($id)
    // {
    //     $data = Pengembalian::findOrFail($id);
    //     return view('admin.pengembalian.edit', compact('data'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = Pengembalian::findOrFail($id);
    //     $data->update($request->all());

    //     return redirect()->route('pengembalian.index')->with('success', 'Data berhasil diupdate');
    // }

    public function destroy($id)
    {
        Pengembalian::findOrFail($id)->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data berhasil dihapus');
    }
}