-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2022 pada 04.32
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krakatoa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'kasir'),
(3, 'manajer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `jenis` enum('makanan','minuman') NOT NULL,
  `harga` double NOT NULL,
  `status_masakan` enum('tersedia','habis') NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `harga`, `status_masakan`, `gambar`) VALUES
(1, 'Rendang Sapi', 'makanan', 30000, 'tersedia', '1647815512_70e3b1290ce58c623aec.jpeg'),
(2, 'Sate Madura', 'makanan', 25000, 'tersedia', '1647815545_b9e0fa69a5cf45c874fc.jpeg'),
(3, 'Nasi Campur Bali', 'makanan', 35000, 'tersedia', '1647815582_626afc3ea7f9283c4cce.jpeg'),
(4, 'Es Dawet', 'minuman', 15000, 'tersedia', '1648521177_b3ba166185a013a967e6.jpg'),
(5, 'Es Kopyor', 'minuman', 16000, 'habis', '1648521498_fc99f31532d5709fd6bd.jpg'),
(6, 'Es Campur', 'minuman', 15000, 'tersedia', '1648521264_9b882861c94d88750f22.jpg'),
(7, 'Kopi Gayo ', 'minuman', 30000, 'tersedia', '1648606625_067cdcc788a3aee5a66e.jpg'),
(8, 'Kopi Luwak', 'minuman', 15000, 'tersedia', '1648609890_871d18f97ae34f194c89.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_detail_order`, `id_order`, `id_menu`, `qty`) VALUES
(1, 1, 3, 2),
(2, 1, 2, 1),
(3, 2, 2, 2),
(4, 3, 1, 2),
(5, 4, 3, 1),
(6, 4, 6, 1),
(7, 5, 7, 1),
(8, 6, 7, 1),
(10, 8, 8, 1),
(11, 9, 6, 1),
(12, 10, 3, 2),
(13, 11, 4, 1),
(14, 12, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_user`
--

CREATE TABLE `tb_log_user` (
  `id_log_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `aksi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_log_user`
--

INSERT INTO `tb_log_user` (`id_log_user`, `id_user`, `waktu`, `aksi`) VALUES
(1, 9, '2022-03-30 03:28:33', 'User Baru | username : miftahudin'),
(2, 10, '2022-03-30 03:36:40', 'User Baru | username : Rizki'),
(4, 8, '2022-03-30 04:03:11', 'Pengguna Menghapus Order'),
(5, 8, '2022-03-30 04:05:23', 'Pengguna Menambahkan Order baru'),
(6, 8, '2022-03-30 04:10:43', 'Pengguna Menambahkan Order baru'),
(7, 8, '2022-03-30 05:41:45', 'Pengguna Menambahkan Order baru'),
(8, 6, '2022-03-30 09:11:20', 'Pengguna Menambahkan Order baru'),
(9, 10, '2022-03-30 10:09:43', 'Data user telah diubah | username : rizki'),
(10, 8, '2022-03-30 10:13:14', 'Pengguna Menambahkan Order baru'),
(11, 8, '2022-03-30 10:13:45', 'Pengguna Menambahkan Transaksi Baru'),
(12, 8, '2022-03-30 10:19:42', 'Pengguna Menambahkan Order baru'),
(13, 8, '2022-03-30 10:20:24', 'Pengguna Menambahkan Transaksi Baru'),
(14, 6, '2022-03-30 10:41:34', 'Pengguna Menambahkan Order baru'),
(15, 6, '2022-03-30 10:41:56', 'Pengguna Menambahkan Transaksi Baru'),
(16, 6, '2022-03-30 10:43:17', 'Pengguna Menambahkan Order baru'),
(17, 6, '2022-03-30 10:43:45', 'Pengguna Menambahkan Transaksi Baru'),
(18, 6, '2022-03-30 10:48:29', 'Pengguna Menghapus Order | ID ORDER =7'),
(19, 6, '2022-03-30 10:48:43', 'Pengguna Menambahkan Order baru'),
(20, 6, '2022-03-30 10:49:10', 'Pengguna Menambahkan Transaksi Baru'),
(21, 6, '2022-03-30 10:49:38', 'Pengguna Menambahkan Order baru'),
(22, 6, '2022-03-30 10:54:29', 'Pengguna Menambahkan Transaksi Baru'),
(23, 6, '2022-04-05 16:40:01', 'Pengguna Menambahkan Order baru'),
(24, 6, '2022-04-05 16:41:03', 'Pengguna Menambahkan Transaksi Baru'),
(25, 11, '2022-04-06 09:05:51', 'User Baru | username : Danda'),
(26, 11, '2022-04-06 09:06:34', 'Data user telah diubah | username : danda'),
(27, 12, '2022-04-06 09:11:04', 'User Baru | username : Haris Aulia'),
(28, 12, '2022-04-06 09:11:54', 'Data user telah diubah | username : haris'),
(29, 12, '2022-04-06 09:12:20', 'User telah dihapus | username : haris'),
(30, 8, '2022-04-06 09:22:16', 'Pengguna Menambahkan Order baru'),
(31, 8, '2022-04-06 09:23:30', 'Pengguna Menambahkan Transaksi Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status_order` enum('Belum_Bayar','Sudah_Bayar') NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `nama_pelanggan`, `no_meja`, `tanggal`, `id_user`, `status_order`, `updated_at`) VALUES
(1, 'Aditya', 5, '2022-03-30 04:05:23', 8, 'Sudah_Bayar', '2022-03-30 04:06:39'),
(2, 'Dani', 12, '2022-03-30 04:10:43', 8, 'Sudah_Bayar', '2022-03-30 04:11:34'),
(3, 'bayu', 5, '2022-03-30 05:41:45', 8, 'Sudah_Bayar', '2022-03-30 05:43:23'),
(4, 'Jossi', 13, '2022-03-30 09:11:20', 6, 'Sudah_Bayar', '2022-03-30 09:12:05'),
(5, 'Ridwan', 15, '2022-03-30 10:13:14', 8, 'Sudah_Bayar', '2022-03-30 10:13:45'),
(6, 'Teguh', 20, '2022-03-30 10:19:42', 8, 'Sudah_Bayar', '2022-03-30 10:20:24'),
(8, 'Mayda', 20, '2022-03-30 10:43:17', 6, 'Sudah_Bayar', '2022-03-30 10:43:45'),
(9, 'Yuriko', 15, '2022-03-30 10:48:43', 6, 'Sudah_Bayar', '2022-03-30 10:49:10'),
(10, 'Wilda', 20, '2022-03-30 10:49:38', 6, 'Sudah_Bayar', '2022-03-30 10:54:29'),
(11, 'Heirvandi', 3, '2022-04-05 16:40:01', 6, 'Sudah_Bayar', '2022-04-05 16:41:04'),
(12, 'Herva', 5, '2022-04-06 09:22:16', 8, 'Sudah_Bayar', '2022-04-06 09:23:30');

--
-- Trigger `tb_order`
--
DELIMITER $$
CREATE TRIGGER `OrderDelete` AFTER DELETE ON `tb_order` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (old.id_user, now(),CONCAT('Pengguna Menghapus Order | ID ORDER =',old.id_order))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLogOrder` AFTER INSERT ON `tb_order` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (new.id_user, now(),'Pengguna Menambahkan Order baru')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `total_bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 100000, 5000, '2022-03-30', NULL),
(2, 8, 2, 60000, 10000, '2022-03-30', NULL),
(3, 8, 3, 70000, 10000, '2022-03-30', '2022-03-30'),
(4, 6, 4, 60000, 10000, '2022-03-30', '2022-03-30'),
(5, 8, 5, 50000, 20000, '2022-03-30', '2022-03-30'),
(6, 8, 6, 40000, 10000, '2022-03-30', '2022-03-30'),
(8, 6, 8, 20000, 5000, '2022-03-30', '2022-03-30'),
(9, 6, 9, 50000, 35000, '2022-03-30', '2022-03-30'),
(10, 6, 10, 100000, 30000, '2022-03-30', '2022-03-30'),
(11, 6, 11, 20000, 5000, '2022-04-05', '2022-04-05'),
(12, 8, 12, 50000, 20000, '2022-04-06', '2022-04-06');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `insertTransaksi` AFTER INSERT ON `transaksi` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (new.id_user, now(),'Pengguna Menambahkan Transaksi Baru')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `id_level`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', '$2y$10$2W7LG7fnTkC7PDB/2c49TOr.nD04PzOySXCL1QmVXkr0DVygwjvu6', 1, 'user.png', '2022-03-20 22:11:51', '2022-03-21 05:11:51', NULL),
(6, 'bayu', 'Bayu', '$2y$10$bEjA6AW0LDKj2tqeTQDjO.duKYKktFTgoWh1qupsRdXtgFSLjVYui', 2, '1648480749_413d400ddc80c0cc3e3f.jpg', '2022-03-28 03:19:09', '2022-03-28 10:19:09', NULL),
(7, 'nanda', 'nanda', '$2y$10$jauf..pU8p0p7AuOIL..b.mpYfwM/SYGs5Iuhq1GYuT8ooI.vSxc.', 3, '1648481365_e8d82740b18a696d5daf.jpg', '2022-03-28 03:29:25', '2022-03-28 10:29:25', NULL),
(8, 'fahri', 'Fahri', '$2y$10$Hv/OgTbObxvvvelm9zK8eeBu9ztsErWvJsrn3MKMVS1MCo10OajDG', 2, '1648481668_6f5cb18dcada1f099ea8.jpg', '2022-03-28 03:34:29', '2022-03-28 10:34:29', NULL),
(9, 'miftahudin', 'miftahudin', '$2y$10$S1jcCbsSG9wa3VKcuQu.9O5LDKLyU0yd0612P4FxpfHFimvV.TcFC', 3, '1648585713_0a500e6dc1f225eadebf.jpg', '2022-03-29 20:28:33', '2022-03-30 03:28:33', NULL),
(10, 'rizki', 'Rizki', '$2y$10$FTbolTYzunW9zZcsNnbzfe0VdluPeRxNRRKEBeQBo/kCL15OM2ZIO', 1, '1648586200_1e2faf89026a7a4f8d27.jpg', '2022-03-29 20:36:40', '2022-03-30 10:09:43', NULL),
(11, 'danda', 'Danda', '$2y$10$F4FxYpjMA7gV4PeEtH410OPD0KTBb/4I.C7PSWRYmJPzscMKOWO6e', 2, '1649210751_309114bc0e18dca6e9cf.jpg', '2022-04-06 02:05:51', '2022-04-06 09:06:34', NULL);

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `DeleteLog` AFTER DELETE ON `user` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (old.id_user, now(), CONCAT('User telah dihapus | username : ', old.username))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateLog` AFTER UPDATE ON `user` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (new.id_user, new.updated_at, CONCAT('Data user telah diubah | username : ', old.username))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `user` FOR EACH ROW INSERT tb_log_user(id_user, waktu, aksi) VALUES (new.id_user, new.created_at, CONCAT('User Baru | username : ', new.nama))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_detail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_detail` (
`id_detail_order` int(11)
,`id_order` int(11)
,`qty` int(11)
,`nama_pelanggan` varchar(100)
,`no_meja` int(11)
,`tanggal` datetime
,`id_user` int(11)
,`nama_menu` varchar(100)
,`harga` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_order`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_order` (
`id_ord` int(11)
,`tanggal` datetime
,`no_meja` int(11)
,`nama_pelanggan` varchar(100)
,`id_usr` int(11)
,`status_order` enum('Belum_Bayar','Sudah_Bayar')
,`username` varchar(40)
,`nama` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_transaksi` (
`id_transaksi` int(11)
,`no_meja` int(11)
,`id_user` int(11)
,`nama` varchar(30)
,`created_at` date
,`tanggal` datetime
,`username` varchar(40)
,`id_level` int(11)
,`nama_pelanggan` varchar(100)
,`total_bayar` int(11)
,`kembalian` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_detail`
--
DROP TABLE IF EXISTS `v_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail`  AS  select `tb_detail_order`.`id_detail_order` AS `id_detail_order`,`tb_detail_order`.`id_order` AS `id_order`,`tb_detail_order`.`qty` AS `qty`,`tb_order`.`nama_pelanggan` AS `nama_pelanggan`,`tb_order`.`no_meja` AS `no_meja`,`tb_order`.`tanggal` AS `tanggal`,`tb_order`.`id_user` AS `id_user`,`menu`.`nama_menu` AS `nama_menu`,`menu`.`harga` AS `harga` from ((`tb_detail_order` join `tb_order` on(`tb_detail_order`.`id_order` = `tb_order`.`id_order`)) join `menu` on(`tb_detail_order`.`id_menu` = `menu`.`id_menu`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_order`
--
DROP TABLE IF EXISTS `v_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order`  AS  select `ord`.`id_order` AS `id_ord`,`ord`.`tanggal` AS `tanggal`,`ord`.`no_meja` AS `no_meja`,`ord`.`nama_pelanggan` AS `nama_pelanggan`,`ord`.`id_user` AS `id_usr`,`ord`.`status_order` AS `status_order`,`usr`.`username` AS `username`,`usr`.`nama` AS `nama` from (`tb_order` `ord` join `user` `usr` on(`ord`.`id_user` = `usr`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `tr`.`id_transaksi` AS `id_transaksi`,`ord`.`no_meja` AS `no_meja`,`usr`.`id_user` AS `id_user`,`usr`.`nama` AS `nama`,`tr`.`created_at` AS `created_at`,`ord`.`tanggal` AS `tanggal`,`usr`.`username` AS `username`,`usr`.`id_level` AS `id_level`,`ord`.`nama_pelanggan` AS `nama_pelanggan`,`tr`.`total_bayar` AS `total_bayar`,`tr`.`kembalian` AS `kembalian` from ((`transaksi` `tr` join `tb_order` `ord` on(`tr`.`id_order` = `ord`.`id_order`)) join `user` `usr` on(`usr`.`id_user` = `tr`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_menu`);

--
-- Indeks untuk tabel `tb_log_user`
--
ALTER TABLE `tb_log_user`
  ADD PRIMARY KEY (`id_log_user`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_log_user`
--
ALTER TABLE `tb_log_user`
  MODIFY `id_log_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD CONSTRAINT `tb_detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_order_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
