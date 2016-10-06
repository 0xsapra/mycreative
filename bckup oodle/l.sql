-- MySQL dump 10.13  Distrib 5.6.23, for osx10.8 (x86_64)
--
-- Host: localhost    Database: voicebook
-- ------------------------------------------------------
-- Server version	5.6.23

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
-- Current Database: `voicebook`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `voicebook` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `voicebook`;

--
-- Table structure for table `clients_detail`
--

DROP TABLE IF EXISTS `clients_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients_detail` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `work_no1` int(11) NOT NULL,
  `work_no2` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `priority` int(11) NOT NULL,
  `jobs_given` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sno`),
  UNIQUE KEY `uname` (`uname`,`mobile_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients_detail`
--

LOCK TABLES `clients_detail` WRITE;
/*!40000 ALTER TABLE `clients_detail` DISABLE KEYS */;
INSERT INTO `clients_detail` VALUES (1,'superuser','aman',1234567,NULL,'2016-04-23 12:32:37',0,0,'aman.sapracs@gmail.com','Aman9321@',1,0),(2,'sapramam','ritu SAPRA',9717197884,NULL,'2016-05-02 16:53:59',0,0,'RITUSAPRA@GMAIL.COM','mom',5,0),(6,'deepu','deepak chaudhary',987654321,NULL,'2016-05-02 17:19:01',0,0,'deepak007@gmail.com','deepu',5,0),(7,'ayushi','ayush singh',7098765432,NULL,'2016-05-05 09:59:11',0,0,'ayush121@gmail.com','ayushi',5,0),(9,'om','om',9716789,NULL,'2016-05-09 17:48:52',0,0,'0@gmail.com','om',5,0),(14,'esh','eshma',9999955555,NULL,'2016-05-14 16:19:25',0,0,'eshmashukla@gmail.com','eshma',5,0);
/*!40000 ALTER TABLE `clients_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversations` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `user1` varchar(30) NOT NULL,
  `user2` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
INSERT INTO `conversations` VALUES (1,'akash','pappu');
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `sno_client` int(11) DEFAULT NULL,
  `pending` varchar(2) NOT NULL DEFAULT 'NA',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `extra` text,
  `price` int(11) NOT NULL,
  `delivery_time` varchar(10) NOT NULL,
  `extra_fast` int(1) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `sno_client` (`sno_client`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_requests`
--

DROP TABLE IF EXISTS `job_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_requests` (
  `job_id` int(11) NOT NULL,
  `req_by` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_requests`
--

LOCK TABLES `job_requests` WRITE;
/*!40000 ALTER TABLE `job_requests` DISABLE KEYS */;
INSERT INTO `job_requests` VALUES (1,'akash','2016-04-10 11:31:30'),(1,'','2016-04-16 18:44:07'),(1,'akash','2016-04-16 18:44:53');
/*!40000 ALTER TABLE `job_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k`
--

DROP TABLE IF EXISTS `k`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `main` varchar(30) NOT NULL,
  `words` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k`
--

LOCK TABLES `k` WRITE;
/*!40000 ALTER TABLE `k` DISABLE KEYS */;
INSERT INTO `k` VALUES (1,'web_technology','web');
/*!40000 ALTER TABLE `k` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `user_from` varchar(30) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,'pappu','hii'),(2,1,'akash','hello'),(3,1,'pappu','yo');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `sno_id` int(11) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pic_id`),
  KEY `sno_id` (`sno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `tags` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'website design','website,web,develop,css,js,html,html5,css3,javascript,script,jquery,php,ajax'),(2,'graphics design','graphics,maya,3d,character,design,designing,2d,graphic,cartoon,comic'),(3,'audio/video','audio,video,mp3,mp4,3gp,4k,bluray,aac,lossless,animation,editing,make video,record audio,covert'),(4,'programming','programming,c,c++,java,python,program,code,develop,debug,bug,'),(5,'data entry','data,entry,assignment,article,seo,typing,write,words,writing,translation'),(6,'mobile app','android,mobile,app,develop,ios,sqlite,android studio,swift,phone gap,html5,canvas,java,java');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-07 21:20:05
