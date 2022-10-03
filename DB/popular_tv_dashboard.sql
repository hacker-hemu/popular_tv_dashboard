-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 06:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popular_tv_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `go_link` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `image`, `call_number`, `go_link`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Ad', '1663433290.png', '1234567890', 'http://hello.com', 0, 2, '2022-09-17 14:43:01', '2022-09-17 16:48:10'),
(2, 'Test Ad', '1663434344.png', '0987654321', 'https://hello.com', 1, 2, '2022-09-17 15:19:39', '2022-09-17 17:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(11, 'News', 'News Category Description', 1, '1663436805.jpg', '2022-09-13 13:09:06', '2022-09-17 17:46:45'),
(14, 'Live', 'Live category description', 1, '1663155925.jpg', '2022-09-13 13:38:09', '2022-09-17 17:46:56'),
(19, 'Movie', 'Movie category description', 1, '1663208916.jpg', '2022-09-15 02:28:36', '2022-09-15 02:28:36'),
(20, 'Music', 'Music Category Description', 1, '1663231726.png', '2022-09-15 08:48:46', '2022-09-15 08:48:46'),
(21, 'Sports', 'Sports Channel Category Description', 1, '1663238893.png', '2022-09-15 10:48:13', '2022-09-15 10:48:13'),
(22, 'Test Category', 'Test Category description', 1, '1663254662.jpg', '2022-09-15 15:11:02', '2022-09-15 15:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link_type` tinyint(11) NOT NULL DEFAULT 1,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `in_slider` tinyint(1) NOT NULL DEFAULT 0,
  `like` bigint(20) NOT NULL,
  `view` bigint(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `category_id`, `name`, `title`, `status`, `image`, `video_link`, `video_link_type`, `is_favorite`, `is_popular`, `in_slider`, `like`, `view`, `created_by`, `created_at`, `updated_at`) VALUES
(12, 14, 'Popular Tv Edit', 'Popular Tv live 23 X 7 edit', 1, '1663177853.png', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/JSLo1DKZcIw\" title=\"आज के समाचार  | Popular TV Live | 24 X 7 |  बड़ी खबरें  #breakingnews   #LiveUpdates\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2, 1, 1, 1, 0, 0, 2, '2022-09-14 10:24:40', '2022-09-15 08:40:40'),
(13, 21, 'Popular Sports', 'Popular Sports Live 24 X 7', 1, '1663427763.png', 'video link', 1, 0, 1, 1, 0, 0, 2, '2022-09-14 11:43:25', '2022-09-17 15:16:03'),
(14, 20, '9xM', 'Music channel is very popular', 0, '1663231784.jpg', 'video_link.mp4', 2, 0, 1, 1, 0, 0, 2, '2022-09-15 02:21:12', '2022-09-15 08:51:53'),
(15, 19, 'Zee Cinema', 'Zee cinema channel title', 1, '1663209076.jpg', 'https://www.youtube.com/watch?v=JSLo1DKZcIw', 3, 1, 1, 1, 0, 0, 3, '2022-09-15 02:31:16', '2022-09-15 10:47:21'),
(16, 11, 'Zee News', 'Zee News Channel', 1, '1663226689.png', 'link.vidoe', 2, 1, 0, 0, 0, 0, 2, '2022-09-15 07:24:49', '2022-09-15 08:50:43'),
(21, 11, 'News Nation', 'This is news nation title', 1, '1663473289.png', 'http.dsffd.', 3, 0, 0, 0, 0, 0, 2, '2022-09-18 03:54:49', '2022-09-18 03:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_10_220219_add_role_as_to_users_table', 1),
(6, '2022_09_10_230739_create_categories_table', 2),
(10, '2022_09_11_123219_change_img_type_to_categories_table', 3),
(11, '2022_09_13_212233_create_channels_table', 4),
(15, '2022_09_14_101821_add_in_slider_to_channels_table', 5),
(17, '2022_09_17_164833_create_ads_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_as`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hemant', 'hemant@example.com', 0, NULL, '$2y$10$QIFXdFZFTVeR3B5GZkr5IOZwC8WsmlzU.ohb26zw29f24tc3Fkqhq', NULL, '2022-09-10 16:43:18', '2022-09-10 16:43:18'),
(2, 'Admin', 'admin@example.com', 1, NULL, '$2y$10$hC0D.U8oc487i2xuqXfD4OKAA2FoX5PJf4uz4HmTikQLEY00gTFoa', 'T8NwRpiUi6trBSQTkyoSlrYkFr7D6F9bMDSOiFpXhthR3w89sXbfHxIQ80Ml', '2022-09-10 16:43:50', '2022-09-10 16:43:50'),
(10, 'Test User', 'test@example.com', 0, NULL, '$2y$10$8OKson1KiwlBKi4fio7wI.w0NPr4xUQDHZEc6qeE1E5jfDfIOh9y.', NULL, '2022-09-16 11:38:18', '2022-09-16 11:38:18'),
(11, 'Ankit', 'ankit@example.com', 0, NULL, '$2y$10$Fud74o6ZKwgaGAfmQfsDzOsvVS67gCA1Zht05cUqxOamrKtg4yz.G', NULL, '2022-09-16 12:05:06', '2022-09-16 12:05:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
