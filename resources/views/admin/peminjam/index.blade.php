<style>
    body {
        font-family: Arial, sans-serif;
        background: #fdfdfd;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    h1 {
        text-align: center;
        color: #6b7280;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background: #f3e8ff;
        color: #4b5563;
        padding: 12px;
        text-align: left;
        font-weight: bold;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        color: #374151;
    }

    tr:nth-child(even) {
        background: #f9fafb;
    }

    tr:hover {
        background: #f3f4f6;
        transition: 0.2s;
    }

    .btn-back {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 15px;
        background: #e5e7eb;
        color: #374151;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-back:hover {
        background: #d1d5db;
    }
</style>

<div class="container">
    <h1>Data Peminjaman</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
        </tr>

        @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
           <td>{{ $item->user->name }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </table>

    <a href="{{ url()->previous() }}" class="btn-back">← Kembali</a>
</div>