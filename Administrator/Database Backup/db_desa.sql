-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 09:53 AM
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
(22, 1, 1),
(24, 1, 3),
(26, 1, 8),
(28, 3, 8),
(30, 2, 8),
(39, 2, 2),
(40, 1, 9),
(41, 1, 13);

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
(8, 'User'),
(9, 'Pekerjaan'),
(10, 'Surat');

--
-- Triggers `admin_menu`
--
DELIMITER $$
CREATE TRIGGER `deletemenu` AFTER DELETE ON `admin_menu` FOR EACH ROW BEGIN
DELETE FROM admin_sub_menu
    WHERE admin_sub_menu.menu_id = old.id;
 DELETE FROM admin_access_menu
    WHERE admin_access_menu.menu_id = old.id;
    
END
$$
DELIMITER ;

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
(2, 'Kepala Desa'),
(3, 'Petugas');

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
  `is_active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sub_menu`
--

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Beranda', 'Kepdes', 'icon-speedometer', 1),
(2, 1, 'Beranda', 'Admin', 'icon-speedometer', 1),
(3, 1, 'Daftar Penduduk', 'Admin/listwarga', 'icon-people', 1),
(4, 1, 'Tambah Data Penduduk', 'Admin/tambah', ' icon-user-follow', 1),
(6, 3, 'Menu Management', 'Menu', 'icon-folder', 1),
(7, 3, 'Submenu Management', 'Menu/submenu', 'icon-folder', 1),
(8, 1, 'Role', 'Admin/role', 'fa fa-user-circle', 1),
(9, 8, 'User Profile', 'User', 'ti-user', 1),
(10, 9, 'Pekerjaan', 'Pekerjaan', 'fa fa-suitcase', 1),
(11, 9, 'PekerjaanAPI', 'PekerjaanAPI', 'fa fa-suitcase', 1),
(12, 8, 'Edit Profile', 'User/edit', 'ti-user', 1),
(13, 1, 'Tambah Admin', 'Auth/register', 'fa fa-plus', 1);

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
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`) VALUES
(1, 'andra', 'hafiz');

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
(10, 'Sekretaris Desa 1', 'admin', 'andra@mahasiswa.pcr.ac.id', '10_admin_imgprofile.jpg', '$2y$10$cYOEISE9pUibROfbtSnI3.0AZV0XQgjFRNNELqzIna/usoGO1ElkS', 1, 1, 0),
(11, 'Kepala Desa', 'kepdes', 'andra18ti@mahasiswa.pcr.ac.id', 'default.jpg', '$2y$10$2cD.wo6..1NWVfe/Y8mUYeIrHiNUH/WEzRRf8eKopTwg/cTG2tSOe', 2, 1, 0),
(26, 'andra', 'andra', 'andrahafizhsb03@gmail.com', 'default.jpg', '$2y$10$F0PaRReq7qMpI.ZR7akiSuCD5FdyZDawuM9qBT9vZVGLhlukfsDi6', 3, 1, 1594994330);

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
('PKJ0001', 'Petani'),
('PKJ0002', 'Pegawai Negeri'),
('PKJ0003', 'Dosen'),
('PKJ0004', 'Pegawai Swasta'),
('PKJ0005', 'Guru Ngaji A');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `NIK` varchar(20) NOT NULL,
  `NKK` varchar(20) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Sex` enum('P','L') DEFAULT NULL,
  `Alamat` text,
  `TempatLahir` varchar(50) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL,
  `Pekerjaan` varchar(20) DEFAULT NULL,
  `PendidikanTerakhir` varchar(100) DEFAULT NULL,
  `Status` enum('Mati','Hidup','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`NIK`, `NKK`, `Nama`, `Sex`, `Alamat`, `TempatLahir`, `TglLahir`, `Agama`, `Pekerjaan`, `PendidikanTerakhir`, `Status`) VALUES
('1', '1', '1', 'L', '1', '1', '2020-07-11', '', 'PKJ0001', 'TIDAK TAMAT', 'Hidup'),
('111826888844', '107666507316', 'Ms. Aglae Tillman', 'L', 'Martine Isle', '2000-01-01', '2010-09-07', 'AGM001', 'PKJ0005', 'D1', 'Hidup'),
('123', '123', 'l', 'L', '123', '123', '2020-07-16', 'AGM0002', 'PKJ0001', 'TIDAK TAMAT', 'Hidup'),
('129286502953', '599659966258', 'Prof. Imelda Tromp', 'L', 'Brooke Lodge', '1977-02-09', '1979-06-06', 'AGM0004', 'PKJ0003', 'TK', 'Hidup'),
('141664848104', '612751583708', 'Candice O\'Conner V', 'L', 'Elsie Junction', '1981-03-06', '1977-08-25', 'AGM0005', 'PKJ0005', 'D1', 'Mati'),
('144218117045', '444488905044', 'Breanne Kunze III', 'L', 'Deonte Passage', '1982-05-20', '1984-05-31', 'AGM0003', 'PKJ0002', 'SMA/SEDERAJAT', 'Hidup'),
('145282228989', '288146215118', 'Ludie Bergnaum', 'L', 'Laurianne Courts', '1992-10-29', '1984-06-20', 'AGM001', 'PKJ0004', 'SMP/SEDERAJAT', 'Hidup'),
('148811836261', '450538911623', 'Dovie Parisian', 'L', 'Kessler Shoal', '2006-06-08', '1995-08-26', 'AGM0005', 'PKJ0005', 'S1/SEDERAJAT', 'Hidup'),
('206735885469', '886449151579', 'Minerva Greenholt', 'L', 'Rolfson Forks', '2002-09-20', '2010-10-13', 'AGM0004', 'PKJ0004', 'SD/SEDERAJAT', 'Mati'),
('210665362328', '676242490671', 'Dr. Eduardo Jones', 'P', 'Junius Gateway', '1994-10-22', '2001-01-29', 'AGM001', 'PKJ0003', 'SD/SEDERAJAT', 'Mati'),
('219751914916', '491498138429', 'Teresa Russel', 'L', 'Luz Light', '2019-11-13', '1999-01-20', 'AGM001', 'PKJ0005', 'SMA/SEDERAJAT', 'Hidup'),
('230964545207', '606444390164', 'Raegan Keeling', 'L', 'Giovanni Park', '1996-12-21', '1979-10-01', 'AGM0005', 'PKJ0003', 'D1', 'Mati'),
('239285670360', '295933286892', 'Alan Beer', 'L', 'Santos Harbors', '2001-02-06', '2011-12-14', 'AGM0004', 'PKJ0001', 'SD/SEDERAJAT', 'Mati'),
('248114674305', '740062766196', 'Dr. Margaretta Langworth IV', 'P', 'Golda Fort', '1989-05-05', '1997-12-03', 'AGM0005', 'PKJ0005', 'SD/SEDERAJAT', 'Hidup'),
('248367035808', '915582611458', 'Prof. Sheridan Langosh III', 'P', 'Raina Ville', '2014-06-09', '1996-08-16', 'AGM001', 'PKJ0001', 'SMP/SEDERAJAT', 'Hidup'),
('270620867609', '324907006137', 'Marguerite O\'Reilly', 'P', 'Nitzsche Port', '1995-12-03', '2019-01-26', 'AGM001', 'PKJ0001', 'TK', 'Mati'),
('272906501963', '823003326682', 'Hailey Beier', 'L', 'Jalen Cove', '2002-07-22', '2019-04-17', 'AGM0005', 'PKJ0002', 'D1', 'Hidup'),
('275814259611', '184796424908', 'Dr. Enrique Goodwin', 'P', 'Lexi Field', '1982-07-13', '1972-06-29', 'AGM001', 'PKJ0002', 'D1', 'Mati'),
('298203967092', '567049456574', 'Linda Bogisich', 'L', 'Crooks Hill', '1984-06-27', '1982-11-15', 'AGM0002', 'PKJ0004', 'S2/SEDERJAT', 'Hidup'),
('329442586377', '426975378533', 'Jacquelyn Bailey Jr.', 'L', 'Bailey Forge', '1991-01-10', '2004-02-03', 'AGM0002', 'PKJ0005', 'BELUM TAMAT', 'Hidup'),
('335655710240', '507483076117', 'Frank Ziemann Sr.', 'L', 'Kobe Groves', '1977-10-15', '1994-03-06', 'AGM0003', 'PKJ0001', 'BELUM TAMAT', 'Mati'),
('362661510752', '729908025963', 'Dr. Howard Pacocha', 'P', 'Smitham Expressway', '1971-10-24', '2010-04-29', 'AGM0003', 'PKJ0002', 'S1/SEDERAJAT', 'Mati'),
('371309851156', '377213992504', 'Prof. Roman Kohler II', 'L', 'Hilpert Locks', '1990-06-11', '1995-08-01', 'AGM0002', 'PKJ0003', 'S3', 'Mati'),
('415910874493', '930505183152', 'Mr. Gianni Cole', 'L', 'Kemmer Islands', '1994-04-25', '2010-03-30', 'AGM0004', 'PKJ0002', 'SMA/SEDERAJAT', 'Mati'),
('474200569558', '253025024104', 'Prof. Whitney Dickinson', 'L', 'Nyasia View', '1991-04-27', '1980-01-07', 'AGM0005', 'PKJ0004', 'S1/SEDERAJAT', 'Hidup'),
('478009699890', '543514216598', 'Luther Christiansen', 'L', 'Emard Haven', '1994-10-17', '1974-04-03', 'AGM0004', 'PKJ0001', 'SMP/SEDERAJAT', 'Mati'),
('478152781073', '979842186300', 'Shaina Rempel', 'L', 'Eleanore Lodge', '1984-12-27', '1980-09-13', 'AGM0003', 'PKJ0002', 'S3', 'Mati'),
('509682370582', '306251867348', 'Dr. Lenora Rolfson DVM', 'P', 'Pablo Spur', '2008-03-30', '2000-09-20', 'AGM0003', 'PKJ0002', 'D3', 'Mati'),
('515798817574', '229493179218', 'Mrs. Theresia Boyer', 'L', 'Fritsch Crest', '2005-06-14', '2019-03-19', 'AGM0005', 'PKJ0003', 'D3', 'Hidup'),
('524782770220', '688642498012', 'Marcel Olson', 'P', 'Remington Stravenue', '1993-07-13', '1983-12-10', 'AGM0005', 'PKJ0004', 'D1', 'Mati'),
('538520263601', '262166054453', 'Shirley Langosh', 'L', 'Goldner Course', '1981-06-24', '2018-09-26', 'AGM0003', 'PKJ0002', 'D3', 'Hidup'),
('559155353344', '607479923591', 'Celestine Heidenreich', 'P', 'Carlo Light', '1999-03-21', '2015-09-10', 'AGM0004', 'PKJ0004', 'D1', 'Hidup'),
('564050333248', '331471673306', 'Sheldon Smith', 'P', 'Zemlak Plains', '2003-03-18', '1995-05-10', 'AGM0005', 'PKJ0004', 'SMA/SEDERAJAT', 'Hidup'),
('635206665424', '119041463220', 'Tressie Herzog', 'P', 'Marvin Flat', '1993-05-11', '2019-08-06', 'AGM001', 'PKJ0005', 'TK', 'Hidup'),
('636833367776', '805773798329', 'Camren Aufderhar', 'P', 'Meagan Inlet', '2016-10-06', '2015-06-08', 'AGM0002', 'PKJ0004', 'S2/SEDERJAT', 'Mati'),
('654288307297', '967855535028', 'Rosina Runolfsdottir', 'P', 'Rodriguez Pines', '1980-10-12', '2005-11-02', 'AGM001', 'PKJ0004', 'TK', 'Hidup'),
('657100639073', '982805435080', 'Miss Alison Hackett', 'L', 'Magali Ville', '2007-11-03', '1973-03-10', 'AGM0003', 'PKJ0003', 'BELUM TAMAT', 'Mati'),
('686237996956', '741912157693', 'Brown Toy', 'P', 'Stacy Village', '2018-11-10', '1987-02-21', 'AGM001', 'PKJ0003', 'D3', 'Mati'),
('724262822978', '619806751050', 'Wallace Sauer', 'P', 'Gaylord Road', '1991-11-26', '2001-02-03', 'AGM001', 'PKJ0005', 'TK', 'Hidup'),
('733198426710', '722424133075', 'Crawford Homenick', 'P', 'Dillan Street', '1999-03-23', '2005-01-10', 'AGM0005', 'PKJ0002', 'D1', 'Hidup'),
('742321905773', '295995898032', 'Mr. Clifton Schultz IV', 'L', 'Mante Flats', '1972-01-23', '1974-06-08', 'AGM0003', 'PKJ0005', 'TK', 'Mati'),
('768988232919', '494673658069', 'Dr. Jordan Toy Sr.', 'P', 'Hoppe Vista', '2003-09-02', '1990-10-23', 'AGM0004', 'PKJ0004', 'SMP/SEDERAJAT', 'Hidup'),
('769399732397', '401237434335', 'Prof. Kendrick Hettinger', 'P', 'Kole Square', '2016-04-04', '1990-10-30', 'AGM0005', 'PKJ0004', 'TK', 'Mati'),
('790896633919', '559401756990', 'Prof. Austyn Conroy', 'P', 'Monahan Place', '2008-03-16', '1999-04-23', 'AGM0002', 'PKJ0004', 'D3', 'Hidup'),
('792937298351', '617380306590', 'Ms. Estella Zemlak DVM', 'P', 'Abshire Walks', '1991-01-18', '2002-05-18', 'AGM0002', 'PKJ0001', 'D1', 'Hidup'),
('829089319286', '644495352217', 'Jerrell Brown Jr.', 'L', 'Maeve Vista', '1988-01-19', '2007-03-20', 'AGM0005', 'PKJ0004', 'TK', 'Hidup'),
('874189224699', '953192004375', 'Hillary Hodkiewicz', 'L', 'Klocko Ford', '1987-08-02', '1994-06-15', 'AGM0002', 'PKJ0005', 'S2/SEDERJAT', 'Hidup'),
('907289077015', '786415054509', 'Briana Emard Sr.', 'L', 'Edgar Keys', '1995-11-14', '1993-03-11', 'AGM0003', 'PKJ0004', 'D1', 'Mati'),
('918899777298', '695878010382', 'Hazel Hayes', 'P', 'Cali Underpass', '1986-02-17', '1996-05-22', 'AGM0003', 'PKJ0003', 'D1', 'Hidup'),
('934559212159', '515954366000', 'Yesenia Crona', 'P', 'Hansen Isle', '1972-07-22', '1987-01-30', 'AGM0004', 'PKJ0004', 'S3', 'Hidup'),
('969415780622', '424449326889', 'Bernice Rempel', 'L', 'Wendell Vista', '2004-10-07', '2001-09-09', 'AGM0003', 'PKJ0002', 'SD/SEDERAJAT', 'Hidup'),
('981207377882', '660978193394', 'Tatum Terry', 'P', 'Ignacio Street', '2005-08-09', '1981-06-10', 'AGM0005', 'PKJ0003', 'S1/SEDERAJAT', 'Mati');

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
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
