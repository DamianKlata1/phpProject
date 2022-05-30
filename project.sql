-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `idBook` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `author` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `releaseDate` date DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `publisher` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `available` varchar(3) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  PRIMARY KEY (`idBook`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (11,'Zachowaj spokój','Harlan Coben','2008-04-15',432,'Albatros','yes'),(12,'Gdzie śpiewają raki','Delia Owens','2019-11-13',416,'Świat książki','yes'),(13,'Mentalista','Henrik Fexeus','2022-03-16',680,'Czarna Owca','yes'),(14,'Wstyd','Robert Małecki','2022-04-13',408,'Czwarta Strona','yes'),(15,'Hobbit,czyli tam i z powrotem','J.R.R Tolkien','1937-09-21',314,'Wydawnictwo Iskry','yes'),(16,'Drużyna pierścienia','J.R.R Tolkien','1954-07-29',448,'Amber','yes'),(17,'Nie mów nikomu','Harlan Coben','2001-06-19',400,'Albatros','yes');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfRole` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'systemAdmin',1),(2,'libraryAdmin',1),(3,'user',1),(4,'guest',1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roleofuser`
--

DROP TABLE IF EXISTS `roleofuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roleofuser` (
  `idRole` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  KEY `roleofuser_ibfk_2` (`idUser`),
  KEY `roleofuser_ibfk_1` (`idRole`),
  CONSTRAINT `roleofuser_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE,
  CONSTRAINT `roleofuser_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roleofuser`
--

LOCK TABLES `roleofuser` WRITE;
/*!40000 ALTER TABLE `roleofuser` DISABLE KEYS */;
INSERT INTO `roleofuser` VALUES (1,1);
/*!40000 ALTER TABLE `roleofuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `idTransaction` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idBook` int(11) DEFAULT NULL,
  `reservationDate` date DEFAULT NULL,
  `borrowDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `cancelReservationDate` date DEFAULT NULL,
  PRIMARY KEY (`idTransaction`),
  KEY `relTransactionBook` (`idBook`),
  KEY `relTransactionUser` (`idUser`),
  CONSTRAINT `relTransactionBook` FOREIGN KEY (`idBook`) REFERENCES `book` (`idBook`),
  CONSTRAINT `relTransactionUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `e-mail` varchar(45) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `active` varchar(3) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'sAdmin','sAdmin','Damian','Klata','damianklata@gmail.com','yes');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-30 20:55:13
