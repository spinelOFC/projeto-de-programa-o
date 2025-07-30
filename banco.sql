-- SQL, linguagem de consulta estruturada
-- TRABALHANDO COM A LINGUAGEM DE BANCO SQL
--DDL - Linguagem de definição de dados
-- Criação de tabela
CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(45),
    cpf VARCHAR(15),
    email VARCHAR(45),
    senha VARCHAR(45)
);
--ALTERANDO TABELA, adicionando coluna idade
ALTER TABLE usuario ADD idade INT;
ALTER TABLE usuario DROP COLUMN idade;

--EXCLUIR TABELA INTEIRA
DROP TABLE usuario;

--DML - Linguagem de Manipulação de dados
--inserir dados na tabela
INSERT INTO usuario (nome, cpf, email, senha) VALUES
('Joaquim', '123.123.123-12','joaquim@gmail.com','123'),
('Marlon', '111.111.111-11', 'marlon@gmail.com', '321');

--alterar dado da tabela
UPDATE usuario SET nome="Alice", email="alice@gmail.com" WHERE id=2;
--excuir dado
DELETE FROM usuario WHERE id=2;
--SELECIONAR TODOS OS REGISTROS
--seleciona a coluna nome e cpf em todos os registros
SELECT nome, cpf FROM usuario;
--seleciona todas as colunas onde os nome for igual a marlon
SELECT * FROM usuario WHERE nome LIKE 'Marlon';

SELECT * FROM usuario WHERE id BETWEEN 1 AND 3 ORDER BY nome;

---- Criação de tabela regiao
CREATE TABLE usuario(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(45),
    cpf VARCHAR(15),
    email VARCHAR(45),
    senha VARCHAR(45)
);
--inserir dados na tabela
INSERT INTO usuario (nome, cpf, email, senha) VALUES
('Joaquim', '123.123.123-12','joaquim@gmail.com','123'),
('Marlon', '111.111.111-11', 'marlon@gmail.com', '321');

CREATE TABLE regiao(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45)
 );        

 INSERT INTO regiao (nome) VALUES
 ('nordeste'),
 ('sul');

CREATE TABLE cidade(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL
    cep VARCHAR(15)
    estado CHAR(2)
    id-regiao-fk INT,
FOREIGN KEY(id-regiao-fk)REFERENCES regiao(id)
 );        

 INSERT INTO cidade (nome, cep, estado, id-regiao-fk) VALUES
 ('nova londrina', '87970-000', 'pr',1),
 ('marilena', '87960-000' 'pr',1);
('palmas', '85555-000', 'pr', 2)

SELECT cidade.nome
FROM cidade INNER JOIN regiao
ON  cidade.id_regiao_fk = regiao.id;

CREATE TABLE ponto_focal(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    razao_social VARCHAR(45),
    tipo VARCHAR(45),
    cnpj_cpf VARCHAR(45),
    emdereco VARCHAR(255),
    telefone VARCHAR(45),
    celular VARCHAR(45),
email VARCHAR(45),
id_cidade_fk INT,
FOREIGN KEY (id_cidade_fk) REFERENCES cidade (id)

INSERT INTO ponto_focal (nome, razao_social, tipo, cnpj_cpf, endereco,
telefone, celular, email, id_cidade_fk) VALUES 
('Feclopes','Feclopes LTDA', 'Privada','12.345.111/0001-99', 'Rua das Flores, 123','(44) 1234-5678','(44)98823-4977','feclopes@gmail.com', 1),
('Assistência Social', 'Assistencia LTDA', 'Pública', '11.222.333/0001-01','Av. Central, 456', '(44)4002-8922', '(44)98844-5623', 'assistencia@gmail.com', 2);

CREATE TABLE area(
      id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(15),
    numero INT
);
INSERT INTO area
('tecnologia', 010101),
('gastronomia', 123123),
('gestao',111111);,

CREATE TABLE vemda(
     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
     data DATE,
     origem VARCHAR(255)
     obs VARCHAR(255)
     id_ponto_focal_fk INT,
     id_area_fk INT,
     FOREIGN KEY (id_ponto_focal_fk) REFERENCES ponto_focal (id),
      FOREIGN KEY (id_area_fk) REFERENCES area (id)
);
INSERT INTO venda (data, origem, obs,id_ponto_focal_f, id_area_fk ) VALUES
('2025-07-30','instagram','vendida a vista'1, 3);
('2025-07-28','evento da prefeitura','vendido para meu prefeito' 2, 1);

SELECT cidade.nome, area.nome
FROM cidade INNER JOIN ponto_focal
ON cidade.id = ponto_focal.id_cidade_fk
INNER JOIN venda
ON ponto_focal.id = venda.id_ponto_focal_fk
INNER JOIN area
on area.id = venda.id_area_fk;

SELECT * FROM ponto_focal
WHERE tipo = 'privada';