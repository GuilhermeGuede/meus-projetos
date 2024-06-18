<?php
session_start();
include('conexao.php');

// Verifique se o usuário é um gerente
if ($_SESSION['acesso'] != 'Gerente') {
    die("Acesso negado.");
}

// Buscar todas as vagas pendentes no banco de dados
$sql = "SELECT * FROM vagas WHERE status = 'pendente'";
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
    <title>Gerenciar Vagas Pendentes</title>
</head>
<body>
<header>
    <img src="../components/images/logo_guaru.jpeg" width="100" height="100" style="margin-left: 10px;">
    <nav class="link-btn">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="vagas.php">Vagas</a></li>
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
                <p>Endereço: <?php echo htmlspecialchars($vaga['endereco']); ?></p>
                <p>Remuneração: <?php echo htmlspecialchars($vaga['remuneracao']); ?></p>
                <p>Tipo de Contrato: <?php echo htmlspecialchars($vaga['tipo_contrato']); ?></p>
                <p>Escala: <?php echo htmlspecialchars($vaga['escala']); ?></p>
                <p>Horário: <?php echo htmlspecialchars($vaga['horario']); ?></p>
                <p>Formato: <?php echo htmlspecialchars($vaga['formato']); ?></p>
                <p>Descrição: <?php echo htmlspecialchars($vaga['descricao']); ?></p>
                <p>Requisitos: <?php echo htmlspecialchars($vaga['requisitos']); ?></p>

                <form action="proc_gerenciamento_vagas.php" method="post">
                <input type="hidden"  name="vaga_id" value="<?php echo $vaga['id']; ?>">
                <button type="submit" name="acao" value="aprovar">Aprovar</button>
                <button type="submit" name="acao" value="rejeitar">Rejeitar</button>    
                <form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2 style="margin-left: 235px; color: white;">Nenhuma vaga pendente.</h2>
    <?php endif; ?>
</div>

</body>
</html>
