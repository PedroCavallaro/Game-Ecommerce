<?php
include_once "../../../src/bd.php";

$id = $_GET["id"];
$username = $_GET["username"];
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
$neigb = filter_input(INPUT_POST, "neigb", FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
$state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS);
$number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);


$sql = "UPDATE
    cliente
SET
    `numero_cli` = '$number',
    `bairro_cli` = '$neigb',
    `cidade_cli` = '$city',
    `cep_cli` = '$cep',
    `estado_cli` = '$state',
    `endereco_cli` = '$address'
WHERE
    cpf_cnpj_cli = $id";

$bd = connect();
$bd->beginTransaction();

$lines = $bd->exec($sql);

if($lines == 1){
    $bd->commit();
    header("location:../user.php?username=$username");
}