<?php
session_start();
include('conexao.php');

// Buscar todos os registros aprovados no banco de dados
$sql = "SELECT * FROM vagas WHERE status = 'aprovada'";
$result = $conexao->query($sql);

$vagas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vagas[] = $row;
    }
} else {
    echo "";
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vagos.css">
    <link rel="stylesheet" href="../css/painel.css">
    <title>Oportunidades em Aberto</title>
</head>
<body>
<header>
    <img src="../components/images/logo_guaru.jpeg" width="100" height="100" style="margin-left: 10px;">
    <nav class="link-btn">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Cursos</a></li>
            <li><a href="#">Notícias</a></li>
        </ul>
    </nav>
    <div class="menu-button">
        <div class="menu-icon"></div>
        <span>Menu</span>
    </div>
</header> 

<div id="dados">
        <?php if (!empty($vagas)): ?>
            <?php foreach ($vagas as $vaga): ?>
                <div class="vaga">
                    <p>Nome da Empresa: <?php echo htmlspecialchars($vaga['nome_empresa']); ?></p>
                    <p>Vaga: <?php echo htmlspecialchars($vaga['vaga']); ?></p>
                    <button type="button" onclick="verDetalhes(<?php echo htmlspecialchars($vaga['id']); ?>)">Ver Detalhes</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma vaga disponível.</p>
        <?php endif; ?>
    </div>

<!-- Modal -->
<div id="detalhesModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <h1>Detalhes da Vaga</h1>
        <div class="tabs">
            <button class="tablink active" onclick="openTab(event, 'Tab1')">Informações Básicas</button>
            <button class="tablink" onclick="openTab(event, 'Tab2')">Detalhes da Vaga</button>
        </div>
        <div id="Tab1" class="tabcontent active">
            <div id="infoBasicaContent">
                <!-- Informações básicas serão carregadas aqui -->
            </div>
        </div>
        <div id="Tab2" class="tabcontent">
            <div id="detalhesVagaContent">
                <!-- Detalhes da vaga serão carregados aqui -->
            </div>
        </div>
    </div>
</div>


<script>
function verDetalhes(id) {
    var modal = document.getElementById("detalhesModal");
    var infoBasicaContent = document.getElementById("infoBasicaContent");
    var detalhesVagaContent = document.getElementById("detalhesVagaContent");

    // Fazer requisição AJAX para obter os detalhes da vaga
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "detalhes_vaga.php?id=" + id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            // Organizar as informações nas abas
            infoBasicaContent.innerHTML = `
                <p>Nome da Empresa: ${response.nome_empresa}</p>
                <p>Vaga: ${response.vaga}</p>
                <p>Endereço: ${response.endereco}</p>
                <p>Escala: ${response.escala}</p>

            `;
            detalhesVagaContent.innerHTML = `
                <p>Remuneração: ${response.remuneracao}</p>
                <p>Tipo de Contrato: ${response.tipo_contrato}</p>
                <p>Horário: ${response.horario}</p>
                <p>Formato: ${response.formato}</p>
                <p>Descrição: ${response.descricao}</p>
                <p>Requisitos: ${response.requisitos}</p>
            `;

            modal.style.display = "block";
            openTab(null, 'Tab1'); // Abrir a primeira aba por padrão
        }
    };
    xhr.send();
}

function openTab(evt, tabName) {
    var i, tabcontent, tablink;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablink = document.getElementsByClassName("tablink");
    for (i = 0; i < tablink.length; i++) {
        tablink[i].className = tablink[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    if (evt) {
        evt.currentTarget.className += " active";
    }
}


function fecharModal() {
    var modal = document.getElementById("detalhesModal");
    modal.style.display = "none";
}

// Fechar o modal quando o usuário clicar fora dele
window.onclick = function(event) {
    var modal = document.getElementById("detalhesModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
