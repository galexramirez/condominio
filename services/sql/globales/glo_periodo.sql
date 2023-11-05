CREATE TABLE IF NOT EXISTS `condominio`.`glo_periodo` (
  `periodo_id` INT NOT NULL AUTO_INCREMENT,
  `peri_anio` INT NOT NULL,
  `peri_mes` VARCHAR(45) NOT NULL,
  `peri_proceso` VARCHAR(45) NOT NULL,
  `peri_descripcion` VARCHAR(45) NOT NULL,
  `peri_fecha_inicio` DATE NOT NULL,
  `peri_fecha_termino` DATE NOT NULL,
  PRIMARY KEY (`periodo_id`))
ENGINE = InnoDB