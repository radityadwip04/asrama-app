<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kamar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
        }

        h1 { margin-top: 0; }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            color: white;
            background: #2563eb;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-back {
            background: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-top: 20px;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">

    <a href="{{ url('/') }}" class="btn btn-back">← Dashboard</a>

    <h1>Data Kamar</h1>

    <a href="{{ route('kamars.create') }}" class="btn">
        + Tambah Kamar
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Asrama</th>
                <th>Nomor Kamar</th>
                <th>Lantai</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($kamars as $kamar)
                <tr>
                    <td>{{ $kamar->id }}</td>
                    <td>{{ $kamar->asrama->nama_asrama ?? '-' }}</td>
                    <td>{{ $kamar->nomor_kamar }}</td>
                    <td>{{ $kamar->lantai }}</td>
                    <td>{{ $kamar->kapasitas }} orang</td>
                    <td>{{ $kamar->status }}</td>

                    <td>
                        <a href="{{ route('kamars.edit', $kamar) }}"
                           class="btn btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('kamars.destroy', $kamar) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-delete">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data kamar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>