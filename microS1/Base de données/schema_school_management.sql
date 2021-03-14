-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: School_Management_System
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classroom` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom`
--

LOCK TABLES `classroom` WRITE;
/*!40000 ALTER TABLE `classroom` DISABLE KEYS */;
INSERT INTO `classroom` VALUES (1,'English:communication'),(2,'English:civilization'),(3,'French:civilization'),(4,'French:communication'),(5,'Geography');
/*!40000 ALTER TABLE `classroom` ENABLE KEYS */;
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
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_02_03_212209_create_class_table',0),(5,'2021_02_03_212209_create_failed_jobs_table',0),(6,'2021_02_03_212209_create_password_resets_table',0),(7,'2021_02_03_212209_create_student_table',0),(8,'2021_02_03_212209_create_student_subjects_table',0),(9,'2021_02_03_212209_create_subject_table',0),(10,'2021_02_03_212209_create_teacher_table',0),(11,'2021_02_03_212209_create_teacher_classes_table',0),(12,'2021_02_03_212209_create_teacher_students_table',0),(13,'2021_02_03_212209_create_user_table',0),(14,'2021_02_03_212209_create_users_table',0),(15,'2021_02_03_212212_add_foreign_keys_to_student_subjects_table',0),(16,'2021_02_03_212212_add_foreign_keys_to_teacher_classes_table',0),(17,'2021_02_03_212212_add_foreign_keys_to_teacher_students_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `class_ext_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'anwar','benjeddou','anwar.benjeddou@gmail.com','93572564',NULL),(2,'rafik','haddad','rafik.haddad@gmail.com','22078222',NULL),(3,'ahmed','rahameni','ahmed.ahmed@gmail.com','22078222',NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_subjects`
--

DROP TABLE IF EXISTS `student_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_subjects` (
  `student_ext_id` bigint unsigned NOT NULL,
  `subject_ext_id` bigint unsigned NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  KEY `fk_student_subjects_1_idx` (`student_ext_id`),
  KEY `fk_student_subjects_2_idx` (`subject_ext_id`),
  CONSTRAINT `fk_student_subjects_1` FOREIGN KEY (`student_ext_id`) REFERENCES `student` (`id`),
  CONSTRAINT `fk_student_subjects_2` FOREIGN KEY (`subject_ext_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_subjects`
--

LOCK TABLES `student_subjects` WRITE;
/*!40000 ALTER TABLE `student_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `credit` decimal(5,2) unsigned DEFAULT NULL,
  `coefficient` decimal(5,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'E.E.A.A.',4.00,1.30),(2,'English',5.00,1.36),(3,'.Net',NULL,NULL),(4,'E.E.A.',NULL,NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `subject_ext_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'amir','dridi','amir.dridi@gmail.com','22078223',NULL),(2,'amir','haddad','amir.haddad@gmail.com','22078223',1),(4,'ahmed','rahameni','ahmed.rahamani@outlook.fr','41526398',1),(5,'jamil','dridi','jamil.dridi@outlook.fr','12345678',NULL),(7,'walid','heni','walid.heni@outlook.fr','12345678',1);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_classes`
--

DROP TABLE IF EXISTS `teacher_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_classes` (
  `teacher_ext_id` bigint unsigned NOT NULL,
  `class_ext_id` bigint unsigned NOT NULL,
  KEY `fk_teacher_classes_2_idx` (`teacher_ext_id`),
  KEY `fk_teacher_classes_1_idx` (`class_ext_id`),
  CONSTRAINT `fk_teacher_classes_1` FOREIGN KEY (`class_ext_id`) REFERENCES `classroom` (`id`),
  CONSTRAINT `fk_teacher_classes_2` FOREIGN KEY (`teacher_ext_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_classes`
--

LOCK TABLES `teacher_classes` WRITE;
/*!40000 ALTER TABLE `teacher_classes` DISABLE KEYS */;
INSERT INTO `teacher_classes` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `teacher_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_students`
--

DROP TABLE IF EXISTS `teacher_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_students` (
  `teacher_ext_id` bigint unsigned NOT NULL,
  `student_ext_id` bigint unsigned NOT NULL,
  KEY `fk_teacher_students_1_idx` (`student_ext_id`),
  KEY `fk_teacher_students_2_idx` (`teacher_ext_id`),
  CONSTRAINT `fk_teacher_students_1` FOREIGN KEY (`student_ext_id`) REFERENCES `student` (`id`),
  CONSTRAINT `fk_teacher_students_2` FOREIGN KEY (`teacher_ext_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_students`
--

LOCK TABLES `teacher_students` WRITE;
/*!40000 ALTER TABLE `teacher_students` DISABLE KEYS */;
INSERT INTO `teacher_students` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `teacher_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2021-02-13 18:28:19
