<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Asrama</title>

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
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin-bottom: 7px;
        }

        .subtitle {
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
        }

        .btn-back {
            background: #374151;
            color: white;
        }

        .alert {
            padding: 14px;
            background: #dcfce7;
            color: #166534;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-box {
            background: white;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #6b7280;
            text-align: left;
            padding: 16px;
            font-size: 13px;
        }

        td {
            padding: 16px;
            border-top: 1px solid #eee;
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">
        <div>
            <h1>🏢 Data Asrama</h1>
            <p class="subtitle">Kelola data asrama pondok</p>
        </div>

        <div>
            <a href="/" class="btn btn-back">← Dashboard</a>
            <a href="{{ route('asramas.create') }}" class="btn btn-primary">
                + Tambah Asrama
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="table-box">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Asrama</th>
                    <th>Gedung</th>
                    <th>Alamat</th>
                    <th>Jumlah Kamar</th>
                    @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
                </tr>
            </thead>

            <tbody>

                @forelse($asramas as $asrama)

                    <tr>

                        <td>#{{ $asrama->id }}</td>

                        <td>
                            <strong>{{ $asrama->nama_asrama }}</strong>
                        </td>

                        <td>{{ $asrama->gedung }}</td>

                        <td>{{ $asrama->alamat }}</td>

                        <td>{{ $asrama->kamars->count() }} kamar</td>

                        @if(auth()->user()->role === 'admin')
<td>
                            <div class="actions">

                                <a
                                    href="{{ route('asramas.edit', $asrama) }}"
                                    class="btn btn-edit">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('asramas.destroy', $asrama) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus asrama ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-delete">
                                        Hapus
                                    </button>

                                </form>

                            </div>
                        </td>
@endif

                    </tr>

                @empty

                    <tr>
                        <td colspan="{{ auth()->user()->role === 'admin' ? 6 : 5 }}" style="text-align:center;">
                            Belum ada data asrama.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>