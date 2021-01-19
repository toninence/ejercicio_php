-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla teatro.obra
CREATE TABLE IF NOT EXISTS `obra` (
  `cod_obra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_obra` date DEFAULT NULL,
  `aforo` int(11) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `sala` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_obra`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla teatro.obra: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `obra` DISABLE KEYS */;
REPLACE INTO `obra` (`cod_obra`, `nombre`, `fecha_obra`, `aforo`, `disponibles`, `sala`, `imagen`) VALUES
	(1, 'Hamlet', '2020-12-30', 250, 2, 1, 'https://images-na.ssl-images-amazon.com/images/I/51ZaFL6B7lL.jpg'),
	(2, 'Romeo y Julieta', '2021-01-01', 300, 190, 2, 'https://www.libsa.es/wp-content/uploads/2018/03/9788466237758.gif'),
	(3, 'Fuenteovejuna', '2020-12-27', 180, 107, 3, 'https://espaciolibros.com/wp-content/uploads/2019/11/espaciolibros-fuenteovejuna-resumen-comentario-de-texto-portada.jpg'),
	(4, 'Edipo Rey', '2021-01-03', 250, 5, 4, 'https://cdn.culturagenial.com/es/imagenes/cq5dam-web-1280-1280-cke.jpg'),
	(5, 'La vida es un sueño', '2020-12-28', 150, 0, 5, 'https://cdn.culturagenial.com/es/imagenes/la-vida-es-sueno-de-pedro-calderon-de-la-barca-teatro-d-nq-np-956325-mla25419632927-032017-f-cke.jpg'),
	(6, 'La casa de Bernarda Alba', '2020-12-28', 200, 100, 6, 'https://comunicacion.uaa.mx/revista/wp-content/uploads/2018/06/La-casa-de-Bernarda-Alba-620x350.jpg'),
	(7, 'El sueño de una noche de verano', '2021-01-05', 200, 0, 7, 'https://image.isu.pub/190709204809-9c82f7fce8bb840f1ff3b5631eef637f/jpg/page_1.jpg'),
	(8, 'don juan tenorio', '2021-01-02', 200, 10, 2, 'https://t1.up.ltmcdn.com/es/images/4/9/4/don_juan_tenorio_resumen_breve_2494_600.jpg');
/*!40000 ALTER TABLE `obra` ENABLE KEYS */;

-- Volcando estructura para tabla teatro.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `numero_venta` int(11) NOT NULL AUTO_INCREMENT,
  `cod_obra` int(11) NOT NULL,
  `comprador` varchar(255) NOT NULL,
  `fecha_compra` date DEFAULT curdate(),
  PRIMARY KEY (`numero_venta`),
  KEY `venta_obra` (`cod_obra`),
  CONSTRAINT `venta_obra` FOREIGN KEY (`cod_obra`) REFERENCES `obra` (`cod_obra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla teatro.ventas: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
REPLACE INTO `ventas` (`numero_venta`, `cod_obra`, `comprador`, `fecha_compra`) VALUES
	(23, 1, 'Gaston', '2020-12-30'),
	(24, 3, 'Gaston', '2020-12-30'),
	(25, 3, 'Gaston', '2020-12-30'),
	(26, 3, 'Gaston', '2020-12-30'),
	(27, 3, 'Gaston', '2020-12-30'),
	(28, 3, 'Gaston', '2020-12-30'),
	(29, 3, 'Gaston', '2020-12-30'),
	(30, 3, 'Gaston', '2020-12-30'),
	(31, 3, 'Gaston', '2020-12-30'),
	(32, 3, 'Gaston', '2020-12-30'),
	(33, 3, 'Gaston', '2020-12-30'),
	(34, 3, 'Gaston', '2020-12-30'),
	(36, 1, 'Juango', '2020-12-30'),
	(37, 4, 'Rousita', '2020-12-30'),
	(38, 2, 'Jose', '2020-12-30'),
	(39, 2, 'Jose', '2020-12-30'),
	(40, 2, 'Jose', '2020-12-30'),
	(42, 2, 'Gaston', '2020-12-30'),
	(43, 2, 'Gastón', '2020-12-30'),
	(44, 8, 'Gaston', '2020-12-30'),
	(45, 2, 'Jorge el curioso', '2020-12-30'),
	(46, 8, 'Jorge', '2020-12-30'),
	(47, 8, 'Jorge', '2020-12-30'),
	(48, 2, 'Cande', '2020-12-30'),
	(49, 2, 'Juanita', '2020-12-30'),
	(50, 2, 'Abuela moni', '2020-12-30');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
