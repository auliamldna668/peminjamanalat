<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
   public function index()
{
    $alats = Alat::with('kategori')->get();
    return view('admin.alat.index', compact('alats'));
}

public function create()
{
    $kategoris = Kategori::all();
    return view('admin.alat.create', compact('kategoris'));
}

public function store(Request $request)
{
    $request->validate([
        'nama_alat' => 'required',
        'kategori_id' => 'required|exists:kategoris,id',
        'stok' => 'required|integer'
    ]);

    Alat::create([
        'kode_alat' => 'ALT-' . time(),
        'nama_alat' => $request->nama_alat,
        'kategori_id' => $request->kategori_id,
        'stok' => $request->stok,

        
    ]);

    return redirect()->route('admin.alat.index')
        ->with('success', 'Data berhasil ditambahkan');
}

public function edit($id)
{
    $alat = Alat::findOrFail($id);
    $kategoris = Kategori::all();

    return view('admin.alat.edit', compact('alat','kategoris'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_alat' => 'required',
        'kategori_id' => 'required',
        'stok' => 'required|integer'
    ]);

    $alat = Alat::findOrFail($id);

    $alat->update([
        'nama_alat' => $request->nama_alat,
        'kategori_id' => $request->kategori_id,
        'stok' => $request->stok,
    ]);

    return redirect()->route('admin.alat.index')
        ->with('success', 'Alat berhasil diupdate');
}

public function destroy($id)
{
    $alat = Alat::findOrFail($id);
    $alat->delete();

    return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil dihapus');
}
}