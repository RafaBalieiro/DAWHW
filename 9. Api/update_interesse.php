<?php
    if(isset($_REQUEST["Produto"])){
        $id_produto = $_REQUEST["Produto"];
    }

    if(isset($_REQUEST["Usuario"])){
        $id_usuario = $_REQUEST["Usuario"];
    }

    include "interesse.php";

    post_interesse($id_produto,$id_usuario);
?>
