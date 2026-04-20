<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Lengkap</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; color: #333; }
        h2 { text-align: center; margin-bottom: 4px; font-size: 18px; }
        h3 { background-color: #343a40; color: white; padding: 8px 12px; margin-top: 30px; margin-bottom: 0; font-size: 13px; }
        .subtitle { text-align: center; margin: 4px 0 20px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 0; }
        thead th { background-color: #495057; color: white; padding: 8px 10px; text-align: left; font-size: 12px; }
        tbody td { padding: 7px 10px; border-bottom: 1px solid #ddd; vertical-align: middle; }
        tbody tr:nth-child(even) { background-color: #f2f2f2; }
        tbody tr:hover { background-color: #e9ecef; }
        .text-center { text-align: center; }
        .footer { margin-top: 30px; text-align: right; font-size: 11px; color: #555; border-top: 1px solid #ddd; padding-top: 8px; }
    </style>
</head>
<body>

    <h2>Laporan Peminjaman & Pengembalian Alat</h2>
    <p class="subtitle">Tanggal: {{ now()->format('d-m-Y H:i') }}</p>

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
                <td colspan="6" class="text-center">Tidak ada data peminjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">Dicetak oleh: {{ auth()->user()->name }}</div>

</body>
</html>