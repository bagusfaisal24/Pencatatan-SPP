-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 09:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dp_rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `NIS` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `NIS`, `tanggal`, `jumlah`) VALUES
(23, '1600018133', '2017-03-20', '200.000'),
(24, '1400018127', '2017-03-20', '100.000'),
(25, '1400018127', '2017-03-20', '100.000'),
(27, '1300018127', '2017-03-20', '50.000'),
(28, '1500018130', '2017-03-20', '150.000'),
(29, '1500018130', '2017-03-20', '150.000'),
(30, '1600018044', '2017-03-22', '200.000'),
(31, '1300018127', '2017-03-27', '50.000'),
(32, '1400018127', '2017-03-27', '100.000'),
(33, '1300018111', '2017-03-27', '50.000'),
(34, '1300018111', '2017-04-03', '50.000'),
(35, '1300018127', '2017-04-03', '50.000');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `tagihan`) VALUES
(0, 0),
(2013, 40000),
(2014, 100000),
(2015, 150000),
(2016, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIS` varchar(10) NOT NULL,
  `id_setting` int(11) NOT NULL,
  `NAMA` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIS`, `id_setting`, `NAMA`, `password`) VALUES
('121212', 2, 'admin', 'admin'),
('1300018111', 2013, 'Feri irawan', ''),
('1300018127', 2013, 'Irsyad Pahlapi', ''),
('1400018127', 2014, 'Bagus Faisal Khafidz', ''),
('1500018130', 2015, 'Muh Fadli', ''),
('1600018044', 2016, 'Fikri ', ''),
('1600018133', 2016, 'Luqman', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `fk_NIS` (`NIS`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_NIS` FOREIGN KEY (`NIS`) REFERENCES `user` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
