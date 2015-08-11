-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2015 at 05:09 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aids`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa1`
--

CREATE TABLE IF NOT EXISTS `diagnosa1` (
  `kode_diagnosa1` varchar(5) NOT NULL,
  `kode_indikator1` varchar(5) NOT NULL,
  `kode_solusi1` varchar(5) NOT NULL,
  `presentase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa2`
--

CREATE TABLE IF NOT EXISTS `diagnosa2` (
  `kode_diagnosa2` varchar(5) NOT NULL,
  `kode_indikator2` varchar(5) NOT NULL,
  `kode_solusi2` varchar(5) NOT NULL,
  `kode_stadium` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indikator1`
--

CREATE TABLE IF NOT EXISTS `indikator1` (
  `kode_indikator1` int(5) NOT NULL,
  `ket_indikator1` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator1`
--

INSERT INTO `indikator1` (`kode_indikator1`, `ket_indikator1`) VALUES
(8, 'kartika sukma');

-- --------------------------------------------------------

--
-- Table structure for table `indikator2`
--

CREATE TABLE IF NOT EXISTS `indikator2` (
  `kode_indikator2` int(5) NOT NULL,
  `ket_indikator2` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator2`
--

INSERT INTO `indikator2` (`kode_indikator2`, `ket_indikator2`) VALUES
(4, 'nnn');

-- --------------------------------------------------------

--
-- Table structure for table `pemakai`
--

CREATE TABLE IF NOT EXISTS `pemakai` (
  `kode_pemakai` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','W') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencegahankhusus`
--

CREATE TABLE IF NOT EXISTS `pencegahankhusus` (
  `kode_pencegahankhusus` int(5) NOT NULL,
  `pencegahan_khusus` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencegahanprimer`
--

CREATE TABLE IF NOT EXISTS `pencegahanprimer` (
  `kode_pencegahanprimer` int(5) NOT NULL,
  `konsep_abcd` varchar(50) NOT NULL,
  `pencegahan_primer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solusi1`
--

CREATE TABLE IF NOT EXISTS `solusi1` (
  `kode_solusi1` int(5) NOT NULL,
  `ket_solusi1` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi1`
--

INSERT INTO `solusi1` (`kode_solusi1`, `ket_solusi1`) VALUES
(10, 'jaga kesehatan jiwa');

-- --------------------------------------------------------

--
-- Table structure for table `solusi2`
--

CREATE TABLE IF NOT EXISTS `solusi2` (
  `kode_solusi2` int(5) NOT NULL,
  `nama_stadium` varchar(20) NOT NULL,
  `ket_solusi2` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi2`
--

INSERT INTO `solusi2` (`kode_solusi2`, `nama_stadium`, `ket_solusi2`) VALUES
(8, 'Stadium 1', 'jaga kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE IF NOT EXISTS `stadium` (
  `kode_stadium` int(5) NOT NULL,
  `nama_stadium` varchar(30) NOT NULL,
  `ket_stadium` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`kode_stadium`, `nama_stadium`, `ket_stadium`) VALUES
(5, 'Stadium 1', 'khflkadhflk');

-- --------------------------------------------------------

--
-- Table structure for table `tahap`
--

CREATE TABLE IF NOT EXISTS `tahap` (
  `kode_tahap` int(5) NOT NULL,
  `nama_tahap` int(50) NOT NULL,
  `ket_tahap` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`) VALUES
(1, 'kartika', '2aca90f14de1638d56273cf4ff6b537d', 'programmer'),
(3, 'erni', 'kartikasukma', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa1`
--
ALTER TABLE `diagnosa1`
  ADD PRIMARY KEY (`kode_diagnosa1`);

--
-- Indexes for table `diagnosa2`
--
ALTER TABLE `diagnosa2`
  ADD PRIMARY KEY (`kode_diagnosa2`);

--
-- Indexes for table `indikator1`
--
ALTER TABLE `indikator1`
  ADD PRIMARY KEY (`kode_indikator1`);

--
-- Indexes for table `indikator2`
--
ALTER TABLE `indikator2`
  ADD PRIMARY KEY (`kode_indikator2`);

--
-- Indexes for table `pemakai`
--
ALTER TABLE `pemakai`
  ADD PRIMARY KEY (`kode_pemakai`);

--
-- Indexes for table `pencegahankhusus`
--
ALTER TABLE `pencegahankhusus`
  ADD PRIMARY KEY (`kode_pencegahankhusus`);

--
-- Indexes for table `pencegahanprimer`
--
ALTER TABLE `pencegahanprimer`
  ADD PRIMARY KEY (`kode_pencegahanprimer`);

--
-- Indexes for table `solusi1`
--
ALTER TABLE `solusi1`
  ADD PRIMARY KEY (`kode_solusi1`);

--
-- Indexes for table `solusi2`
--
ALTER TABLE `solusi2`
  ADD PRIMARY KEY (`kode_solusi2`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`kode_stadium`);

--
-- Indexes for table `tahap`
--
ALTER TABLE `tahap`
  ADD PRIMARY KEY (`kode_tahap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator1`
--
ALTER TABLE `indikator1`
  MODIFY `kode_indikator1` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `indikator2`
--
ALTER TABLE `indikator2`
  MODIFY `kode_indikator2` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pencegahankhusus`
--
ALTER TABLE `pencegahankhusus`
  MODIFY `kode_pencegahankhusus` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pencegahanprimer`
--
ALTER TABLE `pencegahanprimer`
  MODIFY `kode_pencegahanprimer` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solusi1`
--
ALTER TABLE `solusi1`
  MODIFY `kode_solusi1` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `solusi2`
--
ALTER TABLE `solusi2`
  MODIFY `kode_solusi2` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stadium`
--
ALTER TABLE `stadium`
  MODIFY `kode_stadium` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
