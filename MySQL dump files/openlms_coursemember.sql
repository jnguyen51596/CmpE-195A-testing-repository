CREATE DATABASE  IF NOT EXISTS `openlms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `openlms`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: openlms
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `coursemember`
--

DROP TABLE IF EXISTS `coursemember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursemember` (
  `csID` int(11) NOT NULL AUTO_INCREMENT,
  `mID` int(11) NOT NULL,
  `cID` int(11) NOT NULL,
  PRIMARY KEY (`csID`),
  UNIQUE KEY `mID_cID_UK` (`mID`,`cID`),
  KEY `coursestudent_student_idx` (`mID`),
  KEY `coursestudent_course_idx` (`cID`),
  CONSTRAINT `coursestudent_member` FOREIGN KEY (`mID`) REFERENCES `member` (`mID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `coursestudent_course` FOREIGN KEY (`cID`) REFERENCES `course` (`cID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursemember`
--

LOCK TABLES `coursemember` WRITE;
/*!40000 ALTER TABLE `coursemember` DISABLE KEYS */;
INSERT INTO `coursemember` VALUES (1,1,1),(3,1,3),(2,1,4),(4,2,3),(8,3,1),(6,3,3);
/*!40000 ALTER TABLE `coursemember` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-13 19:21:02
