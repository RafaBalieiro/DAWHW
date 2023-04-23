<?php

    function getUsuariosInteressados($id_produto, &$array_interessados){
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare('SELECT id_usuario_interessado FROM interesse WHERE id_produto = :id_produto');
        $statement->execute(array(
            ':id_produto' => $id_produto
        ));
        $array_interessados = array();

        foreach($statement as $chave_usuario => $value_usuario){
            array_push($array_interessados,$value_usuario);
        }
    }

    function verificarInteresseUsuario($id_produto, $id_usuario){
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare('SELECT id_usuario_interessado, id_produto FROM interesse WHERE id_usuario_interessado = :id_usuario AND id_produto = :id_produto');
        $statement->execute(array(
            ':id_produto' => $id_produto,
            ':id_usuario' => $id_usuario
        ));
        $contador = 0;
        foreach($statement as $chave_produto => $value_produto){
            $contador++;
        }

        return $contador;
    }

    function verificarInteresses($id_produto){
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->prepare('SELECT id_usuario_interessado FROM interesse WHERE id_produto = :id_produto');
        $statement->execute(array(
            ':id_produto' => $id_produto
        ));
        $contador = 0;
        foreach($statement as $chave_produto => $value_produto){
            $contador++;
        }
        return $contador;
    }

   

    function post_interesse($id_produto, $id_usuario_interessado){
        include "connection.php";

        $existe = verificarInteresseUsuario($id_produto,$id_usuario_interessado);

        if($existe == 0){
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $pdo->prepare('INSERT INTO interesse (id_produto, id_usuario_interessado) VALUES(:id_produto,:id_usuario)');
            $statement->execute(array(
                ':id_produto' => $id_produto,
                ':id_usuario' => $id_usuario_interessado
            ));
        }
        else{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('DELETE FROM interesse WHERE id_produto = :id_produto AND id_usuario_interessado = :id_usuario_interessado');
            $stmt->execute(array(
              ':id_produto' => $id_produto,
              ':id_usuario_interessado' => $id_usuario_interessado
            ));
        }

    }
?>
