<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Santri</title>
    <style>
        body{font-family:Arial;background:#f4f6f8;padding:40px}
        .container{max-width:1200px;margin:auto;background:white;padding:30px;border-radius:15px}
        .btn{display:inline-block;padding:10px 15px;border:0;border-radius:8px;text-decoration:none;color:white;background:#2563eb;cursor:pointer}
        .edit{background:#f59e0b}.delete{background:#dc2626}.back{background:#6b7280}
        table{width:100%;border-collapse:collapse;margin-top:25px}
        th,td{padding:12px;border-bottom:1px solid #ddd;text-align:left}
        th{background:#f3f4f6}
        .success{background:#dcfce7;color:#166534;padding:12px;border-radius:8px;margin-top:20px}
        form{display:inline}
    </style>
</head>
<body>

<div class="container">

<a href="{{ url('/') }}" class="btn back">← Dashboard</a>

<h1>Data Santri</h1>

<a href="{{ route('santris.create') }}" class="btn">+ Tambah Santri</a>

@if(session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

<table>
<thead>
<tr>
    <th>ID</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Kamar</th>
    <th>No HP</th>
    <th>Status</th>
    @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
</tr>
</thead>

<tbody>
@forelse($santris as $santri)
<tr>
    <td>{{ $santri->id }}</td>
    <td>{{ $santri->nis }}</td>
    <td>{{ $santri->nama }}</td>
    <td>{{ $santri->jenis_kelamin }}</td>
    <td>{{ $santri->kamar->nomor_kamar ?? '-' }}</td>
    <td>{{ $santri->no_hp }}</td>
    <td>{{ $santri->status }}</td>
    @if(auth()->user()->role === 'admin')
<td>
        <a href="{{ route('santris.edit',$santri) }}" class="btn edit">Edit</a>

        <form action="{{ route('santris.destroy',$santri) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus santri ini?')">
            @csrf
            @method('DELETE')
            <button class="btn delete">Hapus</button>
        </form>
    </td>
@endif
</tr>
@empty
<tr>
    <td colspan="{{ auth()->user()->role === 'admin' ? 8 : 7 }}">Belum ada data santri.</td>
</tr>
@endforelse
</tbody>
</table>

</div>
</body>
</html>