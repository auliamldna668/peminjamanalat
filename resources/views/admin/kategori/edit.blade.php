<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Kategori</title>
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #fef6f9; padding: 20px; }
    .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
    h2 { text-align: center; color: #6d6875; }
    label { display: block; margin-top: 10px; color: #6d6875; font-weight: bold; }
    input, textarea { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-top: 5px; }
    button { margin-top: 15px; background-color: #ffc8dd; border: none; padding: 10px 15px; border-radius: 10px; cursor: pointer; font-weight: bold; color: #6d6875; }
    button:hover { background-color: #ffafcc; }
    .back { display: inline-block; margin-top: 10px; color: #6d6875; text-decoration: none; }
    .back:hover { text-decoration: underline; }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Kategori</h2>

  @if ($errors->any())
      <div style="color: red; margin-bottom: 10px;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
      @csrf
      @method('PUT')

      <label>Nama Kategori</label>
      <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>

      <label>Deskripsi</label>
      <textarea name="deskripsi">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

      <button type="submit">Simpan Perubahan</button>
  </form>

  <a href="{{ route('admin.kategori.index') }}" class="back">← Kembali ke Daftar Kategori</a>
</div>

</body>
</html>