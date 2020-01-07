-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 10:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_stocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `col` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `row`, `col`) VALUES
(162, 20, 20),
(163, 4, 8),
(164, 51, 98),
(165, 41, 85),
(166, 4, 8),
(167, 165, 195),
(168, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sold_seats`
--

CREATE TABLE `sold_seats` (
  `id` int(11) NOT NULL,
  `seat_num` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `date`, `price`) VALUES
(162, 'Highschool DxD', '2019-12-29', 99),
(163, 'Star Wars III', '2019-12-11', 3),
(164, 'Star Wars The Last Jedi', '2019-12-12', 516),
(165, 'Party 2019', '2019-12-27', 516),
(166, 'Mentalist', '2019-12-23', 4),
(167, 'Emoji angry', '0000-00-00', 3),
(168, 'Anime Movie', '2020-01-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_num`
--

CREATE TABLE `ticket_num` (
  `id` int(11) NOT NULL,
  `ticket_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_num`
--

INSERT INTO `ticket_num` (`id`, `ticket_num`) VALUES
(162, 1000),
(163, 616),
(164, 516),
(165, 77498),
(166, 1665),
(167, 7156),
(168, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `time1` time NOT NULL,
  `time2` time DEFAULT NULL,
  `time3` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `time1`, `time2`, `time3`) VALUES
(162, '12:00:00', '15:00:00', '19:00:00'),
(163, '05:02:00', '06:05:00', '07:05:00'),
(164, '05:02:00', '09:00:00', '04:51:00'),
(165, '05:03:00', '08:05:00', '23:06:00'),
(166, '05:03:00', '08:02:00', '01:00:00'),
(167, '05:03:00', '20:05:00', '23:05:00'),
(168, '05:01:00', '05:06:00', '05:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `type`) VALUES
(6, 'witherboy13', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user'),
(7, 'miha53cevic', 'c23086c8b86354645ada968666fddc8351db2de0', 'admin'),
(8, 'uwu', '8a7b91cee1b3fd5aafd5838a2867dfedcd92f227', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_seats`
--
ALTER TABLE `sold_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_num`
--
ALTER TABLE `ticket_num`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
