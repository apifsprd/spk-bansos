-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 06:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkbansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_wargas`
--

CREATE TABLE `detail_wargas` (
  `id` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `val` int(11) NOT NULL,
  `nilai` float DEFAULT NULL,
  `normalisasi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_wargas`
--

INSERT INTO `detail_wargas` (`id`, `id_warga`, `kategori`, `key`, `val`, `nilai`, `normalisasi`) VALUES
(37, 13, 'pekerjaan', 'PNS/Karyawan Swasta', 5, 0.2, 0.04),
(38, 13, 'penghasilan', '>4.000.000', 5, 0.4, 0.12),
(39, 13, 'jumlahtanggungan', '<=2', 1, 0.25, 0.05),
(40, 13, 'kondisirumah', 'Tembok Lantai Keramik', 5, 0.2, 0.06),
(45, 16, 'pekerjaan', 'PNS/Karyawan Swasta', 5, 0.2, 0.04),
(46, 16, 'penghasilan', '>4.000.000', 5, 0.4, 0.12),
(47, 16, 'jumlahtanggungan', '<=2', 1, 0.25, 0.05),
(48, 16, 'kondisirumah', 'Tembok Lantai Keramik', 5, 0.2, 0.06),
(49, 17, 'pekerjaan', 'Buruh', 3, 0.333333, 0.0666667),
(50, 17, 'penghasilan', '>2.000.000-3.000.000', 3, 0.666667, 0.2),
(51, 17, 'jumlahtanggungan', '>=5', 4, 1, 0.2),
(52, 17, 'kondisirumah', 'Tembok Lantai Keramik', 5, 0.2, 0.06),
(53, 18, 'pekerjaan', 'Petani', 2, 0.5, 0.1),
(54, 18, 'penghasilan', '1.000.000-2.000.000', 2, 1, 0.3),
(55, 18, 'jumlahtanggungan', '4', 3, 0.75, 0.15),
(56, 18, 'kondisirumah', 'Bambu Lantai Plester', 2, 0.5, 0.15),
(57, 19, 'pekerjaan', 'PNS/Karyawan Swasta', 5, 0.2, 0.04),
(58, 19, 'penghasilan', '>4.000.000', 5, 0.4, 0.12),
(59, 19, 'jumlahtanggungan', '>=5', 4, 1, 0.2),
(60, 19, 'kondisirumah', 'Tembok Lantai Keramik', 5, 0.2, 0.06),
(61, 20, 'pekerjaan', 'Lain-lain', 1, 1, 0.2),
(62, 20, 'penghasilan', '1.000.000-2.000.000', 2, 1, 0.3),
(63, 20, 'jumlahtanggungan', '3', 2, 0.5, 0.1),
(64, 20, 'kondisirumah', 'Tembok Lantai Tanah', 3, 0.333333, 0.1),
(65, 21, 'pekerjaan', 'PNS/Karyawan Swasta', 5, 0.2, 0.04),
(66, 21, 'penghasilan', '>4.000.000', 5, 0.4, 0.12),
(67, 21, 'jumlahtanggungan', '<=2', 1, 0.25, 0.05),
(68, 21, 'kondisirumah', 'Tembok Lantai Keramik', 5, 0.2, 0.06),
(69, 22, 'pekerjaan', 'Wirausaha/Wiraswasta', 4, 0.25, 0.05),
(70, 22, 'penghasilan', '1.000.000-2.000.000', 2, 1, 0.3),
(71, 22, 'jumlahtanggungan', '<=2', 1, 0.25, 0.05),
(72, 22, 'kondisirumah', 'Bambu Lantai Plester', 2, 0.5, 0.15),
(73, 23, 'pekerjaan', 'Petani', 2, 0.5, 0.1),
(74, 23, 'penghasilan', '1.000.000-2.000.000', 2, 1, 0.3),
(75, 23, 'jumlahtanggungan', '4', 3, 0.75, 0.15),
(76, 23, 'kondisirumah', 'Bambu Lantai Tanah', 1, 1, 0.3),
(81, 14, 'pekerjaan', 'Wirausaha/Wiraswasta', 4, 0.25, 0.05),
(82, 14, 'penghasilan', '>2.000.000-3.000.000', 3, 0.666667, 0.2),
(83, 14, 'jumlahtanggungan', '3', 2, 0.5, 0.1),
(84, 14, 'kondisirumah', 'Tembok Lantai Plester', 4, 0.25, 0.075);

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
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(11) NOT NULL,
  `namakriteria` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `namakriteria`, `bobot`, `attribute`, `kategori`, `nilai`, `updated_at`, `created_at`) VALUES
(20, 'Pekerjaan', 0.2, 'cost', 'PNS/Karyawan Swasta|Wirausaha/Wiraswasta|Buruh|Petani|Lain-lain', '5|4|3|2|1', '2023-04-15 06:37:37', '2023-04-15 06:37:37'),
(21, 'Penghasilan', 0.3, 'cost', '<=1.000.000|1.000.000-2.000.000|>2.000.000-3.000.000|>3.000.000-4.000.000|>4.000.000', '1|2|3|4|5', '2023-04-15 06:48:07', '2023-04-15 06:39:38'),
(22, 'Jumlah Tanggungan', 0.2, 'benefit', '<=2|3|4|>=5', '1|2|3|4', '2023-04-15 06:40:21', '2023-04-15 06:40:21'),
(23, 'Kondisi Rumah', 0.3, 'cost', 'Bambu Lantai Tanah|Bambu Lantai Plester|Tembok Lantai Tanah|Tembok Lantai Plester|Tembok Lantai Keramik', '1|2|3|4|5', '2023-04-15 06:41:37', '2023-04-15 06:41:37');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin@bansos.com', NULL, '$2y$10$HqfM/2JgJud7Wd4tNMqfouD8SUzOxvfHUMDKJAiGqiakVr/ho4wSi', NULL, '2022-11-01 07:27:41', '2022-11-01 07:27:41'),
(3, 'Hadis', 'hadis@admindesa.id', NULL, '$2y$10$mkO5ojCVrA0UEiKmiLXXSuNhwOu/n1N1Sa1A8DpPL8HiyH2Kzmc5e', NULL, '2023-02-17 06:23:36', '2023-02-17 06:23:36'),
(4, 'administrator', 'admin@spkbansos.desa', NULL, '$2y$10$WfWCHkSoKUv3W3PlE13DTeU9MBosT/hUGfwSU5nCA7jWWaArUodc6', NULL, '2023-04-07 02:35:17', '2023-04-07 02:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `wargas`
--

CREATE TABLE `wargas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wargas`
--

INSERT INTO `wargas` (`id`, `nama`, `nik`) VALUES
(13, 'Ratno', '307981239218412'),
(14, 'Rudi', '149381798301841035'),
(16, 'Rukmanah', '6619276841239'),
(17, 'Salim', '1812323912311'),
(18, 'Sumiyati', '123580234981294'),
(19, 'Tio', '24356179833812479'),
(20, 'Nurdin', '134812398112523'),
(21, 'Marwan', '134234718982388'),
(22, 'Sumarni', '12124712839'),
(23, 'Yanto', '1248172939798');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_wargas`
--
ALTER TABLE `detail_wargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `wargas`
--
ALTER TABLE `wargas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_wargas`
--
ALTER TABLE `detail_wargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wargas`
--
ALTER TABLE `wargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
