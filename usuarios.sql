-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 19-06-2024 a las 05:33:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo_electronico` varchar(255) NOT NULL,
  `numero_identificacion` varchar(20) NOT NULL,
  `tipo_identificacion` varchar(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `madre_cabeza_hogar` varchar(5) DEFAULT NULL,
  `rango_edad_hijos` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `departamento_residencia` varchar(100) NOT NULL,
  `municipio_residencia` varchar(100) NOT NULL,
  `direccion_residencia` varchar(255) NOT NULL,
  `telefono_celular` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `grupo_etnico` varchar(100) NOT NULL,
  `grupo_sisben` varchar(100) NOT NULL,
  `discapacidad` varchar(10) NOT NULL,
  `tipo_discapacidad` varchar(100) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `victima_conflicto_armado` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo_electronico`, `numero_identificacion`, `tipo_identificacion`, `nombres`, `apellidos`, `sexo`, `madre_cabeza_hogar`, `rango_edad_hijos`, `fecha_nacimiento`, `departamento_residencia`, `municipio_residencia`, `direccion_residencia`, `telefono_celular`, `contrasena`, `grupo_etnico`, `grupo_sisben`, `discapacidad`, `tipo_discapacidad`, `estado_civil`, `victima_conflicto_armado`) VALUES
('jivalam@mailinator.com', 'Quaerat et aute id ', 'ti', 'Consequuntur omnis e', 'Natus dolore dolorib', 'femenino', 'no', '', '1977-03-07', 'putumayo', 'Minima reprehenderit', 'Dolore est non corp', '+1 (505) 903-5346', 'Pa$$w0rd!', 'pueblo_rrom_gitano', 'C11', 'si', 'desarollo', 'divorciado', 'no'),
('qevokyjo@mailinator.com', 'Amet quasi doloribu', 'rc', 'Sapiente cillum in u', 'Consequatur quibusd', 'femenino', 'si', '7-10', '1992-08-02', 'guaviare', 'Nobis dolore enim qu', 'Eum non culpa repel', '+1 (297) 745-8487', '$2y$10$wG1/TDReq2t38akIrn9JiuQd35dFEz948iL0vLJgLndczW/8rSRi6', 'ninguno', 'A4', 'si', '', 'divorciado', 'si'),
('xymyc@mailinator.com', 'Ducimus eum accusam', 'Pasaporte', 'Ut ad tempora qui qu', 'Voluptates rerum eni', 'masculino', '', '', '2012-03-14', 'amazonas', 'Excepturi et occaeca', 'Ea vero qui labore o', '+1 (595) 263-9155', '$2y$10$kOp0tTdRAkB8orzf78O8DeghgrHhnyLSB6g4H67JSuVR33C8n6cT.', 'pueblo_rrom_gitano', 'B4', 'no', '', 'soltero', 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo_electronico`,`numero_identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
