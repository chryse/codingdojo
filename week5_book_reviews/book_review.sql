-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: book_review
-- ------------------------------------------------------
-- Server version	5.5.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Ruby on Rails','Name A',1,'2015-02-12 16:36:18','2015-02-12 16:36:18'),(2,'Python','Name A',1,'2015-02-12 16:36:34','2015-02-12 16:36:34'),(3,'Ruby on Rails','Name C',1,'2015-02-12 16:48:49','2015-02-12 16:48:49'),(4,'asfasf','asfsafas',1,'2015-02-12 16:49:26','2015-02-12 16:49:26'),(5,'asfasf','asfsafas',1,'2015-02-12 16:50:27','2015-02-12 16:50:27'),(6,'Ruby on Rails','Name A',1,'2015-02-12 17:27:39','2015-02-12 17:27:39'),(7,'safasfas','Name B',1,'2015-02-12 18:55:21','2015-02-12 18:55:21'),(8,'afasfasfasfasf','Name E',4,'2015-02-12 19:20:15','2015-02-12 19:20:15'),(9,'Python','aadfg',4,'2015-02-12 19:21:39','2015-02-12 19:21:39');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review` text COLLATE utf8_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (2,'asfasfasfas',3,1,4,'2015-02-12 16:49:26','2015-02-12 16:49:26'),(6,'review11231131313',1,1,2,'2015-02-12 17:27:39','2015-02-12 17:27:39'),(7,'asfsafsa',2,1,7,'2015-02-12 18:55:21','2015-02-12 18:55:21'),(8,'asfasfasf',3,4,8,'2015-02-12 19:20:15','2015-02-12 19:20:15'),(9,'34241241234124124',4,4,9,'2015-02-12 19:21:39','2015-02-12 19:21:39');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jun','ch','ex@ex.com','d043uvBJjDWFc','2015-02-12 11:18:45','2015-02-12 11:18:45'),(2,'1','asfasfasf','ex1@ex.ex','9eojJrovCxOQc','2015-02-12 15:40:19','2015-02-12 15:40:19'),(3,'Jun','kkkk','ex3@ex.com','e7kfbxCf7u0fY','2015-02-12 15:55:43','2015-02-12 15:55:43'),(4,'asfasf  df','aadf','example@example.com','42XWroImGkEpU','2015-02-12 19:19:59','2015-02-12 19:19:59'),(5,'asfasf','asfasf','asfasf@dsfjaklf.com','0ct6ScaJ3raEA','2015-02-12 20:13:41','2015-02-12 20:13:41'),(6,'mark','asfasfasf','ex10@ex.com','d6IepT.F5UBxM','2015-02-12 20:23:52','2015-02-12 20:23:52'),(7,'asf','safasfs','ex11@ex.com','8e1ADM/RZKZoY','2015-02-12 22:52:51','2015-02-12 22:52:51'),(8,'mark fasfas','sadlkfjalf','ex111@ex.com','34PuM4ZNJ.Fkc','2015-02-12 22:53:35','2015-02-12 22:53:35');
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

-- Dump completed on 2015-02-15 15:28:23
