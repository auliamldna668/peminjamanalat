<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
            <a href="{{ route('admin.user.index') }}">User</a> |
            <a href="{{ route('admin.alat.index') }}">Alat</a> |
            <a href="{{ route('admin.kategori.index') }}">Kategori</a> |
            <a href="{{ route('profile.edit') }}">Profile</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>