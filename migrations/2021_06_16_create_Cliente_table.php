<?php

class CreateTable
{
    public function CreateTable()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=crmall", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqCreateTable = "CREATE TABLE cliente(
                id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                nome varchar(255) NOT NULL,
                dataNascimento date NOT NULL,
                sexo varchar(11) NOT NULL,
                cep varchar(8) DEFAULT NULL,
                endereco varchar(255) DEFAULT NULL,
                numero int(11) DEFAULT NULL,
                complemento varchar(255) DEFAULT NULL,
                bairro varchar(255) DEFAULT NULL,
                estado varchar(30) DEFAULT NULL,
                cidade varchar(30) DEFAULT NULL
            )";
            $stmt = $pdo->prepare($slqCreateTable);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
