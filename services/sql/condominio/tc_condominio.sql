--
-- Estructura de tabla para la tabla `tc_condominio`
--
DROP TABLE IF EXISTS `bd_condominio`.`tc_condominio`;
CREATE TABLE `bd_condominio`.`tc_condominio` (
  `tc_condominio_id` int NOT NULL AUTO_INCREMENT,
  `tc_variable` varchar(45) NOT NULL,
  `tc_categoria1` varchar(45) NOT NULL,
  `tc_categoria2` varchar(45) NOT NULL,
  `tc_categoria3` varchar(250) NOT NULL,
  PRIMARY KEY (`tc_condominio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
--
-- Volcado de datos para la tabla `tc_condominio`
--
LOCK TABLES `bd_condominio`.`tc_condominio` WRITE;
INSERT INTO `bd_condominio`.`tc_condominio` VALUES 
(1,  'CONDOMINIO', 'ESTADO',  'ACTIVO'),
(2,  'CONDOMINIO', 'ESTADO',  'INACTIVO'),
(3,  'CONDOMINIO', 'DISTRITO', 'PUENTE PIEDRA'),
(4,  'CONDOMINIO', 'DISTRITO', 'LOS OLIVOS'),
(5,  'CONDOMINIO', 'DISTRITO', 'COMAS'),
(6,  'CONDOMINIO', 'DISTRITO', 'SAN JUAN DE LURIGANCHO'),
(7,  'CONDOMINIO', 'DISTRITO', 'CARABAYLLO'),
(8,  'CONDOMINIO', 'DISTRITO', 'SAN MARTIN DE PORRES'),
(9,  'CONDOMINIO', 'DISTRITO', 'INDEPENDENCIA'),
(10, 'CONDOMINIO', 'DISTRITO', 'BREÑA'),
(11, 'CONDOMINIO', 'DISTRITO', 'CHORRILLOS'),
(12, 'CONDOMINIO', 'DISTRITO', 'CHOSICA'),
(13, 'CONDOMINIO', 'DISTRITO', 'VENTANILLA'),
(14, 'CONDOMINIO', 'DISTRITO', 'RIMAC'),
(15, 'CONDOMINIO', 'DISTRITO', 'VILLA EL SALVADOR'),
(16, 'CONDOMINIO', 'DISTRITO', 'CALLAO'),
(17, 'CONDOMINIO', 'DISTRITO', 'ATE VITARTE'),
(18, 'CONDOMINIO', 'DISTRITO', 'VILLA MARIA DEL TRIUNFO'),
(19, 'CONDOMINIO', 'DISTRITO', 'SURCO'),
(20, 'CONDOMINIO', 'DISTRITO', 'CERCADO DE LIMA'),
(21, 'CONDOMINIO', 'DISTRITO', 'LA MOLINA'),
(22, 'CONDOMINIO', 'DISTRITO', 'SAN BORJA'),
(23, 'CONDOMINIO', 'DISTRITO', 'SANTA ANITA'),
(24, 'CONDOMINIO', 'DISTRITO', 'CIENEGUILLA'),
(25, 'CONDOMINIO', 'DISTRITO', 'SANTIAGO DE SURCO'),
(26, 'CONDOMINIO', 'DISTRITO', 'ANCON'),
(27, 'CONDOMINIO', 'DISTRITO', 'HUAROCHIRI'),
(28, 'CONDOMINIO', 'DISTRITO', 'CHACLACAYO'),
(29, 'CONDOMINIO', 'TIPO',     'VERTICAL'),
(30, 'CONDOMINIO', 'TIPO',     'HORIZONTAL'),
(31, 'CONDOMINIO', 'TIPO',     'MIXTO'),
(32, 'CONDOMINIO', 'TIPO',     'HABITACIONALES'),
(33, 'CONDOMINIO', 'TIPO',     'COMERCIAL');
UNLOCK TABLES;