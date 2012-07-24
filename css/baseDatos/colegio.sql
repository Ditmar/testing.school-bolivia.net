-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 18-01-2012 a las 02:43:04
-- Versión del servidor: 5.0.41
-- Versión de PHP: 5.2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `colegio`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `administrador`
-- 

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `admin_id` int(11) NOT NULL auto_increment,
  `usuario` varchar(255) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  `ultima_sesion` datetime NOT NULL,
  `estado` enum('activo','inactivo') collate latin1_general_ci NOT NULL,
  `nombre` varchar(255) collate latin1_general_ci NOT NULL,
  `apellido` varchar(255) collate latin1_general_ci NOT NULL,
  `colegio_id` int(11) NOT NULL,
  `estadoImagen` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `administrador`
-- 

INSERT INTO `administrador` VALUES (1, 'admin', '123456', '2011-07-26 20:23:13', 'activo', 'Juan', 'Perez', 1, 'si');
INSERT INTO `administrador` VALUES (2, 'coleAdmin', '123456', '2011-10-09 18:56:33', 'activo', 'Julio', 'Martines', 2, 'no');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alumno`
-- 

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `alumno_id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) collate latin1_general_ci NOT NULL,
  `apellido` varchar(255) collate latin1_general_ci NOT NULL,
  `curso_id` int(11) NOT NULL,
  `usuario` varchar(255) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  `estado` enum('activo','inactivo') collate latin1_general_ci NOT NULL,
  `gestion` int(11) NOT NULL,
  `colegio_id` int(11) NOT NULL,
  `estadoImagen` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`alumno_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `alumno`
-- 

INSERT INTO `alumno` VALUES (1, 'kattY', 'ledezma', 12, 'kledezma', '123456', 'activo', 0, 1, 'si');
INSERT INTO `alumno` VALUES (2, 'carlos', 'ortiz', 1, 'cortiz', '123456', 'activo', 0, 1, 'no');
INSERT INTO `alumno` VALUES (3, 'maria', 'ochoa', 15, 'mochoa', '123456', 'activo', 0, 2, 'si');
INSERT INTO `alumno` VALUES (4, 'Luis', 'vargas', 19, 'Lvargas', 'Lvargas123', 'activo', 0, 2, 'no');
INSERT INTO `alumno` VALUES (5, 'cristian', 'garcia', 1, 'cgarcia', 'cgarcia123', 'activo', 0, 1, 'no');
INSERT INTO `alumno` VALUES (6, 'ana', 'sabedra', 12, 'asabedra', 'asabedra123', 'activo', 0, 1, 'no');
INSERT INTO `alumno` VALUES (7, 'carlos', 'claros', 1, 'cclaros', '123456', 'activo', 0, 1, 'no');
INSERT INTO `alumno` VALUES (8, 'fatima', 'alvarez', 1, 'faalvarez', '123456', 'activo', 0, 1, 'no');
INSERT INTO `alumno` VALUES (9, 'fatima', 'alvarez', 13, 'fatalvarez', 'fatalvarez123', 'activo', 0, 2, 'no');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `area`
-- 

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) collate latin1_general_ci NOT NULL,
  `nota_maxima` int(11) NOT NULL,
  `asignar_id` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

-- 
-- Volcar la base de datos para la tabla `area`
-- 

INSERT INTO `area` VALUES (1, 'Conocimientos', 60, 1, 1, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (2, 'DPS', 10, 1, 1, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (3, 'Conocimientos', 30, 1, 2, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (4, 'DPS', 10, 1, 2, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (5, 'Conocimientos', 60, 1, 3, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (6, 'DPS', 10, 1, 3, '2012-01-17 11:10:06');
INSERT INTO `area` VALUES (8, 'Conocimientos', 60, 2, 1, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (9, 'DPS', 10, 2, 1, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (10, 'Conocimientos', 60, 2, 2, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (11, 'DPS', 10, 2, 2, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (12, 'Conocimientos', 60, 2, 3, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (13, 'DPS', 10, 2, 3, '2012-01-17 20:55:10');
INSERT INTO `area` VALUES (14, 'Conocimientos', 60, 3, 1, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (15, 'DPS', 10, 3, 1, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (16, 'Conocimientos', 60, 3, 2, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (17, 'DPS', 10, 3, 2, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (18, 'Conocimientos', 60, 3, 3, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (19, 'DPS', 10, 3, 3, '2012-01-18 00:08:20');
INSERT INTO `area` VALUES (20, 'Conocimientos', 60, 4, 1, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (21, 'DPS', 10, 4, 1, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (22, 'Conocimientos', 60, 4, 2, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (23, 'DPS', 10, 4, 2, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (24, 'Conocimientos', 60, 4, 3, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (25, 'DPS', 10, 4, 3, '2012-01-18 00:29:37');
INSERT INTO `area` VALUES (26, 'Conocimientos', 60, 5, 1, '2012-01-18 00:33:11');
INSERT INTO `area` VALUES (27, 'DPS', 10, 5, 1, '2012-01-18 00:33:11');
INSERT INTO `area` VALUES (28, 'Conocimientos', 60, 5, 2, '2012-01-18 00:33:11');
INSERT INTO `area` VALUES (29, 'DPS', 10, 5, 2, '2012-01-18 00:33:11');
INSERT INTO `area` VALUES (30, 'Conocimientos', 60, 5, 3, '2012-01-18 00:33:11');
INSERT INTO `area` VALUES (31, 'DPS', 10, 5, 3, '2012-01-18 00:33:11');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `asignar_materia`
-- 

DROP TABLE IF EXISTS `asignar_materia`;
CREATE TABLE IF NOT EXISTS `asignar_materia` (
  `asignar_id` int(11) NOT NULL auto_increment,
  `curso_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  `colegio_id` int(11) NOT NULL,
  PRIMARY KEY  (`asignar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `asignar_materia`
-- 

INSERT INTO `asignar_materia` VALUES (1, 1, 1, 1, 2011, 1);
INSERT INTO `asignar_materia` VALUES (2, 1, 2, 6, 2011, 1);
INSERT INTO `asignar_materia` VALUES (3, 15, 5, 3, 2011, 2);
INSERT INTO `asignar_materia` VALUES (4, 1, 4, 2, 2011, 1);
INSERT INTO `asignar_materia` VALUES (5, 1, 3, 7, 2011, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `calendario`
-- 

DROP TABLE IF EXISTS `calendario`;
CREATE TABLE IF NOT EXISTS `calendario` (
  `calendario_id` int(11) NOT NULL auto_increment,
  `asignar_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text collate latin1_general_ci NOT NULL,
  `fecha_unix_stamp` bigint(20) NOT NULL,
  `dia` varchar(255) collate latin1_general_ci NOT NULL,
  `mes` varchar(255) collate latin1_general_ci NOT NULL,
  `anio` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`calendario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `calendario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `colegio`
-- 

DROP TABLE IF EXISTS `colegio`;
CREATE TABLE IF NOT EXISTS `colegio` (
  `colegio_id` int(11) NOT NULL auto_increment,
  `nota_maxima` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  `nombre_colegio` varchar(255) NOT NULL,
  `estadoImagen` varchar(255) NOT NULL,
  PRIMARY KEY  (`colegio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `colegio`
-- 

INSERT INTO `colegio` VALUES (1, 210, 2011, 'La salle', 'si');
INSERT INTO `colegio` VALUES (2, 60, 2011, 'Instituto americano', 'no');
INSERT INTO `colegio` VALUES (3, 20, 2011, 'Aleman', 'no');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `criterio_evaluacion`
-- 

DROP TABLE IF EXISTS `criterio_evaluacion`;
CREATE TABLE IF NOT EXISTS `criterio_evaluacion` (
  `criterio_id` int(11) NOT NULL auto_increment,
  `area_id` int(11) NOT NULL,
  `titulo` varchar(255) collate latin1_general_ci NOT NULL,
  `nota_maxCE` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`criterio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=83 ;

-- 
-- Volcar la base de datos para la tabla `criterio_evaluacion`
-- 

INSERT INTO `criterio_evaluacion` VALUES (1, 2, 'Responsabilidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (2, 2, 'Iniciativa', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (3, 2, 'Autoestima', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (4, 2, 'Solidaridad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (5, 2, 'Honestidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (6, 4, 'Responsabilidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (7, 4, 'Iniciativa', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (8, 4, 'Autoestima', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (9, 4, 'Solidaridad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (10, 4, 'Honestidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (11, 6, 'Responsabilidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (12, 6, 'Iniciativa', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (13, 6, 'Autoestima', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (14, 6, 'Solidaridad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (15, 6, 'Honestidad', 2, '2012-01-17 11:10:06');
INSERT INTO `criterio_evaluacion` VALUES (16, 1, 'practicas', 5, '2012-01-17 11:14:03');
INSERT INTO `criterio_evaluacion` VALUES (19, 5, 'pip', 6, '2012-01-17 11:32:44');
INSERT INTO `criterio_evaluacion` VALUES (18, 3, 'ssp', 8, '2012-01-17 11:14:36');
INSERT INTO `criterio_evaluacion` VALUES (21, 9, 'Responsabilidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (22, 9, 'Iniciativa', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (23, 9, 'Autoestima', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (24, 9, 'Solidaridad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (25, 9, 'Honestidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (26, 11, 'Responsabilidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (27, 11, 'Iniciativa', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (28, 11, 'Autoestima', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (29, 11, 'Solidaridad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (30, 11, 'Honestidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (31, 13, 'Responsabilidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (32, 13, 'Iniciativa', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (33, 13, 'Autoestima', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (34, 13, 'Solidaridad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (35, 13, 'Honestidad', 2, '2012-01-17 20:55:10');
INSERT INTO `criterio_evaluacion` VALUES (36, 15, 'Responsabilidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (37, 15, 'Iniciativa', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (38, 15, 'Autoestima', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (39, 15, 'Solidaridad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (40, 15, 'Honestidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (41, 17, 'Responsabilidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (42, 17, 'Iniciativa', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (43, 17, 'Autoestima', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (44, 17, 'Solidaridad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (45, 17, 'Honestidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (46, 19, 'Responsabilidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (47, 19, 'Iniciativa', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (48, 19, 'Autoestima', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (49, 19, 'Solidaridad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (50, 19, 'Honestidad', 2, '2012-01-18 00:08:20');
INSERT INTO `criterio_evaluacion` VALUES (51, 21, 'Responsabilidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (52, 21, 'Iniciativa', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (53, 21, 'Autoestima', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (54, 21, 'Solidaridad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (55, 21, 'Honestidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (56, 23, 'Responsabilidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (57, 23, 'Iniciativa', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (58, 23, 'Autoestima', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (59, 23, 'Solidaridad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (60, 23, 'Honestidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (61, 25, 'Responsabilidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (62, 25, 'Iniciativa', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (63, 25, 'Autoestima', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (64, 25, 'Solidaridad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (65, 25, 'Honestidad', 2, '2012-01-18 00:29:37');
INSERT INTO `criterio_evaluacion` VALUES (66, 20, 'pruebas', 5, '2012-01-18 00:30:15');
INSERT INTO `criterio_evaluacion` VALUES (67, 20, 'practicas', 12, '2012-01-18 00:30:28');
INSERT INTO `criterio_evaluacion` VALUES (68, 27, 'Responsabilidad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (69, 27, 'Iniciativa', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (70, 27, 'Autoestima', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (71, 27, 'Solidaridad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (72, 27, 'Honestidad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (73, 29, 'Responsabilidad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (74, 29, 'Iniciativa', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (75, 29, 'Autoestima', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (76, 29, 'Solidaridad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (77, 29, 'Honestidad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (78, 31, 'Responsabilidad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (79, 31, 'Iniciativa', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (80, 31, 'Autoestima', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (81, 31, 'Solidaridad', 2, '2012-01-18 00:33:11');
INSERT INTO `criterio_evaluacion` VALUES (82, 31, 'Honestidad', 2, '2012-01-18 00:33:11');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `curso`
-- 

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `curso_id` int(11) NOT NULL auto_increment,
  `nombre_curso` varchar(255) collate latin1_general_ci NOT NULL,
  `nivel` varchar(255) collate latin1_general_ci NOT NULL,
  `nombre_completo` varchar(255) collate latin1_general_ci NOT NULL,
  `colegio_id` int(11) NOT NULL,
  PRIMARY KEY  (`curso_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

-- 
-- Volcar la base de datos para la tabla `curso`
-- 

INSERT INTO `curso` VALUES (1, '1 basico azul', '1', 'azul', 1);
INSERT INTO `curso` VALUES (2, '2 basico azul', '2', 'azul', 1);
INSERT INTO `curso` VALUES (3, '3 basico azul', '3', 'azul', 1);
INSERT INTO `curso` VALUES (4, '4 basico azul', '4', 'azul', 1);
INSERT INTO `curso` VALUES (5, '5 basico azul', '5', 'azul', 1);
INSERT INTO `curso` VALUES (6, '6 primaria azul', '6', 'azul', 1);
INSERT INTO `curso` VALUES (7, '7 primaria azul', '7', 'azul', 1);
INSERT INTO `curso` VALUES (8, '8 primaria azul', '8', 'azul', 1);
INSERT INTO `curso` VALUES (9, ' 1 secundaria azul', '9', 'azul', 1);
INSERT INTO `curso` VALUES (10, ' 2 secundaria azul', '10', 'azul', 1);
INSERT INTO `curso` VALUES (11, ' 3 secundaria azul', '11', 'azul', 1);
INSERT INTO `curso` VALUES (12, ' 4 secundaria azul', '12', 'azul', 1);
INSERT INTO `curso` VALUES (13, '1 basico blanco', '1', 'blanco', 2);
INSERT INTO `curso` VALUES (14, '2 basico blanco', '2', 'blanco', 2);
INSERT INTO `curso` VALUES (15, '3 basico blanco', '3', 'blanco', 2);
INSERT INTO `curso` VALUES (16, '4 basico blanco', '4', 'blanco', 2);
INSERT INTO `curso` VALUES (17, '5 basico blanco', '5', 'blanco', 2);
INSERT INTO `curso` VALUES (18, '6 primaria blanco', '6', 'blanco', 2);
INSERT INTO `curso` VALUES (19, '7 primaria blanco', '7', 'blanco', 2);
INSERT INTO `curso` VALUES (20, '8 primaria blanco', '8', 'blanco', 2);
INSERT INTO `curso` VALUES (21, ' 1 secundaria blanco', '9', 'blanco', 2);
INSERT INTO `curso` VALUES (22, ' 2 secundaria blanco', '10', 'blanco', 2);
INSERT INTO `curso` VALUES (23, ' 3 secundaria blanco', '11', 'blanco', 2);
INSERT INTO `curso` VALUES (24, ' 4 secundaria blanco', '12', 'blanco', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `documentos`
-- 

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `documento_id` int(11) NOT NULL auto_increment,
  `asignar_id` int(11) NOT NULL,
  `nombre_documento` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`documento_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `documentos`
-- 

INSERT INTO `documentos` VALUES (1, 1, 'doc.docx');
INSERT INTO `documentos` VALUES (2, 5, 'doc1.docx');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `inscripcion`
-- 

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `inscripcion_id` int(11) NOT NULL auto_increment,
  `alumno_id` int(11) NOT NULL,
  `asignar_id` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  PRIMARY KEY  (`inscripcion_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `inscripcion`
-- 

INSERT INTO `inscripcion` VALUES (1, 2, 1, 2011);
INSERT INTO `inscripcion` VALUES (2, 5, 1, 2011);
INSERT INTO `inscripcion` VALUES (3, 7, 1, 2011);
INSERT INTO `inscripcion` VALUES (4, 8, 1, 2011);
INSERT INTO `inscripcion` VALUES (5, 2, 2, 2011);
INSERT INTO `inscripcion` VALUES (6, 5, 2, 2011);
INSERT INTO `inscripcion` VALUES (7, 7, 2, 2011);
INSERT INTO `inscripcion` VALUES (8, 8, 2, 2011);
INSERT INTO `inscripcion` VALUES (9, 3, 3, 2011);
INSERT INTO `inscripcion` VALUES (10, 2, 4, 2011);
INSERT INTO `inscripcion` VALUES (11, 5, 4, 2011);
INSERT INTO `inscripcion` VALUES (12, 7, 4, 2011);
INSERT INTO `inscripcion` VALUES (13, 8, 4, 2011);
INSERT INTO `inscripcion` VALUES (14, 2, 5, 2011);
INSERT INTO `inscripcion` VALUES (15, 5, 5, 2011);
INSERT INTO `inscripcion` VALUES (16, 7, 5, 2011);
INSERT INTO `inscripcion` VALUES (17, 8, 5, 2011);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `libreta`
-- 

DROP TABLE IF EXISTS `libreta`;
CREATE TABLE IF NOT EXISTS `libreta` (
  `libreta_id` int(11) NOT NULL auto_increment,
  `alumno_id` int(11) NOT NULL,
  `asignar_id` int(11) NOT NULL,
  `areas` varchar(255) collate latin1_general_ci default NULL,
  `conocimientosT1` int(11) default NULL,
  `DPS_T1` int(11) default NULL,
  `puntaje_trimestralT1` int(11) default NULL,
  `conocimientosT2` int(11) default NULL,
  `DPS_T2` int(11) default NULL,
  `puntaje_trimestralT2` int(11) default NULL,
  `conocimientosT3` int(11) default NULL,
  `DPS_T3` int(11) default NULL,
  `puntaje_trimestralT3` int(11) default NULL,
  `promedio_anual` int(11) default NULL,
  PRIMARY KEY  (`libreta_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `libreta`
-- 

INSERT INTO `libreta` VALUES (1, 2, 1, 'Matematicas', 5, 9, 14, 7, 2, 9, 6, 3, 9, 11);
INSERT INTO `libreta` VALUES (2, 2, 4, 'Quimica', 5, 4, 9, 0, 2, 2, 0, 3, 3, 5);
INSERT INTO `libreta` VALUES (3, 2, 5, 'sociales', 0, 2, 2, 0, 1, 1, 0, 0, 0, 1);
INSERT INTO `libreta` VALUES (4, 5, 1, 'Matematicas', 0, 2, 2, 0, 2, 2, 5, 1, 6, 3);
INSERT INTO `libreta` VALUES (5, 5, 4, 'Quimica', 4, 3, 7, 0, 4, 4, 0, 3, 3, 5);
INSERT INTO `libreta` VALUES (6, 5, 5, 'sociales', 0, 2, 2, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `libreta` VALUES (7, 7, 1, 'Matematicas', 0, 1, 1, 2, 0, 2, 0, 1, 1, 1);
INSERT INTO `libreta` VALUES (8, 7, 4, 'Quimica', 3, 4, 7, 0, 4, 4, 0, 3, 3, 5);
INSERT INTO `libreta` VALUES (9, 7, 5, 'sociales', 0, 2, 2, 0, 0, 0, 0, 1, 1, 1);
INSERT INTO `libreta` VALUES (10, 8, 1, 'Matematicas', 1, 0, 1, 0, 2, 2, 0, 1, 1, 1);
INSERT INTO `libreta` VALUES (11, 8, 4, 'Quimica', 2, 6, 8, 0, 2, 2, 0, 4, 4, 5);
INSERT INTO `libreta` VALUES (12, 8, 5, 'sociales', 0, 2, 2, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `materia`
-- 

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `materia_id` int(11) NOT NULL auto_increment,
  `nombre_materia` varchar(255) collate latin1_general_ci NOT NULL,
  `colegio_id` int(11) NOT NULL,
  PRIMARY KEY  (`materia_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `materia`
-- 

INSERT INTO `materia` VALUES (1, 'Matematicas', 1);
INSERT INTO `materia` VALUES (2, 'artes plasticas', 1);
INSERT INTO `materia` VALUES (3, 'sociales', 1);
INSERT INTO `materia` VALUES (4, 'Quimica', 1);
INSERT INTO `materia` VALUES (5, 'musica', 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `nota`
-- 

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `nota_id` int(11) NOT NULL auto_increment,
  `criterio_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  PRIMARY KEY  (`nota_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=66 ;

-- 
-- Volcar la base de datos para la tabla `nota`
-- 

INSERT INTO `nota` VALUES (1, 1, 2, 1, 1, 1);
INSERT INTO `nota` VALUES (2, 2, 5, 1, 2, 1);
INSERT INTO `nota` VALUES (3, 3, 7, 1, 1, 1);
INSERT INTO `nota` VALUES (4, 6, 2, 1, 2, 2);
INSERT INTO `nota` VALUES (5, 7, 5, 1, 2, 2);
INSERT INTO `nota` VALUES (6, 8, 8, 1, 2, 2);
INSERT INTO `nota` VALUES (7, 11, 2, 1, 1, 3);
INSERT INTO `nota` VALUES (8, 13, 7, 1, 1, 3);
INSERT INTO `nota` VALUES (9, 16, 2, 1, 5, 1);
INSERT INTO `nota` VALUES (11, 16, 8, 1, 1, 1);
INSERT INTO `nota` VALUES (12, 18, 7, 1, 2, 2);
INSERT INTO `nota` VALUES (13, 12, 5, 1, 1, 3);
INSERT INTO `nota` VALUES (14, 12, 8, 1, 1, 3);
INSERT INTO `nota` VALUES (15, 19, 5, 1, 5, 3);
INSERT INTO `nota` VALUES (16, 12, 2, 1, 1, 3);
INSERT INTO `nota` VALUES (17, 13, 2, 1, 1, 3);
INSERT INTO `nota` VALUES (21, 19, 2, 1, 6, 3);
INSERT INTO `nota` VALUES (20, 18, 2, 1, 7, 2);
INSERT INTO `nota` VALUES (22, 2, 2, 1, 2, 1);
INSERT INTO `nota` VALUES (23, 3, 2, 1, 2, 1);
INSERT INTO `nota` VALUES (24, 4, 2, 1, 2, 1);
INSERT INTO `nota` VALUES (25, 5, 2, 1, 2, 1);
INSERT INTO `nota` VALUES (26, 37, 3, 3, 2, 1);
INSERT INTO `nota` VALUES (27, 38, 3, 3, 2, 1);
INSERT INTO `nota` VALUES (28, 39, 3, 3, 2, 1);
INSERT INTO `nota` VALUES (29, 42, 3, 3, 2, 2);
INSERT INTO `nota` VALUES (30, 43, 3, 3, 2, 2);
INSERT INTO `nota` VALUES (31, 47, 3, 3, 2, 3);
INSERT INTO `nota` VALUES (32, 54, 2, 4, 2, 1);
INSERT INTO `nota` VALUES (33, 55, 2, 4, 2, 1);
INSERT INTO `nota` VALUES (34, 66, 2, 4, 5, 1);
INSERT INTO `nota` VALUES (35, 52, 5, 4, 1, 1);
INSERT INTO `nota` VALUES (36, 53, 5, 4, 2, 1);
INSERT INTO `nota` VALUES (37, 67, 5, 4, 4, 1);
INSERT INTO `nota` VALUES (38, 52, 7, 4, 2, 1);
INSERT INTO `nota` VALUES (39, 53, 7, 4, 2, 1);
INSERT INTO `nota` VALUES (40, 66, 7, 4, 3, 1);
INSERT INTO `nota` VALUES (41, 51, 8, 4, 2, 1);
INSERT INTO `nota` VALUES (42, 52, 8, 4, 2, 1);
INSERT INTO `nota` VALUES (43, 53, 8, 4, 2, 1);
INSERT INTO `nota` VALUES (44, 67, 8, 4, 2, 1);
INSERT INTO `nota` VALUES (45, 57, 2, 4, 2, 2);
INSERT INTO `nota` VALUES (46, 56, 5, 4, 2, 2);
INSERT INTO `nota` VALUES (47, 59, 5, 4, 2, 2);
INSERT INTO `nota` VALUES (48, 57, 7, 4, 2, 2);
INSERT INTO `nota` VALUES (49, 58, 7, 4, 2, 2);
INSERT INTO `nota` VALUES (50, 56, 8, 4, 2, 2);
INSERT INTO `nota` VALUES (51, 62, 2, 4, 2, 3);
INSERT INTO `nota` VALUES (52, 65, 2, 4, 1, 3);
INSERT INTO `nota` VALUES (53, 63, 5, 4, 2, 3);
INSERT INTO `nota` VALUES (54, 64, 5, 4, 1, 3);
INSERT INTO `nota` VALUES (55, 63, 7, 4, 1, 3);
INSERT INTO `nota` VALUES (56, 64, 7, 4, 2, 3);
INSERT INTO `nota` VALUES (57, 61, 8, 4, 1, 3);
INSERT INTO `nota` VALUES (58, 62, 8, 4, 1, 3);
INSERT INTO `nota` VALUES (59, 65, 8, 4, 2, 3);
INSERT INTO `nota` VALUES (60, 69, 2, 5, 2, 1);
INSERT INTO `nota` VALUES (61, 70, 5, 5, 2, 1);
INSERT INTO `nota` VALUES (62, 71, 7, 5, 2, 1);
INSERT INTO `nota` VALUES (63, 72, 8, 5, 2, 1);
INSERT INTO `nota` VALUES (64, 73, 2, 5, 1, 2);
INSERT INTO `nota` VALUES (65, 79, 7, 5, 1, 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `profesor`
-- 

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `profesor_id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) collate latin1_general_ci NOT NULL,
  `apellido` varchar(255) collate latin1_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `usuario` varchar(255) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  `estado` enum('activo','inactivo') collate latin1_general_ci NOT NULL,
  `colegio_id` int(11) NOT NULL,
  `estadoImagen` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`profesor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `profesor`
-- 

INSERT INTO `profesor` VALUES (1, 'marcelo', 'tinelli', '2004-02-04', 'mtinelli', 'marcelino', 'activo', 1, 'si');
INSERT INTO `profesor` VALUES (2, 'cecilia', 'villegas', '2005-08-23', 'cvillegas', '123456', 'activo', 1, 'no');
INSERT INTO `profesor` VALUES (3, 'Mario', 'Perez', '2007-11-13', 'MPerez', '123456', 'activo', 2, 'no');
INSERT INTO `profesor` VALUES (4, 'marta', 'vega', '2003-03-20', 'mvega', 'mvega123', 'activo', 2, 'no');
INSERT INTO `profesor` VALUES (5, 'claudia', 'rivera', '2011-08-25', 'crivera', 'crivera123', 'activo', 1, 'no');
INSERT INTO `profesor` VALUES (6, 'mario', 'gonsales', '2011-07-03', 'mgonsales', 'mgonsales123', 'activo', 1, 'no');
INSERT INTO `profesor` VALUES (7, 'fatima', 'alvarez', '1980-03-05', 'falvarez', '123456', 'activo', 1, 'no');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `promedio_area`
-- 

DROP TABLE IF EXISTS `promedio_area`;
CREATE TABLE IF NOT EXISTS `promedio_area` (
  `promedio_id` int(11) NOT NULL auto_increment,
  `area_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY  (`promedio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=83 ;

-- 
-- Volcar la base de datos para la tabla `promedio_area`
-- 

INSERT INTO `promedio_area` VALUES (1, 1, 2, 5);
INSERT INTO `promedio_area` VALUES (2, 1, 5, 0);
INSERT INTO `promedio_area` VALUES (3, 1, 7, 0);
INSERT INTO `promedio_area` VALUES (4, 1, 8, 1);
INSERT INTO `promedio_area` VALUES (5, 2, 2, 9);
INSERT INTO `promedio_area` VALUES (6, 2, 5, 2);
INSERT INTO `promedio_area` VALUES (7, 2, 7, 1);
INSERT INTO `promedio_area` VALUES (8, 2, 8, 0);
INSERT INTO `promedio_area` VALUES (9, 3, 2, 7);
INSERT INTO `promedio_area` VALUES (10, 3, 5, 0);
INSERT INTO `promedio_area` VALUES (11, 3, 7, 2);
INSERT INTO `promedio_area` VALUES (12, 3, 8, 0);
INSERT INTO `promedio_area` VALUES (13, 4, 2, 2);
INSERT INTO `promedio_area` VALUES (14, 4, 5, 2);
INSERT INTO `promedio_area` VALUES (15, 4, 7, 0);
INSERT INTO `promedio_area` VALUES (16, 4, 8, 2);
INSERT INTO `promedio_area` VALUES (17, 5, 2, 6);
INSERT INTO `promedio_area` VALUES (18, 5, 5, 5);
INSERT INTO `promedio_area` VALUES (19, 5, 7, 0);
INSERT INTO `promedio_area` VALUES (20, 5, 8, 0);
INSERT INTO `promedio_area` VALUES (21, 6, 2, 3);
INSERT INTO `promedio_area` VALUES (22, 6, 5, 1);
INSERT INTO `promedio_area` VALUES (23, 6, 7, 1);
INSERT INTO `promedio_area` VALUES (24, 6, 8, 1);
INSERT INTO `promedio_area` VALUES (25, 7, 2, 3);
INSERT INTO `promedio_area` VALUES (26, 7, 5, 0);
INSERT INTO `promedio_area` VALUES (27, 7, 7, 1);
INSERT INTO `promedio_area` VALUES (28, 7, 8, 0);
INSERT INTO `promedio_area` VALUES (29, 14, 3, 0);
INSERT INTO `promedio_area` VALUES (30, 15, 3, 6);
INSERT INTO `promedio_area` VALUES (31, 16, 3, 0);
INSERT INTO `promedio_area` VALUES (32, 17, 3, 4);
INSERT INTO `promedio_area` VALUES (33, 18, 3, 0);
INSERT INTO `promedio_area` VALUES (34, 19, 3, 2);
INSERT INTO `promedio_area` VALUES (35, 20, 2, 5);
INSERT INTO `promedio_area` VALUES (36, 20, 5, 4);
INSERT INTO `promedio_area` VALUES (37, 20, 7, 3);
INSERT INTO `promedio_area` VALUES (38, 20, 8, 2);
INSERT INTO `promedio_area` VALUES (39, 21, 2, 4);
INSERT INTO `promedio_area` VALUES (40, 21, 5, 3);
INSERT INTO `promedio_area` VALUES (41, 21, 7, 4);
INSERT INTO `promedio_area` VALUES (42, 21, 8, 6);
INSERT INTO `promedio_area` VALUES (43, 22, 2, 0);
INSERT INTO `promedio_area` VALUES (44, 22, 5, 0);
INSERT INTO `promedio_area` VALUES (45, 22, 7, 0);
INSERT INTO `promedio_area` VALUES (46, 22, 8, 0);
INSERT INTO `promedio_area` VALUES (47, 23, 2, 2);
INSERT INTO `promedio_area` VALUES (48, 23, 5, 4);
INSERT INTO `promedio_area` VALUES (49, 23, 7, 4);
INSERT INTO `promedio_area` VALUES (50, 23, 8, 2);
INSERT INTO `promedio_area` VALUES (51, 24, 2, 0);
INSERT INTO `promedio_area` VALUES (52, 24, 5, 0);
INSERT INTO `promedio_area` VALUES (53, 24, 7, 0);
INSERT INTO `promedio_area` VALUES (54, 24, 8, 0);
INSERT INTO `promedio_area` VALUES (55, 25, 2, 3);
INSERT INTO `promedio_area` VALUES (56, 25, 5, 3);
INSERT INTO `promedio_area` VALUES (57, 25, 7, 3);
INSERT INTO `promedio_area` VALUES (58, 25, 8, 4);
INSERT INTO `promedio_area` VALUES (59, 26, 2, 0);
INSERT INTO `promedio_area` VALUES (60, 26, 5, 0);
INSERT INTO `promedio_area` VALUES (61, 26, 7, 0);
INSERT INTO `promedio_area` VALUES (62, 26, 8, 0);
INSERT INTO `promedio_area` VALUES (63, 27, 2, 2);
INSERT INTO `promedio_area` VALUES (64, 27, 5, 2);
INSERT INTO `promedio_area` VALUES (65, 27, 7, 2);
INSERT INTO `promedio_area` VALUES (66, 27, 8, 2);
INSERT INTO `promedio_area` VALUES (67, 28, 2, 0);
INSERT INTO `promedio_area` VALUES (68, 28, 5, 0);
INSERT INTO `promedio_area` VALUES (69, 28, 7, 0);
INSERT INTO `promedio_area` VALUES (70, 28, 8, 0);
INSERT INTO `promedio_area` VALUES (71, 29, 2, 1);
INSERT INTO `promedio_area` VALUES (72, 29, 5, 0);
INSERT INTO `promedio_area` VALUES (73, 29, 7, 0);
INSERT INTO `promedio_area` VALUES (74, 29, 8, 0);
INSERT INTO `promedio_area` VALUES (75, 30, 2, 0);
INSERT INTO `promedio_area` VALUES (76, 30, 5, 0);
INSERT INTO `promedio_area` VALUES (77, 30, 7, 0);
INSERT INTO `promedio_area` VALUES (78, 30, 8, 0);
INSERT INTO `promedio_area` VALUES (79, 31, 2, 0);
INSERT INTO `promedio_area` VALUES (80, 31, 5, 0);
INSERT INTO `promedio_area` VALUES (81, 31, 7, 1);
INSERT INTO `promedio_area` VALUES (82, 31, 8, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `promedio_materia`
-- 

DROP TABLE IF EXISTS `promedio_materia`;
CREATE TABLE IF NOT EXISTS `promedio_materia` (
  `promMa_id` int(11) NOT NULL auto_increment,
  `asignar_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  PRIMARY KEY  (`promMa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

-- 
-- Volcar la base de datos para la tabla `promedio_materia`
-- 

INSERT INTO `promedio_materia` VALUES (1, 1, 2, 14, 1);
INSERT INTO `promedio_materia` VALUES (2, 1, 5, 2, 1);
INSERT INTO `promedio_materia` VALUES (3, 1, 7, 1, 1);
INSERT INTO `promedio_materia` VALUES (4, 1, 8, 1, 1);
INSERT INTO `promedio_materia` VALUES (5, 1, 2, 9, 2);
INSERT INTO `promedio_materia` VALUES (6, 1, 5, 2, 2);
INSERT INTO `promedio_materia` VALUES (7, 1, 7, 2, 2);
INSERT INTO `promedio_materia` VALUES (8, 1, 8, 2, 2);
INSERT INTO `promedio_materia` VALUES (9, 1, 2, 9, 3);
INSERT INTO `promedio_materia` VALUES (10, 1, 5, 6, 3);
INSERT INTO `promedio_materia` VALUES (11, 1, 7, 1, 3);
INSERT INTO `promedio_materia` VALUES (12, 1, 8, 1, 3);
INSERT INTO `promedio_materia` VALUES (13, 3, 3, 6, 1);
INSERT INTO `promedio_materia` VALUES (14, 3, 3, 4, 2);
INSERT INTO `promedio_materia` VALUES (15, 3, 3, 2, 3);
INSERT INTO `promedio_materia` VALUES (16, 4, 2, 9, 1);
INSERT INTO `promedio_materia` VALUES (17, 4, 5, 7, 1);
INSERT INTO `promedio_materia` VALUES (18, 4, 7, 7, 1);
INSERT INTO `promedio_materia` VALUES (19, 4, 8, 8, 1);
INSERT INTO `promedio_materia` VALUES (20, 4, 2, 2, 2);
INSERT INTO `promedio_materia` VALUES (21, 4, 5, 4, 2);
INSERT INTO `promedio_materia` VALUES (22, 4, 7, 4, 2);
INSERT INTO `promedio_materia` VALUES (23, 4, 8, 2, 2);
INSERT INTO `promedio_materia` VALUES (24, 4, 2, 3, 3);
INSERT INTO `promedio_materia` VALUES (25, 4, 5, 3, 3);
INSERT INTO `promedio_materia` VALUES (26, 4, 7, 3, 3);
INSERT INTO `promedio_materia` VALUES (27, 4, 8, 4, 3);
INSERT INTO `promedio_materia` VALUES (28, 5, 2, 2, 1);
INSERT INTO `promedio_materia` VALUES (29, 5, 5, 2, 1);
INSERT INTO `promedio_materia` VALUES (30, 5, 7, 2, 1);
INSERT INTO `promedio_materia` VALUES (31, 5, 8, 2, 1);
INSERT INTO `promedio_materia` VALUES (32, 5, 2, 1, 2);
INSERT INTO `promedio_materia` VALUES (33, 5, 5, 0, 2);
INSERT INTO `promedio_materia` VALUES (34, 5, 7, 0, 2);
INSERT INTO `promedio_materia` VALUES (35, 5, 8, 0, 2);
INSERT INTO `promedio_materia` VALUES (36, 5, 2, 0, 3);
INSERT INTO `promedio_materia` VALUES (37, 5, 5, 0, 3);
INSERT INTO `promedio_materia` VALUES (38, 5, 7, 1, 3);
INSERT INTO `promedio_materia` VALUES (39, 5, 8, 0, 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `superadmin`
-- 

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE IF NOT EXISTS `superadmin` (
  `superadmin_id` int(11) NOT NULL auto_increment,
  `usuario` varchar(255) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  `estado` enum('activo','inactivo') collate latin1_general_ci NOT NULL,
  `nombre` varchar(255) collate latin1_general_ci NOT NULL,
  `apellido` varchar(255) collate latin1_general_ci NOT NULL,
  `colegio_id` int(11) NOT NULL,
  PRIMARY KEY  (`superadmin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `superadmin`
-- 

INSERT INTO `superadmin` VALUES (1, 'super', '123456', 'activo', 'Paola', 'Garcia', 0);
