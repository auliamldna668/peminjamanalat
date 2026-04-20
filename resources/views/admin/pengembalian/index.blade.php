<style>
    body {
        background: #faf5ff;
        font-family: Poppins, sans-serif;
    }

    .page-wrapper {
        width: 100%;
        padding: 30px;
    }

    .card {
        width: 100%;
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        background: #fff;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #f9a8d4, #c084fc);
        color: white;
        padding: 16px 20px;
        font-size: 18px;
        font-weight: 600;
    }

    .table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    .table thead {
        background: #f3e8ff;
        color: #6b21a8;
    }

    .table th {
        text-align: center;
        font-weight: 600;
        padding: 14px;
    }

    .table td {
        text-align: center;
        padding: 14px;
        border-bottom: 1px solid #f3e8ff;
    }

    .table tbody tr:hover {
        background: #fdf2f8;
    }

    .empty {
        padding: 20px;
        text-align: center;
        color: #888;
    }

    .btn-detail {
        padding: 6px 12px;
        border-radius: 8px;
        background: #f9a8d4;
        color: white;
        text-decoration: none;
        font-size: 13px;
        transition: 0.3s;
    }

    .btn-detail:hover {
        background: #ec4899;
    }
</style>

<div class="page-wrapper">

    <div class="card">

        <div class="card-header">
            📦 Data Pengembalian
        </div>

        <div class="card-body p-0">

            <table class="table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user->name ?? '-' }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                        <td>Rp {{ number_format($item->denda, 0, ',', '.') }}</td>
                        <td>{{ $item->kondisi }}</td>
                        <td>
                            <a href="#" class="btn-detail">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada data pengembalian
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>