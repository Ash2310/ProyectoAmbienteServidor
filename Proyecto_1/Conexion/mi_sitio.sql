-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2016 a las 11:33:29
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_sitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--

CREATE TABLE `tbl_articulo` (
  `id` int(10) NOT NULL,
  `codigo` int(10) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compra`
--

CREATE TABLE `tbl_compra` (
  `id` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_articulo` int(20) NOT NULL,
  `num_factura` int(10) NOT NULL,
  `fecha_compra` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_compra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(10) NOT NULL,
  `cedula` int(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `telefono` int(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD CONSTRAINT `tbl_compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_compra_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `tbl_articulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
