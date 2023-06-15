<?php
include_once "../src/Product/products.php";
$username = $_GET["username"];
if(!isset($username)){
    header("location:./login.php");
}
session_start();
$id = $_SESSION["user"]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/font.css">
    <link rel="icon" href="../assets/icon_logo.png" type="image.png">
    <link rel="stylesheet" href="style/payment.css">
    <title>Pagamento</title>
</head>
<body>
<div class="modal-container">
        <div class="modal">
            <h3>Compra aprovada com sucesso</h3>
            <p>Suas compras podem ser visualizadas na <a href="./User/user.php?username=<?=$username?>">página de usuário</a></p>
        </div>
    </div>
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
                <a  href="User/user.php?username=<?=$username?>">
                    <img  class="headerImg" src="../assets/user.png" alt="userIcon">
                </a>
                <h3>Olá <?=$username?></h3>
            </div>
        </div>
    </header>
    
    <form action="../src/finish.php?username=<?=$username?>&id=<?=$id?>" method="POST">
        <section class="left">
            <div class="total-price">
                <p>Total:</p>
                <h2 id="value"></h2>
            </div>
           <div class="items-cart-container">

           </div>
        </section>
        <section class="middle">
            <h1 id="head-middle">Método de Pagamento</h1>
            <div class="payment-methods">
                <label class="payment-label" for="">
                    <img class="payment-img" src="../assets/credit.png" alt="">
                    <p>Cartão de crédito</p>
                </label>
                <label class="payment-label" for="">
                    <img  class="payment-img" src="../assets/debit.png" alt="">
                    <p>Cartão de Débito</p>
                </label>
            </div>
        </section>
        <section class="right">
            <div class="shipment-info">
                <h2>Informações de entrega</h2>
                    <div class="inputs">
                        <?=shipmentInfo($id)?>
                    </div>
                    <div class="pay">
                        <input type="submit" value="Finalizar">
                    </div>
                </div>  
            </section>
        </form>
    <script  type="module" src="./dist/payment.js"></script>
</body>
</html>