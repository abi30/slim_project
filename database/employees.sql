-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 04:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slim`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `possion` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `age`, `possion`, `date_created`, `date_modif`) VALUES
(2, 'mustofa', 21, 'sr.dv', '2021-12-16 12:53:35', '2021-12-16 12:53:35'),
(3, 'devid', 34, 'Architekt ', '2021-12-16 12:53:35', '2021-12-16 12:53:35'),
(4, 'alabin', 30, 'human Ressource', '2021-12-16 12:53:35', '2021-12-16 12:53:35'),
(5, 'abdulla', 32, 'junior dv', '0000-00-00 00:00:00', '2021-12-16 12:53:45'),
(6, 'mustofa', 21, 'sr.dv', '2021-12-16 12:53:45', '2021-12-16 12:53:45'),
(7, 'devid', 34, 'Architekt ', '2021-12-16 12:53:45', '2021-12-16 12:53:45'),
(8, 'alabin', 30, 'human Ressource', '2021-12-16 12:53:45', '2021-12-16 12:53:45'),
(9, 'New Raib', 32, 'Magical.', '2021-12-16 15:36:07', '2021-12-16 15:36:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
