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
