<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f8fafc, #e0e7ff);
    color: #333;
    margin: 0;
    padding: 0;
}

.wrapper {
    max-width: 900px;
    margin: 40px auto 0 auto;
    padding: 30px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(100, 100, 111, 0.2);
}

.sidebar {
    font-weight: 600;
    margin-bottom: 20px;
}

.sidebar a {
    color: #4f46e5;
    margin-right: 20px;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.sidebar a:hover {
    color: #3730a3;
}

.content h1 {
    font-size: 2.5rem;
    margin-bottom: 12px;
}

.content p {
    font-size: 1.125rem;
    line-height: 1.6;
    color: #555;
}

.btn-menu {
    background-color: #ed9829ff; /* warna tombol */
    color: white !important; /* teks putih */
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
    display: inline-block;
}

.btn-menu:hover {
    background-color: #a37130ff;
    color: white !important;
}

    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <span>MyCafe</span> &nbsp;&nbsp;
        <a href="karyawan/view.php" class="btn-menu">Karyawan</a>
        <a href="transaksi/view.php" class="btn-menu">Transaksi</a>
        <a href="pelanggan/view.php" class="btn-menu">Pelanggan</a>
        <a href="menu/view.php" class="btn-menu">Menu</a>
    </div>

    <div class="content">
        <h1>Selamat Datang di Dashboard</h1>
        <p>Pilih menu di sidebar untuk mengelola data Pelanggan, Menu, Karyawan, dan Transaksi.</p>
    </div>
</div>

</body>
</html>
