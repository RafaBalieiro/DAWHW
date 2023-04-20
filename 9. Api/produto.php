<?php
    function get_produtos(&$produto, &$usuario, &$URL_imagem, &$name, &$interesse){
        include "connection.php";
        $pdo = new PDO("mysql:host=localhost;dbname=daw;charset=utf8mb4" , "root" , "mudar@123");
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT id_produto,id_usuario,imagem_url,name,interesse FROM produto");        
        foreach($statement as $chave_usuario => $value_usuario){
            $produto = $value["id_produto"];
            $usuario = $value["id_usuario"];
            $URL_imagem = $value["imagem_url"];
            $name = $value["name"];
            $interesse = $value["interesse"];
        }
    }

    function post_produto($name, $imagem, $descricao, $id_user){
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('INSERT INTO produto (name, imagem_url, descricao, id_usuario, interesse) VALUES(:name,:imagem_url,:descricao,:id_usuario, :interesse)');
        $stmt->execute(array(
            ':name' => $name,
            ':imagem_url' => $imagem,
            ':descricao' => $descricao,
            ':id_usuario' => $id_user,
            ':interesse' => 0
        ));
    }

    function get_produtosByUserId(&$array_produtoById, $user_id_filter){
        $array_produtoById = array();
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT id_produto,id_usuario,imagem_url,name,interesse,descricao FROM produto"); 
        foreach($statement as $chave_usuario => $value_usuario){
            if($user_id_filter == $value_usuario["id_usuario"]){
                $array_produtoById[$value_usuario["id_produto"]] = $value_usuario;
            }
        }
    }
