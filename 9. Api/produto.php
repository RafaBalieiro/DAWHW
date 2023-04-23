<?php
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

    function get_produtoByProductId(&$name, &$descricao,&$imagem_url, $product_id_filter){
        $array_produtoById = array();
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT id_produto,id_usuario,imagem_url,name,interesse,descricao FROM produto"); 
        foreach($statement as $chave_usuario => $value_usuario){
            if($product_id_filter == $value_usuario["id_produto"]){
                $name = $value_usuario["name"];
                $descricao = $value_usuario["descricao"];
                $imagem_url = $value_usuario["imagem_url"];
                $array_produtoById[$value_usuario["id_produto"]] = $value_usuario;
            }
        }
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

    function get_produtosAll(&$array_produtoById, $user_id_filter){
        $array_produtoById = array();
        include "connection.php";
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $pdo->query("SELECT id_produto,id_usuario,imagem_url,name,interesse,descricao FROM produto"); 
        foreach($statement as $chave_usuario => $value_usuario){
            $array_produtoById[$value_usuario["id_produto"]] = $value_usuario;
        }
    }

    function get_produtosOrdeningBy(&$array_produtoById, $user_id_filter, $number_1=1, $number_2=4){
        $statement = array();
        get_produtosAll($statement, $user_id_filter);
        $contador = 0;
        foreach($statement as $chave_usuario => $value_usuario){
            if($value_usuario["id_usuario"] != $user_id_filter){
                $contador++;
                if($contador >= $number_1 && $contador <= $number_2){
                    $array_produtoById[$contador] = $value_usuario;
                }
            }
        }
    }

    function get_produtosOrdeningByWithUserId(&$array_produtoById, $user_id_filter, $number_1=1, $number_2=4){
        $statement = array();
        get_produtosByUserId($statement, $user_id_filter);
        $contador = 0;
        foreach($statement as $chave_usuario => $value_usuario){
            $contador++;
            if($contador >= $number_1 && $contador <= $number_2)
                $array_produtoById[$value_usuario["id_produto"]] = $value_usuario;
        }
    }

    function put_produtosInteresse($produto){
        include "connection.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT interesse FROM produto WHERE id_produto = :id_produto");
        $stmt->execute(array(
            ':id_produto'   => $produto
        ));
        $interesse_anterior;
        foreach($stmt as $chave_produto => $value_produto){
            $interesse_anterior = $value_produto["interesse"];
        }
        if($interesse_anterior == 0)
        {
            $interesse=1;
        }
        else{
            $interesse=0;
        }
        $stmt = $pdo->prepare('UPDATE produto SET interesse = :interesse WHERE id_produto = :id_produto');
        $stmt->execute(array(
          ':id_produto'   => $produto,
          ':interesse' => $interesse
        ));
        header("Refresh:0");

    }

    function put_produtosCaracteristicas($name, $imagem, $descricao, $id_produto){
        include "connection.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('UPDATE produto SET name = :name, imagem_url = :imagem_url, descricao = :descricao WHERE id_produto = :id_produto');
        $stmt->execute(array(
          ':id_produto' => $id_produto,
          ':name' => $name,
          ':descricao' => $descricao,
          ':imagem_url' => $imagem
        ));
    }

    function delete_produto($id_produto){
        include "connection.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = :id_produto');
        $stmt->execute(array(
          ':id_produto' => $id_produto
        ));
    }
