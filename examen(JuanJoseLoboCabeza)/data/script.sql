/* Base de datos creada por P.Lluyot para el Ex.DAW-2*/

DROP DATABASE IF EXISTS equipos;
CREATE DATABASE equipos;
use equipos;
create table personajes (
    id_personaje INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(30) NOT NULL,
    descripcion varchar(100) NOT NULL,
    url varchar(50) default 'img/p0.jpg'
);
create table equipos (
    id_equipo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(30) NOT NULL
);
create table integrantes_equipo (
    id_equipo INT UNSIGNED,
    id_personaje INT UNSIGNED,
    es_capitan BOOLEAN default 0,
    PRIMARY key (id_equipo, id_personaje),
    constraint FK_equipo_id FOREIGN KEY (id_equipo) REFERENCES equipos (id_equipo),
    constraint FK_personaje_id FOREIGN KEY (id_personaje) REFERENCES personajes (id_personaje)
    
);

CREATE USER IF NOT EXISTS 'equipo_usuario'@'localhost' identified by '1234';
GRANT SELECT, INSERT, UPDATE, DELETE on equipos.* to 'equipo_usuario'@'localhost';

/*
    base de datos -> equipos
    usuario -> equipo_usuario
    password -> 1234
    servidor -> localhost
*/
INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(1, 'Akin', 'Un guerrero imparable, maestro en el combate cuerpo a cuerpo y en estrategias militares.', 'img/p1.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(2, 'Fiona', 'Experta en artes marciales y sigilo, capaz de infiltrarse en cualquier lugar.', 'img/p2.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(3, 'Eldrin', 'Maestro de la magia antigua y poseedor de vastos conocimientos sobre hechizos y encantamientos.', 'img/p3.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(4, 'Xena', 'Una arquera excepcional y una líder nata, capaz de guiar ejércitos con su determinación y carisma.', 'img/p4.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(5, 'Leo', 'Un estratega brillante y líder astuto, siempre un paso adelante en cada situación.', 'img/p5.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(6, 'Solon', 'Un vagabundo sabio y misterioso, que posee la habilidad de comunicarse con los espíritus.',  'img/p6.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(7, 'Tim', 'Un prodigio en la informática, capaz de hackear sistemas de seguridad y resolver enigmas complejos.',  'img/p7.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(8, 'Chang', 'Experto en alquimia, creador de poderosas pociones y elixires que pueden cambiar el destino.',  'img/p8.jpg');

INSERT INTO personajes (id_personaje, nombre, descripcion,  url) VALUES
(9, 'Raven', 'Maestro del disfraz y la manipulación, cambia de apariencia y engaña a sus enemigos con facilidad.',  'img/p9.jpg');

INSERT INTO equipos (id_equipo, nombre) VALUES
(1, 'Equipo Fénix');
INSERT INTO equipos (id_equipo, nombre) VALUES
(2, 'Equipo Dragón');

-- integrantes del Equipo Fénix
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(1, 1, 1);
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(1, 2, 0);
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(1, 3, 0);

-- integrantes del Equipo Dragón
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(2, 4, 1);
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(2, 5, 0);
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(2, 6, 0);
INSERT INTO integrantes_equipo (id_equipo, id_personaje, es_capitan) VALUES
(2, 3, 0);