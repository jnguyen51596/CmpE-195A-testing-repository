-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: openlms
-- ------------------------------------------------------
-- Server version	5.6.23-log

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
USE openlms;

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `annoucementID` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) NOT NULL,
  `authorID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  PRIMARY KEY (`annoucementID`),
  KEY `annoucement_member_idx` (`authorID`),
  KEY `annoucement_course_idx` (`courseID`),
  CONSTRAINT `annoucement_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `annoucement_member` FOREIGN KEY (`authorID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,'Turn this in by Saturday',2,1);
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
  KEY `annoucementnotify_member_idx` (`studentID`),
  KEY `annoucementnotify_annoucement_idx` (`announcementID`),
  CONSTRAINT `annoucementnotify_annoucement` FOREIGN KEY (`announcementID`) REFERENCES `announcement` (`annoucementID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `annoucementnotify_member` FOREIGN KEY (`studentID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(4) NOT NULL,
  `suffix` varchar(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'CMPE','195A','Senior Design Project I'),(2,'SE','172','Enterprise Software Platforms'),(3,'CS','166','Information Security'),(4,'KIN','24A','Beginning Bowling');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
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
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `isInstructor` bit(1) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'Tom','Sparkling','\0'),(2,'Michael','Fireball',''),(3,'Steve','Dashing','\0');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-15  6:32:02



-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: openlms
-- ------------------------------------------------------
-- Server version	5.6.24-log

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
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`assignmentID`),
  KEY `assignment_course_idx` (`courseID`),
  KEY `assignment_member_idx` (`authorID`),
  CONSTRAINT `assignment_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assignment_member` FOREIGN KEY (`authorID`) REFERENCES `member` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,3,2,'Homework 1',100,'Due 4/8/15');
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

CREATE TABLE IF NOT EXISTS `comment` (
  `questionID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `userID` varchar(11) NOT NULL,
  `question` varchar(700) NOT NULL,
  `comment` varchar(300) NOT NULL,
`order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`questionID`, `classID`, `userID`, `question`, `comment`, `order`) VALUES
(2, 1, 'batman', 'test question', 'dfadfas', 20),
(2, 1, 'batman', 'test question', 'dafsdfasfsa', 21),
(2, 1, 'batman', 'test question', 'dfasdf', 22),
(2, 1, 'batman', 'test question', 'dafsfasd', 23),
(2, 1, 'batman', 'test question', 'dfasdf', 24),
(2, 1, 'batman', 'test question', 'dfasdfas', 25),
(2, 1, 'batman', 'test question', 'dfasdfa', 26),
(2, 1, 'batman', 'test question', 'dfasdfa', 27),
(2, 1, 'batman', 'test question', 'dafasdf', 28),
(2, 1, 'batman', 'test question', 'dafdffdfd', 29),
(2, 1, 'batman', 'test question', 'dasdfa', 30),
(2, 1, 'batman', 'test question', 'dfasdfasf', 31),
(2, 1, 'batman', 'test question', 'dfasdfas', 32),
(2, 1, 'batman', 'test question', 'dasdasf', 33),
(2, 1, 'batman', 'test question', 'dafsdfsd', 34),
(2, 1, 'batman', 'test question', 'dafsdf', 35),
(2, 1, 'batman', 'test question', 'dfasdfa', 36),
(2, 1, 'batman', 'test question', 'dafsdfas', 37),
(2, 1, 'batman', 'test question', 'dasfasdfa', 38),
(2, 1, 'batman', 'test question', 'dasfsdfasdf', 39),
(2, 1, 'batman', 'test question', 'dafsdfds', 40),
(2, 1, 'batman', 'test question', 'dfasdfads', 41),
(2, 1, 'batman', 'test question', 'sadfasd', 42),
(2, 1, 'batman', 'test question', 'dfasdf', 43),
(2, 1, 'batman', 'test question', 'dfasdfasd', 44),
(2, 1, 'batman', 'test question', 'sdfsdfasdf', 45),
(2, 1, 'batman', 'test question', 'sdfasdf', 46),
(2, 1, 'batman', 'test question', 'dfadfda', 47),
(2, 1, 'batman', 'test question', 'dfsadfas', 48),
(3, 1, 'batman', 'hi', 'dsfasdf', 49),
(10, 1, 'batman', 'hi', 'adfasdfas', 50),
(10, 1, 'batman', 'hi', 'adsfasdfa', 51),
(10, 1, 'batman', 'hi', 'adsfasd', 52),
(2, 1, 'batman', 'test question', 'adsfasdf', 53);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('batman', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `messagethread`
--

CREATE TABLE IF NOT EXISTS `messagethread` (
  `classID` int(10) NOT NULL,
  `date` date NOT NULL,
  `userID` varchar(20) NOT NULL,
  `question` varchar(700) NOT NULL,
  `title` varchar(100) NOT NULL,
`questionID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messagethread`
--

INSERT INTO `messagethread` (`classID`, `date`, `userID`, `question`, `title`, `questionID`) VALUES
(0, '0000-00-00', '', '', '', 1),
(1, '0000-00-00', 'batman', 'test question', 'test title', 2),
(1, '0000-00-00', 'batman', 'test question', 'test title', 3),
(1, '2015-10-10', 'batman', 'test2', 'test2', 4),
(1, '2015-10-19', 'batman', 'joijoijoi', 'hi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE IF NOT EXISTS `multiplechoice` (
  `classID` int(10) NOT NULL,
  `quizID` int(10) NOT NULL,
  `question` varchar(700) NOT NULL,
  `answer` varchar(700) NOT NULL,
  `incorrect1` varchar(700) NOT NULL,
  `incorrect2` varchar(700) NOT NULL,
  `incorrect3` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shortanswer`
--

CREATE TABLE IF NOT EXISTS `shortanswer` (
  `classID` int(10) NOT NULL,
  `quizID` int(10) NOT NULL,
  `question` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `totalthread`
--

CREATE TABLE IF NOT EXISTS `totalthread` (
  `classID` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truefalse`
--

CREATE TABLE IF NOT EXISTS `truefalse` (
  `classID` int(10) NOT NULL,
  `quizID` int(10) NOT NULL,
  `question` varchar(700) NOT NULL,
  `answer` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`order`);

--
-- Indexes for table `messagethread`
--
ALTER TABLE `messagethread`
 ADD PRIMARY KEY (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `messagethread`
--
ALTER TABLE `messagethread`
MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- Dump completed on 2015-04-12 21:11:01