-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-10-2023 a las 22:08:33
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `administracion_propiedades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_settings`
--

DROP TABLE IF EXISTS `app_settings`;
CREATE TABLE IF NOT EXISTS `app_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicles_per_apartment` int DEFAULT NULL,
  `tenants_change_info` enum('YES','NO') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_on_tenants_info` enum('YES','NO') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maximum_of_changes_allowed` int DEFAULT NULL,
  `reserved_spot_allow` enum('YES','NO') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reserved_spot_per_apartment` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `app_settings`
--

INSERT INTO `app_settings` (`id`, `property_code`, `vehicles_per_apartment`, `tenants_change_info`, `notify_on_tenants_info`, `maximum_of_changes_allowed`, `reserved_spot_allow`, `reserved_spot_per_apartment`, `created_at`, `updated_at`) VALUES
(1, '15', 2, 'YES', 'YES', 2, 'YES', 3, '2023-09-19 04:45:52', '2023-10-04 18:34:50'),
(2, '21', 3, 'YES', 'YES', 3, 'YES', 3, '2023-09-19 17:08:13', '2023-09-19 13:29:51'),
(3, '22', 3, 'YES', 'YES', 3, 'YES', 3, '2023-09-19 17:19:57', '2023-09-19 17:20:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_emails_register_vehicle`
--

DROP TABLE IF EXISTS `default_emails_register_vehicle`;
CREATE TABLE IF NOT EXISTS `default_emails_register_vehicle` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_emails_register_vehicle`
--

INSERT INTO `default_emails_register_vehicle` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, ' \r\nYour vehicle is pending to be approved in the system. This means the permit is NOT valid yet. To complete the process please visit the office with an official copy of the vehicle\'s insurance, title, or registration. The official document has to be under the leaseholder\'s name. Office management has the ability to refuse or reject a resident\'s document. \r\n\r\n\r\n\r\n\r\nSu vehículo está pendiente de ser aprobado en el sistema. Esto significa que el permiso todavía NO esta valido. Para completar el proceso por favor visite la oficina con una copia oficial del  seguro del vehiculo, titulo, o registración. El documento oficial debe de estar bajo el nombre del arrendatario. La administración de la oficina tiene la habilidad de rechazar un documento del residente. \r\n', '12345', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_emails_suspend`
--

DROP TABLE IF EXISTS `default_emails_suspend`;
CREATE TABLE IF NOT EXISTS `default_emails_suspend` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_emails_suspend`
--

INSERT INTO `default_emails_suspend` (`id`, `email_content`, `property_code`) VALUES
(1, 'Your parking permit has been suspended and is not valid within the property. Your vehicle cannot be parked on the property or it will be towed at your own expense. Please contact to the leasing office to revalidate your permit as soon as possible. \r\n\r\n\r\n\r\nSu permiso de estacionamiento ha sido suspendido y no es válido en la propiedad. Su vehículo no puede ser estacionado dentro de la propiedad o será remolcado a su propio costo. Por favor contacte a la oficina de arrendamiento inmediatamente para reactivar su permiso de estacionamiento.\r\n', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_email_aprove`
--

DROP TABLE IF EXISTS `default_email_aprove`;
CREATE TABLE IF NOT EXISTS `default_email_aprove` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `default_email_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_email_aprove`
--

INSERT INTO `default_email_aprove` (`id`, `property_code`, `email_content`, `created_at`, `updated_at`) VALUES
(2, '12345678', 'Your parking permit has been entered into the system and is officially active. The expiration date on your parking permit aligns with your lease contract. For residents with temporary plates, the permit expiration aligns with the expiration date on your plates, please make sure to update the plates in the system once you have received your new plates or before your permit expires. Please contact the office to renew your lease contract before it is expired. \r\n\r\n\r\n\r\nSu permiso de estacionamiento ha sido ingresado en el sistema y esta oficialmente activo. La fecha de vencimiento en su permiso corresponde a  la fecha de vencimiento de su contrato de arrendamiento. Para residentes con placas temporales el vencimiento de su permiso será la fecha en que vencen sus placas temporales, por favor asegurese de hacer la actualizacion de sus nuevas placas en el sistema una vez que obtenga sus nuevas placas o antes de que expire su permiso. Por favor contacte a la oficina para renovar su contrato de arrendamiento antes de la fecha de vencimiento.\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_email_expired`
--

DROP TABLE IF EXISTS `default_email_expired`;
CREATE TABLE IF NOT EXISTS `default_email_expired` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `default_email_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_email_expired`
--

INSERT INTO `default_email_expired` (`id`, `property_code`, `email_content`, `created_at`, `updated_at`) VALUES
(3, '12346678', '\r\nYour parking permit is officially expired. Please contact asap to the office to verify if you need to renew your lease contract or make a payment plan in order to reactivate your  parking permit. Your vehicle is at risk of being towed if parked on the property as long as the permit is expired. \r\n\r\n\r\n\r\nSu permiso de estacionamiento está oficialmente expirado. Por favor contacte inmediatamente a la oficina para verificar si es necesario renovar su contrato de arrendamiento o realizar un plan de pagos para reactivar su permiso de estacionamiento. Su vehículo está en riesgo de ser remolcado si está estacionado en la propiedad mientras su permiso siga expirado. \r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_email_settings`
--

DROP TABLE IF EXISTS `default_email_settings`;
CREATE TABLE IF NOT EXISTS `default_email_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `default_email_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_email_settings`
--

INSERT INTO `default_email_settings` (`id`, `property_code`, `email_content`, `created_at`, `updated_at`) VALUES
(1, '12345', 'This is an official and only warning that towing will be strictly enforced as of August 24, 2023. Please make sure you have registered your vehicle on the system and have received a valid physical resident parking permit. Visitors will need to be registered online. If you have any questions or concerns please feel free to give us a call at 832-374-7703.\r\n\r\nThanks\r\n\r\n\r\nEsta es una oficial y la unica advertencia de que el remolque de los vehiculos se aplicara estrictamente a partir de Agosto 24, 2023. Por favor asegurese de que a registrado su vehiculo en el sistema y a recibido un valido y fisico permiso de residente. Los visitores tendran de ser registrados en linea. Si tiene alguna duda o pregunta en marcarnos al numero 832-374-7703. \r\n\r\n\r\nGracias\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_email_welcome`
--

DROP TABLE IF EXISTS `default_email_welcome`;
CREATE TABLE IF NOT EXISTS `default_email_welcome` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `default_email_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_email_welcome`
--

INSERT INTO `default_email_welcome` (`id`, `property_code`, `email_content`, `created_at`, `updated_at`) VALUES
(3, '123456', '\r\nWelcome to the A.Martínez Wrecker Service website! Please review and accept the parking agreement terms and conditions in order to get access to modifications to your vehicle and to register your visitors.\r\n\r\n\r\nBienvenido al website de A.Martínez Wrecker Service! Por favor revise el acuerdo de estacionamiento. Tendra que aceptar los terminos y condiciones para que pueda tener acceso a hacer modificaciones a su vehiculo y a registrar sus visitores. \r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `default_email_welcomemanager`
--

DROP TABLE IF EXISTS `default_email_welcomemanager`;
CREATE TABLE IF NOT EXISTS `default_email_welcomemanager` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `default_email_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `default_email_welcomemanager`
--

INSERT INTO `default_email_welcomemanager` (`id`, `property_code`, `email_content`, `created_at`, `updated_at`) VALUES
(3, '1234567', 'Welcome to the A.Martínez Wrecker Service website! Please find your username and password below. With this information, you\'ll be able to enter the system. Save the login information for the next time you use the system. \n\n\nThanks\n\nBienvenido al website de A.Martínez Wrecker Service! Porfavor encuentre su nombre de usario y contrasena abajo. Con esta informacion podra entrar al sistema. Guarde su informacion de acceso para la proxima vez que use el sistema.\n\n\nGracias\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `apart_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lease_expiration` date NOT NULL,
  `reserved_space` tinyint UNSIGNED NOT NULL,
  `reserved` int NOT NULL,
  `reserved_spacevisitors` tinyint NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_agreement_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_status` timestamp NULL DEFAULT NULL,
  `prefered_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `user_id`, `apart_unit`, `lease_expiration`, `reserved_space`, `reserved`, `reserved_spacevisitors`, `property_code`, `permit_status`, `created_at`, `updated_at`, `terms_agreement_status`, `agreement_token`, `date_status`, `prefered_language`) VALUES
(3, 197, '2', '2023-10-31', 6, 10, 0, 'FpXE5', 'pending', '2023-09-25 18:12:04', '2023-10-03 23:20:51', 'pending', 'aKkc51JNu1oY8ZXRvdrP5ReColqpbbGt0THEa2ht', NULL, 'english'),
(4, 199, '50', '2023-09-30', 3, 0, 0, 'FpXE5', 'pending', '2023-09-25 18:43:05', '2023-10-24 01:52:42', 'accepted', 'fZILXaZI8X5Q09rCh1UatsvpEcBTs0kjswyTAKua', '2023-10-24 01:52:42', 'english'),
(8, 203, '12', '0000-00-00', 0, 0, 0, 'FpXE5', 'pending', '2023-09-30 23:21:59', '2023-09-30 23:21:59', 'pending', 'jmvfm9mWskwsHtJrZlTigKEN0Us9K5AP6x4Rvz2G', NULL, NULL),
(9, 204, '10', '2023-10-31', 10, 10, 0, '54V7x', 'pending', '2023-09-30 23:25:21', '2023-10-02 20:11:15', 'pending', 'erDE4T8F1DheMWxpxS5GfBcorPNv00WifLZlQabd', NULL, NULL),
(10, 205, '122', '2023-10-31', 10, 10, 0, '54V7x', 'pending', '2023-09-30 23:48:39', '2023-10-02 20:11:39', 'pending', 'OaKKHziM6nWq7POJmBySBaAn7n0m8q6LsW4U573u', NULL, 'english'),
(11, 206, 'emsaje de prueba', '0000-00-00', 10, 3, 0, '54V7x', 'pending', '2023-10-02 17:13:35', '2023-10-02 20:06:29', 'pending', 'vDZfsyxuKqA7G8qKbLrkUNcbPB5okZpBwE6cpwR7', NULL, 'english'),
(12, 207, '33', '2023-10-03', 6, 0, 0, '54V7x', 'pending', '2023-10-02 18:04:08', '2023-10-02 18:04:08', 'pending', 'JtObwFD0XHgms4vRbqlZttu9XQ5f1chcjn5AqssG', NULL, 'spanish'),
(13, 208, '2', '2023-10-31', 10, 3, 0, '54V7x', 'pending', '2023-10-02 18:09:23', '2023-10-02 20:06:42', 'pending', 'FK3xlEGGdfUmcBAydkD7NVGO5eq45JqLQgZmK8ss', NULL, 'english'),
(14, 208, '2', '2023-10-31', 0, 3, 0, '4nHZC', 'pending', '2023-10-05 02:07:23', '2023-10-05 02:07:23', 'pending', 's2sOnxo2wY8eCrcydDuE6p0rtPdq0jaDRSGkg987', NULL, 'english'),
(15, 208, '2', '2023-10-31', 0, 3, 0, 'SbBtO', 'pending', '2023-10-05 02:09:52', '2023-10-05 02:09:52', 'pending', 'BqZKpz1xvjEnqrdPGq72WpP71ydfyJMvNrLazfoI', NULL, 'english'),
(16, 201, '3334', '2023-10-31', 0, 3, 0, 'SbBtO', 'pending', '2023-10-05 02:29:27', '2023-10-05 02:29:27', 'pending', 'euz5BVDzy30SISkE13m1MkVJ0nG5hJ5vsYpRT97M', NULL, 'spanish'),
(18, 210, '3334', '2023-10-31', 0, 3, 0, 'SbBtO', 'pending', '2023-10-05 02:50:01', '2023-10-05 02:50:01', 'pending', NULL, NULL, 'spanish'),
(20, 211, '3334', '2023-10-31', 0, 3, 0, '4nHZC', 'pending', '2023-10-05 02:52:53', '2023-10-05 02:52:53', 'pending', 'QPqJKCx9SWJ5cPpcaL9Wd5DmfapBSLgoADLRwaiV', NULL, 'english'),
(21, 164, '50', '2023-10-31', 0, 3, 0, 'SbBtO', 'pending', '2023-10-05 03:32:31', '2023-10-16 16:07:08', 'pending', 'HEvAWWvil4ZVQ2Kgeawji6XC4zu2zCgPfNHnW9af', NULL, 'spanish'),
(22, 212, '100', '2024-03-28', 0, 3, 0, '4nHZC', 'pending', '2023-10-10 18:41:16', '2023-10-24 02:43:14', 'pending', 'hSeqdjea38LaOxNdVFC8iSsy5DiJbIm9rYCDjMux', NULL, 'spanish'),
(32, 224, '123', '2023-10-31', 0, 3, 0, 'SbBtO', 'pending', '2023-10-16 19:19:48', '2023-10-24 02:10:32', 'opened', 'WFo0a7Yh7tl9BHS0dyNpNSsMQSToT5tZHq2qlE6J', NULL, 'spanish');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_aproved`
--

DROP TABLE IF EXISTS `emails_aproved`;
CREATE TABLE IF NOT EXISTS `emails_aproved` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_aproved`
--

INSERT INTO `emails_aproved` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(2, 'Your parking permit has been entered into the system and is officially active. The expiration date on your parking permit aligns with your lease contract. For residents with temporary plates, the permit expiration aligns with the expiration date on your plates, please make sure to update the plates in the system once you have received your new plates or before your permit expires. Please contact the office to renew your lease contract before it is expired. \r\n\r\n\r\n\r\nSu permiso de estacionamiento ha sido ingresado en el sistema y esta oficialmente activo. La fecha de vencimiento en su permiso corresponde a  la fecha de vencimiento de su contrato de arrendamiento. Para residentes con placas temporales el vencimiento de su permiso será la fecha en que vencen sus placas temporales, por favor asegurese de hacer la actualizacion de sus nuevas placas en el sistema una vez que obtenga sus nuevas placas o antes de que expire su permiso. Por favor contacte a la oficina para renovar su contrato de arrendamiento antes de la fecha de vencimiento.', '4nHZC', '2023-10-13 18:36:09', '2023-10-13 18:36:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_expired`
--

DROP TABLE IF EXISTS `emails_expired`;
CREATE TABLE IF NOT EXISTS `emails_expired` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_expired`
--

INSERT INTO `emails_expired` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'Your parking permit is officially expired. Please contact asap to the office to verify if you need to renew your lease contract or make a payment plan in order to reactivate your  parking permit. Your vehicle is at risk of being towed if parked on the property as long as the permit is expired. \r\n\r\n\r\n\r\nSu permiso de estacionamiento está oficialmente expirado. Por favor contacte inmediatamente a la oficina para verificar si es necesario renovar su contrato de arrendamiento o realizar un plan de pagos para reactivar su permiso de estacionamiento. Su vehículo está en riesgo de ser remolcado si está estacionado en la propiedad mientras su permiso siga expirado. \r\n\r\n                                ****', '4nHZC', '2023-10-13 16:37:53', '2023-10-16 15:17:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_registervehicle`
--

DROP TABLE IF EXISTS `emails_registervehicle`;
CREATE TABLE IF NOT EXISTS `emails_registervehicle` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_registervehicle`
--

INSERT INTO `emails_registervehicle` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'Your vehicle is pending to be approved in the system. This means the permit is NOT valid yet. To complete the process please visit the office with an official copy of the vehicle\'s insurance, title, or registration. The official document has to be under the leaseholder\'s name. Office management has the ability to refuse or reject a resident\'s document. \r\n\r\n\r\n\r\n\r\nSu vehículo está pendiente de ser aprobado en el sistema. Esto significa que el permiso todavía NO esta valido. Para completar el proceso por favor visite la oficina con una copia oficial del  seguro del vehiculo, titulo, o registración. El documento oficial debe de estar bajo el nombre del arrendatario. La administración de la oficina tiene la habilidad de rechazar un documento del residente. \r\n\r\n                            *', '4nHZC', '2023-10-13 16:37:43', '2023-10-13 16:37:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_settings`
--

DROP TABLE IF EXISTS `emails_settings`;
CREATE TABLE IF NOT EXISTS `emails_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emails_settings_property_code_unique` (`property_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_settings`
--

INSERT INTO `emails_settings` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'This is an official and only warning that towing will be strictly enforced as of August 24, 2023. Please make sure you have registered your vehicle on the system and have received a valid physical resident parking permit. Visitors will need to be registered online. If you have any questions or concerns please feel free to give us a call at 832-374-7703.\r\n\r\nThanks\r\n\r\n\r\n\r\nEsta es una oficial y la unica advertencia de que el remolque de los vehiculos se aplicara estrictamente a partir de Agosto 24, 2023. Por favor asegurese de que a registrado su vehiculo en el sistema y a recibido un valido y fisico permiso de residente. Los visitores tendran de ser registrados en linea. Si tiene alguna duda o pregunta en marcarnos al numero 832-374-7703. \r\n\r\n\r\nGracias', '4nHZC', '2023-10-13 16:36:21', '2023-10-13 16:36:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_suspend`
--

DROP TABLE IF EXISTS `emails_suspend`;
CREATE TABLE IF NOT EXISTS `emails_suspend` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_suspend`
--

INSERT INTO `emails_suspend` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'Your parking permit has been suspended and is not valid within the property. Your vehicle cannot be parked on the property or it will be towed at your own expense. Please contact to the leasing office to revalidate your permit as soon as possible. \r\n\r\n\r\n\r\nSu permiso de estacionamiento ha sido suspendido y no es válido en la propiedad. Su vehículo no puede ser estacionado dentro de la propiedad o será remolcado a su propio costo. Por favor contacte a la oficina de arrendamiento inmediatamente para reactivar su permiso de estacionamiento.\r\n\r\n                    *', '4nHZC', '2023-10-13 19:30:28', '2023-10-13 19:30:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_welcome`
--

DROP TABLE IF EXISTS `emails_welcome`;
CREATE TABLE IF NOT EXISTS `emails_welcome` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_welcome`
--

INSERT INTO `emails_welcome` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to the A.Martínez Wrecker Service website! Please review and accept the parking agreement terms and conditions in order to get access to modifications to your vehicle and to register your visitors.\n\n\nBienvenido al website de A.Martínez Wrecker Service! Por favor revise el acuerdo de estacionamiento. Tendra que aceptar los terminos y condiciones para que pueda tener acceso a hacer modificaciones a su vehiculo y a registrar sus visitores. \n\n                                *', '4nHZC', '2023-10-13 16:38:01', '2023-10-13 16:38:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_welcome_manager`
--

DROP TABLE IF EXISTS `emails_welcome_manager`;
CREATE TABLE IF NOT EXISTS `emails_welcome_manager` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `property_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails_welcome_manager`
--

INSERT INTO `emails_welcome_manager` (`id`, `email_content`, `property_code`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to the A.Martínez Wrecker Service website! Please find your username and password below. With this information, you\'ll be able to enter the system. Save the login information for the next time you use the system. \r\n\r\n\r\nThanks\r\n\r\nBienvenido al website de A.Martínez Wrecker Service! Porfavor encuentre su nombre de usario y contrasena abajo. Con esta informacion podra entrar al sistema. Guarde su informacion de acceso para la proxima vez que use el sistema.\r\n\r\n\r\nGracias\r\n\r\n                                *', '4nHZC', '2023-10-13 16:38:09', '2023-10-13 16:38:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path_es` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `description`, `file_path_en`, `file_path_es`, `created_at`, `updated_at`) VALUES
(11, 'prueba', '169367426764f36b1bd50de_tes-english.docx', '169367426764f36b1bd510c_tes-spanish.docx', '2023-09-02 17:04:27', '2023-09-02 17:04:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2023_07_31_131837_create_departments_table', 10),
(21, '2023_07_15_184629_create_departaments_table', 11),
(31, '2023_08_07_011245_create_resident_uploads_table', 12),
(32, '2023_08_07_113534_create_resident_upload_files_table', 12),
(34, '2023_08_10_143351_add_terms_agreement_status_to_departments_table', 13),
(35, '2023_08_10_145649_add_agreement_token_to_departments', 14),
(36, '2023_08_11_171123_add_date_status_to_departments_table', 15),
(37, '2023_08_16_113815_modify_visitorpasses_table', 16),
(44, '2023_07_27_061338_create_property_settings_table', 17),
(45, '2023_07_27_062552_create_permit_settings_table', 17),
(46, '2023_07_27_063238_create_visitor_settings_table', 17),
(47, '2023_08_08_124603_create_registrations_table', 17),
(48, '2023_09_10_143005_add_email_content_to_settings', 17),
(49, '2023_09_10_172500_create_default_email_settings_table', 17),
(50, '2023_09_11_105504_create_property_language_settings_table', 18),
(51, '2023_09_20_162731_add_prefered_language_to_departments', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(4, 'App\\Models\\User', 82),
(8, 'App\\Models\\User', 106),
(2, 'App\\Models\\User', 107),
(2, 'App\\Models\\User', 108),
(1, 'App\\Models\\User', 109),
(1, 'App\\Models\\User', 110),
(2, 'App\\Models\\User', 111),
(2, 'App\\Models\\User', 112),
(1, 'App\\Models\\User', 113),
(4, 'App\\Models\\User', 114),
(2, 'App\\Models\\User', 115),
(2, 'App\\Models\\User', 116),
(4, 'App\\Models\\User', 117),
(2, 'App\\Models\\User', 118),
(1, 'App\\Models\\User', 119),
(4, 'App\\Models\\User', 120),
(4, 'App\\Models\\User', 121),
(4, 'App\\Models\\User', 122),
(2, 'App\\Models\\User', 123),
(1, 'App\\Models\\User', 124),
(2, 'App\\Models\\User', 125),
(4, 'App\\Models\\User', 126),
(4, 'App\\Models\\User', 128),
(2, 'App\\Models\\User', 129),
(2, 'App\\Models\\User', 130),
(4, 'App\\Models\\User', 131),
(4, 'App\\Models\\User', 132),
(2, 'App\\Models\\User', 133),
(8, 'App\\Models\\User', 150),
(8, 'App\\Models\\User', 159),
(7, 'App\\Models\\User', 164),
(8, 'App\\Models\\User', 165),
(8, 'App\\Models\\User', 166),
(8, 'App\\Models\\User', 167),
(8, 'App\\Models\\User', 168),
(8, 'App\\Models\\User', 169),
(8, 'App\\Models\\User', 170),
(8, 'App\\Models\\User', 171),
(8, 'App\\Models\\User', 172),
(8, 'App\\Models\\User', 173),
(8, 'App\\Models\\User', 174),
(8, 'App\\Models\\User', 175),
(8, 'App\\Models\\User', 176),
(8, 'App\\Models\\User', 177),
(8, 'App\\Models\\User', 178),
(8, 'App\\Models\\User', 179),
(8, 'App\\Models\\User', 180),
(8, 'App\\Models\\User', 181),
(8, 'App\\Models\\User', 182),
(8, 'App\\Models\\User', 183),
(8, 'App\\Models\\User', 184),
(8, 'App\\Models\\User', 185),
(8, 'App\\Models\\User', 186),
(8, 'App\\Models\\User', 187),
(8, 'App\\Models\\User', 189),
(8, 'App\\Models\\User', 190),
(8, 'App\\Models\\User', 191),
(8, 'App\\Models\\User', 192),
(8, 'App\\Models\\User', 193),
(8, 'App\\Models\\User', 194),
(8, 'App\\Models\\User', 197),
(8, 'App\\Models\\User', 199),
(8, 'App\\Models\\User', 203),
(8, 'App\\Models\\User', 204),
(8, 'App\\Models\\User', 205),
(8, 'App\\Models\\User', 206),
(8, 'App\\Models\\User', 207),
(8, 'App\\Models\\User', 208),
(1, 'App\\Models\\User', 209),
(8, 'App\\Models\\User', 212),
(8, 'App\\Models\\User', 224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$AJis6BGLZVfxM4gQ3RjBEe1a3Rr4rCDCoU6ggpKOTxnSfR7t2NmWi', '2023-08-11 20:30:39'),
('juancarlosmunos112@gmail.com', '$2y$10$EKISd9XqxWksEe1USioCtunktDk2bFCoAl3V4m3Dbf4TDQb0pchE6', '2023-08-16 22:27:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 'roles', 'web', NULL, NULL),
(9, 'inspector', 'web', '2023-09-22 04:26:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permit_settings`
--

DROP TABLE IF EXISTS `permit_settings`;
CREATE TABLE IF NOT EXISTS `permit_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `resident` tinyint(1) NOT NULL DEFAULT '0',
  `visitor` tinyint(1) NOT NULL DEFAULT '0',
  `sub_contractor` tinyint(1) NOT NULL DEFAULT '0',
  `carport` tinyint(1) NOT NULL DEFAULT '0',
  `temporary` tinyint(1) NOT NULL DEFAULT '0',
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  `vip` tinyint(1) NOT NULL DEFAULT '0',
  `contractor` tinyint(1) NOT NULL DEFAULT '0',
  `employee` tinyint(1) NOT NULL DEFAULT '0',
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `places` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id`, `area`, `name`, `nickname`, `address`, `city`, `state`, `country`, `zip_code`, `location_type`, `places`, `property_code`, `permit_status`, `logo`, `created_at`, `updated_at`) VALUES
(15, '1011 th W10 th', '1011 th W10 th', '123123', 'direccion propiedad', 'tx', 'tx', 'usa', '76900', 'Apartment Building', '200', '4nHZC', 'active', 'images/logo/hnt4FuJiErCjnLCLWZqvLMJ5PvkibZdEHz7QGl01.png', '2023-08-08 23:10:59', '2023-10-26 16:24:46'),
(21, 'propiedad2', 'propiedad 2', 'pro2', 'calle esmeralda', 'queretaro', 'Queretaro', 'México', '76915', 'Apartment Building', '200', '54V7x', 'active', NULL, '2023-08-29 23:22:24', '2023-08-29 23:22:24'),
(22, 'mx', 'propiedad3', 'propiedad3', 'calle esmeralda', 'queretaro', 'Queretaro', 'México', '76915', 'Apartment Building', '100', 'SbBtO', 'active', 'images/logo/SmMykpQaPTQcVoGop71OpOuzobB1WRtecRAf5dNM.png', '2023-09-11 18:03:24', '2023-09-11 18:03:24'),
(24, 'prueba final', 'prueba final', 'prueba final', 'prueba final', 'qro', 'mx', 'mexico', '76905', 'Private Parking', '200', 'WM2Fe', 'active', 'images/logo/3cHPnROizqab4M4Pk3jA0w647DQhwFLZnh9mjL3C.png', '2023-10-20 17:00:49', '2023-10-20 17:01:35'),
(25, 'prueba', 'martin', 'san angel', 'margaritas 11', 'queretaro', 'Queretaro', 'México', '76900', 'Apartment Building', '100', 'pN8iR', 'active', 'images/logo/hT7Huyb0pDNivUYatgrvPubIqObJWWtq6oyebZjg.png', '2023-10-26 02:58:38', '2023-10-26 02:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property_language_settings`
--

DROP TABLE IF EXISTS `property_language_settings`;
CREATE TABLE IF NOT EXISTS `property_language_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `camp_es_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_12` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_12` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_12` longtext COLLATE utf8mb4_unicode_ci,
  `name` tinyint(1) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `space` tinyint(1) DEFAULT NULL,
  `license` tinyint(1) DEFAULT NULL,
  `number` tinyint(1) DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin_left` longtext COLLATE utf8mb4_unicode_ci,
  `margin_top` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `property_language_settings`
--

INSERT INTO `property_language_settings` (`id`, `camp_es_1`, `camp_es_2`, `camp_es_3`, `camp_es_4`, `camp_es_5`, `camp_es_6`, `camp_es_7`, `camp_es_8`, `camp_es_9`, `camp_es_10`, `camp_es_11`, `camp_es_12`, `camp_en_1`, `camp_en_2`, `camp_en_3`, `camp_en_4`, `camp_en_5`, `camp_en_6`, `camp_en_7`, `camp_en_8`, `camp_en_9`, `camp_en_10`, `camp_en_11`, `camp_en_12`, `camp_fr_1`, `camp_fr_2`, `camp_fr_3`, `camp_fr_4`, `camp_fr_5`, `camp_fr_6`, `camp_fr_7`, `camp_fr_8`, `camp_fr_9`, `camp_fr_10`, `camp_fr_11`, `camp_fr_12`, `name`, `type`, `space`, `license`, `number`, `start_date`, `end_date`, `logo`, `ppm`, `img`, `margin_left`, `margin_top`, `created_at`, `updated_at`) VALUES
(1, 'Limpie el área donde se colocará el adhesivo.', 'Separar la etiqueta del documento en las perforaciones', 'Pelar el revestimiento que cubre el borde azul del adhesivo', 'Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.', 'Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:', 'Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.', 'Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.', 'El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.', 'Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.', 'Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.', 'Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.', 'Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.', 'Clean area where sticker is to be placed.', 'Separate sticker from document at perforations', 'Separate sticker from document at perforations', 'Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.', 'This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:', 'I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.', 'I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.', 'The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.', 'I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.', 'I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.', 'I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.', 'If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '1', '1', '1', 'ppm1', 'property', '2', '2', '2023-08-22 23:46:18', '2023-08-22 23:50:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property_settings`
--

DROP TABLE IF EXISTS `property_settings`;
CREATE TABLE IF NOT EXISTS `property_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `camp_es_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_es_12` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_en_12` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_1` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_2` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_3` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_4` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_5` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_6` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_7` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_8` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_9` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_10` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_11` longtext COLLATE utf8mb4_unicode_ci,
  `camp_fr_12` longtext COLLATE utf8mb4_unicode_ci,
  `name` tinyint(1) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `space` tinyint(1) DEFAULT NULL,
  `license` tinyint(1) DEFAULT NULL,
  `number` tinyint(1) DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin_left` longtext COLLATE utf8mb4_unicode_ci,
  `margin_top` longtext COLLATE utf8mb4_unicode_ci,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `property_settings`
--

INSERT INTO `property_settings` (`id`, `camp_es_1`, `camp_es_2`, `camp_es_3`, `camp_es_4`, `camp_es_5`, `camp_es_6`, `camp_es_7`, `camp_es_8`, `camp_es_9`, `camp_es_10`, `camp_es_11`, `camp_es_12`, `camp_en_1`, `camp_en_2`, `camp_en_3`, `camp_en_4`, `camp_en_5`, `camp_en_6`, `camp_en_7`, `camp_en_8`, `camp_en_9`, `camp_en_10`, `camp_en_11`, `camp_en_12`, `camp_fr_1`, `camp_fr_2`, `camp_fr_3`, `camp_fr_4`, `camp_fr_5`, `camp_fr_6`, `camp_fr_7`, `camp_fr_8`, `camp_fr_9`, `camp_fr_10`, `camp_fr_11`, `camp_fr_12`, `name`, `type`, `space`, `license`, `number`, `start_date`, `end_date`, `logo`, `nickname`, `ppm`, `img`, `margin_left`, `margin_top`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 'Limpie el área donde se colocará el adhesivo.', 'Separar la etiqueta del documento en las perforaciones', 'Pelar el revestimiento que cubre el borde azul del adhesivo', 'Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.', 'Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:', 'Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.', 'Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.', 'El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.', 'Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.', 'Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.', 'Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.', 'Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.', 'Clean area where sticker is to be placed.', 'Separate sticker from document at perforations', 'Separate sticker from document at perforations', 'Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.', 'This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:', 'I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.', 'I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.', 'The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.', 'I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.', 'I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.', 'I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.', 'If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '1', '1', '1', '1', 'ppm1', 'service', '2', '2', 22, '2023-09-11 18:49:03', '2023-10-23 01:36:38'),
(2, 'Limpie el área donde se colocará el adhesivo.', 'Separar la etiqueta del documento en las perforaciones', 'Pelar el revestimiento que cubre el borde azul del adhesivo', 'Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.', 'Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:', 'Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.', 'Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.', 'El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.', 'Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.', 'Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.', 'Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.', 'Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.', 'Clean area where sticker is to be placed.', 'Separate sticker from document at perforations', 'Separate sticker from document at perforations', 'Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.', 'This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:', 'I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.', 'I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.', 'The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.', 'I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.', 'I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.', 'I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.', 'If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '1', '1', '1', '1', 'ppm1', 'property', '2', '1', 15, '2023-09-11 18:49:10', '2023-10-19 20:32:14'),
(3, 'Limpie el área donde se colocará el adhesivo.', 'Separar la etiqueta del documento en las perforaciones', 'Pelar el revestimiento que cubre el borde azul del adhesivo', 'Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.', 'Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:', 'Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.', 'Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.', 'El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.', 'Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.', 'Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.', 'Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.', 'Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.', 'Clean area where sticker is to be placed.', 'Separate sticker from document at perforations', 'Separate sticker from document at perforations', 'Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.', 'This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:', 'I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.', 'I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.', 'The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.', 'I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.', 'I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.', 'I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.', 'If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '1', '1', '1', '0', 'ppm1', 'property', '2', '2', 21, '2023-09-11 18:49:14', '2023-10-19 20:27:36'),
(4, 'Limpie el área donde se colocará el adhesivo.', 'Separar la etiqueta del documento en las perforaciones', 'Pelar el revestimiento que cubre el borde azul del adhesivo', 'Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.', 'Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:', 'Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.', 'Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.', 'El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.', 'Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.', 'Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.', 'Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.', 'Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.', 'Clean area where sticker is to be placed.', 'Separate sticker from document at perforations', 'Separate sticker from document at perforations', 'Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.', 'This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:', 'I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.', 'I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.', 'The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.', 'I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.', 'I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.', 'I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.', 'If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, '1', '1', '1', '', 'ppm1', 'property', '2', '2', 24, '2023-10-20 17:01:48', '2023-10-20 17:01:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resident_uploads`
--

DROP TABLE IF EXISTS `resident_uploads`;
CREATE TABLE IF NOT EXISTS `resident_uploads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name_original` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_extension` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resident_uploads`
--

INSERT INTO `resident_uploads` (`id`, `file_name`, `file_name_original`, `file_extension`, `file_path`, `full_path`, `created_at`, `updated_at`) VALUES
(8, 'carga-masiva-1691448576.xlsx', 'carga-masiva.xlsx', 'xlsx', 'uploads\\carga-masiva-1691448576.xlsx', 'C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691448576.xlsx', '2023-08-07 23:49:36', '2023-08-07 23:49:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resident_upload_files`
--

DROP TABLE IF EXISTS `resident_upload_files`;
CREATE TABLE IF NOT EXISTS `resident_upload_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resident_upload_files_upload_id_foreign` (`upload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resident_upload_files`
--

INSERT INTO `resident_upload_files` (`id`, `file_data`, `upload_id`, `created_at`, `updated_at`) VALUES
(61, '{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(62, '{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(63, '{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(64, '{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(65, '{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(66, '{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(67, '{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(68, '{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(69, '{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37'),
(70, '{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}', 8, '2023-08-07 23:49:37', '2023-08-07 23:49:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(7, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(9, 4),
(1, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banned` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user`, `phone`, `access_level`, `property_code`, `banned`, `last_login`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(82, 'ana', 'amartinezc.info@gmail.com', NULL, 'ana', '4428168746', 'property_manager', '', '1', '', '$2y$10$FhhmQVriUQuVv/eAavzWsONgVgS8UdIVXHt2NlQsidmSHXJ3i2Y3W', '', NULL, '2023-08-09 00:49:55', '2023-09-07 17:44:55'),
(164, 'martin Reyes amador', 'martin.amador.tic@gmail.com', NULL, 'martin', '4428168746', 'property_manager', 'SbBtO', '1', '2023-08-31 12:06:30', '$2y$10$5aN5YFfo71LEYfEcvKOhJ.i8PKZ8DdHcqpCoWzkDM69UbQTTikaJq', '', NULL, '2023-08-31 03:44:01', '2023-10-16 16:07:08'),
(197, 'prueba', 'prueba@gmail.com', NULL, 'juan', '4428168746', 'Resident', 'FpXE5', '0', '', '$2y$10$wgGl2IyuU12jvIX3SxhFK.L2tUfzyDv.96HLNjvCMQs62PASqB3dG', 'Declined', NULL, '2023-09-25 18:12:04', '2023-10-24 01:53:09'),
(199, 'martin', 'juancarlosmunos112@gmail.com', NULL, 'martin', '4428168746', 'Resident', 'FpXE5', '0', '', '$2y$10$GyhOebF4p2xqhg8a0HtKlOZgEqS9Hl1Qjcaq1BM40XydnYVxrXEKK', 'Declined', NULL, '2023-09-25 18:43:05', '2023-10-24 02:32:27'),
(203, 'juan jose', 'marcos@gmail.com', NULL, '', '2101616', 'Resident', 'FpXE5', '0', '', '', 'Pending', NULL, '2023-09-30 23:21:59', '2023-09-30 23:21:59'),
(204, 'prueba', 'prueba10@gmail.com', NULL, 'prueba1233', '120203838484', 'Resident', '54V7x', '0', '', '', 'Pending', NULL, '2023-09-30 23:25:21', '2023-10-02 19:21:50'),
(205, 'martin amador', 'es.qro@gmail.com', NULL, 'lulu', '1234567898', 'Resident', '54V7x', '0', '', '', 'Approved', NULL, '2023-09-30 23:48:39', '2023-10-23 23:30:56'),
(206, 'mensaje deprueba', 'mprueba@gmail.com', NULL, 'prueba', '12233', 'Resident', '54V7x', '0', '', '', 'Declined', NULL, '2023-10-02 17:13:35', '2023-10-23 23:30:41'),
(207, 'prueba20', 'prueba20@gmail.com', NULL, 'prueba20', '21013131', 'Resident', '54V7x', '0', '', '$2y$10$2K.W0DuzqMnJfaCdeKJXdefhwCzxZnGHaXJWB5nq03jP3fRcGZnqe', 'Pending', NULL, '2023-10-02 18:04:08', '2023-10-02 18:04:08'),
(208, 'martin Reyes amador', '20@gmail.com', NULL, 'martinam', '4428168746', 'Resident', '54V7x', '0', '', '$2y$10$pFivWOrJn/kgxMGIAW3u7ORSzJtZUqMEkhMWkWgO0RjRc8gwVaV0.', 'Approved', NULL, '2023-10-02 18:09:23', '2023-10-23 23:31:21'),
(209, 'juan', 'martin.amador@gmail.com', NULL, '1234567', '4428168746', '', '', '1', '', '$2y$10$earPWsMkt/FmnmRO4ESXqOXjoijrz1OoiVOVjO2k7wpTE2osBV.CS', '', NULL, '2023-10-02 22:14:09', '2023-10-02 22:14:09'),
(212, 'formato', 'formato@gmail.com', NULL, 'formato', '1225365588', 'Resident', '4nHZC', '0', '', '$2y$10$85IAT54qjwBQaGYfoAzme.q9LkmsLsFHFvHpjI5.tORtihAyhfbVa', 'Declined', NULL, '2023-10-10 18:41:16', '2023-10-24 02:43:20'),
(224, 'martin', 'martin.reyes.qro@gmail.com', NULL, 'martin', '4428168746', 'Resident', 'SbBtO', '0', '', '$2y$10$3S/5fdLVxEh0Ltd3NCWCv.bKBOpbvylvngTKfUq9G6dKC9yCMg3Ja', 'Declined', NULL, '2023-10-16 19:19:48', '2023-10-24 02:11:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_properties`
--

DROP TABLE IF EXISTS `user_properties`;
CREATE TABLE IF NOT EXISTS `user_properties` (
  `user_id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`property_id`),
  KEY `user_properties_property_id_foreign` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_properties`
--

INSERT INTO `user_properties` (`user_id`, `property_id`) VALUES
(164, 15),
(208, 15),
(212, 15),
(207, 21),
(208, 21),
(82, 22),
(164, 22),
(208, 22),
(209, 22),
(224, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `user_id`, `property_code`, `license_plate`, `vin`, `make`, `model`, `year`, `color`, `vehicle_type`, `permit_type`, `permit_status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 199, 'FpXE5', '2245688', '7778888888888888', '123456789', '2023', 1987, 'red', 'Truck', '', 'suspended', '', '', '2023-09-26 00:07:00', '2023-10-24 02:05:53'),
(4, 197, 'FpXE5', 'p2', '55244', 'prueba', '2023', 2999, 'prueba', 'ford1', 'resident', 'suspended', '2023-10-03', '2023-10-28', '2023-10-03 23:21:53', '2023-10-04 02:51:54'),
(5, 205, '54V7x', '5543455', '12345678', 'ford', '2025', 1989, 'red', 'Truck', 'resident', 'pending', '', '', '2023-10-09 03:49:20', '2023-10-09 03:49:20'),
(6, 212, '4nHZC', 'formato', '12234445', 'formato', 'kia', 2023, 'red', 'Motorcycle', 'resident', 'active', '', '2024-03-28 19:29:38', '2023-10-10 18:43:06', '2023-10-23 01:29:38'),
(21, 224, 'SbBtO', '234', '44', '4', '4', 4, '4', '4', 'temporary', 'active', '2023-10-18', '2023-10-30', '2023-10-19 04:19:55', '2023-10-19 04:19:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitorpasses`
--

DROP TABLE IF EXISTS `visitorpasses`;
CREATE TABLE IF NOT EXISTS `visitorpasses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vp_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` datetime NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitorpasses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitorpasses`
--

INSERT INTO `visitorpasses` (`id`, `property_code`, `vp_code`, `visitor_name`, `visitor_phone`, `license_plate`, `year`, `make`, `color`, `vehicle_type`, `valid_from`, `model`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'FpXE5', '42795', 'jose', '123456789', '232', 2003, 'ford', 'red', 'truck', '1900-01-31 00:00:00', 'audi', '', '2023-09-26 00:07:26', '2023-09-26 00:07:26', 199),
(6, '54V7x', '64971', 'martin', '2334455666', '23948585fhht', 2023, 'ferrari', 'negro', 'car', '2023-10-23 10:10:00', 'ferrari', '', '2023-10-23 15:52:00', '2023-10-23 15:52:00', 205);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitor_settings`
--

DROP TABLE IF EXISTS `visitor_settings`;
CREATE TABLE IF NOT EXISTS `visitor_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
