<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
    <h1 class="options"><a href="catalogo.php" class="catalogo">Catálogo</a>/<a href="../5. Meus Produtos/myproducts.php" class="my_products" >Meus Produtos</a></h1>
    <div style ="display: flex; gap: 10px; justify-content:center">
    <?php
        include "../9. Api/produto.php";

        $id_usuario = $_COOKIE["id_usuario"];
        $usuarios = array();
        get_produtosByUserId($usuarios, $id_usuario);
        foreach($usuarios as $value_usuario){    
?>
        <div style = "display: flex; gap:20px;flex-direction: column;background-color: white;box-shadow: 2px 2px 2px 2px black;border-radius: 10px;padding: 20px;justify-content: top;align-items: center;">
            <h3><?=$value_usuario["name"] ?></h3>
            <img src = "../4. Catalogo/img/<?=$value_usuario["imagem_url"]?>" width = "200px"> 
            <!-- <div>
                <button
                    <?php
                        if($value_usuario["interesse"] == 0){
                            echo "style = 'background-color: green; color: white'> Tenho Interesse";
                        }
                        else {
                            echo "style = 'background-color: red; color: white'> Não tenho interesse";
                        }
                    ?>
                </button>
            </div> -->
        </div>        
<?php
        }
?>
    </div>  
    <br><br><br>
    <form action="../6. Cadastro de Produtos/cadastrar_produto.php" method = "post">
        <input type="number" name="id_usuario" id="id_usuario" value="<?=$_COOKIE["id_usuario"]?>" style="display:none;">
        <button type="submit" class = "cadastrar_produto">Cadastrar Produto</button>
    </form>
    <br><br>
</body>
</html>
