CREATE TABLE utilizador (
	id INTEGER PRIMARY KEY auto_increment,
	uname VARCHAR(64) NOT NULL,
	pword VARCHAR(128) NOT NULL
);

CREATE TABLE pessoa (
	id INTEGER PRIMARY KEY auto_increment,
	iduser INTEGER NOT NULL,
	nome VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	twitter VARCHAR(128),
	facebook VARCHAR(128)
);