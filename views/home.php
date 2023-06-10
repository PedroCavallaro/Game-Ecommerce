<?php
$username = $_GET['username'];

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
            <form action="../src/auth.php" method="POST" id="searchContainer" for="">
                <input type="text">
                <label id="searchLabel" for="search">
                    <img src="../assets/search.png" id="searchImg" alt="" srcset="">
                    <input id="search" type="submit" value="pesquisar">
                </label>
            </form>
        </div>
        <div class="user-section">
            <div>
                <img class="headerImg" src="../assets/user.png" alt="userIcon">
                <h2>Olá <?=$username?></h2>
            </div>
            <img class="headerImg" src="../assets/shopcart.png" alt="shopcart" srcset="">
        </div>
    </header>
    <main>
        <div class="card">
            <div class="cover">
                <img  src="../covers/monster-hunter-world.jpeg" alt="">
            </div>
            <h3 class="gameTitle">Monster Hunter</h3>
            <div class="info">
                <div class="price-info">
                    <div>
                        <h3 class="price">Valor</h3>
                        <h3 class="price">12,5</h3>
                    </div>
                    <label for="">
                        <img class="arrow" src="../assets/arrow-rigth.png" alt="">
                    </label>
                </div>
            </div>
        </div>
    </main>
</body>
</html>