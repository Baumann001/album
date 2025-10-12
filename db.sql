CREATE DATABASE privacy;
USE privacy;

CREATE TABLE dados(
id_unico  primary key NOT NULL,
usuario_unico NOT NULL,
senha_unica NOT NUll,
);

CREATE TABLE fotos(
  foto_varias varchar(255) DEFAULT 'default.jpg'
);
