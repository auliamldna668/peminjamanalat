<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Admin\PengembalianController as AdminPengembalianController;
use App\Http\Controllers\Admin\LogAktivitasController; 
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;
use App\Http\Controllers\Petugas\PengembalianController;
use App\Http\Controllers\Petugas\LaporanController;
use App\Http\Controllers\User\AlatController as UserAlatController;  
use App\Http\Controllers\User\PeminjamanController as UserPeminjamanController;
use App\Http\Controllers\User\PengembalianController as UserPengembalianController; 



Route::get('/', function () {
    return view('welcome');
});

// Route Jembatan setelah login (Cek Middleware 'auth')
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role == 'petugas') {
        return redirect()->route('petugas.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth')->name('dashboard');

// Group auth
Route::middleware('auth')->group(function () {

    // --- GROUP ADMIN ---
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        
        // Dashboard Admin (PASTIKAN INI AKTIF)
        Route::get('/', function () { 
            return view('admin.dashboard'); 
        })->name('dashboard');

        // User CRUD
        Route::resource('user', UserController::class);

        // Alat & Kategori
        Route::resource('alat', AlatController::class);
        Route::resource('kategori', KategoriController::class);

        // Peminjaman & Pengembalian (Prefix admin dihapus karena sudah ada di atas)
        Route::resource('peminjaman', AdminPeminjamanController::class);
      Route::resource('pengembalian', AdminPengembalianController::class);

        // Log aktivitas
        
        Route::resource('logaktivitas', LogAktivitasController::class);

}); 

    // --- GROUP PETUGAS ---
 Route::prefix('petugas')->name('petugas.')->middleware('role:petugas')->group(function () {

    Route::get('/', function () { 
        return view('petugas.dashboard'); 
    })->name('dashboard');

    Route::get('/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('peminjaman');
    Route::put('/peminjaman/{id}/setujui', [PetugasPeminjamanController::class, 'setujui'])->name('setujui');
    Route::put('/peminjaman/{id}/tolak', [PetugasPeminjamanController::class, 'tolak'])->name('tolak');
    Route::put('/peminjaman/{id}/pending', [PetugasPeminjamanController::class, 'pending'])->name('pending');

    // ✅ Diperbaiki
    Route::get('/pengembalian', [PengembalianController::class, 'monitoring'])
        ->name('pengembalian');

      Route::get('/laporan', [LaporanController::class, 'cetak'])->name('laporan');


});




    // --- GROUP USER / PEMINJAM ---
    // Sesuaikan 'role:peminjem' jika di database kamu namanya 'peminjem'
    Route::prefix('user')->name('user.')->middleware('role:user')->group(function () {
        Route::get('/', function () { return view('user.dashboard'); })->name('dashboard');
        // Route::get('/alat', function () { return view('user.alat.index'); })->name('alat');
         Route::get('/alat', [UserAlatController::class, 'index'])
        ->name('alat.index');


Route::get('/peminjaman/create/{id}', [UserPeminjamanController::class, 'create'])
    ->name('peminjaman.create');

    Route::post('/peminjaman', [UserPeminjamanController::class, 'store'])
        ->name('peminjaman.store');

       Route::get('/pengembalian', [UserPengembalianController::class, 'index'])
    ->name('pengembalian.index');

Route::get('/pengembalian', [UserPengembalianController::class, 'index'])
    ->name('pengembalian.index');

Route::post('/pengembalian/{id}', [UserPengembalianController::class, 'kembalikan'])
    ->name('pengembalian.kembalikan');      
    
    });


    // Profile (Semua Role)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';