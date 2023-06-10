<?php

$username = $_GET["username"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/font.css">
    <link rel="stylesheet" href="style/style.css">
    <title>User page</title>
</head>
<body>
    <header>
        <a href="../home.php?username=<?=$username?>">
            <img src="../../assets/home.png" alt="">
        </a>
    </header>
    <main>
        <div class="user-hero">
            <img class="icon" src="../../assets/user.png" alt="">
            <h1><?=$username?></h1>
        </div>
        <div class="previous-buys">
            <h3>Minhas compras</h3>
        </div>
        <div>
            
        </div>
    </main>
</body>
</html>