-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-11-2023 a las 15:34:05
-- Versión del servidor: 8.0.34-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOC_DOCUMENTO`
--

CREATE TABLE `DOC_DOCUMENTO` (
  `DOC_ID` int NOT NULL,
  `DOC_NOMBRE` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `DOC_CODIGO` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `DOC_CONTENIDO` varchar(4000) COLLATE utf8mb4_general_ci NOT NULL,
  `DOC_ID_TIPO` int NOT NULL,
  `DOC_ID_PROCESO` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `DOC_DOCUMENTO`
--

INSERT INTO `DOC_DOCUMENTO` (`DOC_ID`, `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`) VALUES
(1, 'INSTRUCTIVO DE DESARROLLO', 'INS-ING-1', 'texto de prueba del contenido', 1, 1),
(7, 'INSTRUCTIVO DE DESARROLLO 2', 'INS-ING-2', 'texto de prueba del contenido 2', 1, 1),
(9, 'DOCUMENTO 365', 'DOC-RH-1', 'PRUEBA 365', 4, 4),
(14, 'PRUEBA 12', 'INS-ING-4', 'TEXTO 1212', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRO_PROCESO`
--

CREATE TABLE `PRO_PROCESO` (
  `PRO_ID` int NOT NULL,
  `PRO_PREFIJO` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `PRO_NOMBRE` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `PRO_PROCESO`
--

INSERT INTO `PRO_PROCESO` (`PRO_ID`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(1, 'ING', 'Ingenieria'),
(2, 'ADM', 'Administración'),
(3, 'OPR', 'Operación'),
(4, 'RH', 'Recursos humanos'),
(5, 'SEG', 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIP_TIPO_DOC`
--

CREATE TABLE `TIP_TIPO_DOC` (
  `TIP_ID` int NOT NULL,
  `TIP_NOMBRE` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `TIP_PREFIJO` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `TIP_TIPO_DOC`
--

INSERT INTO `TIP_TIPO_DOC` (`TIP_ID`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(1, 'Instructivo', 'INS'),
(2, 'Reglamento', 'REG'),
(3, 'Manual', 'MAN'),
(4, 'Documento', 'DOC'),
(5, 'Registro', 'REGS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `ID_USUARIO` int NOT NULL,
  `NOMBRE_USUARIO` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `CONTRASENA_USUARIO` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CONTRASENA_USUARIO`) VALUES
(1, 'usuario_prueba', 'ff960cb55673958c594d0daaab1e368651c75c02f9687192a1811e7b180336a7');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DOC_DOCUMENTO`
--
ALTER TABLE `DOC_DOCUMENTO`
  ADD PRIMARY KEY (`DOC_ID`),
  ADD KEY `DOC_TIPO` (`DOC_ID_TIPO`),
  ADD KEY `DOC_PROCESO` (`DOC_ID_PROCESO`);

--
-- Indices de la tabla `PRO_PROCESO`
--
ALTER TABLE `PRO_PROCESO`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indices de la tabla `TIP_TIPO_DOC`
--
ALTER TABLE `TIP_TIPO_DOC`
  ADD PRIMARY KEY (`TIP_ID`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DOC_DOCUMENTO`
--
ALTER TABLE `DOC_DOCUMENTO`
  MODIFY `DOC_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `PRO_PROCESO`
--
ALTER TABLE `PRO_PROCESO`
  MODIFY `PRO_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `TIP_TIPO_DOC`
--
ALTER TABLE `TIP_TIPO_DOC`
  MODIFY `TIP_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `ID_USUARIO` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `DOC_DOCUMENTO`
--
ALTER TABLE `DOC_DOCUMENTO`
  ADD CONSTRAINT `DOC_DOCUMENTO_ibfk_1` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `PRO_PROCESO` (`PRO_ID`),
  ADD CONSTRAINT `DOC_DOCUMENTO_ibfk_2` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `TIP_TIPO_DOC` (`TIP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
