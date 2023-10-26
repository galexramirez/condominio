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
