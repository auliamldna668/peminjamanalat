<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Kategori</title>
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #fef6f9; margin: 0; padding: 20px; }
    .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
    h2 { text-align: center; color: #6d6875; }
    .btn { background-color: #ffc8dd; border: none; padding: 10px 15px; border-radius: 10px; cursor: pointer; color: #6d6875; font-weight: bold; margin-bottom: 15px; text-decoration: none; display: inline-block; }
    .btn:hover { background-color: #ffafcc; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 12px; text-align: center; }
    th { background-color: #bde0fe; color: #333; }
    tr:nth-child(even) { background-color: #f1f7ff; }
    tr:hover { background-color: #e0f2fe; }
    .aksi form { display: inline; }
    .edit { background-color: #caffbf; padding: 6px 10px; border-radius: 8px; text-decoration: none; color: #333; }
    .hapus { background-color: #ffadad; padding: 6px 10px; border-radius: 8px; text-decoration: none; color: #333; }
  </style>
</head>
<body>

<div class="container">
  <h2>Data Kategori</h2>

  @if(session('success'))
      <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
  @endif

  <a href="{{ route('admin.kategori.create') }}" class="btn">Tambah Kategori</a>

  <table>
    <thead>
      <tr>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kategoris as $kategori)
      <tr>
        <td>{{ $kategori->id }}</td>
        <td>{{ $kategori->nama_kategori }}</td>
        <td>{{ $kategori->deskripsi ?? '-' }}</td>
        <td class="aksi">
          <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="edit">Edit</a>

          <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="hapus">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<a href="{{ route('admin.dashboard') }}" 
   class="inline-block mt-4 bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
   ← Kembali
</a>

</body>
</html>