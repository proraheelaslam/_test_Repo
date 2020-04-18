-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 01:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maria sharif', 'admin@gmail.com', '$2y$10$dVXaAt/ooz.IDTfB0470fetPrrJPUR1hUhVLIsfNWN4.hmOf9vsV.', 'iEzdaiUmYC84il6autq9lHYhP9GdADCuVYAuwuABOnr0uuBx6PoRbl25eeuy', '2019-11-27 19:00:00', '2019-11-28 07:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_he` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_gr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` smallint(6) NOT NULL DEFAULT 0,
  `is_popular` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `name_ru`, `name_he`, `name_gr`, `category_key`, `image`, `is_featured`, `is_popular`, `created_at`, `updated_at`) VALUES
(4, 0, 'Web', 'ss', 'ss', 'ss', 'ww', 'PQl7bP40BpMg.jpg', 1, 0, '2019-12-04 07:16:44', '2020-04-08 05:14:57'),
(5, 0, 'new cat', 'new cat', 'new cat', 'new cat', 'new-cat', NULL, 1, 0, '2019-12-05 12:04:52', '2020-04-08 01:22:05'),
(6, 5, 'name en', 'grade a rus', 'grade a heb', 'grade a gre', 'name-en', 'grPJ3fhKH49h.png', 0, 0, '2020-03-19 06:59:30', '2020-03-19 07:29:08'),
(7, 4, 'Front Cat', 'grade a rus', 'grade a heb', 'grade a gre', 'sara', 'qh4PaxW2x33y.png', 0, 0, '2020-03-19 08:04:27', '2020-04-08 02:32:12'),
(8, 5, 'sarah fhgh', 'grade a rus', 'grade a heb', 'grade a gre', 'sarah-fhgh', 'DIZahRMhAjyl.png', 0, 1, '2020-03-19 08:06:00', '2020-03-19 08:06:00'),
(9, 5, 'Sarah Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'sarah-tester', 'hkujnh8pSimN.png', 0, 0, '2020-03-19 08:09:21', '2020-03-19 08:09:21'),
(10, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(21, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(22, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(23, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(24, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(25, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(26, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(27, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(28, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(29, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(30, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49'),
(31, 4, 'gdfgfdgfdgh Tester', 'grade a rus', 'grade a heb', 'grade a gre', 'gdfgfdgfdgh-tester', 'mASornkefp5X.png', 0, 1, '2020-03-19 08:18:45', '2020-04-08 01:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_iw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_el` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `name_ru`, `name_iw`, `name_el`, `class_key`, `class_code`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', 'class ru', 'class hr', 'class gr', 'class-1', 'class102', NULL, NULL, '2019-11-29 00:01:46', '2019-11-29 00:02:48'),
(2, 'Class2', 'Class2', 'Class2', 'Class2', 'class2', 'Class2', NULL, NULL, '2019-11-29 07:16:11', '2019-11-29 07:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_he` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_gr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_he` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_gr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_he` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_gr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description_ru` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_he` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_gr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords_ru` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords_he` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords_gr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `name`, `name_ru`, `name_he`, `name_gr`, `content`, `content_ru`, `content_he`, `content_gr`, `meta_title`, `meta_title_ru`, `meta_title_he`, `meta_title_gr`, `meta_description`, `meta_description_ru`, `meta_description_he`, `meta_description_gr`, `meta_keywords`, `meta_keywords_ru`, `meta_keywords_he`, `meta_keywords_gr`, `key`, `lang_key`, `created_at`, `updated_at`) VALUES
(1, 'About us', 'About us ru', 'About us he', 'About us gr', '<h4>Our values</h4>\r\n\r\n<p><strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. </strong></p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>', '<h4>Our values ru</h4>\r\n\r\n<p><strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. </strong></p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>', '<h4>Our values he</h4>\r\n\r\n<p><strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. </strong></p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>', '<h4>Our values gr</h4>\r\n\r\n<p><strong>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo. </strong></p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about_us', 'about-us', NULL, '2020-03-26 10:31:44', '2020-03-26 10:31:44'),
(6, 'Who we are', 'Who we are ru', 'Who we are he', 'Who we are gr', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>\r\n\r\n<p>&nbsp;</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>\r\n\r\n<p>&nbsp;</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>\r\n\r\n<p>&nbsp;</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</p>\r\n\r\n<p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia,consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.,Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, adipisci velit, sed quia non numquam eius modi tempora</p>\r\n\r\n<p>&nbsp;</p>', 'who we are', 'who we are ru', 'who we are he', 'who we are gr', 'who we are meta description', 'who we are meta description ru', 'who we are meta description he', 'who we are meta description gr', 'who we are meta keyword', 'who we are meta keyword ru', 'who we are meta keyword he', 'who we are meta keyword gr', 'who-we-are', NULL, '2020-04-09 08:00:37', '2020-04-09 08:01:48'),
(7, 'FAQ', 'FAQ RUSSIAN', 'FAQ Hebrew', 'FAQ GREEK', '<p>FAQ Content&nbsp;</p>', '<p>FAQ Content&nbsp;</p>', '<p>FAQ Content&nbsp;</p>', '<p>FAQ Content&nbsp;</p>', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', 'faq', NULL, '2020-04-11 04:16:27', '2020-04-11 04:16:27'),
(8, 'Contact', 'контакт', 'איש קשר', 'Επικοινωνία', '<p>Content</p>', '<p>Content</p>', '<p>Content</p>', '<p>Content</p>', 'contact-us', 'contact-us', 'צור קשר', 'contact-us', 'contact-us', 'contact-us', 'contact-us', 'contact-us', 'contact-us', 'contact-us', 'contact-us', 'επικοινωνήστε', 'contact', NULL, '2020-04-11 04:28:19', '2020-04-11 04:28:19'),
(2, 'Help', 'Help ru', 'Help he', 'Help gr', '<p>Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help ContentHelp Content&nbsp;Help Content&nbsp;Help Content</p>\r\n\r\n<p>Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help Content&nbsp;Help ContentHelp Content&nbsp;Help Content&nbsp;Help Content</p>', '<p>Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;Help Content ru&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;Help Content he&nbsp;</p>', '<p>Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;Help Content gr&nbsp;</p>', 'Help Meta Title', 'Help Meta Title ru', 'Help Meta Title he', 'Help Meta Title gr', 'Help meta description', 'Help meta description ru', 'Help meta description he', 'Help meta description gr', 'Help Meta Keyword', 'Help Meta Keyword ru', 'Help Meta Keyword he', 'Help Meta Keyword gr', 'help', NULL, '2020-04-09 06:10:26', '2020-04-09 06:10:26'),
(3, 'Privacy policy', 'Privacy policy RU', 'Privacy policy HEB', 'Privacy policy GREEK', '<p><span font-size:=\"\" open=\"\" style=\"color: rgb(126, 126, 126); font-family: \">English Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.</span></p>', '<p><span font-size:=\"\" open=\"\" style=\"color: rgb(126, 126, 126); font-family: \">rus perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</span></p>', '<p><span font-size:=\"\" open=\"\" style=\"color: rgb(126, 126, 126); font-family: \">HEB perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</span></p>', '<p><span font-size:=\"\" open=\"\" style=\"color: rgb(126, 126, 126); font-family: \">GRREK perspiciatis unde omnis iste natus error sit voluptatem accusantium laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis,et quasi architecto beatae vitae dicta sunt explicabo.&nbsp;</span></p>', 'privacy-policy', 'privacy-policy RUSSIAN', 'privacy-policy HEBREW', 'privacy-policy policy', 'privacy-policy EN', 'privacy-policy RUSSIAN', 'privacy-policy HEBREW', 'privacy-policy GREEK', 'privacy-policy EN', 'privacy-policy RUSSIAN', 'privacy-policy HEBREW', 'privacy-policy GREEK', 'privacy-policy', NULL, '2020-04-09 07:29:11', '2020-04-11 04:24:01'),
(4, 'Terms and Condition', 'terms and condition Ru', 'terms and condition HB', 'terms and condition Greek', '<p>Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;</p>', '<p>Rus&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;</p>', '<p>HEB&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;</p>', '<p>GREEK&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum Lorem ispum&nbsp;Lorem ispum&nbsp;Lorem ispum Lorem ispum Lorem ispum Lorem ispum v</p>', 'terms and condition EN', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms and condition', 'terms-and-condition', NULL, '2020-04-09 07:38:11', '2020-04-11 04:29:04'),
(5, 'Site Map', 'Карта сайта', 'מפת אתר', 'Χάρτης ιστοτόπου', '<p>Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;</p>', '<p>текст RunsionLorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum</p>\r\n<body id=\"cke_pastebin\" style=\"position: absolute; top: -10px; width: 1px; height: 180px; overflow: hidden; margin: 0px; padding: 0px; left: -1000px;\">\r\n<p><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 28px; white-space: pre-wrap; background-color: rgb(248, 249, 250);\">текст Runsion</span></p>\r\n\r\n<p>&nbsp;</p>\r\n</body>', '<p>HB&nbsp; ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;</p>', '<p>GREEK&nbsp; ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;</p>', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', 'site-map', NULL, '2020-04-09 07:45:28', '2020-04-11 05:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_gr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_he` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `name_gr`, `name_ru`, `name_he`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan', '', '', '', 'PK', NULL, NULL),
(2, 'Afghanistan', '', '', '', 'AF ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT 0,
  `sub_category_id` bigint(20) NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `grade_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `class_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_price` decimal(10,2) DEFAULT NULL,
  `course_includes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` smallint(6) NOT NULL DEFAULT 0,
  `course_start` date DEFAULT NULL,
  `course_expire` date DEFAULT NULL,
  `is_free` int(1) NOT NULL DEFAULT 0 COMMENT '0 for no 1 for yes',
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_skills` enum('beginner','intermediate','advanced','appropriate_for_all') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'beginner',
  `course_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `name`, `short_desc`, `course_key`, `category_id`, `student_id`, `sub_category_id`, `school_id`, `grade_id`, `class_id`, `image`, `course_code`, `course_price`, `course_includes`, `course_requirement`, `description`, `is_featured`, `course_start`, `course_expire`, `is_free`, `teacher_name`, `course_skills`, `course_tags`, `created_at`, `updated_at`) VALUES
(1, 0, 'Maths', 'short descccc', 'maths', 4, 0, 7, 1, 2, 1, NULL, 'Cs102', '100.00', 'it Includes', 'its Requirments', 'its Description', 1, '2020-03-28', NULL, 0, NULL, 'beginner', NULL, '2019-11-28 19:00:00', '2020-03-16 08:03:18'),
(2, 0, 'javascript', 'short descccc  ccc', 'science', 5, 18, 4, 1, 2, 1, NULL, 'Cs103', '345.00', 'it Includes cc', 'its Requirments xxx', 'its Description', 1, '2020-03-28', NULL, 0, NULL, 'beginner', NULL, '2019-11-28 19:00:00', '2020-04-08 06:13:56'),
(3, 0, 'English', 'short descccc', 'english', 5, 18, 8, 1, 2, 1, NULL, 'Cs104', '44.00', 'it Includes', 'its Requirments', 'its Description', 0, '2020-03-28', NULL, 0, NULL, 'beginner', NULL, '2019-11-28 19:00:00', '2020-04-08 06:09:03'),
(4, 0, 'History', 'short descccc', 'history', 5, 18, 9, 1, 2, 1, NULL, 'Cs105', '66.00', 'it Includes', 'its Requirments', 'its Description', 1, '2020-03-28', NULL, 0, 'Raheel', 'beginner', NULL, '2019-11-28 19:00:00', '2020-04-08 05:22:42'),
(22, 0, 'new Course Math', NULL, 'new_course_math', 5, 18, 8, 0, 0, 0, '44070.jpg', NULL, '120.00', NULL, NULL, 'its Description its Description its Description its Description its Description', 0, '2020-04-01', '2020-04-30', 0, 'Maria', 'advanced', NULL, '2020-04-01 00:12:38', '2020-04-01 06:38:29'),
(23, 0, 'new course math 2', NULL, 'new_course_math_2', 5, 18, 8, 0, 0, 0, '62316.jpg', NULL, '200.00', NULL, NULL, 'course description course description course description course descriptioncourse description', 0, '2020-04-02', '2020-04-30', 1, 'maria', 'intermediate', NULL, '2020-04-02 05:18:25', '2020-04-02 05:18:25'),
(24, 0, 'New Test Course', NULL, 'new_test_course', 5, 19, 6, 0, 0, 0, '53199.png', NULL, '22.00', NULL, NULL, 'Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description Lorem description vv', 0, '2020-04-06', '2018-07-01', 1, 'Raheel Teacher', 'intermediate', NULL, '2020-04-06 05:46:32', '2020-04-06 05:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_bookmarks`
--

CREATE TABLE `course_bookmarks` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_desc` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`id`, `course_id`, `content_title`, `content_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'ss', '2019-12-03 06:12:29', '2019-12-03 06:12:29'),
(2, 1, 'fff ss ddd', 'fffssss', '2019-12-03 06:18:19', '2019-12-03 07:59:50'),
(3, 4, 'sss', 'ssss', '2019-12-03 08:34:43', '2019-12-03 08:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `course_content_lectures`
--

CREATE TABLE `course_content_lectures` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `short_desc` text DEFAULT NULL,
  `course_content_id` int(11) NOT NULL DEFAULT 0,
  `file_type` set('youtube','file') NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_time` int(10) NOT NULL DEFAULT 0,
  `image_cover` varchar(255) DEFAULT NULL,
  `is_featured` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_content_lectures`
--

INSERT INTO `course_content_lectures` (`id`, `title`, `course_id`, `short_desc`, `course_content_id`, `file_type`, `file_name`, `file_time`, `image_cover`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'ss', 1, 'ddd', 1, '', 'Zq35qenuiSy8.png', 0, '', 0, '2019-12-03 12:05:42', '2019-12-03 12:05:42'),
(2, 'sdssd', 1, 'dddd', 1, '', '4d5lW7gEoKIp.png', 0, '', 1, '2019-12-03 12:07:20', '2020-04-08 11:15:03'),
(5, 'course name 2', 13, NULL, 0, 'file', '313662file_example_AVI_640_800kB.avi', 0, '421225beautiful_the_outskirts_scenery_picture_2_165896.jpg', 0, '2020-03-30 09:36:43', '2020-03-30 09:36:43'),
(6, 'new course name', 13, NULL, 0, 'file', '894630720.mp4', 0, '626595beautiful-natural-scenery-river-southeast-260nw-1008530026.webp', 0, '2020-03-30 09:36:43', '2020-03-30 09:36:43'),
(7, 'course name 2', 14, NULL, 0, 'youtube', 'http://www.youtube.com/embed/C0DPdy98e4c', 0, '3588487-Layer-Salad-1-650.jpg', 0, '2020-03-30 14:18:05', '2020-03-30 14:18:05'),
(13, 'course name 2', 22, NULL, 0, 'file', '714297file_example_AVI_480_750kB.avi', 0, '381851-IMG_8977-M-940x627.jpg', 0, '2020-04-01 05:12:38', '2020-04-01 11:38:29'),
(12, 'course name 1', 22, NULL, 0, 'file', '799658720.mp4', 0, '381851-IMG_8977-M-940x627.jpg', 0, '2020-04-01 05:12:38', '2020-04-01 11:38:29'),
(16, 'course name 4', 23, NULL, 0, 'file', '205472720.mp4', 0, '186987beautiful_the_outskirts_scenery_picture_2_165896.jpg', 0, '2020-04-02 10:18:25', '2020-04-02 10:18:25'),
(15, 'course name 4', 24, NULL, 0, 'youtube', 'http://www.youtube.com/embed/C0DPdy98e4c', 30, '381851-IMG_8977-M-940x627.jpg', 1, '2020-04-01 11:22:56', '2020-04-01 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `course_features`
--

CREATE TABLE `course_features` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `feature_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_features`
--

INSERT INTO `course_features` (`id`, `course_id`, `feature_key`, `feature_value`, `created_at`, `updated_at`) VALUES
(13, 22, 'quizes', '1', '2020-04-01 06:24:43', '2020-04-01 06:38:30'),
(14, 22, 'languages', 'english', '2020-04-01 06:24:43', '2020-04-01 06:38:30'),
(15, 22, 'bbnn', '55', '2020-04-01 06:36:55', '2020-04-01 06:38:30'),
(16, 23, 'quizes', '1', '2020-04-02 05:18:25', '2020-04-02 05:18:25'),
(17, 24, 'f1', 'f valuoe', '2020-04-06 05:46:32', '2020-04-06 05:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `course_question`
--

CREATE TABLE `course_question` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_question`
--

INSERT INTO `course_question` (`id`, `course_id`, `student_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 22, 2, '1st question', '1st answer', '2020-04-03 14:03:37', '2020-04-03 14:03:37'),
(2, 22, 2, '2nd question', '2nd answer\r\n', '2020-04-03 14:03:58', '2020-04-03 14:03:58'),
(3, 22, 2, '3rd question', '3rd answer', '2020-04-03 09:38:44', '2020-04-03 09:38:44'),
(4, 22, 2, '4th question', '4th answer', '2020-04-03 09:39:36', '2020-04-03 09:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `instructor_id` bigint(20) DEFAULT NULL,
  `rating` decimal(10,2) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `review_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_reviews`
--

INSERT INTO `course_reviews` (`id`, `title`, `content`, `instructor_id`, `rating`, `student_id`, `course_id`, `review_time`, `created_at`, `updated_at`) VALUES
(1, '1st review', '1st Review Content detail', NULL, '5.00', 2, 19, '2020-03-30 19:00:00', '2020-03-30 19:00:00', '2020-03-30 19:00:00'),
(2, '2nd review', '2nd Review Content detail', NULL, '4.00', 3, 19, '2020-03-30 19:00:00', '2020-03-30 19:00:00', '2020-03-30 19:00:00'),
(3, '3rd review', '3rd Review Content detail', NULL, '4.00', 3, 14, '2020-03-30 19:00:00', '2020-03-30 19:00:00', '2020-03-30 19:00:00'),
(4, 'Title Review', 'Title Review', 18, '3.50', 3, 22, '2020-04-04 02:38:59', '2020-04-04 02:38:59', '2020-04-04 02:38:59'),
(13, 'ddd', 'asdadad', 19, '3.50', 20, 24, '2020-04-06 09:58:58', '2020-04-06 09:58:58', '2020-04-06 09:58:58'),
(14, 'New New Review', 'New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review New New Review', 18, '1.50', 19, 23, '2020-04-07 10:02:31', '2020-04-07 10:02:31', '2020-04-07 10:02:31'),
(15, 'Title Content review', 'Title Content review Title Content review Title Content review Title Content review Title Content review Title Content review Title Content review Title Content review Title Content review Title Content review', 19, '1.00', 3, 24, '2020-04-08 09:14:36', '2020-04-08 09:14:36', '2020-04-08 09:14:36'),
(17, 'ttsada asdad', 'asdsadsad asdad', 19, '1.00', 2, 24, '2020-04-08 09:20:11', '2020-04-08 09:20:11', '2020-04-08 09:20:11'),
(29, 'asdad', 'asdad', 18, '2.50', 19, 22, '2020-04-09 06:51:16', '2020-04-09 06:51:16', '2020-04-09 06:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `subject`, `key`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Admin Forget Password', 'Admin Forget Password', 'admin_forget_password', '<p>hi Admin click here {here}&nbsp;to update your password Regards</p>', '2019-08-21 19:00:00', '2020-03-23 01:19:45'),
(2, 'Forgot Password', 'Forgot Password', 'forget_password', '<p>Hi, It is inform to you that we have received forget password request from your account.</p>\r\n\r\n<p>Here is your link to reset your password</p>\r\n\r\n<p>{link}</p>\r\n\r\n<p>Regards: iLearning</p>', '2019-08-21 19:00:00', '2020-03-23 01:20:09'),
(3, 'Register User', 'Register User', 'user_register', '<p>Hi, Welcome to iLearning as {user_type}.</p>\r\n\r\n<p>To enjoy services Please click following link</p>\r\n\r\n<p>{link}</p>\r\n\r\n<p>Regards: iLearning</p>', '2019-08-21 19:00:00', '2020-03-23 01:20:09'),
(4, 'News letter', 'iLearning News Letter', 'news_letter', '<p>Hi\r\n\r\n<p>New letter balaa {message}</p>\r\n', '2019-08-21 19:00:00', '2020-03-23 01:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `question` varchar(250) NOT NULL,
  `greek_question` varchar(200) DEFAULT NULL,
  `russian_question` varchar(200) DEFAULT NULL,
  `hebrew_question` varchar(200) DEFAULT NULL,
  `answer` text NOT NULL,
  `greek_answer` text DEFAULT NULL,
  `russian_answer` text DEFAULT NULL,
  `hebrew_answer` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `type_id`, `question`, `greek_question`, `russian_question`, `hebrew_question`, `answer`, `greek_answer`, `russian_answer`, `hebrew_answer`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 5, 'Company Policies', 'Company Policies Greek', 'Company Policies RS', 'Company Policies HB', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', 1, '2020-03-18 08:00:23', '2020-04-09 08:42:44'),
(5, 4, 'What is suggestion', 'What is suggestion GREEK', 'What is suggestion RS', 'What is suggestion HB', '<p open=\"\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 20px; font-size: 15px; color: rgb(126, 126, 126); font-family: \">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', 1, '2020-03-19 02:32:14', '2020-03-27 06:30:33'),
(6, 1, 'Payment  information', 'Payment  information GREEK', 'Payment  information RS', 'Payment  information HB', '<p>Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum Lorem ipsum&nbsp;Lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', 1, '2020-03-27 06:47:35', '2020-03-27 06:47:55'),
(7, 5, 'What are the company policy', 'What are the company policy greek', 'What are the company policy ', 'What are the company policy ', '<p>Company Policy&nbsp;Company Policy&nbsp;Company Policy&nbsp;Company Policy Company Policy&nbsp;Company Policy&nbsp;Company Policy Company Policy Company Policy Company Policy Company Policy Company Policy Company Policy&nbsp;Company Policy&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', 1, '2020-03-27 06:49:27', '2020-04-09 08:43:25'),
(8, 1, 'payment eng', 'payment greek', 'payment ', 'payment ', '<p>payment eng ans</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', '<p>lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>', 1, '2020-04-09 09:58:26', '2020-04-09 09:58:26'),
(9, 4, 'suggestion eng', 'suggestion greek', 'suggestion rus', 'suggestion hb', '<p>ans englist</p>', '<p>ans englist greek</p>', '<p>ans englist dadsa</p>', '<p>ans englist hb</p>', 1, '2020-04-09 10:04:38', '2020-04-09 10:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `faq_types`
--

CREATE TABLE `faq_types` (
  `id` bigint(20) NOT NULL,
  `type_en` varchar(250) NOT NULL,
  `type_gr` varchar(250) NOT NULL,
  `type_ru` varchar(250) NOT NULL,
  `type_he` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_types`
--

INSERT INTO `faq_types` (`id`, `type_en`, `type_gr`, `type_ru`, `type_he`, `created_at`, `updated_at`) VALUES
(1, 'Payments', 'Type IW', 'Type RU', 'type EL', '2020-03-19 02:02:07', '2020-03-19 02:02:07'),
(4, 'Suggestions', 'Suggestions GR', 'Suggestions Russian', 'Suggestions Hebrew ', '2020-03-19 02:33:57', '2020-03-19 02:33:57'),
(5, 'Company Policies', 'Company Policies GR', 'Company Policies GR RUSSIAN', 'Company Policies GR RUSSIAN Hebrew ', '2020-03-19 02:33:57', '2020-03-19 02:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_iw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_el` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `name_ru`, `name_iw`, `name_el`, `grade_key`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Nursery', 'nur', 'nu hr', 'num gree', 'nursery', NULL, NULL, '2019-11-28 08:09:51', '2019-11-28 08:09:51'),
(3, 'ss', 'ss', 'ss', 'ss', 'ss', NULL, NULL, '2019-12-05 12:03:52', '2019-12-05 12:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` bigint(20) NOT NULL,
  `inbox_thread_id` bigint(20) NOT NULL,
  `from_id` int(10) NOT NULL,
  `to_id` int(10) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0 COMMENT '0 for no 1 for yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `inbox_thread_id`, `from_id`, `to_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 18, 'hello 1st message', 1, '2020-03-26 09:48:01', '2020-04-01 07:04:54'),
(2, 1, 18, 2, 'hi 2nd message', 0, '2020-03-26 09:48:01', '2020-03-26 09:48:01'),
(3, 1, 2, 18, 'hello 3rd message', 1, '2020-03-26 09:48:01', '2020-04-01 07:04:54'),
(8, 2, 18, 3, 'hello 1st message', 1, '2020-03-26 09:48:01', '2020-03-26 09:48:01'),
(9, 2, 3, 18, 'hello 2nd message', 1, '2020-03-26 09:48:01', '2020-04-01 07:04:58'),
(10, 2, 3, 18, 'hello 3rd message', 1, '2020-03-26 09:48:01', '2020-04-01 07:04:58'),
(11, 2, 18, 3, 'hi 4th message', 0, '2020-03-26 09:28:51', '2020-03-26 09:28:51'),
(12, 2, 18, 3, 'nnnmmmm', 0, '2020-03-27 05:35:04', '2020-03-27 05:35:04'),
(13, 2, 18, 3, 'vbbb', 0, '2020-03-27 05:35:25', '2020-03-27 05:35:25'),
(14, 2, 18, 3, 'bnnn', 0, '2020-03-27 05:36:14', '2020-03-27 05:36:14'),
(15, 1, 18, 2, 'bb', 0, '2020-03-27 05:38:19', '2020-03-27 05:38:19'),
(16, 1, 18, 2, 'nnsnd', 0, '2020-03-27 05:39:05', '2020-03-27 05:39:05'),
(17, 2, 18, 3, 'nn', 0, '2020-03-27 05:46:45', '2020-03-27 05:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_thread`
--

CREATE TABLE `inbox_thread` (
  `id` bigint(20) NOT NULL,
  `from_id` int(10) NOT NULL,
  `to_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox_thread`
--

INSERT INTO `inbox_thread` (`id`, `from_id`, `to_id`, `created_at`, `updated_at`) VALUES
(1, 2, 18, '2020-03-26 09:47:28', '2020-03-26 09:47:28'),
(2, 18, 3, '2020-03-26 09:47:28', '2020-03-26 09:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_he` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_gr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `name_en`, `name_ru`, `name_he`, `name_gr`, `created_at`, `updated_at`, `cat_key`) VALUES
(1, 'Company', 'Company ru', 'Company he', 'Company gr', '2020-04-08 22:57:31', '2020-04-08 22:57:31', 'company'),
(2, 'Programs', 'Programs ru', 'Programs he', 'Programs gr', '2020-04-08 23:54:40', '2020-04-08 23:54:40', 'programs'),
(3, 'Support', 'Support ru', 'Support he', 'Support gr', '2020-04-08 23:55:08', '2020-04-08 23:55:08', 'support');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` int(11) NOT NULL,
  `cat_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_he` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_gr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `cat_key`, `name_en`, `name_ru`, `name_he`, `name_gr`, `link`, `created_at`, `updated_at`) VALUES
(1, 'company', 'About us', 'About us ru', 'About us he', 'About us gr', '/about-us', '2020-04-08 23:35:05', '2020-04-10 10:08:53'),
(2, 'company', 'Blog', 'Blog ru', 'Blog he', 'Blog gr', '/public/blog', '2020-04-08 23:37:07', '2020-04-08 23:37:07'),
(3, 'company', 'Contact', 'Contact ru', 'Contact he', 'Contact gr', '/contact-us', '2020-04-08 23:48:02', '2020-04-10 10:09:07'),
(4, 'company', 'Become an Instructor', 'Become an Instructor ru', 'Become an Instructor he', 'Become an Instructor gr', '/student/login', '2020-04-08 23:52:29', '2020-04-08 23:52:29'),
(5, 'programs', 'FAQ', 'FAQ R', 'FAQ H', 'FAQ gr', '/faq', '2020-04-08 23:55:56', '2020-04-09 17:00:01'),
(6, 'support', 'Documentation', 'Documentation ru', 'Documentation he', 'Documentation gr', '/', '2020-04-08 23:56:39', '2020-04-08 23:56:39'),
(7, 'support', 'Forums', 'Forums ru', 'Forums he', 'Forums gr', '/', '2020-04-08 23:57:03', '2020-04-08 23:57:03'),
(8, 'support', 'Dollar Packs', 'Dollar Packs ru', 'Dollar Packs he', 'Dollar Packs gr', '/', '2020-04-08 23:57:33', '2020-04-08 23:57:33'),
(9, 'support', 'Loren Isupum', 'Loren Isupum ru', 'Loren Isupum he', 'Loren Isupum gr', '/', '2020-04-08 23:57:57', '2020-04-08 23:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_18_103111_create_admins_table', 2),
(4, '2019_11_18_103112_create_admin_password_resets_table', 2),
(5, '2019_11_18_103131_create_students_table', 2),
(6, '2019_11_18_103132_create_student_password_resets_table', 2),
(7, '2019_11_18_103141_create_schools_table', 2),
(8, '2019_11_18_103142_create_school_password_resets_table', 2),
(9, '2019_11_18_103549_create_categories_table', 3),
(10, '2019_11_18_103720_create_classes_table', 3),
(11, '2019_11_18_103740_create_grades_table', 3),
(12, '2019_11_18_103811_create_courses_table', 3),
(13, '2019_11_18_103832_create_user_course_table', 3),
(14, '2019_11_18_103848_create_school_subscription_table', 3),
(15, '2019_11_18_103903_create_pages_table', 3),
(16, '2019_11_18_103914_create_emails_table', 3),
(17, '2019_11_18_103934_create_orders_table', 3),
(18, '2019_11_18_104000_create_subscription_table', 3),
(19, '2019_11_18_104502_create_language_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(28, 'raheelaslam1705@gmail.com', '2020-04-07 06:05:23', '2020-04-07 06:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `from_id` int(10) NOT NULL,
  `to_id` int(10) NOT NULL,
  `inbox_id` bigint(20) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0 COMMENT '0 for no 1 for yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL DEFAULT 0,
  `order_status` enum('Pending','Completed','Cancelled','Inprocess') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `order_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `student_id`, `order_status`, `order_date`, `order_total`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pending', '2020-04-02 09:41:14', '400.00', '2020-04-02 09:41:14', '2020-04-02 09:41:14'),
(2, 2, 'Pending', '2020-04-02 09:43:59', '400.00', '2020-04-02 09:43:59', '2020-04-02 09:43:59'),
(3, 2, 'Pending', '2020-04-02 09:48:04', '400.00', '2020-04-02 09:48:04', '2020-04-02 09:48:04'),
(4, 2, 'Pending', '2020-04-02 09:51:23', '400.00', '2020-04-02 09:51:23', '2020-04-02 09:51:23'),
(5, 2, 'Pending', '2020-04-02 09:56:54', '400.00', '2020-04-02 09:56:54', '2020-04-02 09:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `from_id` int(10) NOT NULL,
  `to_id` int(10) NOT NULL,
  `reviews` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_since` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_statment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `school_key`, `email`, `password`, `website`, `year_since`, `phone`, `address`, `is_active`, `image`, `description`, `mission_statment`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Government High Schools', 'high_school', 'maria.sadeeq@elementarylogics.com', '$2y$10$lETfUH9Xut6oOjMhfDXwpu90o75N3qEsFkTYGKfU0HJLVWUBz3wXC', 'www.google.com', 22222222, '21312121545', 'this is my adress', 1, 'Eq5LkAtf6DEO.png', 'sss', 'sss', NULL, '2019-11-27 19:00:00', '2020-03-23 01:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `school_password_resets`
--

CREATE TABLE `school_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_password_resets`
--

INSERT INTO `school_password_resets` (`email`, `token`, `created_at`) VALUES
('maria.sadeeq@elementarylogics.com', 'vCTs8mFtkrYxlWizxA6N2RGJzDe6Xo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_subscription`
--

CREATE TABLE `school_subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'title', 'iLearning', NULL, NULL),
(2, 'user_currency', '$', NULL, NULL),
(3, 'highlight_fee', '2', NULL, NULL),
(4, 'toplisting_fee', '5', NULL, NULL),
(5, 'email_from_name', 'iLearning Team', NULL, NULL),
(6, 'email_from', 'ilearning@yahoo.com', NULL, NULL),
(7, 'meta_title', 'iLearning', NULL, NULL),
(8, 'meta_desc', 'iLearning description', NULL, NULL),
(9, 'meta_keywords', 'iLearning,Tour,locations', NULL, NULL),
(10, 'copy_rights', 'Regards, I-Learning', NULL, NULL),
(11, 'footer_text', 'Regards, I-Learning', NULL, NULL),
(12, 'fb_url', 'http://www.facebook.com', NULL, NULL),
(13, 'twitter_url', 'http://www.facebook.com', NULL, NULL),
(14, 'insta_url', 'http://www.facebook.com', NULL, NULL),
(15, 'apple_url', 'http://www.facebook.com', NULL, NULL),
(16, 'play_store_url', 'http://www.facebook.com', NULL, NULL),
(17, 'copy_right', 'Copyright i-Learning © 2020. All Rights Reserved', NULL, NULL),
(18, 'direct_bank_transfer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust ry\'s standard dummy text ever since the 1500s, when anfy.', NULL, NULL),
(19, 'check_payments', 'Check Payments is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust ry\'s standard dummy text ever since the 1500s, when anfy.', NULL, NULL),
(20, 'contact_us', '+9234354353', NULL, NULL),
(21, 'contact_us_mobile', '+9234354353', NULL, NULL),
(22, 'our_location', 'Lahore, Wapda Town', NULL, NULL),
(23, 'paypal_url', 'https://www.paypal.com/', NULL, NULL),
(24, 'pinterest_url', 'https://www.pinterest.com/', NULL, NULL),
(25, 'booking_url', 'https://www.booking.com/', NULL, NULL),
(26, 'adidas_url', 'https://www.adidas.com/', NULL, NULL),
(28, 'google_url', 'https://www.google.com/', NULL, NULL),
(29, 'dribbble_url', 'https://www.dribbble.com/', NULL, NULL),
(30, 'view_more', 'http://google.com', NULL, NULL),
(31, 'contact_us_email', 'raheelaslam1705@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) NOT NULL,
  `student_id` int(10) NOT NULL DEFAULT 0,
  `course_id` bigint(20) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` bigint(20) NOT NULL DEFAULT 0,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `student_id`, `course_id`, `quantity`, `price`, `tax`, `image`, `created_at`, `updated_at`, `order_id`, `ip`) VALUES
(42, 19, 22, 1, '120.00', '0.00', NULL, '2020-04-10 08:39:07', '2020-04-10 08:39:07', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `random_student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) NOT NULL DEFAULT 0,
  `class_id` int(11) NOT NULL DEFAULT 0,
  `grade_id` int(11) NOT NULL DEFAULT 0,
  `about_student` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registartion_date` datetime DEFAULT NULL,
  `is_instructor` int(1) NOT NULL DEFAULT 0 COMMENT '0 for student 1 for instructor',
  `is_online` int(1) NOT NULL DEFAULT 0 COMMENT '0 for no 1 for yes',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `is_active`, `first_name`, `last_name`, `dob`, `address`, `phone`, `father_full_name`, `gender`, `image`, `age`, `random_student_id`, `roll_number`, `school_id`, `class_id`, `grade_id`, `about_student`, `registration_number`, `registartion_date`, `is_instructor`, `is_online`, `facebook`, `instagram`, `linkedin`, `twitter`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'maria.sadeeq@elementarylogics.coms', '$2y$10$/qvJiUL967WQ7R2epMEe/OOxBGxH7BShyu26kU4AurGilRpqm9j/2', 1, NULL, NULL, '15-11-1989', 'Lahore, Pakistan', '111111', 'Sharif Khan khan', 'female', NULL, '30', '1-student1', '1', 1, 1, 2, 'about me', '1', '2019-11-13 00:00:00', 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-11-28 19:00:00', '2020-03-23 05:44:35'),
(2, 'Ali', 'maria.sharif2@elementarylogics.com', '$2y$10$dVXaAt/ooz.IDTfB0470fetPrrJPUR1hUhVLIsfNWN4.hmOf9vsV.', 1, NULL, NULL, '15-11-2019', 'ssdssd fff', '222323232', 'Sharif Khan', 'male', 'N9TCW8PQX66Z.png', '23', 'sdsd44', '123', 1, 1, 2, 'aaa', '1233', '2019-11-19 00:00:00', 0, 1, NULL, NULL, NULL, NULL, NULL, '2019-11-28 19:00:00', '2020-04-08 09:16:32'),
(3, 'maria sharif', 'maria.sharif3@elementarylogics.com', '$2y$10$dVXaAt/ooz.IDTfB0470fetPrrJPUR1hUhVLIsfNWN4.hmOf9vsV.', 1, NULL, NULL, '15-11-2019', 'ssdssd fff', '222323232', 'Sharif Khan', 'male', NULL, '23', 'sdsd44', '123', 1, 1, 1, 'aaa', '1233', '2019-11-19 00:00:00', 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-11-28 19:00:00', '2020-04-08 09:16:25'),
(18, 'maria', 'maria.sadeeq@elementarylogics.com', '$2y$10$rjl56k.Y5mDrok0fzV.5SO5nK21v4zEcPMCmdISyCx045aiyt1Va.', 1, 'maria', 'khan', NULL, NULL, '03101420399', NULL, NULL, 'VqfkObzHHxMx.jpg', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 1, 0, NULL, 'instagram.com', NULL, NULL, NULL, '2020-03-24 02:30:44', '2020-04-03 05:07:32'),
(19, 'Raheel', 'raheelaslam1705@gmail.com', '$2y$10$dVXaAt/ooz.IDTfB0470fetPrrJPUR1hUhVLIsfNWN4.hmOf9vsV.', 1, 'Raheel', 'Aslam', NULL, NULL, NULL, NULL, NULL, '8174.jpg', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '2020-04-04 03:13:24', '2020-04-10 09:55:36'),
(20, 'imran', 'imran705@gmail.com', '$2y$10$dVXaAt/ooz.IDTfB0470fetPrrJPUR1hUhVLIsfNWN4.hmOf9vsV.', 1, 'Imran ', 'Naveed', NULL, NULL, NULL, NULL, NULL, 'VqfkObzHHxMx.jpg', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2020-04-04 03:13:24', '2020-04-10 00:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_billing_detail`
--

CREATE TABLE `student_billing_detail` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL DEFAULT 0,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_billing_detail`
--

INSERT INTO `student_billing_detail` (`id`, `student_id`, `first_name`, `last_name`, `company_name`, `country_id`, `street_address`, `street_address_2`, `post_code`, `city`, `province`, `phone`, `email`, `order_notes`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'maria', 'sadeeq', 'elementarylogics', 1, 'Jeremy Martinson, Jr. 455 Larkspur Dr. Apt 23 Baviera, CA 90001, 5555555555554444', NULL, '90001', 'Los Angeles', 'California', '1111111111', 'maria.sadeeq@elementarylogics.com', 'order notes order notes', NULL, '2020-04-02 09:37:49', '2020-04-02 09:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_password_resets`
--

CREATE TABLE `student_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_password_resets`
--

INSERT INTO `student_password_resets` (`email`, `token`, `created_at`) VALUES
('maria.sadeeq@elementarylogics.com', 'CKxSJStMcaTZeyiu5PBfAOZvXuaksn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL COMMENT 'days',
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 14, 2, '2019-08-21 19:00:00', '2019-08-22 19:00:00'),
(2, 19, 2, '2019-08-21 19:00:00', '2019-08-22 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_views`
--

CREATE TABLE `user_views` (
  `id` bigint(20) NOT NULL,
  `from_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_views`
--

INSERT INTO `user_views` (`id`, `from_id`, `to_id`, `created_at`, `updated_at`) VALUES
(1, '1', 18, '2020-03-24 16:35:47', '2020-03-24 16:35:47'),
(2, '2', 18, '2020-03-24 16:35:56', '2020-03-24 16:35:56'),
(3, '3', 18, '2020-03-24 16:36:04', '2020-03-24 16:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_commentmeta`
--

INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'awcr-single-rating', '5'),
(2, 2, 'review_title', 'E-Learning for education'),
(3, 3, 'awcr-single-rating', '3'),
(4, 3, 'review_title', 'Multimedia Learning');

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-03-28 10:09:41', '2020-03-28 10:09:41', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0),
(2, 27, 'admin', 'ilearning@info.com', '', '::1', '2020-03-29 06:06:07', '2020-03-29 06:06:07', 'Find here a really good content for learning.', 0, '1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '', 0, 1),
(3, 27, '', '', '', '::1', '2020-03-29 06:16:51', '2020-03-29 06:16:51', 'Nice teaching for Multimedia Learning.', 0, '1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/ilearning/public/blog', 'yes'),
(2, 'home', 'http://localhost/ilearning/public/blog', 'yes'),
(3, 'blogname', 'I Learning', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'ilearning@info.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '2', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '2', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:87:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=5&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:7:{i:0;s:29:\"acf-repeater/acf-repeater.php\";i:1;s:25:\"add-to-any/add-to-any.php\";i:2;s:30:\"advanced-custom-fields/acf.php\";i:3;s:55:\"awesome-wp-comment-rating/awesome-wp-comment-rating.php\";i:4;s:33:\"duplicate-post/duplicate-post.php\";i:5;s:59:\"intuitive-custom-post-order/intuitive-custom-post-order.php\";i:6;s:27:\"wp-comment-fields/index.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'ilearning', 'yes'),
(41, 'stylesheet', 'ilearning', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '47018', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:59:\"intuitive-custom-post-order/intuitive-custom-post-order.php\";s:15:\"hicpo_uninstall\";}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '5', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'admin_email_lifespan', '1600942181', 'yes'),
(94, 'initial_db_version', '45805', 'yes'),
(95, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:10:\"copy_posts\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:35:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:10:\"copy_posts\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(96, 'fresh_site', '0', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:13:\"array_version\";i:3;}', 'yes'),
(128, 'current_theme', 'Twenty Nineteen/ilearning', 'yes'),
(129, 'theme_mods_ilearning', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(130, 'theme_switched', '', 'yes'),
(135, 'recently_activated', 'a:0:{}', 'yes'),
(103, 'cron', 'a:7:{i:1585901383;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1585908582;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1585908583;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1585908594;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1585908595;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1586446258;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(309, '_site_transient_timeout_theme_roots', '1585892682', 'no'),
(310, '_site_transient_theme_roots', 'a:1:{s:9:\"ilearning\";s:7:\"/themes\";}', 'no'),
(119, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1585890883;s:7:\"checked\";a:1:{s:9:\"ilearning\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(303, 'db_upgraded', '', 'yes'),
(306, 'can_compress_scripts', '1', 'no'),
(127, 'theme_mods_twentytwenty', 'a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1585390220;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";}s:9:\"sidebar-2\";a:3:{i:0;s:10:\"archives-2\";i:1;s:12:\"categories-2\";i:2;s:6:\"meta-2\";}}}}', 'yes'),
(136, 'acf_version', '5.8.9', 'yes'),
(137, 'widget_a2a_share_save_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(138, 'widget_a2a_follow_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(139, 'awcr_bymo_basic_settings', '', 'yes'),
(140, 'awcr_bymo_star_field', 'a:9:{s:18:\"display_rating_bar\";s:18:\"above_comment_text\";s:10:\"field_name\";s:26:\"What is it like to Course?\";s:15:\"field_name_size\";s:4:\"17px\";s:16:\"field_name_color\";s:7:\"#4f4f4f\";s:15:\"field_star_size\";s:4:\"20px\";s:10:\"star_color\";s:7:\"#ed7518\";s:9:\"star_size\";s:4:\"20px\";s:10:\"star_width\";s:4:\"20px\";s:11:\"star_height\";s:4:\"20px\";}', 'yes'),
(141, 'awcr_bymo_google_histogram', '', 'yes'),
(142, 'awcr_bymo_gauge_chart', '', 'yes'),
(143, 'awcr_bymo_gaming_bar', '', 'yes'),
(144, 'awcr_bymo_shortcodes', '', 'yes'),
(145, 'duplicate_post_copytitle', '1', 'yes'),
(146, 'duplicate_post_copydate', '0', 'yes'),
(147, 'duplicate_post_copystatus', '0', 'yes'),
(148, 'duplicate_post_copyslug', '0', 'yes'),
(149, 'duplicate_post_copyexcerpt', '1', 'yes'),
(150, 'duplicate_post_copycontent', '1', 'yes'),
(151, 'duplicate_post_copythumbnail', '1', 'yes'),
(152, 'duplicate_post_copytemplate', '1', 'yes'),
(153, 'duplicate_post_copyformat', '1', 'yes'),
(154, 'duplicate_post_copyauthor', '0', 'yes'),
(155, 'duplicate_post_copypassword', '0', 'yes'),
(156, 'duplicate_post_copyattachments', '0', 'yes'),
(157, 'duplicate_post_copychildren', '0', 'yes'),
(158, 'duplicate_post_copycomments', '0', 'yes'),
(159, 'duplicate_post_copymenuorder', '1', 'yes'),
(160, 'duplicate_post_taxonomies_blacklist', 'a:0:{}', 'yes'),
(161, 'duplicate_post_blacklist', '', 'yes'),
(162, 'duplicate_post_types_enabled', 'a:2:{i:0;s:4:\"post\";i:1;s:4:\"page\";}', 'yes'),
(163, 'duplicate_post_show_row', '1', 'yes'),
(164, 'duplicate_post_show_adminbar', '1', 'yes'),
(165, 'duplicate_post_show_submitbox', '1', 'yes'),
(166, 'duplicate_post_show_bulkactions', '1', 'yes'),
(167, 'duplicate_post_show_original_column', '0', 'yes'),
(168, 'duplicate_post_show_original_in_post_states', '0', 'yes'),
(169, 'duplicate_post_show_original_meta_box', '0', 'yes'),
(170, 'duplicate_post_version', '3.2.4', 'yes'),
(171, 'duplicate_post_show_notice', '0', 'no'),
(172, 'hicpo_ver', '3.1.2', 'yes'),
(182, 'category_children', 'a:0:{}', 'yes'),
(183, 'hicpo_options', 'a:2:{s:7:\"objects\";a:1:{i:0;s:4:\"post\";}s:4:\"tags\";a:2:{i:0;s:8:\"category\";i:1;s:8:\"post_tag\";}}', 'yes'),
(226, 'addtoany_options', 'a:32:{s:8:\"position\";s:6:\"bottom\";s:30:\"display_in_posts_on_front_page\";s:1:\"1\";s:33:\"display_in_posts_on_archive_pages\";s:1:\"1\";s:19:\"display_in_excerpts\";s:1:\"1\";s:16:\"display_in_posts\";s:1:\"1\";s:16:\"display_in_pages\";s:1:\"1\";s:22:\"display_in_attachments\";s:1:\"1\";s:15:\"display_in_feed\";s:1:\"1\";s:7:\"onclick\";s:2:\"-1\";s:9:\"icon_size\";s:2:\"26\";s:7:\"icon_bg\";s:11:\"transparent\";s:13:\"icon_bg_color\";s:7:\"#2a2a2a\";s:7:\"icon_fg\";s:6:\"custom\";s:13:\"icon_fg_color\";s:7:\"#969696\";s:6:\"button\";s:4:\"NONE\";s:13:\"button_custom\";s:0:\"\";s:17:\"button_show_count\";s:2:\"-1\";s:6:\"header\";s:5:\"Share\";s:23:\"additional_js_variables\";s:0:\"\";s:14:\"additional_css\";s:50:\".a2a_svg:hover {\r\n    color: #f79457!important;\r\n}\";s:12:\"custom_icons\";s:2:\"-1\";s:16:\"custom_icons_url\";s:1:\"/\";s:17:\"custom_icons_type\";s:3:\"png\";s:18:\"custom_icons_width\";s:0:\"\";s:19:\"custom_icons_height\";s:0:\"\";s:5:\"cache\";s:2:\"-1\";s:11:\"button_text\";s:5:\"Share\";s:24:\"special_facebook_options\";a:1:{s:10:\"show_count\";s:2:\"-1\";}s:15:\"active_services\";a:4:{i:0;s:8:\"facebook\";i:1;s:7:\"twitter\";i:2;s:8:\"linkedin\";i:3;s:16:\"google_bookmarks\";}s:29:\"special_facebook_like_options\";a:2:{s:10:\"show_count\";s:2:\"-1\";s:4:\"verb\";s:4:\"like\";}s:29:\"special_twitter_tweet_options\";a:1:{s:10:\"show_count\";s:2:\"-1\";}s:29:\"special_pinterest_pin_options\";a:1:{s:10:\"show_count\";s:2:\"-1\";}}', 'yes'),
(239, '_site_transient_timeout_browser_25dea58c856939f6954b7922a8db1dec', '1586060015', 'no'),
(240, '_site_transient_browser_25dea58c856939f6954b7922a8db1dec', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"80.0.3987.149\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(241, '_site_transient_timeout_php_check_5cc86f05623c0c7aed403ca34b000981', '1586060016', 'no'),
(242, '_site_transient_php_check_5cc86f05623c0c7aed403ca34b000981', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:0;s:13:\"is_acceptable\";b:1;}', 'no'),
(255, 'wpcomment_meta', 'a:1:{i:0;a:8:{s:4:\"type\";s:4:\"text\";s:5:\"title\";s:12:\"Review Title\";s:9:\"data_name\";s:12:\"review_title\";s:11:\"description\";s:0:\"\";s:13:\"error_message\";s:30:\"Review Title field is required\";s:8:\"required\";s:2:\"on\";s:5:\"class\";s:11:\"reviewTitle\";s:5:\"width\";s:2:\"12\";}}', 'yes'),
(299, '_transient_timeout_acf_plugin_updates', '1585927766', 'no'),
(300, '_transient_acf_plugin_updates', 'a:3:{s:7:\"plugins\";a:0:{}s:10:\"expiration\";i:172800;s:6:\"status\";i:1;}', 'no'),
(305, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:10:\"no_content\";s:68:\"https://downloads.wordpress.org/release/wordpress-5.4-no-content.zip\";s:11:\"new_bundled\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.4-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:3:\"5.4\";s:7:\"version\";s:3:\"5.4\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1585890874;s:15:\"version_checked\";s:3:\"5.4\";s:12:\"translations\";a:0:{}}', 'no'),
(311, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1585890885;s:7:\"checked\";a:7:{s:25:\"add-to-any/add-to-any.php\";s:6:\"1.7.39\";s:30:\"advanced-custom-fields/acf.php\";s:5:\"5.8.9\";s:29:\"acf-repeater/acf-repeater.php\";s:5:\"2.1.0\";s:55:\"awesome-wp-comment-rating/awesome-wp-comment-rating.php\";s:3:\"1.1\";s:33:\"duplicate-post/duplicate-post.php\";s:5:\"3.2.4\";s:59:\"intuitive-custom-post-order/intuitive-custom-post-order.php\";s:5:\"3.1.2\";s:27:\"wp-comment-fields/index.php\";s:3:\"1.7\";}s:8:\"response\";a:1:{s:25:\"add-to-any/add-to-any.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:24:\"w.org/plugins/add-to-any\";s:4:\"slug\";s:10:\"add-to-any\";s:6:\"plugin\";s:25:\"add-to-any/add-to-any.php\";s:11:\"new_version\";s:6:\"1.7.40\";s:3:\"url\";s:41:\"https://wordpress.org/plugins/add-to-any/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/add-to-any.1.7.40.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:62:\"https://ps.w.org/add-to-any/assets/icon-256x256.png?rev=972738\";s:2:\"1x\";s:54:\"https://ps.w.org/add-to-any/assets/icon.svg?rev=972738\";s:3:\"svg\";s:54:\"https://ps.w.org/add-to-any/assets/icon.svg?rev=972738\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:66:\"https://ps.w.org/add-to-any/assets/banner-1544x500.png?rev=2167358\";s:2:\"1x\";s:65:\"https://ps.w.org/add-to-any/assets/banner-772x250.png?rev=2167357\";}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:3:\"5.4\";s:12:\"requires_php\";s:3:\"5.6\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:5:{s:30:\"advanced-custom-fields/acf.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:36:\"w.org/plugins/advanced-custom-fields\";s:4:\"slug\";s:22:\"advanced-custom-fields\";s:6:\"plugin\";s:30:\"advanced-custom-fields/acf.php\";s:11:\"new_version\";s:5:\"5.8.9\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/advanced-custom-fields/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/advanced-custom-fields.5.8.9.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:75:\"https://ps.w.org/advanced-custom-fields/assets/icon-256x256.png?rev=1082746\";s:2:\"1x\";s:75:\"https://ps.w.org/advanced-custom-fields/assets/icon-128x128.png?rev=1082746\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/advanced-custom-fields/assets/banner-1544x500.jpg?rev=1729099\";s:2:\"1x\";s:77:\"https://ps.w.org/advanced-custom-fields/assets/banner-772x250.jpg?rev=1729102\";}s:11:\"banners_rtl\";a:0:{}}s:55:\"awesome-wp-comment-rating/awesome-wp-comment-rating.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:39:\"w.org/plugins/awesome-wp-comment-rating\";s:4:\"slug\";s:25:\"awesome-wp-comment-rating\";s:6:\"plugin\";s:55:\"awesome-wp-comment-rating/awesome-wp-comment-rating.php\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:56:\"https://wordpress.org/plugins/awesome-wp-comment-rating/\";s:7:\"package\";s:68:\"https://downloads.wordpress.org/plugin/awesome-wp-comment-rating.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:78:\"https://ps.w.org/awesome-wp-comment-rating/assets/icon-256x256.png?rev=2252526\";s:2:\"1x\";s:78:\"https://ps.w.org/awesome-wp-comment-rating/assets/icon-128x128.png?rev=2252526\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:80:\"https://ps.w.org/awesome-wp-comment-rating/assets/banner-772x250.png?rev=2252526\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"duplicate-post/duplicate-post.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/duplicate-post\";s:4:\"slug\";s:14:\"duplicate-post\";s:6:\"plugin\";s:33:\"duplicate-post/duplicate-post.php\";s:11:\"new_version\";s:5:\"3.2.4\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/duplicate-post/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/duplicate-post.3.2.4.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/duplicate-post/assets/icon-256x256.png?rev=1612753\";s:2:\"1x\";s:67:\"https://ps.w.org/duplicate-post/assets/icon-128x128.png?rev=1612753\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:69:\"https://ps.w.org/duplicate-post/assets/banner-772x250.png?rev=1612986\";}s:11:\"banners_rtl\";a:0:{}}s:59:\"intuitive-custom-post-order/intuitive-custom-post-order.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:41:\"w.org/plugins/intuitive-custom-post-order\";s:4:\"slug\";s:27:\"intuitive-custom-post-order\";s:6:\"plugin\";s:59:\"intuitive-custom-post-order/intuitive-custom-post-order.php\";s:11:\"new_version\";s:5:\"3.1.2\";s:3:\"url\";s:58:\"https://wordpress.org/plugins/intuitive-custom-post-order/\";s:7:\"package\";s:76:\"https://downloads.wordpress.org/plugin/intuitive-custom-post-order.3.1.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:80:\"https://ps.w.org/intuitive-custom-post-order/assets/icon-256x256.png?rev=1078797\";s:2:\"1x\";s:80:\"https://ps.w.org/intuitive-custom-post-order/assets/icon-128x128.png?rev=1078797\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:83:\"https://ps.w.org/intuitive-custom-post-order/assets/banner-1544x500.png?rev=1209666\";s:2:\"1x\";s:82:\"https://ps.w.org/intuitive-custom-post-order/assets/banner-772x250.png?rev=1078755\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"wp-comment-fields/index.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:31:\"w.org/plugins/wp-comment-fields\";s:4:\"slug\";s:17:\"wp-comment-fields\";s:6:\"plugin\";s:27:\"wp-comment-fields/index.php\";s:11:\"new_version\";s:3:\"1.7\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/wp-comment-fields/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/wp-comment-fields.1.7.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/wp-comment-fields/assets/icon-256x256.jpg?rev=2171192\";s:2:\"1x\";s:70:\"https://ps.w.org/wp-comment-fields/assets/icon-128x128.jpg?rev=2171192\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:72:\"https://ps.w.org/wp-comment-fields/assets/banner-772x250.jpg?rev=2171192\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(312, '_site_transient_timeout_php_check_e2d57a652f0ac90f08c55a7e03ef14d7', '1586495687', 'no'),
(313, '_site_transient_php_check_e2d57a652f0ac90f08c55a7e03ef14d7', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(314, '_transient_health-check-site-status-result', '{\"good\":11,\"recommended\":5,\"critical\":1}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', ''),
(2, 3, '_wp_page_template', 'default'),
(3, 5, '_edit_lock', '1585391830:1'),
(4, 5, '_wp_page_template', 'blog.php'),
(5, 7, '_edit_last', '1'),
(6, 7, '_edit_lock', '1585418999:1'),
(7, 1, '_edit_lock', '1585395730:1'),
(8, 12, '_wp_attached_file', '2020/03/blog_img.png'),
(9, 12, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:981;s:6:\"height\";i:501;s:4:\"file\";s:20:\"2020/03/blog_img.png\";s:5:\"sizes\";a:3:{s:6:\"medium\";a:4:{s:4:\"file\";s:20:\"blog_img-300x153.png\";s:5:\"width\";i:300;s:6:\"height\";i:153;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:20:\"blog_img-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:20:\"blog_img-768x392.png\";s:5:\"width\";i:768;s:6:\"height\";i:392;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(10, 13, '_wp_attached_file', '2020/03/blog_slider_img.png'),
(11, 13, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:305;s:6:\"height\";i:332;s:4:\"file\";s:27:\"2020/03/blog_slider_img.png\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:27:\"blog_slider_img-276x300.png\";s:5:\"width\";i:276;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:27:\"blog_slider_img-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(16, 1, '_edit_last', '1'),
(14, 1, '_wp_old_slug', 'hello-world'),
(15, 1, '_thumbnail_id', '13'),
(109, 24, '_edit_last', '1'),
(19, 1, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(20, 1, '_featured', 'field_5e7f2b263af1a'),
(21, 1, 'image', '12'),
(22, 1, '_image', 'field_5e7f2c3d1456d'),
(23, 1, 'detail_page_content', '<h4>Course Description</h4>\r\n1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(24, 1, '_detail_page_content', 'field_5e7f2bd8751c0'),
(25, 15, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(26, 15, '_featured', 'field_5e7f2b263af1a'),
(27, 15, 'image', '12'),
(28, 15, '_image', 'field_5e7f2c3d1456d'),
(29, 15, 'detail_page_content', '<h4>Course Description</h4>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(30, 15, '_detail_page_content', 'field_5e7f2bd8751c0'),
(83, 21, '_edit_last', '1'),
(33, 16, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(34, 16, '_featured', 'field_5e7f2b263af1a'),
(35, 16, 'image', '12'),
(36, 16, '_image', 'field_5e7f2c3d1456d'),
(37, 16, 'detail_page_content', '<h4>Course Description</h4>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(38, 16, '_detail_page_content', 'field_5e7f2bd8751c0'),
(41, 17, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(42, 17, '_featured', 'field_5e7f2b263af1a'),
(43, 17, 'image', '12'),
(44, 17, '_image', 'field_5e7f2c3d1456d'),
(45, 17, 'detail_page_content', '<h4>Course Description</h4>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(46, 17, '_detail_page_content', 'field_5e7f2bd8751c0'),
(49, 18, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(50, 18, '_featured', 'field_5e7f2b263af1a'),
(51, 18, 'image', '12'),
(52, 18, '_image', 'field_5e7f2c3d1456d'),
(53, 18, 'detail_page_content', '<h4>Course Description</h4>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(54, 18, '_detail_page_content', 'field_5e7f2bd8751c0'),
(59, 1, 'featured_post_short_text', 'Demo Text1'),
(60, 1, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(61, 20, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(62, 20, '_featured', 'field_5e7f2b263af1a'),
(63, 20, 'image', '12'),
(64, 20, '_image', 'field_5e7f2c3d1456d'),
(65, 20, 'detail_page_content', '<h4>Course Description</h4>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(66, 20, '_detail_page_content', 'field_5e7f2bd8751c0'),
(67, 20, 'featured_post_short_text', 'Demo Text'),
(68, 20, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(69, 21, '_wp_old_slug', 'hello-world'),
(70, 21, '_thumbnail_id', '13'),
(71, 21, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(72, 21, '_featured', 'field_5e7f2b263af1a'),
(73, 21, 'image', '12'),
(74, 21, '_image', 'field_5e7f2c3d1456d'),
(75, 21, 'detail_page_content', '<h4>Course Description</h4>\r\n2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(76, 21, '_detail_page_content', 'field_5e7f2bd8751c0'),
(79, 21, 'featured_post_short_text', 'Demo Text2'),
(80, 21, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(81, 21, '_dp_original', '1'),
(82, 21, '_edit_lock', '1585395564:1'),
(86, 23, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(87, 23, '_featured', 'field_5e7f2b263af1a'),
(88, 23, 'image', '12'),
(89, 23, '_image', 'field_5e7f2c3d1456d'),
(90, 23, 'detail_page_content', '<h4>Course Description</h4>\r\n2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(91, 23, '_detail_page_content', 'field_5e7f2bd8751c0'),
(92, 23, 'featured_post_short_text', 'Demo Text2'),
(93, 23, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(94, 24, '_wp_old_slug', 'hello-world'),
(95, 24, '_thumbnail_id', '13'),
(96, 24, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(97, 24, '_featured', 'field_5e7f2b263af1a'),
(98, 24, 'image', '12'),
(99, 24, '_image', 'field_5e7f2c3d1456d'),
(100, 24, 'detail_page_content', '<h4>Course Description</h4>\r\n3Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(101, 24, '_detail_page_content', 'field_5e7f2bd8751c0'),
(102, 24, 'featured_post_short_text', 'Demo Text3'),
(103, 24, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(107, 24, '_dp_original', '21'),
(112, 26, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(108, 24, '_edit_lock', '1585395546:1'),
(113, 26, '_featured', 'field_5e7f2b263af1a'),
(114, 26, 'image', '12'),
(115, 26, '_image', 'field_5e7f2c3d1456d'),
(116, 26, 'detail_page_content', '<h4>Course Description</h4>\r\n3Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(117, 26, '_detail_page_content', 'field_5e7f2bd8751c0'),
(118, 26, 'featured_post_short_text', 'Demo Text3'),
(119, 26, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(126, 27, '_wp_old_slug', 'hello-world'),
(172, 30, '_edit_last', '1'),
(127, 27, '_thumbnail_id', '13'),
(128, 27, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(129, 27, '_featured', 'field_5e7f2b263af1a'),
(130, 27, 'image', '12'),
(131, 27, '_image', 'field_5e7f2c3d1456d'),
(132, 27, 'detail_page_content', '<h4>Course Description</h4>\r\n4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(133, 27, '_detail_page_content', 'field_5e7f2bd8751c0'),
(134, 27, 'featured_post_short_text', 'Demo Text4'),
(135, 27, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(136, 27, '_dp_original', '1'),
(143, 27, '_edit_lock', '1585395640:1'),
(146, 27, '_edit_last', '1'),
(209, 36, 'featured', ''),
(149, 29, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(150, 29, '_featured', 'field_5e7f2b263af1a'),
(151, 29, 'image', '12'),
(152, 29, '_image', 'field_5e7f2c3d1456d'),
(153, 29, 'detail_page_content', '<h4>Course Description</h4>\r\n4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(154, 29, '_detail_page_content', 'field_5e7f2bd8751c0'),
(155, 29, 'featured_post_short_text', 'Demo Text4'),
(156, 29, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(157, 30, '_wp_old_slug', 'hello-world'),
(158, 30, '_thumbnail_id', '13'),
(159, 30, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(160, 30, '_featured', 'field_5e7f2b263af1a'),
(161, 30, 'image', '12'),
(162, 30, '_image', 'field_5e7f2c3d1456d'),
(163, 30, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(164, 30, '_detail_page_content', 'field_5e7f2bd8751c0'),
(165, 30, 'featured_post_short_text', 'Demo Text5'),
(166, 30, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(170, 30, '_dp_original', '27'),
(175, 32, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(187, 34, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(171, 30, '_edit_lock', '1585581219:1'),
(176, 32, '_featured', 'field_5e7f2b263af1a'),
(177, 32, 'image', '12'),
(178, 32, '_image', 'field_5e7f2c3d1456d'),
(179, 32, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(180, 32, '_detail_page_content', 'field_5e7f2bd8751c0'),
(181, 32, 'featured_post_short_text', 'Demo Text5'),
(182, 32, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(269, 30, '_pingme', '1'),
(188, 34, '_featured', 'field_5e7f2b263af1a'),
(189, 34, 'image', '12'),
(190, 34, '_image', 'field_5e7f2c3d1456d'),
(191, 34, 'detail_page_content', '<h4>Course Description</h4>\r\n1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(192, 34, '_detail_page_content', 'field_5e7f2bd8751c0'),
(193, 34, 'featured_post_short_text', 'Demo Text1'),
(194, 34, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(197, 35, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(198, 35, '_featured', 'field_5e7f2b263af1a'),
(199, 35, 'image', '12'),
(200, 35, '_image', 'field_5e7f2c3d1456d'),
(201, 35, 'detail_page_content', '<h4>Course Description</h4>\r\n1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(202, 35, '_detail_page_content', 'field_5e7f2bd8751c0'),
(203, 35, 'featured_post_short_text', 'Demo Text1'),
(204, 35, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(210, 36, '_featured', 'field_5e7f2b263af1a'),
(270, 30, '_encloseme', '1'),
(211, 36, 'image', '12'),
(212, 36, '_image', 'field_5e7f2c3d1456d'),
(213, 36, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(214, 36, '_detail_page_content', 'field_5e7f2bd8751c0'),
(215, 36, 'featured_post_short_text', 'Demo Text5'),
(216, 36, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(219, 37, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(220, 37, '_featured', 'field_5e7f2b263af1a'),
(221, 37, 'image', '12'),
(222, 37, '_image', 'field_5e7f2c3d1456d'),
(223, 37, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(224, 37, '_detail_page_content', 'field_5e7f2bd8751c0'),
(225, 37, 'featured_post_short_text', 'Demo Text5'),
(226, 37, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(229, 38, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(230, 38, '_featured', 'field_5e7f2b263af1a'),
(231, 38, 'image', '12'),
(232, 38, '_image', 'field_5e7f2c3d1456d'),
(233, 38, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(234, 38, '_detail_page_content', 'field_5e7f2bd8751c0'),
(235, 38, 'featured_post_short_text', 'Demo Text5'),
(236, 38, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(239, 39, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(240, 39, '_featured', 'field_5e7f2b263af1a'),
(241, 39, 'image', '12'),
(242, 39, '_image', 'field_5e7f2c3d1456d'),
(243, 39, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(244, 39, '_detail_page_content', 'field_5e7f2bd8751c0'),
(245, 39, 'featured_post_short_text', 'Demo Text5'),
(246, 39, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(247, 2, '_edit_lock', '1585403808:1'),
(248, 2, '_edit_last', '1'),
(251, 42, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(252, 42, '_featured', 'field_5e7f2b263af1a'),
(253, 42, 'image', '12'),
(254, 42, '_image', 'field_5e7f2c3d1456d'),
(255, 42, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(256, 42, '_detail_page_content', 'field_5e7f2bd8751c0'),
(257, 42, 'featured_post_short_text', 'Demo Text5'),
(258, 42, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(261, 44, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(262, 44, '_featured', 'field_5e7f2b263af1a'),
(263, 44, 'image', '12'),
(264, 44, '_image', 'field_5e7f2c3d1456d');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(265, 44, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(266, 44, '_detail_page_content', 'field_5e7f2bd8751c0'),
(267, 44, 'featured_post_short_text', 'Demo Text5'),
(268, 44, '_featured_post_short_text', 'field_5e7f361b57b7d'),
(271, 45, 'featured', 'a:1:{i:0;s:3:\"yes\";}'),
(272, 45, '_featured', 'field_5e7f2b263af1a'),
(273, 45, 'image', '12'),
(274, 45, '_image', 'field_5e7f2c3d1456d'),
(275, 45, 'detail_page_content', '<h4>Course Description</h4>\r\n5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<h4>Requirements</h4>\r\n<ul class=\"cp_course_listDisc clearfix\">\r\n 	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</li>\r\n 	<li>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</li>\r\n 	<li>Make a type specimen book.</li>\r\n</ul>\r\n<em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</em>\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(276, 45, '_detail_page_content', 'field_5e7f2bd8751c0'),
(277, 45, 'featured_post_short_text', 'Demo Text5'),
(278, 45, '_featured_post_short_text', 'field_5e7f361b57b7d');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-03-28 10:09:41', '2020-03-28 10:09:41', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign1', '', 'publish', 'open', 'open', '', 'loren-ispum-dollar-sign', '', '', '2020-03-28 11:42:10', '2020-03-28 11:42:10', '', 0, 'http://localhost/ilearning/?p=1', 5, 'post', '', 1),
(2, 1, '2020-03-28 10:09:41', '2020-03-28 10:09:41', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/ilearning/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2020-03-28 13:56:46', '2020-03-28 13:56:46', '', 0, 'http://localhost/ilearning/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-03-28 10:09:41', '2020-03-28 10:09:41', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/ilearning.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2020-03-28 10:09:41', '2020-03-28 10:09:41', '', 0, 'http://localhost/ilearning/?page_id=3', 0, 'page', '', 0),
(4, 1, '2020-03-28 10:09:55', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-03-28 10:09:55', '0000-00-00 00:00:00', '', 0, 'http://localhost/ilearning/?p=4', 0, 'post', '', 0),
(5, 1, '2020-03-28 10:12:21', '2020-03-28 10:12:21', '', 'Blog', '', 'publish', 'closed', 'closed', '', 'blog', '', '', '2020-03-28 10:25:28', '2020-03-28 10:25:28', '', 0, 'http://localhost/ilearning/?page_id=5', 0, 'page', '', 0),
(6, 1, '2020-03-28 10:12:21', '2020-03-28 10:12:21', '', 'Blog', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2020-03-28 10:12:21', '2020-03-28 10:12:21', '', 5, 'http://localhost/ilearning/5-revision-v1/', 0, 'revision', '', 0),
(7, 1, '2020-03-28 10:47:44', '2020-03-28 10:47:44', 'a:7:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:4:\"post\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";}', 'Blog Post Fields', 'blog-post-fields', 'publish', 'closed', 'closed', '', 'group_5e7f2af92a0fe', '', '', '2020-03-28 11:34:29', '2020-03-28 11:34:29', '', 0, 'http://localhost/ilearning/?post_type=acf-field-group&#038;p=7', 0, 'acf-field-group', '', 0),
(8, 1, '2020-03-28 10:47:44', '2020-03-28 10:47:44', 'a:12:{s:4:\"type\";s:8:\"checkbox\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:7:\"choices\";a:1:{s:3:\"yes\";s:3:\"Yes\";}s:12:\"allow_custom\";i:0;s:13:\"default_value\";a:0:{}s:6:\"layout\";s:8:\"vertical\";s:6:\"toggle\";i:0;s:13:\"return_format\";s:5:\"value\";s:11:\"save_custom\";i:0;}', 'Featured', 'featured', 'publish', 'closed', 'closed', '', 'field_5e7f2b263af1a', '', '', '2020-03-28 10:47:44', '2020-03-28 10:47:44', '', 7, 'http://localhost/ilearning/?post_type=acf-field&p=8', 0, 'acf-field', '', 0),
(9, 1, '2020-03-28 10:50:21', '2020-03-28 10:50:21', 'a:10:{s:4:\"type\";s:7:\"wysiwyg\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:4:\"tabs\";s:3:\"all\";s:7:\"toolbar\";s:4:\"full\";s:12:\"media_upload\";i:1;s:5:\"delay\";i:0;}', 'Detail Page Content', 'detail_page_content', 'publish', 'closed', 'closed', '', 'field_5e7f2bd8751c0', '', '', '2020-03-28 11:34:29', '2020-03-28 11:34:29', '', 7, 'http://localhost/ilearning/?post_type=acf-field&#038;p=9', 3, 'acf-field', '', 0),
(10, 1, '2020-03-28 10:52:01', '2020-03-28 10:52:01', 'a:15:{s:4:\"type\";s:5:\"image\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"return_format\";s:3:\"url\";s:12:\"preview_size\";s:6:\"medium\";s:7:\"library\";s:3:\"all\";s:9:\"min_width\";s:0:\"\";s:10:\"min_height\";s:0:\"\";s:8:\"min_size\";s:0:\"\";s:9:\"max_width\";s:0:\"\";s:10:\"max_height\";s:0:\"\";s:8:\"max_size\";s:0:\"\";s:10:\"mime_types\";s:0:\"\";}', 'Image', 'image', 'publish', 'closed', 'closed', '', 'field_5e7f2c3d1456d', '', '', '2020-03-28 11:34:29', '2020-03-28 11:34:29', '', 7, 'http://localhost/ilearning/?post_type=acf-field&#038;p=10', 2, 'acf-field', '', 0),
(16, 1, '2020-03-28 11:05:59', '2020-03-28 11:05:59', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:05:59', '2020-03-28 11:05:59', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(12, 1, '2020-03-28 10:54:32', '2020-03-28 10:54:32', '', 'blog_img', '', 'inherit', 'open', 'closed', '', 'blog_img', '', '', '2020-03-28 10:54:32', '2020-03-28 10:54:32', '', 1, 'http://localhost/ilearning/wp-content/uploads/2020/03/blog_img.png', 0, 'attachment', 'image/png', 0),
(13, 1, '2020-03-28 10:54:40', '2020-03-28 10:54:40', '', 'blog_slider_img', '', 'inherit', 'open', 'closed', '', 'blog_slider_img', '', '', '2020-03-28 10:54:40', '2020-03-28 10:54:40', '', 1, 'http://localhost/ilearning/wp-content/uploads/2020/03/blog_slider_img.png', 0, 'attachment', 'image/png', 0),
(14, 1, '2020-03-28 11:05:45', '2020-03-28 11:05:45', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:05:45', '2020-03-28 11:05:45', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(15, 1, '2020-03-28 11:05:47', '2020-03-28 11:05:47', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:05:47', '2020-03-28 11:05:47', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(17, 1, '2020-03-28 11:23:35', '2020-03-28 11:23:35', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:23:35', '2020-03-28 11:23:35', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2020-03-28 11:23:38', '2020-03-28 11:23:38', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:23:38', '2020-03-28 11:23:38', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(19, 1, '2020-03-28 11:34:29', '2020-03-28 11:34:29', 'a:10:{s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";}', 'Featured Post Short Text', 'featured_post_short_text', 'publish', 'closed', 'closed', '', 'field_5e7f361b57b7d', '', '', '2020-03-28 11:34:29', '2020-03-28 11:34:29', '', 7, 'http://localhost/ilearning/?post_type=acf-field&p=19', 1, 'acf-field', '', 0),
(20, 1, '2020-03-28 11:34:58', '2020-03-28 11:34:58', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:34:58', '2020-03-28 11:34:58', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(21, 1, '2020-03-28 11:37:09', '2020-03-28 11:37:09', '2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign2', '', 'publish', 'open', 'open', '', 'loren-ispum-dollar-sign2', '', '', '2020-03-28 11:39:23', '2020-03-28 11:39:23', '', 0, 'http://localhost/ilearning/?p=21', 4, 'post', '', 0),
(22, 1, '2020-03-28 11:37:09', '2020-03-28 11:37:09', '2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign2', '', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-03-28 11:37:09', '2020-03-28 11:37:09', '', 21, 'http://localhost/ilearning/21-revision-v1/', 0, 'revision', '', 0),
(23, 1, '2020-03-28 11:37:10', '2020-03-28 11:37:10', '2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign2', '', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-03-28 11:37:10', '2020-03-28 11:37:10', '', 21, 'http://localhost/ilearning/21-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2020-03-28 11:39:04', '2020-03-28 11:39:04', '3Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign3', '', 'publish', 'open', 'open', '', 'loren-ispum-dollar-sign3', '', '', '2020-03-28 11:39:06', '2020-03-28 11:39:06', '', 0, 'http://localhost/ilearning/?p=24', 3, 'post', '', 0),
(25, 1, '2020-03-28 11:39:04', '2020-03-28 11:39:04', '3Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign3', '', 'inherit', 'closed', 'closed', '', '24-revision-v1', '', '', '2020-03-28 11:39:04', '2020-03-28 11:39:04', '', 24, 'http://localhost/ilearning/24-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2020-03-28 11:39:06', '2020-03-28 11:39:06', '3Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign3', '', 'inherit', 'closed', 'closed', '', '24-revision-v1', '', '', '2020-03-28 11:39:06', '2020-03-28 11:39:06', '', 24, 'http://localhost/ilearning/24-revision-v1/', 0, 'revision', '', 0),
(27, 1, '2020-03-28 11:40:38', '2020-03-28 11:40:38', '4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign4', '', 'publish', 'open', 'open', '', 'loren-ispum-dollar-sign4', '', '', '2020-03-28 11:40:39', '2020-03-28 11:40:39', '', 0, 'http://localhost/ilearning/?p=27', 2, 'post', '', 2),
(28, 1, '2020-03-28 11:40:38', '2020-03-28 11:40:38', '4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign4', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2020-03-28 11:40:38', '2020-03-28 11:40:38', '', 27, 'http://localhost/ilearning/27-revision-v1/', 0, 'revision', '', 0),
(29, 1, '2020-03-28 11:40:39', '2020-03-28 11:40:39', '4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign4', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2020-03-28 11:40:39', '2020-03-28 11:40:39', '', 27, 'http://localhost/ilearning/27-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2020-03-28 11:41:27', '2020-03-28 11:41:27', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'publish', 'open', 'open', '', 'loren-ispum-dollar-sign5', '', '', '2020-03-28 16:05:14', '2020-03-28 16:05:14', '', 0, 'http://localhost/ilearning/?p=30', 1, 'post', '', 0),
(31, 1, '2020-03-28 11:41:27', '2020-03-28 11:41:27', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 11:41:27', '2020-03-28 11:41:27', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(32, 1, '2020-03-28 11:41:28', '2020-03-28 11:41:28', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 11:41:28', '2020-03-28 11:41:28', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(33, 1, '2020-03-28 11:42:06', '2020-03-28 11:42:06', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign1', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:42:06', '2020-03-28 11:42:06', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(34, 1, '2020-03-28 11:42:07', '2020-03-28 11:42:07', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign1', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:42:07', '2020-03-28 11:42:07', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(35, 1, '2020-03-28 11:42:10', '2020-03-28 11:42:10', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign1', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-03-28 11:42:10', '2020-03-28 11:42:10', '', 1, 'http://localhost/ilearning/1-revision-v1/', 0, 'revision', '', 0),
(36, 1, '2020-03-28 11:42:26', '2020-03-28 11:42:26', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 11:42:26', '2020-03-28 11:42:26', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(37, 1, '2020-03-28 12:14:39', '2020-03-28 12:14:39', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 12:14:39', '2020-03-28 12:14:39', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(38, 1, '2020-03-28 13:05:06', '2020-03-28 13:05:06', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 13:05:06', '2020-03-28 13:05:06', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(39, 1, '2020-03-28 13:05:32', '2020-03-28 13:05:32', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 13:05:32', '2020-03-28 13:05:32', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(40, 1, '2020-03-28 13:54:55', '2020-03-28 13:54:55', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/ilearning/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2020-03-28 13:54:55', '2020-03-28 13:54:55', '', 2, 'http://localhost/ilearning/2-revision-v1/', 0, 'revision', '', 0),
(41, 1, '2020-03-28 16:02:09', '2020-03-28 16:02:09', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '11111', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 16:02:09', '2020-03-28 16:02:09', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(42, 1, '2020-03-28 16:02:11', '2020-03-28 16:02:11', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '11111', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 16:02:11', '2020-03-28 16:02:11', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(43, 1, '2020-03-28 16:05:02', '2020-03-28 16:05:02', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 16:05:02', '2020-03-28 16:05:02', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(44, 1, '2020-03-28 16:05:04', '2020-03-28 16:05:04', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 16:05:04', '2020-03-28 16:05:04', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0),
(45, 1, '2020-03-28 16:05:14', '2020-03-28 16:05:14', '5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Loren Ispum Dollar Sign5', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2020-03-28 16:05:14', '2020-03-28 16:05:14', '', 30, 'http://localhost/ilearning/30-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0,
  `term_order` int(4) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`, `term_order`) VALUES
(1, 'Uncategorized', 'uncategorized', 0, 5),
(2, 'Photoshop', 'photoshop', 0, 2),
(3, 'Sketch', 'sketch', 0, 3),
(4, 'Beginner', 'beginner', 0, 1),
(5, 'UX/UI', 'ux-ui', 0, 4),
(6, 'Associative Learning', 'associative-learning', 0, 1),
(7, 'Episodic Learning', 'episodic-learning', 0, 3),
(8, 'Multimedia Learning', 'multimedia-learning', 0, 4),
(9, 'E-Learning', 'e-learning', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(21, 6, 0),
(27, 8, 0),
(27, 7, 0),
(1, 4, 0),
(27, 9, 0),
(1, 6, 0),
(21, 4, 0),
(21, 2, 0),
(27, 4, 0),
(27, 6, 0),
(21, 9, 0),
(24, 6, 0),
(24, 9, 0),
(24, 4, 0),
(24, 2, 0),
(24, 3, 0),
(27, 2, 0),
(24, 7, 0),
(27, 3, 0),
(27, 5, 0),
(30, 6, 0),
(30, 9, 0),
(30, 7, 0),
(30, 8, 0),
(30, 4, 0),
(30, 2, 0),
(30, 3, 0),
(30, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'post_tag', '', 0, 4),
(3, 3, 'post_tag', '', 0, 3),
(4, 4, 'post_tag', '', 0, 5),
(5, 5, 'post_tag', '', 0, 2),
(6, 6, 'category', '', 0, 5),
(7, 7, 'category', '', 0, 3),
(8, 8, 'category', '', 0, 2),
(9, 9, 'category', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'addtoany_settings_pointer'),
(15, 1, 'show_welcome_panel', '1'),
(23, 1, 'session_tokens', 'a:1:{s:64:\"1b9692502d97bed337e4d8763182f5029df87cb0ae04b7b1bf9d743ed80e78b6\";a:4:{s:10:\"expiration\";i:1585927528;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:5:\"login\";i:1585754728;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4'),
(18, 1, 'wp_user-settings', 'libraryContent=browse&editor=tinymce'),
(19, 1, 'wp_user-settings-time', '1585393543');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BlsCYToD4pKPvzvABbNM25pAgJJrco0', 'admin', 'ilearning@info.com', '', '2020-03-28 10:09:41', '', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code_unique` (`code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_bookmarks`
--
ALTER TABLE `course_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_content_lectures`
--
ALTER TABLE `course_content_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_features`
--
ALTER TABLE `course_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_question`
--
ALTER TABLE `course_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_types`
--
ALTER TABLE `faq_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_thread`
--
ALTER TABLE `inbox_thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_email_unique` (`email`);

--
-- Indexes for table `school_password_resets`
--
ALTER TABLE `school_password_resets`
  ADD KEY `school_password_resets_email_index` (`email`),
  ADD KEY `school_password_resets_token_index` (`token`);

--
-- Indexes for table `school_subscription`
--
ALTER TABLE `school_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_billing_detail`
--
ALTER TABLE `student_billing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_password_resets`
--
ALTER TABLE `student_password_resets`
  ADD KEY `student_password_resets_email_index` (`email`),
  ADD KEY `student_password_resets_token_index` (`token`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_views`
--
ALTER TABLE `user_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course_bookmarks`
--
ALTER TABLE `course_bookmarks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_content_lectures`
--
ALTER TABLE `course_content_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_features`
--
ALTER TABLE `course_features`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_question`
--
ALTER TABLE `course_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq_types`
--
ALTER TABLE `faq_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inbox_thread`
--
ALTER TABLE `inbox_thread`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_subscription`
--
ALTER TABLE `school_subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_billing_detail`
--
ALTER TABLE `student_billing_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_views`
--
ALTER TABLE `user_views`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
