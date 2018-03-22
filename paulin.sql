-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 05:29 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paulin`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(191) NOT NULL,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `image` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `views` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(70) NOT NULL,
  `browser` varchar(190) NOT NULL,
  `os_system` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `content`, `ip`, `browser`, `os_system`, `created_at`, `updated_at`) VALUES
(1, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:03:14', '2018-03-22 16:03:14'),
(2, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:05:49', '2018-03-22 16:05:49'),
(3, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:07:49', '2018-03-22 16:07:49'),
(4, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:08:03', '2018-03-22 16:08:03'),
(5, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:08:51', '2018-03-22 16:08:51'),
(6, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:09:02', '2018-03-22 16:09:02'),
(7, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:09:13', '2018-03-22 16:09:13'),
(8, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:09:29', '2018-03-22 16:09:29'),
(9, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:09:40', '2018-03-22 16:09:40'),
(10, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:09:55', '2018-03-22 16:09:55'),
(11, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:04', '2018-03-22 16:10:04'),
(12, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:13', '2018-03-22 16:10:13'),
(13, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:20', '2018-03-22 16:10:20'),
(14, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:36', '2018-03-22 16:10:36'),
(15, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:44', '2018-03-22 16:10:44'),
(16, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:10:51', '2018-03-22 16:10:51'),
(17, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:02', '2018-03-22 16:11:02'),
(18, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:12', '2018-03-22 16:11:12'),
(19, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:18', '2018-03-22 16:11:18'),
(20, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:31', '2018-03-22 16:11:31'),
(21, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:37', '2018-03-22 16:11:37'),
(22, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:45', '2018-03-22 16:11:45'),
(23, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:11:52', '2018-03-22 16:11:52'),
(24, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:12:03', '2018-03-22 16:12:03'),
(25, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:12:09', '2018-03-22 16:12:09'),
(26, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:12:18', '2018-03-22 16:12:18'),
(27, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:12:29', '2018-03-22 16:12:29'),
(28, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:12:41', '2018-03-22 16:12:41'),
(29, 'Usuário alterou permissao-2, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:13:50', '2018-03-22 16:13:50'),
(30, 'Usuário criou nova permissao, user: Joao Sysop', '127.0.0.1', 'Chrome', 'unknown', '2018-03-22 16:17:25', '2018-03-22 16:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_03_175912_create_settings_table', 1),
(4, '2018_03_03_193631_create_blog_categories_table', 1),
(5, '2018_03_03_194723_create_services_table', 1),
(6, '2018_03_03_197354_create_blogs_table', 1),
(7, '2018_03_03_202433_create_sliders_table', 1),
(8, '2018_03_03_203119_create_visitors_table', 1),
(9, '2018_03_03_231730_create_page_views_table', 1),
(10, '2018_03_05_180250_create_logs_table', 1),
(11, '2018_03_19_145700_entrust_setup_tables', 1),
(12, '2018_03_20_162049_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE IF NOT EXISTS `page_views` (
  `id` int(10) unsigned NOT NULL,
  `from_pid` varchar(15) NOT NULL,
  `from_ip` varchar(70) NOT NULL,
  `from_os` varchar(100) NOT NULL,
  `from_wb` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'c-blog', NULL, 'Create blog', '2018-03-22 16:03:14', '2018-03-22 16:03:14'),
(2, 'r-blog', NULL, 'Read blog', '2018-03-22 16:05:49', '2018-03-22 16:13:50'),
(3, 'u-blog', NULL, 'Update blog', '2018-03-22 16:07:49', '2018-03-22 16:07:49'),
(4, 'd-blog', NULL, 'Delete blog', '2018-03-22 16:08:02', '2018-03-22 16:08:02'),
(5, 'c-blogcateg', NULL, 'Create blog category', '2018-03-22 16:08:51', '2018-03-22 16:08:51'),
(6, 'r-blogcateg', NULL, 'Read blog category', '2018-03-22 16:09:02', '2018-03-22 16:09:02'),
(7, 'u-blogcateg', NULL, 'Update blog category', '2018-03-22 16:09:13', '2018-03-22 16:09:13'),
(8, 'd-blogcateg', NULL, 'Delete blog category', '2018-03-22 16:09:29', '2018-03-22 16:09:29'),
(9, 'r-logs', NULL, 'Read logs', '2018-03-22 16:09:40', '2018-03-22 16:09:40'),
(10, 'c-permissions', NULL, 'Create permissions', '2018-03-22 16:09:55', '2018-03-22 16:09:55'),
(11, 'r-permissions', NULL, 'Read permissions', '2018-03-22 16:10:04', '2018-03-22 16:10:04'),
(12, 'u-permissions', NULL, 'Update permissions', '2018-03-22 16:10:13', '2018-03-22 16:10:13'),
(13, 'd-permissions', NULL, 'Delete permissions', '2018-03-22 16:10:20', '2018-03-22 16:10:20'),
(14, 'c-roles', NULL, 'Create roles', '2018-03-22 16:10:35', '2018-03-22 16:10:35'),
(15, 'r-roles', NULL, 'Read roles', '2018-03-22 16:10:44', '2018-03-22 16:10:44'),
(16, 'u-roles', NULL, 'Update roles', '2018-03-22 16:10:51', '2018-03-22 16:10:51'),
(17, 'd-roles', NULL, 'Delete roles', '2018-03-22 16:11:02', '2018-03-22 16:11:02'),
(18, 'c-services', NULL, 'Create services', '2018-03-22 16:11:12', '2018-03-22 16:11:12'),
(19, 'r-services', NULL, 'Read services', '2018-03-22 16:11:18', '2018-03-22 16:11:18'),
(20, 'u-services', NULL, 'Update services', '2018-03-22 16:11:31', '2018-03-22 16:11:31'),
(21, 'd-services', NULL, 'Delete services', '2018-03-22 16:11:37', '2018-03-22 16:11:37'),
(22, 'r-settings', NULL, 'Read settings', '2018-03-22 16:11:45', '2018-03-22 16:11:45'),
(23, 'u-settings', NULL, 'Update settings', '2018-03-22 16:11:52', '2018-03-22 16:11:52'),
(24, 'c-users', NULL, 'Create users', '2018-03-22 16:12:03', '2018-03-22 16:12:03'),
(25, 'r-users', NULL, 'Read users', '2018-03-22 16:12:09', '2018-03-22 16:12:09'),
(26, 'u-users', NULL, 'Update users', '2018-03-22 16:12:18', '2018-03-22 16:12:18'),
(27, 'd-users', NULL, 'Delete users', '2018-03-22 16:12:29', '2018-03-22 16:12:29'),
(28, 'r-visitors', NULL, 'Read visitors', '2018-03-22 16:12:41', '2018-03-22 16:12:41'),
(29, 'clearcache', NULL, 'Clear cache', '2018-03-22 16:17:25', '2018-03-22 16:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
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
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sysop', NULL, 'Sysop do sistema todo', '2018-03-22 16:15:52', '2018-03-22 16:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(191) NOT NULL,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `image` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `views` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `site_title` varchar(191) NOT NULL,
  `phone1` varchar(45) DEFAULT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `email1` varchar(191) DEFAULT NULL,
  `email2` varchar(191) DEFAULT NULL,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `estate` varchar(45) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `geolat` double(10,6) DEFAULT NULL,
  `geolng` double(10,6) DEFAULT NULL,
  `ganalytics` text,
  `social_facebook` varchar(191) DEFAULT NULL,
  `social_twitter` varchar(191) DEFAULT NULL,
  `social_pinterest` varchar(191) DEFAULT NULL,
  `social_linkedin` varchar(191) DEFAULT NULL,
  `social_googleplus` varchar(191) DEFAULT NULL,
  `social_youtube` varchar(191) DEFAULT NULL,
  `social_skype` varchar(191) DEFAULT NULL,
  `social_instagram` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(70) NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `description` text,
  `class` enum('sysop','admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `description`, `class`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joao Sysop', 'me@me.com', '$2y$10$5MlqcZlU7nQiSLhkxXs81.OEvvfYmOaEvzi2PQLsPjsAT.AVB0lVq', NULL, NULL, 'sysop', NULL, '2018-03-22 15:48:00', '2018-03-22 15:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(10) unsigned NOT NULL,
  `ip` varchar(70) NOT NULL,
  `country` varchar(45) NOT NULL,
  `city` varchar(100) NOT NULL,
  `estate` varchar(100) NOT NULL,
  `os_system` varchar(100) NOT NULL,
  `browser` varchar(191) NOT NULL,
  `has_returned` tinyint(1) NOT NULL DEFAULT '0',
  `access` smallint(5) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `country`, `city`, `estate`, `os_system`, `browser`, `has_returned`, `access`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '', '', '', 'unknown', 'Chrome', 1, 2, '2018-03-22 15:47:24', '2018-03-22 15:47:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_index` (`user_id`),
  ADD KEY `blogs_category_id_index` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`),
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
