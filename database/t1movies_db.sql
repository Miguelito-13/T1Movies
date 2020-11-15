-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 10:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
  `BRANCH_ID` int(10) DEFAULT NULL,
  `CINEMA_NO` int(11) DEFAULT NULL,
  `NO_SEATS` int(20) DEFAULT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`CINEMA_ID`, `BRANCH_ID`, `CINEMA_NO`, `NO_SEATS`, `MOVIE_ID`, `ACTIVE`, `MODIFIED_ON`) VALUES
(1, 1, 1, 80, NULL, 0, '2020-11-15 17:49:11'),
(2, 1, 2, 80, NULL, 0, '2020-11-15 17:49:08'),
(3, 1, 3, 80, NULL, 0, '2020-11-15 17:49:11'),
(4, 1, 4, 80, NULL, 0, '2020-11-14 15:50:07'),
(5, 1, 5, 80, NULL, 0, '2020-11-15 17:49:11'),
(6, 2, 1, 80, NULL, 0, '2020-11-15 17:49:11'),
(7, 2, 2, 80, NULL, 0, '2020-11-15 17:49:08'),
(8, 2, 3, 80, NULL, 0, '2020-11-15 17:49:11'),
(9, 2, 4, 80, NULL, 0, '2020-11-14 15:50:07'),
(10, 2, 5, 80, NULL, 0, '2020-11-15 17:49:11'),
(11, 3, 1, 80, NULL, 0, '2020-11-15 17:49:11'),
(12, 3, 2, 80, NULL, 0, '2020-11-15 17:49:08'),
(13, 3, 3, 80, NULL, 0, '2020-11-15 17:49:11'),
(14, 3, 4, 80, NULL, 0, '2020-11-14 15:50:07'),
(15, 3, 5, 80, NULL, 0, '2020-11-14 15:58:33'),
(16, 4, 1, 80, NULL, 0, '2020-11-15 17:49:11'),
(17, 4, 2, 80, NULL, 0, '2020-11-15 17:49:08'),
(18, 4, 3, 80, NULL, 0, '2020-11-15 17:49:11'),
(19, 4, 4, 80, NULL, 0, '2020-11-15 10:42:55'),
(20, 4, 5, 80, NULL, 0, '2020-11-15 17:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `coming_soon`
--

CREATE TABLE `coming_soon` (
  `COMING_ID` int(11) NOT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `MOVIE_ID` int(11) DEFAULT NULL,
  `ACTION` int(11) DEFAULT NULL,
  `ADVENTURE` int(11) DEFAULT NULL,
  `ANIMATION` int(11) DEFAULT NULL,
  `COMEDY` int(11) DEFAULT NULL,
  `DRAMA` int(11) DEFAULT NULL,
  `FAMILY` int(11) DEFAULT NULL,
  `FANTASY` int(11) DEFAULT NULL,
  `HORROR` int(11) DEFAULT NULL,
  `MUSICAL` int(11) DEFAULT NULL,
  `MYSTERY` int(11) DEFAULT NULL,
  `ROMANCE` int(11) DEFAULT NULL,
  `SCI_FI` int(11) DEFAULT NULL,
  `THRILLER` int(11) DEFAULT NULL,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MOVIE_ID` int(11) NOT NULL,
  `MOVIE_TITLE` varchar(50) DEFAULT NULL,
  `MOVIE_DESC` varchar(500) DEFAULT NULL,
  `MOVIE_DURATION` int(100) DEFAULT NULL,
  `RATED` varchar(10) DEFAULT NULL,
  `RATING_USER` varchar(200) DEFAULT NULL,
  `RATING_TITLE` varchar(200) DEFAULT NULL,
  `POSTER` varchar(300) DEFAULT NULL,
  `POSTER_BG` varchar(300) DEFAULT NULL,
  `TRAILER` varchar(300) DEFAULT NULL,
  `PREMIERE_DATE` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `ACTIVE` int(11) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movie_branches`
--

CREATE TABLE `movie_branches` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_NAME` varchar(100) NOT NULL,
  `CINEMA_ROOMS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_branches`
--

INSERT INTO `movie_branches` (`BRANCH_ID`, `BRANCH_NAME`, `CINEMA_ROOMS`) VALUES
(1, 'Manila', 5),
(2, 'Marikina', 5),
(3, 'North Edsa', 5),
(4, 'Bacoor', 5);

-- --------------------------------------------------------

--
-- Table structure for table `now_showing`
--

CREATE TABLE `now_showing` (
  `NOW_ID` int(11) NOT NULL,
  `MOVIE_ID` int(11) DEFAULT NULL,
  `B_MANILA` int(11) DEFAULT NULL,
  `B_MARIKINA` int(11) DEFAULT NULL,
  `B_NORTH` int(11) DEFAULT NULL,
  `B_BACOOR` int(11) DEFAULT NULL,
  `C_MANILA` int(11) DEFAULT NULL,
  `C_MARIKINA` int(11) DEFAULT NULL,
  `C_NORTH` int(11) DEFAULT NULL,
  `C_BACOOR` int(11) DEFAULT NULL,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `USERNAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ACCOUNT_PASSWORD` varchar(255) DEFAULT NULL,
  `ADMIN` varchar(100) NOT NULL DEFAULT 'USERS',
  `VERIFY_CODE` int(100) DEFAULT NULL,
  `ACTIVE` int(11) NOT NULL DEFAULT 1,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `USERS_ID` int(11) NOT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `FIRST_NAME` varchar(100) DEFAULT NULL,
  `LAST_NAME` varchar(100) DEFAULT NULL,
  `MI` varchar(100) DEFAULT NULL,
  `CONTACT_NO` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `GENDER_ID` int(11) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `BIRTHDATE` varchar(100) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`CINEMA_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`);

--
-- Indexes for table `coming_soon`
--
ALTER TABLE `coming_soon`
  ADD PRIMARY KEY (`COMING_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GENDER_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GENRE_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`);

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
-- Indexes for table `now_showing`
--
ALTER TABLE `now_showing`
  ADD PRIMARY KEY (`NOW_ID`),
  ADD KEY `MOVIE_ID` (`MOVIE_ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `CINEMA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coming_soon`
--
ALTER TABLE `coming_soon`
  MODIFY `COMING_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GENDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `NOW_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `USERS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`BRANCH_ID`) REFERENCES `movie_branches` (`BRANCH_ID`),
  ADD CONSTRAINT `cinema_ibfk_2` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

--
-- Constraints for table `coming_soon`
--
ALTER TABLE `coming_soon`
  ADD CONSTRAINT `coming_soon_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

--
-- Constraints for table `now_showing`
--
ALTER TABLE `now_showing`
  ADD CONSTRAINT `now_showing_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

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
