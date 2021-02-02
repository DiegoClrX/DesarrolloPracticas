-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 21:38:29
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `templos` int(10) NOT NULL,
  `cuarteles` int(10) NOT NULL,
  `aserraderos` int(10) NOT NULL,
  `canteras` int(10) NOT NULL,
  `huertos` int(10) NOT NULL,
  `mercados` int(10) NOT NULL,
  `oro` int(10) NOT NULL,
  `madera` int(10) NOT NULL,
  `marmol` int(10) NOT NULL,
  `comida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`nombre`, `usuario`, `templos`, `cuarteles`, `aserraderos`, `canteras`, `huertos`, `mercados`, `oro`, `madera`, `marmol`, `comida`) VALUES
('angy', 'tayler', 0, 0, 0, 0, 0, 0, 2000, 2000, 2000, 2000),
('diego', 'celerix', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
('partida1', 'usuario', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12),
('partida12', 'celerix', 12, 13, 12, 12, 12, 12, 343, 1857, 1857, 1816),
('partidaDiego', 'celerix', 0, 0, 0, 0, 0, 0, 2000, 2000, 2000, 2000),
('partidaMuestra', 'celerix', 0, 0, 0, 0, 0, 0, 2000, 2000, 2000, 2000),
('partidaPrueba', 'javi', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12),
('partidaValores', 'celerix', 123, 123, 123, 123, 123, 123, 123, 123, 123, 123),
('partidaYoutube', 'celerix', 0, 0, 0, 0, 0, 0, 2000, 2000, 2000, 2000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
