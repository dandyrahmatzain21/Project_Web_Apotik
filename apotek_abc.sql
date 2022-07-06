-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2021 pada 07.00
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_abc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `month_num` int(2) NOT NULL,
  `month_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`month_num`, `month_name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `deskripsi_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
(201, 'Anti Radang', 'Melegakan peradangan'),
(207, 'Antioksidan', 'Mencegah penuaan dini'),
(208, 'Anti Depresan', 'Mengurangi depresi'),
(209, 'Vitamin', 'Suplemen'),
(216, 'Stimulan', 'Menstimulasi hewan'),
(217, 'Antibiotik', 'bakteriostatik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(200) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `stok` int(3) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `kedaluwarsa` date NOT NULL,
  `deskripsi_obat` text NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `kode_obat`, `nama_obat`, `penyimpanan`, `stok`, `unit`, `nama_kategori`, `tgl_masuk`, `kedaluwarsa`, `deskripsi_obat`, `harga_beli`, `harga_jual`, `nama_pemasok`, `gambar`) VALUES
(1001, 'OBT1001', 'Vitamin-E', 'Rak 1', 10, 'Kapsul', 'Vitamin', '2021-07-01', '2022-01-10', 'Vitamin E', 10000, 20000, 'Bina Jaya Apotek', 'OB001.png'),
(1002, 'OBT1002', 'Vitamin-C', 'Rak 2', 20, 'Kapsul', 'Vitamin', '2021-07-05', '2023-02-20', 'Vitamin E', 3000, 3000, 'Tina Farma', 'OB002.png'),
(1003, 'OBT1003', 'Vitamin-D', 'Rak 3', 40, 'Kapsul', 'Vitamin', '2021-07-15', '2023-10-20', 'Vitamin D', 2000, 2000, 'Bina Jaya Apotek', 'OB003.png'),
(1004, 'OBT1004', 'Pilek', 'Rak3', 50, 'Kapsul', 'Antioksidan', '2021-07-12', '2020-02-20', 'Pilek', 2000, 3000, 'Kimia Farma', 'OB004.jpg'),
(1005, 'OBT1005', 'Flu', 'Rak 4', 50, 'Sirup', 'Antibiotik', '2021-07-10', '2024-07-15', 'Buat Flu', 1000, 2000, 'Kenanga Apotek', 'OB005.jpg'),
(1007, 'OBT1007', 'Tes', 'Tes', 50, 'Sirup', 'Anti Depresan', '2021-07-06', '2021-07-22', 'Tes', 3000, 5000, 'Kimia Farma', 'OBT1007.png'),
(1008, 'OBT1008', 'Obat Oleng', 'Rak 7', 10, 'Kapsul', 'Antioksidan', '2021-07-09', '2021-07-30', 'Obat Buat Orang Mabok', 3000, 5000, 'Zend Farma', 'OBT1008.png'),
(1009, 'OBT1009', 'Obat Biar Ga O\'on Wkwkwk', 'Rak 9', 250, 'Kapsul', 'Vitamin', '2021-07-17', '2021-07-30', 'Kalo O\'on Minum Obat Ini Dijamin Makin O\'on', 1000, 2000, 'Z.E.N.D Apotek', 'OBT1009.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemasok`
--

CREATE TABLE `tbl_pemasok` (
  `id_pemasok` int(3) NOT NULL,
  `kode_pemasok` varchar(200) NOT NULL,
  `nama_pemasok` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pemasok`
--

INSERT INTO `tbl_pemasok` (`id_pemasok`, `kode_pemasok`, `nama_pemasok`, `alamat`, `telepon`) VALUES
(2001, 'PMK2001', 'Bina Jaya Apotek', 'Cirebon', '0821234'),
(2002, 'PMK2002', 'Kimia Farma', 'Majalengka', '02574555'),
(2003, 'PMK2003', 'Rahmat Farma', 'Jakarta', '08775544'),
(2004, 'PMK2004', 'Z.E.N.D Apotek', 'Bandung', '08965555'),
(2005, 'PMK2005', 'Zend Farma', 'Kuningan', '081');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(200) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pemasok` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_obat`, `kode_obat`, `ref`, `nama_obat`, `harga_beli`, `banyak`, `subtotal`, `nama_pemasok`, `tgl_beli`, `grandtotal`) VALUES
(4, 0, '', 'L8BvtCyFDZ', 'Stimuno', 6000, 1, 6000, 'Bina Jaya Apotek', '2018-08-11', 24000),
(8, 0, '', 'pwoaFcmGVs', 'Asam Mefenamat', 4000, 12, 48000, 'Bina Jaya Apotek', '2018-02-22', 48000),
(9, 0, '', '96kHYMepS9', 'Salbutamol', 6000, 7, 42000, 'Bina Jaya Apotek', '2018-03-21', 42000),
(10, 0, '', 'Tbb6pLVCJr', 'Ambroxol', 20000, 4, 80000, 'Bina Jaya Apotek', '2018-01-24', 80000),
(11, 0, '', 'fdMGrBa4nS', 'Stimuno', 6000, 16, 96000, 'Bina Jaya Apotek', '2018-04-18', 96000),
(12, 0, '', 'aDxtUA0rsc', 'Adrome', 12000, 6, 72000, 'Bina Jaya Apotek', '2018-05-09', 72000),
(14, 0, '', 'KCZxZ1MqID', 'Ambroxol', 20000, 2, 40000, 'Bina Jaya Apotek', '2018-07-18', 40000),
(15, 0, '', 'Ar9235n1ny', 'Adrome', 12000, 3, 36000, 'Kenanga Apotek', '2018-06-06', 56000),
(16, 0, '', 'Ar9235n1ny', 'Ambroxol', 20000, 1, 20000, 'Kenanga Apotek', '2018-06-06', 56000),
(25, 0, '', 'q8ke6ToBMo', 'Cetirizen', 2000, 3, 6000, 'Kenanga Apotek', '2018-09-24', 6000),
(26, 0, '', 'rRQtSwBd70', 'Vitamin-E', 10000, 10, 100000, 'Bina Jaya Apotek', '2021-07-15', 100000),
(27, 1047, 'OB001', 'YiZ7jwB1gF', 'Vitamin-E', 10000, 100, 1000000, 'Bina Jaya Apotek', '1111-11-11', 1000000),
(28, 1048, 'OB002', 'cwlNRkCn25', 'Vitamin-C', 3000, 30, 90000, 'Tina Farma', '0222-02-22', 90000),
(29, 1047, 'OB001', '6ednPlaT5I', 'Vitamin-E', 10000, 4, 40000, 'Bina Jaya Apotek', '2021-07-01', 40000),
(30, 1047, 'OB001', 'redp6c8943', 'Vitamin-E', 10000, 6, 60000, 'Bina Jaya Apotek', '2021-07-09', 60000),
(36, 1052, 'OB004', 'Hbpa9yMEtT', 'Pilek', 2000, 40, 80000, 'Kimia Farma', '2021-07-15', 80000),
(40, 1049, 'OB003', 'QB1GmaZk5u', 'Vitamin-D', 2000, 80, 160000, 'Bina Jaya Apotek', '2021-07-11', 160000),
(41, 1048, 'OB002', 'r9w1DR3mkW', 'Vitamin-C', 3000, 30, 90000, 'Tina Farma', '2021-07-13', 90000),
(42, 1005, 'OBT1005', 'GO0pgyBQ92', 'Flu', 1000, 50, 50000, 'Kenanga Apotek', '2021-07-16', 50000),
(43, 1006, 'OBT1006', 'zwTI3cSkbR', 'Nyoba', 2000, 2000, 4000000, 'Kimia Farma', '2021-07-16', 4000000);

--
-- Trigger `tbl_pembelian`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `tbl_pembelian` FOR EACH ROW BEGIN
INSERT INTO tbl_obat SET id_obat = NEW.id_obat,stok = NEW.banyak
ON DUPLICATE KEY UPDATE stok = stok + new.banyak;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(5) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(200) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_guest`, `id_obat`, `kode_obat`, `ref`, `nama_obat`, `harga_jual`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `grandtotal`) VALUES
(81, 0, 0, '', 'JMBSErmmo0', 'Asam Mefenamat', 4000, 1, 4000, 'Melinda', '2018-08-09', 29000),
(82, 0, 0, '', 'JMBSErmmo0', 'Salbutamol', 10000, 1, 10000, 'Melinda', '2018-08-09', 29000),
(87, 0, 0, '', 'xl23Q6whsP', 'Salbutamol', 10000, 3, 30000, 'Melinda', '2018-01-10', 30000),
(90, 0, 0, '', '9ab7RcZHma', 'Adrome', 15000, 6, 90000, 'Doni', '2018-02-14', 90000),
(91, 0, 0, '', 'fAMEjr9rA0', 'Ambroxol', 22000, 5, 110000, 'Amirullah', '2018-03-14', 110000),
(92, 0, 0, '', 'so5518T1vI', 'Salbutamol', 10000, 6, 60000, 'Doni', '2018-04-18', 60000),
(97, 0, 0, '', 'VS27jjD5Ze', 'Ambroxol', 22000, 1, 22000, 'Pitaloka', '2018-07-18', 32000),
(98, 0, 0, '', 'VS27jjD5Ze', 'Stimuno', 10000, 1, 10000, 'Pitaloka', '2018-07-18', 32000),
(99, 0, 0, '', 'nyptFm9i43', 'Stimuno', 10000, 3, 30000, 'Andi', '2018-06-13', 30000),
(101, 0, 0, '', 'e7QgBweE8X', 'Adrome', 15000, 1, 15000, 'Andi', '2018-09-15', 15000),
(105, 0, 0, '', 'zPpAfLsmd7', 'Adrome', 15000, 1, 15000, 'Amila', '2018-05-16', 25000),
(106, 0, 0, '', 'zPpAfLsmd7', 'Amoxilin', 10000, 1, 10000, 'Amila', '2018-05-16', 25000),
(119, 0, 0, '', 'FfndSkUmh6', 'Asam Mefenamat', 4000, 2, 8000, 'Alina', '2018-09-24', 12000),
(120, 0, 0, '', 'FfndSkUmh6', 'Vitamin E', 4000, 1, 4000, 'Alina', '2018-09-24', 12000),
(124, 0, 0, '', 'atwqv0IPYb', 'Vitamin-E', 20000, 3, 60000, 'Dandy Rahmat Zain', '0222-02-22', 60000),
(125, 0, 0, '', 'oFfc49sdgk', 'Vitamin-E', 20000, 30, 600000, 'Dandy Rahmat Zain', '2020-02-20', 600000),
(1111, 0, 1, '1', '11', '11', 11, 50, 11, '11', '2021-07-06', 11),
(1112, 0, 1047, 'OBT1001', 'vpagoVxhDb', 'Vitamin-E', 20000, 50, 1000000, 'Dandy Rahmat Zain', '3030-03-30', 1000000),
(1113, 0, 1047, 'OBT1001', 'ep6RZLmiTt', 'Vitamin-E', 20000, 30, 600000, 'Dandy Rahmat Zain', '0002-02-20', 600000),
(1114, 0, 1047, 'OBT1001', 'nEcpW3wLoS', 'Vitamin-E', 20000, 20, 400000, 'Dandy Rahmat Zain', '0222-02-22', 400000),
(1116, 0, 1052, 'OBT1004', 'EHBka27SMG', 'Pilek', 3000, 50, 150000, 'Dandy Rahmat Zain', '0020-02-20', 150000),
(1117, 0, 1052, 'OBT1004', 'Fva2wAOcpo', 'Pilek', 3000, 20, 60000, 'Dandy Rahmat Zain', '0020-02-20', 60000),
(1118, 0, 1047, 'OBT1001', 'O0aQ5pvkVu', 'Vitamin-E', 20000, 60, 1200000, 'Dandy Rahmat Zain', '2021-07-01', 1200000),
(1119, 0, 1049, 'OB003', '6saTVzJ9kd', 'Vitamin-D', 2000, 20, 40000, 'Dandy Rahmat Zain', '2021-07-02', 40000),
(1120, 0, 1052, 'OB004', 'YWgTf3mG2t', 'Pilek', 3000, 20, 60000, 'Dandy Rahmat Zain', '2021-07-05', 60000),
(1121, 0, 1007, 'OBT1007', 'EPc81zxasW', 'Tes', 5000, 100, 500000, 'Zain', '2021-07-16', 500000),
(1122, 0, 1007, 'OBT1007', 'v1O8u73Z6a', 'Tes', 5000, 50, 250000, 'Rahmat', '2021-07-13', 250000),
(1123, 10, 1002, 'OBT1002', 'duULYwTtWH', 'Vitamin-C', 3000, 30, 90000, 'Zend', '2021-07-15', 90000),
(1124, 10, 1001, 'OBT1001', 'tl4guNyvCk', 'Vitamin-E', 20000, 20, 400000, 'Zend', '2021-07-16', 400000),
(1125, 10, 1001, 'OBT1001', 'FjNEtizgMP', 'Vitamin-E', 20000, 20, 400000, 'Zend', '2021-07-16', 400000),
(1126, 10, 1002, 'OBT1002', '69HrkfPLIO', 'Vitamin-C', 3000, 30, 90000, 'Zend', '2021-07-17', 90000),
(1127, 10, 100003, 'OBT1008', '9eOCogEiPf', 'Obat Oleng', 5000, 50, 250000, 'Zend', '2021-07-16', 250000),
(1128, 10, 100003, 'OBT1008', 'URr8GjAiq7', 'Obat Oleng', 5000, 50, 250000, 'Zend', '2021-07-16', 250000),
(1129, 10, 100003, 'OBT1008', 'sPk0QUMNqI', 'Obat Oleng', 5000, 20, 100000, 'Zend', '2021-07-16', 100000),
(1130, 10, 100003, 'OBT1008', 'ceFQZ13tBK', 'Obat Oleng', 5000, 20, 100000, 'Zend', '2021-07-17', 100000),
(1131, 10, 1003, 'OBT1003', 'nVMlCD26Ow', 'Vitamin-D', 2000, 20, 40000, 'Zend', '2021-07-16', 40000),
(1132, 10, 1003, 'OBT1003', 'KMhrIzoyVQ', 'Vitamin-D', 2000, 20, 40000, 'Zend', '2021-07-17', 40000),
(1133, 10, 1003, 'OBT1003', 'rBAvnJzH9I', 'Vitamin-D', 2000, 11, 22000, 'Zend', '0001-11-11', 22000),
(1134, 10, 1003, 'OBT1003', 'ML3hBEuHoJ', 'Vitamin-D', 2000, 9, 18000, 'Zend', '2021-07-17', 18000),
(1135, 10, 100003, 'OBT1008', 'giGHTKkQPO', 'Obat Oleng', 5000, 10, 50000, 'Zend', '2021-07-16', 50000),
(1136, 11, 100003, 'OBT1008', 'S9ljazY1di', 'Obat Oleng', 5000, 80, 400000, 'Dandy Rahmat Zain', '2021-07-16', 400000),
(1137, 12, 100003, 'OBT1008', '1zcmAR5yMJ', 'Obat Oleng', 5000, 10, 50000, 'Bagus', '2021-07-17', 50000),
(1138, 1, 1009, 'OBT1009', 'BMe5cHOxGt', 'Obat Biar Ga O\'on Wkwkwk', 2000, 50, 100000, 'Dandy Rahmat Zain', '2021-07-16', 100000);

--
-- Trigger `tbl_penjualan`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `tbl_penjualan` FOR EACH ROW BEGIN
UPDATE tbl_obat SET stok = stok - NEW.banyak WHERE id_obat = NEW.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_bertambah_setelah_delete` AFTER DELETE ON `tbl_penjualan` FOR EACH ROW BEGIN
	UPDATE tbl_obat SET stok = stok + OLD.banyak WHERE id_obat = OLD.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan_online`
--

CREATE TABLE `tbl_penjualan_online` (
  `id_penjualan` int(5) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(200) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `banyak` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `grandtotal` int(11) NOT NULL,
  `status_bayar` enum('Belum','Sudah') DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_penjualan_online`
--

INSERT INTO `tbl_penjualan_online` (`id_penjualan`, `id_guest`, `id_obat`, `kode_obat`, `ref`, `nama_obat`, `harga_jual`, `banyak`, `subtotal`, `nama_pembeli`, `tgl_beli`, `grandtotal`, `status_bayar`) VALUES
(2, 10, 1002, 'OBT1002', 'pdGwPEQoKF', 'Vitamin-C', 3000, 20, 60000, 'Zend', '2021-07-18', 60000, 'Sudah'),
(3, 11, 1003, 'OBT1003', 'v0gSJGl6P4', 'Vitamin-D', 2000, 10, 20000, 'Dandy', NULL, 20000, 'Belum'),
(4, 11, 1009, 'OBT1009', 'qSOLYFovrR', 'Obat Biar Ga O\'on Wkwkwk', 2000, 30, 60000, 'Dandy', '2021-07-18', 60000, 'Sudah'),
(5, 12, 1005, 'OBT1005', 'YaNIs9G4fA', 'Flu', 2000, 30, 60000, 'Bagus', '2021-07-18', 60000, 'Sudah');

--
-- Trigger `tbl_penjualan_online`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok_penjualan_online` AFTER UPDATE ON `tbl_penjualan_online` FOR EACH ROW BEGIN
UPDATE tbl_obat SET stok = stok - NEW.banyak WHERE id_obat = NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyimpanan`
--

CREATE TABLE `tbl_penyimpanan` (
  `id_penyimpanan` int(11) NOT NULL,
  `nama_penyimpanan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penyimpanan`
--

INSERT INTO `tbl_penyimpanan` (`id_penyimpanan`, `nama_penyimpanan`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3'),
(4, 'Rak 4'),
(5, 'Rak 5'),
(6, 'Rak 6'),
(7, 'Rak 7'),
(8, 'Rak 8'),
(9, 'Rak 9'),
(10, 'Rak 10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id_unit` int(2) NOT NULL,
  `nama_unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Kapsul'),
(2, 'Semprot'),
(3, 'Sirup'),
(4, 'Tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Dandy Rahmat Zain', 'dandyrahmatzain21@gmail.com', NULL, '$2y$10$JzqBC/E7V666/B134ZacT.mBCd.SJmFNnfbIDomJ93uvU.6HhIjAC', NULL, '2021-07-14 22:13:58', '2021-07-14 22:13:58', 1),
(6, 'Bagus Rafli', 'bagus@gmail.com', NULL, '$2y$10$pqYfBh6gIuB9j/HpP.8OlOo6OD09hfffheKUwc/YV1i8XP/F4CPhy', NULL, '2021-07-15 00:39:22', '2021-07-15 00:39:22', 2),
(7, 'Rahmat', 'rahmat@gmail.com', NULL, '$2y$10$8qEL2ynkPthCwKveWBGdSuzNgvlM8/0ac21DNjRW/rcEqZBfNyi5e', NULL, '2021-07-15 00:40:28', '2021-07-15 00:40:28', 3),
(8, 'Zain', 'zain@gmail.com', NULL, '$2y$10$PCrL.i06WTooUx4dOz5XC.UEp42.LXURgt7jve4jgsi4j4.ZnlCTm', NULL, '2021-07-15 00:41:02', '2021-07-15 00:41:02', 4),
(9, 'test', 'test@gmail.com', NULL, '$2y$10$bgfLYFnVwPigEeqNPOF7u.8lo654ewhulG0Q18aiUmOEJBStN7SSa', NULL, '2021-07-15 01:52:57', '2021-07-15 01:52:57', 5),
(10, 'Zend Doang', 'zend@gmail.com', NULL, '$2y$10$Fz2jGzdgUrw2LWG0x.4zuuQtASGyGoBe9oGNwDqdgG2CoH3kB/HpW', NULL, '2021-07-16 05:23:32', '2021-07-16 05:23:32', 5),
(11, 'Dandy Zen', 'dandyzen@gmail.com', NULL, '$2y$10$jkxf.Q.p/f7or4BO5/.CIuHsdSCS9/QdxQ.rLqt.4NmaSq8reIkdW', NULL, '2021-07-16 22:36:52', '2021-07-16 22:36:52', 5),
(12, 'Moch.Bagus Rafli', 'bagusrafli61@gmail.com', NULL, '$2y$10$0vqNXP.y7MSqIfm.lfp.Iuh0F3AOkFaylEhq8AhUxBjaz/4nZaITK', NULL, '2021-07-16 22:38:20', '2021-07-16 22:38:20', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`month_num`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tbl_pemasok`
--
ALTER TABLE `tbl_pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tbl_penjualan_online`
--
ALTER TABLE `tbl_penjualan_online`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tbl_penyimpanan`
--
ALTER TABLE `tbl_penyimpanan`
  ADD PRIMARY KEY (`id_penyimpanan`);

--
-- Indeks untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemasok`
--
ALTER TABLE `tbl_pemasok`
  MODIFY `id_pemasok` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1143;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan_online`
--
ALTER TABLE `tbl_penjualan_online`
  MODIFY `id_penjualan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penyimpanan`
--
ALTER TABLE `tbl_penyimpanan`
  MODIFY `id_penyimpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id_unit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
