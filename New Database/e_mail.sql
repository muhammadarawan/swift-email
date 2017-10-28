-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 04:08 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `attached_files`
--

CREATE TABLE IF NOT EXISTS `attached_files` (
  `mail_id` int(11) DEFAULT NULL,
  `file_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
`id` int(11) NOT NULL,
  `subject` text,
  `message` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `sec` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec`) VALUES
('A'),
('B'),
('C'),
('D');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `reg_no` varchar(13) NOT NULL DEFAULT '',
  `password` varchar(20) DEFAULT NULL,
  `fname` text,
  `lname` text,
  `DOB` date DEFAULT NULL,
  `sec` varchar(2) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`reg_no`, `password`, `fname`, `lname`, `DOB`, `sec`, `email`, `image`) VALUES
('L1F12BSCS2028', 'beta123', 'Ali', 'Raza', '1995-05-15', 'A', 'l1f12bscs2028@gmail.com', 'L1F12BSCS2028.jpg'),
('L1F12BSCS2172', 'alpha123', 'Touqeer', 'Ahmad', '1993-06-15', 'A', 'tqr093@gmail.com', 'L1F12BSCS2172.jpg'),
('L1F12BSCS2485', 'gamma123', 'Ali', 'Zaidi', '1993-07-15', 'A', 'zzzzaidi@gmail.com', 'L1F12BSCS2485.jpg'),
('L1F9BSCS0007', 'kami007', 'Kamran', 'Shabbir', '1992-05-06', 'D', 'kami_hami_haa@DBZ.com', 'L1F9BSCS0007.jpg'),
('L1F9BSCS1234', 'asad', 'asad', 'naem', '1993-02-02', 'B', 'asd@asd.com', 'L1F9BSCS1234.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_mail`
--

CREATE TABLE IF NOT EXISTS `student_mail` (
  `mail_id` int(11) DEFAULT NULL,
  `student_reg` varchar(13) DEFAULT NULL,
  `inbox` tinyint(1) DEFAULT NULL,
  `sent` tinyint(1) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `mark_as_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `reg_no` varchar(13) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `fname` text,
  `lname` text,
  `DOB` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_mail`
--

CREATE TABLE IF NOT EXISTS `teacher_mail` (
  `mail_id` int(11) DEFAULT NULL,
  `teacher_id` varchar(13) DEFAULT NULL,
  `inbox` tinyint(1) DEFAULT NULL,
  `sent` tinyint(1) DEFAULT NULL,
  `draft` tinyint(1) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL,
  `mark_as_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

CREATE TABLE IF NOT EXISTS `teacher_section` (
  `sec` varchar(2) DEFAULT NULL,
  `teacher_id` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attached_files`
--
ALTER TABLE `attached_files`
 ADD KEY `mail_id` (`mail_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`sec`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`reg_no`), ADD KEY `sec` (`sec`);

--
-- Indexes for table `student_mail`
--
ALTER TABLE `student_mail`
 ADD KEY `mail_id` (`mail_id`), ADD KEY `student_reg` (`student_reg`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `teacher_mail`
--
ALTER TABLE `teacher_mail`
 ADD KEY `mail_id` (`mail_id`), ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_section`
--
ALTER TABLE `teacher_section`
 ADD KEY `sec` (`sec`), ADD KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attached_files`
--
ALTER TABLE `attached_files`
ADD CONSTRAINT `attached_files_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`sec`) REFERENCES `section` (`sec`);

--
-- Constraints for table `student_mail`
--
ALTER TABLE `student_mail`
ADD CONSTRAINT `student_mail_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`),
ADD CONSTRAINT `student_mail_ibfk_2` FOREIGN KEY (`student_reg`) REFERENCES `students` (`reg_no`);

--
-- Constraints for table `teacher_mail`
--
ALTER TABLE `teacher_mail`
ADD CONSTRAINT `teacher_mail_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`),
ADD CONSTRAINT `teacher_mail_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`reg_no`);

--
-- Constraints for table `teacher_section`
--
ALTER TABLE `teacher_section`
ADD CONSTRAINT `teacher_section_ibfk_1` FOREIGN KEY (`sec`) REFERENCES `section` (`sec`),
ADD CONSTRAINT `teacher_section_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`reg_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
