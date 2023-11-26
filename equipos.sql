-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 19:56:00
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
-- Base de datos: `equipos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `ID_equipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fundacion` int(11) NOT NULL,
  `partidos` int(11) NOT NULL,
  `victorias` int(11) NOT NULL,
  `empates` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_equipo`, `nombre`, `estado`, `fundacion`, `partidos`, `victorias`, `empates`, `derrotas`) VALUES
(1, 'Tampa Bay Buccaneers', 'florida', 1974, 12, 6, 2, 4),
(2, 'Kansas City Chiefs', 'kansas', 1959, 20, 10, 4, 6),
(3, 'Buffalo Bills', 'new york', 1960, 14, 9, 2, 3),
(4, 'Green Bay Packers', 'Wisconsin', 1919, 60, 36, 14, 10),
(5, 'New Orleans Saints', 'Louisiana', 1967, 26, 14, 6, 6),
(6, 'Baltimore Ravens', 'maryland', 1996, 16, 9, 2, 5),
(7, 'Cleveland Browns', 'ohio', 1965, 20, 12, 4, 4),
(8, 'Los Angeles Ram', 'Los angeles', 1936, 14, 10, 0, 4),
(9, 'Tennessee Titans', 'Tennessee', 1960, 20, 15, 0, 5),
(10, 'Seattle Seahawks', 'Washington', 1995, 20, 10, 4, 6),
(18, 'Washington F.T', 'Washington', 1965, 33, 21, 4, 8),
(23, 'Miami Dolphins', 'Florida', 1974, 29, 10, 4, 15),
(24, 'Chicago Bears', 'Illinois', 1920, 32, 15, 7, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `ID_jugador` int(11) NOT NULL,
  `ID_equipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `posicion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`ID_jugador`, `ID_equipo`, `nombre`, `apellido`, `numero`, `posicion`) VALUES
(1, 1, 'Mike', 'Evans', 13, 'wide receiver'),
(2, 1, 'Baker', 'Mayfield', 6, 'Quarterback'),
(3, 1, 'Shaquil', 'Barrett', 7, 'outside linebacker'),
(4, 1, 'Lavrotne', 'David', 54, 'linebacker'),
(5, 2, 'Kent', 'Beckman', 99, 'offensive tackle'),
(27, 2, 'Nick', 'Allegretti', 73, 'offensive guard'),
(28, 2, 'Harrison', 'Butker', 7, 'linebacker'),
(29, 2, 'Chamarri', 'Conner', 27, 'defensive back'),
(30, 3, 'Josh', 'Allen', 17, 'quarterback'),
(31, 3, 'Gabe', 'Davis', 13, 'wide receiver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `usuario`, `correo`, `contrasena`, `nombre`, `apellido`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$C2v65fek8NUKb3TiUIYLHeKY9kMp5Es6zr2axVoxennl99KYI.d5K', 'admin', 'admin'),
(9, 'test', 'test', '$2y$10$i.DRFsxO/0F6LvfMl1psfOhqBKIGcEWpGhugg8boinEMWlHxK9Thi', 'test', 'test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_equipo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`ID_jugador`),
  ADD KEY `jugador_equipo` (`ID_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugador_equipo` FOREIGN KEY (`ID_equipo`) REFERENCES `equipos` (`ID_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
