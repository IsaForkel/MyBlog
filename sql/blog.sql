CREATE DATABASE blog
	DEFAULT CHARACTER SET utf8;

USE blog;

CREATE TABLE usuarios (
		id INT NOT NULL AUTO_INCREMENT UNIQUE,
        nombre VARCHAR(25) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        fecha_registro DATETIME NOT NULL,
        activo TINYINT NOT NULL,
        PRIMARY KEY(id)
);

CREATE TABLE publicaciones(
	id INT NOT NULL AUTO_INCREMENT UNIQUE,
    autor_id INT NOT NULL,
    url VARCHAR(255) NOT NULL UNIQUE,
    titulo VARCHAR(255) NOT NULL UNIQUE,
    texto TEXT CHARACTER SET UTF8 NOT NULL,
    fecha DATETIME NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE comentarios(
	id INT NOT NULL AUTO_INCREMENT UNIQUE,
    autor_id INT NOT NULL,
    publicacion_id INT NOT NULL,
    texto TEXT CHARACTER SET UTF8 NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
		REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
	FOREIGN KEY(publicacion_id)
		REFERENCES publicaciones(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);