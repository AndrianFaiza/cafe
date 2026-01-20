<?php
include '../config.php';

if (isset($_POST['kode_transaksi'])) {
    $kode = $_POST['kode_transaksi'];

    $update = "UPDATE transaksi SET status = 'done' WHERE kode_transaksi = '$kode'";
    mysqli_query($conn, $update);

    header("Location: view.php"); // kembali ke halaman list
    exit;
}
?>
