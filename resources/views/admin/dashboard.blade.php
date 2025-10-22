<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

    <h1 style="color: blue;">ADMIN DASHBOARD</h1>
    
    <p>Anda login sebagai: <strong>{{ Auth::guard('admin')->user()->name }}</strong></p>
    <p>Peran Anda: Administrator</p>

    <form method="POST" action="{{ url('/admin/logout') }}">
        @csrf
        <button type="submit" style="background-color: darkblue; color: white;">LOGOUT ADMIN</button>
    </form>

    <hr>
    
    <h2>Menu Administrasi</h2>
    <ul>
        <li><a href="#">Kelola Motor</a></li>
        <li><a href="#">Kelola User</a></li>
        <li><a href="#">Laporan Transaksi</a></li>
        <li><a href="#">Pengaturan Akun Admin</a></li>
    </ul>

</body>
</html>