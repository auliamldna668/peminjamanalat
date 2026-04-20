

<style>
    body {
        background: #faf5ff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    thead {
        background: #e9d5ff;
        color: #6b21a8;
    }

    th, td {
        padding: 14px;
        text-align: center;
        border-bottom: 1px solid #fbcfe8;
    }

    tr:hover {
        background: #fdf2f8;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }
</style>

<div class="w-full px-6 py-6">

    <h1 class="text-2xl font-bold mb-6 text-purple-700">
        Daftar Alat
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.alat.create') }}">
        + Tambah Alat
    </a>

    <!-- FULL WIDTH TABLE WRAPPER -->
    <div class="table-wrapper mt-4 w-full">

        <table class="w-full">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($alats as $index => $alat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $alat->nama_alat }}</td>
                        <td>{{ $alat->kategori->nama ?? 'alat olahraga' }}</td>
                        <td>{{ $alat->stok }}</td>
                        <td class="space-x-2">

                            <a href="{{ route('admin.alat.edit', $alat->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('admin.alat.destroy', $alat->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus alat ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data alat</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

