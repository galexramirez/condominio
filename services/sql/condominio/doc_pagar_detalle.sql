CREATE TABLE IF NOT EXISTS `bd_condominio`.`doc_pagar_detalle` (
  `doc_pagar_detalle_id` INT NOT NULL AUTO_INCREMENT,
  `dpagd_ruc_proveedor` VARCHAR(11) NOT NULL,
  `dpagd_nro_documento` VARCHAR(45) NOT NULL,
  `dpagd_codigo_producto` VARCHAR(45) NOT NULL,
  `dpagd_descripcion` VARCHAR(100) NOT NULL,
  `dpagd_observacion` VARCHAR(250) NULL,
  `dpagd_cantidad` FLOAT NOT NULL,
  `dpagd_unidad` VARCHAR(10) NOT NULL,
  `dpagd_precio_unitario` FLOAT NOT NULL,
  `dpagd_precio_total` FLOAT NOT NULL,
  PRIMARY KEY (`doc_pagar_detalle_id`))
ENGINE = InnoDB;