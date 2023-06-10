<?php
include_once "../src/bd.php";

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);


$bd = connect();
$sql = "SELECT cpf_cnpj_cli
        FROM  cliente
        WHERE cpf_cnpj_cli = $cpf";

$result = $bd->query($sql);

$data = $result -> fetch(PDO::FETCH_ASSOC);

if(isset($data["cpf_cnpj_cli"])){
       header('location:../views/home.php');

}else{
        header('location:../views/loginPage.php?err=1');
}




?>