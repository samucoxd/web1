-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema id12207573_web
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema id12207573_web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `id12207573_web` DEFAULT CHARACTER SET utf8 ;
USE `id12207573_web` ;

-- -----------------------------------------------------
-- Table `id12207573_web`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  PRIMARY KEY (`idproveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id12207573_web`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id12207573_web`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`articulos` (
  `idarticulos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` DOUBLE NULL,
  `idproveedor` INT NULL,
  `img` VARCHAR(100) NULL,
  `descripcion` TINYTEXT NULL,
  `idcategoria` INT NULL,
  PRIMARY KEY (`idarticulos`),
  INDEX `fk_articulos_proveedor_idx` (`idproveedor` ASC) VISIBLE,
  INDEX `fk_articulos_categoria_idx` (`idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_articulos_proveedor`
    FOREIGN KEY (`idproveedor`)
    REFERENCES `id12207573_web`.`proveedor` (`idproveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_articulos_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `id12207573_web`.`categoria` (`idcategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id12207573_web`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `edad` INT NULL,
  `telefono` INT NULL,
  `ci` INT NULL,
  `direccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id12207573_web`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`ventas` (
  `idventas` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `idcliente` INT NULL,
  `subtotal` INT NULL,
  `total` INT NULL,
  PRIMARY KEY (`idventas`),
  CONSTRAINT `fk_ventas_cliente`
    FOREIGN KEY (`idcliente`)
    REFERENCES `id12207573_web`.`cliente` (`idcliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `id12207573_web`.`detalleventa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `id12207573_web`.`detalleventa` (
  `iddetalleventa` INT NOT NULL AUTO_INCREMENT,
  `idventas` INT NOT NULL,
  `idarticulos` INT NOT NULL,
  `cantidad` INT NULL,
  `total` VARCHAR(45) NULL,
  PRIMARY KEY (`iddetalleventa`, `idventas`, `idarticulos`),
  CONSTRAINT `fk_detalleventa_articulos`
    FOREIGN KEY (`idarticulos`)
    REFERENCES `id12207573_web`.`articulos` (`idarticulos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_detalleventa_ventas`
    FOREIGN KEY (`idventas`)
    REFERENCES `id12207573_web`.`ventas` (`idventas`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;