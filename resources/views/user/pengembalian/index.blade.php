<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap');

* { font-family: 'Nunito', sans-serif; }

.table-card {
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:
        0 4px 6px rgba(186, 161, 255, 0.08),
        0 12px 28px rgba(186, 161, 255, 0.13);
    background: #fff;
    border: 1px solid #ede8ff;
}
.table {
    width: 100% !important;
    margin: 0;
    border-collapse: collapse;
}
.table thead tr {
    background: linear-gradient(120deg, #d8b4fe 0%, #f9a8d4 55%, #fbcfe8 100%);
}
.table thead th {
    color: #fff;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.4px;
    padding: 16px 14px;
    text-align: center;
    border: none;
}
.table tbody td {
    text-align: center;
    padding: 13px 14px;
    font-size: 13.5px;
    color: #5b4e6b;
    border-bottom: 1px solid #f5eeff;
    vertical-align: middle;
}
.table tbody tr:last-child td { border-bottom: none; }
.table tbody tr:hover td {
    background: #fdf4ff;
    transition: background 0.18s ease;
}
.num-cell { font-weight: 700; color: #b197d4; font-size: 13px; }
.denda-cell { font-weight: 600; color: #9b72cf; }

.badge-dipinjam {
    display: inline-flex; align-items: center; gap: 5px;
    background: #fff8ed; color: #c2810a;
    padding: 5px 13px; border-radius: 20px;
    font-weight: 700; font-size: 12px;
    border: 1px solid #fde9b2;
}
.badge-dipinjam::before {
    content: ''; display: inline-block;
    width: 7px; height: 7px;
    border-radius: 50%; background: #f59e0b;
}
.badge-kembali {
    display: inline-flex; align-items: center; gap: 5px;
    background: #f3eeff; color: #7c3aed;
    padding: 5px 13px; border-radius: 20px;
    font-weight: 700; font-size: 12px;
    border: 1px solid #ddd0fb;
}
.badge-kembali::before {
    content: ''; display: inline-block;
    width: 7px; height: 7px;
    border-radius: 50%; background: #a78bfa;
}
.btn-kembali {
    background: linear-gradient(120deg, #bbf7d0, #6ee7b7);
    color: #065f46; border: none; border-radius: 12px;
    font-weight: 700; font-size: 12px; padding: 6px 16px;
    box-shadow: 0 2px 8px rgba(52, 211, 153, 0.2);
    transition: all 0.18s ease;
}
.btn-kembali:hover {
    background: linear-gradient(120deg, #a7f3d0, #34d399);
    box-shadow: 0 4px 14px rgba(52, 211, 153, 0.3);
    transform: translateY(-1px); color: #064e3b;
}
.selesai-text { color: #b8a8d0; font-size: 13px; font-weight: 600; font-style: italic; }
.empty-row td { color: #c5b5d8; font-style: italic; padding: 32px 0; font-size: 14px; }
.container, .container-fluid {
    max-width: 100% !important;
    width: 100% !important;
    padding-left: 24px;
    padding-right: 24px;
}
</style>

<div class="container-fluid px-4 py-4">
    <div class="card table-card mt-3">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Alat</th>
                    <th>Tgl Pinjam</th>
                    <th>Batas Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($peminjamans as $index => $pinjam)
            <tr>
                <td class="num-cell">{{ $index + 1 }}</td>
                <td>{{ $pinjam->alat->nama_alat ?? '-' }}</td>
                <td>{{ $pinjam->tanggal_pinjam }}</td>
                <td>{{ $pinjam->tanggal_kembali }}</td>
                <td class="denda-cell">
                    Rp {{ number_format($pinjam->pengembalian->denda ?? 0) }}
                </td>
                <td>
                    @if($pinjam->status == 'disetujui')
                        <span class="badge-dipinjam">Dipinjam</span>
                    @else
                        <span class="badge-kembali">Dikembalikan</span>
                    @endif
                </td>
                <td>
                    @if($pinjam->status == 'disetujui')
                    <form action="{{ route('user.pengembalian.kembalikan', $pinjam->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-kembali">
                            Kembalikan
                        </button>
                    </form>
                    @else
                        <span class="selesai-text">Selesai</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr class="empty-row">
                <td colspan="7">Tidak ada data</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>