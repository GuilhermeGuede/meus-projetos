<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/curriculo_estagio.css">
    <title>Formulário de Estágio</title>
    <script>
        function toggleOutraVaga() {
            var vagaSelect = document.getElementById("vaga");
            var outraVagaContainer = document.getElementById("outra_vaga_container");
            if (vagaSelect.value === "outras") {
                outraVagaContainer.style.display = "block";
                document.getElementById("outra_vaga").required = true;
            } else {
                outraVagaContainer.style.display = "none";
                document.getElementById("outra_vaga").required = false;
            }
        }
    </script>
</head>
<body>
    <form action="proc_estagio.php" method="post">
        <h1>Preencha seu Currículo de Estágio</h1>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" pattern="[0-9]{11}" maxlength="11" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <select id="cidade" name="cidade" required>
                <option value="">Escolha sua cidade</option>
                <option value="guarulhos">Guarulhos</option>
                <option value="outros">Outros</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <select id="bairro" name="bairro" required>
                <option value="">Escolha seu bairro</option>
                <option value="Água Azul">Água Azul</option>
                <option value="Água Chata">Água Chata</option>
                <option value="Bananal">Bananal</option>
                <option value="Bela Vista">Bela Vista</option>
                <option value="Bonsucesso">Bonsucesso</option>
                <option value="Bom Clima">Bom Clima</option>
                <option value="Cabuçu">Cabuçu</option>
                <option value="Cabuçu de Cima">Cabuçu de Cima</option>
                <option value="Capelinha">Capelinha</option>
                <option value="CECAP">CECAP</option>
                <option value="Centro">Centro</option>
                <option value="Cocaia">Cocaia</option>
                <option value="Cumbica">Cumbica</option>
                <option value="Fátima">Fátima</option>
                <option value="Gopoúva">Gopoúva</option>
                <option value="Invernada">Invernada</option>
                <option value="Itapegica">Itapegica</option>
                <option value="Jardim Presidente Dutra">Jardim Presidente Dutra</option>
                <option value="Jardim São João">Jardim São João</option>
                <option value="Jardim Vila Galvão">Jardim Vila Galvão</option>
                <option value="Lavras">Lavras</option>
                <option value="Macedo">Macedo</option>
                <option value="Maia">Maia</option>
                <option value="Monte Carmelo">Monte Carmelo</option>
                <option value="Morro Grande">Morro Grande</option>
                <option value="Morros">Morros</option>
                <option value="Parque Alvorada">Parque Alvorada</option>
                <option value="Parque Continental">Parque Continental</option>
                <option value="Picanço">Picanço</option>
                <option value="Pimentas">Pimentas</option>
                <option value="Ponte Grande">Ponte Grande</option>
                <option value="Porto da Igreja">Porto da Igreja</option>
                <option value="Recreio São Jorge">Recreio São Jorge</option>
                <option value="Recreio São Luis">Recreio São Luis</option>
                <option value="Residencial Bambi">Residencial Bambi</option>
                <option value="São João">São João</option>
                <option value="São Roque">São Roque</option>
                <option value="Sítio São Francisco">Sítio São Francisco</option>
                <option value="Taboão">Taboão</option>
                <option value="Tanque Grande">Tanque Grande</option>
                <option value="Torres Tibagy">Torres Tibagy</option>
                <option value="Tranquilidade">Tranquilidade</option>
                <option value="Várzea do Palácio">Várzea do Palácio</option>
                <option value="Vila Any">Vila Any</option>
                <option value="Vila Augusta">Vila Augusta</option>
                <option value="Vila Barros">Vila Barros</option>
                <option value="Vila Carmela I">Vila Carmela I</option>
                <option value="Vila Carmela II">Vila Carmela II</option>
                <option value="Vila Galvão">Vila Galvão</option>
                <option value="Vila Nova Bonsucesso">Vila Nova Bonsucesso</option>
                <option value="Vila Rio">Vila Rio</option>
                <option value="Vila São João">Vila São João</option>
                <option value="Vila São Luís">Vila São Luís</option>
                <option value="Vila São Rafael">Vila São Rafael</option>
                <option value="Jardim Bela Vista">Jardim Bela Vista</option>
                <option value="Jardim Cumbica">Jardim Cumbica</option>
                <option value="Jardim Fortaleza">Jardim Fortaleza</option>
                <option value="Jardim Guaracy">Jardim Guaracy</option>
                <option value="Jardim Leblon">Jardim Leblon</option>
                <option value="Jardim Maria Dirce">Jardim Maria Dirce</option>
                <option value="Jardim Munhoz">Jardim Munhoz</option>
                <option value="Jardim Nova Cumbica">Jardim Nova Cumbica</option>
                <option value="Jardim Oliveira">Jardim Oliveira</option>
                <option value="Jardim Ottawa">Jardim Ottawa</option>
                <option value="Jardim Paraíso">Jardim Paraíso</option>
                <option value="Jardim Paraventi">Jardim Paraventi</option>
                <option value="Jardim Presidente Dutra">Jardim Presidente Dutra</option>
                <option value="Jardim Santa Clara">Jardim Santa Clara</option>
                <option value="Jardim Santa Mena">Jardim Santa Mena</option>
                <option value="Jardim São Geraldo">Jardim São Geraldo</option>
                <option value="Jardim São João">Jardim São João</option>
                <option value="Jardim São Paulo">Jardim São Paulo</option>
                <option value="Jardim Silvia">Jardim Silvia</option>
                <option value="Jardim Terezópolis">Jardim Terezópolis</option>
                <option value="Jardim Tranquilidade">Jardim Tranquilidade</option>
                <option value="Jardim Valéria">Jardim Valéria</option>
                <option value="Parque Cecap">Parque Cecap</option>
                <option value="Parque Continental I">Parque Continental I</option>
                <option value="Parque Continental II">Parque Continental II</option>
                <option value="Parque Continental III">Parque Continental III</option>
                <option value="Parque Continental IV">Parque Continental IV</option>
                <option value="Parque Jurema">Parque Jurema</option>
                <option value="Parque Mikail">Parque Mikail</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="">Selecione</option>
                <option value="feminino">Feminino</option>
                <option value="masculino">Masculino</option>
                <option value="outro">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div class="form-group">
            <label for="nivel_ensino">Defina seu Nível de Ensino Atual:</label>
            <select id="nivel_ensino" name="nivel_ensino" required>
                <option value="">Selecione o Nível</option>
                <option value="1_ano_em">1º ano do Ensino Médio</option>
                <option value="2_ano_em">2º ano do Ensino Médio</option>
                <option value="3_ano_em">3º ano do Ensino Médio</option>
                <option value="curso_tecnico">Curso Técnico</option>
                <option value="graduacao">Graduação</option>
                <option value="pos_graduacao">Pós Graduação</option>
            </select>
        </div>
        <div class="form-group">
            <label for="instituicao_ensino">Instituição de Ensino:</label>
            <input type="text" id="instituicao_ensino" name="instituicao_ensino" required>
        </div>
        <div class="form-group">
            <label for="cursos_extras">Você Possui Algum Curso Extra?:</label>
            <textarea id="cursos_extras" name="cursos_extras" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="experiencia_profissional">Você Possui Alguma Experiência Profissional?:</label>
            <textarea id="experiencia_profissional" name="experiencia_profissional" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="vaga">Vaga:</label>
            <select id="vaga" name="vaga" required onchange="toggleOutraVaga()">
                <option value="">Escolha sua Vaga</option>
                <option value="Auxiliar administrativo">Auxiliar Administrativo</option>
                <option value="Auxiliar financeiro">Auxiliar Financeiro</option>
                <option value="Auxiliar limpeza">Auxiliar de Limpeza</option>
                <option value="Consultor de vendas">Consultor de Vendas</option>
                <option value="Desenvolvedor Back-end">Desenvolvedor Back-end</option>
                <option value="Desenvolvedor Front-end">Desenvolvedor Front-end</option>
                <option value="Designer">Designer</option>
                <option value="Gestor de trafego">Gestor de Tráfego</option>
                <option value="Tecnico em informatica">Técnico em Informática</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Outras">Outras</option>
            </select>
        </div>
        <div id="outra_vaga_container">
            <label for="outra_vaga">Digite a outra vaga:</label>
            <input type="text" id="outra_vaga" name="outra_vaga" aria-label="Outra Vaga">
        </div>
        <div>
            <label for="qualidade">Descreva uma qualidade sua:</label>
            <input type="text" id="qualidade" name="qualidade" required aria-label="Qualidade" style="text-transform: none;">
        </div>
        <div>
            <label for="defeito">Descreva um defeito seu:</label>
            <input type="text" id="defeito" name="defeito" required aria-label="Defeito" style="text-transform: none;">
        </div>
        <div>
            <label for="animal">Se você fosse um animal, qual você seria?</label>
            <select id="animal" name="animal" required aria-label="Animal">
                <option value="">Selecione</option>
                <option value="leao">Leão</option>
                <option value="tigre">Tigre</option>
                <option value="aguia">Águia</option>
                <option value="lobo">Lobo</option>
            </select>
        </div>
        <div>
            <label for="escolha_animal">Por que a escolha desse animal?</label>
            <textarea id="escolha_animal" name="escolha_animal" rows="3" required aria-label="Escolha do Animal"></textarea>
        </div>
        <div>
            <label for="intencao_estagio">Qual é a sua intenção com esse estágio?</label>
            <textarea id="intencao_estagio" name="intencao_estagio" rows="3" required aria-label="Intenção com Estágio"></textarea>
        </div>
        <div>
            <label for="planos_estagio">Quais são seus planos ingressando nesse estágio?</label>
            <textarea id="planos_estagio" name="planos_estagio" rows="3" required aria-label="Planos Ingressando no Estágio"></textarea>
        </div>
        <button type="submit">Candidatar-se</button>
    </form>
</body>
</html>