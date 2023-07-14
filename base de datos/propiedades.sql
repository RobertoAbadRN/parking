-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2023 a las 23:48:29
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
-- Base de datos: `propiedades`
--

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
(10, '2023_07_12_124158_add_password_to_residents_table', 7);

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

INSERT INTO `properties` (`id`, `area`, `name`, `address`, `city`, `state`, `country`, `zip_code`, `location_type`, `places`, `property_code`, `permit_status`, `logo`, `created_at`, `updated_at`) VALUES
(6, 'prueba', 'edificio1', 'calle esmeralda', 'queretaro', 'Queretaro', 'México', '76915', 'Apartment Complex', '3', 'QyQxc', '1', NULL, '2023-07-03 22:13:07', '2023-07-04 17:40:27'),
(9, 'prueba2', 'juan', 'margaritas 11', 'queretaro', 'Queretaro', 'México', '76900', 'Apartment Complex', '2', 'acUzh', '', '1688487450.png', '2023-07-04 16:17:30', '2023-07-04 16:17:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident_name` varchar(255) NOT NULL,
  `apart_unit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `lease_expiration` date NOT NULL,
  `reserved_space` varchar(255) NOT NULL,
  `resident_status` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `permit_status` varchar(255) NOT NULL,
  `preferred_language` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `residents`
--

INSERT INTO `residents` (`id`, `resident_name`, `apart_unit`, `email`, `phone`, `lease_expiration`, `reserved_space`, `resident_status`, `password`, `property_code`, `access_level`, `permit_status`, `preferred_language`, `created_at`, `updated_at`) VALUES
(1, 'prueba', '2', 'martin.amador.tic@gmail.com', '4428168746', '0000-00-00', '2', 'Pending', '', 'QyQxc', '', '', 'spanish', '2023-07-14 03:06:53', '2023-07-14 03:06:53');

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
(1, 'martin', 'martin.amador.tic@gmail.com', NULL, 'mar', '2101616', 'Property Manager', 'QyQxc', 'NO', '2023-07-14 12:10:21', '$2y$10$oYRV.EII7.lW99y47XfwYuIaywnnSsgRzANhHrpBVdTqhFZHzOS92', '', NULL, '2023-06-01 23:41:18', '2023-07-14 18:10:21'),
(2, 'admin', 'admin@gmail.com', NULL, 'admin123', '', 'Property Manager', 'acUzh', 'NO', '2023-06-28 16:25:02', '$2y$10$DGVPAkaYoo3MIfk5hj0eq.PkM77iimySNGCfzUEZK7K95NrQgjpru', '', NULL, '2023-06-05 21:34:08', '2023-06-28 22:25:02'),
(46, 'martin', 'martin.reyes.qro@gmail.com', NULL, 'hola', '4428168746', 'property_leasion_agent', 'QyQx4', 'NO', '', '$2y$10$iVtZ3RO4O9R1WJjWEjBtse19fFpde3tZxNpQONptRgTzYBodQGGza', '', NULL, '2023-07-02 02:41:55', '2023-07-02 02:42:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_properties`
--

CREATE TABLE `user_properties` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `permit_type` varchar(30) NOT NULL,
  `start_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `property_code`, `license_plate`, `vin`, `make`, `model`, `year`, `color`, `vehicle_type`, `permit_type`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'QyQxc', '25456', '55244', 'fortd', '1235', 1998, 'blanco', 'ford', '', '', '', '2023-07-14 02:51:17', '2023-07-14 02:51:17'),
(2, 'QyQxc', '25456', '55244', 'fortd', '1235', 1998, 'blanco', 'ford', '', '', '', '2023-07-14 03:06:53', '2023-07-14 03:06:53');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indices de la tabla `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `visitorpasses`
--
ALTER TABLE `visitorpasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user_properties`
--
ALTER TABLE `user_properties`
  ADD CONSTRAINT `user_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
