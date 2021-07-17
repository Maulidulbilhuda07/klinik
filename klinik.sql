-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 02:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `satuan`, `harga`, `stok`, `gambar`) VALUES
(8, 'enervon-c', 'tablet', 'kotak', 50000, 79, 'avatar-1.png'),
(9, 'paracetamol', 'pil', 'kotak', 25000, 80, 'avatar-1.png'),
(10, 'stopcold', 'kappsul', 'buat', 15000, 78, 'avatar-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `nohp` varchar(17) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Pasien',
  `foto` text DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tgl_lahir`, `umur`, `nohp`, `alamat`, `jk`, `status`, `foto`, `username`, `password`) VALUES
(17, 'Maulidul Bilhuda', '1997-07-17', 24, '0b2284641733', 'payakumbuh', 'Laki-laki', 'Dokter', 'img2.jpg', 'abil', 'abil'),
(18, 'jhon doe', '2018-03-23', 3, '082345678900', 'padang', 'Perempuan', 'Admin', 'avatar-2.png', 'admin', 'admin'),
(19, 'kasir', '2014-06-13', 7, '123456789090', 'sumatera barat', 'Perempuan', 'Kasir', 'avatar-5.png', 'kasir', 'kasir'),
(20, 'ijay', '2016-01-13', 5, '68867676476778777', 'padang', 'Perempuan', 'Dokter', 'avatar-4.png', 'ijay', 'ijay');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tindakan`, `id_user`, `id_pegawai`, `id_pendaftaran`, `total_bayar`) VALUES
(9, 12, 12, 17, 12, 340000),
(10, 12, 12, 17, 16, 325000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `status_pendaftaran` varchar(25) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_user`, `id_pegawai`, `id_tindakan`, `tgl_pendaftaran`, `status_pendaftaran`) VALUES
(12, 22, 17, 12, '2021-07-17', 'Transaksi Selesai'),
(13, 23, 20, 11, '2021-08-18', 'Dalam Proses Pembayaran'),
(14, 24, 17, 13, '2021-10-14', 'Dalam Proses Pembayaran'),
(15, 24, 20, 13, '2021-07-20', 'Pending'),
(16, 25, 17, 12, '2021-07-29', 'Transaksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_user`, `id_pegawai`, `id_tindakan`, `id_pendaftaran`, `id_obat`, `solusi`) VALUES
(33, 22, 17, 12, 12, 9, '<p>rajin makan obat</p>\r\n\r\n<p>hindari keramaian</p>\r\n\r\n<p>pakai masker</p>\r\n'),
(34, 22, 17, 12, 12, 10, '<p>rajin makan obat</p>\r\n\r\n<p>hindari keramaian</p>\r\n\r\n<p>pakai masker</p>\r\n'),
(35, 24, 17, 13, 14, 9, '<p>rajin minum</p>\r\n'),
(36, 23, 20, 11, 13, 10, ''),
(37, 25, 17, 12, 16, 9, '<p>banyak minum air</p>\r\n\r\n<p>olahraga</p>\r\n\r\n<p>mengunakan masker</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `tindakan` text NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `tindakan`, `biaya`) VALUES
(11, 'pemerikasaan paru paru', 250000),
(12, 'pemeriksaan batu ginjal', 300000),
(13, 'cek darah', 100000),
(14, 'pemeriksaan gula batu', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `nohp` varchar(17) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Pasien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tgl_lahir`, `umur`, `nohp`, `alamat`, `jk`, `status`) VALUES
(22, 'michel', '2016-01-23', 5, '0867685475697', 'jakarta', 'Laki-laki', 'Pasien'),
(23, 'bro si bro', '2009-07-28', 12, '1235687898095656', 'medan', 'Laki-laki', 'Pasien'),
(24, 'fatma', '2016-09-28', 5, '77557653547897897', 'jawa barat', 'Perempuan', 'Pasien'),
(25, 'rani', '2008-01-21', 13, '8675544444466666', 'payakumbuh', 'Perempuan', 'Pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
