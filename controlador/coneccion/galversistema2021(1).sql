-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2021 a las 21:56:48
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
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `cargaId` int(11) NOT NULL,
  `cargaNombre` varchar(50) NOT NULL,
  `cargaDescripcion` varchar(500) NOT NULL,
  `cargaFecaCreacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`cargaId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`) VALUES
(1, 'bulto', '', '2021-05-05 20:40:24'),
(2, 'saco', '', '2021-05-05 20:40:24'),
(3, 'super saco', '', '2021-05-05 20:40:24'),
(4, 'talon', '', '2021-05-05 20:40:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargatipo`
--

CREATE TABLE `cargatipo` (
  `cargaTipoID` int(11) NOT NULL,
  `cargaTipoNombre` varchar(50) NOT NULL,
  `cargaTipoDescripcion` varchar(500) NOT NULL,
  `cargaTipoFechaDeCreacion` datetime NOT NULL,
  `valor` double NOT NULL,
  `operacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargatipo`
--

INSERT INTO `cargatipo` (`cargaTipoID`, `cargaTipoNombre`, `cargaTipoDescripcion`, `cargaTipoFechaDeCreacion`, `valor`, `operacion`) VALUES
(1, 'kilogramos', '', '2021-05-05 20:41:36', 0, 1),
(2, 'tonelada', '', '2021-05-05 20:41:36', 1000, 4),
(3, 'libras', '', '2021-05-05 20:50:27', 2.205, 3),
(4, 'gramo', '', '2021-05-05 20:41:36', 1000, 3),
(5, 'milligramo', '', '2021-05-05 20:49:01', 1000000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `empresaId` int(11) NOT NULL,
  `empresaNombre` varchar(100) NOT NULL,
  `empresaRFC` varchar(50) NOT NULL,
  `empresaDireccion` varchar(250) NOT NULL,
  `empresaTelefonoFijo1` int(11) NOT NULL,
  `empresaTelefonoFijo2` int(11) NOT NULL,
  `empresaTelefonoCelular1` int(11) NOT NULL,
  `empresaTelefonoCelular2` int(11) NOT NULL,
  `empresaCorreo` varchar(200) NOT NULL,
  `sesionId` int(11) NOT NULL,
  `tipoEmpresaId` int(11) NOT NULL,
  `empresaFechaDeCreacion` datetime NOT NULL,
  `empresaDescripcion` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`empresaId`, `empresaNombre`, `empresaRFC`, `empresaDireccion`, `empresaTelefonoFijo1`, `empresaTelefonoFijo2`, `empresaTelefonoCelular1`, `empresaTelefonoCelular2`, `empresaCorreo`, `sesionId`, `tipoEmpresaId`, `empresaFechaDeCreacion`, `empresaDescripcion`) VALUES
(9, 'surftware', 'hhhhdytt6r7ggfcg', 'bjbj                                    ', 77878678, 686867, 6768, 687687687, 'hbjhbhj', 1, 1, '2021-04-30 19:07:37', 'bhbhb,hj                                    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_emisora`
--

CREATE TABLE `empresa_emisora` (
  `empresaEmisoraId` int(11) NOT NULL,
  `sesionId` int(11) NOT NULL,
  `empresaEmisoraNombre` varchar(100) NOT NULL,
  `empresaEmisoraRFC` varchar(50) NOT NULL,
  `empresaEmisoraDireccion` varchar(250) NOT NULL,
  `empresaEmisoraTelefonoFijo1` int(11) NOT NULL,
  `empresaEmisoraTelefonoFijo2` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular1` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular2` int(11) NOT NULL,
  `empresaEmisoraCorreo` varchar(200) NOT NULL,
  `empresaEmisoraFechaDeCreacion` datetime NOT NULL,
  `empresaEmisoraDescripcion` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_emisora`
--

INSERT INTO `empresa_emisora` (`empresaEmisoraId`, `sesionId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`) VALUES
(1, 0, 'galver1', '12323232215645', '', 0, 0, 0, 0, '', '2021-05-05 21:32:50', ''),
(2, 0, 'galver2', '432432435435', '', 0, 0, 0, 0, '', '2021-05-05 21:32:50', ''),
(3, 0, 'galver3', 'e634738638374678', '', 0, 0, 0, 0, '', '2021-05-05 21:32:50', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_receptora`
--

CREATE TABLE `empresa_receptora` (
  `empresaReceptoraId` int(11) NOT NULL,
  `empresaReceptoraNombre` varchar(100) NOT NULL,
  `empresaReceptoraRFC` varchar(50) NOT NULL,
  `empresaReceptoraDireccion` varchar(250) NOT NULL,
  `empresaReceptoraTelefonoFijo1` int(11) NOT NULL,
  `empresaReceptoraTelefonoFijo2` int(11) NOT NULL,
  `empresaReceptoraTelefonoCelular1` int(11) NOT NULL,
  `empresaReceptoraTelefonoCelular2` int(11) NOT NULL,
  `empresaReceptoraCorreo` varchar(200) NOT NULL,
  `sesionId` int(11) NOT NULL,
  `empresaReceptoraFechaDeCreacion` datetime NOT NULL,
  `empresaReceptoraDescripcion` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_receptora`
--

INSERT INTO `empresa_receptora` (`empresaReceptoraId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, `sesionId`, `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`) VALUES
(1, 'cliente1', '456789056789', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(2, 'cliente2', '4567890456789', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(3, 'cliente3', '1234567890345678', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(4, 'cliente4', '234567890345678', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje`
--

CREATE TABLE `hoja_de_viaje` (
  `hojaDeViajeID` int(11) NOT NULL,
  `sesionId` int(4) DEFAULT NULL,
  `empresaEmisoraId` int(3) DEFAULT NULL,
  `empresaReceptoraId` int(3) DEFAULT NULL,
  `operadorId` int(4) DEFAULT NULL,
  `hojaDeViajeEstadoId` int(2) DEFAULT NULL,
  `cargaId` int(2) DEFAULT NULL,
  `cargaTipoId` int(2) DEFAULT NULL,
  `hojaDeViajeFechaDeEdicion` datetime DEFAULT NULL,
  `hojaDeViajeFechaLiberacion` datetime DEFAULT NULL,
  `hojaDeViajeFechaArribo` datetime DEFAULT NULL,
  `hojaDeViajeFechaCarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaLlegadaDeDescarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaDescarga` datetime DEFAULT NULL,
  `hojaDeViajeOrigen` varchar(500) DEFAULT NULL,
  `hojaDeViajeOrigenDeDestino` varchar(500) DEFAULT NULL,
  `hojaDeViajeRemolque1` int(3) DEFAULT NULL,
  `hojaDeViajeRemolque2` int(3) DEFAULT NULL,
  `hojaDeViajePlaca1` varchar(200) DEFAULT NULL,
  `hojaDeViajePlaca2` varchar(200) DEFAULT NULL,
  `hojaDeViajeEconomico1` varchar(200) DEFAULT NULL,
  `hojaDeViajeEconomico2` varchar(200) DEFAULT NULL,
  `hojaDeViajeTalon1` varchar(200) DEFAULT NULL,
  `hojaDeViajeTalon2` varchar(200) DEFAULT NULL,
  `hojaDeViajeCargaCantidad` double DEFAULT NULL,
  `hojaDeViajeComentarios` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje`
--

INSERT INTO `hoja_de_viaje` (`hojaDeViajeID`, `sesionId`, `empresaEmisoraId`, `empresaReceptoraId`, `operadorId`, `hojaDeViajeEstadoId`, `cargaId`, `cargaTipoId`, `hojaDeViajeFechaDeEdicion`, `hojaDeViajeFechaLiberacion`, `hojaDeViajeFechaArribo`, `hojaDeViajeFechaCarga`, `hojaDeViajeFechaLlegadaDeDescarga`, `hojaDeViajeFechaDescarga`, `hojaDeViajeOrigen`, `hojaDeViajeOrigenDeDestino`, `hojaDeViajeRemolque1`, `hojaDeViajeRemolque2`, `hojaDeViajePlaca1`, `hojaDeViajePlaca2`, `hojaDeViajeEconomico1`, `hojaDeViajeEconomico2`, `hojaDeViajeTalon1`, `hojaDeViajeTalon2`, `hojaDeViajeCargaCantidad`, `hojaDeViajeComentarios`) VALUES
(7, 2, 1, 1, NULL, NULL, NULL, NULL, '2021-04-10 00:00:00', '2021-04-10 00:00:00', '0000-00-00 00:00:00', '2020-04-08 10:00:00', '2022-06-09 12:02:00', '2022-06-10 12:02:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, 1, 1, NULL, NULL, NULL, NULL, '2021-04-10 00:00:00', '2021-04-10 00:00:00', '2020-04-10 10:03:00', '2020-04-08 10:03:00', '2019-04-08 10:03:00', '2020-04-08 10:03:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 1, 1, NULL, NULL, NULL, NULL, '2021-04-10 11:15:00', '2021-04-10 11:15:00', '2020-03-10 10:14:00', '2020-04-08 10:13:00', '2019-04-08 10:14:00', '2020-03-08 09:14:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2, 1, 1, 1, 1, 1, 1, '2021-04-10 11:27:00', '2021-04-10 11:27:00', '2020-04-08 10:25:00', '2020-04-08 10:25:00', '2020-04-08 10:25:00', '2020-04-08 10:25:00', 'cdmx', 'puebla', 1, 1, '11229182', '828q81918', '19291982', '198918218', '19291982', '891219198', 12, 'prueba 1'),
(12, 2, 1, 1, 1, 1, 1, 1, '2021-04-10 12:36:00', '2021-04-10 12:36:00', '2021-12-30 12:59:00', '2021-12-29 12:59:00', '2021-12-30 12:59:00', '2020-12-30 12:59:00', '1', '1', 1, 1, '1', '1', '1', '1', '1', '1', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje_edicion`
--

CREATE TABLE `hoja_de_viaje_edicion` (
  `hojaDeViajeEdicionID` int(11) NOT NULL,
  `creadorId` int(4) NOT NULL,
  `hojaDeViajeEdicionUsuarioEdicion` datetime NOT NULL,
  `empresaEmisoraId` int(3) NOT NULL,
  `empresaReceptoraId` int(3) NOT NULL,
  `operadorId` int(4) NOT NULL,
  `estadoTalonId` int(2) NOT NULL,
  `cargaId` int(2) NOT NULL,
  `cargaTipoId` int(2) NOT NULL,
  `hojaDeViajeEdicionFechaDeEdicion` datetime NOT NULL,
  `hojaDeViajeEdicionFechaLiberacion` datetime NOT NULL,
  `hojaDeViajeEdicionFechaArribo` datetime NOT NULL,
  `hojaDeViajeEdicionFechaCarga` datetime NOT NULL,
  `hojaDeViajeEdicionFechaLlegadaDeDescarga` datetime NOT NULL,
  `hojaDeViajeEdicionFechaDescarga` datetime NOT NULL,
  `hojaDeViajeEdicionOrigen` varchar(500) NOT NULL,
  `hojaDeViajeEdicionOrigenDeDestino` varchar(500) NOT NULL,
  `hojaDeViajeEdicionRemolque1` int(3) NOT NULL,
  `hojaDeViajeEdicionRemolque2` int(3) NOT NULL,
  `hojaDeViajeEdicionPlaca1` varchar(200) NOT NULL,
  `hojaDeViajeEdicionPlaca2` varchar(200) NOT NULL,
  `hojaDeViajeEdicionEconomico1` varchar(200) NOT NULL,
  `hojaDeViajeEdicionEconomico2` varchar(200) NOT NULL,
  `hojaDeViajeEdicionTalon1` varchar(200) NOT NULL,
  `hojaDeViajeEdicionTalon2` varchar(200) NOT NULL,
  `hojaDeViajeEdicionCargaCantidad` double DEFAULT NULL,
  `hojaDeViajeEdicionComentarios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje_estado`
--

CREATE TABLE `hoja_de_viaje_estado` (
  `hojaDeViajeEstadoId` int(11) NOT NULL,
  `hojaDeViajeEstadoNombre` varchar(100) NOT NULL,
  `hojaDeViajeEstadoDescripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje_estado`
--

INSERT INTO `hoja_de_viaje_estado` (`hojaDeViajeEstadoId`, `hojaDeViajeEstadoNombre`, `hojaDeViajeEstadoDescripcion`) VALUES
(1, 'Activo', ''),
(2, 'Pausa', ''),
(3, 'Cancelado', ''),
(4, 'Finalizado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `operadorID` int(11) NOT NULL,
  `operadorNombre` varchar(300) NOT NULL,
  `operadorLisencia` varchar(50) NOT NULL,
  `operadorFechaCreacion` datetime NOT NULL,
  `operadorRFC` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`operadorID`, `operadorNombre`, `operadorLisencia`, `operadorFechaCreacion`, `operadorRFC`) VALUES
(1, 'Moreno Tolentino Jose Armando', 'SDJ433RHJJND', '2021-05-05 21:26:54', ''),
(2, 'juan antonio vergara sanches', '6767DBHG83', '2021-05-05 21:26:54', '');

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
-- Estructura de tabla para la tabla `remolques`
--

CREATE TABLE `remolques` (
  `remolqueId` int(11) NOT NULL,
  `remolqueServicio` varchar(500) NOT NULL,
  `remolqueImpuesto` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolques`
--

INSERT INTO `remolques` (`remolqueId`, `remolqueServicio`, `remolqueImpuesto`) VALUES
(1, 'Flete de azucar', '16'),
(2, 'Venta de activo', '16'),
(3, 'Maniobras Z', '16'),
(4, 'Flete de jugos', '16'),
(5, 'Flete de papas', '16'),
(6, 'Viaje de productos terminados', '16'),
(7, 'Ci indemnizacion', '16'),
(8, 'Estadias', '16'),
(9, 'Viaje de tarimas', '16'),
(10, 'Servicio de translados', '16'),
(11, 'Retorno en vacio', '16'),
(12, 'servicio', '16'),
(13, 'Flete de azucar', '16'),
(14, 'Venta de azucar ', '0'),
(15, 'Mantenimiento', '16'),
(16, 'Maniobras B', '16'),
(17, 'C Indemnizacion', '0'),
(18, 'R Indemnizacion', '0'),
(19, 'Estadias B', '16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `sesionId` int(11) NOT NULL,
  `sesionNombre` varchar(30) NOT NULL,
  `sesionPassword` varchar(20) NOT NULL,
  `permisoId` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `empresaDescripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`sesionId`, `sesionNombre`, `sesionPassword`, `permisoId`, `created_at`, `empresaDescripcion`) VALUES
(1, 'jose armando', 'capcom12', 4, '2021-04-08 20:29:00', ''),
(2, 'admin', 'admin', 1, '2021-04-22 20:29:38', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`cargaId`);

--
-- Indices de la tabla `cargatipo`
--
ALTER TABLE `cargatipo`
  ADD PRIMARY KEY (`cargaTipoID`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`empresaId`);

--
-- Indices de la tabla `empresa_emisora`
--
ALTER TABLE `empresa_emisora`
  ADD PRIMARY KEY (`empresaEmisoraId`);

--
-- Indices de la tabla `empresa_receptora`
--
ALTER TABLE `empresa_receptora`
  ADD PRIMARY KEY (`empresaReceptoraId`);

--
-- Indices de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  ADD PRIMARY KEY (`hojaDeViajeID`);

--
-- Indices de la tabla `hoja_de_viaje_estado`
--
ALTER TABLE `hoja_de_viaje_estado`
  ADD PRIMARY KEY (`hojaDeViajeEstadoId`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`operadorID`);

--
-- Indices de la tabla `persmiso`
--
ALTER TABLE `persmiso`
  ADD PRIMARY KEY (`permisoId`);

--
-- Indices de la tabla `remolques`
--
ALTER TABLE `remolques`
  ADD PRIMARY KEY (`remolqueId`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`sesionId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `cargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cargatipo`
--
ALTER TABLE `cargatipo`
  MODIFY `cargaTipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa_emisora`
--
ALTER TABLE `empresa_emisora`
  MODIFY `empresaEmisoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresa_receptora`
--
ALTER TABLE `empresa_receptora`
  MODIFY `empresaReceptoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  MODIFY `hojaDeViajeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_estado`
--
ALTER TABLE `hoja_de_viaje_estado`
  MODIFY `hojaDeViajeEstadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
