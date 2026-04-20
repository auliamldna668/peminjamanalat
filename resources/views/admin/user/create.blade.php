@extends('layouts.admin')

@section('content')

<style>
    body {
        background: #f6f7fb;
    }

    .form-container {
        max-width: 500px;
        margin: 40px auto;
    }

    .card-custom {
        border: none;
        border-radius: 20px;
        background: #ffffff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #a18cd1, #fbc2eb);
        color: white;
        font-weight: bold;
        font-size: 18px;
        padding: 20px;
        text-align: center;
    }

    .card-body {
        padding: 25px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #555;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 10px 12px;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #a18cd1;
        box-shadow: 0 0 0 3px rgba(161,140,209,0.2);
    }

    .btn-custom {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 10px;
        font-weight: bold;
        background: linear-gradient(135deg, #a18cd1, #fbc2eb);
        color: white;
        transition: 0.3s;
    }

    .btn-custom:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

</style>

<div class="form-container">
    <div class="card-custom">
        
        <div class="card-header">
            ✨ Tambah User
        </div>

        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>

                <label>Email</label>
                <input type="email" name="email" class="form-control" required>

                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="user">User</option>
                </select>

                <button type="submit" class="btn-custom mt-2">
                    Simpan
                </button>
            </form>
        </div>

    </div>
</div>

@endsection