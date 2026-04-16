<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit Alat</h1>

        <form action="{{ route('admin.alat.update', $alat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Nama Alat</label>
                <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Kategori</label>
                <select name="kategori_id" class="w-full border rounded px-3 py-2">
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" 
                            {{ $alat->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Stok</label>
                <input type="number" name="stok" value="{{ $alat->stok }}" class="w-full border rounded px-3 py-2">
            </div>

              <div class="flex justify-between">
                    <a href="{{ route('admin.alat.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded">
                       Kembali
                    </a>

                    <button type="submit"
                        class="bg-purple-500 text-gray px-4 py-2 rounded">
                       update
                    </button>
        </form>
    </div>
</x-app-layout>