<?php include 'config.php'; ?>

<html>
<head>
    <title>Menu Cafe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        a { margin: 0 5px; text-decoration: none; }
    </style>
</head>
<body>
    <h2 align="center">Menu Cafe</h2>
    <p align="center"><a href="tambah.php">+ Tambah Menu</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Menu</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM menu");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$row['id_menu']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['jenis']."</td>
                <td>".$row['harga']."</td>
                <td>
                    <a href='edit.php?id=".$row['id_menu']."'>Edit</a> |
                    <a href='hapus.php?id=".$row['id_menu']."' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
