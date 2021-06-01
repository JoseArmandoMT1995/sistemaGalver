-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2021 a las 21:44:19
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
-- Estructura de tabla para la tabla `conglomerado`
--

CREATE TABLE `conglomerado` (
  `id_hojaDeViaje` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL,
  `hojaDeViaje_fechaDeLiberacion` datetime NOT NULL,
  `hojaDeViaje_fechaDeEdicion` int(11) NOT NULL,
  `hojaDeViaje_observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 0, 'galver01', '1', '1', 1, 1, 1, 1, '11', '2021-05-19 21:45:36', '1', '1'),
(9, 1, 'galver02', '1', '1', 1, 1, 1, 1, '11', '2021-05-19 21:14:34', '1', '1'),
(10, 1, 'galver03', 'jh', 'jkjh', 1, 1, 1, 1, '1', '0000-00-00 00:00:00', '11', '1');

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
(5, 'empresa prueba1', '1', '1', 1, 1, 1, 1, '1', 1, '2021-05-19 21:14:34', '1', 1),
(6, 'empresa prueba2', '1', '1', 1, 1, 1, 1, '1', 1, '2021-05-19 21:14:34', '1', 1),
(7, 'empresa prueba3', '7', '7', 7, 7, 7, 77, '7', 1, '2021-05-19 21:14:34', '7', 7),
(8, 'empresa prueba4', '9', '9', 9, 9, 99, 99, '9', 1, '2021-05-19 21:14:34', '9999', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje`
--

CREATE TABLE `hoja_de_viaje` (
  `id_hojaDeViaje` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL,
  `hojaDeViaje_fechaDeLiberacion` datetime NOT NULL,
  `hojaDeViaje_fechaDeEdicion` datetime NOT NULL,
  `hojaDeViaje_observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje`
--

INSERT INTO `hoja_de_viaje` (`id_hojaDeViaje`, `id_creador`, `id_editor`, `hojaDeViaje_fechaDeLiberacion`, `hojaDeViaje_fechaDeEdicion`, `hojaDeViaje_observaciones`) VALUES
(1, 1, 1, '2021-06-01 14:08:08', '0000-00-00 00:00:00', 'qzqqas'),
(2, 1, 1, '2021-06-01 14:43:37', '0000-00-00 00:00:00', 'sqs');

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
  `remolqueID` int(11) NOT NULL,
  `tractorFechaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`remolquePlaca`, `remolqueEconomico`, `remolqueID`, `tractorFechaCreacion`, `usuarioId`) VALUES
('11223344', '001', 1, '2021-05-19 17:55:08', 1),
('55667788', '002', 2, '2021-05-21 20:22:14', 1),
('88990011', '003', 3, '2021-05-21 20:22:14', 1);

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
(1, 'Venta de activo', '16'),
(2, 'Maniobras Z', '16'),
(3, 'Flete de jugos', '16'),
(4, 'Flete de papas', '16'),
(5, 'Viaje de productos terminados', '16'),
(6, 'Ci indemnizacion', '16'),
(7, 'Estadias', '16'),
(8, 'Viaje de tarimas', '16'),
(9, 'Servicio de translados', '16'),
(10, 'Retorno en vacio', '16'),
(11, 'servicio', '16'),
(12, 'Flete de azucar', '16'),
(13, 'Venta de azucar ', '0'),
(14, 'Mantenimiento', '16'),
(15, 'Maniobras B', '16'),
(16, 'C Indemnizacion', '0'),
(17, 'R Indemnizacion', '0'),
(18, 'Estadias B', '16'),
(19, 'Flete de azucar', '16');

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
(1, '1311218', '001', 1, '2021-05-19 17:55:08', 1),
(2, '1311219', '002', 1, '2021-05-19 17:55:08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tractor_del_operador`
--

CREATE TABLE `tractor_del_operador` (
  `id_tractorDelOperador` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_tractor` int(11) NOT NULL,
  `id_hojaDeViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor_del_operador`
--

INSERT INTO `tractor_del_operador` (`id_tractorDelOperador`, `id_operador`, `id_tractor`, `id_hojaDeViaje`) VALUES
(6, 1, 1, 1),
(7, 1, 1, 2);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `id_hojaDeViaje` int(11) NOT NULL,
  `id_viajeEstado` int(11) NOT NULL,
  `id_empresaEmisora` int(11) NOT NULL,
  `id_empresaReceptora` int(11) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `id_unidadDeMedida` int(11) NOT NULL,
  `viaje_fechaDeArribo` datetime NOT NULL,
  `viaje_fechaDeCarga` datetime NOT NULL,
  `viaje_fechaDeLlegadaDeDescarga` datetime NOT NULL,
  `viaje_fechaDeDescarga` datetime NOT NULL,
  `viaje_cargaCantidad` double NOT NULL,
  `viaje_cargaProporcionUM` double NOT NULL,
  `id_remolque` int(11) NOT NULL,
  `id_remolqueServicio` int(11) NOT NULL,
  `viaje_talon1` varchar(40) NOT NULL,
  `viaje_talon2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_hojaDeViaje`, `id_viajeEstado`, `id_empresaEmisora`, `id_empresaReceptora`, `id_carga`, `id_unidadDeMedida`, `viaje_fechaDeArribo`, `viaje_fechaDeCarga`, `viaje_fechaDeLlegadaDeDescarga`, `viaje_fechaDeDescarga`, `viaje_cargaCantidad`, `viaje_cargaProporcionUM`, `id_remolque`, `id_remolqueServicio`, `viaje_talon1`, `viaje_talon2`) VALUES
(3, 2, 1, 1, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 12, 3, 1, 'qsq', 'qsqs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_estado`
--

CREATE TABLE `viaje_estado` (
  `id_viajeEstado` int(11) NOT NULL,
  `viajeEstado_nombre` varchar(20) NOT NULL,
  `viajeEstado_descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje_estado`
--

INSERT INTO `viaje_estado` (`id_viajeEstado`, `viajeEstado_nombre`, `viajeEstado_descripcion`) VALUES
(1, 'liberacion', ''),
(2, 'carga', ''),
(3, 'llegada de descarga', ''),
(4, 'descarga', '');

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
  ADD PRIMARY KEY (`id_hojaDeViaje`);

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
-- Indices de la tabla `tractor_del_operador`
--
ALTER TABLE `tractor_del_operador`
  ADD PRIMARY KEY (`id_tractorDelOperador`);

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
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`);

--
-- Indices de la tabla `viaje_estado`
--
ALTER TABLE `viaje_estado`
  ADD PRIMARY KEY (`id_viajeEstado`);

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
  MODIFY `id_hojaDeViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `remolque`
--
ALTER TABLE `remolque`
  MODIFY `remolqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `remolque_carga`
--
ALTER TABLE `remolque_carga`
  MODIFY `remolqueCargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tractor`
--
ALTER TABLE `tractor`
  MODIFY `tractorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tractor_del_operador`
--
ALTER TABLE `tractor_del_operador`
  MODIFY `id_tractorDelOperador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje_estado`
--
ALTER TABLE `viaje_estado`
  MODIFY `id_viajeEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
