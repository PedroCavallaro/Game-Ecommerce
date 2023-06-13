<?php

$username = $_GET['username'];
if(!isset($username)){
    header("location:./login.php");
}
include_once "../src/Product/products.php";
session_start();
$gamesFound = isset($_SESSION["gamesFound"]) ? $_SESSION["gamesFound"] : "";

$search =  isset($_GET["search"]) ? $_GET["search"] : "";
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
    <?php
    
    if($gamesFound != ""){
        echo "<h2>Resultados para '$search'</h2>";
    }
    ?>
    <main>
        <div class="shop-cart-container"> 
            <p id="arrow-left" class="arrow">></p>
            <!-- <img id="arrow-left" class="arrow" src="../assets/arrow-rigth.png" alt=""> -->
            <div class="item">
            </div>
            <div class="go-to-payment">
                <a href="./payment.php?username=<?=$username?>">
                    <input type="button" value="ir para pagamento">
                </a>
            </div>
        </div>
        <?php
            if($gamesFound == ""){
                echo "
                <div class='carrousel-container'>
                    <div class='carrousel'>
                        <div class='img-carrousel'>";
                        getImages($username);
                        echo "</div>
                    </div>
                </div>";
            }
        ?>
        
        <section class="products">
        <?php
       
        if($gamesFound != ""){
            $c = count($gamesFound);
       
            for ($i=0; $i < $c; $i++) { 
                searchProduct($gamesFound[$i]);
                
            }
            $user = $_SESSION["user"];
            session_destroy();
            session_start();
            $_SESSION["user"] = $user;
      
        }else{
           echo getProducts($username);
        }

        ?>
        </section>
    </main>
    <script src="./dist/home.js"></script>
</body>
</html>