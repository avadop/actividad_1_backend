-- create tabla actores
CREATE TABLE actores (
	id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    fecha_nacimiento DATE,
    nacionalidad varchar(255),
    CONSTRAINT id_actor PRIMARY KEY (id)
);


-- inserts into actores

INSERT INTO actores (nombre,apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Jennifer','Aniston','1969-11-02','Estados Unidos');

INSERT INTO actores (nombre,apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Robin','Williams','1951-07-21','Estados Unidos');

INSERT INTO actores (nombre,apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Antonio','Banderas','1960-08-10','España');

INSERT INTO actores (nombre,apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Jackie','Chan','1954-04-07','Hong Kong');

