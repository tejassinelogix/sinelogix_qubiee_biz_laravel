-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 12:53 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qbedemos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount_voucher`
--

CREATE TABLE `discount_voucher` (
  `discount_id` int(11) NOT NULL,
  `is_auto_generated` enum('yes','no') DEFAULT 'no',
  `voucher_name` varchar(255) DEFAULT NULL,
  `voucher_type_id` int(11) DEFAULT NULL,
  `voucher_validity` enum('yes','no') DEFAULT 'no',
  `validity_start_date` date DEFAULT NULL,
  `validity_end_date` date DEFAULT NULL,
  `is_minimum_order` enum('yes','no') DEFAULT 'no',
  `minimum_amount` int(11) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount_voucher`
--
ALTER TABLE `discount_voucher`
  ADD PRIMARY KEY (`discount_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount_voucher`
--
ALTER TABLE `discount_voucher`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
