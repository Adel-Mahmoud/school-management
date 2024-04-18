-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 05:18 PM
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
  `approv` int(11) NOT NULL DEFAULT 0,
  `pd` int(255) NOT NULL DEFAULT 0,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `grade`, `std_name_en`, `std_name_ar`, `gander`, `date_b`, `age`, `rlg`, `adrs`, `fath_num`, `math_num`, `scd_lang`, `p_school`, `fath_name`, `fath_p_id`, `fath_jop`, `math_name`, `math_p_id`, `math_jop`, `statu`, `dep`, `approv`, `pd`, `Date`) VALUES
(5, 'KG1', 'sameh', 'سامح', 'Male', '2021-03-11', 'year : 0 month : 6 day : 20', 'Muslim', '1', 1, 1, 'French', '1', '1', 1, '1', '1', 1, '1', 'Married', 'American', 3, 0, '0000-00-00 00:00:00'),
(6, 'G11', 'Hatem', 'حاتم', 'Male', '2000-05-15', 'year : 21 month : 4 day : 16', 'Muslim', 'ttt', 444, 444, 'French', 'ttt', 'ttt', 444, 'ttt', 'ttt', 444, 'ttt', 'Married', 'American', 1, 0, '2021-03-10 21:23:53'),
(9, 'G5', 'Ahmed', 'احمد', 'Fmale', '2010-10-15', 'year : 10 month : 11 day : 16', 'Muslim', 'cairo', 77777, 6767, 'French', 'alex', 'omer', 5555, 'programer', 'hoda', 44444, 'doctor', 'Divorced', 'American', 0, 0, '2021-03-23 20:35:30'),
(17, 'G3', 'salah', 'صلاح', 'Male', '2016-10-01', 'year : 5 month : 0 day : 0', 'Muslim', 'cairo', 6666, 6756576, 'French', 'alex', 'ali', 5675676, 'doctor', 'hala', 2147483647, 'doctor', 'Divorced', 'National', 0, 0, '2021-03-27 19:57:16'),
(18, 'G4', 'khaled', 'خالد', 'Male', '2014-10-05', 'year : 6 month : 11 day : 26', 'Muslim', 'cairo', 2147483647, 2147483647, ' German', 'alex', 'Osama', 898978989, 'doctor', 'Nermeen', 546545465, 'teacher', 'Married', 'American', 0, 0, '2021-03-27 20:44:15'),
(19, 'G4', 'Omer', 'عمر', 'Male', '2015-03-10', 'year : 6 month : 6 day : 21', 'Muslim', 'Giza', 1010866586, 1010866587, 'French', 'NIC', 'Naser', 2147483647, 'Doctor', 'Sama', 2147483647, 'Doctor', 'Married', 'American', 0, 0, '2021-03-28 13:06:26');

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
(1, 'Hanan', '0000', 'kareem', 1),
(2, 'manal', '0000', 'waheed', 2),
(3, 'ahmed', '0000', 'sharara', 3),
(4, 'Alaa', '0000', 'adel', 4),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
