-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 21:38:21
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
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBM` int(15) NOT NULL,
  `titulo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `subtitulo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `autor` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `editorial` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagenPortada` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numEjemplaresTotales` int(15) NOT NULL,
  `numEjemplaresDisponibles` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBM`, `titulo`, `subtitulo`, `descripcion`, `autor`, `editorial`, `categoria`, `imagenPortada`, `numEjemplaresTotales`, `numEjemplaresDisponibles`) VALUES
(123, 'diego', 'subtitulo', 'descripcion', 'autor', 'editorial', 'categoria', 'imagenPortada', 123, 123),
(123423424, 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 'movilr6.jpg', 1233, 123412);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
