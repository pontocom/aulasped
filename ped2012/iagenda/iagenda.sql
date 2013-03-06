CREATE TABLE agenda
(
    id varchar(128) PRIMARY KEY,
    nome VARCHAR(64),
    morada TEXT,
    email VARCHAR(128),
    telefone VARCHAR(128),
    foto VARCHAR(32),
    id_user VARCHAR(128)
);

CREATE TABLE utilizador
(
    id VARCHAR(128) PRIMARY KEY,
    username VARCHAR(128),
    password VARCHAR(128)
);