-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 10:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `std_name_en` varchar(255) NOT NULL,
  `std_name_ar` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `date_b` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `rlg` varchar(255) NOT NULL,
  `adrs` varchar(255) NOT NULL,
  `fath_num` int(11) NOT NULL,
  `math_num` int(11) NOT NULL,
  `scd_lang` varchar(255) NOT NULL DEFAULT '0',
  `p_school` varchar(255) NOT NULL,
  `fath_name` varchar(255) NOT NULL,
  `fath_p_id` int(11) NOT NULL,
  `fath_jop` varchar(255) NOT NULL,
  `math_name` varchar(255) NOT NULL,
  `math_p_id` int(11) NOT NULL,
  `math_jop` varchar(255) NOT NULL,
  `statu` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `st` int(11) NOT NULL DEFAULT 0,
  `the_code` int(11) NOT NULL,
  `pd` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `grade`, `std_name_en`, `std_name_ar`, `gander`, `date_b`, `age`, `rlg`, `adrs`, `fath_num`, `math_num`, `scd_lang`, `p_school`, `fath_name`, `fath_p_id`, `fath_jop`, `math_name`, `math_p_id`, `math_jop`, `statu`, `dep`, `st`, `the_code`, `pd`) VALUES
(3, 'G8', 'osama', 'اسامه', 'Male', '2014-01-10', 'year : 7 month : 8 day : 21', 'Muslim', 'cairo', 2147483647, 2147483647, 'French', 'alex', 'naser', 2147483647, 'doctor', 'nada', 453564656, 'teacher', 'Married', 'National', 1, 59665, 1),
(8, 'G8', 'Ahmed', 'احمد', 'Male', '2012-07-20', 'year : 9 month : 2 day : 11', 'Muslim', 'cairo', 2147483647, 2147483647, 'French', 'alex', 'ali', 2147483647, 'doctor', 'nour', 2147483647, 'teacher', 'Married', 'American', 0, 2147483647, 0),
(13, 'BC', 'iop', 'ui', 'Male', '0009-06-07', 'year : 2012 month : 3 day : 24', 'Muslim', '979', 7, 79, 'French', '979', '7997', 97, '97', '779', 799, '80880', 'Married', 'National', 1, 37873648, 1),
(14, 'G1', 'ali', '789', 'Male', '0009-08-07', 'year : 2012 month : 1 day : 24', 'Muslim', '780', 9, 45343533, 'French', '789', '7', 78, '898', '89899', 8988, '878', 'Married', 'National', 0, 37202380, 0),
(15, 'BC', 'omar', '789', 'Male', '0007-09-08', 'year : 2014 month : 0 day : 23', 'Muslim', '898', 8, 987, 'French', '897', '978', 98, '789', '98', 8897, '89898979', 'Married', 'National', 0, 30708684, 0),
(16, 'BC', '789', '78', 'Male', '0097-08-09', 'year : 1924 month : 1 day : 22', 'Muslim', '978', 789, 978, 'French', '87987', '98', 89897, '88989', '88', 88, '88', 'Married', 'National', 0, 46471834, 0),
(17, 'G6', 'rrr', '89', 'Male', '0089-08-09', 'year : 1932 month : 1 day : 22', 'Muslim', '98', 998, 9, 'French', '9', '89', 9, '9', '9', 99, '9898', 'Married', 'National', 0, 56409879, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `fulname`, `admin`) VALUES
(1, 'hanan', '1234', 'kareem', 1),
(2, 'manal', '0000', 'waheed', 2),
(3, 'ahmed', '2468', 'sharara', 3),
(4, 'alaa', '1234', 'adel', 4),
(5, 'adel', '0000', 'mhmoud', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
