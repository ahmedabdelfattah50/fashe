-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 09:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashe`
--

-- --------------------------------------------------------

--
-- Table structure for table `hosters`
--

CREATE TABLE `hosters` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `date` date NOT NULL,
  `trust_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosters`
--

INSERT INTO `hosters` (`ID`, `name`, `username`, `password`, `email`, `phone`, `date`, `trust_status`) VALUES
(25, 'Ahmed Marouf', 'Ahmed_MaRF', '$2y$10$O1j7eCtHTMQqYH1.m13otOmlvLARsI4zXhBCg3qAOLJ22.cSr.Yc.', 'marouf@gmail.com', 12458756, '2020-06-14', 1),
(51, 'AAAASFSDFSDFSDF', 'AAAASFSDFSDFSDFe', '$2y$10$jQytXoPxHg9r6H7jXaQlGeSKgMSXegSqd4Mx1WWpMj7YrvF47q34a', 'sdfsdds@sdf.sd', 454512542, '2021-01-21', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hosters`
--
ALTER TABLE `hosters`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hosters`
--
ALTER TABLE `hosters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
