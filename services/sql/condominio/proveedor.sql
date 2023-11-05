CREATE TABLE IF NOT EXISTS `bd_condominio`.`proveedor` (
  `proveedor_id` INT NOT NULL AUTO_INCREMENT,
  `prov_ruc` VARCHAR(11) NOT NULL,
  `prov_nombre` VARCHAR(100) NOT NULL,
  `prov_direccion` VARCHAR(100) NULL,
  `prov_distrito` VARCHAR(100) NULL,
  `prov_cta_bancaria` VARCHAR(45) NULL,
  `prov_email` VARCHAR(100) NULL,
  `prov_nro_telefono` VARCHAR(45) NULL,
  `prov_contacto` VARCHAR(100) NULL,
  `prov_estado` VARCHAR(45) NOT NULL,
  `prov_log` VARCHAR(1000) NULL,
  PRIMARY KEY (`proveedor_id`))
ENGINE = InnoDB;