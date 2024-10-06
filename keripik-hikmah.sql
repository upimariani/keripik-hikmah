-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 12:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keripik-hikmah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bb` int(11) NOT NULL,
  `nama_bb` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nm_supplier` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bb`, `nama_bb`, `keterangan`, `stok`, `harga`, `nm_supplier`) VALUES
(1, 'Singkong', 'kg', 3, 10000, '4'),
(2, 'Bumbu Balado', 'bungkus', 15, 5000, '4'),
(3, 'Bumbu Asin', 'bungkus', 15, 5000, '4'),
(4, 'Bumbu Cabe', 'bungkus', 15, 5000, '4'),
(5, 'Bumbu Keju Bubuk', 'bungkus', 10, 7000, '4'),
(6, 'Plastik Ukuran Ball', 'pax', 10, 23000, '4'),
(7, 'Plastik Ukuran 1 kg', 'pax', 10, 25000, '4'),
(8, 'Plastik Ukuran 1/4 kg', 'pax', 10, 25000, '4'),
(9, 'Plastik Ukuran Kecil', 'pax', 10, 21000, '4'),
(10, 'Minyak', 'liter', 10, 12000, '4'),
(11, 'Pisang', 'kg', 10, 9000, '4'),
(12, 'Cabe ', 'kg', 10, 26000, '4'),
(13, 'Garam', 'bungkus', 10, 2000, '4'),
(14, 'Bubuk Coklat', 'kg', 10, 21000, '4'),
(15, 'Tepung Terigu', 'kg', 10, 11000, '4');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_jadi`
--

CREATE TABLE `bahan_jadi` (
  `id_bj` int(11) NOT NULL,
  `nama_bj` varchar(125) NOT NULL,
  `deskripsi` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_jadi`
--

INSERT INTO `bahan_jadi` (`id_bj`, `nama_bj`, `deskripsi`, `keterangan`, `stok`, `harga`, `gambar`) VALUES
(1, 'Singkong Pedas', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'a1.jpeg'),
(2, 'Singkong Balado', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'a2.jpeg'),
(3, 'Singkong Asin', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              </strong>\r\n              ', 'kg', 50, 10000, 'a3.jpeg'),
(4, 'Singkong Keju', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'a4.jpeg'),
(5, 'Pisang Asin', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 12000, 'images_(1).jpeg'),
(6, 'Pisang Coklat', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 12000, 'images_(1)1.jpeg'),
(7, 'Basreng Asin', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'images_(2).jpeg'),
(8, 'Basreng Pedas', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'images_(2)1.jpeg'),
(9, 'Basreng Balado', '                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>\r\n              ', 'kg', 50, 10000, 'images_(2)2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `bb_keluar`
--

CREATE TABLE `bb_keluar` (
  `id_bb_keluar` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `tgl_keluar` varchar(15) NOT NULL,
  `qty_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_keluar`
--

INSERT INTO `bb_keluar` (`id_bb_keluar`, `id_bb`, `tgl_keluar`, `qty_keluar`) VALUES
(1, 1, '2024-09-23', 3),
(3, 1, '2024-09-27', 2),
(4, 1, '2024-10-01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chatting` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `reseller_send` text NOT NULL DEFAULT '0',
  `gudang_send` text NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stat_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chatting`, `id_user`, `id_reseller`, `reseller_send`, `gudang_send`, `time`, `stat_read`) VALUES
(3, 2, 1, 'halo gudang, mau bertanya, apakah produk keripik ready?', '0', '2024-10-04 04:02:58', 1),
(4, 2, 1, '0', 'halo', '2024-10-04 04:02:58', 1),
(5, 2, 1, '0', 'ready kak', '2024-10-04 04:02:58', 1),
(6, 2, 2, 'haloo kak', '0', '2024-10-04 04:03:02', 1),
(7, 2, 2, 'apakah basreng pedas ready?', '0', '2024-10-04 04:03:02', 1),
(8, 2, 2, '0', 'ready kak ...', '2024-10-04 04:03:02', 1),
(9, 4, 3, '0', 'supplier', '2024-10-06 10:11:49', 1),
(10, 4, 3, 'iya gudang', '0', '2024-10-06 10:11:49', 1),
(11, 4, 3, 'ada yang bisa di bantu?', '0', '2024-10-06 10:11:49', 1),
(12, 4, 3, 'ada yang bisa di bantu?', '0', '2024-10-06 10:11:49', 1),
(13, 2, 1, 'terimakasih', '0', '2024-10-06 10:05:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksibb`
--

CREATE TABLE `detail_transaksibb` (
  `id_detailbb` int(11) NOT NULL,
  `id_tranbb` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `qty_bb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksibb`
--

INSERT INTO `detail_transaksibb` (`id_detailbb`, `id_tranbb`, `id_bb`, `qty_bb`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 20),
(3, 3, 1, 20),
(4, 4, 3, 4),
(5, 4, 2, 8),
(6, 4, 4, 20),
(7, 5, 2, 5),
(8, 5, 3, 5),
(9, 5, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksibj`
--

CREATE TABLE `detail_transaksibj` (
  `id_detailbj` int(11) NOT NULL,
  `id_tranbj` int(11) NOT NULL,
  `id_bj` int(11) NOT NULL,
  `qty_bj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksibj`
--

INSERT INTO `detail_transaksibj` (`id_detailbj`, `id_tranbj`, `id_bj`, `qty_bj`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 3, 1, 1),
(4, 3, 5, 1),
(5, 4, 2, 2),
(6, 4, 3, 1),
(7, 4, 8, 1),
(8, 4, 9, 1),
(9, 5, 1, 1),
(10, 6, 1, 100),
(11, 6, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` int(11) NOT NULL,
  `nama_reseller` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `nama_reseller`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Dini Sa', 'Kuningan', '089987654543', 'dini', 'dini'),
(2, 'Kiki', 'Kuningan, Jawa Barat', '089987654543', 'kiki', 'kiki');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bb`
--

CREATE TABLE `transaksi_bb` (
  `id_tranbb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` varchar(15) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `time_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_bb`
--

INSERT INTO `transaksi_bb` (`id_tranbb`, `id_user`, `tgl_transaksi`, `total_pembayaran`, `status`, `pembayaran`, `time_update`, `bukti_bayar`) VALUES
(1, 4, '2024-09-23', 30000, 3, 1, '2024-09-24 11:49:00', 'download.jpeg'),
(2, 5, '2024-09-25', 200000, 0, 0, '2024-10-04 03:53:33', '0'),
(3, 4, '2024-09-25', 200000, 0, 0, '2024-09-25 09:07:14', '0'),
(4, 4, '2024-09-27', 160000, 1, 1, '2024-09-27 01:31:09', 'download1.jpeg'),
(5, 4, '2024-10-01', 75000, 3, 1, '2024-10-01 08:53:14', 'download2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bj`
--

CREATE TABLE `transaksi_bj` (
  `id_tranbj` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `tgl_transaksi` varchar(15) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `stat_selesai` int(11) NOT NULL,
  `payment` text NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `stat_res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_bj`
--

INSERT INTO `transaksi_bj` (`id_tranbj`, `id_reseller`, `tgl_transaksi`, `total_pembayaran`, `status`, `stat_selesai`, `payment`, `alamat_pengiriman`, `stat_res`) VALUES
(1, 1, '2024-09-24', 10000, 3, 1, 'download.jpeg', '', 1),
(2, 1, '2024-09-25', 10000, 3, 1, 'download1.jpeg', '', 1),
(3, 1, '2024-09-27', 22000, 0, 0, '0', '', 0),
(4, 2, '2024-10-01', 50000, 3, 1, 'download2.jpeg', '', 0),
(5, 2, '2024-10-01', 10000, 0, 0, '0', '', 0),
(6, 1, '2024-10-06', 700000, 0, 0, '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `lev_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `lev_user`) VALUES
(1, 'Admin', 'admin', 'admin', 1),
(2, 'Pemilik', 'pemilik', 'pemilik', 4),
(3, 'Gudang', 'gudang', 'gudang', 2),
(4, 'Supplier 1', 'supplier', 'supplier', 3),
(5, 'Supplier 2', 'supplier2', 'supplier2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indexes for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  ADD PRIMARY KEY (`id_bj`);

--
-- Indexes for table `bb_keluar`
--
ALTER TABLE `bb_keluar`
  ADD PRIMARY KEY (`id_bb_keluar`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `detail_transaksibb`
--
ALTER TABLE `detail_transaksibb`
  ADD PRIMARY KEY (`id_detailbb`);

--
-- Indexes for table `detail_transaksibj`
--
ALTER TABLE `detail_transaksibj`
  ADD PRIMARY KEY (`id_detailbj`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indexes for table `transaksi_bb`
--
ALTER TABLE `transaksi_bb`
  ADD PRIMARY KEY (`id_tranbb`);

--
-- Indexes for table `transaksi_bj`
--
ALTER TABLE `transaksi_bj`
  ADD PRIMARY KEY (`id_tranbj`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id_bj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bb_keluar`
--
ALTER TABLE `bb_keluar`
  MODIFY `id_bb_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_transaksibb`
--
ALTER TABLE `detail_transaksibb`
  MODIFY `id_detailbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_transaksibj`
--
ALTER TABLE `detail_transaksibj`
  MODIFY `id_detailbj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_bb`
--
ALTER TABLE `transaksi_bb`
  MODIFY `id_tranbb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_bj`
--
ALTER TABLE `transaksi_bj`
  MODIFY `id_tranbj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
