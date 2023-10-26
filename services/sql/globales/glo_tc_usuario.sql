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
