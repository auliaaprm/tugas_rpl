-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 04:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopichuseyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(5) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tanggal_event` date NOT NULL,
  `penyelenggara` varchar(30) NOT NULL,
  `tentang` text NOT NULL,
  `cara_mendapatkan` text NOT NULL,
  `gambar_event` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'makanan'),
(2, 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(5) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga_menu` int(20) NOT NULL,
  `gambar_menu` varchar(200) NOT NULL,
  `id_kategori` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `gambar_menu`, `id_kategori`) VALUES
(1, 'Kopi Chuseyo', 4000, 'KOPI CHUSEYO.png', 0),
(2, 'Kopi Unnie', 5000, 'coffee-1.jpg', 0),
(3, 'Kopi Oppa', 10000, 'coffee-2.jpg', 0),
(4, 'Kopi Sasaeng', 15000, 'coffee-4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(5) NOT NULL,
  `nama_metode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `nama_metode`) VALUES
(1, 'Tunai'),
(2, 'OVO'),
(3, 'Dana');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(8) NOT NULL,
  `id_pesanan` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(8) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_shipment` int(3) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `receipt_number` varchar(35) NOT NULL,
  `total_item` int(11) NOT NULL DEFAULT 1,
  `total_harga` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_bayar` int(5) NOT NULL,
  `receipt_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_shipment`, `id_menu`, `receipt_number`, `total_item`, `total_harga`, `alamat`, `keterangan`, `id_bayar`, `receipt_created_date`) VALUES
(1, 2, 1, '3', 'REC/20210801/f6db255ef0259d2b6b9a', 6, 60000, '', 'keterangan', 2, '2021-08-01 15:01:18'),
(2, 2, 1, '2', 'REC/20210801/f6db255ef0259d2b6b9a', 7, 35000, '', '', 2, '2021-08-01 15:01:18'),
(3, 2, 1, '4', 'REC/20210801/de39528ba6bd88c5fcc1', 3, 45000, '', '', 2, '2021-08-01 00:00:00'),
(7, 2, 1, '1', 'REC/20210801/de39528ba6bd88c5fcc1', 5, 20000, '', '', 2, '2021-08-01 00:00:00'),
(8, 2, 3, '1', 'REC/20210801/de39528ba6bd88c5gg1', 5, 20000, '', '', 2, '2021-08-01 00:00:00'),
(9, 2, 3, '4', 'REC/20210801/62f533485d41b302ec87', 2, 30000, '', '', 1, '2021-08-01 16:33:48'),
(12, 2, 3, '3', 'REC/20210801/62f533485d41b302ec87', 1, 10000, '', '', 1, '2021-08-01 16:33:48'),
(13, 2, 3, '3', 'REC/20210801/b4a0c1f6ab7df4f506c1', 5, 50000, '', '', 2, '2021-08-01 19:33:55'),
(14, 2, 3, '2', 'REC/20210801/b4a0c1f6ab7df4f506c1', 2, 10000, '', '', 2, '2021-08-01 19:33:55'),
(15, 2, 3, '1', 'REC/20210801/b4a0c1f6ab7df4f506c1', 1, 4000, '', '', 2, '2021-08-01 19:33:55'),
(19, 2, 2, '2', 'REC/20210801/dcc2df912a7bbc15837e', 1, 25000, '', '', 1, '2021-08-01 22:25:30'),
(22, 2, 2, '3', 'REC/20210801/dcc2df912a7bbc15837e', 2, 20000, '', '', 1, '2021-08-01 22:25:30'),
(24, 2, 0, '4', '', 2, 30000, '', '', 0, '2021-08-01 22:47:42'),
(26, 2, 0, '2', '', 2, 15000, '', '', 0, '2021-08-01 22:47:43'),
(27, 2, 0, '1', '', 1, 12000, '', '', 0, '2021-08-01 22:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_rsv` int(5) NOT NULL,
  `tgl_rsv` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_reservasi` varchar(13) NOT NULL,
  `jumlah_org` int(10) NOT NULL,
  `no_meja` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_bayar` int(5) NOT NULL,
  `reservasi_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_rsv`, `tgl_rsv`, `id_user`, `kode_reservasi`, `jumlah_org`, `no_meja`, `nama`, `no_hp`, `email`, `id_bayar`, `reservasi_created_date`) VALUES
(2, '2021-08-15', 2, '3316536700834', 8, 14, 'Lee Do Hyun', '890412', 'dohyun@gmail.com', 2, '2021-08-01 19:30:56'),
(3, '2021-08-19', 2, '3866848057481', 9, 11, 'Lee Do Hyun', '081321338839', 'dohyun@gmail.com', 2, '2021-08-01 22:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `id_shipment` int(5) NOT NULL,
  `nama_shipment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id_shipment`, `nama_shipment`) VALUES
(1, 'Pick Up'),
(2, 'Dine In'),
(3, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `image`, `role_id`) VALUES
(1, 'Zaki Santoso', 'zakisans@gmail.com', '$2y$10$OvJaNrUjPSewsIEPNLka7uXNgIVlu1kHMoRw01IH6voi2Wufj0oMe', 'default.jpg', 2),
(2, 'Lee Do Hyun', 'dohyun@gmail.com', '$2y$10$1rnpHY905mXuafpWX0cW1OAB0p4gRhMmSmgiDBtOTDYIPd8C3tzj6', 'default.jpg', 2),
(3, 'Aulia', 'aulia@gmail.com', '$2y$10$ICkBukHNN5IAKSTvoc4WO.C1J2CkTFcoodlB5Ak1G0FVYwcN1Y3AS', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_rsv`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id_shipment`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_rsv` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id_shipment` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
