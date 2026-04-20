@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama</label>
    <input type="text" name="name" value="{{ $user->name }}" required><br>
    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email }}" required><br>
    <label>Password (kosongkan kalau tidak ganti)</label>
    <input type="password" name="password"><br>
    <label>Role</label>
    <select name="role" required>
        <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
        <option value="petugas" {{ $user->role=='petugas'?'selected':'' }}>Petugas</option>
        <option value="user" {{ $user->role=='user'?'selected':'' }}>User</option>
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection