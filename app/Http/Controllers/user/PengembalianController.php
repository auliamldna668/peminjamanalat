<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\LogAktivitasController; 

class PengembalianController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['alat', 'pengembalian'])
            ->where('user_id', auth()->id())
          ->where('status', 'disetujui')
            ->get();

        return view('user.pengembalian.index', compact('peminjamans'));
    }

    public function kembalikan($id)
    {
        DB::beginTransaction();

        try {

            $peminjaman = Peminjaman::with('alat')->findOrFail($id);

            // kalau sudah dikembalikan, stop
            if ($peminjaman->status == 'dikembalikan') {
                return redirect()->back()->with('error', 'Sudah dikembalikan');
            }

            // =========================
            // HITUNG DENDA
            // =========================
            $tanggalPinjam = Carbon::parse($peminjaman->tanggal_pinjam);
            $hariIni = Carbon::now();

            $batasHari = 3;
            $dendaPerHari = 2000;

            $selisih = $tanggalPinjam->diffInDays($hariIni);
            $telat = $selisih - $batasHari;

            $denda = ($telat > 0) ? $telat * $dendaPerHari : 0;
Pengembalian::create([
    'user_id' => $peminjaman->user_id,
    'peminjaman_id' => $peminjaman->id,
    'tanggal_kembali' => Carbon::now()->format('Y-m-d'),
    'denda' => $denda,
    'kondisi_barang' => 'baik',
    'catatan' => null
]);

 LogAktivitasController::storeLog('User meminjam alat');
 LogAktivitasController::storeLog('Admin menambah alat');
LogAktivitasController::storeLog('Petugas menyetujui peminjaman');
LogAktivitasController::storeLog('User mengembalikan alat');

            $peminjaman->update([
                'status' => 'dikembalikan'
            ]);

           

            if ($peminjaman->alat) {
                $peminjaman->alat->increment('stok');
            }

            DB::commit();

            return redirect()->back()->with('success', 'Alat berhasil dikembalikan');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}