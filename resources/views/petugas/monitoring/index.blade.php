<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    :root {
        --bg: #fdf4ff;
        --surface: #ffffff;
        --surface2: #faf0ff;
        --border: #edd9f7;
        --purple: #9b72cf;
        --pink: #e879a0;
        --green: #6dbb8a;
        --green-soft: rgba(109, 187, 138, 0.15);
        --red: #e8837a;
        --red-soft: rgba(232, 131, 122, 0.15);
        --yellow: #f0b97d;
        --yellow-soft: rgba(240, 185, 125, 0.15);
        --text: #3d2f54;
        --text-muted: #b89ece;
        --text-dim: #6e5589;
        --radius: 18px;
        --radius-sm: 10px;
        --shadow: 0 8px 32px rgba(155, 114, 207, 0.12), 0 1px 4px rgba(0,0,0,0.04);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(135deg, #fdf4ff 0%, #fff0f8 50%, #f0f4ff 100%);
        color: var(--text);
        min-height: 100vh;
        padding: 36px 32px;
    }

    .container {
        max-width: 100% !important;
        width: 100% !important;
        padding: 0 !important;
    }

    h3 {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.3px;
        color: var(--text);
        margin-bottom: 20px !important;
    }

    .alert-success {
        background: rgba(109, 187, 138, 0.12);
        color: #2d6a4f;
        border: 1px solid rgba(109, 187, 138, 0.3);
        border-radius: var(--radius-sm);
        padding: 12px 16px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .table-card {
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        background: var(--surface);
        border: 1px solid var(--border);
        width: 100%;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 0 !important;
    }

    .table thead {
        background: linear-gradient(135deg, #c9a0e8, #f0a0c8, #a0b4f0);
        color: #ffffff;
    }

    .table thead th {
        padding: 15px 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.9px;
        border: none !important;
        color: #fff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s ease;
    }

    .table tbody tr:last-child td {
        border-bottom: none !important;
    }

    .table tbody tr:hover {
        background: rgba(200, 160, 232, 0.07);
    }

    .table tbody td {
        padding: 15px 20px;
        font-size: 14px;
        color: var(--text-dim);
        border: none !important;
        border-bottom: 1px solid var(--border) !important;
        vertical-align: middle;
    }

    .table-bordered {
        border: none !important;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.2px;
    }

    .badge-success {
        background: var(--green-soft);
        color: var(--green);
        border: 1px solid rgba(109, 187, 138, 0.3);
    }

    .badge-danger {
        background: var(--red-soft);
        color: var(--red);
        border: 1px solid rgba(232, 131, 122, 0.3);
    }

    .badge-warning {
        background: var(--yellow-soft);
        color: var(--yellow);
        border: 1px solid rgba(240, 185, 125, 0.3);
    }

    .text-center {
        text-align: center;
        color: var(--text-muted);
        font-size: 14px;
    }
</style>

<div class="container mt-4">

    <h3 class="mb-4">📦 Monitoring Pengembalian</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Alat</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th>Kondisi Barang</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>
                        {{ $item->peminjaman->user->name ?? '-' }}
                    </td>

                    <td>
                        {{ $item->peminjaman->alat->nama_alat ?? '-' }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}
                    </td>

                    <td>
                        @if($item->denda > 0)
                            <span class="badge badge-danger">
                                Rp {{ number_format($item->denda) }}
                            </span>
                        @else
                            <span class="badge badge-success">
                                Rp 0
                            </span>
                        @endif
                    </td>

                    <td>
                        @if($item->peminjaman->status == 'dikembalikan')
                            <span class="badge badge-success">Dikembalikan</span>
                        @else
                            <span class="badge badge-warning">Dipinjam</span>
                        @endif
                    </td>

                    <td>
                        {{ $item->kondisi ?? '-' }}
                    </td>
                </tr>
                @empty
                <tr>

                    <td colspan="7" class="text-center">
                        Tidak ada data pengembalian
                    </td>

                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>