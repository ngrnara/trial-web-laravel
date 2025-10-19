-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2025 at 04:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2025_09_11_085220_create_pegawais_table', 1),
(17, '2025_09_12_021003_rename_pegawais_to_pegawai', 1),
(18, '2025_09_12_032915_rename_pegawai_table_to_pegawais', 1),
(19, '2025_09_12_040308_ubah_struktur_tabel_pegawai_fix', 1),
(20, '2025_10_19_111154_update_users_table_add_security_fields', 1),
(21, '2025_10_19_111158_update_users_table_add_security_fields', 1);

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_asli` text DEFAULT NULL,
  `password_enkripsi` text DEFAULT NULL,
  `hash_dari_enkripsi` text DEFAULT NULL,
  `salt_value` varchar(255) DEFAULT NULL,
  `final_hash` text DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `password_asli`, `password_enkripsi`, `hash_dari_enkripsi`, `salt_value`, `final_hash`, `user_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Utama', 'admin@example.com', '2025-10-19 04:39:55', '$2y$10$BKh/N5xXJRa8jrjZ1jYU/./lR2z7YJrAiAwvANr9Wta7OusBgOkPS', 'password123', 'eyJpdiI6IkFKbm9KMnQxdmk4S0VFVC92WWl2b0E9PSIsInZhbHVlIjoiMmlyUVk0SG5md1FFVHNVcWtTY3RrUT09IiwibWFjIjoiZjNkODJkZDBjZmZjMWRiYjk3ZDk4ZTM0YjEzOTcwMGQxYjVkMDE2ODM4OGZlZmZmZGI2OThkNzZmNGJkZWI0MCIsInRhZyI6IiJ9', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '745a43962df1eb56', '372eef70e92798371fbc789e0aee4b20d66a499c412de98fd62a3512c744b0b78813cfbe6524d5a69da566948d37aba3644c1172403c2b945ad7f4bc995780fe', NULL, NULL, '2025-10-19 04:39:55', '2025-10-19 04:39:55'),
(3, 'nara', 'nara@gmail.com', NULL, '$2y$10$szflS2xjV9VACrjf329pr.lS5g1t2Q4cIb6cWBrGUTeQYKqHzi7eO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-19 04:48:57', '2025-10-19 04:48:57'),
(4, 'nara1', 'nara1@gmail.com', NULL, '$2y$10$FmnVPas69NNvuEjotmonrOujmX/8RLkVZDm8WJvJ2Ko3gaWSmT1S2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-19 04:50:28', '2025-10-19 04:50:28'),
(5, 'nara12', 'nara12@gmail.com', NULL, '$2y$10$JlbMr78Gnml672L8/0Li9O/8ZUxFwAVfpGc33bSjm9ydYWgqfD/oS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-19 04:53:51', '2025-10-19 04:53:51'),
(6, 'nara123', 'nara123@gmail.com', NULL, '$2y$10$das5HEpBbd6Miz946.aaUOfIn0Urwjx5zsX5gWSLxN3K8EAamcCeC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-19 05:59:07', '2025-10-19 05:59:07'),
(7, 'qweqeqw', 'dasndah@gmail.com', NULL, '$2y$10$/psEl6RuYfBqIh7pZq.oteFl50sHdez.NIjos2l5c6vg3GfatX8/i', 'asdasdasd', 'eyJpdiI6InhlYk5BRkFiWHkrSzB6UnVGc3pMOWc9PSIsInZhbHVlIjoiMDQwTG9COUZvTzFsOEZuamt5ekt0Zz09IiwibWFjIjoiMDhhNWVlZDI2M2MxOGVjMzQ3OGI5ZGY0ZTQyMzhhNmNmMTkzOWQ3MjcxMWIwZTMzMjkyNzk1NDgyNWQ1N2VjZCIsInRhZyI6IiJ9', 'd8a928b2043db77e340b523547bf16cb4aa483f0645fe0a290ed1f20aab76257', 'IK0gMecSA6fx5RRl', '$2y$10$teqPf2JWjapGoyIGKOK.TOuMZUjQDIzWSr364ufE8iMy5ZTAmxu.C', NULL, NULL, '2025-10-19 06:15:04', '2025-10-19 06:15:04');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
