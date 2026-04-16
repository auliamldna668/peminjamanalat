
<table border="1">
    <tr>
        <th>id</th>
        <th>User</th>
        <th>Alat</th>
        <th>Tanggal Kembali</th>
        <th>Denda</th>
        <th>Status</th>
        <th>Kondisi Barang</th>
    </tr>

    @foreach($data as $item)
    <tr>
      
    <td>{{$item->peminjaman->id}}</td>
        <td>{{ $item->peminjaman->user->name ?? '-' }}</td>
        <td>{{ $item->peminjaman->alat->nama_alat ?? '-' }}</td>
        <td>{{ $item->tanggal_kembali }}</td>
        <td>Rp {{ number_format($item->denda) }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->kondisi_barang ?? '-' }}</td>
    </tr>
    @endforeach
</table>