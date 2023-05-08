-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 06:16 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nokp`),
  ADD KEY `idhakim` (`idhakim`),
  ADD KEY `idurusetia` (`idurusetia`);

--
-- Constraints for dumped tables
--

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
