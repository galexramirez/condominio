--
-- Estructura de tabla para la tabla `glo_usuario`
--
CREATE TABLE `bd_condominio`.`glo_usuario` (
  `usuario_id` varchar(8) NOT NULL,
  `usua_nombres` varchar(60) NOT NULL,
  `usua_nombre_corto` varchar(45) NOT NULL,
  `usua_usuario_web` varchar(80) NOT NULL,
  `usua_password` varchar(100) NOT NULL,
  `usua_perfil` varchar(45) NOT NULL,
  `usua_estado` varchar(8) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `glo_usuario`
--
LOCK TABLES `bd_condominio`.`glo_usuario` WRITE;
INSERT INTO `bd_condominio`.`glo_usuario` VALUES ('90000001', 'ADMIN', 'ADMIN', 'admin', 'ab29bb52347644738d086851706e530a', 'ADMIN', 'ACTIVO');
-- user : admin password : admin$2023
UNLOCK TABLES;
