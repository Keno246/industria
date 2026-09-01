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