<?php include 'config.php'; ?>

<html>
<head>
    <title>Data Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        a { margin: 0 5px; text-decoration: none; }
    </style>
</head>
<body>
    <h2 align="center">Data Pelanggan</h2>
    <p align="center"><a href="tambah.php">+ Tambah Pelanggan</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM pelanggan");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$row['id_pelanggan']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['umur']."</td>
                <td>".$row['no_hp']."</td>
                <td>".$row['alamat']."</td>
                <td>".$row['email']."</td>
                <td>
                    <a href='edit.php?id=".$row['id_pelanggan']."'>Edit</a> |
                    <a href='hapus.php?id=".$row['id_pelanggan']."' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
