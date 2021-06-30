-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 22:04:57
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
-- Estructura de tabla para la tabla `arribo_destinos`
--

CREATE TABLE `arribo_destinos` (
  `arriboDestino_id` int(11) NOT NULL,
  `arriboDestino_fecha` datetime NOT NULL,
  `arriboDestino_destino` int(11) NOT NULL,
  `arriboDestino_causaDeCambio` varchar(200) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `editor` int(11) NOT NULL,
  `arriboDestino_fechaEdicion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arribo_destinos`
--

INSERT INTO `arribo_destinos` (`arriboDestino_id`, `arriboDestino_fecha`, `arriboDestino_destino`, `arriboDestino_causaDeCambio`, `id_viaje`, `creador`, `editor`, `arriboDestino_fechaEdicion`) VALUES
(18, '2021-06-28 13:53:18', 1, 'primera fecha y destino de arribo', 44, 1, 1, '0000-00-00 00:00:00'),
(24, '2021-06-30 14:01:53', 1, '1', 44, 1, 1, '2021-06-30 14:02:21'),
(25, '2021-06-28 13:49:47', 3, 'primera fecha y destino de arribo', 43, 1, 1, '0000-00-00 00:00:00'),
(26, '2021-06-28 14:00:53', 1, 'primera fecha y destino de arribo', 48, 1, 1, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arribo_destinos`
--
ALTER TABLE `arribo_destinos`
  ADD PRIMARY KEY (`arriboDestino_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arribo_destinos`
--
ALTER TABLE `arribo_destinos`
  MODIFY `arriboDestino_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
