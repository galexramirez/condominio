CREATE TABLE `directiva` (
  `directiva_id` int(11) NOT NULL AUTO_INCREMENT,
  `dire_descripcion` varchar(100) NOT NULL,
  `dire_condominio_id` int(11) NOT NULL,
  `dire_edificio_id` varchar(20) DEFAULT NULL,
  `dire_tipo` varchar(45) NOT NULL,
  `dire_fecha_inicio` date NOT NULL,
  `dire_fecha_fin` date NOT NULL,
  `dire_estado` varchar(15) NOT NULL,
  `dire_fecha` datetime NOT NULL,
  `dire_usuario_id` varchar(8) NOT NULL,
  `dire_log` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`directiva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
