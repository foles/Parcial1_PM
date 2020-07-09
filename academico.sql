-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2020 a las 19:42:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificador`
--

CREATE TABLE `identificador` (
  `id` int(5) NOT NULL,
  `ci` int(10) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `residencia` int(3) NOT NULL,
  `color` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `identificador`
--

INSERT INTO `identificador` (`id`, `ci`, `nombre_completo`, `fecha_nac`, `residencia`, `color`, `foto`) VALUES
(1, 9954953, 'Horacio Andres Flores Alberto', '1996-03-14', 1, 'rgba(8, 102, 20, 0.7)', 'https://images.unsplash.com/photo-1544435253-f0ead49638fa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&a'),
(2, 4561230, 'Emerson Callisaya Ajno', '1998-07-08', 2, 'rgba(204, 99, 0, 0.7)', 'https://images.unsplash.com/photo-1561055657-b9e0bf0fa360?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'),
(3, 7894560, 'Esther Mendoza Onofre', '1996-07-07', 3, 'rgba(8, 44, 102, 0.7)', 'https://images.unsplash.com/photo-1525879000488-bff3b1c387cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'),
(4, 4567890, 'Erick Moya Zarate', '1998-07-16', 1, 'Color', 'https://images.unsplash.com/photo-1543610892-0b1f7e6d8ac1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'),
(5, 1234560, 'Alberth Loza Chipana', '1998-10-15', 2, 'rgba(8, 102, 20, 0.7)', 'https://images.unsplash.com/photo-1572316787289-4d87404eea4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80'),
(6, 1237890, 'Angeles Villca Aguilar', '1999-02-04', 3, 'rgba(8, 102, 20, 0.7)', 'https://images.unsplash.com/photo-1570840934411-dcd8116cb41b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(3) NOT NULL,
  `ci` int(10) NOT NULL,
  `materia` varchar(25) NOT NULL,
  `nota` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `ci`, `materia`, `nota`) VALUES
(1, 9954953, 'INF-111', 90),
(2, 9954953, 'INF-113', 51),
(3, 9954953, 'INF-112', 50),
(5, 4567890, 'INF-121', 90),
(6, 4567890, 'INF-124', 35),
(7, 4567890, 'INF-131', 23),
(8, 4561230, 'INF-141', 55),
(9, 4561230, 'INF-144', 60),
(10, 4561230, 'INF-142', 87),
(11, 1234560, 'INF-151', 89),
(12, 1234560, 'INF-153', 90),
(13, 1234560, 'INF-156', 50),
(14, 7894560, 'INF-112', 51),
(15, 7894560, 'INF-131', 50),
(16, 7894560, 'INF-141', 49),
(17, 1237890, 'INF-166', 51),
(18, 1237890, 'INF-163', 80),
(19, 1237890, 'INF-162', 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `password`) VALUES
(1, 9954953, 12345),
(2, 4561230, 12345),
(3, 7894560, 12345),
(4, 4567890, 12345),
(5, 1234560, 12345),
(6, 1237890, 12345);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `identificador`
--
ALTER TABLE `identificador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `identificador`
--
ALTER TABLE `identificador`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
