--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('ca','Cadeiras De Auditório','Funcionalidade, estética e modernidade!','ca_01.jpg',1),('cf','Cadeiras Fixas','A qualidade dos materiais garantem durabilidade!','cf_01.jpg',1),('cg','Cadeiras Giratórias','Ergonomia em produtos de qualidade!','cg_06.jpg',1),('mov','Conjuntos','Beleza, modernidade, estética e funcionalidade!','mov_01.jpg',1),('po','Poltronas','Conforto que você merece durante seu horário de trabalho!','po_03.jpg',1),('pol_dec','Poltronas Decorativas','Confortáveis, bonitas e duráveis!','pol_dec_24.png',1),('so','Sofás','Materiais de primeira linha aliados a beleza!','so_07.jpg',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (22,'2018_11_12_235858_create_table_category',1),(23,'2018_11_13_000044_create_table_product',1),(24,'2014_10_12_000000_create_users_table',2),(25,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('ca_01','ca','ca_01.jpg','',1),('ca_02','ca','ca_02.jpg','',1),('ca_03','ca','ca_03.jpg','',1),('ca_04','ca','ca_04.jpg','',1),('ca_05','ca','ca_05.jpg','',1),('ca_06','ca','ca_06.jpg','',1),('ca_07','ca','ca_07.jpg','',1),('ca_08','ca','ca_08.jpg','',1),('ca_09','ca','ca_09.jpg','',1),('ca_10','ca','ca_10.jpg','',1),('cf_01','cf','cf_01.jpg','',1),('cf_02','cf','cf_02.jpg','',1),('cf_03','cf','cf_03.jpg','',1),('cf_04','cf','cf_04.jpg','',1),('cf_05','cf','cf_05.jpg','',1),('cf_06','cf','cf_06.jpg','',1),('cf_07','cf','cf_07.jpg','',1),('cg_01','cg','cg_01.jpg','',1),('cg_02','cg','cg_02.jpg','',1),('cg_03','cg','cg_03.jpg','',1),('cg_04','cg','cg_04.jpg','',1),('cg_05','cg','cg_05.jpg','',1),('cg_06','cg','cg_06.jpg','',1),('cg_07','cg','cg_07.jpg','',1),('cg_08','cg','cg_08.jpg','',1),('cg_09','cg','cg_09.jpg','',1),('cg_10','cg','cg_10.jpg','',1),('cg_11','cg','cg_11.jpg','',1),('cg_12','cg','cg_12.jpg','',1),('cg_13','cg','cg_13.jpg','',1),('cg_14','cg','cg_14.jpg','',1),('cg_15','cg','cg_15.jpg','',1),('cg_16','cg','cg_16.jpg','',1),('cg_17','cg','cg_17.jpg','',1),('cg_18','cg','cg_18.jpg','',1),('cg_19','cg','cg_19.jpg','',1),('mov_01','mov','mov_01.jpg','',1),('mov_02','mov','mov_02.jpg','',1),('mov_03','mov','mov_03.jpg','',1),('mov_04','mov','mov_04.jpg','',1),('mov_05','mov','mov_05.jpg','',1),('mov_06','mov','mov_06.jpg','',1),('mov_07','mov','mov_07.jpg','',1),('mov_08','mov','mov_08.jpg','',1),('mov_09','mov','mov_09.jpg','',1),('mov_10','mov','mov_10.jpg','',1),('mov_11','mov','mov_11.jpg','',1),('mov_12','mov','mov_12.jpg','',1),('mov_13','mov','mov_13.jpg','',1),('mov_14','mov','mov_14.jpg','',1),('mov_15','mov','mov_15.jpg','',1),('mov_16','mov','mov_16.jpg','',1),('mov_17','mov','mov_17.jpg','',1),('mov_18','mov','mov_18.jpg','',1),('mov_19','mov','mov_19.jpg','',1),('mov_20','mov','mov_20.jpg','',1),('mov_21','mov','mov_21.jpg','',1),('mov_22','mov','mov_22.jpg','',1),('mov_23','mov','mov_23.jpg','',1),('mov_24','mov','mov_24.jpg','',1),('mov_25','mov','mov_25.png','',1),('mov_26','mov','mov_26.jpg','',1),('mov_27','mov','mov_27.jpg','',1),('mov_28','mov','mov_28.jpg','',1),('mov_29','mov','mov_29.jpg','',1),('mov_30','mov','mov_30.jpg','',1),('mov_31','mov','mov_31.jpg','',1),('mov_32','mov','mov_32.jpg','',1),('mov_33','mov','mov_33.jpg','',1),('mov_34','mov','mov_34.jpg','',1),('mov_35','mov','mov_35.jpg','',1),('mov_36','mov','mov_36.jpg','',1),('mov_37','mov','mov_37.jpg','',1),('mov_38','mov','mov_38.jpg','',1),('mov_39','mov','mov_39.jpg','',1),('mov_40','mov','mov_40.jpg','',1),('mov_41','mov','mov_41.jpg','',1),('mov_42','mov','mov_42.jpg','',1),('mov_43','mov','mov_43.jpg','',1),('mov_44','mov','mov_44.jpg','',1),('mov_45','mov','mov_45.png','',1),('mov_46','mov','mov_46.png','',1),('mov_47','mov','mov_47.jpg','',1),('mov_48','mov','mov_48.jpg','',1),('mov_49','mov','mov_49.jpg','',1),('mov_50','mov','mov_50.jpg','',1),('mov_51','mov','mov_51.jpg','',1),('mov_52','mov','mov_52.png','',1),('mov_53','mov','mov_53.jpg','',1),('po_01','po','po_01.jpg','',1),('po_02','po','po_02.jpg','',1),('po_03','po','po_03.jpg','',1),('po_04','po','po_04.jpg','',1),('po_05','po','po_05.jpg','',1),('po_06','po','po_06.jpg','',1),('po_07','po','po_07.jpg','',1),('po_08','po','po_08.jpg','',1),('po_09','po','po_09.jpg','',1),('po_10','po','po_10.jpg','',1),('po_11','po','po_11.jpg','',1),('po_12','po','po_12.jpg','',1),('po_13','po','po_13.jpg','',1),('po_14','po','po_14.jpg','',1),('po_15','po','po_15.jpg','',1),('po_16','po','po_16.jpg','',1),('po_17','po','po_17.jpg','',1),('pol_dec_03','pol_dec','pol_dec_03.png','',1),('pol_dec_04','pol_dec','pol_dec_04.png','',1),('pol_dec_05','pol_dec','pol_dec_05.png','',1),('pol_dec_06','pol_dec','pol_dec_06.png','',1),('pol_dec_07','pol_dec','pol_dec_07.png','',1),('pol_dec_08','pol_dec','pol_dec_08.png','',1),('pol_dec_09','pol_dec','pol_dec_09.jpg','',1),('pol_dec_10','pol_dec','pol_dec_10.png','',1),('pol_dec_11','pol_dec','pol_dec_11.png','',1),('pol_dec_12','pol_dec','pol_dec_12.png','',1),('pol_dec_13','pol_dec','pol_dec_13.png','',1),('pol_dec_14','pol_dec','pol_dec_14.png','',1),('pol_dec_15','pol_dec','pol_dec_15.png','',1),('pol_dec_16','pol_dec','pol_dec_16.png','',1),('pol_dec_17','pol_dec','pol_dec_17.png','',1),('pol_dec_18','pol_dec','pol_dec_18.png','',1),('pol_dec_19','pol_dec','pol_dec_19.png','',1),('pol_dec_20','pol_dec','pol_dec_20.png','',1),('pol_dec_21','pol_dec','pol_dec_21.png','',1),('pol_dec_22','pol_dec','pol_dec_22.png','',1),('pol_dec_23','pol_dec','pol_dec_23.png','',1),('pol_dec_24','pol_dec','pol_dec_24.png','',1),('pol_dec_25','pol_dec','pol_dec_25.jpg','',1),('pol_dec_26','pol_dec','pol_dec_26.png','',1),('so_02','so','so_02.jpg','',1),('so_03','so','so_03.png','',1),('so_04','so','so_04.png','',1),('so_05','so','so_05.png','',1),('so_06','so','so_06.jpg','',1),('so_07','so','so_07.jpg','',1),('so_08','so','so_08.png','',1),('so_09','so','so_09.png','',1),('so_10','so','so_10.png','',1),('so_11','so','so_11.png','',1),('so_12','so','so_12.png','',1),('so_13','so','so_13.png','',1),('so_14','so','so_14.jpg','',1),('so_15','so','so_15.png','',1),('so_16','so','so_16.jpg','',1),('so_17','so','so_17.jpg','',1),('so_18','so','so_18.png','',1),('so_19','so','so_19.png','',1),('so_20','so','so_20.png','',1),('so_21','so','so_21.jpg','',1),('so_22','so','so_22.jpg','',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Armazém','gilbertoalbino@gmail.com','$2y$10$E7oUGDQqD9klSN2bVodNAuNx02lWKrwDPnC..ilnjhcSKtKdLvLee','NNzwuGYP23tPCILwT1oqdFvtN5Ie4tVgyLhosP5d9AhhYPkEcl5lWx4OVOqh','2019-03-05 01:52:15','2019-03-05 14:52:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-05 19:34:12
