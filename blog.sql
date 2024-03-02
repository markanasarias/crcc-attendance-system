-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 11:57 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `name` varchar(99) NOT NULL,
  `birthday` varchar(99) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `contact` varchar(99) NOT NULL,
  `ecname` varchar(99) NOT NULL,
  `eccontact` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `profile` varchar(99) NOT NULL,
  `qrimage` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `birthday`, `gender`, `address`, `email`, `password`, `contact`, `ecname`, `eccontact`, `status`, `profile`, `qrimage`) VALUES
('', 'Mark Anasarias', '1999-11-14', 'male', 'langgam', 'markanasarias6@gmail.com', 'mark123', '09205844176', 'mark', '09205844176', 1, '', ''),
('1', 'Loran Reyes', '', '0', '', 'loran@gmail.com', '', '09205844176', '', '', 0, '', ''),
('10', 'kwekkwek', '', '0', '', 'markanasarias@gmail.com', '', '09205844176', '', '', 0, 'images/WIN_20230920_15_30_19_Pro.jpg', 'images/QR_Code (17).png'),
('11', 'bucky', '', '0', '', 'bucky@gmail.com', '', '09205844176', '', '', 0, 'images/WIN_20230920_13_14_32_Pro.jpg', 'images/QR_Code (27).png'),
('12', 'dendennnn', '2023-10-22', 'Choose...', 'dsasda', 'asdasd', '', '123123', 'asdasd', '312312', 0, '', '1697971537.jpg'),
('13', 'flow g', '2023-10-22', '0', 'sadasd', 'asdasd', '', '12312312', 'asdas', '3123', 0, '', '1697971636.jpg'),
('14', 'bote', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdas', '123123', 0, '', '1697971673.jpg'),
('15', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971718.jpg'),
('16', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971852.jpg'),
('1697975165-', 'qweqtrtyiuioioupio11', '2023-10-22', '0', 'asdas', 'asdad', '', 'asdas', 'asda', 'asdasd', 0, 'QR_Code (23).png', '1697975165.jpg'),
('1697975495-0038', 'kutsara', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'dasdas', '123123', 0, 'QR_Code (30).png', '1697975495.jpg'),
('17', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971854.jpg'),
('18', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971895.jpg'),
('19', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971917.jpg'),
('2', 'Jericho Ilado', '', '0', '', 'jericho@gmail.com', '', '09205844176', '', '', 0, '', ''),
('20', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697971971.jpg'),
('20231022', 'curry', '2023-10-22', '0', 'adadasd', 'asdasd', '', '123123', 'asdas', '123123', 0, 'QR_Code (30).png', '1697974765.jpg'),
('20231022-00', 'rawar', '2023-10-22', '0', 'asdasd', 'dasdas', '', '13123', 'dasdasd', '23123', 0, 'QR_Code (31).png', '1697975036.jpg'),
('20231022-0039', 'kutsara at tinidor', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'dasdas', '123123', 0, 'lisensyaa.jpg', '1697975580.jpg'),
('20231022-0040', 'kutsara at tinidor at may plato pa ', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'dasdas', '123123', 0, 'QR_Code (30).png', '1697975655.jpg'),
('20231022-0042', 'aceron 12', '2023-10-22', 'Choose...', 'asdasd', 'sadasd', 'CRCC', '123123', 'asdsda', '123131', 0, 'andrie.jpg', '1697976736.jpg'),
('20231022-0043', 'aceron 3', '2023-10-22', '0', 'asdasd', 'sadasd', 'ace2023', '123123', 'asdsda', '123131', 0, 'lisensyaa.jpg', '1697976982.jpg'),
('20231022-0044', 'jeffrey aceron', '2023-10-22', '0', 'asdasd', 'asdasd', 'jeffrey aceron2023-10-', '123123', 'asdasd', '123123', 0, 'QR_Code (22).png', '1697977135.jpg'),
('20231022-0045', 'jeffrey aceron pogi', '2023-10-22', '0', 'asdasd', 'asdasd', 'jeffrey aceron pogi2023-10-22', '123123', 'asdasd', '123123', 0, 'lisensyaa.jpg', '1697977266.jpg'),
('20231022-16', 'bday', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'dasdas', '123123', 0, 'lisensyaa.jpg', '1697975333.jpg'),
('20231025-0046', 'kuya mo wendell', '2023-10-25', 'Male', 'asdasds', 'sadsad', 'kuya mo wendell2023-10-25', '2123123', 'asdsa', '1231231', 0, 'adv.jpg', '1698218398.jpg'),
('20231025-0047', 'kuya mo wendell', '2023-10-25', 'Male', 'asdasds', 'sadsad', 'kuya mo wendell2023-10-25', '2123123', 'asdsa', '1231231', 0, 'adv.jpg', '1698218448.jpg'),
('20231025-0048', 'aw', '2023-10-25', 'Male', 'asdsada', 'asdasd', 'aw2023-10-25', '123123', 'asdas', '123123', 0, 'adv.jpg', '1698218467.jpg'),
('20231025-0049', 'yown', '2023-10-25', 'Male', 'asdsadsa', 'xczc', 'yown2023-10-25', '213123', 'zxcxzc', '1312', 0, 'adv.jpg', '1698218663.jpg'),
('20231026-0050', 'wendellblanco', '2023-10-26', 'Female', 'asdsadasd', 'sadadasdsadas', 'wendellblanco2023-10-26', '123123', 'asdasdada', '123123123', 0, 'andrie.jpg', '1698282049.jpg'),
('20231102-0052', 'markanasarias', '2023-11-02', 'Male', 'langgam', 'markanasarias6@gmail.com', 'markanasarias2023-11-02', '09205844176', 'nerissa anasarias', '09205844176', 0, 'mark1.jpg', '1698918547.jpg'),
('21', 'asdad', '2023-10-22', '0', 'asdasd', 'asdasd', '', '12312', 'asdads', '21312', 0, '', '1697972010.jpg'),
('2147483647', 'miloooooo', '2023-10-22', '0', 'asdad', 'sdasd', '', '123123', 'asdasd', '213123', 0, 'lisensyaa.jpg', '1697974672.jpg'),
('22', 'sadasd', '2023-10-22', '0', 'asdasd', 'asdasd', '', '123123', 'asdasd', '123123', 0, '', '1697972095.jpg'),
('23', 'lok', '2023-10-22', '0', 'sadas', 'asdasd', '', '12312', 'asdasd', '123123', 0, '', '1697972172.jpg'),
('24', 'loklok', '2023-10-22', '0', 'asdas', 'asdasd', '', '123123', 'asdasd', '123123', 0, '', '1697972224.jpg'),
('25', 'admin', '2023-10-22', '0', 'asdasd', 'asdasd', '', '123123', 'asdasd', '12312', 0, '', '1697972355.jpg'),
('26', 'san', '2023-10-22', '0', 'sadasd', 'asdasd', '', '12312', 'asdasd', '12312', 0, '', '1697972455.jpg'),
('27', 'san mao', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'adsas', '123123', 0, 'markdp.png', '1697972525.jpg'),
('28', 'linsensya', '2023-10-22', '0', 'asdasd', 'asdas', '', '312312', 'asdas', '2131', 0, 'lisensyaa.jpg', '1697972647.jpg'),
('29', 'linsensya naaa', '2023-10-22', '0', 'asdasd', 'asdas', '', '312312', 'asdas', '2131', 0, 'lisensyaa.jpg', '1697972713.jpg'),
('3', 'Isaiah Abalos', '', '0', '', 'abalo@gmail.com', '', '09205844176', '', '', 0, '', ''),
('30', 'ito na nga', '2023-10-22', '0', 'asdad', 'sadas', '', '123123', 'asdasd', '213123', 0, '', '1697972798.jpg'),
('31', 'ito na nga sadasdasdasda', '2023-10-22', '0', 'asdad', 'sadas', '', '123123', 'asdasd', '213123', 0, 'QR_Code (31).png', '1697972858.jpg'),
('32', 'ito na nga sadasdasdasda', '2023-10-22', '0', 'asdad', 'sadas', '', '123123', 'asdasd', '213123', 0, 'QR_Code (31).png', '1697972896.jpg'),
('4', 'bunga', '', '0', '', 'bunga@gmail.com', '', '09205844176', '', '', 0, 'images/bunga.png', 'images/bunga2.png'),
('5', 'Mark Anasarias', '', '0', '', 'markanasarias6@gmail.com', '', '09205844176', '', '', 0, 'images/mark1.jpg', 'images/3.png'),
('6', 'ronald anasarias', '', '0', '', 'ronald@gmail.com', '', '092058841766', '', '', 0, 'images/WIN_20230507_15_17_48_Pro.jpg', 'images/QR_Code (9).png'),
('7', 'Wendell Blanco', '', '0', '', 'wendel@gmail.com', '', '09205844176', '', '', 0, 'images/toy.jpg', 'images/QR_Code (10).png'),
('8', 'Fatima Valdez', '', '0', '', 'fatima@gmail.com', '', '09205844176', '', '', 0, 'images/364215851_792808408918333_8004615935963434536_n.jpg', 'images/QR_Code (11).png'),
('9', 'Nerissa Anasarias', '', '0', '', 'anasariasnerissa14@gmail.com', '', '09205844176', '', '', 0, 'images/WIN_20230219_21_57_13_Pro.jpg', 'images/QR_Code (16).png'),
('CRCC20231022-0041', 'kutsara at tinidor at platitio', '2023-10-22', '0', 'asdasd', 'asdas', '', '123123', 'dasdas', '123123', 0, 'QR_Code (30).png', '1697975773.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `date` varchar(99) NOT NULL,
  `title` varchar(99) NOT NULL,
  `description` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `date`, `title`, `description`) VALUES
(6, '2023-04-01', 'Kasali', 'Kasal'),
(7, '2023-04-21', 'kasal', 'kasal'),
(10, '2023-04-29', 'simba', 'simba'),
(11, '2023-05-01', 'Simba', 'Simba'),
(12, '2023-08-07', 'sample', 'today'),
(13, '2023-08-08', 'sample', 'bukas'),
(16, '2023-10-01', 'nba', 'nba'),
(17, '2023-10-25', 'asdasdasd', 'asdasd'),
(18, '2023-10-21', 'asdasdasd', 'asdasdasd'),
(19, '2023-11-14', 'bday ko', 'bday ko nga'),
(20, '2023-10-24', 'aso', 'aso'),
(21, '2023-12-25', 'Xmas', 'xmas party'),
(22, '2023-11-04', 'pongs', 'pongs'),
(23, '2023-11-01', 'araw ng patay', 'patay ka jan'),
(24, '2023-11-04', 'paksiw', 'paksiw'),
(25, '2023-11-11', 'isa', 'isa'),
(26, '2023-10-28', 'dsadsa', 'dasdasd'),
(27, '2023-10-25', 'surebol', 'nato'),
(28, '2023-10-30', 'bday ni mark', 'bday'),
(29, '2023-10-31', 'event', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `name`, `date`, `time`) VALUES
(1, 'Wendell Blanco', '2023-09-21', '17:48:22'),
(2, 'Wendell Blanco', '2023-09-21', '17:49:08'),
(3, 'Fatima Valdez', '2023-09-21', '17:49:14'),
(4, 'andrex pogi', '2023-09-21', '17:49:20'),
(5, 'Mark A all the way!', '2023-09-21', '17:49:27'),
(6, 'andrex pogi', '2023-09-21', '17:49:33'),
(7, 'Wendell Blanco', '2023-09-21', '17:50:03'),
(8, 'Fatima Valdez', '2023-09-21', '17:50:09'),
(9, 'andrex pogi', '2023-09-21', '17:50:24'),
(10, 'Fatima Valdez', '2023-09-21', '17:50:46'),
(11, 'andrex pogi', '2023-09-21', '17:50:56'),
(12, 'Wendell Blanco', '2023-09-21', '17:51:02'),
(13, 'Fatima Valdez', '2023-09-21', '17:51:17'),
(14, 'andrex pogi', '2023-09-21', '17:51:23'),
(15, 'Fatima Valdez', '2023-09-21', '17:51:33'),
(16, 'Wendell Blanco', '2023-09-21', '17:51:39'),
(17, 'Fatima Valdez', '2023-09-21', '17:51:45'),
(18, 'andrex pogi', '2023-09-21', '17:51:52'),
(19, 'Fatima Valdez', '2023-09-21', '17:52:02'),
(20, 'andrex pogi', '2023-09-21', '17:52:12'),
(21, 'Fatima Valdez', '2023-09-21', '17:52:30'),
(22, 'andrex pogi', '2023-09-21', '17:52:37'),
(23, 'Wendell Blanco', '2023-09-21', '17:52:47'),
(24, 'Fatima Valdez', '2023-09-21', '17:52:57'),
(25, 'andrex pogi', '2023-09-21', '17:53:03'),
(26, 'Mark A all the way!', '2023-09-21', '17:53:17'),
(27, 'Mark A all the way!', '2023-09-21', '17:59:09'),
(28, 'Wendell Blanco', '2023-09-21', '18:09:01'),
(29, 'Wendell Blanco', '2023-09-21', '18:54:15'),
(30, 'Wendell Blanco', '2023-09-21', '19:05:12'),
(31, 'Wendell Blanco', '2023-09-21', '23:19:13'),
(32, 'Wendell Blanco', '2023-09-21', '23:20:45'),
(33, 'Wendell Blanco', '2023-09-22', '11:55:13'),
(34, 'Wendell Blanco', '2023-09-22', '11:59:02'),
(35, 'Wendell Blanco', '2023-09-22', '12:00:42'),
(36, 'Wendell Blanco', '2023-09-22', '12:04:48'),
(37, 'Wendell Blanco', '2023-09-22', '12:05:46'),
(38, 'Wendell Blanco', '2023-09-22', '12:13:26'),
(39, 'Wendell Blanco', '2023-09-22', '18:58:57'),
(40, 'Wendell Blanco', '2023-09-22', '19:00:13'),
(41, 'Wendell Blanco', '2023-09-22', '19:04:04'),
(42, 'Wendell Blanco', '2023-09-22', '19:08:29'),
(43, 'Wendell Blanco', '2023-09-22', '19:08:43'),
(44, 'Wendell Blanco', '2023-09-22', '21:27:58'),
(45, 'Fatima Valdez', '2023-09-22', '21:36:23'),
(46, 'Fatima Valdez', '2023-09-22', '21:36:54'),
(47, 'Wendell Blanco', '2023-09-22', '21:37:04'),
(48, 'Wendell Blanco', '2023-09-23', '07:24:54'),
(49, 'Wendell Blanco', '2023-09-23', '07:25:43'),
(50, 'Wendell Blanco', '2023-09-23', '07:26:55'),
(51, 'Wendell Blanco', '2023-10-07', '18:16:02'),
(52, 'mark', '2023-10-07', '19:17:49'),
(53, 'mark', '2023-10-07', '19:19:03'),
(54, 'mark', '2023-10-07', '23:02:02'),
(55, 'mark', '2023-10-07', '23:27:03'),
(56, 'mark', '2023-10-07', '23:27:54'),
(57, 'mark', '2023-10-07', '23:28:04'),
(58, 'mark', '2023-10-16', '10:23:42'),
(59, 'mark', '2023-10-20', '14:13:31'),
(60, 'mark', '2023-10-21', '09:49:01'),
(61, 'mark', '2023-10-25', '15:51:11'),
(62, 'mark', '2023-10-25', '16:06:31'),
(63, 'Mark Anasarias', '2023-10-25', '16:16:51'),
(64, 'mark', '2023-10-26', '13:33:33'),
(65, 'mark', '2023-10-26', '13:34:12'),
(66, 'Mark Anasarias', '2023-10-26', '13:40:07'),
(67, 'Mark Anasarias', '2023-10-26', '13:48:13'),
(68, 'Mark Anasarias', '2023-10-26', '13:50:16'),
(69, 'Mark Anasarias', '2023-10-27', '15:20:07'),
(70, 'kuya mo si wendell', '2023-10-27', '15:23:37'),
(71, 'kuya mo si wendell', '2023-10-28', '10:46:58'),
(72, 'Mark Anasarias', '2023-11-02', '14:14:20'),
(73, 'kuya mo si wendell', '2023-11-02', '15:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` varchar(99) NOT NULL,
  `gender` int(99) NOT NULL,
  `address` varchar(99) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(99) NOT NULL,
  `status` int(11) NOT NULL,
  `image_path1` varchar(99) NOT NULL,
  `image_path2` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `birthday`, `gender`, `address`, `contact`, `email`, `status`, `image_path1`, `image_path2`) VALUES
(1, 'mark', '2023-09-30', 1, 'langgam', '09205844176', 'markanasarias6@gmail.com', 0, 'images/WIN_20230920_15_30_19_Pro.jpg', 'images/QR_Code (19).png'),
(2, 'dek', '2023-09-21', 1, 'langgam', '09205844176', 'markanasarias6@gmail.com', 0, 'images/mark.png', 'images/QR_Code (20).png'),
(3, 'dekdek', '2023-09-21', 0, 'langgam', '09205844176', 'markanasarias6@gmail.com', 0, 'images/markdp.png', 'images/QR_Code (21).png'),
(4, 'wendel', '2023-09-21', 0, 'maligaya 7', '09203484392', 'wendel@gmail.com', 0, 'images/mark1.jpg', 'images/QR_Code (22).png'),
(5, 'milo', '2023-09-22', 0, 'langgam', '09205844176', 'bucky@gmail.com', 0, 'images/dp.jpg', 'dp.jpg'),
(6, 'fatima', '2023-09-22', 1, 'silcas', '09205844176', 'fatima@gmail.com', 0, 'images/dp.jpg', 'images/QR_Code (24).png');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int(11) NOT NULL,
  `qrtext` varchar(99) NOT NULL,
  `birthday` varchar(99) NOT NULL,
  `gender` varchar(99) NOT NULL,
  `address` varchar(99) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ecname` varchar(99) NOT NULL,
  `eccontact` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image_path1` varchar(99) NOT NULL,
  `qrimage` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id`, `qrtext`, `birthday`, `gender`, `address`, `contact`, `email`, `ecname`, `eccontact`, `status`, `image_path1`, `qrimage`) VALUES
(1, 'Mark Anasarias', '1999-11-14', 'Male', 'Brgy langgam', '09205844176', 'markanasarias6@gmail.com', 'Nerissa Anasarias', '09205844176', 0, 'mark1.jpg', '1698921852.jpg'),
(2, 'Jericho Ilado', '2023-11-02', 'Male', 'San Antonio', '09690925138', 'jericho@gmail.com', 'Ilado', '09690925138', 0, '385434782_819190146608111_7078716604209775911_n.jpg', '1698922112.jpg'),
(3, 'Isaiah Alshadine Abalos', '2023-11-02', 'Male', 'Langgam', '09384568599', 'Abalos@gmail.com', 'abalos', '09384568599', 0, '387476869_1048831129892613_1574424059778399532_n.jpg', '1698922247.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
