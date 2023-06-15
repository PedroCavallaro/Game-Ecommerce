<?php

$idProd = $_GET["id"] ?? 0;

include_once "../../src/bd.php";

$bd = connect();

$sqlProduto = "SELECT * FROM produto WHERE codigo_prod = " . $idProd;

$resultProd = $bd->query($sqlProduto);

$dataProduto = $resultProd->fetch(PDO::FETCH_ASSOC);

function loadImages($bd, $id)
{
  $sqlImagem = "SELECT * FROM imagem WHERE codigo_prod = " . $id;

  $resultImagem = $bd->query($sqlImagem);
  while ($dataImagem = $resultImagem->fetch(PDO::FETCH_ASSOC)) {
    echo "
      <img src='../../covers/" . $dataImagem["nome_arquivo"] . "' alt=''>
    ";
  }
}

$nome = $_POST["nome_pro"] ?? 0;
$descricao = $_POST["descricao"] ?? 0;
$valor_unitario = $_POST["valor_unitario"] ?? 0;
$quantidade = $_POST["quantidade"] ?? 0;
$peso = $_POST["peso"] ?? 0;
$dimensoes = $_POST["dimensoes"] ?? 0;
$unidade_Venda = $_POST["unidade_Venda"] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Produto</title>
  <link rel="stylesheet" href="../style/font.css">
  <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
  <h1><?= $dataProduto["nome_pro"] ?></h1>

  <form action="salvarEdicao.php?cod=<?= $idProd ?>" method="post">
    <label for="nome_pro">Nome Produto
      <input type="text" name="nome_pro" id="nome_pro" value="<?= $dataProduto["nome_pro"] ?>">
    </label>
    <label for="descricao">Descrição
      <textarea name="descricao" id="descricao" cols="30" rows="10"><?= $dataProduto["descricao"] ?>
      </textarea>
    </label>
    <label for="valor_unitario">Valor Unitário
      <input type="number" step="0.01" name="valor_unitario" id="valor_unitario" value="<?= $dataProduto["valor_unitario"] ?>">
    </label>
    <label for="quantidade">Quantidade
      <input type="number" name="quantidade" id="quantidade" value="<?= $dataProduto["quantidade"] ?>">
    </label>
    <label for="peso">Peso
      <input type="text" name="peso" id="peso" value="<?= $dataProduto["peso"] ?>">
    </label>
    <label for="dimensoes">Dimensões
      <input type="text" name="dimensoes" id="dimensoes" value="<?= $dataProduto["dimensoes"] ?>">
    </label>
    <label for="unidade_Venda">Unidade Venda
      <input type="text" name="unidade_Venda" id="unidade_Venda" value="<?= $dataProduto["unidade_Venda"] ?>">
    </label>
    <label for="">Imagens
      <div>
        <div id="img-preview">
          <?= loadImages($bd, $idProd) ?>
        </div>
        <input type="file" id="choose-file" name="imagem[]" accept="image/*" multiple>
      </div>
    </label>

    <input type="submit" value="Salvar Edição">

  </form>
</body>

<script src="../dist/imagePreview.js"></script>

</html>