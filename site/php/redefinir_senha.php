<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $email = $_SESSION['email'];

    if ($nova_senha === $confirmar_senha) {
        // Atualizar a senha no banco de dados
        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sql = $conexao->prepare("UPDATE Login SET senha = ?, codigo_verificacao = NULL WHERE email = ?");
        $sql->bind_param("ss", $hash, $email);
        $sql->execute();

        $_SESSION['mensagem'] = "Senha redefinida com sucesso.";
        header("location: redefinir_senha.php");
        exit();
    } else {
        $_SESSION['mensagem'] = "As senhas não coincidem.";
        header("location: redefinir_senha.php");
        exit();
    }

    $conexao->close();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>

    <form action="" method="post">
        <label for="nova_senha">Nova Senha:</label><br>
        <input type="password" id="nova_senha" name="nova_senha" required><br><br>

        <label for="confirmar_senha">Confirmar Nova Senha:</label><br>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required><br><br>

        <input type="submit" value="Redefinir Senha">
    </form>

    <?php if(isset($_SESSION['mensagem'])): ?>
        <p style="color: green;"><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    
</body>
</html>
