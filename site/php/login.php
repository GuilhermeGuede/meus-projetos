<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
    <div class="login-container">
        <h1>Página de Login</h1>
        <form action="proc_login.php" method="post">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" placeholder="E-mail" required >

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>

            <input type="submit" value="Logar">
        </form>
        <div class="links">
            <a href="cadastro.php">Cadastrar-se</a><br>
            <a href="solicitar_redefinicao.php">Esqueceu sua senha?</a>
        </div>
    </div>
</body>
</html>
