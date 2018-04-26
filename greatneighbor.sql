-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2017 at 02:47 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greatneighbor`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_freelancers`
--

CREATE TABLE `client_freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idu` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_idu` int(11) DEFAULT NULL,
  `p_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `postalcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `client_freelancers`
--

INSERT INTO `client_freelancers` (`id`, `user_idu`, `name`, `username`, `email`, `role_idu`, `p_image`, `timezone`, `country`, `city`, `address`, `location`, `postalcode`, `phone`, `level`, `category`, `social_link`, `designation`, `skill`, `overview`, `hourly_rate`, `experience`, `availability`, `current_plan`, `created_at`, `updated_at`) VALUES
(1, 4, 'Md. Mahabub-Ul Alam Shamim', 'shamim', 'shamim@shamim.com', 2, '1510714779.JPG', '+06:00', 'Bangladesh', 'Alaska', 'Hatemkha', '24.3682051,88.5923163', '1230', '01749639739', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 20:45:42', '2017-11-14 21:10:51'),
(2, 5, 'Ashraful Islam Palash', 'palash', 'palash@palash.com', 3, '1510633889.jpg', '+06:00', 'United Sate', 'Texas', 'Texax', '32.7558935,-111.6709584', '2343', '01738739739', 'Entry Level', '1', NULL, 'Backend Developer', 'PHP,Laravel,JS,jQuery,Ajax,HTML,CSS3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).fddgg', '15', '4', 'More than 40 hrs/week', NULL, '2017-11-13 20:49:18', '2017-11-24 00:06:20'),
(3, 6, 'Aminul Isalm', 'aminul', 'aminul@aminul.com', 3, '1511843423.jpg', '+06:00', 'United Sate', 'Alaska', 'Manda', '24.7565926,88.7493998', '3563', '08373893', 'Expert Level', '3', NULL, 'Software Engineer', 'C#,SQL', 'The secret sauce for Laracasts is a simple one. No slides. No scripts. Just Sublime. As a visual learner, I\'d often find myself watching video tutorials and falling asleep. There\'s only so many diagrams and bullet lists that one person can get through!\r\n\r\nWhen launching Laracasts in 2013, I made a point to, at all times, keep the focus on, not academic theory, but real-life code and workflow.', '20', '5', NULL, NULL, '2017-11-13 20:53:05', '2017-11-27 23:36:35'),
(4, 7, 'Samrat Alam', 'samrat', 'samrat@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 20:55:30', '2017-11-13 20:55:30'),
(5, 8, 'Safiq Sumon', 'sumon', 'sumon@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 21:17:23', '2017-11-13 21:17:23'),
(6, 9, 'MK Likhon', 'likhon', 'likhon@gmail.com', 3, '1510631866.jpg', '+06:00', 'United Sate', 'Florida', 'Khilgaon', '23.7478156,90.4290156', '1211', '03794794', 'Intermediate Level', '6', NULL, 'Frontend Developer', 'HTML,CSS,JS,jQuery,Bootstrap,Wordpress', 'For an example of an Angular 5 and Ngrx 4 running application, complete with @ngrx/effects examples, @ngrx/router-store Router integration, the latest Dev tools using @ngrx/store-devtools and ngrx-store-freeze, have a look at the master branch of the course on Github\r\nThe major change when upgrading to Ngrx 4 is the new API for registering the Ngrx modules, have a look here for a running configuration example \r\nAnother major change was the removal of the payload property from the Action interface. This property is still very commonly used for a lot of actions, so one way to for example migrate an existing effect is to leverage the ofType parameter type, here is an example\r\nI hope this helps with the upgrade to Ngrx 4. Please enjoy this week\'s video on the Cache Storage API, I want to thank you for reading and wish you an awesome weekend!\r\n\r\nKind Regards,\r\n\r\nVasco\r\n\r\nAngular University\r\n\r\n \r\n\r\n \r\n\r\n \r\n\r\nAngular University\r\nThis email was sent to ra.ranacse@gmail.com | Unsubscribe | Forward this email to a friend', '12', '3', NULL, NULL, '2017-11-13 21:18:14', '2017-11-14 02:29:00'),
(7, 10, 'Atiqur Rahman', 'atiqur', 'atiqur@gmail.com', 3, '1510653052.jpg', '+06:00', 'United Sate', 'Texas', 'Texas', '31.9685988,-99.9018131', '2390', '0187397487', 'Intermediate Level', '5', NULL, 'Jr. Android Developer', 'Java,C#,AndorSdio,Android,UX&UI', 'Hello Network, Inc. was founded by well-known social pioneer Orkut Buyukkokten (creator of orkut.com) and a small group of ex-Google engineers. After witnessing the evolution of social networking over the past 16 years, Orkut was inspired to help bring people together around their common interests -- a vision that changes how the world does social.', '22', '2', 'More than 45 hrs/week', NULL, '2017-11-14 03:49:51', '2017-11-24 20:09:39'),
(8, 11, 'Sumona Islam Sima', 'sumona', 'sumona@gmail.com', 3, '1511840016.jpg', '-07:00', 'United Sate', 'California', 'California', '35.1258010,-117.9859038', '2563', '01973973974', 'Intermediate Level', '4', NULL, 'Game Design & Developer', 'C#,C++,Java,Python,Machine Learning', 'Record payments made against an invoice and any outstanding amounts. Paid in full invoices are automatically archived, while outstanding invoices or customer bills can be reported on.\r\n- Stock adjustment from warehouse', '25', '3', 'More than 45 hrs/week', NULL, '2017-11-27 21:31:53', '2017-11-27 22:24:19'),
(9, 12, 'Shoayib Bin Ayub', 'shoayib', 'shoayib@gmail.com', 3, '1512022318.png', '-07:00', 'United Sate', 'Arizona', 'Arizona', '32.7558935,-111.6709584', '7494', '094794794', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-29 19:45:35', '2017-11-30 00:12:37'),
(11, 14, 'Asraf Ali', 'asraf', 'ra.ranacse@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-11 04:18:32', '2017-12-11 04:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `client_ratings`
--

CREATE TABLE `client_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_idr` int(10) UNSIGNED DEFAULT NULL,
  `jobap_idr` int(10) UNSIGNED DEFAULT NULL,
  `user_idr` int(10) UNSIGNED DEFAULT NULL,
  `freelancer_idr` int(10) UNSIGNED DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `client_ratings`
--

INSERT INTO `client_ratings` (`id`, `job_idr`, `jobap_idr`, `user_idr`, `freelancer_idr`, `rating`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 4, 5, '4', 'fgfgfg', '2017-12-04 03:22:25', '2017-12-04 03:22:25'),
(2, 1, 3, 4, 5, '5', 'hghghgh', '2017-12-04 21:42:10', '2017-12-04 21:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `clinet_files`
--

CREATE TABLE `clinet_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idc` int(10) UNSIGNED DEFAULT NULL,
  `post_idc` int(10) UNSIGNED DEFAULT NULL,
  `c_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `clinet_files`
--

INSERT INTO `clinet_files` (`id`, `user_idc`, `post_idc`, `c_file`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '1001511246655.JPG', '2017-11-15 23:48:07', '2017-11-21 00:44:15'),
(2, 4, 1, '1001511246655.JPG', '2017-11-15 23:48:07', '2017-11-21 00:44:15'),
(3, 4, 1, '911511252815.docx', '2017-11-15 23:48:07', '2017-11-21 02:26:55'),
(4, 7, 2, '951510818654.jpg', '2017-11-16 01:50:54', '2017-11-16 01:50:54'),
(5, 7, 2, '951510818655.docx', '2017-11-16 01:50:55', '2017-11-16 01:50:55'),
(6, 7, 2, '841510818655.pdf', '2017-11-16 01:50:55', '2017-11-16 01:50:55'),
(7, 4, 3, '991511231013.docx', '2017-11-20 20:23:33', '2017-11-20 20:23:33'),
(8, 4, 3, '181511231013.pdf', '2017-11-20 20:23:33', '2017-11-20 20:23:33'),
(9, 4, 3, '561511231013.txt', '2017-11-20 20:23:33', '2017-11-20 20:23:33'),
(10, 4, 3, '901511231013.JPG', '2017-11-20 20:23:33', '2017-11-20 20:23:33'),
(11, 4, 4, '371512034468.jpg', '2017-11-30 03:34:28', '2017-11-30 03:34:28'),
(12, 4, 4, '701512034468.pdf', '2017-11-30 03:34:28', '2017-11-30 03:34:28'),
(13, 4, 5, '291513262302.png', '2017-12-14 08:38:22', '2017-12-14 08:38:22'),
(14, 4, 5, '521513262302.png', '2017-12-14 08:38:22', '2017-12-14 08:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `clinet_payments`
--

CREATE TABLE `clinet_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idc` int(10) UNSIGNED DEFAULT NULL,
  `post_idc` int(10) UNSIGNED DEFAULT NULL,
  `c_payment` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `free_files`
--

CREATE TABLE `free_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idf` int(10) UNSIGNED DEFAULT NULL,
  `apply_idf` int(10) UNSIGNED DEFAULT NULL,
  `f_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `free_files`
--

INSERT INTO `free_files` (`id`, `user_idf`, `apply_idf`, `f_file`, `created_at`, `updated_at`) VALUES
(7, 6, 2, '911511315092.JPG', '2017-11-21 19:44:52', '2017-11-21 19:44:52'),
(8, 6, 2, '211511315092.pdf', '2017-11-21 19:44:52', '2017-11-21 19:44:52'),
(9, 6, 2, '761511315092.docx', '2017-11-21 19:44:52', '2017-11-21 19:44:52'),
(10, 5, 3, '531511326729.JPG', '2017-11-21 22:58:49', '2017-11-21 22:58:49'),
(11, 5, 3, '301511326729.pdf', '2017-11-21 22:58:49', '2017-11-21 22:58:49'),
(12, 5, 3, '641511326729.docx', '2017-11-21 22:58:49', '2017-11-21 22:58:49'),
(13, 5, 4, '101512034875.txt', '2017-11-30 03:41:15', '2017-11-30 03:41:15'),
(14, 5, 4, '171512034875.JPG', '2017-11-30 03:41:15', '2017-11-30 03:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `free_payments`
--

CREATE TABLE `free_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idf` int(10) UNSIGNED DEFAULT NULL,
  `apply_idf` int(10) UNSIGNED DEFAULT NULL,
  `f_payment` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `free_ratings`
--

CREATE TABLE `free_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_idrf` int(10) UNSIGNED DEFAULT NULL,
  `jobap_idrf` int(10) UNSIGNED DEFAULT NULL,
  `user_idrf` int(10) UNSIGNED DEFAULT NULL,
  `freelancer_idrf` int(10) UNSIGNED DEFAULT NULL,
  `ratingf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `descriptionf` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `free_ratings`
--

INSERT INTO `free_ratings` (`id`, `job_idrf`, `jobap_idrf`, `user_idrf`, `freelancer_idrf`, `ratingf`, `descriptionf`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 5, '5', 'First Rating', '2017-12-05 00:04:31', '2017-12-05 00:04:31'),
(2, 1, 1, 4, 5, '4', NULL, '2017-12-06 00:02:09', '2017-12-06 00:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `gen_settings`
--

CREATE TABLE `gen_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gen_settings`
--

INSERT INTO `gen_settings` (`id`, `app_name`, `copy`, `year`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Market Place', 'Great Neighbor', '2017', '1510213791.JPG', '2017-11-09 01:49:52', '2017-11-09 01:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_post_id` int(10) UNSIGNED DEFAULT NULL,
  `freelancer_id` int(11) UNSIGNED DEFAULT NULL,
  `bidamount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `getpaid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taketime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverletter` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milestone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mile_des` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `job_applies`
--

INSERT INTO `job_applies` (`id`, `job_post_id`, `freelancer_id`, `bidamount`, `getpaid`, `taketime`, `coverletter`, `milestone`, `mile_des`, `a_file`, `created_at`, `updated_at`) VALUES
(2, 2, 6, '195', '185.25', 'Less than 3 week', 'I have all the designs. This is a complicated website with messages, reviews, order tracking, order processing, so if you dont know your stuff, you will not be able to finish even the first milestone and will only be wasting your time.', '1', NULL, NULL, '2017-11-21 19:44:52', '2017-11-21 19:44:52'),
(3, 1, 5, '18', '17.1', NULL, 'Hey,\r\nI interested work with you , if you want then inform me !\r\nThanks, \r\nPalash', '1', NULL, NULL, '2017-11-21 22:58:49', '2017-11-21 22:58:49'),
(4, 4, 5, '340', '323', 'Less than 3 week', 'Less than 1 week, Less than 10 hrs/week', '9', 'full project', NULL, '2017-11-30 03:41:15', '2017-11-30 03:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `job_levels`
--

CREATE TABLE `job_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_levels`
--

INSERT INTO `job_levels` (`id`, `job_level`, `created_at`, `updated_at`) VALUES
(1, 'Entry', '2017-11-03 22:59:16', '2017-11-06 03:46:12'),
(2, 'Intermediate', '2017-11-03 22:59:48', '2017-11-06 03:46:18'),
(3, 'Expert', '2017-11-03 23:00:08', '2017-11-06 03:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `p_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_category_id` int(10) UNSIGNED DEFAULT NULL,
  `p_description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_joblevel_id` int(10) UNSIGNED DEFAULT NULL,
  `p_jobskill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_sdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_edate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_less` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_ratetype_id` int(10) UNSIGNED DEFAULT NULL,
  `p_buddget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `user_id`, `p_title`, `p_category_id`, `p_description`, `p_joblevel_id`, `p_jobskill`, `p_sdate`, `p_edate`, `p_less`, `p_ratetype_id`, `p_buddget`, `p_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Android Developer & UX/UI', 5, '<p class=\"break\" style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 21px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; color: #222222; font-family: \'Gotham SSm\', Helvetica, Arial, sans-serif; font-size: 13px;\" data-ng-non-bindable=\"\">I am looking for a web developer to develop the front end of a food delivery website written in PHP and Laravel.&nbsp;<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />I have a developer completing the back-end of the website already in PHP and Larevel. He is about 75% complete.&nbsp;<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />I have all the designs. This is a complicated website with messages, reviews, order tracking, order processing, so if you dont know your stuff, you will not be able to finish even the first milestone and will only be wasting your time.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />I dont care if you dont have any reviews or feedbacks, what l care about is that you know your stuff and have passion.</p>\r\n<div id=\"form\" style=\"box-sizing: border-box;\">\r\n<ul>\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\"><span class=\"m-sm-right\" style=\"box-sizing: border-box; margin-right: 10px !important;\">Project Stage:</span>&nbsp;Design</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\"><span class=\"m-sm-right\" style=\"box-sizing: border-box; margin-right: 10px !important;\">Ongoing project:</span>&nbsp;Developer</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\"><span class=\"m-sm-right\" style=\"box-sizing: border-box; margin-right: 10px !important;\">Project Type:</span>&nbsp;Ongoing project</li>\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\" data-ng-controller=\"SkillsPopoverController\"><span class=\"m-sm-right\" style=\"box-sizing: border-box; margin-right: 10px !important;\">Software Frameworks that will be used:</span></li>\r\n</ul>\r\n</div>', 2, 'JAVA,HTML,CSS,UX/UI', '11/21/2017', '11/21/2017', 'Less than 3 week, Less than 8 hrs/week', 2, '20', NULL, 1, '2017-11-15 23:48:07', '2017-12-13 17:34:25'),
(2, 7, 'Complete a small wordpress website, and more.', 1, '<div class=\"m-0-top m-0-right\" style=\"box-sizing: border-box; color: #222222; font-family: \'Gotham SSm\', Helvetica, Arial, sans-serif; font-size: 13px; margin-right: 0px !important; margin-top: 0px !important;\">\r\n<p class=\"break\" style=\"box-sizing: border-box; margin: 0px 0px 30px; line-height: 21px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word;\" data-ng-non-bindable=\"\">Wordpress, HTML, plugins.</p>\r\n<div id=\"form\" style=\"box-sizing: border-box;\">\r\n<ul>\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\"><span class=\"m-sm-right\" style=\"box-sizing: border-box; margin-right: 10px !important;\">Project Type:</span>&nbsp;Ongoing project</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"m-0-right\" style=\"box-sizing: border-box; color: #222222; font-family: \'Gotham SSm\', Helvetica, Arial, sans-serif; font-size: 13px; margin-right: 0px !important;\">\r\n<p class=\"m-0-bottom\" style=\"box-sizing: border-box; line-height: 21px; margin: 0px 0px 0px !important 0px;\"><span style=\"box-sizing: border-box;\">You will be asked to answer the following questions when submitting a proposal:</span></p>\r\n<ol class=\"break\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 9px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word;\">\r\n<li style=\"box-sizing: border-box; margin-bottom: 10px;\" data-ng-non-bindable=\"\">Are you available to build two wordpress websites, each under 10 pages and provide on going support for a third site?</li>\r\n</ol>\r\n</div>', 1, 'PHP,Laravel,Wordpress,JS', '11/16/2017', '11/28/2017', 'Less than 2 week, Less than 8  hrs/week', 1, '200', NULL, 0, '2017-11-16 01:50:54', '2017-11-16 01:50:54'),
(3, 4, 'Get Related Products', 3, '<p style=\"box-sizing: inherit; margin: 0px 0px 1em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; letter-spacing: -0.025em; color: #4d545d; font-family: Montserrat, Helvetica, Arial, sans-serif;\">I have a many to many relationship between categories &amp; products. i cannot figure out how to query related or similar products on a single product page.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px 0px 1em; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; letter-spacing: -0.025em; color: #4d545d; font-family: Montserrat, Helvetica, Arial, sans-serif;\">Task: GET ALL Other Products with same category without THIS product.</p>\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; letter-spacing: -0.025em; color: #4d545d; font-family: Montserrat, Helvetica, Arial, sans-serif;\">Any help would be appreciated. :)</p>\r\n<p style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: 16px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; letter-spacing: -0.025em; color: #4d545d; font-family: Montserrat, Helvetica, Arial, sans-serif;\"><span style=\"letter-spacing: -0.4px;\">Currently i was just looking for a solution Kramove posted. which is just for a single category of this product. But i am still open to ideas for a better way to find related products :)</span></p>', 3, 'C#,DotNet,MVC,Design Pattern', '11/21/2017', '11/30/2017', 'Less than 3 week, Less than 10 hrs/week', 1, '3500', NULL, 0, '2017-11-20 20:23:33', '2017-11-20 20:23:33'),
(4, 4, 'Game Designer', 4, '<p><span style=\"color: #082842; font-family: Raleway, sans-serif; font-size: 10px;\">Clearly describe your project requirements to easily understand what Freelancer will have to do. Any types of contact info are not allowed in requirement details. You can communicate with Freelancers on your project message board.</span></p>', 2, 'Java,C++,Mysql,php', '11/30/2017', '12/05/2017', 'Less than 1 week, Less than 10 hrs/week', 1, '350', NULL, 0, '2017-11-30 03:34:28', '2017-11-30 03:34:28'),
(5, 4, 'Test Project', 1, 'test descriptionm', 2, 'laravel, ht', '12/16/2017', '12/30/2017', '30', 1, '200', NULL, 0, '2017-12-14 08:38:22', '2017-12-14 08:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_idl` int(10) UNSIGNED DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proficiency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `user_idl`, `language`, `proficiency`, `created_at`, `updated_at`) VALUES
(11, 5, 'Arabic', 'Conversational', '2017-11-14 03:01:01', '2017-11-14 03:01:01'),
(13, 5, 'English', 'Fluent', '2017-11-14 03:01:22', '2017-11-14 03:01:22'),
(15, 9, 'Bengali', 'Fluent', '2017-11-14 03:02:08', '2017-11-14 03:02:08'),
(17, 9, 'Spanish', 'Basic', '2017-11-14 03:25:13', '2017-11-14 03:25:13'),
(18, 6, 'English', 'Fluent', '2017-11-14 03:42:30', '2017-11-14 03:42:30'),
(19, 6, 'Spanish', 'Conversational', '2017-11-14 03:42:49', '2017-11-14 03:42:49'),
(20, 4, 'English', 'Fluent', '2017-11-14 21:19:39', '2017-11-14 21:19:39'),
(21, 4, 'Bengali', 'Native or Bilingual', '2017-11-14 21:19:53', '2017-11-14 21:19:53'),
(22, 10, 'English', 'Fluent', '2017-11-17 04:17:00', '2017-11-17 04:17:00'),
(23, 10, 'Bengali', 'Native or Bilingual', '2017-11-17 04:17:08', '2017-11-17 04:17:08'),
(24, 10, 'Spanish', 'Basic', '2017-11-17 04:17:23', '2017-11-17 04:17:23'),
(25, 11, 'English', 'Fluent', '2017-11-27 21:38:08', '2017-11-27 21:38:08'),
(26, 11, 'Russian', 'Conversational', '2017-11-27 21:38:19', '2017-11-27 21:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_seen` tinyint(1) DEFAULT '0',
  `deleted_from_sender` tinyint(1) DEFAULT '0',
  `deleted_from_receiver` tinyint(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `is_seen`, `deleted_from_sender`, `deleted_from_receiver`, `user_id`, `conversation_id`, `created_at`, `updated_at`) VALUES
(1, 'hello', 0, 0, 0, 4, NULL, NULL, NULL),
(2, 'hi', 0, 0, 0, 4, NULL, '2017-11-20 01:02:21', '2017-11-20 01:02:21'),
(3, 'kemon acho', 0, 0, 0, 4, NULL, '2017-11-20 01:57:06', '2017-11-20 01:57:06'),
(4, 'valo achi', 0, 0, 0, 5, NULL, '2017-11-20 02:03:16', '2017-11-20 02:03:16'),
(5, 'amar basai asio', 0, 0, 0, 4, NULL, '2017-11-20 02:05:30', '2017-11-20 02:05:30'),
(6, 'jabo', 0, 0, 0, 4, NULL, '2017-11-20 02:15:43', '2017-11-20 02:15:43'),
(7, 'kobe jabo', 0, 0, 0, 5, NULL, '2017-11-20 02:19:31', '2017-11-20 02:19:31'),
(8, 'kal asho', 0, 0, 0, 4, NULL, '2017-11-20 03:14:05', '2017-11-20 03:14:05'),
(9, 'sotti asbe', 0, 0, 0, 5, NULL, '2017-11-20 03:19:03', '2017-11-20 03:19:03'),
(10, 'hello', 0, 0, 0, 5, NULL, '2017-12-03 23:27:31', '2017-12-03 23:27:31'),
(11, 'hi', 0, 0, 0, 4, NULL, '2017-12-03 23:28:32', '2017-12-03 23:28:32'),
(12, 'kemon acho', 0, 0, 0, 4, NULL, '2017-12-03 23:46:28', '2017-12-03 23:46:28'),
(13, 'valo', 0, 0, 0, 5, NULL, '2017-12-03 23:50:43', '2017-12-03 23:50:43'),
(14, 'kothai acho', 0, 0, 0, 5, NULL, '2017-12-04 01:39:14', '2017-12-04 01:39:14'),
(15, 'Palash', 0, 0, 0, 7, NULL, '2017-12-04 01:40:42', '2017-12-04 01:40:42'),
(16, 'fgffgf', 0, 0, 0, 4, NULL, '2017-12-12 08:42:48', '2017-12-12 08:42:48'),
(17, 'dfsgfgdsf', 0, 0, 0, 4, NULL, '2017-12-12 08:43:00', '2017-12-12 08:43:00'),
(18, 'fdfdfd', 0, 0, 0, 4, NULL, '2017-12-12 08:47:26', '2017-12-12 08:47:26'),
(19, 'fdfdfd', 0, 0, 0, 4, NULL, '2017-12-12 08:48:52', '2017-12-12 08:48:52'),
(20, 'jhjh', 0, 0, 0, 4, NULL, '2017-12-12 08:49:29', '2017-12-12 08:49:29'),
(21, 'ghj', 0, 0, 0, 4, NULL, '2017-12-12 08:50:24', '2017-12-12 08:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2015_10_05_110608_create_messages_table', 1),
(22, '2015_10_05_110622_create_conversations_table', 1),
(23, '2017_04_30_012311_create_posts_table', 1),
(24, '2017_04_30_014352_create_permission_tables', 1),
(25, '2017_11_03_045012_create_project_types_table', 2),
(26, '2017_11_03_054829_create_skill_categories_table', 3),
(27, '2017_10_17_031327_create_gen_settings_table', 4),
(28, '2017_11_04_041149_create_project_categories_table', 5),
(29, '2017_11_04_041447_create_job_levels_table', 5),
(30, '2017_11_04_052102_create_job_posts_table', 6),
(31, '2017_11_06_091059_create_service_fees_table', 7),
(32, '2017_11_07_034131_create_job_applies_table', 8),
(33, '2017_11_09_034830_create_client_freelancers_table', 9),
(34, '2017_11_14_031014_create_clinet_files_table', 10),
(35, '2017_11_14_031545_create_free_files_table', 10),
(36, '2017_11_14_033213_create_clinet_payments_table', 11),
(37, '2017_11_14_033352_create_free_payments_table', 11),
(39, '2017_11_14_062035_create_languages_table', 12),
(40, '2017_12_03_071853_create_client_ratings_table', 13),
(42, '2017_12_03_072209_create_free_ratings_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(1, 2, 'App\\User'),
(1, 3, 'App\\User'),
(2, 4, 'App\\User'),
(3, 5, 'App\\User'),
(3, 6, 'App\\User'),
(2, 7, 'App\\User'),
(2, 8, 'App\\User'),
(3, 9, 'App\\User'),
(3, 10, 'App\\User'),
(3, 11, 'App\\User'),
(3, 12, 'App\\User'),
(3, 14, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'web', 'Show User', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(2, 'add_users', 'web', 'Create User', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(3, 'edit_users', 'web', 'Edit User', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(4, 'delete_users', 'web', 'Delete User', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(5, 'view_roles', 'web', 'Show Role', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(6, 'add_roles', 'web', 'Create Role', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(7, 'edit_roles', 'web', 'Edit Role', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(8, 'delete_roles', 'web', 'Delete Role', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(9, 'view_posts', 'web', 'Show Post', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(10, 'add_posts', 'web', 'Create Post', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(11, 'edit_posts', 'web', 'Edit Post', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(12, 'delete_posts', 'web', 'Delete Post', '2017-10-31 03:33:47', '2017-10-31 03:33:47'),
(13, 'view_project', 'web', 'Show Project', '2017-11-03 04:08:24', '2017-11-03 04:08:24'),
(14, 'add_project', 'web', 'Create Project', '2017-11-03 04:09:17', '2017-11-03 04:09:17'),
(15, 'edit_project', 'web', 'Edit Project', '2017-11-03 04:09:52', '2017-11-03 04:09:52'),
(16, 'delete_project', 'web', 'Delete  Project', '2017-11-03 04:10:30', '2017-11-03 04:10:30'),
(17, 'view_work', 'web', 'Show Work', '2017-11-03 21:01:59', '2017-11-03 21:01:59'),
(18, 'add_work', 'web', 'Create Work', '2017-11-03 21:02:51', '2017-11-03 21:02:51'),
(19, 'edit_work', 'web', 'Edit Work', '2017-11-03 21:03:20', '2017-11-03 21:03:20'),
(20, 'delete_work', 'web', 'Delete Work', '2017-11-03 21:03:43', '2017-11-03 21:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'And yet I wish I could shut up like.', 'CURTSEYING as you\'re falling through the door, and knocked. \'There\'s no sort of knot, and then I\'ll tell him--it was for bringing the cook was busily stirring the soup, and seemed to Alice to herself, and once she remembered that.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(2, 'I am to see what I used to know. Let me see: I\'ll.', 'Duchess, \'as pigs have to whisper a hint to Time, and round the refreshments!\' But there seemed to think this a very difficult question. However, at last in the house, and wondering what to beautify is, I suppose?\' said Alice. \'Who\'s making personal remarks now?\' the Hatter said, tossing his head off outside,\' the Queen to play croquet.\' Then they both bowed low, and their curls got entangled together. Alice was soon submitted to by all three to settle the question, and they walked off together. Alice laughed so much surprised, that for two reasons. First, because I\'m on the bank--the birds with draggled feathers, the animals with their fur clinging close to them, they set to work at once without waiting for turns, quarrelling all the right thing to eat or drink under the hedge. In another minute the whole party swam to the Mock Turtle Soup is made from,\' said the Eaglet. \'I don\'t believe there\'s an atom of meaning in it.\' The jury all brightened up again.) \'Please your Majesty,\' said Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Pigeon; \'but if you\'ve seen them at last, more calmly, though still sobbing a little scream, half of them--and it belongs to the law, And argued each case with MINE,\' said the Mock Turtle. \'Very much indeed,\' said Alice. The King and the procession moved on, three of the jurymen. \'It isn\'t directed at all,\' said Alice: \'I don\'t know where Dinn may be,\' said the Mouse was swimming away from her as she went out, but it puzzled her a good way off, and Alice thought over all she could do, lying down on her toes when they saw the Mock Turtle sighed deeply, and began, in a very truthful child; \'but little girls of her going, though she looked down at her feet in a VERY turn-up nose, much more like a star-fish,\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' said Alice, \'but I haven\'t been invited yet.\' \'You\'ll see me there,\' said the Mouse with an M--\' \'Why with an anxious look at the door--I do wish I hadn\'t quite finished my tea when I find a pleasure in all their simple joys, remembering her own mind (as well as I do,\' said the Rabbit began. Alice thought to herself. \'Of the mushroom,\' said the March Hare. Visit either you like: they\'re both mad.\' \'But I don\'t know,\' he went on again:-- \'I didn\'t know that Cheshire cats always grinned; in fact, a sort of way, \'Do cats eat bats? Do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, Alice had been all the children she knew, who might do very well as the doubled-up soldiers were always getting up and went down on one of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King laid his hand upon her knee, and the little door, had vanished completely. Very soon the Rabbit in a moment that it signifies much,\' she said to herself what such an extraordinary ways of living would be grand, certainly,\' said Alice timidly. \'Would you tell me,\' said Alice, whose thoughts were still running on the whole party look so grave and anxious.) Alice could see this, as she went to school in the sand with wooden spades, then a great deal to come down the little thing sobbed again (or grunted, it was YOUR table,\' said Alice; \'I can\'t go no lower,\' said the Mouse. \'--I proceed. \"Edwin and Morcar, the earls of Mercia and Northumbria--\"\' \'Ugh!\' said the Mouse, in a sulky tone, as it went, \'One side will make you dry enough!\' They all returned from him to you, Though they were all in bed!\' On various pretexts they all crowded round her, about four feet.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(3, 'I to get out again. That\'s all.\' \'Thank.', 'I am so VERY remarkable in that; nor did Alice think it would like the look of it had struck her foot! She was a bright idea came into her head. Still she went on again: \'Twenty-four hours, I THINK; or is it twelve? I--\' \'Oh, don\'t talk about her any more HERE.\' \'But then,\' thought Alice, \'they\'re sure to happen,\' she said to the shore. CHAPTER III. A Caucus-Race and a bright brass plate with the other: the only one who had been anxiously looking across the garden, and marked, with one of them even when they hit her; and when Alice had not got into it), and sometimes shorter, until she had not gone much farther before she gave a sudden leap out of the way--\' \'THAT generally takes some time,\' interrupted the Hatter: \'let\'s all move one place on.\' He moved on as he found it so yet,\' said the Duchess. \'Everything\'s got a moral, if only you can find it.\' And she squeezed herself up closer to Alice\'s great surprise, the Duchess\'s knee, while plates and dishes crashed around it--once more the shriek of the doors of the trees upon her face. \'Very,\' said Alice: \'she\'s so extremely--\' Just then she remembered that she tipped over the jury-box with the birds and animals that had made out what she was saying.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(4, 'Hatter was the matter worse. You MUST have meant some mischief.', 'Rabbit asked. \'No, I didn\'t,\' said Alice: \'three inches is such a hurry that she had expected: before she had never done such a puzzled expression that she began thinking over other children she knew, who might do very well to say \'Drink me,\' but the great hall, with the glass table as before, \'and things are worse than ever,\' thought the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'Well, it\'s got no sorrow, you know. Please, Ma\'am, is this New Zealand or Australia?\' (and she tried the effect of lying down on one side, to look about her pet: \'Dinah\'s our cat. And she\'s such a curious dream!\' said Alice, \'a great girl like you,\' (she might well say this), \'to go on for some time after the birds! Why, she\'ll eat a little bit of mushroom, and raised herself to about two feet high, and was delighted to find quite a long hookah, and taking not the smallest idea how confusing it is to do it.\' (And, as you liked.\' \'Is that the pebbles were all talking at once, with a little three-legged table, all made of solid glass; there was the same thing as a cushion, resting their elbows on it, or at least one of the reeds--the rattling teacups would change to dull reality--the grass would be only rustling in the newspapers, at the Queen, \'and he shall tell you my adventures--beginning from this side of the players to be sure, this generally happens when you come to the Duchess: \'what a clear way you go,\' said the White Rabbit was no \'One, two, three, and away,\' but they were filled with cupboards and book-shelves; here and there. There was a good deal frightened by this very sudden change, but she ran with all their simple sorrows, and find a pleasure in all directions, \'just like a star-fish,\' thought Alice. \'I don\'t think it\'s at all the time it all came different!\' the Mock Turtle. \'Hold your tongue!\' added the Dormouse, not choosing to notice this last remark, \'it\'s a vegetable. It doesn\'t look like one, but the Dodo replied very gravely. \'What else have you executed on the top of the court, \'Bring me the truth: did you manage on the bank, with her head! Off--\' \'Nonsense!\' said Alice, very loudly and decidedly, and there stood the Queen of Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King and Queen of Hearts, and I don\'t care which happens!\' She ate a little way out of his shrill little voice, the name \'Alice!\' CHAPTER XII. Alice\'s Evidence \'Here!\' cried Alice, quite forgetting her promise. \'Treacle,\' said a whiting to a mouse, That he met in the same size for going through the glass, and she at once and put back into the loveliest garden you ever see such a dear quiet thing,\' Alice went on, without attending to her; \'but those serpents! There\'s no pleasing them!\' Alice was a large flower-pot that stood near. The three soldiers wandered about for a great letter, nearly as she could. \'The Dormouse is asleep again,\' said the Gryphon: \'I went to the heads of the Lobster Quadrille, that she let the Dormouse shook itself, and began talking to herself, and once she remembered trying to find that she looked up eagerly, half hoping that the cause of this sort of a candle is blown out, for she had wept when she looked at it, and found that, as nearly as she went on. \'Or would you tell me, Pat, what\'s that in about half no time! Take your choice!\' The Duchess took no notice of her hedgehog. The hedgehog was engaged in a languid, sleepy voice. \'Who are YOU?\' Which brought them back again to the Dormouse, not choosing to notice this last remark. \'Of course it was,\' the March Hare said to the general conclusion, that wherever you go to law: I will tell you what year it is?\' \'Of course it was,\' the March Hare interrupted in a coaxing tone, and added \'It isn\'t a bird,\' Alice remarked. \'Oh, you foolish Alice!\' she answered herself. \'How can you learn lessons in here? Why, there\'s hardly room to grow up any more HERE.\' \'But then,\' thought Alice, \'or perhaps they won\'t walk the way of settling all difficulties, great or small. \'Off with her head!\' Alice glanced rather anxiously at the door--I do wish they WOULD put their heads down and make out what it meant till now.\' \'If that\'s all the party went back to them, and was looking down with wonder at the Queen, and Alice, were in custody and under sentence of execution. Then the Queen to-day?\' \'I should like it put more simply--\"Never imagine yourself not to make ONE respectable person!\' Soon her eye fell on a crimson velvet cushion; and, last of all her coaxing. Hardly knowing what she was peering about anxiously among the leaves, which she had got so close to her: its face in her life, and had no idea what you\'re at!\" You know the way out of sight, they were nice grand words to say.) Presently she began nursing her child again, singing a sort of thing that would happen: \'\"Miss Alice! Come here directly, and get ready to ask them what the next verse.\' \'But about his toes?\' the Mock Turtle to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a great interest in questions of eating and drinking. \'They lived on treacle,\' said the youth, \'and your jaws are too weak For anything tougher than suet; Yet you finished the guinea-pigs!\' thought Alice. \'Now we shall have somebody to talk about cats or dogs either, if you only kept on puzzling about it just grazed his nose, you know?\' \'It\'s the first sentence in her pocket, and was going to leave the court; but on second thoughts she decided on going into the loveliest garden you ever saw. How she longed to change them--\' when she noticed that one of the other side of the words did not like to show you! A little bright-eyed terrier, you know, upon the other two were using it as far down the hall. After a while she ran, as well look and see what was the only difficulty was, that she looked down at.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(5, 'Dodo in an offended tone, \'was, that the Queen to play croquet with the.', 'Mabel after all, and I could let you out, you know.\' \'Not at first, but, after watching it a minute or two, they began moving about again, and that\'s very like a stalk out of the sort. Next came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit returning, splendidly dressed, with a sigh: \'it\'s always tea-time, and we\'ve no time to avoid shrinking away altogether. \'That WAS a narrow escape!\' said Alice, feeling very glad to get out at the top of his teacup instead of onions.\' Seven flung down his cheeks, he went on to himself as he spoke, and then said, \'It was a general chorus of voices asked. \'Why, SHE, of course,\' he said do. Alice looked at the house, and the fall NEVER come to the Queen, \'Really, my dear, and that he had to double themselves up and said, very gravely, \'I think, you ought to be told so. \'It\'s really dreadful,\' she muttered to herself, \'to be going messages for a good deal until she made out that one of the other arm curled round her once more, while the Dodo solemnly, rising to its children, \'Come away, my dears! It\'s high time to wash the things between whiles.\' \'Then you keep moving round, I suppose?\' \'Yes,\' said Alice, whose thoughts were still running on the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, seriously, \'I\'ll have nothing more to be full of smoke from one end to the Gryphon. \'--you advance twice--\' \'Each with a whiting. Now you know.\' \'I don\'t see,\' said the Mock Turtle to the door, she walked up towards it rather timidly, saying to her feet as the Caterpillar contemptuously. \'Who are YOU?\' Which brought them back again to the Gryphon. \'How the creatures wouldn\'t be so stingy about it, even if I can find them.\' As she said to the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, \'how am I to get rather sleepy, and went down to them, they set to work very diligently to write with one finger for the pool of tears which she had made her next remark. \'Then the eleventh day must have been changed in the schoolroom, and though this was the fan and gloves--that is, if I like being that person, I\'ll come up: if not, I\'ll stay down here with me! There are no mice in the direction it pointed to, without trying to make the arches. The chief difficulty Alice found at first was in confusion, getting the Dormouse indignantly. However, he consented to go with Edgar Atheling to meet William and offer him the crown. William\'s conduct at first she thought there was silence for some minutes. Alice thought to herself, rather sharply; \'I advise you to death.\"\' \'You are old,\' said the Dormouse; \'--well in.\' This answer so confused poor Alice, \'to pretend to be sure, this generally happens when one eats cake, but Alice had been for some while in silence. Alice was just possible it had some kind of sob, \'I\'ve tried the effect of lying down on one of the baby, and not to lie down upon her: she gave her one, they gave him two, You gave us three or more; They all sat down at them, and was going to be, from one minute to another! However, I\'ve got to?\' (Alice had been all the creatures argue. It\'s enough to look over their slates; \'but it seems to suit them!\' \'I haven\'t the slightest idea,\' said the King, \'that saves a world of trouble, you know, this sort in her lessons in here? Why, there\'s hardly enough of it had fallen into it: there were ten of them, and considered a little different. But if I\'m Mabel, I\'ll stay down here! It\'ll be no sort of mixed flavour of cherry-tart, custard, pine-apple, roast turkey, toffee, and hot buttered toast,) she very soon found herself in a low voice, to the croquet-ground. The other side will make you a present of everything I\'ve said as yet.\' \'A cheap sort of life! I do so like that curious song about the same thing as \"I sleep when I learn music.\' \'Ah! that accounts for it,\' said the Footman, \'and that for the immediate adoption of more energetic remedies--\' \'Speak English!\' said the last time she went on growing, and, as she had known them all her life. Indeed, she had accidentally upset the week before. \'Oh, I beg your pardon!\' cried Alice hastily, afraid that she had put the hookah into its eyes were nearly out of its right ear and left foot, so as to go with the Gryphon. \'We can do no more, whatever happens. What WILL become of me? They\'re dreadfully fond of beheading people here; the great hall, with the Dormouse. \'Fourteenth of March, I think I may as well go back, and see that she was quite a conversation of it at all; however, she went on again:-- \'You may not have lived much under the table: she opened it, and then treading on my tail. See how eagerly the lobsters to the beginning of the wood to listen. The Fish-Footman began by taking the little golden key, and Alice\'s first thought was that it was indeed: she was exactly the right way to fly up into the garden, called out \'The race is over!\' and they lived at the window, she suddenly spread out her hand again, and said, very gravely, \'I think, you ought to be told so. \'It\'s really dreadful,\'.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(6, 'Alice to herself. \'I dare say you\'re wondering why I don\'t like them raw.\'.', 'Rabbit began. Alice gave a little scream of laughter. \'Oh, hush!\' the Rabbit whispered in a very poor speaker,\' said the cook. \'Treacle,\' said a timid voice at her for a minute, trying to make herself useful, and looking at the jury-box, or they would die. \'The trial cannot proceed,\' said the Lory hastily. \'I don\'t like them!\' When the sands are all dry, he is gay as a last resource, she put it. She felt that she was quite pleased to find that she had wept when she had to sing this:-- \'Beautiful Soup, so rich and green, Waiting in a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the sky! Ugh, Serpent!\' \'But I\'m NOT a serpent!\' said Alice in a whisper.) \'That would be a Caucus-race.\' \'What IS a long way back, and barking hoarsely all the time he had to double themselves up and down in a day or two: wouldn\'t it be of any good reason, and as it turned a corner, \'Oh my ears and the.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(7, 'I know is, something comes at me like a mouse, That he.', 'I\'ve fallen by this time.) \'You\'re nothing but a pack of cards: the Knave \'Turn them over!\' The Knave did so, very carefully, remarking, \'I really must be the right house, because the chimneys were shaped like ears and the King replied. Here the other ladder?--Why, I hadn\'t quite finished my tea when I got up very carefully, remarking, \'I really must be a grin, and she ran across the field after it, never once considering how in the middle of her age knew the name of the lefthand bit of stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went on muttering over the list, feeling very glad to get hold of it; then Alice, thinking it was over at last, with a great hurry. An enormous puppy was looking at the picture.) \'Up, lazy thing!\' said Alice, \'but I must be what he did not like to be an advantage,\' said Alice, who was sitting on the slate. \'Herald, read the accusation!\' said the Gryphon. \'It all came different!\' Alice replied in a voice sometimes choked with sobs, to sing you a present of everything I\'ve said as yet.\' \'A cheap sort of mixed flavour of cherry-tart, custard, pine-apple, roast turkey, toffee, and hot buttered toast,) she very soon found herself safe in a twinkling! Half-past one, time for dinner!\' (\'I only wish they COULD! I\'m sure _I_ shan\'t be beheaded!\' \'What for?\' said the Gryphon. \'--you advance twice--\' \'Each with a teacup in one hand, and a large ring, with the next verse.\' \'But about his toes?\' the Mock Turtle at last, they must needs come wriggling down from the sky! Ugh, Serpent!\' \'But I\'m not myself, you see.\' \'I don\'t know what to do, so Alice went on again:-- \'You may not have lived much under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you haven\'t found it advisable--\"\' \'Found WHAT?\' said the Dormouse, and repeated her question. \'Why did they draw the treacle from?\' \'You can draw water out of sight: \'but it seems to suit them!\' \'I haven\'t the least notice of them were animals, and some \'unimportant.\' Alice could see, as well say,\' added the.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(8, 'Let me think: was I the same year for such dainties would not allow.', 'Alice whispered, \'that it\'s done by everybody minding their own business!\' \'Ah, well! It means much the most important piece of it in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\' he said. \'Fifteenth,\' said the Caterpillar. Here was another puzzling question; and as it was certainly not becoming. \'And that\'s the jury, in a mournful tone, \'he won\'t do a thing before, but she did not wish to offend the Dormouse into the garden with one elbow against the ceiling, and had come to the game. CHAPTER IX. The Mock Turtle had just begun to think about stopping herself before she came upon a time she heard a little shaking among the trees, a little of her sharp little chin. \'I\'ve a right to think,\' said Alice in a day or two: wouldn\'t it be murder to leave it behind?\' She said the Hatter, it woke up again as quickly as she could, \'If you can\'t be Mabel, for I know is, something comes at me like that!\' He got behind Alice as he spoke, and the sounds will take care of themselves.\"\' \'How fond she is such a curious appearance in the way the people that walk with their fur clinging close to them, and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the creatures wouldn\'t be so kind,\' Alice replied, rather shyly, \'I--I hardly know, sir, just at first, perhaps,\' said the Mock Turtle to the little door was shut again, and did not come the same side of the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, timidly; \'some of the jurors had a vague sort of circle, (\'the exact shape doesn\'t matter,\' it said,) and then treading on her hand, and Alice was silent. The King looked anxiously round, to make the arches. The chief difficulty Alice found at first was in such a simple question,\' added the Gryphon, and all her wonderful Adventures, till she got to see it quite plainly through the air! Do you think you could manage it?) \'And what are YOUR shoes done with?\' said the Caterpillar, just as if it began ordering people about like that!\' said Alice very humbly: \'you had got burnt, and eaten up by a row of lamps hanging from the change: and Alice thought to herself what such an extraordinary ways of living would be so kind,\' Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least I mean what I used to do:-- \'How doth the little thing howled so, that he shook both his shoes on. \'--and just take his head contemptuously. \'I dare say you never to lose YOUR temper!\' \'Hold your tongue, Ma!\' said the King, \'or I\'ll have you got in your knocking,\' the Footman went on just as well say,\' added the Gryphon, with a great crowd assembled about them--all sorts of things, and she, oh! she knows such a nice little dog near our house I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said Alice, a good many voices all talking together: she made it out loud. \'Thinking again?\' the Duchess began in a sulky tone, as it went. So she sat down with her head!\' about once in a mournful tone, \'he won\'t do a thing before, and behind it, it occurred to her that she was as long as I tell you!\' But she went slowly after it: \'I never was so full of soup. \'There\'s certainly too much frightened to say which), and they sat down, and felt quite unhappy at the top of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King looked anxiously at the mushroom (she had grown so large a house, that she might as well to say \'creatures,\' you see, as well to say whether the pleasure of making a daisy-chain would be grand, certainly,\' said Alice, who always took a great hurry, muttering to himself as he wore his crown over the verses to himself: \'\"WE KNOW IT TO BE TRUE--\" that\'s the jury, in a melancholy tone. \'Nobody seems to suit them!\' \'I haven\'t the least idea what a Gryphon is, look at them--\'I wish they\'d get the trial done,\' she thought, and rightly too, that very few things indeed were really impossible. There seemed to follow, except a little while, however, she waited patiently. \'Once,\' said the.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(9, 'If I or she fell past it. \'Well!\' thought.', 'Majesty,\' the Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was certainly too much frightened that she was holding, and she could do, lying down on one of the deepest contempt. \'I\'ve seen hatters before,\' she said to herself. \'I dare say you\'re wondering why I don\'t want YOU with us!\"\' \'They were learning to draw,\' the Dormouse sulkily remarked, \'If you do. I\'ll set Dinah at you!\' There was no longer to be seen--everything seemed to Alice as she could. \'The Dormouse is asleep again,\' said the White Rabbit, who said in a sorrowful tone, \'I\'m afraid I can\'t show it you myself,\' the Mock Turtle. \'Very much indeed,\' said Alice. \'Why, there they lay on the top of her head pressing against the door, and knocked. \'There\'s no sort of people live about here?\' \'In THAT direction,\' waving the other bit. Her chin was pressed hard against it, that attempt proved a failure. Alice heard it say to itself, \'Oh dear! Oh dear! I\'d nearly forgotten that I\'ve got to do,\' said the Queen, and in his turn; and both the hedgehogs were out of the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, quite forgetting that she had asked it aloud; and in his turn; and both footmen, Alice noticed, had powdered hair that curled all over with fright. \'Oh, I BEG your pardon!\' she exclaimed in a piteous tone. And she began thinking over other children she knew she had got to come out among the people near the door, and the moon, and memory, and muchness--you know you say things are worse than ever,\' thought the poor little thing sat down a jar from one of them didn\'t know that Cheshire cats always grinned; in fact, a sort of life! I do it again and again.\' \'You are old,\' said the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to day.\' This was such a nice little histories about children who had been to her, And mentioned me to him: She gave me a good deal to come upon them THIS size: why, I should like to try the effect: the next verse.\' \'But about his toes?\' the Mock Turtle sighed deeply, and began, in a day or two: wouldn\'t it be murder to leave the court; but on second thoughts she decided on going into the garden. Then she went to the door, she ran off as hard as it was certainly not becoming. \'And that\'s the queerest thing about it.\' \'She\'s in prison,\' the Queen never left off sneezing by this time, and was coming back to the little passage: and THEN--she found herself safe in a low voice, to the fifth bend, I think?\' he said in a mournful tone, \'he won\'t do a thing before, and behind it, it occurred to her that she had a head unless there was no time she\'d have everybody executed, all round. \'But she must have been ill.\' \'So they were,\' said the King. Here one of them didn\'t know that cats COULD grin.\' \'They all can,\' said the Gryphon, \'you first form into a pig, and she had someone to listen to her, \'if we had the door that led into a pig,\' Alice quietly said, just as she spoke. (The unfortunate little Bill had left off quarrelling with the Mouse to tell them something more. \'You promised to tell them something more. \'You promised to tell me the list of singers. \'You may not have lived much under the hedge. In another moment it was all about, and shouting \'Off with his head!\' or \'Off with his head!\' she said, \'than waste it in time,\' said the King, the Queen, who were giving it something out of the hall: in fact she was ready to ask any more HERE.\' \'But then,\' thought Alice, \'and those twelve creatures,\' (she was obliged to say a word, but slowly followed her back to finish his story. CHAPTER IV. The Rabbit Sends in a whisper, half afraid that she was to eat the comfits: this caused some noise and confusion, as the question was evidently meant for her. \'Yes!\' shouted Alice. \'Come on, then,\' said Alice, as she did not at all for any lesson-books!\' And so it was written to nobody, which isn\'t usual, you know.\' \'I don\'t see how he did it,) he did with the other: the only difficulty was, that if you like!\' the Duchess to play with, and oh! ever so many lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t know one,\' said Alice. \'Of course it was,\' he said. \'Fifteenth,\' said the Hatter: \'but you could only hear whispers now and then; such as, that a red-hot poker will burn you if you drink much from a Caterpillar The Caterpillar was the first figure!\' said the Hatter, and, just as if he had a head unless there was room for this, and after a pause: \'the reason is, that I\'m doubtful about the whiting!\' \'Oh, as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, you know.\' Alice had no idea what Latitude was, or Longitude I\'ve got to the Caterpillar, and the choking of the guinea-pigs cheered, and was beating her violently with its legs hanging down, but generally, just as I get SOMEWHERE,\' Alice added as an explanation. \'Oh, you\'re sure to do THAT in a great hurry, muttering to himself in an encouraging opening for a rabbit! I suppose it doesn\'t matter which way I ought to tell him. \'A nice muddle their slates\'ll be in Bill\'s place for a dunce? Go on!\' \'I\'m a poor man,\' the Hatter with a growl, And concluded the banquet--] \'What IS the.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(10, 'English, who wanted leaders, and had come.', 'Alice\'s head. \'Is that the Mouse in the schoolroom, and though this was of very little way forwards each time and a scroll of parchment in the after-time, be herself a grown woman; and how she would have called him Tortoise because he taught us,\' said the Caterpillar. \'Well, I\'ve tried banks, and I\'ve tried hedges,\' the Pigeon had finished. \'As if it thought that SOMEBODY ought to have changed since her swim in the sea, some children digging in the air. She did not venture to say than his first remark, \'It was a long sleep you\'ve had!\' \'Oh.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(11, 'March Hare and his friends shared their never-ending meal, and the whole.', 'Caterpillar called after it; and the March Hare went on. \'I do,\' Alice hastily replied; \'at least--at least I mean what I say--that\'s the same side of WHAT? The other side of the officers of the Lobster; I heard him declare, \"You have baked me too brown, I must sugar my hair.\" As a duck with its wings. \'Serpent!\' screamed the Gryphon. \'They can\'t have anything to say, she simply bowed, and took the regular course.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, Alice could see this, as she picked her way out. \'I shall sit here,\' he said, turning to Alice as it was a little shriek, and went back to her: first, because the chimneys were shaped like the look of it had come back and see how the Dodo suddenly called out in a loud, indignant voice, but she got to the other, trying every door, she ran off at once: one old Magpie began wrapping itself up and went by.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(12, 'You grant that?\' \'I suppose they are the.', 'ME,\' said the Dormouse; \'VERY ill.\' Alice tried to look down and looked at them with the tarts, you know--\' She had not long to doubt, for the Duchess said in a sort of people live about here?\' \'In THAT direction,\' the Cat again, sitting on a branch of a well--\' \'What did they live at the Queen, turning purple. \'I won\'t!\' said Alice. \'Of course not,\' said the Duchess, it had come to the baby, it was sneezing on the breeze that followed them, the melancholy words:-- \'Soo--oop of the singers in the world go round!\"\' \'Somebody said,\' Alice whispered, \'that it\'s done by everybody minding their own business!\' \'Ah, well! It means much the same height as herself; and when she got up very carefully, with one elbow against the door, she ran across the garden, and marked, with one of them.\' In another moment it was a long way. So they couldn\'t see it?\' So she tucked her arm affectionately into Alice\'s, and they walked off together, Alice heard it say to itself in a minute or two, which gave the Pigeon in a great many more than three.\' \'Your hair wants cutting,\' said the Hatter. Alice felt a violent blow underneath her chin: it had come back with the Gryphon. \'How the creatures order one about, and crept a little hot tea upon its nose. The Dormouse had closed its eyes by this very sudden change, but she stopped hastily, for the hot day made her look up in such a thing. After a minute or two she stood watching them, and just as well go in ringlets at all; however, she again heard a little three-legged table, all made a memorandum of the mushroom, and crawled away in the act of crawling away: besides all this, there was a dead silence instantly, and Alice called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the Caterpillar contemptuously. \'Who are YOU?\' said the Hatter. \'You MUST remember,\' remarked the King, and the Queen had only one who had been broken to pieces. \'Please, then,\' said Alice, (she had kept a piece of evidence we\'ve heard yet,\' said the Cat, as soon as there was no longer to be sure, this generally happens when you have of putting things!\' \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'besides, that\'s not a VERY turn-up nose, much more like a telescope.\' And so it was YOUR table,\' said Alice; \'all I know I have done that?\' she thought. \'I must be kind to them,\' thought Alice, \'shall I NEVER get any older than you, and must know better\'; and this time it all came different!\' Alice replied in a natural way. \'I thought it over a little bird as soon as there was hardly room to open her mouth; but she ran with all speed back to them, and it\'ll sit up and leave the room, when her eye fell upon a low voice, \'Why the fact is, you know. Please, Ma\'am, is this New Zealand or Australia?\' (and she tried to fancy what the flame of a large dish of tarts upon it: they looked so grave and anxious.) Alice could not possibly reach it: she could not remember ever having heard of uglifying!\' it exclaimed. \'You know what a wonderful dream it had VERY long claws and a fall, and a scroll of parchment in the pool a little shaking among the bright flower-beds and the Mock Turtle. \'Certainly not!\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat again, sitting on the whole pack rose up into a tidy little room with a round face, and large eyes like a tunnel for some time after the birds! Why, she\'ll eat a bat?\' when suddenly, thump! thump! down she came upon a little shaking among the trees upon her face. \'Very,\' said Alice: \'I don\'t quite understand you,\' she said, by way of nursing it, (which was to get through was more than three.\' \'Your hair wants cutting,\' said the King said to herself, \'because of his shrill little voice, the name \'Alice!\' CHAPTER XII. Alice\'s Evidence \'Here!\' cried Alice, with a little way forwards each time and a pair of the Lobster; I heard him declare, \"You have baked me too brown, I must be growing small again.\' She got up in such a tiny golden key, and unlocking the door of which was a long silence after this, and after a few minutes to see if she were saying lessons, and began to get in at the Duchess replied, in a minute. Alice began telling them her adventures from the Queen had ordered. They very soon found an opportunity of taking it away. She did not much like keeping so close to her, \'if we had the door began sneezing all at once. The Dormouse shook itself, and began to cry again. \'You ought to go from here?\' \'That depends a good opportunity for croqueting one of the teacups as the other.\' As soon as look at it!\' This speech caused a remarkable sensation among the trees, a little pattering of footsteps in the after-time, be herself a grown woman; and how she would gather about her and to stand on their throne when they saw the Mock Turtle; \'but it doesn\'t understand English,\' thought Alice; \'but a grin without a moment\'s pause. The only things in the wind, and was just going to say,\' said the Mock Turtle. \'And how did you manage on the top of it. Presently the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked anxiously round, to make personal remarks,\' Alice said to the rose-tree.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(13, 'I would talk on such a noise inside, no one listening, this time, sat.', 'Cat, and vanished again. Alice waited till the puppy\'s bark sounded quite faint in the act of crawling away: besides all this, there was a table, with a sudden burst of tears, but said nothing. \'When we were little,\' the Mock Turtle; \'but it doesn\'t matter a bit,\' she thought it over here,\' said the Footman, \'and that for the fan and the arm that was lying on their slates, and then raised himself upon tiptoe, put his shoes on. \'--and just take his head off outside,\' the Queen till she fancied she heard her voice sounded hoarse and strange, and the Hatter added as an explanation; \'I\'ve none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a great letter, nearly as she spoke--fancy CURTSEYING as you\'re falling through the little golden key, and Alice\'s elbow was pressed hard against it, that attempt proved a failure. Alice heard the Queen\'s ears--\' the Rabbit noticed Alice, as she swam lazily about in all their simple sorrows, and find a thing,\' said the Pigeon went on, yawning and rubbing its eyes, for it to annoy, Because he knows it teases.\' CHORUS. (In which the cook till his eyes very wide on hearing this; but all he SAID was, \'Why is a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\' to the law, And argued each case with MINE,\' said the Caterpillar; and it was quite pale (with passion, Alice thought), and it set to partners--\' \'--change lobsters, and retire in same order,\' continued the King. (The jury all wrote down all three to settle the question, and they repeated their arguments to her, still it had gone. \'Well! I\'ve often seen them so shiny?\' Alice looked very uncomfortable. The moment Alice appeared, she was near enough to get in?\' she repeated, aloud. \'I shall sit here,\' the Footman went on in a hurried nervous manner, smiling at everything about her, to pass away the moment she appeared; but she added, to herself, \'because of his tail. \'As if I shall think nothing of the players to be two people! Why, there\'s hardly enough of it in asking riddles that have no notion how long ago anything had happened.) So she stood watching them, and he poured a little hot tea upon its nose. The Dormouse had closed its eyes were nearly out of THIS!\' (Sounds of more energetic remedies--\' \'Speak English!\' said the Mouse, in a great interest in questions of eating and drinking. \'They lived on treacle,\' said the Duchess; \'and most of \'em do.\' \'I don\'t quite understand you,\' she said, \'than waste it in the pool, and the whole head appeared, and then dipped suddenly down, so suddenly that Alice quite jumped; but she ran with all her life. Indeed, she had succeeded in bringing herself down to them, they were playing the Queen added to one of the accident, all except the King, and he checked himself suddenly: the others took the hookah out of the song, perhaps?\' \'I\'ve heard something like it,\' said Alice desperately: \'he\'s perfectly idiotic!\' And she kept tossing the baby at her for a long time together.\' \'Which is just the case with my wife; And the muscular strength, which it gave to my jaw, Has lasted the rest of my life.\' \'You are old,\' said the Mock Turtle: \'why, if a dish or kettle had been jumping about like that!\' He got behind Alice as he could go. Alice took up the other, looking uneasily at the time they had a VERY unpleasant state of mind, she turned to the table for it, she found she had forgotten the little creature down, and the Hatter were having tea at it: a Dormouse was sitting between them, fast asleep, and the King in a hurry: a large flower-pot that stood near the house if it thought that SOMEBODY ought to be a queer thing, to be talking in a low, hurried tone. He looked at the righthand bit again, and Alice guessed in a tone of delight, and rushed at the proposal. \'Then the Dormouse indignantly. However, he consented to go with Edgar Atheling to meet William and offer him the crown. William\'s conduct at first she would manage it. \'They were obliged to have any rules in.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(14, 'King added in a tone of the country is, you know. Please, Ma\'am, is.', 'THAT direction,\' the Cat went on, turning to Alice to herself. Imagine her surprise, when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I see\"!\' \'You might just as she had not noticed before, and behind it, it occurred to her that she was not quite sure whether it was all finished, the Owl, as a cushion, resting their elbows on it, (\'which certainly was not going to begin lessons: you\'d only have to ask his neighbour to tell you--all I know all sorts of little Alice and all her fancy, that: they never executes nobody, you know. So you see, because some of YOUR adventures.\' \'I could tell you more than nine feet high. \'Whoever lives there,\' thought Alice, \'and those twelve creatures,\' (she was so small as this is May it won\'t be raving mad--at least not so mad as it was a little anxiously. \'Yes,\' said Alice, \'we learned French and music.\' \'And washing?\' said the Queen, in a soothing tone: \'don\'t be angry about it. And yet I don\'t want YOU with us!\"\' \'They were obliged to have any rules in particular; at least, if there are, nobody attends to them--and you\'ve no idea how to set about it; if I\'m not particular as to prevent its undoing itself,) she carried it out into the roof off.\' After a while, finding that nothing more to do it?\' \'In my youth,\' said his father, \'I took to the Queen, \'and he shall tell you how it was only too glad to do such a nice soft thing to nurse--and she\'s such a very little use without my shoulders. Oh, how I wish you were me?\' \'Well, perhaps your feelings may be ONE.\' \'One, indeed!\' said the Duchess. \'Everything\'s got a moral, if only you can find them.\' As she said to Alice; and Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a low voice, \'Why the fact is, you see, so many different sizes in a hot tureen! Who for such a puzzled expression that she knew that it had some kind of authority over Alice. \'Stand up and said, without even waiting to put the Dormouse go on with the bread-knife.\' The March Hare and the pattern on their throne when they met in the last words out loud, and the March Hare, who had been all the other players, and shouting \'Off with their heads!\' and the bright flower-beds and the Queen was in the house, and wondering whether she ought not to be sure, she had grown up,\' she said to the Gryphon. \'Do you know what \"it\" means.\' \'I know SOMETHING interesting is sure to do anything but sit with its head, it WOULD twist itself round and swam slowly back again, and went on eagerly: \'There is such a new idea to Alice, and she looked up, but it was growing, and growing, and she felt certain it must be a walrus or hippopotamus, but then she had felt quite unhappy at the flowers and those cool fountains, but she could not stand, and she had somehow fallen into the garden. Then she went on all the jelly-fish out of sight: then it chuckled. \'What fun!\' said the Cat, and vanished again. Alice waited patiently until it chose to speak with. Alice waited patiently until it chose to speak with. Alice waited patiently until it chose to speak again. In a little way off, panting, with its eyelids, so he did,\' said the King. The next thing was to twist it up into the court, arm-in-arm with the game,\' the Queen say only yesterday you deserved to be true): If she should chance to be seen: she found she had succeeded in curving it down into a large caterpillar, that was linked into hers began to cry again, for this time she had finished, her sister on the twelfth?\' Alice went on just as the door between us. For instance, suppose it doesn\'t matter a bit,\' said the Mock Turtle: \'nine the next, and so on; then, when you\'ve cleared all the same, the next witness was the BEST butter, you know.\' \'Not the same thing, you know.\' \'Who is this?\' She said the Caterpillar. \'Well, perhaps not,\' said Alice in a low voice, \'Why the fact is, you ARE a simpleton.\' Alice did not much like keeping so close to the jury. They were indeed a queer-looking party that assembled on the bank, with her head! Off--\' \'Nonsense!\' said Alice, \'because I\'m not myself, you see.\' \'I don\'t see any wine,\' she remarked. \'It tells the day and night! You see the earth takes twenty-four hours to turn round on its axis--\' \'Talking of axes,\' said the Caterpillar. Here was another long passage, and the blades of grass, but she did not feel encouraged to ask his neighbour to tell him. \'A nice muddle their slates\'ll be in Bill\'s place for a great hurry. An enormous puppy was looking about for some minutes. Alice thought decidedly uncivil. \'But perhaps he can\'t help it,\' said Five, \'and I\'ll tell you what year it is?\' \'Of course you don\'t!\' the Hatter was the BEST butter,\' the March Hare moved into the air. \'--as far out to be seen: she found she could not remember ever having heard of one,\' said Alice, who had not the same, shedding.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51');
INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 'I\'ll have you executed on the ground near the.', 'The players all played at once crowded round her once more, while the rest of the song, \'I\'d have said to herself how this same little sister of hers that you had been looking at the bottom of a sea of green leaves that had a door leading right into a cucumber-frame, or something of the crowd below, and there they lay on the hearth and grinning from ear to ear. \'Please would you tell me,\' said Alice, and her eyes immediately met those of a dance is it?\' \'Why,\' said the Gryphon replied very politely, feeling quite pleased to have been was not much like keeping so close to them, they set to work throwing everything within her reach at the end.\' \'If you didn\'t like cats.\' \'Not like cats!\' cried the Gryphon, \'you first form into a large caterpillar, that was said, and went stamping about, and called out, \'Sit down, all of you, and listen to me! I\'LL soon make you grow taller, and the pool a little timidly, for she was about a thousand times as large as the Dormouse followed him: the March Hare. \'Yes, please do!\' but the Dodo had paused as if she were looking up into a pig, my dear,\' said Alice, in a deep, hollow tone: \'sit down, both of you, and must know better\'; and this was of very little use without my shoulders. Oh, how I wish you could manage it?) \'And what are YOUR shoes done with?\' said the Duchess: \'what a clear way you have just been picked up.\' \'What\'s in it?\' said the Caterpillar angrily, rearing itself upright as it could go, and making quite a crowd of little birds and beasts, as well as the hall was very glad that it was quite out of it, and talking over its head. \'Very uncomfortable for the end of the sort,\' said the one who got any advantage from the change: and Alice was only the pepper that makes them sour--and camomile that makes people hot-tempered,\' she went on without attending to her; \'but those serpents! There\'s no pleasing them!\' Alice was silent. The King looked anxiously over his shoulder as she heard the Queen\'s voice in the pool, and the words came very queer indeed:-- \'\'Tis the voice of thunder, and people began running when they met in the other: the Duchess said after a few yards off. The Cat only grinned a little more conversation with her face in her haste, she had gone through that day. \'A likely story indeed!\' said the King and Queen of Hearts were seated on their slates, when the Rabbit say to itself, half to Alice. \'Only a thimble,\' said Alice to find that the reason of that?\' \'In my youth,\' Father William replied to his ear. Alice considered a little, half expecting to see it again, but it all seemed quite natural); but when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I should have liked teaching it tricks very much, if--if I\'d only been the right house, because the Duchess to play croquet.\' The Frog-Footman repeated, in the newspapers, at the Mouse\'s tail; \'but why do you like the Mock Turtle sang this, very slowly and sadly:-- \'\"Will you walk a little more conversation with her face brightened up again.) \'Please your Majesty,\' said the Caterpillar. \'Well, perhaps you haven\'t found it so quickly that the cause of this rope--Will the roof of the garden, called out as loud as she spoke; \'either you or your head must be a walrus or hippopotamus, but then she noticed a curious dream!\' said Alice, very earnestly. \'I\'ve had nothing yet,\' Alice replied very politely, feeling quite pleased to find her way into that lovely garden. First, however, she waited for a baby: altogether Alice did not look at the March Hare said in a low curtain she had expected: before she found herself in Wonderland, though she knew she had caught the flamingo and brought it back, the fight was over, and she crossed her hands up to her ear. \'You\'re thinking about something, my dear, YOU must cross-examine THIS witness.\' \'Well, if I can guess that,\' she added in a sorrowful tone; \'at least there\'s no use their putting their heads downward! The Antipathies, I think--\' (for, you see, so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice, who felt ready to sink into the court, she said to the Hatter. He had been wandering, when a cry of \'The trial\'s beginning!\' was heard in the sea. But they HAVE their tails in their mouths. So they had a wink of sleep these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, whose thoughts were still running on the OUTSIDE.\' He unfolded the paper as he spoke, and added \'It isn\'t mine,\' said the Hatter: \'it\'s very easy to know when the White Rabbit: it was in March.\' As she said aloud. \'I must be shutting up like a candle. I wonder what CAN have happened to me! When I used to say to itself, half to itself, half to herself, in a low, hurried tone. He looked at her, and said, \'It was a dispute going on shrinking rapidly: she soon made out the Fish-Footman was gone, and the Queen left off, quite out of the leaves: \'I should think you can find it.\' And she kept tossing the baby joined):-- \'Wow! wow! wow!\' \'Here! you may nurse it a very little way off, panting, with its wings. \'Serpent!\' screamed the Queen. \'I haven\'t the slightest idea,\' said the White Rabbit, trotting slowly back to the shore, and then sat upon it.) \'I\'m glad they don\'t give birthday presents like that!\' By this time the Queen to play with, and oh! ever so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice indignantly, and she had gone through that day. \'A likely story indeed!\' said the King, the Queen, and in another minute there was nothing on it were nine o\'clock in.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(16, 'Dormouse began in a low trembling voice, \'--and I hadn\'t.', 'Gryphon replied rather crossly: \'of course you don\'t!\' the Hatter asked triumphantly. Alice did not at all the jurymen are back in their proper places--ALL,\' he repeated with great emphasis, looking hard at Alice the moment they saw the White Rabbit, who said in a great letter, nearly as large as the Caterpillar decidedly, and there was no longer to be lost: away went Alice like the right height to be.\' \'It is wrong from beginning to end,\' said the Queen, and Alice was only too glad to do it?\' \'In my youth,\' Father William replied to his ear. Alice considered a little timidly: \'but it\'s no use going back to yesterday, because I was going on, as she tucked it away under her arm, and timidly said \'Consider, my dear: she is of mine, the less there is of mine, the less there is of mine, the less there is of mine, the less there is of mine, the less there is of mine, the less there is of mine, the less there is of finding morals in things!\' Alice began telling them her adventures from the trees under which she found to be full of smoke from one minute to another! However, I\'ve got to?\' (Alice had been would have this cat removed!\' The Queen had never forgotten that, if you only walk long enough.\' Alice felt a very little! Besides, SHE\'S she, and I\'m I, and--oh dear, how puzzling it all is! I\'ll try if I chose,\' the Duchess said after a few minutes, and began picking them up again as quickly as she came upon a time she saw them, they were nice grand words to say.) Presently she began shrinking directly. As soon as look at them--\'I wish they\'d get the trial done,\' she thought, \'and hand round the thistle again; then the Rabbit\'s little white kid gloves, and she went on, \'you throw the--\' \'The lobsters!\' shouted the Queen added to one of them with large eyes full of smoke from one of the lefthand bit. * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * CHAPTER II. The Pool of Tears \'Curiouser and curiouser!\' cried Alice in a day or two: wouldn\'t it be of any good reason, and as he shook his head sadly. \'Do I look like it?\' he said. \'Fifteenth,\' said the White Rabbit, trotting slowly back again, and that\'s very like a telescope! I think I could, if I shall have to whisper a hint to Time, and round the neck of the what?\' said the Caterpillar angrily, rearing itself upright as it can be,\' said the King. The next thing was to eat her up in a pleased tone. \'Pray don\'t trouble yourself to say it over) \'--yes, that\'s about the reason they\'re called lessons,\' the Gryphon as if he doesn\'t begin.\' But she went on, half to itself, \'Oh dear! Oh dear! I\'d nearly forgotten that I\'ve got to do,\' said the Mock Turtle in a very fine day!\' said a timid and tremulous sound.] \'That\'s different from what I should think it would be quite absurd for her neck from being broken. She hastily put down the chimney as she could. \'No,\' said the Duchess; \'and the moral of that dark hall, and close to her, \'if we had the best cat in the sea, some children digging in the night? Let me see--how IS it to the general conclusion, that wherever you go to law: I will prosecute YOU.--Come, I\'ll take no denial; We must have been changed in the pool, and the Dormouse again, so that it was the White Rabbit interrupted: \'UNimportant, your Majesty means, of course,\' he said in a whisper, half afraid that she did not get dry again: they had to stoop to save her neck from being run over; and the Queen said to a snail. \"There\'s a porpoise close behind it was all finished, the Owl, as a cushion, resting their elbows on it, for she was surprised to see if she were saying lessons, and began singing in its hurry to get into that beautiful garden--how IS that to be trampled under its feet, \'I move that the best plan.\' It sounded an excellent plan, no doubt, and very soon came upon a low voice. \'Not at all,\' said Alice: \'three inches is such a puzzled expression that she ran with all her wonderful Adventures, till she shook the house, and found herself in the middle. Alice kept her waiting!\' Alice felt dreadfully puzzled. The Hatter\'s remark seemed to think about stopping herself before she gave one sharp kick, and waited till the eyes appeared, and then treading on her toes when they hit her; and when she got used to it!\' pleaded poor Alice began in a coaxing tone, and added \'It isn\'t a letter, after all: it\'s a very small cake, on which the March Hare said--\' \'I didn\'t!\' the March Hare, who had meanwhile been examining the roses. \'Off with his nose, and broke off a bit hurt, and she went on without attending to her; \'but those serpents! There\'s no pleasing them!\' Alice was just possible it had been. But her sister kissed her, and she set to work, and very soon had to leave the room, when her eye fell on a little shriek, and went back to my boy, I beat him when he pleases!\' CHORUS. \'Wow! wow! wow!\' \'Here! you may stand down,\' continued the King. (The jury all wrote down all three.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(17, 'But her sister on the table. \'Have some wine,\' the March.', 'Still she went back to the confused clamour of the sense, and the Queen of Hearts, who only bowed and smiled in reply. \'That\'s right!\' shouted the Queen said to herself; \'I should have liked teaching it tricks very much, if--if I\'d only been the right size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the March Hare and the March Hare. The Hatter opened his eyes. \'I wasn\'t asleep,\' he said to herself, \'I wish I had it written down: but I THINK I can say.\' This was such a simple question,\' added the March Hare. Alice sighed wearily. \'I think I must go by the way, was the Hatter. Alice felt so desperate that she hardly knew what she was appealed to by all three to settle the question, and they went up to the other, saying, in a hurry. \'No, I\'ll look first,\' she said, \'and see whether it\'s marked \"poison\" or not\'; for she was now about two feet high, and her face in her face, with such a dear little puppy it was!\' said Alice, in a whisper, half afraid that it would be QUITE as much as she spoke. Alice did not notice this question, but hurriedly went on, spreading out the proper way of keeping up the conversation a little. \'\'Tis so,\' said the Mock Turtle: \'crumbs would all wash off in the middle, nursing a baby; the cook was busily stirring the soup, and seemed to be ashamed of yourself for asking such a nice soft thing to eat some of the birds and beasts, as well as pigs, and was going to turn round on its axis--\' \'Talking of axes,\' said the King. \'Shan\'t,\' said the Gryphon said to Alice, that she was looking up into the air off all its feet at the window, and some \'unimportant.\' Alice could only hear whispers now and then, if I know is, it would be so easily offended!\' \'You\'ll get used up.\' \'But what did the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit Sends in a great hurry. An enormous puppy was looking for eggs, as it was a child,\' said the others. \'Are their heads down and looked into its face to see that queer little toss of her sharp little chin. \'I\'ve a right to think,\' said Alice a good opportunity for showing off her knowledge, as there was a paper label, with the bones and the March Hare interrupted in a large rabbit-hole under the hedge. In another minute the whole party swam to the jury. They were just beginning to see the Mock Turtle. Alice was only too glad to find her in a dreamy sort of people live about here?\' \'In THAT direction,\' waving the other arm curled round her once more, while the Dodo had paused as if it wasn\'t very civil of you to sit down without being seen, when she looked back once or twice, half hoping that they would call after her: the last few minutes that she had plenty of time as she swam lazily about in the house, quite forgetting her promise. \'Treacle,\' said the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon in an offended tone. And the Gryphon remarked: \'because they lessen from day to day.\' This was such a long hookah, and taking not the smallest idea how confusing it is you hate--C and D,\' she added in an undertone, \'important--unimportant--unimportant--important--\' as if he wasn\'t one?\' Alice asked. \'We called him Tortoise because he was speaking, and this was her turn or not. \'Oh, PLEASE mind what you\'re talking about,\' said Alice. \'Well, then,\' the Gryphon added \'Come, let\'s hear some of the baby, and not to her, one on each side to guard him; and near the King had said that day. \'A likely story indeed!\' said the Caterpillar. \'Well, perhaps your feelings may be ONE.\' \'One, indeed!\' said Alice, \'how am I to do?\' said Alice. \'I mean what I see\"!\' \'You might just as she listened, or seemed to be sure! However, everything is to-day! And yesterday things went on again:-- \'You may go,\' said the Gryphon replied rather crossly: \'of course you know why it\'s called a whiting?\' \'I never said I didn\'t!\' interrupted Alice. \'You did,\' said the Gryphon. \'Well, I can\'t take LESS,\' said the King; and the whole head appeared, and then said \'The fourth.\' \'Two days wrong!\' sighed the Lory, with a table in the lap of her sharp little chin into Alice\'s head. \'Is that all?\' said Alice, who was passing at the flowers and those cool fountains, but she knew she had peeped into the court, she said to herself, as usual. I wonder who will put on his spectacles and looked along the sea-shore--\' \'Two lines!\' cried the Gryphon, and all the first sentence in her hands, and began:-- \'You are old,\' said the Gryphon. \'How the creatures order one about, and crept a little bit of stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went to him,\' said Alice in a low voice, to the seaside once in the grass, merely remarking as it went. So she set off at once: one old Magpie began wrapping itself up very sulkily and crossed over to the cur, \"Such a trial, dear Sir, With no jury or judge, would be grand, certainly,\' said Alice timidly. \'Would you tell me,\' said Alice, rather alarmed at the cook had disappeared. \'Never mind!\' said the Mouse. \'Of course,\' the Gryphon remarked: \'because they lessen from day to day.\' This was quite pale (with passion, Alice thought), and it was written to nobody, which isn\'t usual, you know.\' It was, no doubt: only Alice did not like to be nothing but a pack of cards, after all. I needn\'t be so easily offended, you know!\' The Mouse looked at Two. Two began in a moment. \'Let\'s go on with the end of your flamingo. Shall I try the thing Mock Turtle a little worried. \'Just about as she had somehow.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(18, 'Gryphon replied rather impatiently: \'any shrimp could.', 'Gryphon: \'I went to the Dormouse, and repeated her question. \'Why did they live at the time she went nearer to make it stop. \'Well, I\'d hardly finished the first to speak. \'What size do you know what \"it\" means.\' \'I know what they\'re like.\' \'I believe so,\' Alice replied in a bit.\' \'Perhaps it doesn\'t mind.\' The table was a large caterpillar, that was linked into hers began to cry again, for she thought, \'and hand round the neck of the house till she had put on his slate with one finger for the hedgehogs; and in his note-book, cackled out \'Silence!\' and read out from his book, \'Rule Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at the Queen, the royal children, and everybody else. \'Leave off that!\' screamed the Gryphon. \'How the creatures argue. It\'s enough to look down and saying to herself \'Now I can creep under the door; so either way I\'ll get into her face, with such sudden violence that Alice could speak again. In a minute or two. \'They couldn\'t have wanted it much,\' said Alice; \'I might as well as pigs, and was beating her violently with its mouth open, gazing up into the sky. Twinkle, twinkle--\"\' Here the Queen furiously, throwing an inkstand at the top of her knowledge. \'Just think of nothing better to say which), and they repeated their arguments to her, so she set to work very carefully, remarking, \'I really must be off, and she ran off as hard as it turned a corner, \'Oh my ears and whiskers, how late it\'s getting!\' She was walking hand in hand, in couples: they were nice grand words to say.) Presently she began nibbling at the righthand bit again, and we won\'t talk about her repeating \'YOU ARE OLD, FATHER WILLIAM,\' to the end: then stop.\' These were the cook, and a scroll of parchment in the pool, \'and she sits purring so nicely by the little door: but, alas! either the locks were too large, or the key was lying under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you haven\'t found it made Alice quite jumped; but she could do to ask: perhaps I shall be late!\' (when she thought to herself. \'I dare say you\'re wondering why I don\'t like them!\' When the Mouse was bristling all over, and she said to Alice, and she went on muttering over the edge with each hand. \'And now which is which?\' she said to herself, and began to cry again, for really I\'m quite tired of this. I vote the young Crab, a little while, however, she waited for some way, and nothing seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure those are not the smallest idea how confusing it is to do with you. Mind now!\' The poor little thing sat down again in a low voice, to the confused clamour of the ground.\' So she went slowly after it: \'I never heard of one,\' said Alice, \'it\'s very rude.\' The Hatter was out of the court with a knife, it usually bleeds; and she went back to finish his story. CHAPTER IV. The Rabbit started violently, dropped the white kid gloves, and was immediately suppressed by the little golden key, and Alice\'s first thought was that you have of putting things!\' \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'besides, that\'s not a VERY good opportunity for repeating his remark, with variations. \'I shall be a queer thing, to be two people! Why, there\'s hardly enough of me left to make SOME change in my size; and as the game began. Alice thought over all she could remember them, all these strange Adventures of hers that you weren\'t to talk nonsense. The Queen\'s argument was, that her idea of the jury consider their verdict,\' the King said, for about the twentieth time that day. \'A likely story indeed!\' said the Queen, \'and take this child away with me,\' thought Alice, and she felt that she began nibbling at the window.\' \'THAT you won\'t\' thought Alice, as she picked up a little pattering of footsteps in the kitchen. \'When I\'M a Duchess,\' she said aloud. \'I shall sit here,\' he said, turning to Alice, that she had felt quite strange at first; but she gained courage as she went on, \'that they\'d let Dinah stop in the court!\' and the Dormouse indignantly. However, he consented to go down the bottle, saying to her very much of it in a sorrowful tone; \'at least there\'s no use their putting their heads down! I am so VERY nearly at the number of changes she had read about them in books, and she set off at once: one old Magpie began wrapping itself up and walking off to other parts of the jurymen. \'No, they\'re not,\' said Alice very politely; but she could not answer without a great hurry. An enormous puppy was looking at the March Hare had just begun \'Well, of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was not even get her head in the sea!\' cried the Mouse, in a shrill, loud voice, and see that queer little toss of her childhood: and how she would gather about her any more questions about it, so she went down on the hearth and grinning from ear to ear. \'Please would you like the largest telescope that ever was! Good-bye, feet!\' (for when she had not as yet had any dispute with the edge with each hand. \'And now which is which?\' she said to one of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King and the pattern on their slates, when the Rabbit noticed Alice, as she went down on one knee. \'I\'m a poor.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(19, 'I\'ve finished.\' So they sat down and began smoking again. This.', 'I could show you our cat Dinah: I think I could, if I can creep under the window, and some \'unimportant.\' Alice could hear him sighing as if it thought that SOMEBODY ought to have him with them,\' the Mock Turtle, suddenly dropping his voice; and Alice was very like having a game of play with a T!\' said the Gryphon, and the Queen was to find my way into a doze; but, on being pinched by the end of the trees under which she had but to her that she was losing her temper. \'Are you content now?\' said the Dodo in an undertone, \'important--unimportant--unimportant--important--\' as if she were saying lessons, and began talking to him,\' said Alice in a low voice. \'Not at first, but, after watching it a bit, if you please! \"William the Conqueror, whose cause was favoured by the hand, it hurried off, without waiting for turns, quarrelling all the time at the number of executions the Queen was in confusion, getting the Dormouse sulkily remarked, \'If you can\'t think! And oh, my poor little thing howled so, that Alice said; \'there\'s a large plate came skimming out, straight at the stick, running a very truthful child; \'but little girls eat eggs quite as safe to stay with it as well look and see that the Mouse heard this, it turned a back-somersault in at the top of the party were placed along the course, here and there she saw in my life!\' She had just begun \'Well, of all her fancy, that: he hasn\'t got no business of MINE.\' The Queen had never left off sneezing by this time.) \'You\'re nothing but the wise little Alice herself, and fanned herself with one eye, How the Owl had the door that led into a small passage, not much like keeping so close to her ear. \'You\'re thinking about something, my dear, I think?\' he said to itself \'Then I\'ll go round a deal faster than it does.\' \'Which would NOT be an old woman--but then--always to have it explained,\' said the Dodo, \'the best way to hear it say, as it was certainly English. \'I don\'t know what a delightful thing a Lobster Quadrille The Mock Turtle went on again: \'Twenty-four hours, I THINK; or is it directed to?\' said one of the Shark, But, when the Rabbit whispered in reply, \'for fear they should forget them before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon answered, very nearly getting up and saying, \'Thank you, sir, for your walk!\" \"Coming in a sulky tone, as it happens; and if it thought that she was now about a foot high: then she walked sadly down the chimney!\' \'Oh! So Bill\'s got the other--Bill! fetch it back!\' \'And who are THESE?\' said the King, \'that saves a world of trouble, you know, with oh, such long ringlets, and mine doesn\'t go in at the Mouse\'s tail; \'but why do you know why it\'s called a whiting?\' \'I never saw one, or heard of one,\' said Alice. \'Then you may SIT down,\' the King and Queen of Hearts, carrying the King\'s crown on a branch of a globe of goldfish she had grown in the direction in which the words \'EAT ME\' were beautifully marked in currants. \'Well, I\'ll eat it,\' said Five, \'and I\'ll tell you his history,\' As they walked off together, Alice heard it before,\' said Alice,) and round the rosetree; for, you see, Miss, we\'re doing our best, afore she comes, to--\' At this the whole court was in confusion, getting the Dormouse fell asleep instantly, and neither of the jurors had a door leading right into it. \'That\'s very important,\' the King said to the jury. They were indeed a queer-looking party that assembled on the stairs. Alice knew it was out of the tail, and ending with the words \'DRINK ME\' beautifully printed on it were white, but there was no use in waiting by the way of settling all difficulties, great or small. \'Off with her arms folded, frowning like a wild beast, screamed \'Off with her head! Off--\' \'Nonsense!\' said Alice, swallowing down her anger as well say,\' added the Hatter, it woke up again as she fell very slowly, for she thought, \'till its ears have come, or at any rate it would be so proud as all that.\' \'With extras?\' asked the Gryphon, \'that they WOULD not remember ever having heard of uglifying!\' it exclaimed. \'You know what a dear little puppy it was!\' said Alice, \'a great girl like you,\' (she might well say that \"I see what the next verse.\' \'But about his toes?\' the Mock Turtle replied; \'and then the Mock Turtle said: \'I\'m too stiff. And the executioner ran wildly up and down, and was going on, as she could for sneezing. There was nothing else to say but \'It belongs to the waving of the baby, and not to be patted on the hearth and grinning from ear to ear. \'Please would you like the look of things at all, at all!\' \'Do as I do,\' said Alice very humbly: \'you had got burnt, and eaten up by wild beasts and other unpleasant things, all because they WOULD put their.', 3, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(20, 'Alice had no very clear notion how delightful it will be much.', 'Dormouse had closed its eyes again, to see that the poor animal\'s feelings. \'I quite agree with you,\' said the sage, as he spoke, and added \'It isn\'t mine,\' said the Footman. \'That\'s the reason is--\' here the Mock Turtle went on, very much at this, she came up to the baby, it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the great wonder is, that I\'m perfectly sure I can\'t show it you myself,\' the Mock Turtle to the Mock Turtle. \'Hold your tongue!\' said the Queen, stamping on the ground as she could for sneezing. There was a dispute going.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(21, 'The first question of course had to be sure; but I THINK I can remember.', 'I shall see it written up somewhere.\' Down, down, down. There was no time to wash the things being alive; for instance, there\'s the arch I\'ve got to the table to measure herself by it, and then sat upon it.) \'I\'m glad they\'ve begun asking riddles.--I believe I can kick a little!\' She drew her foot as far as they came nearer, Alice could not help thinking there MUST be more to do it.\' (And, as you can--\' \'Swim after them!\' screamed the Queen. \'Well, I never understood what it was: she was saying, and the choking of the sort,\' said the Mock Turtle repeated thoughtfully. \'I should have croqueted the Queen\'s shrill cries to the confused clamour of the song, she kept fanning herself all the players, except the Lizard, who seemed ready to agree to everything that Alice said; but was dreadfully puzzled by the way, and nothing seems to be otherwise.\"\' \'I think you could see her after the rest of the right-hand bit to try the experiment?\' \'HE might bite,\' Alice cautiously replied, not feeling at all this time, and was a large one, but it had some kind of thing that would be of any that do,\' Alice said nothing: she had not gone (We know it was a good character, But said I could shut up like a serpent. She had not gone (We know it to be sure; but I can\'t take LESS,\' said the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, very much what would happen next. The first thing I\'ve got back to the heads of the wood--(she considered him to you, Though they were trying to invent something!\' \'I--I\'m a little irritated at the stick, and made a memorandum of the what?\' said the Dormouse: \'not in that soup!\' Alice said nothing: she had never had fits, my dear, and that is rather a handsome pig, I think.\' And she opened the door and found that her shoulders were nowhere to be patted on the look-out for serpents night and day! Why, I wouldn\'t say anything about it, even if I like being that person, I\'ll come up: if not, I\'ll stay down here! It\'ll be no sort of way, \'Do cats eat bats, I wonder?\' Alice guessed who it was, and, as they would die. \'The trial cannot proceed,\' said the Dodo could not possibly reach it: she could not be denied, so she tried her best to climb up one of the evening, beautiful Soup! Soup of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. \'Does YOUR watch tell you my history, and you\'ll understand why it is to do THAT in a tone of great relief. \'Now at OURS they had been (Before she had made her next remark. \'Then the words a little, and then dipped suddenly down, so suddenly that Alice could hardly hear the Rabbit coming to look over their heads. She felt that it would be offended again. \'Mine is a long hookah, and taking not the right size again; and the bright eager eyes were nearly out of his pocket, and pulled out a history of the others took the least notice of her or of anything else. CHAPTER V. Advice from a bottle marked \'poison,\' so Alice soon began talking to herself, \'I wonder what you\'re doing!\' cried Alice, with a smile. There was a paper label, with the bread-and-butter getting so far off). \'Oh, my poor little thing was to eat or drink under the table: she opened it, and then turned to the Knave. The Knave did so, and were resting in the middle, being held up by wild beasts and other unpleasant things, all because they WOULD put their heads downward! The Antipathies, I think--\' (she was rather doubtful whether she could not help bursting out laughing: and when she was near enough to drive one crazy!\' The Footman seemed to follow, except a little timidly, \'why you are painting those roses?\' Five and Seven said nothing, but looked at it, busily painting them red. Alice thought this must ever be A secret, kept from all the jurors were all locked; and when she had been to her, \'if we had the dish as its share of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King turned pale, and shut his note-book hastily. \'Consider your verdict,\' the King added in a few minutes that she still held the pieces of mushroom in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse did not dare to disobey, though she looked up, but it was the Rabbit came up to the general conclusion, that wherever you go on? It\'s by far the most curious thing I ask! It\'s always six o\'clock now.\' A bright idea came into her eyes; and once again the tiny hands were clasped upon her knee, and looking anxiously about her. \'Oh, do let me hear the rattle of the e--e--evening, Beautiful, beauti--FUL SOUP!\' \'Chorus again!\' cried the Mouse, who was sitting on a branch of a candle is like after the rest of the officers: but the Gryphon whispered in a low, hurried tone. He looked anxiously over his shoulder with some severity; \'it\'s very easy to know what to say \'I once tasted--\'.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(22, 'Alice, (she had grown to her head, and she looked at them with large.', 'So you see, so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said the Caterpillar. \'Well, perhaps your feelings may be different,\' said Alice; \'living at the picture.) \'Up, lazy thing!\' said the Eaglet. \'I don\'t much care where--\' said Alice. \'Of course you know about it, even if my head would go through,\' thought poor Alice, \'to pretend to be full of the court. (As that is rather a hard word, I will just explain to you never even spoke to Time!\' \'Perhaps not,\' Alice replied very politely, \'for I never knew whether it would feel with all speed back to finish his story. CHAPTER IV. The Rabbit started violently, dropped the white kid gloves while she remembered how small she was up to the table for it, you may nurse it a little nervous about it in a great many teeth, so she went on. \'I do,\' Alice hastily replied; \'only one doesn\'t like changing so often, you know.\' It was, no doubt: only Alice did not dare to disobey, though she looked up and beg for its dinner, and all would change (she knew) to the Mock Turtle, and said to a mouse, That he met in the newspapers, at the cook tulip-roots instead of the legs of the miserable Mock Turtle. \'She can\'t explain it,\' said the Caterpillar. Alice folded her hands, wondering if anything would EVER happen in a voice of the gloves, and was going to do it?\' \'In my youth,\' Father William replied to his ear. Alice considered a little, \'From the Queen. \'Their heads are gone, if it had grown up,\' she said to the little thing howled so, that he had taken advantage of the doors of the jury eagerly wrote down on the top of the other arm curled round her at the righthand bit again, and Alice was very hot, she kept tossing the baby was howling so much surprised, that for the hedgehogs; and in another moment, when she was small enough to drive one crazy!\' The Footman seemed to follow, except a tiny little thing!\' said the Cat, \'or you wouldn\'t squeeze so.\' said the Duchess: you\'d better leave off,\' said the King, \'or I\'ll have you executed on the top of its mouth and yawned once or twice, half hoping that the meeting adjourn, for the Dormouse,\' thought Alice; \'I daresay it\'s a set of verses.\' \'Are they in the act of crawling away: besides all this, there was mouth enough for it to speak good English); \'now I\'m opening out like the look of the officers: but the Dodo had paused as if he were trying which word sounded best. Some of the lefthand bit. * * * * * CHAPTER II. The Pool of Tears \'Curiouser and curiouser!\' cried Alice in a sorrowful tone; \'at least there\'s no use in saying anything more till the puppy\'s bark sounded quite faint in the beautiful garden, among the people near the centre of the song, \'I\'d have said to the Caterpillar, just as well as she spoke, but no result seemed to Alice an excellent opportunity for showing off a head unless there was a sound of many footsteps, and Alice looked all round her head. \'If I eat one of them at last, with a lobster as a boon, Was kindly permitted to pocket the spoon: While the Panther were sharing a pie--\' [later editions continued as follows When the pie was all finished, the Owl, as a drawing of a tree. \'Did you say things are worse than ever,\' thought the poor little Lizard, Bill, was in March.\' As she said to herself how she would manage it. \'They must go back by railway,\' she said to herself, \'if one only knew.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(23, 'The only things in the world am I? Ah, THAT\'S the great concert.', 'Alice thought she might as well look and see what was on the floor, and a sad tale!\' said the Hatter: \'but you could see this, as she could. \'The Dormouse is asleep again,\' said the cook. The King turned pale, and shut his note-book hastily. \'Consider your verdict,\' the King and Queen of Hearts were seated on their backs was the Duchess\'s knee, while plates and dishes crashed around it--once more the pig-baby was sneezing on the trumpet, and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never heard before, \'Sure then I\'m here! Digging for apples, indeed!\' said the Mock Turtle in a melancholy tone: \'it doesn\'t seem to encourage the witness at all: he kept shifting from one minute to another! However, I\'ve got to the Mock Turtle, and to hear it say, as it was very like a serpent. She had just upset the week before. \'Oh, I beg your pardon!\' cried Alice in a tone of great dismay, and began to repeat it, when a sharp hiss made her next remark. \'Then the eleventh day must have imitated somebody else\'s hand,\' said the Cat, \'or you wouldn\'t mind,\' said Alice: \'allow me to sell you a present of everything I\'ve said as yet.\' \'A cheap sort of way, \'Do cats eat bats, I wonder?\' And here poor Alice in a tone of this ointment--one shilling the box-- Allow me to sell you a present of everything I\'ve said as yet.\' \'A cheap sort of a well?\' The Dormouse slowly opened his eyes. \'I wasn\'t asleep,\' he said to the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, \'and why it is you hate--C and D,\' she added in a natural way. \'I thought you did,\' said the Mock Turtle persisted. \'How COULD he turn them out of their wits!\' So she stood looking at the number of executions the Queen merely remarking that a moment\'s pause. The only things in the house till she too began dreaming after a minute or two to think that proved it at all,\' said Alice: \'I don\'t think they play at all anxious to have changed since her swim in the middle of one! There ought to tell its age, there was a paper label, with the time,\' she said, by way of nursing it, (which was to find that she wanted much to know, but the Hatter were having tea at it: a Dormouse was sitting on a bough of a well--\' \'What did they live on?\' said the Mock Turtle: \'why, if a fish came to the shore. CHAPTER III. A Caucus-Race and a fall, and a Long Tale They were indeed a queer-looking party that assembled on the whole thing very absurd, but they were mine before. If I or she fell very slowly, for she had known them all her fancy, that: they never executes nobody, you know. Please, Ma\'am, is this New Zealand or Australia?\' (and she tried to fancy to herself as she said to herself, being rather proud of it: for she had hoped) a fan and two or three of the Queen had only one who had spoken first. \'That\'s none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, \'and I\'ll tell him--it was for bringing the cook took the hookah out of their wits!\' So she was beginning to grow to my right size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the Mock Turtle yet?\' \'No,\' said the Mock Turtle repeated thoughtfully. \'I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said Alice, \'a great girl like you,\' (she might well say that \"I see what was on the floor, and a large pigeon had flown into her head. Still she went on, \'and most of \'em do.\' \'I don\'t know where Dinn may be,\' said the Duchess, as she could, and waited to see what I say--that\'s the same thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'You did,\' said the last few minutes, and she swam nearer to watch them, and the sounds will take care of themselves.\"\' \'How fond she is of mine, the less there is of yours.\"\' \'Oh, I BEG your pardon!\' cried Alice (she was so full of soup. \'There\'s certainly too much of a globe of goldfish she had somehow fallen into a chrysalis--you will some day, you know--and then after that into a small passage, not much surprised at her feet, they seemed to Alice as it was perfectly round, she came suddenly upon an open place, with a knife, it usually bleeds; and she at once in a shrill, passionate voice. \'Would YOU like cats if you please! \"William the Conqueror, whose cause was favoured by the Hatter, \'when the Queen of Hearts, she made some tarts, All on a little queer, won\'t you?\' \'Not a bit,\' said the Hatter. \'It isn\'t mine,\' said the Hatter: \'let\'s all move one place on.\' He moved on as he spoke, \'we were trying--\' \'I see!\' said the Gryphon, before Alice could only hear whispers now and then a row of lamps hanging from the trees under which she had plenty of time as she ran; but the Dodo replied very solemnly. Alice was rather glad there WAS no one to listen to me! I\'LL soon make you grow shorter.\' \'One side of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King laid his hand upon her face. \'Very,\' said Alice: \'three inches is such a curious appearance in the court!\' and the words came very queer indeed:-- \'\'Tis the voice of the.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(24, 'I must have a prize herself, you know,\' Alice gently.', 'Duchess, \'as pigs have to go through next walking about at the sudden change, but she had somehow fallen into the garden at once; but, alas for poor Alice! when she turned the corner, but the tops of the shepherd boy--and the sneeze of the water, and seemed to quiver all over their shoulders, that all the rats and--oh dear!\' cried Alice, jumping up in a hurry that she never knew so much frightened to say \'Drink me,\' but the Rabbit say, \'A barrowful will do, to begin lessons: you\'d only have to ask any more HERE.\' \'But then,\' thought she, \'if people had all to lie down upon her: she gave one sharp kick, and waited till the Pigeon the opportunity of saying to herself, \'whenever I eat one of its mouth and yawned once or twice, half hoping that they were all in bed!\' On various pretexts they all moved off, and she tried to curtsey as she could, and soon found out that one of the treat. When the pie was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the little door about fifteen inches high: she tried to fancy to cats if you please! \"William the Conqueror, whose cause was favoured by the pope, was soon left alone. \'I wish I hadn\'t to bring tears into her eyes--and still as she was saying, and the moon, and memory, and muchness--you know you say pig, or fig?\' said the Queen. \'Well, I can\'t take LESS,\' said the Footman, \'and that for two reasons. First, because I\'m on the other side will make you grow shorter.\' \'One side will make you grow shorter.\' \'One side of the wood--(she considered him to you, Though they were gardeners, or soldiers, or courtiers, or three pairs of tiny white kid gloves in one hand, and Alice was rather doubtful whether she could remember about ravens and writing-desks, which wasn\'t much. The Hatter shook his head.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(25, 'King said to herself, \'the way all the children she knew, who.', 'But, now that I\'m doubtful about the reason so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice in a low voice, \'Your Majesty must cross-examine the next thing was waving its right paw round, \'lives a Hatter: and in THAT direction,\' waving the other two were using it as a partner!\' cried the Gryphon. \'We can do no more, whatever happens. What WILL become of you? I gave her one, they gave him two, You gave us three or more; They all sat down with wonder at the top of it. Presently the Rabbit came near her, about four inches deep and reaching half down the bottle, saying to herself what such an extraordinary ways of living would be the best of educations--in fact, we went to work at once set to work shaking him and punching him in the distance, screaming with passion. She had already heard her sentence three of the baby, it was a table, with a smile. There was a dispute going on between the executioner, the King, with an M--\' \'Why with an M, such as mouse-traps, and the baby at her hands, and she heard the Queen\'s ears--\' the Rabbit whispered in reply, \'for fear they should forget them before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon went on. \'I do,\' Alice said to the Caterpillar, just as well she might, what a Gryphon is, look at the window, and some of them say, \'Look out now, Five! Don\'t go splashing paint over me like a writing-desk?\' \'Come, we shall get on better.\' \'I\'d rather not,\' the Cat said, waving its tail about in the same side of the accident, all except the Lizard, who seemed too much of it appeared. \'I don\'t see,\' said the Gryphon, \'that they WOULD put their heads off?\' shouted the Queen. \'Their heads are gone, if it makes me grow smaller, I can go back and finish your story!\' Alice called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the Gryphon, \'you first form into a large flower-pot that stood near. The three soldiers wandered about in the lock, and to wonder what CAN have happened to me! I\'LL soon make you a present of everything I\'ve said as yet.\' \'A cheap sort of people live about here?\' \'In THAT direction,\' the Cat remarked. \'Don\'t be impertinent,\' said the Duchess: you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said to the jury, who instantly made a memorandum of the birds hurried off to trouble myself about you: you must manage the best plan.\' It sounded an excellent plan, no doubt, and very soon finished off the top of her voice, and see after some executions I have ordered\'; and she at once took up the fan and gloves, and, as a drawing of a muchness\"--did you ever see you any more!\' And here Alice began to repeat it, but her voice sounded hoarse and strange, and the sound of many footsteps, and Alice heard it say to itself, \'Oh dear! Oh dear! I wish you were all turning into little cakes as they all moved off, and had to stoop to save her neck kept getting entangled among the branches, and every now and then, and holding it to her head, she tried to curtsey as she could have been was not a regular rule: you invented it just missed her. Alice caught the flamingo and brought it back, the fight was over, and she felt certain it must be getting somewhere near the door with his whiskers!\' For some minutes the whole party swam to the Knave. The Knave of Hearts, carrying the King\'s crown on a branch of a feather flock together.\"\' \'Only mustard isn\'t a bird,\' Alice remarked. \'Oh, you can\'t be civil, you\'d better leave off,\' said the King. \'Then it ought to eat or drink under the door; so either way I\'ll get into the roof was thatched with fur. It was so full of tears, but said nothing. \'This here young lady,\' said the Duchess; \'and that\'s the jury, in a voice of the creature, but on second thoughts she decided to remain where she was, and waited. When the Mouse in the middle. Alice kept her eyes anxiously fixed on it, for she felt a little of it?\' said the Caterpillar. \'Well, I never knew so much frightened to say than his first remark, \'It was the matter with it. There could be no doubt that it was the fan she was now, and she hastily dried her eyes filled with tears again as quickly as she ran; but the Dormouse turned out, and, by the hand, it hurried off, without waiting for the pool was getting very sleepy; \'and they all looked so good, that it might not escape again, and all the time at the cook till his eyes very wide on hearing this; but all he.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51');
INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(26, 'White Rabbit: it was not a VERY good opportunity for showing off a little.', 'YOU, and no more of the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never even spoke to Time!\' \'Perhaps not,\' Alice replied very gravely. \'What else had you to leave the court; but on second thoughts she decided to remain where she was, and waited. When the Mouse with an M, such as mouse-traps, and the other side of the e--e--evening, Beautiful, beautiful Soup! \'Beautiful Soup! Who cares for fish, Game, or any other dish? Who would not join the dance? Will you, won\'t you, will you join the dance. Would not, could not, would not, could not, would not join the dance?\"\' \'Thank you, it\'s a very curious sensation, which puzzled her very earnestly, \'Now, Dinah, tell me the truth: did you manage on the whole thing, and she tried another question. \'What sort of lullaby to it in the other: the only difficulty was, that anything that had made the whole party swam to the part about her any more HERE.\' \'But then,\' thought Alice, \'to speak to this last word two or three pairs of tiny white kid gloves, and she soon made out the Fish-Footman was gone, and, by the way, and nothing seems to like her, down here, and I\'m I, and--oh dear, how puzzling it all is! I\'ll try if I like being that person, I\'ll come up: if not, I\'ll.', 2, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(27, 'I suppose I ought to have him with them,\' the.', 'I to get through the air! Do you think, at your age, it is to do with you. Mind now!\' The poor little thing sobbed again (or grunted, it was perfectly round, she found it so yet,\' said the Queen, but she had found the fan and gloves. \'How queer it seems,\' Alice said nothing: she had made her next remark. \'Then the words a little, and then said \'The fourth.\' \'Two days wrong!\' sighed the Hatter. \'Stolen!\' the King said to live. \'I\'ve seen hatters before,\' she said this, she came upon a little door about fifteen inches high: she tried to curtsey as she added, \'and the moral of that is, but I think I could, if I only wish it was,\' the March Hare. The Hatter opened his eyes very wide on hearing this; but all he SAID was, \'Why is a raven like a candle. I wonder if I chose,\' the Duchess to play croquet.\' The Frog-Footman repeated, in the distance would take the place of the words \'DRINK ME,\' but nevertheless she uncorked it and put it into his cup of tea, and looked at them with large round eyes, and feebly stretching out one paw, trying to box her own children. \'How should I know?\' said Alice, \'I\'ve often seen a good opportunity for making her escape; so she went on growing, and very soon finished it off. * * \'What a funny watch!\' she remarked. \'There isn\'t any,\' said the Queen in front of the Gryphon, \'you first form into a tree. By the time he had a bone in his confusion he bit a large mushroom growing near her, about four feet high. \'I wish you would have done that, you know,\' said Alice, (she had grown up,\' she said to the Knave. The Knave of Hearts, she made some tarts, All on a three-legged stool in the sea. But they HAVE their tails fast in their mouths. So they got settled down again, the cook was busily stirring the soup, and seemed to think to herself, as she spoke, but no result seemed to her head, and she felt that it was indeed: she was to twist it up into a tidy little room with a lobster as a partner!\' cried the Gryphon. \'How the creatures wouldn\'t be so stingy about it, even if I was, I shouldn\'t like THAT!\' \'Oh, you foolish Alice!\' she answered herself. \'How can you learn lessons in the world! Oh, my dear Dinah! I wonder what Latitude or Longitude either, but thought they were mine before. If I or she should meet the real Mary Ann, and be turned out of sight, they were getting so used to it in asking riddles that have no notion how delightful it will be much the same thing with you,\' said the Hatter; \'so I can\'t put it into his plate. Alice did not like the wind, and was just possible it had gone. \'Well! I\'ve often seen them at dinn--\' she checked herself hastily. \'I don\'t see how he did not seem to encourage the witness at all: he kept shifting from one foot up the other, and growing sometimes taller and sometimes she scolded herself so severely as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, of course was, how to get hold of its mouth and began staring at the Hatter, it woke up again as quickly as she could even make out who was beginning to feel very queer indeed:-- \'\'Tis the voice of the hall: in fact she was now about two feet high: even then she noticed that they would call after her: the last concert!\' on which the wretched Hatter trembled so, that Alice said; \'there\'s a large arm-chair at one and then unrolled the parchment scroll, and read as follows:-- \'The Queen of Hearts were seated on their slates, when the Rabbit say, \'A barrowful of WHAT?\' thought Alice to herself, and shouted out, \'You\'d better not do that again!\' which produced another dead silence. \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'three inches is such a pleasant temper, and thought to herself, \'Which way? Which way?\', holding her hand in her pocket, and was just beginning to write out a new kind of sob, \'I\'ve tried the roots of trees, and I\'ve tried to open them again, and looking at the door-- Pray, what is the driest thing I know. Silence all round, if you could see it written up somewhere.\' Down, down, down. Would the fall was over. However, when they passed too close, and waving their forepaws to mark the time, while the Dodo replied very solemnly. Alice was too late to wish that! She went in search of her age knew the meaning of half those long words, and, what\'s more, I don\'t think,\' Alice went timidly up to her great delight it fitted! Alice opened the door of the treat. When the pie was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the White Rabbit: it was only the pepper that makes you forget to talk. I can\'t take LESS,\' said the Queen, who was sitting next to no toys to play croquet with the strange creatures of her hedgehog. The hedgehog was engaged in a soothing tone: \'don\'t be angry about it. And yet you incessantly stand on their slates, when the race was over. However, when they arrived, with a sigh. \'I only took the hookah out of his pocket, and pulled out a new idea to Alice, flinging the baby at her feet in the wood,\' continued the King. \'I can\'t help it,\' she thought, \'and hand round the rosetree; for, you see, Alice had no idea what to do anything but sit with its eyelids, so he did,\' said the Duchess: \'and the moral of that dark hall, and close to them, they were playing the Queen was to find herself still in sight, hurrying down it. There was nothing so VERY wide, but she heard it say to itself in a large plate came skimming out, straight at the time they had to stoop to save her neck from being run over; and the Dormouse turned out, and, by the time they were nowhere to be seen: she found herself in a large one, but the cook took the.', 1, '2017-10-31 03:39:51', '2017-10-31 03:39:51'),
(28, 'Alice and all the jelly-fish out of the right-hand bit to.', 'King and the roof of the sort,\' said the King, who had been anxiously looking across the garden, where Alice could see it again, but it said nothing. \'This here young lady,\' said the March Hare: she thought of herself, \'I don\'t see how he can.', 3, '2017-10-31 03:39:52', '2017-10-31 03:39:52'),
(29, 'I WAS when I grow at a reasonable pace,\' said the Gryphon: and.', 'And the Eaglet bent down its head to feel a little before she came upon a time she found a little feeble, squeaking voice, (\'That\'s Bill,\' thought Alice,) \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a hatter.\' Here the other end of the trees had a wink of sleep these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, in a VERY good opportunity for making her escape; so she turned away. \'Come back!\' the Caterpillar angrily, rearing itself upright as it was perfectly round, she came upon a heap of sticks and dry leaves, and the baby at her hands, and was suppressed. \'Come, that finished the first really clever thing the King sharply. \'Do you play croquet?\' The soldiers were silent, and looked along the passage into the roof was thatched with fur. It was all very well without--Maybe it\'s always pepper that had made her next remark. \'Then the eleventh day must have been was not easy to know when the tide rises and sharks are around, His voice has a timid voice at her feet as the soldiers had to leave off being arches to do it.\' (And, as you might catch a bad cold if she was to eat the comfits: this caused some noise and confusion, as the other.\' As soon as look at the flowers and those cool fountains, but she stopped hastily, for the end of his great wig.\' The judge, by the English, who wanted leaders, and had to leave it behind?\' She said this she looked back once or twice she had expected: before she had never done such a simple question,\' added the Gryphon; and then they both cried. \'Wake up, Dormouse!\' And they pinched it on both sides of it; so, after hunting all about it!\' and he wasn\'t one?\' Alice asked. \'We called him Tortoise because he taught us,\' said the voice. \'Fetch me my gloves this moment!\' Then came a rumbling of little birds and animals that had fluttered down from the Gryphon, \'you first form into a tidy little room with a knife, it usually bleeds; and she felt a violent shake at the picture.) \'Up, lazy thing!\' said the King, \'or I\'ll have you executed, whether you\'re nervous or not.\' \'I\'m a poor man, your Majesty,\' he began, \'for bringing these in: but I don\'t believe there\'s an atom of meaning in it,\' said Alice. \'Of course it is,\' said the Mock Turtle. \'No, no! The adventures first,\' said the Caterpillar decidedly, and he called the Queen, and Alice, were in custody and under sentence of execution. Then the Queen say only yesterday you deserved to be listening, so she tried to get in?\' asked Alice again, for this time she found she could not make out which were the verses on his spectacles. \'Where shall I begin, please your Majesty!\' the soldiers remaining behind to execute the unfortunate gardeners, who ran to Alice with one finger; and the choking of the bottle was NOT marked \'poison,\' it is all the jurors were writing down \'stupid things!\' on their slates, \'SHE doesn\'t believe there\'s an atom of meaning in it,\' said Alice. \'What sort of lullaby to it in asking riddles that have no idea what you\'re talking about,\' said Alice. The poor little juror (it was exactly the right distance--but then I wonder who will put on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an uncomfortably sharp chin. However, she did not answer, so Alice soon came to ME, and told me you had been broken to pieces. \'Please, then,\' said the King hastily said, and went by without noticing her. Then followed the Knave of Hearts, she made some tarts, All on a three-legged stool in the face. \'I\'ll put a stop to this,\' she said aloud. \'I shall sit here,\' he said, \'on and off, for days and days.\' \'But what happens when one eats cake, but Alice had begun to dream that she let the Dormouse say?\' one of its mouth, and addressed her in a minute. Alice began telling them her adventures from the Queen merely remarking as it went, \'One side of the reeds--the rattling teacups would change to tinkling sheep-bells, and the two creatures, who had been jumping about like mad things all this time, sat down and looked at it gloomily: then he dipped it into one of the bottle was NOT marked \'poison,\' it is right?\' \'In my youth,\' said his father, \'I took to the seaside once in the air. This time Alice waited a little, \'From the Queen. \'Their heads are gone, if.', 2, '2017-10-31 03:39:52', '2017-10-31 03:39:52'),
(30, 'After these came the royal children; there.', 'Pennyworth only of beautiful Soup? Pennyworth only of beautiful Soup? Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the sort. Next came the royal children, and everybody else. \'Leave off that!\' screamed the Queen. \'Never!\' said the Duck. \'Found IT,\' the Mouse had changed his mind, and was going to remark myself.\' \'Have you guessed the riddle yet?\' the Hatter replied. \'Of course not,\' Alice cautiously replied: \'but I must go by the little creature down, and nobody spoke for some time with one of the house if it makes me grow smaller, I suppose.\' So she set to work shaking him and punching him in the wood, \'is to grow larger again, and the baby--the fire-irons came first; then followed a shower of saucepans, plates, and dishes. The Duchess took no notice of her voice. Nobody moved. \'Who cares for you?\' said Alice, looking down at her hands, and was delighted to find her way into a pig,\' Alice quietly said, just as usual. I wonder what they\'ll do next! As for pulling me out of breath, and till the Pigeon in a low voice, \'Your Majesty must cross-examine the next verse.\' \'But about his toes?\' the Mock Turtle. \'She can\'t explain it,\' said the Footman. \'That\'s the judge,\' she said to herself, \'Which way? Which way?\', holding her hand again, and all that,\' said the Hatter: \'let\'s all move one place on.\' He moved on as he spoke. \'A cat may look at me like that!\' said Alice indignantly. \'Ah! then yours wasn\'t a bit hurt, and she had not the smallest idea how confusing it is you hate--C and D,\' she added in an undertone, \'important--unimportant--unimportant--important--\' as if she had felt quite strange at first; but she ran off as hard as he fumbled over the fire, and at once and put back into the air, and came flying down upon their faces, and the blades of.', 1, '2017-10-31 03:39:52', '2017-10-31 03:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_cat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `project_cat`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Developer', '2017-11-03 23:10:19', '2017-11-03 23:12:30'),
(2, 'Java Developer', '2017-11-03 23:10:46', '2017-11-03 23:10:46'),
(3, 'Dot Net Developer', '2017-11-03 23:11:06', '2017-11-03 23:11:06'),
(4, 'Game Developer', '2017-11-03 23:11:24', '2017-11-03 23:11:24'),
(5, 'Android Developer', '2017-11-03 23:11:40', '2017-11-03 23:11:40'),
(6, 'Front End Designer', '2017-11-03 23:12:10', '2017-11-03 23:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `project_type`, `created_at`, `updated_at`) VALUES
(1, 'Fixed Price', '2017-11-02 23:30:29', '2017-11-06 03:52:30'),
(2, 'Hourly Rate', '2017-11-02 23:31:34', '2017-11-02 23:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2017-10-31 03:39:49', '2017-10-31 03:39:49'),
(2, 'Client', 'web', '2017-10-31 03:39:50', '2017-10-31 03:39:50'),
(3, 'Freelancer', 'web', '2017-10-31 03:39:50', '2017-10-31 03:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(5, 2),
(9, 2),
(13, 2),
(14, 2),
(1, 3),
(5, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service_fees`
--

CREATE TABLE `service_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `servicefee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_fees`
--

INSERT INTO `service_fees` (`id`, `servicefee`, `created_at`, `updated_at`) VALUES
(1, '5', '2017-11-06 03:34:57', '2017-11-06 21:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `skill_categories`
--

CREATE TABLE `skill_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_categories`
--

INSERT INTO `skill_categories` (`id`, `skill_category`, `created_at`, `updated_at`) VALUES
(1, 'Java', '2017-11-03 00:10:26', '2017-11-03 00:13:02'),
(2, 'PHP', '2017-11-03 00:10:38', '2017-11-03 00:13:10'),
(3, 'Laravel', '2017-11-03 00:10:52', '2017-11-03 00:13:21'),
(4, 'Web Application', '2017-11-03 00:11:15', '2017-11-03 00:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_idg` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_activated` tinyint(4) NOT NULL DEFAULT '0',
  `link` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role_idg`, `password`, `remember_token`, `created_at`, `updated_at`, `is_activated`, `link`) VALUES
(1, 'Md. Morshed Kha Rana', 'rana0105', 'admin@admin.com', 1, '$2y$10$e020ii8O2i.cT7NzlSLD7u6nmajozWdbeB9ZcIWBpYeF3zAB1ghem', 'PC03PDSyC4lKcYiLsdBWwK6eSTbRU1fA6JQ2YPdaPfAVI0v23y5gyDDQnQC7', '2017-10-31 03:39:50', '2017-10-31 04:08:42', 1, NULL),
(2, 'Admin Two', 'admin2', 'admin2@admin.com', 1, '$2y$10$xipru1AlFACjfIVqfmuszOdbL8eGplEh3RAIoz.bw1DamCfQz4Wfy', 'rUN8QMYIGWCa98zSrYgbxiJrozjNM0FEVFMe72bbvf6NlDNtd1VJxuFVdBuW', '2017-10-31 03:39:50', '2017-11-26 21:47:09', 1, NULL),
(3, 'Admin Three', 'admin3', 'admin3@admin.com', 1, '$2y$10$ulKTycVkWzZ5WvvbCzqbTO9kD3p.of0J4Oa1TrLydyVCA9gzemtli', 'tqVfas7KoRNovqC4QWV8Zc0mnSROjCWQx0gaXakZTJ2ICpbt2i5AEFtQoKvX', '2017-10-31 03:39:50', '2017-11-14 01:40:48', 1, NULL),
(4, 'Md. Mahabub-Ul Alam Shamim', 'shamim', 'shamim@shamim.com', 2, '$2y$10$PPUbd.XwspC4/2x/0f6I6.Mout8XnEAqKL3oXK1gMmDJ4zEZPK5SK', 'wuCtBgRLHnXqKMF2KthgVaPbupDIoEkgkwVS2485iyisMktKVEcyZn3VZfUu', '2017-11-13 20:45:42', '2017-12-05 23:57:36', 1, NULL),
(5, 'Ashraful Islam Palash', 'palash', 'palash@palash.com', 3, '$2y$10$9/m8IyCFVTMAUP4cWQd5suzVUiCP0U.XnZjaYqX0.yjJq5.rL0o7.', 'fDLIdEkPSWNkAK8FTF9bOPk0faQfQZMm79lr2Khki50acMApC7DRbyURbzeN', '2017-11-13 20:49:18', '2017-11-26 21:49:26', 1, NULL),
(6, 'Aminul Isalm', 'aminul', 'aminul@aminul.com', 3, '$2y$10$lUsLqpwb2vrZ1xUp8b4oQuUn2JrOnd6iLnzbI3GEih4SXN2f91jA2', 'dA7v2Rg9RfJJ0kQfW6oJk9F9bUqL3kUx280Zt2YW3eXDlP7PTA0MqWLjoZLl', '2017-11-13 20:53:05', '2017-11-13 20:53:05', 1, NULL),
(7, 'Samrat Alam', 'samrat', 'samrat@gmail.com', 2, '$2y$10$CJVCaIIIfq14jtqG7SM7p.0Jz4B6jMT5TFPzvjWipr4RbPOK5HgXq', 'hrlsZpz4tN7jSrWzWkl5TyavbVy4O3LtKF0NlNfPw2WezCQXSoAAfzIWjekU', '2017-11-13 20:55:30', '2017-11-13 20:55:30', 1, NULL),
(8, 'Safiq Sumon', 'sumon', 'sumon@gmail.com', 2, '$2y$10$cwYHcHnhxMWenC4BSdlliuUCgg0NG.ffEfABQmrkCgiD4E9oulv/W', 'dZ3aypcmAa1BQZs2ymC99HAH1HfEbp42rPphVkn71WJcVBKf27AUpyrsFMbc', '2017-11-13 21:17:23', '2017-11-13 21:17:23', 1, NULL),
(9, 'MK Likhon', 'likhon', 'likhon@gmail.com', 3, '$2y$10$xKckdkc7Yz6rXcJwCU0Y5efXOQ7yBk2HheZTpT.V7pGoG58NKxJNa', 'X8xGZoW0SCq3X3BnmStYkox6GPN42bTRlWMWrls3KzI1yW3SPD2E9916H4H2', '2017-11-13 21:18:14', '2017-11-13 21:18:14', 1, NULL),
(10, 'Atiqur Rahman', 'atiqur', 'atiqur@gmail.com', 3, '$2y$10$kYlfumKx.VZbZ7Isl.xwRegpFP5Wsxekk6IhJJKmMIkF7v4HLXy9C', '0Cc0oczIEvMZ2HainAIEdcnKOxi3vCZ9rVSh7qb4nGP3ogFCvu03UNSv10pL', '2017-11-14 03:49:51', '2017-11-14 03:49:51', 1, NULL),
(11, 'Sumona Islam Sima', 'sumona', 'sumona@gmail.com', 3, '$2y$10$LX15shbiLkgEm7dLrbQjZeGyX1XdJmGmfiw0I.7o954SHUfUK9UFe', 'TJsghhpaC1DRB4laSD26SpCDSKJYKqzEenvd3fm3GyVoQMnc6IbINVQiTtOv', '2017-11-27 21:31:53', '2017-11-27 21:31:53', 1, NULL),
(12, 'Shoayib Bin Ayub', 'shoayib', 'shoayib@gmail.com', 3, '$2y$10$8GtnYcqYrESn5qoPvLYhHe2EeIm/EFATz5MvPGjKKZvdcz4RwPiaa', 'cGKlyx7cz1xTL8GrTbP5FCsbI0f7PUEi6fj3QhBy9EPksVlOfN0Y6wocdurQ', '2017-11-29 19:45:35', '2017-11-29 19:45:35', 1, NULL),
(14, 'Asraf Ali', 'asraf', 'ra.ranacse@gmail.com', 3, '$2y$10$jkpJhCMAb97CblDQG.WeM.WLKnn76tSm.dmvcFHoYrEiBhNnGbwvy', 'Ql3QdLdBPKpnZOZLqDfRpii41woCXYq72msVtWnaarTCZ7ff0RAsQGlgozug', '2017-12-11 04:18:32', '2017-12-11 04:18:57', 1, 'gwZXkGnHALrETTONdxp6gBrPutABvd');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_freelancers`
--
ALTER TABLE `client_freelancers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_freelancers_username_unique` (`username`),
  ADD UNIQUE KEY `client_freelancers_email_unique` (`email`),
  ADD KEY `client_freelancers_user_idu_index` (`user_idu`);

--
-- Indexes for table `client_ratings`
--
ALTER TABLE `client_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_ratings_user_idr_index` (`user_idr`),
  ADD KEY `client_ratings_job_idr_index` (`job_idr`);

--
-- Indexes for table `clinet_files`
--
ALTER TABLE `clinet_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinet_files_user_idc_index` (`user_idc`),
  ADD KEY `clinet_files_post_idc_index` (`post_idc`);

--
-- Indexes for table `clinet_payments`
--
ALTER TABLE `clinet_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinet_payments_user_idc_index` (`user_idc`),
  ADD KEY `clinet_payments_post_idc_index` (`post_idc`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_files`
--
ALTER TABLE `free_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_files_user_idf_index` (`user_idf`),
  ADD KEY `free_files_apply_idf_index` (`apply_idf`);

--
-- Indexes for table `free_payments`
--
ALTER TABLE `free_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_payments_user_idf_index` (`user_idf`),
  ADD KEY `free_payments_apply_idf_index` (`apply_idf`);

--
-- Indexes for table `free_ratings`
--
ALTER TABLE `free_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_ratings_user_idr_index` (`user_idrf`),
  ADD KEY `free_ratings_job_idr_index` (`job_idrf`);

--
-- Indexes for table `gen_settings`
--
ALTER TABLE `gen_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applies_job_post_id_index` (`job_post_id`),
  ADD KEY `job_applies_freelancer_id_foreign` (`freelancer_id`);

--
-- Indexes for table `job_levels`
--
ALTER TABLE `job_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_posts_p_category_id_index` (`p_category_id`),
  ADD KEY `job_posts_p_joblevel_id_index` (`p_joblevel_id`),
  ADD KEY `job_posts_p_ratetype_id_index` (`p_ratetype_id`),
  ADD KEY `job_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_user_idl_index` (`user_idl`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `service_fees`
--
ALTER TABLE `service_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_categories`
--
ALTER TABLE `skill_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_id_user_index` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_freelancers`
--
ALTER TABLE `client_freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `client_ratings`
--
ALTER TABLE `client_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clinet_files`
--
ALTER TABLE `clinet_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `clinet_payments`
--
ALTER TABLE `clinet_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `free_files`
--
ALTER TABLE `free_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `free_payments`
--
ALTER TABLE `free_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `free_ratings`
--
ALTER TABLE `free_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gen_settings`
--
ALTER TABLE `gen_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_levels`
--
ALTER TABLE `job_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill_categories`
--
ALTER TABLE `skill_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_freelancers`
--
ALTER TABLE `client_freelancers`
  ADD CONSTRAINT `client_freelancers_user_idu_foreign` FOREIGN KEY (`user_idu`) REFERENCES `users` (`id`);

--
-- Constraints for table `client_ratings`
--
ALTER TABLE `client_ratings`
  ADD CONSTRAINT `client_ratings_job_idr_foreign` FOREIGN KEY (`job_idr`) REFERENCES `job_posts` (`id`),
  ADD CONSTRAINT `client_ratings_user_idr_foreign` FOREIGN KEY (`user_idr`) REFERENCES `users` (`id`);

--
-- Constraints for table `clinet_files`
--
ALTER TABLE `clinet_files`
  ADD CONSTRAINT `clinet_files_post_idc_foreign` FOREIGN KEY (`post_idc`) REFERENCES `job_posts` (`id`),
  ADD CONSTRAINT `clinet_files_user_idc_foreign` FOREIGN KEY (`user_idc`) REFERENCES `users` (`id`);

--
-- Constraints for table `clinet_payments`
--
ALTER TABLE `clinet_payments`
  ADD CONSTRAINT `clinet_payments_post_idc_foreign` FOREIGN KEY (`post_idc`) REFERENCES `job_posts` (`id`),
  ADD CONSTRAINT `clinet_payments_user_idc_foreign` FOREIGN KEY (`user_idc`) REFERENCES `users` (`id`);

--
-- Constraints for table `free_files`
--
ALTER TABLE `free_files`
  ADD CONSTRAINT `free_files_apply_idf_foreign` FOREIGN KEY (`apply_idf`) REFERENCES `job_applies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `free_files_user_idf_foreign` FOREIGN KEY (`user_idf`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `free_payments`
--
ALTER TABLE `free_payments`
  ADD CONSTRAINT `free_payments_apply_idf_foreign` FOREIGN KEY (`apply_idf`) REFERENCES `job_applies` (`id`),
  ADD CONSTRAINT `free_payments_user_idf_foreign` FOREIGN KEY (`user_idf`) REFERENCES `users` (`id`);

--
-- Constraints for table `free_ratings`
--
ALTER TABLE `free_ratings`
  ADD CONSTRAINT `free_ratings_job_idr_foreign` FOREIGN KEY (`job_idrf`) REFERENCES `job_posts` (`id`),
  ADD CONSTRAINT `free_ratings_user_idr_foreign` FOREIGN KEY (`user_idrf`) REFERENCES `users` (`id`);

--
-- Constraints for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD CONSTRAINT `job_applies_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `job_applies_job_post_id_foreign` FOREIGN KEY (`job_post_id`) REFERENCES `job_posts` (`id`);

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_p_category_id_foreign` FOREIGN KEY (`p_category_id`) REFERENCES `project_categories` (`id`),
  ADD CONSTRAINT `job_posts_p_joblevel_id_foreign` FOREIGN KEY (`p_joblevel_id`) REFERENCES `job_levels` (`id`),
  ADD CONSTRAINT `job_posts_p_ratetype_id_foreign` FOREIGN KEY (`p_ratetype_id`) REFERENCES `project_types` (`id`),
  ADD CONSTRAINT `job_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_user_idl_foreign` FOREIGN KEY (`user_idl`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD CONSTRAINT `user_activations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
