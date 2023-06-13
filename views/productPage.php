<?php
include_once "../src/Product/products.php";

$idProd = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
$username = filter_input(INPUT_GET, "username", FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/font.css">
  <link rel="stylesheet" href="./style/home.css">
  <link rel="stylesheet" href="./style/productPage.css">
  <link rel="icon" href="../assets/icon_logo.png" type="image.png">
  <title>Pagina do produto</title>
</head>

<body>
<header>
        <a href="./home.php?username=<?=$username?>">
            <img  src="../assets/icon_logo.png" alt="">
        </a>
        <div>
            <form action="../src/Product/search.php?username=<?=$username?>" method="POST" id="searchContainer" for="">
                <input type="text" name="search">
                <label id="searchLabel" for="search">
                    <img src="../assets/search.png" id="searchImg" alt="" srcset="">
                    <input id="search" type="submit" >
                </label>
            </form>
        </div>
        <div class="user-section">
            <div>
                <a href="User/user.php?username=<?=$username?>">
                    <img class="headerImg" src="../assets/user.png" alt="userIcon">
                </a>
                <h3>Olá <?=$username?></h3>
            </div>
            <img class="headerImg" src="../assets/shopcart.png" id="shopCart" alt="shopcart" srcset="">
        </div>
    </header>
  <main>
      <section class="product-section">
         <?=renderProduct($idProd)?>
      </section>
  </main>
  <script src="./dist/prodPage.js"></script>
</body>

</html>