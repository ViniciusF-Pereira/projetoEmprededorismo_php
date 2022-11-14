<?php


session_start();
ob_start();


include_once 'php/conexao.php';
include_once 'carrinho/carinhoScript.php';





if ($_SESSION['id'] != true) {
  $_SESSION['id'] = "0";
  $__usuario_conectado =  $_SESSION['id'];
} else {
  $__usuario_conectado =  $_SESSION['id'];
}



echo '

<input class="Section_ID" type="" name="Section_ID" placeholder="Section_ID"id="" value="" readonly>

';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dados)
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />

  <!-- FONT AWESOME BRAND TAGS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/brands.min.css" integrity="sha512-bSncow0ApIhONbz+pNI52n0trz5fMWbgteHsonaPk42JbunIeM9ee+zTYAUP1eLPky5wP0XZ7MSLAPxKkwnlzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <!-- Script JAVASCRIPT para o carousel -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>WOLF FIT</title>
  <link rel="shortcut icon" href="./images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png" />
</head>

<body>


  <header>
    <p class="primeiroTitulo ">Ganhe 10% + FRETE GRÁTIS na primeira compra com o cupom: BEMVINDO</p>
    <p class="segundoTitulo">
      Frete Grátis, vide as regras | 1ª Troca sem custo* | Entrega realizada em até 7 dias úteis</p>
    <?php
    if ($__usuario_conectado != "0") {


      echo    '<p class="primeiroTitulo ">Bem Vindo ' . $_SESSION['nome'] . '</p>';
    }
    ?>
  </header>


  <nav>
      <div class="navContainer">
        <!-- Mobile Hamburguer -->
        <button id="hamburguerBtn" class="navBtn">
          <i class="fa fa-bars"></i>
        </button>

        <a href="index.php" class="logoArea">
          <img
            src="./images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png"
            alt="Logo"
         
          />
          <span class="companyName">Wolf-Fit</span>
        </a>

        <div class="navMenu">
          <ul class="navItems">
            <li>
              <div id="produtosListaDropDown">
                <a> <span>Destaques</span> <i class="fa fa-caret-down"></i> </a>
                <ul id="produtosListaDropDownUl">
                  <li id="promocaoBtn">Promoções</li>
                  <li id="maisVendidosBtn">Mais vendidos</li>
                </ul>
              </div>
            </li>

            <li><a href="./products/produtos.php">Produtos</a></li>

            <li>
              <a href="./contato/contato.php"> Contato </a>
            </li>

            <li>
              <a href="sobre/sobre.php"> Sobre </a>
            </li>
          </ul>

          <div class="navItems2">
            <button class="navBtn">
            <?php
            if ($__usuario_conectado == "0") {

              echo  '<a href="user/login.php"> <i class="fa fa-user"></i></a></span>';
            } else {

              echo  '<span class="menuItem"><a href="user/dashboard.php">Configurações</a></span>';

              echo    '<a href="user/sair.php">SAIR</a>';
            }
            ?>
            </button>
            <button id="abrirCarrinhoBtn" class="navBtn">
              <i class="fa fa-cart-shopping"></i>
              <span class="nav2ItemNome">Carrinho</span>
            </button>
          </div>
        </div>
      </div>
    </nav>



  <!-- Fim Menu -->
  <section class="carroselSection">
    <section class="meio">
      <div class="sombraSobreFoto"></div>

      <?php
      $result_carousels = "SELECT * FROM carousels WHERE situacao_id=1 ORDER BY ordem ASC";
      $resultado_carousels = mysqli_query($index, $result_carousels);
      if (($resultado_carousels) and ($resultado_carousels->num_rows != 0)) {
      ?>
        <div class="row featurette">
          <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                $qnt_slide = mysqli_num_rows($resultado_carousels);
                $cont_marc = 0;
                while ($cont_marc < $qnt_slide) {
                  echo "<li id='valor-car' data-target='#myCarousel' data-slide-to='$cont_marc'></li>";
                  $cont_marc++;
                }
                ?>
              </ol>
              <div class="carousel-inner">
                <?php
                $cont_slide = 0;
                while ($row_slide = mysqli_fetch_assoc($resultado_carousels)) {
                  $active = "";
                  if ($cont_slide == 0) {
                    $active = "active";
                  }
                  echo "<div class='carousel-item $active'>";
                  echo "<img id='Imagem-Carousel' src=" . $row_slide['imagem'] . " alt='" . $row_slide['nome'] . "'>";
                  echo "</div>";
                  $cont_slide++;
                }
                ?>

              </div>

            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>


          </div>

          <div class="col-md-6">
            <?php
            $cont_conteudo = 0;
            $resultado_carousels = mysqli_query($index, $result_carousels);
            while ($row_slide = mysqli_fetch_assoc($resultado_carousels)) {
              if ($cont_conteudo == 0) {
                $ap_cont = "block";
              } else {
                $ap_cont = "none";
              }
              echo "<div class='carousel-caption d-none d-md-block'>";
              echo "<div class='imagem" . $cont_conteudo . " conteudo' style='display: $ap_cont;'>";
              echo "<h3 class=titulo_carrousel>" . $row_slide['titulo_lat'] . "</h3>";
              echo "<p class='texto_carrousel'>" . $row_slide['texto_lat'] . "</p>";
              echo "</div>";
              echo "</div>";
              $cont_conteudo++;
            }
            ?>
          </div>


        <?php } ?>
        </div>
    </section>

  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      //tempo de duração do slide
      $('.carousel').carousel({
        interval: 7000
      });

      $('#myCarousel').on('slid.bs.carousel', function() {
        //Receber o valor do atributo data-slide-to quando estiver ativo
        var numeroSlide = $('#valor-car.active').data('slide-to');
        //$("#msg").html(numeroSlide);

        //Ocultar a descrição do slide anterior
        $('.conteudo').hide();

        //Apresentar o conteúdo do slide atual
        $('.imagem' + numeroSlide).show();
      });
    });
  </script>

  <!-- Produtos mais vendidos -->
  <section class="maisVendidosSection">
    <h3 class="maisVendidosTitulo">Mais vendidos</h3>

    <div class="maisVendidos maisVendido1">
      <div class="baner">
        <div class="overlay"></div>
        <p>Mais vendidos em whey protein</p>
        <button class="verMaisBtn">Ver +</button>
      </div>

      <section class="listaDeProdutos">
        <div class="cardProduto produto1">
          <img src="images/gold-whey.png" alt="Pote de creatina" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Whey gold Standart</h6>
            <h5 class="preçoProduto">R$349,90</h5>
          </div>
        </div>

        <div class="cardProduto produto2">
          <img src="images/gold-whey.png" alt="Pote de creatina" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Whey gold Standart</h6>
            <h5 class="preçoProduto">R$349,90</h5>
          </div>
        </div>

        <div class="cardProduto produto3">
          <img src="images/gold-whey.png" alt="Pote de creatina" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Whey gold Standart</h6>
            <h5 class="preçoProduto">R$349,90</h5>
          </div>
        </div>

        <div class="cardProduto produto4">
          <img src="images/barra-proteina.png" alt="Pote de creatina" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Whey Protein bar</h6>
            <h5 class="preçoProduto">R$19,90</h5>
          </div>
        </div>
      </section>
    </div>

    <div class="maisVendidos maisVendido2">
      <section class="listaDeProdutos">
        <div class="cardProduto produto1">
          <img src="images/creatina2.jpg" alt="Pote de creatina" />

          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Creatina hardcore</h6>
            <h5 class="preçoProduto">R$299,90</h5>
          </div>
        </div>

        <div class="cardProduto produto2">
          <img src="images/creatina2.jpg" alt="Pote de creatina" />

          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Creatina hardcore</h6>
            <h5 class="preçoProduto">R$299,90</h5>
          </div>
        </div>

        <div class="cardProduto produto3">
          <img src="images/creatina2.jpg" alt="Pote de creatina" />

          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Creatina hardcore</h6>
            <h5 class="preçoProduto">R$299,90</h5>
          </div>
        </div>

        <div class="cardProduto produto4">
          <img src="images/barra-proteina.png" alt="Pote de creatina" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Whey Protein bar</h6>
            <h5 class="preçoProduto">R$19,90</h5>
          </div>
        </div>
      </section>

      <div class="baner">
        <div class="overlay"></div>
        <p>Mais vendidos em Creatina</p>
        <button class="verMaisBtn">Ver +</button>
      </div>
    </div>

    <div class="maisVendidos maisVendido3">
      <div class="baner">
        <div class="overlay"></div>
        <p>Mais vendidos em equipamentos</p>
        <button class="verMaisBtn">Ver +</button>
      </div>

      <section class="listaDeProdutos">
        <div class="cardProduto produto1">
          <img src="images/peso.png" alt="Halteres 10kg" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Halteres 10Kg</h6>
            <h5 class="preçoProduto">R$399,90</h5>
          </div>
        </div>

        <div class="cardProduto produto2">
          <img src="images/Pesos-academia-pretos-Png.png" alt="Halteres 30kg" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Halteres 30Kg</h6>
            <h5 class="preçoProduto">R429,90</h5>
          </div>
        </div>

        <div class="cardProduto produto3">
          <img src="images/peso.png" alt="Halteres 10kg" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Halteres 10Kg</h6>
            <h5 class="preçoProduto">R$399,90</h5>
          </div>
        </div>

        <div class="cardProduto produto4">
          <img src="images/Pesos-academia-pretos-Png.png" alt="Halteres 30kg" />
          <div class="cardProdutoInfo">
            <h6 class="tituloProduto">Halteres 30Kg</h6>
            <h5 class="preçoProduto">R$429,90</h5>
          </div>
        </div>
      </section>
    </div>
  </section>

  <!-- Categoria de produtos -->
  <div class="categoriaDeProdutosContainer">
    <div class="categoriaDeProdutos">
      <div class="overlay"></div>
      <h3 class="categoriaDeProdutosTitulo">Suplementos</h3>
    </div>

    <div class="categoriaDeProdutos">
      <div class="overlay"></div>
      <h3 class="categoriaDeProdutosTitulo">Equipamentos</h3>
    </div>
  </div>

  <section class="descricaoProdutosSection wheyDescricao">
    <h3>WheyProtein</h3>

    <article class="produtoDescricao">
      <div class="descricaoTexto">
        <h5 class="descricaoTitulo">Para que serve o Whey protein?</h5>
        <p class="descricaoParagrafo">
          O Whey Protein serve para recuperação muscular após exercícios
          físicos de alta intensidade. O suplemento aumenta a força muscular e
          acelera a regeneração das fibras musculares após atividades físicas
          intensas. Com a ajuda do Whey, o processo de lesão e recuperação do
          músculo faz com que ele cresça.
        </p>
      </div>
      <img src="images/combo-massa-muscular.png" alt="3 suplementos whey" />
    </article>

    <article class="produtoDescricao">
      <div class="descricaoTexto">
        <h5 class="descricaoTitulo">
          Qual o melhor jeito de consumir o Whey protein?
        </h5>
        <p class="descricaoParagrafo">
          A melhor forma de ingerir o Whey Protein Concentrado é com água,
          porque a água facilita a absorção da proteína. Quando ingerida com
          leite, por exemplo, a digestão acontece de forma mais lenta. Não
          ultrapasse a quantidade de 300 ml de líquidos na preparação, mais
          que isso pode prejudicar a eficiência do produto.
        </p>
      </div>
      <img src="images/gold-whey.png" alt="3 suplementos whey" />
    </article>
  </section>

  <footer>
    Wolf-Fit suplementos LTDA©2022
  </footer>


<script src="script/carrinho.js"></script>

</body>


</html>