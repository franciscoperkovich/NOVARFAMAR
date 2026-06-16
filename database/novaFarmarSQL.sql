-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         12.2.2-MariaDB - MariaDB Server
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.17.0.7270
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para novafarmargit
CREATE DATABASE IF NOT EXISTS `novafarmargit` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `novafarmargit`;

-- Volcando estructura para tabla novafarmargit.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.cache: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.carrito_items
CREATE TABLE IF NOT EXISTS `carrito_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_items_user_id_foreign` (`user_id`),
  KEY `carrito_items_producto_id_foreign` (`producto_id`),
  CONSTRAINT `carrito_items_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `carrito_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.carrito_items: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.consultas
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.consultas: ~2 rows (aproximadamente)
INSERT INTO `consultas` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `created_at`, `updated_at`, `leida`) VALUES
	(1, 'Roman', 'roman@roman.com', 'Consulta de Precio', 'Porque el tafirol esta $21300', '2026-06-10 19:33:27', '2026-06-10 19:33:27', 0),
	(2, 'Roman', 'admin@admin.ce2cewgvsb', 'bsbsdsbds', 'bdsndn', '2026-06-10 21:38:10', '2026-06-15 21:42:23', 1);

-- Volcando estructura para tabla novafarmargit.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_venta_id_foreign` (`venta_id`),
  KEY `detalle_ventas_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `detalle_ventas_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.detalle_ventas: ~16 rows (aproximadamente)
INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 4, 21313.00, '2026-06-10 09:06:16', '2026-06-10 09:06:16'),
	(2, 1, 2, 6, 2300.00, '2026-06-10 09:06:16', '2026-06-10 09:06:16'),
	(3, 2, 2, 4, 2300.00, '2026-06-10 09:28:33', '2026-06-10 09:28:33'),
	(4, 3, 1, 2, 21313.00, '2026-06-10 21:37:45', '2026-06-10 21:37:45'),
	(5, 4, 2, 2, 2300.00, '2026-06-10 21:59:50', '2026-06-10 21:59:50'),
	(6, 4, 1, 1, 21313.00, '2026-06-10 21:59:50', '2026-06-10 21:59:50'),
	(7, 5, 3, 2, 5000.00, '2026-06-13 21:35:47', '2026-06-13 21:35:47'),
	(8, 6, 3, 1, 5000.00, '2026-06-13 21:36:15', '2026-06-13 21:36:15'),
	(9, 7, 3, 2, 5000.00, '2026-06-15 16:42:01', '2026-06-15 16:42:01'),
	(10, 8, 3, 1, 5000.00, '2026-06-15 16:47:28', '2026-06-15 16:47:28'),
	(11, 9, 2, 1, 2300.00, '2026-06-15 16:59:37', '2026-06-15 16:59:37'),
	(12, 10, 1, 1, 2100.00, '2026-06-15 17:01:06', '2026-06-15 17:01:06'),
	(13, 11, 1, 1, 2100.00, '2026-06-15 21:13:51', '2026-06-15 21:13:51'),
	(14, 12, 1, 2, 2100.00, '2026-06-15 21:16:47', '2026-06-15 21:16:47'),
	(15, 12, 3, 2, 5000.00, '2026-06-15 21:16:47', '2026-06-15 21:16:47'),
	(16, 13, 3, 1, 5000.00, '2026-06-15 21:48:02', '2026-06-15 21:48:02');

-- Volcando estructura para tabla novafarmargit.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_05_20_222522_create_productos_table', 1),
	(5, '2026_06_06_223151_create_consultas_table', 1),
	(6, '2026_06_06_223208_create_ventas_table', 1),
	(7, '2026_06_06_223217_create_detalle_ventas_table', 1),
	(8, '2026_06_06_223223_create_carrito_items_table', 1),
	(9, '2026_06_10_173812_add_tipo_to_productos_table', 2),
	(10, '2026_06_15_183220_add_leida_to_consultas_table', 3),
	(11, '2026_06_15_223615_add_activo_to_users_table', 4);

-- Volcando estructura para tabla novafarmargit.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `url_imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo` varchar(255) NOT NULL DEFAULT 'medicamento',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.productos: ~6 rows (aproximadamente)
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `url_imagen`, `activo`, `created_at`, `updated_at`, `tipo`) VALUES
	(1, 'Tafirol Forte x 8', 'Medicemento con Paracetamol 300 mg y Diclofenac Sodico 50 mg', 2100.00, 109, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYtx0jm8_uME2lBL8c8-B_VHc5bsYvkNWPIA&s', 1, '2026-06-10 08:38:55', '2026-06-16 02:53:23', 'medicamento'),
	(2, 'Desorante Masculino', 'Desorante de Spray para hombre ediccion limitada 2026.', 2300.00, 110, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjFXD5gBnnozAndznsfybQvLWpYcgho-3fsw&s', 1, '2026-06-10 08:41:56', '2026-06-16 02:49:38', 'cuidado_personal'),
	(3, 'Actron 400', 'Medicamento con analgesico de Ibuprofeno 400 mg', 5000.00, 64, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9ke6UzA85V-dbM4kkXKcz10HIHrubqzVm9W3bcLiJCg&s=10', 1, '2026-06-13 21:20:14', '2026-06-16 02:51:21', 'medicamento'),
	(4, 'Novalgina x 10', 'Medicamento analgésico, antipirético y antiespasmódico. Dipirona 500 mg.', 10300.00, 99, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcQUYkGgmQ5amgpzLUPhRYJeJXdUKKwKrmBxexOr4FwNhIHT4t5G2eYDee1ZTRRDT8HQyDniAKePcPRakPkms5VX8IwUpc8J', 1, '2026-06-16 02:35:10', '2026-06-16 02:35:10', 'medicamento'),
	(5, 'Toalla Femenina Nosotras x 16', 'Toalla Femenina Nosotras Nocturna Suave Max Curv', 7600.00, 89, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDhbIegSHi5y9iAsycbiGMzvM5aoC6jAOFAw&s', 1, '2026-06-16 02:38:32', '2026-06-16 02:47:45', 'cuidado_personal'),
	(6, 'Agua de perfume Coco Noir', 'COCO NOIR es la encarnación absoluta del negro revelador de la feminidad. CHANEL', 150000.00, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5DCaaDOlGVCcGKv6eN2-4VkVjMWumTtHQrQ&s', 1, '2026-06-16 02:41:36', '2026-06-16 02:50:22', 'cuidado_personal');

-- Volcando estructura para tabla novafarmargit.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.sessions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla novafarmargit.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'cliente',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.users: ~5 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `activo`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$12$8aIPQtDu3SMWXAQkFHMs/.zc4DDMCEM4GqpysG5BLrqv7q.bK8EMa', 'admin', NULL, '2026-06-10 08:34:33', '2026-06-10 08:37:13', 1),
	(2, 'victor', 'roman@roman.com', NULL, '$2y$12$ZYG.jNWvESm/mTLZ0t8XEuBPwYOeagusOkXb79EVyVGByV.8k/cP2', 'cliente', NULL, '2026-06-10 08:57:32', '2026-06-14 03:55:48', 1),
	(3, 'maxi', 'maxi@maxi.com', NULL, '$2y$12$VPcH90Ucb0Nb7F9r.XNm..dUmhECJfz8Ag8rKWEold3YdhG8rWnlS', 'cliente', NULL, '2026-06-16 01:44:56', '2026-06-16 01:55:22', 0),
	(4, 'admin22', 'admin22@admin.com', NULL, '$2y$12$0mKX15AQ3xPcRN9.otjvQewPi0lNx5rIJ9m6J8PO8js/ooiyW4ImG', 'admin', NULL, '2026-06-16 02:21:02', '2026-06-16 02:25:00', 0),
	(5, 'cliente', 'cliente@cliente.com', NULL, '$2y$12$erXypWYztPAvLUa7o2T5JORyZA/oLwuB1hYW1YFDqK.74vftHNIgC', 'cliente', NULL, '2026-06-16 22:38:12', '2026-06-16 22:38:12', 1);

-- Volcando estructura para tabla novafarmargit.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'confirmada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla novafarmargit.ventas: ~13 rows (aproximadamente)
INSERT INTO `ventas` (`id`, `user_id`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 99052.00, 'confirmada', '2026-06-10 09:06:16', '2026-06-10 09:06:16'),
	(2, 2, 9200.00, 'confirmada', '2026-06-10 09:28:33', '2026-06-10 09:28:33'),
	(3, 2, 42626.00, 'confirmada', '2026-06-10 21:37:45', '2026-06-10 21:37:45'),
	(4, 1, 25913.00, 'confirmada', '2026-06-10 21:59:50', '2026-06-10 21:59:50'),
	(5, 2, 10000.00, 'confirmada', '2026-06-13 21:35:47', '2026-06-13 21:35:47'),
	(6, 2, 5000.00, 'confirmada', '2026-06-13 21:36:15', '2026-06-13 21:36:15'),
	(7, 2, 10000.00, 'confirmada', '2026-06-15 16:42:01', '2026-06-15 16:42:01'),
	(8, 2, 5000.00, 'confirmada', '2026-06-15 16:47:28', '2026-06-15 16:47:28'),
	(9, 2, 2300.00, 'confirmada', '2026-06-15 16:59:37', '2026-06-15 16:59:37'),
	(10, 2, 2100.00, 'confirmada', '2026-06-15 17:01:06', '2026-06-15 17:01:06'),
	(11, 2, 2100.00, 'confirmada', '2026-06-15 21:13:51', '2026-06-15 21:13:51'),
	(12, 1, 14200.00, 'confirmada', '2026-06-15 21:16:47', '2026-06-15 21:16:47'),
	(13, 1, 5000.00, 'confirmada', '2026-06-15 21:48:02', '2026-06-15 21:48:02');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
