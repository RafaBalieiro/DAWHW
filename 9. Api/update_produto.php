<?php
    include_once "produto.php";
    $arquivo;
    if(isset($_FILES["imagem"])){

        echo "TESTE ";
        print_r($_FILES["imagem"]);
        $arquivo = $_FILES["imagem"];
        echo "TESTE 2 ".$arquivo["name"];
        if($arquivo["size"]!=0){
            $local = "../4. Catalogo/img/".$arquivo['name'];

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
        else{
            $local = "../4. Catalogo/img/".$_REQUEST['imagem_tmp'];
        }
    }
    put_produtosCaracteristicas($_REQUEST["name"],$arquivo["name"],$_REQUEST["descricao"], $_REQUEST["id_produto"]);
?>

<h1>Editado o arquivo:</h1>
<img src="<?=$local?>" height= '350px' alt="">
<h2><?=$_REQUEST["name"]?></h2>
<p><?=$_REQUEST["descricao"]?></p>
<a href="../5. Meus Produtos/myproducts.php">Voltar para os Meus Produtos</a>



