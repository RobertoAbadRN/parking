-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: parking
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_02_161844_create_properties_table',2),(6,'2023_06_05_193637_create_vehicles_table',3),(7,'2023_06_05_200313_create_visitorpasses_table',4),(8,'2023_06_30_101426_create_user_properties_table',5),(9,'2023_07_12_120500_create_residents_table',6),(10,'2023_07_12_124158_add_password_to_residents_table',7),(11,'2023_07_12_170306_create_profiles_table',8),(12,'2023_07_18_095731_create_permission_tables',8),(13,'2023_07_27_061338_create_property_settings_table',9),(14,'2023_07_27_062552_create_permit_settings_table',9),(17,'2023_07_27_063238_create_visitor_settings_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\Models\\User',2),(1,'App\\Models\\User',47),(3,'App\\Models\\User',48);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('martin.reyes.qro@gmail.com','$2y$10$3Z9bA3F9Mno53mmcUp0fMewWcX98n7fgnsaFXab4WTfYotQ2VjAIi','2023-07-06 22:37:50');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'properties','web',NULL,NULL),(2,'users','web',NULL,NULL),(3,'recidents','web',NULL,NULL),(4,'vehicles','web',NULL,NULL),(5,'visitors','web',NULL,NULL),(6,'documents','web',NULL,NULL),(7,'settings','web',NULL,NULL),(8,'roles','web',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permit_settings`
--

DROP TABLE IF EXISTS `permit_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permit_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permit_settings`
--

LOCK TABLES `permit_settings` WRITE;
/*!40000 ALTER TABLE `permit_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `permit_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profiles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Resident',NULL,NULL),(2,'Leasing agent',NULL,NULL),(3,'Property manager',NULL,NULL),(4,'Parking inspector',NULL,NULL),(5,'Dispatcher',NULL,NULL),(6,'Manager dispatcher',NULL,NULL),(7,'Company administrator',NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (6,'prueba','edificio1','calle esmeralda','queretaro','Queretaro','México','76915','Apartment Complex','3','QyQxc','1',NULL,'2023-07-03 22:13:07','2023-07-04 17:40:27'),(9,'prueba2','juan','margaritas 11','queretaro','Queretaro','México','76900','Apartment Complex','2','acUzh','','1688487450.png','2023-07-04 16:17:30','2023-07-04 16:17:30');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_settings`
--

DROP TABLE IF EXISTS `property_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `ppm1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppm2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_property` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin_left` longtext COLLATE utf8mb4_unicode_ci,
  `margin_top` longtext COLLATE utf8mb4_unicode_ci,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_settings`
--

LOCK TABLES `property_settings` WRITE;
/*!40000 ALTER TABLE `property_settings` DISABLE KEYS */;
INSERT INTO `property_settings` VALUES (14,'Limpie el área donde se colocará el adhesivo.','Separar la etiqueta del documento en las perforaciones','Pelar el revestimiento que cubre el borde azul del adhesivo','Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.','Este Acuerdo es un apéndice y es parte del Contrato de Arrendamiento de Apartamento, realizado y celebrado entre {property_name} y el/los Residente(s) como se indica a continuación:\r\n\r\nAl firmar este apéndice, yo/nosotros acordamos lo siguiente:','Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.','Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.','El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.','Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.','Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.','Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.','Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.','Clean area where sticker is to be placed.','Separate sticker from document at perforations','Peel off liner covering the blue border of the sticker','Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.','This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:','I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.','I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.','The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.','I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.','I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.','I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.','If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'2023-08-01 02:15:50','2023-08-01 02:22:57');
/*!40000 ALTER TABLE `property_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residents`
--

DROP TABLE IF EXISTS `residents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `residents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `resident_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apart_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lease_expiration` date NOT NULL,
  `reserved_space` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residents`
--

LOCK TABLES `residents` WRITE;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
INSERT INTO `residents` VALUES (1,'prueba','2','martin.amador.tic@gmail.com','4428168746','0000-00-00','2','Pending','','QyQxc','','','spanish','2023-07-14 03:06:53','2023-07-14 03:06:53');
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(1,3),(2,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'test','web','2023-07-18 18:01:17','2023-07-18 18:01:17'),(2,'Administrator','web','2023-07-18 18:29:13','2023-07-18 18:29:13'),(3,'concerje','web','2023-07-18 19:16:37','2023-07-18 19:16:37');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_properties`
--

DROP TABLE IF EXISTS `user_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_properties` (
  `user_id` bigint unsigned NOT NULL,
  `property_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`property_id`),
  KEY `user_properties_property_id_foreign` (`property_id`),
  CONSTRAINT `user_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_properties`
--

LOCK TABLES `user_properties` WRITE;
/*!40000 ALTER TABLE `user_properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'martin','martin.amador.tic@gmail.com',NULL,'mar','2101616','Property Manager','QyQxc','NO','2023-07-14 12:10:21','$2y$10$oYRV.EII7.lW99y47XfwYuIaywnnSsgRzANhHrpBVdTqhFZHzOS92','',NULL,'2023-06-01 23:41:18','2023-07-14 18:10:21'),(2,'admin','admin@gmail.com',NULL,'admin123','546456565','property_leasion_agent','QyQxc','NO','2023-07-31 16:41:22','$2y$10$oWKm2Nvg4CKGTFza4iBMY.8PL.auUKkEq26YJPj5sdxf.5cD18Loa','',NULL,'2023-06-05 21:34:08','2023-07-31 20:41:22'),(46,'martin','martin.reyes.qro@gmail.com',NULL,'hola','4428168746','property_leasion_agent','QyQx4','NO','','$2y$10$iVtZ3RO4O9R1WJjWEjBtse19fFpde3tZxNpQONptRgTzYBodQGGza','',NULL,'2023-07-02 02:41:55','2023-07-02 02:42:40'),(47,'tetst','test@test.cpm',NULL,'test','4354545','property_leasion_agent','QyQxc','NO','','$2y$10$K36qoceLoLFc7eJB2v1kdurhMw002JaE.kQVWydOo686GPzJNQz0K','',NULL,'2023-07-18 18:24:15','2023-07-18 18:24:15'),(48,'test','concerje@test.com',NULL,'concerje','87789879978','property_leasion_agent','QyQxc','NO','2023-07-18 15:17:56','$2y$10$XEsSaKhYMYZBEPtX0FjMhOgBCPUjs4DA0bmKVmbIm31paLiAMpCwe','',NULL,'2023-07-18 19:17:31','2023-07-18 19:17:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'QyQxc','25456','55244','fortd','1235',1998,'blanco','ford','','','','2023-07-14 02:51:17','2023-07-14 02:51:17'),(2,'QyQxc','25456','55244','fortd','1235',1998,'blanco','ford','','','','2023-07-14 03:06:53','2023-07-14 03:06:53');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor_settings`
--

DROP TABLE IF EXISTS `visitor_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitor_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `validation` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'form',
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_settings`
--

LOCK TABLES `visitor_settings` WRITE;
/*!40000 ALTER TABLE `visitor_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitorpasses`
--

DROP TABLE IF EXISTS `visitorpasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitorpasses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_from` datetime NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitorpasses`
--

LOCK TABLES `visitorpasses` WRITE;
/*!40000 ALTER TABLE `visitorpasses` DISABLE KEYS */;
INSERT INTO `visitorpasses` VALUES (1,'QyQxc','prueba','243445','25456',1998,'225wldwd','prueba','ford','martin','1','12456','2023-06-08 01:27:00','2022','pending','2023-06-08 23:26:00','2023-06-08 23:26:00'),(2,'QyQxc','pedro','2101616','565588',1989,'ford','negro','ranger','jose','12','jso','2023-06-22 23:26:58','vento','pending',NULL,NULL),(3,'QyQxc','prueba5','243445','25456',1999,'225wldwd','rojo','ford','prueba2','prueba','12456','2023-06-23 19:38:00','2022','','2023-06-22 22:38:37','2023-06-22 22:38:37'),(4,'QyQxc','pruena6','12424234','65432',2023,'225wldwd','blanco','prueba','prueba2','prueba','19899','2023-06-23 16:56:00','vento','','2023-06-22 22:53:23','2023-06-22 22:53:23'),(5,'QyQxc','prueba','prueba','25456',1999,'prueba','prueba','prueba','prueba','10','12554655','2023-06-23 13:03:00','prueba','','2023-06-23 16:59:13','2023-06-23 16:59:13'),(6,'QyQxc','prueva 10','prueba','defgreg4657745',1999,'fortd','rojo','prueba','prueba2','prueba','19899','0000-00-00 00:00:00','1235','pending','2023-06-25 03:04:04','2023-06-25 03:04:04'),(7,'QyQxc','prueba 20','prueba','defgreg4657745',1998,'fortd','blanco','prueba','martin','3','12456','2023-06-15 21:12:00','2023','pending','2023-06-25 03:09:18','2023-06-25 03:09:18'),(8,'QyQxc','prueba 50','prueba','defgreg4657745',2023,'fortd','naranja','ford','prueba3','prueba','12554655','2023-07-28 12:05:00','1235','pending','2023-06-25 03:21:53','2023-06-25 03:21:53');
/*!40000 ALTER TABLE `visitorpasses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-01  4:16:48
