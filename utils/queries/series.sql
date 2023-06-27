-- create table series
CREATE TABLE series (
	id INT NOT NULL AUTO_INCREMENT , 
	title VARCHAR(255) NOT NULL , 
	platform INT NOT NULL , 
	director INT NOT NULL , 
	audio_language INT NOT NULL , 
	subtitles_language INT NOT NULL , 
	CONSTRAINT serie_id PRIMARY KEY (id)
); 

-- alter table 
ALTER TABLE series 
	ADD FOREIGN KEY (platform) 
	REFERENCES platforms(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE; 

ALTER TABLE series 
	ADD FOREIGN KEY (director) 
	REFERENCES directors(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE; 

ALTER TABLE series 
	ADD FOREIGN KEY (audio_language) 
	REFERENCES languages(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE;
	
ALTER TABLE series 
	ADD FOREIGN KEY (subtitles_language) 
	REFERENCES languages(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE; 

-- insert into series
INSERT INTO series(title, platform, director,  audio_language, subtitles_language) 
VALUES ('Serie 1',1,1,1,1);

INSERT INTO series(title, platform, director,  audio_language, subtitles_language) 
VALUES ('Serie 2',2,2,2,2);

INSERT INTO series(title, platform, director,  audio_language, subtitles_language) 
VALUES ('Serie 3',3,3,3,3);
