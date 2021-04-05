-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.5.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para personalwebservicepostman
DROP DATABASE IF EXISTS `personalwebservicepostman`;
CREATE DATABASE IF NOT EXISTS `personalwebservicepostman` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `personalwebservicepostman`;

-- Volcando estructura para tabla personalwebservicepostman.tm_categoria
DROP TABLE IF EXISTS `tm_categoria`;
CREATE TABLE IF NOT EXISTS `tm_categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(50) NOT NULL,
  `cat_obs` varchar(250) NOT NULL,
  `est` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla personalwebservicepostman.tm_categoria: ~4 rows (aproximadamente)
DELETE FROM `tm_categoria`;
/*!40000 ALTER TABLE `tm_categoria` DISABLE KEYS */;
INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `cat_obs`, `est`) VALUES
	(1, 'Televisores', 'Observacion de TVs', 0),
	(2, 'Refigeradores', 'Observacion de Refigeradores', 0),
	(3, 'Cocinas', 'Observacion de Cocinas', 1),
	(4, 'Lavadoras', 'Observacion de lavadores', 1),
	(5, 'Celular', 'Observacion insert postman celular', 1),
	(6, 'Computadores', 'Computadores en actualizacion', 1),
	(7, 'Desarrollo Web', 'Actualización de la categoria Por medio de Postman', 1);
/*!40000 ALTER TABLE `tm_categoria` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
