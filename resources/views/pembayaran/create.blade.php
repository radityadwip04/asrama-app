<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pembayaran</title>
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
<h1>Tambah Pembayaran</h1>

<form action="{{ route('pembayarans.store') }}" method="POST">
@csrf

<label>Santri</label>
<select name="santri_id">
<option value="">-- Pilih Santri --</option>
@foreach($santris as $santri)
<option value="{{ $santri->id }}">{{ $santri->nama }} - {{ $santri->nis }}</option>
@endforeach
</select>

<label>Tanggal Pembayaran</label>
<input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran') }}">

<label>Jenis Pembayaran</label>
<input type="text" name="jenis_pembayaran" value="{{ old('jenis_pembayaran') }}" placeholder="Contoh: SPP">

<label>Jumlah</label>
<input type="number" name="jumlah" value="{{ old('jumlah') }}" min="0">

<label>Status</label>
<select name="status">
<option value="lunas">Lunas</option>
<option value="belum_lunas">Belum Lunas</option>
</select>

<label>Keterangan</label>
<textarea name="keterangan">{{ old('keterangan') }}</textarea>

<a href="{{ route('pembayarans.index') }}" class="btn back">Batal</a>
<button class="btn">Simpan</button>

</form>
</div>

</body>
</html>