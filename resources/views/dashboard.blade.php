<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asrama Management</title>

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
        Menu Utama
    </div>

    <a href="#dashboard" class="menu">
        📊 Dashboard
    </a>

    <a href="#asrama" class="menu">
        🏢 Data Asrama
    </a>

    <a href="#kamar" class="menu">
        🚪 Data Kamar
    </a>

    <a href="#santri" class="menu">
        👨‍🎓 Data Santri
    </a>

    <a href="#pembayaran" class="menu">
        💰 Pembayaran
    </a>

    <a href="#absensi" class="menu">
        📋 Absensi
    </a>

</aside>


<!-- CONTENT -->

<main class="content">


    <!-- HEADER -->

    <div class="header" id="dashboard">

        <div>

            <h1>
                Dashboard Asrama
            </h1>

            <p>
                Sistem Manajemen Asrama / Pondok
            </p>

        </div>

        <div class="date">
            📅 {{ date('d F Y') }}
        </div>

    </div>


    <!-- WELCOME -->

    <div class="welcome">

        <h2>
            Selamat Datang 👋
        </h2>

        <p>
            Sistem ini digunakan untuk mengelola data asrama,
            kamar, santri, pembayaran, dan absensi secara
            terintegrasi.
        </p>

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