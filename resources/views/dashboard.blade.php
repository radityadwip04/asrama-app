<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $dashboardRole === 'admin' ? 'Admin Dashboard' : 'User Dashboard' }} | AsramaApp</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f4f6f9;
            color: #1f2937;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #111827;
            color: white;
            padding: 25px 18px;
            z-index: 100;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            padding: 10px 15px 35px;
        }

        .logo span {
            color: #60a5fa;
        }

        .menu-title {
            font-size: 11px;
            color: #9ca3af;
            margin: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: block;
            padding: 13px 15px;
            margin: 5px 0;
            color: #d1d5db;
            text-decoration: none;
            border-radius: 9px;
            transition: .2s;
        }

        .menu:hover {
            background: #1f2937;
            color: white;
            transform: translateX(3px);
        }

        /* CONTENT */

        .content {
            margin-left: 250px;
            padding: 35px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .account-bar {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .role-pill {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .logout-button {
            border: 0;
            border-radius: 9px;
            padding: 11px 14px;
            background: #dc2626;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .flash-message {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #dcfce7;
            color: #166534;
        }

        .date {
            background: white;
            padding: 12px 18px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
            color: #6b7280;
        }

        /* CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 22px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card-icon {
            font-size: 25px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .card-number {
            font-size: 30px;
            font-weight: bold;
        }

        /* SECTION */

        section {
            margin-bottom: 45px;
            scroll-margin-top: 25px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .section-header h2 {
            font-size: 21px;
        }

        .badge {
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* TABLE */

        .table-box {
            background: white;
            border-radius: 15px;
            overflow-x: auto;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            background: #f9fafb;
            text-align: left;
            font-size: 13px;
            color: #6b7280;
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #ecfdf5;
            color: #047857;
        }

        .status-warning {
            background: #fffbeb;
            color: #b45309;
        }

        .status-danger {
            background: #fef2f2;
            color: #b91c1c;
        }

        /* WELCOME */

        .welcome {
            background: linear-gradient(135deg, #111827, #1e3a8a);
            color: white;
            padding: 30px;
            border-radius: 17px;
            margin-bottom: 35px;
        }

        .welcome h2 {
            margin-bottom: 10px;
        }

        .welcome.user-welcome {
            background: linear-gradient(135deg, #064e3b, #0f766e);
        }

        .dashboard-label {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 11px;
            border-radius: 20px;
            background: rgba(255,255,255,.16);
            color: #fff;
            font-size: 12px;
            font-weight: bold;
        }

        .menu-note {
            margin: 18px 12px 0;
            padding: 12px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 10px;
            color: #cbd5e1;
            font-size: 12px;
            line-height: 1.6;
        }

        .welcome p {
            color: #d1d5db;
            line-height: 1.7;
        }

        /* FOOTER */

        footer {
            text-align: center;
            padding: 25px;
            color: #9ca3af;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media(max-width: 1200px) {

            .cards {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media(max-width: 800px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .header {
                display: block;
            }

            .date {
                display: inline-block;
                margin-top: 15px;
            }

        }

        @media(max-width: 500px) {

            .cards {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>


<!-- SIDEBAR -->

<aside class="sidebar">

    <div class="logo">
        🏠 Asrama<span>App</span>
    </div>

    <div class="menu-title">
        {{ $dashboardRole === 'admin' ? 'Panel Administrator' : 'Menu Pengguna' }}
    </div>

    <a href="{{ $dashboardRole === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="menu">
        📊 Dashboard {{ $dashboardRole === 'admin' ? 'Admin' : 'User' }}
    </a>

    <a href="{{ route('asramas.index') }}" class="menu">🏢 Data Asrama</a>
    <a href="{{ route('kamars.index') }}" class="menu">🚪 Data Kamar</a>
    <a href="{{ route('santris.index') }}" class="menu">👨‍🎓 Data Santri</a>
    <a href="{{ route('pembayarans.index') }}" class="menu">💰 Pembayaran</a>
    <a href="{{ route('absensis.index') }}" class="menu">📋 Absensi</a>

    <div class="menu-note">
        @if($dashboardRole === 'admin')
            Anda memiliki akses penuh untuk mengelola seluruh data asrama.
        @else
            Anda dapat melihat dan menambahkan data. Pengubahan dan penghapusan hanya dapat dilakukan Admin.
        @endif
    </div>

</aside>


<!-- CONTENT -->

<main class="content">


    <!-- HEADER -->

    <div class="header" id="dashboard">

        <div>

            <h1>
                {{ $dashboardRole === 'admin' ? 'Dashboard Administrator' : 'Dashboard User' }}
            </h1>

            <p>
                {{ $dashboardRole === 'admin' ? 'Pusat kendali Sistem Manajemen Asrama' : 'Halaman informasi dan pengelolaan data asrama' }}
            </p>

        </div>

        <div class="account-bar">
            <div class="date">
                📅 {{ date('d F Y') }}
            </div>
            <div class="date">
                {{ auth()->user()->name }} · {{ ucfirst(auth()->user()->role) }}
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

    </div>


    @if(session('success'))
        <div class="flash-message">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="flash-message" style="background:#fee2e2;color:#991b1b">{{ session('error') }}</div>
    @endif

    <!-- WELCOME -->

    <div class="welcome {{ $dashboardRole === 'user' ? 'user-welcome' : '' }}">

        <h2>
            {{ $dashboardRole === 'admin' ? 'Selamat Datang, Administrator' : 'Selamat Datang, ' . auth()->user()->name }} 👋
        </h2>

        @if($dashboardRole === 'admin')
            <p>Anda masuk sebagai Administrator. Kelola data asrama, kamar, santri, pembayaran, dan absensi melalui panel ini. Anda memiliki hak akses CRUD penuh.</p>
            <span class="dashboard-label">ADMINISTRATOR · AKSES PENUH</span>
        @else
            <p>Ini adalah ruang kerja pengguna. Anda dapat melihat seluruh informasi dan menambahkan data baru. Fitur edit serta hapus data hanya tersedia untuk Administrator.</p>
            <span class="dashboard-label">USER · AKSES TERBATAS</span>
        @endif

    </div>


    <!-- STATISTICS -->

    <div class="cards">

        <div class="card">

            <div class="card-icon">
                🏢
            </div>

            <div class="card-title">
                TOTAL ASRAMA
            </div>

            <div class="card-number">
                {{ $totalAsrama }}
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                🚪
            </div>

            <div class="card-title">
                TOTAL KAMAR
            </div>

            <div class="card-number">
                {{ $totalKamar }}
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                👨‍🎓
            </div>

            <div class="card-title">
                TOTAL SANTRI
            </div>

            <div class="card-number">
                {{ $totalSantri }}
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                💰
            </div>

            <div class="card-title">
                PEMBAYARAN
            </div>

            <div class="card-number">
                {{ $totalPembayaran }}
            </div>

        </div>


        <div class="card">

            <div class="card-icon">
                📋
            </div>

            <div class="card-title">
                ABSENSI
            </div>

            <div class="card-number">
                {{ $totalAbsensi }}
            </div>

        </div>

    </div>



    <!-- ASRAMA -->

    <section id="asrama">

        <div class="section-header">

            <h2>
                🏢 Data Asrama
            </h2>

            <div class="badge">
                {{ $totalAsrama }} Data
            </div>

        </div>


        <div class="table-box">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nama Asrama</th>
                        <th>Gedung</th>
                        <th>Alamat</th>
                        <th>Jumlah Kamar</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($asramas as $asrama)

                    <tr>

                        <td>
                            #{{ $asrama->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $asrama->nama_asrama }}
                            </strong>
                        </td>

                        <td>
                            {{ $asrama->gedung }}
                        </td>

                        <td>
                            {{ $asrama->alamat }}
                        </td>

                        <td>
                            {{ $asrama->kamars->count() }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </section>



    <!-- KAMAR -->

    <section id="kamar">

        <div class="section-header">

            <h2>
                🚪 Data Kamar
            </h2>

            <div class="badge">
                {{ $totalKamar }} Data
            </div>

        </div>


        <div class="table-box">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nomor Kamar</th>
                        <th>Asrama</th>
                        <th>Lantai</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($kamars as $kamar)

                    <tr>

                        <td>
                            #{{ $kamar->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $kamar->nomor_kamar }}
                            </strong>
                        </td>

                        <td>
                            {{ $kamar->asrama->nama_asrama ?? '-' }}
                        </td>

                        <td>
                            {{ $kamar->lantai }}
                        </td>

                        <td>
                            {{ $kamar->kapasitas }} Orang
                        </td>

                        <td>

                            <span class="status">
                                {{ $kamar->status }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </section>



    <!-- SANTRI -->

    <section id="santri">

        <div class="section-header">

            <h2>
                👨‍🎓 Data Santri
            </h2>

            <div class="badge">
                {{ $totalSantri }} Data
            </div>

        </div>


        <div class="table-box">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kamar</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($santris as $santri)

                    <tr>

                        <td>
                            #{{ $santri->id }}
                        </td>

                        <td>
                            {{ $santri->nis }}
                        </td>

                        <td>
                            <strong>
                                {{ $santri->nama }}
                            </strong>
                        </td>

                        <td>
                            {{ $santri->jenis_kelamin }}
                        </td>

                        <td>
                            {{ $santri->kamar->nomor_kamar ?? '-' }}
                        </td>

                        <td>

                            <span class="status">
                                {{ $santri->status }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </section>



    <!-- PEMBAYARAN -->

    <section id="pembayaran">

        <div class="section-header">

            <h2>
                💰 Data Pembayaran
            </h2>

            <div class="badge">
                {{ $totalPembayaran }} Data
            </div>

        </div>


        <div class="table-box">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Santri</th>
                        <th>Tanggal</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($pembayarans as $pembayaran)

                    <tr>

                        <td>
                            #{{ $pembayaran->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $pembayaran->santri->nama ?? '-' }}
                            </strong>
                        </td>

                        <td>
                            {{ $pembayaran->tanggal_pembayaran }}
                        </td>

                        <td>
                            {{ $pembayaran->jenis_pembayaran }}
                        </td>

                        <td>
                            Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}
                        </td>

                        <td>

                            <span class="status">
                                {{ $pembayaran->status }}
                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </section>



    <!-- ABSENSI -->

    <section id="absensi">

        <div class="section-header">

            <h2>
                📋 Data Absensi
            </h2>

            <div class="badge">
                {{ $totalAbsensi }} Data
            </div>

        </div>


        <div class="table-box">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Santri</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($absensis as $absensi)

                    <tr>

                        <td>
                            #{{ $absensi->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $absensi->santri->nama ?? '-' }}
                            </strong>
                        </td>

                        <td>
                            {{ $absensi->tanggal }}
                        </td>

                        <td>

                            <span class="status">
                                {{ $absensi->status }}
                            </span>

                        </td>

                        <td>
                            {{ $absensi->keterangan ?? '-' }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </section>



    <footer>

        AsramaApp — Sistem Manajemen Asrama/Pondok

    </footer>


</main>

</body>

</html>