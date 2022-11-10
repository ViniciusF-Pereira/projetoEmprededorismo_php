<?php


session_start();
ob_start();


include_once '../php/conexao.php';
include_once '../php/adminconexao.php';


if ($_SESSION['nome'] != true){
    $_SESSION['nome'] = "";
    $__usuario_conectado = $_SESSION['nome'];
    }
    else {
       $__usuario_conectado = $_SESSION['nome'];
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


if(!empty($dados["Voltar"])){

    header("Location: dashboard.php");
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
            <span class="menuItem"><a href="../products/produtos.php">Produtos</span>
            <span class="menuItem">Sobre</span>
            <span class="menuItem">Contato</span>
            <?php 
            if($__usuario_conectado == ""){

                echo  '<span class="menuItem"><a href="login.php">Login</a></span>';

            }
            else{

                echo  '<span class="menuItem"><a href="dashboard.php">Configurações</a></span>';
            }
            ?>
            <?php 
            if($__usuario_conectado != ""){

               
                echo    '<a href="sair.php">SAIR</a>';

            }
            ?>
            
            
        </div>
    </nav>




    <section >

    <h1>Informações do Usuario
    </h1>
    
    </section>



                <?php 

                $query_dashboard ="SELECT id, nome, cpf, usuario, senha_usuario
                FROM usuarios 
                WHERE id =:id
                LIMIT 1";        


                $result_dashboard = $conn->prepare($query_dashboard);
                $result_dashboard -> bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);     
                $result_dashboard -> execute();


                if(($result_dashboard) and ($result_dashboard->rowCount() != 0)){

                    $row_dashboard = $result_dashboard->fetch(PDO::FETCH_ASSOC);

                  
                        extract($row_dashboard);
                 
                                      
                            echo '<form action="" method="post">';
                            echo '

                            <br>
                            <br>

                                      
                            <label >Senha Antiga:</label>
                            <input type="password" name="senha_usuario" placeholder="digite a senha"id="" value="">

                            <br>
                            <br>


                            <label >Senha:</label>
                            <input type="password" name="nova_senha_usuario" placeholder="digite a senha"id="" value="">

                            <br>
                            <br>

                            <label >Digite novamente a senha:</label>
                            <input type="password" name="nova_senha_usuario_2" placeholder="digite a senha novamente"id="" value="">

                            <br>
                            <br>

                            ';


                            echo ' <input type="submit" name="confirmar_alterarSenha" value="Alterar senha" />';

                            if(!empty($dados['confirmar_alterarSenha'])){
                           
                            
                            if(password_verify($dados["senha_usuario"], $row_dashboard["senha_usuario"])){

                                if($dados['nova_senha_usuario'] != $dados['nova_senha_usuario_2']){

                                    $_SESSION['msg']= "<p style='color: RED'> Senhas digitadas não são indenticas.! </p>";
                                }
                                else {


                                        $nova__senha_usuario = password_hash($dados['nova_senha_usuario'], PASSWORD_ARGON2I);
                                        
                                        $query_atualizar_senha ="UPDATE usuarios 
                                        SET senha_usuario = (:senha_usuario)
                                        WHERE id =:id
                                        LIMIT 1";        
                                        
                                        $atualizar_senha = $conn->prepare($query_atualizar_senha);
                                        $atualizar_senha -> bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);  
                                        $atualizar_senha -> bindParam(':senha_usuario', $nova__senha_usuario);       

                                        $atualizar_senha -> execute();

                                        $_SESSION['msg']= "<p style='color: GREEN'>Senha Atualizada! </p>";

                                }

                            }
                            else {
                                $_SESSION['msg']= "<p style='color: #ff0000'> Erro; Senha inválida! </p>";
                            }


                        }

                            echo '</form>';
                        

                        echo '</form>';





                
                }

                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
                
                ?>
                <br>

             
                <form action="" method="post">
            
                <input type="submit" value="Voltar" name="Voltar"  > 
                    
                </form>

 </form>



    <!-- Footer -->
    <footer>
        Wolf-Fit suplementos LTDA©2022
    </footer>


</body>

</html> 