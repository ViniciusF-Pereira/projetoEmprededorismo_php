<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbwolffit";
$port = "3306";

try{

    //conexão com a porta
    // new PDO("mysql:host=$host;dbname=" .$dbname, $user , $pass);

    // conxao sem a port
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" .$dbname, $user , $pass);
    //echo "conexão com sucesso";
}catch(PDOException $err){
    echo "ERROR conexão não sucedida, ERRO GERADO". $err->getMessage();

}


$query_produtos ="SELECT id_produtos, nome_produtos, preco_produtos, descricao_produtos, tipo_produtos, img_produtos
FROM produtos 
ORDER BY id_produtos DESC";

$result_produtos = $conn->prepare($query_produtos);
$result_produtos -> execute();


$connect = mysqli_connect($host, $user, $pass, $dbname);


$index = mysqli_connect($host, $user, $pass, $dbname);

if(!$index){
    die("Falha na conexao: " . mysqli_connect_error());
}//else{
    //echo "Conexao realizada com sucesso";
//}


$server = $host; //endereço sem o HTTP:// ou HTTPS://
$port = "80"; // Mude o número da porta se quiser testar outros serviços.

// Verifica o status atual do servidor.
$current_status =  ping($server, $port, 10);

if ($current_status == "down"): echo "Servidor indisponível!";
else: //echo "Servidor online! ";
endif;


function ping($host, $port, $timeout)
{ 
  $tB = microtime(true); 
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
  if (!$fP) { return "down"; } 
  $tA = microtime(true); 
  return round((($tA - $tB) * 1000), 0)." ms"; 
} 

$valor = isset($_SESSION['usuario']) ? 'S' : 'N';

