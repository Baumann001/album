CREATE DATABASE album;
USE album;

CREATE TABLE dados(
id_unico INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
usuario_unico VARCHAR(255) NOT NULL,
senha_unica VARCHAR(255) NOT NULL
);

CREATE TABLE fotos(
foto_varias VARCHAR(255) DEFAULT 'default.jpg'
);

INSERT INTO dados (usuario_unico, senha_unica) VALUES ('_gustavob00', '123abx');
