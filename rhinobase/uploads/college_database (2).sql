-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 07:23 AM
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
-- Database: `college_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard_table`
--

CREATE TABLE `noticeboard_table` (
  `n_id` int(11) NOT NULL,
  `n_content` varchar(255) NOT NULL,
  `n_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticeboard_table`
--

INSERT INTO `noticeboard_table` (`n_id`, `n_content`, `n_date`) VALUES
(6, 'iojdiojwjjdwj\r\n', '2023-09-25'),
(7, 'nonneonoenod\r\nkedij\r\nodoiejio\r\nondoenodjoeij\r\ndoeijdojedijw\r\ndnoendoweno\r\nnjnoenwo', '2023-09-25'),
(8, 'jnjnnendoennjnj\r\njnononoin\r\nnonionp\r\njnonpnp\r\nnoonpnp\r\n', '2023-09-25'),
(9, 'klnlknklnnl\r\n', '2023-09-25'),
(10, 'nlncnenepn\r\nmpmn\r\nmlknlnp\r\nlnnp\r\nllknpn\r\nnnp\r\n', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_mail` varchar(255) NOT NULL,
  `s_pass` varchar(255) NOT NULL,
  `s_dept` varchar(50) NOT NULL,
  `s_gender` varchar(10) NOT NULL,
  `s_semister` varchar(255) NOT NULL,
  `s_fees` int(11) NOT NULL,
  `s_Session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`s_id`, `s_name`, `s_mail`, `s_pass`, `s_dept`, `s_gender`, `s_semister`, `s_fees`, `s_Session`) VALUES
(36, 'Topa', '', '', 'BCA', 'Male', '3rd-Year', 27000, '2022-2025'),
(37, 'Sam', '', '', 'BCA', 'Male', '3rd-Year', 27000, '2022-2025'),
(38, 'student2023', 'Topa', 'topa@gmail.com', 'BCA', 'Male', '1st-Year', 25000, '2024-2028'),
(39, 'moga', 'moga@gmail.com', 'student2023', 'BCA', 'Male', '1st-Year', 25000, '2021-2024'),
(40, 'topa', 'd@gmail.com', '$2y$10$rw3d.imdRmPwsQEW18F6EeWi52LvE7buDe/TOtCM69ETI3FqkBNiO', 'BCA', 'Male', '1st-Year', 25000, '2021-2024'),
(41, 'titu bhai', 'f@gmail.com', '$2y$10$1GVj9eIzUxI.4Zbk0l/VS.WvszvdsZp8vNLVNejkHu4bDGQwlAmDy', 'BBA', 'Male', '1st-Year', 25000, '2021-2024');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_department` varchar(50) NOT NULL,
  `t_subject` varchar(50) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_date` date NOT NULL,
  `t_salary` varchar(10) NOT NULL,
  `t_status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`t_id`, `t_name`, `t_department`, `t_subject`, `t_gender`, `t_date`, `t_salary`, `t_status`) VALUES
(3, 'sachin', 'BCA', 'java', 'Male', '2023-09-20', '1000', 'Deactive'),
(5, 'kartik', 'BCOM', 'mkle', 'Male', '2023-09-06', '200', 'Active'),
(6, 'huhuw', 'BA', 'hoiiho', 'Female', '2023-09-03', '1222', 'Active'),
(7, 'uhh', 'none', 'iuhuh', 'Male', '2023-09-01', '21321', 'Active'),
(8, '321', 'BCA', '11w1', 'Female', '2023-09-05', '12333', 'Active'),
(9, 'jnkj', 'BCA', 'njjkn', 'Male', '2023-09-09', 'jnjn', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `t_day` varchar(30) NOT NULL,
  `time_id` int(11) NOT NULL,
  `time_9` varchar(30) NOT NULL,
  `time_10` varchar(30) NOT NULL,
  `time_11` varchar(30) NOT NULL,
  `time_12` varchar(30) NOT NULL,
  `time_1` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`t_day`, `time_id`, `time_9`, `time_10`, `time_11`, `time_12`, `time_1`) VALUES
('Monday', 1, 'abc', 'def', 'ghi', 'jkl', 'mnn'),
('Tuesday', 2, '', 'uhuhwq', '', '', ''),
('Wednesday', 3, '', '', '', '', ''),
('Thursday', 4, 'now', 'nn', 'bub', 'bub', 'bib'),
('Friday', 5, '', '', '', '', ''),
('Saturday', 6, 'aaj', 'ki chutti ', 'hai', 'jioj', 'jojo');

-- --------------------------------------------------------

--
-- Table structure for table `uploads_table`
--

CREATE TABLE `uploads_table` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_size` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticeboard_table`
--
ALTER TABLE `noticeboard_table`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `uploads_table`
--
ALTER TABLE `uploads_table`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticeboard_table`
--
ALTER TABLE `noticeboard_table`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploads_table`
--
ALTER TABLE `uploads_table`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
