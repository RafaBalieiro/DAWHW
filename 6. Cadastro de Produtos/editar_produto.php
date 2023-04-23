<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../4. Catalogo/style.css">

    <title>Edite Seu Produto</title>
</head>
<?php
    include "../9. Api/produto.php";
    $name;
    $descricao;
    $imagem_url;
    get_produtoByProductId($name, $descricao,$imagem_url, $_REQUEST["Produto"]);
?>
<body>
    <section class="title-page">
        <?php
        $titulo = "Edite Seu Produto";
        include "../cabecalho.php";
        ?>
    </section>

    <section class="product-register">
        <div class="form-container">
            <div class="form-title">
                <i class="fa-solid fa-box-open" style="color: #037f8c;"></i>
            </div>
            <form enctype="multipart/form-data" action="../9. Api/update_produto.php" method="post">
                <div class="row">
                    <label for="Nome">Nome</label>
                    <input type="text" name="name" id="name" value="<?=$name?>" placeholder=" Digite seu nome...">
                </div>

                <div class="row">
                    <label for="Nome">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="50" rows="5" value="<?=$descricao?>" placeholder="<?=$descricao?>"></textarea>
                </div>

                <div class="row">
                    <label for="Arquivo">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                    <input type="text" name="imagem_tmp" value="<?=$imagem_url?>" id="imagem_tmp" style="display:none">
                </div>

                <div class="row">
                    <input type="number" name="id_produto" value="<?php if (isset($_REQUEST["Produto"])) echo $_REQUEST["Produto"]; ?>" style="display:none;">
                    <button type="submit" class="btn">Editar Produto</button>
                </div>
            </form>
        </div>

    </section>

    <footer>
        <div class="footer">
            <p>Feito por Rayan Cardoso, Roberto Lencastre e Rafael Barros.</p>
            <p>Projeto EcoEscambo - Turma 3DAW - 2023</p>
            <p>FAETERJ - RIO</p>
        </div>
    </footer>

</body>

</html>
