-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2020 a las 21:38:46
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
-- Estructura de tabla para la tabla `usuariolibro`
--

CREATE TABLE `usuariolibro` (
  `DNI` int(9) NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `poblacion` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariolibro`
--

INSERT INTO `usuariolibro` (`DNI`, `nombre`, `apellidos`, `poblacion`, `telefono`, `email`) VALUES
(45645612, 'diego', 'Garcia', 'garrucha', 546123138, 'diegocelerix@gmail.com'),
(2147483647, 'Javi', 'Te aprecio mucho', 'Apruebame plss', 546465464, 'javi@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuariolibro`
--
ALTER TABLE `usuariolibro`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
