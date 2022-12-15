-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 08:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcd`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(3) NOT NULL,
  `noreg` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jkl` char(9) NOT NULL,
  `nohp` char(15) NOT NULL,
  `konsentrasi` char(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `noreg`, `nama`, `tempat`, `tanggal`, `jkl`, `nohp`, `konsentrasi`, `alamat`, `gambar`) VALUES
(1328, 123, 'hermanus', 'makasar', '2020-11-17', 'perempuan', '085256987334534', 'jaringan', 'asd', '5fbbfafac828b.jpeg'),
(1329, 123, 'hergrg', 'gfgf', '2020-11-11', 'perempuan', '085256406491', 'program', 'asd', '5fbbda4cf3981.jpg'),
(1330, 123, 'HERMANUS SENDY', 'makasar', '2020-12-10', 'laki-laki', '0856743238', 'program', 'asd', '5fbbf5555177f.jpg'),
(1331, 111, 'gchhg', 'makasar', '2020-11-26', 'laki-laki', '085256406491', 'hardware', 'peka tuju', '5fbbfd1764de3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gambar`, `email`, `nohp`) VALUES
(1, 'admin', '$2y$10$iAs9ZIiwEroObWofuxnHc.F4ILUhTXBdklhSbN4olU2O/KiIBSFKO', '', '', ''),
(2, 'kamu', '$2y$10$ikAzcbLL3tWtULcD1UDcNu8JZgtUl7T9JN1uXPaGPIpCzEJG6ywei', '', '', ''),
(3, 'jkl', 'jkl', '', '', ''),
(4, 'sendy', '123', '', '', ''),
(5, '192355', 'm192355', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1332;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
