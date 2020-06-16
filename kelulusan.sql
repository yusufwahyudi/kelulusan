-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 10:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelulusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `un_konfigurasi`
--

CREATE TABLE `un_konfigurasi` (
  `id` int(11) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_pengumuman` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_konfigurasi`
--

INSERT INTO `un_konfigurasi` (`id`, `sekolah`, `tahun`, `tgl_pengumuman`) VALUES
(2, 'SMK Negeri 1 Mootilango', 2020, '2020-04-18 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `un_siswa`
--

CREATE TABLE `un_siswa` (
  `no_ujian` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmplhr` varchar(50) NOT NULL,
  `tgllhr` varchar(50) NOT NULL,
  `ortu` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `komli` varchar(100) NOT NULL,
  `prog` varchar(100) NOT NULL,
  `us_pai` double NOT NULL,
  `us_ppkn` double NOT NULL,
  `us_bin` double NOT NULL,
  `us_mat` double NOT NULL,
  `us_sej` double NOT NULL,
  `us_bing` double NOT NULL,
  `us_seni` double NOT NULL,
  `us_pjok` double NOT NULL,
  `us_paq` double NOT NULL,
  `us_sim` double NOT NULL,
  `us_fis` double NOT NULL,
  `us_kim` double NOT NULL,
  `us_dkk` double NOT NULL,
  `us_kk` double NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_siswa`
--

INSERT INTO `un_siswa` (`no_ujian`, `nama`, `tmplhr`, `tgllhr`, `ortu`, `nis`, `nisn`, `komli`, `prog`, `us_pai`, `us_ppkn`, `us_bin`, `us_mat`, `us_sej`, `us_bing`, `us_seni`, `us_pjok`, `us_paq`, `us_sim`, `us_fis`, `us_kim`, `us_dkk`, `us_kk`, `status`) VALUES
('10-100-1000-1', 'PANDI NUGROHO', 'Gorontalo', '10 Desember 2003', 'Nugroho Purbo', '1234', '123-456-100', 'Teknok Komputer Dan Jaringan', 'Teknik Komputer Dan Informatika', 70, 80, 90, 70, 90, 80, 70, 80, 90, 70, 90, 80, 70, 80, 1),
('10-100-1000-2', 'EMMA KURNIAWATI HASAN', 'Gorontalo', '13 Januari 2004', 'Marten Hasan', '1235', '123-456-101', 'Teknik Komputer Dan Jaringan', 'Teknik Komputer Dan Informatika', 50, 60, 60, 50, 60, 60, 70, 60, 90, 70, 90, 80, 70, 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `un_user`
--

CREATE TABLE `un_user` (
  `UID` tinyint(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_user`
--

INSERT INTO `un_user` (`UID`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `un_konfigurasi`
--
ALTER TABLE `un_konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `un_siswa`
--
ALTER TABLE `un_siswa`
  ADD PRIMARY KEY (`no_ujian`);

--
-- Indexes for table `un_user`
--
ALTER TABLE `un_user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `un_konfigurasi`
--
ALTER TABLE `un_konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `un_user`
--
ALTER TABLE `un_user`
  MODIFY `UID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
