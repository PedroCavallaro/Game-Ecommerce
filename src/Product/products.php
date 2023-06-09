<?php
include_once "../src/bd.php";

function getProducts($username)
{

  $bd = connect();

  $sql = "SELECT p.*,
                i.nome_arquivo
         FROM produto p
         INNER JOIN imagem i
         ON p.codigo_prod  = i.codigo_prod 
         GROUP BY codigo_prod";

  $result = $bd->query($sql);

  while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    if ($data["quantidade"] != 0) {

      echo "
                <div class='card'>
                <div class='cover'>
                    <img  src='../covers/" . $data['nome_arquivo'] . "' alt=''>
                </div>
               <h3 class='gameTitle'>" . $data["nome_pro"] . "</h3>
               <p class='cod'>".$data["codigo_prod"]."</p>
               <img role='button' draggable='false' class='add' src='../assets/add-to-cart.png'>
                <div class='info'>
                    <div class='price-info'>
                        <div>
                            <h3 class='price'>Valor</h3>
                            <h3 class='price unity'>" . $data["valor_unitario"] . "</h3>
                        </div>
                        <label for=''>
                           <a href='./productPage.php?username=$username&id=" . $data["codigo_prod"] . "' >
                               <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                           </a>
                        </label>
                    </div>
                </div>
            </div>";
    }
  }
}

function getImages($username)
{
  $bd = connect();

  $sql = "SELECT i.*,
                p.nome_pro,
                p.quantidade
            FROM imagem i
            INNER JOIN produto p
            ON i.codigo_prod = p.codigo_prod
            GROUP BY codigo_prod";

  $result = $bd->query($sql);

  while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    if($data["quantidade"] != 0){
        echo "
            <a href='./productPage.php?username=$username&id=" . $data["codigo_prod"] . "'>
                <img class='i'  src='../covers/" . $data["nome_arquivo"] . "' alt=''>
            </a>";
         
    }
    }
}

function renderProduct($id)
{
  $bd = connect();
  $sql = "SELECT i.nome_arquivo
                FROM imagem i 
                WHERE i.codigo_prod = $id";

  $result = $bd->query($sql);
  $img = [];
  $username = $_GET["username"]; 
  for ($i = 0; $i < 3; $i++) {
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if (!isset($data["nome_arquivo"])) {
      $data["nome_arquivo"] = "default.jpg";
    }
    $img[$i] = $data["nome_arquivo"];
  }
  $sql2 = "SELECT * 
                FROM produto
                WHERE codigo_prod = $id";

  $result = $bd->query($sql2);
  $data = $result->fetch(PDO::FETCH_ASSOC);
  if($data["quantidade"] != 0){

      echo " 
            <div class='poduct-main-container'>
            <p id='cod'>".$data["codigo_prod"]."</p>
            <aside class='preview'>
                <div class='background'>
                    <img class='preview-img img' src='../covers/" . $img[2] . "' alt=''>
                 </div>
                 <div class='background'>
                     <img class='preview-img img' src='../covers/" . $img[1] . "' alt=''>
                 </div>
                  </aside>
                  <div>
                        <img class='main-img' src='../covers/" . $img[0] . "' alt='' srcset=''>
                  </div>
                  <div class='product-info'>
                        <div class='top-info'>
                            <div class='value-info'>
                                <h2>R$</h2>
                                <h2 id='value'>" . $data["valor_unitario"] . "</h2>
                            </div>
                              <label id='go-to' for='add-to-cart'>
                                <a href='./payment.php?username=$username' id='product-label'>
                                    <img id='shop-cart' src='../assets/shopcart.png' alt=''>
                                    <p>Comprar</p>  
                                </a>
                            </label>
                            </div>
                        <div class='product-desc'>
                            <h2 id='tittle' >" . $data["nome_pro"] . "</h2>
                            <p id='desc'>" . $data["descricao"] . "</p>
                        </div>
                      </div>";
  }
}
function searchProduct($cod, $username)
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

  if($data["quantidade"] != 0){


      echo "<div class='card'>
                <div class='cover'>
                    <img  src='../covers/" . $data['nome_arquivo'] . "' alt=''>
                </div>
               <h3 class='gameTitle'>" . $data["nome_pro"] . "</h3>
               <p class='cod'>".$data["codigo_prod"]."</p> 
               <div class='info'>
                    <div class='price-info'>
                        <div>
                            <p class='cod'>".$data["codigo_prod"]."</p>
                            <h3 class='price'>Valor</h3>
                            <h3 class='price unity'>" . $data["valor_unitario"] . "</h3>
                        </div>
                        <label for=''>
                           <a href='./productPage.php?username=$username&id=" . $data["codigo_prod"] . "' >
                               <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                           </a>
                        </label>
                    </div>
                </div>
            </div>";
  }
}
function shipmentInfo($id){
    $bd = connect();

    $sql = "SELECT c.*
                FROM  cliente c
                WHERE cpf_cnpj_cli = $id";

    $result = $bd->query($sql);

    $data = $result->fetch(PDO::FETCH_ASSOC);

    return "<label for='cep'>CEP:</label>
    <input type='text'class='req'  id='cep' value='".$data["cep_cli"]."'name='cep'><br>
    <label for='number'>Numero:</label>
    <input type='text'class='req' value='".$data["numero_cli"]."'  id='number' name='number'><br>
    <label for='bairro'>Bairro:</label>
    <input type='text' class='req'value='".$data["bairro_cli"]."' id='bairro' name='neigb'><br>
    <label for='city'>Cidade:</label>
    <input type='text' class='req'value='".$data["cidade_cli"]."' id='localidade' name='city'><br>
    <label for='uf'>Estado:</label>
    <input type='text'class='req' value='".$data["estado_cli"]."' id='uf' name='state'><br>
    <label for='logradouro'>Endereço:</label>
    <input type='text' class='req'value='".$data["endereco_cli"]."' id='logradouro' name='address'>";
}