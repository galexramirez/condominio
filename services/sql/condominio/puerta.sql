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
