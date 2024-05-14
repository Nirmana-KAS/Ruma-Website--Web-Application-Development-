-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 03:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruuma`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(160) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`) VALUES
('123', '$2y$10$6F7gnBxWRHz6YTxWt0Hj4ezz.lFl2Ocm9HQ2F7k2mQD/CcfIPS2Ym', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paidads`
--

CREATE TABLE `paidads` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` int(100) NOT NULL,
  `district` int(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paidads`
--

INSERT INTO `paidads` (`id`, `image`, `description`, `category`, `district`, `mobile`) VALUES
(15, 'addawa red.png', 'dldmls', 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `contact_information` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `room_type` varchar(10) NOT NULL,
  `image_filepath` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `title`, `address`, `latitude`, `longitude`, `price`, `contact_information`, `gender`, `room_type`, `image_filepath`) VALUES
(51, 'test', 'no 88 trincomalee road mihinhale', 6.823870, 82.030414, 2000.00, '0703538752', '0', 'Double', 'uploads/WhatsApp Image 2023-07-11 at 22.18.32.jpg'),
(52, 'test', 'no 88 trincomalee road mihinhale', 1.821382, 80.031360, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(58, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(59, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(60, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(61, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(62, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(63, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(64, 'indika', 'no 88 trincomalee road mihinhale', 3232.000000, 23.000000, 23232.00, '32323', '3233', 'Male', 'uploads/iiii.jpg'),
(65, 'chathushka', 'no 88 trincomalee road mihinhale', 3232.000000, 32.000000, 2000.00, '0703538752', '703538752', 'Female', 'uploads/file.jpg'),
(66, '', '', 0.000000, 0.000000, 0.00, '', '0', 'Female', 'uploads/'),
(67, '', '', 0.000000, 0.000000, 0.00, '', '0', 'Female', 'uploads/'),
(68, 'dsdasdas', '', 0.000000, 0.000000, 0.00, '', '0', 'Female', 'uploads/'),
(69, 'sisira', 'no 88 trincomalee road mihinhale', 6.823870, 80.030411, 2000.00, '0703538752', '0', 'Double', 'uploads/WhatsApp Image 2023-07-11 at 22.18.32.jpg'),
(70, 'near bodime', 'no 88 trincomalee road mihinhale', 6.823870, 80.030414, 2000.00, '0703538752', '0', 'Double', 'uploads/WhatsApp Image 2023-07-11 at 22.18.32.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paidads`
--
ALTER TABLE `paidads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paidads`
--
ALTER TABLE `paidads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
