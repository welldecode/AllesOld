-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pronew
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(64) NOT NULL,
  `document` text NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `role` varchar(16) NOT NULL,
  `availability` date NOT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (2,'MINERAÇÃO PARAGOMINAS','','<p>Nenhuma descri&ccedil;&atilde;o</p>','true',NULL,'operador','2024-04-24','mineracao-paragominas','2024-04-24 19:18:56','2024-04-24 20:31:30'),(6,'MANUTENÇÃO - ALUNORTE','Nenhum email','<p>Nenhuma descri&ccedil;&atilde;o</p>','true',NULL,'operador','2024-04-24','manutencao-alunorte','2024-04-24 20:28:28','2024-04-24 20:28:52'),(14,'CALDEIRAS - ALUNORTE','CALDEIRAS - ALUNORTE','Nenhuma descrição','true',NULL,'operador','2024-04-24','caldeiras-alunorte','2024-04-24 20:35:49','2024-04-24 20:35:49'),(15,'ALBRAS - CTO 8637','ALBRAS - CTO 8637','Nenhuma descrição','true',NULL,'operador','2024-05-29','albras-cto-8637','2024-05-29 09:03:27','2024-05-29 09:03:27'),(16,'Liebherr - MPSA','Liebherr - MPSA','Nenhuma descrição','true',NULL,'operador','2024-05-31','liebherr-mpsa','2024-05-31 08:24:01','2024-05-31 08:24:01'),(17,'EGTC','EGTC','Nenhuma descrição','true',NULL,'operador','2024-06-10','egtc','2024-06-10 15:59:24','2024-06-10 15:59:24');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collaborators`
--

DROP TABLE IF EXISTS `collaborators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collaborators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `role` varchar(160) DEFAULT NULL,
  `availability` date NOT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `collaborators_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collaborators`
--

LOCK TABLES `collaborators` WRITE;
/*!40000 ALTER TABLE `collaborators` DISABLE KEYS */;
INSERT INTO `collaborators` VALUES (2,'EVANILDO LIMA GALENO','rh@allesservicos.com.br','none','false','true',NULL,'guindaste Articulado','2024-06-07','evanildo-lima-galeno','2024-04-24 19:24:11','2024-06-20 17:49:07'),(22,'DANILO LONGHINI CAGLIARI','Nenhum email','none','true','true',NULL,'operador','2024-06-04','danilo-longhini-cagliari','2024-04-24 20:25:45','2024-07-12 00:07:25'),(23,'HELIMAURO RIBEIRO DA SILVA','HELIMAURO RIBEIRO DA SILVA','none','true','true',NULL,'sinaleiro','2024-05-31','helimauro-ribeiro-da-silva','2024-04-25 00:17:40','2024-07-12 00:07:25'),(24,'EDMO PEREIRA DAS NEVES','EDMO PEREIRA DAS NEVES','none','true','true',NULL,'ajudante Motorista','2024-06-07','edmo-pereira-das-neves','2024-04-25 00:20:17','2024-06-10 14:06:33'),(25,'EDI WILSON PIO NETO','EDI WILSON PIO NETO','none','true','true',NULL,'guindaste Telescópico','2024-06-07','edi-wilson-pio-neto','2024-04-25 00:21:10','2024-07-12 00:07:25'),(26,'ADILSON JOSE SILVA SOARES','ADILSON JOSE SILVA SOARES','none','true','true',NULL,'sinaleiro','2024-04-25','adilson-jose-silva-soares','2024-04-25 08:10:23','2024-06-10 14:07:14'),(27,'ADRIANO RIBEIRO DOS SANTOS','ADRIANO RIBEIRO DOS SANTOS','none','true','true',NULL,'sinaleiro','2024-04-25','adriano-ribeiro-dos-santos','2024-04-25 08:10:43','2024-06-20 02:53:07'),(28,'AGEU OLIVEIRA DE SOUSA','AGEU OLIVEIRA DE SOUSA','none','true','true',NULL,'ajudante Motorista','2024-06-12','ageu-oliveira-de-sousa','2024-04-25 08:11:05','2024-06-20 02:53:11'),(29,'ALAN DINIZ VALENTE','ALAN DINIZ VALENTE','none','true','true',NULL,'sinaleiro','2024-04-25','alan-diniz-valente','2024-04-25 08:11:31','2024-04-25 08:11:31'),(30,'ALAN SOUSA DA SILVA','ALAN SOUSA DA SILVA','none','false','true',NULL,'guindaste Telescópico','2024-06-07','alan-sousa-da-silva','2024-04-25 08:11:47','2024-06-22 16:13:43'),(31,'ANDRE LUIZ FEIO FARINHA','ANDRE LUIZ FEIO FARINHA','none','true','true',NULL,'guindaste Articulado','2024-06-07','andre-luiz-feio-farinha','2024-04-25 08:12:48','2024-06-07 17:02:00'),(32,'AUGUSTO JOSE CRUZ DO NASCIMENTO','AUGUSTO JOSE CRUZ DO NASCIMENTO','none','true','true',NULL,'sinaleiro','2024-04-25','augusto-jose-cruz-do-nascimento','2024-04-25 08:13:10','2024-04-25 08:13:10'),(33,'BENILDO SANTOS SILVA','BENILDO SANTOS SILVA','none','true','true',NULL,'ajudante Motorista','2024-06-07','benildo-santos-silva','2024-04-25 08:13:39','2024-06-20 02:53:11'),(34,'BIANOR DA CUNHA SANTOS','BIANOR DA CUNHA SANTOS','none','true','true',NULL,'guindaste Telescópico','2024-06-07','bianor-da-cunha-santos','2024-04-25 08:14:01','2024-06-10 14:06:33'),(36,'CHARLAN NASCIMENTO DA SILVA','CHARLAN NASCIMENTO DA SILVA','none','true','true',NULL,'guindaste Articulado','2024-06-07','charlan-nascimento-da-silva','2024-04-25 08:14:42','2024-06-20 02:53:11'),(37,'CLEDILSON MAMEDES DE SOUSA','CLEDILSON MAMEDES DE SOUSA','none','true','true',NULL,'guindaste Articulado','2024-06-07','cledilson-mamedes-de-sousa','2024-04-25 08:15:01','2024-06-07 17:05:19'),(38,'CLEILSON CLEMENTE TRINDADE','CLEILSON CLEMENTE TRINDADE','none','true','true',NULL,'guindastes Articulado','2024-06-10','cleilson-clemente-trindade','2024-04-25 08:15:27','2024-06-20 02:53:11'),(39,'CLEITON MARTINS CORREA','CLEITON MARTINS CORREA','none','true','true',NULL,'ajudante Motorista','2024-06-07','cleiton-martins-correa','2024-04-25 08:15:50','2024-06-07 17:05:46'),(40,'DANILO MOTA LOPES','DANILO MOTA LOPES','none','true','true',NULL,'ajudante Motorista','2024-06-07','danilo-mota-lopes','2024-04-25 08:16:09','2024-07-12 00:07:25'),(41,'DAVI SOARES DA SILVA','DAVI SOARES DA SILVA','none','true','true',NULL,'guindaste Telescópico','2024-06-07','davi-soares-da-silva','2024-04-25 08:16:28','2024-06-10 14:07:14'),(42,'DEJALMA SIQUEIRA GOES','DEJALMA SIQUEIRA GOES','none','true','true',NULL,'guindaste Articulado','2024-06-07','dejalma-siqueira-goes','2024-04-25 08:16:53','2024-06-07 17:06:19'),(43,'DILSONALDO DANTAS PANTOJA','DILSONALDO DANTAS PANTOJA','none','true','true',NULL,'guindaste Articulado','2024-06-07','dilsonaldo-dantas-pantoja','2024-04-25 08:17:15','2024-07-12 00:07:25'),(45,'EDSON REIS SOUSA','EDSON REIS SOUSA','none','true','true',NULL,'sinaleiro','2024-04-25','edson-reis-sousa','2024-04-25 08:18:09','2024-04-25 08:18:09'),(46,'ELIAN MONTEIRO ROVERE','ELIAN MONTEIRO ROVERE','none','true','true',NULL,'mecanico','2024-04-25','elian-monteiro-rovere','2024-04-25 08:18:27','2024-04-25 08:18:27'),(47,'ELIAS BATISTA RODRIGUES','ELIAS BATISTA RODRIGUES','none','true','true',NULL,'guindaste Articulado','2024-06-07','elias-batista-rodrigues','2024-04-25 08:18:44','2024-06-07 17:09:15'),(48,'EMMANUEL BARBOSA DA SILVA','EMMANUEL BARBOSA DA SILVA','none','true','true',NULL,'sinaleiro','2024-04-25','emmanuel-barbosa-da-silva','2024-04-25 08:19:17','2024-04-25 08:19:17'),(49,'ERICO JOELSON TIMBO BOZZA','ERICO JOELSON TIMBO BOZZA','none','true','true',NULL,'guindaste Telescópico','2024-06-07','erico-joelson-timbo-bozza','2024-04-25 08:19:42','2024-06-07 17:09:29'),(50,'EVERSON SOUSA FIGUEIRO','EVERSON SOUSA FIGUEIRO','none','true','true',NULL,'sinaleiro','2024-06-07','everson-sousa-figueiro','2024-04-25 08:22:22','2024-06-07 17:09:39'),(51,'EZEQUIAS SANTOS MARTINS','EZEQUIAS SANTOS MARTINS','none','true','true',NULL,'mecanico','2024-04-25','ezequias-santos-martins','2024-04-25 08:32:33','2024-04-25 08:32:33'),(52,'FABIO ARAUJO FERREIRA','FABIO ARAUJO FERREIRA','none','true','true',NULL,'ajudante Motorista','2024-06-07','fabio-araujo-ferreira','2024-04-25 08:32:51','2024-06-07 17:09:54'),(53,'FERNANDO HENRIQUE NERY CABRAL','FERNANDO HENRIQUE NERY CABRAL','none','true','true',NULL,'guindaste Articulado','2024-06-07','fernando-henrique-nery-cabral','2024-04-25 08:33:29','2024-06-07 17:10:05'),(54,'FREDISON LOUZADA GOMES','FREDISON LOUZADA GOMES','none','false','true',NULL,'guindaste Telescópico','2024-06-07','fredison-louzada-gomes','2024-04-25 08:36:26','2024-06-22 16:13:43'),(55,'GLEIDSON CARLOS TEIXEIRA LOBATO','GLEIDSON CARLOS TEIXEIRA LOBATO','none','true','true',NULL,'sinaleiro','2024-05-27','gleidson-carlos-teixeira-lobato','2024-04-25 08:41:31','2024-05-27 12:38:57'),(56,'HELIO COSTA OLIVEIRA','HELIO COSTA OLIVEIRA','none','true','true',NULL,'guindaste Articulado','2024-06-07','helio-costa-oliveira','2024-04-25 08:41:56','2024-06-07 17:10:40'),(57,'HELTON NEVES DA SILVA','HELTON NEVES DA SILVA','none','true','true',NULL,'guindaste Telescópico','2024-06-07','helton-neves-da-silva','2024-04-25 08:42:14','2024-06-20 02:53:07'),(58,'HERMES ANTONIO NATIVIDADE JARDIM','HERMES ANTONIO NATIVIDADE JARDIM','none','true','true',NULL,'guindaste Telescópico','2024-06-07','hermes-antonio-natividade-jardim','2024-04-25 08:42:31','2024-06-07 17:23:57'),(59,'HEVERSON HENRIQUE CUNHA BORGES','HEVERSON HENRIQUE CUNHA BORGES','none','true','true',NULL,'guindaste Telescópico','2024-06-07','heverson-henrique-cunha-borges','2024-04-25 08:42:51','2024-06-21 23:56:42'),(60,'HUGO IVISS CAMARA SODRE','HUGO IVISS CAMARA SODRE','none','true','true',NULL,'sinaleiro','2024-04-25','hugo-iviss-camara-sodre','2024-04-25 08:43:11','2024-07-12 00:07:25'),(61,'IONALDO DE AZEVEDO MARQUES','IONALDO DE AZEVEDO MARQUES','none','true','true',NULL,'guindaste Telescópico','2024-06-07','ionaldo-de-azevedo-marques','2024-04-25 08:43:33','2024-06-20 02:53:07'),(62,'IVANILSOM ALVES FERNANDES','IVANILSOM ALVES FERNANDES','none','true','true',NULL,'guindaste Articulado','2024-06-07','ivanilsom-alves-fernandes','2024-04-25 08:43:51','2024-06-07 17:11:32'),(63,'JACKSON NEIVALDO DOS SANTOS SILVA','JACKSON NEIVALDO DOS SANTOS SILVA','none','true','true',NULL,'ajudante Motorista','2024-06-07','jackson-neivaldo-dos-santos-silva','2024-04-25 08:44:43','2024-06-07 17:11:42'),(64,'JEEFERSON EIDES PIMENTEL CASTRO','JEEFERSON EIDES PIMENTEL CASTRO','none','true','true',NULL,'mecanico','2024-04-25','jeeferson-eides-pimentel-castro','2024-04-25 08:45:02','2024-04-25 08:45:02'),(65,'JESIEL NASCIMENTO DOS SANTOS','JESIEL NASCIMENTO DOS SANTOS','none','true','true',NULL,'guindaste Telescópico','2024-06-07','jesiel-nascimento-dos-santos','2024-04-25 08:45:23','2024-07-12 00:07:25'),(66,'JHORRAN CRISTIAN DA SILVA PEREIRA','JHORRAN CRISTIAN DA SILVA PEREIRA','none','true','true',NULL,'sinaleiro','2024-04-25','jhorran-cristian-da-silva-pereira','2024-04-25 08:47:27','2024-06-20 02:53:11'),(67,'JOÃO BATISTA LOBO ALMEIDA','JOÃO BATISTA LOBO ALMEIDA','none','true','true',NULL,'guindaste Telescópico','2024-06-07','joao-batista-lobo-almeida','2024-04-25 08:48:31','2024-06-07 17:12:16'),(68,'JOÃO VICTOR ANDRADE SERRA','JOÃO VICTOR ANDRADE SERRA','none','true','true',NULL,'ajudante Motorista','2024-06-07','joao-victor-andrade-serra','2024-04-25 08:48:59','2024-06-07 17:12:36'),(69,'JOÃO VITOR LOBATO QUEIROZ','JOÃO VITOR LOBATO QUEIROZ','none','true','true',NULL,'sinaleiro','2024-04-25','joao-vitor-lobato-queiroz','2024-04-25 08:49:21','2024-04-25 08:49:21'),(70,'JOSE DARLEY SOUSA DE SOUSA','JOSE DARLEY SOUSA DE SOUSA','none','true','true',NULL,'ajudante Motorista','2024-06-07','jose-darley-sousa-de-sousa','2024-04-25 08:49:42','2024-06-20 02:53:11'),(71,'JOSE GABRIEL VIEIRA GOMES','JOSE GABRIEL VIEIRA GOMES','none','true','true',NULL,'sinaleiro','2024-04-25','jose-gabriel-vieira-gomes','2024-04-25 08:49:59','2024-04-25 08:49:59'),(72,'JOSE RODRIGO SANTOS DE JESUS','JOSE RODRIGO SANTOS DE JESUS','none','true','true',NULL,'ajudante Geral','2024-04-25','jose-rodrigo-santos-de-jesus','2024-04-25 08:51:13','2024-04-25 08:51:13'),(73,'JOSE VALMIR GONSALVES FILHO','JOSE VALMIR GONSALVES FILHO','none','true','true',NULL,'ajudante Motorista','2024-06-07','jose-valmir-gonsalves-filho','2024-04-25 08:51:31','2024-06-07 17:13:08'),(74,'JOSE VICKTOR KELWEM DA SILVA LEITE','JOSE VICKTOR KELWEM DA SILVA LEITE','none','true','true',NULL,'sinaleiro','2024-04-25','jose-vicktor-kelwem-da-silva-leite','2024-04-25 08:52:15','2024-04-25 08:52:15'),(75,'JUNIOR CELIO COELHO DA SILVA','JUNIOR CELIO COELHO DA SILVA','none','true','true',NULL,'guindaste Articulado','2024-06-07','junior-celio-coelho-da-silva','2024-04-25 08:52:37','2024-06-20 02:53:11'),(76,'JURACI SANTOS MARQUES','JURACI SANTOS MARQUES','none','true','true',NULL,'ajudante Motorista','2024-06-07','juraci-santos-marques','2024-04-25 08:52:50','2024-06-20 02:53:11'),(77,'KLEITON DO REMEDIO JASTER DA CONCEIÇÃO','KLEITON DO REMEDIO JASTER DA CONCEIÇÃO','none','false','true',NULL,'guindaste Telescópico','2024-06-07','kleiton-do-remedio-jaster-da-conceicao','2024-04-25 08:53:14','2024-06-22 16:13:43'),(78,'LAURO SALDANHA CARVALHO','LAURO SALDANHA CARVALHO','none','true','true',NULL,'guindaste Articulado','2024-06-07','lauro-saldanha-carvalho','2024-04-25 08:53:41','2024-06-07 17:24:16'),(79,'MADSON FERREIRA E FERREIRA','MADSON FERREIRA E FERREIRA','none','true','true',NULL,'sinaleiro','2024-06-07','madson-ferreira-e-ferreira','2024-04-25 08:54:04','2024-06-07 17:18:32'),(80,'MAELSON SANTOS MONTEIRO','MAELSON SANTOS MONTEIRO','none','true','true',NULL,'sinaleiro','2024-04-25','maelson-santos-monteiro','2024-04-25 08:54:20','2024-06-20 02:53:11'),(81,'MANOEL LEONIDIO DE FARIAS','MANOEL LEONIDIO DE FARIAS','none','true','true',NULL,'guindaste Telescópico','2024-06-07','manoel-leonidio-de-farias','2024-04-25 08:54:37','2024-06-20 02:53:07'),(83,'MARCELO DE MIRANDA PACHECO','MARCELO DE MIRANDA PACHECO','none','true','true',NULL,'guindaste Articulado','2024-06-07','marcelo-de-miranda-pacheco','2024-04-25 08:55:45','2024-06-20 02:53:11'),(84,'MARCILIO HARLEM PINHEIRO PEREIRA','MARCILIO HARLEM PINHEIRO PEREIRA','none','true','true',NULL,'guindaste Telescópico','2024-06-07','marcilio-harlem-pinheiro-pereira','2024-04-25 08:56:00','2024-06-07 17:19:20'),(85,'MAYARA CRISTINA GOMES HUFFENBAECHER','MAYARA CRISTINA GOMES HUFFENBAECHER','none','true','true',NULL,'supervisor','2024-04-25','mayara-cristina-gomes-huffenbaecher','2024-04-25 08:56:18','2024-04-25 08:56:18'),(86,'MESSIAS DOS SANTOS FREITAS','MESSIAS DOS SANTOS FREITAS','none','true','true',NULL,'guindaste Articulado','2024-06-07','messias-dos-santos-freitas','2024-04-25 08:56:39','2024-06-20 02:53:11'),(87,'MICAEL RODRIGUES DE CASTRO','MICAEL RODRIGUES DE CASTRO','none','true','true',NULL,'ajudante Motorista','2024-06-07','micael-rodrigues-de-castro','2024-04-25 08:56:57','2024-06-07 17:19:46'),(88,'MILSON MARTISN DE JESUS','MILSON MARTISN DE JESUS','none','true','true',NULL,'guindaste Articulado','2024-06-07','milson-martisn-de-jesus','2024-04-25 08:57:18','2024-06-07 17:19:54'),(89,'MOISES BARBOSA SOARES','MOISES BARBOSA SOARES','none','true','true',NULL,'guindaste Articulado','2024-06-07','moises-barbosa-soares','2024-04-25 08:57:38','2024-06-20 02:53:11'),(90,'NANDO NESTOR DA SILVA CONCEIÇÃO','NANDO NESTOR DA SILVA CONCEIÇÃO','none','true','true',NULL,'guindaste Articulado','2024-06-07','nando-nestor-da-silva-conceicao','2024-04-25 08:57:55','2024-06-07 17:20:17'),(91,'ORLANDO LEONIDIO DE FARIAS','ORLANDO LEONIDIO DE FARIAS','none','true','true',NULL,'guindaste Telescópico','2024-06-07','orlando-leonidio-de-farias','2024-04-25 08:58:10','2024-06-07 17:25:10'),(92,'OSVALDO WILLIMY SHOJI MATIAS','OSVALDO WILLIMY SHOJI MATIAS','none','true','true',NULL,'sinaleiro','2024-04-25','osvaldo-willimy-shoji-matias','2024-04-25 08:58:28','2024-06-20 02:53:07'),(93,'PAULO OBERDAN SILVA DA SILVA','PAULO OBERDAN SILVA DA SILVA','none','true','true',NULL,'ajudante Motorista','2024-06-07','paulo-oberdan-silva-da-silva','2024-04-25 08:58:52','2024-06-20 02:53:11'),(94,'PAULO ROBERTO FREIRE','PAULO ROBERTO FREIRE','none','true','true',NULL,'guindaste Articulado','2024-06-07','paulo-roberto-freire','2024-04-25 08:59:10','2024-06-07 17:24:56'),(95,'PAULO VITOR PINTO CUNHA','PAULO VITOR PINTO CUNHA','none','true','true',NULL,'sinaleiro','2024-05-31','paulo-vitor-pinto-cunha','2024-04-25 08:59:24','2024-07-12 00:07:25'),(96,'PELTRY FIGUEIREDO DA COSTA','PELTRY FIGUEIREDO DA COSTA','none','true','true',NULL,'sinaleiro','2024-05-27','peltry-figueiredo-da-costa','2024-04-25 09:00:19','2024-05-27 12:38:54'),(97,'PERCIO JOSE BUENO','PERCIO JOSE BUENO','none','true','true',NULL,'supervisor','2024-04-25','percio-jose-bueno','2024-04-25 09:00:35','2024-04-25 09:00:35'),(98,'PIERRE GOES OLIVEIRA','PIERRE GOES OLIVEIRA','none','true','true',NULL,'guindaste Articulado','2024-06-07','pierre-goes-oliveira','2024-04-25 09:05:04','2024-06-07 17:23:27'),(99,'RAFAEL DA SILVA MAGNO','RAFAEL DA SILVA MAGNO','none','true','true',NULL,'ajudante Motorista','2024-06-07','rafael-da-silva-magno','2024-04-25 09:05:20','2024-06-07 17:21:23'),(100,'RAFAEL FARACHE CARVALHO','RAFAEL FARACHE CARVALHO','none','true','true',NULL,'guindaste Articulado','2024-06-07','rafael-farache-carvalho','2024-04-25 09:05:39','2024-06-07 17:21:35'),(101,'RAIMUNDO NETO ARAUJO DA SILVA','RAIMUNDO NETO ARAUJO DA SILVA','none','true','true',NULL,'sinaleiro','2024-05-27','raimundo-neto-araujo-da-silva','2024-04-25 09:06:20','2024-06-20 02:53:07'),(102,'RERISSON DE QUEIROZ COSTA','RERISSON DE QUEIROZ COSTA','none','true','true',NULL,'ajudante Motorista','2024-06-07','rerisson-de-queiroz-costa','2024-04-25 09:07:27','2024-06-07 17:21:55'),(103,'RIAN SANTOS LIMA','RIAN SANTOS LIMA','none','true','true',NULL,'sinaleiro','2024-06-07','rian-santos-lima','2024-04-25 09:07:41','2024-06-07 17:22:02'),(104,'ROBERTO MATIAS LOBATO','ROBERTO MATIAS LOBATO','none','true','true',NULL,'sinaleiro','2024-04-25','roberto-matias-lobato','2024-04-25 09:08:04','2024-04-25 09:08:04'),(105,'RODRIGO SOUSA DE MORAES','RODRIGO SOUSA DE MORAES','none','true','true',NULL,'sinaleiro','2024-04-25','rodrigo-sousa-de-moraes','2024-04-25 09:08:28','2024-06-20 02:53:06'),(106,'ROGERIO DIAS MARQUES','ROGERIO DIAS MARQUES','none','true','true',NULL,'mecanico','2024-04-25','rogerio-dias-marques','2024-04-25 09:08:45','2024-04-25 09:08:45'),(107,'ROMERITO DO AMARAL CAMPELO','ROMERITO DO AMARAL CAMPELO','none','true','true',NULL,'ajudante Motorista','2024-06-07','romerito-do-amaral-campelo','2024-04-25 09:09:32','2024-06-20 02:53:11'),(108,'RONALDO DO ROSARIO PIEDADE','RONALDO DO ROSARIO PIEDADE','none','true','true',NULL,'guindaste Articulado','2024-06-07','ronaldo-do-rosario-piedade','2024-04-25 09:09:49','2024-06-20 02:53:11'),(109,'ROSILDO DIAS DA CONCEIÇÃO','ROSILDO DIAS DA CONCEIÇÃO','none','true','true',NULL,'guindaste Telescópico','2024-06-07','rosildo-dias-da-conceicao','2024-04-25 09:10:03','2024-06-07 17:22:55'),(110,'SERGIO DIAS DOS SANTOS','SERGIO DIAS DOS SANTOS','none','true','true',NULL,'sinaleiro','2024-04-25','sergio-dias-dos-santos','2024-04-25 09:10:20','2024-04-25 09:10:20'),(111,'SHEILA REGINA FLORENTINO DA SILVA','SHEILA REGINA FLORENTINO DA SILVA','none','true','true',NULL,'guindaste Articulado','2024-06-07','sheila-regina-florentino-da-silva','2024-04-25 09:10:43','2024-06-20 02:53:11'),(112,'SIDNEY SEBASTIÃO DE NAZARE DOS SANTOS','SIDNEY SEBASTIÃO DE NAZARE DOS SANTOS','none','true','true',NULL,'guindaste Articulado','2024-06-07','sidney-sebastiao-de-nazare-dos-santos','2024-04-25 09:11:08','2024-06-07 17:25:32'),(113,'TIAGO BASTOS DA SILVA','TIAGO BASTOS DA SILVA','none','true','true',NULL,'ajudante Motorista','2024-06-07','tiago-bastos-da-silva','2024-04-25 09:11:27','2024-06-20 02:53:11'),(114,'VALDEMIR DOS SANTOS FERNANDES','VALDEMIR DOS SANTOS FERNANDES','none','true','true',NULL,'operador','2024-04-25','valdemir-dos-santos-fernandes','2024-04-25 09:11:46','2024-06-20 02:53:11'),(115,'WAGNER DAVI FERREIRA MONTEIRO','WAGNER DAVI FERREIRA MONTEIRO','none','true','true',NULL,'operador','2024-06-10','wagner-davi-ferreira-monteiro','2024-04-25 09:12:08','2024-06-20 02:53:11'),(117,'WASHINGTON LUIS GOMES COSTA','WASHINGTON LUIS GOMES COSTA','none','true','true',NULL,'guindaste Articulado','2024-06-07','washington-luis-gomes-costa','2024-04-25 09:12:44','2024-06-07 17:26:14'),(118,'WELERSON ALEXANDRE GOES DE ALBUQUERQUE','WELERSON ALEXANDRE GOES DE ALBUQUERQUE','none','true','true',NULL,'mecanico','2024-04-25','welerson-alexandre-goes-de-albuquerque','2024-04-25 09:15:28','2024-04-25 09:15:28'),(119,'WELLINGTON COSTA DA COSTA','WELLINGTON COSTA DA COSTA','none','true','true',NULL,'sinaleiro','2024-04-25','wellington-costa-da-costa','2024-04-25 09:16:15','2024-04-25 09:16:15'),(120,'WENDEL LIMA LIMA','WENDEL LIMA LIMA','none','true','true',NULL,'ajudante Motorista','2024-06-12','wendel-lima-lima','2024-04-25 09:18:32','2024-06-20 02:53:11'),(121,'WESLLEY ARAGÃO DIAS','WESLLEY ARAGÃO DIAS','none','true','true',NULL,'ajudante Motorista','2024-06-07','weslley-aragao-dias','2024-04-25 09:18:55','2024-06-07 17:26:49'),(122,'YAGO DIAS SANTOS','YAGO DIAS SANTOS','none','true','true',NULL,'mecanico','2024-06-07','yago-dias-santos','2024-04-25 09:19:10','2024-06-07 17:26:59'),(123,'ALDO BATISTA DO AMARAL','ALDO BATISTA DO AMARAL','none','true','true',NULL,'operador','2024-06-07','aldo-batista-do-amaral','2024-04-25 09:24:21','2024-06-07 17:03:23'),(124,'ANDRE FELIPE SILVA DA SILVA','ANDRE FELIPE SILVA DA SILVA','none','true','true',NULL,'operador','2024-06-07','andre-felipe-silva-da-silva','2024-05-31 15:49:41','2024-07-12 00:07:25'),(125,'DOUGLAS PAZ DE CRISTO','DOUGLAS PAZ DE CRISTO','none','true','true',NULL,'operador','2024-06-07','douglas-paz-de-cristo','2024-05-31 15:51:05','2024-06-07 17:06:44'),(126,'LUCIANO FERREIRA PINHEIRO','LUCIANO FERREIRA PINHEIRO','none','true','true',NULL,'ajudante','2024-05-31','luciano-ferreira-pinheiro','2024-05-31 15:56:45','2024-05-31 15:56:45'),(127,'MARCELA KARINE DE LIMA CARVALHO','MARCELA KARINE DE LIMA CARVALHO','none','true','true',NULL,'guindaste Telescópico','2024-06-07','marcela-karine-de-lima-carvalho','2024-05-31 15:57:35','2024-06-20 02:53:06');
/*!40000 ALTER TABLE `collaborators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_category`
--

DROP TABLE IF EXISTS `document_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `short_name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `visible` text NOT NULL,
  `color` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_category`
--

LOCK TABLES `document_category` WRITE;
/*!40000 ALTER TABLE `document_category` DISABLE KEYS */;
INSERT INTO `document_category` VALUES (4,'Laudo','Laudo','laudo','true','#000000','2024-05-13 02:38:23','2024-05-13 02:38:23');
/*!40000 ALTER TABLE `document_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` text NOT NULL,
  `name` text DEFAULT NULL,
  `slug` varchar(1111) NOT NULL,
  `description` text NOT NULL,
  `type_document` text DEFAULT NULL,
  `collaborator` varchar(255) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `vinculation` text DEFAULT NULL,
  `visible` varchar(15) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (3,'42ac065d-cd0e-487e-9169-f6e27ff2ac49','Nome ai','nome-ai','<p>asd</p>','laudo','EVANILDO LIMA GALENO','2024-05-13','{\"Operador\":\"\",\"Equipamento\":\"\"}','true','2024-05-13 02:39:14','2024-05-13 02:39:14');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `functions`
--

DROP TABLE IF EXISTS `functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `functions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `slug` varchar(190) NOT NULL,
  `type` varchar(190) NOT NULL,
  `visible` varchar(255) DEFAULT NULL,
  `availability` date NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `functions`
--

LOCK TABLES `functions` WRITE;
/*!40000 ALTER TABLE `functions` DISABLE KEYS */;
INSERT INTO `functions` VALUES (1,'Ajudante Motorista','ajudante-motorista','colaborador','true','2024-04-25','2024-06-07 08:07:43','2024-04-25 14:56:08'),(2,'Ajudante Geral','ajudante-geral','colaborador','true','2024-04-25','2024-04-25 15:00:01','2024-04-25 14:56:35'),(3,'Mecanico','mecanico','colaborador','true','2024-04-25','2024-04-25 14:59:57','2024-04-25 14:56:46'),(4,'Operador','operador','colaborador','true','2024-04-25','2024-04-25 14:57:14','2024-04-25 14:57:14'),(5,'Rigger','rigger','colaborador','true','2024-04-25','2024-04-25 14:57:21','2024-04-25 14:57:21'),(6,'Sinaleiro','sinaleiro','colaborador','true','2024-04-25','2024-04-25 14:57:29','2024-04-25 14:57:29'),(7,'Supervisor','supervisor','colaborador','true','2024-04-25','2024-04-25 14:57:40','2024-04-25 14:57:40'),(8,'Guindastes Articulado','guindastes-articulado','colaborador','true','2024-04-25','2024-06-07 08:23:54','2024-04-25 15:04:08'),(9,'Guindastes Telescópico','guindastes-telescopico','equipamento','true','2024-04-25','2024-04-25 15:04:25','2024-04-25 15:04:19'),(10,'Plataforma','plataforma','equipamento','true','2024-04-25','2024-04-25 15:05:05','2024-04-25 15:04:37'),(12,'Empilhadeira','empilhadeira','equipamento','true','2024-04-25','2024-04-25 15:05:14','2024-04-25 15:05:14'),(14,'Tecnico de Segurança de Trabalho','tecnico-de-seguranca-de-trabalho','colaborador','true','2024-05-31','2024-05-31 16:00:13','2024-05-31 16:00:13'),(15,'Guindaste Articulado','guindaste-articulado','colaborador','true','2024-06-07','2024-06-07 08:08:43','2024-06-07 08:00:29'),(16,'Guindaste Telescópico','guindaste-telescopico','colaborador','true','2024-06-07','2024-06-07 08:09:00','2024-06-07 08:09:00');
/*!40000 ALTER TABLE `functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoists`
--

DROP TABLE IF EXISTS `hoists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `visible` varchar(255) DEFAULT NULL,
  `slug` varchar(64) NOT NULL,
  `type` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `frotas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoists`
--

LOCK TABLES `hoists` WRITE;
/*!40000 ALTER TABLE `hoists` DISABLE KEYS */;
INSERT INTO `hoists` VALUES (2,'GDT (ECM2G31) ZL 85T - FROTA 4','ECM2G31','true','ecm2g31','telescopico','2024-04-24 19:43:35','2024-06-20 17:16:48',4),(3,'GDT (FYJ1631) ZL 2OOT - FROTA 53','FYJ1631','true','fyj1631','telescopico','2024-04-24 19:48:33','2024-06-20 17:16:48',53),(4,'GDT (GEM1A53) ZL 85T - FROTA 616','GEM1A53','false','gem1a53','telescopico','2024-04-24 19:50:13','2024-06-22 16:13:43',616),(5,'GDT (PPF7490) ZL 85T - FROTA 30','PPF7490','true','ppf7490','telescopico','2024-04-24 19:51:37','2024-05-12 22:53:45',30),(6,'GDT (SUF7C38) ZL 100T - FROTA 821','SUF7C38','true','suf7c38','telescopico','2024-04-24 19:53:06','2024-06-04 19:24:46',821),(7,'GDT (SUS2A05) ZL 85T - FROTA 817','SUS2A05','true','sus2a05','telescopico','2024-04-24 19:53:41','2024-05-11 20:02:03',817),(8,'GDT (STL2D07) ZL 120T - FROTA 820','STL2D07','true','stl2d07','telescopico','2024-04-24 19:54:32','2024-05-26 02:49:29',820),(9,'GDT (EKH2173) SANY 100T -  FROTA 74','EKH2173','true','ekh2173','telescopico','2024-04-24 19:54:59','2024-07-12 00:07:25',74),(10,'GDT (FKM1G91) SANY 160T - FROTA 599','FKM1G91','true','fkm1g91','telescopico','2024-04-24 19:55:30','2024-04-25 10:16:07',599),(11,'GDT (FML6A29) SANY 80T - FROTA 245','FML6A29','true','fml6a29','telescopico','2024-04-24 19:55:53','2024-04-25 10:14:37',245),(12,'GDT (FOK0D35) SANY 80T - FROTA 244','FOK0D35','true','fok0d35','telescopico','2024-04-24 19:57:29','2024-05-26 02:49:30',244),(13,'GDT (FPO4C93) SANY 80T - FROTA 256','FPO4C93','true','fpo4c93','telescopico','2024-04-24 19:58:27','2024-05-26 02:49:30',256),(14,'GDT (FUN3J05) SANY 110T - FROTA 309','FUN3J05','true','fun3j05','telescopico','2024-04-24 19:58:59','2024-07-12 00:07:25',309),(15,'GDT (GAW2D32) SANY 160T - FROTA 563','GAW2D32','true','gaw2d32','telescopico','2024-04-24 19:59:27','2024-04-25 10:16:26',563),(16,'GDT (GHU7H15) SANY 80T - FROTA 538','GHU7H15','true','ghu7h15','articulado','2024-04-24 19:59:52','2024-04-24 20:07:17',538),(17,'GDT (GIL6C43) SANY 160T - FROTA 562','GIL6C43','true','gil6c43','articulado','2024-04-24 20:00:14','2024-04-24 20:07:28',562),(18,'GDT (FIN1C66) ZL300T - FROTA 526','FIN1C66','true','fin1c66','telescopico','2024-04-24 20:00:43','2024-04-29 03:52:50',526),(20,'GDT HYDRO 18 TON - FROTA 168','HYDRO 18 TON','true','hydro-18-ton','telescopico','2024-04-24 20:08:44','2024-04-24 20:08:44',168),(21,'GDT HYDRO 35 TON - FROTA 169','HYDRO 35 TON','true','hydro-35-ton','telescopico','2024-04-24 20:09:05','2024-06-20 02:53:07',169),(22,'GDT HYDRO 7 7 TON - FROTA 167','HYDRO 7,7 TON','true','hydro-77-ton','telescopico','2024-04-24 20:09:33','2024-06-20 02:53:07',167),(23,'GDT HYDRO 80 TON - FROTA 170','HYDRO 80 TON','true','hydro-80-ton','telescopico','2024-04-24 20:11:11','2024-04-24 20:11:11',170),(24,'GDT BANTAM 18T ALLES - FROTA 104','BANTAM 18T','false','bantam-18t','telescopico','2024-04-24 20:12:41','2024-06-22 16:13:43',104),(25,'MUNCK (SUL4A77) FROTA 781','SUL4A77','true','sul4a77','articulado','2024-04-24 20:15:32','2024-06-12 03:44:37',781),(26,'MUNCK (FUB7233) HYVA HBR660 - FROTA 95','FUB7233','true','fub7233','articulado','2024-04-24 20:17:46','2024-06-20 02:53:11',95),(27,'MUNCK (EXW6077) HYVA HBR450 - FROTA 118','EXW6077','true','exw6077','articulado','2024-04-24 20:54:22','2024-06-03 19:14:19',118),(28,'MUNCK (CFZ3304) HYVA HBR450 - FROTA 122','CFZ3304','true','cfz3304','articulado','2024-04-24 20:55:31','2024-04-24 20:55:31',122),(29,'MUNCK (ECM2622) FROTA 3','ECM2622','true','ecm2622','articulado','2024-04-24 20:56:56','2024-04-25 04:08:54',3),(30,'MUNCK (CUK3A66) HIAB AGI45 - FROTA 302','CUK3A66','true','cuk3a66','articulado','2024-04-24 20:58:50','2024-04-24 20:58:50',302),(31,'MUNCK (DEU1A08) HIAB AGI45 - FROTA 306','DEU1A08','true','deu1a08','articulado','2024-04-25 09:25:51','2024-04-25 09:25:51',306),(32,'MUNCK (DOR1A68) HYVA HBR450 - FROTA 229','DOR1A68','true','dor1a68','articulado','2024-04-25 09:27:15','2024-06-20 02:53:11',229),(33,'MUNCK (DQW4414) FROTA 121','DQW4414','true','dqw4414','articulado','2024-04-25 09:28:07','2024-04-25 09:28:07',121),(34,'MUNCK (ECU4060) FROTA 120','ECU4060','true','ecu4060','articulado','2024-04-25 09:28:38','2024-06-20 02:53:11',120),(35,'MUNCK (ESP5C12) HIAB AGI45 - FROTA 307','ESP5C12','true','esp5c12','articulado','2024-04-25 09:30:34','2024-04-25 09:30:34',307),(36,'MUNCK (EUM9556) FROTA 119','EUM9556','true','eum9556','articulado','2024-04-25 09:31:09','2024-04-25 09:31:09',119),(37,'MUNCK (FIL6E02) HIAB AGI45 - FROTA 305','FIL6E02','true','fil6e02','articulado','2024-04-25 09:32:27','2024-06-20 02:53:11',305),(38,'MUNCK (FON3J71) HIAB HBR450 - FROTA 301','FON3J71','true','fon3j71','articulado','2024-04-25 09:33:34','2024-04-25 09:33:34',301),(39,'MUNCK (FUD0I06) HIAB - FROTA 308','FUD0I06','true','fud0i06','articulado','2024-04-25 09:34:38','2024-04-25 09:34:38',308),(40,'MUNCK (FHH3185) PALFINGER MD45 - FROTA 83','FHH3185','true','fhh3185','articulado','2024-04-25 09:35:59','2024-04-25 09:35:59',83),(41,'MUNCK (GIG1174) PALFINGER MD45 - FROTA 84','GIG1174','true','gig1174','articulado','2024-04-25 09:36:56','2024-07-12 00:07:25',84),(42,'MUNCK (SUH8D33) FROTA 783','SUH8D33','true','suh8d33','articulado','2024-04-25 09:37:59','2024-04-25 09:37:59',783),(43,'MUNCK (SUJ0H38) FROTA 530','SUJ0H38','true','suj0h38','articulado','2024-04-25 09:39:02','2024-04-25 09:39:02',530),(44,'MUNCK (SUX1G90) FROTA 784','SUX1G90','true','sux1g90','articulado','2024-04-25 09:39:39','2024-06-20 02:53:11',784),(45,'MUNCK (GEP4229) - FROTA 98','GEP4229','true','gep4229','articulado','2024-04-25 09:41:09','2024-06-20 02:53:11',98),(46,'MUNCK (SUR1A10) - FROTA 792','SUR1A10','true','sur1a10','articulado','2024-04-25 09:41:40','2024-04-25 09:41:40',792),(47,'MUNCK (GHR9G26) T HYVA HBR660 - FROTA 230','GHR9G26','true','ghr9g26','articulado','2024-04-25 09:43:26','2024-04-25 09:43:26',230),(48,'MUNCK ALBRAS (JUD3331) FROTA 75','JUD3331','true','jud3331','articulado','2024-04-25 09:44:18','2024-04-25 09:44:18',75),(49,'MUNCK (BYZ6685) HYVA HBR450 - FROTA 149','BYZ6685','true','byz6685','articulado','2024-04-25 09:45:29','2024-06-20 02:53:11',149),(50,'MUNCK (BZB2177) HYVA HBR450 - FROTA 148','BZB2177','true','bzb2177','articulado','2024-04-25 09:46:16','2024-06-03 19:14:19',148),(51,'MUNCK (DVM3989) HYVA HBR450 - FROTA 125','DVM3989','true','dvm3989','articulado','2024-04-25 09:47:59','2024-04-25 09:47:59',125),(52,'MUNCK (EBL1670) HYVA HBR450 - FROTA 124','EBL1670','true','ebl1670','articulado','2024-04-25 09:50:54','2024-04-25 09:50:54',124),(53,'MUNCK (EBZ9739) HYVA HBR450 - FROTA 123','EBZ9739','true','ebz9739','articulado','2024-04-25 09:52:20','2024-04-25 09:52:20',123),(54,'MUNCK (EHH6625) HYVA HBR450 - FROTA 151','EHH6625','true','ehh6625','articulado','2024-04-25 09:53:20','2024-06-20 02:53:11',151),(55,'MUNCK (ELW9049) FROTA 152','ELW9049','true','elw9049','articulado','2024-04-25 09:56:00','2024-04-25 09:56:00',152),(56,'MUNCK (ENN0093) FROTA 153','ENN0093','true','enn0093','articulado','2024-04-25 09:56:39','2024-06-20 02:53:11',153),(57,'MUNCK (EON0027) FROTA 150','EON0027','true','eon0027','articulado','2024-04-25 09:57:37','2024-04-25 09:57:37',150),(58,'MUNCK (EST6009) HYVA HBR450 - FROTA 126','EST6009','true','est6009','articulado','2024-04-25 09:59:36','2024-06-20 02:53:11',126),(59,'EMP ZL 3T - FD30-6000MM D FROTA 619','FD30 T6000 D','true','fd30-t6000-d','empilhadeira','2024-04-25 10:06:22','2024-04-25 10:06:22',619),(60,'EMP ZL 3T FD30-4800MM D FROTA 620','EMP ZL 3T','false','emp-zl-3t','empilhadeira','2024-04-25 10:07:09','2024-06-12 15:58:52',620),(61,'EMP ZL 7 TON - FD70 - FROTA 618','FD70','true','fd70','empilhadeira','2024-04-25 10:07:56','2024-05-11 00:34:39',618),(62,'PTA ZL ZA20J S-0022 - FROTA 542','N022','true','n022','plataforma','2024-04-25 10:11:36','2024-04-25 10:22:46',542),(63,'PTA ZL ZA14J - S-0451 -  FROTA 544','N451','true','n451','plataforma','2024-04-25 10:18:55','2024-07-12 00:07:25',544),(64,'PTA ZL ZA20J - S-0021 - FROTA 543','N21','true','n21','plataforma','2024-04-25 10:20:55','2024-04-25 10:22:20',543),(65,'RT55 ZOOMLION - FROTA 60','RT 55','true','rt-55','telescopico','2024-04-25 10:23:58','2024-06-20 02:53:07',60),(66,'RT 60 SANY -  FROTA 777','RT 60','true','rt-60','telescopico','2024-04-25 10:25:33','2024-06-03 19:14:22',777),(67,'EMP MANITOU 4>5T - FROTA 112','EMP MI45G','true','emp-mi45g','empilhadeira','2024-04-25 10:27:23','2024-06-12 16:52:30',112),(68,'EMP MANITOU 7T - FROTA  287','EMP MIX70D','true','emp-mix70d','empilhadeira','2024-04-25 10:28:24','2024-07-12 00:07:25',287),(69,'EMP MANITOU MI35 - T4300 FROTA N° 101','EMP-3500','true','emp-3500','empilhadeira','2024-04-25 10:29:15','2024-04-25 10:29:15',101),(70,'PTA MANITOU 16MT - S928867 - FROTA 8','S928867','true','s928867','plataforma','2024-04-25 10:30:58','2024-04-25 10:30:58',8),(71,'PTA MANITOU 16MT - S928811 - FROTA 7','S928811','true','s928811','plataforma','2024-04-25 10:33:06','2024-04-25 10:33:06',7),(72,'GDT(FDE4J24) SANY 80T - FROTA 255','FDE4J24','true','fde4j24','telescopico','2024-06-12 15:27:26','2024-06-20 02:53:06',255);
/*!40000 ALTER TABLE `hoists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_23_051122_create_certificates_table',1),(6,'2024_03_23_051122_create_schedules_table',1),(7,'2024_04_14_000004_create_clients_table',1),(8,'2024_04_18_000001_create_collaborators_table',1),(9,'2024_04_18_000001_create_operators_table',1),(10,'2024_04_18_000001_create_settings_table',1),(11,'2024_04_18_00001_create_hoists_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('aa394947-8efd-4fc5-981b-331bc94018b3','App\\Notifications\\ScheduleNot','App\\Models\\User',1,'{\"name\":\"Novo Planejamento criado!\",\"date\":\"2024-05-05\"}','2024-05-05 05:04:07','2024-05-05 05:03:57','2024-05-05 05:04:07'),('5c209c0d-11b0-420d-83bd-9ac1067e72a1','App\\Notifications\\ScheduleNot','App\\Models\\User',1,'{\"name\":\"Novo Planejamento criado!\",\"date\":\"2024-05-05\"}','2024-05-05 16:47:50','2024-05-05 05:45:07','2024-05-05 16:47:50');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `visible` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `role` varchar(16) NOT NULL,
  `availability` date NOT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `operators_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `client` varchar(2555) NOT NULL,
  `availability` date DEFAULT NULL,
  `visible` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (65,'[{\"id\":0,\"equipaments\":\"GDT (FUN3J05) SANY 110T - FROTA 309\",\"operators\":\"EDI WILSON PIO NETO\",\"signal_helper\":\"HELIMAURO RIBEIRO DA SILVA\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-22T08:00\",\"timer_f\":\"2024-07-03T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT (EKH2173) SANY 100T -  FROTA 74\",\"operators\":\"HEVERSON HENRIQUE CUNHA BORGES\",\"signal_helper\":\"PAULO VITOR PINTO CUNHA\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-22T08:00\",\"timer_f\":\"2024-07-03T17:00\",\"check_grade\":\"true\"},{\"id\":2,\"equipaments\":\"MUNCK (GIG1174) PALFINGER MD45 - FROTA 84\",\"operators\":\"DILSONALDO DANTAS PANTOJA\",\"signal_helper\":\"DANILO MOTA LOPES\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-22T08:00\",\"timer_f\":\"2023-07-03T17:00\",\"check_grade\":\"true\"},{\"id\":3,\"equipaments\":\"PTA ZL ZA14J - S-0451 -  FROTA 544\",\"operators\":\"DANILO LONGHINI CAGLIARI\",\"signal_helper\":\"HUGO IVISS CAMARA SODRE\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-22T08:00\",\"timer_f\":\"2024-07-03T17:00\",\"check_grade\":\"true\"},{\"id\":4,\"equipaments\":\"EMP MANITOU 7T - FROTA  287\",\"operators\":\"ANDRE FELIPE SILVA DA SILVA\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-22T08:00\",\"timer_f\":\"2024-07-03T17:00\",\"check_grade\":\"true\"}]','Liebherr - MPSA','2024-06-20','false','2024-06-20 17:26:03','2024-06-21 23:56:42'),(66,'[{\"id\":0,\"equipaments\":\"GDT (FUN3J05) SANY 110T - FROTA 309\",\"operators\":\"DANILO LONGHINI CAGLIARI\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-26T08:00\",\"timer_f\":\"2024-06-26T17:00\",\"check_grade\":\"true\"}]','EGTC','2024-06-20','true','2024-06-20 17:48:56','2024-06-20 17:48:56'),(67,'[{\"id\":0,\"equipaments\":\"GDT (FUN3J05) SANY 110T - FROTA 309\",\"operators\":\"EVANILDO LIMA GALENO\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-26T08:00\",\"timer_f\":\"2024-06-26T17:00\",\"check_grade\":\"true\"}]','EGTC','2024-06-20','true','2024-06-20 17:49:07','2024-06-20 17:49:07'),(68,'[{\"id\":0,\"equipaments\":\"MUNCK (GIG1174) PALFINGER MD45 - FROTA 84\",\"operators\":\"DILSONALDO DANTAS PANTOJA\",\"signal_helper\":\"DANILO MOTA LOPES\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-05-23T08:00\",\"timer_f\":\"2024-07-03T17:00\",\"check_grade\":\"true\"}]','Liebherr - MPSA','2024-06-22','false','2024-06-22 15:41:09','2024-06-23 23:56:31'),(69,'[{\"id\":0,\"equipaments\":\"GDT (GEM1A53) ZL 85T - FROTA 616\",\"operators\":\"KLEITON DO REMEDIO JASTER DA CONCEI\\u00c7\\u00c3O\",\"signal_helper\":\"\",\"collaborators_extras\":\"EVANILDO LIMA GALENO\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T08:00\",\"timer_f\":\"2024-06-24T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"ALAN SOUSA DA SILVA\",\"signal_helper\":\"\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T15:00\",\"timer_f\":\"2024-06-24T23:00\",\"check_grade\":\"true\"},{\"id\":2,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"FREDISON LOUZADA GOMES\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-25T00:00\",\"timer_f\":\"2024-06-25T07:00\",\"check_grade\":\"true\"},{\"id\":3,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"ALAN SOUSA DA SILVA\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-26T08:00\",\"timer_f\":\"2024-06-27T17:00\",\"check_grade\":\"true\"}]','ALBRAS - CTO 8637','2024-06-22','true','2024-06-22 16:13:43','2024-06-22 16:13:43'),(70,'[{\"id\":0,\"equipaments\":\"GDT (GEM1A53) ZL 85T - FROTA 616\",\"operators\":\"KLEITON DO REMEDIO JASTER DA CONCEI\\u00c7\\u00c3O\",\"signal_helper\":\"\",\"collaborators_extras\":\"EVANILDO LIMA GALENO\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T08:00\",\"timer_f\":\"2024-06-24T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"ALAN SOUSA DA SILVA\",\"signal_helper\":\"\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T15:00\",\"timer_f\":\"2024-06-24T23:00\",\"check_grade\":\"true\"},{\"id\":2,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"FREDISON LOUZADA GOMES\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-25T00:00\",\"timer_f\":\"2024-06-25T07:00\",\"check_grade\":\"true\"}]','ALBRAS - CTO 8637','2024-06-22','true','2024-06-22 16:14:22','2024-06-22 16:14:22'),(71,'[{\"id\":0,\"equipaments\":\"GDT (GEM1A53) ZL 85T - FROTA 616\",\"operators\":\"KLEITON DO REMEDIO JASTER DA CONCEI\\u00c7\\u00c3O\",\"signal_helper\":\"\",\"collaborators_extras\":\"EVANILDO LIMA GALENO\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T08:00\",\"timer_f\":\"2024-06-24T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"ALAN SOUSA DA SILVA\",\"signal_helper\":\"\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T15:00\",\"timer_f\":\"2024-06-24T23:00\",\"check_grade\":\"true\"},{\"id\":2,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"FREDISON LOUZADA GOMES\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-25T00:00\",\"timer_f\":\"2024-06-25T07:00\",\"check_grade\":\"true\"}]','ALBRAS - CTO 8637','2024-06-22','true','2024-06-22 16:14:56','2024-06-22 16:14:56'),(72,'[{\"id\":0,\"equipaments\":\"GDT (GEM1A53) ZL 85T - FROTA 616\",\"operators\":\"KLEITON DO REMEDIO JASTER DA CONCEI\\u00c7\\u00c3O\",\"signal_helper\":\"\",\"collaborators_extras\":\"EVANILDO LIMA GALENO\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T08:00\",\"timer_f\":\"2024-06-24T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT BANTAM 18T ALLES - FROTA 104\",\"operators\":\"ALAN SOUSA DA SILVA\",\"signal_helper\":\"\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T15:00\",\"timer_f\":\"2024-06-24T23:00\",\"check_grade\":\"true\"}]','ALBRAS - CTO 8637','2024-06-22','true','2024-06-22 16:15:16','2024-06-22 16:15:16'),(73,'[{\"id\":0,\"equipaments\":\"GDT (GEM1A53) ZL 85T - FROTA 616\",\"operators\":\"KLEITON DO REMEDIO JASTER DA CONCEI\\u00c7\\u00c3O\",\"signal_helper\":\"\",\"collaborators_extras\":\"EVANILDO LIMA GALENO\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-06-24T08:00\",\"timer_f\":\"2024-06-24T17:00\",\"check_grade\":\"true\"}]','ALBRAS - CTO 8637','2024-06-22','true','2024-06-22 16:15:33','2024-06-22 16:15:33'),(74,'[{\"id\":0,\"equipaments\":\"GDT (EKH2173) SANY 100T -  FROTA 74\",\"operators\":\"JESIEL NASCIMENTO DOS SANTOS\",\"signal_helper\":\"PAULO VITOR PINTO CUNHA\",\"collaborators_extras\":\"\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-07-10T08:00\",\"timer_f\":\"2024-08-25T17:00\",\"check_grade\":\"true\"},{\"id\":1,\"equipaments\":\"GDT (FUN3J05) SANY 110T - FROTA 309\",\"operators\":\"EDI WILSON PIO NETO\",\"signal_helper\":\"HELIMAURO RIBEIRO DA SILVA\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-07-10T08:00\",\"timer_f\":\"2024-08-25T17:00\",\"check_grade\":\"true\"},{\"id\":2,\"equipaments\":\"MUNCK (GIG1174) PALFINGER MD45 - FROTA 84\",\"operators\":\"DILSONALDO DANTAS PANTOJA\",\"signal_helper\":\"DANILO MOTA LOPES\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-07-10T08:00\",\"timer_f\":\"2024-08-25T17:00\",\"check_grade\":\"true\"},{\"id\":3,\"equipaments\":\"PTA ZL ZA14J - S-0451 -  FROTA 544\",\"operators\":\"DANILO LONGHINI CAGLIARI\",\"signal_helper\":\"HUGO IVISS CAMARA SODRE\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-07-10T08:00\",\"timer_f\":\"2024-08-25T17:00\",\"check_grade\":\"true\"},{\"id\":4,\"equipaments\":\"EMP MANITOU 7T - FROTA  287\",\"operators\":\"ANDRE FELIPE SILVA DA SILVA\",\"signal_helper\":\"Nenhum\",\"collaborators_extras\":\"Nenhum\",\"work_place\":\"Nenhum\",\"responsible\":\"Nenhum\",\"timer\":\"2024-07-10T08:00\",\"timer_f\":\"2024-08-25T17:00\",\"check_grade\":\"true\"}]','Liebherr - MPSA','2024-07-11','false','2024-07-11 16:02:55','2024-07-12 23:29:35');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(16) NOT NULL,
  `site_name` varchar(32) NOT NULL,
  `site_url` varchar(32) NOT NULL,
  `site_email` varchar(32) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (2,'PRO','PRO : AllesServiços','','','','','',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Wellington Henrique','admin','wellingtonalfredo550@gmail.com',NULL,'$2y$10$a0.qhaRxkgjCakELJ.sTPOeH5n5RP6R2pwamOnS2DIiGG4DSqYJ8a','NL3NiDBc5mfy8yZARDywewmr0fPQdOOtSrMx3ESn5pgS1xyAW2XsaFASYKIJ','2024-04-23 06:06:46','2024-04-29 03:53:43'),(2,'Danilo Cagliari','admin','danilo@allesservicos.com.br',NULL,'$2y$10$AptkCD.bLT6Uch6q0r.ILeSuo4XQkUQo8i206jO1dheZzL1KQukhS','3iRNxb5khY55Bw6nxy2PCf7L6dZZ98EkErFoFrSxCIqtr1PE7zYwg9lrepTU','2024-04-23 19:18:26','2024-04-23 19:18:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_places`
--

DROP TABLE IF EXISTS `work_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `visible` varchar(15) NOT NULL,
  `availability` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_places`
--

LOCK TABLES `work_places` WRITE;
/*!40000 ALTER TABLE `work_places` DISABLE KEYS */;
INSERT INTO `work_places` VALUES (3,'Augusto','responsible','augusto','true','2024-06-20','2024-06-20 01:23:58','2024-06-20 01:23:58'),(4,'Sao paulo','work_place','sao-paulo','true','2024-06-20','2024-06-20 01:24:06','2024-06-20 01:24:06'),(5,'PRECIPITAÇÃO','work_place','precipitacao','true','2024-07-11','2024-07-11 16:05:42','2024-07-11 16:05:42'),(6,'CALCINAÇÃO','work_place','calcinacao','true','2024-07-11','2024-07-11 16:05:55','2024-07-11 16:05:55'),(7,'DESAGUAMENTO','work_place','desaguamento','true','2024-07-11','2024-07-11 16:06:02','2024-07-11 16:06:02'),(8,'FILTRO PRENSA','work_place','filtro-prensa','true','2024-07-11','2024-07-11 16:06:10','2024-07-11 16:06:10'),(9,'PORTO','work_place','porto','true','2024-07-11','2024-07-11 16:06:17','2024-07-11 16:06:17'),(10,'GVAP','work_place','gvap','true','2024-07-11','2024-07-11 16:06:23','2024-07-11 16:06:23'),(11,'GTAE','work_place','gtae','true','2024-07-11','2024-07-11 16:06:29','2024-07-11 16:06:29'),(12,'DIGESTÃO','work_place','digestao','true','2024-07-11','2024-07-11 16:06:36','2024-07-11 16:06:36'),(13,'CLARIFICAÇÃO','work_place','clarificacao','true','2024-07-11','2024-07-11 16:06:45','2024-07-11 16:06:45'),(14,'ESTOCAGEM','work_place','estocagem','true','2024-07-11','2024-07-11 16:06:52','2024-07-11 16:06:52'),(15,'TURNO BAYER','work_place','turno-bayer','true','2024-07-11','2024-07-11 16:07:01','2024-07-11 16:07:01'),(16,'CARBONO','work_place','carbono','true','2024-07-11','2024-07-11 16:07:12','2024-07-11 16:07:12'),(17,'UTILIDADES','work_place','utilidades','true','2024-07-11','2024-07-11 16:07:19','2024-07-11 16:07:19'),(18,'TURNO REDUÇÃO','work_place','turno-reducao','true','2024-07-11','2024-07-11 16:07:31','2024-07-11 16:07:31'),(19,'PS2 FAIXA','work_place','ps2-faixa','true','2024-07-11','2024-07-11 16:07:42','2024-07-11 16:07:42'),(20,'MPSA','work_place','mpsa','true','2024-07-11','2024-07-11 16:12:04','2024-07-11 16:12:04'),(21,'CALDEIRAS','work_place','caldeiras','true','2024-07-11','2024-07-11 16:13:19','2024-07-11 16:13:19'),(22,'Marcus Júnior','responsible','marcus-junior','true','2024-07-11','2024-07-11 16:14:57','2024-07-11 16:14:57'),(23,'Anderson Monteiro','responsible','anderson-monteiro','true','2024-07-11','2024-07-11 16:15:17','2024-07-11 16:15:17');
/*!40000 ALTER TABLE `work_places` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-23 13:10:20
