<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AsramaApp</title>
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;background:linear-gradient(135deg,#eff6ff,#f8fafc);font-family:Arial,sans-serif;color:#1f2937;padding:20px}
        .card{width:100%;max-width:430px;background:#fff;padding:36px;border-radius:18px;box-shadow:0 15px 45px rgba(15,23,42,.09)}
        .brand{text-align:center;font-size:28px;font-weight:800;margin-bottom:8px}.brand span{color:#2563eb}.sub{text-align:center;color:#64748b;margin:0 0 28px}
        label{display:block;font-size:14px;font-weight:700;margin:16px 0 8px}input{width:100%;padding:13px 14px;border:1px solid #dbe2ea;border-radius:9px;font-size:15px}input:focus{outline:2px solid #bfdbfe;border-color:#2563eb}
        .btn{width:100%;border:0;border-radius:9px;padding:14px;background:#2563eb;color:#fff;font-weight:700;font-size:15px;cursor:pointer;margin-top:22px}.link{text-align:center;margin-top:22px;color:#64748b;font-size:14px}.link a{color:#2563eb;text-decoration:none;font-weight:700}
        .alert{padding:12px;border-radius:9px;margin-bottom:16px;background:#dcfce7;color:#166534;font-size:14px}.error{background:#fee2e2;color:#991b1b}.field-error{color:#dc2626;font-size:13px;margin-top:6px}.remember{display:flex;align-items:center;gap:8px;margin-top:15px;font-size:14px}.remember input{width:auto}
    </style>
</head>
<body>
<div class="card">
    <div class="brand">Asrama<span>App</span></div>
    <p class="sub">Masuk ke Sistem Manajemen Asrama</p>
    @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert error">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
        <button class="btn" type="submit">Login</button>
    </form>
    <div class="link">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></div>
</div>
</body>
</html>
