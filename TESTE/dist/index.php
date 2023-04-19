<!DOCTYPE html>
<html lang="en" class="Noscript">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Mostly CSS Responsive Carousel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>(() => { const d = document.documentElement; d.classList.remove("Noscript"), d.classList.add("Script") })();</script>
  <link rel="stylesheet" href="../TESTE/dist/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->

    <section class="Carousel" id="carousel" tabindex="-1">
      <h2 class="Hidden">Carousel</h2>
      <?php
    foreach ($array_valores as $chave_usuario => $valor_array){
        foreach($valor_array as $chave => $valor){
          if($valor_array[$chave]->Usuario != 5){ 
              // IMAGEM ADICIONAR
              echo "<article class='Card Card--overlay Card--square' id='card-1'><div class='Card__media'>
                  <img class='Card__image' alt='Card image description' height='250' loading='lazy'
                  src='".$valor_array[$chave]->ImagemUrl."'></div>
                <div class='Card__main'>
                  <h2 class='Card__heading'><a class='Card__link' href='#'>".$valor_array[$chave]->Produto."</a></h2>
                  <p>Tenho Interesse</p>
                </div>
                </article>";

              // echo "<div class= 'inside-content'>";
              // echo "<br>"."<img src='".$array_valores[$chave]->ImagemUrl."'width = '150px'>"."<br>";
              // Nome do Produto
              // echo "<span>".$array_valores[$chave]->Produto."</span>";
          }
      }
    }
      ?>
    </section>
    <!--/Carousel-->

    <nav class="Pagination">
      <h2 class="Hidden">Carousel Navigation</h2>
      <button class="Arrow" type="button" aria-controls="carousel" disabled>
        <svg width="16" height="16" viewBox="0 0 16 16" role="presentation">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
        <span class="Hidden">Previous slide</span>
      </button>
      <button class="Arrow" type="button" aria-controls="carousel" disabled>
        <svg width="16" height="16" viewBox="0 0 16 16" role="presentation">
          <path fill-rule="evenodd"
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
        </svg>
        <span class="Hidden">Next slide</span>
      </button>
      <div class="Dots">
        <a href="#card-1" class="Dot" tabindex="-1"><span class="Hidden">Slide 1</span></a>
        <a href="#card-2" class="Dot" tabindex="-1"><span class="Hidden">Slide 2</span></a>
        <a href="#card-3" class="Dot" tabindex="-1"><span class="Hidden">Slide 3</span></a>
        <a href="#card-4" class="Dot" tabindex="-1"><span class="Hidden">Slide 4</span></a>
        <a href="#card-5" class="Dot" tabindex="-1"><span class="Hidden">Slide 5</span></a>
        <a href="#card-6" class="Dot" tabindex="-1"><span class="Hidden">Slide 6</span></a>
        <a href="#card-7" class="Dot" tabindex="-1"><span class="Hidden">Slide 7</span></a>
        <a href="#card-8" class="Dot" tabindex="-1"><span class="Hidden">Slide 8</span></a>
      </div>
    </nav>
    <!--/Pagination-->

  </main>
  <!--/Main-->
  <!-- partial -->
  <script src="../TESTE/dist/script.js"></script>

</body>

</html>
