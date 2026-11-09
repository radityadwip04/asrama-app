<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Santri</title>
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
<h1>Edit Santri</h1>

<form action="{{ route('santris.update',$santri) }}" method="POST">
@csrf
@method('PUT')

<label>Kamar</label>
<select name="kamar_id">
@foreach($kamars as $kamar)
<option value="{{ $kamar->id }}" {{ $santri->kamar_id==$kamar->id?'selected':'' }}>
{{ $kamar->nomor_kamar }}
</option>
@endforeach
</select>

<label>NIS</label>
<input type="text" name="nis" value="{{ old('nis',$santri->nis) }}">

<label>Nama</label>
<input type="text" name="nama" value="{{ old('nama',$santri->nama) }}">

<label>Jenis Kelamin</label>
<select name="jenis_kelamin" required>
<option value="L" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
<option value="P" {{ old('jenis_kelamin', $santri->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
</select>

<label>Tanggal Lahir</label>
<input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir',$santri->tanggal_lahir) }}">

<label>Alamat</label>
<textarea name="alamat">{{ old('alamat',$santri->alamat) }}</textarea>

<label>No HP</label>
<input type="text" name="no_hp" value="{{ old('no_hp',$santri->no_hp) }}">

<label>Status</label>
<select name="status">
<option value="aktif" {{ $santri->status=='aktif'?'selected':'' }}>Aktif</option>
<option value="nonaktif" {{ $santri->status=='nonaktif'?'selected':'' }}>Nonaktif</option>
</select>

<a href="{{ route('santris.index') }}" class="btn back">Batal</a>
<button type="submit" class="btn">Simpan Perubahan</button>

</form>
</div>

</body>
</html>