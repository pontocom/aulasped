CREATE TABLE agenda_info
(
	id_entry INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(128),
	morada VARCHAR(250),
	email VARCHAR(128),
	telefone VARCHAR(25),
	foto VARCHAR(128),
        login VARCHAR(16),
        pwd VARCHAR(64),
        isadmin INT,
	PRIMARY KEY(id_entry)
);