<h1>Tambah Peminjaman</h1>

<form action="{{ route('peminjaman.store') }}" method="POST">
    @csrf

    <input type="text" name="nama_peminjam" placeholder="Nama Peminjam"><br>
    <input type="text" name="nama_alat" placeholder="Nama Alat"><br>
    <input type="number" name="jumlah" placeholder="Jumlah"><br>
    <input type="date" name="tanggal_pinjam"><br>

    <button type="submit">Simpan</button>
</form>