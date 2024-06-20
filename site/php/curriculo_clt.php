<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Currículo</title>
    <link rel="stylesheet" href="../css/curriculo_clt.css">
    <script src="../js/function.js"></script>
</head>
<body>
    <form action="proc_curriculoClt.php" method="post">
        <h1>Preencha seu Currículo</h1>
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required aria-label="Nome">
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" pattern="[0-9]{11}" required aria-label="Telefone" oninput="validatePhone(this)">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-label="Email">
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <select id="cidade" name="cidade" required aria-label="Cidade">
                <option value="">Escolha sua cidade</option>
                <option value="guarulhos">Guarulhos</option>
                <option value="outros">Outros</option>
            </select>
        </div>
        <div>
            <label for="bairro">Bairro:</label>
            <select id="bairro" name="bairro" required aria-label="Bairro">
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
        <div>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required aria-label="Sexo">
                <option value="">Selecione</option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required aria-label="Data de Nascimento">
        </div>
        <div>
            <label for="pretensao_salarial">Pretensão Salarial:</label>
            <div class="input-currency">
                <span class="currency-symbol">R$</span>
                <input type="number" id="pretensao_salarial" name="pretensao_salarial" step="500" min="0" required aria-label="Pretensão Salarial">
            </div>
        </div>
        <div>
            <label for="formacao_academica">Formação Acadêmica:</label>
            <textarea id="formacao_academica" name="formacao_academica" required aria-label="Formação Acadêmica"></textarea>
        </div>
        <div>
            <label for="cursos_extras">Cursos Extras:</label>
            <textarea id="cursos_extras" name="cursos_extras" required aria-label="Cursos Extras"></textarea>
        </div>
        <div>
            <label for="ultima_experiencia">Última Experiência:</label>
            <textarea id="ultima_experiencia" name="ultima_experiencia" required aria-label="Última Experiência"></textarea>
        </div>
        <div>
            <label for="motivo_desligamento">Motivo do Último Desligamento:</label>
            <textarea id="motivo_desligamento" name="motivo_desligamento" required aria-label="Motivo da Última Desligação"></textarea>
        </div>
        <div>
            <label for="vaga">Vaga:</label>
            <select id="vaga" name="vaga" required aria-label="Vaga" onchange="toggleOutraVaga()">
                <option value="">Escolha sua vaga</option>
                <option value="Auxiliar administrativo">Auxiliar Administrativo</option>
                <option value="Auxiliar financeiro">Auxiliar Financeiro</option>
                <option value="Auxiliarlimpeza">Auxiliar de Limpeza</option>
                <option value="Consultor de vendas">Consultor de Vendas</option>
                <option value="Desenvolvedor backend">Desenvolvedor Back-end</option>
                <option value="Desenvolvedor frontend">Desenvolvedor Front-end</option>
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
            <input type="text" id="qualidade" name="qualidade" required aria-label="Qualidade">
        </div>
        <div>
            <label for="defeito">Descreva um defeito seu:</label>
            <input type="text" id="defeito" name="defeito" required aria-label="Defeito">
        </div>
        <div>
            <label for="animal">Se você fosse um animal, qual você seria?</label>
            <select id="animal" name="animal" required aria-label="Animal">
                <option value="">Escolha um animal</option>
                <option value="Leao">Leão</option>
                <option value="Tigre">Tigre</option>
                <option value="Elefante">Elefante</option>
            </select>
        </div>
        <div>
            <label for="escolha_animal">Por que a escolha desse animal?</label>
            <textarea id="escolha_animal" name="escolha_animal" required aria-label="Escolha Animal"></textarea>
        </div>
        <button type="submit">Candidatar-se</button>
    </form>
</body>
</html>
