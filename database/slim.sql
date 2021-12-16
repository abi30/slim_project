-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 12:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(9, 'New Raib', 32, 'Magical.', '2021-12-16 15:36:07', '2021-12-16 15:36:07'),
(10, 'mahabub', 34, 'Magic Goal...', '2021-12-16 22:24:53', '2021-12-16 22:24:53'),
(11, 'sabiha', 32, 'doctor', '2021-12-16 22:59:44', '2021-12-16 22:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `description`) VALUES
(1, 'My Note Nx<yxc 7503', 'Free Note?!?!d?!'),
(2, 'Chinese Proverb', 'Those who say it can not be done, should not interrupt those doing it.'),
(3, 'Long Note 3', 'This is a very large note, or maybe not...'),
(4, 'Napoleon Hill', 'Whatever the mind of man can conceive and believe, it can achieve.'),
(5, 'Note 5', 'A Random Note'),
(6, 'Brian Tracy', 'Develop an attitude of gratitude, and give thanks for everything that happens to you, knowing that every step forward is a step toward achieving something bigger and better than your current situation.'),
(7, 'Zig Ziglar', 'Your attitude, not your aptitude, will determine your altitude.'),
(8, 'William James', 'The greatest discovery of my generation is that a human being can alter his life by altering his attitudes.'),
(9, 'Og Mandino', 'Take the attitude of a student, never be too big to ask questions, never know too much to learn something new.'),
(10, 'Earl Nightingale', 'Our attitude towards others determines their attitude towards us.'),
(11, 'Norman Vincent Peale', 'Watch your manner of speech if you wish to develop a peaceful state of mind. Start each day by affirming peaceful, contented and happy attitudes and your days will tend to be pleasant and successful.'),
(12, 'W. Clement Stone', 'There is little difference in people, but that little difference makes a big difference. The little difference is attitude. The big difference is whether it is positive or negative.'),
(13, 'Dale Carnegie', 'Happiness does not depend on any external conditions, it is governed by our mental attitude.'),
(14, 'Walt Disney', 'If you can dream it, you can do it.'),
(15, 'William Shakespeare', 'Our doubts are traitors and make us lose the good we oft might win by fearing to attempt.'),
(16, 'Albert Einstein', 'A person who never made a mistake never tried anything new.'),
(17, 'New Soccer Note', 'Magic Goal...');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `status`, `userId`) VALUES
(1, 'Go to cinema', NULL, 1, 8),
(2, 'Buy shoes', NULL, 0, 8),
(3, 'Go to shopping', NULL, 0, 8),
(4, 'Pay the credit card ;-)', NULL, 1, 8),
(5, 'Do math homework...', NULL, 0, 8),
(6, 'Just Testing...', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Juan', 'juanmartin@mail.com', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(2, 'James', 'jbond@yahoo.net', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(3, 'Lionel', 'mess10@gmail.gol', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(4, 'Carlos', 'bianchini@hotmail.com.ar', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(5, 'Diego', 'diego1010@gmail.com', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(6, 'One User', 'one@user.com', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(7, 'Diegol', 'diego@gol.com.ar', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(8, 'Test User', 'test@user.com', 'd5f4da62059760b35de35f8fbd8efb43eee26ac741ef8c6e51782a13ac7d50e927b653160c591616a9dc8a452c877a6b80c00aecba14504756a65f88439fcd1e'),
(9, 'abdulla', 'rakib@mail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79'),
(10, 'mahabub', 'mahabub@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_users_fk` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_users_fk` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
