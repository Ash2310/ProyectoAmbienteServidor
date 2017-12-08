-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-12-2017 a las 04:53:31
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--

DROP TABLE IF EXISTS `tbl_articulo`;
CREATE TABLE IF NOT EXISTS `tbl_articulo` (
  `Idp` int(20) NOT NULL AUTO_INCREMENT,
  `Codigo` int(35) NOT NULL,
  `Marca` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Precio` double NOT NULL,
  `Cantidad` int(30) NOT NULL,
  `imagenp` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Idp`),
  UNIQUE KEY `Codigo` (`Codigo`),
  UNIQUE KEY `Idp` (`Idp`)
) ENGINE=InnoDB AUTO_INCREMENT=12351 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`Idp`, `Codigo`, `Marca`, `Descripcion`, `Precio`, `Cantidad`, `imagenp`) VALUES
(1, 10001, 'Anillo', 'Anillo de compromiso', 150000, 4, 'image (1).jpg'),
(2, 10002, 'Anillo', 'Anillo Matrimonio Oro sin personalizar', 90000, 50, 'image (2).jpg'),
(3, 10003, 'Anillo', 'Anillo Simple', 23000, 12, 'image (3).jpg'),
(4, 10004, 'Reloj', 'Reloj Rolex Mod. 550', 302500.13, 6, 'image (4).jpg'),
(5, 10005, 'Gargantilla', 'Gargantilla Oro GDE con incrustaciones de zafiro', 505000, 2, 'image (5).jpg'),
(6, 10006, 'Reloj', 'Reloj Casio Hombre Mod 13 Y17', 36000, 15, 'image (6).jpg'),
(7, 10007, 'Anillo', 'Anillo platino Hombre', 12000, 60, 'image (7).jpg'),
(8, 10008, 'Reloj', 'Reloj Cassio Baby - G Rosa Shock proof', 75000, 4, 'image (8).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compra`
--

DROP TABLE IF EXISTS `tbl_compra`;
CREATE TABLE IF NOT EXISTS `tbl_compra` (
  `id` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_articulo` int(20) NOT NULL,
  `num_factura` int(10) NOT NULL,
  `fecha_compra` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_articulo` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(34) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `cedula`, `nombre`, `apellidos`, `telefono`, `email`, `usuario`, `contrasena`, `rol`) VALUES
(1, '1', '1', '1', 1, '1@1.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, '12', '12', '12', 12, '11@1.com', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
