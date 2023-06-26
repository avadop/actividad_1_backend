CREATE TABLE directores (
	id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    fecha_nacimiento DATE,
    nacionalidad varchar(255),
    CONSTRAINT director_id PRIMARY KEY (id)
);

-- inserts into directores

INSERT INTO directores (nombre, apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Woody','Allen','1935-11-30','Estados Unidos');

INSERT INTO directores (nombre, apellidos, fecha_nacimiento, nacionalidad)
VALUES ('James','Cameron','1954-08-16','Estados Unidos');

INSERT INTO directores (nombre, apellidos, fecha_nacimiento, nacionalidad)
VALUES ('Pedro','Almodovar','1949-09-25','España');

