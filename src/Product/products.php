<?php
include_once "../src/bd.php";

function getProducts()
{

  $bd = connect();

  $sql = "SELECT p.*,
                  i.nome_arquivo
          FROM produto p
          RIGHT JOIN imagem i
          ON p.codigo_prod  = i.codigo_prod
          GROUP BY p.nome_pro";

  $result = $bd->query($sql);

  while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<a href='productPage.php?id=" . $data['codigo_prod'] . "'>
              <div class='card'>
                <div class='cover'>
                  <img  src='../views/images/" . $data['nome_arquivo'] . "' alt=''>
                </div>
                <h3 class='gameTitle'>" . $data["nome_pro"] . "</h3>
                <div class='info'>
                  <div class='price-info'>
                    <div>
                      <h3 class='price'>Valor</h3>
                      <h3 class='price'>" . $data["valor_unitario"] . "</h3>
                    </div>
                    <label for=''>
                      <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                    </label>
                  </div>
                </div>
              </div>
            </a>";
  }
}

function searchProduct($cod)
{
  $bd = connect();
  $sql = "SELECT p.*,
            i.nome_arquivo
            FROM produto p
            INNER JOIN imagem i
                ON p.codigo_prod  = i.codigo_prod
            WHERE p.codigo_prod = $cod";

  $result = $bd->query($sql);
  $data = $result->fetch(PDO::FETCH_ASSOC);

  echo "<div class='card'>
          <div class='cover'>
            <img  src='../views/images/" . $data['nome_arquivo'] . "' alt=''>
          </div>
          <h3 class='gameTitle'>" . $data["nome_pro"] . "</h3>
          <div class='info'>
            <div class='price-info'>
              <div>
                <h3 class='price'>Valor</h3>
                <h3 class='price'>" . $data["valor_unitario"] . "</h3>
              </div>" .
    loadImages($cod)
    . "
              <label for=''>
                <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
              </label>
            </div>
          </div>
        </div>";
}

function loadImages($codigo)
{
  $bd = connect();
  $sql = "SELECT * FROM imagem WHERE codigo_prod = " . $codigo;

  $result = $bd->query($sql);

  $stringOutput = "";

  while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $stringOutput .= "
      <span>
        <img class='images' src='../views/images/" . $data['nome_arquivo'] . "' alt=''>
      </span>
    ";
  }

  echo "
    <div class='images-carrousel'>" . $stringOutput . "</div>
  ";
}
