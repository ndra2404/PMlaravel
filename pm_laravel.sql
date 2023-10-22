-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 03:00 PM
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
-- Database: `pm_laravel`
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
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `hasil` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `id_jurusan`, `id_siswa`, `hasil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '4.28', '2023-10-22 12:26:20', NULL),
(2, 1, 2, '3.95', '2023-10-22 12:26:20', NULL),
(3, 1, 3, '1.82', '2023-10-22 12:26:20', NULL),
(4, 1, 4, '1.82', '2023-10-22 12:26:20', NULL),
(5, 1, 5, '1.82', '2023-10-22 12:26:20', NULL),
(6, 1, 6, '1.82', '2023-10-22 12:26:20', NULL),
(7, 1, 9, '1.82', '2023-10-22 12:26:20', NULL),
(8, 2, 1, '4.20', '2023-10-22 12:26:20', NULL),
(9, 2, 2, '4.37', '2023-10-22 12:26:20', NULL),
(10, 2, 3, '1.98', '2023-10-22 12:26:20', NULL),
(11, 2, 4, '1.98', '2023-10-22 12:26:20', NULL),
(12, 2, 5, '1.98', '2023-10-22 12:26:20', NULL),
(13, 2, 6, '1.98', '2023-10-22 12:26:20', NULL),
(14, 2, 9, '1.98', '2023-10-22 12:26:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jenis_name` varchar(50) NOT NULL,
  `jenis_value` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `jenis_name`, `jenis_value`, `created_at`, `updated_at`) VALUES
(1, 0, '>=85', '4', '2023-10-22 02:24:58', NULL),
(2, 0, '80-84', '3', '2023-10-22 02:24:58', NULL),
(3, 0, '76-79', '2', '2023-10-22 02:25:38', NULL),
(4, 0, '<=75', '1', '2023-10-22 02:25:38', NULL),
(5, 1, 'SB', '4', '2023-10-22 02:26:13', NULL),
(6, 1, 'B', '3', '2023-10-22 02:26:13', NULL),
(7, 1, 'C', '2', '2023-10-22 02:26:34', NULL),
(8, 1, 'D', '1', '2023-10-22 02:26:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia', '2023-10-22 02:16:44', NULL),
(2, 'TKJ', '2023-10-22 02:16:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `jenis` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Nilai Matematika', 0, '2023-10-22 02:11:29', NULL),
(2, 'Nilai B. Indonesia', 0, '2023-10-22 02:11:29', NULL),
(3, 'B. Inggris', 0, '2023-10-22 02:11:29', NULL),
(4, 'Nilai Seni Budaya', 0, '2023-10-22 02:11:29', NULL),
(5, 'Informatika', 0, '2023-10-22 02:11:29', NULL),
(6, 'Minat', 0, '2023-10-22 02:11:29', NULL),
(7, 'Nilai Sikap', 1, '2023-10-22 02:11:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias_map`
--

CREATE TABLE `kriterias_map` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `tipe` varchar(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriterias_map`
--

INSERT INTO `kriterias_map` (`id`, `id_jurusan`, `id_kriteria`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'CF', '2023-10-22 02:20:45', NULL),
(2, 1, 2, 'SF', '2023-10-22 02:20:45', NULL),
(3, 1, 3, 'CF', '2023-10-22 02:20:45', NULL),
(4, 1, 4, 'CF', '2023-10-22 02:20:45', NULL),
(5, 1, 5, 'CF', '2023-10-22 02:20:45', NULL),
(6, 1, 6, 'SF', '2023-10-22 02:20:45', NULL),
(7, 1, 7, 'SF', '2023-10-22 02:20:45', NULL),
(8, 2, 1, 'CF', '2023-10-22 02:21:36', NULL),
(9, 2, 2, 'CF', '2023-10-22 02:21:36', NULL),
(10, 2, 3, 'CF', '2023-10-22 02:21:36', NULL),
(11, 2, 4, 'SF', '2023-10-22 02:21:36', NULL),
(12, 2, 5, 'CF', '2023-10-22 02:21:37', NULL),
(13, 2, 6, 'SF', '2023-10-22 02:21:37', NULL),
(14, 2, 7, 'SF', '2023-10-22 02:21:37', NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_siswa`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(2, 1, 2, '2', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(3, 1, 3, '4', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(4, 1, 4, '3', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(5, 1, 5, '4', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(6, 1, 6, '3', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(7, 1, 7, '4', '2023-10-21 21:15:32', '2023-10-21 21:15:32'),
(8, 2, 1, '3', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(9, 2, 2, '4', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(10, 2, 3, '3', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(11, 2, 4, '3', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(12, 2, 5, '4', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(13, 2, 6, '2', '2023-10-21 21:18:33', '2023-10-21 21:18:33'),
(14, 2, 7, '2', '2023-10-21 21:18:33', '2023-10-21 21:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_minimal`
--

CREATE TABLE `nilai_minimal` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_minimal`
--

INSERT INTO `nilai_minimal` (`id`, `id_jurusan`, `id_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(2, 1, 2, 2, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(3, 1, 3, 4, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(4, 1, 4, 4, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(5, 1, 5, 3, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(6, 1, 6, 1, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(7, 1, 7, 4, '2023-10-21 22:39:07', '2023-10-21 22:39:07'),
(8, 2, 1, 4, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(9, 2, 2, 3, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(10, 2, 3, 2, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(11, 2, 4, 2, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(12, 2, 5, 4, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(13, 2, 6, 2, '2023-10-21 22:39:48', '2023-10-21 22:39:48'),
(14, 2, 7, 4, '2023-10-21 22:39:48', '2023-10-21 22:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id` int(11) NOT NULL,
  `selisih` float NOT NULL,
  `bobot` float NOT NULL,
  `ket` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembobotan`
--

INSERT INTO `pembobotan` (`id`, `selisih`, `bobot`, `ket`) VALUES
(1, 0, 5, 'Tidak Ada Selisih (kompetensi sesuai dengan yang dibutuhkan)'),
(2, 1, 4.5, 'Kompetensi individu kelebihan 1 tingkat/level'),
(3, -1, 4, 'Kompetensi individu kekurangan 1 tingkat/level'),
(4, 2, 3.5, 'Kompetensi individu kelebihan 2 tingkat/level'),
(5, -2, 3, 'Kompetensi individu kekurangan 2 tingkat/level'),
(6, 3, 2.5, 'Kompetensi individu kelebihan 3 tingkat/level'),
(7, -3, 2, 'Kompetensi individu kekurangan 3 tingkat/level'),
(8, 4, 1.5, 'Kompetensi individu kelebihan 4 tingkat/level'),
(9, -4, 1, 'Kompetensi individu kekurangan 4 tingkat/level');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `asal_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'Adinda Shafira', 'Mts Mifatahul Salam', '2023-10-22 02:32:24', NULL),
(2, 'Hani Heryusi', 'SMP DHARMA NUSA', '2023-10-22 02:32:24', NULL),
(3, 'Muhamamd Irsyad Syauki', 'SMP Informatika Bina Generasi', '2023-10-22 02:32:24', NULL),
(4, 'Nelza Avantin Yusuf', 'SMP NEGERI 04 BOGOR', '2023-10-22 02:32:24', NULL),
(5, 'Raysha Nursyafa', 'Mts Sirojul Falah', '2023-10-22 02:32:24', NULL),
(6, 'Yogas Saputra', 'SMPN ', '2023-10-22 02:32:24', NULL),
(9, 'Indra', 'Stasiun', '2023-10-22 01:34:47', '2023-10-22 01:41:21');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'INDRA', 'ndra2404@gmail.com', '2023-10-22 01:48:50', '$2y$10$gUuM/O6bhYB6dudbpnmZDuapVjC.WXGbEYSVyre/ADwNEx3WbMHRe', NULL, NULL, NULL);

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
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriterias_map`
--
ALTER TABLE `kriterias_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_minimal`
--
ALTER TABLE `nilai_minimal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriterias_map`
--
ALTER TABLE `kriterias_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_minimal`
--
ALTER TABLE `nilai_minimal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
