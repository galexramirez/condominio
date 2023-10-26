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
