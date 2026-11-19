<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title', 'Admin') | TransFamily Bakery</title>
<style>
:root{--brown:#9b6650;--brown-d:#5c4033;--line:#e8e2dc;--ink:#2e2a28;--muted:#6a625e}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial,Helvetica,sans-serif;color:var(--ink);background:#f6f3ef;line-height:1.5}
a{color:inherit;text-decoration:none}
.top{background:#fff;border-bottom:1px solid var(--line);padding:14px 24px;display:flex;justify-content:space-between;align-items:center}
.top b{color:var(--brown-d)}
.wrap{max-width:980px;margin:28px auto;padding:0 20px}
h1{font-size:24px;margin-bottom:16px}
.card{background:#fff;border:1px solid var(--line);border-radius:10px;padding:22px}
.btn{display:inline-block;background:var(--brown);color:#fff;border:0;border-radius:6px;padding:9px 16px;font-size:14px;cursor:pointer}
.btn:hover{background:var(--brown-d)}
.btn.ghost{background:#fff;color:var(--brown);border:1px solid var(--brown)}
.btn.red{background:#b3202a}
.flash{background:#e8f5e9;border:1px solid #b7dfb9;color:#1b5e20;padding:10px 14px;border-radius:6px;margin-bottom:14px}
.err{background:#fdecea;border:1px solid #f5c2c0;color:#8a1c1c;padding:10px 14px;border-radius:6px;margin-bottom:14px;font-size:14px}
table{width:100%;border-collapse:collapse;font-size:14px}
th,td{text-align:left;padding:10px 8px;border-bottom:1px solid var(--line);vertical-align:middle}
th{font-size:12px;text-transform:uppercase;letter-spacing:.05em;color:var(--muted)}
.pill{display:inline-block;padding:2px 10px;border-radius:20px;font-size:12px;font-weight:700}
.pill.tayang{background:#e8f5e9;color:#1b5e20}.pill.terjadwal{background:#fff7e0;color:#8a6100}
.pill.berakhir{background:#eee;color:#555}.pill.nonaktif{background:#f3e3e3;color:#8a1c1c}
label{display:block;font-weight:700;font-size:13px;margin:14px 0 4px}
input[type=text],input[type=url],input[type=number],input[type=email],input[type=password],input[type=datetime-local],input[type=file],textarea{width:100%;padding:9px;border:1px solid var(--line);border-radius:6px;font:inherit}
.row2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.hint{font-size:12px;color:var(--muted);margin-top:3px}
.check{display:flex;gap:8px;align-items:center;font-weight:400;margin:10px 0}
.actions{display:flex;gap:8px;flex-wrap:wrap}
form.inline{display:inline}
@media(max-width:700px){.row2{grid-template-columns:1fr}table{font-size:13px}}
</style>
</head>
<body>
<div class="top">
  <b>TransFamily Bakery · Admin</b>
  <div class="actions">
    <a class="btn ghost" href="{{ url('/') }}" target="_blank" rel="noopener">Lihat Website</a>
    <form class="inline" method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn ghost">Keluar</button></form>
  </div>
</div>
<div class="wrap">
  @if (session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
  @yield('content')
</div>
</body>
</html>
