--
-- Table structure for table `glo_permisos`
--
DROP TABLE IF EXISTS `bd_condominio`.`glo_permisos`;
CREATE TABLE `bd_condominio`.`glo_permisos` (
  `permiso_id` int NOT NULL AUTO_INCREMENT,
  `per_usuario_id` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `per_modulo_id` INT NOT NULL,
  `per_modulo_inicio` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
--
-- Dumping data for table `glo_permisos`
--
LOCK TABLES `bd_condominio`.`glo_permisos` WRITE;
INSERT INTO `bd_condominio`.`glo_permisos` VALUES (1,'90000001','1','EditorGlobal','SI'),(2,'90000001','2','EditorGlobal','NO'),(3,'90000001','3','EditorGlobal','NO'),(4,'90000001','4','EditorGlobal','NO');
UNLOCK TABLES;
