-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 03:17 AM
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
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chatting` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `reseller_send` text NOT NULL,
  `gudang_send` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `payment` text NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id_bj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bb_keluar`
--
ALTER TABLE `bb_keluar`
  MODIFY `id_bb_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksibb`
--
ALTER TABLE `detail_transaksibb`
  MODIFY `id_detailbb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksibj`
--
ALTER TABLE `detail_transaksibj`
  MODIFY `id_detailbj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_bb`
--
ALTER TABLE `transaksi_bb`
  MODIFY `id_tranbb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_bj`
--
ALTER TABLE `transaksi_bj`
  MODIFY `id_tranbj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
