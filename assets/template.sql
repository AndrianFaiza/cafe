-- --------------------------------------------------------
-- Create Database
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS cafe DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE cafe;

-- --------------------------------------------------------
-- Table: Karyawan
-- --------------------------------------------------------
CREATE TABLE karyawan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20),
    alamat TEXT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    status VARCHAR(20) DEFAULT 'aktif'
);

-- --------------------------------------------------------
-- Table: Menu
-- --------------------------------------------------------
CREATE TABLE menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    jenis VARCHAR(50),
    harga DECIMAL(10,2) NOT NULL
);

-- --------------------------------------------------------
-- Table: Pelanggan
-- --------------------------------------------------------
CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    umur INT,
    no_hp VARCHAR(20),
    alamat TEXT,
    email VARCHAR(100)
);

-- --------------------------------------------------------
-- Table: Transaksi
-- --------------------------------------------------------
CREATE TABLE transaksi (
    kode_transaksi VARCHAR(20) NOT NULL,
    tgl_transaksi DATE NOT NULL,
    id_pelanggan INT NOT NULL,
    kode_menu INT NOT NULL,
    jumlah INT NOT NULL,
    total DECIMAL(15,2) NOT NULL,
    nomor_meja VARCHAR(10) NOT NULL,
    status ENUM('diproses','done') NOT NULL DEFAULT 'diproses',
    PRIMARY KEY (kode_transaksi),
    UNIQUE KEY id_pelanggan_menu (id_pelanggan,kode_menu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------
-- Sample Data for Transaksi
-- --------------------------------------------------------
INSERT INTO transaksi 
(kode_transaksi, tgl_transaksi, id_pelanggan, kode_menu, jumlah, total, nomor_meja, status) VALUES
('TX20250922001', '2025-09-22', 1, 2, 3, 10500.00, '5', 'done'),
('TX20250922002', '2025-09-22', 3, 1, 2, 10000.00, '4', 'done'),
('TX20250922003', '2025-09-22', 2, 1, 7, 35000.00, '1', 'diproses');
