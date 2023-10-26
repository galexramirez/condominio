CREATE TABLE `departamento` (
  `departamento_id` varchar(20) NOT NULL,
  `dpto_condominio_id` int(11) NOT NULL,
  `dpto_edificio_id` varchar(20) NOT NULL,
  `dpto_descripcion` varchar(100) NOT NULL,
  `dpto_piso` int(11) NOT NULL,
  `dpto_dimensiones` varchar(100) NOT NULL,
  `dpto_estado` varchar(15) NOT NULL,
  `dpto_fecha` datetime NOT NULL,
  `dpto_usuario_id` varchar(8) NOT NULL,
  `dpto_log` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`departamento_id`,`dpto_condominio_id`,`dpto_edificio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
