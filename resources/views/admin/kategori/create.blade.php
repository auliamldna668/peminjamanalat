<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>

    <style>
        body {
            background: #faf5ff;
            font-family: Poppins, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border: 1px solid #f3e8ff;
        }

        h2 {
            text-align: center;
            color: #a855f7;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #7e22ce;
            font-weight: 500;
        }

        input, textarea {
            width: 100%;
            margin-top: 6px;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #e9d5ff;
            outline: none;
            transition: 0.2s;
        }

        input:focus, textarea:focus {
            border-color: #c084fc;
            box-shadow: 0 0 0 3px #f3e8ff;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            background: #c084fc;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #a855f7;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h2>Tambah Kategori</h2>

        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori">

            <br><br>

            <label>Deskripsi</label>
            <textarea name="deskripsi"></textarea>

            <br>

            <button type="submit">Simpan</button>
        </form>

    </div>

</div>

</body>
</html>