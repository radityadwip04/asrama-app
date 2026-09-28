<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Absensi</title>
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
<h1>Tambah Absensi</h1>

<form action="{{ route('absensis.store') }}" method="POST">
@csrf

<label>Santri</label>
<select name="santri_id">
<option value="">-- Pilih Santri --</option>
@foreach($santris as $santri)
<option value="{{ $santri->id }}">
{{ $santri->nama }} - {{ $santri->nis }}
</option>
@endforeach
</select>

<label>Tanggal</label>
<input type="date" name="tanggal" value="{{ old('tanggal') }}">

<label>Status</label>
<select name="status">
<option value="hadir">Hadir</option>
<option value="izin">Izin</option>
<option value="sakit">Sakit</option>
<option value="alpa">Alpa</option>
</select>

<label>Keterangan</label>
<textarea name="keterangan">{{ old('keterangan') }}</textarea>

<a href="{{ route('absensis.index') }}" class="btn back">Batal</a>
<button class="btn">Simpan</button>

</form>
</div>

</body>
</html>