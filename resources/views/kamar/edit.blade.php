<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kamar</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 11px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .btn {
            margin-top: 20px;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            background: #2563eb;
        }

        .back {
            background: #6b7280;
            text-decoration: none;
            display: inline-block;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Kamar</h1>

    <form action="{{ route('kamars.update', $kamar) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Asrama</label>

        <select name="asrama_id">
            @foreach($asramas as $asrama)
                <option value="{{ $asrama->id }}"
                    {{ $kamar->asrama_id == $asrama->id ? 'selected' : '' }}>
                    {{ $asrama->nama_asrama }}
                </option>
            @endforeach
        </select>

        @error('asrama_id')
            <div class="error">{{ $message }}</div>
        @enderror


        <label>Nomor Kamar</label>

        <input type="text"
               name="nomor_kamar"
               value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}">

        @error('nomor_kamar')
            <div class="error">{{ $message }}</div>
        @enderror


        <label>Lantai</label>

        <input type="number"
               name="lantai"
               value="{{ old('lantai', $kamar->lantai) }}">

        @error('lantai')
            <div class="error">{{ $message }}</div>
        @enderror


        <label>Kapasitas</label>

        <input type="number"
               name="kapasitas"
               value="{{ old('kapasitas', $kamar->kapasitas) }}">

        @error('kapasitas')
            <div class="error">{{ $message }}</div>
        @enderror


        <label>Status</label>

        <select name="status">
            <option value="tersedia"
                {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>

            <option value="penuh"
                {{ $kamar->status == 'penuh' ? 'selected' : '' }}>
                Penuh
            </option>
        </select>

        @error('status')
            <div class="error">{{ $message }}</div>
        @enderror


        <a href="{{ route('kamars.index') }}"
           class="btn back">
            Batal
        </a>

        <button type="submit" class="btn">
            Simpan Perubahan
        </button>

    </form>

</div>

</body>
</html>