-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 06:14 AM
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
  `BRANCH_ID` int(10) NOT NULL,
  `CINEMA_NO` int(10) NOT NULL,
  `NO_SEATS` int(20) NOT NULL,
  `MOVIE_ID` int(11) NOT NULL,
  `ACTIVE` int(10) NOT NULL,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`CINEMA_ID`, `BRANCH_ID`, `CINEMA_NO`, `NO_SEATS`, `MOVIE_ID`, `ACTIVE`, `MODIFIED_ON`) VALUES
(1, 1, 1, 300, 0, 0, '2020-11-13 09:15:12'),
(2, 1, 2, 300, 0, 0, '2020-11-13 09:17:45'),
(3, 1, 3, 300, 0, 0, '2020-11-13 09:17:45'),
(4, 1, 4, 300, 0, 0, '2020-11-13 09:17:45'),
(5, 1, 5, 300, 0, 0, '2020-11-13 09:17:45'),
(6, 2, 1, 300, 0, 0, '2020-11-13 13:36:02'),
(7, 2, 2, 300, 0, 0, '2020-11-13 13:36:02'),
(8, 2, 3, 300, 0, 0, '2020-11-13 13:36:02'),
(9, 2, 4, 300, 0, 0, '2020-11-13 13:36:02'),
(10, 2, 5, 300, 0, 0, '2020-11-13 13:36:02'),
(11, 3, 1, 300, 0, 0, '2020-11-13 13:37:15'),
(12, 3, 2, 300, 0, 0, '2020-11-13 13:37:15'),
(13, 3, 3, 300, 0, 0, '2020-11-13 13:37:15'),
(14, 3, 4, 300, 0, 0, '2020-11-13 13:37:15'),
(15, 3, 5, 300, 0, 0, '2020-11-13 13:37:15'),
(16, 4, 1, 300, 0, 0, '2020-11-13 13:38:42'),
(17, 4, 2, 300, 0, 0, '2020-11-13 13:38:42'),
(18, 4, 3, 300, 0, 0, '2020-11-13 13:38:42'),
(19, 4, 4, 300, 0, 0, '2020-11-13 13:38:42'),
(20, 4, 5, 300, 0, 0, '2020-11-13 13:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `coming_soon`
--

CREATE TABLE `coming_soon` (
  `COMING_ID` int(11) NOT NULL,
  `MOVIE_ID` int(11) NOT NULL,
  `BRANCH_ID` int(11) NOT NULL,
  `ACTIVE` int(10) NOT NULL DEFAULT 0,
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
  `ACTION` int(11) DEFAULT 0,
  `ADVENTURE` int(11) DEFAULT 0,
  `ANIMATION` int(11) DEFAULT 0,
  `COMEDY` int(11) DEFAULT 0,
  `DRAMA` int(11) DEFAULT 0,
  `FAMILY` int(11) DEFAULT 0,
  `FANTASY` int(11) DEFAULT 0,
  `HORROR` int(11) DEFAULT 0,
  `MUSICAL` int(11) DEFAULT 0,
  `MYSTERY` int(11) DEFAULT 0,
  `ROMANCE` int(11) DEFAULT 0,
  `SCI_FI` int(11) DEFAULT 0,
  `THRILLER` int(11) DEFAULT 0,
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GENRE_ID`, `MOVIE_ID`, `ACTION`, `ADVENTURE`, `ANIMATION`, `COMEDY`, `DRAMA`, `FAMILY`, `FANTASY`, `HORROR`, `MUSICAL`, `MYSTERY`, `ROMANCE`, `SCI_FI`, `THRILLER`, `MODIFIED_ON`) VALUES
(1, 5, NULL, NULL, 3, 4, NULL, 6, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-13 15:54:18'),
(2, 57, 1, NULL, NULL, NULL, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-13 15:55:18'),
(3, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-14 12:51:38'),
(4, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-14 12:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MOVIE_ID` int(11) NOT NULL,
  `MOVIE_TITLE` varchar(50) NOT NULL DEFAULT '',
  `MOVIE_DESC` varchar(500) NOT NULL,
  `MOVIE_DURATION` int(100) DEFAULT NULL,
  `RATED` varchar(10) NOT NULL DEFAULT '',
  `RATING_USER` varchar(200) NOT NULL,
  `RATING_TITLE` varchar(200) NOT NULL,
  `POSTER` varchar(300) NOT NULL,
  `POSTER_BG` varchar(300) NOT NULL,
  `TRAILER` varchar(300) NOT NULL,
  `PREMIERE_DATE` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `ACTIVE` int(10) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MOVIE_ID`, `MOVIE_TITLE`, `MOVIE_DESC`, `MOVIE_DURATION`, `RATED`, `RATING_USER`, `RATING_TITLE`, `POSTER`, `POSTER_BG`, `TRAILER`, `PREMIERE_DATE`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 'Star Wars: The Force Awakens', '\"May the Force\"', 31030, 'PG', '', '', 'IMG-5fa943cb2420c0.55208286.jpg', '', '', '2020-10-21 21:00:55', 1, '2020-10-21 21:00:55', '2020-10-21 21:00:55'),
(2, 'Avengers endgame', '\"Let\'s beat Thanos this time\"', 25213, 'G', '', '', '', '', '', '2020-10-21 21:01:32', 1, '2020-10-21 21:01:32', '2020-10-21 21:01:32'),
(3, 'Parasite', '\"Always shower before going to work\"', 23600, 'R-18', '', '', '', '', '', '2020-10-21 21:03:06', 1, '2020-10-21 21:03:06', '2020-10-21 21:03:06'),
(4, 'Ang Pangarap kong Holdap', '\"Mas malupit pa sa money heist\"', 21545, 'PG', '', '', '', '', '', '2020-10-21 21:03:45', 1, '2020-10-21 21:03:45', '2020-10-21 21:03:45'),
(5, '5th movie', '5th', 60, 'G', '5555', '55555', '', '', '555555555555', '2020-11-08T15:16', 0, '2020-11-12 20:17:11', '2020-11-13 15:54:18'),
(6, '66666', 'asdasdsa', 240, 'NC-17', 'asdasda213321', 'adasdsa2313', '', '', 'adasdas21321', '2020-11-18T08:23', 1, '2020-11-12 20:21:07', '2020-11-13 15:25:49'),
(7, '77777', 'asdsada', 200, 'PG', 'asdasdadsa12112', 'asdasd121', '', '', 'asdsadsadas232323', '2020-11-01T20:22', 2, '2020-11-12 20:22:50', '2020-11-13 15:35:52'),
(8, 'asdsadadas', 'asdsadsadsa', 222, 'NC-17', 'asdasdas', 'asdsada', '', '', 'asdsadad121', '2020-11-02T23:30', 0, '2020-11-12 20:24:10', '2020-11-12 20:24:10'),
(9, 'asdasdas', 'asdasdasd', 111, 'G', 'adasdasas121221', 'asdasdsad121244', '', '', 'sadasd4444', '2020-11-28T20:32', 0, '2020-11-12 20:26:58', '2020-11-12 20:26:58'),
(10, '11', '10', 100, 'PG', '101', '123', '', '', 'asdasdasd223221', '2020-12-10T20:34', 2, '2020-11-12 20:29:12', '2020-11-12 20:29:12'),
(11, '11', '11', 111, 'PG-13', 'asdasd111', '111sdasdas', '', '', 'asdasdasdasdas', '2020-12-08T20:31', 1, '2020-11-12 20:31:13', '2020-11-12 20:31:13'),
(12, '12asdsad', '12', 12, 'R', '12', '122', '', '', '1232312', '2020-11-30T20:36', 2, '2020-11-12 20:36:21', '2020-11-12 20:36:21'),
(13, 'asdaadda', 'adasdsa', 111, 'NC-17', 'adsa', '122', '', '', 'asdasdas212', '2020-11-29T20:39', 1, '2020-11-12 20:39:51', '2020-11-13 15:27:30'),
(14, '144444', 'asdasdasa', 122, 'G', 'sadasd', 'asdsadsadas', '', '', 'sadsadsadsa', '2020-12-09T20:41', 1, '2020-11-12 20:44:55', '2020-11-12 20:44:55'),
(15, '15', '15', 2131, 'PG', '12312321', '15', '', '', 'adsadsaas15', '2020-12-12T20:45', 2, '2020-11-12 20:45:18', '2020-11-12 20:45:18'),
(16, '16', '16', 16, 'R', '16', '16', '', '', '16adaasas', '2020-11-22T08:46', 2, '2020-11-12 20:46:11', '2020-11-12 20:46:11'),
(17, '17', '17', 17, 'PG', '17', '17', '', '', '17', '2020-12-08T17:20', 1, '2020-11-12 23:20:16', '2020-11-13 15:27:44'),
(18, '18', '18', 18, 'NC-17', '18', '18', '', '', '18', '2020-12-01T12:19', 0, '2020-11-13 00:20:00', '2020-11-13 00:20:00'),
(19, '19', '19', 19, 'G', '19', '19', '', '', '19', '2020-12-05T12:23', 2, '2020-11-13 12:18:40', '2020-11-13 12:18:40'),
(20, '20', '20', 20, 'G', '20', '20', '', '', '20', '2020-11-20T12:24', 2, '2020-11-13 12:20:58', '2020-11-13 12:20:58'),
(21, '21', '21', 21, 'G', '21', '21', '', '', '21', '2020-12-31T00:26', 1, '2020-11-13 12:26:15', '2020-11-13 15:28:30'),
(22, '22', '22', 22, 'PG', '22', '22', '', '', '22', '2020-11-18T12:27', 0, '2020-11-13 12:28:13', '2020-11-13 15:28:23'),
(23, '23', '23', 23, 'G', '23', '23', '', '', '23', '2020-11-19T12:29', 2, '2020-11-13 12:29:34', '2020-11-13 12:29:34'),
(24, '24', '24', 24, 'PG', '24', '24', '', '', '24', '2020-11-18T17:39', 1, '2020-11-13 12:39:46', '2020-11-13 12:39:46'),
(25, '25', '25', 25, 'G', '25', '25', '', '', '25', '2020-12-04T12:40', 2, '2020-11-13 12:41:02', '2020-11-13 12:41:02'),
(26, '26', '26', 26, 'G', '26', '26', '', '', '26', '2020-11-19T12:42', 2, '2020-11-13 12:42:45', '2020-11-13 12:42:45'),
(27, '27', '27', 27, 'G', '27', '27', '', '', '27', '2020-11-28T12:43', 2, '2020-11-13 12:43:51', '2020-11-13 12:43:51'),
(28, '28', '28', 28, 'PG', '28', '28', '', '', '28', '2020-11-20T14:13', 2, '2020-11-13 14:15:03', '2020-11-13 14:15:03'),
(29, '29', '29', 29, 'PG-13', '29', '29', '', '', '29', '2020-11-21T14:15', 2, '2020-11-13 14:16:00', '2020-11-13 14:16:00'),
(30, '30', '30', 30, 'PG', '30', '30', '', '', '30', '2020-11-17T14:23', 2, '2020-11-13 14:24:07', '2020-11-13 14:24:07'),
(31, '31', '31', 31, 'R', '31', '31', '', '', '31', '2020-11-24T20:37', 2, '2020-11-13 15:39:25', '2020-11-13 15:39:25'),
(32, '32', '32', 32, 'PG', '32', '32', '', '', '32', '2020-11-12T05:13', 1, '2020-11-13 17:13:53', '2020-11-13 17:13:53'),
(33, '33', '33', 33, 'PG-13', '33', '33', '', '', '33', '2020-11-13T17:15', 1, '2020-11-13 17:15:14', '2020-11-13 17:15:14'),
(34, '34', '34', 34, 'NC-17', '34', '34', '', '', '34', '2020-11-13T05:24', 1, '2020-11-13 17:24:56', '2020-11-13 17:24:56'),
(35, '35', '35', 35, 'PG-13', '35', '35', '', '', '35', '2020-11-18T17:35', 1, '2020-11-13 17:32:37', '2020-11-13 17:32:37'),
(36, '36', '36', 36, 'G', '36', '36', '', '', '36', '2020-11-13T17:42', 0, '2020-11-13 17:40:04', '2020-11-13 17:40:04'),
(37, '37', '37', 37, 'G', '37', '37', '', '', '37', '2020-11-13T05:41', 0, '2020-11-13 17:41:15', '2020-11-13 17:41:15'),
(38, '38', '38', 38, 'PG-13', '38', '38', '', '', '38', '2020-11-13T17:49', 1, '2020-11-13 17:47:04', '2020-11-13 17:47:04'),
(39, '39', '39', 39, 'PG-13', '39', '39', '', '', '39', '2020-11-13T05:57', 0, '2020-11-13 17:57:37', '2020-11-13 17:57:37'),
(40, '40', '40', 40, 'PG-13', '40', '40', '', '', '40', '2020-11-11T17:59', 1, '2020-11-13 18:00:00', '2020-11-13 18:00:00'),
(41, '41', '41', 41, 'NC-17', '41', '41', '', '', '41', '2020-11-13T18:04', 0, '2020-11-13 18:02:29', '2020-11-13 18:02:29'),
(42, '42', '42', 42, 'R', '42', '42', '', '', '42', '2020-11-17T18:04', 0, '2020-11-13 18:04:22', '2020-11-13 18:04:22'),
(43, '43', '43', 43, 'PG-13', '43', '43', '', '', '43', '2020-11-20T07:45', 1, '2020-11-13 19:45:54', '2020-11-13 19:45:54'),
(44, '44', '44', 44, 'PG', '44', '44', '', '', '44', '2020-11-11T19:48', 0, '2020-11-13 19:48:33', '2020-11-13 19:48:33'),
(45, '45', '45', 45, 'PG-13', '45', '45', '', '', '45', '2020-11-13T07:55', 0, '2020-11-13 19:56:01', '2020-11-13 19:56:01'),
(46, '46', '46', 46, 'NC-17', '46', '46', '', '', '46', '2020-11-18T20:00', 1, '2020-11-13 20:00:06', '2020-11-13 20:00:06'),
(47, '47', '47', 47, 'PG', '47', '47', '', '', '47', '2020-11-13T08:17', 0, '2020-11-13 20:17:25', '2020-11-13 20:17:25'),
(48, '48', '48', 48, 'NC-17', '48', '48', '', '', '48', '2020-11-25T20:18', 1, '2020-11-13 20:18:58', '2020-11-13 20:18:58'),
(49, '49', '49', 49, 'PG', '49', '49', '', '', '49', '2020-11-12T12:20', 0, '2020-11-13 20:20:28', '2020-11-13 20:20:28'),
(50, '50', '50', 50, 'G', '50', '50', '', '', '50', '2020-11-16T20:28', 0, '2020-11-13 20:28:41', '2020-11-13 13:46:47'),
(51, '51', '51', 51, 'PG', '51', '51', '', '', '51', '2020-11-13T20:44', 0, '2020-11-13 20:41:44', '2020-11-13 20:41:44'),
(52, '52', '52', 52, 'PG', '52', '52', '', '', '52', '2020-11-13T08:43', 1, '2020-11-13 20:43:14', '2020-11-13 20:43:14'),
(53, '53', '53', 53, 'R', '53', '53', '', '', '53', '2020-11-13T08:49', 1, '2020-11-13 20:49:58', '2020-11-13 20:49:58'),
(54, '54', '54', 54, 'G', '54', '54', '', '', '54', '2020-11-13T21:24', 1, '2020-11-13 21:21:46', '2020-11-13 21:21:46'),
(55, '55', '55', 55, 'PG', '55', '55', '', '', '55', '2020-11-13T21:25', 0, '2020-11-13 21:23:00', '2020-11-13 21:23:00'),
(56, '56', '56', 56, 'R', '56', '56', '', '', '56', '2020-11-10T21:30', 0, '2020-11-13 21:30:20', '2020-11-13 21:30:20'),
(57, '57', '57', 57, 'PG-13', '57', '57', '', '', '57', '2020-11-11T21:31', 1, '2020-11-13 21:31:29', '2020-11-13 15:55:18'),
(58, '58', '58', 58, 'PG-13', '58', '58', 'T1-5faf625a2c7564.40670995.jpg', 'T1-BG-5faf625a330cf7.50298548.jpg', '58', '2020-11-17T12:51', 0, '2020-11-14 12:51:38', '2020-11-14 12:51:38'),
(59, '59', '59', 59, 'PG-13', '59', '59', 'T1-5faf639755ff33.26297505.jpg', 'T1-BG-5faf63976d6f96.68751637.jpg', '59', '2020-11-11T12:56', 1, '2020-11-14 12:56:55', '2020-11-14 12:56:55');

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
  `BRANCH_ID` int(11) DEFAULT NULL,
  `CINEMA_NO` int(10) NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT 0,
  `CREATED_ON` datetime NOT NULL DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `now_showing`
--

INSERT INTO `now_showing` (`NOW_ID`, `MOVIE_ID`, `BRANCH_ID`, `CINEMA_NO`, `ACTIVE`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 1, 1, 0, 1, '2020-11-13 21:03:23', '2020-11-12 12:19:58'),
(2, 1, 1, 0, 1, '2020-11-13 21:03:23', '2020-11-12 12:19:58'),
(3, 1, 1, 0, 1, '2020-11-13 21:03:23', '2020-11-12 12:19:58'),
(4, 3, 2, 0, 1, '2020-11-13 21:03:23', '2020-11-12 12:19:58'),
(5, 3, 2, 0, 1, '2020-11-13 21:03:23', '2020-11-12 12:19:58');

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

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`ACCOUNT_ID`, `USERNAME`, `EMAIL`, `ACCOUNT_PASSWORD`, `ADMIN`, `VERIFY_CODE`, `ACTIVE`) VALUES
(1, 'ptrckc10', 'ptrckc10@gmail.com', '$2y$10$1Rk8GfSoeaTSU76zgjn5Q.7hBrvEq3nzp6kezsx3zysu6C/3qWj1C', 'USERS', 490436, 1),
(2, 'patrick', 'patrick@gmail.com', '$2y$10$dXtg8u/eAKG3dB5fhyfrsesm5EBxPhpV/UEVG.eaaQJMM14Npdcqq', 'ADMIN', 98765, 1);

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
(3, 3, 'Dua', 'Lipa', '', '654895218', 'London, England', 2, 42, '1995-08-22', '2020-10-22 15:25:03', -1, '2020-10-22 15:25:03', -1),
(4, 1, 'Patrick', 'Concepcion', 'P', '09212322267', 'Caloocan City, Metro Manila', 1, 20, '1999-11-10', '2020-11-08 23:17:56', -1, '2020-11-08 23:17:56', -1),
(5, 2, 'Pat', 'Co', 'P', '09179914587', 'Caloocan', 1, 20, '1999-11-10', '2020-11-09 10:27:57', -1, '2020-11-09 10:27:57', -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`CINEMA_ID`);

--
-- Indexes for table `coming_soon`
--
ALTER TABLE `coming_soon`
  ADD PRIMARY KEY (`COMING_ID`);

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
  ADD KEY `MOVIE_ID` (`MOVIE_ID`),
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
  MODIFY `GENRE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MOVIE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `movie_branches`
--
ALTER TABLE `movie_branches`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `USERS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movies` (`MOVIE_ID`);

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
