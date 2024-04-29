## Descrição
Projeto de gestão escolar em php para aprender a linguagem
 
 ## Pré-Requisitos
 1. MySQL
 2. PHP

 ## Como rodar

 1. Criar banco de dados
 ```sql
CREATE DATABASE `escola`
 ```

2. Criar tabela Alunos
 ```sql
CREATE TABLE `escola`.`alunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `datanascimento` date DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  PRIMARY KEY (`id`)
);
 ```
3. Criar tabela Turmas
 ```sql
CREATE TABLE `escola`.`turmas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `ano` int NOT NULL,
  `vagas` int NOT NULL,
  PRIMARY KEY (`ID`)
);
 ```

4. Executar o comando no console na pasta raiz
   ``` cmd
   php -S localhost:8080
   ```
