<?php


session_start();
ob_start();


include_once '../php/conexao.php';


if( $_SESSION['id'] != 0 &&  $_SESSION['id']!= ""){

  header("Location: ../index.php");


}



if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){

    $_SESSION['msg']= "<p style='color: #ff0000'> Erro, pagina restrida; Usuário não conectado]! </p>";

    header("Location: ../index.php");


    
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }

    

}

?>

<?php


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

{

   
    function webClient ($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    if(empty($dados["cep"]))
    {


    $cep = "";


    }
    else {
    $cep = $dados["cep"];
    $url = sprintf('http://viacep.com.br/ws/%s/json/ ', $cep);
    $result = json_decode(webClient($url));
    
   

    
    if($dados["cep"] != '') {
        $logradouro = $result->logradouro;
        $bairro = $result->bairro;
        $localidade = $result->localidade;
        $uf = $result->uf;
    }


    //echo $logradouro;
    //echo "<pre>";
    //var_dump($result);
    //echo "</pre>";
    }
}




?>

<?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados["SendCadastro"])){

    



    
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";





$query_usuario ="SELECT id, nome, cpf, usuario, senha_usuario
    FROM usuarios 
    WHERE usuario =:usuario
    LIMIT 1";        
    
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);         
    
    $result_usuario -> execute();

    
if(($result_usuario) AND ($result_usuario->rowCount() == 0)){{
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

$_SESSION['msg']= "<p style='color: GREEN'> Endereço de Email não cadastrado no sistema.! </p>";
}
        if($dados['senha_usuario'] != $dados['senha_usuario_2']){
            $_SESSION['msg']= "<p style='color: RED'> Senhas digitadas não são indenticas.! </p>";
        }

        
        else{
            
          

            $dadosCadastro_Nome = $dados['nome'];
            $dadosCadastro_Usuario = $dados['usuario'];
            $dadosCadastro_CPF = $dados['cpf'];
            $dadosCadastro_senha = password_hash($dados['senha_usuario_2'], PASSWORD_ARGON2I);
            $dadosCadastro_id_number =  $randomNumber = rand();
            $dadosCadastro_id_hash = password_hash($dadosCadastro_id_number, PASSWORD_ARGON2I);
            


            
            $query_cadastro =   "INSERT INTO usuarios (nome , cpf, usuario, senha_usuario, id_number, id_hash) 
                                 VALUES (:nome ,:cpf, :usuario, :senha_usuario, :id_number, :id_hash)";

            $query_cadastro = $conn->prepare($query_cadastro);

            $query_cadastro -> bindParam(':nome', $dadosCadastro_Nome);
            $query_cadastro -> bindParam(':cpf', $dadosCadastro_CPF);
            $query_cadastro -> bindParam(':usuario', $dadosCadastro_Usuario);
            $query_cadastro -> bindParam(':senha_usuario',  $dadosCadastro_senha);
            $query_cadastro -> bindParam(':id_number',  $dadosCadastro_id_number);
            $query_cadastro -> bindParam(':id_hash',  $dadosCadastro_id_hash);

           
           



            $query_cadastro -> execute();

                
            
                if($query_cadastro){


                    $query_usuario ="SELECT id, nome, cpf, usuario, senha_usuario
                    FROM usuarios 
                    WHERE usuario =:usuario
                    LIMIT 1";        
                    
                    $result_usuario = $conn->prepare($query_usuario);
                    $result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);         
                    
                            $result_usuario -> execute();
                    
                            if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                    


                                $_SESSION['id'] = $row_usuario['id'];
                                $_SESSION['nome'] = $row_usuario['nome'];


                                header("Location: ../index.php");

                            }
                    
                    
                 }

            
        
           
        }

}
else {
    $_SESSION['msg']= "<p style='color: #ff0000'> Endereço de Email já cadastrado no sistema.! </p>";
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}

}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
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
       <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>WOLF FIT</title>



</head>

<body>


    <header>
        <p class="primeiroTitulo ">Ganhe 10% + FRETE GRÁTIS na primeira compra com o cupom: BEMVINDO</p>
        <p class="segundoTitulo">
            Frete Grátis, vide as regras | 1ª Troca sem custo* | Entrega realizada em até 7 dias úteis</p>

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
              <a href="../products/produtos.php">Produtos</a>
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





    <section>

    <h1>Cadastro</h1>




<form method="POST" action="">

    <label>Nome:</label>
        <input type="text" name="nome" placeholder="digite o nome completo"id="" value="<?php if(isset($dados['nome']))
        {echo $dados['nome']; } ?>">

        
        <br>
        <br>
        <label>CPF:</label>
        <input type="text" name="cpf" placeholder="digite o e-cpf"id="" value="<?php if(isset($dados['cpf']))
        {echo $dados['cpf']; } ?>">


        <br>
        <br>
        <label>Usuário:</label>
        <input type="email" name="usuario" placeholder="digite o e-mail"id="" value="<?php if(isset($dados['usuario']))
        {echo $dados['usuario']; } ?>">

        <br>
        <br>

        <label >Senha:</label>
        <input type="password" name="senha_usuario" placeholder="digite a senha"id="" value="<?php if(isset($dados['senha_usuario']))
        {echo $dados['senha_usuario'];} ?>">

        <br>
        <br>

        <label >Digite novamente a senha:</label>
        <input type="password" name="senha_usuario_2" placeholder="digite a senha novamente"id="" value="<?php if(isset($dados['senha_usuario']))
        {echo $dados['senha_usuario'];} ?>">

        <br>
        <br>

        <input type="submit" value="Cadastrar" name="SendCadastro"> 
</form>


    </section>


    <!-- Footer -->
    <footer>
        Wolf-Fit suplementos LTDA©2022
    </footer>


</body>

</html>