-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: codingdojo
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
-- Table structure for table `course_students`
--

DROP TABLE IF EXISTS `course_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_students_courses` (`course_id`),
  KEY `fk_course_students_students` (`student_id`),
  CONSTRAINT `fk_course_students_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_students_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_students`
--

LOCK TABLES `course_students` WRITE;
/*!40000 ALTER TABLE `course_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'HTML & CSS','World Wide Web pages + Colors','2012-09-09 09:09:09','2012-09-09 09:09:09'),(2,'JavaScript','JavaScript Rocks!','2013-12-20 03:10:14',NULL),(14,'Hi HI Hi iiiiiiiiiiiiiii','I love RoR.----','2015-01-31 00:41:43','2015-01-31 00:41:43'),(28,'ofjlajflaksjfkajsflkjflkj','sjaflakjsflkjasflkjalsjflasjflj','2015-01-31 03:44:03','2015-01-31 03:44:03'),(29,'asfasfsafasfsafasfs','asfasfasfsafas','2015-01-31 03:44:12','2015-01-31 03:44:12'),(30,'safasfasfasfasfasf','safasfasfas','2015-01-31 03:59:31','2015-01-31 03:59:31'),(31,'safasfasfasfasfasf','safasfasfas','2015-01-31 03:59:55','2015-01-31 03:59:55'),(33,'asfjasfkljasklfjasklfjaslkfj','sjfaslkfjksaljfklsajfklsajflkasjfkljasfkljaslkfas','2015-01-31 04:00:06','2015-01-31 04:00:06'),(34,'sdfasfaasfsafsafsafasd','asfasfasf','2015-01-31 04:04:56','2015-01-31 04:04:56'),(35,'sdfhfjhasfjkhasfjafslkj','sdjflkajkdljasklfjklasjflksajfasf','2015-01-31 04:05:03','2015-01-31 04:05:03'),(47,'safasfasfasfsafasfasfsafas','asfd','2015-01-31 04:51:43','2015-01-31 04:51:43'),(48,'World Wide Web pages + Colors','World Wide Web pages + Colors','2015-01-31 04:52:05','2015-01-31 04:52:05');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Michael','Choi','john@yahoo.com','b5e42f49ab3acf8f6c2ccf99f604a17f','2009-09-09 09:09:09',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-07  1:12:19
