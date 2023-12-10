CREATE TABLE IF NOT EXISTS `bd_condominio`.`producto` (
  `producto_id` INT NOT NULL AUTO_INCREMENT,
  `prod_rubro` VARCHAR(60) NOT NULL,
  `prod_tipo` VARCHAR(60) NOT NULL,
  `prod_codigo` VARCHAR(9) NOT NULL,
  `prod_descripcion` VARCHAR(250) NOT NULL,
  `prod_estado` VARCHAR(15) NOT NULL,
  `prod_log` VARCHAR(1000) NULL,
  PRIMARY KEY (`producto_id`))
ENGINE = InnoDB;