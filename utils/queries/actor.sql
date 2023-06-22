-- create tabla actors
CREATE TABLE actors (
	id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    surnames varchar(255) NOT NULL,
    birth_date DATE,
    nacionality varchar(255),
    CONSTRAINT actor_id PRIMARY KEY (id)
);


-- inserts into actors

INSERT INTO actors (name,surnames, birth_date, nacionality)
VALUES ('Jennifer','Aniston','1969-11-02','Estados Unidos');

INSERT INTO actors (name,surnames, birth_date, nacionality)
VALUES ('Robin','Williams','1951-07-21','Estados Unidos');

INSERT INTO actors (name,surnames, birth_date, nacionality)
VALUES ('Antonio','Banderas','1960-08-10','España');

INSERT INTO actors (name,surnames, birth_date, nacionality)
VALUES ('Jackie','Chan','1954-04-07','Hong Kong');

