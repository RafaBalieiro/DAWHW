<?php
    function get_validacao($email, $senha, &$nome, &$id_usuario, &$found)
    {
        $found = 0;
        $pdo = new PDO("mysql:host=localhost;dbname=daw;charset=utf8mb4" , "root" , "mudar@123");
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
    
    function get_validacao_byId(&$nome, &$id_usuario)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=daw;charset=utf8mb4" , "root" , "mudar@123");
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
