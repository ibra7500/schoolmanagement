-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 10:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Mohammad Rahadyan Ibrahim');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nign` int(15) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nign`, `nama_guru`, `jk`, `alamat`, `ttl`, `no_telp`, `email`) VALUES
(101521001, 'Mohammad Ibrahim Pratama', 'Laki-laki', 'Jl Akasia no 7', 'Bekasi, 7 Mei 1995', '081226634457', 'ibrahim@gmail.com'),
(101521002, 'Arif Yudi Setyo', 'Laki-laki', 'Jl Ciangsana no 10', 'Bogor, 9 April 1980', '085145632213', 'ririyudo@gmail.com'),
(101521003, 'Sandi', 'Laki-laki', 'Jl Wibawa Mukti no 24', 'Palu, 8 Mei 1989', '085466973215', 'sandi234@gmail.com'),
(101521004, 'Elma', 'Perempuan', 'Jl Akasia Blok L10 no 2', 'Bekasi, 8 Agustus 1986', '0814555674', 'elma@gmail.com'),
(101521005, 'Hatsune Miku', 'Perempuan', 'Jl Bumi Indah no 21', 'Okinawa, 9 Mei 1992', '0838555097', ''),
(101521006, 'Mohammad Rahadyan Ibrahim', 'Laki-laki', 'Jl Akasia Raya blok K1 no 10', 'Bekasi, 7 Mei 1998', '0838555790', 'fireflower@gmail.com'),
(101521007, 'Marsidi', 'Laki-laki', 'Jl Jatimulya no 99', 'Malang, 3 Januari 1982', '0816555106', ''),
(101521008, 'Jotaro Kujo', 'Laki-laki', 'Jl Jaya Raya no 99', 'Kyoto, 19 Oktober 1970', '0838555763', ''),
(101521009, 'Tyler', 'Laki-laki', 'Jl Cemara Raya no 27', 'Jakarta, 28 Mei 1993', '0878555570', ''),
(101521010, 'Muhammad Enjang', 'Laki-laki', 'Jl Tambun Selatan blok J no 88', 'Bekasi, 19 Juli 1997', '083851157110', ''),
(101521011, 'John F. Kennedy', 'Laki-laki', 'Jl Kalimalang no 58', 'Jakarta, 19 Mei 1990', '087812341436', ''),
(101521015, 'Gordon Freeman', 'Laki-laki', 'Jl Black Mesa no 3', 'City 17, 18 April 1970', '081566661234', ''),
(101521016, 'Kagamine Rin', 'Perempuan', 'Jl Bunga Mawar no 99', 'Tokyo, 8 Mei 1987', '085612344478', 'kagamine.rin@gmail.com'),
(101548331, 'Mohammad Reza', 'Laki-laki', 'Jl Angkasa Indah blok E6 no 9', 'Tangerang, 13 Juli 1987', '085412794653', 'reza.mohammad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
('KLS0071', 'KELAS 7-A'),
('KLS0072', 'KELAS 7-B'),
('KLS0081', 'KELAS 8-A'),
('KLS0082', 'KELAS 8-B'),
('KLS0091', 'KELAS 9-A'),
('KLS0092', 'KELAS 9-B');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `id_matpel` varchar(25) NOT NULL,
  `nama_matpel` varchar(255) NOT NULL,
  `nign` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `nama_matpel`, `nign`) VALUES
('MPLENG001', 'Bahasa Inggris II', 101521008),
('MPLIDN001', 'Bahasa Indonesia I', 101521007),
('MPLIPA001', 'IPA', 101521003),
('MPLIPS001', 'IPS', 101548331),
('MPLJPG001', 'Bahasa Jepang', 101521005),
('MPLJPG002', 'Bahasa Jepang II', 101521016),
('MPLMTK001', 'Matematika', 101521006),
('MPLMTK002', 'Matematika', 101521001),
('MPLMTK03', 'Matematika', 101548331),
('MPLPAI001', 'Pendidikan Agama Islam', 101521002),
('MPLPJK001', 'Penjaskes', 101521007),
('MPLSBK001', 'Seni Budaya', 101521009),
('MPLSJH001', 'Sejarah', 101521010);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` bigint(20) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `id_kelas`, `nama_siswa`, `ttl`, `jk`, `alamat`, `no_telp`, `email`) VALUES
(3124100102, 'KLS0071', 'Nurul Fauziah', 'Jakarta, 9 Mei 2007', 'Perempuan', 'Jl Cendana 9', '081569472231', 'nurulcantik@gmail.com'),
(3124100103, 'KLS0071', 'Alfarizi Dian Pratama', 'Bandung, 21 Agustus 2007', 'Laki-laki', 'Jl Angkasa Indah no 10', '085864971236', 'dian.alfa@gmail.com'),
(3124100201, 'KLS0081', 'Rahadyan Ibrahim', 'Bekasi, 7 Mei 2007', 'Laki-laki', 'Jl Akasia no 7', '085812446369', 'rahadian@gmail.com'),
(3124100204, 'KLS0081', 'Anggun Bunga', 'Bogor, 16 Februari 2007', 'Perempuan', 'Jl Bunga Mawar no 50', '085899312222', 'anggun75@gmail.com'),
(3124100205, 'KLS0081', 'Megurine Luka', 'Okinawa, 8 April 2007', 'Perempuan', 'Jl Akasia blok L3 no 6', '081545668887', 'luka.megu@gmail.co.jp'),
(3124100301, 'KLS0091', 'Bagas Aziz', 'Bekasi, 10 Maret 2007', 'Laki-laki', 'Jl Sunda no 10', '089800765000', ''),
(3124100302, 'KLS0091', 'Kotori Minami', 'Tokyo, 10 September 2006', 'Perempuan', 'Jl Sudirman blok J1 no 11', '089813234464', 'littlebird@gmail.com'),
(3124100303, 'KLS0091', 'Honoka', 'Hokkaido, 9 September 2006', 'Perempuan', 'Jl Sudirman blok J1 no 10', '081547891236', ''),
(3124101101, 'KLS0072', 'Rahadyan Ibrahim', 'Bekasi, 20 Mei 2007', 'Laki-laki', 'Jl Mawar Indah no 19', '081356231147', 'rah.ibrahim@gmail.com'),
(3124101102, 'KLS0072', 'Yukina', 'Jakarta, 26 Oktober 2007', 'Perempuan', 'Jl Mawar Biru no 5', '082269554123', 'yukinyan@gmail.com'),
(3124101103, 'KLS0072', 'Bella', 'Bekasi, 5 Januari 2007', 'Perempuan', 'Jl Jambu no 10', '089876651098', 'bella@gmail.com'),
(3124101104, 'KLS0072', 'Kudo Haruka', 'Okinawa, 8 Mei 2007', 'Perempuan', 'Jl Mangga no 10', '081546669372', 'kudoharu@gmail.com'),
(3124101201, 'KLS0082', 'Dani Salim Pratama', 'Jakarta, 3 Juli 2007', 'Laki-laki', 'Jl Akasia blok L8 no 1', '087821543312', ''),
(3124101202, 'KLS0082', 'Imai Lisa', 'Jakarta, 9 Desember 2007', 'Perempuan', 'Jl Indah Bumi no 7', '081856463321', ''),
(3124101301, 'KLS0092', 'Jonathan', 'Jakarta, 8 Juli 2007', 'Laki-laki', 'Jl Sudirman no 7', '085874111234', 'jonathanjojo@gmail.com'),
(3124101302, 'KLS0092', 'Indah Cahya', 'Bogor, 9 Mei 2007', 'Perempuan', 'Jl Kuda Indah no 2', '081245671289', ''),
(3124101303, 'KLS0092', 'Mohammad Alfah Ruswanto', 'Bekasi, 8 Agustus 2005', 'Laki-laki', 'Jl Angkasa Bagus no 199', '085564132225', ''),
(3124101304, 'KLS0092', 'Marie Rose', 'Tokyo, 9 Agustus 2006', 'Perempuan', 'Jl Sudirman blok M1 no 99', '081233451234', ''),
(3124101305, 'KLS0092', 'Hikawa Sayo', 'Tokyo, 20 Maret 2005', 'Perempuan', 'Jl Kembar Raya no 10', '085866326612', ''),
(3124101306, 'KLS0092', 'Hikawa Hina', 'Tokyo, 20 Maret 2005', 'Perempuan', 'Jl Kembar Raya no 10', '085866326612', 'hikawahina@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nign`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`),
  ADD KEY `nign` (`nign`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matpel`
--
ALTER TABLE `matpel`
  ADD CONSTRAINT `matpel_ibfk_1` FOREIGN KEY (`nign`) REFERENCES `guru` (`nign`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
