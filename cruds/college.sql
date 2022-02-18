-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 10:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `education` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `salary`, `email`, `cell`, `department`, `gender`, `education`, `photo`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(30, 'pilu', '1000000', 'hasanpeal65@gmail.com', '01709908701', 'CSE', 'Male', 'Bachelor', 'peal.jpg ', 1, 0, '2022-02-05 07:22:56', '2022-02-18 09:30:53'),
(32, 'Ibn Sad', '550000', 'hasanpeal65@gmail.com', '01709908701', 'CSE', 'Male', '', '272724463_305996681556748_8482837079445174689_n.jpg ', 1, 0, '2022-02-05 07:36:13', '2022-02-18 09:28:21'),
(34, 'Peal Hasan', '70000', 'hasanpeal65@gmail.com', '01709908701', 'CSE', 'Male', 'Bachelor', 'career-succes.png ', 1, 0, '2022-02-05 10:32:04', '2022-02-18 09:22:59'),
(35, 'Tanmoy', '44000', 'aziz@gmail.com', '01334267335', 'CSE', 'Male', 'Bachelor', '258362961_239834478214354_6978955596813673911_n.jpg', 1, 0, '2022-02-05 10:33:09', '2022-02-05 10:35:56'),
(36, 'Mira', '45000', 'mira@gmail.com', '01334267335', 'CSE', 'Female', 'Masters', '272400501_616547259453641_3689649501477603738_n.jpg ', 1, 0, '2022-02-05 10:37:11', '2022-02-18 09:27:59'),
(37, 'jarin islam', '1000000', 'jarin@gamil.com', '01709908701', 'CSE', 'Female', 'Phd', 'career-succes.png', 1, 0, '2022-02-08 16:13:13', '2022-02-08 16:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
