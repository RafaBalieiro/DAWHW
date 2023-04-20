<?php
    include_once "produto.php";
    $arquivo;
    if(isset($_FILES["imagem"])){
        $arquivo = $_FILES["imagem"];

        if($arquivo["size"] > 2097152)
        {
            die("O Arquivo é muito grande, máximo suportado 2MB");
        }

        $caminho = "../4. Catalogo/img/".$arquivo["name"];

        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $caminho);

        if(!$deu_certo){
            die("Por algum motivo a imagem não pode entrar no servidor.");
        }
    }

    post_produto($_POST["name"],$arquivo["name"],$_POST["descricao"], $_POST["id_usuario"]);
?>

 <h1>Postado o arquivo:</h1>
<img src="../4. Catalogo/img/<?=$arquivo["name"]?>" height= '350px' alt="">
<h2><?=$_POST["name"]?></h2>
<p><?=$_POST["descricao"]?></p>
<a href="../5. Meus Produtos/myproducts.php">Voltar para os Meus Produtos</a>

    