-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 11:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muneeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cash_id` int(11) NOT NULL,
  `cash_date` date NOT NULL,
  `cash_acc_name` varchar(255) NOT NULL,
  `cash_desc` text NOT NULL,
  `cash_amt` int(11) NOT NULL,
  `cash_type` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `close` int(2) NOT NULL,
  `entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cash_id`, `cash_date`, `cash_acc_name`, `cash_desc`, `cash_amt`, `cash_type`, `status`, `close`, `entry_time`) VALUES
(1, '2023-08-23', 'acc 01', 'Income', 100, 'Income', 1, 1, '2023-08-23 08:55:52'),
(2, '2023-08-24', 'acc 01', 'adding expense', -75, 'Expense', 1, 1, '2023-08-23 09:13:07'),
(3, '2023-08-26', 'acc 01', 'adding exp', 500, 'Income', 1, 1, '2023-08-23 09:06:54'),
(4, '2023-08-08', 'Ehsan', 'testing', -150, 'Expense', 1, 0, '2023-08-23 09:12:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cash_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
