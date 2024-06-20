<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $sexo = $_POST['sexo'];
    $data_nasc = $_POST['data_nascimento'];
    $pretensao_salarial = $_POST['pretensao_salarial'];
    $formacao_academica = $_POST['formacao_academica'];
    $cursos_extras = $_POST['cursos_extras'];
    $ultima_experiencia = $_POST['ultima_experiencia'];
    $motivo_desligamento = $_POST['motivo_desligamento'];
    $vaga = $_POST['vaga'];
    $outra_vaga = $_POST['outra_vaga'];
    $qualidade = $_POST['qualidade'];
    $defeito = $_POST['defeito'];
    $animal = $_POST['animal'];
    $escolha_animal = $_POST['escolha_animal'];

    $stmt = $conexao->prepare("INSERT INTO cadastros (nome, telefone, email, cidade, bairro, sexo,
    data_nascimento, pretensao_salarial, formacao_academica, cursos_extras, ultima_experiencia, motivo_desligamento, vaga,
    outra_vaga, qualidade, defeito, animal, escolha_animal)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sissssssssssssssss", $nome, $telefone, $email, $cidade, $bairro, $sexo, $data_nasc, $pretensao_salarial, $formacao_academica, $cursos_extras, $ultima_experiencia, $motivo_desligamento, $vaga, $outra_vaga, $qualidade, $defeito, $animal, $escolha_animal);

    if($stmt->execute()){
        echo "Curriculo submetido com sucesso!";
    }else{
        echo "Erro:" . $stmt->erro;
    }

    $stmt->close();
    $conexao->close();
}
?>