-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-08-2021 a las 22:20:14
-- Versión del servidor: 10.4.18-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u909244473_practisoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(10) UNSIGNED NOT NULL,
  `id_actividad_plan_trabajo` int(10) UNSIGNED DEFAULT NULL,
  `fecha_actividad` date NOT NULL,
  `descripcion_actividad` text DEFAULT NULL,
  `horas_actividad` tinyint(4) NOT NULL,
  `estado_actividad` enum('En Espera','Aprobada','Reprobada') NOT NULL DEFAULT 'En Espera',
  `observaciones_actividad` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_plan_trabajo`
--

CREATE TABLE `actividades_plan_trabajo` (
  `id_actividad_plan_trabajo` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `descripcion_actividad_plan_trabajo` text NOT NULL,
  `numero_horas_actividad_plan_trabajo` smallint(4) UNSIGNED NOT NULL,
  `observacion` text DEFAULT NULL,
  `estado` enum('En Espera','Aprobada','Rechazada') NOT NULL DEFAULT 'En Espera'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id_convenio` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_expiracion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id_convenio`, `id_empresa`, `nombre_archivo`, `fecha_inicio`, `fecha_expiracion`) VALUES
(1, 1, 'Convenio_COSPAS.pdf', '2021-01-01', '2021-07-01'),
(3, 3, 'Convenio_Nissan.pdf', '2021-06-03', '2021-06-30'),
(4, 4, 'Convenio_Constructora Yadel.pdf', '2021-01-01', '2021-12-31'),
(9, 19, 'Convenio_SOFTECH.pdf', '2021-03-01', '2021-06-22'),
(10, 21, 'Convenio_D1.pdf', '2021-01-01', '2021-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

CREATE TABLE `coordinador` (
  `id_coordinador` int(10) UNSIGNED NOT NULL,
  `nombre_coordinador` varchar(50) NOT NULL,
  `correo_coordinador` varchar(50) NOT NULL,
  `codigo_coordinador` varchar(12) DEFAULT NULL,
  `celular_coordinador` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`id_coordinador`, `nombre_coordinador`, `correo_coordinador`, `codigo_coordinador`, `celular_coordinador`) VALUES
(26, 'Pilar Rodriguez', 'judithdelpilarrt@ufps.edu.co', '1151510', '3154879582');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_director` int(10) UNSIGNED NOT NULL,
  `nombre_director` varchar(50) NOT NULL,
  `correo_director` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id_director`, `nombre_director`, `correo_director`) VALUES
(2, 'Pilar Rodriguez', 'judithdelpilarrt@ufps.edu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_empresa`
--

CREATE TABLE `documentos_empresa` (
  `id_documentos_empresa` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED DEFAULT NULL,
  `archivo_protocolos_bio` varchar(120) DEFAULT NULL,
  `archivo_cc_representante` varchar(120) DEFAULT NULL,
  `archivo_certificado_existencia` varchar(120) DEFAULT NULL,
  `archivo_rut` varchar(120) DEFAULT NULL,
  `archivo_Pruebas` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos_empresa`
--

INSERT INTO `documentos_empresa` (`id_documentos_empresa`, `id_empresa`, `archivo_protocolos_bio`, `archivo_cc_representante`, `archivo_certificado_existencia`, `archivo_rut`, `archivo_Pruebas`) VALUES
(1, 1, 'protocolos_bio_COSPAS.pdf', 'cc_representante_COSPAS.pdf', 'certificado_existencia_COSPAS.pdf', 'rut_COSPAS.pdf', NULL),
(3, 3, 'protocolos_bio_Nissan.pdf', 'cc_representante_Nissan.pdf', 'certificado_existencia_Nissan.pdf', NULL, NULL),
(4, 4, 'protocolos_bio_Constructora Yadel.pdf', 'cc_representante_Constructora Yadel.pdf', 'certificado_existencia_Constructora Yadel.pdf', 'rut_Constructora Yadel.pdf', NULL),
(11, 19, 'protocolos_bio_SOFTECH.pdf', 'cc_representante_SOFTECH.pdf', 'certificado_existencia_SOFTECH.pdf', 'rut_SOFTECH.pdf', NULL),
(12, 21, 'protocolos_bio_D1.pdf', 'cc_representante_D1.pdf', 'certificado_existencia_D1.pdf', 'rut_D1.pdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_estudiante`
--

CREATE TABLE `documentos_estudiante` (
  `id_documentos_estudiantes` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED DEFAULT NULL,
  `archivo_carta_compromisoria` varchar(120) DEFAULT NULL,
  `archivo_informe_avance` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `representante_legal` varchar(50) NOT NULL,
  `nit_empresa` varchar(15) NOT NULL,
  `direccion_empresa` varchar(120) NOT NULL,
  `municipio_empresa` enum('Cucuta','Villa del Rosario','Los Patios') NOT NULL,
  `correo_empresa` varchar(50) NOT NULL,
  `celular_empresa` varchar(15) NOT NULL,
  `telefono_empresa` varchar(12) DEFAULT NULL,
  `sector_empresa` enum('Privado','Publico') NOT NULL,
  `actividad_empresa` varchar(100) DEFAULT NULL,
  `web_empresa` varchar(100) DEFAULT NULL,
  `clave_empresa` varchar(255) NOT NULL,
  `estado` enum('Inactivo','Activo') DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `representante_legal`, `nit_empresa`, `direccion_empresa`, `municipio_empresa`, `correo_empresa`, `celular_empresa`, `telefono_empresa`, `sector_empresa`, `actividad_empresa`, `web_empresa`, `clave_empresa`, `estado`, `fecha_registro`) VALUES
(1, 'COSPAS', 'Abimael Bacca', '36521422', 'Av 4 No 13-26 Barrio San Luis', 'Cucuta', 'noreplycospas@gmail.com', '311524547', '5753547', 'Publico', 'Religioso', 'http://www.google.com', '$2y$10$8PxmDEgBtkab.f5oxpbe8eP7WN4lAp7urTHm06uuKVlKgLrg/hzTG', 'Activo', '2021-06-09 21:59:33'),
(2, 'Ferreteria la económica', 'nancy adarme', '566666', 'Calle 14 B N°5E', 'Cucuta', '@gmail.com', '36989655222', '', 'Privado', 'Ferretería', '', '$2y$10$83RsD9xO7vhSb5SCRcvsfOQIt3j40Qtf33aMD1WxeVVULxYmfSMf6', 'Activo', '2021-06-09 21:59:33'),
(3, 'Nissan', 'Diego Navas', '34989348', 'Calle 28 T N° 14A', 'Cucuta', 'nissan@gmail.com', '3125563848', '57593839', 'Privado', 'Automovil', 'www.nissan.com', '$2y$10$uYpA92B5ht5b490CXMgkRerQnt4Jz4cX0Wli8LFdDKfmpSsxQAJRe', 'Activo', '2021-06-09 21:59:33'),
(4, 'Constructora Yadel', 'José Rodríguez', '123456789', 'Av 12E #15AN - 102 Colsag', 'Cucuta', 'yadel@mail.com', '3112365445', '5852020', 'Privado', 'Construccion', '', '$2y$10$Z5b55rZAUqhmAf80aSnVtO6W3e8NQv0DPhjgQwRVXq7zgDRuKAQ2m', 'Activo', '2021-06-09 21:59:33'),
(5, 'INCEL', 'German Barrera', '998745325', 'Calle 40 AN N°15 BE - 45', 'Cucuta', '@gmail.com', '5985236', '3125896325', 'Privado', 'Construccion', 'www.incel.com', '$2y$10$PKrkhbLkiNsqleVG12w/POIcAnjaPbJh.oiGYRlNz/3YsqlFR/n.S', NULL, '2021-06-13 15:44:36'),
(6, 'TNS', 'Alcira Roa', '88745214', 'Calle 25 AN N°15 BE - 45', 'Villa del Rosario', 'tns@gmail.com', '3125874747', '5825412', 'Privado', 'Tecnologia', 'www.tns.com', '$2y$10$gK83N36lqnQUXdU6n2GmEusR55XCKA/jD6gri8kofA3f9eMQudTly', NULL, '2021-06-13 16:26:22'),
(7, 'Distribuidora La Mejor', 'Carlos Gil', '88745147', 'Av 20C #12AN - 23', 'Villa del Rosario', 'distrilamejor@gmail.com', '3144789632', '5874123', 'Publico', 'Comercial', 'www.distrilamejor.com', '$2y$10$ULBiYyMKlGluZ0JwsmTbxe07JkwNwkzU1Itxz/QnuCK6a4KXOkYfe', NULL, '2021-06-13 16:28:17'),
(8, 'Aguas KPITAL', 'Sebastian Rodriguez', '87452140', 'Av 18R #12N - 10', 'Los Patios', 'aguaskpital@gmail.com', '3158745236', '5963201', 'Publico', 'Servicios', 'www.aguaskpital.com', '$2y$10$ryFEgX9P..iEFe9hjLz.zugWSDnm1kcTeI/M16IU.7aY4Vb5inan2', NULL, '2021-06-13 16:29:45'),
(9, 'Icopores SAS', 'Brayan Gomez', '84520258', 'Av 2E N°12A', 'Los Patios', 'icoporessas@gmail.com', '3165874123', '5284102', 'Privado', 'Industrial', 'www.icoporessas.com', '$2y$10$IQGoNKg5x7Ng11TnPKqmhOZyOwYzJyhQVxugsNvrkMqaJSyi9Ris6', NULL, '2021-06-13 16:31:48'),
(10, 'UFPS', 'Hector Miguel Parra', '9785214563', 'Av 1A N°20', 'Cucuta', 'ufps@ufps.edu.co', '3162558563', '5412360', 'Publico', 'Educativo', 'www.ufps.edu.co', '$2y$10$GB9scIYGUC2JyOZbR7Wt3.YYIJ1S2CqTpPxj73g1U5EOZRNGFRx3e', NULL, '2021-06-13 16:33:43'),
(11, 'Gnosoft', 'Carlos Ramirez', '99741547', 'Calle 15 N°3 - 32', 'Cucuta', 'gnosoft@gmail.com', '3125852', '5412352', 'Privado', 'Tecnologia', 'www.gnosoft.com', '$2y$10$GJMpDFcezHksgQsexrfS9OaewOjmGpFOK33VwlVNQV6L1pKmDBlIO', 'Activo', '2021-06-13 16:36:01'),
(19, 'SOFTECH', 'Jose Luis Gomez Hurtado', '99223355', 'Av 17E #18N -30 Colsag', 'Cucuta', 'andresdavidariza021298@gmail.com', '3132587414', '5741232', 'Privado', 'Tecnologia', 'softech.com', '$2y$10$EJEaDYmT9CMOOPMHJLdDZOmeI7ftsqzruY.SI4dBltwTdCZ/5oIDK', 'Activo', '2021-06-16 20:25:13'),
(21, 'D1', 'Pedro Fernandez', '1052054879', 'Calle 1055', 'Cucuta', '@gmail.com', '3125874520', '5925879', 'Privado', 'Comercial', 'www.d1.com', '$2y$10$gHgjS40WTEKNOb4uJCnQtewVmH4ajL/S0gKWnkXZcUkLt1bqp406m', 'Activo', '2021-07-29 17:11:06'),
(22, 'Punto & Fama', 'Lola', '983478439', 'Av Guaimaral', 'Cucuta', 'dieg9928.dn@gmail.com', '67378326783', '87379834798', 'Privado', 'Comercial', '', '$2y$10$7KBl/z4vOBXyn52O/SPYkuF2vlmOCn6ylBCkMHtaE53yMf13GWmRi', 'Activo', '2021-07-29 20:59:44'),
(23, 'Top Group', 'Andres Ariza', '55487526', 'Calle 41 AN N°12 BE - 48', 'Cucuta', 'madarme22@gmail.com', '3125784953', '5984520', 'Privado', 'Tecnologia', 'www.topgroup.com', '$2y$10$gqe.co/CcOir/PjHCgdzz.24Csliy.Hve/NZ9JjvO2HzUQFaCWZni', 'Activo', '2021-08-02 22:14:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_areas`
--

CREATE TABLE `encuesta_areas` (
  `id_encuesta_areas` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `area_desarrollo` enum('1','2','3','4','5') NOT NULL,
  `area_capacitacion` enum('1','2','3','4','5') NOT NULL,
  `area_mantenimiento` enum('1','2','3','4','5') NOT NULL,
  `area_servidores` enum('1','2','3','4','5') NOT NULL,
  `area_redes` enum('1','2','3','4','5') NOT NULL,
  `otro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED DEFAULT NULL,
  `id_tutor` int(10) UNSIGNED DEFAULT NULL,
  `id_grupo` int(10) UNSIGNED DEFAULT NULL,
  `nombre_estudiante` varchar(50) DEFAULT NULL,
  `codigo_estudiante` varchar(12) DEFAULT NULL,
  `correo_estudiante` varchar(50) NOT NULL,
  `celular_estudiante` varchar(15) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `id_empresa`, `id_tutor`, `id_grupo`, `nombre_estudiante`, `codigo_estudiante`, `correo_estudiante`, `celular_estudiante`, `fecha_registro`) VALUES
(99, NULL, NULL, 29, NULL, NULL, 'juanandrestr@ufps.edu.co', NULL, '2021-07-29 21:41:00'),
(100, NULL, NULL, 29, NULL, NULL, 'sebastiancg@ufps.edu.co', NULL, '2021-07-29 21:41:00'),
(101, NULL, NULL, 29, NULL, NULL, 'josealbertofh@ufps.edu.co', NULL, '2021-07-29 21:41:01'),
(102, NULL, NULL, 29, NULL, NULL, 'andresmanuelkj@ufps.edu.co', NULL, '2021-07-29 21:41:02'),
(103, NULL, NULL, 29, NULL, NULL, 'rodrigoalexanderjt@ufps.edu.co', NULL, '2021-07-29 21:41:03'),
(104, NULL, NULL, 29, NULL, NULL, 'alvarojavierht@ufps.edu.co', NULL, '2021-07-29 21:41:04'),
(105, NULL, NULL, 29, NULL, NULL, 'marcosjosedc@ufps.edu.co', NULL, '2021-07-29 21:41:05'),
(106, NULL, NULL, 29, NULL, NULL, 'adriansangiler@ufps.edu.co', NULL, '2021-07-29 21:41:06'),
(108, NULL, NULL, 29, NULL, NULL, 'madarme@ufps.edu.co', NULL, '2021-08-02 15:58:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  `id_coordinador` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nombre_grupo`, `id_coordinador`) VALUES
(29, 'Grupo A', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_documentos_empresa`
--

CREATE TABLE `historico_documentos_empresa` (
  `nombre_documento` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Inactivo','Activo') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historico_documentos_empresa`
--

INSERT INTO `historico_documentos_empresa` (`nombre_documento`, `estado`) VALUES
('archivo_cc_representante', 'Activo'),
('archivo_certificado_existencia', 'Activo'),
('archivo_protocolos_bio', 'Activo'),
('archivo_Pruebas', 'Activo'),
('archivo_rut', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_estudiante`
--

CREATE TABLE `historico_estudiante` (
  `id_historico` int(10) UNSIGNED NOT NULL,
  `nombre_estudiante` varchar(50) NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `funciones` text DEFAULT NULL,
  `fecha_estudiante` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historico_estudiante`
--

INSERT INTO `historico_estudiante` (`id_historico`, `nombre_estudiante`, `id_empresa`, `funciones`, `fecha_estudiante`) VALUES
(3, 'Andres David Ariza Caceres', 3, 'Desarrollo de Software,Administracion de Redes,Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Seguridad de Redes,Mantenimiento de Redes', '2021-05-13 17:46:42'),
(4, 'Juanito Gariza', 3, 'Desarrollo de Software, Capacitacion', '2021-05-21 05:00:00'),
(5, 'Andres Ariza', 6, 'Desarrollo de Software, Capacitacion', '2022-05-21 05:00:00'),
(6, 'Jorge Antonio', 6, 'Desarrollo de Software, Capacitacion', '2022-05-21 05:00:00'),
(7, 'Marco Antonio', 2, 'Mantenimiento de Hardware / Software, Capacitacion', '2021-05-21 05:00:00'),
(8, 'Pablo Peña', 2, 'Desarrollo de Software, Desarrollo Movil, Capacitacion, Mantenimiento de Hardware / Software', '2021-05-21 05:00:00'),
(13, 'Marco Antonio Adarme Jaimes', 1, 'Mantenimiento de Hardware/Software,data mining', '2021-05-27 23:35:22'),
(15, 'ANDRES DAVID ARIZA CACERES', 1, 'Mantenimiento de Hardware/Software,data mining', '2021-06-03 00:57:54'),
(16, 'ANDRES DAVID ARIZA CACERES', 3, 'Mantenimiento de Hardware/Software,Capacitacion,Servidores y Computacion en la nube', '2021-06-03 01:00:13'),
(25, 'Jorge Andrés Mojica Villamizar', 19, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software', '2021-06-16 20:35:53'),
(26, 'Jorge Andrés Mojica Villamizar', 21, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software,Gestión de Proyectos', '2021-07-29 21:48:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_solicitud`
--

CREATE TABLE `historico_solicitud` (
  `id_historico` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `funciones` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historico_solicitud`
--

INSERT INTO `historico_solicitud` (`id_historico`, `id_empresa`, `funciones`, `fecha`) VALUES
(1, 1, 'Desarrollo de Software Movil,Seguridad de Redes', '2021-05-27 20:50:59'),
(2, 1, 'Mantenimiento de Hardware/Software,data mining', '2021-06-03 00:57:54'),
(3, 3, 'Mantenimiento de Hardware/Software,Capacitacion,Servidores y Computacion en la nube', '2021-06-03 20:46:09'),
(4, 4, 'Desarrollo de Software de Escritorio,Diseño de Redes,Mantenimiento de Hardware/Software', '2021-06-10 00:02:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restablecimiento_clave`
--

CREATE TABLE `restablecimiento_clave` (
  `id_solicitud_restablecimiento` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `token` varchar(20) NOT NULL,
  `fecha_solicitud_restablecimiento` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restablecimiento_clave`
--

INSERT INTO `restablecimiento_clave` (`id_solicitud_restablecimiento`, `id_empresa`, `token`, `fecha_solicitud_restablecimiento`) VALUES
(6, 19, 'ac59976bc2f44af3', '2021-06-16 20:25:43'),
(7, 19, 'f4e970d6186e714e', '2021-07-28 21:34:11'),
(8, 19, '67395b1b1b246ee4', '2021-07-28 21:34:43'),
(9, 19, 'ce68e34ce39b5df7', '2021-07-28 21:36:37'),
(10, 1, '7acc299d455da9be', '2021-07-28 21:42:03'),
(11, 19, '3690d03e5a36bc38', '2021-07-28 21:45:26'),
(12, 19, '488670e19303c65a', '2021-07-28 21:58:14'),
(13, 19, '19bb69c12f6a9677', '2021-07-28 22:08:47'),
(14, 19, '356606c4bc1632ff', '2021-07-28 22:14:55'),
(15, 19, '8064d1d8252cae72', '2021-07-28 22:16:15'),
(16, 19, 'e17ca188e7f43e3e', '2021-07-29 14:06:52'),
(17, 19, 'ab2fa8417cbd2f20', '2021-07-29 17:04:16'),
(18, 5, '5d8167704714edb9', '2021-07-29 17:05:08'),
(19, 21, 'a5f495808dd01de9', '2021-07-29 20:11:30'),
(20, 21, '740e9480468bf81c', '2021-07-29 20:12:53'),
(21, 21, '7e857fa36e1cd085', '2021-07-29 20:21:29'),
(22, 21, '9b2cc62d72656a89', '2021-07-29 20:34:12'),
(23, 21, '754237de6da0a416', '2021-07-29 20:36:14'),
(24, 21, '821cb8c3072875ff', '2021-07-29 20:37:36'),
(25, 21, '3112c08790a712d3', '2021-07-29 20:39:02'),
(26, 21, 'e66c9900d34c20e7', '2021-07-29 20:45:24'),
(27, 21, '4afd722e459a0407', '2021-07-29 20:46:52'),
(28, 21, 'f6e1787a8db56c99', '2021-07-29 20:47:42'),
(29, 22, 'e02fe7a2438c1b70', '2021-07-29 21:00:41'),
(30, 21, 'cf5ede4d32d04b4b', '2021-07-29 21:27:21'),
(31, 21, '53ce8ac4f4041cde', '2021-08-02 15:43:31'),
(32, 21, 'd102c56335152171', '2021-08-02 16:52:54'),
(33, 21, 'c9d577afd9c2a7fe', '2021-08-02 17:01:39'),
(34, 21, '6ab5383fa78f9739', '2021-08-02 17:06:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(10) UNSIGNED NOT NULL,
  `nombre_semestre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nombre_semestre`) VALUES
(1, 'II Semestre del 2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `numero_practicantes` tinyint(4) NOT NULL,
  `funciones` text NOT NULL,
  `observaciones_solicitud` text DEFAULT NULL,
  `estado_solicitud` enum('Aprobada','En Espera','Rechazada') NOT NULL DEFAULT 'En Espera',
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_empresa`, `numero_practicantes`, `funciones`, `observaciones_solicitud`, `estado_solicitud`, `fecha_solicitud`) VALUES
(7, 3, 3, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software', 'Faltan Documentos', 'Rechazada', '2021-06-02 23:28:22'),
(8, 3, 2, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Seguridad de Redes,Diseño de Redes,Mantenimiento de Redes,Desarrollo de Software,Administracion de Redes,Gestión de Proyectos', NULL, 'Aprobada', '2021-06-03 22:02:21'),
(5025, 4, 1, 'Minería de Datos', NULL, 'Aprobada', '2021-06-09 21:27:44'),
(5028, 1, 3, 'Capacitacion,Gestión de Proyectos', NULL, 'Aprobada', '2021-06-11 23:22:47'),
(5029, 1, 2, 'Mantenimiento de Hardware/Software,Capacitacion,Gestión de Proyectos', NULL, 'Aprobada', '2021-06-12 00:33:57'),
(5031, 1, 1, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software', 'Falta información', 'Rechazada', '2021-06-12 16:42:20'),
(5032, 10, 1, 'Capacitacion', NULL, 'En Espera', '2021-06-13 16:48:58'),
(5033, 10, 2, 'Mantenimiento de Hardware/Software,Servidores y Computacion en la nube', NULL, 'En Espera', '2021-06-13 16:49:08'),
(5034, 6, 3, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software', 'No posee los documentos necesarios', 'Rechazada', '2021-06-13 16:49:20'),
(5035, 2, 3, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Seguridad de Redes,Diseño de Redes,Mantenimiento de Redes,Desarrollo de Software,Administracion de Redes', 'No posee los documentos necesarios', 'Rechazada', '2021-06-13 16:49:27'),
(5036, 7, 1, 'Gestión de Proyectos', 'No posee los documentos necesarios', 'Rechazada', '2021-06-13 16:49:37'),
(5037, 11, 4, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Seguridad de Redes,Diseño de Redes,Mantenimiento de Redes,Desarrollo de Software,Servidores y Computacion en la nube,Administracion de Redes', NULL, 'En Espera', '2021-06-13 16:49:49'),
(5038, 8, 2, 'Capacitacion,Gestión de Proyectos', 'No posee los documentos necesarios', 'Rechazada', '2021-06-13 16:50:00'),
(5039, 9, 3, 'Seguridad de Redes,Diseño de Redes,Mantenimiento de Redes,Capacitacion,Administracion de Redes', 'No posee los documentos necesarios', 'Rechazada', '2021-06-13 16:50:14'),
(5046, 19, 1, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software', NULL, 'Aprobada', '2021-06-16 20:28:07'),
(5047, 21, 1, 'Desarrollo de Software Movil,Desarrollo de Software Web,Desarrollo de Software de Escritorio,Desarrollo de Software,Gestión de Proyectos', NULL, 'Aprobada', '2021-07-29 21:06:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(10) UNSIGNED NOT NULL,
  `nombre_tutor` varchar(100) NOT NULL,
  `correo_tutor` varchar(100) NOT NULL,
  `celular_tutor` varchar(100) NOT NULL,
  `id_empresa` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `nombre_tutor`, `correo_tutor`, `celular_tutor`, `id_empresa`) VALUES
(1, 'Daniela Lindarte', 'daniela@cospas.com', '3112321333', 1),
(3, 'Jose Luis Rodriguez', 'joseluis@gmail.com', '3124849467', 3),
(4, 'Pedro Infante', 'pedroinfa@mail.com', '3112680232', 4),
(14, 'Abimael Bacca', 'abi@gmail.com', '3125256633', 19),
(15, 'José Gregorio Merlo', 'jgm@gmail.com', '3125874522', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_estudiante` (`id_actividad_plan_trabajo`) USING BTREE;

--
-- Indices de la tabla `actividades_plan_trabajo`
--
ALTER TABLE `actividades_plan_trabajo`
  ADD PRIMARY KEY (`id_actividad_plan_trabajo`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id_convenio`),
  ADD UNIQUE KEY `uq_id_empresa` (`id_empresa`);

--
-- Indices de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD PRIMARY KEY (`id_coordinador`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`);

--
-- Indices de la tabla `documentos_empresa`
--
ALTER TABLE `documentos_empresa`
  ADD PRIMARY KEY (`id_documentos_empresa`),
  ADD UNIQUE KEY `uq_id_empresa` (`id_empresa`);

--
-- Indices de la tabla `documentos_estudiante`
--
ALTER TABLE `documentos_estudiante`
  ADD PRIMARY KEY (`id_documentos_estudiantes`),
  ADD UNIQUE KEY `uq_id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `uq_nombre_empresa` (`nombre_empresa`);

--
-- Indices de la tabla `encuesta_areas`
--
ALTER TABLE `encuesta_areas`
  ADD PRIMARY KEY (`id_encuesta_areas`),
  ADD UNIQUE KEY `uq_id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD UNIQUE KEY `uq_correo_estudiante` (`correo_estudiante`),
  ADD UNIQUE KEY `uq_codigo_estudiante` (`codigo_estudiante`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_tutor` (`id_tutor`),
  ADD KEY `fk_estudiante_grupo` (`id_grupo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD UNIQUE KEY `uq_grupo` (`nombre_grupo`),
  ADD KEY `grupo_ibfk_1` (`id_coordinador`);

--
-- Indices de la tabla `historico_documentos_empresa`
--
ALTER TABLE `historico_documentos_empresa`
  ADD PRIMARY KEY (`nombre_documento`);

--
-- Indices de la tabla `historico_estudiante`
--
ALTER TABLE `historico_estudiante`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `fk_historico_empresa` (`id_empresa`);

--
-- Indices de la tabla `historico_solicitud`
--
ALTER TABLE `historico_solicitud`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indices de la tabla `restablecimiento_clave`
--
ALTER TABLE `restablecimiento_clave`
  ADD PRIMARY KEY (`id_solicitud_restablecimiento`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `actividades_plan_trabajo`
--
ALTER TABLE `actividades_plan_trabajo`
  MODIFY `id_actividad_plan_trabajo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id_convenio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  MODIFY `id_coordinador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `documentos_empresa`
--
ALTER TABLE `documentos_empresa`
  MODIFY `id_documentos_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `documentos_estudiante`
--
ALTER TABLE `documentos_estudiante`
  MODIFY `id_documentos_estudiantes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `encuesta_areas`
--
ALTER TABLE `encuesta_areas`
  MODIFY `id_encuesta_areas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `historico_estudiante`
--
ALTER TABLE `historico_estudiante`
  MODIFY `id_historico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `historico_solicitud`
--
ALTER TABLE `historico_solicitud`
  MODIFY `id_historico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `restablecimiento_clave`
--
ALTER TABLE `restablecimiento_clave`
  MODIFY `id_solicitud_restablecimiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5049;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_actividad_plan_trabajo`) REFERENCES `actividades_plan_trabajo` (`id_actividad_plan_trabajo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividades_plan_trabajo`
--
ALTER TABLE `actividades_plan_trabajo`
  ADD CONSTRAINT `actividades_plan_trabajo_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD CONSTRAINT `convenio_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `documentos_empresa`
--
ALTER TABLE `documentos_empresa`
  ADD CONSTRAINT `documentos_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `documentos_estudiante`
--
ALTER TABLE `documentos_estudiante`
  ADD CONSTRAINT `documentos_estudiante_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE;

--
-- Filtros para la tabla `encuesta_areas`
--
ALTER TABLE `encuesta_areas`
  ADD CONSTRAINT `encuesta_areas_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`),
  ADD CONSTRAINT `fk_estudiante_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_coordinador`) REFERENCES `coordinador` (`id_coordinador`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `historico_estudiante`
--
ALTER TABLE `historico_estudiante`
  ADD CONSTRAINT `fk_historico_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `restablecimiento_clave`
--
ALTER TABLE `restablecimiento_clave`
  ADD CONSTRAINT `restablecimiento_clave_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`u909244473_root`@`127.0.0.1` EVENT `auto_borrar` ON SCHEDULE EVERY 15 SECOND STARTS '2021-06-13 11:38:01' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM restablecimiento_clave WHERE now()>=DATE_ADD(fecha_solicitud_restablecimiento, INTERVAL 1 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
