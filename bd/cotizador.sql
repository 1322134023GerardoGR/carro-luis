-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 07:47:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `transmision` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `interiores` varchar(255) DEFAULT NULL,
  `frenos` varchar(255) DEFAULT NULL,
  `rines` varchar(255) DEFAULT NULL,
  `escape` varchar(255) DEFAULT NULL,
  `estribos` varchar(255) DEFAULT NULL,
  `aleron` varchar(255) DEFAULT NULL,
  `luces` varchar(255) DEFAULT NULL,
  `luces_adicional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `transmision`, `color`, `interiores`, `frenos`, `rines`, `escape`, `estribos`, `aleron`, `luces`, `luces_adicional`) VALUES
(1, '298900', '5000', '5000', 'on', 'on', 'on', '', 'on', 'on', 'on'),
(2, '298900', '5000', '5000', 'on', 'on', 'on', 'Laterales en Plastico', 'GT', 'Luces Xenon', ''),
(3, 'Manual', 'Bitono', 'Piel con Detalles en Rojo', 'on', 'on', 'on', 'Delanteros en Plastico, Laterales en Fibra de Carbono', 'Fibra de Carbono', 'Luces Xenon', ''),
(4, 'CVT', 'Metalizado', 'Piel Negra', 'Deportivos - $24,000 MXN', 'Fibra de Carbono - $80,000 MXN', 'Silenciador - $25,000 MXN', 'Delanteros en Plastico', 'Fibra de Carbono', 'Luces Xenon', ''),
(5, '', '', '', '', '', '', '', '', '', ''),
(6, 'CVT', 'Bitono', 'Piel con Detalles en Rojo', 'Deportivos - $24,000 MXN', 'Aluminio - $40,000 MXN', 'Deportivos - $20,000 MXN', 'Delanteros en Plastico, Laterales en Fibra de Carbono', 'En Arco', 'Luces Xenon', 'Luces Antiniebla'),
(7, 'Manual', 'Metalizado', 'Piel con Detalles en Rojo', 'Derrape', 'Fibra de Carbono', 'Silenciador', 'Laterales en Fibra de Carbono, Delanteros en Fibra de Carbono', 'GT', 'Luces Xenon', 'Luces Antiniebla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
