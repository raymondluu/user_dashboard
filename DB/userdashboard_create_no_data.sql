-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema userdashboard_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema userdashboard_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `userdashboard_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `userdashboard_db` ;

-- -----------------------------------------------------
-- Table `userdashboard_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `userdashboard_db`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `first_name` VARCHAR(45) NULL COMMENT '',
  `last_name` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `user_level` INT NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `userdashboard_db`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `userdashboard_db`.`messages` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `message` VARCHAR(255) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `poster_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_messages_users1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_messages_users2_idx` (`poster_id` ASC)  COMMENT '',
  CONSTRAINT `fk_messages_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `userdashboard_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users2`
    FOREIGN KEY (`poster_id`)
    REFERENCES `userdashboard_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `userdashboard_db`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `userdashboard_db`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `comment` VARCHAR(255) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `message_id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_comments_messages1_idx` (`message_id` ASC)  COMMENT '',
  INDEX `fk_comments_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_comments_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `userdashboard_db`.`messages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `userdashboard_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
