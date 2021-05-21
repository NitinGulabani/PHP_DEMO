-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 11:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stu_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL,
  `mobile_number` decimal(10,0) NOT NULL,
  `degree` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pro_lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `full_name`, `email`, `password`, `mobile_number`, `degree`, `gender`, `pro_lang`) VALUES
(21, 'Karan Gulabani', 'karan@gmail.com', 'karan1234', '8599887596', 'BSC IT', 'male', 'java,javascript,Ruby'),
(22, 'Nitin Gulabani', 'nitingulabani5@gmail.com', 'nitin123', '8758789698', 'BSC IT', 'male', 'java,Ruby'),
(23, 'Reetu Pabnani', 'reetupabnani@gmail.com', 'reetu1234', '8578489896', 'BSC IT', 'female', 'java,javascript,python,Ruby'),
(24, 'Harsh Wadhwani', 'harshwadhwani0718@gmail.com', 'harsh1234', '8598778596', 'BCA', 'male', 'java,javascript,python');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
