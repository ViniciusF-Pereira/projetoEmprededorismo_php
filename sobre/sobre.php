<?php


session_start();
ob_start();





include_once '../php/conexao.php';




?>

<!DOCTYPE html>
<html lang="pt-br">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

	<link
      href="https://fonts.googleapis.com/css?family=Inter&display=swap"
      rel="stylesheet"
    />

    <!-- FONT AWESOME BRAND TAGS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/brands.min.css"
      integrity="sha512-bSncow0ApIhONbz+pNI52n0trz5fMWbgteHsonaPk42JbunIeM9ee+zTYAUP1eLPky5wP0XZ7MSLAPxKkwnlzw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <!-- Script JAVASCRIPT para o carousel -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="sobre.css" />

    <link
      href="https://fonts.googleapis.com/css?family=Inter&display=swap"
      rel="stylesheet"
    />

    <!-- FONT AWESOME BRAND TAGS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/brands.min.css"
      integrity="sha512-bSncow0ApIhONbz+pNI52n0trz5fMWbgteHsonaPk42JbunIeM9ee+zTYAUP1eLPky5wP0XZ7MSLAPxKkwnlzw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <title>Sobre</title>
    <link
      rel="shortcut icon"
      href="../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png"
    />
  </head>

  <body>
    <header>
       <!-- Barra de navegação ------------------------------------------------------  Barra de navegação    -->
 <nav>
    <div class="navContainer">
        <!-- Mobile Hamburguer -->
        <button id="hamburguerBtn" class="navBtn">
          <i class="fa fa-bars"></i>
        </button>

        <a href="../index.php" class="logoArea">
          <img
            src="../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png"
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

            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="../products/produtos.php">Produtos</a>
            </li>
            <li>
                <a href="../contato/contato.php">Contato</a>
            </li>

            <li>
                <a href="sobre.php">Sobre</a>
            </li>
          </ul>

          <div class="navItems2">
            <button class="navBtn">
            <?php
                      if( $_SESSION['id'] != 0 ||  $_SESSION['id']!= ""){
                
                  
    
                        echo  '<a href="../user/login.php"> <i class="fa fa-user"></i></a></span>';                      }
                       else {
          
                        echo  '<span class="menuItem"><a href="../user/dashboard.php">Configurações</a></span>';
          
                        echo    '<a href="../user/sair.php">SAIR</a>';
                      
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
    </header>

    <div class="quemSomos">
      <h1 class="titulo">Quem somos?</h1>
    </div>

    <div class="textoContainer">
      <h2>
        Wolf fit é uma empresa focada na venda de suplementos, equipamentos e
        acessórios.
      </h2>

      <p>
        Nossos produtos são vendidos principalmente por
        <strong>e-commerce</strong>, e são voltados ao público de academia, que
        leva sua <strong>saúde</strong> e <strong>boa forma física</strong> como
        estilo de vida.
      </p>

      <h3>Missão</h3>

      <p>
        Lutar <strong>contra o sedentarismo</strong>, e elevar o nível do treino
        das pessoas com nossos suplementos e equipamentos de
        <strong>alta qualidade</strong> para que seja atingindo o melhor
        desempenho possível.
      </p>

      <h3>Visão</h3>

      <p>
        Consolidar nossos produtos e serviços, em uma posição de
        <strong>líder de mercado</strong>. Tendo nossa marca reconhecida em todo
        território nacional como referência de
        <strong>maior qualidade</strong> e <strong>conforto</strong> que nossos
        produtos oferecem.
      </p>
    </div>

    <!-- Footer -->
    <footer>
      <div class="cadastroEmail">
        <p>
          <i class="fas fa-envelope"></i> RECEBA OFERTAS E NOVIDADES POR E-MAIL:
        </p>

        <form>
          <input type="email" placeholder="E-mail" />
          <button class="cadastrarBtn">Cadastrar</button>
        </form>
      </div>

      <div class="creditos">
        <div class="criadores">
          <h5>Criadores</h5>
          <a href="https://github.com/Alcantara-Diego" target="_blank"
            >Diego Alcântara</a
          >
          <a href="https://github.com/jhoneshark" target="_blank">Jhoneshark</a>
          <a href="https://github.com/Claitonok" target="_blank"
            >Claiton Silva</a
          >
          <a href="https://github.com/Digao46" target="_blank">Diogo Melo</a>
        </div>

        <div class="extras">
          <h5>Extras</h5>
          <a href="https://www.instagram.com/wolffit848/" target="_blank"
            >Instagram <i class="fa-brands fa-instagram"></i
          ></a>
          <a href="/components/sobre/sobre.html"> Sobre Nós</a>
          <a href="/components/contato/contato.html">Fale Conosco</a>
        </div>

        <div class="imagens">
          <h5>Imagens</h5>

          <a
            href="https://unsplash.com/@sxoxm?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"
            >Sven Mieke</a
          >

          <a
            href="https://www.freepik.com/free-psd/protein-powder-container-mockup_17197932.htm#query=whey&position=5&from_view=search&track=sph"
            target="_blank"
            >xvector</a
          >

          <a
            href="https://unsplash.com/@visualsbyroyalz?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"
            target="_blank"
            >Anastase Maragos</a
          >
        </div>
      </div>
      <div>Wolf-Fit suplementos LTDA©2022</div>
    </footer>
  </body>

  <script src="../../JS/hamburguerBtn.js"></script>
  <script src="../../JS/carrinho.js"></script>
</html>
