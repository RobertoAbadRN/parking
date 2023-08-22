-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2023 a las 21:05:38
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
  `reserved_spacevisitors` tinyint(3) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `permit_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_agreement_status` varchar(255) DEFAULT NULL,
  `agreement_token` varchar(255) DEFAULT NULL,
  `date_status` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `apart_unit`, `lease_expiration`, `reserved_space`, `reserved_spacevisitors`, `property_code`, `permit_status`, `created_at`, `updated_at`, `terms_agreement_status`, `agreement_token`, `date_status`) VALUES
(23, 106, '2', '0000-00-00', 2, 0, 'kmtZH', 'pending', '2023-08-19 18:34:34', '2023-08-19 18:34:57', 'accepted', 'liByXofcckGttXycRzWwTr11ect7gaAwaQ5q4lu7', '2023-08-19 18:34:57'),
(24, 135, '2', '0000-00-00', 2, 0, 'Y6Nj1', 'pending', '2023-08-22 02:12:39', '2023-08-22 02:12:39', 'pending', 'xisqA6r67jYHtBo0XLZu4wP0rAilfTQnrZRcUgWl', NULL);

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
(10, '1691624875_Visitor Details.pdf', '1691624875_Visitor Details.pdf', '2023-08-09 23:47:55', '2023-08-09 23:47:55');

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
(20, '2023_07_31_131837_create_departments_table', 10),
(21, '2023_07_15_184629_create_departaments_table', 11),
(31, '2023_08_07_011245_create_resident_uploads_table', 12),
(32, '2023_08_07_113534_create_resident_upload_files_table', 12),
(33, '2023_08_08_124603_create_registrations_table', 13),
(34, '2023_08_10_143351_add_terms_agreement_status_to_departments_table', 13),
(35, '2023_08_10_145649_add_agreement_token_to_departments', 14),
(36, '2023_08_11_171123_add_date_status_to_departments_table', 15),
(37, '2023_08_16_113815_modify_visitorpasses_table', 16);

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
(1, 'App\\Models\\User', 109),
(1, 'App\\Models\\User', 110),
(1, 'App\\Models\\User', 113),
(1, 'App\\Models\\User', 119),
(1, 'App\\Models\\User', 124),
(1, 'App\\Models\\User', 134),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(2, 'App\\Models\\User', 82),
(2, 'App\\Models\\User', 107),
(2, 'App\\Models\\User', 108),
(2, 'App\\Models\\User', 111),
(2, 'App\\Models\\User', 112),
(2, 'App\\Models\\User', 115),
(2, 'App\\Models\\User', 116),
(2, 'App\\Models\\User', 118),
(2, 'App\\Models\\User', 123),
(2, 'App\\Models\\User', 125),
(2, 'App\\Models\\User', 129),
(2, 'App\\Models\\User', 130),
(2, 'App\\Models\\User', 133),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 114),
(4, 'App\\Models\\User', 117),
(4, 'App\\Models\\User', 120),
(4, 'App\\Models\\User', 121),
(4, 'App\\Models\\User', 122),
(4, 'App\\Models\\User', 126),
(4, 'App\\Models\\User', 128),
(4, 'App\\Models\\User', 131),
(4, 'App\\Models\\User', 132),
(8, 'App\\Models\\User', 106),
(8, 'App\\Models\\User', 135);

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
('martin.reyes.qro@gmail.com', '$2y$10$kJWynDgPjOfVFa/Mlq45RO9UMiuffebSX0otZSAeOoM1YVoM/z8Ii', '2023-08-09 23:38:32'),
('admin@gmail.com', '$2y$10$AJis6BGLZVfxM4gQ3RjBEe1a3Rr4rCDCoU6ggpKOTxnSfR7t2NmWi', '2023-08-11 20:30:39'),
('juancarlosmunos112@gmail.com', '$2y$10$EKISd9XqxWksEe1USioCtunktDk2bFCoAl3V4m3Dbf4TDQb0pchE6', '2023-08-16 22:27:13');

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
(15, '1011 th W10 th', 'nombre propiedad', '123123', 'direccion propiedad', 'tx', 'tx', 'usa', '76900', 'Apartment Building', '100', '4nHZC', 'active', 'images/logo/hnt4FuJiErCjnLCLWZqvLMJ5PvkibZdEHz7QGl01.png', '2023-08-08 23:10:59', '2023-08-10 17:25:43'),
(19, 'prueba', 'prueba', 'prueba', 'margaritas 11', 'queretaro', 'Queretaro', 'México', '76900', 'Apartment Complex', '5', 'kmtZH', 'active', 'images/logo/OYZ4t61dK5BEQLAWzxELuxftuZwEsSitEr46fDOf.png', '2023-08-10 17:20:54', '2023-08-10 17:20:54'),
(20, 'prueba3', 'prueba3', 'prueba3', 'prueba3', 'queretaro', 'Queretaro', 'México', '76915', 'Apartment Complex', '100', 'Y6Nj1', 'active', 'images/logo/XhDvkfZefKR5nc4cffuNY6n38aydYwNGYEGNd20V.png', '2023-08-16 04:51:07', '2023-08-16 04:51:07');

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
-- Estructura de tabla para la tabla `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resident_uploads`
--

CREATE TABLE `resident_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(120) NOT NULL,
  `file_name_original` varchar(120) NOT NULL,
  `file_extension` varchar(12) NOT NULL,
  `file_path` varchar(120) NOT NULL,
  `full_path` varchar(220) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resident_uploads`
--

INSERT INTO `resident_uploads` (`id`, `file_name`, `file_name_original`, `file_extension`, `file_path`, `full_path`, `created_at`, `updated_at`) VALUES
(1, 'carga-masiva-1691430109.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691430109.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430109.xlsx', '2023-08-07 18:41:49', '2023-08-07 18:41:49'),
(2, 'carga-masiva-1691430321.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691430321.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430321.xlsx', '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(3, 'carga-masiva-1691430998.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691430998.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430998.xlsx', '2023-08-07 18:56:38', '2023-08-07 18:56:38'),
(4, 'carga-masiva-1691431014.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691431014.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691431014.xlsx', '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(5, 'carga-masiva-1691431415.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691431415.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691431415.xlsx', '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(6, 'carga-masiva-1691447952.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691447952.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691447952.xlsx', '2023-08-07 23:39:12', '2023-08-07 23:39:12'),
(7, 'carga-masiva-1691448031.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691448031.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691448031.xlsx', '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(8, 'carga-masiva-1691448576.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691448576.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691448576.xlsx', '2023-08-07 23:49:36', '2023-08-07 23:49:36'),
(9, 'carga-masiva-1691543199.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691543199.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691543199.xlsx', '2023-08-09 01:06:39', '2023-08-09 01:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resident_upload_files`
--

CREATE TABLE `resident_upload_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_data` text NOT NULL,
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resident_upload_files`
--

INSERT INTO `resident_upload_files` (`id`, `file_data`, `upload_id`, `created_at`, `updated_at`) VALUES
(1, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(2, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(3, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(4, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(5, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(6, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(7, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(8, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(9, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(10, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 2, '2023-08-07 18:45:21', '2023-08-07 18:45:21'),
(11, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(12, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(13, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(14, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(15, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(16, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(17, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(18, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(19, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(20, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 3, '2023-08-07 18:56:39', '2023-08-07 18:56:39'),
(21, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(22, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(23, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(24, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(25, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(26, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(27, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(28, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(29, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(30, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 4, '2023-08-07 18:56:54', '2023-08-07 18:56:54'),
(31, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(32, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(33, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(34, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(35, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(36, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(37, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(38, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(39, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(40, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 5, '2023-08-07 19:03:35', '2023-08-07 19:03:35'),
(41, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(42, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(43, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(44, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(45, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(46, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(47, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(48, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(49, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(50, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 6, '2023-08-07 23:39:13', '2023-08-07 23:39:13'),
(51, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(52, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(53, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(54, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(55, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(56, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(57, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(58, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(59, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(60, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 7, '2023-08-07 23:40:31', '2023-08-07 23:40:31'),
(61, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(62, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(63, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(64, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(65, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(66, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(67, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(68, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(69, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(70, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(71, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(72, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(73, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(74, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(75, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(76, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(77, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(78, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(79, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40'),
(80, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 9, '2023-08-09 01:06:40', '2023-08-09 01:06:40');

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
(1, 'Leasing agent', 'web', '2023-07-18 18:01:17', '2023-08-09 22:58:47'),
(2, 'Property manager', 'web', '2023-07-18 18:29:13', '2023-08-09 22:59:33'),
(4, 'Parking inspector', 'web', '2023-07-27 21:41:27', '2023-08-09 23:00:33'),
(5, 'Dispatcher', 'web', '2023-07-28 00:29:06', '2023-08-09 23:01:07'),
(6, 'Manager dispatcher', 'web', '2023-08-09 23:01:53', '2023-08-09 23:01:53'),
(7, 'Company administrator', 'web', '2023-08-09 23:02:21', '2023-08-09 23:02:21'),
(8, 'Resident', 'web', '2023-08-18 18:11:19', '2023-08-18 18:11:19');

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
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(2, 2),
(2, 6),
(2, 7),
(3, 2),
(3, 6),
(3, 7),
(3, 8),
(4, 1),
(4, 2),
(4, 6),
(4, 7),
(5, 2),
(5, 4),
(5, 6),
(5, 7),
(6, 2),
(6, 6),
(6, 7),
(7, 2),
(7, 6),
(7, 7),
(8, 2),
(8, 7);

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
(2, 'admin', 'admin@gmail.com', NULL, 'admin', '546456565', 'property_manager', '4nHZC', '1', '2023-08-22 12:39:43', '$2y$10$oWKm2Nvg4CKGTFza4iBMY.8PL.auUKkEq26YJPj5sdxf.5cD18Loa', '', NULL, '2023-06-05 21:34:08', '2023-08-22 18:39:43'),
(82, 'ana', 'amartinezc.info@gmail.com', NULL, 'ana', '4428168746', 'property_manager', '', '1', '', '$2y$10$FhhmQVriUQuVv/eAavzWsONgVgS8UdIVXHt2NlQsidmSHXJ3i2Y3W', '', NULL, '2023-08-09 00:49:55', '2023-08-09 23:09:57'),
(134, 'martin', 'martin.amador.tic@gmail.com', NULL, 'mar123', '4428168746', '', '', '1', '', '$2y$10$bj3zFQ6NjW1wPMGDY2/1ke7NaVhEcN1VOBe/VUhoyGiAQ1nSJVRc.', '', NULL, '2023-08-21 23:44:45', '2023-08-22 18:38:34'),
(135, 'martin', 'martin.reyes.qro@gmail.com', NULL, '', '4428168746', 'Resident', 'Y6Nj1', '0', '2023-08-22 12:40:45', '$2y$10$maLjKAf2D6DMetaoSpvPHeTecDOWvtB4Sv95Ms4Jzza4G6RijG/fG', 'Pending', NULL, '2023-08-22 02:12:39', '2023-08-22 18:40:45');

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
(2, 15),
(82, 15),
(134, 15),
(134, 19),
(135, 20);

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
(1, 135, 'Y6Nj1', '2245688', '123456789', 'audi', '1234567', 2003, 'rojo', 'Car', '', 'pending', '', '', '2023-08-22 18:51:47', '2023-08-22 18:51:47'),
(2, 135, 'Y6Nj1', '1234', 'pueba', 'audi', 'audi', 2003, 'negro', 'Car', '', 'pending', '', '', '2023-08-22 18:55:28', '2023-08-22 18:55:28');

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
  `valid_from` datetime NOT NULL,
  `model` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indices de la tabla `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resident_uploads`
--
ALTER TABLE `resident_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resident_upload_files`
--
ALTER TABLE `resident_upload_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_upload_files_upload_id_foreign` (`upload_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitorpasses_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `property_settings`
--
ALTER TABLE `property_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resident_uploads`
--
ALTER TABLE `resident_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `resident_upload_files`
--
ALTER TABLE `resident_upload_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Filtros para la tabla `resident_upload_files`
--
ALTER TABLE `resident_upload_files`
  ADD CONSTRAINT `resident_upload_files_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `resident_uploads` (`id`);

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

--
-- Filtros para la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  ADD CONSTRAINT `visitorpasses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
