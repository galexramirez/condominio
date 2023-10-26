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

