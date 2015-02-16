-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: dashboard
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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,6,'Hi Jun~~~~','2015-02-03 19:43:18','2015-02-03 19:43:18'),(2,2,1,'blah blah~~~~~~~','2015-02-03 19:44:37','2015-02-03 19:44:37'),(3,2,13,'This is comment for this thisthis..\r\n','2015-02-03 19:46:23','2015-02-03 19:46:23'),(4,2,13,'This is comment 22','2015-02-03 19:46:34','2015-02-03 19:46:34'),(5,2,13,'This is comment 33.','2015-02-03 19:46:42','2015-02-03 19:46:42'),(6,2,15,'sfasfasf','2015-02-03 19:53:47','2015-02-03 19:53:47'),(7,2,15,'asfasfsaf','2015-02-03 19:53:49','2015-02-03 19:53:49'),(8,1,10,'Play around!!!~~','2015-02-03 21:21:25','2015-02-03 21:21:25'),(9,1,13,'This is Jun\r\n','2015-02-03 22:51:38','2015-02-03 22:51:38'),(10,1,17,'message 1 comment 1','2015-02-03 23:00:37','2015-02-03 23:00:37'),(11,1,17,'message 1 comment 2','2015-02-03 23:00:41','2015-02-03 23:00:41'),(12,1,17,'message 1 comment 3','2015-02-03 23:00:45','2015-02-03 23:00:45'),(13,1,17,'message 1 comment 4','2015-02-03 23:00:49','2015-02-03 23:00:49'),(14,1,17,'message 1 comment 5','2015-02-03 23:00:53','2015-02-03 23:00:53'),(15,1,17,'message 1 comment 6','2015-02-03 23:00:57','2015-02-03 23:00:57'),(16,1,4,'hahahahah~~~~~','2015-02-03 23:04:59','2015-02-03 23:04:59'),(17,1,20,'jlsjdflkasjdfljaslfjalsfja','2015-02-04 00:21:56','2015-02-04 00:21:56'),(18,1,16,'kljsafljaslkfjkaslfjdlajflkajsflas','2015-02-04 00:22:05','2015-02-04 00:22:05'),(19,1,16,'asfsafasjflasjflkajsflksjaflkjalkj\r\nasjflkasjflkjasfdkljasdlfjlasjfldsjaflksajdflkjasfkljasflkjsalfjalsfj\r\nlasfjlksajflksajfljsaflkjaslf','2015-02-04 00:22:13','2015-02-04 00:22:13'),(20,1,16,'asjkfjaslfjaslkfj\r\nalskfjlkasjflkasjflkjsaflkjsaflkjsalkfjaslfalksfjl','2015-02-04 00:22:19','2015-02-04 00:22:19'),(21,1,16,'jjfljalksjfklajsflkasjfl;asjfklasjflasjflasjflajsflasjflajsfljasfljaslfjaslfjalsjflasjflasjflaskjfla;slas;lasfjlkasjflasjf;laasfj;lasfjlasjflaksjflasjfl;ajsflajskfljaslfkjakslfjaklsfjaslfjalsjfklasf','2015-02-04 00:24:23','2015-02-04 00:24:23'),(22,1,16,'cjflkjsafljljlasjflajs ljaslkjf lajsfljaslfjlsajf asklfjlsakfjsalkjflksajflkjaslkj alksfjslakjflkasj lkjfklsajfklasjflkjaslfjasl;fkasf aklsjflkasjflajsfl','2015-02-04 00:28:25','2015-02-04 00:28:25'),(23,1,16,'asjflasjflkasjkfljaslkfdja;sldlasfj;lasfj;lasfj;lasfjlasjfl;asdjfl;asjfla;dsfjlasdjflasjflsjfdaslk;dfjalsfjals;fjals;fjals;fjalsfjlsa;fjla;sfjals;fja;lsfjalsfjalsfjaslfjals;fja;lsf','2015-02-04 00:28:39','2015-02-04 00:28:39'),(24,1,16,'<script>alert();</script>','2015-02-04 00:28:58','2015-02-04 00:28:58'),(25,1,18,'[removed]alert&#40;\"hello\"&#41;[removed]','2015-02-04 00:30:11','2015-02-04 00:30:11'),(26,1,16,'asfhasfklajjsldkfjlaksjflkasjflajs;fljsfjaslfjaslfjlasjflasjflasjflasjflajsfljaflaflasjfdlasjflasjflajsflkajslkfjaslfkjaskl;fjaslfkjaslfjlasjflasjflasjflasjflaskjflasjflajsflasjflasjflajsflajsfkljaslfjaslfjaslfj;asfjaslkfjaslkfjalksjflasjflasjflasjflajdsf','2015-02-04 00:35:43','2015-02-04 00:35:43'),(27,1,12,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:38:50','2015-02-04 00:38:50'),(28,1,11,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:38:57','2015-02-04 00:38:57'),(29,1,9,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:39:03','2015-02-04 00:39:03'),(30,1,19,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:39:19','2015-02-04 00:39:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_written_id` int(11) DEFAULT NULL,
  `user_writer_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,2,1,'saljfksajfklsajfljasklfjalkjflkj\r\nslajflsakjfklsajfljsalfjasljflksjafla','2015-02-03 09:54:08','2015-02-03 09:54:08'),(2,2,1,'fasfkjasljfklajsfkljaslkjklsjfafasfjalkjflkajsflkjaslfa','2015-02-03 09:56:09','2015-02-03 09:56:09'),(3,2,1,'asfjaksjfklasjfklajsfljaslkjadlkfjl','2015-02-03 10:00:50','2015-02-03 10:00:50'),(4,2,1,'message1\r\n','2015-02-03 17:17:21','2015-02-03 17:17:21'),(5,3,1,'message for claire 11111','2015-02-03 17:18:37','2015-02-03 17:18:37'),(6,2,1,'Hello Mike~~~!!','2015-02-03 17:28:45','2015-02-03 17:28:45'),(7,3,1,'Hi Claire!!!! Nice to meet you!','2015-02-03 17:30:04','2015-02-03 17:30:04'),(8,3,1,'claire message 2222','2015-02-03 17:35:44','2015-02-03 17:35:44'),(9,3,2,'Hi Hi~~!!!','2015-02-03 17:36:36','2015-02-03 17:36:36'),(10,1,2,'Hello Jun~~!!!!','2015-02-03 17:36:56','2015-02-03 17:36:56'),(11,3,2,'asfasfsafsafsafasfsafsafsafsafasfasfasfafasfasfsafsa','2015-02-03 19:33:48','2015-02-03 19:33:48'),(12,3,2,'asfasfsafsafasfsafasfs','2015-02-03 19:33:52','2015-02-03 19:33:52'),(13,2,2,'This is Mike\r\n','2015-02-03 19:45:39','2015-02-03 19:45:39'),(14,2,2,'This is Mike!!!!!!!\r\nWho are you??? ','2015-02-03 19:45:55','2015-02-03 19:45:55'),(15,4,2,'This is Mike~~~ Hello----\r\n','2015-02-03 19:52:25','2015-02-03 19:52:25'),(16,4,2,'askfjalksjfkalsjfklsajfklsajlfkjaslfkjaskfjas\'lfjalsjflasfjaslkjf','2015-02-03 19:53:36','2015-02-03 19:53:36'),(17,2,2,'message 1\r\n','2015-02-03 19:54:55','2015-02-03 19:54:55'),(18,5,5,'I am Jordan!!!!','2015-02-03 19:57:23','2015-02-03 19:57:23'),(19,6,1,'Hello~~~','2015-02-03 21:13:26','2015-02-03 21:13:26'),(20,1,1,'This is who???','2015-02-03 21:24:20','2015-02-03 21:24:20'),(21,1,1,'aksjflajflajsfljaslfkjasl;kfalkfjaslkjfkals;fjlajaslfkjaslkjfklasjfklas;fkasjflkasjfklasjfklasjfldkajs;flsfljasklfjaslkfjalsfjalskfjaslkfjka;slfjasjfkal;sfjalksjf;klasjflkasjf;alksfjlasjfaklsjfalsjfklasjfalsjfalsjflsajf;ladjsflajsflajsflajfdljlfkjakljfkalsdjfaldkjfkaldsfjalsd;fjdla;kdsjfk;alsjfka;lsfjkalsjflkasjfklasjflaskjflakjf','2015-02-04 00:32:03','2015-02-04 00:32:03'),(22,3,1,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.','2015-02-04 00:38:30','2015-02-04 00:38:30'),(23,5,1,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:39:10','2015-02-04 00:39:10'),(24,6,1,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','2015-02-04 00:39:22','2015-02-04 00:39:22'),(25,6,1,' If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,','2015-02-04 02:51:32','2015-02-04 02:51:32'),(26,3,1,' If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,','2015-02-04 02:51:55','2015-02-04 02:51:55'),(27,1,1,'asfasfasfsdf','2015-02-04 05:27:14','2015-02-04 05:27:14'),(28,5,1,'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of te','2015-02-04 07:29:31','2015-02-04 07:29:31'),(29,5,1,'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of te','2015-02-04 07:30:28','2015-02-04 07:30:28'),(30,3,1,'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, ','2015-02-04 17:13:34','2015-02-04 17:13:34');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (1,1,9,'2015-02-03 07:55:33','2015-02-03 07:55:33'),(3,3,1,'2015-02-03 07:59:50','2015-02-03 07:59:50'),(5,5,1,'2015-02-03 19:56:28','2015-02-03 19:56:28'),(6,6,1,'2015-02-03 20:48:24','2015-02-03 20:48:24'),(7,7,1,'2015-02-04 00:01:52','2015-02-04 00:01:52');
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jun','Kim','example@example.com','ed8Vq8Xgm8nSU','This maxes out my CPU and eventually leads to a timeout with only a fraction of the updates performed (there are several thousand values to match). I know matching by value will be slow, but this is the only data I have to match them together.\r\n\r\nIs there a better way to update values like this? I could create a third table for the merged results, if that would be faster?\r\n\r\nI tried MySQL - How can I update a table with values from another table?, but it didn\'t really help. Any ideas?\r\n\r\nThanks in advance for helping a MySQL novice!','2015-02-03 07:55:33','2015-02-04 17:13:52'),(3,'Claire','Lee','example1@example.com','205qjDWdAOD5Q','Checkboxes are for selecting one or several options in a list, while radios are for selecting one option from many.\r\nA checkbox or radio with the disabled attribute will be styled appropriately. To have the for the checkbox or radio also display a \"not-allowed\" cursor when the user hovers over the label, add the .disabled class to your .radio, .radio-inline, .checkbox, .checkbox-inline','2015-02-03 07:59:50','2015-02-04 04:10:12'),(5,'Michael','Jord','example5@example.com','0dHyMNenvF6cw',NULL,'2015-02-03 19:56:28','2015-02-04 03:13:29'),(6,'Gyo','Kamoshi','example6@example.com','b7VwhrmAgG1/M',NULL,'2015-02-03 20:48:24','2015-02-03 20:48:24'),(7,'Mike','Choi','example1121@example.com','1aFjv0033ezeM',NULL,'2015-02-04 00:01:52','2015-02-04 01:45:39');
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

-- Dump completed on 2015-02-06 23:00:16
