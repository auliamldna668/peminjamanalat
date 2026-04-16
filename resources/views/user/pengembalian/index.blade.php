<style>
    .table-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        background: #fff;
    }

    .table thead {
        background: linear-gradient(135deg, #6c63ff, #8e87ff);
        color: white;
    }

    .table thead th {
        font-weight: 600;
        font-size: 14px;
        padding: 14px;
        text-align: center;
    }

    .table tbody td {
        vertical-align: middle;
        text-align: center;
        font-size: 14px;
        padding: 12px;
    }

    .badge-dipinjam {
        background: #ffc107;
        color: #000;
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 12px;
    }

    .badge-kembali {
        background: #28a745;
        color: white;
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 12px;
    }

    .btn-kembali {
        border-radius: 10px;
        padding: 6px 14px;
        font-size: 13px;
        transition: 0.2s;
    }

    .btn-kembali:hover {
        transform: scale(1.05);
    }

    .empty-state {
        padding: 40px;
        text-align: center;
        color: #999;
    }
</style>

<div class="card table-card mt-3">

    <div class="table-responsive">
        <table class="table mb-0">

            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Peminjaman ID</th>
                    <th>Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($peminjamans as $pinjam)
                <tr>
                  <td>User #{{ $pinjam->user_id }}</td>
                  <td>Pinjam #{{ $pinjam->id }}</td>

                    <td>
                        <strong>{{ $pinjam->alat->nama_alat ?? '-'  }}</strong>
                    </td>

                    <td>
                        {{ $pinjam->tanggal_pinjam ?? $pinjam->created_at->format('d M Y') }}
                    </td>

                    <td>
                        {{ $pinjam->pengembalian->tanggal_kembali ?? '-' }}
                    </td>

                    <td>
                        Rp {{ number_format($pinjam->pengembalian->denda ?? 0) }}
                    </td>

                    <td>
                     @if(strtolower(trim($pinjam->status)) == 'dipinjam')
                            <span class="badge-dipinjam">dipinjam</span>
                        @else
                            <span class="badge-kembali">Dikembalikan</span>
                        @endif
                    </td>

                    <td>
                        @if($pinjam->status == 'dipinjam')
                        <form action="{{ route('user.pengembalian.kembalikan', $pinjam->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm btn-kembali">
                                ✔ Kembalikan
                            </button>
                        </form>
                        @else
                            <span class="text-muted">Selesai</span>
                        @endif
                    </td>

                </tr>

                @empty
                <tr>
                   <td colspan="8" class="empty-state">
                        📭 Tidak ada alat yang sedang dipinjam
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>