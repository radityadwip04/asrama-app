<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Santri</title>
<style>
body{font-family:Arial;background:#f4f6f8;padding:40px}
.container{max-width:650px;margin:auto;background:white;padding:30px;border-radius:15px}
label{display:block;margin-top:15px;margin-bottom:6px;font-weight:bold}
input,select,textarea{width:100%;padding:11px;box-sizing:border-box;border:1px solid #ccc;border-radius:8px}
textarea{height:90px}
.btn{margin-top:20px;padding:11px 18px;border:0;border-radius:8px;color:white;background:#2563eb;cursor:pointer}
.back{background:#6b7280;text-decoration:none;display:inline-block}
.error{color:#dc2626;font-size:14px;margin-top:5px}
</style>
</head>
<body>

<div class="container">
<h1>Tambah Santri</h1>

<form action="{{ route('santris.store') }}" method="POST">
@csrf

<label>Kamar</label>
<select name="kamar_id">
<option value="">-- Pilih Kamar --</option>
@foreach($kamars as $kamar)
<option value="{{ $kamar->id }}" {{ old('kamar_id')==$kamar->id?'selected':'' }}>
{{ $kamar->nomor_kamar }}
</option>
@endforeach
</select>
@error('kamar_id')<div class="error">{{ $message }}</div>@enderror

<label>NIS</label>
<input type="text" name="nis" value="{{ old('nis') }}">
@error('nis')<div class="error">{{ $message }}</div>@enderror

<label>Nama</label>
<input type="text" name="nama" value="{{ old('nama') }}">
@error('nama')<div class="error">{{ $message }}</div>@enderror

<label>Jenis Kelamin</label>
<select name="jenis_kelamin">
<option value="">-- Pilih --</option>
<option value="Laki-laki">Laki-laki</option>
<option value="Perempuan">Perempuan</option>
</select>

<label>Tanggal Lahir</label>
<input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">

<label>Alamat</label>
<textarea name="alamat">{{ old('alamat') }}</textarea>

<label>No HP</label>
<input type="text" name="no_hp" value="{{ old('no_hp') }}">

<label>Status</label>
<select name="status">
<option value="aktif">Aktif</option>
<option value="nonaktif">Nonaktif</option>
</select>

<a href="{{ route('santris.index') }}" class="btn back">Batal</a>
<button type="submit" class="btn">Simpan</button>

</form>
</div>

</body>
</html>