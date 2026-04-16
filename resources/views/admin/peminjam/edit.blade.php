<h1>Edit Peminjaman</h1>

<form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_peminjam" value="{{ $data->nama_peminjam }}"><br>
    <input type="text" name="nama_alat" value="{{ $data->nama_alat }}"><br>
    <input type="number" name="jumlah" value="{{ $data->jumlah }}"><br>

    <button type="submit">Update</button>
</form>