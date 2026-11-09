<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Absensi</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:40px}
.container{max-width:1100px;margin:auto;background:white;padding:30px;border-radius:15px}
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

<h1>Data Absensi</h1>

<a href="{{ route('absensis.create') }}" class="btn">+ Tambah Absensi</a>

@if(session('success'))
<div class="success">{{ session('success') }}</div>
@endif

<table>
<thead>
<tr>
<th>ID</th>
<th>Santri</th>
<th>Tanggal</th>
<th>Status</th>
<th>Keterangan</th>
@if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
</tr>
</thead>

<tbody>
@forelse($absensis as $absensi)
<tr>
<td>{{ $absensi->id }}</td>
<td>{{ $absensi->santri->nama ?? '-' }}</td>
<td>{{ $absensi->tanggal }}</td>
<td>{{ $absensi->status }}</td>
<td>{{ $absensi->keterangan ?? '-' }}</td>
@if(auth()->user()->role === 'admin')
<td>

<a href="{{ route('absensis.edit',$absensi) }}" class="btn edit">
Edit
</a>

<form action="{{ route('absensis.destroy',$absensi) }}" method="POST"
onsubmit="return confirm('Yakin ingin menghapus absensi ini?')">
@csrf
@method('DELETE')
<button class="btn delete">Hapus</button>
</form>

</td>
@endif
</tr>
@empty
<tr>
<td colspan="{{ auth()->user()->role === 'admin' ? 6 : 5 }}">Belum ada data absensi.</td>
</tr>
@endforelse
</tbody>
</table>

</div>
</body>
</html>