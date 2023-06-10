<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <link rel="stylesheet" href="./style/font.css">
    <link rel="icon" href="../assets/icon_logo.png" type="image.png">
    <title>Register</title>
</head>
<body>
    <main>
        <section class="left">
        <img src="../assets/logo.png" alt="">
        </section>
        <section class="right">
            <form action="../src/auth.php" method="post">
                <div>
                
                </div>
                <div>
                    <label for="cpf">CPF:</label><br>
                    <input type="text" id="cpf" name="cpf"><br>
                    <label for="name">Nome:</label><br>
                    <input type="text" id="name" name="cliName"><br>
                    <label for="cep">CEP:</label><br>
                    <input type="text" id="cep" name="cep"><br>
                    <label for="number">Numero:</label><br>
                    <input type="text" id="number" name="number"><br>
                    <label for="cpf">CPF:</label><br>
                    <input type="text" id="cpf" name="cpf"><br>
                </div>
                    <input type="submit" value="Cadastrar">                
            </form>
            <div></div>
        </section>
    </main>
</body>
</html>