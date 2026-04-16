<style>
    :root {
        --bg: #0f1117;
        --surface: #1a1d27;
        --surface2: #222636;
        --border: #2e3248;
        --accent: #4f6ef7;
        --accent-soft: rgba(79, 110, 247, 0.12);
        --green: #22c55e;
        --green-soft: rgba(34, 197, 94, 0.12);
        --red: #ef4444;
        --red-soft: rgba(239, 68, 68, 0.12);
        --yellow: #f59e0b;
        --yellow-soft: rgba(245, 158, 11, 0.12);
        --text: #e2e8f0;
        --text-muted: #64748b;
        --text-dim: #94a3b8;
        --radius: 12px;
        --radius-sm: 8px;
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
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
    }

    thead { background: var(--surface2); border-bottom: 1px solid var(--border); }

    thead th {
        padding: 14px 20px;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--text-muted);
    }

    tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s ease;
    }

    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: rgba(255,255,255,0.02); }

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
        padding: 7px 14px;
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
        border-color: rgba(34, 197, 94, 0.25);
    }

    button[type="submit"]:first-of-type:hover {
        background: rgba(34, 197, 94, 0.2);
        border-color: rgba(34, 197, 94, 0.4);
    }

    button[type="submit"]:last-of-type {
        background: var(--red-soft);
        color: var(--red);
        border-color: rgba(239, 68, 68, 0.25);
    }

    button[type="submit"]:last-of-type:hover {
        background: rgba(239, 68, 68, 0.2);
        border-color: rgba(239, 68, 68, 0.4);
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
            @if($item->status == 'pending')
                <form action="{{ route('petugas.setujui', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Setujui</button>  <form action="{{ route('petugas.tolak', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit">Tolak</button>
        </form>
                </form>
                 
            @else
                {{ $item->status }}
            @endif
        </td>
    </tr>
    @endforeach
</table>