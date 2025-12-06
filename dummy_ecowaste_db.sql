-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2025 at 06:22 PM
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
-- Database: `ecowaste_db`
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

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_25_131620_create_waste_knowledge_table', 1);

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
('8T4MkmlJbRnd3jxQJwd6uj19MoL1FcHLiGoYiuoP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDR2TktDNDlSR1VTWGNYQkdQYzdheFB3OW9zaUZHWmhjMUdKQzJYQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb25zdWx0YXNpIjtzOjU6InJvdXRlIjtzOjEwOiJrb25zdWx0YXNpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1764866470),
('hhGMZ89IS6AGRWCTqJm7OlchX7yv8hKcJYrqNU4M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGhVRWk2Tk9WVmYzdW1DUUcxZzhCNEJKZ3hsOVQ3WThXUm5TSnMwcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9rbm93bGVkZ2UiO3M6NToicm91dGUiO3M6MjE6ImFkbWluLmtub3dsZWRnZS5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764877118),
('HRn9U3x3pBihzuFiRaZqqHwJbLFB7WISiP6KQysu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajB0dDZxdGdialhmTWhNSGtrN0RmQm10SVp2STNQUmZmSXltMjd2VCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lZHVrYXNpIjtzOjU6InJvdXRlIjtzOjc6ImVkdWthc2kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1764898798);

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

-- --------------------------------------------------------

--
-- Table structure for table `waste_knowledge`
--

CREATE TABLE `waste_knowledge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_sampah` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `ciri_ciri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ciri_ciri`)),
  `pengelolaan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `langkah_langkah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`langkah_langkah`)),
  `kategori` varchar(255) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waste_knowledge`
--

INSERT INTO `waste_knowledge` (`id`, `jenis_sampah`, `icon`, `ciri_ciri`, `pengelolaan`, `deskripsi`, `langkah_langkah`, `kategori`, `aktif`, `created_at`, `updated_at`) VALUES
(29, 'Sampah Organik Basah (Sisa Makanan)', '🍽️', '{\"tekstur\": \"basah, lembek\", \"bau\": \"berbau\", \"asal\": \"sisa makanan, masakan\"}', 'Kompos atau Biogas', 'Sampah sisa makanan yang mudah terurai dan dapat diolah menjadi kompos atau biogas. Alat dan bahan:\r\nsekam, composter bag/ember/tong diberi lubang kecil di bagian bawah, \r\ngula pasir/gula merah, \r\nair, \r\nsisa makanan', '[\"Masukkan sekam sebagai pelapis dasar ke dalam composter bag\",\"Masukkan limbah dapur\\/sisa makanan\",\"Masukkan sekam sebagai penutup sisa makanan agar baunya tidak terlalu tajam\",\"Campurkan air secukupnya dengan 3 sendok makan gula\",\"Masukkan cairan tersebut ke dalam komposter bag\",\"Tutup composter bag\",\"Diamkan limbah dapur\\/sisa makanan tersebut selama 3 bulan,sesekali buka composter bag dan aduk-aduk\"]', 'organik', 1, NULL, '2025-12-03 11:19:20'),
(30, 'Sampah Organik Kering (Daun & Ranting)', '🍂', '{\"tekstur\": \"kering, keras\", \"bau\": \"tidak berbau\", \"asal\": \"tumbuhan, daun, ranting\"}', 'Kompos Kering atau Mulsa', 'Sampah dari tumbuhan yang dapat dijadikan kompos kering atau mulsa untuk tanaman', '[\"Pisahkan dari sampah basah\",\"Jadikan bahan baku kompos sebagai sampah cokelat (penambah karbon) atau dimanfaatkan untuk mulsa\"]', 'organik', 1, NULL, '2025-11-27 13:03:25'),
(32, 'Plastik Kemasan & Botol', '🥤', '{\"tekstur\": \"licin, kering\", \"bau\": \"tidak berbau\", \"asal\": \"kemasan, botol, plastik\"}', 'Daur Ulang', 'Kemasan plastik dan botol yang dapat didaur ulang menjadi produk baru, misalnya ecobrick', '[\"Botol-botol plastik bekas disiapkan  sebagai media dasar ecobrick, misalnya  botol air mineral, botol bekas kemasan  minyak goreng dan lain sebagainya,dengan  ukuran botol kemasan sama. Botol dicuci  hingga bersih dan dikeringkan.\",\"Berbagai macam kemasan plastik dikumpulkan untuk mengisi wadah, seperti kemasan mie instan, minuman-minuman instan, plastik pembungkus, tas plastik dan sebagainya. Pastikan plastik-plastik tersebut tidak ada sisa makanan dan dan dalam keadaan kering.\",\"Selanjutnya kemasan plastik digunting  kecil-kecil dan dimasukkan ke dalam botol  plastik hingga sangat padat dan mengisi seluruh ruangan dalam botol plastik.\",\"Cara memadatkan bisa menggunakan alat  yang terbuat dari bambu atau kayu (seperti  tongkat bambu atau kayu)\",\"Botol-botol plastik yang berukuran sama  disusun dan digabungkan serapi mungkin\",\"Selotip bening digunakan untuk merekatkan satu botol dengan botol yang lainnya. Botol-botol tersebut diikat kuat kuat dengan menggunakan tali atau benang agar bisa merekat kuat.\",\"Gabungan botol-botol plaastik bekas yang  telah diikat dapat dibuat kursi, meja, hiasan  rumah dll.\"]', 'anorganik', 1, NULL, '2025-12-04 04:59:34'),
(33, 'Kertas & Kardus', '📦', '{\"tekstur\": \"kering, keras\", \"bau\": \"tidak berbau\", \"asal\": \"kertas, kardus, kemasan\"}', 'Daur Ulang Kertas', 'Kertas dan kardus bekas yang dapat didaur ulang', '[\"Pisahkan dari sampah basah\",\"Lipat rapi\",\"Kumpulkan untuk didaur ulang\",\"atau kumpulkan untuk dijual ke Bank Sampah\"]', 'anorganik', 1, NULL, '2025-11-27 12:50:44'),
(34, 'Kaleng & Logam', '🔩', '{\"tekstur\":\"keras, basah\",\"bau\":\"berbau\",\"asal\":\"kaleng, logam,\"}', 'Daur Ulang Logam', 'Kaleng dan barang logam yang dapat didaur ulang', '[\"Bersihkan isinya\",\"Pipihkan jika mungkin\",\"Kumpulkan dengan logam lain\",\"Dikumpulkan untuk dijual ke Bank Sampah\\/pemulung.\"]', 'organik', 1, NULL, '2025-12-04 00:05:41'),
(35, 'Limbah Medis (Rumah Tangga)', '💊', '{\"tekstur\": \"bervariasi\", \"bau\": \"berbau kimia\", \"asal\": \"medis, obat-obatan, farmasi\"}', 'Penanganan Khusus B3', 'Limbah medis dan obat-obatan yang berbahaya dan memerlukan penanganan khusus', '[\"Keluarkan obat dari kemasan\\/wadah aslinya\",\"Campurkan obat dengan sesuatu yang tidak diinginkan seperti tanah, kotoran, atau  bubuk kopi bekas di dalam plastik\\/wadah tertutup. Hal ini bertujuan untuk  menghindari penyalahgunaan obat jika obat dibuang dalam kemasan aslinya.\",\"Masukkan campuran tersebut ke dalam wadah tertutup, seperti kantong plastik  tertutup\\/zipper bag, kemudian buang di tempat sampah rumah tangga.\",\"Lepaskan etiket atau informasi personal lain pada kemasan\\/wadah\\/ botol\\/tube obat  untuk melindungi identitas pasien.\",\"Buang kemasan obat (dus\\/blister\\/strip\\/bungkus lain) setelah dirobek atau digunting.\",\"Buang isi obat sirup ke saluran pembuangan air (jamban) setelah diencerkan.  Hancurkan botolnya dan buang di tempat sampah.\",\"Gunting tube salep\\/krim terlebih dahulu dan buang secara terpisah dari tutupnya di  tempat sampah.\",\"Untuk sediaan insulin, buang jarum insulin setelah dirusak dan dalam keadaan tutup  terpasang Kembali\"]', 'b3', 1, NULL, '2025-12-04 05:07:39'),
(36, 'Elektronik & Baterai', '🔋', '{\"tekstur\": \"keras, kering\", \"bau\": \"tidak berbau\", \"asal\": \"elektronik, baterai, aki\"}', 'Daur Ulang B3', 'Sampah elektronik dan baterai yang mengandung logam berat berbahaya', '[\"Jangan dibakar\",\"Pisahkan secara khusus\",\"Serahkan ke titik pengumpulan khusus (drop box) atau dikelola oleh pihak yang memiliki izin penanganan Limbah B3\"]', 'b3', 1, NULL, '2025-11-27 12:53:15'),
(37, 'Limbah Kimia Rumah Tangga', '🧪', '{\"tekstur\": \"cair, kental\", \"bau\": \"berbau kimia\", \"asal\": \"pembersih, pestisida, cat\"}', 'Pengolahan Khusus', 'Bahan kimia rumah tangga yang beracun dan berbahaya', '[\"Pisahkan secara khusus\",\"Kumpulkan di tempat yang aman\",\"Serahkan kepada pengelola limbah B3 yang berizin.\"]', 'b3', 1, NULL, '2025-11-27 12:54:54'),
(38, 'Limbah Medis (infeksus)', '💊', '{\"tekstur\":\"Licin\\/fleksibel\",\"bau\":\"berbau\",\"asal\":\"medis, obat-obatan, farmasi\"}', 'Penanganan Khusus B3', 'Limbah infeksius rumah tangga meliputi kain kasa, tissue, kapas, pembalut, popok, sisa bahan makanan, dan kardus/plastik makanan kemasan (Kementerian \r\nKesehatan RI, 2021).', '[\"Mengumpulkan limbah infeksius APD berupa masker, sarung tangan, dan baju  pelindung\",\"Mengumpulkan limbah infeksius APD berupa masker, sarung tangan, dan baju  pelindung\",\"Mengemas terpisah dari sampah lainnya di dalam wadah tertutup yang bertuliskan  \\u201climbah infeksius\\u201d\",\"Petugas kebersihan dan pengelola sampah wajib menggunakan APD seperti masker,  sarung tangan, dan safety shoes yang setiap hari di disinfeksi\",\"Limbah infeksius diambil oleh petugas dari dinas yang bertanggunjawab melakukan  pengambilan dari setiap sumber, kemudian diangkut ke lokasi pengumpulan yang telah  ditentukan sebelum diserahkan ke pengolah limbah B3.\"]', 'b3', 1, '2025-12-04 05:14:03', '2025-12-04 05:14:03');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `waste_knowledge`
--
ALTER TABLE `waste_knowledge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waste_knowledge`
--
ALTER TABLE `waste_knowledge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
