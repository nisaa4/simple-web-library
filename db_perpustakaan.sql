-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_databuku`
--

CREATE TABLE `tb_databuku` (
  `id_buku` char(10) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_databuku`
--

INSERT INTO `tb_databuku` (`id_buku`, `judul_buku`, `kategori`, `penerbit`, `penulis`, `stok`, `harga`) VALUES
('1', 'Fisika', 'Pelajaran', 'Gramedia', 'B', 6, 12000),
('2', 'Sejarah', 'Pelajaran', 'Gramedia', 'BC', 5, 50000),
('3', 'Matematika', 'Pelajaran', 'Gramedia', 'BB', 7, 90000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_databuku`
--
ALTER TABLE `tb_databuku`
  ADD PRIMARY KEY (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
