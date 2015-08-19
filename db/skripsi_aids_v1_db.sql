-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2015 at 02:16 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_aids_v1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `com_menu`
--

CREATE TABLE IF NOT EXISTS `com_menu` (
  `nav_id` int(11) unsigned NOT NULL,
  `portal_id` int(11) unsigned DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_desc` varchar(100) DEFAULT NULL,
  `nav_url` varchar(100) DEFAULT NULL,
  `nav_no` int(11) unsigned DEFAULT NULL,
  `active_st` enum('1','0') DEFAULT '1',
  `display_st` enum('1','0') DEFAULT '1',
  `nav_icon` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=600 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_menu`
--

INSERT INTO `com_menu` (`nav_id`, `portal_id`, `parent_id`, `nav_title`, `nav_desc`, `nav_url`, `nav_no`, `active_st`, `display_st`, `nav_icon`, `mdb`, `mdd`) VALUES
(1, 1, 0, 'Home', 'Selamat Datang', 'home/adminwelcome', 1, '1', '1', NULL, 1, '2011-11-28 11:39:00'),
(2, 1, 0, 'Settings', 'Pengaturan', 'settings/adminportal', 2, '1', '1', NULL, 1, '2011-11-28 11:45:06'),
(3, 1, 2, 'Application', 'Pengaturan aplikasi', '-', 21, '1', '1', NULL, 1, '2011-11-28 13:16:54'),
(4, 1, 3, 'Web Portal', 'Pengelolaan web portal', 'settings/adminportal', 211, '1', '1', NULL, 1, '2011-11-28 13:17:34'),
(5, 1, 3, 'Users', 'Pengelolaan pengguna', 'settings/adminuser', 212, '1', '1', NULL, 1, '2011-11-28 13:21:10'),
(6, 1, 3, 'Roles', 'Pengelolaan hak akses', 'settings/adminrole', 213, '1', '1', NULL, 1, '2011-11-28 13:21:36'),
(7, 1, 3, 'Navigation', 'Pengelolaan menu', 'settings/adminmenu', 214, '1', '1', NULL, 1, '2011-11-28 13:22:03'),
(8, 1, 3, 'Permissions', 'Pengelolaan hak akses pengguna', 'settings/adminpermissions', 215, '1', '1', NULL, 1, '2011-11-28 13:22:30'),
(9, 1, 3, 'Preferences', 'Pengelolaan preferences', 'settings/adminpreferences', 216, '1', '0', NULL, 1, '2011-11-28 13:23:39'),
(199, 1, 1, 'Admin Profile', '-', 'settings/adminprofile', 1, '1', '0', NULL, 1, '2014-08-06 10:01:31'),
(574, 2, 0, 'Dashboard', 'Dashboard', 'operator/welcome', 1, '1', '1', 'fa-dashboard', 1, '2015-08-03 09:00:30'),
(576, 2, 575, 'Data PSB', 'Data PSB', 'psb/data', 1, '1', '1', NULL, 1, '2015-08-03 09:04:33'),
(577, 2, 575, 'Pembayaran Pendaftaran', 'Pembayaran Pendaftaran', 'psb/pembayaran', 2, '1', '1', NULL, 1, '2015-08-03 09:05:50'),
(578, 2, 575, 'Pendaftaran PSB', 'Pendaftaran PSB', 'psb/pendaftaran', 3, '1', '1', NULL, 1, '2015-08-03 09:07:03'),
(579, 2, 575, 'Seleksi Administrasi', 'Seleksi Administrasi', 'psb/seleksi', 4, '1', '1', NULL, 1, '2015-08-03 09:07:33'),
(580, 2, 575, 'Pembayaran Her-Registrasi', 'Pembayaran Her-Registrasi', 'psb/herregistrasi', 5, '1', '1', NULL, 1, '2015-08-03 09:08:03'),
(581, 2, 575, 'Penempatan Siswa Baru', 'Penempatan Siswa Baru', 'psb/penempatan', 6, '1', '1', NULL, 1, '2015-08-03 09:08:30'),
(582, 2, 0, 'Pengaturan', 'Pengaturan', '#', 14, '1', '1', 'fa-wrench', 1, '2015-08-03 20:20:02'),
(583, 2, 582, 'Preference', 'Preference', 'pengaturan/preference', 15, '1', '1', '', 1, '2015-08-03 20:22:21'),
(584, 2, 582, 'Operator', 'Operator', 'pengaturan/operator', 16, '1', '1', '', 1, '2015-08-03 20:22:57'),
(587, 2, 586, 'Kelas', 'Kelas', 'master/kelas', 1, '1', '1', '', 1, '2015-08-11 18:37:50'),
(588, 2, 0, 'Indikator', 'Indikator', 'indikator', 4, '1', '1', 'fa-asterisk', 1, '2015-08-17 18:57:26'),
(589, 2, 588, 'Indikator 1', 'Indikator 1', 'indikator/indikator1', 5, '1', '1', 'fa-angle-double-up', 1, '2015-08-17 18:58:45'),
(590, 2, 588, 'Indikator 2', 'Indikator 2', 'indikator/indikator2', 6, '1', '1', 'fa-angle-double-up', 1, '2015-08-17 19:02:17'),
(591, 2, 0, 'Stadium', 'Stadium', 'Stadium', 7, '1', '1', 'fa-building', 1, '2015-08-17 20:24:01'),
(592, 2, 0, 'Solusi', 'Solusi', 'Solusi', 8, '1', '1', 'fa-arrows', 1, '2015-08-18 14:05:27'),
(593, 2, 592, 'Solusi 1', 'Solusi 1', 'solusi/solusi1', 9, '1', '1', 'fa-angle-right', 1, '2015-08-18 14:06:54'),
(594, 2, 592, 'Solusi 2', 'Solusi 2', 'solusi/solusi2', 10, '1', '1', 'fa-angle-right', 1, '2015-08-18 14:07:58'),
(595, 2, 0, 'Pencegahan', 'Pencegahan', 'pencegahan', 11, '1', '1', 'fa-briefcase', 1, '2015-08-18 14:39:45'),
(596, 2, 595, 'Pencegahan Primer', 'Pencegahan Primer', 'pencegahan/pencegahanprimer', 12, '1', '1', 'fa-arrow-right', 1, '2015-08-18 14:40:30'),
(597, 2, 595, 'Pencegahan Khusus', 'Pencegahan Khusus', 'pencegahan/pencegahankhusus', 13, '1', '1', 'fa-arrow-right', 1, '2015-08-18 14:41:04'),
(598, 2, 0, 'Tentang Aids', 'Tentang Aids', 'tentangaids', 2, '1', '1', 'fa-bitbucket', 1, '2015-08-19 16:46:33'),
(599, 2, 0, 'Tentang KPA', 'Tentang KPA', 'tentangkpa', 3, '1', '1', 'fa-gear', 1, '2015-08-19 16:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `com_portal`
--

CREATE TABLE IF NOT EXISTS `com_portal` (
  `portal_id` int(11) unsigned NOT NULL,
  `portal_nm` varchar(50) DEFAULT NULL,
  `site_title` varchar(100) DEFAULT NULL,
  `site_desc` varchar(100) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_portal`
--

INSERT INTO `com_portal` (`portal_id`, `portal_nm`, `site_title`, `site_desc`, `meta_desc`, `meta_keyword`, `mdb`, `mdd`) VALUES
(1, 'Developer Area', 'CiSmart 3.0 Developer Site', '-', '-', '-', 1, '2014-12-27 09:35:59'),
(2, 'Sistem Pakar Diagnosa HIV AIDS', 'Sistem Pakar Diagnosa HIV AIDS', 'Sistem Pakar Diagnosa HIV AIDS', '-', '-', 1, '2015-08-17 18:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `com_preferences`
--

CREATE TABLE IF NOT EXISTS `com_preferences` (
  `pref_id` int(11) unsigned NOT NULL,
  `pref_group` varchar(50) DEFAULT NULL,
  `pref_nm` varchar(50) DEFAULT NULL,
  `pref_value` varchar(255) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_preferences`
--

INSERT INTO `com_preferences` (`pref_id`, `pref_group`, `pref_nm`, `pref_value`, `mdb`, `mdd`) VALUES
(11, 'ujian', 'waktu', '60', 2, '2015-03-06 02:10:06'),
(12, 'ujian', 'soal', '20', 2, '2015-03-06 02:10:17'),
(13, 'ujian', 'score', '70', 2, '2015-03-17 16:01:03'),
(14, 'ujian', 'her', '2', 18, '2015-04-24 08:25:33'),
(15, 'ujian', 'her_waktu', '15', 2, '2015-03-17 16:02:05'),
(24, 'sekolah', 'alamat', 'Purworejo', 2, '2015-08-11 15:03:08'),
(25, 'sekolah', 'tingkat', 'SMK', 2, '2015-08-11 15:03:08'),
(26, 'tingkat', 'sekolah', 'SD', NULL, NULL),
(27, 'tingkat', 'sekolah', 'SLTP', NULL, NULL),
(28, 'tingkat', 'sekolah', 'SMA', NULL, NULL),
(29, 'tingkat', 'sekolah', 'SMK', NULL, NULL),
(30, 'kelas', 'SD', '1', NULL, NULL),
(31, 'kelas', 'SD', '2', NULL, NULL),
(32, 'kelas', 'SD', '3', NULL, NULL),
(33, 'kelas', 'SD', '4', NULL, NULL),
(34, 'kelas', 'SD', '5', NULL, NULL),
(35, 'kelas', 'SD', '6', NULL, NULL),
(36, 'kelas', 'SLTP', '7', NULL, NULL),
(37, 'kelas', 'SLTP', '8', NULL, NULL),
(38, 'kelas', 'SLTP', '9', NULL, NULL),
(39, 'kelas', 'SMA', '10', NULL, NULL),
(40, 'kelas', 'SMA', '11', NULL, NULL),
(41, 'kelas', 'SMA', '12', NULL, NULL),
(44, 'agama', 'nama', 'ISLAM', NULL, NULL),
(45, 'agama', 'nama', 'PROTESTAN', NULL, NULL),
(46, 'agama', 'nama', 'BUDHA', NULL, NULL),
(47, 'agama', 'nama', 'KATHOLIK', NULL, NULL),
(48, 'agama', 'nama', 'HINDU', NULL, NULL),
(49, 'nikah', 'status', 'LAJANG', NULL, NULL),
(50, 'nikah', 'status', 'DUDA', NULL, NULL),
(51, 'nikah', 'status', 'JANDA', NULL, NULL),
(52, 'tingkat', 'pendidikan', 'SD', NULL, NULL),
(53, 'tingkat', 'pendidikan', 'SLTP', NULL, NULL),
(54, 'tingkat', 'pendidikan', 'SMA', NULL, NULL),
(55, 'tingkat', 'pendidikan', 'SMK', NULL, NULL),
(56, 'tingkat', 'pendidikan', 'D1', NULL, NULL),
(57, 'tingkat', 'pendidikan', 'D2', NULL, NULL),
(58, 'tingkat', 'pendidikan', 'D3', NULL, NULL),
(59, 'sekolah', 'nama', 'SMK Taman Karya Madya Purworejo', 2, '2015-08-11 15:03:08'),
(60, 'tingkat', 'pendidikan', 'D4', 23, '2015-06-20 10:19:10'),
(61, 'tingkat', 'pendidikan', 'S1', NULL, NULL),
(62, 'tingkat', 'pendidikan', 'S2', NULL, NULL),
(63, 'tingkat', 'pendidikan', 'S3', NULL, NULL),
(77, 'agama', 'nama', 'Lainnya', NULL, NULL),
(78, 'cuti', 'batas', '12', NULL, NULL),
(79, 'biaya', 'pendaftaran', '100000', 23, '2015-07-11 10:42:35'),
(80, 'biaya', 'herregistrasi', '15000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `com_role`
--

CREATE TABLE IF NOT EXISTS `com_role` (
  `role_id` int(11) unsigned NOT NULL,
  `portal_id` int(11) unsigned DEFAULT NULL,
  `role_nm` varchar(50) DEFAULT NULL,
  `role_desc` varchar(100) DEFAULT NULL,
  `default_page` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_role`
--

INSERT INTO `com_role` (`role_id`, `portal_id`, `role_nm`, `role_desc`, `default_page`, `mdb`, `mdd`) VALUES
(1, 1, 'Developer', '', 'home/adminwelcome', 1, '2015-08-02 12:03:49'),
(11, 2, 'Kepala Sekolah', '', 'operator/welcome', 1, '2015-08-02 12:03:50'),
(12, 2, 'Guru Mata Pelajaran', '', 'operator/welcome', 1, '2015-08-02 12:03:50'),
(13, 2, 'Wali Kelas', '', 'operator/welcome', 1, '2015-08-02 12:03:50'),
(14, 2, 'Siswa dan Orang Tua', '', 'operator/welcome', 1, '2015-08-02 12:03:51'),
(15, 2, 'Staff Administrasi', '', 'operator/welcome', 1, '2015-08-02 12:03:51'),
(16, 2, 'Staff Akademik', '', 'operator/welcome', 1, '2015-08-02 12:03:51'),
(17, 2, 'Guru BP', '', 'operator/welcome', 1, '2015-08-02 12:05:16'),
(18, 2, 'IT Support', '', 'operator/welcome', 1, '2015-08-02 12:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `com_role_menu`
--

CREATE TABLE IF NOT EXISTS `com_role_menu` (
  `role_id` int(11) unsigned NOT NULL,
  `nav_id` int(11) unsigned NOT NULL,
  `role_tp` varchar(4) NOT NULL DEFAULT '1111'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_role_menu`
--

INSERT INTO `com_role_menu` (`role_id`, `nav_id`, `role_tp`) VALUES
(1, 1, '1111'),
(1, 2, '1111'),
(1, 3, '1111'),
(1, 4, '1111'),
(1, 5, '1111'),
(1, 6, '1111'),
(1, 7, '1111'),
(1, 8, '1111'),
(1, 9, '1111'),
(1, 199, '1111'),
(18, 574, '1111'),
(18, 582, '1111'),
(18, 583, '1111'),
(18, 584, '1111'),
(18, 588, '1111'),
(18, 589, '1111'),
(18, 590, '1111'),
(18, 591, '1111'),
(18, 592, '1111'),
(18, 593, '1111'),
(18, 594, '1111'),
(18, 595, '1111'),
(18, 596, '1111'),
(18, 597, '1111'),
(18, 598, '1111'),
(18, 599, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `com_role_user`
--

CREATE TABLE IF NOT EXISTS `com_role_user` (
  `role_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_role_user`
--

INSERT INTO `com_role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `com_user`
--

CREATE TABLE IF NOT EXISTS `com_user` (
  `user_id` int(11) unsigned NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_key` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_st` enum('admin','otoritas') DEFAULT 'otoritas',
  `lock_st` enum('1','0') DEFAULT '0',
  `operator_name` varchar(50) DEFAULT NULL,
  `operator_gender` varchar(50) DEFAULT NULL,
  `operator_birth_place` varchar(50) DEFAULT NULL,
  `operator_birth_day` date DEFAULT NULL,
  `operator_address` varchar(100) DEFAULT NULL,
  `operator_phone` varchar(50) DEFAULT NULL,
  `operator_photo` varchar(50) DEFAULT NULL,
  `operator_identitas` varchar(50) DEFAULT NULL,
  `operator_jabatan` varchar(50) DEFAULT NULL,
  `operator_nip` varchar(50) DEFAULT NULL,
  `mdb` int(11) unsigned DEFAULT NULL,
  `mdd` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_user`
--

INSERT INTO `com_user` (`user_id`, `user_name`, `user_pass`, `user_key`, `user_mail`, `user_st`, `lock_st`, `operator_name`, `operator_gender`, `operator_birth_place`, `operator_birth_day`, `operator_address`, `operator_phone`, `operator_photo`, `operator_identitas`, `operator_jabatan`, `operator_nip`, `mdb`, `mdd`) VALUES
(1, 'kartika', 'q2FbpXEkHWIaetk9KnWFMQf2QQv4xVlwU6rYmKYpqGe6V72XUmWa84v5oSnJDe0kNi9PIvDK0F5MX84dEa/JAg==', '1266715895', 'kartika@gmail.com', 'admin', '0', 'Kartika', 'L', 'Nganjuk', '1984-06-06', 'Yogyakarta', '081358290279', NULL, NULL, 'Admin', NULL, 1, '2015-08-17 18:32:38'),
(2, 'amin', 'a5dGreUQ75z+fOSH/Gpe5yI9lSNWhrSF9bApXe4JNkCsaEQBi4a5OuZpgT0ndzvI+5Ci65Z/9dCmPn3sxivfFw==', '-52130888', 'amin@amin.com', 'otoritas', '0', 'Amin', 'L', 'NGANJUK', '1984-06-06', 'YOGYAKARTA', '081358290279', '2.jpg', NULL, 'IT Support', NULL, 1, '2015-08-17 18:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `com_user_login`
--

CREATE TABLE IF NOT EXISTS `com_user_login` (
  `user_id` int(11) unsigned NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_user_login`
--

INSERT INTO `com_user_login` (`user_id`, `login_date`, `logout_date`, `ip_address`) VALUES
(1, '2015-08-10 09:59:08', NULL, '::1'),
(1, '2015-08-17 18:27:41', '2015-08-17 18:44:39', '::1'),
(1, '2015-08-18 09:25:12', NULL, '::1'),
(1, '2015-08-19 16:36:20', NULL, '::1'),
(2, '2015-08-03 08:58:06', '2015-08-03 20:19:17', '::1'),
(2, '2015-08-05 17:40:22', '2015-08-05 20:11:58', '::1'),
(2, '2015-08-07 09:05:54', '2015-08-07 11:30:21', '127.0.0.1'),
(2, '2015-08-08 08:00:03', '2015-08-08 08:36:04', '127.0.0.1'),
(2, '2015-08-09 15:45:51', NULL, '::1'),
(2, '2015-08-10 08:09:25', '2015-08-10 08:11:48', '127.0.0.1'),
(2, '2015-08-11 14:11:23', NULL, '127.0.0.1'),
(2, '2015-08-17 18:52:35', '2015-08-17 20:56:18', '::1'),
(2, '2015-08-18 09:20:50', '2015-08-18 14:37:22', '::1'),
(2, '2015-08-19 16:36:16', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `com_user_super`
--

CREATE TABLE IF NOT EXISTS `com_user_super` (
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_user_super`
--

INSERT INTO `com_user_super` (`user_id`) VALUES
(1);

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
-- Table structure for table `tentangaids`
--

CREATE TABLE IF NOT EXISTS `tentangaids` (
  `tentang_aids` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tentangkpa`
--

CREATE TABLE IF NOT EXISTS `tentangkpa` (
  `tentang_kpa` varchar(5000) NOT NULL
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
-- Indexes for table `com_menu`
--
ALTER TABLE `com_menu`
  ADD PRIMARY KEY (`nav_id`), ADD KEY `FK_com_menu_p` (`portal_id`);

--
-- Indexes for table `com_portal`
--
ALTER TABLE `com_portal`
  ADD PRIMARY KEY (`portal_id`);

--
-- Indexes for table `com_preferences`
--
ALTER TABLE `com_preferences`
  ADD PRIMARY KEY (`pref_id`);

--
-- Indexes for table `com_role`
--
ALTER TABLE `com_role`
  ADD PRIMARY KEY (`role_id`), ADD KEY `FK_com_role_p` (`portal_id`);

--
-- Indexes for table `com_role_menu`
--
ALTER TABLE `com_role_menu`
  ADD PRIMARY KEY (`nav_id`,`role_id`), ADD KEY `FK_com_role_menu_r` (`role_id`);

--
-- Indexes for table `com_role_user`
--
ALTER TABLE `com_role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `FK_com_role_user_r` (`role_id`);

--
-- Indexes for table `com_user`
--
ALTER TABLE `com_user`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `com_user_login`
--
ALTER TABLE `com_user_login`
  ADD PRIMARY KEY (`user_id`,`login_date`);

--
-- Indexes for table `com_user_super`
--
ALTER TABLE `com_user_super`
  ADD PRIMARY KEY (`user_id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `com_menu`
--
ALTER TABLE `com_menu`
  MODIFY `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=600;
--
-- AUTO_INCREMENT for table `com_portal`
--
ALTER TABLE `com_portal`
  MODIFY `portal_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `com_preferences`
--
ALTER TABLE `com_preferences`
  MODIFY `pref_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `com_role`
--
ALTER TABLE `com_role`
  MODIFY `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `com_user`
--
ALTER TABLE `com_user`
  MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
--
-- Constraints for dumped tables
--

--
-- Constraints for table `com_menu`
--
ALTER TABLE `com_menu`
ADD CONSTRAINT `FK_com_menu_p` FOREIGN KEY (`portal_id`) REFERENCES `com_portal` (`portal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_role`
--
ALTER TABLE `com_role`
ADD CONSTRAINT `FK_com_role_p` FOREIGN KEY (`portal_id`) REFERENCES `com_portal` (`portal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_role_menu`
--
ALTER TABLE `com_role_menu`
ADD CONSTRAINT `FK_com_role_menu_m` FOREIGN KEY (`nav_id`) REFERENCES `com_menu` (`nav_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_com_role_menu_r` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_role_user`
--
ALTER TABLE `com_role_user`
ADD CONSTRAINT `FK_com_role_user_r` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_com_role_user_u` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_user_login`
--
ALTER TABLE `com_user_login`
ADD CONSTRAINT `FK_com_user_login` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_user_super`
--
ALTER TABLE `com_user_super`
ADD CONSTRAINT `FK_com_user_super` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
