CREATE TABLE `residente` (
  `residente_id` int(11) NOT NULL AUTO_INCREMENT,
  `resi_condominio_id` int(11) NOT NULL,
  `resi_edificio_id` varchar(20) NOT NULL,
  `resi_departamento_id` varchar(20) NOT NULL,
  `resi_dni` varchar(8) NOT NULL,
  `resi_tipo` varchar(45) NOT NULL,
  `resi_fecha_inicio` date NOT NULL,
  `resi_fecha_fin` date DEFAULT NULL,
  `resi_estado` varchar(15) NOT NULL,
  `resi_fecha` datetime NOT NULL,
  `resi_usuario_id` varchar(8) NOT NULL,
  `resi_log` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`residente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
