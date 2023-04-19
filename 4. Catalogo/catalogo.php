
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
        if(isset($_POST["name"])){
            $nome = $_POST["name"];
            $usuario = $_POST["usuario"];
        }
        else{
            if(isset($_POST["thisClient"])){
                $client = json_decode($_POST["thisClient"], true);
                setcookie("thisClient", json_encode($client));
            }
            else{
                $client = json_decode($_COOKIE["thisClient"]);
            }
            foreach ($client as $chave => $elemento){
                if($chave == "Nome"){
                    $nome = $elemento;
                }
                if($chave == "Usuario"){
                    $usuario = $elemento;
                }
            }
        }
        include "../cabecalho.php";
    ?>
    <main class="Main">
    <h1 class="options"><a href="catalogo.php" class="catalogo">Catálogo</a>/<a href="../5. Meus Produtos/myproducts.php" class="my_products" >Meus Produtos</a></h1>
    <?php
        include "produtosCookie.php";
        include "../9. Api/api.php";
        $array_valores = array();
        echo "<div class = 'content'>";
        $numero_Id=3;
        getAllWithoutId($numero_Id, $array_valores);
        echo "</div>";
        include "../TESTE/dist/index.php";
    ?>
    <br><br><br>
    <a href="cadastrar_produto.php" class = "cadastrar_produto">Cadastrar Produto</a>
    <br><br>
</body>
</html>

