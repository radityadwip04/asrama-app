<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembayaran</title>
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

<h1>Data Pembayaran</h1>

<a href="{{ route('pembayarans.create') }}" class="btn">+ Tambah Pembayaran</a>

@if(session('success'))
<div class="success">{{ session('success') }}</div>
@endif

<table>
<thead>
<tr>
<th>ID</th>
<th>Santri</th>
<th>Tanggal</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Status</th>
<th>Keterangan</th>
@if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
</tr>
</thead>

<tbody>
@forelse($pembayarans as $p)
<tr>
<td>{{ $p->id }}</td>
<td>{{ $p->santri->nama ?? '-' }}</td>
<td>{{ $p->tanggal_pembayaran }}</td>
<td>{{ $p->jenis_pembayaran }}</td>
<td>Rp {{ number_format($p->jumlah,0,',','.') }}</td>
<td>{{ $p->status }}</td>
<td>{{ $p->keterangan ?? '-' }}</td>
@if(auth()->user()->role === 'admin')
<td>
<a href="{{ route('pembayarans.edit',$p) }}" class="btn edit">Edit</a>

<form action="{{ route('pembayarans.destroy',$p) }}" method="POST"
onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
@csrf
@method('DELETE')
<button class="btn delete">Hapus</button>
</form>
</td>
@endif
</tr>
@empty
<tr><td colspan="{{ auth()->user()->role === 'admin' ? 8 : 7 }}">Belum ada pembayaran.</td></tr>
@endforelse
</tbody>
</table>

</div>
</body>
</html>