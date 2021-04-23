CREATE DATABASE brq CHARACTER SET utf8 COLLATE utf8_general_ci;

USE brq;

CREATE TABLE pessoa (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome           VARCHAR(200) NOT NULL,
    cpf            VARCHAR(11)  NOT NULL,
    email          VARCHAR(150) NOT NULL,
    telefone       VARCHAR(14)  NOT NULL,
    sexo           VARCHAR(1)   NOT NULL,
    datanascimento date         NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT pessoa_cpf_uindex
        UNIQUE (cpf)
);