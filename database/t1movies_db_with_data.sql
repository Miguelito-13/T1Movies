-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 03:55 PM
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
(1, 1, 1, 74, 3, 1, '2020-11-18 22:07:48'),
(2, 1, 2, 74, 1, 0, '2020-11-26 20:26:43'),
(3, 1, 3, 74, 6, 1, '2020-12-08 21:36:39'),
(4, 1, 4, 74, NULL, NULL, '2020-11-17 18:57:46'),
(5, 1, 5, 74, NULL, NULL, '2020-11-17 18:58:55'),
(6, 2, 1, 74, NULL, NULL, '2020-11-17 18:58:11'),
(7, 2, 2, 74, 6, 1, '2020-12-08 21:36:39'),
(8, 2, 3, 74, NULL, NULL, '2020-11-17 18:57:54'),
(9, 2, 4, 74, NULL, NULL, '2020-11-17 18:57:46'),
(10, 2, 5, 74, 8, 1, '2020-12-08 21:39:20'),
(11, 3, 1, 74, 7, 1, '2020-12-08 21:38:50'),
(12, 3, 2, 74, NULL, NULL, '2020-11-17 18:58:04'),
(13, 3, 3, 74, NULL, NULL, '2020-11-17 18:57:54'),
(14, 3, 4, 74, 6, 1, '2020-12-08 21:36:39'),
(15, 3, 5, 74, NULL, NULL, '2020-11-17 18:58:55'),
(16, 4, 1, 74, 6, 1, '2020-12-08 21:36:39'),
(17, 4, 2, 74, NULL, NULL, '2020-11-17 18:58:04'),
(18, 4, 3, 74, NULL, NULL, '2020-11-17 18:57:54'),
(19, 4, 4, 74, NULL, NULL, '2020-11-17 18:57:46'),
(20, 4, 5, 74, NULL, NULL, '2020-11-17 18:58:55');

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

--
-- Dumping data for table `coming_soon`
--

INSERT INTO `coming_soon` (`COMING_ID`, `MOVIE_ID`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 1, 0, '2020-11-17 20:31:48', '2020-11-26 20:26:43'),
(2, 2, 0, '2020-11-17 20:32:49', '2020-12-08 18:59:06'),
(3, 3, 0, '2020-11-17 20:34:06', '2020-11-18 22:07:48'),
(4, 4, 0, '2020-11-26 11:48:17', '2020-12-08 18:52:46'),
(5, 5, 1, '2020-12-08 18:33:55', '2020-12-08 21:39:59'),
(6, 6, 0, '2020-12-08 18:39:08', '2020-12-08 21:36:39'),
(7, 7, 0, '2020-12-08 18:47:01', '2020-12-08 21:38:50'),
(8, 8, 0, '2020-12-08 18:52:06', '2020-12-08 21:39:20'),
(9, 9, 1, '2020-12-08 18:55:47', '2020-12-08 21:39:37'),
(10, 10, 1, '2020-12-08 18:58:32', '2020-12-08 21:40:32'),
(11, 11, 1, '2020-12-08 19:02:57', '2020-12-08 21:40:57');

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

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GENRE_ID`, `MOVIE_ID`, `ACTION`, `ADVENTURE`, `ANIMATION`, `COMEDY`, `DRAMA`, `FAMILY`, `FANTASY`, `HORROR`, `MUSICAL`, `MYSTERY`, `ROMANCE`, `SCI_FI`, `THRILLER`, `MODIFIED_ON`) VALUES
(1, 1, NULL, NULL, 3, NULL, 5, NULL, 7, NULL, 9, NULL, 11, NULL, 13, '2020-11-26 20:26:43'),
(2, 2, NULL, 2, NULL, 4, NULL, 6, NULL, 8, NULL, 10, NULL, 12, NULL, '2020-12-08 18:59:06'),
(3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, '2020-11-18 22:07:48'),
(4, 4, 1, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-08 18:52:46'),
(5, 5, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, 13, '2020-12-08 21:39:59'),
(6, 6, 1, NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-08 21:36:39'),
(7, 7, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 12, NULL, '2020-12-08 21:38:50'),
(8, 8, 1, NULL, NULL, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-08 21:39:20'),
(9, 9, 1, 2, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-08 21:39:37'),
(10, 10, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, '2020-12-08 21:40:32'),
(11, 11, 1, 2, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-08 21:40:57');

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
  `PRICE` float DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MOVIE_ID`, `MOVIE_TITLE`, `MOVIE_DESC`, `MOVIE_DURATION`, `RATED`, `RATING_USER`, `RATING_TITLE`, `POSTER`, `POSTER_BG`, `TRAILER`, `PREMIERE_DATE`, `PRICE`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 'Avengers: Infinity War', 'The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios\' grand conclusion to twenty-two films, \"Avengers: Endgame.\"', 120, 'G', 'ur126089657', 'tt4154756', 'T1-5fb3c2b4a3a8a4.32824982.jpg', 'T1-BG-5fb3c2b4ac3445.59052116.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '2018-12-25T08:31', 1000, 0, '2020-11-17 20:31:48', '2020-11-26 20:26:43'),
(2, 'Avengers 2', '2.....The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios\' grand conclusion to twenty-two films, \"Avengers: Endgame.\"', 200, 'PG-13', 'ur126089657', 'tt4154756', 'T1-5fb3c2f14fca08.93826835.jpg', 'T1-BG-5fb3c2f1598e29.34537444.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '2020-11-24T20:32', 200, 0, '2020-11-17 20:32:49', '2020-12-08 18:59:06'),
(3, 'Avengers 3', '3....The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios\' grand conclusion to twenty-two films, \"Avengers: Endgame.\"', 300, 'PG-13', 'ur126089657', 'tt4154756', 'T1-5fb3c33e2661a1.75405408.jpg', 'T1-BG-5fb3c33e383469.89047761.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '2020-06-16T08:33', 300, 2, '2020-11-17 20:34:06', '2020-11-18 22:07:48'),
(4, 'c4', '4', 4, 'G', '4', '4', 'T1-5fbf2580dfed13.62114349.jpg', 'T1-BG-5fbf2580eaab38.47973401.jpg', '4', '2020-11-26T11:48', 4, 0, '2020-11-26 11:48:16', '2020-12-08 18:52:46'),
(5, 'Parasite', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', 122, 'R', '4.5', 'tt6751668', 'T1-5fcf5693169d70.50697669.jpg', 'T1-BG-5fcf5693241711.04677801.jpg', 'https://www.youtube.com/watch?v=SEUXfv87Wpk', '2020-12-30T00:00', 150, 1, '2020-12-08 18:33:54', '2020-12-08 21:39:59'),
(6, 'Spiderman: Into the Spider-verse', 'Teen Miles Morales becomes the Spider-Man of his universe, and must join with five spider-powered individuals from other dimensions to stop a threat for all realities.', 67, 'PG', '9.9', 'tt4633694', 'T1-5fcf57cc0d8889.59947404.jpg', 'T1-BG-5fcf57cc4c0534.29756240.jpg', 'https://www.youtube.com/watch?v=g4Hbz2jLxvQ', '2020-12-01T00:00', 200, 2, '2020-12-08 18:39:07', '2020-12-08 21:36:39'),
(7, 'Star Wars: Rise of Skywalker', 'The surviving members of the resistance face the First Order once again, and the legendary conflict between the Jedi and the Sith reaches its peak bringing the Skywalker saga to its end.', 141, 'PG-13', '9.9', 'tt2527338', 'T1-5fcf59a52e2b92.93755271.jpg', 'T1-BG-5fcf59a53bc309.10620973.jpg', 'https://www.youtube.com/watch?v=8Qn_spdM5Zg', '2020-12-02T00:00', 200, 2, '2020-12-08 18:47:00', '2020-12-08 21:38:50'),
(8, 'Ang Pangarap Kong Holdap', 'Set in the imaginary Barangay Husay, Eman teams up with his two friends, Toto and Carlo who start as the underdogs, failing at every opportunity to succeed in their small-time scams. They then meet Nicoy who becomes part of Eman\'s group breaking the tradition of having only 3 members per gang.', 107, 'R', '8.5', 'tt9349770', 'T1-5fcf5ad64dc218.88304697.jpg', 'T1-BG-5fcf5ad6561044.51592593.jpg', 'https://www.youtube.com/watch?v=H3LzdgKdDqY', '2020-12-04T00:00', 170, 2, '2020-12-08 18:52:06', '2020-12-08 21:39:20'),
(9, 'Mulan', 'A young Chinese maiden disguises herself as a male warrior in order to save her father.', 115, 'PG-13', '5.5', 'tt4566758', 'T1-5fcf5bb3292ce3.04307033.png', 'T1-BG-5fcf5bb367b2a4.33674737.jpg', 'https://www.youtube.com/watch?v=KK8FHdFluOQ', '2020-12-15T00:00', 200, 1, '2020-12-08 18:55:46', '2020-12-08 21:39:37'),
(10, 'Black Widow', 'A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.', 120, 'R', '7.5', 'tt3480822', 'T1-5fcf5c58732ed1.56879736.jpg', 'T1-BG-5fcf5c587b8bb5.08847627.jpg', 'https://www.youtube.com/watch?v=ybji16u608U', '2020-12-31T00:00', 200, 1, '2020-12-08 18:58:32', '2020-12-08 21:40:32'),
(11, 'Jumanji: The Next Level', 'In Jumanji: The Next Level, the gang is back but the game has changed. As they return to rescue one of their own, the players will have to brave parts unknown from arid deserts to snowy mountains, to escape the world\'s most dangerous game.', 123, 'PG-13', '6.7', 'tt7975244', 'T1-5fcf5d61b08fe2.44744078.jpg', 'T1-BG-5fcf5d61b88c29.60532359.jpeg', 'https://www.youtube.com/watch?v=rBxcF-r9Ibs', '2020-12-13T00:00', 200, 1, '2020-12-08 19:02:57', '2020-12-08 21:40:57');

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

--
-- Dumping data for table `now_showing`
--

INSERT INTO `now_showing` (`NOW_ID`, `MOVIE_ID`, `B_MANILA`, `B_MARIKINA`, `B_NORTH`, `B_BACOOR`, `C_MANILA`, `C_MARIKINA`, `C_NORTH`, `C_BACOOR`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 1, 1, NULL, NULL, NULL, 2, NULL, NULL, NULL, 0, '2020-11-17 20:31:48', '2020-11-26 20:26:43'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-17 20:32:49', '2020-12-08 18:59:06'),
(3, 3, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, '2020-11-17 20:34:06', '2020-11-18 22:07:48'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-26 11:48:17', '2020-12-08 18:52:46'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-12-08 18:33:55', '2020-12-08 21:39:59'),
(6, 6, 1, 2, 3, 4, 3, 2, 4, 1, 1, '2020-12-08 18:39:08', '2020-12-08 21:36:39'),
(7, 7, NULL, NULL, 3, NULL, NULL, NULL, 1, NULL, 1, '2020-12-08 18:47:01', '2020-12-08 21:38:50'),
(8, 8, NULL, 2, NULL, NULL, NULL, 5, NULL, NULL, 1, '2020-12-08 18:52:06', '2020-12-08 21:39:20'),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-12-08 18:55:47', '2020-12-08 21:39:37'),
(10, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-12-08 18:58:32', '2020-12-08 21:40:32'),
(11, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-12-08 19:02:57', '2020-12-08 21:40:57');

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
  `VERIFIED` int(11) NOT NULL DEFAULT 0,
  `ACTIVE` int(11) NOT NULL DEFAULT 1,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`ACCOUNT_ID`, `USERNAME`, `EMAIL`, `ACCOUNT_PASSWORD`, `ADMIN`, `VERIFY_CODE`, `VERIFIED`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 'patrick', 'patrick@gmail.com', '$2y$10$LBzqKCVnP8lCxWKKMGjVGevsz/IuOcPopQL305VdoMHFtARaNS7vq', 'ADMIN', 686704, 1, 1, '2020-11-17 19:18:44', '2020-11-28 12:03:19'),
(2, 'ptrckc', 'ptrckc10@gmail.com', '$2y$10$IhsQQqrugGu5BIzERMt3iOjtnKNddYFAFBo0osNcZ9O06VuOenzXm', 'USERS', 732790, 0, 1, '2020-11-17 19:19:39', '2020-11-28 12:46:38'),
(3, 'patrick3', 'patrick3@gmail.com', '$2y$10$qEUiqkxkmpvezoo/35mqEuVBU.MZt995INFHxqIxt70de3KM/Q7f6', 'USERS', NULL, 0, 0, '2020-11-17 20:48:27', '2020-11-27 18:57:09'),
(4, 'guerrerro_ping', 'amdg24.mdg@gmail.com', '$2y$10$Y5BITLU1CbborgbQp0AajO2aGtHDl0LTwiQ5WD/rNFp0dr5otgPH6', 'ADMIN', NULL, 0, 1, '2020-12-08 18:27:11', '2020-12-08 18:27:11'),
(5, 'Senor_Tukan', 'allenmiguel.deguzman@tup.edu.ph', '$2y$10$Hp1wM2r1Qdb3O0fSCoQ7muY.cAMNwqHOGwb.0Aq43g9xPcfRBDqwO', 'USERS', NULL, 0, 0, '2020-12-08 19:15:26', '2020-12-08 19:16:27');

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
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`USERS_ID`, `ACCOUNT_ID`, `FIRST_NAME`, `LAST_NAME`, `MI`, `CONTACT_NO`, `ADDRESS`, `GENDER_ID`, `AGE`, `BIRTHDATE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 1, 'Patr', 'Co', 'P', '09212322222', '104 Kapa', 1, 21, '1999-01-02', '2020-11-17 19:18:45', '2020-11-28 09:57:15'),
(2, 2, 'Pat', 'Co', 'P', '09179914599', '104', 1, 21, '1999-01-02', '2020-11-17 19:19:40', '2020-11-17 19:19:40'),
(3, 3, 'Pa', 'C', 'P', '09222532999', 'Cal', 2, 21, '1999-01-03', '2020-11-17 20:48:28', '2020-11-17 20:48:28'),
(6, 4, 'Miguel', 'DeGuzman', 'G', '09275258579', 'Sampaloc, Manila', 1, 20, '2000-03-13', '2020-12-08 18:27:11', '2020-12-08 18:27:11'),
(7, 5, 'Allen', 'De Guzman', 'G', '09278587852', 'Sampaloc, Manila', 1, 20, '2000-03-13', '2020-12-08 19:15:26', '2020-12-08 19:15:26');

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
  MODIFY `COMING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GENDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MOVIE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movie_branches`
--
ALTER TABLE `movie_branches`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `now_showing`
--
ALTER TABLE `now_showing`
  MODIFY `NOW_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `USERS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `users_account` (`ACCOUNT_ID`);

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