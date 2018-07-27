-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 08:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `level` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `credit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`id`, `name`, `level`, `term`, `credit`) VALUES
('CSE-423', 'Computer Graphics', 4, 2, '3'),
('CSE-432', 'Software Engineering', 4, 2, '3'),
('CSE-433', 'VLSI Design', 4, 2, '3'),
('CSE-434', 'Digital System Design', 4, 2, '3'),
('CSE-435', 'Digital Image Processing', 4, 2, '3'),
('CSE-436', 'Software Engineering', 4, 2, '1.5'),
('CSE-437', 'Computer Graphics', 4, 2, '1.5'),
('CSE-438', 'Digital System Design', 4, 2, '1.5');

-- --------------------------------------------------------

--
-- Table structure for table `sem_credit`
--

CREATE TABLE `sem_credit` (
  `level` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `credit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem_credit`
--

INSERT INTO `sem_credit` (`level`, `term`, `credit`) VALUES
('1', '1', '19.75'),
('1', '2', '18.5'),
('2', '1', '20.5'),
('2', '2', '21.5'),
('3', '1', '18.5'),
('3', '2', '19.75'),
('4', '1', '20.75'),
('4', '3', '21.5');

-- --------------------------------------------------------

--
-- Table structure for table `student_cgpa`
--

CREATE TABLE `student_cgpa` (
  `L1T1` varchar(15) NOT NULL,
  `L1T2` varchar(15) NOT NULL,
  `L2T1` varchar(15) NOT NULL,
  `L2T2` varchar(15) NOT NULL,
  `L3T1` varchar(15) NOT NULL,
  `L3T2` varchar(15) NOT NULL,
  `L4T1` varchar(15) NOT NULL,
  `L4T2` varchar(15) NOT NULL,
  `sid` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cgpa`
--

INSERT INTO `student_cgpa` (`L1T1`, `L1T2`, `L2T1`, `L2T2`, `L3T1`, `L3T2`, `L4T1`, `L4T2`, `sid`) VALUES
('0', '0', '0', '0', '0', '0', '0', '0', 121),
('0', '0', '0', '0', '0', '0', '0', '0', 1212),
('2', '02', '02', '01', '011', '0111', '033', '033', 1304079),
('0', '0', '0', '0', '0', '0', '0', '0', 1304115),
('0', '0', '0', '0', '0', '0', '0', '0', 1304117);

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

CREATE TABLE `student_request` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sid` varchar(40) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `cgpa` double NOT NULL,
  `bl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_request`
--

INSERT INTO `student_request` (`username`, `password`, `email`, `sid`, `tel`, `pic`, `tid`, `cgpa`, `bl`) VALUES
('Rema', 'a', 'a@a', '1212', '01611662463', 'chaticon.jpg', '403', 0, 'NO FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL,
  `tid` varchar(22) NOT NULL,
  `tel` varchar(22) NOT NULL,
  `pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`username`, `email`, `password`, `tid`, `tel`, `pic`) VALUES
('Samsul Arefin', 'a@a', 'a', '0401', '019393', 0x6c6f76652e6a7067),
('Mosiul Hoque', 'a@a', 'a', '0402', '019393', 0x7265616c6c6f76652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_identity`
--

CREATE TABLE `teachers_identity` (
  `username` varchar(30) NOT NULL,
  `tid` int(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_identity`
--

INSERT INTO `teachers_identity` (`username`, `tid`, `type`) VALUES
('saber', 11, 'ass profe'),
('Samsul Arefin', 401, 'Head'),
('Mosiul Hoque', 402, ''),
('Ibrahim Kurdi', 403, '');

-- --------------------------------------------------------

--
-- Table structure for table `userinfotbl`
--

CREATE TABLE `userinfotbl` (
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `tid` int(20) NOT NULL,
  `cgpa` double NOT NULL,
  `bl` varchar(100) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `cgpa8` varchar(10) NOT NULL,
  `cgpa7` varchar(10) NOT NULL,
  `cgpa6` varchar(10) NOT NULL,
  `cgpa5` varchar(10) NOT NULL,
  `cgpa4` varchar(10) NOT NULL,
  `cgpa3` varchar(10) NOT NULL,
  `cgpa2` varchar(10) NOT NULL,
  `cgpa1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfotbl`
--

INSERT INTO `userinfotbl` (`username`, `password`, `email`, `sid`, `tel`, `pic`, `tid`, `cgpa`, `bl`, `dept`, `hall`, `cgpa8`, `cgpa7`, `cgpa6`, `cgpa5`, `cgpa4`, `cgpa3`, `cgpa2`, `cgpa1`) VALUES
('Habibul Hasib', 'a', 'a@a', '121', '1', '30825710_1767942403287339_948320763_o.jpg', 401, 0, 'NO FAIL', '', '', '', '', '', '', '', '', '', ''),
('Fahim', 'a', 'a@a', '1304079', '019393', '30825710_1767942403287339_948320763_o.jpg', 401, 33, 'NO FAIL', 'CSE', 'Dr. QK hall', '0', '0', '3.0', '3.2', '3.5', '3.5', '3.2', '3.4'),
('sagor kola', 'a', 'ikramulhaqsagor@gmail', '1304115', 'aaa', 'icon12.png', 402, 0, 'NO FAIL', '', '', '', '', '', '', '', '', '', ''),
('abbas', 'a', 'a@s', '1304117', '01611662463', 'love.jpg', 402, 0, 'NO FAIL', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem_credit`
--
ALTER TABLE `sem_credit`
  ADD PRIMARY KEY (`level`,`term`);

--
-- Indexes for table `student_cgpa`
--
ALTER TABLE `student_cgpa`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `teachers_identity`
--
ALTER TABLE `teachers_identity`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `userinfotbl`
--
ALTER TABLE `userinfotbl`
  ADD PRIMARY KEY (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
