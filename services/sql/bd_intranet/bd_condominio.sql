--
-- Creacion base de datos `bd_condominio`
--
DROP DATABASE IF EXISTS `bd_condominio`;
CREATE DATABASE `bd_condominio` CHARACTER SET utf8mb3;

--
-- Estructura de tabla para la tabla `glo_control_acceso`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_control_acceso`;
CREATE TABLE `bd_condominio`.`glo_control_acceso` (
  `control_acceso_id` int NOT NULL AUTO_INCREMENT,
  `cacces_perfil` varchar(30) NOT NULL,
  `cacces_modulo_id` int NOT NULL,
  `cacces_objeto_id` int NOT NULL,
  `cacces_acceso` varchar(2) NOT NULL,
  PRIMARY KEY (`control_acceso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Table structure for table `glo_maestro`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_maestro`;
CREATE TABLE `bd_condominio`.`glo_maestro` (
  `maestro_id` varchar(8) NOT NULL,
  `maes_apellidos_nombres` varchar(60) NOT NULL,
  `maes_cargo_actual` varchar(45) NOT NULL,
  `maes_estado` varchar(15) NOT NULL,
  `maes_fecha_ingreso` date NOT NULL,
  `maes_fecha_cese` date DEFAULT NULL,
  `maes_email` varchar(80) NOT NULL,
  `maes_direccion` varchar(130) DEFAULT NULL,
  `maes_distrito` varchar(50) NOT NULL,
  `maes_perfil_evaluacion` varchar(30) NOT NULL,
  PRIMARY KEY (`maestro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `glo_maestro`
--
LOCK TABLES `bd_condominio`.`glo_maestro` WRITE;
INSERT INTO `bd_condominio`.`glo_maestro` VALUES ('90000001','ADMIN','COORDINADOR DE PROGRAMACION','ACTIVO','2023-01-02',NULL,'admin@csitecc.com','SURCO','SANTIAGO DE SURCO','PERSONAL OPERACIONES');
UNLOCK TABLES;
--
-- Table structure for table `glo_maestro_imagen`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_maestro_imagen`;
CREATE TABLE `bd_condominio`.`glo_maestro_imagen` (
  `maestro_id` varchar(8) NOT NULL,
  `maes_fotografia` longblob,
  PRIMARY KEY (`maestro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `glo_maestro_imagen`
--
LOCK TABLES `bd_condominio`.`glo_maestro_imagen` WRITE;
INSERT INTO `bd_condominio`.`glo_maestro_imagen` VALUES ('90000001',NULL);
UNLOCK TABLES;

--
-- Table structure for table `glo_modulo`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_modulo`;
CREATE TABLE `bd_condominio`.`glo_modulo` (
  `modulo_id` int NOT NULL AUTO_INCREMENT,
  `mod_nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mod_nombre_vista` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mod_icono` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`modulo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
--
-- Dumping data for table `glo_modulo`
--
LOCK TABLES `bd_condominio`.`glo_modulo` WRITE;
INSERT INTO `bd_condominio`.`glo_modulo` VALUES (1,'usuario','Usuario','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-earmark-person\" viewBox=\"0 0 16 16\">   <path d=\"M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z\"/>   <path d=\"M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z\"/> </svg>'),(2,'maestro','Maestro','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-person-lines-fill\" viewBox=\"0 0 16 16\">   <path d=\"M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z\"/> </svg>'),(3,'ajuste_generales','Aj. Generales','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-gear-fill\" viewBox=\"0 0 16 16\">   <path d=\"M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z\"></path> </svg>'),(4,'ajuste_usuario','Aj. Usuario','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-person-circle\" viewBox=\"0 0 16 16\">   <path d=\"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z\"/>   <path fill-rule=\"evenodd\" d=\"M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z\"/> </svg>');
UNLOCK TABLES;

--
-- Estructura de tabla para la tabla `glo_objeto`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_objeto`;
CREATE TABLE `bd_condominio`.`glo_objeto` (
  `objeto_id` int NOT NULL AUTO_INCREMENT,
  `obj_modulo_id` int NOT NULL,
  `obj_nombre_objeto` varchar(100) NOT NULL,
  `obj_descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`objeto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Table structure for table `glo_permisos`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_permisos`;
CREATE TABLE `bd_condominio`.`glo_permisos` (
  `permiso_id` int NOT NULL AUTO_INCREMENT,
  `per_usuario_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `per_modulo_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `per_nivel` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `per_modulo_inicio` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
--
-- Dumping data for table `glo_permisos`
--
LOCK TABLES `bd_condominio`.`glo_permisos` WRITE;
INSERT INTO `bd_condominio`.`glo_permisos` VALUES (1,'90000001','1','EditorGlobal','SI'),(2,'90000001','2','EditorGlobal','NO'),(3,'90000001','3','EditorGlobal','NO'),(4,'90000001','4','EditorGlobal','NO');
UNLOCK TABLES;

--
-- Estructura de tabla para la tabla `glo_roles`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_roles`;
CREATE TABLE `bd_condominio`.`glo_roles` (
  `roles_id` int NOT NULL AUTO_INCREMENT,
  `roles_dni` varchar(8) NOT NULL,
  `roles_apellidos_nombres` varchar(60) NOT NULL,
  `roles_nombre_corto` varchar(60) DEFAULT NULL,
  `roles_perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`roles_id`),
  KEY `roles_dni` (`roles_dni`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `glo_roles`
--
LOCK TABLES `bd_condominio`.`glo_roles` WRITE;
INSERT INTO `bd_condominio`.`glo_roles`  VALUES
(1, '90000001', 'ADMIN', 'ADMIN', 'PILOTO');	
UNLOCK TABLES;

--
-- Estructura de tabla para la tabla `glo_tc_maestro`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_tc_maestro`;
CREATE TABLE `bd_condominio`.`glo_tc_maestro` (
  `tc_maestro_id` int NOT NULL AUTO_INCREMENT,
  `tc_ficha` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_maestro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `glo_tc_maestro`
--
LOCK TABLES `bd_condominio`.`glo_tc_maestro` WRITE;
INSERT INTO `bd_condominio`.`glo_tc_maestro`  VALUES
(1,  'MAESTRO', 'ESTADO',   'ACTIVO'),
(2,  'MAESTRO', 'ESTADO',   'INACTIVO'),
(3,  'MAESTRO', 'CARGO',    'PILOTO DE BUS ALIMENTADOR'),
(4,  'MAESTRO', 'CARGO',    'PILOTO DE BUS ARTICULADO'),
(5,  'MAESTRO', 'CARGO',    'GESTOR DE PREVENCION'),
(6,  'MAESTRO', 'CARGO',    'ANALISTA DE MANTENIMIENTO'),
(7,  'MAESTRO', 'PERFIL',   'PILOTO'),
(8,  'MAESTRO', 'PERFIL',   'PERSONAL OPERACIONES'),
(9,  'MAESTRO', 'PERFIL',   'PERSONAL MANTENIMIENTO'),
(10, 'MAESTRO', 'CARGO',    'COORDINADOR DE PROGRAMACION'),
(11, 'MAESTRO', 'DISTRITO', 'PUENTE PIEDRA'),
(12, 'MAESTRO', 'DISTRITO', 'LOS OLIVOS'),
(13, 'MAESTRO', 'DISTRITO', 'COMAS'),
(14, 'MAESTRO', 'DISTRITO', 'SAN JUAN DE LURIGANCHO'),
(15, 'MAESTRO', 'DISTRITO', 'CARABAYLLO'),
(16, 'MAESTRO', 'DISTRITO', 'SAN MARTIN DE PORRES'),
(17, 'MAESTRO', 'DISTRITO', 'INDEPENDENCIA'),
(18, 'MAESTRO', 'DISTRITO', 'BREÑA'),
(19, 'MAESTRO', 'DISTRITO', 'CHORRILLOS'),
(20, 'MAESTRO', 'DISTRITO', 'CHOSICA'),
(21, 'MAESTRO', 'DISTRITO', 'VENTANILLA'),
(22, 'MAESTRO', 'DISTRITO', 'RIMAC'),
(23, 'MAESTRO', 'DISTRITO', 'VILLA EL SALVADOR'),
(24, 'MAESTRO', 'DISTRITO', 'CALLAO'),
(25, 'MAESTRO', 'DISTRITO', 'ATE VITARTE'),
(26, 'MAESTRO', 'DISTRITO', 'VILLA MARIA DEL TRIUNFO'),
(27, 'MAESTRO', 'DISTRITO', 'SURCO'),
(28, 'MAESTRO', 'DISTRITO', 'CERCADO DE LIMA'),
(29, 'MAESTRO', 'DISTRITO', 'LA MOLINA'),
(30, 'MAESTRO', 'DISTRITO', 'SAN BORJA'),
(31, 'MAESTRO', 'DISTRITO', 'SANTA ANITA'),
(32, 'MAESTRO', 'DISTRITO', 'CIENEGUILLA'),
(33, 'MAESTRO', 'DISTRITO', 'SANTIAGO DE SURCO'),
(34, 'MAESTRO', 'DISTRITO', 'ANCON'),
(35, 'MAESTRO', 'DISTRITO', 'HUAROCHIRI'),
(36, 'MAESTRO', 'DISTRITO', 'CHACLACAYO'),
(37, 'MAESTRO', 'CARGO',    'PROGRAMADOR MANTENIMIENTO'),
(38, 'MAESTRO', 'CARGO',    'PROGRAMADOR');
UNLOCK TABLES;

--
-- Estructura de tabla para la tabla `glo_tc_usuario`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_tc_usuario`;
CREATE TABLE `bd_condominio`.`glo_tc_usuario` (
  `tc_usuario_id` int NOT NULL AUTO_INCREMENT,
  `tc_ficha` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `glo_tc_usuario`
--
LOCK TABLES `bd_condominio`.`glo_tc_usuario` WRITE;
INSERT INTO `bd_condominio`.`glo_tc_usuario` VALUES
(1, 'USUARIO', 'ESTADO', 'ACTIVO'),
(2, 'USUARIO', 'ESTADO', 'INACTIVO'),
(3, 'USUARIO', 'PERFIL', 'PILOTO'),
(4, 'USUARIO', 'PERFIL', 'MASTER OPERACIONES'),
(5, 'USUARIO', 'PERFIL', 'ADMIN'),
(6, 'USUARIO', 'PERFIL', 'MASTER MANTENIMIENTO'),
(7, 'USUARIO', 'PERFIL', 'ADMINISTRATIVO');
UNLOCK TABLES;

--
-- Estructura de tabla para la tabla `glo_tipo_cambio`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_tipo_cambio`;
CREATE TABLE `bd_condominio`.`glo_tipo_cambio` (
  `tipo_cambio_id` int NOT NULL AUTO_INCREMENT,
  `tcam_fecha` date NOT NULL,
  `tcam_moneda` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tcam_tipo` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tcam_valor` float NOT NULL,
  PRIMARY KEY (`tipo_cambio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Estructura de tabla para la tabla `glo_usuario`
--
CREATE TABLE `bd_condominio`.`glo_usuario` (
  `usuario_id` varchar(8) NOT NULL,
  `usua_nombres` varchar(60) NOT NULL,
  `usua_nombre_corto` varchar(45) NOT NULL,
  `usua_usuario_web` varchar(20) NOT NULL,
  `usua_password` varchar(100) NOT NULL,
  `usua_perfil` varchar(30) NOT NULL,
  `usua_estado` varchar(8) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `glo_usuario`
--
LOCK TABLES `bd_condominio`.`glo_usuario` WRITE;
INSERT INTO `bd_condominio`.`glo_usuario` VALUES ('90000001', 'ADMIN', 'ADMIN', 'admin', 'ab29bb52347644738d086851706e530a', 'ADMIN', 'ACTIVO');
UNLOCK TABLES;

---------------------------------------------------------------------

--
-- Estructura de tabla para la tabla `condominio`
--
DROP TABLE IF EXISTS `bd_condominio`.`condominio`;
CREATE TABLE `bd_condominio`.`condominio` (
  `condominio_id` int NOT NULL AUTO_INCREMENT,
  `cond_tipo` varchar(50) NOT NULL,
  `cond_nombre` varchar(100) NOT NULL,
  `cond_edificio` int NOT NULL,
  `cond_dpto` int NOT NULL,
  `cond_puerta` int NOT NULL,
  `cond_estacionamiento` int NOT NULL,
  `cond_direccion` varchar(130) NULL,
  `cond_distrito` varchar(50) NULL,
  `cond_estado` varchar(15) NOT NULL,
  `cond_fecha` DATETIME NOT NULL,
  `cond_usuario_id` varchar(8) NOT NULL,
  `cond_log` varchar(1000) NULL,
  PRIMARY KEY (`condominio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Estructura de tabla para la tabla `puerta`
--
DROP TABLE IF EXISTS `bd_condominio`.`puerta`;
CREATE TABLE `bd_condominio`.`puerta` (
  `puerta_id` int NOT NULL AUTO_INCREMENT,
  `pta_condominio_id` int NOT NULL,
  `pta_nombre` varchar(100) NOT NULL,
  `pta_direccion` varchar(130) NOT NULL,
  PRIMARY KEY (`puerta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Estructura de tabla para la tabla `tc_condominio`
--
DROP TABLE IF EXISTS `bd_condominio`.`tc_condominio`;
CREATE TABLE `bd_condominio`.`tc_condominio` (
  `tc_condominio_id` int NOT NULL AUTO_INCREMENT,
  `tc_ficha` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_condominio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `tc_condominio`
--
LOCK TABLES `bd_condominio`.`tc_condominio` WRITE;
INSERT INTO `bd_condominio`.`tc_condominio` VALUES 
(1,  'CONDOMINIO', 'ESTADO',  'ACTIVO'),
(2,  'CONDOMINIO', 'ESTADO',  'INACTIVO'),
(3,  'CONDOMINIO', 'DISTRITO', 'PUENTE PIEDRA'),
(4,  'CONDOMINIO', 'DISTRITO', 'LOS OLIVOS'),
(5,  'CONDOMINIO', 'DISTRITO', 'COMAS'),
(6,  'CONDOMINIO', 'DISTRITO', 'SAN JUAN DE LURIGANCHO'),
(7,  'CONDOMINIO', 'DISTRITO', 'CARABAYLLO'),
(8,  'CONDOMINIO', 'DISTRITO', 'SAN MARTIN DE PORRES'),
(9,  'CONDOMINIO', 'DISTRITO', 'INDEPENDENCIA'),
(10, 'CONDOMINIO', 'DISTRITO', 'BREÑA'),
(11, 'CONDOMINIO', 'DISTRITO', 'CHORRILLOS'),
(12, 'CONDOMINIO', 'DISTRITO', 'CHOSICA'),
(13, 'CONDOMINIO', 'DISTRITO', 'VENTANILLA'),
(14, 'CONDOMINIO', 'DISTRITO', 'RIMAC'),
(15, 'CONDOMINIO', 'DISTRITO', 'VILLA EL SALVADOR'),
(16, 'CONDOMINIO', 'DISTRITO', 'CALLAO'),
(17, 'CONDOMINIO', 'DISTRITO', 'ATE VITARTE'),
(18, 'CONDOMINIO', 'DISTRITO', 'VILLA MARIA DEL TRIUNFO'),
(19, 'CONDOMINIO', 'DISTRITO', 'SURCO'),
(20, 'CONDOMINIO', 'DISTRITO', 'CERCADO DE LIMA'),
(21, 'CONDOMINIO', 'DISTRITO', 'LA MOLINA'),
(22, 'CONDOMINIO', 'DISTRITO', 'SAN BORJA'),
(23, 'CONDOMINIO', 'DISTRITO', 'SANTA ANITA'),
(24, 'CONDOMINIO', 'DISTRITO', 'CIENEGUILLA'),
(25, 'CONDOMINIO', 'DISTRITO', 'SANTIAGO DE SURCO'),
(26, 'CONDOMINIO', 'DISTRITO', 'ANCON'),
(27, 'CONDOMINIO', 'DISTRITO', 'HUAROCHIRI'),
(28, 'CONDOMINIO', 'DISTRITO', 'CHACLACAYO'),
(29, 'CONDOMINIO', 'TIPO',     'VERTICAL'),
(30, 'CONDOMINIO', 'TIPO',     'HORIZONTAL'),
(31, 'CONDOMINIO', 'TIPO',     'MIXTO'),
(32, 'CONDOMINIO', 'TIPO',     'HABITACIONALES'),
(33, 'CONDOMINIO', 'TIPO',     'COMERCIAL');
UNLOCK TABLES;