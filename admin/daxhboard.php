<?php


session_start();
ob_start();



include_once '../php/conexao.php';



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


if(!empty($dados["CadastrarEndereco"])){
  
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



    $_SESSION['id']; 



    echo "<pre>";
    var_dump($dados);
    echo "</pre>";


    $query_endereco =   "INSERT INTO enderecos (nome_endereco , cep, logradouro, complemento, usuario_id) 
                        VALUES (:nome_endereco , :cep, :logradouro, :complemento, :usuario_id)";
    $cad_endereco = $conn->prepare($query_endereco);

    $cad_endereco -> bindParam(':nome_endereco', $dados['nome_endereco']);
    $cad_endereco -> bindParam(':cep', $dados['cep']);
    $cad_endereco -> bindParam(':logradouro', $dados['logradouro']);
    $cad_endereco -> bindParam(':complemento',  $dados['complemento']);
    $cad_endereco -> bindParam(':usuario_id',  $_SESSION['id']);


    $cad_endereco -> execute();

    if($cad_endereco->rowCount()){
        
        echo "<p> Endereço cadastrado com sucesso </p>";

        header("Location: dashboard.php");

    }
    else{

        echo "<p> Endereço não cadastrado </p>";

    }

   //  $query_endereco= "INSERT INTO enderecos (nome_endereco, cep, logradouro , complemento, usuario_id ) ";
     

}

?>

<?php
  
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


    $__cep = "";


    }
    else {
    $__cep = $dados["cep"];
    $url = sprintf('http://viacep.com.br/ws/%s/json/ ', $__cep);
    $result = json_decode(webClient($url));
    
    if( $result){
    var_dump($result->logradouro);
   

    
    
        $__logradouro = $result->logradouro;
        $__bairro = $result->bairro;
        $__localidade = $result->localidade;
        $__uf = $result->uf;
    


  
    //echo $logradouro;
    //echo "<pre>";
    //var_dump($result);
    //echo "</pre>";
    }
    else {

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

    <!-- CSS DO ADMIN                                                                 CSS DO ADMIN -->
    <link rel="stylesheet" href="admin.css">
    <!-- CSS DO ADMIN                                                                 CSS DO ADMIN -->
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
            <?php 
            if($__usuario_conectado == ""){

                echo  '<span class="menuItem"><a href="login.php">Login</a></span>';

            }
            else{

                echo  '<span class="menuItem"><a href="../user/dashboard.php">Configurações</a></span>';
            }
            ?>
            <?php 
            if($__usuario_conectado != ""){

               
                echo    '<a href="../user/sair.php">SAIR</a>';

            }
            ?>
            
            
        </div>
    </nav>




    <section class="dashboard" >

    <h1>Painel Administrativo</h1>
    <h3>Informações do Usuario
    </h3>
    
 



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
                        echo "ID: $id <br>"; 
                        echo "nome: $nome <br>"; 
                        echo "cpf: $cpf <br>"; 
                        echo "usuario: $usuario <br>"; 
                        echo '<div class="enderecos">';

                        echo '<form action="" method="post">';

                       

                        echo "Usuario Admnistrativo conectado <br>";

                        echo '<form action="" method="post">';

                        echo ' <input type="submit" name="Produtos" value="Administrar Produtos" />';

                        if(!empty($dados['Produtos'])){
                            header("Location: ProdutosAdmin.php");
                        }

                        echo '</form>';



                
                }

        
                
?>

</section>
</div>
                    
                    
 </form>



    <!-- Footer -->
    <footer>
        Wolf-Fit suplementos LTDA©2022
    </footer>


</body>

</html> 