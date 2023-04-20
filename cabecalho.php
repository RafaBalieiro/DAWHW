<!-- Google Fonts Link-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Awesome Fonts Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    function goPostProduct(){
        window.location.assign("../6. Cadastro de Produtos/cadastrar_produto.php");
    }
</script>

<header>
    <nav class="navbar">
        <i class="fa-solid fa-people-carry-box logo" style="color: #04d932;"></i>
        <ul>
            <li><a href="../4. Catalogo/catalogo.php">Início</a></li>
            <li><a href="../5. Meus Produtos/myproducts.php">Meus Produtos</a></li>
            <li><a href="#">Minhas Transações</a></li>
            <li><button onclick="goPostProduct()" class="btn">Cadastrar Produto</button></li>
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
            <!-- <div class="apresentation">
                <h2><span>Eco</span>Escambo</h2>
                <i class="fa-solid fa-people-carry-box logo" style="color: #04d932;"></i>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div> -->
        </section>
</main>

