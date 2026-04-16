<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Lengkap</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 0; }
        h3 { background-color: #343a40; color: white; padding: 8px; margin-top: 30px; }
        .subtitle { text-align: center; margin: 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #495057; color: white; padding: 8px; text-align: left; }
        td { padding: 7px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .footer { margin-top: 30px; text-align: right; font-size: 11px; color: #555; }
    </style>
</head>
<body>

    <h2>Laporan Peminjaman & Pengembalian Alat</h2>
    <p class="subtitle">Tanggal Cetak: {{ now()->format('d-m-Y H:i') }}</p>

    {{-- ====== TABEL PEMINJAMAN ====== --}}
    <h3>Data Peminjaman</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Nama Alat</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->alat->nama ?? '-' }}</td>
                <td>{{ $item->tanggal_pinjam ?? '-' }}</td>
                <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                <td>{{ $item->status ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center">Tidak ada data peminjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ====== TABEL PENGEMBALIAN ====== --}}
    <h3>Data Pengembalian</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Nama Alat</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengembalian as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>{{ $item->alat->nama ?? '-' }}</td>
                <td>{{ $item->tanggal_pinjam ?? '-' }}</td>
                <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                <td>{{ $item->status ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center">Tidak ada data pengembalian</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">Dicetak oleh: {{ auth()->user()->name }}</div>

</body>
</html>