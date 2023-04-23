<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../4. Catalogo/style.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <?php

        $nome = null;
        $id_usuario = 0;

        include "../9. Api/usuario.php";

        if(isset($_COOKIE["id_usuario"])){
            $id_usuario = $_COOKIE["id_usuario"];
            get_validacao_byId($nome, $id_usuario);
        }
        
        if(isset($_POST["isRegister"])){
            $found = 0;
            $email = $_POST["email"];
            $nome = $_POST["name"];
            $senha = $_POST["password"];
            get_validacao($email, $senha, $nome, $id_usuario, $found);
            if($found == 0){
                post_user($_POST["name"],$_POST["email"],$_POST["confirm-password"]);
            }
            else{
?>
                    <h1>Esse cadastro já existe</h1>
                    <a href="../1. Login/login.html">Logar</a>
<?php
            }
        } else {
            if(isset($_POST["email"]) && isset($_POST["password"])){
                $email = $_POST["email"];
                $nome = null;
                $senha = $_POST["password"];
                $found = 0;
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
    <div class="container">
        <div id="tem_certeza" class="pop_up none">
            <h1>Tem certeza que deseja excluir?</h1>
            <div class="container_2">
                <button class="btn" onClick={fecharAviso()}>Não</button>
                <form action="../9. Api/deletar_produto.php">
                    <input type="text" id="produto_certeza" name="produto_certeza" style="display:none">
                    <button onclick={atualizar(1000)} class="btn" type="submit">Sim</button>
                </form>
            </div>
        </div>
    </div>
    <section  class="catalogo">
    <div class="products-grid" >
    <?php
        include "../9. Api/interesse.php"; 
        include "../9. Api/produto.php";

        $id_usuario = $_COOKIE["id_usuario"];
        $produtos = array();
        if(isset($_REQUEST["list_value"])){
            $list_value = $_REQUEST["list_value"];
            $number_1 = 4*($list_value-1)+1;
            $number_2 = $list_value*4;
            get_produtosOrdeningByWithUserId($produtos, $id_usuario, $number_1, $number_2);
        }
        else{
            get_produtosOrdeningByWithUserId($produtos, $id_usuario, 1, 4);
        }
        foreach($produtos as $value_produtos){                                              
            $interesse_usuario = verificarInteresses($value_produtos["id_produto"]);

?>
            <div class="product">
                <img src = "../4. Catalogo/img/<?=$value_produtos["imagem_url"]?>" width = "200px"> 
                <div class="product-content">
                    <h3><?=$value_produtos["name"] ?></h3>
                    <p><?=$value_produtos["descricao"] ?></p>
<?php
                                if($interesse_usuario == 0)
                                {
                                    ?>
                                <form action="../6. Cadastro de Produtos/editar_produto.php" method="post">
                                    <button name="Produto" id="Produto" value="<?=$value_produtos["id_produto"]?>" class="btn">Editar produto</button>
                                </form>
                                <button name="ProdutoExcluir" onClick={abrirAviso(<?=$value_produtos["id_produto"]?>)} id="ProdutoExcluir" value="<?=$value_produtos["id_produto"]?>" class="btn">Excluir produto</button>
<?php

                                }
                                else{
?>
                                <form action="../7. Ofertas Recebidas/ofertas.php" method="post">
                                    <input type="text" style="display:none" value="<?=$id_usuario?>" id="Usuario" name ="Usuario">
                                    <button name="Produto" id="Produto" value="<?=$value_produtos["id_produto"]?>" class="btn">Ver interesses</button>
                                </form>
                                    <button name="ProdutoExcluir" onClick={abrirAviso(<?=$value_produtos["id_produto"]?>)}  id="ProdutoExcluir" value="<?=$value_produtos["id_produto"]?>" class="btn">Excluir produto</button>
<?php
                                }
?>
                </div>
            </div>        
<?php
        }
?>
        </div>  
    <div class="pagination-container">
        <div class="pagination">
            <i class="fa-solid fa-left-long"></i>
            <button class="btn1" onclick="backBtn()">Anterior</button>
            <form action="myproducts.php" method="GET" class="formlist">
            <ul class="pagination-list">
                <input type="number" name="id_usuario" id="id_usuario" value="<?php if(isset($_REQUEST['id_usuario'])){echo $_REQUEST['id_usuario'];}?>" style="display:none;">
                <input type="text" name="list_value" id="list_value" value="<?php if(isset($_REQUEST["list_value"])) echo $_REQUEST["list_value"];?>" style="display:none">
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 1) echo "active";?>" value="1" id="enable" name="enable" onclick="activeLink()">1</li>
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 2) echo "active";?>" value="2" onclick="activeLink()">2</li>
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 3) echo "active";?>" value="3" onclick="activeLink()">3</li>
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 4) echo "active";?>" value="4" onclick="activeLink()">4</li>
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 5) echo "active";?>" value="5" onclick="activeLink()">5</li>
                <li class="link <?php if(isset($_REQUEST["list_value"]) && $_REQUEST["list_value"] == 6) echo "active";?>" value="6" onclick="activeLink()">6</li>
            </ul>
            </form>
            <button class="btn2" onclick="nextBtn()">Próximo</button>
            <i class="fa-solid fa-right-long"></i>
        </div>
    </div>
    </section>
    <br><br><br>
    <script>
        function atualizar(tempo = 300) {
            setTimeout(function(){ 
                location.reload();
            }, tempo);
        }

        function abrirAviso(valor){
            $("#tem_certeza").addClass("block");
            $("#tem_certeza #produto_certeza").attr("value", valor);
        }

        function fecharAviso(){
            $("#tem_certeza").removeClass("block");
            $("#tem_certeza").addClass("none");
        }
    </script>
    <script src="../4. Catalogo/catalogo.js"></script>
</body>
</html>
