-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: openlms
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `authorID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  PRIMARY KEY (`announcementID`),
  KEY `announcement_member_idx` (`authorID`),
  KEY `announcement_course_idx` (`courseID`),
  CONSTRAINT `announcement_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `announcement_member` FOREIGN KEY (`authorID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,0,2,'1');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcementnotify`
--

DROP TABLE IF EXISTS `announcementnotify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcementnotify` (
  `studentID` int(11) NOT NULL,
  `announcementID` int(11) NOT NULL,
  PRIMARY KEY (`studentID`,`announcementID`),
  KEY `announcementnotify_member_idx` (`studentID`),
  KEY `announcementnotify_annoucement_idx` (`announcementID`),
  CONSTRAINT `announcementnotify_announcement` FOREIGN KEY (`announcementID`) REFERENCES `announcement` (`announcementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `announcementnotify_member` FOREIGN KEY (`studentID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcementnotify`
--

LOCK TABLES `announcementnotify` WRITE;
/*!40000 ALTER TABLE `announcementnotify` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcementnotify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignment` (
  `assignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `total` int(11) NOT NULL,
  `duedate` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`assignmentID`),
  KEY `assignment_course_idx` (`courseID`),
  KEY `assignment_member_idx` (`authorID`),
  CONSTRAINT `assignment_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assignment_member` FOREIGN KEY (`authorID`) REFERENCES `member` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,3,2,'Homework 1',100,NULL,'Due 4/8/15'),(2,5,4,'HW 1',100,'2015-04-04 12:00:00','wipe dat ass clean, son!!!');
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignmentstudentlist`
--

DROP TABLE IF EXISTS `assignmentstudentlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignmentstudentlist` (
  `assignmentID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `turnedin` tinyint(1) NOT NULL,
  `points` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignmentstudentlist`
--

LOCK TABLES `assignmentstudentlist` WRITE;
/*!40000 ALTER TABLE `assignmentstudentlist` DISABLE KEYS */;
INSERT INTO `assignmentstudentlist` VALUES (1,1,'batman',0,0),(1,1,'batman2',0,0),(1,1,'batman4',1,0),(1,1,'batman7',1,0);
/*!40000 ALTER TABLE `assignmentstudentlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `questionID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `userID` varchar(11) NOT NULL,
  `question` varchar(700) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `order` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (2,1,'batman','test question','dfadfas',20),(2,1,'batman','test question','dafsdfasfsa',21),(2,1,'batman','test question','dfasdf',22),(2,1,'batman','test question','dafsfasd',23),(2,1,'batman','test question','dfasdf',24),(2,1,'batman','test question','dfasdfas',25),(2,1,'batman','test question','dfasdfa',26),(2,1,'batman','test question','dfasdfa',27),(2,1,'batman','test question','dafasdf',28),(2,1,'batman','test question','dafdffdfd',29),(2,1,'batman','test question','dasdfa',30),(2,1,'batman','test question','dfasdfasf',31),(2,1,'batman','test question','dfasdfas',32),(2,1,'batman','test question','dasdasf',33),(2,1,'batman','test question','dafsdfsd',34),(2,1,'batman','test question','dafsdf',35),(2,1,'batman','test question','dfasdfa',36),(2,1,'batman','test question','dafsdfas',37),(2,1,'batman','test question','dasfasdfa',38),(2,1,'batman','test question','dasfsdfasdf',39),(2,1,'batman','test question','dafsdfds',40),(2,1,'batman','test question','dfasdfads',41),(2,1,'batman','test question','sadfasd',42),(2,1,'batman','test question','dfasdf',43),(2,1,'batman','test question','dfasdfasd',44),(2,1,'batman','test question','sdfsdfasdf',45),(2,1,'batman','test question','sdfasdf',46),(2,1,'batman','test question','dfadfda',47),(2,1,'batman','test question','dfsadfas',48),(3,1,'batman','hi','dsfasdf',49),(10,1,'batman','hi','adfasdfas',50),(10,1,'batman','hi','adsfasdfa',51),(10,1,'batman','hi','adsfasd',52),(2,1,'batman','test question','adsfasdf',53);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` char(4) NOT NULL,
  `suffix` char(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'CMPE','195A','Senior Design Project I'),(2,'SE','172','Enterprise Software Platforms'),(3,'CS','166','Information Security'),(4,'KIN','24A','Beginning Bowling'),(5,'POOP','101','Poop');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseinstructor`
--

DROP TABLE IF EXISTS `courseinstructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseinstructor` (
  `memberID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  PRIMARY KEY (`memberID`,`courseID`),
  UNIQUE KEY `mID_cID_UK` (`memberID`,`courseID`),
  KEY `courseinstructor_instructor_idx` (`memberID`),
  KEY `courseinstructor_course_idx` (`courseID`),
  CONSTRAINT `courseinstructor_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `courseinstructor_instructor` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseinstructor`
--

LOCK TABLES `courseinstructor` WRITE;
/*!40000 ALTER TABLE `courseinstructor` DISABLE KEYS */;
INSERT INTO `courseinstructor` VALUES (4,5);
/*!40000 ALTER TABLE `courseinstructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursemember`
--

DROP TABLE IF EXISTS `coursemember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursemember` (
  `memberID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  PRIMARY KEY (`memberID`,`courseID`),
  UNIQUE KEY `mID_cID_UK` (`memberID`,`courseID`),
  KEY `coursestudent_student_idx` (`memberID`),
  KEY `coursestudent_course_idx` (`courseID`),
  CONSTRAINT `coursestudent_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `coursestudent_member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursemember`
--

LOCK TABLES `coursemember` WRITE;
/*!40000 ALTER TABLE `coursemember` DISABLE KEYS */;
INSERT INTO `coursemember` VALUES (1,1),(1,3),(1,4),(2,3),(3,1),(3,3);
/*!40000 ALTER TABLE `coursemember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `memberID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memberID`,`assignmentID`),
  CONSTRAINT `grades_member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,1,90,'nice!');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hwcomment`
--

DROP TABLE IF EXISTS `hwcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hwcomment` (
  `commentID` int(11) NOT NULL,
  `hwid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `classID` int(11) NOT NULL,
  `comment` varchar(301) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hwcomment`
--

LOCK TABLES `hwcomment` WRITE;
/*!40000 ALTER TABLE `hwcomment` DISABLE KEYS */;
INSERT INTO `hwcomment` VALUES (1,1,'batman',1,'hi'),(2,1,'batman',1,'yo'),(3,1,'batman',1,'asdfa'),(5,1,'batman',1,'sadfasdf'),(6,1,'batman',1,'sadfasdf'),(7,1,'batman',1,'asdfasdfa'),(8,1,'batman',1,'hehe'),(9,1,'batman',1,'lkjlk'),(10,1,'batman',1,'asdfa'),(11,1,'batman',1,'asdfasdffff'),(12,1,'batman',1,'asdfsffffffff'),(13,1,'batman',1,'sdkfjasldfkja;'),(14,1,'batman',1,'asdfasdf'),(15,1,'batman',1,'lkasjdlfkjslfkajsldfk'),(16,1,'batman',1,'asdfjasldkfjlaskdf'),(17,1,'batman',1,'asdfasd'),(18,1,'batman',1,'asdlfkjlllll'),(19,1,'batman',1,'hi');
/*!40000 ALTER TABLE `hwcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('batman','1234');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bio` varchar(9999) DEFAULT NULL,
  `hash` varchar(1000) DEFAULT NULL,
  `salt` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`memberID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (4,'quiqui','quiqui','quiqui',NULL,NULL),(7,'clifford','chan','cpc1992',NULL,NULL),(8,'d','d','d','e958cd6cfd7cab76d57fd5492a24dd151aae02bf72480222bb4e5014135eb872','gboruezh30a81qi'),(12,'j','j','cpc1993','352bae138835ae8101710393e1f459f57fa079113e42b2631e39c5ee012001e5','h8tiv2e7rb35c4u'),(13,'k','k','k','9896aca6078e068645ee274c25cb860dc1108853a0c36d8ea1fca8b406b346e8','6e7ta3zbm19gidn'),(14,'d','d','dicks','765fb028b2745ff40b69a414ac217f09725b3599a072776bf25366fc586643ae','zx4lnie8t316yug'),(15,'p','p','p','1a12334e57c0a8ba2be754e0ac56ca007ffbad410b079baa705de64f44e2fa31','6a04ps9rlgntyjb');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messagethread`
--

DROP TABLE IF EXISTS `messagethread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messagethread` (
  `classID` int(10) NOT NULL,
  `date` date NOT NULL,
  `userID` varchar(20) NOT NULL,
  `question` varchar(700) NOT NULL,
  `title` varchar(100) NOT NULL,
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messagethread`
--

LOCK TABLES `messagethread` WRITE;
/*!40000 ALTER TABLE `messagethread` DISABLE KEYS */;
INSERT INTO `messagethread` VALUES (0,'0000-00-00','','','',1),(1,'0000-00-00','batman','test question','test title',2),(1,'0000-00-00','batman','test question','test title',3),(1,'2015-10-10','batman','test2','test2',4),(1,'2015-10-19','batman','joijoijoi','hi',5);
/*!40000 ALTER TABLE `messagethread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moduledescription`
--

DROP TABLE IF EXISTS `moduledescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moduledescription` (
  `order` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `description` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moduledescription`
--

LOCK TABLES `moduledescription` WRITE;
/*!40000 ALTER TABLE `moduledescription` DISABLE KEYS */;
/*!40000 ALTER TABLE `moduledescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulelist`
--

DROP TABLE IF EXISTS `modulelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulelist` (
  `classID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `lock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulelist`
--

LOCK TABLES `modulelist` WRITE;
/*!40000 ALTER TABLE `modulelist` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulelist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multiplechoice`
--

DROP TABLE IF EXISTS `multiplechoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multiplechoice` (
  `classID` int(10) NOT NULL,
  `quiznumber` int(10) NOT NULL,
  `question` varchar(700) NOT NULL,
  `answer` varchar(700) NOT NULL,
  `incorrect1` varchar(700) NOT NULL,
  `incorrect2` varchar(700) NOT NULL,
  `incorrect3` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multiplechoice`
--

LOCK TABLES `multiplechoice` WRITE;
/*!40000 ALTER TABLE `multiplechoice` DISABLE KEYS */;
INSERT INTO `multiplechoice` VALUES (1,1,'What color is the sky','blue','orange','green','yello');
/*!40000 ALTER TABLE `multiplechoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificationrecipients`
--

DROP TABLE IF EXISTS `notificationrecipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationrecipients` (
  `notificationID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationrecipients`
--

LOCK TABLES `notificationrecipients` WRITE;
/*!40000 ALTER TABLE `notificationrecipients` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificationrecipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `first` varchar(255) DEFAULT NULL,
  `last` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `classID` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortanswer`
--

DROP TABLE IF EXISTS `shortanswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortanswer` (
  `classID` int(10) NOT NULL,
  `quiznumber` int(10) NOT NULL,
  `question` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortanswer`
--

LOCK TABLES `shortanswer` WRITE;
/*!40000 ALTER TABLE `shortanswer` DISABLE KEYS */;
INSERT INTO `shortanswer` VALUES (1,1,'why is the sky blue');
/*!40000 ALTER TABLE `shortanswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `totalquiz`
--

DROP TABLE IF EXISTS `totalquiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `totalquiz` (
  `classID` int(11) NOT NULL,
  `quiznumber` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `lock` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `lockmanualoverride` TINYINT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `totalquiz`
--

LOCK TABLES `totalquiz` WRITE;
/*!40000 ALTER TABLE `totalquiz` DISABLE KEYS */;
INSERT INTO `totalquiz` VALUES (1,1,'First Quiz',0,'2015-01-01 01:11:00'),(2,1,'Second Quiz',0,'2015-01-01 01:11:00');
/*!40000 ALTER TABLE `totalquiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `totalthread`
--

DROP TABLE IF EXISTS `totalthread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `totalthread` (
  `classID` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `totalthread`
--

LOCK TABLES `totalthread` WRITE;
/*!40000 ALTER TABLE `totalthread` DISABLE KEYS */;
/*!40000 ALTER TABLE `totalthread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truefalse`
--

DROP TABLE IF EXISTS `truefalse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truefalse` (
  `classID` int(10) NOT NULL,
  `quiznumber` int(10) NOT NULL,
  `question` varchar(700) NOT NULL,
  `answer` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truefalse`
--

LOCK TABLES `truefalse` WRITE;
/*!40000 ALTER TABLE `truefalse` DISABLE KEYS */;
INSERT INTO `truefalse` VALUES (1,1,'Is the sky orange','false');
/*!40000 ALTER TABLE `truefalse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-01 20:31:31
