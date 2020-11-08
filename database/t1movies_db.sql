-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1: 3325
-- Generation Time: Nov 08, 2020 at 09:58 AM
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
  `DIRECTORS_CUT` tinyint(1) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL DEFAULT -1,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GENDER_ID` int(11) NOT NULL,
  `GENDER` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GENRE_ID` int(11) NOT NULL,
  `GENRE_NAME` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MOVIE_ID` int(11) NOT NULL,
  `MOVIE_TITLE` varchar(50) NOT NULL DEFAULT '',
  `PREMIERE_DATE` date NOT NULL DEFAULT current_timestamp(),
  `MOVIE_DURATION` time NOT NULL DEFAULT '02:00:00',
  `MOVIE_DESC` varchar(1000) NOT NULL DEFAULT '',
  `RATED` varchar(10) NOT NULL DEFAULT '',
  `RATING` decimal(10,2) NOT NULL DEFAULT 0.00,
  `MOVIE_POSTER` varchar(50) NOT NULL DEFAULT '',
  `SHOWING_IN_IMAX` tinyint(1) NOT NULL DEFAULT 0,
  `SHOWING_IN_DIRECTORS_CUT` tinyint(1) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL DEFAULT -1,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) NOT NULL DEFAULT -1,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movie_branches`
--

CREATE TABLE `movie_branches` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_NAME` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `GENRE_ID` int(11) DEFAULT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `RECEIPT_ID` int(11) NOT NULL,
  `RESERVE_ID` int(11) DEFAULT NULL,
  `PAID` tinyint(1) NOT NULL DEFAULT 1,
  `PAID_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `RESERVE_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `NOW_ID` int(11) DEFAULT NULL,
  `VIEWING_ID` int(11) DEFAULT NULL,
  `SEAT_ROW` int(11) DEFAULT NULL,
  `SEAT_NUMBER` int(11) DEFAULT NULL,
  `DATE_OF_VIEWING` date NOT NULL DEFAULT current_timestamp(),
  `DATE_CREATED` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `TICKET_ID` int(11) NOT NULL,
  `RECEIPT_ID` int(11) DEFAULT NULL,
  `COMPLETED` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL DEFAULT '',
  `USERNAME` varchar(50) NOT NULL DEFAULT '',
  `ACCOUNT_PASSWORD` varchar(255) NOT NULL DEFAULT '12345',
  `ADMIN` varchar(100) NOT NULL DEFAULT 'USER',
  `VERIFY_CODE` int(11) NOT NULL DEFAULT 0,
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
  `ADDRESS` varchar(100) NOT NULL DEFAULT '',
  `GENDER_ID` int(11) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `BIRTHDATE` varchar(100) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `CREATED_BY` int(11) NOT NULL DEFAULT -1,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_BY` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `viewing_time`
--

CREATE TABLE `viewing_time` (
  `VIEWING_ID` int(11) NOT NULL,
  `VIEWING_TIME` time NOT NULL DEFAULT '02:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `AFTERNOON_TIME` (`AFTERNOON_TIME`);

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
  ADD KEY `GENRE_ID` (`GENRE_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`);

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
  ADD UNIQUE KEY `USERS` (`EMAIL`,`USERNAME`,`VERIFY_CODE`);

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
  MODIFY `CINEMA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GENDER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MOVIE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie_branches`
--
ALTER TABLE `movie_branches`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `NOW_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `RECEIPT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `RESERVE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `USERS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `viewing_time`
--
ALTER TABLE `viewing_time`
  MODIFY `VIEWING_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`MORNING_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`),
  ADD CONSTRAINT `cinema_ibfk_2` FOREIGN KEY (`NOON_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`),
  ADD CONSTRAINT `cinema_ibfk_3` FOREIGN KEY (`AFTERNOON_TIME`) REFERENCES `viewing_time` (`VIEWING_ID`);

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `movie_category_ibfk_1` FOREIGN KEY (`GENRE_ID`) REFERENCES `genre` (`GENRE_ID`),
  ADD CONSTRAINT `movie_category_ibfk_2` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

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
