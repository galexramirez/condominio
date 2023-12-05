CREATE TABLE IF NOT EXISTS `bd_condominio`.`glo_manual_html` (
  `manual_html_id` INT NOT NULL AUTO_INCREMENT,
  `manual_id` INT NOT NULL,
  `man_html` LONGTEXT NULL,
  PRIMARY KEY (`manual_html_id`))
ENGINE = InnoDB;