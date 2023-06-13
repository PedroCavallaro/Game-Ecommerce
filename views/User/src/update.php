<?php
include_once "../../src/bd.php";

$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_SPECIAL_CHARS);
$neigb = filter_input(INPUT_POST, "neigb", FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
$state = filter_input(INPUT_POST, "state", FILTER_SANITIZE_SPECIAL_CHARS);
$number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);

$bd = connect();
