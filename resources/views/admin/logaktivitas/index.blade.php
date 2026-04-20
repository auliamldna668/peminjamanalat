

<style>
    .card-log {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: linear-gradient(135deg, #c2a0cfad, #80486aad);
        color: black;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    tbody tr:hover {
        background: #f3f3ff;
    }
</style>

<div class="card-log mt-4">

    <table border="1">
        <thead>
         
    <tr>
        <th>Nama</th>
        <th>Role</th>
        <th>Aktivitas</th>
        <th>Waktu</th>
    </tr>

    @foreach($data as $log)
    <tr>
        <!-- ✅ NAMA -->
        <td>{{ $log->user }}</td>

        <!-- ✅ ROLE (sementara kosong / default) -->
       <td>{{ optional($log->user)->role ?? '-' }}</td>

        <!-- ✅ AKTIVITAS -->
        <td>{{ $log->aktivitas }}</td>

        <!-- ✅ WAKTU -->
        <td>{{ $log->created_at->format('d M Y H:i') }}</td>
    </tr>
    @endforeach
</table>
        </tbody>
    </table>

</div>

