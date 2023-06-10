<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <link rel="stylesheet" href="./style/font.css">
    <link rel="icon" href="../assets/icon_logo.png" type="image.png">
    <title>Login</title>
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
                    <input type="text" id="cpf" name="cpf">
                    <span id="err"></span>
                    <p>
                        <p>Não tem uma conta? <a id="register" href="./register.php">Cadastre-se</a></p>
                    </p>
                </div>
                    <input type="submit" value="entrar">                
            </form>
            <div></div>
        </section>
    </main>
</body>
</html>