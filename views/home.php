<?php
$username = $_GET['username'];
include_once "../src/Product/products.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/font.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="icon" href="../assets/icon_logo.png" type="image.png">
    <title>Home</title>
</head>
<body>
    <header>
        <img  src="../assets/icon_logo.png" alt="">
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
                <h2>Olá <?=$username?></h2>
            </div>
            <img class="headerImg" src="../assets/shopcart.png" alt="shopcart" srcset="">
        </div>
    </header>
    <main>
        <?=getProducts()?>
    </main>
</body>
</html>