CREATE DATABASE  IF NOT EXISTS `chickens` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `chickens`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: chickens
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `Bird_type`
--

DROP TABLE IF EXISTS `Bird_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Bird_type` (
  `bird_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_desc` varchar(90) DEFAULT NULL,
  `unit_sold` enum('pound','head') DEFAULT NULL,
  `default_price` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`bird_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bird_type`
--

LOCK TABLES `Bird_type` WRITE;
/*!40000 ALTER TABLE `Bird_type` DISABLE KEYS */;
INSERT INTO `Bird_type` VALUES (9,'silky','head',4.50),(11,'gray pullet','pound',1.52),(12,'yellow silkie','pound',NULL),(13,'yellow silkie','head',NULL),(14,'grey silkie','head',NULL),(15,'yellow pullet','pound',NULL),(16,'yellow pullet','pound',NULL),(17,'grey silkie','pound',NULL),(18,'grey silkie','head',NULL),(19,'yellow silkie','pound',NULL),(20,'grey silkie','pound',NULL),(21,'white pullet','head',NULL),(22,'white pullet','pound',NULL),(23,'white pullet','pound',NULL),(24,'white pullet','pound',NULL),(25,'white pullet','head',NULL),(26,'grey silkie','head',NULL),(27,'yellow silkie','pound',NULL);
/*!40000 ALTER TABLE `Bird_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Building`
--

DROP TABLE IF EXISTS `Building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_number` int(11) NOT NULL,
  `building_floor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Building`
--

LOCK TABLES `Building` WRITE;
/*!40000 ALTER TABLE `Building` DISABLE KEYS */;
INSERT INTO `Building` VALUES (1,1,'lower'),(2,1,'upper'),(3,2,'lower'),(4,2,'upper'),(5,3,'lower'),(6,3,'upper'),(7,4,'lower'),(8,4,'upper'),(9,5,'lower'),(10,5,'upper'),(11,6,'lower'),(12,6,'upper'),(13,7,'lower');
/*!40000 ALTER TABLE `Building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Coop`
--

DROP TABLE IF EXISTS `Coop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Coop` (
  `coop_id` int(11) NOT NULL,
  `coop_count` int(11) NOT NULL,
  PRIMARY KEY (`coop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Coop`
--

LOCK TABLES `Coop` WRITE;
/*!40000 ALTER TABLE `Coop` DISABLE KEYS */;
/*!40000 ALTER TABLE `Coop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Driver`
--

DROP TABLE IF EXISTS `Driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `license_st` varchar(45) DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `license_type` enum('CDL','NON-CDL') DEFAULT NULL,
  `license-expiration` datetime NOT NULL,
  `medical_expiration` datetime NOT NULL,
  `transmission_type` enum('MANUAL','AUTOMATIC') NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Driver`
--

LOCK TABLES `Driver` WRITE;
/*!40000 ALTER TABLE `Driver` DISABLE KEYS */;
/*!40000 ALTER TABLE `Driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Farm`
--

DROP TABLE IF EXISTS `Farm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Farm` (
  `farm_id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_name` varchar(60) NOT NULL,
  `farm_address` varchar(45) DEFAULT NULL,
  `farm_city` varchar(45) NOT NULL,
  PRIMARY KEY (`farm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Farm`
--

LOCK TABLES `Farm` WRITE;
/*!40000 ALTER TABLE `Farm` DISABLE KEYS */;
INSERT INTO `Farm` VALUES (3,'Webster','Main St','New York City'),(33,'Lakewood','Broad St','Philadelphia'),(34,'Livestock','Third Ave','Camden'),(35,'Lee','306 Johnson St','Brooklyn');
/*!40000 ALTER TABLE `Farm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Flock`
--

DROP TABLE IF EXISTS `Flock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Flock` (
  `flock_id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_type_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `birds_per_coop` int(11) DEFAULT NULL,
  `building_id` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `hatchlings` int(11) DEFAULT NULL,
  `flock_mortality` int(11) DEFAULT NULL,
  `flock_weight` double(4,2) DEFAULT NULL,
  `health_cert_url` varchar(45) DEFAULT NULL,
  `available` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`flock_id`),
  KEY `farm_flock_id_idx` (`farm_id`),
  KEY `building_flock_id_idx` (`building_id`),
  KEY `bird_type_flock_id_idx` (`bird_type_id`),
  CONSTRAINT `bird_type_flock_id` FOREIGN KEY (`bird_type_id`) REFERENCES `Bird_type` (`bird_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `building_flock_id` FOREIGN KEY (`building_id`) REFERENCES `Building` (`building_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `farm_flock_id` FOREIGN KEY (`farm_id`) REFERENCES `Farm` (`farm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Flock`
--

LOCK TABLES `Flock` WRITE;
/*!40000 ALTER TABLE `Flock` DISABLE KEYS */;
INSERT INTO `Flock` VALUES (2,9,3,16,1,'2019-11-22',15000,NULL,NULL,NULL,1),(4,11,34,8,1,'2019-10-20',22500,NULL,5.64,NULL,1),(5,12,35,NULL,1,'2019-10-23',4000,NULL,NULL,NULL,NULL),(6,13,33,NULL,3,'2019-10-23',4000,NULL,NULL,NULL,NULL),(7,14,34,NULL,3,'2019-10-23',1,NULL,NULL,NULL,NULL),(8,15,35,NULL,3,'2019-10-23',1,NULL,NULL,NULL,1),(9,16,3,NULL,2,'2019-10-23',1,NULL,NULL,NULL,NULL),(10,17,33,NULL,4,'2019-10-23',1,NULL,NULL,NULL,NULL),(11,18,33,NULL,5,'2019-10-23',1,NULL,NULL,NULL,1),(12,19,35,NULL,5,'2019-10-27',1,NULL,NULL,NULL,NULL),(13,20,34,NULL,5,'2019-10-27',1,NULL,NULL,NULL,NULL),(14,21,35,NULL,7,'2019-10-30',1,NULL,NULL,NULL,NULL),(15,22,34,NULL,6,'2019-10-27',1,NULL,NULL,NULL,NULL),(16,23,34,NULL,7,'2019-10-28',6500,NULL,NULL,NULL,1),(17,24,33,NULL,6,'2019-10-23',1,NULL,NULL,NULL,1),(18,25,3,NULL,3,'2019-11-01',1,NULL,NULL,NULL,NULL),(19,26,35,NULL,9,'2019-10-30',22500,NULL,NULL,NULL,NULL),(20,27,34,NULL,8,'2019-10-27',15400,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `Flock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Invoice`
--

DROP TABLE IF EXISTS `Invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_date` datetime NOT NULL,
  `invoice_number` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Invoice`
--

LOCK TABLES `Invoice` WRITE;
/*!40000 ALTER TABLE `Invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `Invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Manager`
--

DROP TABLE IF EXISTS `Manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(45) DEFAULT NULL,
  `manager_phone` bigint(14) DEFAULT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Manager`
--

LOCK TABLES `Manager` WRITE;
/*!40000 ALTER TABLE `Manager` DISABLE KEYS */;
INSERT INTO `Manager` VALUES (1,'Barry Boswick',8565551212),(2,'Chester Copperpot',6095551212),(3,'Hermoine Granger',2155551212);
/*!40000 ALTER TABLE `Manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `number_coops` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `flock_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `invoice_order_id_idx` (`invoice_id`),
  KEY `store_order_id_idx` (`store_id`),
  KEY `flock_order_id_idx` (`flock_id`),
  CONSTRAINT `flock_order_id` FOREIGN KEY (`flock_id`) REFERENCES `Flock` (`flock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `invoice_order_id` FOREIGN KEY (`invoice_id`) REFERENCES `Invoice` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `store_order_id` FOREIGN KEY (`store_id`) REFERENCES `Store` (`store_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (1,'2019-10-31',NULL,45,12,4),(2,'2019-10-31',NULL,25,12,2),(5,'2019-11-01',NULL,22,13,8);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Price_Arrangement`
--

DROP TABLE IF EXISTS `Price_Arrangement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Price_Arrangement` (
  `price_arrangement_id` int(11) NOT NULL AUTO_INCREMENT,
  `bird_type_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `weight_discount` decimal(3,2) DEFAULT NULL,
  `special_price` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`price_arrangement_id`),
  KEY `bird_type_pa_id_idx` (`bird_type_id`),
  KEY `store_pa_id_idx` (`store_id`),
  CONSTRAINT `bird_type_pa_id` FOREIGN KEY (`bird_type_id`) REFERENCES `Bird_type` (`bird_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `store_pa_id` FOREIGN KEY (`store_id`) REFERENCES `Store` (`store_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Price_Arrangement`
--

LOCK TABLES `Price_Arrangement` WRITE;
/*!40000 ALTER TABLE `Price_Arrangement` DISABLE KEYS */;
INSERT INTO `Price_Arrangement` VALUES (1,9,13,NULL,4.25);
/*!40000 ALTER TABLE `Price_Arrangement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Store`
--

DROP TABLE IF EXISTS `Store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(60) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `store_phone` bigint(14) DEFAULT NULL,
  `store_address` varchar(60) DEFAULT NULL,
  `store_city` varchar(60) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`store_id`),
  KEY `manager_store_id_idx` (`manager_id`),
  CONSTRAINT `manager_store_id` FOREIGN KEY (`manager_id`) REFERENCES `Manager` (`manager_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Store`
--

LOCK TABLES `Store` WRITE;
/*!40000 ALTER TABLE `Store` DISABLE KEYS */;
INSERT INTO `Store` VALUES (12,'Connor M Astemborski',2,1234567890,'2 cox farm road','Newark',1),(13,'Hedwig\'s Hattery',3,2125649531,'3348 3rd Ave','Brooklyn',1),(14,'Pengquin\'s Pengquins',1,2128524695,'392 Queens Blvd','Queens',0);
/*!40000 ALTER TABLE `Store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck`
--

DROP TABLE IF EXISTS `Truck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Truck` (
  `truck_id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_status` tinyint(4) DEFAULT '1',
  `truck_vin` varchar(17) DEFAULT NULL,
  `truck_plate_number` varchar(7) DEFAULT NULL,
  `truck_max_coops` int(11) DEFAULT NULL,
  `truck_transmition` enum('Manual','Automatic') DEFAULT NULL,
  `truck_number` int(11) DEFAULT NULL,
  `box_type` enum('Open','Closed') DEFAULT NULL,
  PRIMARY KEY (`truck_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck`
--

LOCK TABLES `Truck` WRITE;
/*!40000 ALTER TABLE `Truck` DISABLE KEYS */;
INSERT INTO `Truck` VALUES (11,1,'12341','12441',12,NULL,1,NULL);
/*!40000 ALTER TABLE `Truck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck_Driver`
--

DROP TABLE IF EXISTS `Truck_Driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Truck_Driver` (
  `truck_driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_driven` datetime DEFAULT NULL,
  `truck_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`truck_driver_id`),
  KEY `td_driver_id_idx` (`driver_id`),
  KEY `td_truck_id_idx` (`truck_id`),
  CONSTRAINT `td_driver_id` FOREIGN KEY (`driver_id`) REFERENCES `Driver` (`driver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `td_truck_id` FOREIGN KEY (`truck_id`) REFERENCES `Truck` (`truck_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck_Driver`
--

LOCK TABLES `Truck_Driver` WRITE;
/*!40000 ALTER TABLE `Truck_Driver` DISABLE KEYS */;
/*!40000 ALTER TABLE `Truck_Driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck_Order`
--

DROP TABLE IF EXISTS `Truck_Order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Truck_Order` (
  `truck_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `truck_id` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `stop_number` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`truck_order_id`),
  KEY `ti_truck_id_idx` (`truck_id`),
  KEY `ti_order_id_idx` (`order_id`),
  CONSTRAINT `to_order_id` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `to_truck_id` FOREIGN KEY (`truck_id`) REFERENCES `Truck` (`truck_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck_Order`
--

LOCK TABLES `Truck_Order` WRITE;
/*!40000 ALTER TABLE `Truck_Order` DISABLE KEYS */;
/*!40000 ALTER TABLE `Truck_Order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name_string` varchar(45) NOT NULL,
  `auth_string` varchar(45) DEFAULT NULL,
  `permission_set` enum('Sales Manager','Flock Manager','Admin','Truck Driver') DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'TestUser','TestUser','Sales Manager','Bob','Saget',NULL),(2,'NewTest','NewTest','Flock Manager','Bob','Saget',NULL),(4,'bbob','e876e901054ad24fbcc5a258fd47d90f9b32be90','Admin','Billy','Bob','e07859'),(5,'maddy','*7CFC270F79AAAAB51B5F0AB7F4734EB07C34E7C5','Admin','Maddy','Presnell','4a6e3b'),(6,'cassie','*6E42004C11CC772C4753BD1C15BB379795B71A5D','Admin','Cassandra','Bailey','f23bfe'),(8,'tinabelcher','*ECACE9890696938D826D90BB6DE4679AD46E4468','Truck Driver','Tina','Belcher','fb97a9'),(9,'genebelcher','*CE95EF80B6C3141857339EE6F0DC24863A0A61BC','Sales Manager','Gene','Belcher','9b0ca4'),(10,'bobbelcher','*35A083F6E363492E3CE93723781F9E6E4E39440E','Flock Manager','Bob','Belcher','0c96b8'),(11,'cborski','*254F5910537AC08E17B1C0A2ADC4272EEA4F8223','Admin','Connor','Astemborski','266278'),(12,'lindabelcher','*39EC7A222E1F71D51963EF2D5FB641DC560DBD70','Admin','Linda','Belcher','6e91cf');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`connor`@`localhost`*/ /*!50003 TRIGGER `chickens`.`User_BEFORE_INSERT` BEFORE INSERT ON `User` FOR EACH ROW
BEGIN
	
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'chickens'
--

--
-- Dumping routines for database 'chickens'
--
/*!50003 DROP FUNCTION IF EXISTS `changePassword` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cassie`@`localhost` FUNCTION `changePassword`(in_username VARCHAR(45), in_current_password VARCHAR(45), in_new_password VARCHAR(45), in_reenter VARCHAR(45)) RETURNS varchar(45) CHARSET latin1
BEGIN
	DECLARE message VARCHAR(45);
    DECLARE userid INT;
    DECLARE storedCurrentPassword VARCHAR(200);
    DECLARE proposedCurrentPassword VARCHAR(200);
    DECLARE setSalt VARCHAR(6);
    SET message = "fail";
    
	SELECT user_ID INTO userid FROM User WHERE name_string = in_username;
    SELECT auth_string INTO storedCurrentPassword FROM User WHERE user_ID = userid;
    SELECT password(concat(in_current_password, salt)) INTO proposedCurrentPassword FROM User WHERE user_ID = userid;
    SELECT salt INTO setSalt FROM User WHERE user_ID = userid;
    
    IF userid IS NOT NULL THEN
		IF storedCurrentPassword = proposedCurrentPassword THEN
			IF in_current_password != in_new_password AND in_username != in_new_password AND in_new_password = in_reenter THEN
				UPDATE User SET auth_string = password(concat(in_new_password, setSalt)) WHERE user_ID = userid;
                SET message = "success";
            END IF;
        END IF;
    END IF;
    
    RETURN message;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `user_login` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cassie`@`localhost` FUNCTION `user_login`(username VARCHAR(45),
							password VARCHAR(45)) RETURNS int(11)
BEGIN

	DECLARE current_user_id INT;
    DECLARE hashed_password VARCHAR(100);
    DECLARE user_salt VARCHAR(10);
    DECLARE user_password VARCHAR(100);
    SELECT user_ID INTO current_user_id FROM User
		WHERE name_string = username;
    
    IF current_user_id IS NOT NULL THEN
		SELECT password(concat(password, salt)) INTO hashed_password
			FROM User WHERE user_ID = current_user_id;
		SELECT auth_string INTO user_password FROM User
			WHERE user_ID = current_user_id;
            
		IF hashed_password != user_password THEN
			SET current_user_id = -1;
		END IF;
    ELSE
		SET current_user_id = -1;
	END IF;
	
	RETURN current_user_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addFarm` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `addFarm`(in farmname varchar(60), in farmaddress varchar(60), in farmcity varchar(60))
BEGIN
	
if exists(select f.farm_name from chickens.Farm f where farm_name = farmname)
	then 
    signal sqlstate '45000'
    set message_text = 'Farm already in database';
else 
	insert into Farm(farm_name, farm_address, farm_city)
	values (farmname, farmaddress, farmcity);
END if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addFlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `addFlock`(farmid int, buildingid int, numHatchlings int, delivDate date, btDesc varchar(45), 
								 btUnit enum('pound','head'))
BEGIN

insert into Bird_type(bird_desc, unit_sold)
values (btDesc, btUnit);

insert into Flock(bird_type_id, farm_id, building_id, delivery_date, hatchlings)
values (last_insert_id(), farmid, buildingid, delivDate, numHatchlings);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addManager` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `addManager`(manName varchar(60), manPhone bigint(14))
BEGIN

if exists (select m.manager_name, m.manager_phone 
			from Manager m 
            where manager_name = manName and
					manager_phone = manPhone)
	then
	signal sqlstate '45000'
    set message_text = 'Manager already exists.';
else
	insert into Manager(manager_name, manager_phone)
    values(manName, manPhone);
end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addOrder` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `addOrder`(numberCoops int, delivDate varchar(14), storeID int, flockID int)
BEGIN

if exists (select delivery_date, store_id, flock_id 
			from Orders 
			where delivery_date = delivDate and
					store_id = storeID and
                    flock_id = flockID)
then
	signal sqlstate '45000'
	set message_text = 'Order already exists for this date.';
else
    insert into Orders(number_coops, delivery_date, store_id, flock_id)
    values (numberCoops, str_to_date(delivDate, "%m-%d-%y"), storeID, flockID);            
end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `addStore` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `addStore`(storeName varchar(60), managerID int, storePhone bigint(14), 
								storeAddress varchar(60), storeCity varchar(60))
BEGIN

if exists (select s.store_name, s.store_address, s.store_city
			from Store s
            where store_name = storeName and
					store_address = storeAddress and
                    store_city = storeCity)
	then 
		signal sqlstate '45000'
        set message_text = 'Store already exists.';
else
    insert into Store(store_name, manager_id, store_phone, store_address, store_city, active)
    values (storeName, managerID, storePhone, storeAddress, storeCity, TRUE);
end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `createInv` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `createInv`(invDate date, invNum int)
BEGIN

if exists (select invoice_date, invoice_number
			from Invoice
			where invoice_date = invDate and
					invoice_number = invNum)
then
	signal sqlstate '45000'
    set message_text = 'Invoice already exists';
else
	insert into Invoice(invoice_date, invoice_number)
    values (invDate, invNum);
end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_user_procedure` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`cassie`@`localhost` PROCEDURE `create_user_procedure`(
	fname VARCHAR(45),
    lname VARCHAR(45),
    username VARCHAR(45),
    password VARCHAR(45),
    permission VARCHAR(45))
BEGIN
	DECLARE message VARCHAR(100);
    DECLARE userid_result INT(11);
    DECLARE created_salt VARCHAR(6);
    DECLARE hashed_password VARCHAR(200);
    
	SELECT user_ID into userid_result FROM User WHERE name_string = username;

	IF userid_result IS NOT NULL THEN
		SELECT "User creation failed. Username already registered. Please enter a different username." AS message;
    ELSE
		SELECT substring(sha1(rand()), 1, 6) INTO created_salt;
		SELECT PASSWORD(concat(password, created_salt)) INTO hashed_password;
		INSERT INTO User (name_string, auth_string, permission_set, 
							first_name, last_name, salt)
				VALUES
						(username, hashed_password, permission,
						fname, lname, created_salt);
	SELECT CONCAT("User creation successful for user ", username) INTO message;
    END IF;
    select message;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getCurrentOrders` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `getCurrentOrders`()
BEGIN

select s.store_name as 'store', o.number_coops as 'coops', b.bird_desc as 'bird', 
		date_format(o.delivery_date, "%m-%d-%y") as 'date'
from Orders o
	join Store s using (store_id)
    join Flock f using (flock_id)
    join Bird_type b using (bird_type_id)
order by store desc;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getFarm` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `getFarm`()
BEGIN
	select f.farm_id, f.farm_name, f.farm_address, f.farm_city
	from chickens.Farm f;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getFlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `getFlock`()
BEGIN

select f.farm_name, 
		b.building_number,b.building_floor, 
        bt.bird_desc,bt.unit_sold,fl.delivery_date,fl.hatchlings
from Flock fl
	join Farm f using (farm_id)
    join Building b using (building_id)
    join Bird_type bt using (bird_type_id);
   
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getStoreOrders` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `getStoreOrders`(storeID int)
BEGIN

select o.number_coops as 'coops', b.bird_desc as 'bird', 
		date_format(o.delivery_date, "%m-%d-%y") as 'date'
from Orders o
	join Flock f using (flock_id)
    join Bird_type b using (bird_type_id)
where o.store_id = storeID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `removeFarm` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `removeFarm`(farmid int)
BEGIN

if exists(select farm_id from Farm where farm_id = farmid)
then
	delete from Farm
    where farm_id = farmid;
else
	signal sqlstate '45000'
    set message_text = 'Farm does not exist in database';
end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `selectActiveStore` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `selectActiveStore`()
BEGIN

select store_id, store_name
from Store
where active = TRUE;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `selectBird` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `selectBird`()
BEGIN

select flock_id, bird_desc
from Bird_type
	join Flock using (bird_type_id)
where available = True;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `selectFarm` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`barret`@`localhost` PROCEDURE `selectFarm`(farmID int)
BEGIN
	select f.farm_name, f.farm_address, f.farm_city
	from chickens.Farm f
    where f.farm_id = farmID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`connor`@`localhost` PROCEDURE `update_user`(in newPass VARCHAR(45), in userName VARCHAR(45))
BEGIN
   Select @salt:=lpad(conv(floor(rand()*pow(36,6)), 10, 36), 4, 0);
   select @saltPass := concat(newPass, salt);
   Select @encrypPass := aes_encrypt(newPass, @salt);
   update User
	Set auth_sting = @encrypPass, salt = @salt
    where name_string = userName;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-30 16:11:10
