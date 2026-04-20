<style>
    :root {
        /* pastel ungu pink theme */
        --bg: #faf7ff; /* soft lavender background */
        --surface: #ffffff;
        --surface2: #f3e8ff; /* light purple */
        --border: #eadcff;

        --accent: #a78bfa; /* pastel purple */
        --accent-soft: rgba(167, 139, 250, 0.15);

        --pink: #f9a8d4;
        --pink-soft: rgba(249, 168, 212, 0.18);

        --purple: #c4b5fd;
        --purple-soft: rgba(196, 181, 253, 0.18);

        --green: #86efac;
        --green-soft: rgba(134, 239, 172, 0.18);

        --red: #fda4af;
        --red-soft: rgba(253, 164, 175, 0.18);

        --text: #2e2a3b;
        --text-muted: #7c7a88;
        --text-dim: #a1a1aa;

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
        box-shadow: 0 8px 20px rgba(167, 139, 250, 0.08);
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
    }

    .table tbody td {
        padding: 16px 20px;
        font-size: 14px;
        color: var(--text);
        text-align: center;
        border-bottom: 1px solid var(--border);
    }

    .table tbody tr:hover {
        background-color: #faf5ff;
    }

    .badge.bg-success {
        background-color: var(--purple-soft) !important;
        color: var(--accent);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(167, 139, 250, 0.25);
    }

    .badge.bg-danger {
        background-color: var(--pink-soft) !important;
        color: #db2777;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(249, 168, 212, 0.35);
    }

    .btn-primary {
        background: var(--accent-soft);
        border: 1px solid rgba(167, 139, 250, 0.35);
        color: var(--accent);
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 600;
        padding: 7px 14px;
        transition: 0.2s ease;
    }

    .btn-primary:hover {
        background: rgba(167, 139, 250, 0.25);
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
                        <th>Aksi</th>
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
                        </td>

                        <td>
                            <a href="{{ route('user.peminjaman.create', $alat->id) }}" 
                               class="btn btn-primary btn-sm">
                                Pinjam
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>
