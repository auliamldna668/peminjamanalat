

<style>
    body {
        background: #faf5ff;
    }

    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        padding: 24px;
        border: 1px solid #f3e8ff;
    }

    label {
        color: #7e22ce;
        font-weight: 500;
        font-size: 14px;
    }

    input, select {
        width: 100%;
        border: 1px solid #e9d5ff;
        border-radius: 10px;
        padding: 10px 12px;
        outline: none;
        transition: 0.2s;
    }

    input:focus, select:focus {
        border-color: #c084fc;
        box-shadow: 0 0 0 3px #f3e8ff;
    }

    .btn-primary {
        background: #c084fc;
        color: white;
        padding: 10px 16px;
        border-radius: 10px;
    }

    .btn-secondary {
        background: #f3e8ff;
        color: #6b21a8;
        padding: 10px 16px;
        border-radius: 10px;
    }

    .error {
        color: #e11d48;
        font-size: 13px;
        margin-bottom: 4px;
    }
</style>

<div class="flex justify-center py-8 px-4">

    <div class="w-full max-w-md">

        <div class="card">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif

            <form action="{{ route('admin.alat.store') }}" method="POST">
                @csrf

                <!-- Nama Alat -->
                <div class="mb-4">
                    <label>Nama Alat</label>
                    <input type="text" name="nama_alat">
                </div>

                <!-- Kode Alat -->
                <div class="mb-4">
                    <label>Kode Alat</label>
                    <input type="text" name="kode_alat">
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label>Kategori</label>
                    <select name="kategori_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Stok -->
                <div class="mb-6">
                    <label>Stok</label>
                    <input type="number" name="stok">
                </div>

                <!-- Button -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.alat.index') }}"
                       class="btn-secondary">
                       Kembali
                    </a>

                    <button type="submit" class="btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

