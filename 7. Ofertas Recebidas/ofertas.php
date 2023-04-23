<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interesses</title>
    <!-- Jquery -->
    <link rel="stylesheet" href="../4. Catalogo/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>

<?php

    include "../9. Api/interesse.php";
    include "../9. Api/produto.php";
    include "../9. Api/usuario.php";
    $quantidade_interessados = verificarInteresses($_REQUEST["Produto"]);
    
    $nome_produto;
    $descricao_produto;
    $imagem_url_produto;
    get_produtoByProductId($nome_produto, $descricao_produto, $imagem_url_produto,$_REQUEST["Produto"]);
?>
    <h1>Meu produto</h1>
    <table>
        <tr>
            <td>
                <img src="../4. Catalogo/img/<?=$imagem_url_produto?>" width="200px" alt="">
            </td>
            <td style="vertical-align:top">
                <h4 style="margin:0"><?=$nome_produto?></h4>
                <h4 style="margin:3px"><?=$descricao_produto?></h4>
            </td>
        </tr>
    </table>
    <hr>
    

    <h4 style="text-align:left"><?=$quantidade_interessados?> Interessados</h4>
    <span>Interessado</span> 
    <form  class="form-person" action="ofertas.php" method="post">
        <input type="number" name="Usuario" id="Usuario" value="<?php if(isset($_REQUEST['Usuario'])){echo $_REQUEST['Usuario'];}?>" style="display:none;">
        <input type="number" name="Produto" id="Produto" value="<?php if(isset($_REQUEST['Produto'])){echo $_REQUEST['Produto'];}?>" style="display:none;">
        <select onchange={submit()} name="optionUsuario" id="optionUsuario">
        <option value="none">Nenhum</option>

        
<?php
        getUsuariosInteressados($_REQUEST["Produto"], $usuarios_interessados);
    
    foreach($usuarios_interessados as $chave_interessados => $value_interessados){
        $nome_usuario;
        $id_usuario_interessado = $value_interessados["id_usuario_interessado"];
        get_validacao_byId($nome_usuario, $id_usuario_interessado);
?>
        <option id="user<?=$id_usuario_interessado?>" value="<?=$value_interessados["id_usuario_interessado"]?>"><?=$nome_usuario?></option>
<?php
    }
?>
    </select>    
    </form> 
<?php
    if(isset($_REQUEST["optionUsuario"])){
        $produtos_usuario = array();
        get_produtosByUserId($produtos_usuario, $_REQUEST["optionUsuario"]);
        foreach($produtos_usuario as $chave_produto_usuario => $valor_produto_usuario)
        {   
?>  
        <div style="display:flex;flex-direction:row; margin: 10px">
            <div>
                <img width="200px" src="../4. Catalogo/img/<?=$valor_produto_usuario["imagem_url"]?>" alt="">
            </div>
            <div style="padding:15px; width: 400px;">
                <h5 style="margin: 0"><?=$valor_produto_usuario["name"]?></h5>
                <p style="margin: 2px">
                    <?=$valor_produto_usuario["descricao"]?>
                </p>
                
            </div>
            <div style="display: flex; justify-content:center; align-items:center">
                <form action="../8. Analise de Oferta/analise.php">
                    <input type="text" style="display:none" value="<?=$nome_produto?>" id="name_produto_1" name="name_produto_1">
                    <input type="text" style="display:none" value="<?=$descricao_produto?>" id="descricao_produto_1" name="descricao_produto_1">
                    <input type="text" style="display:none" value="<?=$imagem_url_produto?>" id="imagem_produto_1" name="imagem_produto_1">
                    <input type="text" style="display:none" value="<?=$valor_produto_usuario["name"]?>" id="name_produto_2" name="name_produto_2">
                    <input type="text" style="display:none" value="<?=$valor_produto_usuario["descricao"]?>" id="descricao_produto_2" name="descricao_produto_2">
                    <input type="text" style="display:none" value="<?=$valor_produto_usuario["imagem_url"]?>" id="imagem_produto_2" name="imagem_produto_2">
                    <button class="btn" type="submit">Propor</button>
                </form>
            </div>
        </div>
<?php           
        }
    }
?>
    <script>
        $("#user<?php if(isset($_REQUEST["optionUsuario"])) echo $_REQUEST["optionUsuario"]?>").attr('selected','selected');             
        function submit(){
            const form = document.querySelector('.form-person');
            form.submit();
        }
    </script>
    

<?php

    // getInteressadosProduto($_REQUEST["Produto"], $_REQUEST{"Usuario"});
?>
</body>
</html>
