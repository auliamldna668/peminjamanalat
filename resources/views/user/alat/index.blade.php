@extends('layouts.user')

@section('content')

<style>
    :root {
        --bg: #0f1117;
        --surface: #1a1d27;
        --surface2: #222636;
        --border: #2e3248;
        --accent: #4f6ef7;
        --accent-soft: rgba(79, 110, 247, 0.12);
        --green: #22c55e;
        --green-soft: rgba(34, 197, 94, 0.12);
        --red: #ef4444;
        --red-soft: rgba(239, 68, 68, 0.12);
        --yellow: #f59e0b;
        --yellow-soft: rgba(245, 158, 11, 0.12);
        --text: #e2e8f0;
        --text-muted: #64748b;
        --text-dim: #94a3b8;
        --radius: 12px;
        --radius-sm: 8px;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
        padding: 40px 24px;
    }

    .container-fluid {
        margin-top: 20px;
        padding: 20px;
        border-radius: 16px;
    }

    h1 {
        font-size: 22px;
        font-weight: 700;
        color: var(--text);
        letter-spacing: -0.3px;
        margin-bottom: 4px;
    }

    p {
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 24px;
    }

    .card {
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
        background: var(--surface);
        box-shadow: none;
    }

    .card-body {
        padding: 0;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .table thead {
        background: var(--surface2);
        border-bottom: 1px solid var(--border);
    }

    .table thead th {
        padding: 14px 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--text-muted);
        text-align: center;
        border: none;
    }

    .table tbody td {
        padding: 16px 20px;
        font-size: 14px;
        color: var(--text-dim);
        vertical-align: middle;
        text-align: center;
        border: none;
        border-bottom: 1px solid var(--border);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: transparent;
    }

    .table tbody tr {
        transition: background 0.15s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(255,255,255,0.02);
        transform: none;
    }

    .badge.bg-success {
        background-color: var(--green-soft) !important;
        color: var(--green);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .badge.bg-danger {
        background-color: var(--red-soft) !important;
        color: var(--red);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .btn-primary {
        background: var(--accent-soft);
        border: 1px solid rgba(79, 110, 247, 0.25);
        color: var(--accent);
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 600;
        padding: 7px 14px;
        transition: all 0.15s ease;
    }

    .btn-primary:hover {
        background: rgba(79, 110, 247, 0.2);
        border-color: rgba(79, 110, 247, 0.4);
        color: var(--accent);
        transform: none;
    }

    .btn-secondary {
        background: var(--surface2);
        border: 1px solid var(--border);
        color: var(--text-muted);
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 600;
        padding: 7px 14px;
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="container-fluid px-4">

    <h1 class="mt-4">Daftar Alat</h1>
    <p>Data seluruh alat yang tersedia</p>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Kondisi</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($alats as $alat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alat->nama_alat }}</td>
                        <td>{{ $alat->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $alat->stok }}</td>

                        <td>
                            @if($alat->stok > 0)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif

                           
                                @foreach ($alats as $alat)
 <td>           
                                <a href="{{ route('user.peminjaman.create', $alat->id) }}" 
                                   class="btn btn-primary btn-sm">
                                    Pinjam
                                </a>
                                

                                @endforeach

                            </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection