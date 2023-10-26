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
