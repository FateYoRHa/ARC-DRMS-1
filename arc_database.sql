-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 01:53 AM
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
-- Database: `arc_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificate_uploads`
--

CREATE TABLE `birth_certificate_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consent_form_uploads`
--

CREATE TABLE `consent_form_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` bigint(20) UNSIGNED NOT NULL,
  `departmentID` bigint(20) UNSIGNED DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `course_acronym` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `departmentID`, `course`, `course_acronym`, `created_at`, `updated_at`) VALUES
(1, 7, 'Bachelor of Science in Hospitality Management with Specialization in International Hotel and Business Operations', 'BSHM-IHBO', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(2, 9, 'Bachelor of Arts in Political Science', 'BA-POLSCI', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(3, 9, 'Bachelor of Arts in Music', 'BA-MUSIC', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(4, 4, 'Bachelor of Science in Business Administration Major in Human Resource Development Management', 'BSBA-HRDM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(5, 10, 'Master of Arts in English', 'MA-ENGL', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(6, 10, 'Master of Science in Criminal Justice with Specialization in Criminology', 'MSCJSC', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(7, 9, 'Bachelor of Arts in English Language', 'BA-ENGL', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(8, 2, 'Bachelor of Science in Environmental & Sanitary Engineering', 'BSESE', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(9, 9, 'Bachelor of Secondary Education Major in English', 'BSED-ENGL', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(10, 4, 'Bachelor of Science in Business Administration', 'BSBA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(11, 9, 'Bachelor of Science in Psychology', 'BSPSYCH', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(12, 7, 'Associate of Arts in Culinary Arts Catering Operations', 'AACACO', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(13, 4, 'Bachelor of Science in Business Administration Major in Operations Management', 'BSBA-OM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(14, 1, 'Bachelor of Science in Computer Engineering', 'BSCPE', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(15, 9, 'Bachelor of Elementary Education', 'BEED', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(16, 2, 'Bachelor of Science in Civil Engineering', 'BSCE', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(17, 4, 'Bachelor of Science in Accountancy', 'BSAC', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(18, 2, 'Bachelor of Engineering Technology (Major in Mechatronics)', 'BET-MECHA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(19, 3, 'Doctor of Dental Medicine', 'DMD', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(20, 6, 'Bachelor of Science in Criminology', 'BSCRIM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(21, 4, 'Bachelor of Science in Business Administration Major in Financial Management', 'BSBA-FM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(22, 2, 'Bachelor of Science in Electronics and Communications Engineering', 'BSECE', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(23, 7, 'Bachelor of Science in Hospitality Management with specialization in Professional Culinary Arts', 'BSHM-PCA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(24, 10, 'Master in Crisis and Disaster Risk Reduction Management', 'MCDRRM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(25, 9, 'Master in Public Administration', 'MPA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(26, 1, 'Bachelor of Science in Computer Science', 'BSCS', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(27, 10, 'Doctor of Philosophy in Developmental Education', 'PHD-DEVED', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(28, 5, 'Bachelor of Science in Medical Laboratory Sciences', 'BS-MLS', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(29, 10, 'Master in Dental Education', 'MDE', '2023-02-26 07:37:47', '2023-03-04 13:21:34'),
(30, 9, 'Master of Arts in Education Major Filipino', 'MAED-FIL', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(31, 11, 'Juris Doctor', 'J.D.', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(32, 10, 'MIDWIFERY', 'MIDWIFERY', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(33, 2, 'Bachelor of Science in Architecture', 'BSARCH', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(34, 10, 'Doctor of Education', 'EDD', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(35, 5, 'Bachelor of Science in Physical Therapy', 'BS-PT', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(36, 6, 'Bachelor of Forensic Science', 'BFSC', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(37, 7, 'Bachelor of Science in Tourism Management - International Tourism', 'BSTM-IT', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(38, 9, 'Master of Arts in Education Major Educational Management', 'MAED-ED MGMT', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(39, 4, 'Bachelor of Science in Business Administration Major in Marketing Management', 'BSBA-MM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(40, 8, 'Bachelor of Science in Nursing', 'BSN', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(41, 10, 'Doctor in Business Administration', 'DBA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(42, 1, 'Associate in Computer Technology with Specialization in Multimedia and Web', 'ACT-MWD', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(43, 1, 'Bachelor of Science in Information Technology', 'BSIT-ICT', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(44, 9, 'Bachelor of Arts in Communication', 'BA-COMM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(46, 12, 'Bachelor of Science in Playing Dota 2', 'BSPD', '2023-03-04 12:44:04', '2023-03-05 11:51:35'),
(48, NULL, NULL, NULL, '2023-03-13 15:56:36', '2023-03-13 15:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentID` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `department_acronym` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `department`, `department_acronym`, `created_at`, `updated_at`) VALUES
(1, 'School of Information Technology', 'SIT', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(2, 'School of Engineering & Architecture', 'SEA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(3, 'School of Dentistry', 'SOD', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(4, 'School of Business Administration & Accountancy', 'SBAA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(5, 'School of Natural Sciences', 'SNS', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(6, 'School of Criminal Justice & Public Safety', 'SCJPS', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(7, 'School of International Hospitality and Tourism Management', 'SIHTM', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(8, 'School of Nursing', 'SON', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(9, 'School of Teacher Education & Liberal Arts', 'STELA', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(10, 'Graduate School', 'GS', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(11, 'School of Law', 'SOL', '2023-02-26 07:37:47', '2023-02-26 07:37:47'),
(12, 'Electronic Sports', 'eSports', '2023-03-05 11:33:53', '2023-03-05 16:37:02'),
(14, 'tyr lang', 'try', '2023-03-07 01:39:56', '2023-03-07 01:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `good_moral_uploads`
--

CREATE TABLE `good_moral_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `good_moral_uploads`
--

INSERT INTO `good_moral_uploads` (`upload_id`, `student_id`, `filename`, `filepath`, `created_at`, `updated_at`) VALUES
(103, 20115486, 'AragonC-Good_Moral.pdf', 'public/files/ERzCG9tvBR576zscdiYc0pYYy7KLXHDKZgdWRP54.pdf', '2023-03-22 17:04:26', '2023-03-22 17:04:26'),
(123, NULL, 'Good_Moral.pdf', 'public/files/ICgPop6UvxgivP0DUy0cDNYAZwcDn76KFpR2PsT6.pdf', '2023-03-22 16:48:19', '2023-03-22 16:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `grade_uploads`
--

CREATE TABLE `grade_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `requested_on` datetime DEFAULT NULL,
  `recieved_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_uploads`
--

INSERT INTO `grade_uploads` (`upload_id`, `student_id`, `filename`, `filepath`, `requested_on`, `recieved_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '2023-03-28 09:18:33', '2023-04-17 01:12:30', '2023-03-28 01:18:33', '2023-04-16 17:12:30'),
(2, NULL, NULL, NULL, '2023-04-17 01:52:46', NULL, '2023-04-16 17:52:46', '2023-04-16 17:52:46'),
(6, NULL, NULL, NULL, '2023-04-27 23:34:22', NULL, '2023-04-27 15:34:22', '2023-04-27 15:34:22'),
(8, NULL, NULL, NULL, '2023-04-18 01:47:42', NULL, '2023-04-17 17:47:42', '2023-04-17 17:47:42'),
(9, NULL, NULL, NULL, '2023-03-28 09:22:34', NULL, '2023-03-28 01:22:34', '2023-03-28 01:22:34'),
(15, NULL, NULL, NULL, '2023-04-18 02:19:27', NULL, '2023-04-17 18:19:27', '2023-04-17 18:19:27'),
(16, NULL, NULL, NULL, '2023-04-18 08:16:34', NULL, '2023-04-18 00:16:34', '2023-04-18 00:16:34'),
(46, NULL, NULL, NULL, '2023-03-23 08:07:42', NULL, '2023-03-23 00:07:42', '2023-03-23 00:07:42'),
(55, NULL, NULL, NULL, '2023-04-27 23:40:41', NULL, '2023-04-27 15:40:41', '2023-04-27 15:40:41'),
(66, NULL, 'Grades - Copy.pdf', 'public/files/yLDDscOOa0LTqAqgj1ooiuUNu5Z2ojyV78IJmPez.pdf', '2023-03-23 08:53:02', '2023-03-23 08:55:10', '2023-03-23 00:53:02', '2023-03-23 00:55:35'),
(68, 546879, 'Grades - Copy (7) - Copy.pdf', 'public/files/JhZzCFge89NZooXc1K3zto7ElDUV7bHS8eXe4vTl.pdf', NULL, '2023-03-23 00:25:26', '2023-03-22 16:18:10', '2023-03-22 16:25:26'),
(78, NULL, NULL, NULL, '2023-03-28 08:04:54', NULL, '2023-03-28 00:04:54', '2023-03-28 00:04:54'),
(92, NULL, NULL, NULL, '2023-03-27 12:44:08', '2023-03-27 13:35:05', '2023-03-27 04:44:08', '2023-03-27 05:35:05'),
(103, NULL, NULL, NULL, '2023-03-23 08:56:27', '2023-03-23 08:56:39', '2023-03-23 00:56:27', '2023-03-23 00:56:39'),
(106, NULL, NULL, NULL, '2023-04-11 08:10:24', NULL, '2023-04-11 00:10:24', '2023-04-11 00:10:24'),
(110, NULL, NULL, NULL, '2023-04-11 08:54:47', NULL, '2023-04-11 00:54:47', '2023-04-11 00:54:47'),
(114, NULL, NULL, NULL, '2023-03-27 12:43:19', NULL, '2023-03-27 04:43:19', '2023-03-27 04:43:19'),
(115, NULL, NULL, NULL, '2023-03-23 03:17:22', NULL, '2023-03-22 19:17:22', '2023-03-22 19:17:22'),
(116, NULL, NULL, NULL, '2023-03-23 00:31:30', '2023-04-18 01:58:44', '2023-03-22 16:31:30', '2023-04-17 17:58:44'),
(118, NULL, NULL, NULL, '2023-03-23 08:06:55', '2023-04-18 01:58:13', '2023-03-23 00:06:55', '2023-04-17 17:58:13'),
(123, NULL, 'Dragneel_Form-137.pdf', 'public/files/V4LDzUoxIet3XfytlHT2drvHHj7DA0G5aboxlxwa.pdf', '2023-03-23 02:57:41', '2023-03-23 02:58:39', '2023-03-22 18:57:41', '2023-03-22 18:59:20'),
(125, NULL, 'Grades - Copy (2).pdf', 'public/files/2AL1osqjY76M1Hx5FX3TyfxMQHtmwg9hq0Gd6UIS.pdf', NULL, '2023-03-28 03:50:15', '2023-03-27 19:50:15', '2023-03-27 19:50:15'),
(126, NULL, NULL, NULL, '2023-04-17 19:30:11', NULL, '2023-04-17 11:30:11', '2023-04-17 11:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_09_131901_create_records_table', 1),
(6, '2022_02_14_091249_create_uploads_table', 1),
(287, '2023_01_24_083329_create_students_table', 2),
(288, '2023_02_02_103053_create_registration_uploads_table', 2),
(289, '2023_02_06_095415_create_student_passports_table', 2),
(290, '2023_02_06_095452_create_student_previous_schools_table', 2),
(297, '2023_02_19_201034_create_departments_table', 2),
(298, '2023_02_21_110801_create_courses_table', 2),
(301, '2023_02_09_124510_create_grade_uploads_table', 3),
(302, '2023_02_09_124614_create_reciept_uploads_table', 4),
(303, '2023_02_09_124701_create_good_moral_uploads_table', 5),
(312, '2023_02_09_125035_create_consent_form_uploads_table', 6),
(313, '2023_02_09_125108_create_waiver_form_uploads_table', 6),
(314, '2023_02_09_130409_create_birth_certificate_uploads_table', 6),
(315, '2023_03_28_021448_create_other_uploads_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `other_uploads`
--

CREATE TABLE `other_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reciept_uploads`
--

CREATE TABLE `reciept_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reciept_uploads`
--

INSERT INTO `reciept_uploads` (`upload_id`, `student_id`, `filename`, `filepath`, `created_at`, `updated_at`) VALUES
(103, 20115486, 'AragonC-Reciept.pdf', 'public/files/O5iR5HEnb2C9GXUtbaMS1bKNWU2xcNw4FfVXCtzf.pdf', '2023-03-22 17:04:27', '2023-03-22 17:04:27'),
(123, NULL, 'Reciept.pdf', 'public/files/fn8ooQ9DRwEXKSajSnbSY1hKmFBaQ34EKKXTwK46.pdf', '2023-03-22 16:45:08', '2023-03-22 16:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `id_number` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`record_id`, `id_number`, `fName`, `mName`, `lName`, `course`, `created_at`, `updated_at`) VALUES
(1, 312546978, 'Azure', 'Blue', 'Sky', 'Sky', '2023-02-15 08:56:16', '2023-03-01 12:52:57'),
(2, 3159, 'ASD', 'FSF', 'Skys', 'BSSH', '2023-03-27 19:05:12', '2023-03-27 19:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `registration_uploads`
--

CREATE TABLE `registration_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `entrance_status` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pnum` varchar(255) DEFAULT NULL,
  `city_prov` varchar(255) DEFAULT NULL,
  `brngy_town` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `date` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`registration_id`, `entrance_status`, `student_id`, `fname`, `mname`, `lname`, `course`, `department`, `nationality`, `address`, `email`, `pnum`, `city_prov`, `brngy_town`, `status`, `school`, `date`, `created_at`, `updated_at`) VALUES
(1, 'returning_first_year', 20285766, 'Lisette', 'McGlynn', 'Gutkowski', 'BSARCH', 'SEA', 'Filipino', '29320 Delphia DaleFriesenport, MA 34302', 'lindgren.bernardo@example.org', '9864246928', NULL, NULL, 'registered', 'Fiore University', '2020', '2023-08-01 07:37:48', '2023-08-16 17:23:04'),
(2, 'transferee', NULL, 'Madonna', 'Kutch', 'Hane', 'BSBA-HRDM', 'SBAA', 'Japanese', '5365 Kutch UnionBrakusbury, TN 91127', 'jamison21@example.com', '9409589903', NULL, NULL, 'for id', 'Aragon University', '2016', '2023-02-26 07:37:48', '2023-04-16 17:23:44'),
(3, 'transferee', NULL, 'Queenie', 'Nitzsche', 'Hagenes', 'BSTM-IT', 'SIHTM', 'Filipino', '61868 Edwardo Mountain\nEast Eunicechester, MS 81685', 'rohan.felton@example.org', '9190769749', 'Port Earlene', 'Et expedita voluptates quaerat. Veritatis et expedita minima quos similique sapiente minima. Ut distinctio dolores rerum.', 'registered', NULL, NULL, '2023-06-26 07:37:48', '2023-07-26 07:37:48'),
(4, 'incoming_first_year', NULL, 'Matilde', 'Reichert', 'Lowe', 'BA-MUSIC', 'STELA', 'Filipino', '7991 Hamill Ports Apt. 838\nNew Jany, SD 39547', 'jaylan42@example.net', '9097596283', 'Quitzonberg', 'Recusandae cupiditate et quis commodi laborum reprehenderit cupiditate. Ut explicabo praesentium id. Odio repellendus a ad tempora eum perspiciatis voluptatem.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(5, 'incoming_first_year', NULL, 'Herminio', 'Herzog', 'Jakubowski', 'BSBA-OM', 'SBAA', 'South Korean', '7235 Schmitt Rapid Suite 646Sophieland, IN 91990', 'ymoen@example.net', '9601062077', NULL, NULL, 'registered', 'Fiore University', '2016', '2023-02-26 07:37:48', '2023-04-16 17:23:24'),
(6, 'transferee', 95846515, 'Kaela', 'Schimmel', 'Kassulke', 'BA-MUSIC', 'STELA', 'Filipino', '6524 Rodrigo BridgeFisherchester, CT 48996', 'uswaniawski@example.com', '9753635884', NULL, NULL, 'registered', 'University of Baguio', '2021', '2022-02-26 07:37:48', '2023-04-17 18:00:32'),
(7, 'returning_first_year', 21591468, 'Tiana', 'Hayes', 'Windler', 'DMD', 'SOD', 'American', '2234 Eloisa Hollow Apt. 593East Madyson, CT 22148-5287', 'wunsch.courtney@example.org', '9995175254', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-07 01:40:27'),
(8, 'returning_first_year', 27146464, 'Darryl', 'Shanahan', 'Hamill', 'J.D.', 'SOL', 'Filipino', '2708 Mayer Wall\nEast Karlie, MT 22200-4626', 'marvin29@example.com', '9219157699', 'New Mya', 'Ullam harum corporis unde et assumenda. Facilis non deleniti facilis fuga et fugit eius. Nulla est laudantium sequi corporis. Officiis delectus velit nulla libero.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(9, 'incoming_first_year', NULL, 'Dejon', 'Zulauf', 'Ruecker', 'BS-MLS', 'SNS', 'South Korean', '7492 Lizeth Camp Suite 348\nNorth Mortimer, NC 34550', 'ernie.harvey@example.org', '9089127286', 'New Laurianetown', 'Magni ratione dolor aut id. Rem ad est earum molestias ratione. Et debitis illo itaque quasi. Eligendi iste explicabo est temporibus asperiores.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(10, 'transferee', NULL, 'Evalyn', 'Schumm', 'Keebler', 'MAED-ED MGMT', 'STELA', 'Chinese', '6465 Delores Trail Apt. 198\nNew Eladio, KS 76234-1139', 'concepcion23@example.net', '9934161984', 'Port Trenton', 'Cumque id reiciendis molestiae architecto eius quos hic autem. Sunt soluta consequatur eos qui explicabo. Minus vel repudiandae omnis praesentium eos aperiam nisi.', 'for id', NULL, NULL, '2023-06-26 07:37:48', '2023-07-26 07:37:48'),
(11, 'incoming_first_year', NULL, 'Marshall', 'Bernhard', 'Stehr', 'BA-POLSCI', 'STELA', 'Japanese', '41868 Justice Plains\nProhaskastad, ID 62581', 'kassulke.bernard@example.org', '9432997329', 'Port Horace', 'Ex vitae nam deleniti velit. Dolorum sed repudiandae quo illum facilis amet.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(12, 'incoming_first_year', NULL, 'Dixie', 'Torphy', 'Jaskolski', 'BSTM-IT', 'SIHTM', 'Filipino', '4000 Jermaine Divide Apt. 853\nSouth Jeremyside, FL 11550', 'nohara@example.com', '9341515148', 'Lake Gisselleland', 'In dolor et minima assumenda et natus. Facilis molestiae tempora rerum id ut commodi. Aperiam libero et praesentium sit.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-03-01 16:10:15'),
(13, 'incoming_first_year', NULL, 'Justina', 'Jaskolski', 'Pagac', 'BSED-ENGL', 'STELA', 'Taiwanese', '29102 Ledner Path Suite 591\nKeyshawnborough, MI 98778', 'qwalker@example.org', '9924241073', 'New Keirafort', 'Excepturi ut non sed dicta illo vero aut. Praesentium earum voluptatem voluptatem rem aut. Voluptate itaque quidem ut et est.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-03-01 16:37:28'),
(14, 'transferee', NULL, 'Camylle', 'Armstrong', 'Paucek', 'ACT-MWD', 'SIT', 'Chinese', '204 Enrique Courts Suite 735\nWest Glennamouth, DC 84420-6527', 'hills.opal@example.org', '9637284331', 'Hahnfort', 'Ullam minima dolores sint magnam itaque pariatur. Et aut expedita eveniet at rerum ducimus. Nisi recusandae doloribus minima autem ad culpa. Doloribus necessitatibus exercitationem ut ad quae sint.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(15, 'returning_first_year', 24115719, 'Orie', 'Considine', 'Miller', 'BSIT-ICT', 'SIT', 'Chinese', '5083 Moises Mall Apt. 131Torrancemouth, NM 30789', 'sipes.henry@example.net', '9790860603', NULL, NULL, 'registered', 'University of Baguio', '2017', '2023-08-26 07:37:48', '2023-09-17 18:11:12'),
(16, 'returning_first_year', 28991522, 'Jonas', 'Graham', 'Kutch', 'MPA', 'STELA', 'South Korean', '41889 Becker Track\nKleinmouth, AZ 21996-6470', 'heaney.kirsten@example.com', '9337843398', 'East Moshe', 'Aut esse asperiores ut aspernatur cum. Sit quam in enim mollitia atque tenetur. Nihil incidunt fugit unde.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(17, 'returning_first_year', 22346826, 'Sabrina', 'Cassin', 'Metz', 'BSCPE', 'SIT', 'American', '760 Powlowski Mills Suite 825\nSouth Larrymouth, TX 58222', 'ewald.gutmann@example.com', '9925888606', 'Caylaborough', 'Voluptatem amet ut alias qui. Et aut officia vel non quae quia similique. Debitis in nihil ullam. Dignissimos sit unde asperiores sequi illum.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-09 10:29:55'),
(18, 'incoming_first_year', NULL, 'Curtis', 'Konopelski', 'Crooks', 'BSAC', 'SBAA', 'Japanese', '75459 Rowe Crest\nNew Gladycefort, OK 96847', 'taurean49@example.net', '9567894405', 'New Marques', 'Quas impedit aut qui quibusdam dolor. Ut magni veniam eos saepe quaerat eaque. Quo corrupti perferendis distinctio aperiam quas voluptatem. Quisquam molestias saepe delectus omnis ea ea facilis.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(19, 'transferee', NULL, 'Melyssa', 'Schulist', 'Schinner', 'BSBA-MM', 'SBAA', 'Chinese', '997 Lavada Crest\nPietroshire, DE 48768-3378', 'farrell.adolf@example.net', '9419280996', 'Donnatown', 'Vero suscipit aut dolor vero alias vel. Dolor sunt dicta eligendi blanditiis. Est expedita debitis repellendus a iusto. Ut aperiam voluptas qui ea.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(20, 'returning_first_year', 27155587, 'Antonina', 'Littel', 'Kertzmann', 'DMD', 'SOD', 'Chinese', '274 Grady Lodge Suite 120\nParkerbury, CO 54517', 'eryn.nitzsche@example.com', '9283429469', 'Robertstown', 'Ut veniam ab voluptatibus consectetur voluptatem. Quos porro fugiat est molestiae culpa dolores ut. Culpa error dolore saepe sit qui et est. Ea atque atque quos cupiditate.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-03-10 02:26:56'),
(21, 'incoming_first_year', NULL, 'Cheyenne', 'Rogahn', 'Marks', 'BA-POLSCI', 'STELA', 'South Korean', '1140 Julianne Stravenue Apt. 506\nLarueville, NV 62400', 'imani.dare@example.com', '9303947576', 'West Wellingtonmouth', 'A maxime est dolorum nihil. Ullam doloremque eos animi corrupti numquam. Voluptatem officia sed ratione sit. Quis ea illo corrupti quasi exercitationem. Eligendi dicta facilis nostrum eveniet.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(22, 'incoming_first_year', NULL, 'Nikita', 'Johnston', 'Hettinger', 'MCDRRM', 'GS', 'Filipino', '5448 Shields Villages\nKuvalisburgh, TX 16817', 'pagac.reuben@example.org', '9536595476', 'Malcolmton', 'Similique eligendi repellendus autem numquam quidem. Et dignissimos enim sint rem vel ipsa. Ut sit architecto et quos dolorem id. Quod assumenda eveniet aperiam nihil optio non omnis maxime.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(23, 'transferee', 136465, 'Jacklyn', 'Emard', 'Aufderhar', 'BSBSS', 'eSports', 'South Korean', '4723 Chance Junctions Suite 231West Rashad, CO 35802', 'orval96@example.com', '9610185591', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-05 17:30:19'),
(24, 'transferee', 2015989, 'Athena', 'Langosh', 'Quigley', 'MAED-FIL', 'STELA', 'Filipino', '9381 May GrovesHudsonstad, WI 58894', 'elwin.oberbrunner@example.com', '9710377210', NULL, NULL, 'registered', 'University of the Cordilleras', NULL, '2023-08-26 07:37:48', '2023-04-27 14:45:01'),
(25, 'transferee', NULL, 'Merl', 'Sauer', 'Rosenbaum', 'AACACO', 'SIHTM', 'Japanese', '7891 Delbert Plain\nStephenchester, FL 31670', 'lindgren.eloy@example.com', '9093956591', 'Anibalfurt', 'Et molestiae iste ad quis voluptatibus perspiciatis optio nam. Et molestias reprehenderit voluptate necessitatibus nulla. Non atque enim deleniti quis rerum nobis.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(26, 'incoming_first_year', NULL, 'Lewis', 'Macejkovic', 'Hagenes', 'BSAC', 'SBAA', 'Filipino', '398 Junior Plaza\nPort Janaeberg, AK 48521-2510', 'aoconnell@example.org', '9705697373', 'East Eileenhaven', 'Aut porro unde omnis et. Ea consectetur aut pariatur in sequi error. Iure quia dicta id autem reprehenderit. Est explicabo necessitatibus laborum.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(27, 'incoming_first_year', NULL, 'Alana', 'Kautzer', 'Sporer', 'BSCE', 'SEA', 'Taiwanese', '4090 Rogers Drive Suite 058\nNew Cobyfurt, SC 79987-1902', 'cheidenreich@example.com', '9291094445', 'New Gardnerview', 'Error odio sequi aspernatur in optio expedita nihil. Quos sequi aut enim praesentium debitis quaerat.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(28, 'incoming_first_year', NULL, 'Noe', 'Volkman', 'Lemke', 'BSHM-PCA', 'SIHTM', 'South Korean', '572 Smitham Valleys\nSouth Emmanuelhaven, CO 85688', 'fernando.sipes@example.org', '9660045721', 'North Eva', 'Quo corrupti tenetur dicta cum omnis aut quidem. Nulla quam veritatis sunt sapiente recusandae optio. Ipsum facere illo cum impedit modi consequatur corporis.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(29, 'transferee', NULL, 'Otho', 'Shanahan', 'Lowe', 'DBA', 'GS', 'American', '50690 Kreiger Rest Suite 214\nBrayanchester, NJ 87100', 'fritz.morissette@example.com', '9964595537', 'Connormouth', 'Est dolorem recusandae quidem voluptatem. Deleniti ullam nihil fugiat voluptates explicabo alias dolores ducimus. Voluptas enim sint aut qui similique porro. Corrupti sed non et a.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(30, 'returning_first_year', 28305464, 'Michaela', 'Hirthe', 'Howell', 'BSAC', 'SBAA', 'Chinese', '58614 Neha Courts Suite 725\nNonafort, PA 70264', 'eileen.kuphal@example.org', '9811199379', 'Virginiemouth', 'Sequi quo eaque nihil sed perferendis qui sed quo. Esse delectus consequatur quia. Perspiciatis hic quod doloremque quia nostrum.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(31, 'transferee', NULL, 'Emma', 'Orn', 'Bradtke', 'BSPD', 'eSports', 'South Korean', '97250 Mueller Shoal Apt. 552Breitenbergland, ME 17882', 'patsy59@example.org', '9525374841', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-05 16:37:02'),
(32, 'transferee', NULL, 'Jessy', 'Leffler', 'Borer', 'BA-COMM', 'STELA', 'Chinese', '4851 Theodora Squares Suite 274\nOkeytown, OH 18960-7556', 'jamil.wiza@example.net', '9361030599', 'Hadleyfurt', 'Veniam qui qui totam. Aut et et porro magnam. Non at velit aliquid. Minus nobis molestias omnis. Nihil eius minima vel sit quaerat quo voluptatem qui.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(33, 'incoming_first_year', NULL, 'Chadd', 'Bernier', 'Will', 'BA-POLSCI', 'STELA', 'Filipino', '56500 Neoma Rest Apt. 625\nCoralieshire, VT 79825', 'kuhn.linwood@example.com', '9226514901', 'East Landenmouth', 'Dolore placeat quisquam fuga qui. Accusamus aut et sit tempore quibusdam omnis. Labore a animi possimus a. Id temporibus ut aut quis odio. Magni possimus est amet corporis sit.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(34, 'returning_first_year', 23876385, 'Jany', 'Bailey', 'O\'Keefe', 'BSED-ENGL', 'STELA', 'South Korean', '72241 Hartmann Fords\nWest Susanburgh, PA 96803', 'marley.langworth@example.org', '9624746793', 'East Janessachester', 'Eum voluptate qui dolores. Ut possimus laudantium labore et delectus. Quo iusto ea consequatur voluptatem quas. Ut nesciunt nisi eum non tempore ducimus quasi quia.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-01 16:12:33'),
(35, 'transferee', NULL, 'Mylene', 'Jacobson', 'Nienow', 'DBA', 'GS', 'South Korean', '206 Maybell Village Apt. 961\nRomanburgh, WA 21606', 'uschaden@example.org', '9283328572', 'South Troy', 'Illum pariatur quia ducimus et dolor. Eligendi est et facere autem aut et nulla. Sit deserunt quaerat non quia nisi.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(36, 'transferee', NULL, 'Bridie', 'Langosh', 'Wolf', 'BSAC', 'SBAA', 'Chinese', '61871 Kelsie Course\nPort Julieport, NV 30057-8358', 'kub.esperanza@example.net', '9720536616', 'Port Masonside', 'Cum rerum in numquam omnis. Ipsam et distinctio sit eum repudiandae sit doloribus. Eos velit sint et tempora voluptas id. Soluta id aperiam at eum quia.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-03-09 11:53:04'),
(37, 'incoming_first_year', NULL, 'Zane', 'Haag', 'Crona', 'BFSC', 'SCJPS', 'American', '7343 Spinka Forge Apt. 965\nWest Sallyport, KY 57356-1495', 'crona.ruthe@example.org', '9948239120', 'East Adrienmouth', 'Atque sit et laboriosam numquam. Voluptas eveniet corporis tenetur culpa eligendi. Assumenda nobis in eligendi nihil dolorem.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(38, 'incoming_first_year', 6984, 'Molly', 'Kassulke', 'Franecki', 'BA-POLSCI', 'STELA', 'Taiwanese', '9975 Kautzer CliffsMarjoriestad, SD 37998', 'cpurdy@example.com', '9497964888', NULL, NULL, 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-03-01 14:23:30'),
(40, 'transferee', NULL, 'Andy', 'Becker', 'Schoen', 'BA-ENGL', 'STELA', 'Taiwanese', '143 Russ PortOndrickaland, WA 96135', 'opurdy@example.org', '9881293987', NULL, NULL, 'registered', 'University of the Cordilleras', NULL, '2023-02-26 07:37:48', '2023-04-17 18:11:49'),
(41, 'transferee', NULL, 'Johnathon', 'Dare', 'Goldner', 'BSBA-FM', 'SBAA', 'Japanese', '956 Manuela Locks Suite 946\nKoelpinville, IN 65597-0898', 'damore.charity@example.com', '9142665173', 'Rolfsonberg', 'Voluptatem consequatur expedita non est. Veniam inventore sit at voluptatem omnis nesciunt expedita.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(42, 'incoming_first_year', NULL, 'Lorena', 'Smith', 'McCullough', 'MDE', 'GS', 'Filipino', '2598 Feil ViewNorth Bernitaborough, CO 75473', 'imosciski@example.net', '9701046697', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-04 13:21:34'),
(43, 'returning_first_year', 28248240, 'Leatha', 'Murazik', 'Purdy', 'BSCPE', 'SIT', 'South Korean', '595 Audra Islands Apt. 120\nSouth Beryltown, SC 74112', 'elmer.heller@example.org', '9291352233', 'Jedediahfurt', 'Consequatur vitae soluta non numquam. Repellendus aspernatur dolorem sint voluptas quia. Impedit deleniti aliquam ut qui qui. Sapiente nam voluptatibus vel fuga excepturi.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(44, 'returning_first_year', 25887849, 'Maximus', 'Steuber', 'Daugherty', 'BS-PT', 'SNS', 'Japanese', '76165 Strosin Islands\nColechester, IL 21043-9395', 'wlind@example.org', '9916700585', 'North Toystad', 'Ut inventore veniam voluptas voluptatem aut ratione rerum. Dolor et quia nostrum et voluptas enim.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-09 11:21:25'),
(46, 'transferee', NULL, 'Agnes', 'Witting', 'Spinka', 'BSAC', 'SBAA', 'Japanese', '504 Harris Path Suite 234\nColbyview, ME 17735', 'lacy.schiller@example.com', '9636650949', 'East Melvinastad', 'Aut aperiam rem in qui. Dolorem vitae quo modi. Incidunt autem non magni rerum quis consequatur nemo.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-03-11 11:48:48'),
(47, 'transferee', NULL, 'Dave', 'Mills', 'Kunze', 'BSBA', 'SBAA', 'Japanese', '7318 Zelda Isle Apt. 026\nKaliland, MS 17271-3891', 'florencio.hermiston@example.com', '9653933758', 'Catherinefort', 'Id et architecto deserunt quia esse sit minima. Quia accusamus consequatur est explicabo non officia. Sunt aut ad eum qui consectetur.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(48, 'incoming_first_year', NULL, 'Jacquelyn', 'Wunsch', 'Swaniawski', 'MA-ENGL', 'GS', 'Taiwanese', '73297 Claude Mountains Suite 798\nSheashire, CO 14538-7234', 'mohr.kole@example.com', '9374234699', 'East Joesphside', 'Ut porro enim optio natus. Sint vel tempora amet est quis aut. Omnis explicabo et voluptates at doloribus voluptatem ut. Autem maxime iusto quam dolorem quia labore.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(49, 'incoming_first_year', NULL, 'Ursula', 'Lowe', 'Kirlin', 'MPA', 'STELA', 'Taiwanese', '1523 Elisabeth Road\nWalkermouth, MT 42841', 'ylarkin@example.org', '9105102708', 'New Jaquanmouth', 'Esse illum quia quidem eius quaerat sit atque. Corporis sint placeat cum dolorum facilis eum. Et dignissimos eligendi quas quis. Eligendi id ea ea optio. Sit corporis maiores aut molestias voluptate.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(50, 'incoming_first_year', NULL, 'Cathy', 'Konopelski', 'Cartwright', 'BSECE', 'SEA', 'Chinese', '501 Fanny Mission Apt. 261\nCummeratatown, LA 25334', 'bins.arden@example.net', '9062572567', 'South Rosemary', 'Assumenda enim adipisci qui nihil iure optio quod. Quia assumenda possimus omnis distinctio neque ea sit. Expedita porro optio ab voluptas aut.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(51, 'incoming_first_year', NULL, 'Fidel', 'Rodriguez', 'Wisoky', 'EDD', 'GS', 'Taiwanese', '888 Haag Cove\nMarlonton, MO 04052', 'paufderhar@example.com', '9992788926', 'Bethstad', 'Ea dicta facilis ipsa esse error. Quasi possimus nihil eaque tempora perspiciatis. Veritatis iusto accusantium nihil suscipit quae modi qui. Hic temporibus rerum non sit.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(52, 'transferee', NULL, 'Roxanne', 'Gibson', 'Moore', 'BSAC', 'SBAA', 'Japanese', '53631 Block Rest Apt. 021\nWest Zane, NJ 03622', 'brando.bayer@example.com', '9543259534', 'Carmelafurt', 'Odio quibusdam in sed dolore. Sequi qui iusto quos quibusdam.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(53, 'incoming_first_year', NULL, 'Alexandro', 'Schamberger', 'Turner', 'BSCPE', 'SIT', 'Japanese', '2560 Dibbert Dam Apt. 207\nNathanieltown, AK 95585', 'romaguera.emiliano@example.com', '9378303147', 'South Fay', 'Quo aperiam asperiores earum recusandae. Incidunt itaque autem doloribus id. Laborum commodi quam facilis delectus optio.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(54, 'transferee', NULL, 'Conner', 'Welch', 'Weimann', 'BSN', 'SON', 'South Korean', '35489 Dickinson Underpass\nYoshikochester, IL 91599', 'lilla23@example.org', '9285746301', 'Karianneshire', 'Sint sit est pariatur cumque corrupti quia et. Modi aspernatur molestiae voluptatibus. Veritatis autem ut architecto ipsam similique impedit illo.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(55, 'incoming_first_year', 1231, 'Aethelwulf', 'Pagac', 'Wessex', 'MAED-FIL', 'STELA', 'Japanese', '25963 Gaylord RestMullerchester, MN 00397', 'powlowski.jewell@example.com', '9472550256', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-01 14:08:28'),
(56, 'incoming_first_year', NULL, 'Brendan', 'Walsh', 'Kozey', 'BSCE', 'SEA', 'Chinese', '712 Weston Ports\nNorth Beverly, ND 15111-8489', 'bobbie.king@example.com', '9437038050', 'Lueilwitzburgh', 'Culpa numquam pariatur eos inventore ut esse. Eum commodi expedita omnis unde quia. Fuga qui aut sunt voluptatem pariatur optio quod. Ut rerum a et sequi ducimus nulla.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(57, 'transferee', 5468, 'Misael', 'Hermann', 'Runolfsson', 'BSCPE', 'SIT', 'South Korean', '26796 Russel Points Suite 885\nWendellside, OH 76292-5235', 'deron.breitenberg@example.net', '9721718587', 'Haleighbury', 'Qui laboriosam sit at ex sed necessitatibus. Vel aut expedita dolor at. Voluptates asperiores deleniti numquam eveniet. Dicta aut rerum iure alias exercitationem.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-10 14:36:32'),
(58, 'incoming_first_year', NULL, 'Florencio', 'Roberts', 'Jenkins', 'BS-PT', 'SNS', 'American', '865 Kunze Station Apt. 228\nDickensport, MD 47836-4384', 'oconner.saul@example.net', '9753034369', 'New Jesus', 'Eum consequatur eaque minus quis officiis. Repudiandae rerum autem qui reprehenderit. Blanditiis non et suscipit temporibus et illo. Culpa voluptatem possimus consequatur eum.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(59, 'incoming_first_year', NULL, 'Melvina', 'Kutch', 'Yundt', 'BSN', 'SON', 'Chinese', '877 Mitchell Greens\nPacochaview, GA 08114-7533', 'carroll49@example.com', '9277339603', 'Jakubowskiville', 'Repellendus nam voluptate maxime quo qui qui a. Voluptatem corrupti cupiditate deserunt nobis. Tenetur ipsa molestiae nihil temporibus. Delectus eos ducimus animi nesciunt magnam nobis.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(60, 'incoming_first_year', NULL, 'Zetta', 'Fisher', 'Stracke', 'BSECE', 'SEA', 'South Korean', '32458 Fatima Crossing\nPort Adrian, NJ 83167', 'gwiza@example.org', '9831863144', 'South Rick', 'Dolor dolorum sapiente nisi sed. Ut consequatur neque praesentium itaque. Tempora ex doloribus ea commodi commodi quos. Consequuntur eos iste voluptatem dolore.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(61, 'incoming_first_year', NULL, 'Hipolito', 'Monahan', 'Murazik', 'BSCRIM', 'SCJPS', 'American', '626 Pink Mill Suite 793\nSouth Pat, TX 99190', 'crona.mayra@example.net', '9851069507', 'Moshetown', 'Dolorem esse a voluptates quidem. Nemo quo maxime atque et. Non laboriosam id est aliquam aut. Quod magnam sed aliquam vel autem nostrum velit.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(62, 'returning_first_year', 28657515, 'Porter', 'Rice', 'Wiza', 'BSAC', 'SBAA', 'American', '51245 Swaniawski Wall Apt. 189\nAlexaneburgh, ND 96935-7359', 'jmayert@example.com', '9247500038', 'Lake Ruben', 'Deserunt est sit non sed occaecati saepe aut pariatur. Temporibus nisi commodi ut qui neque. Maxime et doloribus voluptatum est cupiditate aliquid. Non atque eos aut temporibus.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(63, 'returning_first_year', 28677961, 'Koby', 'Block', 'Cremin', 'DBA', 'GS', 'Japanese', '249 Wolf Groves Apt. 171\nJohnsville, OR 87722-4978', 'jaime.rolfson@example.com', '9896997040', 'O\'Reillyfurt', 'Quia numquam sit voluptatem perspiciatis quam. Dolor quam consequatur delectus atque porro nobis possimus. Sed sequi dolorem id maxime quas nihil qui. Ut aliquam dolor aut velit mollitia.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(64, 'incoming_first_year', NULL, 'Pink', 'Eichmann', 'Lesch', 'MA-ENGL', 'GS', 'Taiwanese', '289 Nikolas Forges Suite 793\nPort Jessika, AK 78144-1696', 'vluettgen@example.net', '9573464180', 'Emardview', 'Consequatur occaecati fugiat totam beatae. Placeat qui nihil laborum. Quibusdam provident expedita odio commodi voluptatem. Laudantium odio eveniet ipsa reiciendis velit eveniet quam exercitationem.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(65, 'incoming_first_year', NULL, 'Hassie', 'Wintheiser', 'Kunze', 'BSHM-IHBO', 'SIHTM', 'Japanese', '51867 Beer Vista\nPort Shannabury, MN 58191-9044', 'grady.hahn@example.org', '9608372156', 'Port Camilleville', 'Voluptates aut quas sequi ut. Tempora sed consequuntur explicabo dolorum. Sint explicabo tenetur quia. Autem eos non quia reiciendis non error qui.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(66, 'incoming_first_year', NULL, 'Jessica', 'Effertz', 'Rolfson', 'BA-MUSIC', 'STELA', 'South Korean', '1032 Lew Cove Apt. 442New Ralph, GA 00974', 'oran37@example.org', '9952092178', NULL, NULL, 'pending', NULL, NULL, '2023-02-26 07:37:48', '2023-03-23 00:55:35'),
(67, 'transferee', NULL, 'Katrine', 'Kunde', 'Schmitt', 'BSN', 'SON', 'Japanese', '88777 Adriana Trail Apt. 661\nWittingland, NM 09638-6401', 'wolson@example.net', '9947921168', 'Kraigport', 'Doloribus sit soluta autem reiciendis. Quae perferendis libero maiores dolor quia debitis. Aliquid ea non veritatis adipisci dolorem velit iusto perspiciatis.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(68, 'transferee', 546879, 'Cecilia', 'Mraz', 'Hyatt', 'BSIT-ICT', 'SIT', 'American', '33507 Grayce Drive Suite 050Constantinville, OK 90669-7821', 'ireinger@example.net', '9837769855', NULL, NULL, 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-04-27 14:58:52'),
(70, 'returning_first_year', 29507422, 'Quincy', 'Boyle', 'Schneider', 'BSCS', 'SIT', 'Japanese', '836 Luciano Locks Suite 122\nEast Loma, NY 67045', 'deion.heathcote@example.net', '9000236151', 'Colbyberg', 'Est laboriosam voluptas ducimus tempore hic. Eos enim voluptatem nihil. Veritatis voluptate vero omnis ut neque nam blanditiis.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-09 11:21:33'),
(71, 'incoming_first_year', NULL, 'Jerod', 'Schulist', 'Volkman', 'MA-ENGL', 'GS', 'Japanese', '24035 Olson Vista Apt. 206\nReynoldstown, ND 01468-7431', 'jayce.reichert@example.net', '9158810444', 'South Aurelioton', 'Modi dicta porro qui sint harum harum. Sit tempore illo non aut omnis autem. Vero veniam non qui id. Suscipit nesciunt et quasi earum autem corrupti.', 'pending', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(72, 'incoming_first_year', NULL, 'Kade', 'Botsford', 'Hoeger', 'BSAC', 'SBAA', 'Japanese', '6355 Leland Mall\nMakenzieburgh, MO 15253', 'vjast@example.org', '9121219954', 'Harveyfort', 'Et id vitae aliquid illum. Sed at assumenda ab quasi consectetur. Recusandae fuga atque commodi quas ipsum qui quo.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(73, 'incoming_first_year', NULL, 'Paxton', 'Christiansen', 'Connelly', 'MDE', 'SOD', 'Japanese', '893 Fisher Forge\nCummeratafurt, IA 26329-4990', 'jcrona@example.com', '9892490566', 'West Quinton', 'Et aut ea sit omnis. Maxime voluptatibus dolorem eos asperiores harum suscipit. Magnam ea eveniet incidunt. Maxime ut cupiditate deserunt enim harum. Accusamus similique omnis quidem quas quia harum.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(74, 'incoming_first_year', NULL, 'Keon', 'Schamberger', 'Feil', 'BSN', 'SON', 'American', '95147 Hessel Island\nStephanymouth, NE 88484-5884', 'simonis.tessie@example.org', '9158393776', 'Giovannafort', 'Reprehenderit voluptas ut minima. Autem rem recusandae quod nemo rerum culpa tenetur. Fuga aliquid veritatis tempora sed dignissimos. Consequatur nobis odit consequatur nostrum vitae.', 'for id', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(75, 'returning_first_year', 28000249, 'Alexandre', 'Gottlieb', 'Batz', 'BFSC', 'SCJPS', 'Taiwanese', '6120 Breitenberg Prairie\nPollichtown, DE 98402', 'smitham.odessa@example.com', '9185997602', 'South Chadrickside', 'Autem fuga odit optio. Qui assumenda saepe rerum tempora eum. Est facere fugiat eos velit ullam. Laudantium fugiat asperiores quo nihil omnis cupiditate dicta.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-09 11:24:33'),
(76, 'returning_first_year', 28557697, 'Lempi', 'Vandervort', 'Goyette', 'BSHM-PCA', 'SIHTM', 'South Korean', '1659 Heller Island\nShieldsstad, DE 20418-2995', 'jacobs.norwood@example.net', '9397505914', 'West Budville', 'Doloribus qui aut maxime delectus suscipit magnam nobis. Vitae inventore est asperiores. Sit rerum voluptatem possimus consequuntur consequatur doloremque.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(77, 'returning_first_year', 24404273, 'Bertrand', 'Durgan', 'Greenfelder', 'MSCJSC', 'GS', 'Taiwanese', '3178 Trey Tunnel\nWest Jaquelinton, AL 59855', 'viva23@example.org', '9411110387', 'New Charlesfurt', 'Quia molestias ut incidunt vel in perspiciatis expedita. Qui qui consequatur suscipit voluptatum est doloremque. Ut ut nesciunt ea atque id tempora. Mollitia iusto modi quaerat et odit.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(78, 'transferee', NULL, 'Jordan', 'Kessler', 'Stamm', 'BSCS', 'SIT', 'Chinese', '2668 O\'Keefe LakesWest Shermanshire, IA 83003-9657', 'gail67@example.net', '9081591946', NULL, NULL, 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-03-13 15:59:54'),
(79, 'incoming_first_year', 123456789, 'Eren', 'Lebsack', 'Pendragon', 'EDD', 'GS', 'Japanese', '847 Wisoky Coves Suite 297New Barton, NV 24016', 'eren_pendragon@example.org', '9453592030', NULL, NULL, 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-03-03 12:51:12'),
(80, 'transferee', NULL, 'Andrew', 'McKenzie', 'Swift', 'J.D.', 'SOL', 'South Korean', '69883 Abbott Landing Suite 600\nPort Amelyland, TX 69878-4584', 'francis57@example.net', '9272451261', 'West Dallinport', 'Architecto nulla dolorem earum et ea provident rerum. Quia ea fuga eum voluptas. Tempora placeat eos est harum ut.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(81, 'transferee', NULL, 'Dominique', 'Murray', 'Nienow', 'BSCRIM', 'SCJPS', 'American', '2426 Dicki Drive\nEast Jeffry, HI 72809-7699', 'mozelle86@example.org', '9559698093', 'East Cullen', 'Aspernatur pariatur quidem in et natus amet asperiores minus. Vitae est distinctio qui libero placeat corporis sunt qui. Neque natus praesentium odio temporibus in.', 'for approval', NULL, NULL, '2021-02-26 07:37:48', '2023-02-26 07:37:48'),
(82, 'returning_first_year', 26146477, 'Eleanora', 'Bernier', 'Kovacek', 'BSED-ENGL', 'STELA', 'American', '94223 Lesch Walks Apt. 667\nMetzfurt, NH 42135', 'davis.antonetta@example.com', '9089515017', 'Nolanstad', 'Autem cum tempore corporis rerum. Eveniet in voluptatum cumque facilis culpa consequatur vel. Voluptatem ut dignissimos non ex. Quia eius explicabo animi.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(83, 'transferee', NULL, 'Osborne', 'O\'Keefe', 'Langosh', 'BEED', 'STELA', 'American', '1794 McGlynn Field Apt. 642\nConstanceberg, CA 73500-0456', 'ashlynn.welch@example.org', '9625924168', 'North Terrill', 'Assumenda consequatur dicta non iusto. Natus corporis quis modi suscipit numquam pariatur. Enim non et beatae quis ratione quaerat. Ducimus quidem aliquam dolorem ea.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(84, 'returning_first_year', 28643736, 'Delores', 'Beatty', 'Hill', 'AACACO', 'SIHTM', 'South Korean', '14096 Carol Extension Suite 113\nNorth Harrison, IA 70140-3477', 'vbeier@example.net', '9813214907', 'New Audraton', 'Reiciendis dolore id saepe occaecati qui distinctio. Et sit quam eligendi. Aliquid corporis odit vel quis.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(85, 'returning_first_year', 23906713, 'Isom', 'Glover', 'Harvey', 'BSBA-HRDM', 'SBAA', 'American', '601 Abdullah Forges\nMedhursthaven, WA 78534-7651', 'drake75@example.org', '9033489919', 'Shanahanport', 'Alias sit delectus rem. Minima distinctio eos ullam sunt possimus in voluptates. Quos explicabo voluptatem corporis iusto. Alias minima qui error vel.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(86, 'transferee', NULL, 'Ursula', 'O\'Connell', 'Botsford', 'BSCPE', 'SIT', 'Taiwanese', '6905 Hilpert Path\nEast Cecil, WY 78132', 'daniel.toby@example.org', '9232347459', 'West Fae', 'Vero temporibus et assumenda. Amet omnis quam ut saepe quidem sunt. Libero velit reiciendis dolores aut. Aliquam natus soluta nihil hic ullam. Ab nemo ea voluptate adipisci rem voluptas assumenda.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(87, 'returning_first_year', 29189061, 'Alexis', 'Upton', 'Grant', 'BA-COMM', 'STELA', 'Chinese', '14766 Daniel Canyon Apt. 488\nWest Adrienne, WV 32091-9768', 'imogene.dare@example.com', '9281137707', 'Bernieceville', 'Voluptas ducimus sed molestiae aut. Pariatur ut commodi culpa ab commodi in. Velit et eligendi repudiandae inventore. Aperiam ab illo qui aut velit fuga.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(89, 'returning_first_year', 22013611, 'Duane', 'Ondricka', 'Jerde', 'BSCRIM', 'SCJPS', 'Filipino', '4909 Vilma Cove\nSchultzland, NE 88112-9562', 'dalton54@example.net', '9680156666', 'Terrytown', 'Nihil fugit doloribus quia unde voluptatem eos nostrum recusandae. Eum eligendi inventore aperiam. Neque dolore sint et porro consectetur beatae. Illo praesentium quo qui nobis et reiciendis.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(90, 'incoming_first_year', NULL, 'Janessa', 'Yundt', 'Schaden', 'BSED-ENGL', 'STELA', 'Japanese', '44706 Gaetano Corners\nBreanafurt, CA 64734', 'vito40@example.com', '9285823892', 'Framifurt', 'Iusto incidunt sit et aut pariatur. Voluptatum fugit voluptatem eos amet cupiditate est. Harum omnis nesciunt ut esse dicta illo fugiat.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(91, 'returning_first_year', 25591112, 'Theodore', 'Lemke', 'Jaskolski', 'MSCJSC', 'GS', 'Japanese', '1496 Ryan Junction\nDooleymouth, ND 66404-8037', 'alanis25@example.org', '9344756594', 'East Juniorchester', 'In error assumenda excepturi. Nihil voluptatem neque omnis eligendi id. Dolorem fuga unde quidem voluptates corporis numquam totam. Officia nihil maiores labore numquam sit sit eaque.', 'dropped', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(92, 'incoming_first_year', NULL, 'Magnolia', 'Moen', 'Klocko', 'BA-POLSCI', 'STELA', 'Chinese', '56922 Abby Oval Suite 524New Ashley, AL 16071-4792', 'batz.colleen@example.com', '9525665260', NULL, NULL, 'dropped', 'university of baguio', '2020', '2023-02-26 07:37:48', '2023-04-17 17:59:11'),
(93, 'transferee', NULL, 'Malachi', 'Mann', 'Hermann', 'EDD', 'GS', 'Japanese', '853 Pfannerstill Crossing Suite 617\nPort Florencioland, ID 24473-2900', 'heaney.kayli@example.com', '9833661776', 'Port Griffinburgh', 'Vero dignissimos est est quaerat deleniti rerum blanditiis. Aut fuga atque et unde sit possimus sit. Qui ex et voluptas placeat voluptatem. Vitae dolores quas dignissimos molestias.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(94, 'transferee', NULL, 'Kathleen', 'Botsford', 'Lehner', 'BSBA-FM', 'SBAA', 'Chinese', '29638 Lehner Estate\nEast Clay, AK 23879', 'shania.becker@example.com', '9558837164', 'East Collinbury', 'Quo illum harum enim porro dignissimos autem. Quisquam dolorem non adipisci. Expedita ea aut autem cumque.', 'for approval', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(95, 'incoming_first_year', NULL, 'Emile', 'Bradtke', 'Kulas', 'BSBA-HRDM', 'SBAA', 'South Korean', '4476 Dexter Club\nYvettebury, NH 89663-9599', 'dallin.schmidt@example.net', '9745241867', 'New Delphia', 'Architecto possimus ut atque et molestiae nihil. Quam aliquam consequatur rerum porro. Sunt maiores voluptatibus quasi aut nulla tenetur.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(96, 'incoming_first_year', NULL, 'Providenci', 'Ledner', 'Rowe', 'BSCRIM', 'SCJPS', 'American', '24449 Schamberger Tunnel\nNew Robb, ME 33617', 'junior.mckenzie@example.net', '9349697059', 'Torphystad', 'Itaque ut quae inventore aut illo nobis eos. Molestias voluptate libero fugit iure. Nisi ea modi itaque quae dolorem minus enim. Sed non vitae nam iusto odio officia.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(97, 'transferee', NULL, 'Lyda', 'Blanda', 'Hermann', 'MAED-ED MGMT', 'STELA', 'Japanese', '671 Quitzon Common Apt. 301\nKoeppshire, KY 13383', 'klocko.ryan@example.com', '9636056989', 'Turnerhaven', 'Dolor deserunt fuga iusto blanditiis culpa libero. Quisquam aspernatur necessitatibus quasi. Similique neque consequatur et voluptates est sunt. Sed pariatur eos et nemo.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(98, 'incoming_first_year', NULL, 'Einar', 'Trantow', 'Heidenreich', 'BA-MUSIC', 'STELA', 'Chinese', '654 Natalia Spurs\nHowellchester, MN 19602', 'margret86@example.com', '9603872005', 'Shannachester', 'Officiis minus neque quia in quis placeat aut quo. Numquam et dolor ut deserunt aut autem totam. Sit iste dolorem labore dolore quia est voluptatem. Asperiores fugiat nostrum vel suscipit ab.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(99, 'returning_first_year', 28429851, 'Austen', 'Skiles', 'Kuvalis', 'BFSC', 'SCJPS', 'Chinese', '10889 Gaston Glen\nWolfstad, IA 65879-8939', 'brown21@example.net', '9511187515', 'Camronberg', 'Sint nemo molestias impedit quia et. Ratione tenetur qui quia ut ratione.', 'for encoding/enrollment', NULL, NULL, '2023-02-26 07:37:48', '2023-02-26 07:37:48'),
(100, 'incoming_first_year', 3648546, 'Onie', 'Greenfelder', 'Goldner', 'BSCPE', 'SIT', 'Japanese', '30525 Fabiola Via Apt. 003\nMckaylachester, MA 83215-8100', 'granville.mraz@example.com', '9523973731', 'North Cleofort', 'Ratione quod quia omnis quia praesentium impedit. Accusantium quis est aut quia laboriosam. Deserunt quos error quis facere reiciendis veniam.', 'registered', NULL, NULL, '2023-02-26 07:37:48', '2023-03-07 01:36:46'),
(101, 'transferee', NULL, 'Juan', NULL, 'Dragneel', 'BSCPE', 'SIT', 'Filipino', NULL, 'natsu_dragneel@email.com', '09123456798', 'Baguio', 'Upper Mystery', 'for id', NULL, NULL, '2023-02-26 08:03:32', '2023-02-26 08:03:32'),
(103, 'transferee', 20115486, 'Catherine', NULL, 'de Aragon', 'BSPSYCH', 'STELA', 'Aragonese', '155-C, Aragon Castle, Kingdom of Aragon', 'catherine@email.com', '09598765354', NULL, NULL, 'for encoding/enrollment', 'Aragon University', '2020', '2023-02-27 07:42:03', '2023-04-16 17:24:08'),
(106, 'returning_first_year', 231555, 'Juan', NULL, 'Dragneel', 'BSESE', 'SEA', NULL, 'Fairytail Guild, Fiore', NULL, '0965479841321', 'Baguio', 'Upper Mystery', 'for encoding/enrollment', NULL, NULL, '2023-03-06 16:42:51', '2023-03-07 01:05:14'),
(107, 'transferee', 123412, 'Juan', 'Dragneel', 'Dragneel', 'BSBA', 'SBAA', 'Filipino', NULL, NULL, NULL, NULL, NULL, 'registered', NULL, NULL, '2023-03-09 11:11:30', '2023-03-09 11:24:18'),
(109, 'incoming_first_year', 36548, 'Juan', 'De luna', 'Pendragon', 'BSCPE', 'SIT', 'Filipino', NULL, NULL, NULL, NULL, NULL, 'for encoding/enrollment', NULL, NULL, '2023-03-09 11:32:27', '2023-03-10 02:08:36'),
(110, 'returning_first_year', 3266448, 'Matt', 'Klem', 'Grineer', 'BSCE', 'SEA', 'Grineer', '25-B, Di Malaman Building', 'matt@email.com', '09654846165', 'Baguio', 'Upper Mystery', 'pending', NULL, NULL, '2023-03-10 02:31:49', '2023-03-10 02:31:49'),
(111, 'returning_first_year', NULL, 'Matt', 'Klem', 'Grineer', 'BSCE', 'SEA', 'Grineer', '25-B, Di Malaman Building', 'matt@email.com', '09654846165', 'Baguio', 'Upper Mystery', 'for approval', NULL, NULL, '2023-03-10 02:33:07', '2023-03-10 02:33:45'),
(112, 'incoming_first_year', 54987, 'Zeref', NULL, 'Dragneel', 'BSPD', 'eSports', NULL, 'Hell', 'a@email.com', '908977687', NULL, NULL, 'registered', NULL, NULL, '2023-03-10 14:24:40', '2023-03-10 14:26:12'),
(114, 'returning_first_year', 20185665, 'Juan', 'Dragneel', 'Pendragon', 'BET-MECHA', 'SEA', 'Filipino', 'Fairytail Guild, Fiore', 'juan22@email.com', '3216879798', 'Fiore City', 'Upper Mystery', 'pending', NULL, NULL, '2023-03-11 11:38:52', '2023-03-11 11:38:52'),
(115, 'returning_first_year', 54987465, 'Juan', 'Dragneel', 'Pendragon', 'BSBA-OM', 'SBAA', 'Filipino', 'Fairytail Guild, Fiore', 'juan124214@email.com', '9879654984', 'Fiore', 'Upper Mystery', 'pending', NULL, NULL, '2023-03-11 11:41:11', '2023-03-11 11:41:11'),
(116, 'returning_first_year', 20154565, 'Zireal', 'Natah', 'Ventkid', 'BSIT-ICT', 'SIT', 'Vox Solaris', '1-B, Di Malaman Building', 'Zireal@email.com', '354894897465', NULL, NULL, 'for encoding/enrollment', 'Fortuna High', '2055', '2023-03-11 11:57:22', '2023-04-17 17:58:44'),
(117, 'returning_first_year', 421421, 'Azure', 'Lazuli', 'Sky', 'BSIT-ICT', 'SIT', 'Spanish', '22-B, Di Malaman Building', 'azure@email.com', '064684651', 'Baguio', 'Upper Mystery', 'pending', NULL, NULL, '2023-03-13 15:55:43', '2023-03-13 15:55:43'),
(118, 'transferee', 354879, 'Juan', 'Dragneel', 'Pendragon', 'BSBA-HRDM', 'SBAA', 'Filipino', '22-B, Di Malaman Building', 'natsul@email.com', '031354984', NULL, NULL, 'for encoding/enrollment', 'Fiore University', '2017', '2023-03-17 16:00:03', '2023-04-17 17:58:13'),
(123, 'transferee', NULL, 'Juan456', 'ha', 'Dragneel', 'BSAC', 'SBAA', 'Filipino', '2223-B, Di Malaman Building', 'nragneel@email.com', '06879841686', NULL, NULL, 'for approval', NULL, NULL, '2023-03-17 16:12:45', '2023-03-22 16:37:24'),
(124, 'transferee', NULL, 'Juan', 'f', 'ffff', 'BSAC', 'SBAA', 'Filipino', 'Fairytail Guild, Fiore', 'natsu2_dragneel@email.com', '31468468', 'Baguio', 'Upper Mystery', 'pending', NULL, NULL, '2023-03-27 10:14:03', '2023-03-27 10:14:03'),
(125, 'transferee', NULL, 'Juan', 'f', 'ffff', 'BSAC', 'SBAA', 'Filipino', 'Fairytail Guild, Fiore', 'natsu2_dragneel@email.com', '314684682', NULL, NULL, 'for approval', NULL, NULL, '2023-03-27 10:22:44', '2023-03-27 19:47:20'),
(126, 'transferee', NULL, 'Pedro', 'Panday', 'Penduko', 'MCDRRM', 'GS', 'Filipino', '12-C, Di Malaman Building', 'pedro.penduko@gmail.comm', '09321654987', 'Baguio', 'Upper del Fiore', 'pending', 'Panday Academy', '2023', '2023-04-17 11:29:35', '2023-04-17 11:29:35'),
(128, 'incoming_first_year', 201234552, 'Aethelwulf', 'Aethelson', 'Wessex', 'BEED', 'STELA', 'Wessex', '30-B, Di Malaman Building', 'aethedwulf.wessex@email.com', '09654789123', 'Baguio', 'Upper del Fiore', 'for encoding/enrollment', 'University of Baguio', '2020', '2023-05-01 17:39:52', '2023-05-01 17:43:52'),
(131, 'transferee', NULL, 'Zeref', 'Dragneel', 'Pendragon', 'BSBA', 'SBAA', 'Fiore', 'Fairytail Guild, Fiore', '546knight079@gmail.com', '09564879811', 'Baguio', NULL, 'pending', 'Fiore University', '2017', '2023-05-04 15:35:25', '2023-05-04 15:35:25'),
(132, 'transferee', NULL, 'Zeref', 'Dragneel', 'Pendragon', 'BSBA', 'SBAA', 'Fiore', 'Fairytail Guild, Fiore', '546knight079@gmail.com', '09564879811', 'Baguio', NULL, 'pending', 'Fiore University', '2017', '2023-05-04 15:36:48', '2023-05-04 15:36:48'),
(133, 'transferee', NULL, 'Zeref', 'Dragneel', 'Pendragon', 'BSBA', 'SBAA', 'Fiore', 'Fairytail Guild, Fiore', '546knight079@gmail.com', '09564879811', 'Baguio', NULL, 'pending', 'Fiore University', '2017', '2023-05-04 15:36:58', '2023-05-04 15:36:58'),
(134, 'transferee', NULL, 'Zeref', 'Dragneel', 'Pendragon', 'BSBA', 'SBAA', 'Fiore', 'Fairytail Guild, Fiore', '546knight079@gmail.com', '09564879811', 'Baguio', NULL, 'pending', 'Fiore University', '2017', '2023-05-04 15:37:40', '2023-05-04 15:37:40'),
(135, 'transferee', NULL, 'QWER', 'Dragneel', 'RWQE', 'BSIT-ICT', 'SIT', 'Filipino', NULL, NULL, NULL, 'Fiore', NULL, 'pending', 'Fiore University', '2017', '2023-05-04 21:27:13', '2023-05-04 21:27:13'),
(136, 'returning_first_year', 25468, 'Zeref', 'Aragon', 'Dluna', 'BET-MECHA', 'SEA', 'Spanish', 'Hell', '2regag9@gmail.com', '09564879811f', 'upper', NULL, 'pending', 'Fiore University', '2019', '2023-05-04 21:41:28', '2023-05-04 21:41:28'),
(137, 'transferee', NULL, 'Zeref', 'Aragon', 'Monkey', 'BSIT-ICT', 'SIT', 'Filipino', '22-B, Di Malaman Building', 'nrasgneel@email.com', '09564879812', 'Baguio', NULL, 'pending', 'gsdfhsjh', '2017', '2023-05-04 21:43:55', '2023-05-04 21:43:55'),
(139, 'transferee', NULL, 'Luffy', 'D', 'Wessex', 'BSESE', 'SEA', 'Filipino', 'Hell', 'juan@email.com', '09564879811', 'Baguio', 'Upper del Fiore', 'pending', 'gsdfhsjh', '2019', '2023-05-04 23:05:10', '2023-05-04 23:05:10'),
(140, 'transferee', NULL, 'Juan456', 'asdf', 'Dluna', 'BSBA-MM', 'SBAA', 'East Blue', 'Hell', 'natsu_dragneel@email.com', '09564879811', 'upper', NULL, 'pending', 'East Blue Academy', '2023', '2023-05-04 23:42:55', '2023-05-04 23:42:55'),
(141, 'transferee', NULL, 'Natsuags', 'Aragon', 'Monkeyasg', 'BSCE', 'SEA', 'Filipino', '2223-B, Di Malaman Building', 'juan@email.com', '09564879811', 'Fiore', NULL, 'pending', 'East Blue Academy', '2019', '2023-05-04 23:46:33', '2023-05-04 23:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_passports`
--

CREATE TABLE `student_passports` (
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `passport_num` varchar(255) DEFAULT NULL,
  `dpissued` date DEFAULT NULL,
  `dpexpiry` date DEFAULT NULL,
  `acr_icard_num` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_passports`
--

INSERT INTO `student_passports` (`registration_id`, `student_id`, `passport_num`, `dpissued`, `dpexpiry`, `acr_icard_num`, `created_at`, `updated_at`) VALUES
(103, NULL, '123456598', '2023-03-01', '2027-07-10', '12345982', '2023-02-27 07:42:03', '2023-03-02 18:23:02'),
(79, NULL, '1256126244', NULL, NULL, '123459844', '2023-02-28 18:35:39', '2023-02-28 19:11:30'),
(55, NULL, '12344421', '2023-03-23', '2023-03-15', '329844', '2023-03-01 12:59:21', '2023-03-01 12:59:21'),
(23, NULL, '1234523', '2023-03-04', '2033-12-15', '987231456', '2023-03-01 14:02:56', '2023-03-01 14:02:56'),
(38, NULL, NULL, NULL, NULL, NULL, '2023-03-01 14:23:30', '2023-03-01 14:23:30'),
(31, NULL, NULL, NULL, NULL, NULL, '2023-03-04 13:20:07', '2023-03-04 13:20:07'),
(106, NULL, '125236246', '2023-03-09', '2023-04-08', '321654986', '2023-03-06 16:42:51', '2023-03-06 16:42:51'),
(7, NULL, NULL, NULL, NULL, NULL, '2023-03-07 01:37:58', '2023-03-07 01:37:58'),
(110, NULL, '3625', '2023-03-03', '2023-04-08', '654896', '2023-03-10 02:31:49', '2023-03-10 02:31:49'),
(111, NULL, NULL, NULL, NULL, NULL, '2023-03-10 02:33:07', '2023-03-10 02:33:07'),
(112, NULL, NULL, NULL, NULL, NULL, '2023-03-10 14:24:40', '2023-03-10 14:24:40'),
(116, NULL, '216849', '2023-03-16', '2023-04-01', '594687984', '2023-03-11 11:57:22', '2023-03-14 01:23:08'),
(117, NULL, '125236242', '2023-02-28', '2023-04-08', '789452', '2023-03-13 15:55:43', '2023-03-13 15:55:43'),
(68, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:58:30', '2023-03-13 15:58:30'),
(78, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:59:54', '2023-03-13 15:59:54'),
(66, NULL, NULL, NULL, NULL, NULL, '2023-03-23 00:55:35', '2023-03-23 00:55:35'),
(92, NULL, NULL, NULL, NULL, NULL, '2023-03-27 05:35:05', '2023-03-27 05:35:05'),
(2, NULL, NULL, NULL, NULL, NULL, '2023-04-16 17:12:51', '2023-04-16 17:12:51'),
(5, NULL, NULL, NULL, NULL, NULL, '2023-04-16 17:13:17', '2023-04-16 17:13:17'),
(15, NULL, NULL, NULL, NULL, NULL, '2023-04-17 18:11:12', '2023-04-17 18:11:12'),
(40, NULL, NULL, NULL, NULL, NULL, '2023-04-17 18:11:49', '2023-04-17 18:11:49'),
(128, NULL, '125236243', '2020-05-05', '2023-06-10', '987231456', '2023-05-01 17:39:52', '2023-05-01 17:39:52'),
(136, NULL, '1256126', '2023-05-31', '2023-06-10', '3215678', '2023-05-04 21:41:28', '2023-05-04 21:41:28'),
(140, NULL, '12345', '2023-05-25', '2023-06-10', '598652', '2023-05-04 23:42:55', '2023-05-04 23:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_previous_schools`
--

CREATE TABLE `student_previous_schools` (
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `last_school_name` varchar(255) DEFAULT NULL,
  `year_graduated` varchar(255) DEFAULT NULL,
  `prev_sch_bnlb` varchar(255) DEFAULT NULL,
  `prev_school_bname` varchar(255) DEFAULT NULL,
  `prev_sch_str_name` varchar(255) DEFAULT NULL,
  `prev_sch_brngy_name` varchar(255) DEFAULT NULL,
  `prev_sch_city_town` varchar(255) DEFAULT NULL,
  `prev_sch_prov` varchar(255) DEFAULT NULL,
  `prev_sch_reg` varchar(255) DEFAULT NULL,
  `prev_sch_country` varchar(255) DEFAULT NULL,
  `prev_sch_zip` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_previous_schools`
--

INSERT INTO `student_previous_schools` (`registration_id`, `last_school_name`, `year_graduated`, `prev_sch_bnlb`, `prev_school_bname`, `prev_sch_str_name`, `prev_sch_brngy_name`, `prev_sch_city_town`, `prev_sch_prov`, `prev_sch_reg`, `prev_sch_country`, `prev_sch_zip`, `created_at`, `updated_at`) VALUES
(101, 'Fiore University', '2020', 'C+Efg 321523', 'Fiore University Main', 'agsdh', NULL, 'Fiore City', 'del Fiore', 'Capital', 'Fiore', 3000, '2023-02-26 08:03:32', '2023-02-26 08:03:32'),
(103, 'Aragon University', '2020', 'A+ C-358912', 'Aragon University Main', NULL, NULL, 'Saraqustah', 'Saría', 'Zaragosa', 'Kingdom of Aragon', 6894, '2023-02-27 07:42:03', '2023-02-27 07:42:03'),
(79, 'East Blue Academy', '2019', 'E+EBg 3215232', 'East Blue Main', NULL, NULL, 'Pinwheel Town', NULL, NULL, 'East Blue', 3215, '2023-02-28 18:35:39', '2023-02-28 18:35:39'),
(55, 'East Blue Academy', '2020', 'rae325', 'Fiore University Main', 'Mars', NULL, NULL, NULL, 'Zaragosa', 'Philippines', 2600, '2023-03-01 12:59:21', '2023-03-01 12:59:21'),
(23, 'Fiore University', '2017', 'IKD 125', 'Fiore University Main', 'agsdh', NULL, NULL, 'del Fiore', 'Capital', 'hgjfgjfg', 3000, '2023-03-01 14:02:56', '2023-03-01 14:02:56'),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 14:23:30', '2023-03-01 14:23:30'),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-04 13:20:07', '2023-03-04 13:20:07'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-04 13:20:28', '2023-03-04 13:20:28'),
(106, 'Fiore University', '1220', 'C+Efg 321523', NULL, 'agsdh', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-06 16:42:51', '2023-03-06 16:42:51'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 01:37:58', '2023-03-07 01:37:58'),
(107, 'Fiore University', '1220', 'CH8W+3X5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-09 11:11:30', '2023-03-09 11:11:30'),
(109, 'Fiore University', '2020', 'C+Efg 321523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-09 11:32:27', '2023-03-09 11:32:27'),
(110, 'Kuva Fortress', '10000', 'K+ Cf48653', 'Helmire', NULL, NULL, NULL, NULL, NULL, NULL, 63, '2023-03-10 02:31:49', '2023-03-10 02:31:49'),
(111, 'Kuva Fortress', '10000', 'K+ Cf48653', 'Helmire', NULL, NULL, NULL, NULL, NULL, NULL, 63, '2023-03-10 02:33:07', '2023-03-10 02:33:07'),
(112, 'gsdfhsjh', '2020', 'IKD 125', 'Fiore University Main', 'agsdh', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 14:24:40', '2023-03-10 14:24:40'),
(114, 'Fiore University', '2017', 'rae325', 'hgdfjd', 'agsdh', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-11 11:38:52', '2023-03-11 11:38:52'),
(115, 'Fiore University', '2017', 'C+Efg 321523', 'hgdfjd', 'agsdh', 'N/A', 'Pinwheel Town', NULL, NULL, NULL, NULL, '2023-03-11 11:41:11', '2023-03-11 11:41:11'),
(116, 'Fortuna High', '2055', 'F+FCfg 321523', 'Fortuna High Main', NULL, NULL, 'Fortuna', NULL, NULL, 'Venus', 5468, '2023-03-11 11:57:22', '2023-03-11 11:57:22'),
(117, 'Fiore University', '2020', 'C+Efg 3215233', 'Fiore University Main', 'Mars', 'N/A', 'Fiore City', 'del Fiore', 'Capital', 'Kingdom of Fiore', 3000, '2023-03-13 15:55:43', '2023-03-13 15:55:43'),
(68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:58:30', '2023-03-13 15:58:30'),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-13 15:59:54', '2023-03-13 15:59:54'),
(118, 'Fiore University', '2017', 'C+Efg 321523', 'Fiore University Main', 'Mars', 'N/A', 'N/A', 'N/A', 'Zaragosa', 'Kingdom of Fiore', 3626, '2023-03-17 16:00:03', '2023-03-17 16:00:03'),
(123, 'Fiore University', '2017', 'A+ C-358912', 'Navvare Main', 'agsdh', 'hsfjdfj', 'Fiore City', 'del Fiore', 'Capital', 'Fiore', 3265, '2023-03-17 16:12:45', '2023-03-17 16:12:45'),
(66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 00:55:35', '2023-03-23 00:55:35'),
(92, 'university of baguio', '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 05:35:05', '2023-04-17 17:59:11'),
(124, 'Fiore University', '2020', 'C+Efg 321523', 'Fiore University Main', 'agsdh', NULL, 'Fiore City', 'del Fiore', 'Capital', NULL, NULL, '2023-03-27 10:14:03', '2023-03-27 10:14:03'),
(125, 'Fiore University', '2020', 'C+Efg 321523', 'Fiore University Main', 'agsdh', NULL, 'Fiore City', 'del Fiore', 'Capital', NULL, NULL, '2023-03-27 10:22:44', '2023-03-27 10:22:44'),
(1, 'Fiore University', '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 17:12:30', '2023-04-16 17:23:04'),
(2, 'Aragon University', '2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 17:12:51', '2023-04-16 17:23:44'),
(5, 'Fiore University', '2016', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 17:13:17', '2023-04-16 17:23:24'),
(126, 'Panday Academy', '2023', 'C+Efg 321523', 'Panday Main Building', NULL, NULL, 'Baguio', 'Benguet', 'CAR', 'Philippines', 2600, '2023-04-17 11:29:35', '2023-04-17 11:29:35'),
(6, 'University of Baguio', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-17 17:59:44', '2023-04-17 18:00:32'),
(15, 'University of Baguio', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-17 18:11:12', '2023-04-17 18:11:12'),
(40, 'University of the Cordilleras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-17 18:11:49', '2023-04-17 18:11:49'),
(24, 'University of the Cordilleras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-27 14:45:01', '2023-04-27 14:45:01'),
(128, 'University of Baguio', '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-01 17:39:52', '2023-05-01 17:39:52'),
(131, 'Fiore University', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kingdom of Fiore', 50000, '2023-05-04 15:35:25', '2023-05-04 15:35:25'),
(132, 'Fiore University', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kingdom of Fiore', 50000, '2023-05-04 15:36:48', '2023-05-04 15:36:48'),
(133, 'Fiore University', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kingdom of Fiore', 50000, '2023-05-04 15:36:58', '2023-05-04 15:36:58'),
(134, 'Fiore University', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kingdom of Fiore', 50000, '2023-05-04 15:37:40', '2023-05-04 15:37:40'),
(135, 'Fiore University', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Philippines', 3265, '2023-05-04 21:27:13', '2023-05-04 21:27:13'),
(136, 'Fiore University', '2019', 'rae325', NULL, NULL, NULL, NULL, NULL, NULL, 'Kingdom of Fiore', 2600, '2023-05-04 21:41:28', '2023-05-04 21:41:28'),
(137, 'gsdfhsjh', '2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'East Blue', 2600, '2023-05-04 21:43:55', '2023-05-04 21:43:55'),
(139, 'gsdfhsjh', '2019', 'A+ C-358912', 'East Blue Main', 'Mars', 'hsfjdfj', 'jfgjdfj', 'Benguet', 'Zaragosa', 'Kingdom of Fiore', 50000, '2023-05-04 23:05:10', '2023-05-04 23:05:10'),
(140, 'East Blue Academy', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Philippines', 50000, '2023-05-04 23:42:55', '2023-05-04 23:42:55'),
(141, 'East Blue Academy', '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Philippines', 50000, '2023-05-04 23:46:33', '2023-05-04 23:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `student_id_record` int(11) DEFAULT NULL,
  `for_record_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `filename`, `filepath`, `student_id_record`, `for_record_id`, `created_at`, `updated_at`) VALUES
(1, 'RECORD SAMPLE.pdf', 'public/files/0BOfgyvGA8K6B9EQpnV3MKfRL0QYrsPWalAmp6Zb.pdf', 312546978, 1, NULL, NULL),
(2, 'RECORD SAMPLE - Copy.pdf', 'public/files/KG5Yr3KGI0c35PJzPo4mjvu00AqYMDZBnPYxVcWZ.pdf', 312546978, 1, NULL, NULL),
(3, 'de Aragon_Form-137-Request.pdf', 'public/files/ibPhPUeGqosgb4ox65TpkRp6ilF8wOMKuOJWXF7k.pdf', 3159, 2, NULL, NULL),
(4, 'Pendragon_Form-137-Request (1).pdf', 'public/files/W3uCyAWkDRhj0egF5vU3KCNFzaIxDYmMxEenOppi.pdf', 3159, 2, NULL, NULL),
(5, 'Rolfson_Form-137-Request.pdf', 'public/files/vj9PicDqUKUzQ6HXHJtWwfkc8nugidWVBG5UESpS.pdf', 3159, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` varchar(255) DEFAULT NULL,
  `department` varchar(10) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `idNumber`, `password`, `is_admin`, `department`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kaley West', '1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', NULL, 'tvNEufPQ3pZRnhqwDEoUzHXkXmeLS2FwR8Bzp4freJqZKT5tlrMTKEJNTde5', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(2, 'Dr. Zakary Abbott II', '24911091', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'BDViykMlz0', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(3, 'Prof. Coby Walter', '25061096', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FcwD4dZBwc', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(4, 'Cyrus Skiles', '23384889', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'wl0DCLhhNf', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(5, 'Hilario Kerluke', '20815746', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'S3VGm83grr', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(6, 'Laury Lemke', '23590060', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Q5bW67vYFn', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(7, 'Catherine Kertzmann', '29550384', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4GCY79Mqiw', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(8, 'Ms. Dakota Rohan I', '25578984', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'C7ZdnJbM2q', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(9, 'Isabelle Altenwerth', '28941558', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'z1SflYTJpP', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(10, 'Ms. Sincere Kessler Sr.', '22189406', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'q13Ht7GwMK', '2023-02-15 03:58:55', '2023-02-15 03:58:55'),
(11, 'Mr. Maxine Koch V', '28900965', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3', 'SIT', 'BHQhn0Ot0HXLUlQcV25yzNgs4R9PIhRpS2OogBYn3P7Pk4zNMoZeFd9jebBN', '2023-02-19 10:10:39', '2023-03-06 20:54:00'),
(12, 'Zelma Grady', '22610380', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3', 'SOD', 'oHC7zJ9c5vMDXPfjnRMZGDMc6UUzMui2rMCandztOb9Ok6Ww5PrVKKTK1u4d', '2023-02-19 10:10:39', '2023-03-06 21:26:01'),
(13, 'Prof. Hermann Bode', '23272787', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'pMwcWmUN2GaSN4sSH3qWcBk87rINQrJhSNTjDVDdYDaitfRbHRwvAXuhjKmY', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(14, 'Joana Hane', '24396144', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3', 'GS', 'wRYKKZajO8', '2023-02-19 10:10:39', '2023-03-07 01:43:33'),
(15, 'Esteban Kuvalis', '22694132', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3', 'SCJPS', 'FJ4Ii0Nzcz', '2023-02-19 10:10:39', '2023-03-07 01:03:33'),
(16, 'Daryl Rodriguez', '26588811', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'K5TczfgS4h', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(17, 'Jessica Corkery', '29651447', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'iZkDX4h1lu', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(18, 'Deborah Zulauf', '23482067', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ecYmomTh8E', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(19, 'Lisa Bailey', '28253424', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '76Z47J7TyN', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(20, 'Prof. Lily Marquardt V', '24648602', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'St7rQldahZ', '2023-02-19 10:10:39', '2023-02-19 10:10:39'),
(21, 'ARC', '1000', '$2y$10$jPtWdjzGCE62LKArikZSAO6NJ6Zq5i/t/OztJgG30iwTdrroLbbey', '1', NULL, NULL, '2023-03-03 12:56:26', '2023-03-03 12:56:33'),
(22, 'arc_staff1', '3265', '$2y$10$WO2O2D.J6PtNgjJ0HEQwmOhCxNUIJrQ2obXHxCHmYNZ9WwhhYB1Ae', 'Role', 'Department', NULL, '2023-03-09 09:43:42', '2023-03-09 09:43:42'),
(23, 'Corneta1', '9875', '$2y$10$3Kjh3fS76JIoPqzvoVdKae1jbmHf9P7BzazsuiCmskU4WSci2m4oO', NULL, 'Department', NULL, '2023-03-09 09:47:10', '2023-03-09 09:47:10'),
(24, '11', '12121', '$2y$10$FdTQE9zKoNf0LGgy/27DBuT46y0jTbasj9cfXl5st4ZGXjEwST9om', '1', 'Department', NULL, '2023-03-09 09:47:42', '2023-03-09 09:47:42'),
(25, 'Corneta', '213', '$2y$10$0BiZ7HP3OK0dRQTSlyY2TekHjAibumVSP9FeNhYS.pJiGNKwCyFtq', '3', 'SBAA', NULL, '2023-03-09 09:48:11', '2023-03-09 09:48:11'),
(26, 'GS_DEAN', '123', '$2y$10$agCNV4abRIpK5BK.30Ui5.9sRTkucpGXQGnHx8XlGpFHHPwhzjKMi', '3', 'GS', NULL, '2023-03-09 09:57:41', '2023-03-09 09:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `waiver_form_uploads`
--

CREATE TABLE `waiver_form_uploads` (
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waiver_form_uploads`
--

INSERT INTO `waiver_form_uploads` (`upload_id`, `student_id`, `filename`, `filepath`, `created_at`, `updated_at`) VALUES
(125, NULL, 'Waiver - Copy - Copy.pdf', 'public/files/NNYTXXbnhwWo2wTOBJ8wBRNNaN1Ut94iFkPeuFi2.pdf', '2023-03-27 19:50:28', '2023-03-27 19:50:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth_certificate_uploads`
--
ALTER TABLE `birth_certificate_uploads`
  ADD UNIQUE KEY `birth_certificate_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `birth_certificate_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `birth_certificate_uploads_filename_unique` (`filename`);

--
-- Indexes for table `consent_form_uploads`
--
ALTER TABLE `consent_form_uploads`
  ADD UNIQUE KEY `consent_form_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `consent_form_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `consent_form_uploads_filename_unique` (`filename`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `courses_courseid_unique` (`courseID`),
  ADD UNIQUE KEY `courses_course_acronym_unique` (`course_acronym`),
  ADD KEY `courses_departmentid_foreign` (`departmentID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`),
  ADD UNIQUE KEY `departments_departmentid_unique` (`departmentID`),
  ADD UNIQUE KEY `departments_department_acronym_unique` (`department_acronym`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `good_moral_uploads`
--
ALTER TABLE `good_moral_uploads`
  ADD UNIQUE KEY `good_moral_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `good_moral_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `good_moral_uploads_filename_unique` (`filename`);

--
-- Indexes for table `grade_uploads`
--
ALTER TABLE `grade_uploads`
  ADD UNIQUE KEY `grade_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `grade_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `grade_uploads_filename_unique` (`filename`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_uploads`
--
ALTER TABLE `other_uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `other_uploads_filename_unique` (`filename`),
  ADD KEY `other_uploads_upload_id_foreign` (`upload_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reciept_uploads`
--
ALTER TABLE `reciept_uploads`
  ADD UNIQUE KEY `reciept_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `reciept_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `reciept_uploads_filename_unique` (`filename`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`),
  ADD UNIQUE KEY `records_record_id_unique` (`record_id`),
  ADD UNIQUE KEY `records_id_number_unique` (`id_number`);

--
-- Indexes for table `registration_uploads`
--
ALTER TABLE `registration_uploads`
  ADD UNIQUE KEY `registration_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `registration_uploads_filename_unique` (`filename`),
  ADD KEY `registration_uploads_upload_id_foreign` (`upload_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `students_registration_id_unique` (`registration_id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `student_passports`
--
ALTER TABLE `student_passports`
  ADD UNIQUE KEY `student_passports_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `student_passports_passport_num_unique` (`passport_num`),
  ADD KEY `student_passports_id_foreign` (`registration_id`);

--
-- Indexes for table `student_previous_schools`
--
ALTER TABLE `student_previous_schools`
  ADD KEY `student_previous_schools_id_foreign` (`registration_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD UNIQUE KEY `uploads_filename_unique` (`filename`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_idnumber_unique` (`idNumber`);

--
-- Indexes for table `waiver_form_uploads`
--
ALTER TABLE `waiver_form_uploads`
  ADD UNIQUE KEY `waiver_form_uploads_upload_id_unique` (`upload_id`),
  ADD UNIQUE KEY `waiver_form_uploads_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `waiver_form_uploads_filename_unique` (`filename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `other_uploads`
--
ALTER TABLE `other_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `registration_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `birth_certificate_uploads`
--
ALTER TABLE `birth_certificate_uploads`
  ADD CONSTRAINT `birth_certificate_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consent_form_uploads`
--
ALTER TABLE `consent_form_uploads`
  ADD CONSTRAINT `consent_form_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_departmentid_foreign` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `good_moral_uploads`
--
ALTER TABLE `good_moral_uploads`
  ADD CONSTRAINT `good_moral_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_uploads`
--
ALTER TABLE `grade_uploads`
  ADD CONSTRAINT `grade_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_uploads`
--
ALTER TABLE `other_uploads`
  ADD CONSTRAINT `other_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reciept_uploads`
--
ALTER TABLE `reciept_uploads`
  ADD CONSTRAINT `reciept_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registration_uploads`
--
ALTER TABLE `registration_uploads`
  ADD CONSTRAINT `registration_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_passports`
--
ALTER TABLE `student_passports`
  ADD CONSTRAINT `student_passports_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_previous_schools`
--
ALTER TABLE `student_previous_schools`
  ADD CONSTRAINT `student_previous_schools_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waiver_form_uploads`
--
ALTER TABLE `waiver_form_uploads`
  ADD CONSTRAINT `waiver_form_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `students` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
