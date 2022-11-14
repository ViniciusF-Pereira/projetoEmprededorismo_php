<?php


session_start();
ob_start();


if ($_SESSION['nome'] != true) {
  $_SESSION['nome'] = "";
  $__usuario_conectado = $_SESSION['nome'];
} else {
  $__usuario_conectado = $_SESSION['nome'];
}

include_once '../php/conexao.php';




?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="./contato.css" />

  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <title>Contato</title>
  <link rel="shortcut icon" href="../../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png" />
</head>

<body>
  <header>
    <nav>
      <div class="navContainer">
        <!-- Mobile Hamburguer -->
        <button id="hamburguerBtn" class="navBtn">
          <i class="fa fa-bars"></i>
        </button>

        <a href="/" class="logoArea">
          <img src="../images/kisspng_gray_wolf_logo_mascot_clip_art_wolf_5ab4467dd78141_1.png" alt="Logo" />
          <span class="companyName">Wolf-Fit</span>
        </a>

        <div class="navMenu">
          <ul class="navItems">
          <li>
              <a href="../index.php"> Home </a>
            </li>
            <li><a href="./products/produtos.php">Produtos</a></li>

            <li>
              <a href="./contato/contato.html"> Contato </a>
            </li>

            <li>
              <a href="./sobre/sobre.html"> Sobre </a>
            </li>
          </ul>

          <div class="navItems2">
            <button class="navBtn">
              <?php
              if ($__usuario_conectado == "") {

                echo  '<a href="../user/login.php"> <i class="fa fa-user"></i></a></span>';
              } else {

                echo  '<span class="menuItem"><a href="user/dashboard.php">Configurações</a></span>';

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

    <div id="botao__carinho" class="botao__carinho">
      <h3>Carrinho <i class="fa fa-cart-shopping"></i></h3>
      <button type="button" class="limparCarrinhoBtn" onclick=" localStorage.clear(); location.reload();">
        Limpar
      </button>

      <div id="botao__carinho___tabela">
        <div>Total: <span id="total"></span></div>

        <div id="itens"></div>
      </div>

      <button id="fecharCarrinhoBtn"><i class="fa fa-close"></i></button>
    </div>
  </header>

  <section class="forms">
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      #mc_embed_signup {
        background: #fff;
        clear: left;
        font: 14px Helvetica, Arial, sans-serif;
        width: 600px;
      }

      /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
      <form action="https://protonmail.us21.list-manage.com/subscribe/post?u=c1cfba335d1ad1cdf1ef0cd8b&amp;id=99c24fdf5b&amp;f_id=0061c0e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <h2>
            Você é um cliente especial! Quero agradecer antecipadamente por
            entrar e contato conosco. Conte sempre com a gente!
          </h2>
          <div class="indicates-required">
            <span class="asterisk">*</span> indica necessário
          </div>
          <div class="mc-field-group">
            <label for="mce-FNAME">Nome <span class="asterisk">*</span>
            </label>
            <input type="text" value="" name="FNAME" class="required" id="mce-FNAME" required />
            <span id="mce-FNAME-HELPERTEXT" class="helper_text"></span>
          </div>
          <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address <span class="asterisk">*</span>
            </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required />
            <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
          </div>
          <div class="mc-field-group size1of2">
            <label for="mce-PHONE">Numero de Telefone </label>
            <input type="text" name="PHONE" class="" value="" id="mce-PHONE" />
            <span id="mce-PHONE-HELPERTEXT" class="helper_text"></span>
          </div>
          <div class="mc-field-group">
            <label for="mce-MMERGE6">Qual o tipo do assunto? <span class="asterisk">*</span>
            </label>
            <select name="MMERGE6" class="required" id="mce-MMERGE6" required>
              <option value=""></option>
              <option value="Devolução">Devolução</option>
              <option value="Reclamação">Reclamação</option>
              <option value="Troca de Produto">Troca de Produto</option>
              <option value="Tornar-se Parceiro">Tornar-se Parceiro</option>
              <option value="Trabalhe Conosco">Trabalhe Conosco</option>
            </select>
            <span id="mce-MMERGE6-HELPERTEXT" class="helper_text"></span>
          </div>
          <div class="mc-field-group">
            <label for="mce-MMERGE7">Mensagem <span class="asterisk">*</span>
            </label>
            <input type="text" value="" name="MMERGE7" class="required" id="mce-MMERGE7" required />
            <span id="mce-MMERGE7-HELPERTEXT" class="helper_text"></span>
          </div>
          <div id="mce-responses" class="clear foot">
            <div class="response" id="mce-error-response" style="display: none"></div>
            <div class="response" id="mce-success-response" style="display: none"></div>
          </div>
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px" aria-hidden="true">
            <input type="text" name="b_c1cfba335d1ad1cdf1ef0cd8b_99c24fdf5b" tabindex="-1" value="" />
          </div>
          <div class="optionalParent">
            <div class="clear foot">
              <input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="button" />
              <p class="brandingLogo">
                <a href="http://eepurl.com/icl7hr" title="Mailchimp - email marketing made easy and fun"><img src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg" /></a>
              </p>
            </div>
          </div>
        </div>
      </form>
    </div>
    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
    <script type="text/javascript">
      (function($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = "EMAIL";
        ftypes[0] = "email";
        fnames[1] = "FNAME";
        ftypes[1] = "text";
        fnames[2] = "LNAME";
        ftypes[2] = "text";
        fnames[3] = "ADDRESS";
        ftypes[3] = "address";
        fnames[4] = "PHONE";
        ftypes[4] = "phone";
        fnames[5] = "BIRTHDAY";
        ftypes[5] = "birthday";
        fnames[6] = "MMERGE6";
        ftypes[6] = "dropdown";
        fnames[7] = "MMERGE7";
        ftypes[7] = "text";
      })(jQuery);
      var $mcj = jQuery.noConflict(true);
    </script>
    <!--End mc_embed_signup-->
  </section>
</body>

<script src="../../JS/hamburguerBtn.js"></script>
<script src="../../JS/carrinho.js "></script>

</html>