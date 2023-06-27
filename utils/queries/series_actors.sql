-- create tabla series_actors
CREATE TABLE series_actors (
	id INT NOT NULL AUTO_INCREMENT, 
	serie INT NOT NULL , 
	actor INT NOT NULL , 
	CONSTRAINT series_actors_id PRIMARY KEY (id)
);


ALTER TABLE series_actors 
	ADD CONSTRAINT series_actors_serie_fk 
	FOREIGN KEY (serie) 
	REFERENCES series(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE; 
	
ALTER TABLE series_actors 
	ADD CONSTRAINT series_actors_actor_fk 
	FOREIGN KEY (actor) 
	REFERENCES actors(id) 
	ON DELETE RESTRICT ON UPDATE CASCADE;

-- inserts
INSERT INTO series_actors(serie, actor) VALUES ('1','1');
INSERT INTO series_actors(serie, actor) VALUES ('1','2');
INSERT INTO series_actors(serie, actor) VALUES ('2','1');
INSERT INTO series_actors(serie, actor) VALUES ('2','3');
INSERT INTO series_actors(serie, actor) VALUES ('3','3');





