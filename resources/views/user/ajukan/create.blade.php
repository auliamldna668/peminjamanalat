@extends('layouts.user')

@section('content')



<div class="container mt-4">

    <h2>Form Peminjaman</h2>

    <div class="card shadow-sm mt-3">
        <div class="card-body">

            <form action="{{ route('user.peminjaman.store') }}" method="POST">
                @csrf

                {{-- ID ALAT (dari tombol klik) --}}
                <input type="hidden" name="alat_id" value="{{ $alat->id ?? '' }}">

                <div class="mb-3">
                    <label>Nama Alat</label>
                    <input type="text" class="form-control" 
                           value="{{ $alat->nama_alat ?? '' }}" readonly>
                </div>

                <div class="mb-3">
                    <label>Jumlah Pinjam</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Ajukan Pinjaman
                </button>

            </form>

        </div>
    </div>

</div>

@endsection