<table border="1" width="100%">
    <tr>
        <th>Nama</th>
        <th>Role</th>
        <th>Aktivitas</th>
        <th>Waktu</th>
    </tr>

    @foreach($data as $log)
    <tr>
        <td>{{ $log->user->name ?? '-' }}</td>
        <td>{{ $log->user->role ?? '-' }}</td>
        <td>{{ $log->aktivitas }}</td>
        <td>{{ $log->created_at }}</td>
    </tr>
    @endforeach
</table>