--
-- Table structure for table `glo_maestro_imagen`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_maestro_imagen`;
CREATE TABLE `bd_condominio`.`glo_maestro_imagen` (
  `maestro_id` varchar(8) NOT NULL,
  `maes_fotografia` longblob,
  PRIMARY KEY (`maestro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Dumping data for table `glo_maestro_imagen`
--
LOCK TABLES `bd_condominio`.`glo_maestro_imagen` WRITE;
INSERT INTO `bd_condominio`.`glo_maestro_imagen` VALUES ('90000001',NULL);
UNLOCK TABLES;
