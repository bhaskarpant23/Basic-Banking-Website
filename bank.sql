-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 08:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `account number` bigint(20) NOT NULL,
  `balance` int(11) NOT NULL,
  `date and time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `account number`, `balance`, `date and time`) VALUES
(1, 'Govind Singh', 'govind@gmail.com', 4567, 5000, '2021-06-03 07:27:52'),
(2, 'Ratnesh Pandey', 'ratnesh@yahoo.com', 7789, 3000, '2021-06-03 07:28:52'),
(3, 'Aman Singh', 'aman@gmail.com', 5678, 3000, '2021-06-03 07:29:49'),
(4, 'Rohit Pandey', 'rohit@gmail.com', 1256, 9000, '2021-06-03 07:30:33'),
(5, 'Srajan Agarwal', 'srajan@yahoo.com', 4532, 6000, '2021-06-03 07:31:09'),
(6, 'Ayush Mishra', 'mishra@gmail.com', 8902, 4000, '2021-06-03 07:31:42'),
(7, 'Kunal Sachan', 'kunal@yahoo.com', 5690, 15000, '2021-06-03 07:32:59'),
(8, 'Naveen Pandey', 'naveen@yahoo.com', 1298, 13000, '2021-06-03 07:34:04'),
(9, 'Anshika Sharma', 'anshika@gmail.com', 7778, 6000, '2021-06-03 07:34:53'),
(10, 'Mehul Pandey', 'mehul@gmail.com', 5567, 8000, '2021-06-03 07:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(11) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date and time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `amount`, `date and time`) VALUES
(1, 'Govind Singh', 'Ratnesh Pandey', 1000, '2021-06-04 15:25:49'),
(2, 'Kunal Sachan', 'Ratnesh Pandey', 100, '2021-06-04 15:26:00'),
(3, 'Govind Singh', 'Ayush Mishra', 100, '2021-06-04 15:26:49'),
(4, 'Ayush Mishra', 'Govind Singh', 100, '2021-06-04 15:27:18'),
(5, 'Govind Singh', 'Srajan Agarwal', 100, '2021-06-04 15:40:48'),
(6, 'Srajan Agarwal', 'Govind Singh', 100, '2021-06-04 15:41:22'),
(7, 'Srajan Agarwal', 'Ratnesh Pandey', 1000, '2021-06-04 20:14:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
