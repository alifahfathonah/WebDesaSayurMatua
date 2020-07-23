-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 09:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_access_menu`
--

CREATE TABLE `admin_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_access_menu`
--

INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(10, 2, 2),
(12, 1, 7),
(13, 1, 3),
(14, 2, 7),
(15, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Kepdes'),
(3, 'Menu'),
(7, 'Pekerjaan'),
(8, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`role_id`, `role`) VALUES
(1, 'Sekretaris'),
(2, 'KepalaDesa');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sub_menu`
--

CREATE TABLE `admin_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sub_menu`
--

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Beranda', 'Kepdes', 'home', 1),
(2, 1, 'Beranda', 'Admin', 'home', 1),
(3, 1, 'Daftar Penduduk', 'Admin/listwarga', 'people', 1),
(4, 1, 'Tambah Data Penduduk', 'Admin/tambah', 'add', 1),
(5, 7, 'Pekerjaan', 'Pekerjaan', 'card_travel', 1),
(6, 3, 'Menu Management', 'Menu', 'folder', 1),
(7, 3, 'Submenu Management', 'Menu/submenu', 'folder_open', 1),
(8, 1, 'Role', 'Admin/role', 'account_circle\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_token`
--

CREATE TABLE `admin_token` (
  `idtoken` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_user` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `admin_password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `admin_active` int(11) NOT NULL,
  `admin_datecreate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_user`, `admin_email`, `admin_image`, `admin_password`, `role_id`, `admin_active`, `admin_datecreate`) VALUES
(10, 'Sekretaris Desa', 'admin', '', 'stone_paving.jpg', '$2y$10$y/ar6tMDrv.pQM1xWxSx8OevNPqf6JFsGfoUtJ2u.9fE8MdRHjJKa', 1, 1, 0),
(11, 'Kepala Desa', 'kepdes', '', 'default.jpg', '$2y$10$bwoFRgTCM5YodqinjIPPTe6eDGB55iKExE90zjPNVqDTYwfZiIMpG', 2, 1, 0),
(24, 'andra', 'andra', 'andrahafizhsb03@gmail.com', 'default.jpg', '$2y$10$b6kdUkYTW.JFc.5mvRIcNeXydDv6nDHG6pl3m8maqK2r6jB9yXVZ.', 1, 1, 1594926290);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `agama_id` varchar(20) NOT NULL,
  `agama_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`agama_id`, `agama_nama`) VALUES
('AGM0001', 'Islam'),
('AGM0002', 'Kristen Protestan'),
('AGM0003', 'Katolig'),
('AGM0004', 'Hindu'),
('AGM0005', 'Buddha'),
('AGM0006', 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `pekerjaan_id` varchar(20) NOT NULL,
  `pekerjaan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`pekerjaan_id`, `pekerjaan_nama`) VALUES
('A', 'A'),
('PKJ0001', 'Petani'),
('PKJ0002', 'Pegawai Negeri');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `NIK` varchar(20) NOT NULL,
  `NKK` varchar(2) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Sex` enum('P','L') DEFAULT NULL,
  `Alamat` text,
  `TempatLahir` varchar(50) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Agama` enum('Islam','Kristen Protestan','Katolig','Hindu','Buddha') DEFAULT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `PendidikanTerakhir` varchar(100) DEFAULT NULL,
  `Status` enum('Mati','Hidup','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`NIK`, `NKK`, `Nama`, `Sex`, `Alamat`, `TempatLahir`, `TglLahir`, `Agama`, `Pekerjaan`, `PendidikanTerakhir`, `Status`) VALUES
('1810', '40', 'Andra', 'L', 'Jl. PBSI', 'Medan', '2000-04-03', 'Islam', 'Mahasiswa', 'S1', 'Mati'),
('1855', '20', 'Andra', 'L', 'Jl. PBSI', 'Medan', '2000-04-03', 'Islam', 'Mahasiswa', 'S1', 'Hidup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`idtoken`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
