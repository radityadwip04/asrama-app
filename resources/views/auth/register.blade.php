<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AsramaApp</title>
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:linear-gradient(135deg,#eff6ff,#f8fafc);font-family:Arial,sans-serif;color:#1f2937;padding:20px}
        .card{width:100%;max-width:460px;background:#fff;padding:36px;border-radius:18px;box-shadow:0 15px 45px rgba(15,23,42,.09)}.brand{text-align:center;font-size:28px;font-weight:800;margin-bottom:8px}.brand span{color:#2563eb}.sub{text-align:center;color:#64748b;margin:0 0 24px}
        label{display:block;font-size:14px;font-weight:700;margin:15px 0 8px}input{width:100%;padding:13px 14px;border:1px solid #dbe2ea;border-radius:9px;font-size:15px}input:focus{outline:2px solid #bfdbfe;border-color:#2563eb}.btn{width:100%;border:0;border-radius:9px;padding:14px;background:#2563eb;color:#fff;font-weight:700;font-size:15px;cursor:pointer;margin-top:22px}.link{text-align:center;margin-top:22px;color:#64748b;font-size:14px}.link a{color:#2563eb;text-decoration:none;font-weight:700}.alert{padding:12px;border-radius:9px;margin-bottom:16px;background:#fee2e2;color:#991b1b;font-size:14px}.field-error{color:#dc2626;font-size:13px;margin-top:6px}
    </style>
</head>
<body>
<div class="card">
    <div class="brand">Asrama<span>App</span></div>
    <p class="sub">Buat akun baru untuk menggunakan aplikasi</p>
    @if($errors->any())<div class="alert">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('register.process') }}">
        @csrf
        <label for="name">Nama Lengkap</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        <label for="password">Password (minimal 8 karakter)</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        <button class="btn" type="submit">Daftar</button>
    </form>
    <div class="link">Sudah punya akun? <a href="{{ route('login') }}">Login</a></div>
</div>
</body>
</html>
