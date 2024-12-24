-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 05:51 PM
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
-- Database: `poliklinik_bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('budi@gmail.com|127.0.0.1', 'i:1;', 1734512729),
('budi@gmail.com|127.0.0.1:timer', 'i:1734512729;', 1734512729),
('testing@gmail.com|127.0.0.1', 'i:1;', 1734428146),
('testing@gmail.com|127.0.0.1:timer', 'i:1734428146;', 1734428146);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `created_at`, `updated_at`, `status`) VALUES
(1, 6, 1, 'Sakit Gigi', 1, '2024-12-19 02:59:30', '2024-12-21 06:55:45', 1),
(2, 6, 5, 'Sakit Bagian Perut Atas', 2, '2024-12-21 07:01:44', '2024-12-23 01:30:29', 1),
(3, 7, 5, 'Sakit Maag', 3, '2024-12-23 01:38:34', '2024-12-23 01:40:07', 1),
(4, 6, 15, 'Sakit Gigi Lagi', 4, '2024-12-23 02:14:50', '2024-12-23 02:15:54', 1),
(5, 6, 14, 'Sakit Gigi Lagi Astaga', 5, '2024-12-23 02:37:38', '2024-12-23 05:33:49', 1),
(6, 7, 4, 'Sakit Gigi Sebelah Kanan', 6, '2024-12-24 07:14:06', '2024-12-24 07:15:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_periksa` bigint(20) UNSIGNED NOT NULL,
  `id_obat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-12-21 06:55:45', '2024-12-21 06:55:45'),
(2, 2, 10, '2024-12-23 01:30:29', '2024-12-23 01:30:29'),
(3, 3, 9, '2024-12-23 01:40:07', '2024-12-23 01:40:07'),
(4, 4, 1, '2024-12-23 02:15:54', '2024-12-23 02:15:54'),
(5, 5, 1, '2024-12-23 05:33:49', '2024-12-23 05:33:49'),
(6, 5, 2, '2024-12-23 05:33:49', '2024-12-23 05:33:49'),
(7, 5, 3, '2024-12-23 05:33:49', '2024-12-23 05:33:49'),
(8, 6, 1, '2024-12-24 07:15:19', '2024-12-24 07:15:19'),
(9, 6, 3, '2024-12-24 07:15:19', '2024-12-24 07:15:19'),
(10, 6, 4, '2024-12-24 07:15:19', '2024-12-24 07:15:19'),
(11, 6, 6, '2024-12-24 07:15:19', '2024-12-24 07:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `user_id`, `id_poli`, `created_at`, `updated_at`) VALUES
(2, 'Dr. James', 'jl. Singa no. 5', 85746542, 7, 1, '2024-12-10 05:42:18', '2024-12-23 02:13:30'),
(4, 'Dr. Bond', 'Jl. Kartini No. 1', 12312312, 18, 2, '2024-12-18 00:34:45', '2024-12-18 00:34:45');

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
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(1, 2, 'Senin', '12:00:00', '17:00:00', '2024-12-18 00:23:32', '2024-12-18 00:23:32'),
(2, 2, 'Selasa', '12:00:00', '17:00:00', '2024-12-18 00:23:55', '2024-12-18 00:32:49'),
(4, 2, 'Rabu', '11:00:00', '17:00:00', '2024-12-18 02:04:11', '2024-12-18 02:04:11'),
(5, 4, 'Senin', '08:00:00', '11:00:00', '2024-12-19 03:05:17', '2024-12-19 03:05:17'),
(6, 4, 'Kamis', '10:00:00', '15:30:00', '2024-12-19 03:05:30', '2024-12-19 03:05:30'),
(11, 2, 'Senin', '09:00:00', '11:00:00', '2024-12-19 21:59:27', '2024-12-19 21:59:27'),
(14, 2, 'Selasa', '08:00:00', '10:00:00', '2024-12-19 22:15:25', '2024-12-19 22:15:25'),
(15, 2, 'jumat', '10:00:00', '15:00:00', '2024-12-23 02:13:58', '2024-12-23 02:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--
-- Error reading structure for table poliklinik_bk.job_batches: #1932 - Table &#039;poliklinik_bk.job_batches&#039; doesn&#039;t exist in engine
-- Error reading data for table poliklinik_bk.job_batches: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `poliklinik_bk`.`job_batches`&#039; at line 1

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
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(27, '2024_12_06_131703_create_poli_table', 2),
(28, '2024_12_06_131729_create_obat_table', 2),
(29, '2024_12_06_131808_create_pasien_table', 2),
(30, '2024_12_06_131839_create_dokter_table', 2),
(31, '2024_12_06_131910_create_jadwal_periksa_table', 2),
(32, '2024_12_06_131944_create_daftar_poli_table', 2),
(33, '2024_12_06_132035_create_periksa_table', 2),
(34, '2024_12_06_132119_create_detail_periksa_table', 2),
(35, '2024_12_09_114154_add_user_id_column_to_dokter_table', 2),
(36, '2024_12_10_133206_add_user_id_column_to_pasien_table', 3),
(39, '2024_12_18_104942_add_status_column_to_daftar_poli_table', 4),
(40, '2024_12_20_044613_add_unique_rule_in_jadwal_periksa_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol 500 mg', 'Tablet 500 mg', 23000, '2024-12-11 21:38:13', '2024-12-11 21:38:13'),
(2, 'Ibuprofen 400 mg', 'Tablet', 15000, '2024-12-21 06:08:50', '2024-12-21 06:11:49'),
(3, 'Amoxicillin 500 mg', 'Kapsul', 20000, '2024-12-21 06:09:24', '2024-12-21 06:09:24'),
(4, 'Metronidazole 500 mg', 'Tablet', 25000, '2024-12-21 06:09:46', '2024-12-21 06:09:46'),
(5, 'Chlorhexidine Gluconate 0,12%', 'Botol 150 ml', 45000, '2024-12-21 06:10:16', '2024-12-21 06:10:16'),
(6, 'Povidone-Iodine 1%', 'Botol 100 ml', 37000, '2024-12-21 06:10:35', '2024-12-21 06:10:35'),
(7, 'Nystatin Oral Suspension', 'Botol 100 ml', 80000, '2024-12-21 06:11:29', '2024-12-21 06:11:29'),
(8, 'Vitamin C 500 mg', 'Tablet', 23000, '2024-12-21 06:11:42', '2024-12-21 06:11:42'),
(9, 'Mylanta 150 ml', 'botol 150 ml', 35000, '2024-12-23 01:28:09', '2024-12-23 01:28:09'),
(10, 'Lansoprazole 15 mg', 'Kapsul', 27000, '2024-12-23 01:28:43', '2024-12-23 01:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `no_rm` char(10) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Bambang', 'Jl. Halmahera Raya No. 10', 12312323, 273223412, '202412-6', 15, '2024-12-16 07:14:17', '2024-12-16 07:14:17'),
(7, 'phineas', 'Jl. Semangka No. 15', 45645645, 123123123, '202412-7', 16, '2024-12-16 23:32:51', '2024-12-16 23:32:51');

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
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_daftar_poli` bigint(20) UNSIGNED NOT NULL,
  `tgl_periksa` date NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-21', 'Ibuprofen 400 mg dengan dosis 1 tablet diminum 3 kali sehari setelah makan.', 165000, '2024-12-21 06:55:45', '2024-12-21 06:55:45'),
(2, 2, '2024-12-23', 'Lansoprazole 15 mg dengan dosis 1 kapsul diminum sebelum makan, 1 kali sehari.', 177000, '2024-12-23 01:30:29', '2024-12-23 01:30:29'),
(3, 3, '2024-12-23', 'Mylanta 150 ml, dengan dosis Diminum 1-2 tablet atau 1 sendok makan cairan, 1 jam setelah makan atau saat gejala muncul.', 185000, '2024-12-23 01:40:07', '2024-12-23 01:40:07'),
(4, 4, '2024-12-23', 'test', 173000, '2024-12-23 02:15:54', '2024-12-23 02:15:54'),
(5, 5, '2024-12-23', 'testing sajah', 208000, '2024-12-23 05:33:49', '2024-12-23 05:33:49'),
(6, 6, '2024-12-24', 'Minum Air Putih dan semua obat dimakan setelah makan.', 255000, '2024-12-24 07:15:19', '2024-12-24 07:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Poli Gigi', 'Poli gigi adalah unit layanan kesehatan di fasilitas medis yang khusus menangani masalah kesehatan gigi dan mulut. Di poli ini, pasien dapat memperoleh berbagai jenis perawatan, mulai dari pembersihan karang gigi, tambal gigi, pencabutan gigi, hingga perawatan ortodontik seperti pemasangan kawat gigi. Selain itu, poli gigi juga memberikan edukasi tentang cara menjaga kesehatan gigi dan mulut, termasuk pentingnya menyikat gigi secara rutin dan menghindari konsumsi makanan yang dapat merusak gigi. Dengan tenaga medis yang kompeten, seperti dokter gigi dan asisten gigi, poli ini bertujuan untuk meningkatkan kualitas kesehatan gigi masyarakat dan mencegah masalah gigi yang lebih serius di masa depan.\r\n', NULL, NULL),
(2, 'Poli Penyakit Dalam', 'Poli Penyakit Dalam adalah layanan medis yang fokus pada diagnosis, pengobatan, dan pencegahan berbagai penyakit yang menyerang organ dalam tubuh. Layanan ini ditangani oleh dokter spesialis penyakit dalam, atau internis, yang memiliki keahlian dalam menangani penyakit-penyakit seperti hipertensi, diabetes, penyakit jantung, gangguan saluran cerna, penyakit paru-paru, infeksi kronis seperti tuberkulosis, hingga penyakit autoimun dan rematik. Pasien yang mengalami gejala seperti nyeri dada, gangguan pencernaan, bengkak pada tubuh, kelelahan tanpa sebab, atau demam yang berkepanjangan disarankan untuk berkonsultasi di poli ini. Pemeriksaan biasanya melibatkan konsultasi medis, pemeriksaan fisik, dan pemeriksaan penunjang seperti laboratorium darah atau radiologi, yang kemudian diikuti dengan manajemen terapi sesuai kebutuhan. Poli Penyakit Dalam memainkan peran penting dalam menjaga kesehatan pasien melalui pendekatan yang komprehensif terhadap berbagai gangguan organ dalam.', '2024-12-10 05:44:49', '2024-12-10 05:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SLabArXLVTtSvbCaxj5g22YzUPo5zT9C7Mp2nq59', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMms4N0ljRUNvTUVWWU5RZzFpY0ZORlA4bk9XbTRVbzV2S2FOcjlYZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1735058783);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'pasien',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pasien', 'pasien@gmail.com', 'pasien', NULL, '$2y$12$WuCbVl6G9ipjMQ84lc./d.zUdrMeUI0YxURczlZ8R1vqc0MCRvZZK', NULL, '2024-12-04 05:20:11', '2024-12-04 05:20:11'),
(2, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$7NOGMBO/iZ3dJe.53ab9f.rMd1t84UdIzF.SWlu0M8ZNWZEsf3Y32', NULL, '2024-12-04 05:21:08', '2024-12-04 05:21:08'),
(7, 'Dr. James', 'james@gmail.com', 'dokter', NULL, '$2y$12$BfneyUPUnzKDnU/MtHwoMewAe7t5SvaTL7VCur70Zw9nPTWYaoArG', NULL, '2024-12-10 05:42:18', '2024-12-17 02:26:14'),
(15, 'Bambang', 'bambang@gmail.com', 'pasien', NULL, '$2y$12$V0EgZ967LtehrM.OXwu3R.sasYOfvhG5tse4PDk5gWbQQrg1v/6ZK', NULL, '2024-12-16 07:14:17', '2024-12-16 07:14:17'),
(16, 'phineas', 'phineas@gmail.com', 'pasien', NULL, '$2y$12$4SlY116AogpHPyWM2.G9feHfrQgnzrmV9tDVI8Pav9bKjo7bLWuhi', NULL, '2024-12-16 23:32:51', '2024-12-16 23:32:51'),
(18, 'Dr. Bond', 'bond@gmail.com', 'dokter', NULL, '$2y$12$ubdrzjDhZmaTqWSz00eXGeiwpJHca8LcGbnQ.Ll83rZdQLs4GeAfy', NULL, '2024-12-18 00:34:45', '2024-12-18 00:34:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_poli_id_pasien_foreign` (`id_pasien`),
  ADD KEY `daftar_poli_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_periksa_id_periksa_foreign` (`id_periksa`),
  ADD KEY `detail_periksa_id_obat_foreign` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id_poli_foreign` (`id_poli`),
  ADD KEY `dokter_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_hari_jam` (`hari`,`jam_mulai`,`jam_selesai`),
  ADD KEY `jadwal_periksa_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periksa_id_daftar_poli_foreign` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `daftar_poli_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_poli_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `detail_periksa_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_periksa_id_periksa_foreign` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokter_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `jadwal_periksa_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_id_daftar_poli_foreign` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
