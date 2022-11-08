-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: main
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userinfo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `Uname` varchar(32) NOT NULL DEFAULT 'Unknow',
  `Uid` varchar(32) NOT NULL,
  `Uemail` varchar(64) NOT NULL,
  `Uphone` varchar(32) DEFAULT NULL,
  `About` json DEFAULT NULL,
  `Pyament` varchar(64) DEFAULT NULL,
  `PyamentInfo` json DEFAULT NULL,
  `Dates` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Pass` varchar(128) NOT NULL DEFAULT 'Password',
  `Statuses` varchar(32) NOT NULL DEFAULT 'Active',
  `rolls` varchar(20) NOT NULL DEFAULT 'user',
  `detect` varchar(32) NOT NULL DEFAULT 'unactive',
  `powerBy` tinytext,
  `img` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES (1,'admin','dk2-112233','admin@gmail.com',NULL,NULL,NULL,NULL,'2022-01-25 06:03:41','$2y$10$EesijQEjA3M0.Zv/4A2Oi.sOG9OdKERi2lnJV9sYUv1trLRfpeq/i','Active','admin','unactive',NULL,NULL),(2,'users name','dk3-112233','users@gmail.com',NULL,NULL,NULL,NULL,'2022-01-25 06:07:01','users_1122','Active','users','unactive',NULL,NULL),(3,'manager name','dk4-112233','manager@gmail.com',NULL,NULL,NULL,NULL,'2022-01-25 06:07:01','manager_1122','Active','manager','unactive',NULL,NULL),(4,'ownar','dk1-112233','ownar@gmail.com',NULL,NULL,NULL,NULL,'2022-09-22 05:06:13','ownar_1122','Active','ownar','unactive',NULL,NULL),(5,'test','1212121211','test@gmail.com','0194055600000',NULL,NULL,NULL,'2022-10-27 18:30:56','72621527','Active','admin','1212121211','admin',NULL),(6,'test 2','20221027200600','test2@gmail.com','019373827362',NULL,NULL,NULL,'2022-10-27 20:06:00','$2y$10$vWZkrBSpzFzIvqDPzfoPQOVPhqra.i5ye78ZqqKvV.Q3B7NixvHlu','Active','admin','20221027200600',NULL,NULL),(7,'test 2','20221027212451','test3@gmail.com','019373827362',NULL,NULL,NULL,'2022-10-27 21:24:51','$2y$10$9TlXv9DAI.nKcYc0VfAvi.cvaSoytlUMRCatzmZ0tpwJAGVOmyDYm','Active','admin','20221027212451',NULL,NULL);
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-06 17:29:13
