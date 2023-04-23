<!-- Google Fonts Link-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Awesome Fonts Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<header>
    <nav class="navbar">
        <i class="fa-solid fa-people-carry-box logo" style="color: #04d932;"></i>
        <ul>
            <li>
                <form action="../4. Catalogo/catalogo.php" method = "post">
                    <input type="number" name="id_usuario" id="id_usuario" value="<?php if(isset($_POST['id_usuario'])){echo $_POST['id_usuario'];}if(isset($_COOKIE['id_usuario'])){echo $_COOKIE['id_usuario'];}?>" style="display:none;">
                    <button type="submit" class="href">Início</button>
                </form>
            </li>
            <li><a class="href" href="../5. Meus Produtos/myproducts.php">Meus Produtos</a></li>
            <li><a class="href" href="#">Minhas Transações</a></li>
            <li>
                <form action="../6. Cadastro de Produtos/cadastrar_produto.php" method = "post">
                    <input type="number" name="id_usuario" id="id_usuario" value="<?php if(isset($_POST['id_usuario'])){echo $_POST['id_usuario'];}if(isset($_COOKIE['id_usuario'])){echo $_COOKIE['id_usuario'];}?>" style="display:none;">
                    <button type="submit" class="btn">Cadastrar Produto</button>
                </form>
            </li>
        </ul>

    </nav>
</header>
    
<main class="Main">
    <section class="banner">
            <?php
                if(isset($titulo)){
                    echo "<h2>$titulo</h2>";
                }
                else{
                    if(isset($nome)){
                        echo "<h2>Bem vindo $nome!</h2>";
                    }
                }

                
            ?>
        </section>
</main>

