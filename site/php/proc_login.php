<?php
// Iniciar a sessão
session_start();
include("conexao.php");

// Verificar se os campos foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta SQL para verificar as credenciais
    $sql = "SELECT id, senha, usuario, acesso FROM login WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Usuário encontrado
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Senha correta
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['usuario'];
            $_SESSION['acesso'] = $row['acesso']; // Definir o nível de acesso na sessão

            // Redirecionar para a página de dashboard
            header("Location: home.php");
            exit();
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }

    // Fechar a conexão e o statement
    $stmt->close();
    $conexao->close();
}
?>
