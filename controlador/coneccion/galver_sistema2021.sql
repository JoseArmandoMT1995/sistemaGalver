-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 21:49:59
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
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `cargaId` int(11) NOT NULL,
  `cargaNombre` varchar(50) NOT NULL,
  `cargaDescripcion` varchar(500) NOT NULL,
  `cargaFecaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`cargaId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`, `usuarioId`) VALUES
(1, 'bulto', '', '2021-05-05 20:40:24', 0),
(2, 'saco', '', '2021-05-05 20:40:24', 0),
(3, 'super saco', '', '2021-05-05 20:40:24', 0),
(4, 'talon', '', '2021-05-05 20:40:24', 0),
(5, 'tambos', '', '2021-05-20 20:37:44', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_unidad_de_medida`
--

CREATE TABLE `carga_unidad_de_medida` (
  `cargaUnidadDeMedidaID` int(11) NOT NULL,
  `cargaUnidadDeMedidaNombre` varchar(50) NOT NULL,
  `cargaUnidadDeMedidaDescripcion` varchar(500) NOT NULL,
  `cargaUnidadDeMedidaFechaDeCreacion` datetime NOT NULL,
  `cargaUnidadDeMedidValor` double NOT NULL,
  `cargaUnidadDeMedidOperacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga_unidad_de_medida`
--

INSERT INTO `carga_unidad_de_medida` (`cargaUnidadDeMedidaID`, `cargaUnidadDeMedidaNombre`, `cargaUnidadDeMedidaDescripcion`, `cargaUnidadDeMedidaFechaDeCreacion`, `cargaUnidadDeMedidValor`, `cargaUnidadDeMedidOperacion`) VALUES
(1, 'kilogramos', '', '2021-05-05 20:41:36', 0, 1),
(2, 'tonelada', '', '2021-05-05 20:41:36', 1000, 4),
(3, 'libras', '', '2021-05-05 20:50:27', 2.205, 3),
(4, 'gramo', '', '2021-05-05 20:41:36', 1000, 3),
(5, 'milligramo', '', '2021-05-05 20:49:01', 1000000, 3),
(6, 'litros', '', '2021-05-20 20:37:14', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_emisora`
--

CREATE TABLE `empresa_emisora` (
  `empresaEmisoraId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `empresaEmisoraNombre` varchar(100) NOT NULL,
  `empresaEmisoraRFC` varchar(50) NOT NULL,
  `empresaEmisoraDireccion` varchar(250) NOT NULL,
  `empresaEmisoraTelefonoFijo1` int(11) NOT NULL,
  `empresaEmisoraTelefonoFijo2` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular1` int(11) NOT NULL,
  `empresaEmisoraTelefonoCelular2` int(11) NOT NULL,
  `empresaEmisoraCorreo` varchar(200) NOT NULL,
  `empresaEmisoraFechaDeCreacion` datetime NOT NULL,
  `empresaEmisoraDescripcion` varchar(2500) NOT NULL,
  `empresaEmisoraCP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_emisora`
--

INSERT INTO `empresa_emisora` (`empresaEmisoraId`, `usuarioId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`, `empresaEmisoraCP`) VALUES
(1, 0, '1', '1', '1', 1, 1, 1, 1, '11', '2021-05-19 21:45:36', '1', '1'),
(9, 1, 'j', '1', '1', 1, 1, 1, 1, '11', '2021-05-19 21:14:34', '1', '1'),
(10, 1, 'hh', 'jh', 'jkjh', 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '11', '1');

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
  `usuarioId` int(11) NOT NULL,
  `empresaReceptoraFechaDeCreacion` datetime NOT NULL,
  `empresaReceptoraDescripcion` varchar(2500) NOT NULL,
  `empresaReceptoraCP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_receptora`
--

INSERT INTO `empresa_receptora` (`empresaReceptoraId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, `usuarioId`, `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`, `empresaReceptoraCP`) VALUES
(5, '.1', '1', '1', 1, 1, 1, 1, '1', 1, '2021-05-19 21:14:34', '1', 1),
(6, 'l1', '1', '1', 1, 1, 1, 1, '1', 1, '2021-05-19 21:14:34', '1', 1),
(7, '7', '7', '7', 7, 7, 7, 77, '7', 1, '2021-05-19 21:14:34', '7', 7),
(8, '9', '9', '9', 9, 9, 99, 99, '9', 1, '2021-05-19 21:14:34', '9999', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje`
--

CREATE TABLE `hoja_de_viaje` (
  `hojaDeViajeID` int(11) NOT NULL,
  `usuarioId` int(4) DEFAULT NULL,
  `hojaDeViajeEdicionUsuarioEdicion` int(11) NOT NULL,
  `empresaEmisoraId` int(3) DEFAULT NULL,
  `empresaReceptoraId` int(3) DEFAULT NULL,
  `operadorId` int(4) DEFAULT NULL,
  `hojaDeViajeEstadoId` int(2) DEFAULT NULL,
  `cargaId` int(2) DEFAULT NULL,
  `cargaTipoId` int(2) DEFAULT NULL,
  `hojaDeViajeRemolquePlaca1` int(3) DEFAULT NULL,
  `hojaDeViajeRemolquePlaca2` int(3) DEFAULT NULL,
  `hojaDeViajeOrigen` varchar(500) DEFAULT NULL,
  `hojaDeViajeOrigenDeDestino` varchar(500) DEFAULT NULL,
  `hojaDeViajeCargaUnidadDeMedidaCantidad` double DEFAULT NULL,
  `hojaDeViajeCargaCantidad` double DEFAULT NULL,
  `hojaDeViajeComentarios` varchar(500) DEFAULT NULL,
  `hojaDeViajeFechaDeEdicion` datetime DEFAULT NULL,
  `hojaDeViajeFechaLiberacion` datetime DEFAULT NULL,
  `hojaDeViajeFechaArribo` datetime DEFAULT NULL,
  `hojaDeViajeFechaCarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaLlegadaDeDescarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaDescarga` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje_edicion`
--

CREATE TABLE `hoja_de_viaje_edicion` (
  `hojaDeViajeID` int(11) NOT NULL,
  `creadorId` int(4) DEFAULT NULL,
  `hojaDeViajeEdicionUsuarioEdicion` int(11) NOT NULL,
  `empresaEmisoraId` int(3) DEFAULT NULL,
  `empresaReceptoraId` int(3) DEFAULT NULL,
  `operadorId` int(4) DEFAULT NULL,
  `hojaDeViajeEstadoId` int(2) DEFAULT NULL,
  `cargaId` int(2) DEFAULT NULL,
  `cargaTipoId` int(2) DEFAULT NULL,
  `hojaDeViajeRemolquePlaca1` int(3) DEFAULT NULL,
  `hojaDeViajeRemolquePlaca2` int(3) DEFAULT NULL,
  `hojaDeViajeOrigen` varchar(500) DEFAULT NULL,
  `hojaDeViajeOrigenDeDestino` varchar(500) DEFAULT NULL,
  `hojaDeViajeCargaUnidadDeMedidaCantidad` double DEFAULT NULL,
  `hojaDeViajeCargaCantidad` double DEFAULT NULL,
  `hojaDeViajeComentarios` varchar(500) DEFAULT NULL,
  `hojaDeViajeFechaDeEdicion` datetime DEFAULT NULL,
  `hojaDeViajeFechaLiberacion` datetime DEFAULT NULL,
  `hojaDeViajeFechaArribo` datetime DEFAULT NULL,
  `hojaDeViajeFechaCarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaLlegadaDeDescarga` datetime DEFAULT NULL,
  `hojaDeViajeFechaDescarga` datetime DEFAULT NULL
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
(4, 'Finalizado', ''),
(5, 'papelera', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `operadorID` int(11) NOT NULL,
  `operadorNombre` varchar(300) NOT NULL,
  `operadorLisencia` varchar(50) NOT NULL,
  `operadorFechaCreacion` datetime NOT NULL,
  `operadorRFC` varchar(30) NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`operadorID`, `operadorNombre`, `operadorLisencia`, `operadorFechaCreacion`, `operadorRFC`, `usuarioId`) VALUES
(1, 'Moreno Tolentino Jose Armando', 'SDJ433RHJJND', '2021-05-05 21:26:54', '', 0),
(2, 'juan antonio vergara sanches', '6767DBHG83', '2021-05-05 21:26:54', '', 0),
(3, 'prueba 1', '21111111111111', '2021-05-11 18:16:07', '', 0),
(4, '1', '1', '2021-05-19 21:14:34', '1', 1),
(5, '2', '2', '2021-05-19 21:14:34', '2', 1),
(6, '1', '33', '2021-05-19 21:14:34', '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque`
--

CREATE TABLE `remolque` (
  `remolquePlaca` varchar(50) NOT NULL,
  `remolqueEconomico` varchar(500) NOT NULL,
  `remolqueCargaID` int(11) NOT NULL,
  `remolqueID` int(11) NOT NULL,
  `tractorFechaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`remolquePlaca`, `remolqueEconomico`, `remolqueCargaID`, `remolqueID`, `tractorFechaCreacion`, `usuarioId`) VALUES
('1', '1', 1, 1, '2021-05-19 17:55:08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque_carga`
--

CREATE TABLE `remolque_carga` (
  `remolqueCargaId` int(11) NOT NULL,
  `remolqueCargaServicio` varchar(500) NOT NULL,
  `remolqueCargaImpuesto` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque_carga`
--

INSERT INTO `remolque_carga` (`remolqueCargaId`, `remolqueCargaServicio`, `remolqueCargaImpuesto`) VALUES
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
-- Estructura de tabla para la tabla `tractor`
--

CREATE TABLE `tractor` (
  `tractorId` int(11) NOT NULL,
  `tractorPlaca` varchar(50) NOT NULL,
  `tractorEconomico` varchar(50) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `tractorFechaCreacion` datetime NOT NULL,
  `tractorMarcaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor`
--

INSERT INTO `tractor` (`tractorId`, `tractorPlaca`, `tractorEconomico`, `usuarioId`, `tractorFechaCreacion`, `tractorMarcaId`) VALUES
(1, '1', '1', 1, '2021-05-19 17:55:08', 1),
(2, 'sde', '6', 1, '2021-05-19 17:55:08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tractor_marca`
--

CREATE TABLE `tractor_marca` (
  `tractorMarcaId` int(11) NOT NULL,
  `tractorMarcaNombre` varchar(200) NOT NULL,
  `tractorMarcaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor_marca`
--

INSERT INTO `tractor_marca` (`tractorMarcaId`, `tractorMarcaNombre`, `tractorMarcaCreacion`, `usuarioId`) VALUES
(1, 'Challenger', '2021-05-20 17:54:25', 1),
(2, 'Fendt', '2021-05-20 17:54:25', 1),
(3, 'Massey Ferguson', '2021-05-20 17:55:12', 1),
(4, 'Valtra', '2021-05-20 17:55:12', 1),
(5, 'AGCO Parts', '2021-05-20 17:55:46', 1),
(6, 'AGCO Service', '2021-05-20 17:55:46', 1),
(7, 'AP', '2021-05-20 17:56:08', 1),
(8, 'Cimbria', '2021-05-20 17:56:08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuarioId` int(11) NOT NULL,
  `usuarioNombre` varchar(30) NOT NULL,
  `usuarioPassword` varchar(20) NOT NULL,
  `usuarioTipoId` int(11) NOT NULL,
  `usuarioCreacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuarioNombre`, `usuarioPassword`, `usuarioTipoId`, `usuarioCreacion`) VALUES
(1, 'admin', 'admin', 1, '2021-05-19 17:55:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo`
--

CREATE TABLE `usuario_tipo` (
  `usuarioTipoId` int(11) NOT NULL,
  `usuarioTipoCargo` varchar(50) NOT NULL,
  `usuarioTipoDescripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`usuarioTipoId`, `usuarioTipoCargo`, `usuarioTipoDescripcion`) VALUES
(1, 'administrador', 'ssss');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`cargaId`);

--
-- Indices de la tabla `carga_unidad_de_medida`
--
ALTER TABLE `carga_unidad_de_medida`
  ADD PRIMARY KEY (`cargaUnidadDeMedidaID`);

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
-- Indices de la tabla `hoja_de_viaje_edicion`
--
ALTER TABLE `hoja_de_viaje_edicion`
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
-- Indices de la tabla `remolque`
--
ALTER TABLE `remolque`
  ADD PRIMARY KEY (`remolqueID`);

--
-- Indices de la tabla `remolque_carga`
--
ALTER TABLE `remolque_carga`
  ADD PRIMARY KEY (`remolqueCargaId`);

--
-- Indices de la tabla `tractor`
--
ALTER TABLE `tractor`
  ADD PRIMARY KEY (`tractorId`);

--
-- Indices de la tabla `tractor_marca`
--
ALTER TABLE `tractor_marca`
  ADD PRIMARY KEY (`tractorMarcaId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioId`);

--
-- Indices de la tabla `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  ADD PRIMARY KEY (`usuarioTipoId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `cargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carga_unidad_de_medida`
--
ALTER TABLE `carga_unidad_de_medida`
  MODIFY `cargaUnidadDeMedidaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa_emisora`
--
ALTER TABLE `empresa_emisora`
  MODIFY `empresaEmisoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa_receptora`
--
ALTER TABLE `empresa_receptora`
  MODIFY `empresaReceptoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  MODIFY `hojaDeViajeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_edicion`
--
ALTER TABLE `hoja_de_viaje_edicion`
  MODIFY `hojaDeViajeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_estado`
--
ALTER TABLE `hoja_de_viaje_estado`
  MODIFY `hojaDeViajeEstadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `remolque`
--
ALTER TABLE `remolque`
  MODIFY `remolqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remolque_carga`
--
ALTER TABLE `remolque_carga`
  MODIFY `remolqueCargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tractor`
--
ALTER TABLE `tractor`
  MODIFY `tractorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tractor_marca`
--
ALTER TABLE `tractor_marca`
  MODIFY `tractorMarcaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  MODIFY `usuarioTipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
