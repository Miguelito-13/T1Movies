-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1: 3325
-- Generation Time: Nov 07, 2020 at 02:33 PM
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
-- Database: `t1movies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `CINEMA_ID` int(11) NOT NULL,
  `MORNING_TIME` int(11) DEFAULT NULL,
  `NOON_TIME` int(11) DEFAULT NULL,
  `AFTERNOON_TIME` int(11) DEFAULT NULL,
  `EVENING_TIME` int(11) DEFAULT NULL,
  `NO_SEATS` int(11) NOT NULL DEFAULT 0,
  `IMAX` tinyint(1) NOT NULL DEFAULT 0,
  `DIRECTORS_CUT` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`CINEMA_ID`, `MORNING_TIME`, `NOON_TIME`, `AFTERNOON_TIME`, `EVENING_TIME`, `NO_SEATS`, `IMAX`, `DIRECTORS_CUT`) VALUES
(1, 2, 4, 7, 11, 400, 1, 0),
(2, 3, 6, 9, 12, 300, 0, 0),
(3, 1, 4, 8, 12, 630, 0, 1),
(4, 2, 5, 8, 11, 420, 0, 0),
(5, 1, 4, 7, 10, 350, 0, 0),
(6, 2, 5, 8, 11, 500, 1, 0),
(7, 3, 6, 9, 12, 320, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GENDER_ID` int(11) NOT NULL,
  `GENDER` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GENDER_ID`, `GENDER`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GENRE_ID`, `GENRE_NAME`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Horror'),
(5, 'Sci-Fi'),
(6, 'Drama'),
(7, 'Romance'),
(8, 'Fantasy'),
(9, 'Suspense');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MOVIE_ID` int(11) NOT NULL,
  `MOVIE_TITLE` varchar(50) NOT NULL DEFAULT '',
  `PREMIERE_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `MOVIE_DURATION` time NOT NULL DEFAULT current_timestamp(),
  `MOVIE_DESC` varchar(1000) NOT NULL,
  `RATED` varchar(10) NOT NULL DEFAULT '',
  `RATING` decimal(10,2) NOT NULL DEFAULT -1.00,
  `POSTER` varchar(30) NOT NULL,
  `SHOWING_IN_IMAX` tinyint(1) NOT NULL DEFAULT 0,
  `SHOWING_IN_DIRECTORS_CUT` tinyint(1) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL DEFAULT -1,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) NOT NULL DEFAULT -1,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MOVIE_ID`, `MOVIE_TITLE`, `PREMIERE_DATE`, `MOVIE_DURATION`, `MOVIE_DESC`, `RATED`, `RATING`, `POSTER`, `SHOWING_IN_IMAX`, `SHOWING_IN_DIRECTORS_CUT`, `CREATED_ON`, `CREATED_BY`, `MODIFIED_ON`, `MODIFIED_BY`, `ACTIVE`) VALUES
(1, 'Star Wars: The Force Awakens', '2020-10-21 21:00:55', '03:10:30', '\"May the Force\"', 'PG', '3.75', '', 1, 1, '2020-10-21 21:00:55', -1, '2020-10-21 21:00:55', -1, 1),
(2, 'Avengers endgame', '2020-10-21 21:01:32', '02:52:13', '\"Let\'s beat Thanos this time\"', 'G', '4.50', '', 1, 0, '2020-10-21 21:01:32', -1, '2020-10-21 21:01:32', -1, 1),
(3, 'Parasite', '2020-10-21 21:03:06', '02:36:00', '\"Always shower before going to work\"', 'R-18', '4.75', '', 0, 0, '2020-10-21 21:03:06', -1, '2020-10-21 21:03:06', -1, 1),
(4, 'Ang Pangarap kong Holdap', '2020-10-21 21:03:45', '02:15:45', '\"Mas malupit pa sa money heist\"', 'PG', '4.25', '', 0, 0, '2020-10-21 21:03:45', -1, '2020-10-21 21:03:45', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_branches`
--

CREATE TABLE `movie_branches` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_NAME` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_branches`
--

INSERT INTO `movie_branches` (`BRANCH_ID`, `BRANCH_NAME`) VALUES
(1, 'Manila'),
(2, 'Marikina'),
(3, 'North Edsa'),
(4, 'Bacoor');

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL,
  `GENRE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`CATEGORY_ID`, `MOVIE_ID`, `GENRE_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 2, 9),
(5, 3, 1),
(6, 3, 2),
(7, 3, 5),
(8, 4, 1),
(9, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `now_showing`
--

CREATE TABLE `now_showing` (
  `NOW_ID` int(11) NOT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL,
  `CINEMA_ID` int(11) DEFAULT NULL,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `now_showing`
--

INSERT INTO `now_showing` (`NOW_ID`, `MOVIE_ID`, `CINEMA_ID`, `BRANCH_ID`, `ACTIVE`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 4, 1, 1),
(4, 3, 1, 2, 1),
(5, 3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `RECEIPT_ID` int(11) NOT NULL,
  `RESERVE_ID` int(11) DEFAULT NULL,
  `PAID` tinyint(1) NOT NULL DEFAULT 0,
  `PAID_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`RECEIPT_ID`, `RESERVE_ID`, `PAID`, `PAID_ON`) VALUES
(1, 1, 1, '2020-10-22 15:58:37'),
(2, 2, 1, '2020-10-22 15:58:47'),
(3, 3, 1, '2020-10-22 15:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `RESERVE_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `NOW_ID` int(11) DEFAULT NULL,
  `SEAT_ROW` int(11) NOT NULL DEFAULT 1,
  `SEAT_NUMBER` int(11) NOT NULL DEFAULT 1,
  `VIEWING_ID` int(11) DEFAULT NULL,
  `DATE_OF_VIEWING` date NOT NULL DEFAULT current_timestamp(),
  `DATE_CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`RESERVE_ID`, `ACCOUNT_ID`, `NOW_ID`, `SEAT_ROW`, `SEAT_NUMBER`, `VIEWING_ID`, `DATE_OF_VIEWING`, `DATE_CREATED`) VALUES
(1, 1, 1, 5, 23, 4, '2020-06-23', '2020-10-22 15:49:01'),
(2, 1, 1, 5, 24, 4, '2020-06-23', '2020-10-22 15:50:29'),
(3, 3, 5, 9, 5, 8, '2020-09-14', '2020-10-22 15:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `TICKET_ID` int(11) NOT NULL,
  `RECEIPT_ID` int(11) DEFAULT NULL,
  `COMPLETED` tinyint(1) NOT NULL DEFAULT 0,
  `COMPLETED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`TICKET_ID`, `RECEIPT_ID`, `COMPLETED`, `COMPLETED_ON`) VALUES
(1, 1, 1, '2020-10-22 16:03:48'),
(2, 2, 1, '2020-10-22 16:03:53'),
(3, 3, 1, '2020-10-22 16:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL DEFAULT '',
  `EMAIL` varchar(50) DEFAULT '',
  `ACCOUNT_PASSWORD` varchar(255) NOT NULL DEFAULT '12345',
  `ADMIN` varchar(100) NOT NULL DEFAULT 'USERS',
  `VERIFY_CODE` int(11) NOT NULL DEFAULT 98765,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `USERS_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `FIRST_NAME` varchar(20) NOT NULL DEFAULT '',
  `LAST_NAME` varchar(20) NOT NULL DEFAULT '',
  `MI` varchar(5) NOT NULL DEFAULT '',
  `CONTACT_NO` varchar(15) NOT NULL DEFAULT '',
  `ADDRESS` varchar(100) NOT NULL DEFAULT '''''',
  `GENDER_ID` int(11) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `BIRTHDATE` varchar(100) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL DEFAULT -1,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`USERS_ID`, `ACCOUNT_ID`, `FIRST_NAME`, `LAST_NAME`, `MI`, `CONTACT_NO`, `ADDRESS`, `GENDER_ID`, `AGE`, `BIRTHDATE`, `CREATED_ON`, `CREATED_BY`, `MODIFIED_ON`, `MODIFIED_BY`) VALUES
(1, 1, 'Allen', 'De Guzman', 'G.', '321654987', 'Samplaoc, Manila', 1, 20, '2020-03-13', '2020-10-22 15:15:23', -1, '2020-10-22 15:15:23', -1),
(2, 2, 'Kobe', 'Bryant', 'B.', '824824824', 'Los Angeles, California', 1, 42, '1987-08-23', '2020-10-22 15:23:35', -1, '2020-10-22 15:23:35', -1),
(3, 3, 'Dua', 'Lipa', '', '654895218', 'London, England', 2, 42, '1995-08-22', '2020-10-22 15:25:03', -1, '2020-10-22 15:25:03', -1);

-- --------------------------------------------------------

--
-- Table structure for table `viewing_time`
--

CREATE TABLE `viewing_time` (
  `VIEWING_ID` int(11) NOT NULL,
  `VIEW_TIME` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewing_time`
--

INSERT INTO `viewing_time` (`VIEWING_ID`, `VIEW_TIME`) VALUES
(1, '09:30:00'),
(2, '10:00:00'),
(3, '11:00:00'),
(4, '13:00:00'),
(5, '14:00:00'),
(6, '15:00:00'),
(7, '16:00:00'),
(8, '17:00:00'),
(9, '18:00:00'),
(10, '19:00:00'),
(11, '20:00:00'),
(12, '21:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`CINEMA_ID`),
  ADD KEY `MORNING_TIME` (`MORNING_TIME`),
  ADD KEY `NOON_TIME` (`NOON_TIME`),
  ADD KEY `AFTERNOON_TIME` (`AFTERNOON_TIME`),
  ADD KEY `EVENING_TIME` (`EVENING_TIME`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GENDER_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GENRE_ID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MOVIE_ID`);

--
-- Indexes for table `movie_branches`
--
ALTER TABLE `movie_branches`
  ADD PRIMARY KEY (`BRANCH_ID`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`CATEGORY_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`),
  ADD KEY `GENRE_ID` (`GENRE_ID`);

--
-- Indexes for table `now_showing`
--
ALTER TABLE `now_showing`
  ADD PRIMARY KEY (`NOW_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`),
  ADD KEY `CINEMA_ID` (`CINEMA_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`RECEIPT_ID`),
  ADD KEY `RESERVE_ID` (`RESERVE_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`RESERVE_ID`),
  ADD KEY `ACCOUNT_ID` (`ACCOUNT_ID`),
  ADD KEY `NOW_ID` (`NOW_ID`),
  ADD KEY `VIEWING_ID` (`VIEWING_ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TICKET_ID`),
  ADD KEY `RECEIPT_ID` (`RECEIPT_ID`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`ACCOUNT_ID`),
  ADD UNIQUE KEY `USERS` (`USERNAME`,`EMAIL`,`VERIFY_CODE`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`USERS_ID`),
  ADD KEY `ACCOUNT_ID` (`ACCOUNT_ID`),
  ADD KEY `GENDER_ID` (`GENDER_ID`);

--
-- Indexes for table `viewing_time`
--
ALTER TABLE `viewing_time`
  ADD PRIMARY KEY (`VIEWING_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `CINEMA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GENDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MOVIE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_branches`
--
ALTER TABLE `movie_branches`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `NOW_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `RECEIPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `RESERVE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `USERS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `viewing_time`
--
ALTER TABLE `viewing_time`
  MODIFY `VIEWING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`MORNING_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`),
  ADD CONSTRAINT `cinema_ibfk_2` FOREIGN KEY (`NOON_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`),
  ADD CONSTRAINT `cinema_ibfk_3` FOREIGN KEY (`AFTERNOON_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`),
  ADD CONSTRAINT `cinema_ibfk_4` FOREIGN KEY (`EVENING_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`);

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `movie_category_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`),
  ADD CONSTRAINT `movie_category_ibfk_2` FOREIGN KEY (`GENRE_ID`) REFERENCES `genre` (`GENRE_ID`);

--
-- Constraints for table `now_showing`
--
ALTER TABLE `now_showing`
  ADD CONSTRAINT `now_showing_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`),
  ADD CONSTRAINT `now_showing_ibfk_2` FOREIGN KEY (`CINEMA_ID`) REFERENCES `cinema` (`CINEMA_ID`),
  ADD CONSTRAINT `now_showing_ibfk_3` FOREIGN KEY (`BRANCH_ID`) REFERENCES `movie_branches` (`BRANCH_ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`RESERVE_ID`) REFERENCES `reservation` (`RESERVE_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `users_account` (`ACCOUNT_ID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`NOW_ID`) REFERENCES `now_showing` (`NOW_ID`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`VIEWING_ID`) REFERENCES `viewing_time` (`VIEWING_ID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`RECEIPT_ID`) REFERENCES `receipt` (`RECEIPT_ID`);

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `users_account` (`ACCOUNT_ID`),
  ADD CONSTRAINT `users_profile_ibfk_2` FOREIGN KEY (`GENDER_ID`) REFERENCES `gender` (`GENDER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
