<?php
    include "produto.php";

    delete_produto($_REQUEST["produto_certeza"]);
?>

<h1>
    Produto deletado com sucesso!
</h1>
<h2>Voltar a página de meus produtos:</h2>
<a href="../5. Meus Produtos/myproducts.php">Meus Produtos</a>
