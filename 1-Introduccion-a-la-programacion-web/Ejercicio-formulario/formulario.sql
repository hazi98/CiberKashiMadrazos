-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2020 a las 20:03:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal-info`
--

CREATE TABLE `personal-info` (
  `first-name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `middle-name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `last-name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `phone-number` int(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal-info`
--

INSERT INTO `personal-info` (`first-name`, `middle-name`, `last-name`, `age`, `gender`, `email`, `phone-number`, `id`) VALUES
('Yoltic', 'Garcia', 'Guzman', 21, 'Hombre', 'asd@asd.com', 12345678, 1),
('Comida', 'tortas', 'chilaquiles', 12, 'Hombre', 'croquetas@lomitos.com', 222222222, 2),
('Francisco', 'Lozada', 'Aguilar', 22, 'Hombre', 'chumpinampa@gmail.com', 11223344, 4),
('Sergio Iván', 'Alcázar', 'Becerra', 24, 'Hombre', 'ivan@gmail.com', 98765432, 7),
('xd', 'xd', 'xd', 33, 'Otro', 'xd@xd.com', 12121212, 8),
('Test', 'prueba', 'ensayo', 4, 'Hombre', 'test@test,com', 12345678, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping-cart`
--

CREATE TABLE `shipping-cart` (
  `units` int(3) NOT NULL,
  `shipping` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `envelope` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `shipping-cart`
--

INSERT INTO `shipping-cart` (`units`, `shipping`, `envelope`, `id`) VALUES
(5, 'General', NULL, 3),
(2, 'General', 'regalo', 4),
(2, 'General', 'regalo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping-info`
--

CREATE TABLE `shipping-info` (
  `address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `municipality` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `city-state` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `zip-code` int(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `shipping-info`
--

INSERT INTO `shipping-info` (`address`, `municipality`, `city-state`, `zip-code`, `id`) VALUES
('comida', 'engordativa', 'mexico', 34556, 3),
('comida', 'engordativa', 'mexico', 34556, 4),
('', '', '', 0, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal-info`
--
ALTER TABLE `personal-info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping-cart`
--
ALTER TABLE `shipping-cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping-info`
--
ALTER TABLE `shipping-info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal-info`
--
ALTER TABLE `personal-info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `shipping-cart`
--
ALTER TABLE `shipping-cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `shipping-info`
--
ALTER TABLE `shipping-info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
