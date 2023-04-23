<?php
    function get_validacao($email, $senha, &$nome, &$id_usuario, &$found)
    {
        $found = 0;
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT email,id_usuario,senha,name FROM usuario");
        foreach($statement as $chave_usuario => $value_usuario){
            if ($value_usuario["email"] == $email && $value_usuario["senha"] == $senha)
            {
                $nome = $value_usuario["name"];
                $id_usuario = $value_usuario["id_usuario"];
                $found = 1;
            }
        }
    }

    function post_user($name, $email, $senha){
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('INSERT INTO usuario(name, email, senha) VALUES(:name,:email,:senha)');
        $stmt->execute(array(
            ':name' => $name,
            ':email' => $email,
            ':senha' => $senha
        ));
        header("Refresh:0");
    }
    
    function get_validacao_byId(&$nome, &$id_usuario)
    {
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT id_usuario, name FROM usuario");
        foreach($statement as $chave_usuario => $value_usuario){
            if ($value_usuario["id_usuario"] == $id_usuario)
            {
                $nome = $value_usuario["name"];
                $id_usuario = $value_usuario["id_usuario"];
            }
        }
    }
