<?php
include '../config.php';

// Ambil semua data transaksi
$query = "SELECT t.kode_transaksi, t.tanggal_transaksi, p.nama AS nama_pelanggan, m.nama, 
                 t.jumlah, t.total, t.no_meja, t.status 
          FROM transaksi t 
          JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
          JOIN menu m ON t.id_menu = m.id_menu
          ORDER BY t.tanggal_transaksi DESC";
$transaksi = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Transaksi</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
   
</head>
<body>
    <h2 align="center">List Data Transaksi</h2>

    <div class="container">
        <table>
             
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Nomor Meja</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($transaksi)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode_transaksi']) ?></td>
                        <td><?= htmlspecialchars($row['tanggal_transaksi']) ?></td>
                        <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['jumlah']) ?></td>
                        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        <td><?= htmlspecialchars($row['no_meja']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td>
                            <?php if($row['status'] == 'diproses'): ?>
                                <form action="ubah_status.php" method="POST">
                                    <input type="hidden" name="kode_transaksi" value="<?= $row['kode_transaksi'] ?>">
                                     <button type="submit" class="btn-done">Done</button>
                                </form>
                            <?php else: ?>
                                <span style="color:green; font-weight:bold;">✔ Done</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: left;">
                        <a href="../index.php"><button class="btn">Kembali</button></a>
                        <a href="tambah.php">+Tambah Data</a>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>
</body>
</html>