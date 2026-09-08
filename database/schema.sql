create table setores (
	id INT auto_increment primary key,
	nome VARCHAR(100) not null
	);

create table equipamentos (
	id int auto_increment primary key,
	nome varchar(150) not null,
	patrimonio varchar(30) not null unique,
	setor_id int,
	status varchar(20) default 'ativo',
	foreign key (setor_id) references setores(id)
);

insert into setores (nome)
values('Informática');

insert into setores (nome) values ('Secretaria');

select * from setores;



CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    cargo VARCHAR(100) NOT NULL,
    setor_id INT NOT NULL,
    FOREIGN KEY (setor_id) REFERENCES setores(id)
);

CREATE TABLE chamados_manutencao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'aberto',
    equipamento_id INT,
    user_id INT,
    FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);




CREATE TABLE manutencoes (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    equipamento_id BIGINT NOT NULL,
    funcionario_id BIGINT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    descricao TEXT,
    data_manutencao DATE,
    proxima_manutencao DATE,
    custo DECIMAL(10,2),
    status VARCHAR(20) NOT NULL DEFAULT 'Pendente',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id),
    FOREIGN KEY (funcionario_id) REFERENCES funcionarios(id)
);



CREATE TABLE ordens_producao (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    setor_id BIGINT NOT NULL,
    responsavel_id BIGINT NOT NULL,
    codigo_ordem VARCHAR(30) NOT NULL,
    produto VARCHAR(100) NOT NULL,
    quantidade_planejada INT NOT NULL,
    quantidade_produzida INT NOT NULL DEFAULT 0,
    data_inicio DATETIME,
    data_fim DATETIME,
    status VARCHAR(20) NOT NULL DEFAULT 'Aberta',
    observacoes TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (setor_id) REFERENCES setores(id),
    FOREIGN KEY (responsavel_id) REFERENCES funcionarios(id)
);
drop table ordens_producao; 

