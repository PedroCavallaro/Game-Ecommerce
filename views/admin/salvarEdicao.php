<?php
$cod = $_GET["cod"] ?? 0;
$nome = $_POST["nome_pro"] ?? 0;
$descricao = $_POST["descricao"] ?? 0;
$valor_unitario = $_POST["valor_unitario"] ?? 0;
$quantidade = $_POST["quantidade"] ?? 0;
$peso = $_POST["peso"] ?? 0;
$dimensoes = $_POST["dimensoes"] ?? 0;
$unidade_Venda = $_POST["unidade_Venda"] ?? 0;

if ($cod && $nome && $descricao && $valor_unitario && $quantidade && $peso && $dimensoes && $unidade_Venda) {

  include_once "../../src/bd.php";

  $bd = connect();

  $sql = "UPDATE produto SET nome_pro='" . $nome . "',descricao='" . $descricao . "',valor_unitario='" . $valor_unitario . "',quantidade='" . $quantidade . "',peso='" . $peso . "',dimensoes='" . $dimensoes . "',unidade_Venda='" . $unidade_Venda . "' WHERE codigo_prod = " . $cod;

  try {
    $bd->beginTransaction();
    $linhas = $bd->exec($sql);
    if ($linhas == 1) {
      $bd->commit();
    } else {
      $bd->rollBack();
    }
  } catch (Exception $ex) {
    header("location:admin.php?err=3");
    die();
  }

  $sqlDelImages = "DELETE FROM imagem WHERE codigo_prod = " . $cod;

  $bd->query($sqlDelImages);

  $diretorioDestino = "../../covers/";

  for ($i = 0; $i < count($_FILES['imagem']['name']); $i++) {
    if ($_FILES['imagem']['error'][$i] == UPLOAD_ERR_OK) {
      $nomeArquivo = $_FILES['imagem']['name'][$i];
      $caminhoArquivo = $diretorioDestino . $nomeArquivo;

      $sql2 = "INSERT INTO imagem(codigo_prod, nome_arquivo) VALUES ('" . $cod . "','" . $nomeArquivo . "')";
      try {
        $bd->query($sql2);
      } catch (Exception $e) {
        echo "Erro $e";
      }

      move_uploaded_file($_FILES['imagem']['tmp_name'][$i], $caminhoArquivo);
    } else {
      header("location:admin.php?err=3");
    }
  }

  header("location:admin.php");
} else {
  var_dump($cod);
  var_dump($nome);
  var_dump($descricao);
  var_dump($valor_unitario);
  var_dump($quantidade);
  var_dump($peso);
  var_dump($dimensoes);
  var_dump($unidade_Venda);
}
