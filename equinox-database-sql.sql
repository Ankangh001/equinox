-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 06:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equinox`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_slab`
--

CREATE TABLE `affiliate_slab` (
  `auto_id` int(11) NOT NULL,
  `min_range` int(11) NOT NULL,
  `max_range` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affiliate_slab`
--

INSERT INTO `affiliate_slab` (`auto_id`, `min_range`, `max_range`, `percentage`, `status`) VALUES
(1, 0, 250, 5, 1),
(2, 251, 500, 10, 1),
(3, 501, 1000, 15, 1),
(4, 1001, 1000000000, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(600) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(1, ' Commencement of Operations - Equinox Trading Capital', 'We are proud to announce the commencement of operations today. Traders can now apply for our funding programme to be funded upto $500,000 in capital.', '2023-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `ticketId` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `complaintType` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `type` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `ticketId`, `name`, `email`, `complaintType`, `subject`, `message`, `type`, `created_at`) VALUES
(8, '', 'Bala Francis', '', 'Request', 'Partnership', 'I wish to record a YouTube video promotion for you if we have a mutual agreement ', 'contact', '2023-06-16 21:06:54'),
(11, '', 'Ankan Ghosh', 'ankanghosh010@gmail.com', 'General Question', 'test', 'test', 'contact', '2023-06-27 18:06:46'),
(12, '', 'Ankan', 'ankanghosh010@gmail.com', 'General Question', 'test', 'test', 'contact', '2023-06-27 18:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `percentage` int(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percentage`, `created_at`) VALUES
(1, 'LAUNCH20', 20, '2023-06-16 15:06:01'),
(3, 'INFI5', 5, '2023-06-20 07:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `equitycronjob`
--

CREATE TABLE `equitycronjob` (
  `id` int(11) NOT NULL,
  `equity` decimal(18,6) NOT NULL,
  `account_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_code`
--

CREATE TABLE `group_code` (
  `id` int(11) NOT NULL,
  `code` varchar(120) NOT NULL,
  `phase` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_code`
--

INSERT INTO `group_code` (`id`, `code`, `phase`) VALUES
(1, 'contest\\FProp\\Fpropa\\USD', 1),
(2, 'contest\\LIVEProp\\USD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kyc_idproof` varchar(500) NOT NULL,
  `kyc_adhar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_analytics`
--

CREATE TABLE `login_analytics` (
  `auto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_analytics`
--

INSERT INTO `login_analytics` (`auto_id`, `user_id`, `device`, `device_id`, `token`, `status`, `created_date`) VALUES
(1, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:11:27'),
(2, 1, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:11:45'),
(3, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDEyMmdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-16 12:26:00'),
(4, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:27:21'),
(5, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:28:02'),
(6, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:50:57'),
(7, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 12:52:41'),
(8, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 13:14:29'),
(9, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '1', 'NjQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 13:20:13'),
(10, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 13:30:45'),
(11, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 13:36:35'),
(12, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 13:53:42'),
(13, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODIyMmdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-16 13:57:00'),
(14, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'MTQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 14:04:50'),
(15, 2, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'NjAyMmdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-16 14:09:26'),
(16, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 14:32:14'),
(17, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 14:37:15'),
(18, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjgzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 14:46:46'),
(19, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 14:56:44'),
(20, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTEzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 14:57:21'),
(21, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 15:00:42'),
(22, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODEzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 15:01:19'),
(23, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 15:12:48'),
(24, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTIyMmdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-16 16:24:57'),
(25, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 18:13:27'),
(26, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTIzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 18:21:03'),
(27, 3, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzEzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 19:13:12'),
(28, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzQzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 19:29:48'),
(29, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 20:00:36'),
(30, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'NzgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 20:40:03'),
(31, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'NDExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 21:01:31'),
(32, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 21:43:21'),
(33, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTQzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 22:11:49'),
(34, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 22:38:02'),
(35, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-16 22:56:27'),
(36, 4, 'Mozilla/5.0 (Android 12; Mobile; rv:109.0) Gecko/113.0 Firefox/113.0', '1', 'MjU0NGpiX21pc3RyeUBob3RtYWlsLmNvbQ==', 0, '2023-06-16 23:09:20'),
(37, 3, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDczM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-16 23:58:45'),
(38, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODAzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 04:37:01'),
(39, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTczM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 04:45:30'),
(40, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTkzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 06:26:24'),
(41, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 08:51:23'),
(42, 5, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Njk1NW0uc2hyZXlhMjIxOTk5QGdtYWlsLmNvbQ==', 0, '2023-06-17 09:56:18'),
(43, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 09:56:39'),
(44, 3, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjgzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:18:50'),
(45, 3, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODUzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:18:50'),
(46, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTkzM2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:22:41'),
(47, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 10:34:48'),
(48, 7, 'Mozilla/5.0 (Linux; Android 6.0.1; Le X526 Build/IIXOSOP5801607291S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36', '1', 'MjM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:50:57'),
(49, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:53:47'),
(50, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:53:58'),
(51, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Nzk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:54:16'),
(52, 7, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:54:46'),
(53, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:55:27'),
(54, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 10:56:58'),
(55, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'NzIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 15:34:15'),
(56, 8, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.99 Mobile/15E148 Safari/604.1', '1', 'NzQ4OGdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-17 15:51:51'),
(57, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 18:45:59'),
(58, 8, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTY4OGdpZ2FieXRlbGl0ZS4wMDFAZ21haWwuY29t', 0, '2023-06-17 19:14:58'),
(59, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 20:00:27'),
(60, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:01:19'),
(61, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:02:45'),
(62, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 20:03:05'),
(63, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:07:17'),
(64, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 20:19:31'),
(65, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:21:09'),
(66, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-17 20:22:31'),
(67, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:28:50'),
(68, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:32:09'),
(69, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:33:24'),
(70, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:34:05'),
(71, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:38:06'),
(72, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 20:51:16'),
(73, 7, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-17 21:36:59'),
(74, 9, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzE5OXZpbnVqb3kwMkByZWRpZmZtYWlsLmNvbQ==', 0, '2023-06-18 01:01:33'),
(75, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 05:38:48'),
(76, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 05:39:10'),
(77, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 05:41:06'),
(78, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 05:47:45'),
(79, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 07:00:15'),
(80, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 07:08:33'),
(81, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 07:27:20'),
(82, 4, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '1', 'Mjk0NGpiX21pc3RyeUBob3RtYWlsLmNvbQ==', 1, '2023-06-18 07:44:23'),
(83, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 07:57:15'),
(84, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 07:57:51'),
(85, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 08:02:37'),
(86, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 08:04:34'),
(87, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mzc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 08:05:55'),
(88, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 08:13:04'),
(89, 10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjMxMDEwY2hhcmlzZm9yZXh0cmFkaW5naW5zdGl0dXRlQGdtYWlsLmNvbQ==', 0, '2023-06-18 09:15:03'),
(90, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 09:30:36'),
(91, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 09:31:53'),
(92, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 09:32:35'),
(93, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 09:37:59'),
(94, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 09:47:22'),
(95, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 10:27:22'),
(96, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 10:50:28'),
(97, 10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTYxMDEwY2hhcmlzZm9yZXh0cmFkaW5naW5zdGl0dXRlQGdtYWlsLmNvbQ==', 0, '2023-06-18 11:10:04'),
(98, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 12:06:00'),
(99, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 12:06:00'),
(100, 10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODgxMDEwY2hhcmlzZm9yZXh0cmFkaW5naW5zdGl0dXRlQGdtYWlsLmNvbQ==', 0, '2023-06-18 13:21:06'),
(101, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 14:40:37'),
(102, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 15:31:56'),
(103, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Mzk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 19:02:21'),
(104, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 20:04:34'),
(105, 11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '1', 'NjMxMTExc3lkbmV5bXVsZW5nYTIwMTVAZ21haWwuY29t', 1, '2023-06-18 20:43:53'),
(106, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-18 21:00:50'),
(107, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NjQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-18 21:44:09'),
(108, 12, 'Mozilla/5.0 (Linux; Android 10; Infinix X657) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', '1', 'MjcxMjEyZWR3YXJka2ludHU2M0BnbWFpbC5jb20=', 1, '2023-06-18 23:00:34'),
(109, 13, 'Mozilla/5.0 (Linux; Android 10; Infinix X692) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', '1', 'OTgxMzEzb255ZWthY2hpbWljazIwMjNAZ21haWwuY29t', 1, '2023-06-19 01:08:56'),
(110, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 02:25:43'),
(111, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:25:54'),
(112, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 02:32:42'),
(113, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 02:34:13'),
(114, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 02:34:49'),
(115, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:36:48'),
(116, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NjY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:38:38'),
(117, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:42:47'),
(118, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:44:13'),
(119, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/113.0.5672.121 Mobile/15E148 Safari/604.1', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:45:32'),
(120, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:45:55'),
(121, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:53:40'),
(122, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'MTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:55:33'),
(123, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 02:55:56'),
(124, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:18:33'),
(125, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:18:33'),
(126, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:20:04'),
(127, 7, 'Mozilla/5.0 (Linux; Android 6.0.1; Le X526 Build/IIXOSOP5801607291S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36', '1', 'NzM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:21:40'),
(128, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Mzc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:22:11'),
(129, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:22:21'),
(130, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Mzc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:22:34'),
(131, 7, 'Mozilla/5.0 (Linux; Android 6.0.1; Le X526 Build/IIXOSOP5801607291S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36', '1', 'OTc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:22:51'),
(132, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 03:25:30'),
(133, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 05:34:57'),
(134, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 06:49:23'),
(135, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 06:50:00'),
(136, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Njg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 06:50:39'),
(137, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 06:50:54'),
(138, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 06:51:58'),
(139, 14, 'Mozilla/5.0 (Linux; Android 9; CPH2015) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36', '1', 'OTYxNDE0YWxla2VpamVvbWE1QGdtYWlsLmNvbQ==', 1, '2023-06-19 07:03:09'),
(140, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 08:34:46'),
(141, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 08:47:12'),
(142, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 11:44:52'),
(143, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 11:45:47'),
(144, 7, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 11:46:41'),
(145, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 12:08:52'),
(146, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 12:18:29'),
(147, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 14:56:36'),
(148, 15, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzIxNTE1bWV0Y29uZGVhbHNAZ21haWwuY29t', 1, '2023-06-19 15:12:33'),
(149, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzgxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 15:15:17'),
(150, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjkxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 15:24:10'),
(151, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MzAxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 15:26:16'),
(152, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjkxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 15:41:15'),
(153, 17, 'Mozilla/5.0 (Linux; Android 10; Mi A2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36', '1', 'NDcxNzE3ZWxzYW50aWFnb21iQGdtYWlsLmNvbQ==', 1, '2023-06-19 15:52:06'),
(154, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTYxODE4eWFjb21hc3RlckBnbWFpbC5jb20=', 0, '2023-06-19 16:09:08'),
(155, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NzM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:35:05'),
(156, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'MzI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:40:34'),
(157, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:41:24'),
(158, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'ODY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:41:41'),
(159, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODkxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 16:48:48'),
(160, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'MTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:50:25'),
(161, 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjIxOTE5cG9ydGFmb2xpb2Y4bmV0d29ya0BnbWFpbC5jb20=', 1, '2023-06-19 16:52:15'),
(162, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'OTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 16:55:52'),
(163, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTMxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 16:57:56'),
(164, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTYxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-19 17:24:56'),
(165, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 18:26:44'),
(166, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 18:28:39'),
(167, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 18:32:58'),
(168, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 18:40:40'),
(169, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 18:41:37'),
(170, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 19:33:54'),
(171, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 19:34:07'),
(172, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 20:17:01'),
(173, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 20:51:00'),
(174, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 20:57:06'),
(175, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 21:00:42'),
(176, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 21:18:25'),
(177, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 21:50:59'),
(178, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 22:38:06'),
(179, 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODAxODE4eWFjb21hc3RlckBnbWFpbC5jb20=', 1, '2023-06-19 22:50:40'),
(180, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 23:50:38'),
(181, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-19 23:53:35'),
(182, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-19 23:55:08'),
(183, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-20 01:43:20'),
(184, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MzIxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-20 04:40:38'),
(185, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 05:15:54'),
(186, 16, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTMxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-20 06:49:06'),
(187, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzAxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-20 07:09:51'),
(188, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 07:57:24'),
(189, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Nzc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 07:57:24'),
(190, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'Njk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 10:09:03'),
(191, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 11:20:12'),
(192, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-20 12:06:23'),
(193, 20, 'Mozilla/5.0 (Linux; Android 11; TECNO KF7j) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36', '1', 'NzgyMDIwc2FuY3lib3kwMUBnbWFpbC5jb20=', 0, '2023-06-20 14:02:08'),
(194, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 14:16:04'),
(195, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTQxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-20 16:15:11'),
(196, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 16:16:26'),
(197, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-20 18:30:46'),
(198, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 19:48:59'),
(199, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-20 20:53:18'),
(200, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjAxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-21 01:20:28'),
(201, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 03:13:33'),
(202, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 03:45:05'),
(203, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzMxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-21 05:14:21'),
(204, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 05:19:09'),
(205, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 05:20:36'),
(206, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 05:20:37'),
(207, 21, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTkyMTIxYXl1YmFoYWJpbGEwMDBAZ21haWwuY29t', 1, '2023-06-21 07:58:42'),
(208, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NjAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 08:10:21'),
(209, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 09:25:35'),
(210, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDYxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-21 12:20:20'),
(211, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 12:32:43'),
(212, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 12:35:15'),
(213, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 12:45:23'),
(214, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 12:58:14'),
(215, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 13:17:41'),
(216, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NzgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 13:18:31'),
(217, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 13:18:43'),
(218, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 13:20:11'),
(219, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Mzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 13:28:07'),
(220, 7, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'MjI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 13:33:20'),
(221, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjExNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-21 14:01:17'),
(222, 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1', '1', 'NTIyMjIyU2hhd24xMTQwOUBnbWFpbC5jb20=', 0, '2023-06-21 14:04:08'),
(223, 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'ODYyMjIyU2hhd24xMTQwOUBnbWFpbC5jb20=', 0, '2023-06-21 14:04:27'),
(224, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 15:28:39'),
(225, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 15:28:49'),
(226, 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NzYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 15:37:21'),
(227, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:00:55'),
(228, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 18:08:29'),
(229, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:10:12'),
(230, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:13:16'),
(231, 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'MTQyMjIyU2hhd24xMTQwOUBnbWFpbC5jb20=', 0, '2023-06-21 18:16:11'),
(232, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:25:49'),
(233, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.51', '1', 'ODIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:35:07'),
(234, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:38:19'),
(235, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 18:42:50'),
(236, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 18:43:09'),
(237, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:03:31'),
(238, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:07:01'),
(239, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:09:39'),
(240, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:18:39'),
(241, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mzk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:20:18'),
(242, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:20:30'),
(243, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:21:15'),
(244, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 19:26:29'),
(245, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'OTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-21 19:31:14'),
(246, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTExNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-21 20:45:14'),
(247, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-21 21:57:50'),
(248, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTExNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-22 08:03:14'),
(249, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjYxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-22 09:58:19'),
(250, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-22 11:17:53'),
(251, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(252, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(253, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(254, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11');
INSERT INTO `login_analytics` (`auto_id`, `user_id`, `device`, `device_id`, `token`, `status`, `created_date`) VALUES
(255, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(256, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(257, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(258, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(259, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(260, 7, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'ODM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 11:56:11'),
(261, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NjcxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-22 14:33:07'),
(262, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-22 17:12:46'),
(263, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-22 17:15:12'),
(264, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTAwNzdhbmthbmdob3NoMDEwQGdtYWlsLmNvbQ==', 0, '2023-06-22 17:16:44'),
(265, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MjcxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-22 18:41:46'),
(266, 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'OTgyMjIyU2hhd24xMTQwOUBnbWFpbC5jb20=', 0, '2023-06-23 00:45:27'),
(267, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTExNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 0, '2023-06-23 02:42:01'),
(268, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'MTAwMTYxNmlzbWFpbGthcmFvZ2xhbjk0QGdtYWlsLmNvbQ==', 0, '2023-06-23 05:21:17'),
(269, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzAxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-23 08:31:37'),
(270, 1, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NzUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-23 09:05:50'),
(271, 16, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '1', 'NDQxNjE2aXNtYWlsa2FyYW9nbGFuOTRAZ21haWwuY29t', 1, '2023-06-23 11:48:06'),
(272, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-23 11:48:46'),
(273, 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/114.0.5735.124 Mobile/15E148 Safari/604.1', '1', 'NzQyMjIyU2hhd24xMTQwOUBnbWFpbC5jb20=', 1, '2023-06-23 11:49:36'),
(274, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDgxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-23 14:07:50'),
(275, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-23 19:55:38'),
(276, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-23 20:20:04'),
(277, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-24 12:56:00'),
(278, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-24 17:07:04'),
(279, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-24 17:34:04'),
(280, 9, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTY5OXZpbnVqb3kwMkByZWRpZmZtYWlsLmNvbQ==', 0, '2023-06-24 18:08:45'),
(281, 10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODExMDEwY2hhcmlzZm9yZXh0cmFkaW5naW5zdGl0dXRlQGdtYWlsLmNvbQ==', 0, '2023-06-24 18:10:49'),
(282, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mjc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-24 18:37:11'),
(283, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-24 21:09:21'),
(284, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-24 21:10:50'),
(285, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Njc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-25 18:17:08'),
(286, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-25 18:55:17'),
(287, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-26 11:38:33'),
(288, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-26 17:42:40'),
(289, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-26 18:12:09'),
(290, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTYxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-30 13:21:46'),
(291, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-30 13:24:21'),
(292, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-06-30 18:21:08'),
(293, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-30 20:02:31'),
(294, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTcxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-06-30 22:24:20'),
(295, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjExMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-01 04:23:57'),
(296, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-02 10:34:51'),
(297, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-02 17:45:31'),
(298, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTkxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-02 19:56:42'),
(299, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Njc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-02 20:14:11'),
(300, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjMxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-02 20:34:20'),
(301, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Njc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-03 08:18:11'),
(302, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-03 08:18:24'),
(303, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTIxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-03 08:32:37'),
(304, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mjk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-03 08:47:20'),
(305, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-03 18:23:28'),
(306, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-04 09:46:32'),
(307, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-04 12:53:47'),
(308, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTcxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-04 13:14:25'),
(309, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTcxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-04 13:17:58'),
(310, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-04 14:17:29'),
(311, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTM3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-04 20:03:48'),
(312, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-05 06:39:52'),
(313, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Mjk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-05 06:40:01'),
(314, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-05 06:40:18'),
(315, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzAxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-05 08:40:10'),
(316, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTYxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-05 13:28:34'),
(317, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTIxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-05 18:29:32'),
(318, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-05 19:46:18'),
(319, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-06 09:02:51'),
(320, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-06 13:20:30'),
(321, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-06 16:45:15'),
(322, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NzQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-06 21:52:22'),
(323, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjY3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-07 08:42:08'),
(324, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-07 18:45:33'),
(325, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Njc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-07 18:46:58'),
(326, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Nzk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-07 21:36:28'),
(327, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-08 07:30:04'),
(328, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTkxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-08 08:17:36'),
(329, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MzU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-08 17:22:08'),
(330, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-08 20:30:26'),
(331, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjE3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-09 08:07:19'),
(332, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-10 08:12:01'),
(333, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODMxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-10 08:38:49'),
(334, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTA3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-10 09:21:18'),
(335, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTAwNzdhbmthbmdob3NoMDEwQGdtYWlsLmNvbQ==', 0, '2023-07-10 18:41:10'),
(336, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-10 18:44:06'),
(337, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NjUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-10 18:44:41'),
(338, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjU3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-10 19:44:18'),
(339, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NTQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-10 19:58:36'),
(340, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTg3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-10 20:15:15'),
(341, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MTQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-10 23:21:09'),
(342, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'ODQ3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-11 13:05:43'),
(343, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTUxMWFkbWluQGFkbWluLmNvbQ==', 0, '2023-07-11 13:38:46'),
(344, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'MjI3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 0, '2023-07-11 14:19:20'),
(345, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'OTcxMWFkbWluQGFkbWluLmNvbQ==', 1, '2023-07-11 14:37:21'),
(346, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'Njk3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-11 15:07:56'),
(347, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', '1', 'NDc3N2Fua2FuZ2hvc2gwMTBAZ21haWwuY29t', 1, '2023-07-11 18:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `mt_manager`
--

CREATE TABLE `mt_manager` (
  `id` int(11) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mt_manager`
--

INSERT INTO `mt_manager` (`id`, `userID`, `pass`, `ip`, `port`) VALUES
(1, '30001', 'Nedr6b3ld', '8.208.91.123', '443');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_history`
--

CREATE TABLE `payout_history` (
  `payout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mt5_accountNum` int(15) NOT NULL,
  `payout_date` datetime NOT NULL,
  `amount` decimal(18,6) NOT NULL,
  `payout_type` varchar(30) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `wallet_address` varchar(100) NOT NULL,
  `receipant_name` varchar(30) NOT NULL,
  `receipant_address` varchar(100) NOT NULL,
  `account_iban` varchar(100) NOT NULL,
  `sort_code` varchar(100) NOT NULL,
  `swift_code` varchar(100) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `payout_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payout_history`
--

INSERT INTO `payout_history` (`payout_id`, `user_id`, `mt5_accountNum`, `payout_date`, `amount`, `payout_type`, `payment_mode`, `wallet_address`, `receipant_name`, `receipant_address`, `account_iban`, `sort_code`, `swift_code`, `bank_name`, `branch_address`, `payout_status`) VALUES
(1, 7, 850822, '2023-06-24 17:06:43', '-34.000000', 'Profit Split', 'Paypal', 'jb', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `account_size` int(11) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `max_drawdown` int(11) NOT NULL,
  `daily_drawdown` int(11) NOT NULL,
  `p1_target` int(11) NOT NULL,
  `p2_target` int(11) NOT NULL,
  `profit_target` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `commission_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `account_size`, `product_category`, `product_price`, `max_drawdown`, `daily_drawdown`, `p1_target`, `p2_target`, `profit_target`, `created_at`, `created_by`, `status`, `commission_amount`) VALUES
(2, 'Evaluation', 10000, 'Aggressive', 79, 1000, 1500, 1500, 1000, 0, '2023-06-16 13:06:11', 'admin', 1, 0),
(3, 'Evaluation ', 10000, 'Normal', 79, 1000, 500, 800, 500, 0, '2023-06-16 13:06:02', 'admin', 1, 0),
(4, 'Evaluation ', 25000, 'Normal', 179, 2500, 1250, 2000, 1250, 0, '2023-06-16 13:06:11', 'admin', 1, 0),
(5, 'Evaluation ', 50000, 'Normal', 329, 5000, 2500, 4000, 2500, 0, '2023-06-16 13:06:35', 'admin', 1, 0),
(6, 'Evaluation ', 100000, 'Normal', 599, 10000, 5000, 8000, 5000, 0, '2023-06-16 13:06:26', 'admin', 1, 0),
(7, 'Evaluation', 200000, 'Normal', 999, 20000, 10000, 16000, 10000, 0, '2023-06-16 13:06:10', 'admin', 1, 0),
(8, ' Evaluation', 25000, 'Aggressive', 179, 2500, 0, 3750, 2500, 0, '2023-06-16 14:06:33', 'admin', 1, 0),
(9, 'Evaluation ', 50000, 'Aggressive', 329, 5000, 0, 7500, 5000, 0, '2023-06-16 14:06:31', 'admin', 1, 0),
(10, 'Evaluation', 100000, 'Aggressive', 599, 10000, 0, 15000, 10000, 0, '2023-06-16 14:06:19', 'admin', 1, 0),
(11, 'Evaluation', 200000, 'Aggressive', 999, 20000, 0, 30000, 20000, 0, '2023-06-16 14:06:02', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `content` varchar(600) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `heading`, `content`, `created_at`, `created_by`) VALUES
(6, 'Launch offer -  20% Discount ', '', 'Coupon Code - LAUNCH20 ', '2023-06-16 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `sIp` varchar(30) NOT NULL,
  `sPort` varchar(30) NOT NULL,
  `serverName` varchar(30) NOT NULL,
  `p_type` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `sIp`, `sPort`, `serverName`, `p_type`) VALUES
(1, '8.208.91.123', '443', 'DK International - DEMO', 0),
(2, '8.208.91.123', '443', 'DK International - DEMO', 1),
(4, '8.208.91.123', '443', 'DK International - Demo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category` varchar(40) NOT NULL,
  `gateway` varchar(20) NOT NULL,
  `wallet_balance` int(11) NOT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 -> credit\r\n1 -> debit',
  `ref_id` int(11) NOT NULL COMMENT 'it will contain the primary key for the reference of purchase type\r\n',
  `payment_code` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `txn_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 -> productPurchase\r\n2 -> profit payout\r\n3 -> affiliate\r\n4-> games & rewards',
  `comments` varchar(255) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `dump` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `product_id`, `product_category`, `gateway`, `wallet_balance`, `flag`, `ref_id`, `payment_code`, `payment_status`, `txn_type`, `comments`, `purchase_date`, `updated_at`, `dump`) VALUES
(1, 7, '999.00', 7, 'Normal', 'square', 0, 1, 0, '', 1, 1, '', '2023-07-04 20:07:31', '2023-07-04 20:07:31', 0x7b227061796d656e74223a7b226964223a227059595a46503250685a6b4c6b4e61466e63705536515a674764515a59222c22637265617465645f6174223a22323032332d30372d30345431383a34303a32352e3435325a222c22757064617465645f6174223a22323032332d30372d30345431383a34303a32352e3636325a222c22616d6f756e745f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22746f74616c5f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22617070726f7665645f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22737461747573223a22434f4d504c45544544222c2264656c61795f6475726174696f6e223a22505431363848222c2264656c61795f616374696f6e223a2243414e43454c222c2264656c617965645f756e74696c223a22323032332d30372d31315431383a34303a32352e3435325a222c22736f757263655f74797065223a2243415244222c22636172645f64657461696c73223a7b22737461747573223a224341505455524544222c2263617264223a7b22636172645f6272616e64223a2256495341222c226c6173745f34223a2231313131222c226578705f6d6f6e7468223a31312c226578705f79656172223a323034302c2266696e6765727072696e74223a2273712d312d532d562d71612d724478745a62646972734473597230746249386f554f732d7934314f783177494a59666d56486e6d694d78524245503341644e4749535359515977222c22636172645f74797065223a22435245444954222c22707265706169645f74797065223a224e4f545f50524550414944222c2262696e223a22343131313131227d2c22656e7472795f6d6574686f64223a224b45594544222c226376765f737461747573223a224356565f4143434550544544222c226176735f737461747573223a224156535f4143434550544544222c2273746174656d656e745f6465736372697074696f6e223a225351202a44454641554c542054455354204143434f554e54222c22636172645f7061796d656e745f74696d656c696e65223a7b22617574686f72697a65645f6174223a22323032332d30372d30345431383a34303a32352e3536335a222c2263617074757265645f6174223a22323032332d30372d30345431383a34303a32352e3636325a227d7d2c226c6f636174696f6e5f6964223a224c484150475745485a37485943222c226f726465725f6964223a2279474b32625353494933367a74794a5737623545466964353167585a59222c22726563656970745f6e756d626572223a227059595a222c22726563656970745f75726c223a2268747470733a5c2f5c2f737175617265757073616e64626f782e636f6d5c2f726563656970745c2f707265766965775c2f7059595a46503250685a6b4c6b4e61466e63705536515a674764515a59222c226170706c69636174696f6e5f64657461696c73223a7b227371756172655f70726f64756374223a2245434f4d4d455243455f415049222c226170706c69636174696f6e5f6964223a2273616e64626f782d7371306964622d624b555f7473435554494e5232745330775547566e41227d2c2276657273696f6e5f746f6b656e223a226536446e6d437a466f384c43794873596f507755414c6b47347754644f735538587075584a437648545152366f227d7d),
(2, 7, '999.00', 7, 'Normal', 'square', 0, 1, 0, '', 1, 1, '', '2023-07-04 21:07:35', '2023-07-04 21:07:35', 0x7b227061796d656e74223a7b226964223a2252536237344d36724f5a6134504a38466b47544e324372636931635a59222c22637265617465645f6174223a22323032332d30372d30345431393a32353a32392e3837385a222c22757064617465645f6174223a22323032332d30372d30345431393a32353a33302e3037365a222c22616d6f756e745f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22746f74616c5f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22617070726f7665645f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22737461747573223a22434f4d504c45544544222c2264656c61795f6475726174696f6e223a22505431363848222c2264656c61795f616374696f6e223a2243414e43454c222c2264656c617965645f756e74696c223a22323032332d30372d31315431393a32353a32392e3837385a222c22736f757263655f74797065223a2243415244222c22636172645f64657461696c73223a7b22737461747573223a224341505455524544222c2263617264223a7b22636172645f6272616e64223a2256495341222c226c6173745f34223a2231313131222c226578705f6d6f6e7468223a342c226578705f79656172223a323034312c2266696e6765727072696e74223a2273712d312d532d562d71612d724478745a62646972734473597230746249386f554f732d7934314f783177494a59666d56486e6d694d78524245503341644e4749535359515977222c22636172645f74797065223a22435245444954222c22707265706169645f74797065223a224e4f545f50524550414944222c2262696e223a22343131313131227d2c22656e7472795f6d6574686f64223a224b45594544222c226376765f737461747573223a224356565f4143434550544544222c226176735f737461747573223a224156535f4143434550544544222c2273746174656d656e745f6465736372697074696f6e223a225351202a44454641554c542054455354204143434f554e54222c22636172645f7061796d656e745f74696d656c696e65223a7b22617574686f72697a65645f6174223a22323032332d30372d30345431393a32353a32392e3938385a222c2263617074757265645f6174223a22323032332d30372d30345431393a32353a33302e3037375a227d7d2c226c6f636174696f6e5f6964223a224c484150475745485a37485943222c226f726465725f6964223a224363544a34517a38726b69504c3841374647774c6b79354c4751475a59222c22726563656970745f6e756d626572223a2252536237222c22726563656970745f75726c223a2268747470733a5c2f5c2f737175617265757073616e64626f782e636f6d5c2f726563656970745c2f707265766965775c2f52536237344d36724f5a6134504a38466b47544e324372636931635a59222c226170706c69636174696f6e5f64657461696c73223a7b227371756172655f70726f64756374223a2245434f4d4d455243455f415049222c226170706c69636174696f6e5f6964223a2273616e64626f782d7371306964622d624b555f7473435554494e5232745330775547566e41227d2c2276657273696f6e5f746f6b656e223a224e614f725532365272465a4b36455776784f6f4d364e4c334c4b486234687a704247504366615957525342366f227d7d),
(3, 7, '999.00', 7, 'Normal', 'square', 0, 1, 0, '', 1, 1, '', '2023-07-04 22:07:57', '2023-07-04 22:07:57', 0x7b227061796d656e74223a7b226964223a226c6f585363785a727876746e786a6862545978424e526b497844675a59222c22637265617465645f6174223a22323032332d30372d30345432303a32303a35322e3330335a222c22757064617465645f6174223a22323032332d30372d30345432303a32303a35322e3437385a222c22616d6f756e745f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22746f74616c5f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22617070726f7665645f6d6f6e6579223a7b22616d6f756e74223a39393930302c2263757272656e6379223a22555344227d2c22737461747573223a22434f4d504c45544544222c2264656c61795f6475726174696f6e223a22505431363848222c2264656c61795f616374696f6e223a2243414e43454c222c2264656c617965645f756e74696c223a22323032332d30372d31315432303a32303a35322e3330335a222c22736f757263655f74797065223a2243415244222c22636172645f64657461696c73223a7b22737461747573223a224341505455524544222c2263617264223a7b22636172645f6272616e64223a2256495341222c226c6173745f34223a2231313131222c226578705f6d6f6e7468223a31312c226578705f79656172223a323034312c2266696e6765727072696e74223a2273712d312d532d562d71612d724478745a62646972734473597230746249386f554f732d7934314f783177494a59666d56486e6d694d78524245503341644e4749535359515977222c22636172645f74797065223a22435245444954222c22707265706169645f74797065223a224e4f545f50524550414944222c2262696e223a22343131313131227d2c22656e7472795f6d6574686f64223a224b45594544222c226376765f737461747573223a224356565f4143434550544544222c226176735f737461747573223a224156535f4143434550544544222c2273746174656d656e745f6465736372697074696f6e223a225351202a44454641554c542054455354204143434f554e54222c22636172645f7061796d656e745f74696d656c696e65223a7b22617574686f72697a65645f6174223a22323032332d30372d30345432303a32303a35322e3431325a222c2263617074757265645f6174223a22323032332d30372d30345432303a32303a35322e3437385a227d7d2c226c6f636174696f6e5f6964223a224c484150475745485a37485943222c226f726465725f6964223a224d5a6e7252586f76455250367955456574797a654c7231453265665a59222c22726563656970745f6e756d626572223a226c6f5853222c22726563656970745f75726c223a2268747470733a5c2f5c2f737175617265757073616e64626f782e636f6d5c2f726563656970745c2f707265766965775c2f6c6f585363785a727876746e786a6862545978424e526b497844675a59222c226170706c69636174696f6e5f64657461696c73223a7b227371756172655f70726f64756374223a2245434f4d4d455243455f415049222c226170706c69636174696f6e5f6964223a2273616e64626f782d7371306964622d624b555f7473435554494e5232745330775547566e41227d2c2276657273696f6e5f746f6b656e223a22666d4f39567a774f5664524c634b4247507a5077694a31654b6c4f484d4c55323149667261504858355557366f227d7d),
(4, 7, '79.00', 2, 'Aggressive', 'square', 0, 1, 0, '', 1, 1, '', '2023-07-06 09:07:51', '2023-07-06 09:07:51', 0x7b227061796d656e74223a7b226964223a223953416452367179793646694a7476446d486b5a3675386e6a4f495a59222c22637265617465645f6174223a22323032332d30372d30365430373a33333a34362e3536305a222c22757064617465645f6174223a22323032332d30372d30365430373a33333a34362e3733305a222c22616d6f756e745f6d6f6e6579223a7b22616d6f756e74223a373930302c2263757272656e6379223a22555344227d2c22746f74616c5f6d6f6e6579223a7b22616d6f756e74223a373930302c2263757272656e6379223a22555344227d2c22617070726f7665645f6d6f6e6579223a7b22616d6f756e74223a373930302c2263757272656e6379223a22555344227d2c22737461747573223a22434f4d504c45544544222c2264656c61795f6475726174696f6e223a22505431363848222c2264656c61795f616374696f6e223a2243414e43454c222c2264656c617965645f756e74696c223a22323032332d30372d31335430373a33333a34362e3536305a222c22736f757263655f74797065223a2243415244222c22636172645f64657461696c73223a7b22737461747573223a224341505455524544222c2263617264223a7b22636172645f6272616e64223a2256495341222c226c6173745f34223a2231313131222c226578705f6d6f6e7468223a342c226578705f79656172223a323034302c2266696e6765727072696e74223a2273712d312d532d562d71612d724478745a62646972734473597230746249386f554f732d7934314f783177494a59666d56486e6d694d78524245503341644e4749535359515977222c22636172645f74797065223a22435245444954222c22707265706169645f74797065223a224e4f545f50524550414944222c2262696e223a22343131313131227d2c22656e7472795f6d6574686f64223a224b45594544222c226376765f737461747573223a224356565f4143434550544544222c226176735f737461747573223a224156535f4143434550544544222c2273746174656d656e745f6465736372697074696f6e223a225351202a44454641554c542054455354204143434f554e54222c22636172645f7061796d656e745f74696d656c696e65223a7b22617574686f72697a65645f6174223a22323032332d30372d30365430373a33333a34362e3636395a222c2263617074757265645f6174223a22323032332d30372d30365430373a33333a34362e3733305a227d7d2c226c6f636174696f6e5f6964223a224c484150475745485a37485943222c226f726465725f6964223a22306655396a6f663248714a7154646a67665771484a696b4c726f575a59222c22726563656970745f6e756d626572223a2239534164222c22726563656970745f75726c223a2268747470733a5c2f5c2f737175617265757073616e64626f782e636f6d5c2f726563656970745c2f707265766965775c2f3953416452367179793646694a7476446d486b5a3675386e6a4f495a59222c226170706c69636174696f6e5f64657461696c73223a7b227371756172655f70726f64756374223a2245434f4d4d455243455f415049222c226170706c69636174696f6e5f6964223a2273616e64626f782d7371306964622d624b555f7473435554494e5232745330775547566e41227d2c2276657273696f6e5f746f6b656e223a22626f4c6a704c686752726c754e4e3450696c5954773258354d314b45786b42743375414531775975397376366f227d7d),
(5, 7, '79.00', 2, 'Aggressive', 'coinbase', 0, 1, 0, 'VFJR555X', 1, 1, '', '2023-07-11 15:07:23', '2023-07-11 15:07:23', 0x7b2264617461223a7b22616464726573736573223a7b22657468657265756d223a22307861623364326366323963376634306533623161353233386133366339313231363838646537353064222c2275736463223a22307861623364326366323963376634306533623161353233386133366339313231363838646537353064222c22746574686572223a22307861623364326366323963376634306533623161353233386133366339313231363838646537353064222c226c697465636f696e223a224d5175726e427252326433537a6d71467a645976424b44657445625a6e3641456b58222c22626974636f696e223a22334654753178506535476a514d554b666658703972614b526650456b70707158354d227d2c226272616e645f636f6c6f72223a2223313232333332222c226272616e645f6c6f676f5f75726c223a2268747470733a5c2f5c2f7265732e636c6f7564696e6172792e636f6d5c2f636f6d6d657263655c2f696d6167655c2f75706c6f61645c2f76313638323034323832315c2f7a727971727466686b35697672726462713168772e6a7067222c2263616e63656c5f75726c223a22687474703a5c2f5c2f6c6f63616c686f73745c2f657175696e6f785c2f757365725c2f7061796d656e745c2f636f696e626173654661696c757265222c22636f6465223a2246424d4745365156222c22636f696e626173655f6d616e616765645f6d65726368616e74223a66616c73652c22637265617465645f6174223a22323032332d30372d31315431333a30383a32335a222c226465736372697074696f6e223a224576616c756174696f6e2050726f64756374222c2265786368616e67655f7261746573223a7b224554482d555344223a22313836392e363635222c224254432d555344223a2233303432382e3039222c224c54432d555344223a2239372e363335222c22555344432d555344223a22312e30222c22555344542d555344223a22302e393939393735227d2c22657870697265735f6174223a22323032332d30372d31315431343a30383a32335a222c226665655f72617465223a302e30312c22666565735f736574746c6564223a747275652c22686f737465645f75726c223a2268747470733a5c2f5c2f636f6d6d657263652e636f696e626173652e636f6d5c2f636861726765735c2f46424d4745365156222c226964223a2264386664393235652d333566312d346632382d613036352d633137613861613863656538222c226c6f63616c5f65786368616e67655f7261746573223a7b224554482d555344223a22313836392e363635222c224254432d555344223a2233303432382e3039222c224c54432d555344223a2239372e363335222c22555344432d555344223a22312e30222c22555344542d555344223a22302e393939393735227d2c226c6f676f5f75726c223a2268747470733a5c2f5c2f7265732e636c6f7564696e6172792e636f6d5c2f636f6d6d657263655c2f696d6167655c2f75706c6f61645c2f76313638323034323832315c2f7a727971727466686b35697672726462713168772e6a7067222c226d65746164617461223a7b22637573746f6d65725f6964223a22637573746f6d657231222c22637573746f6d65725f6e616d65223a22506572736f6e31227d2c226e616d65223a225061796d656e7420666f72222c226f6666636861696e5f656c696769626c65223a66616c73652c226f7267616e697a6174696f6e5f6e616d65223a22457175696e6f782054726164696e67204361706974616c20222c227061796d656e745f7468726573686f6c64223a7b226f7665727061796d656e745f72656c61746976655f7468726573686f6c64223a22302e3235222c22756e6465727061796d656e745f72656c61746976655f7468726573686f6c64223a22302e3235227d2c227061796d656e7473223a5b5d2c2270726963696e67223a7b226c6f63616c223a7b22616d6f756e74223a2237392e3030222c2263757272656e6379223a22555344227d2c22657468657265756d223a7b22616d6f756e74223a22302e303432323534303030222c2263757272656e6379223a22455448227d2c2275736463223a7b22616d6f756e74223a2237392e303030303030222c2263757272656e6379223a2255534443227d2c22746574686572223a7b22616d6f756e74223a2237392e303031393735222c2263757272656e6379223a2255534454227d2c226c697465636f696e223a7b22616d6f756e74223a22302e3830393133363037222c2263757272656e6379223a224c5443227d2c22626974636f696e223a7b22616d6f756e74223a22302e3030323539363239222c2263757272656e6379223a22425443227d7d2c2270726963696e675f74797065223a2266697865645f7072696365222c22707763625f6f6e6c79223a66616c73652c2272656469726563745f75726c223a22687474703a5c2f5c2f6c6f63616c686f73745c2f657175696e6f785c2f757365725c2f7061796d656e745c2f636f696e6261736553756363657373222c227265736f75726365223a22636861726765222c22737570706f72745f656d61696c223a22537570706f727440657175696e6f7874726164696e676361706974616c2e636f6d222c2274696d656c696e65223a5b7b22737461747573223a224e4557222c2274696d65223a22323032332d30372d31315431333a30383a32345a227d5d2c227574786f223a66616c73657d7d),
(6, 1, '3.95', 2, '', '', 0, 0, 5, '', 0, 3, 'referral amount', '2023-07-11 15:07:10', '2023-07-11 15:07:10', ''),
(7, 1, '3.95', 2, '', '', 0, 0, 5, '', 0, 3, 'referral amount', '2023-07-11 15:07:03', '2023-07-11 15:07:03', ''),
(8, 1, '3.95', 2, '', '', 0, 0, 5, '', 0, 3, 'referral amount', '2023-07-11 15:07:29', '2023-07-11 15:07:29', ''),
(9, 1, '3.95', 2, '', '', 0, 0, 5, '', 0, 3, 'referral amount', '2023-07-11 15:07:35', '2023-07-11 15:07:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `number` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_img` varchar(400) NOT NULL,
  `kyc_status` tinyint(1) NOT NULL,
  `kyc_doc` varchar(400) NOT NULL,
  `kyc_adhar` varchar(300) NOT NULL,
  `verification_key` varchar(200) NOT NULL,
  `email_verified` tinyint(2) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `admin_type` varchar(50) NOT NULL DEFAULT 'Client',
  `profile_status` tinyint(1) NOT NULL DEFAULT 1,
  `client_id` varchar(50) NOT NULL,
  `affiliate_code` varchar(255) NOT NULL,
  `password_reset_code` varchar(40) NOT NULL,
  `reffered_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `country`, `state`, `city`, `number`, `password`, `profile_img`, `kyc_status`, `kyc_doc`, `kyc_adhar`, `verification_key`, `email_verified`, `created_date`, `updated_at`, `admin_type`, `profile_status`, `client_id`, `affiliate_code`, `password_reset_code`, `reffered_by`) VALUES
(1, 'Equinox', 'Admin', 'admin@admin.com', 'USA', 'USA', 'USA', '987654321', 'Ke2HWMXRL6YNl1d5IcTeiw==', '', 0, '', '', '', 1, '2023-06-16 11:41:57', '2023-06-16 11:41:57', 'Admin', 1, '', '', '', ''),
(7, 'Ankan', 'Ghosh', 'ankanghosh010@gmail.com', 'London', '', '', '+91 8887777', 'Ke2HWMXRL6YNl1d5IcTeiw==', '', 1, 'kyc/0207202320352528062023041254IMG_1406.HEIC', 'kyc/0207202320352528062023041254IMG_1406.HEIC', '', 1, '2023-06-17 10:06:02', '0000-00-00 00:00:00', 'Client', 1, '', '793rsEuMd5kM584', 'b71155d90aef3bc38cb92db5a9afe4ce', '');

-- --------------------------------------------------------

--
-- Table structure for table `userproducts`
--

CREATE TABLE `userproducts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `final_product_price` int(11) NOT NULL,
  `phase` tinyint(2) NOT NULL DEFAULT 0,
  `account_id` varchar(20) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `port` varchar(20) NOT NULL,
  `equity` decimal(18,6) NOT NULL,
  `service_equity` decimal(16,8) NOT NULL,
  `server` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 0,
  `maxdd_status` tinyint(1) NOT NULL DEFAULT 1,
  `maxDl_status` tinyint(1) NOT NULL DEFAULT 1,
  `target_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL,
  `payment_code` varchar(50) NOT NULL,
  `metrics_status` int(11) NOT NULL,
  `balance` decimal(18,6) NOT NULL,
  `created_date` datetime NOT NULL,
  `payoutDate` datetime NOT NULL,
  `admin_account_status` tinyint(1) NOT NULL DEFAULT 0,
  `phase3_issue_date` datetime NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userproducts`
--

INSERT INTO `userproducts` (`id`, `user_id`, `product_id`, `product_price`, `product_discount`, `final_product_price`, `phase`, `account_id`, `account_password`, `ip`, `port`, `equity`, `service_equity`, `server`, `start_date`, `end_date`, `product_status`, `maxdd_status`, `maxDl_status`, `target_status`, `payment_status`, `payment_code`, `metrics_status`, `balance`, `created_date`, `payoutDate`, `admin_account_status`, `phase3_issue_date`, `account_status`) VALUES
(5, 7, 3, 79, 0, 79, 1, '850983', 'Balchoda200K', '8.208.91.123', '443', '10000.000000', '0.00000000', 'DK International - DEMO', '2023-07-09 09:40:08', '2023-08-08 09:08:08', 1, 1, 1, 0, 1, '', 0, '3351.440000', '2023-07-06 09:07:51', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(9, 7, 2, 79, 0, 79, 2, '850952', 'Ankan100K', '8.208.91.123', '443', '10000.000000', '49874.50000000', 'DK International - DEMO', '2023-07-09 09:40:08', '2023-08-08 09:08:08', 2, 1, 1, 2, 1, '', 1, '40000.000000', '2023-06-08 02:07:41', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(11, 7, 2, 79, 0, 79, 3, '850960', 'Ankan100K', '8.208.91.123', '443', '10000.000000', '10000.00000000', 'DK International - DEMO', '2023-07-09 09:40:08', '2023-08-08 09:08:08', 1, 1, 1, 0, 1, '', 1, '0.000000', '2023-07-08 11:07:41', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 7, 2, 79, 0, 79, 1, '850996', 'Ankan10K', '8.208.91.123', '443', '10.000000', '0.00000000', 'DK International - DEMO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 1, 0, 1, 'VFJR555X', 0, '0.000000', '2023-07-11 15:07:23', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate_slab`
--
ALTER TABLE `affiliate_slab`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equitycronjob`
--
ALTER TABLE `equitycronjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_code`
--
ALTER TABLE `group_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_analytics`
--
ALTER TABLE `login_analytics`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `mt_manager`
--
ALTER TABLE `mt_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_history`
--
ALTER TABLE `payout_history`
  ADD PRIMARY KEY (`payout_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userproducts`
--
ALTER TABLE `userproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliate_slab`
--
ALTER TABLE `affiliate_slab`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equitycronjob`
--
ALTER TABLE `equitycronjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_code`
--
ALTER TABLE `group_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_analytics`
--
ALTER TABLE `login_analytics`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `mt_manager`
--
ALTER TABLE `mt_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payout_history`
--
ALTER TABLE `payout_history`
  MODIFY `payout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userproducts`
--
ALTER TABLE `userproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
