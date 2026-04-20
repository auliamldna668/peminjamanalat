<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Auth;

class LogAktivitasController extends Controller
{
    // ✅ tampilkan log
    public function index()
    {
        $data = LogAktivitas::with('user')->latest()->get(); // FIX

        return view('admin.logaktivitas.index', compact('data'));
    }

    // ✅ hapus log
    public function destroy($id)
    {
        $log = LogAktivitas::findOrFail($id);
        $log->delete();

        return redirect()->back()->with('success', 'Log berhasil dihapus');
    }

    // ✅ simpan log (dipanggil dari controller lain)
    public static function storeLog($aktivitas)
    {
       LogAktivitas::create([
    'user' => Auth::user()->name,
    'aktivitas' => $aktivitas,
]);
    }
}