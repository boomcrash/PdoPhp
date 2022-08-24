-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: daw.mysql.database.azure.com    Database: superium
-- ------------------------------------------------------
-- Server version	5.6.47.0

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

CREATE database superium;
use superium;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto` (
  `contacto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `intereses` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contacto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (1,'Jose','Hernandez','0968233315','j@hotmai.com','Masculino','1','0','2022-09-01',''),(2,'Fabricio','Lascano','125555563','fabricio@hotmail.com','Otro','2','0','2022-08-18','Llamenme por favor'),(3,'Hilton','Colon','0999999999','hilton@hotmail.com','Masculino','1','1','2022-08-03','Quiero saber mas informacion.');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disenio_producto`
--

DROP TABLE IF EXISTS `disenio_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disenio_producto` (
  `disenio_id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `disenio` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`disenio_id`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disenio_producto`
--

LOCK TABLES `disenio_producto` WRITE;
/*!40000 ALTER TABLE `disenio_producto` DISABLE KEYS */;
INSERT INTO `disenio_producto` VALUES (1,'Abrigo','Arlette','Estandar','caricatura'),(2,'Gorra','Sara','Sorpresa','anime'),(3,'Taza','Joice','Personalizado','anime');
/*!40000 ALTER TABLE `disenio_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio_domicilio`
--

DROP TABLE IF EXISTS `envio_domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `envio_domicilio` (
  `domicilio_id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `postal` varchar(6) DEFAULT NULL,
  `referencias` varchar(50) DEFAULT NULL,
  `tipo_envio` varchar(50) DEFAULT NULL,
  `productos` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`domicilio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio_domicilio`
--

LOCK TABLES `envio_domicilio` WRITE;
/*!40000 ALTER TABLE `envio_domicilio` DISABLE KEYS */;
INSERT INTO `envio_domicilio` VALUES (1,'1212121212','0912121212','12122','123421','asasdasd','Express','Camisas Gorros ','Duran'),(2,'1212121212','0912121212','test@gmail.com','121212','esto es ref','Rapido','Abrigos Gorros ','Quevedo'),(3,'1212121212','0912121212','asasas@outlook.com','123421','ref','Express','Camisas Abrigos ','Machala');
/*!40000 ALTER TABLE `envio_domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envio_internacional`
--

DROP TABLE IF EXISTS `envio_internacional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `envio_internacional` (
  `internacional_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `recibir_via` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `recibir_info` int(1) DEFAULT NULL,
  `especificaciones` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`internacional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envio_internacional`
--

LOCK TABLES `envio_internacional` WRITE;
/*!40000 ALTER TABLE `envio_internacional` DISABLE KEYS */;
INSERT INTO `envio_internacional` VALUES (1,'Lola','Saled','2654555','ddd6@f.com','El recreo','Servientrega','Peru',1,'Girar por la farmacia Cruz Azul.'),(2,'Paula','Yanez','0955556325','pau6@f.com','Florida','MundoExpress','Colombia',0,'Girar por la farmacia Sana Sana.'),(3,'Carlos','Escalante','12533315','carlos6@f.com','Alborada','Tramaco','Venezuela',1,'Girar por la farmacia Trebol.');
/*!40000 ALTER TABLE `envio_internacional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resenia`
--

DROP TABLE IF EXISTS `resenia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resenia` (
  `resenia_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `valoracion` int(1) DEFAULT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `resenia` varchar(100) DEFAULT NULL,
  `recibir_promo` int(1) DEFAULT NULL,
  PRIMARY KEY (`resenia_id`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resenia`
--

LOCK TABLES `resenia` WRITE;
/*!40000 ALTER TABLE `resenia` DISABLE KEYS */;
INSERT INTO `resenia` VALUES (1,'Emely','emely_apraez@hotmail.com',2,'A domicilio','Me parece excelente servicio.',1),(2,'Mishell','mishell@hotmail.com',3,'Internacional','Me parece pesimo servicio.',0),(3,'Johana','johana@hotmail.com',5,'Internacional','Me encanto e producto y el servicio',1);
/*!40000 ALTER TABLE `resenia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-24 11:10:25
