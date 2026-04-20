
<style>
    .page-wrapper { padding: 24px; font-family: Arial, sans-serif; }

    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
    .page-header h1 { font-size: 20px; margin: 0; color: #5a5a8a; }

    .btn-tambah {
        background-color: #b5c8f0;
        color: #2c3e7a;
        padding: 7px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: bold;
        border: none;
    }
    .btn-tambah:hover { background-color: #9ab3e8; }

    .alert-success {
        background-color: #d4f1e4;
        color: #2d7a57;
        border: 1px solid #a8dfc5;
        border-radius: 8px;
        padding: 10px 14px;
        margin-bottom: 16px;
        font-size: 13px;
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    table { width: 100%; border-collapse: collapse; font-size: 13px; }

    thead tr { background-color: #c5b8f0; color: #3b2f7a; }
    thead th { padding: 11px 14px; text-align: left; font-weight: bold; }

    tbody tr:nth-child(odd)  { background-color: #f3f0ff; }
    tbody tr:nth-child(even) { background-color: #ebe6ff; }
    tbody tr:hover { background-color: #d9d1ff; }

    tbody td { padding: 9px 14px; color: #444; border-bottom: 1px solid #ddd8f8; }

    .badge {
        background-color: #fde8c8;
        color: #8a5a1a;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .btn-edit {
        background-color: #fce4a6;
        color: #7a5a00;
        padding: 5px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }
    .btn-edit:hover { background-color: #f8d57a; }

    .btn-hapus {
        background-color: #f5b8c0;
        color: #7a2030;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }
    .btn-hapus:hover { background-color: #f09aa6; }
</style>

<div class="page-wrapper">

    <div class="page-header">
        <h1>Daftar User</h1>
        <a href="{{ route('admin.user.create') }}" class="btn-tambah">+ Tambah User</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge">{{ $user->role }}</span></td>
                    <td style="text-align:center;">
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
