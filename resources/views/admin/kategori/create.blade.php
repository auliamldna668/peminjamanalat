<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body style="background:#fef6f9; font-family:Poppins;">

    <h2>Tambah Kategori</h2>

    <form action="{{ route('admin.kategori.store') }}" method="POST">
        @csrf

        <label>Nama Kategori</label><br>
        <input type="text" name="nama_kategori"><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>