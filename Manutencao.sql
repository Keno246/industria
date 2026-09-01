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