SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `resale` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `resale` ;

-- -----------------------------------------------------
-- Table `resale`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`clients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NULL,
  `address` TEXT NULL,
  `tel` VARCHAR(45) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `active` TINYINT(1) NULL DEFAULT 0,
  `logo` VARCHAR(100) NULL,
  `is_admin` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `resale`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `active` VARCHAR(45) NULL,
  `is_superadmin` TINYINT(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `gender` TINYINT NULL,
  `photo` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `resale`.`clients_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`clients_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NULL,
  `client_id` INT(10) NULL,
  PRIMARY KEY (`id`),
  INDEX `clientFK_idx` (`client_id` ASC),
  INDEX `usersFK_idx` (`user_id` ASC),
  CONSTRAINT `clientsFK`
    FOREIGN KEY (`client_id`)
    REFERENCES `resale`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usersFK`
    FOREIGN KEY (`user_id`)
    REFERENCES `resale`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `resale`.`jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`jobs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `emp_cost` DOUBLE NULL,
  `comp_cost` DOUBLE NULL,
  `sys_type` TINYINT(1) NULL,
  `active` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resale`.`jobs_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`jobs_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `job_id` INT(10) NULL,
  `user_id` INT(10) NULL,
  PRIMARY KEY (`id`),
  INDEX `jobsUsersFK1_idx` (`user_id` ASC),
  INDEX `jobsUsersFK2_idx` (`job_id` ASC),
  CONSTRAINT `jobsUsersFK1`
    FOREIGN KEY (`user_id`)
    REFERENCES `resale`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `jobsUsersFK2`
    FOREIGN KEY (`job_id`)
    REFERENCES `resale`.`jobs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_estonian_ci;


-- -----------------------------------------------------
-- Table `resale`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`locations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `code` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `client_id` INT(10) NULL,
  `active` TINYINT(1) NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `resale`.`work_orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`work_orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `location_id` INT(10) NULL,
  `user_id` INT(10) NULL,
  `manager_id` INT(10) NULL,
  `created_by` INT(10) NULL,
  `is_manager` TINYINT(1) NULL,
  `is_accountant` TINYINT(1) NULL,
  `is_admin` TINYINT(1) NULL,
  `from_date` DATETIME NULL,
  `to_date` DATETIME NULL,
  `client_id` INT(10) NULL,
  `created` DATETIME NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `workOrderFK_idx` (`user_id` ASC),
  INDEX `locationFK_idx` (`location_id` ASC),
  CONSTRAINT `workOrderFK`
    FOREIGN KEY (`user_id`)
    REFERENCES `resale`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `locationFK`
    FOREIGN KEY (`location_id`)
    REFERENCES `resale`.`locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resale`.`my_documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resale`.`my_documents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `passport_face` VARCHAR(45) NULL,
  `passport_back` VARCHAR(45) NULL,
  `id_face` VARCHAR(45) NULL,
  `id_back` VARCHAR(45) NULL,
  `stay_face` VARCHAR(45) NULL,
  `stay_back` VARCHAR(45) NULL,
  `cart_vital` VARCHAR(45) NULL,
  `rib` VARCHAR(45) NULL,
  `driver_license_front` VARCHAR(45) NULL,
  `driver_license_back` VARCHAR(45) NULL,
  `residence` VARCHAR(45) NULL,
  `residence_certificate` VARCHAR(45) NULL,
  `user_id` INT(10) NULL,
  PRIMARY KEY (`id`),
  INDEX `_idx` (`user_id` ASC),
  CONSTRAINT `myDocumentFK`
    FOREIGN KEY (`user_id`)
    REFERENCES `resale`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
