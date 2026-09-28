<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pembayaran</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:40px}
.container{max-width:650px;margin:auto;background:white;padding:30px;border-radius:15px}
label{display:block;margin-top:15px;margin-bottom:6px;font-weight:bold}
input,select,textarea{width:100%;padding:11px;box-sizing:border-box;border:1px solid #ccc;border-radius:8px}
textarea{height:90px}
.btn{margin-top:20px;padding:11px 18px;border:0;border-radius:8px;color:white;background:#2563eb;cursor:pointer}
.back{background:#6b7280;text-decoration:none;display:inline-block}
</style>
</head>
<body>

<div class="container">
<h1>Edit Pembayaran</h1>

<form action="{{ route('pembayarans.update',$pembayaran) }}" method="POST">
@csrf
@method('PUT')

<label>Santri</label>
<select name="santri_id">
@foreach($santris as $santri)
<option value="{{ $santri->id }}" {{ $pembayaran->santri_id==$santri->id?'selected':'' }}>
{{ $santri->nama }} - {{ $santri->nis }}
</option>
@endforeach
</select>

<label>Tanggal Pembayaran</label>
<input type="date" name="tanggal_pembayaran"
value="{{ old('tanggal_pembayaran',$pembayaran->tanggal_pembayaran) }}">

<label>Jenis Pembayaran</label>
<input type="text" name="jenis_pembayaran"
value="{{ old('jenis_pembayaran',$pembayaran->jenis_pembayaran) }}">

<label>Jumlah</label>
<input type="number" name="jumlah"
value="{{ old('jumlah',$pembayaran->jumlah) }}">

<label>Status</label>
<select name="status">
<option value="lunas" {{ $pembayaran->status=='lunas'?'selected':'' }}>Lunas</option>
<option value="belum_lunas" {{ $pembayaran->status=='belum_lunas'?'selected':'' }}>Belum Lunas</option>
</select>

<label>Keterangan</label>
<textarea name="keterangan">{{ old('keterangan',$pembayaran->keterangan) }}</textarea>

<a href="{{ route('pembayarans.index') }}" class="btn back">Batal</a>
<button class="btn">Simpan Perubahan</button>

</form>
</div>

</body>
</html>