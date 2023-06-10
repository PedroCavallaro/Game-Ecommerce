<?php
include_once "../src/bd.php";

$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);

echo $cpf;
$bd = connect();
$sql = "SELECT cpf_cnpj_cli,
                nome_cli
        FROM  cliente
        WHERE cpf_cnpj_cli = $cpf";

$result = $bd->query($sql);

$data = $result -> fetch(PDO::FETCH_ASSOC);

if(isset($data["cpf_cnpj_cli"])){
       header("location:../views/home.php?username=".$data["nome_cli"]."");

}else{
        header('location:../views/login.php?err=1');
}




?>