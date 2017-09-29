-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ab_quincho
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ab_quincho` ;

-- -----------------------------------------------------
-- Schema ab_quincho
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ab_quincho` DEFAULT CHARACTER SET latin1 ;
USE `ab_quincho` ;

-- -----------------------------------------------------
-- Table `ab_quincho`.`bodega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`bodega` (
  `id_bodega` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_bodega` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_bodega`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`hoteleria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`hoteleria` (
  `id_hotel` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_h` VARCHAR(50) NULL DEFAULT NULL,
  `rut_h` VARCHAR(12) NULL DEFAULT NULL,
  `direccion` VARCHAR(45) NULL DEFAULT NULL,
  `fono` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id_hotel`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`cabanna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`cabanna` (
  `id_cabanna` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_cabanna` VARCHAR(10) NULL DEFAULT NULL,
  `num_cabanna` INT(11) NULL DEFAULT NULL,
  `valor_dia` INT(11) NULL DEFAULT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `hoteleria_id_hotel` INT(11) NOT NULL,
  PRIMARY KEY (`id_cabanna`, `hoteleria_id_hotel`),
  CONSTRAINT `fk_cabanna_hoteleria1`
    FOREIGN KEY (`hoteleria_id_hotel`)
    REFERENCES `ab_quincho`.`hoteleria` (`id_hotel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_cabanna_hoteleria1_idx` ON `ab_quincho`.`cabanna` (`hoteleria_id_hotel` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`centro_costo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`centro_costo` (
  `id_centro` INT(11) NOT NULL AUTO_INCREMENT,
  `centro_costo` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`id_centro`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `rut_cli` VARCHAR(12) NULL DEFAULT NULL,
  `razon_social_cli` VARCHAR(55) NULL DEFAULT NULL,
  `giro_cli` VARCHAR(55) NULL DEFAULT NULL,
  `direccion_cli` VARCHAR(45) NULL DEFAULT NULL,
  `fono_cli` VARCHAR(15) NULL DEFAULT NULL,
  `correo_cli` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`proveedor` (
  `id_prov` INT(11) NOT NULL AUTO_INCREMENT,
  `rut_prov` VARCHAR(12) NULL DEFAULT NULL,
  `razon_social_prov` VARCHAR(55) NULL DEFAULT NULL,
  `giro_prov` VARCHAR(55) NULL DEFAULT NULL,
  `direccion_prov` VARCHAR(45) NULL DEFAULT NULL,
  `fono_prov` VARCHAR(15) NULL DEFAULT NULL,
  `correo_prov` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`id_prov`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`compras` (
  `id_compras` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL DEFAULT NULL,
  `num_factura` VARCHAR(15) NULL DEFAULT NULL,
  `proveedor_id_prov` INT(11) NOT NULL,
  `centro_costo_id_centro` INT(11) NOT NULL,
  PRIMARY KEY (`id_compras`, `proveedor_id_prov`, `centro_costo_id_centro`),
  CONSTRAINT `fk_compras_centro_costo1`
    FOREIGN KEY (`centro_costo_id_centro`)
    REFERENCES `ab_quincho`.`centro_costo` (`id_centro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_proveedor1`
    FOREIGN KEY (`proveedor_id_prov`)
    REFERENCES `ab_quincho`.`proveedor` (`id_prov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_compras_proveedor1_idx` ON `ab_quincho`.`compras` (`proveedor_id_prov` ASC);

CREATE INDEX `fk_compras_centro_costo1_idx` ON `ab_quincho`.`compras` (`centro_costo_id_centro` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`detalle_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`detalle_compra` (
  `id_d_compra` INT(11) NOT NULL AUTO_INCREMENT,
  `unidad` INT(11) NULL DEFAULT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `unitario` INT(11) NULL DEFAULT NULL,
  `subtotal` INT(11) NULL DEFAULT NULL,
  `compras_id_compras` INT(11) NOT NULL,
  `valor_compra` INT NULL,
  PRIMARY KEY (`id_d_compra`, `compras_id_compras`),
  CONSTRAINT `fk_detalle_compra_compras1`
    FOREIGN KEY (`compras_id_compras`)
    REFERENCES `ab_quincho`.`compras` (`id_compras`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_detalle_compra_compras1_idx` ON `ab_quincho`.`detalle_compra` (`compras_id_compras` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`tipo` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`categoria` (
  `id_cat` INT NOT NULL,
  `categoria` TEXT NULL,
  PRIMARY KEY (`id_cat`))
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `ab_quincho`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`producto` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `valor_venta` INT(11) NULL DEFAULT NULL,
  `tipo_id_tipo` INT(11) NOT NULL,
  `categoria_id_cat` INT NOT NULL,
  PRIMARY KEY (`id_producto`, `tipo_id_tipo`, `categoria_id_cat`),
  CONSTRAINT `fk_inventario_tipo1`
    FOREIGN KEY (`tipo_id_tipo`)
    REFERENCES `ab_quincho`.`tipo` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_categoria1`
    FOREIGN KEY (`categoria_id_cat`)
    REFERENCES `ab_quincho`.`categoria` (`id_cat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_inventario_tipo1_idx` ON `ab_quincho`.`producto` (`tipo_id_tipo` ASC);

CREATE INDEX `fk_producto_categoria1_idx` ON `ab_quincho`.`producto` (`categoria_id_cat` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`reserva` (
  `id_reserva` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_ing` DATE NULL DEFAULT NULL,
  `fecha_sal` DATE NULL DEFAULT NULL,
  `costo_alojamiento` INT(11) NULL DEFAULT NULL,
  `dias` INT(11) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `cliente_id_cliente` INT(11) NOT NULL,
  `cabanna_id_cabanna` INT(11) NOT NULL,
  PRIMARY KEY (`id_reserva`, `cliente_id_cliente`, `cabanna_id_cabanna`),
  CONSTRAINT `fk_reserva_cabanna1`
    FOREIGN KEY (`cabanna_id_cabanna`)
    REFERENCES `ab_quincho`.`cabanna` (`id_cabanna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_cliente1`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `ab_quincho`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_reserva_cliente1_idx` ON `ab_quincho`.`reserva` (`cliente_id_cliente` ASC);

CREATE INDEX `fk_reserva_cabanna1_idx` ON `ab_quincho`.`reserva` (`cabanna_id_cabanna` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`detalle_consumo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`detalle_consumo` (
  `id_det_consumo` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidad` INT(11) NULL DEFAULT NULL,
  `desc` VARCHAR(100) NULL DEFAULT NULL,
  `valor` INT(11) NULL DEFAULT NULL,
  `reserva_id_reserva` INT(11) NOT NULL,
  `producto_id_producto` INT(11) NOT NULL,
  PRIMARY KEY (`id_det_consumo`, `reserva_id_reserva`, `producto_id_producto`),
  CONSTRAINT `fk_detalle_consumo_producto1`
    FOREIGN KEY (`producto_id_producto`)
    REFERENCES `ab_quincho`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_consumo_reserva1`
    FOREIGN KEY (`reserva_id_reserva`)
    REFERENCES `ab_quincho`.`reserva` (`id_reserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_detalle_consumo_reserva1_idx` ON `ab_quincho`.`detalle_consumo` (`reserva_id_reserva` ASC);

CREATE INDEX `fk_detalle_consumo_producto1_idx` ON `ab_quincho`.`detalle_consumo` (`producto_id_producto` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`restorant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`restorant` (
  `id_restorant` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NULL DEFAULT NULL,
  `rut` VARCHAR(15) NULL DEFAULT NULL,
  `direccion` VARCHAR(50) NULL DEFAULT NULL,
  `fono` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_restorant`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`salones_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`salones_venta` (
  `id_salon_venta` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_salon` VARCHAR(35) NULL DEFAULT NULL,
  `restorant_id_restorant` INT(11) NOT NULL,
  PRIMARY KEY (`id_salon_venta`, `restorant_id_restorant`),
  CONSTRAINT `fk_salones_venta_restorant1`
    FOREIGN KEY (`restorant_id_restorant`)
    REFERENCES `ab_quincho`.`restorant` (`id_restorant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_salones_venta_restorant1_idx` ON `ab_quincho`.`salones_venta` (`restorant_id_restorant` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`mesas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`mesas` (
  `id_mesa` INT(11) NOT NULL AUTO_INCREMENT,
  `num_mesa` INT(11) NULL DEFAULT NULL,
  `salones_venta_id_salon_venta` INT(11) NOT NULL,
  `estado` INT NULL,
  PRIMARY KEY (`id_mesa`, `salones_venta_id_salon_venta`),
  CONSTRAINT `fk_mesas_salones_venta1`
    FOREIGN KEY (`salones_venta_id_salon_venta`)
    REFERENCES `ab_quincho`.`salones_venta` (`id_salon_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_mesas_salones_venta1_idx` ON `ab_quincho`.`mesas` (`salones_venta_id_salon_venta` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`meseros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`meseros` (
  `id_mesero` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NULL DEFAULT NULL,
  `clave` VARCHAR(10) NULL DEFAULT NULL,
  `salones_venta_id_salon_venta` INT(11) NOT NULL,
  PRIMARY KEY (`id_mesero`, `salones_venta_id_salon_venta`),
  CONSTRAINT `fk_meseros_salones_venta1`
    FOREIGN KEY (`salones_venta_id_salon_venta`)
    REFERENCES `ab_quincho`.`salones_venta` (`id_salon_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_meseros_salones_venta1_idx` ON `ab_quincho`.`meseros` (`salones_venta_id_salon_venta` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`pedido` (
  `id_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_apertura` DATE NULL DEFAULT NULL,
  `hora_apertura` TIME(3) NULL DEFAULT NULL,
  `personas` INT(11) NULL DEFAULT NULL,
  `fecha_cierre` DATE NULL,
  `hora_cierre` TIME NULL,
  `estado` INT NULL,
  `meseros_id_mesero` INT(11) NOT NULL,
  `mesas_id_mesa` INT(11) NOT NULL,
  PRIMARY KEY (`id_pedido`, `meseros_id_mesero`, `mesas_id_mesa`),
  CONSTRAINT `fk_pedido_mesas1`
    FOREIGN KEY (`mesas_id_mesa`)
    REFERENCES `ab_quincho`.`mesas` (`id_mesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_meseros1`
    FOREIGN KEY (`meseros_id_mesero`)
    REFERENCES `ab_quincho`.`meseros` (`id_mesero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_pedido_meseros1_idx` ON `ab_quincho`.`pedido` (`meseros_id_mesero` ASC);

CREATE INDEX `fk_pedido_mesas1_idx` ON `ab_quincho`.`pedido` (`mesas_id_mesa` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`detalle_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`detalle_pedido` (
  `id_d_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidad` INT(11) NULL DEFAULT NULL,
  `unitario` INT(11) NULL DEFAULT NULL,
  `subtotal` INT(11) NULL DEFAULT NULL,
  `hora_pedido` TIME NULL,
  `hora_atencion` TIME NULL,
  `obs` TEXT NULL DEFAULT NULL,
  `estado` INT NULL,
  `pedido_id_pedido` INT(11) NOT NULL,
  `producto_id_producto` INT(11) NOT NULL,
  PRIMARY KEY (`id_d_pedido`, `pedido_id_pedido`, `producto_id_producto`),
  CONSTRAINT `fk_detalle_pedido_pedido`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `ab_quincho`.`pedido` (`id_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_pedido_producto1`
    FOREIGN KEY (`producto_id_producto`)
    REFERENCES `ab_quincho`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_detalle_pedido_pedido_idx` ON `ab_quincho`.`detalle_pedido` (`pedido_id_pedido` ASC);

CREATE INDEX `fk_detalle_pedido_producto1_idx` ON `ab_quincho`.`detalle_pedido` (`producto_id_producto` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`forma_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`forma_pago` (
  `id_forma` INT(11) NOT NULL AUTO_INCREMENT,
  `forma_pago` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_forma`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `ab_quincho`.`tipo_doc_sii`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`tipo_doc_sii` (
  `id_t_doc` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc_sii` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id_t_doc`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ab_quincho`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`pago` (
  `id_pago` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_pago` DATE NULL DEFAULT NULL,
  `descuento` INT(11) NULL DEFAULT NULL,
  `monto_pago` INT(11) NULL DEFAULT NULL,
  `doc_sii` INT(11) NULL DEFAULT NULL,
  `forma_pago_id_forma` INT(11) NOT NULL,
  `pedido_id_pedido` INT(11) NOT NULL,
  `tipo_doc_sii_id_t_doc` INT(11) NOT NULL,
  `propina` INT NULL,
  PRIMARY KEY (`id_pago`, `forma_pago_id_forma`, `pedido_id_pedido`, `tipo_doc_sii_id_t_doc`),
  CONSTRAINT `fk_pago_forma_pago1`
    FOREIGN KEY (`forma_pago_id_forma`)
    REFERENCES `ab_quincho`.`forma_pago` (`id_forma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_pedido1`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `ab_quincho`.`pedido` (`id_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_tipo_doc_sii1`
    FOREIGN KEY (`tipo_doc_sii_id_t_doc`)
    REFERENCES `ab_quincho`.`tipo_doc_sii` (`id_t_doc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_pago_forma_pago1_idx` ON `ab_quincho`.`pago` (`forma_pago_id_forma` ASC);

CREATE INDEX `fk_pago_pedido1_idx` ON `ab_quincho`.`pago` (`pedido_id_pedido` ASC);

CREATE INDEX `fk_pago_tipo_doc_sii1_idx` ON `ab_quincho`.`pago` (`tipo_doc_sii_id_t_doc` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`pago_reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`pago_reserva` (
  `id_pago_reserva` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_pago` DATE NULL DEFAULT NULL,
  `subtotal` INT(11) NULL DEFAULT NULL,
  `descuento` INT(11) NULL DEFAULT NULL,
  `monto_pago` INT(11) NULL DEFAULT NULL,
  `reserva_id_reserva` INT(11) NOT NULL,
  `forma_pago_id_forma` INT(11) NOT NULL,
  `tipo_doc_sii_id_t_doc` INT(11) NOT NULL,
  PRIMARY KEY (`id_pago_reserva`, `reserva_id_reserva`, `forma_pago_id_forma`, `tipo_doc_sii_id_t_doc`),
  CONSTRAINT `fk_pago_reserva_forma_pago1`
    FOREIGN KEY (`forma_pago_id_forma`)
    REFERENCES `ab_quincho`.`forma_pago` (`id_forma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_reserva_reserva1`
    FOREIGN KEY (`reserva_id_reserva`)
    REFERENCES `ab_quincho`.`reserva` (`id_reserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pago_reserva_tipo_doc_sii1`
    FOREIGN KEY (`tipo_doc_sii_id_t_doc`)
    REFERENCES `ab_quincho`.`tipo_doc_sii` (`id_t_doc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_pago_reserva_reserva1_idx` ON `ab_quincho`.`pago_reserva` (`reserva_id_reserva` ASC);

CREATE INDEX `fk_pago_reserva_forma_pago1_idx` ON `ab_quincho`.`pago_reserva` (`forma_pago_id_forma` ASC);

CREATE INDEX `fk_pago_reserva_tipo_doc_sii1_idx` ON `ab_quincho`.`pago_reserva` (`tipo_doc_sii_id_t_doc` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`ubicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`ubicaciones` (
  `id_ubicaciones` INT(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` VARCHAR(3) NULL DEFAULT NULL,
  `bodega_id_bodega` INT(11) NOT NULL,
  PRIMARY KEY (`id_ubicaciones`, `bodega_id_bodega`),
  CONSTRAINT `fk_ubicaciones_bodega1`
    FOREIGN KEY (`bodega_id_bodega`)
    REFERENCES `ab_quincho`.`bodega` (`id_bodega`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_ubicaciones_bodega1_idx` ON `ab_quincho`.`ubicaciones` (`bodega_id_bodega` ASC);


-- -----------------------------------------------------
-- Table `ab_quincho`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ab_quincho`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `ab_quincho`.`tipo`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`tipo` (`id_tipo`, `tipo`) VALUES (1, 'Venta Restorant');
INSERT INTO `ab_quincho`.`tipo` (`id_tipo`, `tipo`) VALUES (2, 'Venta Interna');
INSERT INTO `ab_quincho`.`tipo` (`id_tipo`, `tipo`) VALUES (3, 'Venta Cabaña');

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (1, 'Del Corral');
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (2, 'Del Mar');
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (3, 'Comen por 4');
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (4, 'Empanadas / Sandwichs');
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (5, 'Bebestibles');
INSERT INTO `ab_quincho`.`categoria` (`id_cat`, `categoria`) VALUES (6, 'Menú Quincho Tarde');

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`producto`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (1, 'Lomo a la Parrilla', 7000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (2, 'Plateada', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (3, 'Carne a la Olla', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (4, 'Longaniza', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (5, 'Pollo', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (6, 'Costillar', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (7, 'Prietas', 6000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (8, 'Ensalada', 2000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (9, 'Agregados', 2000, 1, 1);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (10, 'Pescado a la Plancha', 7000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (11, 'Mariscal Caliente', 6000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (12, 'Carapacho C/F', 6000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (13, 'Macha en Salsa Verde', 6000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (14, 'Chupe de Machas', 6000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (15, 'Chupe de Locos', 9000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (16, 'Americano', 9000, 1, 2);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (17, 'Comen por 4 - Quincho', 24000, 1, 3);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (18, 'Comen por 4 - Mariscos', 24000, 1, 3);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (19, 'Menu Niños', 3000, 1, 3);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (20, 'Horno Tradicional', 1500, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (21, 'Macha - Queso', 700, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (22, 'Carapacho - Queso', 700, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (23, 'Pino', 700, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (24, 'Queso', 500, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (25, 'Lomo', 3000, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (26, 'Lomo Cerdo', 3000, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (27, 'Mechada', 3000, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (28, 'Agregados', 0, 1, 4);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (29, 'Pisco Sour', 2500, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (30, 'Vaina', 2500, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (31, 'Mojito', 3000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (32, 'Daikiri', 3000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (33, 'Combinados', 3000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (34, 'Whisky 5 Años', 4000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (35, 'Whisky 12 Años', 5000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (36, 'Bebida 350 ml', 1000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (37, 'Bebida 1Lts', 2000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (38, 'Bebida 2Lts', 3000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (39, 'Cerveza', 1500, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (40, 'Cerveza Importada', 2000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (41, 'Kunstmann', 3000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (42, 'Vino Varietal', 4000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (43, 'Vino Reserva', 8000, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (44, 'Vino Botellin', 1500, 1, 5);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (45, 'Carne Vacuno - Lomo', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (46, 'Carne Vacuno - Plateada', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (47, 'Carne Vacuno - Asado a la Parrilla', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (48, 'Pescado Plancha - Salmon', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (49, 'Pescado Plancha - Corvina', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (50, 'Pescado Plancha - Merluza Austral', 6000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (51, 'Agregados - Platos', 0, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (52, 'Promo Tragos 2000', 2000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (53, 'Sandwich Lomito', 2500, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (54, 'Sandwich Churrasco', 2500, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (55, 'Sandwich Hamburguesa', 2500, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (56, 'Agregados Sandwichs', 0, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (57, 'Parrillada 4 Personas + Botella Vino', 24000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (58, 'Pichanga 4 Personas + Botella Vino', 15000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (59, 'Tabla Carne 2 Personas + Pisco Sour', 12000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (60, 'Tabla Marisco 2 Personas + Pisco Sour', 12000, 1, 6);
INSERT INTO `ab_quincho`.`producto` (`id_producto`, `descripcion`, `valor_venta`, `tipo_id_tipo`, `categoria_id_cat`) VALUES (61, 'Anticuchos 2 Personas + Pisco Sour', 12000, 1, 6);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`restorant`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`restorant` (`id_restorant`, `nombre`, `rut`, `direccion`, `fono`) VALUES (1, 'El Quincho Resto', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`salones_venta`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`salones_venta` (`id_salon_venta`, `nombre_salon`, `restorant_id_restorant`) VALUES (1, 'Salón Quincho 1', 1);
INSERT INTO `ab_quincho`.`salones_venta` (`id_salon_venta`, `nombre_salon`, `restorant_id_restorant`) VALUES (2, 'Salón Quincho 2', 1);
INSERT INTO `ab_quincho`.`salones_venta` (`id_salon_venta`, `nombre_salon`, `restorant_id_restorant`) VALUES (3, 'Salón de Eventos', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`mesas`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (1, 1, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (2, 2, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (3, 3, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (4, 4, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (5, 5, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (6, 6, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (7, 7, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (8, 8, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (9, 9, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (10, 10, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (11, 11, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (12, 12, 1, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (13, 13, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (14, 14, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (15, 15, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (16, 16, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (17, 17, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (18, 18, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (19, 19, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (20, 20, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (21, 21, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (22, 22, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (23, 23, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (24, 24, 2, 0);
INSERT INTO `ab_quincho`.`mesas` (`id_mesa`, `num_mesa`, `salones_venta_id_salon_venta`, `estado`) VALUES (25, 25, 3, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`meseros`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`meseros` (`id_mesero`, `nombre`, `clave`, `salones_venta_id_salon_venta`) VALUES (1, 'Daniel Gutierrez', '123456', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `ab_quincho`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `ab_quincho`;
INSERT INTO `ab_quincho`.`users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Daniel Gutierrez', 'contacto@danielgutierrez.cl', '$2y$10$ClJevLXXBXnRoC/0cowxdOeAq//KCTFKND/.I1DFoO.rHYQcMB7wG', 'NULL', '2017-09-03 00:38:06', '2017-09-03 00:38:06');

COMMIT;

