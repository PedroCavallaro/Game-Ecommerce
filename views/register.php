<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/register.css">
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
            <form action="../src/register.php" method="post">
                <div>
                    <a href="../views/login.php">
                        <img id="home" src="../assets/home.png">
                    </a>
                </div>
                <div>
                    <label for="cpf">CPF:</label><br>
                    <input type="text" class="req"  id="cpf" name="cpf"><br>
                    <label for="name">Nome:</label><br>
                    <input type="text"class="req"  id="name" name="cliName"><br>
                    <label for="cep">CEP:</label><br>
                    <input type="text"class="req"  id="cep" name="cep"><br>
                    <label for="number">Numero:</label><br>
                    <input type="text"class="req"  id="number" name="number"><br>
                    <label for="bairro">Bairro:</label><br>
                    <input type="text" class="req" id="bairro" name="neigb"><br>
                    <label for="city">Cidade:</label><br>
                    <input type="text" class="req" id="localidade" name="city"><br>
                    <label for="uf">Estado:</label><br>
                    <input type="text"class="req"  id="uf" name="state"><br>
                    <label for="logradouro">Endereço:</label><br>
                    <input type="text" class="req" id="logradouro" name="address"><br>
                </div>
                    <input type="submit" value="Cadastrar">                
            </form>
            <div></div>
        </section>
    </main>
    <script src="./dist/register.js"></script>
</body>
</html>