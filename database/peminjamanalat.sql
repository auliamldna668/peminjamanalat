-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.4.3 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk peminjamanalat
CREATE DATABASE IF NOT EXISTS `peminjamanalat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `peminjamanalat`;

-- membuang struktur untuk table peminjamanalat.alats
CREATE TABLE IF NOT EXISTS `alats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) NOT NULL,
  `kode_alat` varchar(255) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alats_kode_alat_unique` (`kode_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.alats: ~7 rows (lebih kurang)
INSERT INTO `alats` (`id`, `nama_alat`, `kode_alat`, `stok`, `created_at`, `updated_at`, `kategori_id`) VALUES
	(4, 'bola futsal', 'ALT-1776310242', 12, '2026-04-15 20:30:42', '2026-04-15 20:30:42', 4),
	(6, 'bola basket', 'ALT-1776603366', 26, '2026-04-19 05:56:06', '2026-04-19 09:04:29', 7),
	(7, 'bola voli', 'ALT-1776609366', 15, '2026-04-19 07:36:06', '2026-04-19 07:36:06', 7),
	(8, 'padel', 'ALT-1776649165', 23, '2026-04-20 01:39:25', '2026-04-20 01:39:25', 7),
	(9, 'tenis', 'ALT-1776665680', 15, '2026-04-20 06:14:40', '2026-04-20 06:14:40', 7),
	(10, 'matras', 'ALT-1776665708', 10, '2026-04-20 06:15:08', '2026-04-20 06:15:08', 7),
	(11, 'barbel', 'ALT-1776665745', 2, '2026-04-20 06:15:45', '2026-04-20 06:15:45', 7);

-- membuang struktur untuk table peminjamanalat.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.cache: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.cache_locks: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.failed_jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.jobs: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.job_batches: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.kategoris: ~2 rows (lebih kurang)
INSERT INTO `kategoris` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(7, 'alat olahraga', 'pakai seperlunya aja', '2026-04-19 05:40:29', '2026-04-19 05:40:29'),
	(8, 'alat elektronik', 'bvndsbvds', '2026-04-19 06:02:41', '2026-04-19 06:02:41');

-- membuang struktur untuk table peminjamanalat.log_aktivitas
CREATE TABLE IF NOT EXISTS `log_aktivitas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.log_aktivitas: ~7 rows (lebih kurang)
INSERT INTO `log_aktivitas` (`id`, `user`, `aktivitas`, `created_at`, `updated_at`) VALUES
	(1, 'aulia', 'User meminjam alat', '2026-04-19 08:47:53', '2026-04-19 08:47:53'),
	(2, 'aulia', 'User meminjam alat', '2026-04-19 09:04:08', '2026-04-19 09:04:08'),
	(3, 'aulia', 'User meminjam alat', '2026-04-19 09:04:29', '2026-04-19 09:04:29'),
	(4, 'aulia', 'Admin menambah alat', '2026-04-19 09:04:29', '2026-04-19 09:04:29'),
	(5, 'aulia', 'Petugas menyetujui peminjaman', '2026-04-19 09:04:29', '2026-04-19 09:04:29'),
	(6, 'aulia', 'User mengembalikan alat', '2026-04-19 09:04:29', '2026-04-19 09:04:29'),
	(7, 'wanda', 'User meminjam alat', '2026-04-20 06:30:00', '2026-04-20 06:30:00');

-- membuang struktur untuk table peminjamanalat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.migrations: ~15 rows (lebih kurang)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_04_07_163419_add_role_to_users_table', 1),
	(5, '2026_04_08_192048_create_kategoris_table', 1),
	(6, '2026_04_08_234401_create_alat_table', 1),
	(7, '2026_04_08_234401_create_alats_table', 2),
	(8, '2026_04_13_065021_create_peminjamans_table', 3),
	(9, '2026_04_13_075727_create_pengembalians_table', 4),
	(10, '2026_04_14_132041_create_log_aktivitas_table', 5),
	(11, '2026_04_15_001536_add_status_to_peminjamans_table', 6),
	(12, '2026_04_15_041418_add_status_to_pengembalians_table', 7),
	(13, '2026_04_15_111833_add_user_id_and_denda_to_pengembalians_table', 8),
	(14, '2026_04_15_151217_add_user_id_to_peminjamans_table', 9),
	(15, '2026_04_15_151619_add_tanggal_kembali_to_peminjamans_table', 10);

-- membuang struktur untuk table peminjamanalat.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.password_reset_tokens: ~0 rows (lebih kurang)

-- membuang struktur untuk table peminjamanalat.peminjamans
CREATE TABLE IF NOT EXISTS `peminjamans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `alat_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjamans_alat_id_foreign` (`alat_id`),
  KEY `peminjamans_user_id_foreign` (`user_id`),
  CONSTRAINT `peminjamans_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.peminjamans: ~8 rows (lebih kurang)
INSERT INTO `peminjamans` (`id`, `alat_id`, `jumlah`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
	(16, 6, 3, '2026-04-19', '2026-04-26', 'dikembalikan', '2026-04-19 06:04:58', '2026-04-19 06:58:38', 5),
	(17, 6, 3, '2026-04-19', '2026-04-26', 'ditolak', '2026-04-19 06:09:37', '2026-04-19 06:48:26', 5),
	(18, 6, 3, '2026-04-19', '2026-04-26', 'dikembalikan', '2026-04-19 06:18:46', '2026-04-19 08:47:53', 5),
	(19, 6, 2, '2026-04-19', '2026-04-26', 'dikembalikan', '2026-04-19 06:24:55', '2026-04-19 09:04:29', 5),
	(20, 6, 3, '2026-04-19', '2026-04-27', 'ditolak', '2026-04-19 06:32:34', '2026-04-19 08:59:50', 5),
	(21, 6, 3, '2026-04-19', '2026-04-20', 'disetujui', '2026-04-19 09:02:25', '2026-04-20 05:59:21', 5),
	(22, 6, 3, '2026-04-19', '2026-04-20', 'menunggu', '2026-04-19 09:04:08', '2026-04-19 09:04:08', 5),
	(23, 11, 1, '2026-04-20', '2026-04-27', 'disetujui', '2026-04-20 06:30:00', '2026-04-20 06:36:11', 14);

-- membuang struktur untuk table peminjamanalat.pengembalians
CREATE TABLE IF NOT EXISTS `pengembalians` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `denda` int NOT NULL DEFAULT '0',
  `peminjaman_id` bigint unsigned NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kondisi_barang` varchar(255) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `pengembalians_peminjaman_id_foreign` (`peminjaman_id`),
  KEY `pengembalians_user_id_foreign` (`user_id`),
  CONSTRAINT `pengembalians_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjamans` (`id`),
  CONSTRAINT `pengembalians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.pengembalians: ~3 rows (lebih kurang)
INSERT INTO `pengembalians` (`id`, `user_id`, `denda`, `peminjaman_id`, `tanggal_kembali`, `kondisi_barang`, `catatan`, `created_at`, `updated_at`, `status`) VALUES
	(1, 5, 0, 16, '2026-04-19', 'baik', NULL, '2026-04-19 06:58:38', '2026-04-19 06:58:38', 'pending'),
	(4, 5, 0, 18, '2026-04-19', 'baik', NULL, '2026-04-19 08:47:53', '2026-04-19 08:47:53', 'pending'),
	(5, 5, 0, 19, '2026-04-19', 'baik', NULL, '2026-04-19 09:04:29', '2026-04-19 09:04:29', 'pending');

-- membuang struktur untuk table peminjamanalat.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.sessions: ~2 rows (lebih kurang)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('dL2IGZErabACH5nZjgUZSPzq51wWIqNxLcGY7uUV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWI4ZWhnN1VQNjBueHZ4b2FIblJ5djVNNldBUHdZTVNYVjIxV0ZjMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wZW5nZW1iYWxpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1776694738),
	('tVYLtYsQrtY9TkQjsS3AJnHoEYMOxcpOHyKHx7J0', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiejRsU3JPMEZDemxHN2hMRWVodFcxM1Z6cEhraE9ZMm01Tk9VcUtRNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3BlbWluamFtYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDt9', 1776667743);

-- membuang struktur untuk table peminjamanalat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'peminjam',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel peminjamanalat.users: ~9 rows (lebih kurang)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$w4XQ8zvB/A.s1oeRmZpYpOKmn6Mx.rmgfG3tIeEgNpw32C3YbkGka', NULL, '2026-04-12 09:29:37', '2026-04-12 09:29:37', 'admin'),
	(3, 'petugas', 'petugas@gmail.com', NULL, '$2y$12$cfLQiqRiWLAg.IuK6tr7tOgOoPqRHpgBkDm76805XlP6K/ORCRJh6', NULL, '2026-04-12 21:07:25', '2026-04-20 06:35:36', 'petugas'),
	(5, 'aulia', 'aulia@gmail.com', NULL, '$2y$12$A2XutVYJNVOUowTmyXLzm.4/f7bNDr6oDSR3amHv5C5t.tbX2deXW', NULL, '2026-04-15 00:05:04', '2026-04-15 00:05:04', 'user'),
	(7, 'raisa', 'raisa@gmail.com', NULL, '$2y$12$pp4uNosTXWjDcPNzhLtLY.PyoTHPO7e6BMAJ3BK90P37kZWpO84jq', NULL, '2026-04-15 22:19:10', '2026-04-15 22:19:10', 'user'),
	(9, 'avni', 'avniiw@gmail.com', NULL, '$2y$12$mEmLxMPQJjiK2jEHSjhFCu.II43m1BtiT2VBTHB/KTeJZd760K8Je', NULL, '2026-04-19 16:25:29', '2026-04-19 16:25:29', 'user'),
	(11, 'mellani', 'mella@gmail.com', NULL, '$2y$12$L5HLd20zBZ1J92Fg7qqyU.3LuzK0kxQlAwZ0IHc5nJYzgAvT1tC32', NULL, '2026-04-20 01:26:33', '2026-04-20 01:26:33', 'user'),
	(12, 'ivannn', 'pakriotrondol@gmail.com', NULL, '$2y$12$jD4nu4GgSdoPFDJK7wrpOOsnlINvZm/CJANU52bBGdoURAZtO2hxm', NULL, '2026-04-20 06:12:55', '2026-04-20 06:12:55', 'user'),
	(13, 'noel', 'noelmentri@gmail.com', NULL, '$2y$12$qUqyUbQfL9H4tC6OFycVfemZx.zT072DZ25UZ.fj4wmjIH3jzao/i', NULL, '2026-04-20 06:13:41', '2026-04-20 06:13:41', 'user'),
	(14, 'wanda', 'wanda@gmail.com', NULL, '$2y$12$1WEl/i5PmeVxUu6fxBb9R.72TsU4X2Pp1fZfbeNWGZ0AbDyUzz0DO', NULL, '2026-04-20 06:23:08', '2026-04-20 06:23:57', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
