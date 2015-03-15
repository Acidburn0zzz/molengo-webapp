SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

/* ---------------------------------------------------------------------------*/

insert into `user` (`id`, `username`, `password`, `disabled`, `role`, `locale`) 
    values('1','admin','$2y$10$8SCHkI4JUKJ2NA353BTHW.Kgi33HI.2C35xd/j5YUzBx05F1O4lJO','0','ROLE_ADMIN','en_US');
insert into `user` (`id`, `username`, `password`, `disabled`, `role`, `locale`) 
    values('2','user','$1$X64.UA0.$kCSxRsj3GKk7Bwy3P6xn1.','0','ROLE_USER','de_DE');


UPDATE `schema_version` SET `version` = '2', `updated_at` = NOW() WHERE `id` = '1'; 

/* ---------------------------------------------------------------------------*/

SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;