-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2021 a las 22:01:00
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `galver_sistema2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje`
--

CREATE TABLE `hoja_de_viaje` (
  `hojaDeViajeID` int(11) NOT NULL,
  `hojaDeViajeOrigen` varchar(500) DEFAULT NULL,
  `hojaDeViajeOrigenDeDestino` varchar(500) DEFAULT NULL,
  `hojaDeViajeFechaDeEdicion` varchar(50) DEFAULT NULL,
  `hojaDeViajeFechaLiberacion` varchar(50) DEFAULT NULL,
  `hojaDeViajeFechaArribo` varchar(50) DEFAULT NULL,
  `hojaDeViajeFechaCarga` varchar(50) DEFAULT NULL,
  `hojaDeViajeFechaLlegadaDeDescarga` varchar(50) DEFAULT NULL,
  `hojaDeViajeFechaDescarga` varchar(50) DEFAULT NULL,
  `hojaDeViajeCantidadCarga` double NOT NULL,
  `hojaDeViajeCantidadCargaProporcion` double NOT NULL,
  `hojaDeViajeTalon1` varchar(30) NOT NULL,
  `hojaDeViajeTalon2` varchar(30) NOT NULL,
  `remolqueCargaId1` int(11) NOT NULL,
  `remolqueCargaId2` int(11) NOT NULL,
  `remolqueID1` int(11) NOT NULL,
  `remolqueID2` int(11) NOT NULL,
  `tractorId` int(11) NOT NULL,
  `cargaId` int(11) NOT NULL,
  `cargaUnidadDeMedidaID` int(11) NOT NULL,
  `hojaDeViajeEstadoId` int(11) NOT NULL,
  `usuarioCreadorId` int(11) NOT NULL,
  `usuarioEditorId` int(11) NOT NULL,
  `empresaEmisoraId` int(11) NOT NULL,
  `empresaReceptoraId` int(11) NOT NULL,
  `hojaDeViajeComentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje`
--

INSERT INTO `hoja_de_viaje` (`hojaDeViajeID`, `hojaDeViajeOrigen`, `hojaDeViajeOrigenDeDestino`, `hojaDeViajeFechaDeEdicion`, `hojaDeViajeFechaLiberacion`, `hojaDeViajeFechaArribo`, `hojaDeViajeFechaCarga`, `hojaDeViajeFechaLlegadaDeDescarga`, `hojaDeViajeFechaDescarga`, `hojaDeViajeCantidadCarga`, `hojaDeViajeCantidadCargaProporcion`, `hojaDeViajeTalon1`, `hojaDeViajeTalon2`, `remolqueCargaId1`, `remolqueCargaId2`, `remolqueID1`, `remolqueID2`, `tractorId`, `cargaId`, `cargaUnidadDeMedidaID`, `hojaDeViajeEstadoId`, `usuarioCreadorId`, `usuarioEditorId`, `empresaEmisoraId`, `empresaReceptoraId`, `hojaDeViajeComentario`) VALUES
(9, 'oregon ', NULL, '2021:05:24 14:54:00.000000', '2021:05:24 14:54:00.000000', NULL, NULL, NULL, NULL, 20, 20, '1', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 5, 'son 40'),
(10, 'cdmx', NULL, '2021:05:24 14:56:00.000000', '2021:05:24 14:56:00.000000', NULL, NULL, NULL, NULL, 6, 2, '12', '12', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 5, 'son 12'),
(11, 'cdmx', NULL, '2021:05:24 14:56:00.000000', '2021:05:24 14:56:00.000000', NULL, NULL, NULL, NULL, 6, 2, '121', '1211', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 5, 'son 12'),
(12, 'jklñ{', NULL, '2021:05:24 14:57:00.000000', '2021:05:24 14:57:00.000000', NULL, NULL, NULL, NULL, 0, 0, 'fghjkl', 'hjklñ{', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 5, ''),
(13, 'ghjkl', NULL, '2021:05:24 15:00:00.000000', '2021:05:24 15:00:00.000000', NULL, NULL, NULL, NULL, 0, 0, '67890', '90op', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 5, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  ADD PRIMARY KEY (`hojaDeViajeID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  MODIFY `hojaDeViajeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
