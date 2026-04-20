<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap');

* { font-family: 'Nunito', sans-serif; }

.custom-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow:
        0 4px 6px rgba(186, 161, 255, 0.08),
        0 12px 28px rgba(186, 161, 255, 0.13);
    overflow: hidden;
    border: 1px solid #ede8ff;
}
.custom-header {
    background: linear-gradient(120deg, #d8b4fe 0%, #f9a8d4 55%, #fbcfe8 100%);
    color: #fff;
    padding: 18px 22px;
    font-size: 17px;
    font-weight: 700;
    letter-spacing: 0.3px;
}
.custom-table {
    width: 100%;
    border-collapse: collapse;
}
.custom-table thead {
    background: #f7f2ff;
}
.custom-table th {
    padding: 13px 14px;
    font-size: 12px;
    color: #9c85bc;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    text-align: center;
    border-bottom: 1px solid #ede8ff;
}
.custom-table td {
    padding: 13px 14px;
    border-top: 1px solid #f5eeff;
    color: #5b4e6b;
    font-size: 13.5px;
    text-align: center;
    vertical-align: middle;
}
.custom-table tbody tr:hover td {
    background: #fdf4ff;
    transition: background 0.18s ease;
}
.badge {
    display: inline-flex !important;
    align-items: center !important;
    gap: 5px !important;
    padding: 5px 13px !important;
    border-radius: 20px !important;
    font-size: 12px !important;
    font-weight: 700 !important;
}
.badge::before {
    content: '';
    display: inline-block;
    width: 7px; height: 7px;
    border-radius: 50%;
}
.badge-pending {
    background: #fff8ed !important;
    color: #c2810a !important;
    border: 1px solid #fde9b2;
}
.badge-pending::before { background: #f59e0b; }

.badge-approve {
    background: #f3eeff !important;
    color: #7c3aed !important;
    border: 1px solid #ddd0fb;
}
.badge-approve::before { background: #a78bfa; }

.badge-reject {
    background: #fff0f6 !important;
    color: #db2777 !important;
    border: 1px solid #fbcfe8;
}
.badge-reject::before { background: #f472b6; }
</style>

<div class="container mx-auto px-6 py-6">

    @if(session('success'))
        <div style="background:#ecfdf5; color:#065f46; border:1px solid #a7f3d0; border-radius:12px; padding:10px 16px; font-size:13.5px; font-weight:600; margin-bottom:16px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="custom-card">

        <div class="custom-header">
            Data Peminjaman
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Kembali</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $index => $pinjam)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pinjam->alat->nama_alat ?? '-' }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_kembali }}</td>
                    <td>{{ $pinjam->jumlah }}</td>
                    <td>
                        @if($pinjam->status == 'pending')
                            <span class="badge badge-pending">Pending</span>
                        @elseif($pinjam->status == 'disetujui')
                            <span class="badge badge-approve">Disetujui</span>
                        @elseif($pinjam->status == 'ditolak')
                            <span class="badge badge-reject">Ditolak</span>
                        @else
                            <span class="badge">{{ $pinjam->status }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:32px 0; color:#c5b5d8; font-style:italic; font-size:14px;">
                        Belum ada data peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>