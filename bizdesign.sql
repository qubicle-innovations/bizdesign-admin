-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 05:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizdesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle_1` varchar(191) NOT NULL,
  `mtitle_1` varchar(191) NOT NULL,
  `description_1` text NOT NULL,
  `image_1` varchar(191) NOT NULL,
  `stitle_2` varchar(191) NOT NULL,
  `mtitle_2` varchar(191) NOT NULL,
  `description_2` text NOT NULL,
  `image_2` varchar(191) NOT NULL,
  `stitle_3` varchar(191) NOT NULL,
  `mtitle_3` varchar(191) NOT NULL,
  `description_3` text NOT NULL,
  `image_3` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `stitle_1`, `mtitle_1`, `description_1`, `image_1`, `stitle_2`, `mtitle_2`, `description_2`, `image_2`, `stitle_3`, `mtitle_3`, `description_3`, `image_3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OUR EXPERIENCE', 'Experts With Experiecne', 'In the fast-paced world of entrepreneurship, time is a priceless commodity, and every moment counts towards your success. At Biz Design, we understand the demands of running a thriving enterprise. That\'s why we\'ve crafted a bespoke suite of corporate solutions meticulously tailored to alleviate the burdens of administrative intricacies.', '1717433646.png', 'WHO WE ARE', 'BIZ DESIGN lifts you to the first level of your dream business.', 'BIZ DESIGN was established with a motive of ideal business design development for the young, aspiring, and enthusiast business people. We are your business advisors who support you in the crucial procedures of management services to the private, public and every industrial sectors in and around UAE. Over the years of operation, we have always strived to guide our clients with the best. Hence then we have laid a strong base for our company with professional network of passionate people, dedicated and unique in their expertise. We are committed to provide the best suited solutions when establishing or expanding the company in UAE. At BIZ DESIGN we are always excited to deliver quality services that is easy and help you build a better business. Our capabilities and commitments has lead us to be a chosen partner in an innovative and inventive breakthrough initiatives of different businessman around the world. Our design pattern motivates us to undergo more challenging operations and tackle them in ease, guaranteeing a stable and efficient process for mainland, free zones as well as the offshore services.', '1717429487.png', 'WHO WE ARE', 'WHY BIZ DESIGN?', 'Biz Design aims to act as a channel that bridge the gap between you and your business. We not only promise to render management services and advisory services, instead we promise to be with you and cover every aspect of a business including technical, administrative, financial and operations, which are vital for running a successful establishment. Customers are the boss for us, creating a raving fan with satisfactory customer service is the predominant quality we get trained with. Our network of relationships is the heart of our company and we stress to nurture the network by understanding the requirements, recognizing the scope and delivering right tool with prospective growth.', '1717429487.jpg', '2024-06-03 10:14:47', '2024-06-03 11:24:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '171740953069.jpg', '2024-06-03 04:42:10', '2024-06-03 04:42:10', NULL),
(3, '171740997413.jpg', '2024-06-03 04:49:34', '2024-06-03 04:49:34', NULL),
(4, '171740997440.png', '2024-06-03 04:49:34', '2024-06-03 04:49:42', '2024-06-03 04:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `business__categories`
--

CREATE TABLE `business__categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `stitle_sub1` varchar(191) DEFAULT NULL,
  `mtitle_sub1` varchar(191) DEFAULT NULL,
  `title_sub2` varchar(191) DEFAULT NULL,
  `description_sub2` text DEFAULT NULL,
  `description2_sub2` text DEFAULT NULL,
  `image_sub2` varchar(191) DEFAULT NULL,
  `points_sub2` text DEFAULT NULL,
  `title_sub3` varchar(191) DEFAULT NULL,
  `description_sub3` text DEFAULT NULL,
  `image_sub3` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business__categories`
--

INSERT INTO `business__categories` (`id`, `title`, `image`, `stitle_sub1`, `mtitle_sub1`, `title_sub2`, `description_sub2`, `description2_sub2`, `image_sub2`, `points_sub2`, `title_sub3`, `description_sub3`, `image_sub3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mainland', '1717666989.png', 'MAINLAND BUSINESS SETUP', '04 Easy Steps for business setup in Dubai', 'Company Formation In Mainland Is More Easy With Us', 'They are highly trained for quickly response and provide great service to our customers. Experts are give profitability and success of our business growth & marketing. Network solutions’ to Windows and open source operating systems, as those software platforms gained networking capabilities.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '17176658701.png', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\"]', 'Analyzing services', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard\r\n\r\ndummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,\r\n\r\ndummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', '1717670178.png', '2024-06-06 02:20:24', '2024-06-06 06:33:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business__firstsections`
--

CREATE TABLE `business__firstsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business__firstsections`
--

INSERT INTO `business__firstsections` (`id`, `business_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176602240.png', '2024-06-06 02:20:24', '2024-06-06 03:54:30', '2024-06-06 03:54:30'),
(2, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176602241.png', '2024-06-06 02:20:24', '2024-06-06 03:54:30', '2024-06-06 03:54:30'),
(3, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176602242.png', '2024-06-06 02:20:24', '2024-06-06 03:54:30', '2024-06-06 03:54:30'),
(4, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176602243.png', '2024-06-06 02:20:24', '2024-06-06 03:54:30', '2024-06-06 03:54:30'),
(5, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176661630.png', '2024-06-06 03:59:23', '2024-06-06 04:13:09', '2024-06-06 04:13:09'),
(6, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176661631.png', '2024-06-06 03:59:23', '2024-06-06 04:13:09', '2024-06-06 04:13:09'),
(7, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176661632.png', '2024-06-06 03:59:23', '2024-06-06 04:13:09', '2024-06-06 04:13:09'),
(8, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176661633.png', '2024-06-06 03:59:23', '2024-06-06 04:13:09', '2024-06-06 04:13:09'),
(9, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 04:17:13', '2024-06-06 04:20:26', '2024-06-06 04:20:26'),
(10, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 04:17:13', '2024-06-06 04:20:26', '2024-06-06 04:20:26'),
(11, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 04:17:13', '2024-06-06 04:20:26', '2024-06-06 04:20:26'),
(12, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 04:17:13', '2024-06-06 04:20:26', '2024-06-06 04:20:26'),
(13, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 04:20:26', '2024-06-06 05:06:26', '2024-06-06 05:06:26'),
(14, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 04:20:26', '2024-06-06 05:06:26', '2024-06-06 05:06:26'),
(15, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 04:20:26', '2024-06-06 05:06:26', '2024-06-06 05:06:26'),
(16, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 04:20:26', '2024-06-06 05:06:26', '2024-06-06 05:06:26'),
(17, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 05:06:26', '2024-06-06 05:21:41', '2024-06-06 05:21:41'),
(18, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 05:06:26', '2024-06-06 05:21:41', '2024-06-06 05:21:41'),
(19, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 05:06:26', '2024-06-06 05:21:41', '2024-06-06 05:21:41'),
(20, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 05:06:26', '2024-06-06 05:21:41', '2024-06-06 05:21:41'),
(21, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 05:21:41', '2024-06-06 05:22:11', '2024-06-06 05:22:11'),
(22, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 05:21:41', '2024-06-06 05:22:11', '2024-06-06 05:22:11'),
(23, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 05:21:41', '2024-06-06 05:22:11', '2024-06-06 05:22:11'),
(24, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 05:21:41', '2024-06-06 05:22:11', '2024-06-06 05:22:11'),
(25, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 05:22:11', '2024-06-06 06:12:44', '2024-06-06 06:12:44'),
(26, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 05:22:11', '2024-06-06 06:12:44', '2024-06-06 06:12:44'),
(27, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 05:22:11', '2024-06-06 06:12:44', '2024-06-06 06:12:44'),
(28, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 05:22:11', '2024-06-06 06:12:44', '2024-06-06 06:12:44'),
(29, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 06:12:44', '2024-06-06 06:15:00', '2024-06-06 06:15:00'),
(30, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 06:12:44', '2024-06-06 06:15:00', '2024-06-06 06:15:00'),
(31, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 06:12:44', '2024-06-06 06:15:00', '2024-06-06 06:15:00'),
(32, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 06:12:44', '2024-06-06 06:15:00', '2024-06-06 06:15:00'),
(33, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 06:15:00', '2024-06-06 06:15:23', '2024-06-06 06:15:23'),
(34, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 06:15:00', '2024-06-06 06:15:23', '2024-06-06 06:15:23'),
(35, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 06:15:00', '2024-06-06 06:15:23', '2024-06-06 06:15:23'),
(36, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 06:15:00', '2024-06-06 06:15:23', '2024-06-06 06:15:23'),
(37, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17176672330.png', '2024-06-06 06:15:23', '2024-06-06 06:15:23', NULL),
(38, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17176672331.png', '2024-06-06 06:15:23', '2024-06-06 06:15:23', NULL),
(39, 1, 'PRO And Visa Services', 'Our visa services are designed to simplify the application process and help business setup in the UAE with a focus on accuracy and attention to detail. We offer a range of visa solutions tailored to meet the unique needs of our clients.', '17176672332.png', '2024-06-06 06:15:23', '2024-06-06 06:15:23', NULL),
(40, 1, 'Corporate Banking Assistance', 'We understand the importance of finding the right bank for your business. We assist our clients in opening and setting up a corporate bank account along with their business setup.', '17176672333.png', '2024-06-06 06:15:23', '2024-06-06 06:15:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business__secondsections`
--

CREATE TABLE `business__secondsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `points` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business__secondsections`
--

INSERT INTO `business__secondsections` (`id`, `business_id`, `title`, `points`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\"]', '2024-06-06 02:21:38', '2024-06-06 05:21:15', '2024-06-06 05:21:15'),
(2, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\"]', '2024-06-06 02:21:38', '2024-06-06 05:21:15', '2024-06-06 05:21:15'),
(3, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\",\"Consistent follow up and reminders\",\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\",\"Transaction transparency\"]', '2024-06-06 05:01:44', '2024-06-06 05:21:15', '2024-06-06 05:21:15'),
(4, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Consistent follow up and reminders\",\"Consistent follow up and reminders\",\"Transaction transparency\"]', '2024-06-06 05:06:18', '2024-06-06 05:21:15', '2024-06-06 05:21:15'),
(5, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Competitive market price\",\"Complete documentation services\"]', '2024-06-06 05:06:18', '2024-06-06 05:21:15', '2024-06-06 05:21:15'),
(6, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\"]', '2024-06-06 05:21:15', '2024-06-06 05:22:02', '2024-06-06 05:22:02'),
(7, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\"]', '2024-06-06 05:21:15', '2024-06-06 05:22:02', '2024-06-06 05:22:02'),
(8, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\",\"Consistent follow up and reminders\"]', '2024-06-06 05:22:02', '2024-06-06 05:23:00', '2024-06-06 05:23:00'),
(9, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\",\"Quick licensing and immigration services\"]', '2024-06-06 05:22:02', '2024-06-06 05:23:00', '2024-06-06 05:23:00'),
(10, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\",\"Consistent follow up and reminders\",\"Industry Experts assistance\"]', '2024-06-06 05:23:00', '2024-06-06 06:12:37', '2024-06-06 06:12:37'),
(11, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\",\"Quick licensing and immigration services\",\"Transaction transparency\",\"Complete documentation services\",\"Competitive market price\"]', '2024-06-06 05:23:00', '2024-06-06 06:12:37', '2024-06-06 06:12:37'),
(12, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\",\"Transaction transparency\",\"Consistent follow up and reminders\",\"Industry Experts assistance\"]', '2024-06-06 06:12:37', '2024-06-06 06:12:37', NULL),
(13, 1, 'ADVANTAGES OF MAINLAND COMPANY FORMATION', '[\"Consistent follow up and reminders\",\"Complete documentation services\",\"Industry Experts assistance\",\"Quick licensing and immigration services\",\"Transaction transparency\",\"Complete documentation services\",\"Competitive market price\"]', '2024-06-06 06:12:37', '2024-06-06 06:12:37', NULL),
(14, 1, 'OUR AREA OF COVERAGE FOR MAINLAND COMPANY FORMATION', '[\"Complete documentation services\",\"Transaction transparency\"]', '2024-06-06 06:12:37', '2024-06-06 06:12:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business__setups`
--

CREATE TABLE `business__setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle` varchar(191) NOT NULL,
  `mtitle` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business__setups`
--

INSERT INTO `business__setups` (`id`, `stitle`, `mtitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PLANNING TO SETUP A BUSINESS IN DUBAI?', 'Biz Design helps you choose the best options for your business setup in Dubai.', '2024-06-03 21:45:55', '2024-06-03 21:47:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1717454869.png', '2024-06-03 17:15:58', '2024-06-03 17:17:49', NULL),
(2, '1717454878.png', '2024-06-03 17:17:58', '2024-06-03 17:17:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `differences`
--

CREATE TABLE `differences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle_1` varchar(191) NOT NULL,
  `mtitle_1` varchar(191) NOT NULL,
  `description_1` text NOT NULL,
  `image_1` varchar(191) NOT NULL,
  `points_1` text NOT NULL,
  `stitle_2` varchar(191) NOT NULL,
  `mtitle_2` varchar(191) NOT NULL,
  `description_2` text NOT NULL,
  `image_2` varchar(191) NOT NULL,
  `points_2` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `differences`
--

INSERT INTO `differences` (`id`, `stitle_1`, `mtitle_1`, `description_1`, `image_1`, `points_1`, `stitle_2`, `mtitle_2`, `description_2`, `image_2`, `points_2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WHY CHOOSE US1', 'What do we hold in the books of Biz-Design?1', '1Establishing a business, assisting the startups and young entrepreneurs in the formation is an easy task, we overlook something beyond mere establishment, by this we mean to support and guide you with right industrial knowledge and growth factors. When we say we promise to be with you, we promise to take care of your business like ours.\r\n\r\nWe are always pleased to welcome innovative business design thinkers to the UAE market in the form of SME, startup or an MNC. Welcoming a new investor is always challenging yet we welcome them with a handbook that will be a light to new business ERA. We make sure to answer all your questions and before you leave us we promise to turn you question marks into a full stop or an exclamation.', '1717453592.jpg', '[\"Quick licensing and immigration services1\",\"Competitive market price1\",\"Transaction transparency1\",\"Consistent follow up and reminders\",\"Complete documentation services\"]', 'SMALL TITLE WILL BE HERE1', 'What makes us different here in uae?1', '1Biz Design aims to act as a channel that bridge the gap between you and your business. We not only promise to render management services and advisory services, instead we promise to be with you and cover every aspect of a business including technical, administrative, financial and operations, which are vital for running a successful establishment. Customers are the boss for us, creating a raving fan with satisfactory customer service is the predominant quality we get trained with. Our network of relationships is the heart of our company and we stress to nurture the network by understanding the requirements, recognizing the scope and delivering right tool with prospective growth.', '1717453592.png', '[\"We are experienced professionals with strong and reliable network.1\",\"We aim to deliver expedite and affordable services.1\",\"We promise to cover every aspects of a business that keeps it running with growth.\",\"We master timely delivery of services and precise documentation.\"]', '2024-06-03 16:40:31', '2024-06-03 16:56:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_management`
--

CREATE TABLE `enquiry_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle` varchar(191) NOT NULL,
  `mtitle` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_management`
--

INSERT INTO `enquiry_management` (`id`, `stitle`, `mtitle`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'REQUEST A CONSULTATION', 'We’re Always Here To Help You', 'Establishing a business in Dubai often entails complexities. Critical decisions lie ahead, impacting your trajectory and defining your success. Navigate seamlessly through every stage of business setup with the meticulous guidance from our business consultants, well-versed in all aspects of business setup In Dubai.', '1717705567.png', '2024-06-06 14:54:37', '2024-06-06 14:56:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle_1` varchar(191) NOT NULL,
  `mtitle_1` varchar(191) NOT NULL,
  `stitle_2` varchar(191) NOT NULL,
  `mtitle_2` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertises`
--

INSERT INTO `expertises` (`id`, `stitle_1`, `mtitle_1`, `stitle_2`, `mtitle_2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WHAT WE OFFER1', 'How does Biz-Design have a stand out crowd?1', 'SMALL TITLE WILL BE HERE1', 'What are the privilages for business owners in uae?1', '2024-06-03 16:09:17', '2024-06-03 16:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertise__firstsections`
--

CREATE TABLE `expertise__firstsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expertise_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertise__firstsections`
--

INSERT INTO `expertise__firstsections` (`id`, `expertise_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Reliable local partners and agents.', 'Every company setup requires a trustworthy channel of partnership either with a local service agent or with the proposing entities for formation. We promise a reliable and transparent transactions for each and every process.', '1717450757.png', '2024-06-03 16:09:18', '2024-06-03 16:10:50', '2024-06-03 16:10:50'),
(2, 1, 'Rapid-hassle free document clearance', 'We strive to promote hassle free services in the shortest period of time. Every business services requires a set of documents and approvals; at Biz Design we ensure to provide everything in one-hand! We promise to take care of your document services and save your department to department hustles.', '1717450758.png', '2024-06-03 16:09:18', '2024-06-03 16:10:50', '2024-06-03 16:10:50'),
(3, 1, 'Reliable local partners and agents1.', 'Every company setup requires a trustworthy channel of partnership either with a local service agent or with the proposing entities for formation. We promise a reliable and transparent transactions for each and every process.', '1717450757.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(4, 1, 'Rapid-hassle free document clearance1', 'We strive to promote hassle free services in the shortest period of time. Every business services requires a set of documents and approvals; at Biz Design we ensure to provide everything in one-hand! We promise to take care of your document services and save your department to department hustles.', '1717450758.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(5, 1, 'Approved company formation solutions', 'Biz Design is a licensed business advisor and service provider, partnered with various business setup entities to make the process easy and affordable. Having a great industrial experience our association with these entities are held in great esteem.', '1717450850.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(6, 1, 'Association with government bodies.', 'Our ultimate goal is to render services that could fast track your journey. Our strong association with several governing bodies and legal entities drives us to our organizational goal. We are always blessed pick a cost effective and hassle free solution to our clients with the help of these association. We are happy with our direct and close association with Dubai Economic Department (DED), Dubai Chamber of Commerce and Industry(DCCI), Ministry of Labor (MOL), Immigration Departments, RERA departments, and so on which enables a quick and easy services.', '1717450850.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expertise__secondsections`
--

CREATE TABLE `expertise__secondsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expertise_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertise__secondsections`
--

INSERT INTO `expertise__secondsections` (`id`, `expertise_id`, `title`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Financial Freedoms', '1717450758.png', '2024-06-03 16:09:18', '2024-06-03 16:10:50', '2024-06-03 16:10:50'),
(2, 1, 'Data Protection', '1717450758.png', '2024-06-03 16:09:18', '2024-06-03 16:10:50', '2024-06-03 16:10:50'),
(3, 1, 'Financial Freedoms1', '1717450758.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(4, 1, 'Data Protection1', '1717450758.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(5, 1, 'Government Guarantees', '1717450850.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL),
(6, 1, 'Tax Benefits', '1717450850.png', '2024-06-03 16:10:50', '2024-06-03 16:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_06_02_195640_create_banners_table', 1),
(8, '2024_06_02_195748_create_expertises_table', 1),
(10, '2024_06_02_200018_create_clients_table', 1),
(11, '2024_06_02_200031_create_testimonials_table', 1),
(14, '2024_06_02_195731_create_aboutuses_table', 2),
(15, '2024_06_02_201736_create_expertise__firstsections_table', 3),
(16, '2024_06_02_201758_create_expertise__secondsections_table', 3),
(17, '2024_06_02_200003_create_differences_table', 4),
(18, '2024_06_04_023517_create_business__setups_table', 5),
(20, '2024_06_04_024232_create_business__secondsections_table', 5),
(22, '2024_06_04_024109_create_business__firstsections_table', 6),
(23, '2024_06_04_025620_create_business__categories_table', 6),
(24, '2024_06_04_110237_create_enquiry_management_table', 7),
(25, '2024_06_06_202932_create_social_media_table', 8),
(26, '2024_06_07_080831_create_services_table', 9),
(27, '2024_06_07_081602_create_service_mains_table', 9),
(28, '2024_06_07_081618_create_service_first_sections_table', 9),
(30, '2024_06_07_081652_create_service_categories_table', 9),
(31, '2024_06_07_081628_create_service_second_sections_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `stitle_sub1` varchar(191) DEFAULT NULL,
  `mtitle_sub1` varchar(191) DEFAULT NULL,
  `title_sub2` varchar(191) DEFAULT NULL,
  `description_sub2` text DEFAULT NULL,
  `image_sub2` varchar(191) DEFAULT NULL,
  `description2_sub2` text DEFAULT NULL,
  `points_sub2` text DEFAULT NULL,
  `title_sub3` varchar(191) DEFAULT NULL,
  `description_sub3` text DEFAULT NULL,
  `image_sub3` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `logo`, `title`, `description`, `stitle_sub1`, `mtitle_sub1`, `title_sub2`, `description_sub2`, `image_sub2`, `description2_sub2`, `points_sub2`, `title_sub3`, `description_sub3`, `image_sub3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1717768560.png', 'Banking', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis orci id dolor facilisis, ut tristique lorem fringilla. Nulla facilisi. Curabitur aliquam nunc nec lectus dignissim, vel sodales metus aliquet. Quisque malesuada felis vitae ex auctor, eget auctor libero pulvinar.', 'MAINLAND BUSINESS SETUP', '04 Easy Steps for business setup in Dubai', 'Company Formation In Mainland Is More Easy With Us', 'They are highly trained for quickly response and provide great service to our customers. Experts are give profitability and success of our business growth & marketing. Network solutions’ to Windows and open source operating systems, as those software platforms gained networking capabilities.', '17177685601.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '[\"Quick licensing and immigration services\",\"Competitive market price\"]', 'Analyzing services', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard\r\n\r\ndummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,\r\n\r\ndummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', '1717768671.png', '2024-06-07 08:26:00', '2024-06-07 08:27:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Licensing services', '2024-06-07 06:03:04', '2024-06-07 06:03:04', NULL),
(2, 'Business services', '2024-06-07 06:03:38', '2024-06-07 06:03:38', NULL),
(4, 'Individual services', '2024-06-07 06:09:38', '2024-06-07 06:09:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_first_sections`
--

CREATE TABLE `service_first_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_first_sections`
--

INSERT INTO `service_first_sections` (`id`, `service_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17177685600.png', '2024-06-07 08:26:00', '2024-06-07 08:38:03', '2024-06-07 08:38:03'),
(2, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17177685601.png', '2024-06-07 08:26:00', '2024-06-07 08:38:03', '2024-06-07 08:38:03'),
(3, 1, 'Choose Business Activity', 'Our consultancy offers end-to-end assistance for businesses. We provide guidance on regulations, assist with company formation in Dubai, choose a suitable company name, and help identify the perfect location for your business.', '17177685600.png', '2024-06-07 08:38:03', '2024-06-07 08:38:03', NULL),
(4, 1, 'Obtain Licenses And Permits', 'We offer seamless business setup services in Dubai assisting you from the ideation phase to handling legal paperwork and the final setup. We strive to offer comprehensive support at every step.', '17177685601.png', '2024-06-07 08:38:03', '2024-06-07 08:38:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_mains`
--

CREATE TABLE `service_mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stitle` varchar(191) NOT NULL,
  `mtitle` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_mains`
--

INSERT INTO `service_mains` (`id`, `stitle`, `mtitle`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OUR SERVICES', 'We Offer a Wide Variety of Services', 'Biz Design offers a comprehensive range of services curated for your business specific needs.', '2024-06-07 05:03:03', '2024-06-07 05:03:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_second_sections`
--

CREATE TABLE `service_second_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `points` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_second_sections`
--

INSERT INTO `service_second_sections` (`id`, `service_id`, `title`, `points`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TYPES OF MAINLAND LICENSE', '[\"Quick licensing and immigration services\",\"Competitive market price\"]', '2024-06-07 08:27:51', '2024-06-07 08:27:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) NOT NULL,
  `instagram` varchar(191) NOT NULL,
  `twitter` text NOT NULL,
  `snapchat` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `facebook`, `instagram`, `twitter`, `snapchat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'facebook', 'instagram', 'twitter', 'snapchat', '2024-06-06 15:22:59', '2024-06-06 15:23:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `company_name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Smith', 'A leading Company', 'I had a stellar experience with Biz Design. Their swift, top-tier services surpassed expectations. From initial consultation to final delivery, their professionalism and expertise shone through. Their agility ensured rapid results without sacrificing quality. I highly recommend Biz Design for anyone seeking fast, premium business development solutions.', '1717455996.png', '2024-06-03 17:34:07', '2024-06-03 17:41:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bizdesign.com', NULL, '$2y$10$ZQQJBgkWXzfdbwnRQB37funooCZgnE0MntowND18/107UyVPpFyOa', NULL, '2024-06-02 15:00:20', '2024-06-02 15:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business__categories`
--
ALTER TABLE `business__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business__firstsections`
--
ALTER TABLE `business__firstsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business__firstsections_business_id_index` (`business_id`);

--
-- Indexes for table `business__secondsections`
--
ALTER TABLE `business__secondsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business__secondsections_business_id_index` (`business_id`);

--
-- Indexes for table `business__setups`
--
ALTER TABLE `business__setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `differences`
--
ALTER TABLE `differences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_management`
--
ALTER TABLE `enquiry_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise__firstsections`
--
ALTER TABLE `expertise__firstsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expertise__firstsections_expertise_id_index` (`expertise_id`);

--
-- Indexes for table `expertise__secondsections`
--
ALTER TABLE `expertise__secondsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expertise__secondsections_expertise_id_index` (`expertise_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_category_id_index` (`category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_first_sections`
--
ALTER TABLE `service_first_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_first_sections_service_id_index` (`service_id`);

--
-- Indexes for table `service_mains`
--
ALTER TABLE `service_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_second_sections`
--
ALTER TABLE `service_second_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_second_sections_service_id_index` (`service_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business__categories`
--
ALTER TABLE `business__categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business__firstsections`
--
ALTER TABLE `business__firstsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `business__secondsections`
--
ALTER TABLE `business__secondsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `business__setups`
--
ALTER TABLE `business__setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `differences`
--
ALTER TABLE `differences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry_management`
--
ALTER TABLE `enquiry_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expertise__firstsections`
--
ALTER TABLE `expertise__firstsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expertise__secondsections`
--
ALTER TABLE `expertise__secondsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_first_sections`
--
ALTER TABLE `service_first_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_mains`
--
ALTER TABLE `service_mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_second_sections`
--
ALTER TABLE `service_second_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
