<?php


session_start();
ob_start();





    include_once '../php/conexao.php';


$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os produtos da tabela

$result_produtos_query = "SELECT * FROM produtos";
$result_produto_sTotal = mysqli_query($connect, $result_produtos_query);

//Contar o total de produtos

$total_produtos = mysqli_num_rows($result_produto_sTotal);

//Seta a quantidade de produtos por pagina

$quantidade_pg = 9;


//calcular o número de pagina necessárias para apresentar os produtos

$num_pagina = ceil($total_produtos/$quantidade_pg);


//Calcular o inicio da visualizacao

$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os produtos a serem apresentado na página
$result_produtos_querys = "SELECT * FROM produtos ORDER BY id_produtos DESC limit $incio, $quantidade_pg ";
$result_produto_sTotals = mysqli_query($connect, $result_produtos_querys);
$total_produtos = mysqli_num_rows($result_produto_sTotal);




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    <!-- CSS DO PRODUTOS                                                                 CSS DO PRODUTOS -->
    <link rel="stylesheet" href="user.css">
    <!-- CSS DO PRODUTOS                                                                 CSS DO PRODUTOS -->
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

    <title>WOLF FIT</title>



</head>

<body>

   
    <header>
        <p class="primeiroTitulo ">Ganhe 10% + FRETE GRÁTIS na primeira compra com o cupom: BEMVINDO</p>
        <p class="segundoTitulo">
            Frete Grátis, vide as regras | 1ª Troca sem custo* | Entrega realizada em até 7 dias úteis</p>
            <?php 
            if($__usuario_conectado != ""){

               
                echo    '<p class="primeiroTitulo ">Bem Vindo '.$__usuario_conectado.'</p>';

            }
            ?>
    </header>


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
              <a href="produtos.php">Produtos</a>
            </li>
            <li>
                <a href="../contato/contato.php">Contato</a>
            </li>

            <li>
                <a href="../sobre/sobre.php">Sobre</a>
            </li>
          </ul>

          <div class="navItems2">
            <button class="navBtn">
            <?php
                        if( $_SESSION['id'] != 0 ||  $_SESSION['id']!= ""){
                
                  
    
                          echo  '<a href="login.php"> <i class="fa fa-user"></i></a></span>';
                        }
                         else {
            
                          echo  '<span class="menuItem"><a href="user/dashboard.php">Configurações</a></span>';
            
                          echo    '<a href="sair.php">SAIR</a>';
                        
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

   

    <!-- Produtos -->
  
    <div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Produtos</h1>
			</div>
            <div class= "Vitrine">
        	<div class="row">
				<?php while($rows_produtos = mysqli_fetch_assoc($result_produto_sTotals)){ ?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
                            <script type="text/javascript"> 

                            function clicou(id){

                                console.log("Produto " + id); 

                            }
                            

                            </script>
                       <?php

                                
   


                                $id_product = $rows_produtos['id_produtos'];
                                $nome_product = $rows_produtos['nome_produtos'];
                                $preco_product = $rows_produtos['preco_produtos'];

                            echo '<img class= Imagem_produtos_exibidos src="'. $rows_produtos['img_produtos'].'" alt="whey__wolffit">';
                             //   echo "ID: " . $rows_produtos['id_produtos']. "<br>";
                              //  echo "Nome: " . $rows_produtos['nome_produtos']. "<br>";
                               // echo "Preco: " . number_format($rows_produtos['preco_produtos'], 2, ",",'.'). "<br>";
                                //echo "Descrição: " . $rows_produtos['descricao_produtos']. "<br>";

                                    
                                echo "<pre>";
                                var_dump($rows_produtos);
                                echo "</pre>";

                            
                                
                        ?>
                              
                            
                              <hr>
						</div>
					</div>
				<?php } ?>
			    </div>
            </div>
			<?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
			<nav class="text-center">
				<ul class="pagination">
					<li>
						<?php
						if($pagina_anterior != 0){ ?>
							<a href="produtos.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&laquo;</span>
					<?php }  ?>
					</li>
					<?php 
					//Apresentar a paginacao
					for($i = 1; $i < $num_pagina + 1; $i++){ ?>
						<li><a href="produtos.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<li>
						<?php
						if($pagina_posterior <= $num_pagina){ ?>
							<a href="produtos.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
							</a>
						<?php }else{ ?>
							<span aria-hidden="true">&raquo;</span>
					<?php }  ?>
					</li>
				</ul>
			</nav>
		</div>


    <!-- Footer -->
    <footer>
        Wolf-Fit suplementos LTDA©2022
    </footer>


</body>



</html>