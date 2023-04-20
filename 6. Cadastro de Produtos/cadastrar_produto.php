<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <?php
        $titulo = "Cadastro de Produto";
        include "../cabecalho.php";
    ?>
    <br><br>
    <form enctype="multipart/form-data" action="../9. Api/post_produto.php" method="post">
        <label for="Nome">Nome</label>
        <input type="text" name="name" id="name placeholder="Digite seu nome...">
        <br> <br>
        <label for="Arquivo">Imagem</label> <br>
        <input type="file" name="imagem" id="imagem">
        <br> <br>
        <label for="Nome">Descricao</label> <br>
        <textarea name="descricao" id="descricao" cols="50" rows="5" placeholder="Digite a característica do produto..."></textarea>
        <br><br>
        <input type="number" name="id_usuario" value="<?php if(isset($_POST["id_usuario"])) echo $_POST["id_usuario"];?>" style="display:none;">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
