CREATE TABLE `directiva_miembro` (
  `directiva_miembro_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_directiva_id` int(11) NOT NULL,
  `dm_dni` varchar(8) NOT NULL,
  `dm_condominio_id` int(11) NOT NULL,
  `dm_edificio_id` varchar(20) NOT NULL,
  `dm_departamento_id` varchar(20) NOT NULL,
  `dm_cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`directiva_miembro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
