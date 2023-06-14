<?php

$id = $_GET["id"] ?? 0;

if ($id) {
  try {
    include_once "../../src/bd.php";

    $bd = connect();

    $sqlImages = "DELETE FROM imagem WHERE codigo_prod = " . $id;

    $sqlProd = "DELETE FROM produto WHERE codigo_prod = " . $id;

    $bd->query($sqlImages);
    $bd->query($sqlProd);

    header("location:admin.php");
  } catch (Exception $ex) {
    header("location:admin.php?err=2");
  }
}
