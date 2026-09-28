<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Absensi</title>
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
<h1>Edit Absensi</h1>

<form action="{{ route('absensis.update',$absensi) }}" method="POST">
@csrf
@method('PUT')

<label>Santri</label>
<select name="santri_id">
@foreach($santris as $santri)
<option value="{{ $santri->id }}"
{{ $absensi->santri_id==$santri->id?'selected':'' }}>
{{ $santri->nama }} - {{ $santri->nis }}
</option>
@endforeach
</select>

<label>Tanggal</label>
<input type="date" name="tanggal"
value="{{ old('tanggal',$absensi->tanggal) }}">

<label>Status</label>
<select name="status">
<option value="hadir" {{ $absensi->status=='hadir'?'selected':'' }}>Hadir</option>
<option value="izin" {{ $absensi->status=='izin'?'selected':'' }}>Izin</option>
<option value="sakit" {{ $absensi->status=='sakit'?'selected':'' }}>Sakit</option>
<option value="alpa" {{ $absensi->status=='alpa'?'selected':'' }}>Alpa</option>
</select>

<label>Keterangan</label>
<textarea name="keterangan">{{ old('keterangan',$absensi->keterangan) }}</textarea>

<a href="{{ route('absensis.index') }}" class="btn back">Batal</a>
<button class="btn">Simpan Perubahan</button>

</form>
</div>

</body>
</html>