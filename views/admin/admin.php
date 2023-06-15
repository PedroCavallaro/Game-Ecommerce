<?php

$idErro = $_GET["err"] ?? 0;

function limita_caracteres($texto, $limite, $quebra = true)
{
  $tamanho = strlen($texto);
  if ($tamanho <= $limite) {
    $novo_texto = $texto;
  } else {
    if ($quebra == true) {
      $novo_texto = trim(substr($texto, 0, $limite)) . "...";
    } else {
      $ultimo_espaco = strrpos(substr($texto, 0, $limite), " ");
      $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . "...";
    }
  }
  return $novo_texto;
}

include_once "../../src/bd.php";

$bd = connect();

$sql = "SELECT * FROM produto";

$result = $bd->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="widtr=device-widtr, initial-scale=1.0">
  <title>Painel Admin</title>
  <link rel="stylesheet" href="../style/font.css">
  <link rel="stylesheet" href="../style/admin.css">
</head>

<body>

  <?php
  if ($idErro == 1) {
    echo "<p>Erro ao cadastrar produto!</p>";
  } elseif ($idErro == 2) {
    echo "<p>Erro ao deletar produto!</p>";
  } elseif ($idErro == 3) {
    echo "<p>Erro ao atualizar produto!</p>";
  }
  ?>

  <h1>Painel Gerencial dos Produtos</h1>

  <a class="btn" href="cadastrarProd.php">
    <button>Cadastrar Novo Produto</button>
  </a>

  <div class="main">
    <table>
      <tr>
        <th>Código</th>
        <th>Nome Produto</th>
        <th>Descrição</th>
        <th>Valor Unitário</th>
        <th>Quantidade</th>
        <th>Peso</th>
        <th>Dimensões</th>
        <th>Unidade Venda</th>
        <th>Ações</th>
      </tr>
      <?php
      while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
            <tr>
              <td>" . $data["codigo_prod"] . "</td>
              <td>" . $data["nome_pro"] . "</td>
              <td>" . limita_caracteres($data["descricao"], 50, false) . "</td>
              <td>" . $data["valor_unitario"] . "</td>
              <td>" . $data["quantidade"] . "</td>
              <td>" . $data["peso"] . "</td>
              <td>" . $data["dimensoes"] . "</td>
              <td>" . $data["unidade_Venda"] . "</td>
              <td>
                <a href='excluirProd.php?id=" . $data["codigo_prod"] . "'>Excluir</a>
                <a href='editarProd.php?id=" . $data["codigo_prod"] . "'>Editar</a>
              </td>
            </tr>
          ";
      }
      ?>
    </table>
  </div>
</body>

</html>