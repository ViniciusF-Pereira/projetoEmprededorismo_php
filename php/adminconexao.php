<?php





$query_usuarioisAdmin ="SELECT id, nome, cpf, usuario, senha_usuario, id_number, id_hash , isAdmin
FROM usuarios 
WHERE id =:id
LIMIT 1";  

$query_isAdmin ="SELECT id_admin,nome, senha_admin, cpf, login_admin, id_number, id_hash
FROM administrador 
WHERE id_admin =:id_admin
LIMIT 1";        


$result_usuarioisAdmin = $conn->prepare($query_usuarioisAdmin);
$result_usuarioisAdmin -> bindParam(':id',  $_SESSION['id'] , PDO::PARAM_STR);         
$result_usuarioisAdmin -> execute();

$result_isAdmin = $conn->prepare($query_isAdmin);
$result_isAdmin -> bindParam(':id_admin',  $_SESSION['id'], PDO::PARAM_STR);    
     

$result_isAdmin -> execute();

$row_usuarioisAdmin = $result_usuarioisAdmin->fetch(PDO::FETCH_ASSOC);
$row_isAdmin = $result_isAdmin->fetch(PDO::FETCH_ASSOC);

  
if($row_usuarioisAdmin['isAdmin'] == true){
    if(password_verify( $row_usuarioisAdmin['id_number'],$row_isAdmin['id_hash'])){

        if(($result_usuarioisAdmin) AND ($result_usuarioisAdmin->rowCount() == 1)){
        

            if(($result_isAdmin) AND ($result_isAdmin->rowCount() == 1)){

            




            header("Location: ../admin/daxhboard.php");

        
            }
        }
    }
}