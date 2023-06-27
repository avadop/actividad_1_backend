-- create tabla series_actors
CREATE TABLE `actividad1_backend`.`series_actors` (`id` INT NOT NULL AUTO_INCREMENT , `serie` INT NOT NULL , `actor` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


ALTER TABLE `series_actors` ADD CONSTRAINT `series_actors_serie_fk` FOREIGN KEY (`serie`) REFERENCES `series`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE; 
ALTER TABLE `series_actors` ADD CONSTRAINT `series_actors_actor_fk` FOREIGN KEY (`actor`) REFERENCES `actors`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- inserts
INSERT INTO `series_actors`(`serie`, `actor`) VALUES ('1','1');
INSERT INTO `series_actors`(`serie`, `actor`) VALUES ('1','2');


