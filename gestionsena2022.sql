-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2022 a las 00:24:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionsena2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `CodigoA` int(11) NOT NULL,
  `NombreA` varchar(60) DEFAULT NULL,
  `ApellidoA` varchar(60) DEFAULT NULL,
  `EmailA` varchar(70) DEFAULT NULL,
  `CodigoProg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`CodigoA`, `NombreA`, `ApellidoA`, `EmailA`, `CodigoProg`) VALUES
(1, 'Johanna', 'Cifuentes', 'Martinez@gmail.com', 2),
(3, 'Paola', 'Sanchez', 'sanchez@gmail.com', 4),
(4, 'Paola', 'Guativa', 'culj@gmail.com', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `Codigo` int(11) NOT NULL,
  `NombreP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`Codigo`, `NombreP`) VALUES
(2, 'TECNOLOGO DESARROLLO DE SISTEMAS DE INFORMACIÓN'),
(3, 'ANIMACIÓN DE VIDEO JUEGOS'),
(4, 'TECNICO DE SISTEMAS DE COMPUTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Codusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password1` varchar(50) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Codusuario`, `usuario`, `Email`, `Password1`, `Rol`) VALUES
(1, 'Tatiana', 'tata@gmail.com', 'Lucy28540464', 'aprendiz'),
(2, 'Leidy', 'ljcm@gmail.com', 'TATIANAMARTINEZ', 'aprendiz'),
(3, 'Leidys', 'leidy1@gmail.com', '123456789', 'aprendiz'),
(4, 'Carlos', 'c@gmail.com', 'Lucy28540464', 'instructor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`CodigoA`),
  ADD KEY `CodigoProg` (`CodigoProg`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Codusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `CodigoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Codusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`CodigoProg`) REFERENCES `programa` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
