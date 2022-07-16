-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 08:59 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam_seat_allocator`
--

-- --------------------------------------------------------

--
-- Table structure for table `allot_student`
--

CREATE TABLE IF NOT EXISTS `allot_student` (
  `allot_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(15) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rows_number` int(11) NOT NULL,
  `cols_number` int(11) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  PRIMARY KEY (`allot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `allot_student`
--

INSERT INTO `allot_student` (`allot_id`, `reg_no`, `room_id`, `rows_number`, `cols_number`, `exam_date`, `exam_time`, `exam_id`) VALUES
(1, '33219812001', 1, 0, 0, '2021-10-13', '12:00', 1),
(2, '18919812001', 1, 0, 1, '2021-10-13', '12:00', 2),
(3, '33219812002', 1, 1, 0, '2021-10-13', '12:00', 1),
(4, '18919812002', 1, 1, 1, '2021-10-13', '12:00', 2),
(5, '33219812003', 1, 2, 0, '2021-10-13', '12:00', 1),
(6, '18919812005', 1, 2, 1, '2021-10-13', '12:00', 2),
(7, '33219812004', 2, 0, 0, '2021-10-13', '12:00', 1),
(8, '18919812007', 2, 0, 1, '2021-10-13', '12:00', 2),
(9, '33219812019', 2, 1, 0, '2021-10-13', '12:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `examsched`
--

CREATE TABLE IF NOT EXISTS `examsched` (
  `examid` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `year_joined` varchar(11) NOT NULL,
  `room_id` varchar(255) NOT NULL,
  PRIMARY KEY (`examid`),
  UNIQUE KEY `exam_type` (`exam_type`,`exam_date`,`exam_time`,`subject_code`,`semester`,`department`,`course_name`,`year_joined`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `examsched`
--

INSERT INTO `examsched` (`examid`, `exam_type`, `exam_date`, `exam_time`, `subject_code`, `semester`, `department`, `course_name`, `year_joined`, `room_id`) VALUES
(1, 'University Exam', '2021-10-13', '12:00', 'Multimedia Systems', '6TH', 'Department of Computer Science and Application', 'BCA', '2019', '1'),
(2, 'University Exam', '2021-10-13', '12:00', 'Entrepreneurship Development', '6TH', 'Department of Commerce and Management', 'BBA', '2019', '1'),
(3, 'Internal Exam I', '2021-10-14', '12:00', 'Multimedia Systems', '4TH', 'Department of Computer Science and Application', 'BCA', '2019', '3'),
(4, 'Internal Exam I', '2021-10-14', '12:00', 'Entrepreneurship Development', '4TH', 'Department of Commerce and Management', 'BBA', '2019', '3'),
(5, 'Internal Exam I', '2021-10-14', '12:00', 'HISTORY OF ENGLISH LANGUAGE', '4TH', 'Department of English', 'BA ENGLISH AND COMMUNICATIVE ENGLISH', '2019', '3'),
(6, 'Internal Exam II', '2021-10-14', '12:00', 'Food Production and Pattisserie III', '2ND', 'Department of Hotel Management', 'BMS HOTEL MANAGEMENT', '2019', '3');

-- --------------------------------------------------------

--
-- Table structure for table `exam_room_teacher`
--

CREATE TABLE IF NOT EXISTS `exam_room_teacher` (
  `exam_room_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `exam_date` varchar(20) NOT NULL,
  `exam_time` varchar(15) NOT NULL,
  `fname` varchar(255) NOT NULL,
  PRIMARY KEY (`exam_room_teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `exam_room_teacher`
--

INSERT INTO `exam_room_teacher` (`exam_room_teacher_id`, `room_id`, `exam_date`, `exam_time`, `fname`) VALUES
(1, 1, '2021-10-13', '12:00', 'mary joseph'),
(2, 1, '2021-10-14', '12:00', 'demi lovato'),
(3, 2, '2021-10-13', '12:00', 'kid laroi'),
(4, 3, '2021-10-14', '12:00', 'kid laroi');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `email_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(12) NOT NULL,
  `usr_type` varchar(25) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`email_id`, `fname`, `password`, `lname`, `gender`, `dob`, `contact`, `usr_type`) VALUES
('aashique@gmail.com', 'Aashique', '123456', 'Santosh', 'Male', '1999-03-17', '7845966314', 'student'),
('abhinav@gmail.com', 'Abhinav', '123456', 'Pradeep', 'Male', '2001-06-14', '9874588746', 'student'),
('adithya@gmail.com', 'Adithya', '123456', 'Krishna', 'Male', '2001-04-11', '9884566327', 'student'),
('ADMINISTRATOR', 'admin', 'admin', 'admin', 'Male', '0000-00-00', '', 'admin'),
('akhil@gmail.com', 'Akhil', '123456', 'Baiju', 'Male', '2000-09-12', '8921499469', 'student'),
('demi@gmail.com', 'demi', '123456', 'lovato', 'Female', '1989-10-12', '7894578996', 'teacher'),
('fetty@gmail.com', 'Fetty', '123456', 'Wap', 'Male', '2001-08-31', '8749688745', 'student'),
('H1@gmail.com', 'Hotelmg', '123456', 'asdasd', 'Male', '2021-10-13', '7306410218', 'student'),
('hailey@gmail.com', 'Hailey', '123456', 'Baldwin', 'Female', '2000-10-11', '7898788987', 'student'),
('hari@gmail.com', 'Hari', '123456', 'Govind', 'Male', '2000-10-09', '7845693215', 'student'),
('Hotelmg@gmail.com', 'Hotelmgr', '123456', 'asdas', 'Male', '2021-10-13', '7306410218', 'student'),
('john@gmail.com', 'john', '123456', 'mayer', 'Male', '1980-03-02', '9874566987', 'teacher'),
('kendrik@gmail.com', 'Kendrik', '123456', 'Lamar', 'Male', '2002-07-15', '8017987455', 'student'),
('kid@gmail.com', 'kid', '123456', 'laroi', 'Male', '1995-06-16', '9874588745', 'teacher'),
('lisa@gmail.com', 'Lisa', '123456', 'Blink', 'Female', '1999-12-08', '9878455698', 'student'),
('mary@gmail.com', 'mary', '123456', 'joseph', 'Female', '1994-03-16', '9874588745', 'teacher'),
('sean@gmail.com', 'Sean', '123456', 'Paul', 'Male', '2001-12-13', '9745811203', 'student'),
('sreevishnu@gmail.com', 'Sreevishnu', '123456', 'Kurup', 'Male', '2001-11-25', '7845633212', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomid` int(255) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `row_count` int(11) NOT NULL,
  `col_count` int(11) NOT NULL,
  PRIMARY KEY (`roomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `room_name`, `block_name`, `row_count`, `col_count`) VALUES
(1, 'BCA-II', 'CS BLOCK', 3, 2),
(2, 'TT-I', 'COMMERCE BLOCK', 4, 2),
(3, 'LCD 1', 'GROUND BLOCK', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `reg_no` varchar(20) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `year_joined` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `email_id`, `course_name`, `year_joined`, `department`) VALUES
('18919812001', 'hari@gmail.com', 'BBA', 2019, 'Department of Commerce and Management'),
('18919812002', 'lisa@gmail.com', 'BBA', 2019, 'Department of Commerce and Management'),
('18919812005', 'fetty@gmail.com', 'BBA', 2019, 'Department of Commerce and Management'),
('18919812007', 'hailey@gmail.com', 'BBA', 2019, 'Department of Commerce and Management'),
('21219812001', 'sean@gmail.com', 'BA ENGLISH AND COMMUNICATIVE ENGLISH', 2019, 'Department of English'),
('21219812007', 'kendrik@gmail.com', 'BA ENGLISH AND COMMUNICATIVE ENGLISH', 2019, 'Department of English'),
('33219812001', 'aashique@gmail.com', 'BCA', 2019, 'Department of Computer Science and Application'),
('33219812002', 'abhinav@gmail.com', 'BCA', 2019, 'Department of Computer Science and Application'),
('33219812003', 'adithya@gmail.com', 'BCA', 2019, 'Department of Computer Science and Application'),
('33219812004', 'akhil@gmail.com', 'BCA', 2019, 'Department of Computer Science and Application'),
('33219812019', 'sreevishnu@gmail.com', 'BCA', 2019, 'Department of Computer Science and Application'),
('81121212224', 'H1@gmail.com', 'BMS HOTEL MANAGEMENT', 2019, 'Department of Hotel Management'),
('81121212225', 'Hotelmg@gmail.com', 'BMS HOTEL MANAGEMENT', 2019, 'Department of Hotel Management');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teachid` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`teachid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachid`, `fname`, `department`, `email`) VALUES
(4, 'mary joseph', 'Department of Computer Science and Application', 'mary@gmail.com'),
(5, 'demi lovato', 'Department of Commerce and Management', 'demi@gmail.com'),
(6, 'kid laroi', 'Department of English', 'kid@gmail.com'),
(7, 'john mayer', 'Department of Hotel Management', 'john@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
