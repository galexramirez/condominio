--
-- Table structure for table `glo_maestro`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_maestro`;
CREATE TABLE `bd_condominio`.`glo_maestro` (
  `maestro_id` varchar(8) NOT NULL,
  `maes_apellidos_nombres` varchar(60) NOT NULL,
  `maes_cargo_actual` varchar(45) NOT NULL,
  `maes_estado` varchar(15) NOT NULL,
  `maes_fecha_ingreso` date NOT NULL,
  `maes_fecha_cese` date DEFAULT NULL,
  `maes_email` varchar(80) NOT NULL,
  `maes_direccion` varchar(130) DEFAULT NULL,
  `maes_distrito` varchar(50) NOT NULL,
  PRIMARY KEY (`maestro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `glo_maestro`
--
LOCK TABLES `bd_condominio`.`glo_maestro` WRITE;
INSERT INTO `bd_condominio`.`glo_maestro` VALUES ('90000001','ADMIN','COORDINADOR DE PROGRAMACION','ACTIVO','2023-01-02',NULL,'admin@csitecc.com','SURCO','SANTIAGO DE SURCO');
UNLOCK TABLES;
