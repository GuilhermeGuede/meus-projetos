<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];
    $sexo = $_POST["sexo"];
    $data_nasc = $_POST["data_nascimento"];
    $nivel_ensino = $_POST["nivel_ensino"];
    $instituicao_ensino = $_POST["instituicao_ensino"];
    $cursos_extras = $_POST["cursos_extras"];
    $experiencia_profissional = $_POST["experiencia_profissional"];
    $vaga = $_POST["vaga"];
    $outra_vaga = $_POST["outra_vaga"];
    $qualidade = $_POST["qualidade"];
    $defeito = $_POST["defeito"];
    $animal = $_POST["animal"];
    $escolha_animal = $_POST["escolha_animal"];
    $intencao_estagio = $_POST["intencao_estagio"];
    $planos_estagio = $_POST["planos_estagio"];

    $stmt = $conexao->prepare("INSERT INTO estagio (nome, telefone, email, cidade, bairro, sexo, data_nascimento, nivel_ensino, instituicao_ensino, cursos_extras, experiencia_profissional, vaga, outra_vaga, qualidade, defeito, animal, escolha_animal, intencao_estagio, planos_estagio) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssssssssssssssss", $nome, $telefone, $email, $cidade, $bairro, $sexo, $data_nasc, $nivel_ensino, $instituicao_ensino, $cursos_extras, $experiencia_profissional, $vaga, $outra_vaga, $qualidade, $defeito, $animal, $escolha_animal, $intencao_estagio, $planos_estagio);

    if($stmt->execute()){
        echo "Currículo submetido com sucesso!";
    }else{
        echo "Erro:" . $stmt->erro;
    }

    $stmt->close();
    $conexao->close();

}

?>