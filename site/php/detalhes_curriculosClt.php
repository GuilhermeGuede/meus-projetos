<?php
include("conexao.php");

// Verifica se o ID do usuário foi passado
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "SELECT id, nome, telefone, email, cidade, bairro, sexo, data_nascimento, pretensao_salarial, formacao_academica, cursos_extras, ultima_experiencia, motivo_desligamento, vaga, outra_vaga, qualidade, defeito, animal, escolha_animal FROM cadastros WHERE id= $userId";
    $result = $conexao->query($sql);

    if($result->num_rows > 0){
        $user_data = mysqli_fetch_assoc($result);

        // Formata a data de nascimento para o formato brasileiro
        $user_data['data_nascimento'] = date('d/m/Y', strtotime($user_data['data_nascimento']));

        // Retorna os dados do usuário como JSON
        echo json_encode($user_data);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
