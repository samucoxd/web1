-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8 ;
USE `web` ;

-- -----------------------------------------------------
-- Table `web`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  PRIMARY KEY (`idproveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`articulos` (
  `idarticulos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` DOUBLE NULL,
  `idproveedor` INT NULL,
  `descripcion` TINYTEXT NULL,
  `idcategoria` INT NULL,
  PRIMARY KEY (`idarticulos`),
  INDEX `fk_articulos_proveedor_idx` (`idproveedor` ASC) VISIBLE,
  INDEX `fk_articulos_categoria_idx` (`idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_articulos_proveedor`
    FOREIGN KEY (`idproveedor`)
    REFERENCES `web`.`proveedor` (`idproveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `web`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `edad` INT NULL,
  `telefono` INT NULL,
  `ci` INT NULL,
  `direccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`ventas` (
  `idventas` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `idcliente` INT NULL,
  `subtotal` INT NULL,
  `total` INT NULL,
  PRIMARY KEY (`idventas`),
  INDEX `fk_ventas_cliente_idx` (`idcliente` ASC) VISIBLE,
  CONSTRAINT `fk_ventas_cliente`
    FOREIGN KEY (`idcliente`)
    REFERENCES `web`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `web`.`detalleventa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `web`.`detalleventa` (
  `idventas` INT NOT NULL,
  `idarticulos` INT NOT NULL,
  `cantidad` INT NULL,
  `total` VARCHAR(45) NULL,
  PRIMARY KEY (`idventas`, `idarticulos`),
  INDEX `fk_detalleventa_articulos_idx` (`idarticulos` ASC) VISIBLE,
  CONSTRAINT `fk_detalleventa_articulos`
    FOREIGN KEY (`idarticulos`)
    REFERENCES `web`.`articulos` (`idarticulos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleventa_ventas`
    FOREIGN KEY (`idventas`)
    REFERENCES `web`.`ventas` (`idventas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
