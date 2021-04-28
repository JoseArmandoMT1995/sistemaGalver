-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 21:47:29
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
-- Base de datos: `galversistema2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadotalon`
--

CREATE TABLE `estadotalon` (
  `estadoTalonId` int(11) NOT NULL,
  `estadoTalonNombre` varchar(100) NOT NULL,
  `estadoTalonDescripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persmiso`
--

CREATE TABLE `persmiso` (
  `permisoId` int(11) NOT NULL,
  `permisoNombre` varchar(20) NOT NULL,
  `permisoDescripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `sesionId` int(11) NOT NULL,
  `sesionNombre` varchar(30) NOT NULL,
  `sesionPassword` varchar(20) NOT NULL,
  `permisoId` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`sesionId`, `sesionNombre`, `sesionPassword`, `permisoId`, `created_at`) VALUES
(1, 'hola', 'hola', 4, '2021-04-27 15:12:04'),
(2, 'jose', 'jose', 1, '2021-04-28 20:29:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talon`
--

CREATE TABLE `talon` (
  `talonID` int(11) NOT NULL,
  `sesionId` int(11) NOT NULL,
  `talonEmpresaEmisora` int(1) NOT NULL,
  `talonEmpresaReceptora` int(1) NOT NULL,
  `talonOperador` varchar(200) NOT NULL,
  `talonOrigen` varchar(200) NOT NULL,
  `talonDestino` varchar(200) NOT NULL,
  `talonRemolque1` varchar(200) NOT NULL,
  `talonRemolque2` varchar(200) NOT NULL,
  `talonPlaca1` varchar(200) NOT NULL,
  `talonPlaca2` varchar(200) NOT NULL,
  `talonFolioCaja1` varchar(200) NOT NULL,
  `talonFolioCaja2` varchar(200) NOT NULL,
  `talonLisencia` varchar(200) NOT NULL,
  `talonFechaLiberacion` datetime NOT NULL,
  `talonFechaCarga` datetime NOT NULL,
  `talonFechaDescarga` datetime NOT NULL,
  `talonFechaArribo` datetime NOT NULL,
  `talonCantidadUnidad` int(11) NOT NULL,
  `talonCantidadValor` double NOT NULL,
  `estadoTalonId` int(11) NOT NULL,
  `talonTalon1` varchar(200) NOT NULL,
  `talonTalon2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadotalon`
--
ALTER TABLE `estadotalon`
  ADD PRIMARY KEY (`estadoTalonId`);

--
-- Indices de la tabla `persmiso`
--
ALTER TABLE `persmiso`
  ADD PRIMARY KEY (`permisoId`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`sesionId`);

--
-- Indices de la tabla `talon`
--
ALTER TABLE `talon`
  ADD PRIMARY KEY (`talonID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadotalon`
--
ALTER TABLE `estadotalon`
  MODIFY `estadoTalonId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persmiso`
--
ALTER TABLE `persmiso`
  MODIFY `permisoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `sesionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `talon`
--
ALTER TABLE `talon`
  MODIFY `talonID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
