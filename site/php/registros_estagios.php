<?php
include("conexao.php");

$sql = "SELECT id, nome, telefone, email, cidade, bairro, sexo, data_nascimento, nivel_ensino, instituicao_ensino, cursos_extras, experiencia_profissional, vaga, outra_vaga, qualidade, defeito, animal, escolha_animal, intencao_estagio, planos_estagio FROM estagio";
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/registros_estagios.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Currículos Estágios</title>
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

    <h1>Currículos de Estágios </h1>

    <table class="table" id="tabelaRegistros">
        <thead>
            <tr>
                <th scope="col" id="col_nome">Nome</th>
                <th scope="col" id="col_vaga">Vaga</th>
                <th scope="col" id="col_ensino">Ensino</th>
                <th scope="col" id="col_cidade">Cidade</th>
                <th scope="col" id="col_bairro">Bairro</th>
                <th scope="col" id="col_sexo">Sexo</th>
                <th scope="col" id="col_data_nasc">Nascimento</th>
                <th scope="col" id="col_acao">Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['vaga'] . "</td>";
                    echo "<td>" . $user_data['nivel_ensino'] . "</td>";
                    echo "<td>" . $user_data['cidade'] . "</td>";
                    echo "<td>" . $user_data['bairro'] . "</td>";
                    echo "<td>" . $user_data['sexo'] . "</td>";
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
                    url: 'detalhes_curriculosESTG.php', // Arquivo PHP que retorna os detalhes do usuário
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
                            "<strong>Qualidade:</strong> " + data.qualidade + "<br>" +
                            "<strong>Defeito:</strong> " + data.defeito + "<br>" +
                            "<strong>Vaga candidatada:</strong> " + data.vaga + "<br>"
                        );
                        $('#tab2Content').html(
                            "<strong>Nivel Ensino:</strong> " + data.nivel_ensino + "<br>" +
                            "<strong>Instituição de Ensino:</strong> " + data.instituicao_ensino + "<br>" +
                            "<strong>Cursos Extras:</strong> " + data.cursos_extras + "<br>"
                        );
                        $('#tab3Content').html(
                        "<strong>Experiencia profissional:</strong> " + data.experiencia_profissional + "<br>" +
                        "<strong>Planos para o estágio:</strong> " + data.planos_estagio + "<br>" +
                        "<strong>Intenção para o estágio:</strong> " + data.intencao_estagio + "<br>"
                        
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