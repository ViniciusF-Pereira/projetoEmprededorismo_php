<?php



session_start();
ob_start();

if ($_SESSION['nome'] != true or $_SESSION['nome'] == null){
$__usuario_conectado = $_SESSION['nome'];
}
else {
    $_SESSION['nome'] = "";
    $__usuario_conectado = $_SESSION['nome'];
}

include_once '../php/conexao.php';



?>


        <?php
        // exemplo criptografar a senha

        // echo password_hash(123456, PASSWORD_DEFAULT)
        
        ?>

        <?php

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($dados["SendCadastro"])){

               echo "<pre>";
               var_dump($dados);
               echo "</pre>";
               
               header("Location: cadastro.php");
        }

        if(!empty($dados["SendLogin"])){

                echo "<pre>";
                var_dump($dados);
                echo "</pre>";
        

        
        
$query_usuario ="SELECT id, nome, cpf, usuario, senha_usuario, id_number
FROM usuarios 
WHERE usuario =:usuario
LIMIT 1";        

$result_usuario = $conn->prepare($query_usuario);
$result_usuario -> bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);         

        $result_usuario -> execute();

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
              
        //  echo "<pre>";
        //  var_dump($row_usuario);
        //  echo "</pre>";


            if(password_verify($dados["senha_usuario"], $row_usuario["senha_usuario"])){

                // echo "acessado";


                
                $_SESSION['id_number'] = $row_usuario['id_number'];
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
              
                
           
                header("Location: ../index.php");

            }
            else {
                   $_SESSION['msg']= "<p style='color: #ff0000'> Erro; Senha inválida! </p>";
            }
            
       
        }
        else {
            $_SESSION['msg']= "<p style='color: #ff0000'> Erro; Usuário ou Senha inválida! </p>";
        }

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        
    }
        

        ?>
<!-- ------------------------------------------------------------------------------------------------- HTML-->
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

    <title>WOLF FIT</title>



</head>

<body>


    <header>
        <p class="primeiroTitulo ">Ganhe 10% + FRETE GRÁTIS na primeira compra com o cupom: BEMVINDO</p>
        <p class="segundoTitulo">
            Frete Grátis, vide as regras | 1ª Troca sem custo* | Entrega realizada em até 7 dias úteis</p>

    </header>



    <nav>
        <div class=logodiv>
            <div class="logoImg "></div>
            <span class="logoNome ">Wolf-Fit</span>
        </div>

        <div class=menuSection>
            <span class="menuItem"><a href="../index.php">Home</a></span>
            <span class="menuItem"><a href="../products/produtos.php">Produtos</a></span>
            <span class="menuItem">Sobre</span>
            <span class="menuItem">Contato</span>
            <span class="menuItem"><a href="login.php">Login</a></span>
          
            
        </div>
    </nav>




    <section>

            <h1>Login</h1>

  
            <form method="POST" action="">
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

                <input type="submit" value="Acessar" name="SendLogin"> 
                <input type="submit" value="Cadastrar" name="SendCadastro"  > 
            </form>


    </section>


    <!-- Footer -->
    <footer>
        Wolf-Fit suplementos LTDA©2022
    </footer>


</body>

</html>