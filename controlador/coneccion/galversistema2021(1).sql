-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 20:02:58
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
(9, 'surftware', 'hhhhdytt6r7ggfcg', 'bjbj                                    ', 77878678, 686867, 6768, 687687687, 'hbjhbhj', 1, 1, '2021-04-30 19:07:37', 'bhbhb,hj                                    '),
(10, 'capcom', '223323211', 'sss1', 7877811, 87878711, 8778711, 811, 'ss1', 1, 2, '2021-04-30 19:40:15', 's1 2 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresaemisora`
--

CREATE TABLE `empresaemisora` (
  `empresaEmisoraId` int(11) NOT NULL,
  `empresaEmisoraNombre` varchar(100) NOT NULL,
  `empresaEmisoraRFC` varchar(50) NOT NULL,
  `empresaEmisoraDireccion` varchar(250) NOT NULL,
  `empresaEmisoraTelefonoFijo1` int(11) NOT NULL,
  `empresaEmisoraTelefonoFijo2` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular1` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular2` int(11) NOT NULL,
  `empresaEmisoraCorreo` varchar(200) NOT NULL,
  `sesionId` int(11) NOT NULL,
  `empresaEmisoraFechaDeCreacion` datetime NOT NULL,
  `empresaEmisoraDescripcion` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresaemisora`
--

INSERT INTO `empresaemisora` (`empresaEmisoraId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, `sesionId`, `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`) VALUES
(1, 'galver1', '12323232215645', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:32:50', ''),
(2, 'galver2', '432432435435', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:32:50', ''),
(3, 'galver3', 'e634738638374678', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:32:50', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresareceptora`
--

CREATE TABLE `empresareceptora` (
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
-- Volcado de datos para la tabla `empresareceptora`
--

INSERT INTO `empresareceptora` (`empresaReceptoraId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, `sesionId`, `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`) VALUES
(1, 'cliente1', '456789056789', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(2, 'cliente2', '4567890456789', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(3, 'cliente3', '1234567890345678', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', ''),
(4, 'cliente4', '234567890345678', '', 0, 0, 0, 0, '', 0, '2021-05-05 21:34:35', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadotalon`
--

CREATE TABLE `estadotalon` (
  `estadoTalonId` int(11) NOT NULL,
  `estadoTalonNombre` varchar(100) NOT NULL,
  `estadoTalonDescripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadotalon`
--

INSERT INTO `estadotalon` (`estadoTalonId`, `estadoTalonNombre`, `estadoTalonDescripcion`) VALUES
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talones`
--

CREATE TABLE `talones` (
  `talonesID` int(11) NOT NULL,
  `sesionId` int(4) NOT NULL,
  `talonesUsuarioEdicion` datetime NOT NULL,
  `empresaEmisoraId` int(3) NOT NULL,
  `empresaReceptoraId` int(3) NOT NULL,
  `operadorId` int(4) NOT NULL,
  `estadoTalonId` int(2) NOT NULL,
  `cargaId` int(2) NOT NULL,
  `cargaTipoId` int(2) NOT NULL,
  `talonesFechaDeEdicion` datetime NOT NULL,
  `talonesFechaLiberacion` datetime NOT NULL,
  `talonesFechaArribo` datetime NOT NULL,
  `talonesFechaCarga` datetime NOT NULL,
  `talonesFechaLlegadaDeDescarga` datetime NOT NULL,
  `talonesFechaDescarga` datetime NOT NULL,
  `talonesOrigen` varchar(500) NOT NULL,
  `talonesOrigenDeDestino` varchar(500) NOT NULL,
  `talonesRemolque1` int(3) NOT NULL,
  `talonesRemolque2` int(3) NOT NULL,
  `talonesPlaca1` varchar(200) NOT NULL,
  `talonesPlaca2` varchar(200) NOT NULL,
  `talonesEconomico1` varchar(200) NOT NULL,
  `talonesEconomico2` varchar(200) NOT NULL,
  `talonesTalon1` varchar(200) NOT NULL,
  `talonesTalon2` varchar(200) NOT NULL,
  `talonesCargaCantidad` double DEFAULT NULL,
  `talonesComentarios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talonesedicionediciones`
--

CREATE TABLE `talonesedicionediciones` (
  `talonesEdicionEdicionID` int(11) NOT NULL,
  `sesionId` int(4) NOT NULL,
  `talonesEdicionUsuarioEdicion` datetime NOT NULL,
  `empresaEmisoraId` int(3) NOT NULL,
  `empresaReceptoraId` int(3) NOT NULL,
  `operadorId` int(4) NOT NULL,
  `estadoTalonId` int(2) NOT NULL,
  `cargaId` int(2) NOT NULL,
  `cargaTipoId` int(2) NOT NULL,
  `talonesEdicionFechaDeEdicion` datetime NOT NULL,
  `talonesEdicionFechaLiberacion` datetime NOT NULL,
  `talonesEdicionFechaArribo` datetime NOT NULL,
  `talonesEdicionFechaCarga` datetime NOT NULL,
  `talonesEdicionFechaLlegadaDeDescarga` datetime NOT NULL,
  `talonesEdicionFechaDescarga` datetime NOT NULL,
  `talonesEdicionOrigen` varchar(500) NOT NULL,
  `talonesEdicionOrigenDeDestino` varchar(500) NOT NULL,
  `talonesEdicionRemolque1` int(3) NOT NULL,
  `talonesEdicionRemolque2` int(3) NOT NULL,
  `talonesEdicionPlaca1` varchar(200) NOT NULL,
  `talonesEdicionPlaca2` varchar(200) NOT NULL,
  `talonesEdicionEconomico1` varchar(200) NOT NULL,
  `talonesEdicionEconomico2` varchar(200) NOT NULL,
  `talonesEdicionTalon1` varchar(200) NOT NULL,
  `talonesEdicionTalon2` varchar(200) NOT NULL,
  `talonesEdicionCargaCantidad` double DEFAULT NULL,
  `talonesEdicionComentarios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indices de la tabla `empresaemisora`
--
ALTER TABLE `empresaemisora`
  ADD PRIMARY KEY (`empresaEmisoraId`);

--
-- Indices de la tabla `empresareceptora`
--
ALTER TABLE `empresareceptora`
  ADD PRIMARY KEY (`empresaReceptoraId`);

--
-- Indices de la tabla `estadotalon`
--
ALTER TABLE `estadotalon`
  ADD PRIMARY KEY (`estadoTalonId`);

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
-- AUTO_INCREMENT de la tabla `empresaemisora`
--
ALTER TABLE `empresaemisora`
  MODIFY `empresaEmisoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresareceptora`
--
ALTER TABLE `empresareceptora`
  MODIFY `empresaReceptoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadotalon`
--
ALTER TABLE `estadotalon`
  MODIFY `estadoTalonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persmiso`
--
ALTER TABLE `persmiso`
  MODIFY `permisoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `remolques`
--
ALTER TABLE `remolques`
  MODIFY `remolqueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `sesionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
