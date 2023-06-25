--create table series
CREATE TABLE `actividad1_backend`.`series` (`id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(256) NOT NULL , `platform` INT NOT NULL , `director` INT NOT NULL , `actors` INT NOT NULL , `audio_language` INT NOT NULL , `subtitles_language` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- alter table 
ALTER TABLE `series` ADD FOREIGN KEY (`platform`) REFERENCES `platforms`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE; 
ALTER TABLE `series` ADD FOREIGN KEY (`director`) REFERENCES `directors`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE; 
ALTER TABLE `series` ADD FOREIGN KEY (`audio_language`) REFERENCES `languages`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `series` ADD FOREIGN KEY (`subtitles_language`) REFERENCES `languages`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE; 
ALTER TABLE `series` ADD FOREIGN KEY (`actors`) REFERENCES `actors`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- insert into series
INSERT INTO `series`(`title`, `platform`, `director`, `actors`, `audio_language`, `subtitles_language`) VALUES ('Título serie',1,1,1,1,2);