SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `emailService` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `emailService` ;

-- -----------------------------------------------------
-- Table `emailService`.`pessoa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `emailService`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NOT NULL ,
  `apelido` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `apelido_UNIQUE` (`apelido` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `emailService`.`conta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `emailService`.`conta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(100) NOT NULL ,
  `host` VARCHAR(100) NOT NULL ,
  `porta` INT NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `chave` VARCHAR(32) NOT NULL ,
  `pessoa_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `chave_UNIQUE` (`chave` ASC) ,
  INDEX `fk_conta_pessoa1` (`pessoa_id` ASC) ,
  CONSTRAINT `fk_conta_pessoa1`
    FOREIGN KEY (`pessoa_id` )
    REFERENCES `emailService`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `emailService`.`destinatario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `emailService`.`destinatario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL ,
  `email` VARCHAR(150) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `emailService`.`mensagem`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `emailService`.`mensagem` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `conteudo` VARCHAR(45) NOT NULL ,
  `assunto` VARCHAR(45) NOT NULL ,
  `lida` TINYINT(1)  NOT NULL ,
  `data_envio` DATETIME NOT NULL ,
  `conta_id` INT NOT NULL ,
  `destinatario_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_mensagem_conta1` (`conta_id` ASC) ,
  INDEX `fk_mensagem_destinatario1` (`destinatario_id` ASC) ,
  CONSTRAINT `fk_mensagem_conta1`
    FOREIGN KEY (`conta_id` )
    REFERENCES `emailService`.`conta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagem_destinatario1`
    FOREIGN KEY (`destinatario_id` )
    REFERENCES `emailService`.`destinatario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
