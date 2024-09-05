-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2024 a las 22:28:47
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `grado` varchar(20) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `colegio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `grado`, `sexo`, `colegio_id`) VALUES
(1, 'Juan', 'Pérez', 'Primero Primaria', 'M', 1),
(2, 'María', 'García', 'Segundo Primaria', 'F', 1),
(3, 'Carlos', 'Rodríguez', 'Tercero Primaria', 'M', 1),
(4, 'Ana', 'López', 'Cuarto Primaria', 'F', 1),
(5, 'Luis', 'Martínez', 'Quinto Primaria', 'M', 1),
(6, 'Elena', 'González', 'Sexto Primaria', 'F', 1),
(7, 'Jorge', 'Hernández', 'Primero Primaria', 'M', 1),
(8, 'Lucía', 'Ramírez', 'Segundo Primaria', 'F', 1),
(9, 'Andrés', 'Torres', 'Tercero Primaria', 'M', 1),
(10, 'Isabel', 'Flores', 'Cuarto Primaria', 'F', 1),
(11, 'Diego', 'Vázquez', 'Quinto Primaria', 'M', 1),
(12, 'Carla', 'Castro', 'Sexto Primaria', 'F', 1),
(13, 'Ricardo', 'Mendoza', 'Primero Primaria', 'M', 1),
(14, 'Gabriela', 'Soto', 'Segundo Primaria', 'F', 1),
(15, 'Fernando', 'Morales', 'Tercero Primaria', 'M', 1),
(16, 'Sofía', 'Jiménez', 'Primero Primaria', 'F', 2),
(17, 'Mateo', 'Díaz', 'Segundo Primaria', 'M', 2),
(18, 'Paula', 'Ruiz', 'Tercero Primaria', 'F', 2),
(19, 'Miguel', 'Ortiz', 'Cuarto Primaria', 'M', 2),
(20, 'Valeria', 'Silva', 'Quinto Primaria', 'F', 2),
(21, 'David', 'Ramos', 'Sexto Primaria', 'M', 2),
(22, 'Martina', 'Chávez', 'Primero Primaria', 'F', 2),
(23, 'Samuel', 'Reyes', 'Segundo Primaria', 'M', 2),
(24, 'Daniela', 'Moreno', 'Tercero Primaria', 'F', 2),
(25, 'Álvaro', 'Muñoz', 'Cuarto Primaria', 'M', 2),
(26, 'Carmen', 'Romero', 'Quinto Primaria', 'F', 2),
(27, 'Pablo', 'Fernández', 'Sexto Primaria', 'M', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `nota_final` decimal(5,2) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `alumno_id`, `nota_final`, `curso_id`) VALUES
(6, 1, '85.50', 1),
(7, 1, '78.30', 2),
(8, 2, '90.00', 1),
(9, 2, '93.50', 3),
(10, 3, '88.70', 1),
(11, 3, '92.10', 4),
(12, 4, '79.00', 2),
(13, 4, '80.40', 3),
(14, 5, '91.20', 1),
(15, 5, '93.50', 4),
(16, 6, '91.90', 1),
(17, 7, '89.70', 3),
(18, 8, '93.40', 1),
(19, 8, '92.00', 2),
(20, 9, '85.30', 4),
(21, 10, '94.80', 1),
(22, 11, '87.50', 2),
(23, 12, '83.20', 3),
(24, 13, '93.10', 4),
(25, 14, '85.00', 1),
(26, 15, '90.00', 1),
(27, 16, '91.60', 1),
(28, 16, '92.30', 2),
(29, 17, '85.40', 3),
(30, 18, '90.90', 1),
(31, 18, '93.70', 4),
(32, 19, '88.10', 2),
(33, 20, '84.50', 1),
(34, 21, '81.00', 3),
(35, 22, '79.80', 1),
(36, 22, '89.00', 4),
(37, 23, '85.50', 1),
(38, 24, '92.30', 2),
(39, 25, '87.40', 4),
(40, 26, '90.00', 1),
(41, 27, '80.10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios`
--

CREATE TABLE `colegios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colegios`
--

INSERT INTO `colegios` (`id`, `nombre`) VALUES
(1, 'DEMO1'),
(2, 'DEMO2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`) VALUES
(1, 'Matemáticas'),
(2, 'Ciencias'),
(3, 'Historia'),
(4, 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`) VALUES
(1, 'Primero Primaria'),
(2, 'Segundo Primaria'),
(3, 'Tercero Primaria'),
(4, 'Cuarto Primaria'),
(5, 'Quinto Primaria'),
(6, 'Sexto Primaria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colegio_id` (`colegio_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `calificaciones_ibfk_1` (`alumno_id`);

--
-- Indices de la tabla `colegios`
--
ALTER TABLE `colegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `colegios`
--
ALTER TABLE `colegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`colegio_id`) REFERENCES `colegios` (`id`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
