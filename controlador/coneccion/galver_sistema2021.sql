-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 21:56:37
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
(1, 'bulto', 'prueba descripcion 1', '2021-05-05 20:40:24', 1),
(2, 'saco', '', '2021-05-05 20:40:24', 1),
(3, 'super saco', '', '2021-05-05 20:40:24', 1),
(4, 'talon', '', '2021-05-05 20:40:24', 1),
(5, 'tambos', '', '2021-05-20 20:37:44', 1),
(6, 'super mega ultra bulto', 'mega cosota', '2021-06-03 14:13:38', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_unidad_de_medida`
--

CREATE TABLE `carga_unidad_de_medida` (
  `cargaUnidadDeMedidaID` int(11) NOT NULL,
  `cargaUnidadDeMedidaNombre` varchar(50) NOT NULL,
  `cargaUnidadDeMedidaDescripcion` varchar(500) NOT NULL,
  `cargaUnidadDeMedidaFechaDeCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga_unidad_de_medida`
--

INSERT INTO `carga_unidad_de_medida` (`cargaUnidadDeMedidaID`, `cargaUnidadDeMedidaNombre`, `cargaUnidadDeMedidaDescripcion`, `cargaUnidadDeMedidaFechaDeCreacion`, `usuarioId`) VALUES
(1, 'kilogramos', '', '2021-05-05 20:41:36', 1),
(2, 'tonelada', 'pendiente', '2021-05-05 20:41:36', 1),
(3, 'libras', 'pendiente', '2021-05-05 20:50:27', 1),
(4, 'gramo', '', '2021-05-05 20:41:36', 1),
(5, 'milligramo', '', '2021-05-05 20:49:01', 1),
(6, 'litros', '', '2021-05-20 20:37:14', 1);

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
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `destino_id` int(11) NOT NULL,
  `destino_nombre` varchar(100) NOT NULL,
  `destino_direccion` varchar(250) NOT NULL,
  `destino_telefono1` varchar(30) NOT NULL,
  `destino_telefono2` varchar(30) NOT NULL,
  `destino_correo` varchar(100) NOT NULL,
  `destino_latitud` varchar(100) NOT NULL,
  `destino_longitud` varchar(100) NOT NULL,
  `destino_creacion` datetime NOT NULL,
  `destino_creador` int(11) NOT NULL
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
(11, 1, 'Galver 01', 'SAJFASJH3232332', 'otavalo', 57967861, 57967862, 57967863, 57967864, 'galver@gmail.com', '2021-06-02 19:32:51', 'de paso', '07900'),
(18, 1, 'Galver 02', 'DSFGHJKLLS', 'por hay', 555, 556677, 5665, 5676, 'galver@gmail.com.mx', '0000-00-00 00:00:00', '', '09979');

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
(17, 'Civer Win Evolution 1', 'FGHJKLÑ', 'CVBNM', 57876789, 98765457, 7865, 67788876, 'A@A.COM', 1, '0000-00-00 00:00:00', '', 70900);

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
(1, 1, 1, '2020-06-04 10:18:22', '0000-00-00 00:00:00', 'prueba 1'),
(2, 1, 1, '2021-06-22 14:12:58', '2021-06-23 13:57:17', 'prueba2'),
(3, 1, 1, '2020-06-04 10:18:22', '2021-06-23 14:06:18', 'fghjk'),
(4, 1, 1, '2021-06-14 11:55:24', '0000-00-00 00:00:00', 'PRODUCTO DE PRUEBA\n'),
(5, 1, 1, '2021-06-15 17:39:09', '2021-06-23 14:05:34', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje_edicion`
--

CREATE TABLE `hoja_de_viaje_edicion` (
  `id_hojaDeViajeEdicion` int(11) NOT NULL,
  `id_hojaDeViaje` int(11) NOT NULL,
  `id_creador` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL,
  `hojaDeViaje_fechaDeLiberacion` datetime NOT NULL,
  `hojaDeViaje_fechaDeEdicion` datetime NOT NULL,
  `hojaDeViaje_observaciones` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'froiland', 'no hay', '2021-06-03 11:56:24', '5678945678', 0),
(5, 'Operador Prueba1', 'sepa', '2021-05-19 21:14:34', 'sepa', 1),
(6, 'Operador Prueba1', '456789', '2021-05-19 21:14:34', '56789', 1),
(8, 'Surftware', '?', '2021-06-03 12:04:50', '?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque`
--

CREATE TABLE `remolque` (
  `remolquePlaca` varchar(50) NOT NULL,
  `remolqueEconomico` varchar(500) NOT NULL,
  `remolqueID` int(11) NOT NULL,
  `remolqueFechaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`remolquePlaca`, `remolqueEconomico`, `remolqueID`, `remolqueFechaCreacion`, `usuarioId`) VALUES
('01', '001', 1, '2021-05-19 17:55:08', 1),
('02', '002', 2, '2021-05-21 20:22:14', 1),
('03', '003', 3, '2021-05-21 20:22:14', 1),
('04', '994', 4, '0000-00-00 00:00:00', 1),
('06', '006', 5, '2021-06-03 13:47:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque_carga`
--

CREATE TABLE `remolque_carga` (
  `remolqueCargaId` int(11) NOT NULL,
  `remolqueCargaServicio` varchar(500) NOT NULL,
  `remolqueCargaImpuesto` decimal(10,0) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `remolqueCargaFechaCreacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque_carga`
--

INSERT INTO `remolque_carga` (`remolqueCargaId`, `remolqueCargaServicio`, `remolqueCargaImpuesto`, `usuarioId`, `remolqueCargaFechaCreacion`) VALUES
(1, 'Venta de Activo', '0', 1, '0000-00-00 00:00:00'),
(2, 'Maniobras Z', '16', 1, '0000-00-00 00:00:00'),
(3, 'Flete de Jugos', '16', 1, '0000-00-00 00:00:00'),
(4, 'Flete de Papas', '16', 1, '0000-00-00 00:00:00'),
(5, 'Viaje De Productos Terminados', '16', 1, '0000-00-00 00:00:00'),
(6, 'Ci Indemnizacion', '16', 1, '0000-00-00 00:00:00'),
(7, 'Estadias', '16', 1, '0000-00-00 00:00:00'),
(8, 'Viaje De Tarimas', '16', 1, '0000-00-00 00:00:00'),
(9, 'Servicio De Translados', '16', 1, '0000-00-00 00:00:00'),
(10, 'Retorno En Vacio', '16', 1, '0000-00-00 00:00:00'),
(11, 'Servicio', '16', 1, '0000-00-00 00:00:00'),
(12, 'Flete De Azucar', '16', 1, '0000-00-00 00:00:00'),
(13, 'Venta De Azucar ', '0', 1, '0000-00-00 00:00:00'),
(14, 'Mantenimiento', '16', 1, '0000-00-00 00:00:00'),
(15, 'Maniobras B', '16', 1, '0000-00-00 00:00:00'),
(16, 'C Indemnizacion', '0', 1, '0000-00-00 00:00:00'),
(17, 'R Indemnizacion', '0', 1, '0000-00-00 00:00:00'),
(18, 'Estadias B', '16', 1, '0000-00-00 00:00:00'),
(19, 'Flete de azucar', '16', 1, '0000-00-00 00:00:00');

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
(1, '1311218', '001', 1, '2021-05-19 17:55:08', 7),
(2, '1311219', '002', 1, '2021-05-19 17:55:08', 2),
(3, '13228272', '003', 1, '2021-06-03 12:42:58', 5);

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
(16, 6, 1, 1),
(17, 5, 2, 2),
(18, 6, 2, 3),
(19, 6, 1, 4),
(20, 5, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tractor_del_operador_edicion`
--

CREATE TABLE `tractor_del_operador_edicion` (
  `id_tractorDelOperadorEdicion` int(11) NOT NULL,
  `id_tractorDelOperador` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_tractor` int(11) NOT NULL,
  `id_hojaDeViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'nizzan', '2021-05-20 17:54:25', 1),
(2, 'for', '2021-05-20 17:54:25', 1),
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
(1, 'admin', 'admin', 1, '2021-05-19 17:55:08'),
(2, 'jose', 'jose', 2, '2021-06-08 20:34:30'),
(3, 'jesus', 'jesus', 3, '2021-06-08 20:34:50'),
(4, 'juan', 'juan', 4, '2021-06-08 20:34:50'),
(5, 'maria', 'maria', 5, '2021-06-08 20:34:50');

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
(1, 'administrador', 'super administrador, puede ver todo'),
(2, 'monitor', ''),
(3, 'supervisor', ''),
(4, 'operdor', ''),
(5, 'facturacion', '');

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
  `viaje_talon2` varchar(40) NOT NULL,
  `viaje_origen` varchar(500) NOT NULL,
  `viaje_destino` varchar(500) NOT NULL,
  `viaje_folioDeCarga` varchar(50) NOT NULL,
  `viaje_folioDeBascula` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_hojaDeViaje`, `id_viajeEstado`, `id_empresaEmisora`, `id_empresaReceptora`, `id_carga`, `id_unidadDeMedida`, `viaje_fechaDeArribo`, `viaje_fechaDeCarga`, `viaje_fechaDeLlegadaDeDescarga`, `viaje_fechaDeDescarga`, `viaje_cargaCantidad`, `viaje_cargaProporcionUM`, `id_remolque`, `id_remolqueServicio`, `viaje_talon1`, `viaje_talon2`, `viaje_origen`, `viaje_destino`, `viaje_folioDeCarga`, `viaje_folioDeBascula`) VALUES
(15, 1, 3, 18, 17, 4, 2, '2020-05-12 13:13:00', '2020-05-10 13:14:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 323, 12, 4, 9, '212122', '13132', 'mexico', '', '1', ''),
(16, 2, 1, 11, 17, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 3, 2, 'qsddsdcs', 'hbjnk fcj', 'prueba2', '', '', ''),
(18, 3, 1, 11, 17, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 9, 4, 7, 'x1', 'x1', 'x1', '', '', ''),
(19, 4, 3, 18, 17, 3, 4, '2020-05-13 11:29:00', '2020-05-13 11:29:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 6, 1, 5, 'TX20HBF', 'TX656', 'VENEZUELA', '', '23', ''),
(20, 4, 3, 11, 17, 3, 1, '2020-05-13 11:38:00', '2020-05-13 11:38:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 10, 1, 5, 'TS232', 'TFEGHJK', 'PARIS', 'prueba1', '5', ''),
(21, 5, 1, 18, 17, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 600, 50, 2, 12, '112', '', 'el salto', '', '', ''),
(30, 2, 1, 11, 17, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 4, 3, 3, '', '', 'wqsws', '', '', ''),
(31, 5, 1, 11, 17, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 3, 4, 3, '', '', 'dfghjklñ', '', '', ''),
(32, 3, 1, 18, 17, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 5, 1, 2, '', '', 'dffghjklñ', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_edicion`
--

CREATE TABLE `viaje_edicion` (
  `id_viajeEdicion` int(11) NOT NULL,
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
  `viaje_talon2` varchar(40) NOT NULL,
  `viaje_origen` varchar(500) NOT NULL,
  `viaje_destino` varchar(500) NOT NULL,
  `viaje_folioDeCarga` varchar(50) NOT NULL,
  `viaje_folioDeBascula` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'arribo', ''),
(3, 'carga', ''),
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
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`destino_id`);

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
-- Indices de la tabla `hoja_de_viaje_edicion`
--
ALTER TABLE `hoja_de_viaje_edicion`
  ADD PRIMARY KEY (`id_hojaDeViajeEdicion`);

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
-- Indices de la tabla `tractor_del_operador_edicion`
--
ALTER TABLE `tractor_del_operador_edicion`
  ADD PRIMARY KEY (`id_tractorDelOperadorEdicion`);

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
-- Indices de la tabla `viaje_edicion`
--
ALTER TABLE `viaje_edicion`
  ADD PRIMARY KEY (`id_viajeEdicion`);

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
  MODIFY `cargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carga_unidad_de_medida`
--
ALTER TABLE `carga_unidad_de_medida`
  MODIFY `cargaUnidadDeMedidaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `destino_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa_emisora`
--
ALTER TABLE `empresa_emisora`
  MODIFY `empresaEmisoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empresa_receptora`
--
ALTER TABLE `empresa_receptora`
  MODIFY `empresaReceptoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje`
--
ALTER TABLE `hoja_de_viaje`
  MODIFY `id_hojaDeViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_edicion`
--
ALTER TABLE `hoja_de_viaje_edicion`
  MODIFY `id_hojaDeViajeEdicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `remolque`
--
ALTER TABLE `remolque`
  MODIFY `remolqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `remolque_carga`
--
ALTER TABLE `remolque_carga`
  MODIFY `remolqueCargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tractor`
--
ALTER TABLE `tractor`
  MODIFY `tractorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tractor_del_operador`
--
ALTER TABLE `tractor_del_operador`
  MODIFY `id_tractorDelOperador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tractor_del_operador_edicion`
--
ALTER TABLE `tractor_del_operador_edicion`
  MODIFY `id_tractorDelOperadorEdicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tractor_marca`
--
ALTER TABLE `tractor_marca`
  MODIFY `tractorMarcaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_tipo`
--
ALTER TABLE `usuario_tipo`
  MODIFY `usuarioTipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `viaje_edicion`
--
ALTER TABLE `viaje_edicion`
  MODIFY `id_viajeEdicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `viaje_estado`
--
ALTER TABLE `viaje_estado`
  MODIFY `id_viajeEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
