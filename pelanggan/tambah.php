<?php include 'config.php'; ?>

<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Tambah Data Pelanggan</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama</b></td><td><input type="text" name="nama" required></td></tr>
            <tr><td><b>Umur</b></td><td><input type="number" name="umur" required></td></tr>
            <tr><td><b>No HP</b></td><td><input type="text" name="no_hp" required></td></tr>
            <tr><td><b>Alamat</b></td><td><textarea name="alamat" required></textarea></td></tr>
            <tr><td><b>Email</b></td><td><input type="email" name="email" required></td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="simpan"><b>Simpan</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $umur = $_POST['umur'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email  = $_POST['email'];

    $query = "INSERT INTO pelanggan (nama, no_hp, alamat, email, umur) 
              VALUES ('$nama','$no_hp','$alamat','$email', '$umur')";
              
    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data berhasil ditambah');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
