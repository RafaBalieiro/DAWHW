<?php
    include "./9. Api/connection.php";
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("CREATE TABLE usuario(  
        id_usuario int NOT NULL AUTO_INCREMENT,  
        name varchar(45) NOT NULL,      
        email varchar(45) NOT NULL,  
        senha varchar(45) NOT NULL,
        PRIMARY KEY (id_usuario)  
    );");
    
    $pdo->query("CREATE TABLE produto(  
        id_produto int NOT NULL AUTO_INCREMENT,  
        id_usuario int NOT NULL,
        name varchar(45) NOT NULL,      
        imagem_url varchar(45) NOT NULL,  
        descricao varchar(45) NOT NULL,
        interesse int NOT NULL,
        PRIMARY KEY (id_produto)  
    );");

    $pdo->query("CREATE TABLE interesse(  
        id_interesse int NOT NULL AUTO_INCREMENT,  
        id_produto int NOT NULL,      
        id_usuario_interessado int NOT NULL,  
        PRIMARY KEY (id_interesse)  
    )")
