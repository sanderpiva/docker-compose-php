CREATE DATABASE IF NOT EXISTS calculadora_db;

USE calculadora_db;

CREATE TABLE IF NOT EXISTS calculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nota_semestre DECIMAL(5,2),
    nota_prova_final DECIMAL(5,2),
    nota_final DECIMAL(5,2),
    situacao ENUM('Aprovado', 'Reprovado') NOT NULL,
    data_hora_do_calculo DATETIME DEFAULT CURRENT_TIMESTAMP
);
