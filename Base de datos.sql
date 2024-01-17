CREATE DATABASE  IF NOT EXISTS `vital_care` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `vital_care`;
-- MariaDB dump 10.19  Distrib 10.6.8-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: vital_care
-- ------------------------------------------------------
-- Server version	10.6.8-MariaDB

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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `citFecha` date NOT NULL,
  `citHora` time NOT NULL,
  `citPaciente` int(11) NOT NULL,
  `citMedico` int(11) NOT NULL,
  `citConsultorio` int(11) NOT NULL,
  `citEstado` enum('Asignado','Atendido') NOT NULL,
  `citObservaciones` text DEFAULT NULL,
  PRIMARY KEY (`idCita`),
  KEY `fk_citas_pacientes` (`citPaciente`),
  KEY `fk_citas_medicos` (`citMedico`),
  CONSTRAINT `fk_citas_medicos` FOREIGN KEY (`citMedico`) REFERENCES `medicos` (`idMedico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citas_pacientes` FOREIGN KEY (`citPaciente`) REFERENCES `pacientes` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'2022-08-07','10:00:00',1,1,1,'Asignado','Presenta gripa fuerte'),(2,'2022-09-11','06:00:00',2,6,4,'Asignado','Ninguna'),(3,'2022-09-27','02:00:00',3,9,5,'Asignado','Problema de comportamiento'),(4,'2021-11-12','05:00:00',4,9,3,'Atendido','Ninguna'),(5,'2021-09-19','09:00:00',5,2,4,'Asignado','Presenta signos de descontrol'),(9,'2022-09-21','05:46:00',6,4,5,'Asignado','Ninguna');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultorios`
--

DROP TABLE IF EXISTS `consultorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultorios` (
  `idConsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `conNombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idConsultorio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultorios`
--

LOCK TABLES `consultorios` WRITE;
/*!40000 ALTER TABLE `consultorios` DISABLE KEYS */;
INSERT INTO `consultorios` VALUES (1,'VC Medicina General'),(2,'VC Pediátrico'),(3,'VC Geriátrico'),(4,'VC Especialidad'),(5,'VC Psquiatra');
/*!40000 ALTER TABLE `consultorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `medIdentificacion` char(15) NOT NULL,
  `medNombres` varchar(50) NOT NULL,
  `medApellidos` varchar(50) NOT NULL,
  `medEspecialidad` varchar(50) NOT NULL,
  `medTelefono` char(15) NOT NULL,
  `medCorreo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMedico`,`medIdentificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'1645645465','Joel','Pavon Valencia','Medicina General','3136055445','joel@gmail.com'),(2,'1874687564','Javi','Herrero','Psiquiatría','3130490310','javi@hotmail.com'),(3,'1876546879','Espiridión','Bauzá Benitez','Anestesilogía','3136628243','espiridion@outlook.es'),(4,'1657614546','Rómulo','Santos Luna','Patología','3133448071','romulo@yahoo.com'),(5,'1346104044','Hermenia','Viana','Reumatologia','3132214368','hermenia@gmail.com'),(6,'1065450980','Loreto','Vaquero Riquelme','medicina interna','3137351749','loreto12@hotmail.com'),(7,'1675460058','Melisa','Uria Casas','Radioterapia','3137351749','melisa@yahoo.com'),(8,'1575234843','Javier','Gaviria','Pediatra','3139958017','javier@gmail.com'),(9,'6540654605','Adolfo','Coy','Geriatra','3156840806','adolfo@hotmail.com');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `paciIdentificacion` char(15) NOT NULL,
  `pacNombres` varchar(50) NOT NULL,
  `pacApellidos` varchar(50) NOT NULL,
  `pacFechaNacimiento` date NOT NULL,
  `pacSexo` enum('Femenino','Masculino') NOT NULL,
  PRIMARY KEY (`idPaciente`,`paciIdentificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'1006089723','Jefferson','Gonzalez Mahecha','1999-11-17','Masculino'),(2,'1008923489','Andrea','Gonzalez Mahecha','2012-12-10','Femenino'),(3,'1008974566','Brayan Sebastian','Herrera Peña','1989-04-13','Masculino'),(4,'1079849182','Edwin','Cardozo Aparicio','1997-08-27','Masculino'),(5,'1654654685','Jessica Lorena','Diaz Gonzalez','2000-02-20','Femenino'),(6,'1006029568','Carlos','Martines','2022-09-05','Masculino'),(8,'123456789','Arturo','calle','2022-09-13','Masculino');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` text DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Coordinador de Citas'),(3,'Medico');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuLogin` char(15) NOT NULL,
  `usuPassword` varchar(60) NOT NULL,
  `usuEstado` enum('Activo','Inactivo') NOT NULL,
  `usuRol` text DEFAULT NULL,
  PRIMARY KEY (`idUsuario`,`usuLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'Juanes','as546df6','Inactivo','Coordinador de Citas'),(5,'Javi','et564sdg54','Inactivo','Medico'),(6,'Jefferson','#4dg5G66','Activo','Administrador'),(8,'Michel','$$gfas54','Inactivo','Coordinador de Citas'),(9,'Melisa','&^212dfg','Inactivo','Medico'),(13,'Lorena','12345','Inactivo','Administrador'),(15,'Natalia','asfhdaksef','Inactivo','Mendico'),(16,'Jefferson','12345','Inactivo','Coordinador de Citas'),(17,'Alejandra','asdfasdf','Activo','Mendico');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-22  8:56:34
