<?php
session_start();
include('conexao.php');

// Verificar se o usuário é gerente
if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] != 'Gerente') {
    die("Acesso negado.");
}

// Verificar se foi enviado um formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $vaga_id = $_POST['vaga_id'];
    $acao = $_POST['acao'];

    // Verificar a ação solicitada
    if ($acao == 'aprovar') {
        // Atualizar o status da vaga para 'aprovada'
        $sql = "UPDATE vagas SET status = 'aprovada' WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $vaga_id);
        $stmt->execute();
        $stmt->close();
    } elseif ($acao == 'rejeitar') {
        // Excluir a vaga do banco de dados
        $sql = "DELETE FROM vagas WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $vaga_id);
        $stmt->execute();
        $stmt->close();
    }

    // Redirecionar de volta para a página de gerenciamento de vagas
    header("Location: gerenciar_vagas.php");
    exit();
}

$conexao->close();
?>
