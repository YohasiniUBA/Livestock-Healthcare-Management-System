-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: app
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `id_app` int NOT NULL AUTO_INCREMENT,
  `ph_no` varchar(45) DEFAULT NULL,
  `name_farmer` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `addr` varchar(45) DEFAULT NULL,
  `problem` varchar(45) DEFAULT NULL,
  `criticality` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `doctor_appointed` varchar(45) DEFAULT NULL,
  `breed` varchar(45) DEFAULT NULL,
  `immediate_remedy` varchar(200) DEFAULT NULL,
  `medication` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_app`),
  UNIQUE KEY `id_app_UNIQUE` (`id_app`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (101,'5678901234','Venugopal','Cow','Veerakotai, Tirippur','Pregnant Cow','Urgent','',NULL,NULL,NULL,NULL,NULL),(102,'6789012345','Balasubramanian','Buffalo','Ooty','Swollen Joints','Normal',NULL,NULL,NULL,NULL,NULL,NULL),(103,'7890123456','Shakthivel','Goat','Pudhukuppam, Neyveli','Refusing to eat','Normal',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farmer`
--

DROP TABLE IF EXISTS `farmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `farmer` (
  `phno_farmer` double NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name_farmer` varchar(45) DEFAULT NULL,
  `addr_farmer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`phno_farmer`),
  UNIQUE KEY `phno_farmer_UNIQUE` (`phno_farmer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmer`
--

LOCK TABLES `farmer` WRITE;
/*!40000 ALTER TABLE `farmer` DISABLE KEYS */;
INSERT INTO `farmer` VALUES (5678901234,'key','Venugopal','Veerakotai, Tirippur'),(6789012345,'fire','Balasubramanian','Ooty'),(7890123456,'air','Shakthivel','Pudhukuppam, Neyveli');
/*!40000 ALTER TABLE `farmer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vetenarian`
--

DROP TABLE IF EXISTS `vetenarian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vetenarian` (
  `phno_vet` double NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name_vet` varchar(45) DEFAULT NULL,
  `addr_vet` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`phno_vet`),
  UNIQUE KEY `phno_vet_UNIQUE` (`phno_vet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vetenarian`
--

LOCK TABLES `vetenarian` WRITE;
/*!40000 ALTER TABLE `vetenarian` DISABLE KEYS */;
INSERT INTO `vetenarian` VALUES (456789123,'light','Selvarasu','Kottaikaadu, Triuppur'),(1234567890,'cake','Subramani','Veerakotai, Tiruppur'),(2345678901,'water','Mariappan','Neyveli'),(3456789012,'melon','Loganadhan','Ooty');
/*!40000 ALTER TABLE `vetenarian` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-13 23:22:54
