<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan=$id");
$row = mysqli_fetch_assoc($data);
?>

<html>
<head>
    <title>Edit karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Edit Data karyawan</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama</b></td><td><input type="text" name="nama" value="<?= $row['nama']; ?>" required></td></tr>
            <tr><td><b>No HP</b></td><td><input type="text" name="no_hp" value="<?= $row['no_hp']; ?>" required></td></tr>
            <tr><td><b>Alamat</b></td><td><textarea name="alamat" required><?= $row['alamat']; ?></textarea></td></tr>
            <tr><td><b>Username</b></td><td><input type="text" name="username" value="<?= $row['username']; ?>" required></td></tr>
            <tr><td><b>Email</b></td><td><input type="email" name="email" value="<?= $row['email']; ?>" required></td></tr>
            <tr><td><b>Password</b></td><td><input type="password" name="password" value="<?= $row['password']; ?>" required></td></tr>
            <tr><td><b>Status</b></td><td>
                <select name="status" require>
                    <option value="">--Pilih Option--</option>
                    <option value="Aktif" <?= $row['status'] =='Aktif' ? 'selected': ''; ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= $row['status'] ==' Tidak Aktif' ? 'selected': ''; ?>; ?>>Tidak Aktif</option>
                </select>
            </td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="update"><b>Update</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email  = $_POST['email'];
    $status = $_POST['status'];

    $query = "UPDATE karyawan SET 
                nama='$nama', 
                no_hp='$no_hp', 
                alamat='$alamat', 
                username='$username', 
                password='$password', 
                email='$email',
                status='$status'
              WHERE id_karyawan=$id";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data berhasil diupdate');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
