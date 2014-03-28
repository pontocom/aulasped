CREATE TABLE utilizador
(
  id INT PRIMARY KEY auto_increment,
  uname VARCHAR(64) NOT NULL,
  pword VARCHAR(128) NOT NULL
);

CREATE TABLE pessoa
(
  id INT PRIMARY KEY auto_increment,
  nome VARCHAR(128) NOT NULL,
  email VARCHAR(200) NOT NULL,
  idtwitter VARCHAR(128),
  idfacebook VARCHAR(128),
  idutilizador INT NOT NULL
);