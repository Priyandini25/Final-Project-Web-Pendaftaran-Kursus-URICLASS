-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 10:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uriclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_angsuran` varchar(9) NOT NULL,
  `paket_kursus` varchar(30) NOT NULL,
  `tf_dari_bank` varchar(15) NOT NULL,
  `tf_ke_bank` varchar(15) NOT NULL,
  `jmlh_bayar` varchar(7) NOT NULL,
  `tgl_bayar` varchar(15) NOT NULL,
  `status_pembayaran` varchar(30) NOT NULL,
  `no_peserta` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_angsuran`, `paket_kursus`, `tf_dari_bank`, `tf_ke_bank`, `jmlh_bayar`, `tgl_bayar`, `status_pembayaran`, `no_peserta`) VALUES
('1', 'HTML', 'BNI', 'BCA', '200000', '23 Juni 2021', 'LUNAS', '010'),
('2', 'PHP', 'Danamon', 'BCA', '350000', '12 Mei 2021', 'LUNAS', '035'),
('3', 'LARAVEL', 'Mandiri', 'BCA', '150000', '02 Juni 2021', 'LUNAS', '040'),
('4', 'WORDPRESS', 'BNI', 'BCA', '250000', '03 April 2021', 'LUNAS', '075'),
('5', 'MACAW', 'Mega', 'BCA', '400000', '07 Juni 2001', 'LUNAS', '050'),
('6', 'BOOTSTRAP', 'BCA', 'BCA', '300000', '08 Mei 2021', 'LUNAS', '060'),
('7', 'GITHUB', 'Mandiri', 'BCA', '600000', '25 Mei 2021', 'LUNAS', '090');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `no_peserta` varchar(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_peserta` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pendidikan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`no_peserta`, `nik`, `nama_peserta`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telepon`, `email`, `pendidikan`) VALUES
('10', '3201230989879873', 'Jeon Jungkook', 'Laki-Laki', 'Jakarta', '21 Mei 1997', 'Sedati', '082123232123', 'jk@gmail.com', 'S2'),
('100', '3214787987878721', 'Agoye', 'Laki-Laki', 'Jakarta', '07 Juni 2005', 'Cimahi', '082897898782', 'agoy@gmail.com', 'SMA'),
('20', '3243234328979879', 'Rizwan Zhafir', 'Laki-Laki', 'Sumenep', '31 Oktober 2007', 'Gunung Anyar', '089087878787', 'riz@gmail.com', 'SMP'),
('30', '3247872123879873', 'Feby Kurnia', 'Perempuan', 'Sumenep', '08 Februari 1999', 'Tambaksari', '081939049332', 'feby@gmail.com', 'S1'),
('35', '3212343234212322', 'Evie Wulansari', 'Perempuan', 'Makassar', '03 September 2002', 'Pacarkeling', '082328978987', 'evie@gmail.com', 'S1'),
('45', '3298987898789872', 'Zivana', 'Perempuan', 'Surabaya', '02 Agustus 2008', 'Sidoarjo', '087898987987', 'zie@gmail.com', 'SD'),
('50', '3234090989898732', 'Titiek Suryati', 'Perempuan', 'Bandung', '08 Mei 2005', 'Kaliwaron', '08987878987', 'titik@Gmail.com', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `level_user` varchar(150) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level_user`) VALUES
(1, 'URICLASS', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Jungkook', 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`no_peserta`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
