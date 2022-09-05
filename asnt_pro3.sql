-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 05:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asnt_pro3`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(10) NOT NULL,
  `document_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document_name`) VALUES
(29, 'nepali.pdf'),
(30, 'MILAN_CV.pdf'),
(31, 'form2.pdf'),
(32, 'nepali - Copy (2).pdf'),
(33, 'nepali - Copy (3) - Copy.pdf'),
(34, 'nepali - Copy (4) - Copy.pdf'),
(35, 'nepali - Copy (5) - Copy.pdf'),
(36, 'nepali - Copy - Copy (2).pdf'),
(37, 'HTML.pdf'),
(38, 'extra-set-13.pdf'),
(39, 'Practical-Exam-Paper-B.pdf'),
(40, 'En-1-02.pdf'),
(41, 'ApplicationDetails.pdf'),
(42, '??????? ?.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_company` varchar(80) NOT NULL,
  `user_phone_no` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_company`, `user_phone_no`) VALUES
(8, 'admin', 'admin@gmail.com', 'admin123', 'boss', 9807445408),
(12, 'Lokman Chaudhary', 'lokman@gmail.com', 'lokman123', 'IBM', 9815488334),
(19, '  Milan chaudhary', 'milan@gmail.com', 'milan123', '  iTech', 9807514100),
(20, '  Krishna chaudhary', 'krishana@gmail.com', 'krishana123', '  iTech', 9807445408),
(22, ' Saloni chaudhary', 'saloni@gmail.com', 'saloni123', ' iTech', 9806553456),
(24, 'akshay kumar', 'akshay@gmail.com', 'akshay123', 'iTechi', 9807645433),
(25, 'ajeet chaudhary', 'ajeet@gmail.com', 'ajeet234', 'iTech', 9807788334),
(26, 'Harimaya chaudhary', 'harimaya@gmail.com', 'harimaya123', 'iTech', 9867755756),
(28, 'shivam chaudhary', 'shivam@gmail.com', 'shivam123', 'bTech', 9805688788),
(29, 'Bhojraj sharma', 'Bhojraj@gmail.com', 'Bhojraj123', 'iTEch', 9807654523);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
