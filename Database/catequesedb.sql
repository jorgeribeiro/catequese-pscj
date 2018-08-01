-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema u398669830_catdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `u398669830_catdb` ;

-- -----------------------------------------------------
-- Schema u398669830_catdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u398669830_catdb` DEFAULT CHARACTER SET utf8 ;
USE `u398669830_catdb` ;

-- -----------------------------------------------------
-- Table `u398669830_catdb`.`form`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`form` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`form` (
  `idForm` INT(11) NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idForm`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u398669830_catdb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`user` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`user` (
  `idUser` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u398669830_catdb`.`form_filled`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`form_filled` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`form_filled` (
  `fk_idForm` INT(11) NOT NULL,
  `fk_idUser` INT(11) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `turma` VARCHAR(45) NOT NULL,
  `nascimento` DATETIME NOT NULL,
  `naturalidade` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(10) NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NULL DEFAULT NULL,
  `estudante` TINYINT(4) NULL DEFAULT NULL,
  `instituicao` VARCHAR(45) NULL DEFAULT NULL,
  `databatismo` DATETIME NULL DEFAULT NULL,
  `paroquiabatismo` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_idUser_idx` (`fk_idUser` ASC),
  INDEX `fk_idForm_idx` (`fk_idForm` ASC),
  CONSTRAINT `fk_idForm_form_filled`
    FOREIGN KEY (`fk_idForm`)
    REFERENCES `u398669830_catdb`.`form` (`idForm`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idUser_form_filled`
    FOREIGN KEY (`fk_idUser`)
    REFERENCES `u398669830_catdb`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u398669830_catdb`.`login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`login` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`login` (
  `fk_idUser` INT(11) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`fk_idUser`),
  CONSTRAINT `fk_idUser_login`
    FOREIGN KEY (`fk_idUser`)
    REFERENCES `u398669830_catdb`.`user` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u398669830_catdb`.`responsaveis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`responsaveis` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`responsaveis` (
  `fk_idForm` INT(11) NOT NULL,
  `nomepai` VARCHAR(100) NULL DEFAULT NULL,
  `nomemae` VARCHAR(100) NULL DEFAULT NULL,
  `telefonepai` VARCHAR(45) NULL DEFAULT NULL,
  `telefonemae` VARCHAR(45) NULL DEFAULT NULL,
  `telefonecasa` VARCHAR(45) NULL DEFAULT NULL,
  `paiscasados` TINYINT(4) NULL DEFAULT NULL,
  `paroquiacasamento` VARCHAR(45) NULL DEFAULT NULL,
  `vivemjuntos` TINYINT(4) NULL DEFAULT NULL,
  `frequentamparoquia` TINYINT(4) NULL DEFAULT NULL,
  `participamparoquia` TINYINT(4) NULL DEFAULT NULL,
  `participacaoparoquia` VARCHAR(45) NULL DEFAULT NULL,
  `frenquentamoutraparoquia` VARCHAR(45) NULL DEFAULT NULL,
  INDEX `fk_idForm_idx` (`fk_idForm` ASC),
  CONSTRAINT `fk_idForm_responsaveis`
    FOREIGN KEY (`fk_idForm`)
    REFERENCES `u398669830_catdb`.`form_filled` (`fk_idForm`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `u398669830_catdb`.`sacramentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `u398669830_catdb`.`sacramentos` ;

CREATE TABLE IF NOT EXISTS `u398669830_catdb`.`sacramentos` (
  `fk_idForm` INT(11) NOT NULL,
  `batismo` TINYINT(4) NOT NULL,
  `eucaristia` TINYINT(4) NOT NULL,
  INDEX `fk_idForm_idx` (`fk_idForm` ASC),
  CONSTRAINT `fk_idForm_sacramentos`
    FOREIGN KEY (`fk_idForm`)
    REFERENCES `u398669830_catdb`.`form_filled` (`fk_idForm`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
