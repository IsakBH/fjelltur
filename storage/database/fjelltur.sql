/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.2.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: fjell
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `bilde`
--

DROP TABLE IF EXISTS `bilde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `bilde` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `bildetekst` varchar(150) NOT NULL,
  `filsti` varchar(50) NOT NULL,
  `tur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bilde` (`tur_id`),
  KEY `filsti` (`filsti`),
  CONSTRAINT `bilde` FOREIGN KEY (`tur_id`) REFERENCES `fjelltur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bilde`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `bilde` WRITE;
/*!40000 ALTER TABLE `bilde` DISABLE KEYS */;
/*!40000 ALTER TABLE `bilde` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `fjell`
--

DROP TABLE IF EXISTS `fjell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fjell` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) NOT NULL,
  `hoyde` int(10) NOT NULL,
  `beskrivelse` varchar(250) NOT NULL,
  `region` int(16) NOT NULL,
  `fotografi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `region` (`region`),
  CONSTRAINT `region` FOREIGN KEY (`region`) REFERENCES `omrade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fjell`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `fjell` WRITE;
/*!40000 ALTER TABLE `fjell` DISABLE KEYS */;
INSERT INTO `fjell` VALUES
(1,'Ulriken',643,'Det høyeste av de 7 byfjellene. Ulriken har ekstremt mye aura og aura farmer over hele Bergen.',1,'ulriken.jpg'),
(2,'Lyderhorn',396,'Lyderhorn er et av de syv byfjellene i Bergen, og ligger rundt 5km vest for sentrum i Loddefjord.',1,'lyderhorn.jpg'),
(6,'Vidden',550,'Vidden i Bergen er \'hjertet\' av Bergens fjellstrekninger, og binder sammen mange fjell som bl.a Ulriken og Fløyen. Selve vidde platået strekker seg fra sør med Sædalen til nord med Hjorteland og Flaktveit.',1,'vidden.jpg');
/*!40000 ALTER TABLE `fjell` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `fjelltur`
--

DROP TABLE IF EXISTS `fjelltur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fjelltur` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `navn` varchar(100) NOT NULL COMMENT 'Navnet på fjellturen',
  `beskrivelse` varchar(255) NOT NULL,
  `dato` date NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `person` int(45) NOT NULL,
  `fjell` int(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personid` (`person`),
  KEY `fjellid` (`fjell`),
  CONSTRAINT `fjellid` FOREIGN KEY (`fjell`) REFERENCES `fjell` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `personid` FOREIGN KEY (`person`) REFERENCES `person` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fjelltur`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `fjelltur` WRITE;
/*!40000 ALTER TABLE `fjelltur` DISABLE KEYS */;
INSERT INTO `fjelltur` VALUES
(1,'Lyderhorn med Ivan og Andreas','Gikk opp Lyderhorn sammen med Ivan og Andreas. Var egentlig planlagt at vi skulle være flere, men de andre ditchet oss. Disse folkene var da Konrad, Viggo, Mats og Tobias Helgøy. :(','2026-03-21','lyderhornmedivanogandreas2026-03-21.jpg',1,2),
(3,'Vidden med Viggo, Konrad, Mats og Andreas','Gikk over Vidden med folkene nevnt i turnavnet. Det var veldig koselig, selvom Konrad, Mats og Andreas gikk fra meg og Viggo på krysset med veien til Fløyen og veien til Hjorteland.','2026-03-07','viddenmedviggo,konrad,matsogandreas2026-03-07.jpg',1,6),
(6,'Lyderhorn alene','Gikk på Lyderhorn alene, og fikk en ny high-score opp og ned. 39 minutter opp, og 1 time og 20 minutter både opp og ned. Var mye snø, vind, hagel og regn, så det ble litt tregere','2026-03-30','Lyderhorn-alene-2026-03-30.jpeg',1,2),
(7,'Lyderhorn med Magnus','Gikk over Lyderhorn med Magnus Grimholt. Fordi vi gikk i desember, ble det veldig fort mørkt, og vi fikk bruk for hodelykten min.','2025-12-27','Lyderhorn-med-Magnus-2025-12-27.jpeg',1,2),
(8,'Lyderhorn alene (28 minutter opp)','Denne turen gikk jeg opp Lyderhorn alene, på påskeaften. Det var veldig chill, og det var litt sånn \"impulstur\". Var fint vær, så jeg bestemte meg for å gå opp. Jeg slå highscoren! Det tok meg 28 minutter å gå opp, og 64 minutter å gå ned. Veldig kult! Op','2026-04-04','Lyderhorn-alene-(28-minutter-opp)-2026-04-04.jpeg',1,2);
/*!40000 ALTER TABLE `fjelltur` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `omrade`
--

DROP TABLE IF EXISTS `omrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `omrade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `navn` varchar(45) NOT NULL,
  `beskrivelse` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omrade`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `omrade` WRITE;
/*!40000 ALTER TABLE `omrade` DISABLE KEYS */;
INSERT INTO `omrade` VALUES
(1,'Bergensfjellene','Byfjellene i Bergen omfatter fjellområdene øst, sør og vest for Bergensdalen. Tradisjonelt regnes det med de syv fjell rundt byen, som fra gammelt av er gjengitt i byens segl. Byfjellene ligger dels i et sammenhengende fjellplatå øst for Bergensdalen, og flere enkeltstående fjell vest for dalen. Totalt omfatter dette langt flere enn syv fjell, men begrepet er gjerne avgrenset til de fjellene som er synlige fra byen, og lå innenfor eller nær byen før byutvidelsen i 1972.');
/*!40000 ALTER TABLE `omrade` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `brukernavn` varchar(45) NOT NULL,
  `epost` varchar(45) NOT NULL,
  `profilbilde` varchar(255) NOT NULL,
  `oauth_provider` varchar(50) NOT NULL COMMENT 'Kolonne for hvilken OAuth provider brukeren har logget inn med. Denne trengs vel egentlig ikke hvis du bare støtter 1 OAuth provider som jeg gjør (Google), men jeg bare har den her uansett for gøy.',
  `oauth_uid` varchar(200) NOT NULL COMMENT 'OAuth bruker id',
  `opprettet` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES
(1,'Isak Henriksen','isakbrunhenriksen@gmail.com','https://lh3.googleusercontent.com/a/ACg8ocJphxlKSQrIAew2n-8_P-_SJf0Zkr8FNdmrV9bFRXqjfORFXSFV=s96-c','google','102344735895956666645','2026-03-30 23:50:25',0);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-04-08  8:25:40
