CREATE TABLE `edificio` (
  `edificio_id` varchar(20) NOT NULL,
  `edi_condominio_id` int(11) NOT NULL,
  `edi_descripcion` varchar(100) NOT NULL,
  `edi_piso` int(11) NOT NULL,
  `edi_dpto` int(11) NOT NULL,
  `edi_estado` varchar(15) NOT NULL,
  `edi_fecha` datetime NOT NULL,
  `edi_usuario_id` varchar(8) NOT NULL,
  `edi_log` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`edificio_id`,`edi_condominio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
