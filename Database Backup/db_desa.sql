-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 07:01 AM
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
(41, 1, 13),
(42, 1, 10);

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
(9, 8, 'User Profile', 'User', 'fa fa-id-card', 1),
(10, 9, 'Pekerjaan', 'Pekerjaan', 'fa fa-suitcase', 1),
(11, 9, 'PekerjaanAPI', 'PekerjaanAPI', 'fa fa-suitcase', 1),
(12, 8, 'Edit Profile', 'User/edit', 'ti-user', 1),
(13, 1, 'Tambah Admin', 'Auth/register', 'fa fa-plus', 1),
(14, 10, 'Surat Masuk', 'Surat/SuratMasuk', 'fa fa-envelope', 1),
(16, 1, 'List Admin', 'Admin/listadmin', 'fa fa-list-ol', 1);

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
(10, 'Sekretaris Desa 2', 'admin', 'andra@mahasiswa.pcr.ac.id', '10_admin_imgprofile.jpg', '$2y$10$cYOEISE9pUibROfbtSnI3.0AZV0XQgjFRNNELqzIna/usoGO1ElkS', 1, 1, 0),
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
-- Table structure for table `tb_contoh`
--

CREATE TABLE `tb_contoh` (
  `id` int(11) NOT NULL,
  `id_agama` varchar(20) NOT NULL,
  `id_pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('PKJ0003', 'Dosen'),
('PKJ0005', 'Guru Ngaji A'),
('PKJ0002', 'Pegawai Negeri'),
('PKJ0004', 'Pegawai Swasta'),
('PKJ0001', 'Petani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `suratmasuk_id` varchar(20) NOT NULL,
  `suratmasuk_no` varchar(255) NOT NULL,
  `suratmasuk_judul` varchar(255) NOT NULL,
  `suratmasuk_asal` varchar(255) NOT NULL,
  `suratmasuk_tanggal` date NOT NULL,
  `suratmasuk_file` varchar(255) DEFAULT NULL,
  `suratmasuk_deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`suratmasuk_id`, `suratmasuk_no`, `suratmasuk_judul`, `suratmasuk_asal`, `suratmasuk_tanggal`, `suratmasuk_file`, `suratmasuk_deskripsi`) VALUES
('SMM0001', 'X/1/SM/2020', 'Perizinan Mahasiswa KKN', 'Universitas Sumatera Utara', '2020-07-01', 'mahasiswwakkn.pdf', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eveniet quisquam omnis modi, nihil non cupiditate ipsam. Placeat recusandae, alias, maiores labore quis illo, aliquam velit commodi et quaerat tempore!\r\n                        Necessitatibus culpa, deserunt quidem, dignissimos dolore ad aperiam placeat sunt in veniam explicabo impedit magnam esse ut ipsam dolor corrupti suscipit inventore illum possimus distinctio numquam perferendis. Deserunt, iste fugit.\r\n                        Inventore quis ipsam, voluptas architecto expedita corporis labore? Aliquam culpa reiciendis, magni obcaecati adipisci nesciunt repellat ex. Corporis animi omnis molestias voluptatem, unde aliquam, fuga natus accusantium excepturi, saepe ea?\r\n                        Voluptatum repudiandae quae in perspiciatis accusamus fugiat consectetur ullam quasi voluptatem, quis, a iste? Error aut blanditiis laboriosam, nesciunt exercitationem unde, quos cum totam corporis odit, culpa repellendus. Blanditiis, dolorem?\r\n                        Veniam, accusamus et doloremque illo nisi, aperiam libero consequatur aspernatur accusantium commodi similique harum numquam, ut rem officiis. Fugit asperiores, tempore temporibus ea similique explicabo earum reiciendis fugiat neque libero.\r\n                        Non ab amet molestiae esse. Ut nobis maxime laudantium impedit placeat tenetur eaque eum modi amet aspernatur atque, non, repudiandae qui. Sunt voluptatum, aspernatur deleniti ratione esse accusantium alias asperiores?\r\n                        Est molestias vero assumenda dolorem quia praesentium, reprehenderit tenetur asperiores voluptate voluptatum ad tempore hic deleniti iure alias soluta, ducimus aliquam distinctio voluptas. Perferendis delectus iste nam eum voluptate? Enim.\r\n                        Itaque iusto molestias veniam blanditiis delectus voluptatum ratione accusamus consectetur dolorem nostrum ullam, voluptatem fuga illum possimus rerum vero officia? Reprehenderit tempore quisquam quidem quia voluptatum impedit fugiat assumenda modi.\r\n                        Voluptatem, provident cupiditate accusamus atque quae vero laboriosam, possimus hic, odit debitis itaque minus suscipit sint nesciunt veniam magnam ipsum! Repellendus atque excepturi asperiores non sapiente error aperiam doloremque dolores!\r\n                        Nihil fugit voluptates, harum sapiente voluptatibus qui culpa quos quasi laudantium commodi. Cupiditate possimus dolore eius, cum tenetur mollitia saepe tempora dolorum aspernatur, laborum obcaecati, corporis temporibus sed suscipit animi.');

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
('1', '1', '1', 'L', '1', 'JL Beringin', '2020-07-11', 'AGM0001', 'PKJ0001', 'TIDAK TAMAT', 'Hidup'),
('111826888844', '107666507316', 'Ms. Aglae Tillman', 'L', 'Martine Isle', 'JL Beringin', '2010-09-07', 'AGM0001', 'PKJ0005', 'D1', 'Hidup'),
('123', '123', 'l', 'L', '123', 'JL Beringin', '2020-07-16', 'AGM0002', 'PKJ0001', 'TIDAK TAMAT', 'Hidup'),
('129286502953', '599659966258', 'Prof. Imelda Tromp', 'L', 'Brooke Lodge', 'JL Beringin', '1979-06-06', 'AGM0004', 'PKJ0003', 'TK', 'Hidup'),
('141664848104', '612751583708', 'Candice O\'Conner V', 'L', 'Elsie Junction', 'JL Beringin', '1977-08-25', 'AGM0005', 'PKJ0005', 'D1', 'Mati'),
('144218117045', '444488905044', 'Breanne Kunze III', 'L', 'Deonte Passage', 'JL Beringin', '1984-05-31', 'AGM0003', 'PKJ0002', 'SMA/SEDERAJAT', 'Hidup'),
('145282228989', '288146215118', 'Ludie Bergnaum', 'L', 'Laurianne Courts', 'JL Beringin', '1984-06-20', 'AGM0001', 'PKJ0004', 'SMP/SEDERAJAT', 'Hidup'),
('148811836261', '450538911623', 'Dovie Parisian', 'L', 'Kessler Shoal', 'JL Beringin', '1995-08-26', 'AGM0005', 'PKJ0005', 'S1/SEDERAJAT', 'Hidup'),
('206735885469', '886449151579', 'Minerva Greenholt', 'L', 'Rolfson Forks', 'JL Beringin', '2010-10-13', 'AGM0004', 'PKJ0004', 'SD/SEDERAJAT', 'Mati'),
('210665362328', '676242490671', 'Dr. Eduardo Jones', 'P', 'Junius Gateway', 'JL Beringin', '2001-01-29', 'AGM0001', 'PKJ0003', 'SD/SEDERAJAT', 'Mati'),
('219751914916', '491498138429', 'Teresa Russel', 'L', 'Luz Light', 'JL Beringin', '1999-01-20', 'AGM0001', 'PKJ0005', 'SMA/SEDERAJAT', 'Hidup'),
('230964545207', '606444390164', 'Raegan Keeling', 'L', 'Giovanni Park', 'JL Beringin', '1979-10-01', 'AGM0005', 'PKJ0003', 'D1', 'Mati'),
('239285670360', '295933286892', 'Alan Beer', 'L', 'Santos Harbors', 'JL Beringin', '2011-12-14', 'AGM0004', 'PKJ0001', 'SD/SEDERAJAT', 'Mati'),
('248114674305', '740062766196', 'Dr. Margaretta Langworth IV', 'P', 'Golda Fort', 'JL Beringin', '1997-12-03', 'AGM0005', 'PKJ0005', 'SD/SEDERAJAT', 'Hidup'),
('248367035808', '915582611458', 'Prof. Sheridan Langosh III', 'P', 'Raina Ville', 'JL Beringin', '1996-08-16', 'AGM0001', 'PKJ0001', 'SMP/SEDERAJAT', 'Hidup'),
('270620867609', '324907006137', 'Marguerite O\'Reilly', 'P', 'Nitzsche Port', 'JL Beringin', '2019-01-26', 'AGM0001', 'PKJ0001', 'TK', 'Mati'),
('272906501963', '823003326682', 'Hailey Beier', 'L', 'Jalen Cove', 'JL Beringin', '2019-04-17', 'AGM0005', 'PKJ0002', 'D1', 'Hidup'),
('275814259611', '184796424908', 'Dr. Enrique Goodwin', 'P', 'Lexi Field', 'JL Beringin', '1972-06-29', 'AGM0001', 'PKJ0002', 'D1', 'Mati'),
('298203967092', '567049456574', 'Linda Bogisich', 'L', 'Crooks Hill', 'JL Beringin', '1982-11-15', 'AGM0002', 'PKJ0004', 'S2/SEDERJAT', 'Hidup'),
('329442586377', '426975378533', 'Jacquelyn Bailey Jr.', 'L', 'Bailey Forge', 'JL Beringin', '2004-02-03', 'AGM0002', 'PKJ0005', 'BELUM TAMAT', 'Hidup'),
('335655710240', '507483076117', 'Frank Ziemann Sr.', 'L', 'Kobe Groves', 'JL Beringin', '1994-03-06', 'AGM0003', 'PKJ0001', 'BELUM TAMAT', 'Mati'),
('362661510752', '729908025963', 'Dr. Howard Pacocha', 'P', 'Smitham Expressway', 'JL Beringin', '2010-04-29', 'AGM0003', 'PKJ0002', 'S1/SEDERAJAT', 'Mati'),
('371309851156', '377213992504', 'Prof. Roman Kohler II', 'L', 'Hilpert Locks', 'JL Beringin', '1995-08-01', 'AGM0002', 'PKJ0003', 'S3', 'Mati'),
('415910874493', '930505183152', 'Mr. Gianni Cole', 'L', 'Kemmer Islands', 'JL Beringin', '2010-03-30', 'AGM0004', 'PKJ0002', 'SMA/SEDERAJAT', 'Mati'),
('474200569558', '253025024104', 'Prof. Whitney Dickinson', 'L', 'Nyasia View', 'JL Beringin', '1980-01-07', 'AGM0005', 'PKJ0004', 'S1/SEDERAJAT', 'Hidup'),
('478009699890', '543514216598', 'Luther Christiansen', 'L', 'Emard Haven', 'JL Beringin', '1974-04-03', 'AGM0004', 'PKJ0001', 'SMP/SEDERAJAT', 'Mati'),
('478152781073', '979842186300', 'Shaina Rempel', 'L', 'Eleanore Lodge', 'JL Beringin', '1980-09-13', 'AGM0003', 'PKJ0002', 'S3', 'Mati'),
('509682370582', '306251867348', 'Dr. Lenora Rolfson DVM', 'P', 'Pablo Spur', 'JL Beringin', '2000-09-20', 'AGM0003', 'PKJ0002', 'D3', 'Mati'),
('515798817574', '229493179218', 'Mrs. Theresia Boyer', 'L', 'Fritsch Crest', 'JL Beringin', '2019-03-19', 'AGM0005', 'PKJ0003', 'D3', 'Hidup'),
('524782770220', '688642498012', 'Marcel Olson', 'P', 'Remington Stravenue', 'JL Beringin', '1983-12-10', 'AGM0005', 'PKJ0004', 'D1', 'Mati'),
('538520263601', '262166054453', 'Shirley Langosh', 'L', 'Goldner Course', 'JL Beringin', '2018-09-26', 'AGM0003', 'PKJ0002', 'D3', 'Hidup'),
('559155353344', '607479923591', 'Celestine Heidenreich', 'P', 'Carlo Light', 'JL Beringin', '2015-09-10', 'AGM0004', 'PKJ0004', 'D1', 'Hidup'),
('564050333248', '331471673306', 'Sheldon Smith', 'P', 'Zemlak Plains', 'JL Beringin', '1995-05-10', 'AGM0005', 'PKJ0004', 'SMA/SEDERAJAT', 'Hidup'),
('635206665424', '119041463220', 'Tressie Herzog', 'P', 'Marvin Flat', 'JL Beringin', '2019-08-06', 'AGM0001', 'PKJ0005', 'TK', 'Hidup'),
('636833367776', '805773798329', 'Camren Aufderhar', 'P', 'Meagan Inlet', 'JL Beringin', '2015-06-08', 'AGM0002', 'PKJ0004', 'S2/SEDERJAT', 'Mati'),
('654288307297', '967855535028', 'Rosina Runolfsdottir', 'P', 'Rodriguez Pines', 'JL Beringin', '2005-11-02', 'AGM0001', 'PKJ0004', 'TK', 'Hidup'),
('657100639073', '982805435080', 'Miss Alison Hackett', 'L', 'Magali Ville', 'JL Beringin', '1973-03-10', 'AGM0003', 'PKJ0003', 'BELUM TAMAT', 'Mati'),
('686237996956', '741912157693', 'Brown Toy', 'P', 'Stacy Village', 'JL Beringin', '1987-02-21', 'AGM0001', 'PKJ0003', 'D3', 'Mati'),
('724262822978', '619806751050', 'Wallace Sauer', 'P', 'Gaylord Road', 'JL Beringin', '2001-02-03', 'AGM0001', 'PKJ0005', 'TK', 'Hidup'),
('733198426710', '722424133075', 'Crawford Homenick', 'P', 'Dillan Street', 'JL Beringin', '2005-01-10', 'AGM0005', 'PKJ0002', 'D1', 'Hidup'),
('742321905773', '295995898032', 'Mr. Clifton Schultz IV', 'L', 'Mante Flats', 'JL Beringin', '1974-06-08', 'AGM0003', 'PKJ0005', 'TK', 'Mati'),
('768988232919', '494673658069', 'Dr. Jordan Toy Sr.', 'P', 'Hoppe Vista', 'JL Beringin', '1990-10-23', 'AGM0004', 'PKJ0004', 'SMP/SEDERAJAT', 'Hidup'),
('769399732397', '401237434335', 'Prof. Kendrick Hettinger', 'P', 'Kole Square', 'JL Beringin', '1990-10-30', 'AGM0005', 'PKJ0004', 'TK', 'Mati'),
('790896633919', '559401756990', 'Prof. Austyn Conroy', 'P', 'Monahan Place', 'JL Beringin', '1999-04-23', 'AGM0002', 'PKJ0004', 'D3', 'Hidup'),
('792937298351', '617380306590', 'Ms. Estella Zemlak DVM', 'P', 'Abshire Walks', 'JL Beringin', '2002-05-18', 'AGM0002', 'PKJ0001', 'D1', 'Hidup'),
('829089319286', '644495352217', 'Jerrell Brown Jr.', 'L', 'Maeve Vista', 'JL Beringin', '2007-03-20', 'AGM0005', 'PKJ0004', 'TK', 'Hidup'),
('874189224699', '953192004375', 'Hillary Hodkiewicz', 'L', 'Klocko Ford', 'JL Beringin', '1994-06-15', 'AGM0002', 'PKJ0005', 'S2/SEDERJAT', 'Hidup'),
('907289077015', '786415054509', 'Briana Emard Sr.', 'L', 'Edgar Keys', 'JL Beringin', '1993-03-11', 'AGM0003', 'PKJ0004', 'D1', 'Mati'),
('918899777298', '695878010382', 'Hazel Hayes', 'P', 'Cali Underpass', 'JL Beringin', '1996-05-22', 'AGM0003', 'PKJ0003', 'D1', 'Hidup'),
('934559212159', '515954366000', 'Yesenia Crona', 'P', 'Hansen Isle', 'JL Beringin', '1987-01-30', 'AGM0004', 'PKJ0004', 'S3', 'Hidup'),
('969415780622', '424449326889', 'Bernice Rempel', 'L', 'Wendell Vista', 'JL Beringin', '2001-09-09', 'AGM0003', 'PKJ0002', 'SD/SEDERAJAT', 'Hidup'),
('981207377882', '660978193394', 'Tatum Terry', 'P', 'Ignacio Street', 'JL Beringin', '1981-06-10', 'AGM0005', 'PKJ0003', 'S1/SEDERAJAT', 'Mati');

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
-- Indexes for table `tb_contoh`
--
ALTER TABLE `tb_contoh`
  ADD PRIMARY KEY (`id`,`id_pekerjaan`,`id_agama`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`),
  ADD UNIQUE KEY `pekerjaan_nama` (`pekerjaan_nama`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`suratmasuk_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `Pekerjaan` (`Pekerjaan`),
  ADD KEY `Agama` (`Agama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_contoh`
--
ALTER TABLE `tb_contoh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contoh`
--
ALTER TABLE `tb_contoh`
  ADD CONSTRAINT `tb_contoh_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`agama_id`),
  ADD CONSTRAINT `tb_contoh_ibfk_2` FOREIGN KEY (`id_pekerjaan`) REFERENCES `tb_pekerjaan` (`pekerjaan_id`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`Pekerjaan`) REFERENCES `tb_pekerjaan` (`pekerjaan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
