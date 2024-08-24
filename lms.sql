-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 10:09 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activecourses`
--

CREATE TABLE `activecourses` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activecourses`
--

INSERT INTO `activecourses` (`id`, `student`, `course`, `progress`, `dateAdded`) VALUES
(3, 2, 1, 80, '2024-08-13 05:56:49'),
(9, 1, 4, 0, '2024-08-22 20:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `role`) VALUES
(1, 'lvl100@edt.com', 'Password@100', 100, '100'),
(2, 'lvl200@edt.com', 'Password@200', 200, '200'),
(3, 'lvl300@edt.com', 'Password@200', 300, '300'),
(4, 'lvl400@edt.com', 'Password@200', 400, '400'),
(5, 'lvl500@edt.com', 'Password@500', 500, '500');

-- --------------------------------------------------------

--
-- Table structure for table `archivecourses`
--

CREATE TABLE `archivecourses` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `archivecourses`
--

INSERT INTO `archivecourses` (`id`, `student`, `course`, `dateAdded`) VALUES
(6, 1, 5, '2024-08-22 19:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `completecourses`
--

CREATE TABLE `completecourses` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `courseDesc` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `courseCode`, `courseDesc`, `level`, `tag`, `status`, `createdAt`) VALUES
(1, 'DESIGN AND TECHNOLOGY', 'EDT211', 'This is a 2-unit course on printing and communication', '200', '', 0, '2024-08-13 03:25:43'),
(4, 'Educating the impaired', 'EDT225', 'This course is dedicated to deaf and dumb', '200', '', 0, '2024-08-13 07:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `studID` varchar(30) NOT NULL,
  `matric` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `lastName`, `email`, `studID`, `matric`, `level`, `role`, `password`, `dateAdded`) VALUES
(1, 'Esther', 'Hudini', 'esther@futminna.edu', 'M123456', '2024/1/12345ED', 200, 0, '9u293ld', '2024-08-13 07:40:11'),
(2, 'rest', 'assured', 'res@fut.edu', 'm223344', '2024/1/2323', 200, 0, 'restassured', '2024-08-13 07:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activecourses`
--
ALTER TABLE `activecourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archivecourses`
--
ALTER TABLE `archivecourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completecourses`
--
ALTER TABLE `completecourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activecourses`
--
ALTER TABLE `activecourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `archivecourses`
--
ALTER TABLE `archivecourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `completecourses`
--
ALTER TABLE `completecourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
