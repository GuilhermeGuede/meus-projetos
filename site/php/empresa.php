<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vaga</title>
    <link rel="stylesheet" href="../css/empresa.css">
</head>
<body>
    <form action="proc_empresa.php" method="post" id="myForm">
        <h1>Cadastro de Vaga</h1>
        <div class="form-group">
            <label for="nome_empresa">Nome da Empresa:</label>
            <input type="text" id="nome_empresa" name="nome_empresa" required>
        </div>
        <div class="form-group">
            <label for="vaga">Vaga:</label>
            <select id="vaga" name="vaga" required>
                <option value="">Escolha a Vaga</option>
                <option value="Auxiliar administrativo">Auxiliar Administrativo</option>
                <option value="Auxiliar financeiro">Auxiliar Financeiro</option>
                <option value="Auxiliar limpeza">Auxiliar de Limpeza</option>
                <option value="Consultor de vendas">Consultor de Vendas</option>
                <option value="Desenvolvedor backend">Desenvolvedor Back-end</option>
                <option value="Desenvolvedor frontend">Desenvolvedor Front-end</option>
                <option value="Designer">Designer</option>
                <option value="Gestor de trafego">Gestor de Tráfego</option>
                <option value="Tecnico em informatica">Técnico em Informática</option>
                <option value="vendedor">Vendedor</option>
                <option value="outras">Outras</option>
            </select>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="remuneracao">Remuneração:</label>
            <input type="number" id="remuneracao" name="remuneracao" step="500" min="0" required>
        </div>
        <div class="form-group">
            <label for="tipo_contrato">Tipo de Contrato:</label>
            <select id="tipo_contrato" name="tipo_contrato" required>
                <option value="">Escolha o Tipo de Contrato</option>
                <option value="Temporario">Temporário</option>
                <option value="Estagio">Estágio</option>
                <option value="Fixo CLT">Fixo CLT</option>
                <option value="Contrato PJ">Contrato PJ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="escala">Escala:</label>
            <select id="escala" name="escala" required>
                <option value="">Escolha a Escala</option>
                <option value="6-1">6x1</option>
                <option value="5-2">5x2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="horario">Horário:</label>
            <input type="text" id="horario" name="horario" required>
        </div>
        <div class="form-group">
            <label for="formato">Formato:</label>
            <select id="formato" name="formato" required>
                <option value="">Escolha o Formato</option>
                <option value="Home office">Home Office</option>
                <option value="Presencial">Presencial</option>
                <option value="Semi Presencial">Semi Presencial</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição da Vaga:</label>
            <textarea id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos Mínimos:</label>
            <textarea id="requisitos" name="requisitos" rows="3" required></textarea>
        </div>
        <button type="submit">Cadastrar Vaga</button>
    </form>
</body>
</html>
