<?php
include 'config.php';
$id = $_GET['id'];

$query = "DELETE FROM pelanggan WHERE id_pelanggan=$id";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Data berhasil dihapus');window.location='view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
