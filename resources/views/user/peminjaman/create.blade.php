@extends('layouts.user')

@section('content')

<style>
    body {
        background: #f7f7fb;
    }

    .page-wrapper {
        padding: 30px 20px;
        display: flex;
        justify-content: center;
    }

    .card {
        width: 100%;
        max-width: 900px;
        border: none;
        border-radius: 20px;
        background: #ffffff;
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        color: #333;
        font-weight: 700;
        padding: 18px 20px;
        font-size: 18px;
    }

    .card-body {
        padding: 30px;
    }

    label {
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 6px;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #e6e6f0;
        padding: 10px 14px;
        background: #f9f9ff;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #a5a0ff;
        box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.15);
        background: #fff;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6c63ff, #a5a0ff);
        border: none;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 600;
    }

    .btn-secondary {
        border-radius: 12px;
        padding: 10px 18px;
    }

    .btn-primary:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .info-box {
        background: #f8f9ff;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
    }
</style>

<div class="page-wrapper">

    <div class="card">

        <div class="card-header">
            Form Peminjaman Alat
        </div>

        <div class="card-body">

            <!-- INFO ALAT -->
            <div class="info-box">
                <label>Nama Alat</label>
                <input type="text" class="form-control" 
                    value="{{ $alat->nama_alat }}" readonly>
            </div>

            <div class="info-box">
                <label>Kategori</label>
                <input type="text" class="form-control" 
                    value="{{ $alat->kategori->nama ?? '-' }}" readonly>
            </div>

            <div class="info-box">
                <label>Stok Tersedia</label>
                <input type="text" class="form-control" 
                    value="{{ $alat->stok }}" readonly>
            </div>

            <!-- FORM -->
            <form action="{{ route('user.peminjaman.store') }}" method="POST">
                @csrf

                <input type="hidden" name="alat_id" value="{{ $alat->id }}">

                <div class="mb-3">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah Pinjam</label>
                    <input type="number" name="jumlah" class="form-control" min="1" max="{{ $alat->stok }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('user.alat.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Pinjam Sekarang
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection