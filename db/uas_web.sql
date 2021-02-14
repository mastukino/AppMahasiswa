-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 11:08 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `semester` int(1) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `semester`, `prodi`, `alamat`, `no_hp`) VALUES
('16090048', 'Candra Septia Cahya', 'Laki-Laki', 4, 'Sistem Informasi', 'Nagoya', '0821321321321'),
('16090069', 'Rifai Abdul Ghani', 'Laki-Laki', 4, 'Sistem Informasi', 'Bengkong Harapan', '083213213321'),
('16090079', 'Fredy Nur Apriyanto', 'Laki-Laki', 4, 'Teknik Informatika', 'Jodoh Square', '0823132132123'),
('16090112', 'Maulana Abdul Siddiq', 'Laki-Laki', 4, 'Teknik Industri', 'Batu Ampar', '0823212321321'),
('16090123', 'Firman Pamungkas', 'Laki-Laki', 4, 'Ilmu Hukum', 'Sukajadi', '0821326173821'),
('16090152', 'Septian Rizaldi', 'Laki-Laki', 4, 'Ilmu Komunikasi', 'Baloi Mas', '08213271321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
