<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Masuk Admin | TransFamily Bakery</title>
<style>
*{box-sizing:border-box}
body{font-family:Arial,Helvetica,sans-serif;background:#f6f3ef;display:grid;place-items:center;min-height:100vh;margin:0}
.box{background:#fff;border:1px solid #e8e2dc;border-radius:12px;padding:30px;width:100%;max-width:380px}
h1{font-size:22px;margin:0 0 18px;color:#5c4033}
label{display:block;font-weight:700;font-size:13px;margin:12px 0 4px}
input[type=email],input[type=password]{width:100%;padding:10px;border:1px solid #e8e2dc;border-radius:6px;font:inherit}
button{width:100%;margin-top:18px;background:#9b6650;color:#fff;border:0;border-radius:6px;padding:11px;font-size:15px;cursor:pointer}
button:hover{background:#5c4033}
.err{background:#fdecea;color:#8a1c1c;padding:9px 12px;border-radius:6px;font-size:14px;margin-bottom:8px}
.rem{display:flex;gap:8px;align-items:center;font-weight:400;margin-top:12px}
</style>
</head>
<body>
<form class="box" method="POST" action="{{ route('admin.login.post') }}">
  @csrf
  <h1>Masuk Admin</h1>
  @error('email')<div class="err">{{ $message }}</div>@enderror
  <label for="email">Email</label>
  <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
  <label for="password">Password</label>
  <input id="password" type="password" name="password" required>
  <label class="rem"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
  <button type="submit">Masuk</button>
</form>
</body>
</html>
