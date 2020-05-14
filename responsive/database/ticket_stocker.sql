-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 02:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(171, 10, 5),
(172, 5, 1),
(173, 4, 2),
(174, 2, 5),
(175, 546, 984),
(176, 954, 45);

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
(171, 'Highschool DxD', '2020-05-23', 99),
(172, 'Demon Slayer', '2020-05-22', 11),
(173, 'Star Wars', '2020-05-24', 4616),
(174, 'Star Wars 3', '2020-05-20', 59456),
(175, 'Emoji', '2020-05-30', 646),
(176, 'Party', '2020-05-13', 74);

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
(171, 50000),
(172, 69),
(173, 646),
(174, 846546),
(175, 98464),
(176, 8798798);

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
(171, '09:00:00', '11:00:00', '13:00:00'),
(172, '05:00:00', '07:00:00', '08:00:00'),
(173, '00:00:00', '05:00:00', '09:00:00'),
(174, '09:00:00', '15:00:00', '20:00:00'),
(175, '09:00:00', '07:03:00', '09:05:00'),
(176, '01:08:00', '07:04:00', '08:05:00');

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
(9, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(10, 'miha', '2daabc8f18fb7e2acf26b2ce498cce047dcfc6a8', 'user'),
(11, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
