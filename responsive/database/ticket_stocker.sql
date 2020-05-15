-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 08:17 PM
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
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount`) VALUES
(183, 0),
(184, 0),
(185, 0),
(186, 0),
(187, 0),
(188, 20);

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
(183, 5, 10),
(184, 20, 5),
(185, 0, 0),
(186, 0, 0),
(187, 20, 30),
(188, 30, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sold_seats`
--

CREATE TABLE `sold_seats` (
  `primary_key` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `seat_num` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sold_seats`
--

INSERT INTO `sold_seats` (`primary_key`, `id`, `seat_num`, `time`) VALUES
(17, 188, 1, '05:00:00'),
(18, 188, 2, '05:00:00'),
(19, 185, -1, '16:00:00'),
(20, 185, -1, '16:00:00'),
(21, 188, 21, '05:00:00'),
(22, 185, -1, '16:00:00'),
(23, 185, -1, '16:00:00'),
(24, 185, -1, '16:00:00'),
(25, 185, -1, '19:00:00'),
(26, 183, 1, '05:00:00');

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
(183, 'Star Wars', '2020-05-24', 50),
(184, 'Star Wars 3', '2020-05-17', 50),
(185, 'Party', '2020-05-29', 90),
(186, 'Emoji movie', '2020-05-24', 15),
(187, 'Demon Slayer', '2020-05-30', 50),
(188, 'Highschool DxD', '2020-05-27', 30);

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
(183, 100),
(184, 200),
(185, 5000),
(186, 2000),
(187, 100),
(188, 600);

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
(183, '05:00:00', '03:00:00', '16:00:00'),
(184, '16:00:00', '19:00:00', '23:00:00'),
(185, '16:00:00', '19:00:00', '00:00:00'),
(186, '05:00:00', '12:00:00', '00:00:00'),
(187, '16:00:00', '19:00:00', '23:00:00'),
(188, '05:00:00', '15:00:00', '00:00:00');

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
(11, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user'),
(12, 'stef', '9ffd23e5acda1e74de418e99cd3644ce8be6f808', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_seats`
--
ALTER TABLE `sold_seats`
  ADD PRIMARY KEY (`primary_key`);

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
-- AUTO_INCREMENT for table `sold_seats`
--
ALTER TABLE `sold_seats`
  MODIFY `primary_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
