-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 04:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wli7njex_faretrim_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_bill_settings`
--

CREATE TABLE `admin_bill_settings` (
  `id` int(11) NOT NULL,
  `competitor_name` varchar(255) NOT NULL,
  `base_fare` float NOT NULL,
  `cost_per_minutes` float NOT NULL,
  `cost_per_kilometer` float NOT NULL,
  `booking_fee` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_bill_settings`
--

INSERT INTO `admin_bill_settings` (`id`, `competitor_name`, `base_fare`, `cost_per_minutes`, `cost_per_kilometer`, `booking_fee`, `created_at`, `updated_at`) VALUES
(1, 'UBER', 5, 0.5, 1, 3, '2020-10-13 06:49:38', '2020-10-13 00:49:38'),
(2, 'OLA', 6, 0.7, 2, 4, '2020-10-12 15:35:51', '2020-10-12 09:33:40'),
(3, 'DIDI', 7, 0.9, 3, 5, '2020-10-12 16:52:58', '2020-10-12 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `type` enum('1','2','3') NOT NULL COMMENT 'dirver=''1'' or passenger=''2'',  new ride request = ''3''',
  `type_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '''0''=not view , ''1''= already view',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `title`, `details`, `type`, `type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Driver Registered', 'Click to view ronyrons details', '1', 1, '1', '2020-08-27 13:53:57', '2020-08-27 07:53:57'),
(2, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 2, '1', '2020-08-27 13:54:03', '2020-08-27 07:54:03'),
(3, 'New Passenger Registered', 'Click to view alamin rony details', '2', 4, '1', '2020-08-27 13:53:50', '2020-08-27 07:53:50'),
(4, 'New Passenger Registered', 'Click to view alamin rony details', '2', 5, '1', '2020-08-27 14:04:43', '2020-08-27 08:04:43'),
(5, 'New ride request', 'Click to view ride details', '3', 6, '1', '2020-08-27 14:18:44', '2020-08-27 08:18:44'),
(6, 'New ride request', 'Click to view ride details', '3', 7, '0', '2020-08-27 09:09:56', '2020-08-27 09:09:56'),
(7, 'New Driver Registered', 'Click to view ronyrons details', '1', 3, '0', '2020-08-31 08:13:44', '2020-08-31 08:13:44'),
(8, 'New Driver Registered', 'Click to view ronyrons details', '1', 4, '0', '2020-08-31 08:15:32', '2020-08-31 08:15:32'),
(9, 'New Driver Registered', 'Click to view ronyrons details', '1', 5, '0', '2020-08-31 08:19:09', '2020-08-31 08:19:09'),
(10, 'New Driver Registered', 'Click to view ronyrons details', '1', 6, '0', '2020-08-31 08:23:03', '2020-08-31 08:23:03'),
(11, 'New Driver Registered', 'Click to view ronyrons details', '1', 7, '1', '2020-09-01 05:41:01', '2020-08-31 23:41:01'),
(12, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 8, '0', '2020-09-05 04:57:37', '2020-09-05 04:57:37'),
(13, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 9, '0', '2020-09-05 05:27:57', '2020-09-05 05:27:57'),
(14, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 10, '0', '2020-09-05 05:43:28', '2020-09-05 05:43:28'),
(15, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 11, '0', '2020-09-05 05:44:22', '2020-09-05 05:44:22'),
(16, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 12, '0', '2020-09-05 05:55:46', '2020-09-05 05:55:46'),
(17, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 13, '0', '2020-09-05 05:56:25', '2020-09-05 05:56:25'),
(18, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 1, '0', '2020-09-08 06:00:25', '2020-09-08 06:00:25'),
(19, 'New Driver Registered', 'Click to view Alamin Rony details', '1', 1, '0', '2020-09-08 06:01:44', '2020-09-08 06:01:44'),
(20, 'New Driver Registered', 'Click to view ronyrons details', '1', 2, '0', '2020-09-26 05:44:23', '2020-09-26 05:44:23'),
(21, 'New Driver Registered', 'Click to view demo driver 1 details', '1', 3, '0', '2020-09-26 05:47:01', '2020-09-26 05:47:01'),
(22, 'New Driver Registered', 'Click to view demo driver 2 details', '1', 4, '0', '2020-09-26 05:47:30', '2020-09-26 05:47:30'),
(23, 'New Passenger Registered', 'Click to view alamin rony details', '2', 1, '0', '2020-09-26 05:48:27', '2020-09-26 05:48:27'),
(24, 'New Passenger Registered', 'Click to view demo passenger 1 details', '2', 2, '0', '2020-09-26 05:48:54', '2020-09-26 05:48:54'),
(25, 'New Passenger Registered', 'Click to view demo passenger 2 details', '2', 3, '0', '2020-09-26 05:49:07', '2020-09-26 05:49:07'),
(26, 'New Passenger Registered', 'Click to view demo passenger 2 details', '2', 4, '0', '2020-10-17 07:09:55', '2020-10-17 07:09:55'),
(27, 'New Passenger Registered', 'Click to view demo passenger 2 details', '2', 5, '0', '2020-10-17 07:11:17', '2020-10-17 07:11:17'),
(28, 'New Passenger Registered', 'Click to view demo passenger 2 details', '2', 6, '0', '2020-10-17 07:33:27', '2020-10-17 07:33:27'),
(29, 'New Passenger Registered', 'Click to view demo passenger 2 details', '2', 7, '0', '2020-10-29 03:35:03', '2020-10-29 03:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `bill_charge_options`
--

CREATE TABLE `bill_charge_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_charge_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_charge_options`
--

INSERT INTO `bill_charge_options` (`id`, `bill_charge_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Period Wise', 1, 1, '2020-05-21 22:43:53', '2020-05-21 22:43:53'),
(2, 'Ride Wise', 1, 6, '2020-05-21 22:44:22', '2020-08-17 00:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `bill_charge_option_values`
--

CREATE TABLE `bill_charge_option_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billchargeoption_id` int(11) NOT NULL,
  `option_value_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value_status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_charge_option_values`
--

INSERT INTO `bill_charge_option_values` (`id`, `billchargeoption_id`, `option_value_name`, `option_value_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '24 Hours', 1, 1, 1, '2020-05-21 22:45:30', '2020-05-21 22:45:30'),
(2, 1, '12 Hours', 1, 1, 1, '2020-05-21 22:46:09', '2020-05-21 22:46:09'),
(3, 2, 'Per ride charge', 1, 1, 1, '2020-05-21 22:46:36', '2020-05-21 22:46:36'),
(4, 2, 'Fix', 1, 1, 1, '2020-05-21 22:47:30', '2020-05-21 22:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `bill_settings`
--

CREATE TABLE `bill_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `billchargeoption_id` tinyint(4) NOT NULL,
  `billchargeoptionvalue_id` tinyint(4) NOT NULL,
  `charge_value` double(8,2) DEFAULT NULL,
  `bill_days` int(11) DEFAULT NULL,
  `tryal_period` int(11) DEFAULT NULL,
  `ride_request_cancel_time` int(11) DEFAULT NULL,
  `driver_fine_over_time` int(11) DEFAULT NULL,
  `driver_fine_amount` int(11) DEFAULT NULL,
  `passenger_fine_over_time` int(11) DEFAULT NULL,
  `passenger_fine_amount` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_settings`
--

INSERT INTO `bill_settings` (`id`, `country_id`, `billchargeoption_id`, `billchargeoptionvalue_id`, `charge_value`, `bill_days`, `tryal_period`, `ride_request_cancel_time`, `driver_fine_over_time`, `driver_fine_amount`, `passenger_fine_over_time`, `passenger_fine_amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10.00, 15, 5, 15, 10, 10, 10, 10, 1, 1, '2020-05-22 00:20:58', '2020-05-22 00:20:58'),
(2, 2, 2, 3, 10.00, 15, NULL, 15, 10, 10, 10, 121, 1, 1, '2020-05-22 00:53:11', '2020-05-22 00:53:11'),
(3, 2, 2, 3, 10.00, 15, NULL, 15, 10, 10, 10, 121, 1, 1, '2020-05-22 01:29:40', '2020-05-22 01:29:40'),
(4, 2, 2, 3, 10.00, 15, 5, 15, 10, 10, 10, 121, 1, 1, '2020-05-22 01:29:44', '2020-05-22 03:17:17'),
(5, 114, 1, 2, 10.00, 15, 21, 15, 10, 10, 10, 10, 1, 6, '2020-05-22 01:32:50', '2020-08-08 07:37:58'),
(6, 19, 1, 1, 21.00, 12, 21, 12, 21, 12, 21, 21, 6, 6, '2020-08-17 00:50:45', '2020-08-17 00:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `bill_settings_logs`
--

CREATE TABLE `bill_settings_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `billchargeoption_id` tinyint(4) NOT NULL,
  `billchargeoptionvalue_id` tinyint(4) NOT NULL,
  `charge_value` double(8,2) NOT NULL,
  `bill_days` int(11) NOT NULL,
  `tryal_period` int(11) DEFAULT NULL,
  `ride_request_cancel_time` int(11) DEFAULT NULL,
  `driver_fine_over_time` int(11) DEFAULT NULL,
  `driver_fine_amount` int(11) DEFAULT NULL,
  `passenger_fine_over_time` int(11) DEFAULT NULL,
  `passenger_fine_amount` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_settings_logs`
--

INSERT INTO `bill_settings_logs` (`id`, `country_id`, `billchargeoption_id`, `billchargeoptionvalue_id`, `charge_value`, `bill_days`, `tryal_period`, `ride_request_cancel_time`, `driver_fine_over_time`, `driver_fine_amount`, `passenger_fine_over_time`, `passenger_fine_amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, 10.00, 15, NULL, 15, 10, 10, 10, 10, 1, 1, '2020-05-22 01:32:50', '2020-05-22 01:32:50'),
(2, 114, 1, 2, 10.00, 15, NULL, 15, 10, 10, 10, 10, 1, 1, '2020-05-22 02:41:02', '2020-05-22 02:41:02'),
(3, 2, 2, 3, 10.00, 15, 5, 15, 10, 10, 10, 121, 1, 1, '2020-05-22 03:17:18', '2020-05-22 03:17:18'),
(4, 19, 1, 1, 0.00, 0, 0, 0, 0, 0, 0, 0, 6, 6, '2020-08-17 00:50:45', '2020-08-17 00:50:45'),
(5, 19, 1, 1, 21.00, 12, 21, 12, 21, 12, 21, 21, 6, 6, '2020-08-17 00:51:12', '2020-08-17 00:51:12'),
(6, 19, 1, 1, 21.00, 12, 21, 12, 21, 12, 21, 21, 6, 6, '2020-08-17 00:51:21', '2020-08-17 00:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `cabs`
--

CREATE TABLE `cabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabtype_id` int(11) DEFAULT NULL,
  `number_plate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxi_operator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_capacity` int(11) NOT NULL,
  `children` tinyint(1) NOT NULL,
  `wheelchair` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '''1''=yes, ''0''=no',
  `driver_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cab_rides`
--

CREATE TABLE `cab_rides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `adult_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_children` tinyint(1) DEFAULT NULL,
  `children_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_wheelchair` tinyint(1) NOT NULL,
  `wheelchair_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `ride_type` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''1''=discount, ''0''=bid',
  `cab_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `riding_distance` double(4,2) DEFAULT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_issue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canceled_by_driver` int(11) NOT NULL DEFAULT '0',
  `canceled_by_passenger` int(11) NOT NULL DEFAULT '0',
  `ridestatus_id` int(11) NOT NULL,
  `bid_amount` float DEFAULT NULL,
  `total_fare_amount` float DEFAULT NULL,
  `charge_amount` float DEFAULT NULL,
  `charge_type` int(11) DEFAULT NULL,
  `charge_status` tinyint(4) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cab_types`
--

CREATE TABLE `cab_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cab_types`
--

INSERT INTO `cab_types` (`id`, `type_name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'SPORTS CAR', 'SPORTS CAR', 1, '2020-05-18 08:40:26', '2020-10-20 06:37:58'),
(2, 'COUPE', 'COUPE', 1, '2020-05-18 08:42:18', '2020-10-20 06:37:40'),
(3, 'SEDAN', 'SEDAN', 1, '2020-05-21 22:42:47', '2020-10-20 06:37:24'),
(4, 'HATCHBACK', 'HATCHBACK', 6, '2020-10-20 06:40:12', '2020-10-20 06:40:12'),
(5, 'STATION WAGON', 'STATION WAGON', 6, '2020-10-20 06:40:36', '2020-10-20 06:40:36'),
(6, 'CONVERTIBLE', 'CONVERTIBLE', 6, '2020-10-20 06:40:52', '2020-10-20 06:40:52'),
(7, 'SPORT-UTILITY VEHICLE (SUV)', 'SPORT-UTILITY VEHICLE (SUV)', 6, '2020-10-20 06:41:24', '2020-10-20 06:41:24'),
(8, 'MINIVAN', 'MINIVAN', 6, '2020-10-20 06:41:54', '2020-10-20 06:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_issues`
--

CREATE TABLE `cancel_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_issue_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `link`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Privacy Policy | Terms & Conditions', '<p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores tempora quis sapiente modi cumque ullam, officiis, nesciunt ducimus sint repellendus fugiat praesentium minus deleniti deserunt animi quae rem. Molestiae, minima! Accusamus, iure repellat, nesciunt illo expedita, veniam possimus eveniet ipsam iusto itaque laborum quas et provident commodi. Tenetur consequatur nulla corrupti error voluptas natus explicabo incidunt non placeat possimus pariatur harum, esse culpa quis atque inventore labore. Neque natus id, delectus ipsa iure a asperiores, et laboriosam est, accusamus consectetur.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quos, praesentium deleniti quas similique ab aliquid eius, explicabo ea voluptatem molestias quasi ut aut necessitatibus doloribus. Repellat, deleniti maiores illum natus earum, placeat nesciunt fugiat iste tempora, quidem hic! Neque?</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit magni libero voluptas obcaecati consequatur voluptatum placeat expedita, nulla quaerat quis deserunt quasi corporis consequuntur dolores cupiditate adipisci natus nihil voluptate.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem fuga quo ut rerum esse nostrum, vero, possimus consectetur saepe velit eius voluptate. Similique nostrum consequatur quae dolorem eveniet ipsam iusto!</p>', 'http%3A%2F%2Flocalhost%2FfaretrimDev%2Fftdev%2Fterms-and-condition', 'Privacy Policy | Terms & Conditions', 'Privacy Policy | Terms & Conditions', '1', '2020-11-25 12:05:45', '2020-11-25 06:05:45'),
(3, 'Driver Guidelines', '<p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores tempora quis sapiente modi cumque ullam, officiis, nesciunt ducimus sint repellendus fugiat praesentium minus deleniti deserunt animi quae rem. Molestiae, minima! Accusamus, iure repellat, nesciunt illo expedita, veniam possimus eveniet ipsam iusto itaque laborum quas et provident commodi. Tenetur consequatur nulla corrupti error voluptas natus explicabo incidunt non placeat possimus pariatur harum, esse culpa quis atque inventore labore. Neque natus id, delectus ipsa iure a asperiores, et laboriosam est, accusamus consectetur.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quos, praesentium deleniti quas similique ab aliquid eius, explicabo ea voluptatem molestias quasi ut aut necessitatibus doloribus. Repellat, deleniti maiores illum natus earum, placeat nesciunt fugiat iste tempora, quidem hic! Neque?</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit magni libero voluptas obcaecati consequatur voluptatum placeat expedita, nulla quaerat quis deserunt quasi corporis consequuntur dolores cupiditate adipisci natus nihil voluptate.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-size: 18px; font-weight: 300; text-align: justify; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem fuga quo ut rerum esse nostrum, vero, possimus consectetur saepe velit eius voluptate. Similique nostrum consequatur quae dolorem eveniet ipsam iusto!</p>', 'http%3A%2F%2Flocalhost%2FfaretrimDev%2Fftdev%2Fdriver-guideline', 'Driver Guidelines', 'Driver Guidelines', '1', '2020-11-23 07:02:15', '2020-11-23 07:02:15'),
(4, 'Safety', '<div class=\"safety-content\" style=\"box-sizing: border-box; margin: 0px; padding: 50px 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h6 style=\"box-sizing: border-box; margin: 0px 0px 0.5rem; padding: 0px; font-family: Raleway, sans-serif; font-weight: bold; line-height: 1.2; color: rgb(70, 70, 70); font-size: 48px; text-align: center;\"><span style=\"color: rgb(70, 70, 70); font-family: Raleway, sans-serif; font-size: 48px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Our<span>&nbsp;</span></span>comitment to safety</h6><div class=\"content-para\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px;\"><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px;\">We want you to move freely, make the most of your time, and be connected to the people and places that matter most to you. That’s why we are committed to safety, from the creation of new standards to the development of technology with the aim of reducing incidents.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/safety.png\" alt=\"\" class=\"img-fluid\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"></div></div><div class=\"covid-content\" style=\"box-sizing: border-box; margin: 0px; padding: 50px 0px; background-color: rgb(235, 235, 235); color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h6 style=\"box-sizing: border-box; margin: 0px 0px 0.5rem; padding: 0px; font-family: Raleway, sans-serif; font-weight: bold; line-height: 1.2; color: rgb(70, 70, 70); font-size: 48px; text-align: center;\">Helping to keep safe during COVID-19</h6><p style=\"box-sizing: border-box; margin: auto; padding: 20px 0px; width: 777px;\">We’re actively monitoring the coronavirus (COVID-19) situation and are continually working to help keep those who rely on our platform healthy and safe.</p><button style=\"box-sizing: border-box; margin: 0px; padding: 0px; border-radius: 8px; font-family: inherit; font-size: 18px; line-height: inherit; overflow: visible; text-transform: none; appearance: button; background-color: rgb(255, 102, 0); width: 260px; height: 70px; border: none; outline: none; cursor: pointer; color: rgb(255, 255, 255);\">Learn More</button></div><div class=\"experience-content\" style=\"box-sizing: border-box; margin: 0px; padding: 35px 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h6 style=\"box-sizing: border-box; margin: 0px 0px 0.5rem; padding: 0px; font-family: Raleway, sans-serif; font-weight: bold; line-height: 1.2; color: rgb(70, 70, 70); font-size: 48px; text-align: center;\">How safety is built into your experience</h6><div class=\"experience-grid\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: grid; gap: 2rem; grid-template-columns: 1fr 1fr 1fr;\"><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/safety-features.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 15px 0px 0px; font-size: 24px; font-weight: bold;\">Safety features in the app</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px;\">Share your trip details with loved ones. Track your trip during your ride. Our technology helps put peace of mind at your fingertips.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/inclusive.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 15px 0px 0px; font-size: 24px; font-weight: bold;\">An inclusive community</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px;\">Millions of riders and drivers share a set of Community Guidelines, holding each other accountable to do the right thing.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/24.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 15px 0px 0px; font-size: 24px; font-weight: bold;\">Support at every turn</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px;\">A specially trained team is available 24/7. Reach them in the app, day or night, with any questions or safety concerns.</p></div></div></div><div class=\"driver-safety\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h6 style=\"box-sizing: border-box; margin: 0px 0px 0.5rem; padding: 0px; font-family: Raleway, sans-serif; font-weight: bold; line-height: 1.2; color: rgb(70, 70, 70); font-size: 48px; text-align: center;\">Driver safety</h6><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 832.5px;\">Safety is designed into the experience. So you feel comfortable driving at night. So you can tell loved ones where you’re going. And so you know you have someone to turn to if anything happens.</p><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/home-placeholder.png\" class=\"img-fluid\" alt=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><div class=\"safety-feature\" style=\"box-sizing: border-box; margin: 50px 0px 40px; padding: 25px 0px 30px; background-color: rgb(235, 235, 235);\"><div class=\"safety-feature-grid\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: grid; gap: 2rem; grid-template-columns: 1fr 1fr;\"><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/24-2.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px; font-size: 24px; font-weight: bold;\">24/7 incident support</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px;\">FareTrim customer associates trained in incident response are available around the clock.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/follow.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px; font-size: 24px; font-weight: bold;\">Follow My Ride</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px;\">Friends and family can follow your route and will know as soon as you arrive.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/2-way.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px; font-size: 24px; font-weight: bold;\">2-way ratings</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px;\">Your feedback matters. Low-rated trips are logged, and users may be removed to protect the Uber community.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/gps.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 30px 0px 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px; font-size: 24px; font-weight: bold;\">GPS tracking</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 404.25px;\">All FareTrim rides are tracked from start to finish, so there’s a record of your trip if something happens.</p></div></div></div></div><div class=\"rider-safety\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><h6 style=\"box-sizing: border-box; margin: 0px 0px 0.5rem; padding: 0px; font-family: Raleway, sans-serif; font-weight: bold; line-height: 1.2; color: rgb(70, 70, 70); font-size: 48px; text-align: center;\">Rider safety</h6><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 20px; width: 832.5px;\">Safety is designed into the experience. So you feel comfortable driving at night. So you can tell loved ones where you’re going. And so you know you have someone to turn to if anything happens.</p><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/rider-safety.png\" class=\"img-fluid\" alt=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><div class=\"rider-feature\" style=\"box-sizing: border-box; margin: 40px 0px; padding: 40px 0px 30px; background-color: rgb(235, 235, 235);\"><div class=\"rider-feature-grid\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 15px; display: grid; gap: 3rem; grid-template-columns: 1fr 1fr 1fr;\"><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/assistance.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">Emergency assistance button</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">You can use the in-app emergency button to call and get help if you need it. The app displays your location and trip details, so you can quickly share them with authorities.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/24-2.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">24/7 incident support</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">Our customer support team is specially trained to respond to urgent safety issues.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/share-my.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">Share My Trip</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">Set up your Trusted Contacts and create reminders to share your trip status with friends and family in real time.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/safety-center.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">Safety Center</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">Access FareTrim’s safety features all in one place in the app whenever you’re riding with us.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/2-way.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">2-way ratings</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">Your feedback matters. Low-rated trips are logged, and users may be removed.</p></div><div style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><img src=\"http://faretrim.com.au/frontEnd/assets/img/safety/gps.png\" class=\"img-fluid\" alt=\"features\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; vertical-align: middle; border-style: none; max-width: 100%; height: auto;\"><p class=\"fontBold\" style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px; font-size: 24px; font-weight: bold;\">GPS tracking</p><p style=\"box-sizing: border-box; margin: auto; padding: 10px 0px 0px; width: 328px;\">All FareTrim rides are tracked by GPS from start to finish so there’s a record of your trip if something happens.</p></div></div></div></div>', 'http%3A%2F%2Flocalhost%2FfaretrimDev%2Fftdev%2Fsafety-page', 'safty page', 'safty page', '1', '2020-11-25 11:44:38', '2020-11-25 05:44:38'),
(5, 'Frequently asked questions', 'How to sign up a faretrim account?\r\n\r\nYour first trip is a tap away with DiDi with the simple following steps:\r\n\r\n1\r\n\r\nDownload the faretrim app in the App Store or Google Play.\r\n\r\n2\r\n\r\nRegister your rider account with your mobile number, name and email address. You will receive a verification SMS during the sign up process.\r\n\r\n3\r\n\r\nBefore you can request your first trip you will need to complete your payment details. Adding a credit or debit card to your account will allow your trip fares to be automatically charged after each ride.\r\n\r\n4\r\n\r\nAfter completing these steps above, you are all set and ready to go!', 'http%3A%2F%2Flocalhost%2FfaretrimDev%2Fftdev%2Ffaq-page', 'Frequently asked questions', 'Frequently asked questions', '1', '2020-11-25 10:45:37', '2020-11-25 04:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fips_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_numeric` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `north` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `south` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `east` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `west` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_alpha3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geoname_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `currency_code`, `fips_code`, `iso_numeric`, `north`, `south`, `east`, `west`, `capital`, `continent_name`, `continent`, `language`, `iso_alpha3`, `geoname_id`, `created_at`, `updated_at`) VALUES
(1, 'AD', 'Andorra', 'EUR', 'AN', '020', '42.65604389629997', '42.42849259876837', '1.7865427778319827', '1.4071867141112762', 'Andorra la Vella', 'Europe', 'EU', 'ca', 'AND', 3041565, NULL, NULL),
(2, 'AE', 'United Arab Emirates', 'AED', 'AE', '784', '26.08415985107422', '22.633329391479492', '56.38166046142578', '51.58332824707031', 'Abu Dhabi', 'Asia', 'AS', 'ar-AE,fa,en,hi,ur', 'ARE', 290557, NULL, NULL),
(3, 'AF', 'Afghanistan', 'AFN', 'AF', '004', '38.483418', '29.377472', '74.879448', '60.478443', 'Kabul', 'Asia', 'AS', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361, NULL, NULL),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 'AC', '028', '17.729387', '16.996979', '-61.672421', '-61.906425', 'St. John\'s', 'North America', 'NA', 'en-AG', 'ATG', 3576396, NULL, NULL),
(5, 'AI', 'Anguilla', 'XCD', 'AV', '660', '18.283424', '18.166815', '-62.971359', '-63.172901', 'The Valley', 'North America', 'NA', 'en-AI', 'AIA', 3573511, NULL, NULL),
(6, 'AL', 'Albania', 'ALL', 'AL', '008', '42.665611', '39.648361', '21.068472', '19.293972', 'Tirana', 'Europe', 'EU', 'sq,el', 'ALB', 783754, NULL, NULL),
(7, 'AM', 'Armenia', 'AMD', 'AM', '051', '41.301834', '38.830528', '46.772435045159995', '43.44978', 'Yerevan', 'Asia', 'AS', 'hy', 'ARM', 174982, NULL, NULL),
(8, 'AO', 'Angola', 'AOA', 'AO', '024', '-4.376826', '-18.042076', '24.082119', '11.679219', 'Luanda', 'Africa', 'AF', 'pt-AO', 'AGO', 3351879, NULL, NULL),
(9, 'AQ', 'Antarctica', '', 'AY', '010', '-60.515533', '-89.9999', '179.9999', '-179.9999', '', 'Antarctica', 'AN', '', 'ATA', 6697173, NULL, NULL),
(10, 'AR', 'Argentina', 'ARS', 'AR', '032', '-21.781277', '-55.061314', '-53.591835', '-73.58297', 'Buenos Aires', 'South America', 'SA', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483, NULL, NULL),
(11, 'AS', 'American Samoa', 'USD', 'AQ', '016', '-11.0497', '-14.382478', '-169.416077', '-171.091888', 'Pago Pago', 'Oceania', 'OC', 'en-AS,sm,to', 'ASM', 5880801, NULL, NULL),
(12, 'AT', 'Austria', 'EUR', 'AU', '040', '49.0211627691393', '46.3726520216244', '17.1620685652599', '9.53095237240833', 'Vienna', 'Europe', 'EU', 'de-AT,hr,hu,sl', 'AUT', 2782113, NULL, NULL),
(13, 'AU', 'Australia', 'AUD', 'AS', '036', '-10.062805', '-43.64397', '153.639252', '112.911057', 'Canberra', 'Oceania', 'OC', 'en-AU', 'AUS', 2077456, NULL, NULL),
(14, 'AW', 'Aruba', 'AWG', 'AA', '533', '12.623718127152925', '12.411707706190716', '-69.86575120104982', '-70.0644737196045', 'Oranjestad', 'North America', 'NA', 'nl-AW,es,en', 'ABW', 3577279, NULL, NULL),
(15, 'AX', 'Åland Islands', 'EUR', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', 'sv-AX', 'ALA', 661882, NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'AZN', 'AJ', '031', '41.90564', '38.38915252685547', '50.370083', '44.774113', 'Baku', 'Asia', 'AS', 'az,ru,hy', 'AZE', 587116, NULL, NULL),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 'BK', '070', '45.239193', '42.546112', '19.622223', '15.718945', 'Sarajevo', 'Europe', 'EU', 'bs,hr-BA,sr-BA', 'BIH', 3277605, NULL, NULL),
(18, 'BB', 'Barbados', 'BBD', 'BB', '052', '13.327257', '13.039844', '-59.420376', '-59.648922', 'Bridgetown', 'North America', 'NA', 'en-BB', 'BRB', 3374084, NULL, NULL),
(19, 'BD', 'Bangladesh', 'BDT', 'BG', '050', '26.631945', '20.743334', '92.673668', '88.028336', 'Dhaka', 'Asia', 'AS', 'bn-BD,en', 'BGD', 1210997, NULL, NULL),
(20, 'BE', 'Belgium', 'EUR', 'BE', '056', '51.505444', '49.49361', '6.403861', '2.546944', 'Brussels', 'Europe', 'EU', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361, NULL, NULL),
(21, 'BF', 'Burkina Faso', 'XOF', 'UV', '854', '15.082593', '9.401108', '2.405395', '-5.518916', 'Ouagadougou', 'Africa', 'AF', 'fr-BF', 'BFA', 2361809, NULL, NULL),
(22, 'BG', 'Bulgaria', 'BGN', 'BU', '100', '44.21764', '41.242084', '28.612167', '22.371166', 'Sofia', 'Europe', 'EU', 'bg,tr-BG,rom', 'BGR', 732800, NULL, NULL),
(23, 'BH', 'Bahrain', 'BHD', 'BA', '048', '26.282583', '25.796862', '50.664471', '50.45414', 'Manama', 'Asia', 'AS', 'ar-BH,en,fa,ur', 'BHR', 290291, NULL, NULL),
(24, 'BI', 'Burundi', 'BIF', 'BY', '108', '-2.310123', '-4.465713', '30.847729', '28.993061', 'Bujumbura', 'Africa', 'AF', 'fr-BI,rn', 'BDI', 433561, NULL, NULL),
(25, 'BJ', 'Benin', 'XOF', 'BN', '204', '12.418347', '6.225748', '3.851701', '0.774575', 'Porto-Novo', 'Africa', 'AF', 'fr-BJ', 'BEN', 2395170, NULL, NULL),
(26, 'BL', 'Saint Barthélemy', 'EUR', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', 'fr', 'BLM', 3578476, NULL, NULL),
(27, 'BM', 'Bermuda', 'BMD', 'BD', '060', '32.393833', '32.246639', '-64.651993', '-64.89605', 'Hamilton', 'North America', 'NA', 'en-BM,pt', 'BMU', 3573345, NULL, NULL),
(28, 'BN', 'Brunei Darussalam', 'BND', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', 'ms-BN,en-BN', 'BRN', 1820814, NULL, NULL),
(29, 'BO', 'Bolivia', 'BOB', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', 'es-BO,qu,ay', 'BOL', 3923057, NULL, NULL),
(30, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'USD', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', '', 'North America', 'NA', 'nl,pap,en', 'BES', 7626844, NULL, NULL),
(31, 'BR', 'Brazil', 'BRL', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Brasília', 'South America', 'SA', 'pt-BR,es,en,fr', 'BRA', 3469034, NULL, NULL),
(32, 'BS', 'Bahamas', 'BSD', 'BF', '044', '26.919243', '22.852743', '-74.423874', '-78.995911', 'Nassau', 'North America', 'NA', 'en-BS', 'BHS', 3572887, NULL, NULL),
(33, 'BT', 'Bhutan', 'BTN', 'BT', '064', '28.323778', '26.70764', '92.125191', '88.75972', 'Thimphu', 'Asia', 'AS', 'dz', 'BTN', 1252634, NULL, NULL),
(34, 'BV', 'Bouvet Island', 'NOK', 'BV', '074', '-54.400322', '-54.462383', '3.487976', '3.335499', '', 'Antarctica', 'AN', '', 'BVT', 3371123, NULL, NULL),
(35, 'BW', 'Botswana', 'BWP', 'BC', '072', '-17.780813', '-26.907246', '29.360781', '19.999535', 'Gaborone', 'Africa', 'AF', 'en-BW,tn-BW', 'BWA', 933860, NULL, NULL),
(36, 'BY', 'Belarus', 'BYR', 'BO', '112', '56.165806', '51.256416', '32.770805', '23.176889', 'Minsk', 'Europe', 'EU', 'be,ru', 'BLR', 630336, NULL, NULL),
(37, 'BZ', 'Belize', 'BZD', 'BH', '084', '18.496557', '15.8893', '-87.776985', '-89.224815', 'Belmopan', 'North America', 'NA', 'en-BZ,es', 'BLZ', 3582678, NULL, NULL),
(38, 'CA', 'Canada', 'CAD', 'CA', '124', '83.110626', '41.67598', '-52.636291', '-141', 'Ottawa', 'North America', 'NA', 'en-CA,fr-CA,iu', 'CAN', 6251999, NULL, NULL),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 'CK', '166', '-12.072459094', '-12.208725839', '96.929489344', '96.816941408', 'West Island', 'Asia', 'AS', 'ms-CC,en', 'CCK', 1547376, NULL, NULL),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', 'CG', '180', '5.386098', '-13.455675', '31.305912', '12.204144', 'Kinshasa', 'Africa', 'AF', 'fr-CD,ln,kg', 'COD', 203312, NULL, NULL),
(41, 'CF', 'Central African Republic', 'XAF', 'CT', '140', '11.007569', '2.220514', '27.463421', '14.420097', 'Bangui', 'Africa', 'AF', 'fr-CF,sg,ln,kg', 'CAF', 239880, NULL, NULL),
(42, 'CG', 'Republic of the Congo', 'XAF', 'CF', '178', '3.703082', '-5.027223', '18.649839', '11.205009', 'Brazzaville', 'Africa', 'AF', 'fr-CG,kg,ln-CG', 'COG', 2260494, NULL, NULL),
(43, 'CH', 'Switzerland', 'CHF', 'SZ', '756', '47.805332', '45.825695', '10.491472', '5.957472', 'Berne', 'Europe', 'EU', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434, NULL, NULL),
(44, 'CI', 'Ivory Coast', 'XOF', 'IV', '384', '10.736642', '4.357067', '-2.494897', '-8.599302', 'Yamoussoukro', 'Africa', 'AF', 'fr-CI', 'CIV', 2287781, NULL, NULL),
(45, 'CK', 'Cook Islands', 'NZD', 'CW', '184', '-10.023114', '-21.944164', '-157.312134', '-161.093658', 'Avarua', 'Oceania', 'OC', 'en-CK,mi', 'COK', 1899402, NULL, NULL),
(46, 'CL', 'Chile', 'CLP', 'CI', '152', '-17.507553', '-55.9256225109217', '-66.417557', '-80.785851', 'Santiago', 'South America', 'SA', 'es-CL', 'CHL', 3895114, NULL, NULL),
(47, 'CM', 'Cameroon', 'XAF', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaoundé', 'Africa', 'AF', 'en-CM,fr-CM', 'CMR', 2233387, NULL, NULL),
(48, 'CN', 'China', 'CNY', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991, NULL, NULL),
(49, 'CO', 'Colombia', 'COP', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogotá', 'South America', 'SA', 'es-CO', 'COL', 3686110, NULL, NULL),
(50, 'CR', 'Costa Rica', 'CRC', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San José', 'North America', 'NA', 'es-CR,en', 'CRI', 3624060, NULL, NULL),
(51, 'CU', 'Cuba', 'CUP', 'CU', '192', '23.226042', '19.828083', '-74.131775', '-84.957428', 'Havana', 'North America', 'NA', 'es-CU', 'CUB', 3562981, NULL, NULL),
(52, 'CV', 'Cape Verde', 'CVE', 'CV', '132', '17.197178', '14.808022', '-22.669443', '-25.358747', 'Praia', 'Africa', 'AF', 'pt-CV', 'CPV', 3374766, NULL, NULL),
(53, 'CW', 'Curaçao', 'ANG', 'UC', '531', '12.385672', '12.032745', '-68.733948', '-69.157204', 'Willemstad', 'North America', 'NA', 'nl,pap', 'CUW', 7626836, NULL, NULL),
(54, 'CX', 'Christmas Island', 'AUD', 'KT', '162', '-10.412356007', '-10.5704829995', '105.712596992', '105.533276992', 'The Settlement', 'Asia', 'AS', 'en,zh,ms-CC', 'CXR', 2078138, NULL, NULL),
(55, 'CY', 'Cyprus', 'EUR', 'CY', '196', '35.701527', '34.6332846722908', '34.59791599999994', '32.27308300000004', 'Nicosia', 'Europe', 'EU', 'el-CY,tr-CY,en', 'CYP', 146669, NULL, NULL),
(56, 'CZ', 'Czech Republic', 'CZK', 'EZ', '203', '51.058887', '48.542915', '18.860111', '12.096194', 'Prague', 'Europe', 'EU', 'cs,sk', 'CZE', 3077311, NULL, NULL),
(57, 'DE', 'Germany', 'EUR', 'GM', '276', '55.055637', '47.275776', '15.039889', '5.865639', 'Berlin', 'Europe', 'EU', 'de', 'DEU', 2921044, NULL, NULL),
(58, 'DJ', 'Djibouti', 'DJF', 'DJ', '262', '12.706833', '10.909917', '43.416973', '41.773472', 'Djibouti', 'Africa', 'AF', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816, NULL, NULL),
(59, 'DK', 'Denmark', 'DKK', 'DA', '208', '57.748417', '54.562389', '15.158834', '8.075611', 'Copenhagen', 'Europe', 'EU', 'da-DK,en,fo,de-DK', 'DNK', 2623032, NULL, NULL),
(60, 'DM', 'Dominica', 'XCD', 'DO', '212', '15.631809', '15.20169', '-61.244152', '-61.484108', 'Roseau', 'North America', 'NA', 'en-DM', 'DMA', 3575830, NULL, NULL),
(61, 'DO', 'Dominican Republic', 'DOP', 'DR', '214', '19.929859', '17.543159', '-68.32', '-72.003487', 'Santo Domingo', 'North America', 'NA', 'es-DO', 'DOM', 3508796, NULL, NULL),
(62, 'DZ', 'Algeria', 'DZD', 'AG', '012', '37.093723', '18.960028', '11.979548', '-8.673868', 'Algiers', 'Africa', 'AF', 'ar-DZ', 'DZA', 2589581, NULL, NULL),
(63, 'EC', 'Ecuador', 'USD', 'EC', '218', '1.43902', '-4.998823', '-75.184586', '-81.078598', 'Quito', 'South America', 'SA', 'es-EC', 'ECU', 3658394, NULL, NULL),
(64, 'EE', 'Estonia', 'EUR', 'EN', '233', '59.676224', '57.516193', '28.209972', '21.837584', 'Tallinn', 'Europe', 'EU', 'et,ru', 'EST', 453733, NULL, NULL),
(65, 'EG', 'Egypt', 'EGP', 'EG', '818', '31.667334', '21.725389', '36.89833068847656', '24.698111', 'Cairo', 'Africa', 'AF', 'ar-EG,en,fr', 'EGY', 357994, NULL, NULL),
(66, 'EH', 'Western Sahara', 'MAD', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'El Aaiún', 'Africa', 'AF', 'ar,mey', 'ESH', 2461445, NULL, NULL),
(67, 'ER', 'Eritrea', 'ERN', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010, NULL, NULL),
(68, 'ES', 'Spain', 'EUR', 'SP', '724', '43.7913565913767', '36.0001044260548', '4.32778473043961', '-9.30151567231899', 'Madrid', 'Europe', 'EU', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769, NULL, NULL),
(69, 'ET', 'Ethiopia', 'ETB', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996, NULL, NULL),
(70, 'FI', 'Finland', 'EUR', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', 'fi-FI,sv-FI,smn', 'FIN', 660013, NULL, NULL),
(71, 'FJ', 'Fiji', 'FJD', 'FJ', '242', '-12.480111', '-20.67597', '-178.424438', '177.129334', 'Suva', 'Oceania', 'OC', 'en-FJ,fj', 'FJI', 2205218, NULL, NULL),
(72, 'FK', 'Falkland Islands', 'FKP', 'FK', '238', '-51.24065', '-52.360512', '-57.712486', '-61.345192', 'Stanley', 'South America', 'SA', 'en-FK', 'FLK', 3474414, NULL, NULL),
(73, 'FM', 'Micronesia', 'USD', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918, NULL, NULL),
(74, 'FO', 'Faroe Islands', 'DKK', 'FO', '234', '62.400749', '61.394943', '-6.399583', '-7.458', 'Tórshavn', 'Europe', 'EU', 'fo,da-FO', 'FRO', 2622320, NULL, NULL),
(75, 'FR', 'France', 'EUR', 'FR', '250', '51.092804', '41.371582', '9.561556', '-5.142222', 'Paris', 'Europe', 'EU', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382, NULL, NULL),
(76, 'GA', 'Gabon', 'XAF', 'GB', '266', '2.322612', '-3.978806', '14.502347', '8.695471', 'Libreville', 'Africa', 'AF', 'fr-GA', 'GAB', 2400553, NULL, NULL),
(77, 'GB', 'United Kingdom of Great Britain and Northern Ireland', 'GBP', 'UK', '826', '59.360249', '49.906193', '1.759', '-8.623555', 'London', 'Europe', 'EU', 'en-GB,cy-GB,gd', 'GBR', 2635167, NULL, NULL),
(78, 'GD', 'Grenada', 'XCD', 'GJ', '308', '12.318283928171299', '11.986893', '-61.57676970108031', '-61.802344', 'St. George\'s', 'North America', 'NA', 'en-GD', 'GRD', 3580239, NULL, NULL),
(79, 'GE', 'Georgia', 'GEL', 'GG', '268', '43.586498', '41.053196', '46.725971', '40.010139', 'Tbilisi', 'Asia', 'AS', 'ka,ru,hy,az', 'GEO', 614540, NULL, NULL),
(80, 'GF', 'French Guiana', 'EUR', 'FG', '254', '5.776496', '2.127094', '-51.613949', '-54.542511', 'Cayenne', 'South America', 'SA', 'fr-GF', 'GUF', 3381670, NULL, NULL),
(81, 'GG', 'Guernsey', 'GBP', 'GK', '831', '49.731727816705416', '49.40764156876899', '-2.1577152112246267', '-2.673194593476069', 'St Peter Port', 'Europe', 'EU', 'en,fr', 'GGY', 3042362, NULL, NULL),
(82, 'GH', 'Ghana', 'GHS', 'GH', '288', '11.173301', '4.736723', '1.191781', '-3.25542', 'Accra', 'Africa', 'AF', 'en-GH,ak,ee,tw', 'GHA', 2300660, NULL, NULL),
(83, 'GI', 'Gibraltar', 'GIP', 'GI', '292', '36.155439135670726', '36.10903070140248', '-5.338285164001491', '-5.36626149743654', 'Gibraltar', 'Europe', 'EU', 'en-GI,es,it,pt', 'GIB', 2411586, NULL, NULL),
(84, 'GL', 'Greenland', 'DKK', 'GL', '304', '83.627357', '59.777401', '-11.312319', '-73.04203', 'Nuuk', 'North America', 'NA', 'kl,da-GL,en', 'GRL', 3425505, NULL, NULL),
(85, 'GM', 'Gambia', 'GMD', 'GA', '270', '13.826571', '13.064252', '-13.797793', '-16.825079', 'Banjul', 'Africa', 'AF', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451, NULL, NULL),
(86, 'GN', 'Guinea', 'GNF', 'GV', '324', '12.67622', '7.193553', '-7.641071', '-14.926619', 'Conakry', 'Africa', 'AF', 'fr-GN', 'GIN', 2420477, NULL, NULL),
(87, 'GP', 'Guadeloupe', 'EUR', 'GP', '312', '16.516848', '15.867565', '-61', '-61.544765', 'Basse-Terre', 'North America', 'NA', 'fr-GP', 'GLP', 3579143, NULL, NULL),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 'EK', '226', '2.346989', '0.92086', '11.335724', '9.346865', 'Malabo', 'Africa', 'AF', 'es-GQ,fr', 'GNQ', 2309096, NULL, NULL),
(89, 'GR', 'Greece', 'EUR', 'GR', '300', '41.7484999849641', '34.8020663391466', '28.2470831714347', '19.3736035624134', 'Athens', 'Europe', 'EU', 'el-GR,en,fr', 'GRC', 390903, NULL, NULL),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 'SX', '239', '-53.970467', '-59.479259', '-26.229326', '-38.021175', 'Grytviken', 'Antarctica', 'AN', 'en', 'SGS', 3474415, NULL, NULL),
(91, 'GT', 'Guatemala', 'GTQ', 'GT', '320', '17.81522', '13.737302', '-88.223198', '-92.23629', 'Guatemala City', 'North America', 'NA', 'es-GT', 'GTM', 3595528, NULL, NULL),
(92, 'GU', 'Guam', 'USD', 'GQ', '316', '13.654402', '13.23376', '144.956894', '144.61806', 'Hagåtña', 'Oceania', 'OC', 'en-GU,ch-GU', 'GUM', 4043988, NULL, NULL),
(93, 'GW', 'Guinea-Bissau', 'XOF', 'PU', '624', '12.680789', '10.924265', '-13.636522', '-16.717535', 'Bissau', 'Africa', 'AF', 'pt-GW,pov', 'GNB', 2372248, NULL, NULL),
(94, 'GY', 'Guyana', 'GYD', 'GY', '328', '8.557567', '1.17508', '-56.480251', '-61.384762', 'Georgetown', 'South America', 'SA', 'en-GY', 'GUY', 3378535, NULL, NULL),
(95, 'HK', 'Hong Kong', 'HKD', 'HK', '344', '22.559778', '22.15325', '114.434753', '113.837753', 'Hong Kong', 'Asia', 'AS', 'zh-HK,yue,zh,en', 'HKG', 1819730, NULL, NULL),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', 'HM', '334', '-52.909416', '-53.192001', '73.859146', '72.596535', '', 'Antarctica', 'AN', '', 'HMD', 1547314, NULL, NULL),
(97, 'HN', 'Honduras', 'HNL', 'HO', '340', '16.510256', '12.982411', '-83.155403', '-89.350792', 'Tegucigalpa', 'North America', 'NA', 'es-HN', 'HND', 3608932, NULL, NULL),
(98, 'HR', 'Croatia', 'HRK', 'HR', '191', '46.53875', '42.43589', '19.427389', '13.493222', 'Zagreb', 'Europe', 'EU', 'hr-HR,sr', 'HRV', 3202326, NULL, NULL),
(99, 'HT', 'Haiti', 'HTG', 'HA', '332', '20.08782', '18.021032', '-71.613358', '-74.478584', 'Port-au-Prince', 'North America', 'NA', 'ht,fr-HT', 'HTI', 3723988, NULL, NULL),
(100, 'HU', 'Hungary', 'HUF', 'HU', '348', '48.585667', '45.74361', '22.906', '16.111889', 'Budapest', 'Europe', 'EU', 'hu-HU', 'HUN', 719819, NULL, NULL),
(101, 'ID', 'Indonesia', 'IDR', 'ID', '360', '5.904417', '-10.941861', '141.021805', '95.009331', 'Jakarta', 'Asia', 'AS', 'id,en,nl,jv', 'IDN', 1643084, NULL, NULL),
(102, 'IE', 'Ireland', 'EUR', 'EI', '372', '55.387917', '51.451584', '-6.002389', '-10.478556', 'Dublin', 'Europe', 'EU', 'en-IE,ga-IE', 'IRL', 2963597, NULL, NULL),
(103, 'IL', 'Israel', 'ILS', 'IS', '376', '33.340137', '29.496639', '35.876804', '34.270278754419145', '', 'Asia', 'AS', 'he,ar-IL,en-IL,', 'ISR', 294640, NULL, NULL),
(104, 'IM', 'Isle of Man', 'GBP', 'IM', '833', '54.419724', '54.055916', '-4.3115', '-4.798722', 'Douglas', 'Europe', 'EU', 'en,gv', 'IMN', 3042225, NULL, NULL),
(105, 'IN', 'India', 'INR', 'IN', '356', '35.504223', '6.747139', '97.403305', '68.186691', 'New Delhi', 'Asia', 'AS', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', 1269750, NULL, NULL),
(106, 'IO', 'British Indian Ocean Territory', 'USD', 'IO', '086', '-5.268333', '-7.438028', '72.493164', '71.259972', '', 'Asia', 'AS', 'en-IO', 'IOT', 1282588, NULL, NULL),
(107, 'IQ', 'Iraq', 'IQD', 'IZ', '368', '37.378029', '29.069445', '48.575916', '38.795887', 'Baghdad', 'Asia', 'AS', 'ar-IQ,ku,hy', 'IRQ', 99237, NULL, NULL),
(108, 'IR', 'Iran', 'IRR', 'IR', '364', '39.777222', '25.064083', '63.317471', '44.047279', 'Tehran', 'Asia', 'AS', 'fa-IR,ku', 'IRN', 130758, NULL, NULL),
(109, 'IS', 'Iceland', 'ISK', 'IC', '352', '66.53463', '63.393253', '-13.495815', '-24.546524', 'Reykjavik', 'Europe', 'EU', 'is,en,de,da,sv,no', 'ISL', 2629691, NULL, NULL),
(110, 'IT', 'Italy', 'EUR', 'IT', '380', '47.095196', '36.652779', '18.513445', '6.614889', 'Rome', 'Europe', 'EU', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395, NULL, NULL),
(111, 'JE', 'Jersey', 'GBP', 'JE', '832', '49.265057', '49.169834', '-2.022083', '-2.260028', 'Saint Helier', 'Europe', 'EU', 'en,pt', 'JEY', 3042142, NULL, NULL),
(112, 'JM', 'Jamaica', 'JMD', 'JM', '388', '18.526976', '17.703554', '-76.180321', '-78.366638', 'Kingston', 'North America', 'NA', 'en-JM', 'JAM', 3489940, NULL, NULL),
(113, 'JO', 'Jordan', 'JOD', 'JO', '400', '33.367668', '29.185888', '39.301167', '34.959999', 'Amman', 'Asia', 'AS', 'ar-JO,en', 'JOR', 248816, NULL, NULL),
(114, 'JP', 'Japan', 'JPY', 'JA', '392', '45.52314', '24.249472', '145.820892', '122.93853', 'Tokyo', 'Asia', 'AS', 'ja', 'JPN', 1861060, NULL, NULL),
(115, 'KE', 'Kenya', 'KES', 'KE', '404', '5.019938', '-4.678047', '41.899078', '33.908859', 'Nairobi', 'Africa', 'AF', 'en-KE,sw-KE', 'KEN', 192950, NULL, NULL),
(116, 'KG', 'Kyrgyzstan', 'KGS', 'KG', '417', '43.238224', '39.172832', '80.283165', '69.276611', 'Bishkek', 'Asia', 'AS', 'ky,uz,ru', 'KGZ', 1527747, NULL, NULL),
(117, 'KH', 'Cambodia', 'KHR', 'CB', '116', '14.686417', '10.409083', '107.627724', '102.339996', 'Phnom Penh', 'Asia', 'AS', 'km,fr,en', 'KHM', 1831722, NULL, NULL),
(118, 'KI', 'Kiribati', 'AUD', 'KR', '296', '4.71957', '-11.446881150186856', '-150.215347', '169.556137', 'Tarawa', 'Oceania', 'OC', 'en-KI,gil', 'KIR', 4030945, NULL, NULL),
(119, 'KM', 'Comoros', 'KMF', 'CN', '174', '-11.362381', '-12.387857', '44.538223', '43.21579', 'Moroni', 'Africa', 'AF', 'ar,fr-KM', 'COM', 921929, NULL, NULL),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 'SC', '659', '17.420118', '17.095343', '-62.543266', '-62.86956', 'Basseterre', 'North America', 'NA', 'en-KN', 'KNA', 3575174, NULL, NULL),
(121, 'KP', 'North Korea', 'KPW', 'KN', '408', '43.006054', '37.673332', '130.674866', '124.315887', 'Pyongyang', 'Asia', 'AS', 'ko-KP', 'PRK', 1873107, NULL, NULL),
(122, 'KR', 'South Korea', 'KRW', 'KS', '410', '38.612446', '33.190945', '129.584671', '125.887108', 'Seoul', 'Asia', 'AS', 'ko-KR,en', 'KOR', 1835841, NULL, NULL),
(123, 'KW', 'Kuwait', 'KWD', 'KU', '414', '30.095945', '28.524611', '48.431473', '46.555557', 'Kuwait City', 'Asia', 'AS', 'ar-KW,en', 'KWT', 285570, NULL, NULL),
(124, 'KY', 'Cayman Islands', 'KYD', 'CJ', '136', '19.7617', '19.263029', '-79.727272', '-81.432777', 'George Town', 'North America', 'NA', 'en-KY', 'CYM', 3580718, NULL, NULL),
(125, 'KZ', 'Kazakhstan', 'KZT', 'KZ', '398', '55.451195', '40.936333', '87.312668', '46.491859', 'Astana', 'Asia', 'AS', 'kk,ru', 'KAZ', 1522867, NULL, NULL),
(126, 'LA', 'Laos', 'LAK', 'LA', '418', '22.500389', '13.910027', '107.697029', '100.093056', 'Vientiane', 'Asia', 'AS', 'lo,fr,en', 'LAO', 1655842, NULL, NULL),
(127, 'LB', 'Lebanon', 'LBP', 'LE', '422', '34.691418', '33.05386', '36.639194', '35.114277', 'Beirut', 'Asia', 'AS', 'ar-LB,fr-LB,en,hy', 'LBN', 272103, NULL, NULL),
(128, 'LC', 'Saint Lucia', 'XCD', 'ST', '662', '14.103245', '13.704778', '-60.874203', '-61.07415', 'Castries', 'North America', 'NA', 'en-LC', 'LCA', 3576468, NULL, NULL),
(129, 'LI', 'Liechtenstein', 'CHF', 'LS', '438', '47.2706251386959', '47.0484284123471', '9.63564281136796', '9.47167359782014', 'Vaduz', 'Europe', 'EU', 'de-LI', 'LIE', 3042058, NULL, NULL),
(130, 'LK', 'Sri Lanka', 'LKR', 'CE', '144', '9.831361', '5.916833', '81.881279', '79.652916', 'Colombo', 'Asia', 'AS', 'si,ta,en', 'LKA', 1227603, NULL, NULL),
(131, 'LR', 'Liberia', 'LRD', 'LI', '430', '8.551791', '4.353057', '-7.365113', '-11.492083', 'Monrovia', 'Africa', 'AF', 'en-LR', 'LBR', 2275384, NULL, NULL),
(132, 'LS', 'Lesotho', 'LSL', 'LT', '426', '-28.572058', '-30.668964', '29.465761', '27.029068', 'Maseru', 'Africa', 'AF', 'en-LS,st,zu,xh', 'LSO', 932692, NULL, NULL),
(133, 'LT', 'Lithuania', 'EUR', 'LH', '440', '56.446918', '53.901306', '26.871944', '20.941528', 'Vilnius', 'Europe', 'EU', 'lt,ru,pl', 'LTU', 597427, NULL, NULL),
(134, 'LU', 'Luxembourg', 'EUR', 'LU', '442', '50.184944', '49.446583', '6.528472', '5.734556', 'Luxembourg', 'Europe', 'EU', 'lb,de-LU,fr-LU', 'LUX', 2960313, NULL, NULL),
(135, 'LV', 'Latvia', 'EUR', 'LG', '428', '58.082306', '55.668861', '28.241167', '20.974277', 'Riga', 'Europe', 'EU', 'lv,ru,lt', 'LVA', 458258, NULL, NULL),
(136, 'LY', 'Libya', 'LYD', 'LY', '434', '33.168999', '19.508045', '25.150612', '9.38702', 'Tripoli', 'Africa', 'AF', 'ar-LY,it,en', 'LBY', 2215636, NULL, NULL),
(137, 'MA', 'Morocco', 'MAD', 'MO', '504', '35.9224966985384', '27.662115', '-0.991750000000025', '-13.168586', 'Rabat', 'Africa', 'AF', 'ar-MA,fr', 'MAR', 2542007, NULL, NULL),
(138, 'MC', 'Monaco', 'EUR', 'MN', '492', '43.75196717037228', '43.72472839869377', '7.439939260482788', '7.408962249755859', 'Monaco', 'Europe', 'EU', 'fr-MC,en,it', 'MCO', 2993457, NULL, NULL),
(139, 'MD', 'Moldova', 'MDL', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chişinău', 'Europe', 'EU', 'ro,ru,gag,tr', 'MDA', 617790, NULL, NULL),
(140, 'ME', 'Montenegro', 'EUR', 'MJ', '499', '43.570137', '41.850166', '20.358833', '18.461306', 'Podgorica', 'Europe', 'EU', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884, NULL, NULL),
(141, 'MF', 'Saint Martin', 'EUR', 'RN', '663', '18.130354', '18.052231', '-63.012993', '-63.152767', 'Marigot', 'North America', 'NA', 'fr', 'MAF', 3578421, NULL, NULL),
(142, 'MG', 'Madagascar', 'MGA', 'MA', '450', '-11.945433', '-25.608952', '50.48378', '43.224876', 'Antananarivo', 'Africa', 'AF', 'fr-MG,mg', 'MDG', 1062947, NULL, NULL),
(143, 'MH', 'Marshall Islands', 'USD', 'RM', '584', '14.62', '5.587639', '171.931808', '165.524918', 'Majuro', 'Oceania', 'OC', 'mh,en-MH', 'MHL', 2080185, NULL, NULL),
(144, 'MK', 'Macedonia', 'MKD', 'MK', '807', '42.361805', '40.860195', '23.038139', '20.464695', 'Skopje', 'Europe', 'EU', 'mk,sq,tr,rmm,sr', 'MKD', 718075, NULL, NULL),
(145, 'ML', 'Mali', 'XOF', 'ML', '466', '25.000002', '10.159513', '4.244968', '-12.242614', 'Bamako', 'Africa', 'AF', 'fr-ML,bm', 'MLI', 2453866, NULL, NULL),
(146, 'MM', 'Myanmar [Burma]', 'MMK', 'BM', '104', '28.543249', '9.784583', '101.176781', '92.189278', 'Nay Pyi Taw', 'Asia', 'AS', 'my', 'MMR', 1327865, NULL, NULL),
(147, 'MN', 'Mongolia', 'MNT', 'MG', '496', '52.154251', '41.567638', '119.924309', '87.749664', 'Ulan Bator', 'Asia', 'AS', 'mn,ru', 'MNG', 2029969, NULL, NULL),
(148, 'MO', 'Macao', 'MOP', 'MC', '446', '22.222334', '22.180389', '113.565834', '113.528946', 'Macao', 'Asia', 'AS', 'zh,zh-MO,pt', 'MAC', 1821275, NULL, NULL),
(149, 'MP', 'Northern Mariana Islands', 'USD', 'CQ', '580', '20.55344', '14.11023', '146.06528', '144.88626', 'Saipan', 'Oceania', 'OC', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468, NULL, NULL),
(150, 'MQ', 'Martinique', 'EUR', 'MB', '474', '14.878819', '14.392262', '-60.81551', '-61.230118', 'Fort-de-France', 'North America', 'NA', 'fr-MQ', 'MTQ', 3570311, NULL, NULL),
(151, 'MR', 'Mauritania', 'MRO', 'MR', '478', '27.298073', '14.715547', '-4.827674', '-17.066521', 'Nouakchott', 'Africa', 'AF', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080, NULL, NULL),
(152, 'MS', 'Montserrat', 'XCD', 'MH', '500', '16.824060205313184', '16.674768935441556', '-62.144100129608205', '-62.24138237036129', 'Plymouth', 'North America', 'NA', 'en-MS', 'MSR', 3578097, NULL, NULL),
(153, 'MT', 'Malta', 'EUR', 'MT', '470', '36.0821530995456', '35.8061835000002', '14.5764915000002', '14.1834251000001', 'Valletta', 'Europe', 'EU', 'mt,en-MT', 'MLT', 2562770, NULL, NULL),
(154, 'MU', 'Mauritius', 'MUR', 'MP', '480', '-10.319255', '-20.525717', '63.500179', '56.512718', 'Port Louis', 'Africa', 'AF', 'en-MU,bho,fr', 'MUS', 934292, NULL, NULL),
(155, 'MV', 'Maldives', 'MVR', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Malé', 'Asia', 'AS', 'dv,en', 'MDV', 1282028, NULL, NULL),
(156, 'MW', 'Malawi', 'MWK', 'MI', '454', '-9.367541', '-17.125', '35.916821', '32.67395', 'Lilongwe', 'Africa', 'AF', 'ny,yao,tum,swk', 'MWI', 927384, NULL, NULL),
(157, 'MX', 'Mexico', 'MXN', 'MX', '484', '32.716759', '14.532866', '-86.703392', '-118.453949', 'Mexico City', 'North America', 'NA', 'es-MX', 'MEX', 3996063, NULL, NULL),
(158, 'MY', 'Malaysia', 'MYR', 'MY', '458', '7.363417', '0.855222', '119.267502', '99.643448', 'Kuala Lumpur', 'Asia', 'AS', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045, NULL, NULL),
(159, 'MZ', 'Mozambique', 'MZN', 'MZ', '508', '-10.471883', '-26.868685', '40.842995', '30.217319', 'Maputo', 'Africa', 'AF', 'pt-MZ,vmw', 'MOZ', 1036973, NULL, NULL),
(160, 'NA', 'Namibia', 'NAD', 'WA', '516', '-16.959894', '-28.97143', '25.256701', '11.71563', 'Windhoek', 'Africa', 'AF', 'en-NA,af,de,hz,naq', 'NAM', 3355338, NULL, NULL),
(161, 'NC', 'New Caledonia', 'XPF', 'NC', '540', '-19.549778', '-22.698', '168.129135', '163.564667', 'Noumea', 'Oceania', 'OC', 'fr-NC', 'NCL', 2139685, NULL, NULL),
(162, 'NE', 'Niger', 'XOF', 'NG', '562', '23.525026', '11.696975', '15.995643', '0.16625', 'Niamey', 'Africa', 'AF', 'fr-NE,ha,kr,dje', 'NER', 2440476, NULL, NULL),
(163, 'NF', 'Norfolk Island', 'AUD', 'NF', '574', '-28.995170686948427', '-29.063076742954735', '167.99773740209957', '167.91543230151365', 'Kingston', 'Oceania', 'OC', 'en-NF', 'NFK', 2155115, NULL, NULL),
(164, 'NG', 'Nigeria', 'NGN', 'NI', '566', '13.892007', '4.277144', '14.680073', '2.668432', 'Abuja', 'Africa', 'AF', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926, NULL, NULL),
(165, 'NI', 'Nicaragua', 'NIO', 'NU', '558', '15.025909', '10.707543', '-82.738289', '-87.690308', 'Managua', 'North America', 'NA', 'es-NI,en', 'NIC', 3617476, NULL, NULL),
(166, 'NL', 'Netherlands', 'EUR', 'NL', '528', '53.512196', '50.753918', '7.227944', '3.362556', 'Amsterdam', 'Europe', 'EU', 'nl-NL,fy-NL', 'NLD', 2750405, NULL, NULL),
(167, 'NO', 'Norway', 'NOK', 'NO', '578', '71.18811', '57.977917', '31.078052520751953', '4.650167', 'Oslo', 'Europe', 'EU', 'no,nb,nn,se,fi', 'NOR', 3144096, NULL, NULL),
(168, 'NP', 'Nepal', 'NPR', 'NP', '524', '30.43339', '26.356722', '88.199333', '80.056274', 'Kathmandu', 'Asia', 'AS', 'ne,en', 'NPL', 1282988, NULL, NULL),
(169, 'NR', 'Nauru', 'AUD', 'NR', '520', '-0.504306', '-0.552333', '166.945282', '166.899033', '', 'Oceania', 'OC', 'na,en-NR', 'NRU', 2110425, NULL, NULL),
(170, 'NU', 'Niue', 'NZD', 'NE', '570', '-18.951069', '-19.152193', '-169.775177', '-169.951004', 'Alofi', 'Oceania', 'OC', 'niu,en-NU', 'NIU', 4036232, NULL, NULL),
(171, 'NZ', 'New Zealand', 'NZD', 'NZ', '554', '-34.389668', '-47.286026', '-180', '166.7155', 'Wellington', 'Oceania', 'OC', 'en-NZ,mi', 'NZL', 2186224, NULL, NULL),
(172, 'OM', 'Oman', 'OMR', 'MU', '512', '26.387972', '16.64575', '59.836582', '51.882', 'Muscat', 'Asia', 'AS', 'ar-OM,en,bal,ur', 'OMN', 286963, NULL, NULL),
(173, 'PA', 'Panama', 'PAB', 'PM', '591', '9.637514', '7.197906', '-77.17411', '-83.051445', 'Panama City', 'North America', 'NA', 'es-PA,en', 'PAN', 3703430, NULL, NULL),
(174, 'PE', 'Peru', 'PEN', 'PE', '604', '-0.012977', '-18.349728', '-68.677986', '-81.326744', 'Lima', 'South America', 'SA', 'es-PE,qu,ay', 'PER', 3932488, NULL, NULL),
(175, 'PF', 'French Polynesia', 'XPF', 'FP', '258', '-7.903573', '-27.653572', '-134.929825', '-152.877167', 'Papeete', 'Oceania', 'OC', 'fr-PF,ty', 'PYF', 4030656, NULL, NULL),
(176, 'PG', 'Papua New Guinea', 'PGK', 'PP', '598', '-1.318639', '-11.657861', '155.96344', '140.842865', 'Port Moresby', 'Oceania', 'OC', 'en-PG,ho,meu,tpi', 'PNG', 2088628, NULL, NULL),
(177, 'PH', 'Philippines', 'PHP', 'RP', '608', '21.120611', '4.643306', '126.601524', '116.931557', 'Manila', 'Asia', 'AS', 'tl,en-PH,fil', 'PHL', 1694008, NULL, NULL),
(178, 'PK', 'Pakistan', 'PKR', 'PK', '586', '37.097', '23.786722', '77.840919', '60.878613', 'Islamabad', 'Asia', 'AS', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579, NULL, NULL),
(179, 'PL', 'Poland', 'PLN', 'PL', '616', '54.839138', '49.006363', '24.150749', '14.123', 'Warsaw', 'Europe', 'EU', 'pl', 'POL', 798544, NULL, NULL),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 'SB', '666', '47.146286', '46.786041', '-56.252991', '-56.420658', 'Saint-Pierre', 'North America', 'NA', 'fr-PM', 'SPM', 3424932, NULL, NULL),
(181, 'PN', 'Pitcairn Islands', 'NZD', 'PC', '612', '-24.315865', '-24.672565', '-124.77285', '-128.346436', 'Adamstown', 'Oceania', 'OC', 'en-PN', 'PCN', 4030699, NULL, NULL),
(182, 'PR', 'Puerto Rico', 'USD', 'RQ', '630', '18.520166', '17.926405', '-65.242737', '-67.942726', 'San Juan', 'North America', 'NA', 'en-PR,es-PR', 'PRI', 4566966, NULL, NULL),
(183, 'PS', 'Palestine', 'ILS', 'WE', '275', '32.54638671875', '31.216541290283203', '35.5732955932617', '34.21665954589844', '', 'Asia', 'AS', 'ar-PS', 'PSE', 6254930, NULL, NULL),
(184, 'PT', 'Portugal', 'EUR', 'PO', '620', '42.154311127408', '36.96125', '-6.18915930748288', '-9.50052660716588', 'Lisbon', 'Europe', 'EU', 'pt-PT,mwl', 'PRT', 2264397, NULL, NULL),
(185, 'PW', 'Palau', 'USD', 'PS', '585', '8.46966', '2.8036', '134.72307', '131.11788', 'Melekeok - Palau State Capital', 'Oceania', 'OC', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582, NULL, NULL),
(186, 'PY', 'Paraguay', 'PYG', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunción', 'South America', 'SA', 'es-PY,gn', 'PRY', 3437598, NULL, NULL),
(187, 'QA', 'Qatar', 'QAR', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', 'ar-QA,es', 'QAT', 289688, NULL, NULL),
(188, 'RE', 'Réunion', 'EUR', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', 'fr-RE', 'REU', 935317, NULL, NULL),
(189, 'RO', 'Romania', 'RON', 'RO', '642', '48.266945', '43.627304', '29.691055', '20.269972', 'Bucharest', 'Europe', 'EU', 'ro,hu,rom', 'ROU', 798549, NULL, NULL),
(190, 'RS', 'Serbia', 'RSD', 'RI', '688', '46.18138885498047', '42.232215881347656', '23.00499725341797', '18.817020416259766', 'Belgrade', 'Europe', 'EU', 'sr,hu,bs,rom', 'SRB', 6290252, NULL, NULL),
(191, 'RU', 'Russia', 'RUB', 'RS', '643', '81.857361', '41.188862', '-169.05', '19.25', 'Moscow', 'Europe', 'EU', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', 2017370, NULL, NULL),
(192, 'RW', 'Rwanda', 'RWF', 'RW', '646', '-1.053481', '-2.840679', '30.895958', '28.856794', 'Kigali', 'Africa', 'AF', 'rw,en-RW,fr-RW,sw', 'RWA', 49518, NULL, NULL),
(193, 'SA', 'Saudi Arabia', 'SAR', 'SA', '682', '32.158333', '15.61425', '55.666584', '34.495693', 'Riyadh', 'Asia', 'AS', 'ar-SA', 'SAU', 102358, NULL, NULL),
(194, 'SB', 'Solomon Islands', 'SBD', 'BP', '090', '-6.589611', '-11.850555', '166.980865', '155.508606', 'Honiara', 'Oceania', 'OC', 'en-SB,tpi', 'SLB', 2103350, NULL, NULL),
(195, 'SC', 'Seychelles', 'SCR', 'SE', '690', '-4.283717', '-9.753867', '56.29770287937299', '46.204769', 'Victoria', 'Africa', 'AF', 'en-SC,fr-SC', 'SYC', 241170, NULL, NULL),
(196, 'SD', 'Sudan', 'SDG', 'SU', '729', '22.232219696044922', '8.684720993041992', '38.60749816894531', '21.827774047851562', 'Khartoum', 'Africa', 'AF', 'ar-SD,en,fia', 'SDN', 366755, NULL, NULL),
(197, 'SE', 'Sweden', 'SEK', 'SW', '752', '69.0625', '55.337112', '24.1562924839185', '11.118694', 'Stockholm', 'Europe', 'EU', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886, NULL, NULL),
(198, 'SG', 'Singapore', 'SGD', 'SN', '702', '1.471278', '1.258556', '104.007469', '103.638275', 'Singapore', 'Asia', 'AS', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251, NULL, NULL),
(199, 'SH', 'Saint Helena', 'SHP', 'SH', '654', '-7.887815', '-16.019543', '-5.638753', '-14.42123', 'Jamestown', 'Africa', 'AF', 'en-SH', 'SHN', 3370751, NULL, NULL),
(200, 'SI', 'Slovenia', 'EUR', 'SI', '705', '46.8766275518195', '45.421812998164', '16.6106311807', '13.3753342064709', 'Ljubljana', 'Europe', 'EU', 'sl,sh', 'SVN', 3190538, NULL, NULL),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 'SV', '744', '80.762085', '79.220306', '33.287334', '17.699389', 'Longyearbyen', 'Europe', 'EU', 'no,ru', 'SJM', 607072, NULL, NULL),
(202, 'SK', 'Slovakia', 'EUR', 'LO', '703', '49.603168', '47.728111', '22.570444', '16.84775', 'Bratislava', 'Europe', 'EU', 'sk,hu', 'SVK', 3057568, NULL, NULL),
(203, 'SL', 'Sierra Leone', 'SLL', 'SL', '694', '10', '6.929611', '-10.284238', '-13.307631', 'Freetown', 'Africa', 'AF', 'en-SL,men,tem', 'SLE', 2403846, NULL, NULL),
(204, 'SM', 'San Marino', 'EUR', 'SM', '674', '43.99223730851663', '43.8937092171425', '12.51653186779788', '12.403538978820734', 'San Marino', 'Europe', 'EU', 'it-SM', 'SMR', 3168068, NULL, NULL),
(205, 'SN', 'Senegal', 'XOF', 'SG', '686', '16.691633', '12.307275', '-11.355887', '-17.535236', 'Dakar', 'Africa', 'AF', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662, NULL, NULL),
(206, 'SO', 'Somalia', 'SOS', 'SO', '706', '11.979166', '-1.674868', '51.412636', '40.986595', 'Mogadishu', 'Africa', 'AF', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537, NULL, NULL),
(207, 'SR', 'Suriname', 'SRD', 'NS', '740', '6.004546', '1.831145', '-53.977493', '-58.086563', 'Paramaribo', 'South America', 'SA', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998, NULL, NULL),
(208, 'SS', 'South Sudan', 'SSP', 'OD', '728', '12.219148635864258', '3.493394374847412', '35.9405517578125', '24.140274047851562', 'Juba', 'Africa', 'AF', 'en', 'SSD', 7909807, NULL, NULL),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'São Tomé', 'Africa', 'AF', 'pt-ST', 'STP', 2410758, NULL, NULL),
(210, 'SV', 'El Salvador', 'USD', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', 'es-SV', 'SLV', 3585968, NULL, NULL),
(211, 'SX', 'Sint Maarten', 'ANG', 'NN', '534', '18.070248', '18.011692', '-63.012993', '-63.144039', 'Philipsburg', 'North America', 'NA', 'nl,en', 'SXM', 7609695, NULL, NULL),
(212, 'SY', 'Syria', 'SYP', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843, NULL, NULL),
(213, 'SZ', 'Swaziland', 'SZL', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', 'en-SZ,ss-SZ', 'SWZ', 934841, NULL, NULL),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', 'en-TC', 'TCA', 3576916, NULL, NULL),
(215, 'TD', 'Chad', 'XAF', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', 'fr-TD,ar-TD,sre', 'TCD', 2434508, NULL, NULL),
(216, 'TF', 'French Southern Territories', 'EUR', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Français', 'Antarctica', 'AN', 'fr', 'ATF', 1546748, NULL, NULL),
(217, 'TG', 'Togo', 'XOF', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lomé', 'Africa', 'AF', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686, NULL, NULL),
(218, 'TH', 'Thailand', 'THB', 'TH', '764', '20.463194', '5.61', '105.639389', '97.345642', 'Bangkok', 'Asia', 'AS', 'th,en', 'THA', 1605651, NULL, NULL),
(219, 'TJ', 'Tajikistan', 'TJS', 'TI', '762', '41.042252', '36.674137', '75.137222', '67.387138', 'Dushanbe', 'Asia', 'AS', 'tg,ru', 'TJK', 1220409, NULL, NULL),
(220, 'TK', 'Tokelau', 'NZD', 'TL', '772', '-8.553613662719727', '-9.381111145019531', '-171.21142578125', '-172.50033569335938', '', 'Oceania', 'OC', 'tkl,en-TK', 'TKL', 4031074, NULL, NULL),
(221, 'TL', 'East Timor', 'USD', 'TT', '626', '-8.135833740234375', '-9.463626861572266', '127.30859375', '124.04609680175781', 'Dili', 'Oceania', 'OC', 'tet,pt-TL,id,en', 'TLS', 1966436, NULL, NULL),
(222, 'TM', 'Turkmenistan', 'TMT', 'TX', '795', '42.795555', '35.141083', '66.684303', '52.441444', 'Ashgabat', 'Asia', 'AS', 'tk,ru,uz', 'TKM', 1218197, NULL, NULL),
(223, 'TN', 'Tunisia', 'TND', 'TS', '788', '37.543915', '30.240417', '11.598278', '7.524833', 'Tunis', 'Africa', 'AF', 'ar-TN,fr', 'TUN', 2464461, NULL, NULL),
(224, 'TO', 'Tonga', 'TOP', 'TN', '776', '-15.562988', '-21.455057', '-173.907578', '-175.682266', 'Nuku\'alofa', 'Oceania', 'OC', 'to,en-TO', 'TON', 4032283, NULL, NULL),
(225, 'TR', 'Turkey', 'TRY', 'TU', '792', '42.107613', '35.815418', '44.834999', '25.668501', 'Ankara', 'Asia', 'AS', 'tr-TR,ku,diq,az,av', 'TUR', 298795, NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 'TD', '780', '11.338342', '10.036105', '-60.517933', '-61.923771', 'Port of Spain', 'North America', 'NA', 'en-TT,hns,fr,es,zh', 'TTO', 3573591, NULL, NULL),
(227, 'TV', 'Tuvalu', 'AUD', 'TV', '798', '-5.641972', '-10.801169', '179.863281', '176.064865', 'Funafuti', 'Oceania', 'OC', 'tvl,en,sm,gil', 'TUV', 2110297, NULL, NULL),
(228, 'TW', 'Taiwan', 'TWD', 'TW', '158', '25.3002899036181', '21.896606934717', '122.006739823315', '119.534691', 'Taipei', 'Asia', 'AS', 'zh-TW,zh,nan,hak', 'TWN', 1668284, NULL, NULL),
(229, 'TZ', 'Tanzania', 'TZS', 'TZ', '834', '-0.990736', '-11.745696', '40.443222', '29.327168', 'Dodoma', 'Africa', 'AF', 'sw-TZ,en,ar', 'TZA', 149590, NULL, NULL),
(230, 'UA', 'Ukraine', 'UAH', 'UP', '804', '52.369362', '44.390415', '40.20739', '22.128889', 'Kyiv', 'Europe', 'EU', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791, NULL, NULL),
(231, 'UG', 'Uganda', 'UGX', 'UG', '800', '4.214427', '-1.48405', '35.036049', '29.573252', 'Kampala', 'Africa', 'AF', 'en-UG,lg,sw,ar', 'UGA', 226074, NULL, NULL),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '', '581', '28.219814', '-0.389006', '166.654526', '-177.392029', '', 'Oceania', 'OC', 'en-UM', 'UMI', 5854968, NULL, NULL),
(233, 'US', 'United States', 'USD', 'US', '840', '49.388611', '24.544245', '-66.954811', '-124.733253', 'Washington', 'North America', 'NA', 'en-US,es-US,haw,fr', 'USA', 6252001, NULL, NULL),
(234, 'UY', 'Uruguay', 'UYU', 'UY', '858', '-30.082224', '-34.980816', '-53.073933', '-58.442722', 'Montevideo', 'South America', 'SA', 'es-UY', 'URY', 3439705, NULL, NULL),
(235, 'UZ', 'Uzbekistan', 'UZS', 'UZ', '860', '45.575001', '37.184444', '73.132278', '55.996639', 'Tashkent', 'Asia', 'AS', 'uz,ru,tg', 'UZB', 1512440, NULL, NULL),
(236, 'VA', 'Vatican City', 'EUR', 'VT', '336', '41.90743830885576', '41.90027960306854', '12.45837546629481', '12.44570678169205', 'Vatican', 'Europe', 'EU', 'la,it,fr', 'VAT', 3164670, NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 'VC', '670', '13.377834', '12.583984810969037', '-61.11388', '-61.46090317727658', 'Kingstown', 'North America', 'NA', 'en-VC,fr', 'VCT', 3577815, NULL, NULL),
(238, 'VE', 'Venezuela', 'VEF', 'VE', '862', '12.201903', '0.626311', '-59.80378', '-73.354073', 'Caracas', 'South America', 'SA', 'es-VE', 'VEN', 3625428, NULL, NULL),
(239, 'VG', 'British Virgin Islands', 'USD', 'VI', '092', '18.757221', '18.383710898211305', '-64.268768', '-64.71312752730364', 'Road Town', 'North America', 'NA', 'en-VG', 'VGB', 3577718, NULL, NULL),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 'VQ', '850', '18.415382', '17.673931', '-64.565193', '-65.101333', 'Charlotte Amalie', 'North America', 'NA', 'en-VI', 'VIR', 4796775, NULL, NULL),
(241, 'VN', 'Vietnam', 'VND', 'VM', '704', '23.388834', '8.559611', '109.464638', '102.148224', 'Hanoi', 'Asia', 'AS', 'vi,en,fr,zh,km', 'VNM', 1562822, NULL, NULL),
(242, 'VU', 'Vanuatu', 'VUV', 'NH', '548', '-13.073444', '-20.248945', '169.904785', '166.524979', 'Port Vila', 'Oceania', 'OC', 'bi,en-VU,fr-VU', 'VUT', 2134431, NULL, NULL),
(243, 'WF', 'Wallis and Futuna', 'XPF', 'WF', '876', '-13.216758181061444', '-14.314559989820843', '-176.16174317718253', '-178.1848112896414', 'Mata-Utu', 'Oceania', 'OC', 'wls,fud,fr-WF', 'WLF', 4034749, NULL, NULL),
(244, 'WS', 'Samoa', 'WST', 'WS', '882', '-13.432207', '-14.040939', '-171.415741', '-172.798599', 'Apia', 'Oceania', 'OC', 'sm,en-WS', 'WSM', 4034894, NULL, NULL),
(245, 'XK', 'Kosovo', 'EUR', 'KV', '0', '43.2682495807952', '41.856369601859925', '21.80335088694943', '19.977481504492914', 'Pristina', 'Europe', 'EU', 'sq,sr', 'XKX', 831053, NULL, NULL),
(246, 'YE', 'Yemen', 'YER', 'YM', '887', '18.9999989031009', '12.1110910264462', '54.5305388163283', '42.5325394314234', 'Sanaa', 'Asia', 'AS', 'ar-YE', 'YEM', 69543, NULL, NULL),
(247, 'YT', 'Mayotte', 'EUR', 'MF', '175', '-12.648891', '-13.000132', '45.29295', '45.03796', 'Mamoutzou', 'Africa', 'AF', 'fr-YT', 'MYT', 1024031, NULL, NULL),
(248, 'ZA', 'South Africa', 'ZAR', 'SF', '710', '-22.126612', '-34.839828', '32.895973', '16.458021', 'Pretoria', 'Africa', 'AF', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', 953987, NULL, NULL),
(249, 'ZM', 'Zambia', 'ZMW', 'ZA', '894', '-8.22436', '-18.079473', '33.705704', '21.999371', 'Lusaka', 'Africa', 'AF', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949, NULL, NULL),
(250, 'ZW', 'Zimbabwe', 'ZWL', 'ZI', '716', '-15.608835', '-22.417738', '33.056305', '25.237028', 'Harare', 'Africa', 'AF', 'en-ZW,sn,nr,nd', 'ZWE', 878675, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount_logs`
--

CREATE TABLE `discount_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driving_licence_expire_date` date DEFAULT NULL,
  `driving_licence_photo_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence_photo_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `australian_taxi_licence_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `australian_taxi_licence_expire_date` date DEFAULT NULL,
  `atln_photo_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atln_photo_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_varification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_varification_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '''1''=verified, ''0''=notverified',
  `mail_verification` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_verification_status` int(11) DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '''1''=yes, ''0''=no',
  `driver_type_id` int(11) DEFAULT NULL,
  `cab_id` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_point` decimal(10,2) DEFAULT NULL,
  `rating_value` decimal(10,2) DEFAULT NULL,
  `last_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `is_online` int(11) NOT NULL DEFAULT '0',
  `trash_status` int(11) DEFAULT '0',
  `current_location_gps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `first_login_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '''1''=yes, ''0''=no ',
  `registration_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `full_name`, `email`, `phone`, `gender`, `date_of_birth`, `profile_photo`, `driving_licence_no`, `driving_licence_expire_date`, `driving_licence_photo_front`, `driving_licence_photo_back`, `australian_taxi_licence_no`, `australian_taxi_licence_expire_date`, `atln_photo_front`, `atln_photo_back`, `phone_varification`, `phone_varification_status`, `mail_verification`, `mail_verification_status`, `password`, `social_login`, `driver_type_id`, `cab_id`, `country`, `city`, `state`, `post_code`, `address`, `pin`, `provider_id`, `access_token`, `d_point`, `rating_value`, `last_ip_address`, `ip_address`, `last_login`, `active`, `is_online`, `trash_status`, `current_location_gps`, `latitude`, `longitude`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `first_login_status`, `registration_status`) VALUES
(1, 'alamin rony', 'alaminrony49@gmail.com', '+8801912168339', 'Male', NULL, 'uploads/driver/profile_photo/5fb3bc663c091.20201117.png', '4322323', '2020-11-06', 'uploads/driver/d_licence_photo/5fb3bc667b794.20201117.png', 'uploads/driver/d_licence_photo/5fb3bc66bb667.20201117.png', '43243232', '2020-11-07', 'uploads/driver/a_taxi_licence_photo/5fb3bc6710e0c.20201117.png', 'uploads/driver/a_taxi_licence_photo/5fb3bc674eff3.20201117.png', '123456', '1', NULL, 0, '$2y$10$adFdlOp.t2Q1IHEqncTjp.HRJsRAMJemDq3xL44pVbqkkT7sUjXke', '0', NULL, NULL, NULL, 'fdsfdsfds', 'sssdfdsds', '3212', '414223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 06:04:55', '2020-11-24 00:10:50', NULL, NULL, NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `driver_activity_logs`
--

CREATE TABLE `driver_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_activity_logs`
--

INSERT INTO `driver_activity_logs` (`id`, `driver_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2020-05-18 08:39:17', '2020-05-18 08:39:17'),
(2, 2, '1', '2020-08-08 04:55:42', '2020-08-08 04:55:42'),
(3, 1, '1', '2020-08-08 04:58:09', '2020-08-08 04:58:09'),
(4, 1, '1', '2020-08-09 05:05:27', '2020-08-09 05:05:27'),
(5, 2, '2', '2020-08-09 05:33:29', '2020-08-09 05:33:29'),
(6, 1, '1', '2020-08-16 10:14:13', '2020-08-16 10:14:13'),
(7, 2, '1', '2020-08-16 10:15:44', '2020-08-16 10:15:44'),
(8, 3, '1', '2020-08-16 10:16:35', '2020-08-16 10:16:35'),
(9, 4, '1', '2020-08-16 10:17:16', '2020-08-16 10:17:16'),
(10, 1, '1', '2020-08-16 11:08:32', '2020-08-16 11:08:32'),
(11, 3, '1', '2020-08-24 04:29:21', '2020-08-24 04:29:21'),
(12, 4, '1', '2020-08-24 06:29:03', '2020-08-24 06:29:03'),
(13, 5, '1', '2020-08-24 07:29:31', '2020-08-24 07:29:31'),
(14, 2, '1', '2020-08-27 07:35:25', '2020-08-27 07:35:25'),
(15, 2, '1', '2020-08-27 07:47:26', '2020-08-27 07:47:26'),
(16, 8, '1', '2020-09-05 04:57:37', '2020-09-05 04:57:37'),
(17, 9, '1', '2020-09-05 05:27:57', '2020-09-05 05:27:57'),
(18, 10, '1', '2020-09-05 05:43:28', '2020-09-05 05:43:28'),
(19, 11, '1', '2020-09-05 05:44:22', '2020-09-05 05:44:22'),
(20, 12, '1', '2020-09-05 05:55:46', '2020-09-05 05:55:46'),
(21, 13, '1', '2020-09-05 05:56:25', '2020-09-05 05:56:25'),
(22, 1, '1', '2020-09-08 06:00:24', '2020-09-08 06:00:24'),
(23, 1, '1', '2020-09-08 06:01:44', '2020-09-08 06:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `driver_bills`
--

CREATE TABLE `driver_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date NOT NULL,
  `amount` double(6,2) NOT NULL,
  `billchargeoption_id` int(11) DEFAULT NULL,
  `billchargeoptionvalue_id` int(11) DEFAULT NULL,
  `payment_status` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''1''=free, ''2''=paid,''3''=pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_bills`
--

INSERT INTO `driver_bills` (`id`, `transaction_id`, `driver_id`, `start_date`, `end_date`, `amount`, `billchargeoption_id`, `billchargeoptionvalue_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 12121, 1, '2020-11-22', '2020-11-23', 21.00, 2121, 2121, '1', '2020-11-21 18:00:00', '2020-11-18 18:00:00'),
(2, 2121, 1, '2020-11-22', '2020-11-22', 2121.00, 212, 21, '2', '2020-11-21 18:00:00', '2020-11-21 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `driver_daily_summaries`
--

CREATE TABLE `driver_daily_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `total_minutes` int(11) DEFAULT NULL,
  `last_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_type` int(11) DEFAULT NULL,
  `charge_amount` double(4,2) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_daily_summaries`
--

INSERT INTO `driver_daily_summaries` (`id`, `driver_id`, `total_minutes`, `last_status`, `charge_type`, `charge_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 130, '1', NULL, 30.00, NULL, '2020-07-14 18:00:00', '2020-07-14 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `driver_devices`
--

CREATE TABLE `driver_devices` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_type` enum('1','2') DEFAULT NULL COMMENT '''1''=driver, ''2''=passenger',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver_payment_infos`
--

CREATE TABLE `driver_payment_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `cc_info` text COLLATE utf8mb4_unicode_ci,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` enum('visa','master') COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_month` int(11) NOT NULL,
  `expire_year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_points`
--

CREATE TABLE `driver_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `value` decimal(10,2) NOT NULL,
  `ride_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_ratings`
--

CREATE TABLE `driver_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_sliders`
--

CREATE TABLE `driver_sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_sliders`
--

INSERT INTO `driver_sliders` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'uploads/driverSlider/5fbd1fd238809.20201124.jpg', '1', '2020-11-24 14:59:30', '2020-11-24 08:59:30'),
(5, 'uploads/driverSlider/5fbd1fcb34c9c.20201124.jpg', '1', '2020-11-24 14:59:23', '2020-11-24 08:59:23'),
(6, 'uploads/driverSlider/5fbd1fc4d8d0c.20201124.jpg', '1', '2020-11-24 14:59:17', '2020-11-24 08:59:17'),
(7, 'uploads/driverSlider/5fbd1fbf6d9fc.20201124.jpg', '1', '2020-11-24 14:59:11', '2020-11-24 08:59:11'),
(8, 'uploads/driverSlider/5fbd1fba3e3e2.20201124.jpg', '1', '2020-11-24 14:59:06', '2020-11-24 08:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `driver_types`
--

CREATE TABLE `driver_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(5,2) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_types`
--

INSERT INTO `driver_types` (`id`, `option`, `value`, `active`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Free', '0.00', 1, 'free', NULL, NULL),
(2, 'weekly', '10.00', 1, 'weekly', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_pages`
--

CREATE TABLE `general_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL),
(2, 'admin_user', 'Admin User', NULL, NULL),
(3, 'company_admin', 'Company Admin', NULL, NULL),
(4, 'company_user', 'Company User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `help_and_support`
--

CREATE TABLE `help_and_support` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_and_support`
--

INSERT INTO `help_and_support` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:09:08', '2020-11-17 11:09:08'),
(2, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:09:11', '2020-11-17 11:09:11'),
(3, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:09:20', '2020-11-17 11:09:20'),
(4, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:09:38', '2020-11-17 11:09:38'),
(5, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:09:52', '2020-11-17 11:09:52'),
(6, 'alamin', 'rony', 'alaminrony100@gmail.com', '01912168339', 'I need help', 'nedd help, i face some issue. please contact with me as sson as possible', '2020-11-17 11:10:09', '2020-11-17 11:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'uploads/homeSlider/5fba56ca13478.20201122.jpg', '1', '2020-11-22 06:17:14', '2020-11-22 06:17:14'),
(5, 'uploads/homeSlider/5fba56d219cd6.20201122.jpg', '1', '2020-11-22 06:17:22', '2020-11-22 06:17:22'),
(6, 'uploads/homeSlider/5fba56dae8c29.20201122.jpg', '1', '2020-11-22 06:17:31', '2020-11-22 06:17:31'),
(7, 'uploads/homeSlider/5fba56e1eff40.20201122.jpg', '1', '2020-11-22 06:17:38', '2020-11-22 06:17:38'),
(8, 'uploads/homeSlider/5fba56e868604.20201122.jpg', '1', '2020-11-22 06:17:44', '2020-11-22 06:17:44'),
(9, 'uploads/homeSlider/5fba7d1408e19.20201122.jpg', '1', '2020-11-22 09:00:36', '2020-11-22 09:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `key_words` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `image`, `details_image`, `title`, `description`, `status`, `key_words`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'uploads/latestNews/5fb3840798178.20201117.png', 'uploads/latestNews/details/5fb3840829b43.20201117.png', 'Latest news title 1', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:52', '2020-11-28 02:04:24'),
(2, 'uploads/latestNews/5fb38427cc18a.20201117.png', 'uploads/latestNews/details/5fb38427ebc47.20201117.png', 'Latest news title 2', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:49', '2020-11-28 02:04:56'),
(3, 'uploads/latestNews/5fb384401d027.20201117.png', 'uploads/latestNews/details/5fb384403a026.20201117.png', 'Latest news title 3', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:45', '2020-11-17 02:05:20'),
(4, 'uploads/latestNews/5fb384547b870.20201117.png', 'uploads/latestNews/details/5fb3845498753.20201117.png', 'Latest news title 4', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:41', '2020-11-28 02:05:40'),
(5, 'uploads/latestNews/5fb3846d9f8ed.20201117.png', 'uploads/latestNews/details/5fb3846dbf748.20201117.png', 'Latest news title 5', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:37', '2020-11-28 02:06:05'),
(6, 'uploads/latestNews/5fb3849a808a5.20201117.png', 'uploads/latestNews/details/5fb3849a9dfcc.20201117.png', 'Latest news title 6', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1', 'international, national, business,', 6, '2020-11-28 11:53:34', '2020-11-28 02:06:50'),
(7, 'uploads/latestNews/5fc26409a9e59.20201128.png', 'uploads/latestNews/details/5fc2640a0c6a5.20201128.png', 'demo news', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1', 'international, national, business,', 6, '2020-11-28 14:51:54', '2020-11-28 08:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_sliders`
--

CREATE TABLE `main_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_sliders`
--

INSERT INTO `main_sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pohela boishak dd', 'as dfg sd', 'uploads/slider/1590165670.png', '2020-05-22 10:41:10', '2020-05-22 10:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_23_110246_create_drivers_table', 1),
(5, '2020_04_23_185708_create_driver_types_table', 1),
(6, '2020_04_23_190242_create_driver_ratings_table', 1),
(7, '2020_04_24_053532_create_driver_bills_table', 1),
(8, '2020_04_24_062132_create_driver_daily_summaries_table', 1),
(9, '2020_04_24_062918_create_driver_payment_infos_table', 1),
(10, '2020_04_24_064305_create_driver_points_table', 1),
(11, '2020_04_24_064852_create_driver_activity_logs_table', 1),
(12, '2020_04_24_071828_create_cabs_table', 1),
(13, '2020_04_24_072825_create_cab_types_table', 1),
(14, '2020_04_24_082249_create_cab_rides_table', 1),
(15, '2020_04_24_121923_create_bill_charge_options_table', 1),
(16, '2020_04_24_122202_create_bill_charge_option_values_table', 1),
(17, '2020_04_24_123007_create_bill_settings_table', 1),
(18, '2020_04_24_123743_create_bill_settings_logs_table', 1),
(19, '2020_04_24_124818_create_cancel_issues_table', 1),
(20, '2020_04_24_152118_create_contact_us_table', 1),
(21, '2020_04_24_152944_create_countries_table', 1),
(22, '2020_04_24_161152_create_discount_logs_table', 1),
(23, '2020_04_24_161459_create_general_pages_table', 1),
(24, '2020_04_24_161934_create_groups_table', 1),
(25, '2020_04_24_162243_create_login_attempts_table', 1),
(26, '2020_04_24_162501_create_main_sliders_table', 1),
(27, '2020_04_24_162654_create_news_table', 1),
(28, '2020_04_24_163121_create_news_categories_table', 1),
(29, '2020_04_24_192228_create_notifications_table', 1),
(30, '2020_04_24_192501_create_our_services_table', 1),
(31, '2020_04_24_195100_create_passengers_table', 1),
(32, '2020_04_24_195613_create_passenger_payment_infos_table', 1),
(33, '2020_04_24_195749_create_passenger_points_table', 1),
(34, '2020_04_24_195957_create_penalty_settings_table', 1),
(35, '2020_04_24_200559_create_ride_apps_table', 1),
(36, '2020_04_24_200924_create_ride_cancels_table', 1),
(37, '2020_04_24_201046_create_ride_statuses_table', 1),
(38, '2020_04_24_201208_create_sessions_table', 1),
(39, '2020_04_24_201506_create_settings_table', 1),
(40, '2020_04_24_201758_create_subscribers_table', 1),
(41, '2020_04_24_201835_create_transactions_table', 1),
(42, '2020_04_24_201856_create_user_logins_table', 1),
(43, '2020_05_15_114344_create_taxi_operators_table', 1),
(44, '2020_05_16_064751_create_passenger_ratings_table', 1),
(45, '2019_05_03_000001_create_customer_columns', 2),
(46, '2019_05_03_000002_create_subscriptions_table', 2),
(47, '2019_05_03_000003_create_subscription_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newscategory_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newslike` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trash_status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newscategory_id`, `title`, `short_description`, `description`, `image`, `newslike`, `comment`, `status`, `trash_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pohela boishak', '<p>sdfasdf asdf asdf asdfasdfa sdfa sdf</p>', '<p>sdfasdf asdf asdf asdfasdfa sdfa sdf</p>', 'uploads/news/1590165491.jpeg', 0, '0', 1, 0, 1, 1, '2020-05-22 10:38:11', '2020-05-22 10:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'something', 'asd asdf kl  asdf j lkasdf l kj', '2020-05-22 10:35:34', '2020-05-22 10:35:34'),
(2, 'Driver process', 'asd kl;a sdf asdf lk asdf', '2020-05-22 10:36:04', '2020-05-22 10:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '''1''=driver, ''2''=passenger,''3''=all',
  `drivers` text COLLATE utf8mb4_unicode_ci,
  `passengers` text COLLATE utf8mb4_unicode_ci,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_sends`
--

CREATE TABLE `notification_sends` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_read_atatus` enum('0','1') NOT NULL COMMENT '''0''=unread, ''1''=read',
  `device_id` enum('1','2') NOT NULL COMMENT '''1''=IOS, ''2''=Android',
  `user_type` enum('1','2') NOT NULL COMMENT '''1''=driver,''2''=passenger',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verify`
--

CREATE TABLE `otp_verify` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `otp_code` int(11) NOT NULL,
  `verified_status` enum('0','1') NOT NULL COMMENT '0=Not verified, 1= verified',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_verify`
--

INSERT INTO `otp_verify` (`id`, `phone`, `otp_code`, `verified_status`, `created_at`, `updated_at`) VALUES
(1, '+61001', 796060, '0', '2020-11-16 11:59:08', '2020-11-16 11:59:08'),
(2, '+8801912168339', 164183, '1', '2020-11-16 15:19:32', '2020-11-21 12:49:07'),
(3, '+880191216839', 832825, '0', '2020-11-17 12:00:42', '2020-11-21 12:03:47'),
(4, '+8801912168338', 826214, '1', '2020-11-17 12:22:56', '2020-11-17 12:38:47'),
(5, '+8802121212', 372285, '1', '2020-11-17 13:09:40', '2020-11-17 13:09:47'),
(6, '+88010101', 290660, '1', '2020-11-19 11:14:25', '2020-11-19 11:14:41'),
(7, '+880191216833', 318934, '0', '2020-11-19 12:49:07', '2020-11-19 12:49:07'),
(8, '+880000', 355901, '1', '2020-11-21 06:22:52', '2020-11-21 06:22:59'),
(9, '+88000000000', 913085, '1', '2020-11-21 06:31:03', '2020-11-21 06:31:10'),
(10, '+8800000', 332838, '1', '2020-11-21 06:39:05', '2020-11-21 07:23:55'),
(11, '+8801010101', 794887, '1', '2020-11-21 06:42:18', '2020-11-21 06:42:25'),
(12, '+880191222', 803668, '1', '2020-11-21 06:59:39', '2020-11-21 06:59:46'),
(13, '+88000000', 284995, '1', '2020-11-21 07:20:30', '2020-11-21 07:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `title`, `description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Pohela boishak', 'dgsdf gsdfg', 'uploads/service/1590169332.jpeg', 1, NULL, NULL, '2020-05-22 11:42:12', '2020-05-22 11:42:12'),
(2, 'Pohela boishak', 'dgsdf gsdfg', 'uploads/service/1590169333.jpeg', 1, NULL, NULL, '2020-05-22 11:42:13', '2020-05-22 11:42:13'),
(3, 'asdf aa', 'dd', 'uploads/service/1590169358.jpeg', 1, NULL, NULL, '2020-05-22 11:42:38', '2020-05-22 11:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verification` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verification_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '''1''=verified, ''0''=notverified',
  `mail_verification` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_verification_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '''1''=verified, ''0''=notverified',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saved_home_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saved_work_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `trash_status` tinyint(1) NOT NULL DEFAULT '0',
  `last_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `point` decimal(8,2) DEFAULT '0.00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `registration_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `full_name`, `phone`, `email`, `gender`, `address`, `country`, `city`, `state`, `post_code`, `avatar`, `phone_verification`, `phone_verification_status`, `mail_verification`, `mail_verification_status`, `password`, `provider_id`, `access_token`, `saved_home_address`, `saved_work_address`, `active`, `trash_status`, `last_ip_address`, `ip_address`, `last_login`, `point`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `registration_status`) VALUES
(1, 'alamin fddsf', '+8801912168338', 'alaminrony49@gmail.com', 'Male', '', NULL, NULL, NULL, NULL, 'uploads/passenger/profile_photo/5fb298b89c45a.20201116.png', '123456', '1', NULL, '0', '$2y$10$D8Ie60f4CVk9h/Q4b1OgK.GDvGpF9vXjNkYYamLYpZh2H6FUotr02', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '0.00', 0, NULL, NULL, '2020-11-16 09:20:25', '2020-11-19 09:52:41', NULL, NULL, NULL, NULL, '0'),
(2, 'alamin rony', '+8801912168339', 'alaminrony100@gmail.com', 'Male', '', NULL, NULL, NULL, NULL, 'uploads/passenger/profile_photo/5fb8f2b5615b8.20201121.png', '832771', '1', NULL, '0', '$2y$10$ORcjc3Fw/UDPANcB7OI37.ACh1lj0T0UXXtEDfWd8cXHmL4TEwphe', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, '0.00', 0, NULL, NULL, '2020-11-21 04:57:57', '2020-11-21 06:49:56', NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_bills`
--

CREATE TABLE `passenger_bills` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_status` enum('1','2','3') DEFAULT NULL COMMENT '''1''=free, ''2''=paid,''3''=pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_payment_infos`
--

CREATE TABLE `passenger_payment_infos` (
  `id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `cc_info` text NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `card_type` enum('visa','master') NOT NULL,
  `card_holder` varchar(255) NOT NULL,
  `expire_month` int(11) NOT NULL,
  `expire_year` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_points`
--

CREATE TABLE `passenger_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ride_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_ratings`
--

CREATE TABLE `passenger_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `rating_value` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '''1''=poor, ''2''=normal,''3''=good,''4''=very good, ''5''=excellent',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_sliders`
--

CREATE TABLE `passenger_sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_sliders`
--

INSERT INTO `passenger_sliders` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'uploads/passengerSlider/5fbd1d329c60f.20201124.jpg', '1', '2020-11-24 14:48:18', '2020-11-24 08:48:18'),
(4, 'uploads/passengerSlider/5fbd1d2b63080.20201124.jpg', '1', '2020-11-24 14:48:11', '2020-11-24 08:48:11'),
(5, 'uploads/passengerSlider/5fbd1d247cfcf.20201124.jpg', '1', '2020-11-24 14:48:04', '2020-11-24 08:48:04'),
(6, 'uploads/passengerSlider/5fbd1d1ed95be.20201124.jpg', '1', '2020-11-24 14:47:59', '2020-11-24 08:47:59'),
(7, 'uploads/passengerSlider/5fbd1c560f8e5.20201124.jpg', '1', '2020-11-24 14:44:38', '2020-11-24 08:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalty_settings`
--

CREATE TABLE `penalty_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reduce_fares`
--

CREATE TABLE `reduce_fares` (
  `id` int(11) NOT NULL,
  `reduce_fare_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reduce_fares`
--

INSERT INTO `reduce_fares` (`id`, `reduce_fare_percentage`) VALUES
(1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ride_apps`
--

CREATE TABLE `ride_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ride_charge` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waiting_charge` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_km` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ride_cancels`
--

CREATE TABLE `ride_cancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabride_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `cancel_time` datetime NOT NULL,
  `ridestatus_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_issue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ride_statuses`
--

CREATE TABLE `ride_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ride_statuses`
--

INSERT INTO `ride_statuses` (`id`, `name`, `description`, `bg_color`, `created_at`, `updated_at`) VALUES
(1, 'Request pending', 'Request pending', '#007cdc ', NULL, NULL),
(2, 'Request approved', 'Request approved', '#e67e22', NULL, NULL),
(3, 'Request cancel', 'Request cancel', '#f1c40f', NULL, NULL),
(4, 'Driver has pickup address', 'Driver has pickup address', '#9b59b6', NULL, NULL),
(5, 'Drivemode', 'Drivemode ', '#e55039', NULL, NULL),
(6, 'Completed', 'Completed', '#079992', NULL, NULL),
(7, 'Time Out', 'Time Out', '#f1c80f', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateformat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeformat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.0',
  `frontend_theme` varchar(38) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `protocol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mmode` tinyint(1) NOT NULL,
  `captcha` tinyint(1) NOT NULL DEFAULT '1',
  `mailpath` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rows_per_page` int(11) NOT NULL,
  `total_rows` int(11) NOT NULL,
  `bsty` tinyint(1) NOT NULL,
  `pro_limit` tinyint(1) NOT NULL,
  `decimals` tinyint(1) NOT NULL DEFAULT '2',
  `thousands_sep` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `decimals_sep` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `focus_add_item` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalize_sale` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_printer` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rounding` tinyint(1) DEFAULT '0',
  `theme_style` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'green',
  `after_sale_page` tinyint(1) DEFAULT NULL,
  `overselling` tinyint(1) DEFAULT '1',
  `multi_store` tinyint(1) DEFAULT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_term_and_condition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_privacy_policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_term_and_condition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_privacy_policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `site_name`, `tel`, `dateformat`, `timeformat`, `default_email`, `version`, `frontend_theme`, `theme`, `timezone`, `protocol`, `gps_key`, `mmode`, `captcha`, `mailpath`, `rows_per_page`, `total_rows`, `bsty`, `pro_limit`, `decimals`, `thousands_sep`, `decimals_sep`, `focus_add_item`, `finalize_sale`, `receipt_printer`, `rounding`, `theme_style`, `after_sale_page`, `overselling`, `multi_store`, `language`, `driver_term_and_condition`, `driver_privacy_policy`, `passenger_term_and_condition`, `passenger_privacy_policy`, `created_at`, `updated_at`) VALUES
(1, 'uploads/settings/1597603511.jpeg', 'faretrim fegr', '01748068118', '099776655', 'dfkl', 'hridoy@gmail.com', '1.0', '', '', '0', '', '', 0, 1, NULL, 50, 0, 0, 0, 2, ',', '.', NULL, NULL, NULL, 0, 'green', NULL, 1, NULL, '', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.  Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.  Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.  Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.  Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, '2020-08-16 12:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'hridoysarker6@gmail.com', '2020-05-22 16:15:21', NULL),
(2, 'hridoy@wedothewebs.com', '2020-05-22 16:15:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `passenger_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxi_operators`
--

CREATE TABLE `taxi_operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `text_widgets`
--

CREATE TABLE `text_widgets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `text_widgets`
--

INSERT INTO `text_widgets` (`id`, `title`, `description`, `content_link`, `image`, `position`, `status`, `created_at`, `updated_at`) VALUES
(12, 'About FareTrim', '<p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 20px 5px 0px 0px; font-size: 16px; font-family: Raleway, sans-serif; font-weight: 400; text-align: left; color: rgb(58, 58, 58); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Fare Trim is built around the core value ‘always give more’. To give more back to riders, drivers and the community.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 20px 5px 0px 0px; font-size: 16px; font-family: Raleway, sans-serif; font-weight: 400; text-align: left; color: rgb(58, 58, 58); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Our drivers get the highest rate in the market. With happy drivers, we make sure our riders are always happy.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 20px 5px 0px 0px; font-size: 16px; font-family: Raleway, sans-serif; font-weight: 400; text-align: left; color: rgb(58, 58, 58); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">For our riders, we offer more affordable rides and the new mini car for a smarter/cheaper choice.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1rem; padding: 20px 5px 0px 0px; font-size: 16px; font-family: Raleway, sans-serif; font-weight: 400; text-align: left; color: rgb(58, 58, 58); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">For the community, we give the first 10% of our share of the fare to a cause backed by you, our riders. The more you ride the more we give and the bigger the impact we make together.</p>', 'https%3A%2F%2Fwww.youtube.com%2Fembed%2F2Gg6Seob5Mg', NULL, 1, '1', '2020-11-25 06:16:05', '2020-11-25 12:16:05'),
(13, 'Driver Guidelines', '<p><span style=\"color: rgb(33, 37, 41); font-family: Raleway, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(247, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printe</span></p>', '', NULL, 2, '1', '2020-11-25 12:24:26', '2020-11-25 12:24:26'),
(14, 'fdfffdfdfd', '<p>erfdgdfgfdfd</p>', '', NULL, 2, '1', '2020-11-25 06:25:43', '2020-11-25 12:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `stripe_profile_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_ip_address`, `ip_address`, `activation_code`, `last_login`, `active`, `first_name`, `last_name`, `profile_image`, `phone`, `avatar`, `gender`, `group_id`, `email`, `password`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '::1', '929520', NULL, NULL, 'Hridoy', 'Sarker', NULL, '+8801685807302', NULL, '1', 1, 'hridoysarker6@gmail.com', '$2y$10$0ounYOWE.kR9yTXDtB.YIexaQSESFMu.aNQzrLieB619gWUI1Ajv6', 1, NULL, NULL, '2020-04-28 21:24:08', '2020-04-28 21:24:08'),
(2, NULL, '::1', '340638', NULL, NULL, 'joy', 'sarker', NULL, '01748068118', NULL, '1', 3, 'hridoysarker@gmail.com', '$2y$10$Mt1lJNQ6vEMzDEprgbFBO.6r0SN5rvUzQtp52sanTuwOE5sFKFXjG', 1, NULL, NULL, '2020-05-04 11:21:58', '2020-05-06 18:03:57'),
(5, NULL, '::1', NULL, NULL, 1, 'joy', 'sarker', NULL, '01748068118', NULL, '1', 1, 'jojo@email.com', '$2y$10$nrVM8cA9UPm0TzEayWIS2eOk/9zRFD5ojTzrncWZfU1FPLV3U.0yG', 1, NULL, NULL, '2020-05-04 11:37:31', '2020-05-04 11:46:28'),
(6, '::1', '103.60.172.130', '221739', NULL, NULL, 'Jewel', 'Kuri', 'uploads/user/profile_photo/5f3e7e88bdf77.20200820.png', '01784659339', NULL, '1', 1, 'eng.jewel2006@gmail.com', '$2y$10$GMl7ShGd9OLKmzzcqn7ldeqUuXVTi4/7wvCNbWwR.QSQE8vRTWwL6', 1, NULL, NULL, '2020-06-02 18:03:31', '2020-08-21 23:21:06'),
(0, '::1', '::1', '701853', NULL, NULL, 'Alamin', 'Rony', NULL, '01912168339', NULL, '1', 1, 'alaminrony100@gmail.com', '$2y$10$ig0lGovWr9PA1GOZD6XPquBrRtOQpzJi8RQCGXNP/N4cFqUAosmCK', 0, NULL, NULL, '2020-09-06 00:15:04', '2020-09-06 00:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_bill_settings`
--
ALTER TABLE `admin_bill_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_charge_options`
--
ALTER TABLE `bill_charge_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_charge_option_values`
--
ALTER TABLE `bill_charge_option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_settings`
--
ALTER TABLE `bill_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_settings_logs`
--
ALTER TABLE `bill_settings_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabs`
--
ALTER TABLE `cabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cab_rides`
--
ALTER TABLE `cab_rides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cab_types`
--
ALTER TABLE `cab_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_issues`
--
ALTER TABLE `cancel_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_logs`
--
ALTER TABLE `discount_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_stripe_id_index` (`stripe_id`(191));

--
-- Indexes for table `driver_activity_logs`
--
ALTER TABLE `driver_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_bills`
--
ALTER TABLE `driver_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_daily_summaries`
--
ALTER TABLE `driver_daily_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_devices`
--
ALTER TABLE `driver_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_payment_infos`
--
ALTER TABLE `driver_payment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_points`
--
ALTER TABLE `driver_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_ratings`
--
ALTER TABLE `driver_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_sliders`
--
ALTER TABLE `driver_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_types`
--
ALTER TABLE `driver_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_pages`
--
ALTER TABLE `general_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_and_support`
--
ALTER TABLE `help_and_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_sliders`
--
ALTER TABLE `main_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_sends`
--
ALTER TABLE `notification_sends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verify`
--
ALTER TABLE `otp_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passengers_stripe_id_index` (`stripe_id`(191));

--
-- Indexes for table `passenger_bills`
--
ALTER TABLE `passenger_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_payment_infos`
--
ALTER TABLE `passenger_payment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_points`
--
ALTER TABLE `passenger_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_ratings`
--
ALTER TABLE `passenger_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_sliders`
--
ALTER TABLE `passenger_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `penalty_settings`
--
ALTER TABLE `penalty_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reduce_fares`
--
ALTER TABLE `reduce_fares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_apps`
--
ALTER TABLE `ride_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_cancels`
--
ALTER TABLE `ride_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_statuses`
--
ALTER TABLE `ride_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_driver_id_stripe_status_index` (`driver_id`,`stripe_status`(191)),
  ADD KEY `subscriptions_passenger_id_stripe_status_index` (`passenger_id`,`stripe_status`(191));

--
-- Indexes for table `taxi_operators`
--
ALTER TABLE `taxi_operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_widgets`
--
ALTER TABLE `text_widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_bill_settings`
--
ALTER TABLE `admin_bill_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bill_settings`
--
ALTER TABLE `bill_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_settings_logs`
--
ALTER TABLE `bill_settings_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cabs`
--
ALTER TABLE `cabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cab_rides`
--
ALTER TABLE `cab_rides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cab_types`
--
ALTER TABLE `cab_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_activity_logs`
--
ALTER TABLE `driver_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `driver_daily_summaries`
--
ALTER TABLE `driver_daily_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_devices`
--
ALTER TABLE `driver_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_payment_infos`
--
ALTER TABLE `driver_payment_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_ratings`
--
ALTER TABLE `driver_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_sliders`
--
ALTER TABLE `driver_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `help_and_support`
--
ALTER TABLE `help_and_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_sends`
--
ALTER TABLE `notification_sends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verify`
--
ALTER TABLE `otp_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passenger_bills`
--
ALTER TABLE `passenger_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_payment_infos`
--
ALTER TABLE `passenger_payment_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_ratings`
--
ALTER TABLE `passenger_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_sliders`
--
ALTER TABLE `passenger_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reduce_fares`
--
ALTER TABLE `reduce_fares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ride_cancels`
--
ALTER TABLE `ride_cancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `text_widgets`
--
ALTER TABLE `text_widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
