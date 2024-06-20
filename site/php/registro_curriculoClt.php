<?php
include("conexao.php");

$sql = "SELECT id, nome, vaga, formacao_academica, cidade, bairro, sexo, data_nascimento, pretensao_salarial FROM cadastros";
$result = $conexao->query($sql);

$dados = $conexao->query($sql) or die (mysqli_error($conexao));

$linha = mysqli_fetch_assoc($dados);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/registros_cl.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Curriculos CLT</title>
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

<h1>Currículos CLT</h1>

<table class="table" id="tabelaRegistros">
    <thead>
        <tr>
            <th scope="col" id="col_nome">Nome</th>
            <th scope="col" id="col_vaga">Vaga</th>
            <th scope="col" id="col_formacao">Formação</th>
            <th scope="col" id="col_cidade">Cidade</th>
            <th scope="col" id="col_bairro">Bairro</th>
            <th scope="col" id="col_sexo">Sexo</th>
            <th scope="col" id="col_data_nasc">Nascimento</th>
            <th scope="col" id="col_acao">Detalhes</th>
        </tr>
    </thead> 
    <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td class=''>" . $user_data['nome'] . "</td>";
                echo "<td class=''>" . $user_data['vaga'] . "</td>";
                echo "<td class=''>" . $user_data['formacao_academica'] . "</td>";
                echo "<td class=''>" . $user_data['cidade'] . "</td>";
                echo "<td class=''>" . $user_data['bairro'] . "</td>";
                echo "<td class=''>" . $user_data['sexo'] . "</td>";
                echo "<td class=''>" . date('d/m/Y', strtotime($user_data['data_nascimento'])) . "</td>";
                echo "<td><button class='openPopupBtn' data-id='{$user_data['id']}'> Detalhes</button></td>";
                echo "</tr>";            
            }
        ?>
    </tbody>       
</table> 

<!-- Div que será usada como sobreposição de fundo -->
<div id="overlay"></div>

<!-- Div que será usada como pop-up -->
<div id="popup">
    <div class="tab-header">
        <div class="tab-link active" data-tab="tab1">Dados Pessoais</div>
        <div class="tab-link" data-tab="tab2">Formação</div>
        <div class="tab-link" data-tab="tab3">Experiência</div>
    </div>
    
    <div id="tab1" class="tab-content active">
        <p id="tab1Content"></p>
    </div>
    
    <div id="tab2" class="tab-content">
        <p id="tab2Content"></p>
    </div>
    
    <div id="tab3" class="tab-content">
        <p id="tab3Content"></p>
    </div>
    
    <button id="closePopupBtn">Fechar</button>
</div>


<script>

$(document).ready(function() {
    // Função para abrir o pop-up
    $(document).on('click', '.openPopupBtn', function() {
        var userId = $(this).data('id');
        
        // Faz uma requisição AJAX para buscar os dados do usuário
        $.ajax({
            url: 'detalhes_curriculosClt.php', // Arquivo PHP que retorna os detalhes do usuário
            type: 'GET',
            data: { id: userId },
            success: function(response) {
                var data = JSON.parse(response);
                
                // Insere os dados do usuário nas abas correspondentes
                $('#tab1Content').html(
                    "<strong>Nome:</strong> " + data.nome + "<br>" +
                    "<strong>Telefone:</strong> " + data.telefone + "<br>" +
                    "<strong>Email:</strong> " + data.email + "<br>" +
                    "<strong>Cidade:</strong> " + data.cidade + "<br>" +
                    "<strong>Bairro:</strong> " + data.bairro + "<br>" +
                    "<strong>Sexo:</strong> " + data.sexo + "<br>" +
                    "<strong>Data de Nascimento:</strong> " + data.data_nascimento + "<br>" +
                    "<strong>Pretensão Salarial:</strong> " + data.pretensao_salarial + "<br>"
                );
                $('#tab2Content').html(
                    "<strong>Formação Acadêmica:</strong> " + data.formacao_academica + "<br>" +
                    "<strong>Cursos Extras:</strong> " + data.cursos_extras + "<br>"
                );
                $('#tab3Content').html(
                    "<strong>Última Experiência:</strong> " + data.ultima_experiencia + "<br>" +
                    "<strong>Motivo do Último Desligamento:</strong> " + data.motivo_desligamento + "<br>"
                );

                // Exibe o pop-up e a sobreposição de fundo
                $('#overlay').fadeIn();
                $('#popup').fadeIn();
            }
        });
    });

    // Função para fechar o pop-up
    $('#closePopupBtn, #overlay').click(function() {
        $('#popup').fadeOut();
        $('#overlay').fadeOut();
    });

    // Função para gerenciar as abas
    $('.tab-header').on('click', '.tab-link', function() {
        var tabId = $(this).data('tab');
        
        $('.tab-link').removeClass('active');
        $(this).addClass('active');
        
        $('.tab-content').removeClass('active');
        $('#' + tabId).addClass('active');
    });
});
</script>
</body>
</html>
