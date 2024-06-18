<?php
session_start();
include("conexao.php");

$tempoEspera = 3;
$urlDestino = "http://localhost/site/php/login.php";

// Verifica se os campos foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores do formulário
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $acesso = $_POST['acesso'];

    // Verifica se a senha atende aos requisitos de comprimento
    if (strlen($senha) < 6 || strlen($senha) > 12) {
        // Mensagem de erro em vermelho
        $_SESSION['mensagem'] = "<span style=\"color: red;\">Erro ao cadastrar usuário: A senha deve ter entre 6 e 12 caracteres.</span>";
    } else {
        // Verifica se o email já está cadastrado
        $sql_verifica = "SELECT * FROM login WHERE email = '$email'";
        $resultado_verifica = $conexao->query($sql_verifica);
        if ($resultado_verifica->num_rows > 0) {
            // Mensagem de erro em vermelho
            $_SESSION['mensagem'] = "<span style=\"color: red;\">Erro ao cadastrar usuário: O email já está em uso.</span>";
        } else {
            // Hash da senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Prepara e executa a consulta SQL para inserir o novo registro
            $sql = "INSERT INTO login (usuario,email, senha, acesso) VALUES ('$usuario','$email', '$senhaHash', '$acesso')";
            if ($conexao->query($sql) === TRUE) {
                // Mensagem de sucesso
                $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
                header("refresh:$tempoEspera; url=$urlDestino");
                exit();
            } else {
                // Mensagem de erro
                $_SESSION['mensagem'] = "Erro ao cadastrar usuário: " . $conexao->error;
            }
        }
    }

    // Redireciona de volta para a página de registro
    header("Location: cadastro.php");
    exit();
}
?>
