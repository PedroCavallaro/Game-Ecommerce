<?php
include_once "../src/bd.php";
try{
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
    $cliName = filter_input(INPUT_POST, "cliName", FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
    $neigb = filter_input(INPUT_POST, "neigb", FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS);
    $number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);

    $bd = connect();
    $sql= "INSERT INTO `cliente`(
        `cpf_cnpj_cli`,
        `nome_cli`,
        `numero_cli`,
        `bairro_cli`,
        `cidade_cli`,
        `cep_cli`,
        `estado_cli`,
        `endereco_cli`
    )
    VALUES(
        '$cpf',
        '$cliName',
        '$number',
        '$neigb',
        '$city',
        '$cep',
        '$state',
        '$address'
    )";

    $bd->beginTransaction();
    $lines=$bd->exec($sql);
        
    if($lines == 1){
        $bd->commit();
        header("location:../views/home.php");
    }else{

        $bd->rollBack();
    }
}catch(Exception){
    header("location:../views/register.php?err=2");
}
?>