--
-- Estructura de tabla para la tabla `tc_condominio`
--
DROP TABLE IF EXISTS `bd_condominio`.`tc_cta_pagar`;
CREATE TABLE `bd_condominio`.`tc_cta_pagar` (
  `tc_cta_pagar_id` int NOT NULL AUTO_INCREMENT,
  `tc_variable` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(45) NOT NULL,
  `tc_categoria3` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_cta_pagar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
