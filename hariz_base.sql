-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 05:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hariz.base`
--

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `idhakim` varchar(3) NOT NULL,
  `password` varchar(8) NOT NULL,
  `namahakim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`idhakim`, `password`, `namahakim`) VALUES
('H01', '123', 'Akmal');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `nokp` varchar(12) NOT NULL,
  `idpenilaian` varchar(3) NOT NULL,
  `markah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idpenilaian` varchar(3) NOT NULL,
  `aspek` varchar(30) NOT NULL,
  `markahpenuh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`idpenilaian`, `aspek`, `markahpenuh`) VALUES
('N01', 'Disiplin', 20),
('N02', 'Posisi', 20),
('N03', 'Tata Kelakuan', 20),
('N04', 'Masa', 20),
('N05', 'Sasaran', 20);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `nokp` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL,
  `namapeserta` varchar(30) NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `idhakim` varchar(3) NOT NULL,
  `idurusetia` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`nokp`, `password`, `namapeserta`, `telefon`, `idhakim`, `idurusetia`) VALUES
('060507020427', '123', 'Xiao Lim', '0121552517', 'H01', 'U01'),
('060744080211', '123', 'Aiman', '0194321562', 'H01', 'U01'),
('061103090733', '123', 'Faiz', '0132541213', 'H01', 'U01');

-- --------------------------------------------------------

--
-- Table structure for table `urusetia`
--

CREATE TABLE `urusetia` (
  `idurusetia` varchar(3) NOT NULL,
  `password` varchar(8) NOT NULL,
  `namaurusetia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urusetia`
--

INSERT INTO `urusetia` (`idurusetia`, `password`, `namaurusetia`) VALUES
('U01', '123', 'Fakrul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`idhakim`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`nokp`,`idpenilaian`),
  ADD KEY `nokp` (`nokp`),
  ADD KEY `idpenilaian` (`idpenilaian`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idpenilaian`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nokp`),
  ADD KEY `idhakim` (`idhakim`),
  ADD KEY `idurusetia` (`idurusetia`);

--
-- Indexes for table `urusetia`
--
ALTER TABLE `urusetia`
  ADD PRIMARY KEY (`idurusetia`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_penilaian` FOREIGN KEY (`idpenilaian`) REFERENCES `penilaian` (`idpenilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_peserta` FOREIGN KEY (`nokp`) REFERENCES `peserta` (`nokp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_hakim` FOREIGN KEY (`idhakim`) REFERENCES `hakim` (`idhakim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_urusetia` FOREIGN KEY (`idurusetia`) REFERENCES `urusetia` (`idurusetia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
