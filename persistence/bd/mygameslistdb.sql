CREATE DATABASE IF NOT EXISTS mygameslistdb;

USE mygameslistdb;

CREATE TABLE IF NOT EXISTS juegos (
	idJuego int not null AUTO_INCREMENT,
	nombre varchar(255),
	descripcion text,
	caratula varchar(255),
    precio varchar(255),
	PRIMARY KEY( idJuego )
);

INSERT INTO `juegos` VALUES (1,'Rise of the Tomb Raider',
                            'Its story follows Lara Croft as she ventures into Siberia in search of the legendary city of Kitezh while battling the paramilitary organization Trinity, which intends to uncover the city`s promise of immortality.',
                            'https://static.wikia.nocookie.net/tomb-raider/images/3/36/RTR_Portada_cuadrada.jpg/revision/latest/scale-to-width-down/900?cb=20170217091315&path-prefix=es',
                            '49.99€');