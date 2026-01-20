<?php
include 'config.php';
$id = $_GET['id'];

$query = "DELETE FROM menu WHERE id_menu=$id";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Menu berhasil dihapus');window.location='view.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
