<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Cadastro de Produto</title>
</head>

<body>
    <section class="title-page">
        <?php
        $titulo = "Cadastro de Produto";
        include "../cabecalho.php";
        ?>
    </section>


    <section class="product-register">
        <div class="form-container">
            <div class="form-title">
                <i class="fa-solid fa-box-open" style="color: #037f8c;"></i>
                <h2>Pronto para suas trocas?</h2>
                <h3>Cadastre seu produto aqui!</h3>
            </div>
            <form enctype="multipart/form-data" action="../9. Api/post_produto.php" method="post">
                <div class="row">
                    <label for="Nome">Nome</label>
                    <input type="text" name="name" id="name" placeholder=" Digite seu nome...">
                </div>

                <div class="row">
                    <label for="Nome">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="50" rows="5" placeholder="Digite a característica do produto..."></textarea>
                </div>

                <div class="row">
                    <label for="Arquivo">Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>

                <div class="row">
                    <input type="number" name="id_usuario" value="<?php if (isset($_POST["id_usuario"])) echo $_POST["id_usuario"]; ?>" style="display:none;">
                    <button type="submit" class="btn">Cadastrar Produto</button>
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