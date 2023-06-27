-- create table languages
CREATE TABLE languages (
	id INT NOT NULL AUTO_INCREMENT, 
	name VARCHAR(255) NOT NULL, 
	iso_code VARCHAR(255) NOT NULL, 
	CONSTRAINT language_id PRIMARY KEY (id)
);

-- inserts into languages
INSERT INTO languages(name, iso_code) VALUES ('Español','es');
INSERT INTO languages(name, iso_code) VALUES ('Inglés','en');
INSERT INTO languages(name, iso_code) VALUES ('Francés','fr');
INSERT INTO languages(name, iso_code) VALUES ('Portugués','pt');
INSERT INTO languages(name, iso_code) VALUES ('Italiano','it');
INSERT INTO languages(name, iso_code) VALUES ('Alemán','de');
INSERT INTO languages(name, iso_code) VALUES ('Chino','zh');
INSERT INTO languages(name, iso_code) VALUES ('Árabe','ar');