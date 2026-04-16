<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogAktivitas;


class LogAktivitasController extends Controller
{
    // Menampilkan semua log
    public function index()
    {
        $data = LogAktivitas::latest()->get();
        return view('admin.logaktivitas.index', compact('data'));
    }

    // (Opsional) Hapus log
    public function destroy($id)
    {
        $log = LogAktivitas::findOrFail($id);
        $log->delete();

        return redirect()->back()->with('success', 'Log berhasil dihapus');
    }

    public function store($aktivitas)
{
    LogAktivitas::create([
        'user' => Auth::user()->name,
        'aktivitas' => $aktivitas,
    ]);
}
}