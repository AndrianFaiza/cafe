<?php
include 'config.php';
$id = $_GET['id'];

$query = "DELETE FROM karyawan WHERE id_karyawan=$id";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Data berhasil dihapus');window.location='view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>