<x-app-layout>

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

        <div class="overflow-x-auto w-full mt-4">

            <table class="min-w-full w-full bg-black border border-black-200 rounded shadow">

                <thead class="bg-purple-100 text-purple-800 uppercase text-sm">
                    <tr>
                        <th class="py-4 px-4 border-b">No</th>
                        <th class="py-4 px-4 border-b">Nama Alat</th>
                        <th class="py-4 px-4 border-b">Kategori</th>
                        <th class="py-4 px-4 border-b">Stok</th>
                        <th class="py-4 px-4 border-b">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($alats as $index => $alat)
                        <tr class="hover:bg-purple-50">
                            <td class="py-9 px-9 border-b text-center">{{ $index + 1 }}</td>
                            <td class="py-9 px-9 border-b">{{ $alat->nama }}</td>
                            <td class="py-9 px-9 border-b">
                                {{ $alat->kategori->nama ?? 'alat olahraga' }}
                            </td>
                            <td class="py-2 px-4 border-b text-center">{{ $alat->stok }}</td>
                            <td class="py-2 px-4 border-b text-center space-x-2">
                                <a href="{{ route('admin.alat.edit', $alat->id) }}"
                                   class="bg-pink-300 text-black px-3 py-1 rounded">
                                   Edit
                                </a>

                                <form action="{{ route('admin.alat.destroy', $alat->id) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-purple-300 text-black px-3 py-1 rounded"
                                            onclick="return confirm('Yakin ingin menghapus alat ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                Tidak ada data alat
                            </td>
                            <div class="flex justify-between">
                    <a href="{{ route('admin.alat.index') }}"
                       class="bg-gray-200 text-black-700 px-4 py-2 rounded">
                       Kembali
                    </a>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</x-app-layout>