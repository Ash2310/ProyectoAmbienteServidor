-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2017 a las 23:00:28
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
  `imagenp` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Idp`)
) ENGINE=InnoDB AUTO_INCREMENT=12351 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`Idp`, `Codigo`, `Marca`, `Descripcion`, `Precio`, `Cantidad`, `imagenp`) VALUES
(11, 132, 'Marca', 'Marca', 123, 5000, 'image (3).jpg'),
(1234, 132, 'Marca', 'Marca', 123, 340, 'image (2).jpg'),
(12345, 132, 'Marca', 'Marca', 123, 4, 'image (1).jpg'),
(12346, 132, 'Marca', 'Marca', 123, 4, 'image (1).jpg'),
(12347, 132, 'Marca', 'Marca', 123, 5000, 'image (3).jpg'),
(12348, 132, 'Marca', 'Marca', 123, 4, 'image (2).jpg'),
(12349, 132, 'Marca', 'Marca', 123, 4, 'image (1).jpg'),
(12350, 132, 'Marca', 'Marca', 123, 4, 'image (1).jpg');

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
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(34) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`Id`, `Cedula`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `Usuario`, `Contrasena`, `Rol`) VALUES
(1, '1', '1', '1', 1, '1@1.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, '12', '12', '12', 12, '11@1.com', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
