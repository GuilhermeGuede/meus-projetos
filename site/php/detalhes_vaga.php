<?php
include('conexao.php');

// Verificar se o ID foi passado via GET e não está vazio
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar informações no banco de dados
    $sql = "SELECT * FROM vagas WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'nome_empresa' => htmlspecialchars($row['nome_empresa']),
            'vaga' => htmlspecialchars($row['vaga']),
            'endereco' => htmlspecialchars($row['endereco']),
            'remuneracao' => htmlspecialchars($row['remuneracao']),
            'tipo_contrato' => htmlspecialchars($row['tipo_contrato']),
            'escala' => htmlspecialchars($row['escala']),
            'horario' => htmlspecialchars($row['horario']),
            'formato' => htmlspecialchars($row['formato']),
            'descricao' => htmlspecialchars($row['descricao']),
            'requisitos' => htmlspecialchars($row['requisitos'])
        ]);
    } else {
        echo json_encode(['error' => 'Nenhum resultado encontrado']);
    }
}    
$conexao->close();
?>
