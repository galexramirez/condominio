--
-- Estructura de tabla para la tabla `tc_condominio`
--
DROP TABLE IF EXISTS `bd_condo0minio`.`tc_cta_cobrar`;
CREATE TABLE `bd_condominio`.`tc_cta_cobrar` (
  `tc_cta_cobrar_id` int NOT NULL AUTO_INCREMENT,
  `tc_variable` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(45) NOT NULL,
  `tc_categoria3` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_cta_cobrar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
