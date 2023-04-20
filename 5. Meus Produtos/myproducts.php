<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../4. Catalogo/style.css">
</head>
<body>
    <?php

        $nome = null;
        $id_usuario = 0;

        include "../9. Api/usuario.php";

          

        $id_usuario = $_COOKIE["id_usuario"];
        get_validacao_byId($nome, $id_usuario);
        
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $nome = null;
            $senha = $_POST["password"];
            $found;
            get_validacao($email, $senha, $nome, $id_usuario, $found);
            if($found == 0){
            include "../cabecalho.php";
            ?>
                <h1>Não localizamos seu cadastro... Tente novamente</h1>
                <a href="../1. Login/login.html">Tentar novamente</a>
            <?php
            exit();
            }
        }

        if($id_usuario == 0){
            header("Refresh:0");
        }

        setcookie("id_usuario", $id_usuario);
        if($id_usuario != $_COOKIE["id_usuario"])
        {
            header("Refresh:0");
        }

        $titulo= "Meus Produtos";

        include "../cabecalho.php";

        if ($nome == null){
    ?>

            <h1>Não localizamos seu cadastro... Tente novamente</h1>
            <a href="../1. Login/login.html">Tentar novamente</a>
    <?php
            exit();
        }

    ?>
    <main class="Main">
    <section  class="catalogo">
    <div class="products-grid" >
    <?php
        include "../9. Api/produto.php";

        $id_usuario = $_COOKIE["id_usuario"];
        $usuarios = array();
        get_produtosByUserId($usuarios, $id_usuario);
        foreach($usuarios as $value_usuario){    
?>
        <div class="product">
            <img src = "../4. Catalogo/img/<?=$value_usuario["imagem_url"]?>" width = "200px"> 
            <div class="product-content">
                <h3><?=$value_usuario["name"] ?></h3>
                <p><?=$value_usuario["descricao"] ?></p>
            </div>
        </div>        
<?php
        }
?>
    </div>  
    <div class="pagination-container">
        <div class="pagination">
            <i class="fa-solid fa-left-long"></i>
            <button class="btn1">Anterior</button>
            <ul class="pagination-list">
                <li class="link" value="1">1</li>
                <li class="link" value="2">2</li>
                <li class="link" value="3">3</li>
                <li class="link" value="4">4</li>
                <li class="link" value="5">5</li>
                <li class="link" value="6">6</li>
            </ul>
            <button class="btn2">Próximo</button>
            <i class="fa-solid fa-right-long"></i>
        </div>
    </div>
    </section>
    <br><br><br>
</body>
</html>
