-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2021 a las 21:50:51
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
(5, 'Civer win Evolution', '123321231', 'metro xola      ', 111, 111, 111, 111, 'armando@s.com', 1, 1, '2021-04-29 20:28:27', 'empresa dedicada a la facturacion electronica                                    '),
(9, 'surftware', 'hhhhdytt6r7ggfcg', 'bjbj                                    ', 77878678, 686867, 6768, 687687687, 'hbjhbhj', 1, 1, '2021-04-30 19:07:37', 'bhbhb,hj                                    '),
(10, 'canom', '1233232', 's                                    ', 78778, 878787, 87787, 8, 's', 1, 1, '2021-04-30 19:40:15', 's                                    ');

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
(1, 'jose armando', 'capcom12', 4, '2021-04-27 15:12:04', ''),
(2, 'miguel', 'miguel', 1, '2021-04-28 20:29:38', '');

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
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`empresaId`);

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
-- Indices de la tabla `talon`
--
ALTER TABLE `talon`
  ADD PRIMARY KEY (`talonID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estadotalon`
--
ALTER TABLE `estadotalon`
  MODIFY `estadoTalonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT de la tabla `talon`
--
ALTER TABLE `talon`
  MODIFY `talonID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
