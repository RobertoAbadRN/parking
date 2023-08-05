-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2023 a las 00:03:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `apart_unit` varchar(255) NOT NULL,
  `lease_expiration` date NOT NULL,
  `reserved_space` tinyint(3) UNSIGNED NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `permit_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `apart_unit`, `lease_expiration`, `reserved_space`, `property_code`, `permit_status`, `created_at`, `updated_at`) VALUES
(1, 75, '3334', '0000-00-00', 3, 'QyQxc', 'pending', '2023-07-31 22:07:28', '2023-07-31 22:07:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `description`, `file_path`, `created_at`, `updated_at`) VALUES
(9, '1690662654_recibo_cfe.pdf', '1690662654_recibo_cfe.pdf', '2023-07-29 20:30:54', '2023-07-29 20:30:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_02_161844_create_properties_table', 2),
(6, '2023_06_05_193637_create_vehicles_table', 3),
(7, '2023_06_05_200313_create_visitorpasses_table', 4),
(8, '2023_06_30_101426_create_user_properties_table', 5),
(9, '2023_07_12_120500_create_residents_table', 6),
(10, '2023_07_12_124158_add_password_to_residents_table', 7),
(11, '2023_07_12_170306_create_profiles_table', 8),
(12, '2023_07_18_095731_create_permission_tables', 8),
(17, '2023_07_27_061338_create_property_settings_table', 9),
(18, '2023_07_27_062552_create_permit_settings_table', 9),
(19, '2023_07_27_063238_create_visitor_settings_table', 9),
(20, '2023_07_31_131837_create_departments_table', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 75),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(2, 'App\\Models\\User', 78),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('martin.reyes.qro@gmail.com', '$2y$10$3Z9bA3F9Mno53mmcUp0fMewWcX98n7fgnsaFXab4WTfYotQ2VjAIi', '2023-07-06 22:37:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'properties', 'web', NULL, NULL),
(2, 'users', 'web', NULL, NULL),
(3, 'recidents', 'web', NULL, NULL),
(4, 'vehicles', 'web', NULL, NULL),
(5, 'visitors', 'web', NULL, NULL),
(6, 'documents', 'web', NULL, NULL),
(7, 'settings', 'web', NULL, NULL),
(8, 'roles', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permit_settings`
--

CREATE TABLE `permit_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident` tinyint(1) NOT NULL DEFAULT 0,
  `visitor` tinyint(1) NOT NULL DEFAULT 0,
  `sub_contractor` tinyint(1) NOT NULL DEFAULT 0,
  `carport` tinyint(1) NOT NULL DEFAULT 0,
  `temporary` tinyint(1) NOT NULL DEFAULT 0,
  `reserved` tinyint(1) NOT NULL DEFAULT 0,
  `vip` tinyint(1) NOT NULL DEFAULT 0,
  `contractor` tinyint(1) NOT NULL DEFAULT 0,
  `employee` tinyint(1) NOT NULL DEFAULT 0,
  `property_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Resident', NULL, NULL),
(2, 'Leasing agent', NULL, NULL),
(3, 'Property manager', NULL, NULL),
(4, 'Parking inspector', NULL, NULL),
(5, 'Dispatcher', NULL, NULL),
(6, 'Manager dispatcher', NULL, NULL),
(7, 'Company administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `location_type` varchar(255) NOT NULL,
  `places` varchar(255) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `permit_status` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id`, `area`, `name`, `nickname`, `address`, `city`, `state`, `country`, `zip_code`, `location_type`, `places`, `property_code`, `permit_status`, `logo`, `created_at`, `updated_at`) VALUES
(6, 'prueba', 'edificio1', '123', 'calle esmeralda', 'queretaro', 'Queretaro', 'México', '76915', 'Apartment Complex', '3', 'QyQxc', 'active', NULL, '2023-07-03 22:13:07', '2023-08-04 21:25:33'),
(9, 'prueba2', 'juan', '9895', 'margaritas 11', 'queretaro', 'Queretaro', 'México', '76900', 'Apartment Complex', '2', 'acUzh', 'active', '1688487450.png', '2023-07-04 16:17:30', '2023-08-03 03:49:01'),
(14, 'prueba33', 'prueba33', '1234', 'prueba33', 'queretaro', 'Queretaro', 'México', '76900', 'Company Parking', '3', 'x9R2t', 'active', '1691035418.png', '2023-08-03 04:03:39', '2023-08-03 04:27:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property_settings`
--

CREATE TABLE `property_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `camp_es_1` longtext DEFAULT NULL,
  `camp_es_2` longtext DEFAULT NULL,
  `camp_es_3` longtext DEFAULT NULL,
  `camp_es_4` longtext DEFAULT NULL,
  `camp_es_5` longtext DEFAULT NULL,
  `camp_es_6` longtext DEFAULT NULL,
  `camp_es_7` longtext DEFAULT NULL,
  `camp_es_8` longtext DEFAULT NULL,
  `camp_es_9` longtext DEFAULT NULL,
  `camp_es_10` longtext DEFAULT NULL,
  `camp_es_11` longtext DEFAULT NULL,
  `camp_es_12` longtext DEFAULT NULL,
  `camp_en_1` longtext DEFAULT NULL,
  `camp_en_2` longtext DEFAULT NULL,
  `camp_en_3` longtext DEFAULT NULL,
  `camp_en_4` longtext DEFAULT NULL,
  `camp_en_5` longtext DEFAULT NULL,
  `camp_en_6` longtext DEFAULT NULL,
  `camp_en_7` longtext DEFAULT NULL,
  `camp_en_8` longtext DEFAULT NULL,
  `camp_en_9` longtext DEFAULT NULL,
  `camp_en_10` longtext DEFAULT NULL,
  `camp_en_11` longtext DEFAULT NULL,
  `camp_en_12` longtext DEFAULT NULL,
  `camp_fr_1` longtext DEFAULT NULL,
  `camp_fr_2` longtext DEFAULT NULL,
  `camp_fr_3` longtext DEFAULT NULL,
  `camp_fr_4` longtext DEFAULT NULL,
  `camp_fr_5` longtext DEFAULT NULL,
  `camp_fr_6` longtext DEFAULT NULL,
  `camp_fr_7` longtext DEFAULT NULL,
  `camp_fr_8` longtext DEFAULT NULL,
  `camp_fr_9` longtext DEFAULT NULL,
  `camp_fr_10` longtext DEFAULT NULL,
  `camp_fr_11` longtext DEFAULT NULL,
  `camp_fr_12` longtext DEFAULT NULL,
  `name` tinyint(1) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `space` tinyint(1) DEFAULT NULL,
  `license` tinyint(1) DEFAULT NULL,
  `number` tinyint(1) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ppm1` varchar(255) DEFAULT NULL,
  `ppm2` varchar(255) DEFAULT NULL,
  `img_default` varchar(255) DEFAULT NULL,
  `img_service` varchar(255) DEFAULT NULL,
  `img_property` varchar(255) DEFAULT NULL,
  `margin_left` longtext DEFAULT NULL,
  `margin_top` longtext DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'test', 'web', '2023-07-18 18:01:17', '2023-07-18 18:01:17'),
(2, 'Administrator', 'web', '2023-07-18 18:29:13', '2023-07-18 18:29:13'),
(4, 'Resident', 'web', '2023-07-27 21:41:27', '2023-07-27 21:41:27'),
(5, 'martin', 'web', '2023-07-28 00:29:06', '2023-07-28 00:29:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(2, 1),
(2, 2),
(2, 5),
(3, 2),
(3, 4),
(3, 5),
(4, 2),
(4, 5),
(5, 2),
(5, 5),
(6, 2),
(6, 5),
(7, 2),
(7, 5),
(8, 2),
(8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `banned` varchar(12) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user`, `phone`, `access_level`, `property_code`, `banned`, `last_login`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, 'admin12', '546456565', 'property_leasion_agent', 'QyQxc', 'NO', '2023-08-05 10:58:15', '$2y$10$oWKm2Nvg4CKGTFza4iBMY.8PL.auUKkEq26YJPj5sdxf.5cD18Loa', '', NULL, '2023-06-05 21:34:08', '2023-08-05 18:43:33'),
(75, 'martin123', 'martin.amador.tic@gmail.com', NULL, 'martin123', '4428168746', 'property_leasion_agent', 'QyQxc', '0', '2023-08-04 15:09:02', '$2y$10$UzRLJibcv/o.W30RGKvbzeEoXpHTX3MOy85Ayxuf6DNqhEaCjTiIe', 'Active', NULL, '2023-07-31 22:07:28', '2023-08-05 18:44:27'),
(78, 'martin', 'martin.reyes.qro@gmail.com', NULL, 'rafaelde', '4428168746', 'property_manager', '', 'NO', '', '$2y$10$7r2ZEKaHmT4Sq4Vqu0Dma.9JUpTxWe/KogBdt5nqRx3qHKCqrKzrq', '', NULL, '2023-08-05 18:20:16', '2023-08-05 18:20:16'),
(79, 'prueba', 'prueba@gmail.com', NULL, 'prueba', '4428168746', 'property_manager', '', 'NO', '', '$2y$10$n18557VzTUfs513fbRAi5uZ7pUjSN0p9SoIaI0ue9h5mbwjCUlmVi', '', NULL, '2023-08-05 19:03:16', '2023-08-05 19:03:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_properties`
--

CREATE TABLE `user_properties` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_properties`
--

INSERT INTO `user_properties` (`user_id`, `property_id`) VALUES
(78, 9),
(78, 14),
(79, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_code` varchar(255) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `permit_type` varchar(30) NOT NULL,
  `permit_status` varchar(30) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `property_code`, `license_plate`, `vin`, `make`, `model`, `year`, `color`, `vehicle_type`, `permit_type`, `permit_status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 75, 'QyQxc', '123456789', 'vvrev', '225wldwd', 'italica', 1999, 'blue', 'prueba', 'resident', 'active', '2023-08-04', '2023-09-03', '2023-08-03 22:41:25', '2023-08-04 17:45:38'),
(3, 75, 'acUzh', '25456', 'vvrev', 'vento', '1235', 1999, 'prueba', 'ford1', 'resident', 'active', '2023-08-04', '2023-09-03', '2023-08-04 18:47:43', '2023-08-04 18:48:04'),
(4, 75, 'QyQxc', 'prueba', '55244', '225wldwd', '1235', 1999, 'blue', 'vento', 'employee', 'active', '2023-08-04', '2023-08-25', '2023-08-04 21:10:53', '2023-08-04 21:10:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitorpasses`
--

CREATE TABLE `visitorpasses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_phone` varchar(255) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `resident_name` varchar(255) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `resident_phone` varchar(255) NOT NULL,
  `valid_from` datetime NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitorpasses`
--

INSERT INTO `visitorpasses` (`id`, `property_code`, `visitor_name`, `visitor_phone`, `license_plate`, `year`, `make`, `color`, `vehicle_type`, `resident_name`, `unit_number`, `resident_phone`, `valid_from`, `model`, `status`, `created_at`, `updated_at`) VALUES
(1, 'QyQxc', 'prueba', '243445', '25456', 1998, '225wldwd', 'prueba', 'ford', 'martin', '1', '12456', '2023-06-08 01:27:00', '2022', 'pending', '2023-06-08 23:26:00', '2023-06-08 23:26:00'),
(2, 'QyQxc', 'pedro', '2101616', '565588', 1989, 'ford', 'negro', 'ranger', 'jose', '12', 'jso', '2023-06-22 23:26:58', 'vento', 'pending', NULL, NULL),
(3, 'QyQxc', 'prueba5', '243445', '25456', 1999, '225wldwd', 'rojo', 'ford', 'prueba2', 'prueba', '12456', '2023-06-23 19:38:00', '2022', '', '2023-06-22 22:38:37', '2023-06-22 22:38:37'),
(4, 'QyQxc', 'pruena6', '12424234', '65432', 2023, '225wldwd', 'blanco', 'prueba', 'prueba2', 'prueba', '19899', '2023-06-23 16:56:00', 'vento', '', '2023-06-22 22:53:23', '2023-06-22 22:53:23'),
(5, 'QyQxc', 'prueba', 'prueba', '25456', 1999, 'prueba', 'prueba', 'prueba', 'prueba', '10', '12554655', '2023-06-23 13:03:00', 'prueba', '', '2023-06-23 16:59:13', '2023-06-23 16:59:13'),
(6, 'QyQxc', 'prueva 10', 'prueba', 'defgreg4657745', 1999, 'fortd', 'rojo', 'prueba', 'prueba2', 'prueba', '19899', '0000-00-00 00:00:00', '1235', 'pending', '2023-06-25 03:04:04', '2023-06-25 03:04:04'),
(7, 'QyQxc', 'prueba 20', 'prueba', 'defgreg4657745', 1998, 'fortd', 'blanco', 'prueba', 'martin', '3', '12456', '2023-06-15 21:12:00', '2023', 'pending', '2023-06-25 03:09:18', '2023-06-25 03:09:18'),
(8, 'QyQxc', 'prueba 50', 'prueba', 'defgreg4657745', 2023, 'fortd', 'naranja', 'ford', 'prueba3', 'prueba', '12554655', '2023-07-28 12:05:00', '1235', 'pending', '2023-06-25 03:21:53', '2023-06-25 03:21:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitor_settings`
--

CREATE TABLE `visitor_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `validation` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `permit_settings`
--
ALTER TABLE `permit_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_name_unique` (`name`);

--
-- Indices de la tabla `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `property_settings`
--
ALTER TABLE `property_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_properties`
--
ALTER TABLE `user_properties`
  ADD PRIMARY KEY (`user_id`,`property_id`),
  ADD KEY `user_properties_property_id_foreign` (`property_id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitor_settings`
--
ALTER TABLE `visitor_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permit_settings`
--
ALTER TABLE `permit_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `property_settings`
--
ALTER TABLE `property_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `visitor_settings`
--
ALTER TABLE `visitor_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_properties`
--
ALTER TABLE `user_properties`
  ADD CONSTRAINT `user_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
