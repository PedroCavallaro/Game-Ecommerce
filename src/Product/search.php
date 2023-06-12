<?php
include_once "../../src/bd.php";
$search = filter_input(INPUT_POST,"search", FILTER_SANITIZE_SPECIAL_CHARS);
$username = $_GET["username"];

echo $search;

$bd = connect();
$sql = "SELECT p.*
    FROM produto p
    WHERE p.nome_pro LIKE '$search%'";

$result = $bd->query($sql);
$gamesFound = [];
while($data = $result->fetch(PDO::FETCH_ASSOC)){
    array_push($gamesFound, $data["codigo_prod"]);
}

session_start();
$_SESSION["gamesFound"] = $gamesFound;

header("location:../../views/home.php?username=$username&search=$search");


?>