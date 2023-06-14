<?php
$cod = $_POST["cod"] ?? 0;
$nome = $_POST["nome"] ?? 0;
$descricao = $_POST["descricao"] ?? 0;
$valor_unitario = $_POST["valor_unitario"] ?? 0;
$quantidade = $_POST["quantidade"] ?? 0;
$peso = $_POST["peso"] ?? 0;
$dimensoes = $_POST["dimensoes"] ?? 0;
$unidade_venda = $_POST["unidade_venda"] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Novo Produto</title>
</head>

<body>
  <h1>Informe os dados do produto</h1>

  <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
    <label for="cod">
      Código
      <input type="text" id="cod" name="cod">
    </label>

    <label for="nome">
      Nome
      <input type="text" id="nome" name="nome">
    </label>

    <label for="descricao">
      Descrição
      <textarea name="descricao" id="descricao" cols="30" rows="10" maxlength="255"></textarea>
    </label>

    <label for="valor_unitario">
      Valor Unitário
      <input type="number" step="0.01" id="valor_unitario" name="valor_unitario">
    </label>

    <label for="quantidade">
      Quantidade
      <input type="number" id="quantidade" name="quantidade">
    </label>

    <label for="peso">
      Peso
      <input type="text" id="peso" name="peso">
    </label>

    <label for="dimensoes">
      Dimensões
      <input type="text" id="dimensoes" name="dimensoes">
    </label>

    <label for="unidade_venda">
      Unidade Venda
      <input type="number" id="unidade_venda" name="unidade_venda">
    </label>

    <label for="choose-file">
      Imagens
      <div id="img-preview"></div>
      <input type="file" id="choose-file" name="imagem[]" accept="image/*" multiple><br>
    </label>

    <input type="submit" value="Cadastrar">
  </form>
</body>

<script src="../dist/imagePreview.js"></script>

</html>

<?php
if ($cod && $nome && $descricao && $valor_unitario && $quantidade && $peso && $dimensoes && $unidade_venda) {

  include_once "../../src/bd.php";

  $bd = connect();

  $sql = "INSERT INTO produto(codigo_prod, nome_pro, descricao, valor_unitario, quantidade, peso, dimensoes, unidade_Venda) VALUES ('" . $cod . "', '" . $nome . "','" . $descricao . "','" . $valor_unitario . "','" . $quantidade . "','" . $peso . "','" . $dimensoes . "','" . $unidade_venda . "')";

  try {
    $bd->beginTransaction();
    $linhas = $bd->exec($sql);
    if ($linhas == 1) {
      $bd->commit();
    } else {
      $bd->rollBack();
    }
  } catch (Exception $ex) {
    header("location:admin.php?err=1");
    die();
  }

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
      header("location:admin.php?err=1");
    }
  }

  header("location:admin.php");
}
?>