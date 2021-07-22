-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 21:42:23
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
-- Estructura de tabla para la tabla `arribo_origen_de_carga`
--

CREATE TABLE `arribo_origen_de_carga` (
  `arriboOrigenDeCarga_id` int(11) NOT NULL,
  `arriboOrigenDeCarga_fechaArribo` datetime NOT NULL,
  `arriboOrigenDeCarga_origenCarga` int(11) NOT NULL,
  `arriboOrigenDeCarga_causaDeCambio` varchar(200) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `editor` int(11) NOT NULL,
  `arriboOrigenDeCarga_fechaEdicion` datetime NOT NULL,
  `arriboOrigenDeCarga_fechaCreacion` datetime NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arribo_origen_de_carga`
--

INSERT INTO `arribo_origen_de_carga` (`arriboOrigenDeCarga_id`, `arriboOrigenDeCarga_fechaArribo`, `arriboOrigenDeCarga_origenCarga`, `arriboOrigenDeCarga_causaDeCambio`, `id_viaje`, `creador`, `editor`, `arriboOrigenDeCarga_fechaEdicion`, `arriboOrigenDeCarga_fechaCreacion`, `estadoRegistro`) VALUES
(21, '2021-07-20 00:00:00', 1, 'PRIMER DESVIO', 72, 1, 1, '2021-07-09 11:27:32', '2021-07-09 11:27:14', 0),
(22, '2021-07-15 00:00:00', 2, 'SEGUNDO DESVIO', 72, 1, 1, '2021-07-09 11:27:49', '2021-07-09 11:27:32', 0),
(23, '2021-07-05 00:00:00', 2, 'TERCER DESVIO', 72, 1, 1, '2021-07-09 11:38:39', '2021-07-09 11:27:49', 0),
(24, '2021-07-19 00:00:00', 1, 'BNM,....,,,,,,,,,,,,,,,', 71, 1, 1, '2021-07-09 11:38:49', '2021-07-09 11:38:39', 0),
(25, '2021-07-12 00:00:00', 1, 'd', 75, 1, 1, '2021-07-09 12:58:01', '2021-07-09 11:56:05', 0),
(26, '2021-07-19 00:00:00', 2, 'ghjklñ', 73, 1, 1, '2021-07-09 13:43:57', '2021-07-09 11:56:29', 0),
(27, '2021-07-27 00:00:00', 3, 'ASXSAXA', 77, 1, 1, '2021-07-09 12:07:35', '2021-07-09 12:07:15', 0),
(28, '2021-07-13 00:00:00', 2, 'SA', 77, 1, 1, '2021-07-09 12:15:03', '2021-07-09 12:07:35', 0),
(29, '2021-07-27 00:00:00', 1, 'fghjk.', 75, 1, 1, '2021-07-09 12:58:21', '2021-07-09 12:58:02', 0),
(30, '2021-07-16 00:00:00', 3, 'fghjk.', 75, 1, 1, '2021-07-09 12:58:41', '2021-07-09 12:58:22', 0),
(31, '2021-07-25 00:00:00', 2, 'fghjk.', 75, 1, 1, '2021-07-09 12:58:50', '2021-07-09 12:58:41', 0),
(32, '2021-07-22 00:00:00', 2, 'fghjk.', 75, 1, 1, '2021-07-09 12:59:00', '2021-07-09 12:58:50', 0),
(33, '2021-07-26 00:00:00', 3, 'fghjkl', 73, 1, 1, '2021-07-09 14:10:47', '2021-07-09 13:43:57', 0),
(34, '2021-07-26 00:00:00', 2, 'shjklñ', 80, 1, 1, '2021-07-09 14:39:16', '2021-07-09 13:45:14', 0),
(35, '2021-07-01 00:00:00', 2, '2', 73, 1, 1, '2021-07-09 14:11:24', '2021-07-09 14:10:47', 0),
(36, '2021-07-20 00:00:00', 3, '3', 73, 1, 1, '2021-07-09 14:12:29', '2021-07-09 14:11:24', 0),
(37, '2021-07-20 00:00:00', 2, 'prueba 2', 80, 1, 1, '2021-07-09 14:39:30', '2021-07-09 14:39:17', 0),
(38, '2021-07-13 00:00:00', 3, 'prueba 3', 80, 1, 1, '2021-07-16 14:27:23', '2021-07-09 14:39:30', 0),
(39, '2021-07-12 00:00:00', 4, 'wewwee', 76, 1, 1, '2021-07-13 14:01:37', '2021-07-13 14:01:28', 0),
(40, '2021-07-13 00:00:00', 1, 'klñ{', 79, 1, 1, '2021-07-15 11:39:17', '2021-07-15 11:39:08', 0),
(41, '2021-07-11 00:00:00', 2, 'ghj', 78, 1, 1, '2021-07-16 12:20:52', '2021-07-16 12:20:13', 0),
(42, '2021-07-13 00:00:00', 3, 'ghj', 78, 1, 1, '2021-07-16 12:21:11', '2021-07-16 12:20:52', 0),
(43, '2021-07-27 00:00:00', 3, 'ghj', 78, 1, 1, '2021-07-16 12:21:30', '2021-07-16 12:21:12', 0),
(44, '2021-07-20 00:00:00', 3, 'ghj', 78, 1, 1, '2021-07-16 12:21:45', '2021-07-16 12:21:30', 0),
(45, '2021-08-01 00:00:00', 3, 'ghj', 78, 1, 1, '2021-07-16 12:21:55', '2021-07-16 12:21:45', 0),
(46, '2021-07-13 00:00:00', 2, '2323', 80, 1, 1, '2021-07-16 14:27:31', '2021-07-16 14:27:23', 0),
(47, '2021-07-27 00:00:00', 2, '2323', 80, 1, 1, '2021-07-16 14:27:42', '2021-07-16 14:27:31', 0),
(48, '2021-07-22 00:00:00', 2, '2323', 80, 1, 1, '2021-07-16 14:28:00', '2021-07-16 14:27:42', 0),
(49, '2021-07-21 00:00:00', 3, '2323ssxs', 80, 1, 1, '2021-07-16 14:32:42', '2021-07-16 14:28:00', 0),
(50, '2021-07-07 00:00:00', 2, 'bnm', 80, 1, 1, '2021-07-16 14:32:57', '2021-07-16 14:32:42', 0),
(51, '0000-00-00 00:00:00', 2, 'bnm', 80, 1, 1, '0000-00-00 00:00:00', '2021-07-16 14:32:57', 0),
(52, '0000-00-00 00:00:00', 1, 's', 82, 1, 1, '0000-00-00 00:00:00', '2021-07-16 14:33:55', 0),
(53, '2021-06-28 00:00:00', 1, 's', 82, 1, 1, '2021-07-16 14:34:15', '2021-07-16 14:33:56', 0),
(54, '0000-00-00 00:00:00', 4, 's', 82, 1, 1, '0000-00-00 00:00:00', '2021-07-16 14:34:15', 0),
(55, '2021-07-06 00:00:00', 1, '', 84, 1, 1, '2021-07-16 14:34:53', '2021-07-16 14:34:32', 0),
(56, '0000-00-00 00:00:00', 3, 'sss', 84, 1, 1, '0000-00-00 00:00:00', '2021-07-16 14:34:53', 0),
(57, '2021-07-21 00:00:00', 3, '1', 86, 1, 1, '2021-07-16 14:44:41', '2021-07-16 14:44:22', 0),
(58, '2021-07-20 00:00:00', 2, '1', 86, 1, 1, '2021-07-16 14:45:09', '2021-07-16 14:44:41', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `cargaId` int(11) NOT NULL,
  `cargaNombre` varchar(50) NOT NULL,
  `cargaDescripcion` varchar(500) NOT NULL,
  `cargaFecaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`cargaId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`, `usuarioId`, `estadoRegistro`) VALUES
(1, 'bulto', 'prueba descripcion 1', '2021-05-05 20:40:24', 1, 0),
(2, 'saco', '', '2021-05-05 20:40:24', 1, 0),
(3, 'super saco', '', '2021-05-05 20:40:24', 1, 1),
(4, 'talon', '', '2021-05-05 20:40:24', 1, 0),
(5, 'tambos', '', '2021-05-20 20:37:44', 1, 0),
(6, 'super mega ultra bulto', 'mega cosota', '2021-06-03 14:13:38', 1, 0),
(7, 'tambos', '12', '2021-07-13 13:18:32', 1, 0),
(8, '1', '1', '2021-07-22 14:21:06', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_unidad_de_medida`
--

CREATE TABLE `carga_unidad_de_medida` (
  `cargaUnidadDeMedidaID` int(11) NOT NULL,
  `cargaUnidadDeMedidaNombre` varchar(50) NOT NULL,
  `cargaUnidadDeMedidaDescripcion` varchar(500) NOT NULL,
  `cargaUnidadDeMedidaFechaDeCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga_unidad_de_medida`
--

INSERT INTO `carga_unidad_de_medida` (`cargaUnidadDeMedidaID`, `cargaUnidadDeMedidaNombre`, `cargaUnidadDeMedidaDescripcion`, `cargaUnidadDeMedidaFechaDeCreacion`, `usuarioId`, `estadoRegistro`) VALUES
(1, 'kilogramos', '', '2021-05-05 20:41:36', 1, 0),
(2, 'tonelada', 'pendiente', '2021-05-05 20:41:36', 1, 0),
(3, 'libras', 'pendiente', '2021-05-05 20:50:27', 1, 0),
(4, 'gramo', '', '2021-05-05 20:41:36', 1, 0),
(5, 'milligramo', '', '2021-05-05 20:49:01', 1, 0),
(6, 'litros', '', '2021-05-20 20:37:14', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga_destinos`
--

CREATE TABLE `descarga_destinos` (
  `descargaOrigenDeCarga_id` int(11) NOT NULL,
  `descargaOrigenDeCarga_origenCarga` int(11) NOT NULL,
  `descargaOrigenDeCarga_causaDeCambio` varchar(200) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `editor` int(11) NOT NULL,
  `descargaOrigenDeCarga_fechaDescarga` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaDescargaRuta` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaEdicion` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaCreacion` datetime NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga_origen_de_carga`
--

CREATE TABLE `descarga_origen_de_carga` (
  `descargaOrigenDeCarga_id` int(11) NOT NULL,
  `descargaOrigenDeCarga_origenCarga` int(11) NOT NULL,
  `descargaOrigenDeCarga_causaDeCambio` varchar(200) NOT NULL,
  `descargaOrigenDeCarga_fechaDescargaRuta` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaDescarga` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaEdicion` datetime NOT NULL,
  `descargaOrigenDeCarga_fechaCreacion` datetime NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `editor` int(11) NOT NULL,
  `descargaOrigenDeCarga_estado` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descarga_origen_de_carga`
--

INSERT INTO `descarga_origen_de_carga` (`descargaOrigenDeCarga_id`, `descargaOrigenDeCarga_origenCarga`, `descargaOrigenDeCarga_causaDeCambio`, `descargaOrigenDeCarga_fechaDescargaRuta`, `descargaOrigenDeCarga_fechaDescarga`, `descargaOrigenDeCarga_fechaEdicion`, `descargaOrigenDeCarga_fechaCreacion`, `id_viaje`, `creador`, `editor`, `descargaOrigenDeCarga_estado`, `estadoRegistro`) VALUES
(1, 2, '1', '0000-00-00 00:00:00', '2021-07-13 00:00:00', '2021-07-19 12:33:47', '2021-07-19 11:35:34', 81, 1, 1, 0, 0),
(21, 3, 'fghj', '2021-07-14 00:00:00', '2021-07-14 00:00:00', '2021-07-19 12:39:18', '2021-07-19 12:33:47', 81, 1, 1, 0, 0),
(22, 4, 'w', '2021-07-22 00:00:00', '2021-01-04 00:00:00', '2021-07-19 12:39:42', '2021-07-19 12:39:18', 81, 1, 1, 0, 0),
(23, 3, 'w', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-19 12:39:42', 81, 1, 1, 0, 0),
(24, 2, 'w', '2021-07-20 00:00:00', '2021-07-13 00:00:00', '2021-07-19 13:14:11', '2021-07-19 13:13:59', 73, 1, 1, 0, 0),
(25, 3, 'ww', '2021-07-15 00:00:00', '2021-08-06 00:00:00', '2021-07-19 13:39:28', '2021-07-19 13:14:11', 73, 1, 1, 0, 0),
(26, 1, 's', '2021-07-21 00:00:00', '2021-07-13 00:00:00', '2021-07-19 14:00:11', '2021-07-19 13:39:28', 73, 1, 1, 0, 0),
(27, 4, '11', '2021-07-14 00:00:00', '2021-07-13 00:00:00', '2021-07-19 14:12:05', '2021-07-19 14:00:11', 73, 1, 1, 1, 0),
(28, 3, '1s', '2021-07-14 00:00:00', '2021-07-13 00:00:00', '2021-07-19 14:55:16', '2021-07-19 14:12:05', 73, 1, 1, 1, 0),
(29, 2, 'w', '2021-07-14 00:00:00', '2021-07-20 00:00:00', '2021-07-19 14:55:35', '2021-07-19 14:55:16', 73, 1, 1, 1, 0),
(30, 4, 'w', '2021-07-13 00:00:00', '2021-07-06 00:00:00', '2021-07-19 14:55:59', '2021-07-19 14:55:35', 73, 1, 1, 1, 0),
(31, 4, 'w', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-19 14:55:59', 73, 1, 1, 1, 0),
(32, 2, 'wddw', '2021-07-20 00:00:00', '2021-07-21 00:00:00', '2021-07-20 10:47:06', '2021-07-20 10:46:49', 76, 1, 1, 1, 0),
(33, 2, 'wddw', '2021-07-28 00:00:00', '2021-07-21 00:00:00', '2021-07-20 10:47:30', '2021-07-20 10:47:06', 76, 1, 1, 6, 0),
(34, 2, 'wddw', '2021-07-15 00:00:00', '2021-07-12 00:00:00', '2021-07-20 10:57:05', '2021-07-20 10:47:30', 76, 1, 1, 1, 0),
(35, 3, '', '2021-07-13 00:00:00', '2021-07-20 00:00:00', '2021-07-20 11:52:47', '2021-07-20 10:57:06', 76, 1, 1, 6, 0),
(36, 2, '', '2021-07-14 00:00:00', '2021-07-14 00:00:00', '2021-07-20 11:53:04', '2021-07-20 11:52:47', 76, 1, 1, 1, 0),
(37, 2, 's', '2021-07-15 00:00:00', '2021-07-12 00:00:00', '2021-07-20 11:53:56', '2021-07-20 11:53:37', 75, 1, 1, 6, 0),
(38, 2, 's', '2021-07-04 00:00:00', '2021-07-04 00:00:00', '2021-07-20 11:54:09', '2021-07-20 11:53:57', 75, 1, 1, 1, 0),
(39, 1, '1w2', '2021-07-27 00:00:00', '2021-07-13 00:00:00', '2021-07-20 12:02:45', '2021-07-20 11:58:26', 77, 1, 1, 6, 0),
(40, 2, '1w2', '2021-07-21 00:00:00', '2021-07-13 00:00:00', '2021-07-20 12:38:29', '2021-07-20 12:02:45', 77, 1, 1, 1, 0),
(41, 4, '1', '2021-08-04 00:00:00', '2021-07-12 00:00:00', '2021-07-20 12:43:43', '2021-07-20 12:38:29', 77, 1, 1, 1, 0),
(42, 2, '1', '2021-07-28 00:00:00', '2021-07-20 00:00:00', '2021-07-20 12:43:56', '2021-07-20 12:43:43', 77, 1, 1, 1, 0),
(43, 2, '1', '2021-07-14 00:00:00', '2021-07-21 00:00:00', '2021-07-20 12:44:28', '2021-07-20 12:43:56', 77, 1, 1, 6, 0),
(44, 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-20 12:44:28', 77, 1, 1, 1, 0),
(45, 4, 'jkl', '2021-07-05 00:00:00', '2021-07-18 00:00:00', '2021-07-20 13:10:32', '2021-07-20 13:10:19', 72, 1, 1, 1, 0),
(46, 3, 'jkl', '2021-07-13 00:00:00', '2021-07-13 00:00:00', '2021-07-20 13:10:45', '2021-07-20 13:10:32', 72, 1, 1, 6, 0),
(47, 3, 'jkl', '2021-07-06 00:00:00', '2021-07-05 00:00:00', '2021-07-20 13:11:18', '2021-07-20 13:10:45', 72, 1, 1, 6, 0),
(48, 3, 'jkl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-20 13:11:17', 72, 1, 1, 6, 0),
(49, 3, 'jkl', '2021-07-13 00:00:00', '2021-07-05 00:00:00', '2021-07-20 13:11:35', '2021-07-20 13:11:18', 72, 1, 1, 6, 0),
(50, 3, 'jkl', '2021-07-30 00:00:00', '2021-07-27 00:00:00', '2021-07-20 13:11:48', '2021-07-20 13:11:35', 72, 1, 1, 6, 0),
(51, 3, 'jkl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-20 13:11:46', 72, 1, 1, 6, 0),
(52, 3, 'jkl', '2021-07-22 00:00:00', '2021-07-19 00:00:00', '2021-07-20 13:12:05', '2021-07-20 13:11:48', 72, 1, 1, 6, 0),
(53, 3, 'jkl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-20 13:12:02', 72, 1, 1, 6, 0),
(54, 3, 'jkl', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-20 13:12:02', 72, 1, 1, 6, 0),
(55, 3, 'jkl', '2021-07-21 00:00:00', '2021-07-27 00:00:00', '2021-07-20 13:12:31', '2021-07-20 13:12:06', 72, 1, 1, 6, 0),
(56, 4, 'jkl', '2021-08-05 00:00:00', '2021-08-04 00:00:00', '2021-07-20 13:12:45', '2021-07-20 13:12:31', 72, 1, 1, 1, 0),
(57, 4, 'jkl', '2021-07-15 00:00:00', '2021-08-30 00:00:00', '2021-07-20 13:15:27', '2021-07-20 13:12:45', 72, 1, 1, 1, 0),
(58, 2, 'gfhj', '2021-07-30 00:00:00', '2021-07-13 00:00:00', '2021-07-20 13:34:54', '2021-07-20 13:34:42', 78, 1, 1, 6, 0),
(59, 2, 'gfhj', '2021-07-15 00:00:00', '2021-07-19 00:00:00', '2021-07-20 13:35:08', '2021-07-20 13:34:54', 78, 1, 1, 1, 0),
(60, 2, 'gfhj', '2021-07-15 00:00:00', '2021-07-21 00:00:00', '2021-07-20 13:36:03', '2021-07-20 13:35:08', 78, 1, 1, 1, 0),
(61, 2, 'gfhj', '2021-07-13 00:00:00', '2021-07-05 00:00:00', '2021-07-20 13:36:16', '2021-07-20 13:36:03', 78, 1, 1, 1, 0),
(62, 2, 'gfhj', '2021-07-07 00:00:00', '2021-07-12 00:00:00', '2021-07-20 13:37:09', '2021-07-20 13:36:16', 78, 1, 1, 6, 0),
(63, 2, 'gfhj', '2021-07-29 00:00:00', '2021-07-30 00:00:00', '2021-07-20 13:37:21', '2021-07-20 13:37:09', 78, 1, 1, 6, 0),
(64, 2, 'gfhj', '2021-08-05 00:00:00', '2021-06-26 00:00:00', '2021-07-20 13:38:41', '2021-07-20 13:37:21', 78, 1, 1, 1, 0),
(65, 2, '1', '2021-07-14 00:00:00', '2021-07-29 00:00:00', '2021-07-22 10:27:57', '2021-07-22 10:27:41', 71, 1, 1, 1, 0),
(66, 2, '1', '2021-07-28 00:00:00', '2021-07-30 00:00:00', '2021-07-22 10:28:14', '2021-07-22 10:27:57', 71, 1, 1, 6, 0),
(67, 2, '1', '2021-07-15 00:00:00', '2021-07-30 00:00:00', '2021-07-22 10:28:36', '2021-07-22 10:28:14', 71, 1, 1, 1, 0),
(68, 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-07-22 10:28:36', 71, 1, 1, 6, 0);

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
  `destino_creador` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`destino_id`, `destino_nombre`, `destino_direccion`, `destino_telefono1`, `destino_telefono2`, `destino_correo`, `destino_latitud`, `destino_longitud`, `destino_creacion`, `destino_creador`, `estadoRegistro`) VALUES
(1, 'ruta 1', 'or 6 mz 59 lt 27', '57967868', '57967868', 'correo@gmail.com', '', '', '2021-06-24 16:42:58', 1, 0),
(2, 'ruta 2 ', 'or 6 mz 59 lt 27', '22123455', '87980976', 'correo2@gmail.com', '', '', '2021-06-24 16:42:58', 1, 0),
(3, 'ruta 3', 'or 6 mz 59 lt 27', '324243', '2343242', 'galver@gmail.com', '', '', '0000-00-00 00:00:00', 1, 0),
(4, 'ruta 4', 'or 6 mz 59 kt 27', '123', '456', 'galver123@gmail.com', '', '', '0000-00-00 00:00:00', 1, 0);

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
  `empresaEmisoraCP` varchar(50) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_emisora`
--

INSERT INTO `empresa_emisora` (`empresaEmisoraId`, `usuarioId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`, `empresaEmisoraCP`, `estadoRegistro`) VALUES
(17, 1, 'Galver 01', '', '', 0, 0, 0, 0, '', '2021-07-22 21:20:14', '', '', 0),
(18, 1, 'Galver 02', 'DSFGHJKLLS', 'por hay', 555, 556677, 5665, 5676, 'galver@gmail.com.mx', '0000-00-00 00:00:00', '', '09979', 0),
(19, 1, 'Galver 03', 'X', 'X', 0, 0, 0, 0, 'X', '2021-07-05 13:38:13', '', 'X', 0),
(20, 1, 'Galver 04', 'LÑLLÑ', 'X', 55, 555, 5655, 555, 'XX', '2021-07-05 13:40:37', '', 'S', 0),
(21, 1, 'Galver 05', 'sdd', 'd', 0, 0, 0, 0, 'dsdd', '2021-07-22 13:56:45', '', 'dxdd', 0);

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
  `empresaReceptoraCP` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_receptora`
--

INSERT INTO `empresa_receptora` (`empresaReceptoraId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, `usuarioId`, `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`, `empresaReceptoraCP`, `estadoRegistro`) VALUES
(17, 'Civer Win Evolution 1', 'FGHJKLÑ', 'CVBNM', 57876789, 98765457, 7865, 67788876, 'A@A.COM', 1, '0000-00-00 00:00:00', '', 70900, 0),
(18, 'Suema', '5467890', 'mkl', 2147483647, 567566567, 56676575, 56, 'suema@gmail.com', 1, '2021-07-13 13:15:04', '', 13212, 0),
(19, 'Surftware', '12', '1', 12, 12, 12, 12, 'surftware@gmail.com', 1, '2021-07-13 13:15:44', '', 12334, 0),
(20, 'BSDM', '12221', '1', 56789, 7890, 7890, 7890, 'bsdm@gmail.com', 1, '2021-07-13 13:16:34', '', 12345, 0);

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
  `hojaDeViaje_observaciones` varchar(500) NOT NULL,
  `hojaDeViaje_tipoDeViaje` int(11) NOT NULL,
  `hojaDeViaje_estadoDeViaje` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje`
--

INSERT INTO `hoja_de_viaje` (`id_hojaDeViaje`, `id_creador`, `id_editor`, `hojaDeViaje_fechaDeLiberacion`, `hojaDeViaje_fechaDeEdicion`, `hojaDeViaje_observaciones`, `hojaDeViaje_tipoDeViaje`, `hojaDeViaje_estadoDeViaje`, `estadoRegistro`) VALUES
(1, 1, 1, '2021-07-09 11:24:15', '0000-00-00 00:00:00', 'J,K.L-Ñ', 0, 1, 0),
(2, 1, 1, '2021-07-09 11:42:07', '2021-07-09 11:58:16', 'se agrego remolque de viaje', 0, 1, 0),
(3, 1, 1, '2021-07-09 12:02:13', '2021-07-09 13:48:51', 'nueva alteracion', 0, 1, 0),
(4, 1, 1, '2021-07-09 12:35:09', '0000-00-00 00:00:00', '', 0, 1, 0),
(5, 1, 1, '2021-07-09 12:54:19', '2021-07-16 14:31:40', 'tercer cambio', 0, 1, 0),
(6, 1, 1, '2021-07-12 11:21:14', '2021-07-14 11:36:07', '', 0, 1, 0),
(7, 1, 1, '2021-07-13 13:25:16', '2021-07-14 11:35:43', '', 0, 1, 0),
(8, 1, 1, '2021-07-16 14:43:27', '0000-00-00 00:00:00', '16/07/21', 0, 1, 0),
(9, 1, 1, '2021-07-20 13:40:21', '0000-00-00 00:00:00', '', 0, 1, 0),
(10, 1, 1, '2021-07-22 13:52:23', '0000-00-00 00:00:00', 'wdwdwdwdw', 0, 1, 0);

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
-- Estructura de tabla para la tabla `hoja_de_viaje_estado`
--

CREATE TABLE `hoja_de_viaje_estado` (
  `hdve_id` int(11) NOT NULL,
  `hdve_nombre` varchar(20) NOT NULL,
  `hdve_caracteristicas` varchar(300) NOT NULL,
  `color_td` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje_estado`
--

INSERT INTO `hoja_de_viaje_estado` (`hdve_id`, `hdve_nombre`, `hdve_caracteristicas`, `color_td`) VALUES
(1, 'activo', '', '#00ff3e'),
(2, 'inactivo', '', '#000000'),
(3, 'cancelado', '', '#ff0000'),
(4, 'finalizado', '', '#ff0000'),
(5, 'pausa', '', '#bdbdbd'),
(6, 'desvio', '', '#ff1b1b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_viaje_tipo`
--

CREATE TABLE `hoja_de_viaje_tipo` (
  `hdvt_id` int(11) NOT NULL,
  `hdvt_nombre` varchar(20) NOT NULL,
  `hdvt_caracteristicas` varchar(300) NOT NULL,
  `hdvt_color_tr` varchar(30) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_de_viaje_tipo`
--

INSERT INTO `hoja_de_viaje_tipo` (`hdvt_id`, `hdvt_nombre`, `hdvt_caracteristicas`, `hdvt_color_tr`, `estadoRegistro`) VALUES
(0, 'vacio', '', '#000000', 0),
(1, 'simple', '', '#58b600', 0),
(2, 'full', '', '#e1c500', 0);

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
  `usuarioId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`operadorID`, `operadorNombre`, `operadorLisencia`, `operadorFechaCreacion`, `operadorRFC`, `usuarioId`, `estadoRegistro`) VALUES
(1, 'Moreno Tolentino Jose Armando', 'SDJ433RHJJND', '2021-05-05 21:26:54', '', 1, 0),
(2, 'juan antonio vergara sanches', '6767DBHG83', '2021-05-05 21:26:54', '', 1, 0),
(3, 'operador de prueba1', 'GFHFHEGR', '2021-05-11 18:16:07', 'XXXAXA', 1, 0),
(4, 'operador de prueba2', 'GREGEGERFV', '2021-06-03 11:56:24', '5678945678', 1, 0),
(5, 'operador de prueba3', 'TGHFS6789', '2021-05-19 21:14:34', 'regvwtrefd', 1, 0),
(6, 'operador de prueba4', '456789', '2021-05-19 21:14:34', '56789', 1, 0),
(8, 'operador de prueba5', 'HFRFYUGJH', '2021-06-03 12:04:50', 'FGHJCVBERT', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque`
--

CREATE TABLE `remolque` (
  `remolquePlaca` varchar(50) NOT NULL,
  `remolqueEconomico` varchar(500) NOT NULL,
  `remolqueID` int(11) NOT NULL,
  `remolqueFechaCreacion` datetime NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque`
--

INSERT INTO `remolque` (`remolquePlaca`, `remolqueEconomico`, `remolqueID`, `remolqueFechaCreacion`, `usuarioId`, `estadoRegistro`) VALUES
('01', '001', 1, '2021-05-19 17:55:08', 1, 0),
('02', '002', 2, '2021-05-21 20:22:14', 1, 0),
('03', '003', 3, '2021-05-21 20:22:14', 1, 0),
('04', '994', 4, '0000-00-00 00:00:00', 1, 0),
('06', '006', 5, '2021-06-03 13:47:06', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remolque_carga`
--

CREATE TABLE `remolque_carga` (
  `remolqueCargaId` int(11) NOT NULL,
  `remolqueCargaServicio` varchar(500) NOT NULL,
  `remolqueCargaImpuesto` decimal(10,0) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `remolqueCargaFechaCreacion` datetime NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remolque_carga`
--

INSERT INTO `remolque_carga` (`remolqueCargaId`, `remolqueCargaServicio`, `remolqueCargaImpuesto`, `usuarioId`, `remolqueCargaFechaCreacion`, `estadoRegistro`) VALUES
(1, 'Venta de Activo', '0', 1, '0000-00-00 00:00:00', 0),
(2, 'Maniobras Z', '16', 1, '0000-00-00 00:00:00', 0),
(3, 'Flete de Jugos', '16', 1, '0000-00-00 00:00:00', 0),
(4, 'Flete de Papas', '16', 1, '0000-00-00 00:00:00', 0),
(5, 'Viaje De Productos Terminados', '16', 1, '0000-00-00 00:00:00', 0),
(6, 'Ci Indemnizacion', '16', 1, '0000-00-00 00:00:00', 0),
(7, 'Estadias', '16', 1, '0000-00-00 00:00:00', 0),
(8, 'Viaje De Tarimas', '16', 1, '0000-00-00 00:00:00', 0),
(9, 'Servicio De Translados', '16', 1, '0000-00-00 00:00:00', 0),
(10, 'Retorno En Vacio', '16', 1, '0000-00-00 00:00:00', 0),
(11, 'Servicio', '16', 1, '0000-00-00 00:00:00', 0),
(12, 'Flete De Azucar', '16', 1, '0000-00-00 00:00:00', 0),
(13, 'Venta De Azucar ', '0', 1, '0000-00-00 00:00:00', 0),
(14, 'Mantenimiento', '16', 1, '0000-00-00 00:00:00', 0),
(15, 'Maniobras B', '16', 1, '0000-00-00 00:00:00', 0),
(16, 'C Indemnizacion', '0', 1, '0000-00-00 00:00:00', 0),
(17, 'R Indemnizacion', '0', 1, '0000-00-00 00:00:00', 0),
(18, 'Estadias B', '16', 1, '0000-00-00 00:00:00', 0),
(19, 'Flete de azucar', '16', 1, '0000-00-00 00:00:00', 0);

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
  `tractorMarcaId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor`
--

INSERT INTO `tractor` (`tractorId`, `tractorPlaca`, `tractorEconomico`, `usuarioId`, `tractorFechaCreacion`, `tractorMarcaId`, `estadoRegistro`) VALUES
(1, '1311218', '001', 1, '2021-05-19 17:55:08', 7, 0),
(2, '1311219', '002', 1, '2021-05-19 17:55:08', 2, 0),
(3, '13228272', '003', 1, '2021-06-03 12:42:58', 5, 0),
(4, '121130329', '004', 1, '2021-07-13 13:17:31', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tractor_del_operador`
--

CREATE TABLE `tractor_del_operador` (
  `id_tractorDelOperador` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `id_tractor` int(11) NOT NULL,
  `id_hojaDeViaje` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor_del_operador`
--

INSERT INTO `tractor_del_operador` (`id_tractorDelOperador`, `id_operador`, `id_tractor`, `id_hojaDeViaje`, `estadoRegistro`) VALUES
(44, 4, 1, 1, 0),
(45, 3, 3, 2, 0),
(46, 3, 1, 3, 0),
(47, 1, 1, 4, 0),
(48, 6, 3, 5, 0),
(49, 2, 2, 6, 0),
(50, 1, 1, 7, 0),
(51, 2, 1, 8, 0),
(52, 6, 2, 9, 0),
(53, 1, 3, 10, 0);

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
  `usuarioId` int(11) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor_marca`
--

INSERT INTO `tractor_marca` (`tractorMarcaId`, `tractorMarcaNombre`, `tractorMarcaCreacion`, `usuarioId`, `estadoRegistro`) VALUES
(1, 'nizzan', '2021-05-20 17:54:25', 1, 0),
(2, 'for', '2021-05-20 17:54:25', 1, 0),
(3, 'Massey Ferguson', '2021-05-20 17:55:12', 1, 0),
(4, 'Valtra', '2021-05-20 17:55:12', 1, 0),
(5, 'AGCO Parts', '2021-05-20 17:55:46', 1, 0),
(6, 'AGCO Service', '2021-05-20 17:55:46', 1, 0),
(7, 'AP', '2021-05-20 17:56:08', 1, 0),
(8, 'Cimbria', '2021-05-20 17:56:08', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuarioId` int(11) NOT NULL,
  `usuarioNombre` varchar(30) NOT NULL,
  `usuarioPassword` varchar(20) NOT NULL,
  `usuarioTipoId` int(11) NOT NULL,
  `usuarioCreacion` datetime NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuarioNombre`, `usuarioPassword`, `usuarioTipoId`, `usuarioCreacion`, `estadoRegistro`) VALUES
(1, 'admin', 'admin', 1, '2021-05-19 17:55:08', 0),
(2, 'jose', 'jose', 2, '2021-06-08 20:34:30', 0),
(3, 'jesus', 'jesus', 3, '2021-06-08 20:34:50', 0),
(4, 'juan', 'juan', 4, '2021-06-08 20:34:50', 0),
(5, 'maria', 'maria', 5, '2021-06-08 20:34:50', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo`
--

CREATE TABLE `usuario_tipo` (
  `usuarioTipoId` int(11) NOT NULL,
  `usuarioTipoCargo` varchar(50) NOT NULL,
  `usuarioTipoDescripcion` varchar(500) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`usuarioTipoId`, `usuarioTipoCargo`, `usuarioTipoDescripcion`, `estadoRegistro`) VALUES
(1, 'administrador', 'super administrador, puede ver todo', 0),
(2, 'monitor', 'genera talones de viaje', 0),
(3, 'supervisor', 'pendiente', 0),
(4, 'operdor', 'pendiente', 0),
(5, 'facturacion', 'pendiente', 0);

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
  `viaje_folioDeBascula` varchar(50) NOT NULL,
  `viaje_observacion_carga` varchar(500) NOT NULL,
  `viaje_sellos` varchar(300) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_hojaDeViaje`, `id_viajeEstado`, `id_empresaEmisora`, `id_empresaReceptora`, `id_carga`, `id_unidadDeMedida`, `viaje_fechaDeArribo`, `viaje_fechaDeCarga`, `viaje_fechaDeLlegadaDeDescarga`, `viaje_fechaDeDescarga`, `viaje_cargaCantidad`, `viaje_cargaProporcionUM`, `id_remolque`, `id_remolqueServicio`, `viaje_talon1`, `viaje_talon2`, `viaje_origen`, `viaje_destino`, `viaje_folioDeCarga`, `viaje_folioDeBascula`, `viaje_observacion_carga`, `viaje_sellos`, `estadoRegistro`) VALUES
(71, 1, 3, 18, 17, 5, 5, '2021-07-19 00:00:00', '2021-07-09 11:39:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 21, 20, 3, 9, 'T67T67WT', 'YTFTYFCYT', '1', '', 'HMJ,K.L-', 'HMJ,K.L-', '  ssss', 'nmj,k.l  hjkl', 0),
(72, 1, 4, 18, 17, 5, 5, '2021-07-27 00:00:00', '2021-07-09 11:33:12', '0000-00-00 00:00:00', '2021-08-30 00:00:00', 21, 20, 3, 0, 'T67T67WT', 'YTFTYFCYT', '4', '', '657890', '657890', 'MKLÑ{}', '77890HJ', 0),
(73, 2, 4, 18, 17, 5, 4, '2021-07-20 00:00:00', '2021-07-13 14:02:00', '0000-00-00 00:00:00', '2021-07-13 00:00:00', 54545, 455, 1, 8, 'hghh', 'hfhfhf', '3', '', '678', '678', 'ghjk', '90009 8989 80909 98999', 0),
(75, 2, 4, 18, 17, 2, 3, '2021-07-22 00:00:00', '2021-07-09 13:59:01', '0000-00-00 00:00:00', '2021-07-04 00:00:00', 2, 3, 4, 6, 'ghj.-', 'jklñ', '2', '', 's', 's', 's', 's', 0),
(76, 3, 4, 11, 17, 3, 2, '2021-07-12 00:00:00', '2021-07-16 14:45:58', '0000-00-00 00:00:00', '2021-07-14 00:00:00', 29, 3, 4, 6, 'ghjk', 'hjklñ', '2', '', '4567', '4567', '546767', '4567 4567 6789', 0),
(77, 3, 3, 11, 17, 3, 2, '2021-07-13 00:00:00', '2021-07-09 12:15:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 29, 3, 4, 6, 'ghjk', 'hjklñ', '2', '', '1', '1', 'ws', 'sqw sss ddd fff ggg hhh jjj kkk lll ñññ {{{ }}} ', 0),
(78, 4, 4, 11, 17, 1, 1, '2021-08-01 00:00:00', '2021-07-16 14:29:12', '0000-00-00 00:00:00', '2021-06-26 00:00:00', 3, 3, 2, 1, 'xx', 'xx', '2', '', 'hhhh', 'hhhh', 'jkk.-.', 'hjk', 0),
(79, 4, 2, 11, 17, 1, 1, '2021-07-13 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 3, 2, 1, 'xx', 'xx', '1', '', '', '', '', '', 0),
(80, 5, 1, 11, 17, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10.1, 10, 3, 3, '2', '2', '3', '', '', '', '', '', 0),
(81, 5, 1, 11, 17, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10.1, 10, 3, 3, '2', '2', '3', '', '', '', '', '', 0),
(82, 6, 1, 18, 17, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 123, 2, 5, '123', '123', '1', '', '', '', '', '', 0),
(83, 7, 1, 11, 19, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63.3, 121.22, 3, 5, '321', '321', '2', '', '', '', '', '', 0),
(84, 7, 1, 11, 19, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 63.3, 121.22, 3, 5, '321', '321', '2', '', '', '', '', '', 0),
(85, 8, 1, 18, 18, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 10, 2, 2, '2332dfs', 'dfbdfbd', '3', '', '', '', '', '', 0),
(86, 8, 2, 18, 18, 3, 4, '2021-07-20 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 10, 2, 2, '2332dfs', 'dfbdfbd', '2', '', '', '', '', '', 0),
(87, 9, 1, 18, 18, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 5, 4, 10, 'hjklñ', 'hjkl', '1', '', '', '', '', '', 0),
(88, 9, 1, 18, 18, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 5, 4, 10, 'hjklñ', 'hjkl', '1', '', '', '', '', '', 0),
(89, 10, 1, 18, 17, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 31, 23, 5, 6, 'jklñ{}', 'qsqsqs', '2', '', '', '', '', '', 0),
(90, 10, 1, 18, 17, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 31, 23, 5, 6, 'jklñ{}', 'qsqsqs', '2', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_destino`
--

CREATE TABLE `viaje_destino` (
  `viajeDestinoID` int(11) NOT NULL,
  `viajeDestinoComentario` varchar(500) NOT NULL,
  `viajeDestinoCreacion` datetime NOT NULL,
  `Id_Creador` int(11) NOT NULL,
  `viajeDestinoEdicion` datetime NOT NULL,
  `Id_Editor` int(11) NOT NULL,
  `Id_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `viajeEstado_descripcion` varchar(500) NOT NULL,
  `color_tr` varchar(30) NOT NULL,
  `estadoRegistro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje_estado`
--

INSERT INTO `viaje_estado` (`id_viajeEstado`, `viajeEstado_nombre`, `viajeEstado_descripcion`, `color_tr`, `estadoRegistro`) VALUES
(1, 'liberacion', '', '#5cff1e', 0),
(2, 'arribo', '', '#f1fb17', 0),
(3, 'carga', '', '#fbc417', 0),
(4, 'descarga', '', '#fb1717', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arribo_origen_de_carga`
--
ALTER TABLE `arribo_origen_de_carga`
  ADD PRIMARY KEY (`arriboOrigenDeCarga_id`);

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
-- Indices de la tabla `descarga_origen_de_carga`
--
ALTER TABLE `descarga_origen_de_carga`
  ADD PRIMARY KEY (`descargaOrigenDeCarga_id`);

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
-- Indices de la tabla `hoja_de_viaje_estado`
--
ALTER TABLE `hoja_de_viaje_estado`
  ADD PRIMARY KEY (`hdve_id`);

--
-- Indices de la tabla `hoja_de_viaje_tipo`
--
ALTER TABLE `hoja_de_viaje_tipo`
  ADD PRIMARY KEY (`hdvt_id`);

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
-- Indices de la tabla `viaje_destino`
--
ALTER TABLE `viaje_destino`
  ADD PRIMARY KEY (`viajeDestinoID`);

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
-- AUTO_INCREMENT de la tabla `arribo_origen_de_carga`
--
ALTER TABLE `arribo_origen_de_carga`
  MODIFY `arriboOrigenDeCarga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `cargaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `carga_unidad_de_medida`
--
ALTER TABLE `carga_unidad_de_medida`
  MODIFY `cargaUnidadDeMedidaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `descarga_origen_de_carga`
--
ALTER TABLE `descarga_origen_de_carga`
  MODIFY `descargaOrigenDeCarga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `destino_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa_emisora`
--
ALTER TABLE `empresa_emisora`
  MODIFY `empresaEmisoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `empresa_receptora`
--
ALTER TABLE `empresa_receptora`
  MODIFY `empresaReceptoraId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_estado`
--
ALTER TABLE `hoja_de_viaje_estado`
  MODIFY `hdve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hoja_de_viaje_tipo`
--
ALTER TABLE `hoja_de_viaje_tipo`
  MODIFY `hdvt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `tractorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tractor_del_operador`
--
ALTER TABLE `tractor_del_operador`
  MODIFY `id_tractorDelOperador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `viaje_destino`
--
ALTER TABLE `viaje_destino`
  MODIFY `viajeDestinoID` int(11) NOT NULL AUTO_INCREMENT;

--
