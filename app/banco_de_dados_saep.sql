-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema banco_de_dados
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema banco_de_dados
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `banco_de_dados` DEFAULT CHARACTER SET utf8 ;
USE `banco_de_dados` ;

-- -----------------------------------------------------
-- Table `banco_de_dados`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_de_dados`.`usuario` (
  `id` INT NOT NULL,
  `nome` VARCHAR(50) NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco_de_dados`.`tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_de_dados`.`tarefa` (
  `id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `nome_setor` VARCHAR(45) NOT NULL,
  `prioridade` DATETIME NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_tarefa_usuario_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_tarefa_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `banco_de_dados`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;