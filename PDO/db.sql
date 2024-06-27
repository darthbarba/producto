CREATE DATABASE instituto;

USE instituto;

CREATE TABLE carreras (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre_carrera varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE estudiantes (
  id int(11) NOT NULL AUTO_INCREMENT,
  apellido varchar(50) NOT NULL,
  nombre varchar(50) NOT NULL,
  carrera varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



