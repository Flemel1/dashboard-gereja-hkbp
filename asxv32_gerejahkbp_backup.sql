-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: asxv32_gerejahkbp
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `baptis`
--

DROP TABLE IF EXISTS `baptis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baptis` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jemaat_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jemaat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_baptis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_baptis` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baptis_jemaat_id_foreign` (`jemaat_id`),
  CONSTRAINT `baptis_jemaat_id_foreign` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baptis`
--

LOCK TABLES `baptis` WRITE;
/*!40000 ALTER TABLE `baptis` DISABLE KEYS */;
INSERT INTO `baptis` VALUES ('9f70705b-dcb4-416d-9d3c-8a5d8391193c','9f70514c-de46-4f35-9aa1-7cd6d620cd2c',NULL,NULL,NULL,NULL,NULL,'Yohanes','2025-07-20','2025-07-20 16:05:02','2025-08-23 05:49:58',NULL),('9f70a4ca-028c-40ad-9ba2-a8658b2683dc','9f7050b5-199b-4b19-9d93-d1851c04c7bd',NULL,NULL,NULL,NULL,NULL,'Yohanes','2025-07-20','2025-07-20 18:31:38','2025-07-20 18:31:38',NULL),('9f70a5a8-ff9f-43e4-9e83-37898914f594','9f70514c-de46-4f35-9aa1-7cd6d620cd2c',NULL,NULL,NULL,NULL,NULL,'Fransiskus','2025-07-20','2025-07-20 18:34:04','2025-07-26 21:08:53','2025-07-26 21:08:53'),('9fb3f535-c101-445d-a32e-85e3f3dc1126','9f7051f7-4afb-4bfc-8d72-56b34a6accbd',NULL,NULL,NULL,NULL,NULL,'Yohanes','2025-07-20','2025-08-23 05:36:59','2025-08-23 05:36:59',NULL),('a0226da8-4fb8-4124-a3f1-e722b3aee2b5',NULL,NULL,NULL,NULL,NULL,NULL,'-','2000-11-12','2025-10-17 10:34:50','2025-10-17 10:49:14','2025-10-17 10:49:14'),('a022730e-d095-4903-a67b-0c789a00e832','a022730e-ce8f-464d-bf95-eb858a1cf097',NULL,NULL,NULL,NULL,NULL,'-','2000-10-12','2025-10-17 10:49:56','2025-10-17 10:50:12',NULL),('a022762c-fd0a-4ece-84a7-886a62ff6625','9f70595b-2662-45c3-bf32-7ca5263ee428',NULL,NULL,NULL,NULL,NULL,'-','1999-10-10','2025-10-17 10:58:39','2025-10-17 10:58:39',NULL),('a022771a-6eb4-4717-bdfc-5768d15214d2','9fe45e44-1b77-42e7-b451-af78c564b1d1',NULL,NULL,NULL,NULL,NULL,'-','1998-12-10','2025-10-17 11:01:15','2025-10-17 11:04:18',NULL);
/*!40000 ALTER TABLE `baptis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('admin@gmail.com','$2y$12$MeK4N4WOOidu2YuOJ8Hkpule25gyL9gxCW1r5Q/qyR2PT/g.LYqT2','2026-03-27 05:27:38'),('daniellelonu@gmail.com','$2y$12$ofT7OyplntpmC2wNtuIY7erew..JGySDDjYN1pV/pHY4ctmXCfz1K','2026-03-27 05:33:12');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (3,'Bedah Buku -Cerita Etnik Jogja-','','2024-07-02','Zoom','thumbnails/653f174c77304.png'),(5,'Perayaan Valentines Day di Perpustakaan UKDW','','2020-02-17','Perpustakaan UKDW','thumbnails/653f1a1548a99.png'),(6,'Seminar Nasional dan Forkom PPTKI','<p>Perpustakaan UKDW akan mengadakan Seminar Nasional dengan tema \" Profesionalisme, Lifestyle, Personal Branding dan Tantangan Society 5.0\" yang akan dilaksanakan pada tanggal 12 September 2019 di Universitas Kristen Duta Wacana Yogyakarta.</p><p>Tujuan dari diadakannya seminar nasional ini adalah:</p><ol><li>Mensupport pustakawan dan perpustakaan agar memiliki profesionalisme, lifestyle yg mendukung kinerjanya utk siap menghadapi tantangan di era 5.0</li><li>Agar pustakawan dapat melakukan self improvement secara pribadi untuk peningkatan profesionalisme kerjanya.</li><li>Agar pustakawan mendapat masukan, ide, pencerahan dalam menghadapi generasi Z dalam era disrupsi melalui inovasi dan pengembangan layanan perpustakaan.</li><li>Agar pemanfaatan perpustakaan lebih optimal dan maksimal di era 5.0</li></ol><p>Sebagai narasumber yaitu:</p><ol><li>Drs. Ida Fajar P, MA., Ph.D (Profesianlisme Pustakawan)</li><li>Centaury Harjani, S.Ds., M.Sn (Lifestyle, trend fashion for librarian &amp; library)</li><li>Dr. Rahma Sugihartati, M.Si ( Perubahan perpustakaan di era discruption, kaitannya dengan generasi milenial &amp; personal branding pustakawan)</li><li>Chefira Lisanias, S.Psi ( Self Improvement)</li></ol><p>Bersamaan dengan seminar nasional, juga akan diadakan workshop dan forkom PPTKI pada tanggal 12 dan 13 September 2019 di tempat yang sama.</p><p>Untuk melihat dan download brosur, silahkan klik <a href=\"http://bit.ly/semnas_perpusukdw2019\">http://bit.ly/semnas_perpusukdw2019</a></p><p>Untuk pendaftaran, silahkan klik di <a href=\"http://localhost/web-perpustakaan-universitas/agenda/detail-agenda-4.php#%22\">sini</a></p>','2019-08-20','Universitas Kristen Duta Wacana','thumbnails/653f1a4aaaf53.png'),(7,'Lomba Esai Jogja Istimewa','','2018-09-12','Universitas Kristen Duta Wacana','thumbnails/653f1a74aeccb.png'),(8,'Pelatihan Membuat Kreasi dari Akrilik','','2018-09-12','Lantai 1-Perpustakaan','thumbnails/653f1a9d3ecee.png'),(9,'Lomba Foto dan Menulis Cerpen bertemakan Imlek dan Valentine','','2017-08-15','Perpustakaan UKDW','thumbnails/653f1abc61183.png'),(10,'Seminar Nasional Karya Ilmiah Plagiarism dan HAKI','<p>Pada tanggal 11 Oktober 2017 nanti, Perpustakaan bekerjasama dengan Lembaga Penelitian dan Pengabdian pada Masyarakat di UKDW didukung oleh Perusahaan Penerbit dan Percetakan Kanisius, akan mengadakan Seminar Nasional bertema \"Stop Plagiarism\". Seminar ini ditujukan bagi para dosen untuk menambah wawasan tentang seluk beluk plagiarism dan HAKI. Bagaimana pencegahannya, dampaknya, dll</p>','2019-08-20','Zoom','thumbnails/653f1ae1cad12.png'),(11,'HUT Kemerdakaan RI ke-72','<p>Dalam rangka memperingati HUT Kemerdekaan RI ke-72, yang jatuh pada tanggal 17 Agustus, Perpustakaan UKDW akan mengadakan beberapa kegiatan, yaitu:</p><ol><li>Pameran Buku bertema perjuangan</li><li>Pemutaran Film tentang perjuangan</li><li>Lomba foto selfie di Perpustakaan UKDW</li></ol>','2019-08-20','Perpustakaan UKDW','thumbnails/653f1b00da0e0.png'),(12,'berita baru','<p>safdareasdfas zoom</p><p><strong>asdfasdasfdasraw</strong></p>','2025-09-02','zoom','thumbnails/gkj.png'),(13,'Kegiatan baru','<p><strong>kegiatan baru</strong></p><p><strong>coba baru</strong></p>','2026-04-13','Aula','thumbnails/communications.png');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_buku`
--

DROP TABLE IF EXISTS `detail_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) NOT NULL,
  `nomor_panggil` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','Sedang Diperbaiki') NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_buku`
--

LOCK TABLES `detail_buku` WRITE;
/*!40000 ALTER TABLE `detail_buku` DISABLE KEYS */;
INSERT INTO `detail_buku` VALUES (2,'9713276','U 720 V55','Rak Umum S1','Tersedia','25'),(3,'9800040','U 720 V55','Rak Umum S1','Tidak Tersedia','25'),(4,'2700413','U 720 V55','Rak Umum S1','Tersedia','25'),(5,'F130225','U 174.2 WIL b','Rak Pusat Studi Theologi Feminis.1-Pojok utara','Tersedia','26'),(6,'9703010','U 174.2 B52','Rak Umum S1','Tersedia','27'),(7,'9800227','U 174 Sh19','Rak Umum S1','Tersedia','28'),(8,'2112116','U 610 J15','Rak Umum S1','Tersedia','29'),(9,'2112112','U 610 J15','Rak Umum S1','Tersedia','29'),(10,'2112108','U 610 J15','Rak Umum S1','Tersedia','29'),(11,'9702997','U 174.2 B641','Rak Umum S1','Tersedia','30'),(12,'9702998','U 174.2 B641','Rak Umum S1','Tersedia','30'),(13,'9702999','U 174.2 B641','Rak Umum S1','Tersedia','30'),(14,'2200381','U 721 C441','Rusak / Sedang Diperbaik','Tidak Tersedia','31'),(15,'2316527','R 720.3 ANA e','Rak Referensi S1','Tersedia','32'),(16,'2316526','R 720.3 ANA e','Rak Referensi S1','Tersedia','32'),(17,'2116217','728.3 AGU a','Rak Umum S1','Tersedia','33'),(18,'2016057','722.4 GEO','Rak Umum S1','Tersedia','34'),(19,'1915508','720.9 WIR k','L.1-Pojok utara','Tersedia','35'),(20,'1915511','720.4 KAR a','L.1-Pojok utara','Tersedia','36'),(21,'1915510','720.4 KAR a','L.1-Pojok utara','Tersedia','36'),(22,'1915512','720.4 KAR a','L.1-Pojok utara','Tersedia','36'),(23,'1915389','720.4 ARD s','L.1-Pojok utara','Tersedia','37'),(24,'1915388','720.4 ARD s','L.1-Pojok utara','Tersedia','37'),(25,'1915390','720.4 ARD s','L.1-Pojok utara','Tersedia','37'),(26,'1915397','720 DAR k','L.1-Pojok utara','Tersedia','38'),(27,'1915396','720 DAR k','L.1-Pojok utara','Tersedia','38'),(28,'1915395','720 DAR k','L.1-Pojok utara','Tersedia','38'),(29,'1915394','720 DAR k','L.1-Pojok utara','Tersedia','38'),(30,'1915393','720 DAR k','L.1-Pojok utara','Tersedia','38'),(31,'1915398','624 DIS p','L.1-Pojok utara','Tersedia','39'),(32,'1915398','624 DIS p','L.1-Pojok utara','Tersedia','40'),(33,'-','-','-','Tidak Tersedia','41'),(34,'-','-','-','Tidak Tersedia','42'),(35,'9713276','U 720 V55','Rak Umum S1','Tersedia','43'),(36,'9800040','U 720 V55','Rak Umum S1','Tersedia','43'),(37,'2400224','U 720 V55','Rak Umum S1','Tersedia','43'),(38,'2700413','U 720 V55','Rak Umum S1','Tersedia','43'),(39,'9721822','U 720 D26','Rak Umum S1','Tersedia','44'),(40,'9721832','U 720 D26','Rak Umum S1','Tersedia','44'),(41,'1714179','R 915.98 Se57 V.9','Rak Referensi S1','Tersedia','45'),(42,'2600391','U 729 K968','Rak Umum S1','Tersedia','46'),(43,'1713940','R 720.9598 Ek7','Rak Referensi S1','Tersedia','47'),(44,'1714129','Res 720.95 R279','Rak Reserve S1','Tersedia','48'),(45,'9721810','U 720 M314','Rak Umum S1','Tersedia','49'),(46,'9721866','U 720 M314','Rak Umum S1','Tersedia','49'),(47,'9722204','U 720 M314','Rak Umum S1','Tersedia','49'),(48,'9721743','U 720 M314','Rak Umum S1','Tersedia','49'),(49,'1714129','Res 720.95 R279','Rak Reserve S1','Tersedia','50'),(50,'2112906','U 006.68 T413','Rak Umum S1','Tersedia','51'),(51,'2112947','U 006.68 W129','Rak Umum S1','Tersedia','52'),(52,'2700813','U 006.67 C361','Rak Umum S1','Tersedia','53'),(53,'2300467','U 006.68 D451','Rak Umum S1','Tersedia','54'),(54,'2401266','U 006.68 M511','Rak Umum S1','Tersedia','55'),(55,'2400296','U 006.68 R666','Rak Umum S1','Tersedia','56'),(56,'9714967','U 336.3 So22','Rak Umum S1','Tersedia','57'),(57,'9715169','U 336.3 So22','Rak Umum S1','Tersedia','57'),(58,'9717123','U 336.3 So22','Rak Umum S1','Tersedia','57'),(59,'9718009','U 336.3 So22','Rak Umum S1','Tersedia','57'),(60,'2400747','U 352 Sa71','Rak Umum S1','Tersedia','58'),(61,'9714677','U 336.3 P891','Rak Umum S1','Tersedia','59'),(62,'9714678','U 336.3 P891','Rak Umum S1','Tersedia','59'),(63,'9714679','U 336.3 P891','Rak Umum S1','Tersedia','59'),(64,'2001957','U 336.24 P884','Rak Umum S1','Tersedia','60'),(65,'9742741','U 001.4206 Su76','Rak Umum S1','Tersedia','61'),(66,'9800614','U 658.802 T546','Rak Umum S1','Tersedia','62'),(67,'9901480','U 658.8 K848','Rak Umum S1','Tersedia','63'),(68,'9901470','U 658.8 K848','Rak Umum S1','Tersedia','63'),(69,'9901158','U 658.8 K848','Rak Umum S1','Tersedia','63'),(70,'9901460','U 658.8 K848','Rak Umum S1','Tersedia','63'),(71,'9901461','U 658.8 K848','Rak Umum S1','Tersedia','63'),(72,'9901157','U 658.8 K848','Rak Umum S1','Tersedia','63'),(73,'9901477','U 658.8 K848','Rak Umum S1','Tersedia','63'),(74,'9802030','U 658.8 K848','Rak Umum S1','Tersedia','63'),(75,'2400526','U 658.8342 Su61','Rak Umum S1','Tersedia','64'),(76,'2116129','658.8 PAR p','Rak Umum S1','Tersedia','65'),(77,'2501269','U 658.83 M294','Rak Umum S1','Tersedia','66'),(78,'2501265','U 658.83 M294','Rak Umum S1','Tersedia','66'),(79,'2800285','U 658.83 M294','Rak Umum S1','Tersedia','66'),(80,'2800256','U 658.83 M294','Rak Umum S1','Tersedia','66'),(81,'1915188','658.804 KAR c','L.1-Pojok utara','Tersedia','67'),(82,'1915187','658.804 KAR c','L.1-Pojok utara','Tersedia','67'),(83,'1915186','658.804 KAR c','L.1-Pojok utara','Tersedia','67'),(84,'9721611','U 658.802 K848','Rak Umum S1','Tersedia','68'),(85,'9723328','U 658.802 K848','Rak Umum S1','Tersedia','68'),(86,'9723435','U 658.802 K848','Rak Umum S1','Tersedia','68'),(87,'9800646','U 658.802 K848','Rak Umum S1','Tersedia','68'),(88,'9720050','U 659.2 M341','Rak Umum S1','Tersedia','69'),(89,'9721444','U 659.2 M341','Rak Umum S1','Tersedia','69'),(90,'9721633','U 659.2 M341','Rak Umum S1','Tersedia','69'),(91,'9721634','U 659.2 M341','Rak Umum S1','Tersedia','69'),(92,'9901737','U 650 B225','Rak Umum S1','Tersedia','70'),(93,'9802415','U 650 B225','Rak Umum S1','Tersedia','70'),(94,'9719755','U 658.802 Sw26','Rak Umum S1','Tersedia','71'),(95,'9719732','U 658.802 Sw26','Rak Umum S1','Tersedia','71'),(96,'9721374','U 658.802 Sw26','Rak Umum S1','Tersedia','71'),(97,'9704669','U 658.802 Sw26','Rak Umum S1','Tersedia','71'),(98,'9723342','U 658.802 Sw26','Rak Umum S1','Tersedia','71'),(99,'2700481','U 658.8343 Sw26','Rak Umum S1','Tersedia','72'),(100,'2700445','U 658.8 K848','Rak Umum S1','Tersedia','73'),(101,'2201295','U 658.8 K848','Rak Umum S1','Tersedia','73'),(102,'2201182','U 658.8 L973','Rak Umum S1','Tersedia','74'),(103,'2201174','U 658.8 L973','Rak Umum S1','Tersedia','74'),(104,'2201178','U 658.8 L973','Rak Umum S1','Tersedia','74'),(105,'2201166','U 658.8 K848','Rak Umum S1','Tersedia','75'),(106,'2201170','U 658.8 K848 V.2','Rak Umum S1','Tersedia','75'),(107,'2801163','U 658.8 T546','Rak Umum S1','Tersedia','76'),(108,'1814220','U 658.8 K848 V.2','Rak Umum S1','Tersedia','77'),(109,'1814221','U 658.802 T546','Rak Umum S1','Tersedia','78'),(110,'1814224','U 658.8 Sw26','Rak Umum S1','Tersedia','79'),(111,'9720766','U 658.8 P932','Rak Umum S1','Tersedia','80'),(112,'9721312','U 658.8 P932','Rak Umum S1','Tersedia','80'),(113,'9717918','U 658.8 P932','Rak Umum S1','Tersedia','80'),(114,'1600250','U 658.8 M311 V.1','Rak Umum S1','Tersedia','81');
/*!40000 ALTER TABLE `detail_buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wilayahs`
--

DROP TABLE IF EXISTS `wilayahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wilayahs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wilayahs_nama_unique` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayahs`
--

LOCK TABLES `wilayahs` WRITE;
/*!40000 ALTER TABLE `wilayahs` DISABLE KEYS */;
/*!40000 ALTER TABLE `wilayahs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `renungan`
--

DROP TABLE IF EXISTS `renungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renungan`
--

LOCK TABLES `renungan` WRITE;
/*!40000 ALTER TABLE `renungan` DISABLE KEYS */;
INSERT INTO `renungan` VALUES (1,'Perpustakaan Mengisi di kegiatan OKA Mahasiswa Baru Angkatan 2023/2024','<p>Pada hari Senin, 22 Agustus 2023 dan Selasa, 23 Agustus 2023, Perpustakaan diwakili oleh beberapa stafnya telah mengisi kegiatan OKA bagi mahasiswa baru angkatan 2023/2024. Kegiatan ini dilakukan untuk mengenalkan dan memberikan informasi pada mahasiswa baru tentang perpustakaan UKDW. Antara lain : lokasi perpustakaan, fasilitas, koleksi, cara pinjam koleksi, denda, dll.</p><p>Dalam kegiatan ini juga ada sesi tanya jawab. Mahasiswa baru yang masih belum paham dan ingin bertanya lebih detil diberikan kesempatan untuk bertanya dan akan dijawab oleh staf perpustakaan.</p>','2023-08-24','thumbnails/653f01466a9c7.png'),(4,'Kunjungan Prodi Teologi Universitas Kristen Indonesia Tomohon','<p>Pada hari Senin, 13 Maret 2023, Perpustakaan Unniversitas Kristen Duta Wacana menerima kunjungan dari mahasiswa prodi Teologi Universitas Kristen Indonesia Tomohon (UKIT). Kunjungan ini dalam rangka ingin mengetahui fasilitas yang ada di perpustakaan UKDW. Mahasiswa UKIT juga berkesempatan library tour yang dipandu oleh Bapak Timbo, selaku staf perpustakaan UKDW.</p>','2023-03-17','thumbnails/653f022b4dd2d.png'),(5,'Kegiatan Literasi Dosen dan Mahasiswa Fakultas Desain Produk','<p>Dalam rangka menambah ilmu dan pengetahuan bagi para dosen dan mahasiswa tentang metode penulisan karya ilmiah, serta mencari sumber referensi yang tepat sesuai kebutuhan, maka perpustakaan melalui salah satu stafnya melakukan pelatihan literasi kepada mahasiswa dan dosen Fakultas Arsitek dan Desain Produk.</p><p>Pelatihan dilakukan di lab komputer UKDW tanggal 21 Februari 2023 dalam mata kuliah “Metode Penelitian Dosen”. Sebagai pengajar yaitu Bpk. Haleluya Timbo, staf perpustakaan bagian referensi dan rujukan.</p><p>Dengan adanya pelatihan ini diharapkan dosen dan mahasiswa semakin paham di dalam mencari dan memanfaatkan sumber-sumber referensi yang menunjang penelitian serta semakin menguasai metode dalam melakukan penulisan ilmiah.</p>','2023-02-22','thumbnails/653f0245e24d6.png'),(6,'Smart Library Sebagai Sumber Referensi dalam Genggaman','<p>Smart Library adalah aplikasi perpustakaan digital yang dapat diakses oleh sivitas akademika UKDW untuk meminjam dan membaca buku, majalah, serta koran digital melalui mobile device berbasis ios atau android.</p><p>Syarat dan ketentuan serta panduan penggunaan aplikasi Smart Library dapat dibaca di sini : Smart Library.</p>','2023-02-01','thumbnails/653f026d2c65c.png'),(7,'Kunjungan dari Universitas Maranatha ke Perpustakaan UKDW','<p>Pada hari Jumat, tanggal 20 Januari 2023, perpustakaan Universitas Kristen Duta Wacana mendapat kunjungan dari Universitas Maranatha, Bandung yang dalam hal ini diwakili oleh Bapak Heryanto selaku Kepala Perpustakaan Universitas Maranatha.</p><p>Dalam kunjungannya ini beliau banyak bertanya tentang pengelolaan repositori di perpustakaan UKDW serta integrasinya dengan RAMA Dikti.</p><p>Semoga dengan kunjungan ini dapat lebih saling meningkatkan relasi yang baik antara Universitas Kristen Duta Wacana dan Universitas Maranatha.</p>','2023-01-25','thumbnails/653f0289ed631.png'),(8,'Raker Perpustakaan 2022','<p>Pada hari jumat, tanggal 10 Juni 2022 telah diselenggarakan rapat kerja tahunan Perpustakaan UKDW bertempat di JECE Bantul Yogyakarta yang diikuti oleh semua staf perpustakaan.</p><p>Rapat kerja pada kali ini membahas evaluasi program kerja 2021 dan juga rencana program kerja tahun 2022. Sebagai pemimpin rapat kerja adalah kepala perpustakaan yaitu Dr. Andreas Ari Sukoco, M.M,. M.Min. Beliau membuka rapat kerja dengan memaparkan hal-hal yang diharapkan bisa dicapai oleh perpustakaan di tahun yang akan datang, antara lain tentang e-library. Untuk dapat mencapai e-libary tentu wajib didukung dengan aspek-aspek antara lain kerjasama tim, teknologi informasi yang memadai, semangat untuk maju dan berkembang, juga keinginan untuk melayani para pengguna perpustakaan dengan baik.</p><p>Kemudian satu persatu bagian/divisi memaparkan evaluasi kerja, program kerja tahun 2022 beserta anggarannya. Dalam kurun waktu yang sama juga langsung diadakan tanya jawab terkait hal yang dipaparkan oleh tiap bagian.</p><p>Setelah setiap bagian/divisi memberi presentasi, kemudian Ibu Widya selaku konsultan perpustakaan UKDW memberikan kesimpulan dan saran bagi para staf terkait hal-hal yang bisa dilakukan untuk mengembangkan perpustakaan. Pertanyaan dari beliau adalah : mau atau tidak kita semua untuk menuju ke perpustakaan yang lebih baik lagi.</p><p>Acara ditutup dengan doa dan foto bersama seluruh staf perpustakaan.</p>','2022-06-13','thumbnails/653f02ab5173a.png'),(9,'test','<p>test</p>','2025-09-02','test'),(10,'test','<p>test</p>','2025-09-02','test'),(11,'test','<p>testsafdasreafdsfdasdfa</p><h2>asfdasdfaera</h2>','2025-09-01','test'),(12,'test','<p>testsafdasreafdsfdasdfa</p><h2>asfdasdfaera</h2>','2025-09-01','test'),(13,'test','<p>testsafdasreafdsfdasdfa</p><h2>asfdasdfaera</h2>','2025-09-01','test'),(14,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(15,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(16,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(17,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(18,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(19,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(20,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(21,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(22,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(23,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(24,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(25,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(26,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(27,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(28,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(29,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(30,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(31,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(32,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(33,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(34,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(35,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(36,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(37,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(38,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(39,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(40,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(41,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(42,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(43,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(44,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(45,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(46,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(47,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(48,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(49,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(50,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(51,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(52,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(53,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(54,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(55,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(56,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(57,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(58,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(59,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(60,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(61,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(62,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(63,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(64,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(65,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(66,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(67,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(68,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(69,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(70,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(71,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(72,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(73,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(74,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(75,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(76,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(77,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(78,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(79,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(80,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(81,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(82,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(83,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(84,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(85,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(86,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(87,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(88,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(89,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(90,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(91,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(92,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(93,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(94,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(95,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(96,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(97,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(98,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(99,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(100,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(101,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(102,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(103,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(104,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(105,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(106,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(107,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(108,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(109,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(110,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(111,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(112,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(113,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(114,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(115,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(116,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(117,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(118,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(119,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(120,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(121,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(122,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(123,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(124,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(125,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(126,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(127,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(128,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(129,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(130,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(131,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(132,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(133,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(134,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(135,'test','<p>sadfareadfas<strong>asdfasdfasdf</strong></p>','2025-09-05','thumbnails/4.PNG'),(141,'tes','<p>sfdaasreafda</p><p>&nbsp;</p><p>asfdaradfasdfas</p><p><strong>asdfadarawre</strong></p>','2025-09-05','thumbnails/3.PNG'),(142,'tes','<p>sfdaasreafda</p><p>&nbsp;</p><p>asfdaradfasdfas</p><p><strong>asdfadarawre</strong></p>','2025-09-05','thumbnails/3.PNG'),(143,'tesa','<p>sadfaseawr</p>','2025-09-05','thumbnails/4.PNG'),(144,'tesa','<p>sadfaseawr</p>','2025-09-05','thumbnails/4.PNG'),(145,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(146,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(147,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(148,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(149,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(150,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(151,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(152,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(153,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(154,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(155,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(156,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(157,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(158,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(159,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(160,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(161,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(162,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(163,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(164,'sadfasdr','<p>asdfaserasdf<strong>asdfasdf</strong></p>','2025-09-05','thumbnails/3.PNG'),(165,'testasdfasraw','<p>sadfaeraasd</p><p><strong>asdfasraewafsfda</strong></p>','2025-09-05','thumbnails/3.PNG'),(166,'testasdfasraw','<p>sadfaeraasd</p><p><strong>asdfasraewafsfda</strong></p>','2025-09-05','thumbnails/3.PNG'),(167,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(168,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(169,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(170,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(171,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(172,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(173,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(174,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(175,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(176,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(177,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(178,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(179,'sadfare','<p>asdfasfdasr</p>','2025-09-05','thumbnails/3.PNG'),(180,'hehe','<p>sadfareasfda</p><p>asdfaerafda</p>','2025-08-31','thumbnails/3.PNG'),(181,'test','<p>fasdfareadf</p>','2025-09-01','thumbnails/3.PNG'),(182,'1234','<p>asdfasdfawerasdfa</p><p><strong>asdfasrewaasdfasdfaqwreasdf</strong></p><p><i><strong>asdfreasdfasfa 123</strong></i></p>','2025-09-01','thumbnails/3.PNG'),(183,'123','<p>sadfasdfas</p><p><strong>test</strong></p>','2025-09-09','thumbnails/contoh-ktp.jpg'),(184,'renungan baru','<p>renungan baru</p>','2026-04-13','thumbnails/Bunga.jpg');
/*!40000 ALTER TABLE `renungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES ('a16622f4-4114-496a-9920-e5c1e9f7ca42','Ibadah Minggu Ke-4','<p>Ibadah Minggu Ke-4</p>','gallery/1774600451_Image20260302080550.png','2026-03-27 08:34:11','2026-03-27 08:34:11',NULL),('a16ec01d-849d-4133-9f00-d7e2219940a3','tes 1','-','gallery/1774972275_ajxphf.jpg','2026-03-31 15:20:16','2026-03-31 15:51:15',NULL),('a1882656-9747-4443-8db0-70ce0a884b82','1','-','gallery/1776061305_Bagan Biro 4.jpg','2026-04-13 06:21:49','2026-04-13 06:21:49',NULL),('a188271c-c5c7-476d-a86c-f4650f24620b','2','-','gallery/1776061438_Chart.png','2026-04-13 06:23:58','2026-04-13 06:23:58',NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','adminperpus@gmail.com',NULL,'$2y$12$M78yym8ojYOYysem9D8gxuASl4P7vwLidtvc7R9ATmijqTTYcR5Di',NULL,'2025-07-20 06:01:36','2025-10-17 11:33:05'),(2,'Admin','lelurezt@gmail.com',NULL,'$2y$12$xGKtGnGUIAGV84WXlji1HO3dNzydejHPsdGjhuW96Jcsht4zxxAh.','i2unV3EWeFTYYcWjGBButY8chYFw918eYSO5wCLboFuVQ6qLdKPcnmXLfirA','2026-01-31 12:32:57','2026-03-30 04:17:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES ('a166185f-a735-48e1-b67d-fd5053469553','Horas Simanjuntak','Pendeta','staff-photos/XvD2d7U2rWlHs0qdziRRthE17JpUGenB239xEWYl.png','2026-03-27 08:04:37','2026-03-27 08:13:16','2026-03-27 08:13:16'),('a166283a-e2de-42b6-a3e7-c831b47f0de6','Horas Simanjuntak','Pendeta','staff-photos/vEpHbLa4LBcvA2rN4PUXgGvl99qatPgZnseikuOm.png','2026-03-27 08:48:56','2026-03-27 08:48:56',NULL);
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `ringkasan` text NOT NULL,
  `edisi` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `deskripsi_fisik` varchar(255) NOT NULL,
  `abstrak` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (26,'Bioetika: Sebuah Pengantar: Aborsi, Masturbasi, Bayi Tabung, Hukuman Mati, Pemanasan Global','William Chang dan OFMCap','-','-','Kanisius','978-979-2122893','177 p.; 20 cm','Buku berjudul Bioetika Sebuah Pengantar : Aborsi, Masturbasi, Bayi Tabung, Hukuman Mati, dimulai William Chang dengan pengantar yang menceritakan kerisauan seorang ibu yang bingung terhadap kandungan yang ada dalam rahimnya. Tidak jelas apakah isi kandungan itu di dalam atau di luar perkawinan. Namun ibu itu dihadapkan pada dilemma antara mempertahankan kandungan sesuai dengan bisikan nurani atau menggugurkannya. Akhirnya, ibu itupun membuat keputusan mempertahankan kandungannya yang berarti mempertahankan keselamatan diri dan anaknya. Dilema etis seperti kisah itu tadi sering dihadapi para praktisi medis dan rohaniwan dalam menghadapi kliennya. Di era permisif dan pragmatisme belakangan ini dimana banyak orang mencari mudah dan amannya sendiri nilai-nilai moral cenderung terabaikan. Pertimbangan moral etis atau juga sering disebut etika kehidupan (bioetika) lebih sering diabaikan. Padahal, pertimbangan-pertimbangan moral semacam inilah yang diperlukan agar keputusan yang diambil tidak salah langkah dan akhirnya tersesat.','65b8e54f8f6e3.jpg','2009','Yogyakarta',''),(27,'Bioetika: Refleksi Atas Masalah Etika Biomedis','G. Maertens','-','-','Gramedia Pustaka Utama','979-403-906-X','xvi, 97 p.; 21 cm','Bioetika adalah studi tentang masalah-masalah yang ditimbulkan oleh perkembangan di bidang biologi dan ilmu kedokteran, dalam sekala mikro maupun makro, serta dampaknya pada masyarakat dan sistem nilainya kini dan dimasa mendatang.','65b8e62f5ad7a.jpg','1990',' Jakarta',''),(28,'Pengantar Bioetika','Thomas A. Shannon','-','-','Gramedia Pustaka Utama','979-605-175-3',' ix, 162 p.; 21 cm.','Untuk masa kini, bioetika menjadi sangat mendesak karena di satu pihak permasalahan yang ditimbulkan kemajuan ilmu dan teknologi semakin luas dan pelik. Tapi di pihak lain ia mendesak karena masalah-masalah itu perlu diantisipasi sedini mungkin sejak sekarang, agar kita tidak sekedar bereaksi setelah masalah itu timbul, tetapi juga mencegahnya sebisa mungkin sejak sekarang.Maka buku ini, yang membahas masalah-masalah yang berhubungan dengan etika biomedis, mempunyai relevansi dan sumbangan yang sangat berarti bagi para ilmuwan, doktor dan tenaga medis, teolog, agamawan, mahasiswa, dan masyarakat pada umumnya.','65b8e71976392.jpg','1995','Jakarta',''),(29,'Tentang Perkembangan Ilmu Kedokteran, Etika Medis dan Bioetika','Samsi Jacobalis','-','-','Sagung Seto','979-3288-14-0','Xii, 295 p ; 21 cm','Buku Komposisi Arsitektur: Apresiasi dan Analisis Kasus di Indonesia ini merupakan himpunan penelitian dan pengalaman yang ditulis oleh seorang pelaku rancang bangun yang telah bekerja sebagai arsitek dan peneliti selama lebih dari 30 tahun. Pada bagian pertama: komposisi, Penulis menyajikan proses penyusunan sebuah komposisi arsitektur dari berbagai komponen-komponennya, di antaranya bagaimana lokasi menjadi suatu bagian integral dari sebuah komposisi, bagaimana gagasan dan tujuan sebuah komposisi membentuk wujud komposisi tersebut, bagaimana seorang arsitek menyatukan bentuk dan struktur/konstruksi ke dalam sebuah komposisi, dan seterusnya Pada bagian kedua: Komposisi Sebagai Karya Seni, penulis menjelaskan keberadaan komposisi arsitektur sebagai karya seni dan contoh-contoh kasus yang dapat ditemui di Indonesia.','65b8e990bad37.jpg','2005','Jakarta',''),(30,'Bioteknologi Dan Bioetika : Dari Bioteknbologi Menuju Bioetika','Edouard Bone','-','-','Kanisius','979-511-205-8','102 hal.: -.; 20 cm','Dalam diskusi-diskusi tentang moral dan etika, kita harus membedakan sesuatu hal yang didiskusikan itu termasuk dalam bidang etika, sopan-santun atau disiplin. Moral (filsafat moral) atau etika adalah ilmu (bukan agama), dan dengan demikian menggunakan penalaran ilmiah, untuk menetukan apakah suatu perilaku individu atau kelompok individu baik atau jahat (right or wrong). Biarpun tidak ada batas yang jelas, ada baiknya bila dibedakan antara etika (ethics), etika kedokteran (medical ethics), bioetika (bioethics) dan etika biomedik (biomedical ethics). Bioteknologi (Biotechnology) adalah teknologi yang melakukan intervensi dalam proses kehidupan. ','65b8fae639c22.jpg','1988','Yogyakarta',''),(31,'Arsitektur : Bentuk, Ruang dan Tatanan','Francis D.K. Ching','-','-','Saint Joseph\'s University','978-979-033-938-5','404 p.; 28 cm','Buku ini menyelidiki konsep dasar dalam arsitektur, fokus pada bentuk, ruang, dan tatanan sebagai elemen-elemen kunci. Menjelajahi sejarah arsitektur dari berbagai gaya, buku ini membahas bagaimana bentuk arsitektur mencerminkan nilai budaya dan estetika. Selain itu, pembahasannya melibatkan analisis ruang sebagai elemen penting dalam menciptakan lingkungan yang memengaruhi interaksi sosial dan fungsionalitas. Buku ini juga membahas tatanan sebagai prinsip pengorganisasian elemen arsitektural dalam suatu pola yang koheren. Dengan memberikan wawasan holistik, buku ini mengajak pembaca untuk memahami kompleksitas arsitektur sebagai seni dan ilmu yang memengaruhi cara kita hidup dan berinteraksi dalam ruang sehari-hari.','65b8fe8d5b26e.jpg','2000','Jakarta',''),(32,'Ensiklopedia Arsitektur Nusantara','Anak Agung Gde Djaja Bharuna, Nuryanto, M.T. dan kawan-kawan','-','-','Penerbit K-Media','978-623-316-239-5','xiii, 619 halaman : ilustrasi ; 23 cm','\"Ensiklopedia Arsitektur Nusantara\" merupkan karya monumental yang mengeksplorasi kekayaan arsitektur di wilayah Nusantara. Buku ini mengulas sejarah dan evolusi arsitektur dari masa prasejarah hingga modern, menyoroti ciri khas, teknik konstruksi, dan pengaruh budaya. Fokus pada keberlanjutan, buku ini membahas integrasi arsitektur dengan lingkungan alam serta memperkenalkan tokoh-tokoh arsitektur penting dan berbagai jenis bangunan, memberikan pandangan komprehensif tentang warisan arsitektural Nusantara. Dengan dukungan visual yang kaya, buku ini menjadi panduan mendalam dan menginspirasi bagi pembaca yang ingin memahami dan mengapresiasi keanekaragaman arsitektur di kawasan ini.','65b8ff6696b61.jpg','2022','Bantul, Yogyakarta',''),(33,'Arsitektur Tropis Nusantara : Rumah Tropis Nusantara Kontemporer','Agung Murti Nugroho','-','-','Universitas Brawijaya Press (UB Press)',' 978-602-432-565-7',' xvi, 174 halaman : ilustrasi ; 23 cm','Arsitektur Tropis Nusantara merupakan salah satu pemaknaan kembali Arsitektur Nusantara berdasarkan Sains Arsitektur. Fokus pembahasan buku inilebih spesifik pada objek rumah masa kini atau kontemporer. Buku ini membahas berbagai permasalahan, solusi, strategi, riset dan aplikasi terkait krisis keyakinan, lingkungan, perubahan iklim, energi dan identitas yang terbagi dalam beberapa bab tentang rumah tropis berkelanjutan, ramah lingkungan, tanggap iklim, sadar energi, dan cerdas budaya.','65b9ac6ab7f9b.jpg','2018','Malang',''),(34,'Geomansi : Arsitektur Tradisional Jawa','Amos Setiadi','-','Cetakan pertama','  Cahaya Atma Pustaka','978-623-6678-01-5','x, 194 halaman : ilustrasi ; 23 cm','Keanekaragaman budaya di Indonesia mencerminkan luasnya wilayah dan warisan budaya yang beragam. Meskipun pertanyaan tentang apakah hal ini positif atau negatif bisa timbul, namun nilai-nilai yang diwarisi dari nenek moyang tetap dihormati dan diterapkan dalam kehidupan sehari-hari. Mengabaikan warisan ini akan dianggap sebagai perilaku yang tidak sopan, sehingga banyak yang berusaha menjaga dan melestarikan tradisi sesuai dengan kebutuhan zaman sekarang.\r\nKebudayaan Jawa, sebagai contoh, tumbuh sebagai respons terhadap tantangan lingkungan yang dihadapi oleh etnis Jawa pada periode tertentu. Dari kebudayaan tersebut, lahir berbagai produk budaya, salah satunya adalah rumah tradisional Jawa. Rumah tradisional ini masih umum ditemui dalam kehidupan sehari-hari, bahkan ada individu yang dengan sengaja membangun rumah baru dengan meniru desain rumah tradisional Jawa.','65b9ace320464.jpg','2020','Yogyakarta',''),(35,'Komposisi Arsitektur: Apresiasi dan Analisis Kasus di Indonesia','Bagoes Wirtomartono','-','-','Erlangga','978-602-298-981-3','xi, 107 hlm.: bibl. ref., indeks; 25 cm','Buku Komposisi Arsitektur: Apresiasi dan Analisis Kasus di Indonesia ini merupakan himpunan penelitian dan pengalaman yang ditulis oleh seorang pelaku rancang bangun yang telah bekerja sebagai arsitek dan peneliti selama lebih dari 30 tahun. Pada bagian pertama: komposisi, Penulis menyajikan proses penyusunan sebuah komposisi arsitektur dari berbagai komponen-komponennya, di antaranya bagaimana lokasi menjadi suatu bagian integral dari sebuah komposisi, bagaimana gagasan dan tujuan sebuah komposisi membentuk wujud komposisi tersebut, bagaimana seorang arsitek menyatukan bentuk dan struktur/konstruksi ke dalam sebuah komposisi, dan seterusnya Pada bagian kedua: Komposisi Sebagai Karya Seni, penulis menjelaskan keberadaan komposisi arsitektur sebagai karya seni dan contoh-contoh kasus yang dapat ditemui di Indonesia.','65b9b156c80bf.jpg','2016','Yogyakarta',''),(36,'Arsitektur Tropis: Bentuk, Teknologi, Kenyamanan, & Penggunaan Energi','Tri Harso Karyono','-','-','Erlangga','978-602-298-789-5','xiv, 120 hlm.: bibl., indek; 25 cm','Buku Arsitektur Tropis ini mencoba menjelaskan kembali esensi arsitektur tropis lembab yang tampaknya semakin kurang dipahami oleh para arsitek amupun kalangan dunia pendidikan arsitektur. Melalui rancangan arsitektur tropis kita mencoba untuk menjawab permasalahan yang ditimbulkan oleh iklim tropis,agar bangunan yang kita rancang bukan saja menarik secara estetika,namun juga dapat mengatasi permasalahan iklim tropis setempat, terutama dengan memperhatikan posisi matahari sebagai sumber kalor yang diterima bangunan.','65b9b24895bcd.jpg','2016','Jakarta',''),(37,'Sustainable Architecture (Arsitektur Berkelanjutan)','Y. Mila Ardiani','-','-','Erlangga','978-602-298-594-5','x, 101 hlm.: bibl., indeks; 22 cm','Pembangunan yang semakin hari semakin marak dalam beberapa tahun terakhir ternyata membawa dampak buruk bagi lingkungan ditambahnya populasi manusia yang semakin pesat membutuhkan ketersedian energi dan sumber daya alam yang seimbang. Arsitektur Berkelanjutan menjadi salah satu solusi untuk menjawab permasalahan. Konsep ini memiliki pola dimana manusia dalam melakukan aktivitasnya mengusahakan untuk memakai seminimal mungkin dalam penggunaan sumber daya untuk meningkatkan kualitas hidup sekarang maupun generasi yang akan datang agar sumber daya di bumi ini dapat dinikmati dalam jangka waktu yang panjang, tentunya untuk hal ini perlu adanya respon dan kerjasama dari berbagai pihak agar konsep Pembangunan Berkelanjutan ini dapat berjalan dengan sesuai rencana.','65b9b3c5796b7.jpg','2015','Jakarta',''),(38,'Konsep Perancangan Arsitektur','Edy Darmawan dan Maria Rosita','-','-','Erlangga','978-602-298-624-4','118 hlm.: bibl., indeks; 21 cm','Dalam buku ini dibahas tahap-tahap perancangan arsitektur bangunan, mulai dari latar belakang dalam mendesain, kebutuhan ruang dan ukuran besaran ruang, pelaku kegiatan, proses kegiatan, hubungan kegiatan, dan pola kegiatan, hubungan ruang, organisasi ruang, zoning, dan sirkulasi, lokasi dan pemilihan tapak, ruang terbuka, resapan air, ruang hijau, dan refreshing area; analisa tapak, aspek kinerja, gambar kerja, dan gambar tiga dimensi, tatanan ruang, skala dan proporsi, harmonisasi, simetri, keseimbangan, ritme, dan kontras, serta arsitektur yang aksesibel bagi para difabel. Semua teori yang dikemukakan disertai dengan contoh dan penerapannya. Setiap penjelasan yang diberikan disertai dengan ilustrasi yang menarik yang sebagian di antaranya merupakan sketsa tangan dari para penulis.','65b9b6a01b3bd.jpg','2016','Jakarta',''),(39,'Pokok-pokok Teknologi Struktur Untuk Konstruksi dan Arsitektur','Burl E. Dishongh','-','-','Erlangga',' 979-741-005-6','x , 299 hlm.: indeks; 25 cm','Fokus dari teknologi struktur adalah penggunaan material bangunan secara efisien–terutama beton, baja, dan kayu untuk menahan semua beban pada struktur dengan aman. Memang, sebagian besar profesional yang terlibat dengan konstruksi bukan insinyur sipil, namun demikian pihak-pihak tersebut tetap perlu memahami dasar-dasar teknologi struktur yang merupakan perhatian utama dari insinyur sipil.Kelengkapan buku ringkas ini dapat dilihat dari isinya. Buku ini berisikan topik-topik statika, mekanika teknik, mekanika tanah, desain pondasi, jenis-jenis struktur, teknologi struktur kayu, teknologi struktur baja, dan teknologi struktur beton.Dalam buku ini, hal-hal yang cukup rumit antara beban struktur dan pengaruh¬pengaruhnya dalam desain bangunan disajikan dengan cara yang sederhana. Kepraktisan buku ini pun dapat dilihat dari kandungan matematikanya. Hitungannya begitu mudah dipahami pun oleh non-insinyur.Terakhir, buku ini dilengkapi juga dengan soal-soal latihan, beserta contoh-contoh penerapan prinsip-prinsip teknologi struktur.','65b9b76394b3c.jpg','2003','Jakarta',''),(40,'Merancang dengan Maket : Panduan Studio dalam Membuat dan Menggunakan Maket Perancangan Arsitektural','Chriss B. Mills','-','Edisi Kedua','Erlangga','978-979-033-462-5','vii, 246 p.: illus., indeks; 21 cm','Fokus dari teknologi struktur adalah penggunaan material bangunan secara efisien–terutama beton, baja, dan kayu untuk menahan semua beban pada struktur dengan aman. Memang, sebagian besar profesional yang terlibat dengan konstruksi bukan insinyur sipil, namun demikian pihak-pihak tersebut tetap perlu memahami dasar-dasar teknologi struktur yang merupakan perhatian utama dari insinyur sipil.Kelengkapan buku ringkas ini dapat dilihat dari isinya. Buku ini berisikan topik-topik statika, mekanika teknik, mekanika tanah, desain pondasi, jenis-jenis struktur, teknologi struktur kayu, teknologi struktur baja, dan teknologi struktur beton.Dalam buku ini, hal-hal yang cukup rumit antara beban struktur dan pengaruh¬pengaruhnya dalam desain bangunan disajikan dengan cara yang sederhana. Kepraktisan buku ini pun dapat dilihat dari kandungan matematikanya. Hitungannya begitu mudah dipahami pun oleh non-insinyur.Terakhir, buku ini dilengkapi juga dengan soal-soal latihan, beserta contoh-contoh penerapan prinsip-prinsip teknologi struktur.','65b9b7f570e34.jpg','2008','Jakarta',''),(41,'Joglo : Arsitektur Rumah Traditional Jawa','R. Ismundar K','-','-','Dahara Prize','978-979-033-462-5','164 hlm.: illus.; 21 cm','Rumah Joglo merupakan salah satu warisan budaya Indonesia yang terdapat di Jawa Tengah. Rumah Joglo mempunyai kerangka bangunan utama yang terdiri dari soko guru berupa empat tiang utama penyangga serta tumpang sari yang berupa susunan balok yang disangga soko guru. Rumah Joglo yang pada awalnya hanya dimiliki oleh kalangan terpandang saja, seiring perkembangan jaman Joglo dapat dimiliki oleh siapapun yang ingin membangun Rumah Joglo. Tak heran banyak Joglo yang dibangun dengan fungsi yang berbeda sehingga berdampak pada susunan ruang Joglo. Dengan dasar pengetahuan tersebut, penelitian ini berupaya mengungkapkan sejauh mana citra visual Rumah Joglo mampu mempengaruhi konsep identitas sebuah bangunan. Untuk mencapai tujuan tersebut, penelitian ini menggunakan metode penelitian berupa studi literatur serta dilakukannya sebuah observasi.  Hasil identifikasi karakteristik Rumah Joglo menunjukkan bahwa Rumah Joglo merupakan perwujudan nilai kebudayaan lokal yang melahirkan seni arsitektur khas Jawa Tengah yang menarik.','65b9b89740f24.jpg','2007','Semarang',''),(42,'Etika & Estetika: Cara-cara berarsitektur dengan Bijak','Priyo Pratikno','-','-','Andi','978-979-29-2667-5','xii, 84 hlm.: illus.; 19 cm','Buku ini memberikan ajakan kepada para pembaca agar dapat membuat aritektur bangunan dengan cara yang ramah dengan alam, melakukan cara yang etis untuk mendapatkan ungkapan artifisial yang estetis. Sudah selayaknya para arsitek indonesia menggali potensi kekayaan alam nusantara ini dengan berarsitektur melalui cara kerja yang cerdasa, imajinatif, tanpa perlu mebebek pada gaya olah bentuk arsitek asing yang berbeda permasalahnnya. sehingga dapat menjauhkan diri dari indetitas diri. Oleh karen aitu perlu digunakan bahan alami yang diambil dari lingkungan alam sekitar.','65b9b8f36645a.jpg','2001','Yogyakarta',''),(43,'Ruang Dalam Arsitektur','Cornelius van de Ven','-','-','Gramedia Pustaka Utama','979-511-205-8','xviii, 352 hal.: illus.; 24 cm','Buku ini menggali konsep dan prinsip ruang dalam konteks arsitektur, menyoroti peran dan pengaruhnya terhadap pengalaman ruang. Dengan memfokuskan perhatian pada elemen desain interior, buku ini membahas cara mengoptimalkan penggunaan ruang, memahami tata letak, serta menyelidiki peran pencahayaan, warna, dan material dalam membentuk atmosfer ruang. Pembaca dibimbing melalui pandangan interdisipliner yang mencakup aspek fungsional, estetika, dan psikologis dari ruang dalam suatu bangunan. Buku ini juga mempertimbangkan tren kontemporer dalam desain interior dan bagaimana inovasi teknologi telah memengaruhi cara kita memahami dan menggunakan ruang dalam arsitektur.','65b9b9e68f5db.jpg','1991','Jakarta',''),(44,'Dasar-Dasar Arsitektur','IR. Calysvie Yapri  dan Sofyan M. Nafsir','-','-','M2S','-','V.3, vi, 174 hlm.: ilus.; 28cm','Buku ini membahas prinsip-prinsip dasar dalam arsitektur, memberikan pembaca pemahaman yang kokoh tentang fondasi disiplin ini. Mulai dari konsep dasar perancangan bangunan hingga prinsip-prinsip estetika dan fungsionalitas, buku ini menyajikan pengetahuan yang diperlukan bagi mahasiswa arsitektur atau siapa pun yang tertarik memahami dasar-dasar disiplin ini. Pembaca dibimbing melalui evolusi arsitektur dari masa ke masa, mengulas gaya arsitektur klasik hingga tren kontemporer. Selain itu, buku ini juga menyoroti konsep ruang, struktur, dan material sebagai elemen-elemen utama yang membentuk desain arsitektur.','65b9baa51ac3d.jpg','1985','Bandung',''),(45,'Seni budaya & warisan Indonesia. Jilid 9: Arsitektur','Lily Turangan','-','-','PT Aku Bisa','978-602-7706-48-4','x, 141 p.: bibl., illus., indeks; 29 cm','Seni Budaya & warisan Insdonesia merupakan rangkaian corak dan karakter bangsa Indonesia, Keindahan dan keunikan kebudayaan alam Indonesia adalah kekayaan yang tak ternilai harganya. Dengan seni budaya & warisan Indonesia Pembaca dapat semakin mengenal, Kemudian mencintai tanah air Indonesia dengan segala keragamannya.Diawali dengan pembahasan mengenai sejarah awal di nusantara, Pembaca diajak mengenal sejarah modern, Flora, Fauna, Olag raga & Permainan, Agama & Kepercayaa, Manusia & Lingkungan Budaya, Bahasa & Sastra, Arsitektur, Seni Pertunjukan serta Teknologi.','65b9bb18720b6.jpg','2015','Jakarta',''),(46,'Dimensi Estetika Pada Karya Arsitektur dan Disain','Artini Kusmiati','-','-','Djambatan','978-979-4285-17-6','x, 184 p.; 20 cm','Secara konseptuai estetika arsitektural didominasi oleh bahasa visual pada kepadatan dan bukaan (solid and void), volume dan massa (volume and mass), sifat permukaan dan bidang (surface and/1/ane), begitu pula halnya dengan karya-karya disain. Dengan tumbuh dan berkembangnya teknologi, ilmu pengetahuan dan seni, yang saling kait-mengkait, maka pombahasan dimensi keindahan saat ini mengalami perubahan, tidak Iagi didasarkan pada xogi fisik dan filosofis semata, tetapi juga bisa didekati secara rasional Iewat teori estetika.','65b9bee0cba4b.jpg','2004','Jakarta',''),(47,'Eksplorasi Desain Arsitektur Nusantara','Josef Prijotomo','-','-','PT Info Prima Sarana Media','979-23-6800','215 p.: illus.; 25 cm','Buku ini merupakan kumpulan karya-karya terpilih dari kompetisi ‘Propan Sayembara Desain Arsitektur Nusantara’ yang diselenggarakan oleh Propan. Diselingi di awal dan transisi juri yang merupakan arsitek profesional memberikan pandangan betapa pentingnya arsitektur nusantara sebagai identitas dan mengkampanyekan upaya-upaya menyuburkannya kembali dimasa sekarang. Terdapat 35 karya pilihan berisi Desain dan Abstrak (setelah mengalami proses editing penulis) yang memperlihatkan bagaimana peserta mengimplementasikan arsitektur nusantara pada desain dengan cara yang berbeda-beda sehingga dapat dijadikan contoh ketika praktisi hendak menerapkan tema arsitektur nusantara pada karya yang dibuatnya. Pengantar Menteri Pakrekraf dan pandangan dari penyelenggara dan para soal Arsitektur Nusantara yang memperluas khazanah pengetahuan tentang pentingnya membawa Arsitektur Nusantara ke masa kini.','65b9bf489c694.jpg','2014','Jakarta',''),(48,'Rekam Jejak Arsitektur Melayu: Penyengat, Lingga, Johor, Serdang Bedagai, Sambas, Mempawah','H. Supriyanto','-','-','IAI Kepri Publisher','978-602-8374-12-5','227 p.: illus.; 25 cm','Para arsitek yang tergabung dalam organisasi tersebut mencoba menggali keberadaan-keberadaan arsitektur Melayu yang ada di lima daerah, yakni Johor, Serdang Bedagai, Mempawah Sambas di Kalimantan Barat, Lingga serta Pulau Penyengat. Di dalam buku ini sudah terukur semua elemen-elemen arsitektur yang ada di masjid penyengat, baik eksterior dan interior. Ini bisa jadi referensi sewaktu-waktu, karena detail ukuran semuanya lengkap ada.','65b9bfe60cb2b.jpg','2005','Kepri, Riau',''),(49,'Wastu Citra','Y. B. Mangunwijaya','-','-','Gramedia Pustaka Utama','979-403-186-0','vii, 352 hal.: illus.; 27 cm','Arsitektur memang menampilkan pelbagai gejala. Bukan hanya keterampilan teknis yang bercorak praktis melulu; melainkan pula mencerminkan jiwa, mental, serta sikap budaya si pembuat dan si pemiliknya.Y. B. Mangunwijaya, arsitek terkenal sekaligus penulis berkaliber sastrawan-budayawan, lewat bukunya ini, ingin menggumuli hal-hal yang lebih dalam dari dunia arsitektural. Sebagaimana manusia bisa dipandang dari segi fisik maupun dari segi rohani, begitu pula bangunan arsitektural dapat dipandang dari dua segi itu. Ada segi wastu widya, yang menyangkut masalah teknis dan praktis, di samping segi wastu citra, menyangkut hal-hal yang lebih dalam, lebih rohani.Buku ini merupakan buku pengantar ke dalam ilmu budaya bentuk arsitektural. Diperkaya dengan banyak ilustrasi untuk membantu pembaca menangkap sendi-sendi filsafatnya, lewat contoh dan latihan praktis. Sebuah buku yang sangat bermanfaat bagi arsitek dan calon-calonnya, serta semua orang yang menunjukkan apresiasi tinggi pada bidang arsitektur.','65b9c0a22f9ff.jpg','1992','Jakarta',''),(50,'Pencahayaan Alami Dalam Arsitektur','Parmonangan Manurung','-','-','Andi','978-602-8374-12-5','227 p.: illus.; 25 cm','Para arsitek yang tergabung dalam organisasi tersebut mencoba menggali keberadaan-keberadaan arsitektur Melayu yang ada di lima daerah, yakni Johor, Serdang Bedagai, Mempawah Sambas di Kalimantan Barat, Lingga serta Pulau Penyengat. Di dalam buku ini sudah terukur semua elemen-elemen arsitektur yang ada di masjid penyengat, baik eksterior dan interior. Ini bisa jadi referensi sewaktu-waktu, karena detail ukuran semuanya lengkap ada.','65b9c10bc1900.jpg','2015','Kepri, Riau',''),(51,'3 in 1 Aplikasi Grafis Langsung Bisa Desain Grafis Tanpa Guru : Photoshop, CorelDraw, Illustrator','Yohan Jati Waloeya','-','-','Andi','978-979-292044-4','x, 150 p.: illus.; 23 cm','Buku ini memberikan panduan praktis bagi pemula yang ingin menguasai desain grafis tanpa bimbingan seorang guru. Melibatkan tiga aplikasi grafis terkemuka, buku ini menawarkan langkah-langkah jelas untuk memahami dasar-dasar desain grafis dan menghasilkan karya yang menarik. Dengan pendekatan yang user-friendly, pembaca dipandu melalui penggunaan perangkat lunak dengan contoh-contoh visual dan proyek latihan. Buku ini menjadi sumber daya yang sangat berguna bagi mereka yang ingin mengembangkan keterampilan desain grafis secara mandiri dan efektif.','65b9c69be7988.jpg','2012','Yogyakarta',''),(52,'36 Jam Belajar Komputer  Desain  Grafis Dengan CorelDraw 12','Teguh Wahyono','-','-','Elex Media Komputindo','979-20-7305-1','xii, 249 p.; 21 cm','Pembahasan buku ini mencakup : Pengenalan dan instalasi coreldraw 12, mempersiapkan area penggambaran, memilih dan mengatur objek, menggambar bentuk dasar objek, mewarnai objek, transformasi dan manipulasi bentuk objek, memberi efek pada gambar, bekerja cepat dengan interactive tool, bekerja dengan teks dan manipulasinya, bekerja dengan bitmap dan memberi efek pada image, menggunakan layer.','65b9c706ab9ba.jpg','2005','Jakarta',''),(53,'Desain Grafis Dengan CorelDraw X3','Ian Chandra K','-','-','Elex Media Komputindo','-','x, 193 p, 21 cm','Penggunaan komputer, khususnya  komputer grafis atau desktop publishing tentu tidak asing lagi dengan CorelDraw. Peranti lunak yang satu ini terbukti merajai dunia grafis dengan berbagai inovasi yang luar biasa. Salah satunya CorelDraw versi X3 yang mengandung berbagai fitur yang akan sangat membantu anda dalam menggambar di antaranya Learning Tool, Shaping Tool, Tracing, Effect and Fills, Drawing Star, Smart Fill Tool, Formating Text, Image Adjustment Lab, dan masih banyak lagi. Dengan adanya fasilitas yang lengkap ini, diharapkan anda dapat bekerja sekaligus berkreasi secara professional. Didalam buku ini akan diajarkan memahami cara membuat berbagai macam desain, karena buku ini mengupas tuntas cara mengoperasikan tool serta menu yang ada dalam program CorelDraw X3 dengan bahasa yang mudah dipahami.','65b9c76269aaa.jpeg','2006','Jakarta',''),(54,'Desain Grafis Dengan Macromedia Freehand 10','Wahana Komputer','-','-','Salemba Infotek','979-9550-28-9','xiv, 239 p.: illus.; 26 cm','Macromedia Freehand 10 adalah program aplikasi desain grafis untuk mengolah gamabar vektor, seperti membuat desain logo, desain brosur, dan produk-produk grafis lainnya. Bahkan dengan versi terbarunya ini, Macromedia Freehand 10 mampu menghasilkan gambar animasi dengan format SWF. Program ini merupakan pioner dalam mengolah gambar-gambar vektor. Cara kerjanya yang efisien dan tool-toolnya yang sangat fleksibel untuk editing objek membuat para praktisi di dunia grafis banyak yang memilih program ini untuk membantu menyelesaikan pekerjaannya. Bahkan beberapa program aplikasi untuk editing gambar vektor yang terkenal banyak mencontoh teknik kerja dari tool-tool yang ada di Macromedia Freehand ini. Buku Desain Grafis dengan Macromedia Freehand 10 ini mengulas tuntas teknik-teknik pembuatan karya seni dengan program Macromedia Freehand 10 ini. dengan mempelajari buku ini Anda akan mampu membuat desain logo, desain brosur, dan produk-produk grafis lainnya. Bahkan Anda juga dapat menghasilkan gambar animasi dengan format SWF.','65b9c7dc226ac.jpg','2003','Jakarta',''),(55,'Memanipulasi Desain Grafis dan Photo Dengan Corel Photopaint Graphics : Suite 11','Madcoms','-','-','Andi','979-731-220-8','x, 450 p.: illus.; 23 cm','Corel photopoint merupakan salah satu software pengolah desain grafis dan pho yang digunakan untuk pembuatan desain grafis komputer. Kelengkapan fasilitas dan kemampuannya yang luar biasa dengan mengolah objek grafis, menjadikan software ini sangat populer dan banyak dipakai oleh para desainer grafis komputer.','65b9c8460c44e.jpg','2004','Yogyakarta',''),(56,'Panduan Aplikatif Membuat  Desain Grafis Dengan CorelDraw Graphics Suite 11','Ronald','-','-','Elex Media Komputindo','979-20-5239-9','xvi, 520 p.: illus.; 21 cm','Buku ini dirancang sebagai panduan praktis bagi individu yang ingin menguasai seni desain grafis menggunakan perangkat lunak CorelDraw Graphics Suite 11. Dengan fokus pada aspek-aspek dasar hingga tingkat lanjut, pembaca akan dibimbing melalui berbagai teknik dan fitur yang dapat digunakan untuk membuat desain grafis yang menarik dan profesional. Panduan ini mencakup topik-topik seperti pengenalan antarmuka CorelDraw, penggunaan alat-alat desain, manipulasi teks, pengelolaan warna, dan teknik efek khusus. Buku ini memberikan contoh kasus praktis dan proyek-proyek latihan yang dapat membantu pembaca mengaplikasikan pengetahuan yang mereka dapatkan.','65b9c8d914aae.jpeg','2004','Jakarta',''),(57,'Dasar-Dasar Kebijaksanaan Ekonomi dan Kebijaksanaan Fiskal','Soetrisno','-','-','Andi','-','xiv, 414 hlm.: ilus.; 23 cm','Buku ini menyajikan landasan teoretis dan praktis dalam pemahaman kebijaksanaan ekonomi dan fiskal. Dengan menggali konsep dasar ekonomi, pembaca diperkenalkan pada prinsip-prinsip dasar seperti penawaran dan permintaan, inflasi, dan pertumbuhan ekonomi. Lebih lanjut, buku ini memaparkan peran serta instrumen kebijaksanaan fiskal dalam mengelola keadaan ekonomi. Melibatkan studi kasus dan analisis mendalam, pembaca diberikan wawasan tentang implementasi kebijaksanaan fiskal untuk merespons tantangan ekonomi. Buku ini dirancang untuk mahasiswa, praktisi, dan pembaca yang tertarik untuk memahami dasar-dasar kebijaksanaan ekonomi dan fiskal sebagai instrumen penting dalam pengelolaan perekonomian suatu negara.','65b9ca997243f.jpg','1983','Yogyakarta',''),(58,'Desentralisasi Fiskal dan Keuangan Daerah Dalam Otonomi','Juli Panglima Saragih','-','-',' Ghalia Indonesia','979-450-453-X','176 p.; 25 cm','Buku ini antara lain menggambarkan  tentang aspek ekonomi dan politik dari kebijakan otonomi daerah -- terutama yang berkaitan dengan persoalan desentralisasi fiskal saat ini. Selain itu, juga diuraikan dan dianalisis tentang perimbangan keuangan antara pusat - daerah, serta perlunya reformasi pengelolaan keuangan daerah dalam konteks desentralisasi fiskal guna mewujudkan good governance dalam penyelenggaraan pemerintah daerah. Karena dengan desentralisasi fiskal, sumber pendapatan daerah akan semakin banyak dimana hal ini cenderung dapat mengundang munculnya penyalahgunaan anggaran daerah (APBD) untuk kepentingan pribadi pejabat daerah atau pihak ketiga. Buku ini disusun secara sistematis dan menggunakan bahasa yang lugas dan populer sehingga memudahkan pembaca untuk memahaminya. Isu-isu yang dibahas dalam buku ini adalah ekonomi dan politik kebijakan otonomi daerah; otonomi, desentralisasi, dan kewenangan pemerintah daerah; desentralisasi fiskal, perimbangan keuangan, dan permasalahannya; dan reformasi pengelolaan keuangan daerah.','65b9cafb8f510.jpg','2003','Jakarta',''),(59,'Keuangan Negara dan Kebijaksanaan Fiskal','Rachman Prawiraamidjaja','-','-','Alumni','-','viii, 131 p.; 21 cm','Buku ini menyelidiki konsep dan aplikasi keuangan negara serta kebijaksanaan fiskal sebagai instrumen pengelolaan keuangan pemerintah. Dengan pendekatan holistik, pembaca dibimbing melalui pemahaman tentang prinsip-prinsip dasar keuangan negara, termasuk penerimaan dan belanja negara, serta aspek-aspek kunci dalam menyusun kebijaksanaan fiskal. Studi kasus dan analisis mendalam digunakan untuk memberikan gambaran nyata tentang implementasi kebijaksanaan fiskal dalam situasi dunia nyata. Buku ini ditujukan untuk pembaca yang ingin memahami peran keuangan negara dan kebijaksanaan fiskal dalam mencapai tujuan ekonomi dan keberlanjutan fiskal.','65b9cb749bf57.jpg','1980','Bandung',''),(60,'Pajak Penghasilan : Teknik Rekonsiliasi Fiskal','Kesit Bambang Prakosa','-','-','Ekonisia','979-901-514-6','xiv, 324 p.; 24 cm','Buku ini membahas secara rinci teknik rekonsiliasi fiskal dalam konteks Pajak Penghasilan. Dengan menguraikan prinsip-prinsip dasar dan peraturan terkait, pembaca diperkenalkan pada strategi dan metode untuk memahami, melacak, dan menyelaraskan informasi keuangan dengan persyaratan pajak. Melalui penekanan pada aspek praktis, buku ini memberikan panduan langkah demi langkah dalam menyusun rekonsiliasi fiskal yang akurat dan sesuai dengan peraturan pajak yang berlaku. Cocok untuk para profesional pajak, akuntan, dan praktisi keuangan, buku ini menjadi sumber informasi yang berharga dalam mengelola dan mematuhi tuntutan kompleks pajak penghasilan.','65b9cbf3004ac.jpeg','2000','Jakarta',''),(61,'Metode Riset : Aplikasi Dalam Pemasaran','J. Supranto','-','-','LPFE','979-518-727-9','vii, 336 halaman : ilustrasi ; 23 cm','Buku ini membahas metode riset yang dapat diterapkan secara efektif dalam konteks pemasaran. Dengan mengeksplorasi konsep-konsep dasar riset, pembaca diperkenalkan pada berbagai pendekatan dan teknik yang dapat digunakan untuk mengumpulkan, menganalisis, dan menginterpretasi data pemasaran. Melibatkan studi kasus dan aplikasi praktis, buku ini menawarkan panduan langkah demi langkah untuk merancang dan melaksanakan riset yang relevan dan bermanfaat dalam pengambilan keputusan pemasaran. Cocok untuk mahasiswa, praktisi pemasaran, dan para peneliti, buku ini menjadi sumber daya penting dalam memahami dan mengaplikasikan metode riset untuk meningkatkan strategi pemasaran.','65b9cfb1c5a1f.jpg','1991','Jakarta',''),(62,'Strategi Pemasaran','Fandy Tjiptono','-','-','Andi','979-731-381-6','ixvi, 374hlm.; 28x20 cm','Buku ini membahas strategi pemasaran sebagai landasan untuk keberhasilan perusahaan dalam menghadapi tantangan pasar yang dinamis. Dengan fokus pada konsep dasar strategi pemasaran, pembaca diperkenalkan pada prinsip-prinsip perencanaan, pelaksanaan, dan evaluasi strategi yang efektif. Melibatkan studi kasus dan contoh aplikatif, buku ini memberikan wawasan mendalam tentang bagaimana perusahaan dapat mengidentifikasi pasar target, membedakan produk atau layanan, dan mengembangkan kampanye pemasaran yang sukses. Cocok untuk mahasiswa bisnis, praktisi pemasaran, dan pemimpin perusahaan, buku ini menjadi panduan praktis untuk merancang dan mengelola strategi pemasaran yang kompetitif dan berkelanjutan.','65b9d030c52f8.jpg','1998','Yogyakarta',''),(63,'Dasar-dasar Pemasaran (Principles of Marketing 7e)','Philip Kotler','-','Edisi Ketujuh','Prenhallindo','979-8901-35-5','viii, 328 p.; 27 cm','Buku ini menyajikan dasar-dasar pemasaran sebagai panduan komprehensif bagi pembaca yang ingin memahami konsep-konsep utama dalam dunia pemasaran. Dengan pendekatan yang berfokus pada edisi ketujuh, pembaca diperkenalkan pada prinsip-prinsip strategis yang berkembang seiring perkembangan pasar dan teknologi. Melalui analisis kasus, riset pasar, dan penerapan konsep dalam situasi dunia nyata, buku ini memberikan pemahaman mendalam tentang bagaimana pemasaran dapat diterapkan dalam berbagai konteks bisnis. Cocok untuk mahasiswa, praktisi pemasaran, dan para pemimpin bisnis, buku ini menjadi referensi penting untuk memahami dinamika pemasaran dan merancang strategi yang responsif terhadap perubahan lingkungan.','65b9d14060432.jpg','1997','Jakarta',''),(64,'Perilaku Konsumen : Teori dan Penerapannya Dalam  Pemasaran','Ujang Sumarwan','-','-','Ghalia Indonesia','-','368 p.; 25 cm','Buku ini membahas secara mendalam perilaku konsumen sebagai kunci penting dalam strategi pemasaran. Dengan merangkul teori-teori terkini, pembaca diperkenalkan pada faktor-faktor psikologis, sosial, dan ekonomi yang memengaruhi keputusan konsumen. Melalui studi kasus dan aplikasi praktis, buku ini menawarkan wawasan mendalam tentang bagaimana perusahaan dapat memahami dan merespons preferensi, motivasi, dan pola perilaku konsumen. Cocok untuk mahasiswa pemasaran, profesional bisnis, dan pemasar yang ingin meningkatkan pemahaman mereka tentang pasar, buku ini menjadi panduan terperinci untuk menerapkan pengetahuan perilaku konsumen dalam pengembangan strategi pemasaran yang efektif.','65b9d18d6c240.jpg','2003','Jakarta',''),(65,'Pemasaran Asuransi Jiwa Kontemporer: Teori dan Praktik','Agoes Parera','-','-','Mitra Wacana Media','978-602-318-201-5','xviii, 250 hlm.: ill. bibli.; 24 cm','Buku ini mengulas secara komprehensif pemasaran asuransi jiwa dalam konteks zaman sekarang. Dengan merangkul teori-teori terbaru, pembaca dibimbing melalui strategi pemasaran yang relevan dan efektif untuk industri asuransi jiwa. Melalui penekanan pada teori dan penerapannya dalam praktik, buku ini menawarkan wawasan mendalam tentang bagaimana mengidentifikasi pasar target, memahami kebutuhan pelanggan, dan mengembangkan kampanye pemasaran yang sukses. Cocok untuk profesional asuransi, pemasar, dan mahasiswa yang tertarik dalam industri asuransi jiwa, buku ini menjadi sumber daya yang berharga dalam memahami dan menghadapi tantangan pemasaran dalam lingkungan yang berubah dengan cepat.','65b9d1faef29d.jpg','2016','Jakarta',''),(66,'Riset Pemasaran: Pendekatan Terapan','Naresh K. Malhotra','-','-',' Indeks','979-683-148-1','V. 1.; xxv, 395 p.; 28 cm','Buku ini membahas secara rinci pendekatan terapan dalam riset pemasaran untuk memberikan panduan praktis bagi para peneliti dan praktisi. Dengan fokus pada aplikasi metodologi riset yang relevan dengan kebutuhan pasar, pembaca diperkenalkan pada langkah-langkah praktis dalam perencanaan, pelaksanaan, dan analisis riset. Melalui studi kasus dan contoh penerapan langsung, buku ini menawarkan wawasan mendalam tentang bagaimana merancang riset yang bermakna untuk mendukung pengambilan keputusan pemasaran. Cocok untuk mahasiswa, peneliti, dan profesional pemasaran, buku ini menjadi panduan berharga untuk mengembangkan keterampilan riset pemasaran yang efektif dan memberikan nilai tambah bagi strategi bisnis.','65b9d29ad874f.jpg','2005','Jakarta',''),(67,'Citizen 4.0: Menjejakkan Prinsip  Pemasaran Humanis di Era Digital','Hermawan Kartajaya','-','Edisi Keempat','Gramedia Pustaka Utama','978-602-03-7954-8','xxiv, 424 hlm.; 21 cm','Buku ini membahas perubahan paradigma pemasaran di era digital, dengan memfokuskan pada prinsip pemasaran humanis. Penulis mengajak pembaca untuk memahami bagaimana teknologi dan keterhubungan digital dapat diterapkan untuk menciptakan pengalaman pemasaran yang lebih manusiawi. Dengan memberikan contoh-contoh nyata dan studi kasus terkini, buku ini memberikan panduan praktis untuk mengembangkan strategi pemasaran yang menghargai nilai-nilai kemanusiaan, empati, dan interaksi personal di tengah kemajuan teknologi. Cocok untuk praktisi pemasaran, pengusaha, dan semua yang tertarik dalam menggabungkan aspek manusiawi dalam dunia pemasaran digital, buku ini menjadi panduan yang relevan dan inspiratif di era digital saat ini.','65b9d321c986a.jpg','2018','Jakarta',''),(68,'Manajemen Pemasaran: Analisis, Perencanaan, Implementasi dan Pengendalian','Philip Kotler','-','Edisi Kedelapan','Salemba Empat','979-8190-17-3','xxii, 348 hal.; 26 cm','Buku ini membahas secara komprehensif manajemen pemasaran, menyoroti langkah-langkah kunci dalam analisis, perencanaan, implementasi, dan pengendalian strategi pemasaran. Dengan fokus pada pendekatan holistik, pembaca diperkenalkan pada konsep-konsep dasar manajemen pemasaran yang melibatkan riset pasar, penetapan target, dan penyesuaian strategi dengan kebutuhan pelanggan. Melalui studi kasus dan aplikasi praktis, buku ini memberikan wawasan mendalam tentang bagaimana mengelola siklus pemasaran dari konsepsi hingga evaluasi hasil. Cocok untuk mahasiswa, praktisi pemasaran, dan manajer, buku ini menjadi panduan lengkap untuk merancang dan melaksanakan strategi pemasaran yang sukses dalam lingkungan bisnis yang dinamis.','65b9d3b8f18dc.jpg','1995','Jakarta',''),(69,'Marketing Public Relations : Upaya Memenangkan Persaingan Melalui Pemasaran Yang Komunikatif','Saka Abadi','-','-','FE UI','-','viii, 155 hlm.: ilus.; 22 cm','Buku ini membahas peran penting public relations dalam strategi pemasaran modern dan bagaimana dapat digunakan untuk meraih keunggulan kompetitif. Melalui pendekatan yang berfokus pada komunikasi, pembaca diperkenalkan pada konsep-konsep dasar pemasaran yang komunikatif dan hubungannya dengan praktik public relations. Buku ini mengeksplorasi cara-cara di mana perusahaan dapat membangun citra merek yang kuat dan memanfaatkan platform pemasaran yang komunikatif untuk menarik perhatian dan dukungan konsumen. Dengan membahas studi kasus dan strategi efektif, buku ini memberikan panduan praktis untuk mengintegrasikan public relations dalam upaya pemasaran, dengan tujuan utama untuk memenangkan persaingan di pasar yang kompetitif. Cocok untuk praktisi pemasaran, mahasiswa, dan mereka yang tertarik pada penggabungan strategi pemasaran dan public relations untuk mencapai keberhasilan bisnis.','65b9d43f8c378.jpg','1994','Jakarta',''),(70,'Pedoman Menyusun Rencana  Pemasaran (The Market Planning Guide)','David H. Bangs','-','Edisi Ketiga','Erlangga','-','xii, 171 hlm.: indeks; 28 cm','Buku ini menyajikan panduan langkah-demi-langkah dalam menyusun rencana pemasaran yang efektif untuk memandu perusahaan dalam mencapai tujuan bisnisnya. Melalui pendekatan praktis, pembaca akan dibimbing melalui proses perencanaan pemasaran yang holistik, mulai dari analisis pasar, penetapan target, hingga pengembangan strategi pemasaran yang tanggap terhadap perubahan pasar. Buku ini juga mengulas penggunaan alat dan teknik penelitian pasar, serta cara mengukur dan mengevaluasi keberhasilan rencana pemasaran. Dengan membahas studi kasus dan contoh penerapan langsung, buku ini menjadi sumber daya berharga bagi para praktisi pemasaran, manajer, dan mahasiswa yang ingin memahami dan mengimplementasikan proses penyusunan rencana pemasaran yang efektif.','65b9d6121de09.jpg','1995','Jakarta',''),(71,'Manajemen Pemasaran Modern','Basu Swasta','-','-','Liberty','-','xix, 446 hlm.: ilus.; 23 cm','Buku ini merinci konsep dan praktik terkini dalam manajemen pemasaran, menyelidiki peran teknologi, perubahan perilaku konsumen, dan dinamika pasar yang mempengaruhi strategi pemasaran. Melalui penjelasan mendalam tentang kerangka kerja manajemen pemasaran modern, pembaca akan memahami bagaimana perusahaan dapat mengintegrasikan pendekatan inovatif dalam mengidentifikasi pasar, membangun merek, dan mengelola hubungan pelanggan. Dengan penekanan pada aspek teknologi digital dan data analytics, buku ini memberikan wawasan tentang bagaimana perusahaan dapat memanfaatkan perkembangan terkini untuk mencapai keberhasilan pemasaran. Dengan contoh penerapan konsep dalam konteks dunia nyata, buku ini menjadi panduan bermanfaat bagi praktisi pemasaran dan mahasiswa yang tertarik dalam pemahaman mendalam tentang manajemen pemasaran modern.','65b9de616a707.jpg','1985','Yogyakarta',''),(72,'Manajemen Pemasaran: Analisa Perilaku Konsumen','Basu Swastha dan T. Hani Handoko','-','Edisi Pertama','Liberty','-','  xii, 127 hlm.: bibl. ref.; 21 cm','Buku ini membahas secara rinci konsep dan teknik analisis perilaku konsumen dalam konteks manajemen pemasaran. Dengan memahami motivasi, preferensi, dan pola pembelian konsumen, pembaca diajak untuk menggali strategi pemasaran yang lebih efektif. Melalui pendekatan yang berfokus pada aplikasi, buku ini memperkenalkan metode-metode penelitian perilaku konsumen dan teknologi terbaru yang dapat digunakan untuk mengumpulkan dan menganalisis data konsumen. Dengan memberikan contoh kasus dan penerapan praktis, buku ini menjadi panduan yang berharga bagi praktisi pemasaran dan mahasiswa yang ingin meningkatkan pemahaman mereka tentang bagaimana menganalisis dan merespons perilaku konsumen dalam konteks strategi pemasaran.','65b9d72ad8a1e.jpg','1987','Yogyakarta',''),(73,'Manajemen Pemasaran. Edisi Milenium','Philip Kotler','-','-','Prenhallindo','979-683-309-3','xxv, 402 hlm.; 24 cm','Buku ini menyajikan pandangan mutakhir tentang manajemen pemasaran, khususnya dalam konteks perubahan yang terjadi di era milenium. Dengan membahas tren terkini, teknologi, dan perubahan perilaku konsumen, pembaca dibimbing melalui konsep-konsep manajemen pemasaran yang relevan dengan tantangan dan peluang abad ke-21. Dengan fokus pada integrasi strategi pemasaran tradisional dengan pendekatan inovatif dan teknologi digital, buku ini menjadi panduan terperinci untuk pemimpin bisnis, praktisi pemasaran, dan mahasiswa yang ingin memahami dan mengimplementasikan praktik manajemen pemasaran yang efektif di era milenium.','65b9d78dabb63.jpg','2002','Jakarta',''),(74,'Manajemen Pemasaran Jasa: Teori dan Praktik','Rambat Lupiyoadi','-','-','Salemba Empat','979-691-059-4','xx, 243 p.: bibl.; 26 cm','Buku ini membahas secara komprehensif konsep-konsep teoritis dan praktik terkait manajemen pemasaran jasa. Dengan memberikan pemahaman mendalam tentang perbedaan esensial antara pemasaran produk dan pemasaran jasa, pembaca dibimbing melalui strategi-strategi khusus yang relevan dalam lingkup layanan. Melalui kombinasi teori dan aplikasi praktis, buku ini membahas aspek-aspek kunci seperti pengelolaan kualitas layanan, pengalaman pelanggan, dan komunikasi efektif dalam konteks layanan. Studi kasus dan contoh penerapan langsung memberikan pandangan nyata tentang bagaimana teori dapat diimplementasikan dalam situasi dunia nyata. Cocok untuk mahasiswa pemasaran, profesional layanan, dan pemimpin perusahaan, buku ini menjadi panduan lengkap untuk memahami dan mengelola pemasaran jasa dengan sukses.','65b9da9c8692a.jpg','2001','Jakarta',''),(75,'Manajemen Pemasaran di Indonesia: Analisis Perencanaan, Implementasi dan Pengendalian','Philip Kotler dan A. B. Susanto','-','-',' Salemba Empat','979-8190-75-0','xxx, 610 hlm.; 26 cm','Buku ini menyajikan analisis mendalam tentang praktik manajemen pemasaran di konteks bisnis Indonesia. Dengan fokus pada perencanaan, implementasi, dan pengendalian, pembaca dibimbing melalui langkah-langkah kunci dalam mengelola strategi pemasaran yang sukses. Melibatkan konteks bisnis Indonesia, buku ini membahas tantangan dan peluang yang unik dalam menghadapi pasar lokal. Dengan menggunakan studi kasus, analisis data pasar, dan contoh aplikasi praktis, buku ini memberikan wawasan tentang bagaimana perusahaan dapat mengoptimalkan strategi pemasaran mereka di Indonesia. Cocok untuk para pemimpin bisnis, manajer pemasaran, dan mahasiswa, buku ini menjadi sumber daya yang berharga untuk memahami dan mengimplementasikan manajemen pemasaran dengan efektif di lingkungan bisnis Indonesia yang dinamis.\r\n','65b9db51b9b19.jpeg','2001','Jakarta',''),(76,'Pemasaran Jasa','Fandy Tjiptono','-','-','Bayumedia Publishing','978-3695-11-0','xx, 532 p: 29 cm','Buku ini membahas konsep-konsep kunci dalam pemasaran jasa, memberikan pemahaman mendalam tentang strategi-strategi yang unik diperlukan untuk mempromosikan dan memasarkan layanan. Dengan mengeksplorasi perbedaan esensial antara pemasaran produk dan jasa, pembaca diajak untuk memahami aspek-aspek khusus yang terlibat dalam menciptakan dan mengelola pengalaman pelanggan yang positif. Melalui pendekatan teoritis dan aplikasi praktis, buku ini membahas elemen-elemen seperti kualitas layanan, kepuasan pelanggan, dan peran karyawan dalam menciptakan nilai tambah. Dengan menggunakan studi kasus dan contoh penerapan, buku ini menjadi panduan berharga bagi mahasiswa pemasaran, manajer layanan, dan praktisi bisnis yang ingin menguasai seni pemasaran jasa dengan efektif.','65b9dd754b798.jpeg','2007','Malang',''),(77,'Manajemen Pemasaran Jilid 1 -13/E','Philip Kotler dan Kevin Lane Keller','-','Edisi Ketigabelas','Erlangga','979-979-0339-35-4','xxix, 462 p.: bibl., lamp.; 27 cm','Buku ini merupakan serangkaian jilid yang membahas secara komprehensif konsep-konsep kunci dalam manajemen pemasaran. Mulai dari landasan teoretis hingga penerapan praktis, setiap jilid menyajikan pembaca pada berbagai aspek pemasaran modern. Dengan memberikan wawasan tentang riset pasar, strategi pemasaran, komunikasi merek, dan tren terkini dalam industri, setiap jilid dirancang untuk memberikan pemahaman menyeluruh tentang bagaimana mengelola dan mengoptimalkan upaya pemasaran. Dengan menggunakan contoh kasus dan studi industri, buku ini memberikan pandangan mendalam yang bermanfaat bagi mahasiswa, profesional pemasaran, dan pembaca yang tertarik dalam memahami dan mengimplementasikan manajemen pemasaran dalam berbagai konteks bisnis.','65b9dde308d34.jpg','2016','Jakarta',''),(78,'Pemasaran Strategik','Fandy Tjiptono dan Gregorius Chandra','-','-','Andi','978-979-2902-73-0','xix, 740 p.: bibl.; 23 cm','Buku ini membahas strategi pemasaran sebagai landasan utama dalam mencapai keunggulan bersaing di pasar yang dinamis. Dengan memfokuskan pada pendekatan strategik, pembaca diperkenalkan pada konsep-konsep dan alat analisis yang dapat membantu perusahaan merancang dan melaksanakan strategi pemasaran yang efektif. Mulai dari analisis lingkungan, segmentasi pasar, hingga pengembangan bauran pemasaran, buku ini menyoroti aspek-aspek kunci dalam perencanaan dan implementasi strategi pemasaran yang sukses. Melibatkan studi kasus dan aplikasi praktis, buku ini memberikan wawasan tentang bagaimana perusahaan dapat mengintegrasikan pendekatan strategik dalam pengambilan keputusan pemasaran mereka. Cocok untuk mahasiswa bisnis, manajer pemasaran, dan eksekutif perusahaan, buku ini menjadi panduan penting untuk memahami dan menerapkan pemasaran strategik dalam konteks bisnis saat ini.','65b9df06a9edb.jpg','2008','Yogyakarta',''),(79,'Menejemen Pemasaran Modern','Basu Swastha dan Hawan ','-','Edisi Kedua','Liberty','979-499-013-2','xix, 446 p.: bibl. ref.; 22 cm','Buku ini membahas evolusi dan konsep terkini dalam manajemen pemasaran, menyoroti perubahan signifikan yang terjadi dalam era bisnis modern. Dengan fokus pada strategi pemasaran yang responsif terhadap perubahan teknologi, perilaku konsumen, dan tren pasar, pembaca dibimbing melalui pendekatan yang inovatif dan adaptif. Konsep manajemen pemasaran digital, analisis data konsumen, dan integrasi strategi pemasaran online dan offline menjadi sorotan utama. Melibatkan studi kasus dan aplikasi praktis, buku ini memberikan panduan bagi pemimpin bisnis, profesional pemasaran, dan mahasiswa yang ingin memahami dan mengimplementasikan manajemen pemasaran modern untuk mencapai keberhasilan dalam lingkungan bisnis yang dinamis dan kompetitif.','65b9df97d9365.jpg','2008','Yogyakarta',''),(80,'Pemasaran : Teori dan Praktek Sehari-hari','William M. Pride','-','-','Binarupa Aksara','-','xxix, 583 hlm.: ilus.; 22 cm','Buku ini merangkum teori-teori pemasaran yang relevan dan aplikasinya dalam kehidupan sehari-hari. Dengan memberikan pemahaman mendalam tentang konsep-konsep dasar pemasaran, pembaca dibimbing melalui penerapan praktis dalam konteks situasi harian. Mulai dari segmentasi pasar, perilaku konsumen, hingga strategi pemasaran produk dan layanan, buku ini mengilustrasikan bagaimana teori pemasaran dapat diaplikasikan untuk mencapai keberhasilan dalam berbagai konteks bisnis. Melibatkan contoh-contoh kasus aktual dan skenario kehidupan sehari-hari, buku ini dirancang untuk memberikan pandangan yang mudah dimengerti bagi mahasiswa pemasaran, praktisi bisnis, dan semua yang ingin memahami bagaimana teori pemasaran dapat diterapkan dalam pengalaman nyata.','65b9e00e65ad4.jpg','1995','Jakarta',''),(81,'Manajemen Pemasaran: Sudut Pandang Asia',' Philip Kotler dan kawan-kawan','-','Edisi Ketiga','Indeks','979-683-698-X','xx, 396 p.: illus.; 27 cm','Buku ini menggambarkan manajemen pemasaran dari perspektif Asia, mempertimbangkan dinamika pasar, budaya, dan konteks bisnis unik di kawasan tersebut. Dengan fokus pada strategi pemasaran yang sesuai dengan keberagaman Asia, pembaca dibimbing melalui konsep-konsep kunci seperti pemahaman pasar lokal, adaptasi merek, dan integrasi teknologi digital. Buku ini juga mengeksplorasi perubahan dalam perilaku konsumen dan tren pemasaran yang khusus untuk Asia. Melibatkan contoh-contoh kasus dan studi khusus, buku ini menjadi sumber daya penting bagi praktisi pemasaran, manajer bisnis, dan mahasiswa yang tertarik untuk mendapatkan wawasan mendalam tentang strategi pemasaran yang efektif dalam konteks Asia yang beragam.','65b9e08fe8229.jpg','2004','Jakarta','');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jemaats`
--

DROP TABLE IF EXISTS `jemaats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jemaats` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `wilayah_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jemaats_wilayah_id_foreign` (`wilayah_id`),
  CONSTRAINT `jemaats_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jemaats`
--

LOCK TABLES `jemaats` WRITE;
/*!40000 ALTER TABLE `jemaats` DISABLE KEYS */;
INSERT INTO `jemaats` VALUES ('9f7050b5-199b-4b19-9d93-d1851c04c7bd','Mikael','Yogyakarta','pria','2020-09-06','0812345678','2025-07-20 14:36:31','2025-08-23 07:38:04',NULL,NULL),('9f70514c-de46-4f35-9aa1-7cd6d620cd2c','Yoga','asdlfmaower','pria','2020-09-06','0812345678','2025-07-20 14:38:11','2025-07-20 14:38:11',NULL,NULL),('9f705191-de48-4b9e-b368-16650af24261','mawar','asdfaeraf','wanita','2020-09-06','0812345678','2025-07-20 14:38:56','2025-08-23 05:11:22',NULL,NULL),('9f7051f7-4afb-4bfc-8d72-56b34a6accbd','asdfawr','asdfawrea','wanita','2020-09-06','0812345678','2025-07-20 14:40:03','2025-07-20 14:40:03',NULL,NULL),('9f705275-feb3-43a2-b2e5-92d6b7b7e62b','asdfare','asdfaer','wanita','2020-09-06','0812345678','2025-07-20 14:41:26','2025-10-17 10:26:41','2025-10-17 10:26:41',NULL),('9f7052d1-b85c-46f7-b2d0-68d239126c1a','asdfare','asdfas','pria','2020-09-06','0812345678','2025-07-20 14:42:26','2025-10-17 10:26:38','2025-10-17 10:26:38',NULL),('9f705317-0488-426d-b136-90de4e3c0829','asdfasr','asdfas','pria','2020-09-06','0812345678','2025-07-20 14:43:11','2025-07-20 14:43:11',NULL,NULL),('9f70533b-e397-429f-9ec7-e61eb9947bcc','asfdas','asdfasd','pria','2020-09-06','0812345678','2025-07-20 14:43:35','2025-07-20 14:43:35',NULL,NULL),('9f7053c9-543b-4201-8af1-046171e3909f','asdfasas','asdfaera','pria','2020-09-06','0812345678','2025-07-20 14:45:08','2025-07-20 14:45:08',NULL,NULL),('9f70556e-447a-48db-87bf-e758a0b7a6aa','sadfas','asdfasfd','pria','2025-07-21','0812345678','2025-07-20 14:49:44','2025-07-26 20:59:29','2025-07-26 20:59:29',NULL),('9f7055b1-6f64-4677-bbbd-9be2086874b5','sadfasd','sadfasdfa','pria','2025-07-14','0812345678','2025-07-20 14:50:28','2025-07-20 14:50:28',NULL,NULL),('9f705630-feb2-40bc-bfdb-2f499f497c96','asdfas','fasdf','pria','2025-07-21','0812345678','2025-07-20 14:51:52','2025-10-17 10:26:45','2025-10-17 10:26:45',NULL),('9f7056e4-305c-4ac6-8cd8-2bd6af24a735','asdfas','asdfas','pria','2025-07-21','0812345678','2025-07-20 14:53:49','2025-10-17 10:26:42','2025-10-17 10:26:42',NULL),('9f70589b-cd5c-44e3-91cd-77740f51b687','asdfasd','asdfasdf','pria','2025-07-21','0812345678','2025-07-20 14:58:37','2025-07-20 14:58:37',NULL,NULL),('9f7058d0-09b8-405f-8237-cc6a1ce8465b','dasfas','asdfaer','pria','2025-07-21','0812345678','2025-07-20 14:59:11','2025-07-20 14:59:11',NULL,NULL),('9f705905-3eb8-4c1d-84f8-6d52933f694f','sadfare','asdfasdf','pria','2025-07-21','0812345678','2025-07-20 14:59:46','2025-07-20 14:59:46',NULL,NULL),('9f70595b-2662-45c3-bf32-7ca5263ee428','sadfasdr','sadfads','pria','2025-07-21','0812345678','2025-07-20 15:00:42','2025-07-20 15:00:42',NULL,NULL),('9f7059cc-d491-4caa-bdae-dd46467d7957','asdfasdr','asdasreas','pria','2025-07-14','0812345678','2025-07-20 15:01:57','2025-07-20 15:01:57',NULL,NULL),('9f705ad0-5d29-4b38-a3a7-9911fba940a4','sadfast','asfdasdf','pria','2025-07-14','0812345678','2025-07-20 15:04:47','2025-07-20 15:04:47',NULL,NULL),('9f705af5-8ab6-4ad3-a540-41a5882b2225','asdas','asdada','pria','2025-07-14','0812345678','2025-07-20 15:05:11','2025-10-17 10:26:35','2025-10-17 10:26:35',NULL),('9f705c64-7584-4ead-898f-90fa3d51ea1f','asdfoasjoj','jasdoijoaijero','pria','2025-07-21','0812345678','2025-07-20 15:09:12','2025-07-20 15:09:12',NULL,NULL),('9fe45e44-1b77-42e7-b451-af78c564b1d1','jamson','jogja','pria','2025-06-10','0812345678','2025-09-16 14:10:28','2025-09-16 14:15:12',NULL,NULL),('a0226da7-b304-4420-8de9-c25ef2c735b6','Daniel','Jogja','pria','2000-01-26','0812345678','2025-10-17 10:34:50','2025-10-17 10:49:28','2025-10-17 10:49:28',NULL),('a022730e-ce8f-464d-bf95-eb858a1cf097','Daniel','Jogja','pria','2000-05-26','0812345678','2025-10-17 10:49:56','2025-10-17 10:49:56',NULL,NULL),('a07e0f81-fc10-4b9e-b179-47a87d9e9a2e','Siti','Medan','wanita','2001-12-08','0812345678','2025-12-01 23:47:45','2025-12-01 23:47:45',NULL,NULL);
/*!40000 ALTER TABLE `jemaats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidis`
--

DROP TABLE IF EXISTS `sidis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidis` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jemaat_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jemaat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_sidi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sidis_jemaat_id_foreign` (`jemaat_id`),
  CONSTRAINT `sidis_jemaat_id_foreign` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidis`
--

LOCK TABLES `sidis` WRITE;
/*!40000 ALTER TABLE `sidis` DISABLE KEYS */;
INSERT INTO `sidis` VALUES ('9f7cc4d9-6233-4954-9fd9-a1f7e3067215','9f70514c-de46-4f35-9aa1-7cd6d620cd2c',NULL,NULL,NULL,NULL,NULL,'2025-07-20','2025-07-26 19:11:14','2025-08-23 06:21:18',NULL),('9f7cc54f-f55f-43ad-aa12-604e20825119',NULL,'Michael','sagarawdasdf','pria','2000-01-01','0812345678','2025-07-13','2025-07-26 19:12:31','2025-07-26 21:15:08','2025-07-26 21:15:08'),('9fb404a6-c735-428d-942b-9b9e8fdb5fa9',NULL,'test','test','pria','2025-08-19','0812345678','2025-08-20','2025-08-23 06:20:09','2025-10-17 10:44:39',NULL),('a0226da8-5171-47c3-a8b2-a835b329463f',NULL,NULL,NULL,NULL,NULL,NULL,'2018-12-12','2025-10-17 10:34:50','2025-10-17 10:49:19','2025-10-17 10:49:19'),('a022730e-d0ee-4ef2-a89d-15e9ace3817e','a022730e-ce8f-464d-bf95-eb858a1cf097',NULL,NULL,NULL,NULL,NULL,'2018-07-12','2025-10-17 10:49:56','2025-10-17 11:08:15',NULL),('a022791d-b003-4f9a-b9e5-5dbc3e15d249','9f70533b-e397-429f-9ec7-e61eb9947bcc',NULL,NULL,NULL,NULL,NULL,'1998-10-10','2025-10-17 11:06:53','2025-10-17 11:06:53',NULL);
/*!40000 ALTER TABLE `sidis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pernikahans`
--

DROP TABLE IF EXISTS `pernikahans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pernikahans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pria_jemaat_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jemaat_pria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pria` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_pria` date DEFAULT NULL,
  `no_telepon_pria` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wanita_jemaat_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jemaat_wanita` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_wanita` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_wanita` date DEFAULT NULL,
  `no_telepon_wanita` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pernikahan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pernikahans_pria_jemaat_id_foreign` (`pria_jemaat_id`),
  KEY `pernikahans_wanita_jemaat_id_foreign` (`wanita_jemaat_id`),
  CONSTRAINT `pernikahans_pria_jemaat_id_foreign` FOREIGN KEY (`pria_jemaat_id`) REFERENCES `jemaats` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pernikahans_wanita_jemaat_id_foreign` FOREIGN KEY (`wanita_jemaat_id`) REFERENCES `jemaats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pernikahans`
--

LOCK TABLES `pernikahans` WRITE;
/*!40000 ALTER TABLE `pernikahans` DISABLE KEYS */;
INSERT INTO `pernikahans` VALUES ('a02274a1-4fbc-4539-ae2d-a420c112a044','9f7050b5-199b-4b19-9d93-d1851c04c7bd',NULL,NULL,NULL,NULL,'9f7051f7-4afb-4bfc-8d72-56b34a6accbd',NULL,NULL,NULL,NULL,'2000-10-10','2025-10-17 10:54:20','2025-10-17 10:54:20',NULL);
/*!40000 ALTER TABLE `pernikahans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatans`
--

DROP TABLE IF EXISTS `kegiatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatans`
--

LOCK TABLES `kegiatans` WRITE;
/*!40000 ALTER TABLE `kegiatans` DISABLE KEYS */;
INSERT INTO `kegiatans` VALUES ('a186f6f5-67b7-4400-9938-887e539c70dd','PHD INA Limasan','kamis','15:01:00','2026-04-12 16:13:29','2026-04-13 16:10:30',NULL,'<p>Ibadah di laksanakan pada hari kamis pukul 15:00 WIB</p><p>Berikut pelayan yang bertugas:</p><ol><li>Pak Bambang</li><li>Pak Susanto</li></ol>'),('a186f741-72f2-44b4-ad84-124926f392a8','Ibadah Minggu','minggu','11:00:00','2026-04-12 16:14:19','2026-04-12 16:19:18','2026-04-12 16:19:18',NULL);
/*!40000 ALTER TABLE `kegiatans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kehadirans`
--

DROP TABLE IF EXISTS `kehadirans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kehadirans` (
  `tanggal` date NOT NULL,
  `jumlah_hadir` int(11) NOT NULL,
  `tipe_ibadah` enum('ibadah 1','ibadah 2','ibadah 3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tanggal`,`tipe_ibadah`),
  UNIQUE KEY `kehadirans_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kehadirans`
--

LOCK TABLES `kehadirans` WRITE;
/*!40000 ALTER TABLE `kehadirans` DISABLE KEYS */;
INSERT INTO `kehadirans` VALUES ('2025-08-03',150,'ibadah 1','2026-04-07 13:22:05','2026-04-07 13:22:05',NULL,'a17caabb-6753-4227-b714-febd9302278f'),('2025-08-03',200,'ibadah 2','2025-08-12 07:36:09','2025-08-23 07:15:25',NULL,'sshewtrwet'),('2025-08-10',300,'ibadah 2','2025-08-12 07:28:19','2025-08-23 07:07:40',NULL,'zxasaasd'),('2025-11-02',150,'ibadah 3','2025-11-02 13:17:40','2025-11-02 13:17:53',NULL,'a042d7a1-9c7b-47ec-9fe0-967019b56a84'),('2026-03-02',167,'ibadah 1','2026-04-13 16:12:30','2026-04-13 16:23:23',NULL,'a188f997-2f5e-4da6-a62f-8b79ac17089d'),('2026-04-01',155,'ibadah 1','2026-04-13 16:12:09','2026-04-13 16:27:47',NULL,'a188f975-6292-49d9-a783-3806976effc2');
/*!40000 ALTER TABLE `kehadirans` ENABLE KEYS */;
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
-- Table structure for table `kematians`
--

DROP TABLE IF EXISTS `kematians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kematians` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jemaat_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_jemaat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kematian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kematians_jemaat_id_foreign` (`jemaat_id`),
  CONSTRAINT `kematians_jemaat_id_foreign` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kematians`
--

LOCK TABLES `kematians` WRITE;
/*!40000 ALTER TABLE `kematians` DISABLE KEYS */;
INSERT INTO `kematians` VALUES ('9f7cc838-4bb8-4ac2-b238-b68b5db6ee2c','9f705191-de48-4b9e-b368-16650af24261',NULL,NULL,NULL,NULL,NULL,'2025-07-15','2025-07-26 19:20:38','2025-07-26 21:19:35','2025-07-26 21:19:35'),('9f7cc93f-86b3-4d40-9aae-1cda9a71e897',NULL,'test','etst','pria','2025-08-18','0812345678','2025-07-15','2025-07-26 19:23:31','2025-08-23 06:40:04',NULL);
/*!40000 ALTER TABLE `kematians` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(7,'2025_07_20_210015_create_jemaats_table',2),(10,'2025_07_20_221256_create_baptis_table',3),(11,'2025_07_27_020212_create_sidis_table',4),(12,'2025_07_27_021346_create_kematians_table',5),(13,'2025_07_27_022616_create_pernikahans_table',6),(15,'2025_07_27_030246_create_kelahirans_table',7),(19,'2025_08_12_133721_create_kehadirans_table',8),(23,'2025_08_23_125205_drop_kelahiran_table',9),(24,'2025_08_23_135156_add_unique_kehadiran_table',10),(30,'2025_01_01_000000_create_staffs_table',11),(31,'2025_09_16_203552_create_wilayahs_table',11),(32,'2025_09_16_203553_update_jemaats_table',11),(33,'2025_01_01_000001_create_galleries_table',12),(35,'2026_04_12_224153_create_kegiatans_table',13),(36,'2026_04_12_224154_update_kegiatans_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-13 16:14:14
