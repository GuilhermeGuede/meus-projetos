<?php
include("conexao.php");
// submeter_vaga.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Coletar dados do formulário
    $nome_empresa = $_POST['nome_empresa'];
    $vaga = $_POST['vaga'];
    $endereco = $_POST['endereco'];
    $remuneracao = $_POST['remuneracao'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $escala = $_POST['escala'];
    $horario = $_POST['horario'];
    $formato = $_POST['formato'];
    $descricao = $_POST['descricao'];
    $requisitos = $_POST['requisitos'];

    // Preparar e executar a inserção no banco de dados
    $stmt = $conexao->prepare("INSERT INTO vagas (nome_empresa, vaga, endereco, remuneracao, tipo_contrato, escala, horario, formato, descricao, requisitos, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pendente')");
    $stmt->bind_param("ssssssssss", $nome_empresa, $vaga, $endereco, $remuneracao, $tipo_contrato, $escala, $horario, $formato, $descricao, $requisitos);

    if ($stmt->execute()) {
        echo "Vaga submetida com sucesso. Aguardando aprovação do gerente.";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>
