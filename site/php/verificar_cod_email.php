<?php
session_start(); // Inicie a sessão no topo da página

// verificar_codigo.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];

    // Verificar se o código é válido e se não passou de 1 minuto
    $sql = $conexao->prepare("SELECT id FROM Login WHERE email = ? AND codigo_verificacao = ? AND tempo_envio >= DATE_SUB(NOW(), INTERVAL 1 MINUTE)");
    $sql->bind_param("ss", $email, $codigo);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        // Código válido e dentro do tempo limite, redirecionar para a página de redefinição de senha
        $_SESSION['email'] = $email;
        header("Location: redefinir_senha.php");
        exit();
    } else {
        echo "Código de verificação inválido ou expirado.";
    }

    $sql->close();
    $conexao->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
</head>
<body>
    <h1>Verificar Código</h1>
    
    <form action="" method="post">
        <label for="email">Endereço de E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="codigo">Código de Verificação:</label><br>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <input type="submit" value="Verificar Código">
    </form>

</body>
</html>
