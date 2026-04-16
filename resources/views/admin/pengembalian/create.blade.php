<form action="{{ route('pengembalian.store') }}" method="POST">
@csrf

<input type="text" name="peminjaman_id" placeholder="ID Peminjaman">
<input type="date" name="tanggal_kembali">
<input type="text" name="kondisi_barang" placeholder="Kondisi">
<textarea name="catatan"></textarea>

<button type="submit">Simpan</button>
</form>