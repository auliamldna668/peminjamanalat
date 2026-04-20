<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    :root {
        --bg: #fdf6ff;
        --surface: #ffffff;
        --surface2: #faf4ff;
        --border: #ede9f6;
        --accent-soft: rgba(167, 139, 250, 0.08);
        --green: #6dbb8a;
        --green-soft: rgba(109, 187, 138, 0.15);
        --red: #e8837a;
        --red-soft: rgba(232, 131, 122, 0.15);
        --text: #3d3554;
        --text-muted: #b0a8c8;
        --text-dim: #6e6589;
        --radius: 16px;
        --radius-sm: 8px;
        --shadow: 0 4px 24px rgba(167, 139, 250, 0.10), 0 1px 4px rgba(0,0,0,0.04);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
        padding: 40px 24px;
    }

    h1 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 24px;
        letter-spacing: -0.3px;
        color: var(--text);
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    thead { background: var(--surface2); border-bottom: 1px solid var(--border); }

    thead th {
        padding: 14px 20px;
        text-align: left;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.9px;
        color: var(--text-muted);
    }

    tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s ease;
    }

    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--accent-soft); }

    tbody td {
        padding: 16px 20px;
        font-size: 14px;
        color: var(--text-dim);
        vertical-align: middle;
    }

    form { display: inline; }

    button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: 1px solid transparent;
        transition: all 0.15s ease;
        margin-right: 6px;
    }

    button[type="submit"]:first-of-type {
        background: var(--green-soft);
        color: var(--green);
        border-color: rgba(109, 187, 138, 0.3);
    }

    button[type="submit"]:first-of-type:hover {
        background: rgba(109, 187, 138, 0.25);
        border-color: rgba(109, 187, 138, 0.5);
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(109, 187, 138, 0.2);
    }

    button[type="submit"]:last-of-type {
        background: var(--red-soft);
        color: var(--red);
        border-color: rgba(232, 131, 122, 0.3);
    }

    button[type="submit"]:last-of-type:hover {
        background: rgba(232, 131, 122, 0.25);
        border-color: rgba(232, 131, 122, 0.5);
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(232, 131, 122, 0.2);
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Plus Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<h1>Data Peminjaman</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Alat</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->user->name ?? '-' }}</td>
        <td>{{ $item->alat->nama_alat ?? '-' }}</td>
        <td>{{ $item->status }}</td>
        <td>
    @if($item->status == 'menunggu')

        <form action="{{ route('petugas.setujui', $item->id) }}" method="POST" style="display:inline;">
            @csrf
             @method('PUT')
            <button type="submit">Setujui</button>
        </form>

        <form action="{{ route('petugas.tolak', $item->id) }}" method="POST" style="display:inline;">
            @csrf
             @method('PUT')  
            <button type="submit">Tolak</button>
        </form>

    @else
        {{ $item->status }}
    @endif
</td>
                 
            </td>
    </tr>
    @endforeach
</table>