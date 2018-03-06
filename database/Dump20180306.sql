-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: symfony4_doctrine2_test
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `campeonato`
--

DROP TABLE IF EXISTS `campeonato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campeonato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacao_id` int(11) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_722DB8CAE30256E3` (`organizacao_id`),
  CONSTRAINT `FK_722DB8CAE30256E3` FOREIGN KEY (`organizacao_id`) REFERENCES `organizacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campeonato`
--

LOCK TABLES `campeonato` WRITE;
/*!40000 ALTER TABLE `campeonato` DISABLE KEYS */;
INSERT INTO `campeonato` VALUES (1,1,'Campeonato Estadual'),(2,2,'Campeonato Nacional'),(3,3,'Campeonato Mundial');
/*!40000 ALTER TABLE `campeonato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campeonato_time`
--

DROP TABLE IF EXISTS `campeonato_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campeonato_time` (
  `campeonato_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  PRIMARY KEY (`campeonato_id`,`time_id`),
  KEY `IDX_644EB09693BAAE11` (`campeonato_id`),
  KEY `IDX_644EB0965EEADD3B` (`time_id`),
  CONSTRAINT `FK_644EB0965EEADD3B` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_644EB09693BAAE11` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonato` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campeonato_time`
--

LOCK TABLES `campeonato_time` WRITE;
/*!40000 ALTER TABLE `campeonato_time` DISABLE KEYS */;
INSERT INTO `campeonato_time` VALUES (1,1),(1,3),(1,5),(2,1),(2,2),(2,3),(2,4),(2,5),(3,1),(3,2),(3,3),(3,4);
/*!40000 ALTER TABLE `campeonato_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizacao`
--

DROP TABLE IF EXISTS `organizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_51A4988B727ACA70` (`parent_id`),
  CONSTRAINT `FK_51A4988B727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `organizacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizacao`
--

LOCK TABLES `organizacao` WRITE;
/*!40000 ALTER TABLE `organizacao` DISABLE KEYS */;
INSERT INTO `organizacao` VALUES (1,'Organizacao 1',NULL),(2,'Organizacao 2',1),(3,'Organizacao 3',2);
/*!40000 ALTER TABLE `organizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida`
--

DROP TABLE IF EXISTS `partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `placar_visitante` int(11) NOT NULL,
  `placar_casa` int(11) NOT NULL,
  `data_partida` datetime NOT NULL,
  `campeonato_id` int(11) DEFAULT NULL,
  `time_casa_id` int(11) DEFAULT NULL,
  `time_visitante_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A9C1580C93BAAE11` (`campeonato_id`),
  KEY `IDX_A9C1580C14F5E2C4` (`time_casa_id`),
  KEY `IDX_A9C1580C102C177` (`time_visitante_id`),
  CONSTRAINT `FK_A9C1580C102C177` FOREIGN KEY (`time_visitante_id`) REFERENCES `time` (`id`),
  CONSTRAINT `FK_A9C1580C14F5E2C4` FOREIGN KEY (`time_casa_id`) REFERENCES `time` (`id`),
  CONSTRAINT `FK_A9C1580C93BAAE11` FOREIGN KEY (`campeonato_id`) REFERENCES `campeonato` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida`
--

LOCK TABLES `partida` WRITE;
/*!40000 ALTER TABLE `partida` DISABLE KEYS */;
INSERT INTO `partida` VALUES (1,'Rodada 1',1,2,'2018-01-12 08:00:00',1,1,3),(2,'Rodada 2',2,2,'2018-01-15 12:00:00',1,1,2),(3,'Rodada 3',4,1,'2018-01-18 17:30:00',1,2,1),(4,'Rodada 4',0,0,'2018-01-20 19:00:00',1,3,1),(5,'Rodada 5',3,2,'2018-01-21 15:00:00',1,2,3),(6,'Rodada 1',1,2,'2018-01-12 08:00:00',2,1,2),(7,'Rodada 2',2,2,'2018-01-15 12:00:00',2,3,1),(8,'Rodada 3',4,1,'2018-01-18 17:30:00',2,2,3),(9,'Rodada 4',0,0,'2018-01-20 17:30:00',2,4,5),(10,'Rodada 5',3,2,'2018-01-21 15:30:00',2,4,3),(11,'Rodada 6',1,2,'2018-01-12 08:00:00',2,5,1),(12,'Rodada 7',2,2,'2018-01-15 12:00:00',2,4,2),(13,'Rodada 8',4,1,'2018-01-18 17:30:00',2,5,3);
/*!40000 ALTER TABLE `partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brasao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time`
--

LOCK TABLES `time` WRITE;
/*!40000 ALTER TABLE `time` DISABLE KEYS */;
INSERT INTO `time` VALUES (1,'Risus Consulting','brasao_1.png',1),(2,'Tristique Neque Foundation','brasao_2.png',1),(3,'Consectetuer Adipiscing Industries','brasao_3.png',1),(4,'Tincidunt Orci Institute','brasao_4.png',1),(5,'Nonummy Ac Feugiat Associates','brasao_5.png',1);
/*!40000 ALTER TABLE `time` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-06  2:54:47
