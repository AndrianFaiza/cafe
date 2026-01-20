<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan=$id");
$row = mysqli_fetch_assoc($data);
?>

<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Edit Data Pelanggan</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama</b></td><td><input type="text" name="nama" value="<?= $row['nama']; ?>" required></td></tr>
            <tr><td><b>Umur</b></td><td><input type="number" name="umur" value="<?= $row['umur']; ?>" required></td></tr>
            <tr><td><b>No HP</b></td><td><input type="text" name="no_hp" value="<?= $row['no_hp']; ?>" required></td></tr>
            <tr><td><b>Alamat</b></td><td><textarea name="alamat" required><?= $row['alamat']; ?></textarea></td></tr>
            <tr><td><b>Email</b></td><td><input type="email" name="email" value="<?= $row['email']; ?>" required></td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="update"><b>Update</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $umur = $_POST['umur'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email  = $_POST['email'];

    $query = "UPDATE pelanggan SET 
                nama='$nama', 
                no_hp='$no_hp', 
                alamat='$alamat', 
                email='$email',
                umur='$umur'
              WHERE id_pelanggan=$id";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data berhasil diupdate');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
