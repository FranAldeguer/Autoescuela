# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: autoescuela2
# Generation Time: 2013-05-09 19:12:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table alum_carnet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alum_carnet`;

CREATE TABLE `alum_carnet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) unsigned DEFAULT NULL,
  `id_carnet` int(11) unsigned DEFAULT NULL,
  `terminado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_idAlum_alum` (`id_alumno`),
  KEY `FK_idCanet_carnet` (`id_carnet`),
  CONSTRAINT `FK_idAlum_alum` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_idCanet_carnet` FOREIGN KEY (`id_carnet`) REFERENCES `carnet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table alum_test
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alum_test`;

CREATE TABLE `alum_test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_alum_carnet` int(11) unsigned DEFAULT NULL,
  `id_test` int(11) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fallos` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idAlumno_alumno` (`id_alum_carnet`),
  KEY `FK_idTest_test` (`id_test`),
  CONSTRAINT `FK_idAlumCarnet_alumCarnet` FOREIGN KEY (`id_alum_carnet`) REFERENCES `alum_carnet` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_idTest_test` FOREIGN KEY (`id_test`) REFERENCES `test` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table alumno
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) NOT NULL DEFAULT '',
  `nombre` varchar(20) NOT NULL DEFAULT '',
  `apellidos` varchar(40) DEFAULT NULL,
  `fecha_nac` date DEFAULT '0000-00-00',
  `telefono` int(9) DEFAULT '0',
  `mail` varchar(50) DEFAULT NULL,
  `id_profesor` int(11) unsigned DEFAULT NULL,
  `pass` varchar(32) DEFAULT 'passwd',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  KEY `FK_idProfesor_profesor` (`id_profesor`),
  CONSTRAINT `FK_idProfesor_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table autoescuela
# ------------------------------------------------------------

DROP TABLE IF EXISTS `autoescuela`;

CREATE TABLE `autoescuela` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `poblacion` varchar(40) DEFAULT NULL,
  `provincia` varchar(40) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table carnet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carnet`;

CREATE TABLE `carnet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` text,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table coleccion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coleccion`;

CREATE TABLE `coleccion` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `id_carnet` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idCarnet_Carnet` (`id_carnet`),
  CONSTRAINT `FK_idCarnet_Carnet` FOREIGN KEY (`id_carnet`) REFERENCES `carnet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table entrega
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entrega`;

CREATE TABLE `entrega` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `id_alumno` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idAlum_alumno` (`id_alumno`),
  CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table examen_practico
# ------------------------------------------------------------

DROP TABLE IF EXISTS `examen_practico`;

CREATE TABLE `examen_practico` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `fallos_leves` tinyint(2) DEFAULT NULL,
  `fallos_graves` tinyint(2) DEFAULT NULL,
  `id_alum_carnet` int(11) unsigned DEFAULT NULL,
  `apto` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idAlumCarnet` (`id_alum_carnet`),
  CONSTRAINT `examen_practico_ibfk_1` FOREIGN KEY (`id_alum_carnet`) REFERENCES `alum_carnet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table examen_teorico
# ------------------------------------------------------------

DROP TABLE IF EXISTS `examen_teorico`;

CREATE TABLE `examen_teorico` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `fallos` tinyint(2) DEFAULT NULL,
  `id_alum_carnet` int(11) unsigned DEFAULT NULL,
  `apto` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idAlumCarnet` (`id_alum_carnet`),
  CONSTRAINT `FK_idAlumCarnet` FOREIGN KEY (`id_alum_carnet`) REFERENCES `alum_carnet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table practica
# ------------------------------------------------------------

DROP TABLE IF EXISTS `practica`;

CREATE TABLE `practica` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_alum_carnet` int(11) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tiempo` time DEFAULT NULL,
  `notas_profesor` text,
  `precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idAlumnoCarnet` (`id_alum_carnet`),
  CONSTRAINT `FK_idAlumnoCarnet` FOREIGN KEY (`id_alum_carnet`) REFERENCES `alum_carnet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table precio_hora
# ------------------------------------------------------------

DROP TABLE IF EXISTS `precio_hora`;

CREATE TABLE `precio_hora` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `precio` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table profesor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT 'NOT NULL',
  `apellidos` varchar(40) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `practico` tinyint(1) unsigned zerofill DEFAULT '0',
  `encargado` tinyint(1) DEFAULT '0',
  `pass` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefono` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table test
# ------------------------------------------------------------

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `id_coleccion` int(11) unsigned NOT NULL,
  `num_preguntas` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_idColeccion_Coleccion` (`id_coleccion`),
  CONSTRAINT `FK_idColeccion_Coleccion` FOREIGN KEY (`id_coleccion`) REFERENCES `coleccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
