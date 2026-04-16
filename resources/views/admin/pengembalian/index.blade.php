    <a href="{{ route('admin.pengembalian.create') }}">Tambah</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $item)
        <tr>
            
            <td>{{ $item->id }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>{{ $item->kondisi_barang }}</td>
            <td>
                <a href="{{ route('admin.pengembalian.edit', $item->id) }}">Edit</a>
<form action="{{ route('admin.pengembalian.destroy', $item->id) }}"...>
                    @csrf
                    @method('DELETE')
                    <button>Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>