<?php include 'config.php'; ?>

<html>
<head>
    <title>Tambah karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2 align="center">Tambah Data karyawan</h2>
    <form method="POST" action="">
        <table align="center">
            <tr><td><b>Nama</b></td><td><input type="text" name="nama" required></td></tr>
            <tr><td><b>No HP</b></td><td><input type="text" name="no_hp" required></td></tr>
            <tr><td><b>Alamat</b></td><td><textarea name="alamat" required></textarea></td></tr>
            <tr><td><b>Username</b></td><td><input type="text" name="username" required></td></tr>
            <tr><td><b>Email</b></td><td><input type="text" name="email" required></td></tr>
            <tr><td><b>Password</b></td><td><input type="password" name="password" required></td></tr>
            <tr><td><b>Status</b></td><td>
                <select name="status" require>
                    <option value="">--Pilih Option--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </td></tr>
            <tr><td colspan="2" align="center"><button type="submit" name="simpan"><b>Simpan</b></button></td></tr>
        </table>
    </form>
</body>
</html>

<?php
if(isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $no_hp  = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email  = $_POST['email'];
    $status = $_POST['status'];

    $query = "INSERT INTO karyawan (nama, no_hp, alamat, username, password,  email, status) 
              VALUES ('$nama','$no_hp','$alamat','$username', '$password','$email', '$status')";
              
    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data berhasil ditambah');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
