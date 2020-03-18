-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 02:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblist`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `number` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `info` varchar(100) NOT NULL,
  `handled_by` varchar(30) NOT NULL,
  `req_by` varchar(30) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `time` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`number`, `type`, `title`, `info`, `handled_by`, `req_by`, `start_date`, `end_date`, `status`, `time`, `username`) VALUES
(6, 'Issue', 'Perhitungan PPh 21', 'Perhitungan pajak untuk bukan karyawan', 'Taufan', 'Pak eko', '2019-10-21', '2020-04-21', 'Finished', '10-03-20 10:38:16', 'taufansa'),
(7, 'Issue', 'KPI', 'Perhitungan rumus KPI', 'Taufan', 'Pak eko', '2019-11-29', '2019-12-06', 'Closed', '10-03-20 10:39:41', 'taufansa'),
(8, 'Issue', 'SG', 'Potongan absensi SG (Setengah Gaji)', 'Taufan', 'Pak eko', '2019-12-27', '2020-01-20', 'Finished', '10-03-20 10:41:13', 'taufansa'),
(9, 'Project', 'CS to SG', 'Potongan CS to SG jika tidak punya cuti', 'Taufan', 'Pak eko', '2020-01-29', '2020-02-12', 'Finished', '10-03-20 10:42:21', 'taufansa'),
(10, 'Project', 'CO', 'Fitur CO (Change Off)', 'Taufan', 'Pak eko', '2020-03-10', '2020-03-11', 'Outstanding', '10-03-20 10:43:42', 'taufansa'),
(11, 'Project', 'Notifikasi Realisasi PRF/BON', 'Notifikasi realisasi dokumen PRF/BON agar berurutan', 'Taufan', 'Pak eko', '2020-01-27', '2020-01-31', 'Finished', '10-03-20 10:44:50', 'taufansa'),
(12, 'Project', 'Menu Edit Gaji/Isi Gaji', 'Tambah fitur edit gaji/isi gaji ke user 0hrm & 0hrmp', 'Taufan', 'Pak eko', '2020-01-16', '2020-01-17', 'Closed', '10-03-20 10:47:28', 'taufansa'),
(14, 'Project', 'Laporan Gaji Excel', 'laporan gaji bulanan dalam bentuk excel', 'Iwan', 'eko', '2020-03-02', '2020-03-19', 'Ongoing', '12-03-20 07:42:32', 'iwanyes');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `number` int(11) NOT NULL,
  `team_name` varchar(20) NOT NULL,
  `team_pass` varchar(500) NOT NULL,
  `team_info` varchar(50) NOT NULL,
  `team_admin` varchar(20) NOT NULL,
  `team_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`number`, `team_name`, `team_pass`, `team_info`, `team_admin`, `team_created`) VALUES
(3, 'HRMS', '$2y$10$zRACztyVF3AJSW1fgKBRYOHhMbbL7T.KgE8f4clXBpWF4II26IVGq', 'team test', 'taufansa', '11-03-20 07:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `team` varchar(20) NOT NULL,
  `team_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `username`, `password`, `nama`, `nip`, `phone`, `grade`, `dept`, `team`, `team_admin`) VALUES
(11, 'taufansa', '$2y$10$/cyLpqLEj2tXHMeyaP0lt.ERkLJuMQbNdioF/ODmvd1ih5oRxsTle', 'Taufan Samudra Akbar', '1301150041', '083873360540', '08', 'MIS', 'HRMS', '1'),
(15, 'iwanyes', '$2y$10$YGdPB3CH5PGXDADRBsa/OeECtPuVi5SZJ9v2GE6WkDdzMIFNTaRK2', 'iwan', '1301140002', '083872260540', '08', 'MIS', 'HRMS', '0'),
(17, 'ekadallas', '$2y$10$fLv4kxm2R/g4vh.V2NnO6.TQDacsku79D5A4VTPW6S.NN4XLh/1Iu', 'Eka Dallas Pangestu', '12135531251', '000810180101', '08', 'MIS', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
