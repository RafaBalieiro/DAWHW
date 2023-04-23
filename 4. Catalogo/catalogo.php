<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts Link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Awesome Fonts Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php

    include "../cabecalho.php";
    ?>

    <main class="Main">

        <section class="banner">
            <div class="apresentation">
                <h2><span>Eco</span>Escambo</h2>
                <i class="fa-solid fa-people-carry-box logo" style="color: #f1f2f0;"></i>
                <p>Segurança e praticidade para trocas, é no EcoEscambo! </p>
                <div class="selos">
                    <i class="fa-solid fa-shield-halved" style="color: #037f8c;"></i>
                    <p>Segurança e garantias nas suas trocas!</p>
                    <i class="fa-solid fa-comments" style="color: #037f8c;"></i>
                    <p>Praticidade no contato!</p>
                    <i class="fa-regular fa-thumbs-up" style="color: #037f8c;"></i>
                    <p>Qualidade para suas trocas!</p>
                </div>
            </div>
        </section>

        <section class="catalogo">
            <h2>Nosso Catálogo</h2>
            <div class="filter">
                <p>Mostrar apenas interesses</p>
                <input type="checkbox" name="">
            </div>
            <div class="products-grid">

<?php
            include "../9. Api/produto.php";
            include "../9. Api/interesse.php"; 


            if(isset($_COOKIE["id_usuario"]) || isset($_POST["id_usuario"]) || isset($_GET["id_usuario"]) )
                $id_usuario = $_REQUEST["id_usuario"];
            $produtos = array();
            if(isset($_REQUEST["list_value"])){
                $list_value = $_REQUEST["list_value"];
                $number_1 = 4*($list_value-1)+1;
                $number_2 = $list_value*4;
                get_produtosOrdeningBy($produtos, $id_usuario, $number_1, $number_2);
            }
            else{
                get_produtosOrdeningBy($produtos, $id_usuario, 1, 4);
            }
            
            foreach($produtos as $value_produto){ 
                $interesse_usuario = verificarInteresseUsuario($value_produto["id_produto"], $_REQUEST["id_usuario"]);
?>
                <div class="product">
                    <img src = "../4. Catalogo/img/<?=$value_produto["imagem_url"]?>" width = "200px"> 
                    <div class="product-content">
                        <form target="contato" action="../9. Api/update_interesse.php" method="post">
                            <h3><?=$value_produto["name"] ?></h3>
                            <p><?=$value_produto["descricao"] ?></p>

<?php
                                
                                if($interesse_usuario == 0)
                                {
?>
                                    <input type="text" style="display:none" value="<?=$_REQUEST["id_usuario"]?>" id="Usuario" name ="Usuario">
                                    <button name="Produto" onClick={atualizar()} id="Produto" value="<?=$value_produto["id_produto"]?>" class="btn">Estou interessado!</button>
<?php

                                }
                                else{
?>
                                    <input type="text" style="display:none" value="<?=$_REQUEST["id_usuario"]?>" id="Usuario" name ="Usuario">
                                    <button name="Produto" onClick={atualizar()} id="Produto" value="<?=$value_produto["id_produto"]?>" class="btn">Não Estou Interessado!</button>
<?php
                                }
?>
                        </form>
                    </div>
                </div>        
<?php
            }
?>            
            </div>
            <iframe style="display:none;" name="contato"></iframe>
            
                <div class="pagination-container">
                    <div class="pagination">
                        <i class="fa-solid fa-left-long"></i>
                        <button class="btn1" onclick="backBtn()">Anterior</button>
                        <form action="catalogo.php" method="GET" class="formlist">
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
            </form>
        </section>

        <footer>
            <div class="footer">
                <p>Feito por Rayan Cardoso, Roberto Lencastre e Rafael Barros.</p>
                <p>Projeto EcoEscambo - Turma 3DAW - 2023</p>
                <p>FAETERJ - RIO</p>
            </div>
        </footer>
    </main>
    <!-- SCRIPT JS -->
    <script>
        function atualizar() {
            setTimeout(function(){ 
                location.reload();
            }, 300);
        }
    </script>
    <script src="catalogo.js"></script>
</body>

</html>
