<x-app-layout>
    <div class="container mx-auto px-4 py-6 max-w-xl">

    

        <div class="bg-white shadow rounded p-6">

            <form action="{{ route('admin.alat.store') }}" method="POST">
                @csrf

                <!-- Nama Alat -->
                <div class="mb-4">
                    <label class="block mb-1 text-gray-600">Nama Alat</label>
                    <input type="text" name="nama_alat"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- Kode Alat -->
                <div class="mb-4">
                    <label class="block mb-1 text-gray-600">Kode Alat</label>
                    <input type="text" name="kode_alat"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label class="block mb-1 text-gray-600">Kategori</label>

                    <select name="kategori_id"
                        class="w-full border rounded px-3 py-2">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ $kategori->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Stok -->
                <div class="mb-6">
                    <label class="block mb-1 text-gray-600">Stok</label>
                    <input type="number" name="stok"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- Button -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.alat.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded">
                       Kembali
                    </a>

                    <button type="submit"
                        class="bg-purple-500 text-gray px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>