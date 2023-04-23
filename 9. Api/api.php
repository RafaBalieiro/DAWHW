<?php
function getAll(){
    $produtos = array();
    
    if (isset($_COOKIE['product'])) {
        foreach ($_COOKIE['product'] as $numero_usuario => $valor) {
            $produtos[$numero_usuario] = json_decode($valor);
        }
    }

    foreach ($produtos as $chave => $valor_objeto){
        if(isset($produtos[$chave]->Produtos)){
            $produtos_por_usuario[$chave] = $produtos[$chave]->Produtos;
        }
    }

    foreach ($produtos_por_usuario as $chave_usuario => $valor_array){
        foreach($valor_array as $chave => $valor){
            echo $chave_usuario." - ";
            echo $valor_array[$chave]->Produto;
            echo "<br>";
        }
    }
}

function getAllWithoutId($numero_determinado, &$valor_array_ponteiro,){
    $produtos = array();
    
    if (isset($_COOKIE['product'])) {
        foreach ($_COOKIE['product'] as $numero_usuario => $valor) {
            $produtos[$numero_usuario] = json_decode($valor);
        }
    }

    foreach ($produtos as $chave => $valor_objeto){
        if(isset($produtos[$chave]->Produtos)){
            $produtos_por_usuario[$chave] = $produtos[$chave]->Produtos;
        }
    }

    $valor_array_ponteiro = $produtos_por_usuario;
}

function getPerId($numero_determinado){
    $produtos = array();
    
    if (isset($_COOKIE['product'])) {
        foreach ($_COOKIE['product'] as $numero_usuario => $valor) {
            $produtos[$numero_usuario] = json_decode($valor);
        }
    }

    foreach ($produtos as $chave => $valor_objeto){
        if(isset($produtos[$chave]->Produtos)){
            $produtos_por_usuario[$chave] = $produtos[$chave]->Produtos;
        }
    }

    foreach ($produtos_por_usuario as $chave_usuario => $valor_array){
        foreach($valor_array as $chave => $valor){
            if($valor_array[$chave]->Usuario == $numero_determinado){   
                echo $chave_usuario." - ";
                echo $valor_array[$chave]->Produto;
                echo "<br>";
            }
        }
    }
}

function put_produtos
