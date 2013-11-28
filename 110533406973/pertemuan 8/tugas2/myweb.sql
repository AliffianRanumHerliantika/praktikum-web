-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2013 at 03:35 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kdprodi` int(11) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `kdprodi`) VALUES
('110533406999', 'Budi', 'Madiun', 334),
('110533406989', 'Iman Budi Hutomo', 'Ponorogo', 334),
('110522', 'Hutomo', 'Magetan', 344),
('12121', 'Rasmin', 'Surabaya', 334),
('123', 'Suparti', 'Malang', 344),
('143', 'Radityo', 'Pare', 334),
('197252', 'Debi', 'Kediri', 344);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa2`
--

CREATE TABLE IF NOT EXISTS `mahasiswa2` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `namaprodi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa2`
--

INSERT INTO `mahasiswa2` (`nim`, `nama`, `alamat`, `namaprodi`) VALUES
('110533406999', 'Budi', 'Madiun', 0),
('110533406989', 'Iman Budi Hutomo', 'Ponorogo', 0),
('110522', 'Hutomo', 'Magetan', 0),
('12121', 'Rasmin', 'Surabaya', 0),
('123', 'Suparti', 'Malang', 0),
('143', 'Radityo', 'Pare', 0),
('197252', 'Debi', 'Kediri', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `kdprodi` int(11) NOT NULL,
  `namaprodi` varchar(50) NOT NULL,
  PRIMARY KEY (`kdprodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kdprodi`, `namaprodi`) VALUES
(334, 'Pendidikan Teknik Informatika'),
(344, 'Pendidikan Teknik Elektro');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

    