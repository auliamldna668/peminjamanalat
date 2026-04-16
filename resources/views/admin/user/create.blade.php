@extends('layouts.admin')

@section('content')
<h1>Tambah User</h1>

<form action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" required><br>
    <label>Email</label>
    <input type="email" name="email" required><br>
    <label>Password</label>
    <input type="password" name="password" required><br>
    <label>Role</label>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="peminjem">Peminjem</option>
    </select><br>
    <button type="submit">Simpan</button>
</form>
@endsection