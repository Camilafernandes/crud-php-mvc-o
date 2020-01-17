CREATE DATABASE receiv DEFAULT CHARACTER SET utf8;
USE receiv;

CREATE TABLE devedores (
    id_devedor      INT(11) NOT NULL AUTO_INCREMENT comment 'pk_devedor_id',
    nome            VARCHAR(255) NOT NULL,
    cnpj_cpf        BIGINT NOT NULL,
    data_nascimento DATE NOT NULL,
    endereco        VARCHAR(255) NOT NULL,
    created_at      TIMESTAMP NOT NULL DEFAULT current_timestamp,
    update_at       TIMESTAMP NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp,
    CONSTRAINT pk_devedor_id PRIMARY KEY (id_devedor)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE dividas (
    id_divida       INT(11) NOT NULL AUTO_INCREMENT comment 'pk_dividas_id',
    descricao_titulo TEXT NOT NULL,
    valor            FLOAT NOT NULL,
    data_vencimento  DATE NOT NULL,
    id_devedor       INT(11) NOT NULL,
    created_at       TIMESTAMP NOT NULL DEFAULT current_timestamp,
    update_at        TIMESTAMP NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp,
    CONSTRAINT pk_dividas_id PRIMARY KEY (id_divida),
    CONSTRAINT fk_devedor_id_ft FOREIGN KEY (id_devedor) REFERENCES devedores(id_devedor)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;