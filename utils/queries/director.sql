CREATE TABLE directors (
    id INT NOT NULL AUTO_INCREMENT,
    _name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    nationality VARCHAR(255),
    PRIMARY KEY (id)
);

-- Inserts into directors

INSERT INTO directors (_name, last_name, date_of_birth, nationality)
VALUES ('Woody', 'Allen', '1935-11-30', 'Estados Unidos');

INSERT INTO directors (_name, last_name, date_of_birth, nationality)
VALUES ('James', 'Cameron', '1954-08-16', 'Estados Unidos');

INSERT INTO directors (_name, last_name, date_of_birth, nationality)
VALUES ('Pedro', 'Almodóvar', '1949-09-25', 'España');

