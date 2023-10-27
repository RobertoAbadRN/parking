-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: parking
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.20.04.1

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
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `apart_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lease_expiration` date NOT NULL,
  `reserved_space` tinyint unsigned NOT NULL,
  `reserved_spacevisitors` tinyint NOT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_agreement_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_status` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (23,106,'2','0000-00-00',2,0,'kmtZH','pending','2023-08-19 18:34:34','2023-08-19 18:34:57','accepted','liByXofcckGttXycRzWwTr11ect7gaAwaQ5q4lu7','2023-08-19 18:34:57'),(24,135,'2','0000-00-00',2,0,'Y6Nj1','pending','2023-08-22 02:12:39','2023-08-22 02:12:39','pending','xisqA6r67jYHtBo0XLZu4wP0rAilfTQnrZRcUgWl',NULL),(26,137,'3334','2023-08-31',3,0,'kmtZH','pending','2023-08-25 17:54:37','2023-08-25 17:54:37','pending','EzqXV8egKOD1QMdgCsrYTQeG1zmybMYnDsVsxwAW',NULL);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path_es` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (31,'document of parking templete','169361160664f276568e0e3_tes-english.docx','169361160664f276568e0fe_tes-spanish.docx','2023-09-01 21:40:06','2023-09-01 21:40:06'),(33,'document of parking templete','169366463664f3457cca175_tes-english.docx','169366463664f3457cca189_tes-spanish.docx','2023-09-02 12:23:56','2023-09-02 12:23:56');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_06_02_161844_create_properties_table',2),(6,'2023_06_05_193637_create_vehicles_table',3),(7,'2023_06_05_200313_create_visitorpasses_table',4),(8,'2023_06_30_101426_create_user_properties_table',5),(9,'2023_07_12_120500_create_residents_table',6),(10,'2023_07_12_124158_add_password_to_residents_table',7),(11,'2023_07_12_170306_create_profiles_table',8),(12,'2023_07_18_095731_create_permission_tables',8),(20,'2023_07_31_131837_create_departments_table',10),(21,'2023_07_15_184629_create_departaments_table',11),(31,'2023_08_07_011245_create_resident_uploads_table',12),(32,'2023_08_07_113534_create_resident_upload_files_table',12),(34,'2023_08_10_143351_add_terms_agreement_status_to_departments_table',13),(35,'2023_08_10_145649_add_agreement_token_to_departments',14),(36,'2023_08_11_171123_add_date_status_to_departments_table',15),(37,'2023_08_16_113815_modify_visitorpasses_table',16),(38,'2023_07_27_061338_create_property_settings_table',17),(39,'2023_07_27_062552_create_permit_settings_table',17),(40,'2023_07_27_063238_create_visitor_settings_table',17),(41,'2023_08_08_124603_create_registrations_table',17),(42,'2023_09_11_105504_create_property_language_settings_table',18);
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
INSERT INTO `model_has_roles` VALUES (2,'App\\Models\\User',2),(4,'App\\Models\\User',47),(2,'App\\Models\\User',76),(2,'App\\Models\\User',77),(2,'App\\Models\\User',82),(8,'App\\Models\\User',106),(2,'App\\Models\\User',107),(2,'App\\Models\\User',108),(1,'App\\Models\\User',109),(1,'App\\Models\\User',110),(2,'App\\Models\\User',111),(2,'App\\Models\\User',112),(1,'App\\Models\\User',113),(4,'App\\Models\\User',114),(2,'App\\Models\\User',115),(2,'App\\Models\\User',116),(4,'App\\Models\\User',117),(2,'App\\Models\\User',118),(1,'App\\Models\\User',119),(4,'App\\Models\\User',120),(4,'App\\Models\\User',121),(4,'App\\Models\\User',122),(2,'App\\Models\\User',123),(1,'App\\Models\\User',124),(2,'App\\Models\\User',125),(4,'App\\Models\\User',126),(4,'App\\Models\\User',128),(2,'App\\Models\\User',129),(2,'App\\Models\\User',130),(4,'App\\Models\\User',131),(4,'App\\Models\\User',132),(2,'App\\Models\\User',133),(1,'App\\Models\\User',134),(8,'App\\Models\\User',135),(8,'App\\Models\\User',137);
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
INSERT INTO `password_resets` VALUES ('admin@gmail.com','$2y$10$AJis6BGLZVfxM4gQ3RjBEe1a3Rr4rCDCoU6ggpKOTxnSfR7t2NmWi','2023-08-11 20:30:39'),('juancarlosmunos112@gmail.com','$2y$10$EKISd9XqxWksEe1USioCtunktDk2bFCoAl3V4m3Dbf4TDQb0pchE6','2023-08-16 22:27:13'),('martin.reyes.qro@gmail.com','$2y$10$ASxVDixnptPpSZI48zSSjOX0KzD0tGzOIvGf5z708ws9UyyTeGkCO','2023-08-23 19:48:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permit_settings`
--

LOCK TABLES `permit_settings` WRITE;
/*!40000 ALTER TABLE `permit_settings` DISABLE KEYS */;
INSERT INTO `permit_settings` VALUES (1,1,1,1,1,1,1,1,1,1,15,NULL,NULL);
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
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (15,'1011 th W10 th','nombre propiedad','123123','direccion propiedad','tx','tx','usa','76900','Apartment Building','100','4nHZC','active','images/logo/hnt4FuJiErCjnLCLWZqvLMJ5PvkibZdEHz7QGl01.png','2023-08-08 23:10:59','2023-08-10 17:25:43'),(19,'prueba','prueba','prueba','margaritas 11','queretaro','Queretaro','México','76900','Apartment Complex','5','kmtZH','active','images/logo/OYZ4t61dK5BEQLAWzxELuxftuZwEsSitEr46fDOf.png','2023-08-10 17:20:54','2023-08-10 17:20:54'),(20,'prueba3','prueba3','prueba3','prueba3','queretaro','Queretaro','México','76915','Apartment Complex','100','Y6Nj1','active','images/logo/XhDvkfZefKR5nc4cffuNY6n38aydYwNGYEGNd20V.png','2023-08-16 04:51:07','2023-08-16 04:51:07');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_language_settings`
--

DROP TABLE IF EXISTS `property_language_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_language_settings` (
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
  `ppm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin_left` longtext COLLATE utf8mb4_unicode_ci,
  `margin_top` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_language_settings`
--

LOCK TABLES `property_language_settings` WRITE;
/*!40000 ALTER TABLE `property_language_settings` DISABLE KEYS */;
INSERT INTO `property_language_settings` VALUES (1,'Limpie el área donde se colocará el adhesivo.','Separar la etiqueta del documento en las perforaciones','Pelar el revestimiento que cubre el borde azul del adhesivo','Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.','Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:','Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.','Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.','El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.','Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.','Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.','Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.','Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.','Clean area where sticker is to be placed.','Separate sticker from document at perforations','Separate sticker from document at perforations','Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.','This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:','I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.','I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.','The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.','I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.','I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.','I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.','If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,'1','1','1','ppm1','property','2','2','2023-08-22 17:46:18','2023-08-22 17:50:44');
/*!40000 ALTER TABLE `property_language_settings` ENABLE KEYS */;
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
  `ppm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `margin_left` longtext COLLATE utf8mb4_unicode_ci,
  `margin_top` longtext COLLATE utf8mb4_unicode_ci,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_settings`
--

LOCK TABLES `property_settings` WRITE;
/*!40000 ALTER TABLE `property_settings` DISABLE KEYS */;
INSERT INTO `property_settings` VALUES (1,'Limpie el área donde se colocará el adhesivo.','Separar la etiqueta del documento en las perforaciones','Pelar el revestimiento que cubre el borde azul del adhesivo','Coloque la etiqueta adhesiva en la ventana por encima de la etiqueta de registro / inspección y suavemente suavice la etiqueta adhesiva contra el cristal.','Este Acuerdo es un anexo y forma parte del Contrato de arrendamiento de apartamento, celebrado y celebrado entre {property_name} y los Residentes, como se detalla a continuación:\r\n\r\nAl firmar este anexo, yo/nosotros aceptamos lo siguiente:','Entiendo que se emitirá un permiso de estacionamiento para cada arrendatario. Los permisos de estacionamiento no serán emitidos a los ocupantes. Estoy de acuerdo en colocar el permiso de estacionamiento justo encima de mi vehículo.','Entiendo que cada permiso está designado para un vehículo específico y no puede ser cambiado a otro vehículo. Entiendo que el permiso asignado se basa en la información de la matrícula del vehículo. También estoy de acuerdo en que si consigo un vehículo nuevo estoy de acuerdo en devolver el permiso antiguo. Estoy de acuerdo en que si pierdo mi permiso se me cobrará $ 75 por un reemplazo.','El permiso de estacionamiento expirará el último día del arrendamiento actual. Entiendo que debo renovar mi permiso de estacionamiento cuando mi vigente contrato de arrendamiento caduque. También entiendo que la prueba de la matriculación del vehículo y la prueba del seguro de vehículo válido son requeridas antes de que el permiso (s) será emitido y / o renovado.','Entiendo que los visitantes pueden estacionarse SOLAMENTE en el área de estacionamiento de visitantes ubicada al norte de la comunidad. Todo el estacionamiento de visitantes está designado y marcado. Entiendo que cualquier vehículo estacionado en el Estacionamiento de Residente futuro designado fuera de las puertas de acceso debe ser movido durante las horas de oficina cada día.','Entiendo que no puedo aparcar botes, remolques, vehículos recreativos o vehículos comerciales en la propiedad, en cualquier lugar o en cualquier momento. Los vehículos deben conducirse de manera regular y no pueden dejarse abandonados o inoperables a tiempo.','Entiendo que si un vehículo es remolcado, puedo contactar {company_name}, las 24 horas del día, en {company_phone}.','Si un vehículo se estaciona dentro de las puertas sin permiso, puedo contactar directamente al servicio de remolque para que el vehículo sea removido. Todos los vehículos hacia serán a cargo del propietario / operador del vehículo.','Clean area where sticker is to be placed.','Separate sticker from document at perforations','Separate sticker from document at perforations','Place sticker on window above registration/inspection sticker and gently smooth sticker against glass.','This Agreement is an addendum and is a part of the Apartment Lease Contract, made and entered into between {property_name}, and Resident(s) as listed below:\r\n\r\nBy signing this addendum, I/We agree to the following:','I understand that a parking permit will be issued for each leaseholder. Parking permits will not be issued to occupants. I agree to place the parking permit just above my vehicle Inspection/Registration stickers.','I understand that each permit is designated to a specific vehicle and may not be exchanged to another vehicle. I understand that the permit assigned is based on the vehicle license plate information. I also agree that if I obtain a new vehicle I agree to return the old permit.','The parking permit will expire the last day of the current lease. I understand I must renew my parking permit when my current lease agreement expires. I also understand that proof of vehicle registration and proof of valid vehicle insurance are required before permit(s) will be issued and/or renewed.','I understand that visitors may not park inside of the access gates at anytime. All visitor parking is designated outside the  gates at all times. I understand that any vehicle parked in the designated Future Resident Parking outside of the access gates must  be moved during office hours each day.','I understand I may not park boats, trailers, recreational vehicles or commercial vehicles at the property, anywhere or at anytime. Vehicles must be driven on a regular basis and cannot be left abandoned or inoperable at time.','I understand that if a vehicle is towed, I may contact {company_name},  24 hours a day, at {company_phone}.','If a vehicle is park inside the gates without permit, I may contact the towing service directly to have the vehicle removed. All vehicles toward will be at vehicle owner/operator\'s expense.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,'1','1','1','ppm1','property','2','-2',15,'2023-08-22 17:46:18','2023-08-22 17:50:44');
/*!40000 ALTER TABLE `property_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations`
--

LOCK TABLES `registrations` WRITE;
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` VALUES (26,'pre_license_plate','1','form',15,NULL,NULL),(27,'pre_vin','1','form',15,NULL,NULL),(28,'pre_make','1','form',15,NULL,NULL),(29,'pre_model','1','form',15,NULL,NULL),(30,'pre_year','1','form',15,NULL,NULL),(31,'pre_color','1','form',15,NULL,NULL),(32,'pre_vehicle_type','1','form',15,NULL,NULL),(33,'required_pre_license_plate','1','form',15,NULL,NULL),(34,'required_pre_vin','1','form',15,NULL,NULL),(35,'required_pre_make','1','form',15,NULL,NULL),(36,'required_pre_model','1','form',15,NULL,NULL),(37,'required_pre_year','1','form',15,NULL,NULL),(38,'required_pre_color','1','form',15,NULL,NULL),(39,'required_pre_vehicle_type','1','form',15,NULL,NULL),(40,'validation_pre_license_plate','0','form',15,NULL,NULL);
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident_upload_files`
--

DROP TABLE IF EXISTS `resident_upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident_upload_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resident_upload_files_upload_id_foreign` (`upload_id`),
  CONSTRAINT `resident_upload_files_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `resident_uploads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident_upload_files`
--

LOCK TABLES `resident_upload_files` WRITE;
/*!40000 ALTER TABLE `resident_upload_files` DISABLE KEYS */;
INSERT INTO `resident_upload_files` VALUES (1,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(2,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(3,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(4,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(5,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(6,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(7,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(8,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(9,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(10,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',2,'2023-08-07 18:45:21','2023-08-07 18:45:21'),(11,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(12,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(13,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(14,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(15,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(16,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(17,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(18,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(19,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(20,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',3,'2023-08-07 18:56:39','2023-08-07 18:56:39'),(21,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(22,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(23,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(24,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(25,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(26,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(27,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(28,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(29,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(30,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',4,'2023-08-07 18:56:54','2023-08-07 18:56:54'),(31,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(32,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(33,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(34,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(35,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(36,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(37,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(38,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(39,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(40,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',5,'2023-08-07 19:03:35','2023-08-07 19:03:35'),(41,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(42,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(43,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(44,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(45,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(46,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(47,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(48,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(49,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(50,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',6,'2023-08-07 23:39:13','2023-08-07 23:39:13'),(51,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(52,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(53,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(54,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(55,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(56,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(57,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(58,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(59,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(60,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',7,'2023-08-07 23:40:31','2023-08-07 23:40:31'),(61,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(62,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(63,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(64,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(65,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(66,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(67,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(68,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(69,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(70,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',8,'2023-08-07 23:49:37','2023-08-07 23:49:37'),(71,'{\"resident_name\":\"Resident name\",\"apartment\":\"Apartment\",\"email\":\"Email\",\"phone\":\"Phone\",\"lease_expiration\":\"Lease Expiration\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(72,'{\"resident_name\":\"Dato 1\",\"apartment\":\"Apartamento 1\",\"email\":\"Email1@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(73,'{\"resident_name\":\"Dato 2\",\"apartment\":\"Apartamento 2\",\"email\":\"Email2@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(74,'{\"resident_name\":\"Dato 3\",\"apartment\":\"Apartamento 3\",\"email\":\"Email3@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(75,'{\"resident_name\":\"Dato 4\",\"apartment\":\"Apartamento 4\",\"email\":\"Email4@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(76,'{\"resident_name\":\"Dato 5\",\"apartment\":\"Apartamento 5\",\"email\":\"Email5@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(77,'{\"resident_name\":\"Dato 6\",\"apartment\":\"Apartamento 6\",\"email\":\"Email6@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(78,'{\"resident_name\":\"Dato 7\",\"apartment\":\"Apartamento 7\",\"email\":\"Email7@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(79,'{\"resident_name\":\"Dato 8\",\"apartment\":\"Apartamento 8\",\"email\":\"Email8@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40'),(80,'{\"resident_name\":\"Dato 9\",\"apartment\":\"Apartamento 9\",\"email\":\"Email9@gmail.com\",\"phone\":\"1234567\",\"lease_expiration\":\"0000-00-00\"}',9,'2023-08-09 01:06:40','2023-08-09 01:06:40');
/*!40000 ALTER TABLE `resident_upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident_uploads`
--

DROP TABLE IF EXISTS `resident_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident_uploads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name_original` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_extension` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident_uploads`
--

LOCK TABLES `resident_uploads` WRITE;
/*!40000 ALTER TABLE `resident_uploads` DISABLE KEYS */;
INSERT INTO `resident_uploads` VALUES (1,'carga-masiva-1691430109.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691430109.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430109.xlsx','2023-08-07 18:41:49','2023-08-07 18:41:49'),(2,'carga-masiva-1691430321.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691430321.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430321.xlsx','2023-08-07 18:45:21','2023-08-07 18:45:21'),(3,'carga-masiva-1691430998.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691430998.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691430998.xlsx','2023-08-07 18:56:38','2023-08-07 18:56:38'),(4,'carga-masiva-1691431014.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691431014.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691431014.xlsx','2023-08-07 18:56:54','2023-08-07 18:56:54'),(5,'carga-masiva-1691431415.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691431415.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691431415.xlsx','2023-08-07 19:03:35','2023-08-07 19:03:35'),(6,'carga-masiva-1691447952.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691447952.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691447952.xlsx','2023-08-07 23:39:12','2023-08-07 23:39:12'),(7,'carga-masiva-1691448031.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691448031.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691448031.xlsx','2023-08-07 23:40:31','2023-08-07 23:40:31'),(8,'carga-masiva-1691448576.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691448576.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691448576.xlsx','2023-08-07 23:49:36','2023-08-07 23:49:36'),(9,'carga-masiva-1691543199.xlsx','carga-masiva.xlsx','xlsx','uploads\\carga-masiva-1691543199.xlsx','C:\\xampp\\htdocs\\parking\\public\\uploads\\carga-masiva-1691543199.xlsx','2023-08-09 01:06:39','2023-08-09 01:06:39');
/*!40000 ALTER TABLE `resident_uploads` ENABLE KEYS */;
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
INSERT INTO `role_has_permissions` VALUES (4,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(5,4),(1,5),(1,6),(2,6),(3,6),(4,6),(5,6),(6,6),(7,6),(1,7),(2,7),(3,7),(4,7),(5,7),(6,7),(7,7),(8,7),(3,8);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Leasing agent','web','2023-07-18 18:01:17','2023-08-09 22:58:47'),(2,'Property manager','web','2023-07-18 18:29:13','2023-08-09 22:59:33'),(4,'Parking inspector','web','2023-07-27 21:41:27','2023-08-09 23:00:33'),(5,'Dispatcher','web','2023-07-28 00:29:06','2023-08-09 23:01:07'),(6,'Manager dispatcher','web','2023-08-09 23:01:53','2023-08-09 23:01:53'),(7,'Company administrator','web','2023-08-09 23:02:21','2023-08-09 23:02:21'),(8,'Resident','web','2023-08-18 18:11:19','2023-08-18 18:11:19');
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
INSERT INTO `user_properties` VALUES (2,15),(82,15),(134,15),(134,19),(137,19),(135,20);
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
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@gmail.com',NULL,'admin','546456565','property_manager','4nHZC','1','2023-09-01 16:25:50','$2y$10$oWKm2Nvg4CKGTFza4iBMY.8PL.auUKkEq26YJPj5sdxf.5cD18Loa','',NULL,'2023-06-05 21:34:08','2023-09-01 20:25:50'),(82,'ana','amartinezc.info@gmail.com',NULL,'ana','4428168746','property_manager','','1','','$2y$10$FhhmQVriUQuVv/eAavzWsONgVgS8UdIVXHt2NlQsidmSHXJ3i2Y3W','',NULL,'2023-08-09 00:49:55','2023-08-09 23:09:57'),(134,'martin','martin.amador.tic@gmail.com',NULL,'mar123','4428168746','','','1','','$2y$10$bj3zFQ6NjW1wPMGDY2/1ke7NaVhEcN1VOBe/VUhoyGiAQ1nSJVRc.','',NULL,'2023-08-21 23:44:45','2023-08-22 18:38:34'),(135,'martin','martin.reyes.qro@gmail.com',NULL,'','4428168746','Resident','Y6Nj1','0','2023-08-25 11:10:51','$2y$10$maLjKAf2D6DMetaoSpvPHeTecDOWvtB4Sv95Ms4Jzza4G6RijG/fG','Pending',NULL,'2023-08-22 02:12:39','2023-08-25 17:10:51'),(137,'roberto','juancarlosmunos112@gmail.com',NULL,'','4428168746','Resident','kmtZH','0','','$2y$10$xqCkuF0QqJpwvSYfGgTTdeflB14aPqVswkDEFRTtJm9F4KcSkIF8e','Pending',NULL,'2023-08-25 17:54:37','2023-08-25 17:54:37');
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
  `user_id` bigint unsigned DEFAULT NULL,
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_status` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicles_user_id_foreign` (`user_id`),
  CONSTRAINT `vehicles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,135,'Y6Nj1','2245688','123456789','audi','1234567',2003,'rojo','Car','visitor','suspended','','','2023-08-22 18:51:47','2023-08-27 23:58:49'),(3,135,'Y6Nj1','25456','55244','prueba','2022',123456,'prueba','Truck','','active','2023-08-26','2023-09-26','2023-08-23 20:16:20','2023-08-26 23:38:00'),(6,135,'Y6Nj1','25456','55244','fortd','2022',1998,'blue','prueba','visitor','active','2023-08-27','2023-09-26','2023-08-28 04:50:10','2023-08-28 04:50:10'),(7,137,'kmtZH','carro1','55244','fortd','2022',1998,'blue','ford','visitor','active','2023-08-27','2023-09-26','2023-08-28 04:51:19','2023-08-28 04:51:19');
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_settings`
--

LOCK TABLES `visitor_settings` WRITE;
/*!40000 ALTER TABLE `visitor_settings` DISABLE KEYS */;
INSERT INTO `visitor_settings` VALUES (40,'total','20','setting',15,NULL,NULL),(41,'hours','15','setting',15,NULL,NULL),(42,'limit','12','setting',15,NULL,NULL),(43,'days','10','setting',15,NULL,NULL),(62,'visitor_name','0','form',15,NULL,NULL),(63,'visitor_phone','1','form',15,NULL,NULL),(64,'license_plate','1','form',15,NULL,NULL),(65,'year','1','form',15,NULL,NULL),(66,'make','1','form',15,NULL,NULL),(67,'model','1','form',15,NULL,NULL),(68,'color','1','form',15,NULL,NULL),(69,'vehicle_type','1','form',15,NULL,NULL),(70,'valid_from','0','form',15,NULL,NULL),(71,'required_visitor_name','0','form',15,NULL,NULL),(72,'required_visitor_phone','1','form',15,NULL,NULL),(73,'required_license_plate','1','form',15,NULL,NULL),(74,'required_year','1','form',15,NULL,NULL),(75,'required_make','1','form',15,NULL,NULL),(76,'required_model','1','form',15,NULL,NULL),(77,'required_color','1','form',15,NULL,NULL),(78,'required_vehicle_type','1','form',15,NULL,NULL),(79,'required_valid_from','0','form',15,NULL,NULL),(308,'visitor_name','1','form',20,NULL,NULL),(309,'visitor_phone','1','form',20,NULL,NULL),(310,'license_plate','1','form',20,NULL,NULL),(311,'year','1','form',20,NULL,NULL),(312,'make','1','form',20,NULL,NULL),(313,'model','1','form',20,NULL,NULL),(314,'color','1','form',20,NULL,NULL),(315,'vehicle_type','1','form',20,NULL,NULL),(316,'valid_from','1','form',20,NULL,NULL),(317,'required_visitor_name','1','form',20,NULL,NULL),(318,'required_visitor_phone','1','form',20,NULL,NULL),(319,'required_license_plate','1','form',20,NULL,NULL),(320,'required_year','1','form',20,NULL,NULL),(321,'required_make','1','form',20,NULL,NULL),(322,'required_model','1','form',20,NULL,NULL),(323,'required_color','1','form',20,NULL,NULL),(324,'required_vehicle_type','1','form',20,NULL,NULL),(325,'required_valid_from','1','form',20,NULL,NULL);
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
  `property_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vp_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` datetime DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitorpasses_user_id_foreign` (`user_id`),
  CONSTRAINT `visitorpasses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitorpasses`
--

LOCK TABLES `visitorpasses` WRITE;
/*!40000 ALTER TABLE `visitorpasses` DISABLE KEYS */;
INSERT INTO `visitorpasses` VALUES (1,'Y6Nj1','53401','prueba','243445','25456',1998,'fortd','rojo','car','2023-08-23 12:00:00','2022','','2023-08-23 23:24:53','2023-08-23 23:24:53',135),(3,'Y6Nj1','87598','jose','243445','123',2023,'225wldwd','naranja','car','2023-08-24 12:00:00','vento','','2023-08-24 23:08:35','2023-08-24 23:08:35',135),(4,'Y6Nj1','41170','prueba5','243445','123',1999,'225wldwd','negro','car','2023-08-24 12:00:00','1235','','2023-08-24 23:10:35','2023-08-24 23:10:35',135),(5,'Y6Nj1','66528','prueba','123','123',1998,'vento','blanco','car','2023-08-24 12:00:00','1235','','2023-08-24 23:12:46','2023-08-24 23:12:46',135),(6,'Y6Nj1','16286','prueba','243445','123',1999,'fortd','negro','car','2023-08-24 12:00:00','1235','','2023-08-24 23:16:03','2023-08-24 23:16:03',135),(7,'Y6Nj1','','juan','122356488','123',2023,'kia','blue','neon','2023-08-25 12:00:00','2023','pending','2023-08-24 23:17:34','2023-08-24 23:17:34',135),(8,'Y6Nj1','85349','oscar','2101616','123456789',2023,'12345678','red','car','2023-08-29 12:00:00','2022','','2023-08-28 15:30:31','2023-08-28 15:30:31',135);
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

-- Dump completed on 2023-09-11 13:32:29
