<?php
include '../config.php';

// Ambil data pelanggan
$pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama FROM pelanggan ORDER BY nama");

// Ambil data menu
$menu = mysqli_query($conn, "SELECT id_menu, nama, harga FROM menu ORDER BY nama");

// Fungsi untuk generate kode_transaksi otomatis
function generateKodeTransaksi($conn) {
    $tgl = date('Ymd');
    $prefix = "TX".$tgl;
    $q = mysqli_query($conn, "SELECT kode_transaksi FROM transaksi WHERE kode_transaksi LIKE '$prefix%' ORDER BY kode_transaksi DESC LIMIT 1");
    if(mysqli_num_rows($q) > 0){
        $last = mysqli_fetch_assoc($q);
        $lastNumber = intval(substr($last['kode_transaksi'], -3));
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }
    return $prefix . sprintf("%03d", $newNumber);
}

if(isset($_POST['simpan'])){
    $kode_transaksi = generateKodeTransaksi($conn);
    $tanggal_transaksi = date('Y-m-d');
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_menu = $_POST['id_menu'];
    $jumlah = intval($_POST['jumlah']);
    $no_meja = $_POST['no_meja'];
    $status = 'diproses';

    // Ambil harga menu
    $qMenu = mysqli_query($conn, "SELECT harga FROM menu WHERE id_menu='$id_menu'");
    $rowMenu = mysqli_fetch_assoc($qMenu);
    $harga = $rowMenu['harga'];
    $total = $harga * $jumlah;

    $query = "INSERT INTO transaksi (kode_transaksi, tanggal_transaksi, id_pelanggan, id_menu, jumlah, total, no_meja, status)
              VALUES ('$kode_transaksi', '$tanggal_transaksi', '$id_pelanggan', '$id_menu', $jumlah, $total, '$no_meja', '$status')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Transaksi berhasil ditambah');window.location='view.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <script>
    function updateTotal() {
        let menuSelect = document.querySelector("select[name='id_menu']");
        let jumlah = document.querySelector("input[name='jumlah']").value;
        let totalInput = document.querySelector("input[name='total']");

        let harga = menuSelect.options[menuSelect.selectedIndex].getAttribute("data-harga");
        if(harga && jumlah > 0){
            totalInput.value = harga * jumlah;
        } else {
            totalInput.value = 0;
        }
    }
    </script>
</head>
<body>
<h2 align="center">Tambah Transaksi</h2>
<form method="POST" action="">
    <table align="center">
        <tr>
            <td>Pelanggan</td>
            <td>
                <select name="id_pelanggan">
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php while($p = mysqli_fetch_assoc($pelanggan)): ?>
                        <option value="<?= $p['id_pelanggan'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Menu</td>
            <td>
                <select name="id_menu" onchange="updateTotal()">
                    <option value="">-- Pilih Menu --</option>
                    <?php while($m = mysqli_fetch_assoc($menu)): ?>
                        <option value="<?= $m['id_menu'] ?>" data-harga="<?= $m['harga'] ?>">
                            <?= htmlspecialchars($m['nama']) ?> (Rp <?= number_format($m['harga'],0,',','.') ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" min="1" value="1" oninput="updateTotal()"></td>
        </tr>

        <tr>
            <td>Total</td>
            <td><input type="text" name="total" value="0" readonly></td>
        </tr>

        <tr>
            <td>Nomor Meja</td>
            <td><input type="text" name="no_meja"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <input type="text" value="diproses" disabled>
                <input type="hidden" name="status" value="diproses">
            </td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: left;">
                <a href="view.php" class="btn">Kembali</a>
                <button type="submit" name="simpan">Simpan</button>
            </td>
        </tr>
        
    </table>
</form>

<script>
    // jalankan saat pertama kali load
    updateTotal();
</script>
</body>
</html>
