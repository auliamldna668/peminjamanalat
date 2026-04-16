@extends('layouts.admin')

@section('content')
<h1>Daftar User</h1>
<a href="{{ route('admin.user.create') }}">Tambah User</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <a href="{{ route('admin.user.edit', $user->id) }}">Edit</a> |
            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection