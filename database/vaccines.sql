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
-- Table structure for table `vaccines`
--

DROP TABLE IF EXISTS `vaccines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaccines` (
  `vaccine_id` int NOT NULL AUTO_INCREMENT,
  `vaccine_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `time_of_vaccination` varchar(255) DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vaccine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaccines`
--

LOCK TABLES `vaccines` WRITE;
/*!40000 ALTER TABLE `vaccines` DISABLE KEYS */;
INSERT INTO `vaccines` VALUES (1,'Anthrax Spore Vaccine','Cow','Anthrax','First vaccine at 6 months, then annually before monsoon','Not less than 10 million spores/dose','Live anthrax spore vaccine prepared from B. anthracis Sterne strain suspended in glycerine; vaccination has led to a remarkable decrease in disease outbreaks in the country'),(2,'Black Quarter (BQ) Vaccine','Cow','Black Quarter (BQ)','First vaccination at 6 months, then repeated annually',NULL,'Formalin-inactivated C. chauvoei culture, adjuvanted with aluminium hydroxide gel or alum precipitated vaccine; vaccination has led to a decrease in disease outbreaks in the country'),(3,'Haemorrhagic Septicaemia (HS) Vaccine','Cow','Haemorrhagic Septicaemia (HS)','First vaccination at 4-6 months of age, then repeated annually at least 15-20 days before monsoon',NULL,'Formaldehyde inactivated culture of P. multocida with aluminium hydroxide gel adjuvant or oil adjuvant or alum precipitated vaccine; vaccination has led to a decrease in disease outbreaks in the country'),(4,'Brucella abortus Vaccine (S-19 Strain)','Cow','Brucellosis','Female calves between 4-8 months of age','Not less than 4 x 10^10 viable organisms subcutaneously','Live Brucella abortus strain 19 vaccine; vaccination has led to a decrease in disease outbreaks in the country'),(5,'Foot-and-Mouth Disease (FMD) Vaccine (Inactivated)','Cow','Foot-and-Mouth Disease (FMD)','Twice a year',NULL,'Polyvalent aqueous aluminium hydroxide and saponin adjuvanted vaccine comprising of serotypes O, A22, C and Asia 1; vaccination has contributed significantly in reducing the incidence of FMD in the country'),(6,'Johne’s Disease Vaccine (Inactivated)','Cow','Johne’s Disease',NULL,NULL,'Inactivated JD Vaccine available in two forms: mineral oil adjuvant and aluminium hydroxide adjuvant; vaccination has been successful in limiting the disease spread and helps in recovery of known MAP infected animals'),(7,'Anthrax Spore Vaccine','Buffalo','Anthrax','First vaccine at 6 months, then annually before monsoon','Not less than 10 million spores/dose','Live anthrax spore vaccine prepared from B. anthracis Sterne strain suspended in glycerine; vaccination has led to a remarkable decrease in disease outbreaks in the country'),(8,'Black Quarter (BQ) Vaccine','Buffalo','Black Quarter (BQ)','First vaccination at 6 months, then repeated annually',NULL,'Formalin-inactivated C. chauvoei culture, adjuvanted with aluminium hydroxide gel or alum precipitated vaccine; vaccination has led to a decrease in disease outbreaks in the country'),(9,'Haemorrhagic Septicaemia (HS) Vaccine','Buffalo','Haemorrhagic Septicaemia (HS)','First vaccination at 4-6 months of age, then repeated annually at least 15-20 days before monsoon',NULL,'Formaldehyde inactivated culture of P. multocida with aluminium hydroxide gel adjuvant or oil adjuvant or alum precipitated vaccine; vaccination has led to a decrease in disease outbreaks in the country'),(10,'Foot-and-Mouth Disease (FMD) Vaccine (Inactivated)','Buffalo','Foot-and-Mouth Disease (FMD)','Twice a year',NULL,'Polyvalent aqueous aluminium hydroxide and saponin adjuvanted vaccine comprising of serotypes O, A22, C and Asia 1; vaccination has contributed significantly in reducing the incidence of FMD in the country'),(11,'Buffalopox Vaccine (Live Attenuated; BPXV Vij/96 Strain)','Buffalo','Buffalopox','Animals older than 4 months of age','0.5 ml (containing a minimum of 3.0 log10 TCID50) to be inoculated by intra-dermal on the abaxial surface of the tail','Live-attenuated vaccine developed using an indigenous isolate (BPXV Vij/96 strain); vaccination has profound economic benefit in India and other neighboring countries'),(12,'Sheeppox Vaccine (Live Attenuated; RF-Strain)','Sheep','Sheeppox','Not specified','0.1 ml for all age groups, given intradermally in the caudal fold or tip of the ear.','The vaccine confers immunity for more than one year.'),(13,'Sheeppox Vaccine (Srinagar Strain)','Sheep','Sheeppox',NULL,NULL,'The vaccine produces long-lasting immunity with protection for up to 4 years.'),(14,'Enterotoxaemia Vaccine','Sheep','Enterotoxaemia (Pulpy kidney disease)','Lambs vaccinated at 4 months if dam is vaccinated, or at 1 week if dam is unvaccinated. Repeat annually before monsoon.',NULL,'Vaccination helps control the disease in the country.'),(15,'Enterotoxaemia Vaccine','Goat','Enterotoxaemia (Pulpy kidney disease)','Lambs vaccinated at 4 months if dam is vaccinated, or at 1 week if dam is unvaccinated. Repeat annually before monsoon.',NULL,'Vaccination helps control the disease in the country.'),(16,'PPR Vaccine (Live Attenuated; PPRV/Sungri/96 Strain)','Goat','Peste-des-petits-ruminants (PPR)','More than 3 months of age','1.0 ml to be inoculated subcutaneously in the neck region.','The vaccine has contributed to a reduction of more than 75% in disease outbreaks.'),(17,'PPR Vaccine (Live Attenuated; PPRV/Sungri/96 Strain)','Sheep','Peste-des-petits-ruminants (PPR)','More than 3 months of age','1.0 ml to be inoculated subcutaneously in the neck region.','The vaccine has contributed to a reduction of more than 75% in disease outbreaks.'),(18,'Goatpox Vaccine (Uttarkashi Strain)','Goat','Goatpox',NULL,NULL,'The vaccine is safe, potent, and efficacious, providing immunity for at least 40 months and possibly lifelong.'),(19,'Bluetongue Vaccine (Serotypes 1, 2, 10, 16 and 23)','Sheep','Bluetongue','1st at 4 months, booster after 28 days','2 ml subcutaneously','Southern states like Tamil Nadu, Andhra Pradesh, Telangana, and Karnataka are mostly affected by this disease.'),(20,'Orf Vaccine (Live Attenuated; ORFV Muk 59/05 Strain)','Goat','Orf',NULL,'0.20 ml to be inoculated by intra-dermal route with scarification on the inner aspect of the thigh.','The vaccine is stable and has a shelf-life of more than one year at 4°C.'),(21,'Orf Vaccine (Live Attenuated; ORFV Muk 59/05 Strain)','Sheep','Orf',NULL,'0.20 ml to be inoculated by intra-dermal route with scarification on the inner aspect of the thigh.','The vaccine is stable and has a shelf-life of more than one year at 4°C.'),(22,'Fowlpox Disease Vaccine','hen','Fowlpox','12–16 weeks of age','Administered via the wing web method of injection','The vaccine is based on attenuated fowlpox virus and has been transferred to various state veterinary biological production units. Reduction of morbidity and mortality in poultry was achieved by using this vaccine.');
/*!40000 ALTER TABLE `vaccines` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-05 14:42:29
