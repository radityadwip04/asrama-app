<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Asrama</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 35px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        h1 {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-back {
            background: #374151;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="box">

        <h1>➕ Tambah Asrama</h1>

        <p class="subtitle">
            Masukkan informasi asrama baru.
        </p>

        <form action="{{ route('asramas.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label>Nama Asrama</label>

                <input
                    type="text"
                    name="nama_asrama"
                    value="{{ old('nama_asrama') }}"
                    placeholder="Contoh: Asrama Putra 1"
                    required>

                @error('nama_asrama')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Gedung</label>

                <input
                    type="text"
                    name="gedung"
                    value="{{ old('gedung') }}"
                    placeholder="Contoh: Gedung A"
                    required>

                @error('gedung')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>Alamat</label>

                <textarea
                    name="alamat"
                    placeholder="Masukkan alamat asrama"
                    required>{{ old('alamat') }}</textarea>

                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="buttons">

                <a
                    href="{{ route('asramas.index') }}"
                    class="btn btn-back">
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    💾 Simpan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>