create table fabrica(
	id int primary key auto_increment,
	razao_social varchar(200) not null,
	cnpj varchar(14) not null,
	email varchar(100),
	telefone varchar(20),
	ativo boolean default true
);

select * from fornecedores;


CREATE TABLE materia_prima (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    codigo VARCHAR(20) NOT NULL UNIQUE,
    unidade_medida VARCHAR(10) NOT NULL,
    quantidade_estoque INT NOT NULL DEFAULT 0,
    preco_unitario DECIMAL(10,2) NOT NULL
);
