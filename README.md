# escola-php
 ```sql
CREATE DATABASE `escola`
 ```
 ```sql
CREATE TABLE `escola`.`alunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `datanascimento` date DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  PRIMARY KEY (`id`)
);
 ```

 ```sql
CREATE TABLE `escola`.`turmas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `ano` int NOT NULL,
  `vagas` int NOT NULL,
  PRIMARY KEY (`ID`)
);
 ```
