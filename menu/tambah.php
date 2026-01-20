<?php include 'config.php'; ?>

<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Tambah Menu</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama Menu</b></td><td><input type="text" name="nama" required></td></tr>
            <tr><td><b>Jenis</b></td><td><input type="text" name="jenis" required></td></tr>
            <tr><td><b>Harga</b></td><td><input type="number" name="harga" required></td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="simpan"><b>Simpan</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga  = $_POST['harga'];
   
    $query = "INSERT INTO menu (nama, jenis, harga) 
              VALUES ('$nama', '$jenis', '$harga')";
              
    if(mysqli_query($conn, $query)){
        echo "<script>alert('Menu berhasil ditambah');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
