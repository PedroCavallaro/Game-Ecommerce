<?php
include_once "./src/user.php";
$username = $_GET["username"];
session_start();

$id = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon_logo.png" type="image.png">
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

        <form class="user-section" action="./src/update.php" method="POST">
            <div id="edit">
                <img src="../../assets/pencil.png" alt="">
            </div>
            <?php
                echo renderInfo($id);
            ?>
            <div class="save-changes-div">
                <input id="save-changes" type="submit" value="Salvar">
            </div>
        </form>
        <div class="previous-buys">
            <h3>Minhas compras</h3>
        </div>
        <div>
            
        </div>
    </main>
    <script src="../dist/user.js"></script>
</body>
</html>