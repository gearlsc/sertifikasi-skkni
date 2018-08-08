-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 05:31 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sertifikat_skkni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lok` int(11) NOT NULL,
  `tuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lok`, `tuk`) VALUES
(22, 'Luar Jambi'),
(31, 'Kota Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id` int(5) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `id_skema` int(5) NOT NULL,
  `id_lokasi` int(5) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `organisasi` text NOT NULL,
  `rekomendasi` enum('BERKOMPETENSI','BELUM BERKOMPETENSI') DEFAULT NULL,
  `tgl_terbit` date DEFAULT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id`, `nik`, `id_skema`, `id_lokasi`, `nama`, `tgl_lahir`, `hp`, `email`, `organisasi`, `rekomendasi`, `tgl_terbit`, `alamat`) VALUES
(13, '123456', 1, 22, 'tes', '1997-07-29', '081272014721', 'tes@gmail.com', 'STIKOM Dinamika Bangsa Jambi', 'BELUM BERKOMPETENSI', '2018-08-09', 'lkjljl'),
(21, '012983', 1, 31, 'geaaa', '1997-07-29', '099876', 'gearuliscaa@gmail.com', 'asuyfu', 'BERKOMPETENSI', '1998-08-20', ''),
(22, '234', 11, 31, 'ad', '1997-07-29', '098876', 'gae', 'abc', 'BERKOMPETENSI', '1997-07-29', ''),
(23, '9986', 1, 22, 'yusuf', '1997-07-29', '0865', 'gearuliscaa@gmail.com', 'absg', 'BERKOMPETENSI', '2018-08-20', 'jatijajar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skema`
--

CREATE TABLE `tb_skema` (
  `id_skema` int(5) NOT NULL,
  `nama_skema` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_skema`
--

INSERT INTO `tb_skema` (`id_skema`, `nama_skema`, `ket`) VALUES
(1, 'Programmer Madya', '-'),
(11, 'Multimedia Madya', ''),
(12, 'Networking Madya', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lok`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tb_peserta_tb_skema` (`id_skema`),
  ADD KEY `FK_tb_peserta_tb_lokasi` (`id_lokasi`);

--
-- Indexes for table `tb_skema`
--
ALTER TABLE `tb_skema`
  ADD PRIMARY KEY (`id_skema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_skema`
--
ALTER TABLE `tb_skema`
  MODIFY `id_skema` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `FK_tb_peserta_tb_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id_lok`),
  ADD CONSTRAINT `FK_tb_peserta_tb_skema` FOREIGN KEY (`id_skema`) REFERENCES `tb_skema` (`id_skema`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
