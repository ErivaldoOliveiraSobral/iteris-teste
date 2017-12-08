CREATE TABLE notas (
    id INT NOT NULL AUTO_INCREMENT,
    numero INT NOT NULL,
    descricao VARCHAR(255),
    dataFaturamento DATE,
    dataPagamento DATE,
    status VARCHAR(50),
    CONSTRAINT PK_id PRIMARY KEY (id)
) ENGINE = InnoDB CHARSET=latin1 COLLATE latin1_swedish_ci;