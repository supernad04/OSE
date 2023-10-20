-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 12:11 PM
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
-- Database: `osedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grades_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `units` decimal(2,1) NOT NULL,
  `section` varchar(10) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `final_grade` varchar(5) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `term` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grades_id`, `course`, `units`, `section`, `faculty`, `final_grade`, `user_id`, `term`) VALUES
(1, 'INCOMPU', 3.0, 'BTIS1', 'RAYMUNDO, JINO', '4.0', 1004, 'AY22-23 - 3T'),
(2, 'RAPIDEV', 3.0, 'BTIS1', 'CATAYOC, JACOB', '4.0', 1004, 'AY22-23 - 3T'),
(3, 'DSTALGO', 3.0, 'OTIS1', 'GOH, JOSELITO EDUARD', '4.0', 1004, 'AY22-23 - 3T'),
(4, 'BUSEVAL', 3.0, 'OTIS2', 'MANALANSAN, ANGEL MARTIN', '3.0', 1004, 'AY22-23 - 2T'),
(5, 'APPADVC', 3.0, 'CTID2', 'ZALAMEDA, RAYMOND', '2.0', 1005, 'AY22-23 - 3T'),
(6, 'WEBDEVT', 3.0, 'SLOD1', 'LIMPIN, ABRAM', '3.0', 1005, 'AY22-23 - 3T'),
(7, 'INTEPRO', 3.0, 'VOMN1', 'SY, EISEN', '2.5', 1005, 'AY22-23 - 2T'),
(8, 'PETRIID', 2.0, 'LIHP2', 'ANTONIO, MARK', '3.5', 1005, 'AY22-23 - 2T'),
(9, 'ISPRACT', 6.0, 'BTIS1', 'MOJADO, CATHERINE', '3.0', 1004, 'AY22-23 - 2T'),
(10, 'IOTDEVT', 3.0, 'GFIO1', 'GOH, JOSELITO EDUARD', '3.0', 1004, 'AY22-23 - 1T'),
(11, 'PEFORTS', 2.0, 'SDTO3', 'MENDOZA, JOHN KIERAN', '3.5', 1004, 'AY22-23 - 1T');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `units` varchar(5) NOT NULL,
  `section` varchar(10) NOT NULL,
  `day` varchar(5) NOT NULL,
  `time` varchar(15) NOT NULL,
  `room` varchar(10) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `term` varchar(15) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `course`, `units`, `section`, `day`, `time`, `room`, `faculty`, `term`, `user_id`) VALUES
(1, 'INCOMPU', '3.0', 'BTIS1', 'MW', '13:00-14:30', 'R500', 'RAYMUNDO, JINO', 'AY22-23 - 3T', 1004),
(2, 'IOTDEVT', '3.0', 'GFIO1', 'TH', '11:20-12:50', 'R201A', 'GOH, JOSELITO EDUARD', 'AY22-23 - 3T', 1004),
(3, 'RAPIDEV', '3.0', 'BGTE1', 'F', '14:40-17:40', 'R800', 'CATAYOC, JACOB', 'AY22-23 - 3T', 1004),
(4, 'ASEANST', '3.0', 'OTGE1', 'MW', '18:00-19:30', 'ONLINE', 'FLORES, HOWARD', 'AY22-23 - 3T', 1004),
(5, 'CONWORL', '3.0', 'BTGE2', 'MW', '08:00-09:30', 'R708', 'LEE, DAN MARK', 'AY22-23 - 2T', 1004),
(6, 'DSTALGO', '3.0', 'BTIS3', 'TH', '14:40-16:10', 'R801', 'GOH, JOSELITO EDUARD', 'AY22-23 - 2T', 1004),
(7, 'BUSPROC', '3.0', 'BTIS2', 'TH', '09:40-11:10', 'R505', 'MANALANSAN, ANGEL MARTIN', 'AY22-23 - 2T', 1004),
(8, 'MATWRLD', '3.0', 'BTGE1', 'MW', '13:00-14:30', 'B202', 'DEDEL, MIGUEL BEN', 'AY22-23 - 1T', 1004),
(9, 'FILDISI', '3.0', 'BTGE1', 'MW', '08:00-09:30', 'B405', 'GARCIA, CELINE FRANCES', 'AY22-23 - 1T', 1004);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `Remarks` varchar(225) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `username`, `section`, `fname`, `name`, `Remarks`) VALUES
(46, 'Joshua Lagarejos', 'BTIS1', '20230706045210_extra style css.docx', 'extra style css.docx', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(8) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pwd` char(40) NOT NULL,
  `user_firstName` varchar(30) NOT NULL,
  `user_lastName` varchar(30) NOT NULL,
  `user_birthDate` date NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_contactNumber` varchar(12) NOT NULL,
  `type_scholarship` varchar(40) NOT NULL,
  `scholar_percentage` varchar(12) NOT NULL,
  `user_registrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `user`, `pwd`, `user_firstName`, `user_lastName`, `user_birthDate`, `user_address`, `user_contactNumber`, `type_scholarship`, `scholar_percentage`, `user_registrationDate`) VALUES
(1002, 'paganahinutak@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'Ace', 'Wolfgang', '2002-06-05', 'Jakarta, Indonesia', '09123456789', 'Athlete Scholarship', '100', '2023-02-25 11:36:21'),
(1003, 'arcelle.penaflor@benilde.edu.ph', 'cc03e747a6afbbcbf8be7668acfebee5', 'Arcelle', 'Penaflor', '2000-12-30', 'San Pedro, Laguna', '09123456789', 'Athletic Scholarship', '100', '2023-03-07 08:28:06'),
(1004, 'joshielagarejos@gmail.com', 'f9ec8d3edd1b3fecc67a21bf87135869', 'Joshua', 'Lagarejos', '1998-04-30', 'Antipolo City', '09666548947', 'Academic', '40', '2023-06-15 08:31:07'),
(1005, 'gabrielalvarez@gmail.com', '65773a132b95f120b94fd246aad17747', 'Gabriel', 'Alvarez', '1998-04-20', 'Binangonan', '09267103355', 'Athletic', '50', '2023-06-15 11:50:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grades_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `osedb-temp`.`usertable` (`user_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
