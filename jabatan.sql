-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 07:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nip` char(18) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `job_desc` varchar(255) DEFAULT NULL,
  `status_kerja` enum('Full time','Magang') NOT NULL,
  `gaji_pokok` int(15) DEFAULT NULL,
  `tgl_gaji` text DEFAULT NULL,
  `kenaikan_gaji` int(15) DEFAULT NULL,
  `tgl_naik_gaji` date DEFAULT NULL,
  `id_departemen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nip`, `nama_jabatan`, `divisi`, `job_desc`, `status_kerja`, `gaji_pokok`, `tgl_gaji`, `kenaikan_gaji`, `tgl_naik_gaji`, `id_departemen`) VALUES
(1, '', 'Head of Marketing', 'Marketing', 'Promotion, Events, Social Media', 'Full time', 4500000, '01', 0, '0000-00-00', 0),
(2, '', 'Head of IT', 'IT', 'Mobile Apps, Desktop Apps, UI/UX', 'Full time', 8000000, '01', 0, '0000-00-00', 0),
(3, '', 'IT Staff', 'IT', 'Buat sistem inventaris kantor', 'Full time', 4000000, '09', 0, '0000-00-00', 0),
(4, '', 'Marketing Staff', 'Marketing', 'Content Creator (IG)', 'Full time', 4000000, '01', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
