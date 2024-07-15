-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'Mr.', 'A', 'admin', 'admin', 'admin123@gmail.com', '12345678', 'admin.png'),
(2, 'admin2', 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', '012345678', 'admin.png'),
(3, 'admin3', 'admin3', 'admin3', 'admin3', 'admin3@gmail.com', '133446557', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time DEFAULT NULL,
  `booking_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=New Booking; 1=Confirmed; 2=Rejected;',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_id`, `name`, `emailid`, `mobile`, `booking_date`, `booking_time`, `booking_status`, `created_at`, `room_type`) VALUES
(1, 24317405, 'student1', 'student1@ostimteknik.edu.tr', '1231223423', '2024-06-02', '18:30:00', 1, '2024-05-21 17:04:03', 'Red Room'),
(3, 89796709, 'student2', 'student2@ostimteknik.edu.tr', '1232312312', '2024-06-02', '18:30:00', 0, '2024-05-21 17:04:18', 'BLue Room'),
(14, 69661964, 'student3', 'student3@ostimteknik.edu.tr', '1231231231', '2024-06-02', '18:30:00', 2, '2024-05-21 17:04:30', 'Red Room'),
(15, 79122103, 'student4', 'student4@ostimteknik.edu.tr', '1231121221', '2025-05-20', '00:20:30', 0, '2024-05-21 17:05:42', 'Red Room'),
(16, 40455189, 'student5', 'student5@ostimteknik.edu.tr', '1231121221', '2024-06-01', '08:30:00', 0, '2024-05-06 12:03:04', 'Yellow Room'),
(17, 67728690, 'student2', 'student2@ostimteknik.edu.tr', '1231231231', '2024-06-01', '08:30:00', 1, '2024-05-07 13:02:57', 'Yellow Room'),
(18, 79951362, 'student1', 'student1@ostimteknik.edu.tr', '1111111111', '2024-07-06', '16:30:00', 1, '2024-05-21 17:07:20', 'Blue Room'),
(19, 98636738, 'student5', 'student5@ostimteknik.edu.tr', '5555555555', '2024-08-29', '12:30:00', 1, '2024-05-21 17:07:30', 'Red Room');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `table_no` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL COMMENT '1=Confirmed; 2=Rejected;',
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `booking_id`, `table_no`, `booking_status`, `remarks`, `created_at`) VALUES
(2, 67728690, '', '1', 'approved.', '2024-05-21 17:07:48'),
(3, 79951362, '', '1', 'Approved.', '2024-05-19 04:19:56'),
(4, 98636738, '', '1', 'Approved.', '2024-05-20 04:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `image_path` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`, `image_path`) VALUES
(1, 'Principal of electronics', 'V.K. Mehta, Rohit Mehta', '3rd', 'Available', 3, 'EEE', '62oashd123.jpg'),
(2, 'The Complete Reference C++', 'Herbert Schildt', '4th', 'Available', 5, 'CENG', '664cd74b8f1kc.jpg'),
(3, 'Data Structure', 'Seymour Lipschutz', '4th', 'Available', 3, 'CENG', '621cdasd8lkna1.jpg'),
(4, 'Basic Physics', 'Karl F. Kuhn ', '3rd', 'Available', 10, 'EEE', '664cd74b8f2af.jpg'),
(5, 'Elementary Linear Algebra', 'Ron Larson', '8th', 'Available', 3, 'MATH', '664cd9c957fac.jpg'),
(6, 'SQL QuickStart Guide', 'Walter Shields', '1st', 'Available', 2, 'CENG', '664cd9fa57402.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(5, 'student1', 'hello!'),
(16, 'student3', 'There is no books of ETE department.When will it be available?'),
(17, 'Admin', 'Hi! which book do you need student3. Please let us know.'),
(18, 'student4', 'Hello, is there any books for Business Administration Department ?'),
(19, 'Promi', 'Hi! which book do you need student4. Please let us know.'),
(23, 'student2', 'Good books');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('student4', 2, '2024-05-19', 98, 9.8, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('student1', 1, 'Yes', '2024-05-22', '2024-06-22'),
('student2', 2, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2024-03-20', '2024-04-20'),
('student2', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2024-01-30', '2024-02-28'),
('student3', 1, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2024-04-20', '2024-05-20'),
('student4', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2024-02-20', '2024-02-10'),
('student1', 144, 'Yes', '2024-07-01', '2024-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('student1', 'student1', 'student1', 'student1', 1, 'student1@gmail.com', '123', 'p.jpg'),
('student2', 'student2', 'student2', 'student2', 2, 'student2@gmail.com', '123', 'p.jpg'),
('student3', 'student3', 'student3', 'student3', 3, 'student3@gmail.com', '123', 'p.jpg'),
('student4', 'student4', 'student4', 'student4', 4, 'student4@gmail.com', '123', 'p.jpg'),
('student5', 'student5', 'student5', 'student5', 5, 'student5@gmail.com', '123', 'p.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
