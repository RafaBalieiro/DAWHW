<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <!-- Google Fonts Link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Awesome Fonts Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php

    include "../cabecalho.php";
    ?>

    <main class="Main">

        <section class="banner">
            <div class="apresentation">
                <h2><span>Eco</span>Escambo</h2>
                <i class="fa-solid fa-people-carry-box logo" style="color: #f1f2f0;"></i>
                <p>Segurança e praticidade para trocas, é no EcoEscambo! </p>
                <div class="selos">
                    <i class="fa-solid fa-shield-halved" style="color: #037f8c;"></i>
                    <p>Segurança e garantias nas suas trocas!</p>
                    <i class="fa-solid fa-comments" style="color: #037f8c;"></i>
                    <p>Praticidade no contato!</p>
                    <i class="fa-regular fa-thumbs-up" style="color: #037f8c;"></i>
                    <p>Qualidade para suas trocas!</p>
                </div>
            </div>
        </section>

        <section class="catalogo">
            <h2>Nosso Catálogo</h2>
            <div class="filter">
                <p>Mostrar apenas interesses</p>
                <input type="checkbox" name="">
            </div>
            <div class="products-grid">

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 1</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 2</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 3</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 4</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 5</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 6</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 7</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>

                <div class="product">
                    <img src="/DAWHW-master/4. Catalogo/img/MouseAli.png" alt="">
                    <div class="product-content">
                        <h3>Produto 8</h3>
                        <p>descrição aqui!</p>
                        <button class="btn">Estou interessado!</button>
                    </div>
                </div>
            </div>

            <div class="pagination-container">
                <div class="pagination">
                    <i class="fa-solid fa-left-long"></i>
                    <button class="btn1" onclick="backBtn()">Anterior</button>
                    <ul class="pagination-list">
                        <li class="link active" value="1" onclick="activeLink()">1</li>
                        <li class="link" value="2" onclick="activeLink()">2</li>
                        <li class="link" value="3" onclick="activeLink()">3</li>
                        <li class="link" value="4" onclick="activeLink()">4</li>
                        <li class="link" value="5" onclick="activeLink()">5</li>
                        <li class="link" value="6" onclick="activeLink()">6</li>
                    </ul>
                    <button class="btn2" onclick="nextBtn()">Próximo</button>
                    <i class="fa-solid fa-right-long"></i>
                </div>
            </div>

        </section>

        <footer>
            <div class="footer">
                <p>Feito por Rayan Cardoso, Roberto Lencastre e Rafael Barros.</p>
                <p>Projeto EcoEscambo - Turma 3DAW - 2023</p>
                <p>FAETERJ - RIO</p>
            </div>
        </footer>
    </main>
    <!-- SCRIPT JS -->
    <script src="catalogo.js"></script>
</body>

</html>