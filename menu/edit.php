<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu=$id");
$row = mysqli_fetch_assoc($data);
?>

<html>
<head>
    <title>Edit Menu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Edit Menu</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama</b></td><td><input type="text" name="nama" value="<?= $row['nama']; ?>" required></td></tr>
            <tr><td><b>Jenis</b></td><td><input type="text" name="jenis" value="<?= $row['jenis']; ?>" required></td></tr>
            <tr><td><b>Harga</b></td><td><input type="number" name="harga" value="<?= $row['harga']; ?>" required></td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="update"><b>Ubah</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $query = "UPDATE menu SET 
                nama='$nama', 
                jenis='$jenis', 
                harga='$harga' 
              WHERE id_menu=$id";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Menu berhasil diupdate');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
