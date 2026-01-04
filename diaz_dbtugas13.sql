-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diaz_dbtugas13`
--

-- --------------------------------------------------------

--
-- Table structure for table `diaz_tbkursus`
--

CREATE TABLE `diaz_tbkursus` (
  `id` int(11) NOT NULL,
  `kursus` varchar(100) NOT NULL,
  `durasi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diaz_tbkursus`
--

INSERT INTO `diaz_tbkursus` (`id`, `kursus`, `durasi`) VALUES
(1, 'Web Development', 3),
(2, 'Digital Marketing', 10),
(3, 'Data Science', 4),
(4, 'Cybersecurity', 11),
(5, 'Web Development', 11),
(6, 'Graphic Design', 4),
(7, 'Cybersecurity', 2),
(8, 'Web Development', 2),
(9, 'Digital Marketing', 9),
(10, 'Web Development', 7),
(11, 'Web Development', 2);

-- --------------------------------------------------------

--
-- Table structure for table `diaz_tbmhs`
--

CREATE TABLE `diaz_tbmhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diaz_tbmhs`
--

INSERT INTO `diaz_tbmhs` (`id`, `nama`, `nim`) VALUES
(1, 'Valdiaz Gahari', 251110206),
(2, 'Tengku Muhamad Azi Juniar', 251110204);

-- --------------------------------------------------------

--
-- Table structure for table `diaz_tbpendaftaran`
--

CREATE TABLE `diaz_tbpendaftaran` (
  `id` int(11) NOT NULL,
  `idNama` int(11) NOT NULL,
  `idKursus` int(11) NOT NULL,
  `tglDaftar` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diaz_tbpendaftaran`
--

INSERT INTO `diaz_tbpendaftaran` (`id`, `idNama`, `idKursus`, `tglDaftar`) VALUES
(1, 1, 1, '2025-12-31'),
(2, 1, 10, '2026-01-02'),
(3, 2, 11, '2026-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diaz_tbkursus`
--
ALTER TABLE `diaz_tbkursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diaz_tbmhs`
--
ALTER TABLE `diaz_tbmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diaz_tbpendaftaran`
--
ALTER TABLE `diaz_tbpendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idNama` (`idNama`,`idKursus`),
  ADD KEY `idKursus` (`idKursus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diaz_tbkursus`
--
ALTER TABLE `diaz_tbkursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diaz_tbmhs`
--
ALTER TABLE `diaz_tbmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diaz_tbpendaftaran`
--
ALTER TABLE `diaz_tbpendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diaz_tbpendaftaran`
--
ALTER TABLE `diaz_tbpendaftaran`
  ADD CONSTRAINT `diaz_tbpendaftaran_ibfk_1` FOREIGN KEY (`idNama`) REFERENCES `diaz_tbmhs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diaz_tbpendaftaran_ibfk_2` FOREIGN KEY (`idKursus`) REFERENCES `diaz_tbkursus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
