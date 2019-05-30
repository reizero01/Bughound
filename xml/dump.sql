-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Bughound
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Area_Name` varchar(255) NOT NULL,
  `Program_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'',0),(2,'Ada95 Parser',5);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Program_ID` int(11) DEFAULT NULL,
  `Attachment_info` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `bugs_ID` int(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Program_ID` (`Program_ID`),
  CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (1,6,'./attachments/1.jpg','',1),(2,5,'./attachments/2.jpg','',2),(3,1,'./attachments/Mar,21,201906:24:39AM/brady-gronk-red-sox.jpg','',8),(4,1,'./attachments/Mar,21,201907:41:00AM/brady-gronk-red-sox.jpg','brady-gronk-red-sox.jpg',9),(5,5,'./attachments/Mar,21,201910:07:46AM/foxhound-logo.jpg','foxhound-logo.jpg',10);
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bugs`
--

DROP TABLE IF EXISTS `bugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bugs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Program_ID` int(11) DEFAULT NULL,
  `Report_Type` int(6) DEFAULT NULL,
  `Severity` int(3) DEFAULT NULL,
  `Attached` int(1) DEFAULT NULL,
  `Attachment_ID` int(11) DEFAULT NULL,
  `Problem_summary` varchar(255) DEFAULT NULL,
  `Reproducible` int(1) DEFAULT NULL,
  `Problem` varchar(255) DEFAULT NULL,
  `Suggest_fix` varchar(255) DEFAULT NULL,
  `Report_Employee_ID` int(11) DEFAULT NULL,
  `Report_date` date DEFAULT NULL,
  `Area_ID` int(11) DEFAULT NULL,
  `Assign_Employee_ID` int(11) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Status` int(3) DEFAULT NULL,
  `Priority` int(100) DEFAULT NULL,
  `Resolution` int(100) DEFAULT NULL,
  `Resolution_Version` int(100) DEFAULT NULL,
  `Resolved_Employee_ID` int(11) DEFAULT NULL,
  `Resolved_Date` date DEFAULT NULL,
  `Tested_Employee_ID` int(11) DEFAULT NULL,
  `Tested_Date` date DEFAULT NULL,
  `Deferred` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Program_ID` (`Program_ID`),
  KEY `Report_Employee_ID` (`Report_Employee_ID`),
  KEY `Assign_Employee_ID` (`Assign_Employee_ID`),
  KEY `Resolved_Employee_ID` (`Resolved_Employee_ID`),
  KEY `Tested_Employee_ID` (`Tested_Employee_ID`),
  KEY `Area_ID` (`Area_ID`),
  CONSTRAINT `bugs_ibfk_1` FOREIGN KEY (`Program_ID`) REFERENCES `programs` (`ID`),
  CONSTRAINT `bugs_ibfk_2` FOREIGN KEY (`Report_Employee_ID`) REFERENCES `employees` (`ID`),
  CONSTRAINT `bugs_ibfk_3` FOREIGN KEY (`Assign_Employee_ID`) REFERENCES `employees` (`ID`),
  CONSTRAINT `bugs_ibfk_4` FOREIGN KEY (`Resolved_Employee_ID`) REFERENCES `employees` (`ID`),
  CONSTRAINT `bugs_ibfk_5` FOREIGN KEY (`Tested_Employee_ID`) REFERENCES `employees` (`ID`),
  CONSTRAINT `bugs_ibfk_6` FOREIGN KEY (`Area_ID`) REFERENCES `areas` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bugs`
--

LOCK TABLES `bugs` WRITE;
/*!40000 ALTER TABLE `bugs` DISABLE KEYS */;
INSERT INTO `bugs` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,1,0,0,'',0,'','',5,'2222-02-02',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(3,5,1,1,0,0,'',0,'','',5,'2002-01-02',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(4,1,1,1,0,0,'',0,'','',5,'2003-01-02',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(5,1,1,1,1,0,'',0,'','',5,'2009-01-04',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(6,1,1,1,0,0,'',0,'','',5,'2004-04-03',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(7,1,1,1,0,0,'',0,'','',5,'2005-01-02',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(8,1,1,1,1,3,'',0,'','',5,'2005-02-04',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(9,1,1,1,1,4,'',0,'','',5,'2121-01-02',1,5,'',1,1,1,1,5,'0000-00-00',5,'0000-00-00',0),(10,5,1,1,1,5,'YOLO',0,'','OK',5,'0023-01-02',1,5,'',1,2,1,1,5,'0000-00-00',5,'0000-00-00',0);
/*!40000 ALTER TABLE `bugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `First` varchar(32) DEFAULT NULL,
  `Last` varchar(32) DEFAULT NULL,
  `Username` varchar(32) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `User_level` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (5,'Pip','Pip','Pip','1234',3),(6,'Brutus','B','Brutus','1234',1),(10,'Bob','Smith','smithbob','12345',3),(11,'','','','',0),(12,'','','','',0),(13,'Bob','Smith','smithbob','1234',3),(14,'G','G','ggg','1234',1),(15,'d','d','dd','1234',2);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Program_Name` varchar(255) DEFAULT NULL,
  `Release_date` int(11) NOT NULL,
  `Version` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,'',0,0),(2,'',0,0),(3,'',1,1),(4,'',1,1),(5,'Ada95',1,1);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-21 12:10:36
