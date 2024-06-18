<?php
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="cadastro_login.php" method="post">

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Nome do seu usuario" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            
            <label for="acesso">Acesso:</label>
            <select name="acesso" required>
                <option value="">Selecione</option>
                <option value="Empresa">Empresa</option>
                <option value="CLT">CLT</option>
                <option value="Estágio">Estágio</option>
            </select><br><br>

            <input type="submit" value="Cadastrar"><br><br>
            <a href="../index.html" class="voltar">Voltar</a>
        </form>

        <?php
        // Exibe a mensagem, se houver
        if (isset($_SESSION['mensagem'])) {
            echo "<div class=\"message\">{$_SESSION['mensagem']}</div>";
            unset($_SESSION['mensagem']); // Limpa a mensagem da sessão
        }
        ?>
    </div>
</body>
</html>
