<?php
$username = $_GET['username'];
include_once "../src/Product/products.php";
session_start();
$gamesFound = $_SESSION["gamesFound"];
$search = $_GET["search"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/font.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./User/style/style.css">
    <link rel="icon" href="../assets/icon_logo.png" type="image.png">
    <title>Home</title>
</head>
<body>
    <header>
        <a href="./home.php?username=<?=$username?>">
            <img src="../assets/home.png" alt="">
        </a>
    </header>
    <h1> Resultados para: '<?=$search?>'</h1>
    <main>
        <?php
        $c = count($gamesFound);
       
        for ($i=0; $i < $c; $i++) { 
            searchProduct($gamesFound[$i]);
        }
        ?>
    </main>
</body>
</html>