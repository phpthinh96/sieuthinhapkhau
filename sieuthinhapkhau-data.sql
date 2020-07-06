-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: sieuthinhapkhau
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com','$2y$10$MGMreBm4ku4kflRysbksO.BcSvXbJC/sPwniwWdhtQ.Jjm90l7E4S','ESRgkabeYaJRBoM1orxj2n62ZkTMlQs2NMEPbwfbQNV9B5GOvR0w7p2kPDrP','2018-04-09 10:37:25','2018-04-09 10:37:25');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `binhluan_noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `binhluan_trang_thai` int NOT NULL,
  `sanpham_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `binhluan_sanpham_id_foreign` (`sanpham_id`),
  KEY `binhluan_user_id_foreign` (`user_id`),
  CONSTRAINT `binhluan_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `binhluan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
INSERT INTO `binhluan` VALUES (1,'Màu đẹp lắm',1,20,4,'2018-04-11 18:07:13','2018-04-11 18:09:21'),(2,'Ngon',1,16,4,'2018-04-11 18:08:38','2018-04-11 18:09:13');
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietdonhang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sanpham_id` int unsigned NOT NULL,
  `donhang_id` int unsigned NOT NULL,
  `chitietdonhang_don_gia` decimal(10,2) NOT NULL,
  `chitietdonhang_so_luong` int NOT NULL,
  `chitietdonhang_thanh_tien` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chitietdonhang_sanpham_id_foreign` (`sanpham_id`),
  KEY `chitietdonhang_donhang_id_foreign` (`donhang_id`),
  CONSTRAINT `chitietdonhang_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chitietdonhang_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietdonhang`
--

LOCK TABLES `chitietdonhang` WRITE;
/*!40000 ALTER TABLE `chitietdonhang` DISABLE KEYS */;
INSERT INTO `chitietdonhang` VALUES (4,34,4,20000.00,35,700000.00,'2018-04-11 17:34:55','2018-04-11 17:34:55'),(5,24,4,180000.00,2,360000.00,'2018-04-11 17:34:55','2018-04-11 17:34:55'),(6,2,4,200000.00,5,1000000.00,'2018-04-11 17:34:55','2018-04-11 17:34:55'),(7,6,4,450000.00,10,4500000.00,'2018-04-11 17:34:59','2018-04-11 17:34:59'),(8,16,5,59000.00,2,118000.00,'2018-04-11 18:11:43','2018-04-11 18:11:43'),(9,20,6,780000.00,2,1560000.00,'2018-04-17 17:40:44','2018-04-17 17:40:44'),(10,36,6,56000.00,2,112000.00,'2018-04-17 17:40:44','2018-04-17 17:40:44');
/*!40000 ALTER TABLE `chitietdonhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donhang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `donhang_nguoi_nhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donhang_tong_tien_truoc_thue` decimal(10,2) NOT NULL,
  `donhang_tax` decimal(10,2) NOT NULL,
  `donhang_tong_tien` decimal(10,2) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `tinhtrangdonhang_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donhang_user_id_foreign` (`user_id`),
  KEY `donhang_tinhtrangdonhang_id_foreign` (`tinhtrangdonhang_id`),
  CONSTRAINT `donhang_tinhtrangdonhang_id_foreign` FOREIGN KEY (`tinhtrangdonhang_id`) REFERENCES `tinhtrangdonhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` VALUES (4,'Phạm Nhật Trường','truong@gmail.com','0987654321','Hẻm 15, Trần Văn Hoài, Cần Thơ','',6560000.00,65600.00,6625600.00,4,2,'2018-02-28 17:34:53','2018-02-28 17:35:41'),(5,'Phạm Nhật Trường','truong@gmail.com','0987654321','Hẻm 15, Trần Văn Hoài, Cần Thơ','',118000.00,1180.00,119180.00,4,2,'2018-04-11 18:11:43','2018-04-14 17:57:31'),(6,'Phạm Hồng Thái','thai@gmail.com','01629944542','Hẻm 83, Đường 3/2, Cần Thơ','',1672000.00,16720.00,1688720.00,1,1,'2018-04-17 17:40:44','2018-04-17 17:40:44');
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donvitinh`
--

DROP TABLE IF EXISTS `donvitinh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donvitinh` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `donvitinh_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donvitinh`
--

LOCK TABLES `donvitinh` WRITE;
/*!40000 ALTER TABLE `donvitinh` DISABLE KEYS */;
INSERT INTO `donvitinh` VALUES (1,'Kg','2018-04-09 10:54:13','2018-04-09 10:54:13'),(2,'Chai','2018-04-10 17:17:12','2018-04-10 17:17:12'),(3,'Thỏi','2018-04-10 17:17:42','2018-04-11 17:01:37'),(4,'Thùng','2018-04-10 17:19:37','2018-04-10 17:19:37'),(5,'Lon','2018-04-11 15:26:24','2018-04-11 15:26:24'),(6,'Hộp','2018-04-11 16:02:22','2018-04-11 16:02:22');
/*!40000 ALTER TABLE `donvitinh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaisanpham`
--

DROP TABLE IF EXISTS `loaisanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loaisanpham` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `loaisanpham_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaisanpham_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaisanpham_mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhom_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loaisanpham_nhom_id_foreign` (`nhom_id`),
  CONSTRAINT `loaisanpham_nhom_id_foreign` FOREIGN KEY (`nhom_id`) REFERENCES `nhom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaisanpham`
--

LOCK TABLES `loaisanpham` WRITE;
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` VALUES (1,'Hạt Dinh Dưỡng','hat-dinh-duong','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>',1,'2018-04-09 10:56:52','2018-04-13 02:02:56'),(3,'Bia & Rượu Vang','bia-ruou-vang','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>',3,'2018-04-10 16:38:53','2018-04-10 16:38:53'),(4,'Son Môi','son-moi','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>',4,'2018-04-10 16:42:25','2018-04-10 16:42:25'),(5,'Nước & Nước Ép','nuoc-nuoc-ep','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>',3,'2018-04-11 14:08:33','2018-04-11 14:08:33');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(5,'2018_03_06_083653_tinhtrangdonhang_table',1),(7,'2018_03_06_083736_donvitinh_table',1),(9,'2018_03_06_083903_nhom_table',1),(10,'2018_03_06_084155_nhacungcap_table',1),(12,'2018_03_06_084415_slide_table',1),(14,'2018_03_27_211925_admin_table',1),(15,'2018_03_30_202629_ykien_table',1),(16,'2018_04_09_165039_revisions_table',1),(17,'2018_03_06_083552_donhang_table',2),(18,'2018_03_06_083757_loaisanpham_table',2),(19,'2018_03_06_083715_sanpham_table',3),(20,'2018_03_06_083608_chitietdonhang_table',4),(21,'2018_03_06_084218_binhluan_table',4),(22,'2018_03_11_082620_thongke_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhacungcap` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nhacungcap_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhacungcap_dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhacungcap_sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhacungcap`
--

LOCK TABLES `nhacungcap` WRITE;
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` VALUES (1,'quaoccho.vn','<p>Nec a dignissim a et mus urna massa dignissim ultrices.</p>','01231234567','2018-04-09 10:57:23','2018-04-10 17:11:55'),(2,'khoruou.com','<p>Nec a dignissim a et mus urna massa dignissim ultrices.</p>','01234456456','2018-04-10 17:10:46','2018-04-10 17:10:46'),(3,'mangmypham.com','<p>Nec a dignissim a et mus urna massa dignissim ultrices.</p>','0987678678','2018-04-11 09:37:15','2018-04-11 09:37:15'),(4,'websosanh.vn','<p>Nec a dignissim a et mus urna massa dignissim ultrices.</p>','01236678345','2018-04-11 14:13:19','2018-04-11 14:14:12');
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhom`
--

DROP TABLE IF EXISTS `nhom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhom` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nhom_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhom_mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhom`
--

LOCK TABLES `nhom` WRITE;
/*!40000 ALTER TABLE `nhom` DISABLE KEYS */;
INSERT INTO `nhom` VALUES (1,'Thực Phẩm','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>','2018-04-09 10:56:37','2018-04-10 16:18:01'),(3,'Đồ Uống','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>','2018-04-10 16:06:10','2018-04-10 16:20:52'),(4,'Làm Đẹp','<p>Magna vestibulum odio gravida blandit eros eleifend mus risus dictumst porttitor porttitor est penatibus vel pharetra.Condimentum facilisi varius cras.</p>','2018-04-10 16:33:57','2018-04-10 16:33:57');
/*!40000 ALTER TABLE `nhom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
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
-- Table structure for table `revisions`
--

DROP TABLE IF EXISTS `revisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revisions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `revisionable_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `key` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `new_value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`(191))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revisions`
--

LOCK TABLES `revisions` WRITE;
/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
INSERT INTO `revisions` VALUES (1,'App\\SanPham',20,1,'sanpham_ten','Son Môi Son YSL Rouge Volupté Shine Pháp','Son Môi YSL Rouge Volupté Shine Pháp','2018-04-13 02:58:52','2018-04-13 02:58:52'),(2,'App\\SanPham',20,1,'sanpham_gia','780000.00','830000.00','2018-04-13 02:58:52','2018-04-13 02:58:52'),(3,'App\\SanPham',20,1,'sanpham_gia_khuyen_mai','830000.00','780000.00','2018-04-13 02:58:52','2018-04-13 02:58:52');
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sanpham_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham_gia` decimal(10,2) NOT NULL,
  `sanpham_gia_khuyen_mai` decimal(10,2) NOT NULL,
  `sanpham_noi_bat` int NOT NULL,
  `loaisanpham_id` int unsigned NOT NULL,
  `donvitinh_id` int unsigned NOT NULL,
  `nhacungcap_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sanpham_loaisanpham_id_foreign` (`loaisanpham_id`),
  KEY `sanpham_donvitinh_id_foreign` (`donvitinh_id`),
  KEY `sanpham_nhacungcap_id_foreign` (`nhacungcap_id`),
  CONSTRAINT `sanpham_donvitinh_id_foreign` FOREIGN KEY (`donvitinh_id`) REFERENCES `donvitinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_loaisanpham_id_foreign` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_nhacungcap_id_foreign` FOREIGN KEY (`nhacungcap_id`) REFERENCES `nhacungcap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Hạt Hạnh Nhân','hat-hanh-nhan','HptsT_hanh nh.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',300000.00,280000.00,1,1,1,1,'2018-04-10 14:36:15','2018-04-10 14:44:55'),(2,'Hạt Lanh','hat-lanh','JVUbU_hat-lanh.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',250000.00,200000.00,1,1,1,1,'2018-03-01 15:11:31','2018-04-10 15:11:31'),(3,'Quả Hồ Đào','qua-ho-dao','iIfM8_qua-ho-dao1.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',350000.00,300000.00,1,1,1,1,'2018-04-10 15:18:02','2018-04-10 15:19:14'),(4,'Quả Mắc Ca','qua-mac-ca','92wSw_mac ca.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',380000.00,350000.00,1,1,1,1,'2018-03-01 15:22:42','2018-04-10 15:22:42'),(5,'Quả óc chó','qua-oc-cho','EJoei_qua oc cho.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',350000.00,290000.00,1,1,1,1,'2018-04-10 15:28:33','2018-04-10 15:28:33'),(6,'Hạt Dẻ Cười','hat-de-cuoi','nEj6S_hat de.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',500000.00,450000.00,1,1,1,1,'2018-03-01 15:35:01','2018-04-10 15:35:01'),(7,'Hạt Điều','hat-dieu','dkEIH_hat .jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',400000.00,380000.00,1,1,1,1,'2018-04-10 15:41:05','2018-04-10 15:41:05'),(8,'Hạt Thông Mỹ','hat-thong-my','ji24U_hat-thong-my-4.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',650000.00,580000.00,1,1,1,1,'2018-03-01 15:46:24','2018-04-10 15:46:24'),(9,'Hạt Bí Ngô','hat-bi-ngo','Jy29d_hat bi ng.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',200000.00,150000.00,1,1,1,1,'2018-04-10 15:54:21','2018-04-10 16:00:25'),(10,'Rượu Sâm Banh Pháp Charles De Cazanove - 750ml 12 độ','ruou-sam-banh-phap-charles-de-cazanove-750ml-12-do','AXWBD_vangphap.png','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',649000.00,0.00,1,3,2,2,'2018-02-28 17:35:24','2018-04-11 16:45:28'),(11,'Rượu Vang Đỏ Pháp Cabernet Sauvignon Fat Bastard - 750ml 13 độ','ruou-vang-do-phap-cabernet-sauvignon-fat-bastard-750ml-13-do','Y7DIq_vang .jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',352000.00,0.00,1,3,2,2,'2018-04-10 18:17:35','2018-04-10 18:17:35'),(12,'Rượu Nhật Bản Chivas Regal Mizunara - 700ml nồng độ 40%','ruou-nhat-ban-chivas-regal-mizunara-700ml-nong-do-40-','Y65rI_ruou nhat.png','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',1350000.00,0.00,1,3,2,2,'2018-02-28 18:43:22','2018-04-10 18:43:22'),(13,'Bia Budweiser - Thùng 12 lon x 500ml','bia-budweiser-thung-12-lon-x-500ml','nV3MA_bia budweiser.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',330000.00,287000.00,1,3,4,2,'2018-04-10 19:08:13','2018-04-11 05:54:44'),(14,'Bia Filou Bỉ 330ml','bia-filou-bi-330ml','rFZKV_bia filou.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',150000.00,130000.00,1,3,2,2,'2018-03-01 05:53:36','2018-04-11 08:55:01'),(15,'Bia Bush Amber Bỉ 330ml','bia-bush-amber-bi-330ml','sqeDq_bia bush.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',150000.00,110000.00,1,3,2,2,'2018-04-11 09:00:27','2018-04-11 12:39:19'),(16,'Rượu soju Hàn Quốc CHAMISUL 360ml','ruou-soju-han-quoc-chamisul-360ml','qa1wh_sochu.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',59000.00,0.00,1,3,2,2,'2018-03-01 09:04:42','2018-04-11 09:04:42'),(17,'Bia Weltenburger Kloster Anno 1050 Đức 500ml','bia-weltenburger-kloster-anno-1050-duc-500ml','RLSUY_bia duc.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',62000.00,0.00,1,3,2,2,'2018-04-11 09:19:29','2018-04-11 09:19:29'),(18,'Rượu Sake Vảy Vàng Hakushika  Nhật Bản 1800ml','ruou-sake-vay-vang-hakushika-nhat-ban-1800ml','0Ix1w_sake.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',1050000.00,880000.00,1,3,2,2,'2018-03-01 09:27:49','2018-04-11 09:27:49'),(19,'Son Môi Queen Saint Canada','son-moi-queen-saint-canada','hIUAQ_son9.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',550000.00,529000.00,1,4,3,3,'2018-04-11 09:39:47','2018-04-11 12:09:03'),(20,'Son Môi YSL Rouge Volupté Shine Pháp','son-moi-ysl-rouge-volupte-shine-phap','wVMKp_son8.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',830000.00,780000.00,1,4,3,3,'2018-03-01 09:44:49','2018-04-13 02:58:52'),(21,'Son Môi Chanel Rouge Allure Lipstick Flamboyante 84 Pháp','son-moi-chanel-rouge-allure-lipstick-flamboyante-84-phap','9DndC_son channel.jpeg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',828000.00,782000.00,1,4,3,3,'2018-04-11 10:05:42','2018-04-11 13:19:15'),(22,'Son Môi Sisley Hydrating Pháp','son-moi-sisley-hydrating-phap','sPlLb_son7.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',1500000.00,1380000.00,1,4,3,3,'2018-03-01 10:11:12','2018-04-11 10:38:22'),(23,'Son Môi Revlon Siren 677 Mỹ','son-moi-revlon-siren-677-my','AXDTw_son2.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',200000.00,0.00,1,4,3,3,'2018-04-11 10:13:52','2018-04-11 10:13:52'),(24,'Son Môi l\'oreal colour riche Mỹ','son-moi-loreal-colour-riche-my','uaya8_son3.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',180000.00,0.00,1,4,3,3,'2018-03-01 10:20:14','2018-04-11 10:20:14'),(25,'Son Môi Vikos Magic Lipstick Poppy Orange Hàn Quốc','son-moi-vikos-magic-lipstick-poppy-orange-han-quoc','Z86lX_son10.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',320000.00,299000.00,1,4,3,3,'2018-04-11 10:22:50','2018-04-11 12:27:13'),(26,'Son Môi Ecole Delight Hàn Quốc','son-moi-ecole-delight-han-quoc','Qdvyo_son5.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',230000.00,0.00,1,4,3,3,'2018-04-11 10:26:50','2018-04-11 10:26:50'),(27,'Son Môi Rose Balm Mỹ','son-moi-rose-balm-my','yZuzE_son6.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',690000.00,0.00,1,4,3,3,'2018-04-11 10:31:34','2018-04-11 10:31:34'),(28,'Nước gạo rang Woogjin Hàn Quốc 1,5L','nuoc-gao-rang-woogjin-han-quoc-1-5l','Fo1rf_nuocgao.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',60000.00,0.00,1,5,2,4,'2018-04-11 14:17:33','2018-04-11 14:17:33'),(29,'Nước Ép Nho Welch\'s 100% Nguyên Chất Nhập Từ Mỹ 296ml','nuoc-ep-nho-welchs-100-nguyen-chat-nhap-tu-my-296ml','azWWh_nuocnho.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',38000.00,30000.00,1,5,2,4,'2018-04-11 14:29:32','2018-04-11 14:51:55'),(30,'Nước Ép Táo Welch\'s Mỹ 340ml','nuoc-ep-tao-welchs-my-340ml','R1AIf_eptao.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',32000.00,25000.00,1,5,5,4,'2018-04-11 14:39:12','2018-04-11 16:32:56'),(31,'Nước Hồng Sâm Hàn Quốc 10 chai x 120ml','nuoc-hong-sam-han-quoc-10-chai-x-120ml','8gmpD_hongsam.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',420000.00,380000.00,1,5,4,4,'2018-04-11 15:14:17','2018-04-11 15:14:17'),(32,'Nước ngọt Dr Pepper Cherry 355ml của Mỹ','nuoc-ngot-dr-pepper-cherry-355ml-cua-my','PIS9c_nuocdr.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',24000.00,20000.00,1,5,5,4,'2018-04-11 15:26:02','2018-04-11 15:27:15'),(33,'Nước ép Berri táo hộp giấy 1L','nuoc-ep-berri-tao-hop-giay-1l','Yb19D_berri.png','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',52000.00,0.00,1,5,6,4,'2018-04-11 16:01:36','2018-04-11 16:18:00'),(34,'Coca Cola Hương Vanilla của Mỹ','coca-cola-huong-vanilla-cua-my','5iAwL_cocavani.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',20000.00,0.00,1,5,5,4,'2018-04-11 16:12:32','2018-04-11 16:13:33'),(35,'Nước Ép Nho Hàn Quốc 238ml','nuoc-ep-nho-han-quoc-238ml','23U9L_nhoxanh.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',20000.00,17000.00,1,5,5,4,'2018-04-11 16:25:44','2018-04-11 16:25:44'),(36,'Nước ép trái cây hỗn hợp Ceres hộp 1 lít','nuoc-ep-trai-cay-hon-hop-ceres-hop-1-lit','oSjkJ_ephonhop.jpg','<p>Leo ultricies praesent sem cum viverra penatibus suspendisse commodo faucibus enim mus mi parturient cum adipiscing tincidunt egestas primis tempus adipiscing a accumsan blandit facilisis est a commodo.Condimentum vulputate.</p>',56000.00,0.00,1,5,6,4,'2018-04-11 16:39:21','2018-04-11 16:39:21');
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slide_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'GtrFu_slide4.jpg','2018-04-09 11:26:53','2018-04-11 18:43:04'),(2,'VDdn0_slide5.jpg','2018-04-09 11:27:13','2018-04-11 18:58:31'),(3,'tDdhf_slide6.jpg','2018-04-09 11:27:21','2018-04-11 19:02:12');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongke`
--

DROP TABLE IF EXISTS `thongke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thongke` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sanpham_id` int unsigned NOT NULL,
  `thongke_so_luong_nhap` int NOT NULL,
  `thongke_so_luong_da_ban` int NOT NULL,
  `thongke_so_luong_hien_tai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thongke_sanpham_id_foreign` (`sanpham_id`),
  CONSTRAINT `thongke_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongke`
--

LOCK TABLES `thongke` WRITE;
/*!40000 ALTER TABLE `thongke` DISABLE KEYS */;
INSERT INTO `thongke` VALUES (1,1,50,0,50,'2018-04-10 14:36:16','2018-04-10 14:36:16'),(2,2,20,5,15,'2018-03-01 15:11:32','2018-02-28 17:35:44'),(3,3,10,0,10,'2018-04-10 15:18:02','2018-04-10 15:18:02'),(4,4,20,0,20,'2018-03-01 15:22:43','2018-04-10 15:22:43'),(5,5,50,0,50,'2018-04-10 15:28:33','2018-04-10 15:28:33'),(6,6,30,10,20,'2018-03-01 15:35:02','2018-02-28 17:35:44'),(7,7,50,0,50,'2018-04-10 15:41:05','2018-04-10 15:41:05'),(8,8,10,0,10,'2018-03-01 15:46:25','2018-04-10 15:46:25'),(9,9,40,0,40,'2018-04-10 15:54:21','2018-04-10 15:54:21'),(10,10,5,0,5,'2018-02-28 17:35:25','2018-04-10 17:35:25'),(11,11,5,0,5,'2018-04-10 18:17:36','2018-04-10 18:17:36'),(12,12,2,0,2,'2018-02-28 18:43:22','2018-04-10 18:43:22'),(13,13,20,0,20,'2018-04-10 19:08:13','2018-04-10 19:08:13'),(14,14,20,0,20,'2018-03-01 05:53:40','2018-04-11 05:53:40'),(15,14,100,0,120,'2018-04-11 08:49:47','2018-04-11 08:49:47'),(16,15,120,0,120,'2018-03-01 09:00:28','2018-04-11 09:00:28'),(17,16,100,2,98,'2018-04-11 09:04:42','2018-04-14 17:57:31'),(18,17,100,0,100,'2018-03-01 09:19:38','2018-04-11 09:19:38'),(19,18,10,0,10,'2018-04-11 09:27:50','2018-04-11 09:27:50'),(20,19,100,0,100,'2018-03-01 09:39:48','2018-04-11 09:39:48'),(21,20,100,0,100,'2018-04-11 09:44:50','2018-04-11 09:44:50'),(22,21,10,0,10,'2018-03-01 10:05:42','2018-04-11 10:05:42'),(23,22,20,0,20,'2018-04-11 10:11:13','2018-04-11 10:11:13'),(24,23,15,0,15,'2018-03-01 10:13:53','2018-04-11 10:13:53'),(25,24,20,2,18,'2018-04-11 10:20:15','2018-02-28 17:35:44'),(26,25,5,0,5,'2018-04-11 10:22:50','2018-04-11 10:22:50'),(27,26,5,0,5,'2018-04-11 10:26:50','2018-04-11 10:26:50'),(28,27,10,0,10,'2018-04-11 10:31:35','2018-04-11 10:31:35'),(29,22,5,0,25,'2018-04-11 10:38:22','2018-04-11 10:38:22'),(30,28,50,0,50,'2018-04-11 14:17:33','2018-04-11 14:17:33'),(31,29,20,0,20,'2018-04-11 14:29:33','2018-04-11 14:29:33'),(32,30,20,0,20,'2018-04-11 14:39:16','2018-04-11 14:39:16'),(33,31,10,0,10,'2018-04-11 15:14:17','2018-04-11 15:14:17'),(34,32,60,0,60,'2018-04-11 15:26:02','2018-04-11 15:26:02'),(35,33,10,0,10,'2018-04-11 16:01:41','2018-04-11 16:01:41'),(36,34,60,35,25,'2018-04-11 16:12:33','2018-02-28 17:35:44'),(37,35,60,0,60,'2018-04-11 16:25:44','2018-04-11 16:25:44'),(38,36,10,0,10,'2018-04-11 16:39:21','2018-04-11 16:39:21'),(39,1,20,0,70,'2018-04-13 01:59:01','2018-04-13 01:59:01'),(40,1,20,0,90,'2018-04-16 12:38:06','2018-04-16 12:38:06');
/*!40000 ALTER TABLE `thongke` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tinhtrangdonhang`
--

DROP TABLE IF EXISTS `tinhtrangdonhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tinhtrangdonhang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tinhtrangdonhang_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tinhtrangdonhang`
--

LOCK TABLES `tinhtrangdonhang` WRITE;
/*!40000 ALTER TABLE `tinhtrangdonhang` DISABLE KEYS */;
INSERT INTO `tinhtrangdonhang` VALUES (1,'Chưa giao',NULL,NULL),(2,'Đã thanh toán',NULL,NULL);
/*!40000 ALTER TABLE `tinhtrangdonhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Thái','Phạm Hồng Thái','thai@gmail.com','$2y$10$BT8Ff9TdNJy.F3nCEOpoOe3NCuooqo.eRX.JnH5LANiU6RMizsyKO','BzQ4V_Koala.jpg','01629944542','Hẻm 83, Đường 3/2, Cần Thơ','H3PosuuSDyC0OgCwKJR84HNA81JRnWNLgD2S32o66o2iUjq5s55ZzjLtDNXh','2018-04-09 11:42:18','2018-04-13 12:14:23'),(3,'Triệu Dĩ','Nguyễn Triệu Dĩ','di@gmail.com','$2y$10$NLGjl8TQL4ALettpanCsFOpvxi8lrmzYARu1GZ0mQzkU0lfq1KM7y','','0123456789','KTX B, Đại Hoc Cần Thơ',NULL,'2018-04-11 17:18:27','2018-04-11 17:18:27'),(4,'Trường','Phạm Nhật Trường','truong@gmail.com','$2y$10$tUf/5bDMyoQPf9NhLC4rh.A4WACBxRZltLmgCIT38bNcibK5tKlZm','','0987654321','Hẻm 15, Trần Văn Hoài, Cần Thơ',NULL,'2018-04-11 17:20:19','2018-04-11 17:20:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ykien`
--

DROP TABLE IF EXISTS `ykien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ykien` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ykien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ykien`
--

LOCK TABLES `ykien` WRITE;
/*!40000 ALTER TABLE `ykien` DISABLE KEYS */;
INSERT INTO `ykien` VALUES (1,'di','di@gmail.com','Cần cải thiện tốc độ load trang','2018-04-13 00:44:35','2018-04-13 00:44:35'),(2,'thai','thai@gmail.com','Cần thêm nhiều sản phẩm hơn','2018-04-14 16:13:36','2018-04-14 16:13:36');
/*!40000 ALTER TABLE `ykien` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-06 15:10:20
