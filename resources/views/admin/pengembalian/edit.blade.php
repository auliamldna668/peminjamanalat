<form action="{{ route('pengembalian.update', $data->id) }}" method="POST">
@csrf
@method('PUT')

<input type="date" name="tanggal_kembali" value="{{ $data->tanggal_kembali }}">
<input type="text" name="kondisi_barang" value="{{ $data->kondisi_barang }}">
<textarea name="catatan">{{ $data->catatan }}</textarea>

<button type="submit">Update</button>
</form>