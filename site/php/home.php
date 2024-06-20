<?php
session_start(); 
include("conexao.php");

if(isset($_GET["usuario"])) {
    $_SESSION['usuario'] = $_GET['usuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/painel.css">
    <script src="../js/function.js"></script>
    <title>Área de Serviços</title>
</head>
<body>
<header>
    <img src="../components/images/logo_guaru.jpeg" width="100" height="100" style="margin-left: 10px;">
    <nav class="link-btn">
        <ul>
            <li><a href="vagas.php">Vagas</a></li>
            <li><a href="#">Cursos</a></li>
            <li><a href="#">Notícias</a></li>
            <?php if ($_SESSION['acesso'] == 'Gerente'): ?>
            <li><a href="gerenciar_vagas.php">Gerenciar Vagas</a></li>
          <?php endif; ?>
        </ul>
    </nav>
    
    <div class="menu-button">
        <div class="menu-icon"></div>
        <span>Menu</span>
    </div>
</header>

<div class="container">
    <div class="header">
    <h2>Olá <?php echo $_SESSION['usuario_nome'];?>! Você está no <span class="gratuito">Gratuito</span></h2>
    </div>
    <div class="cards">
        <div class="card">
            <div class="locked">
                <img src="../components/images/vagas.png" alt="Imagem de vagas" width="130px" height="130px" style="margin-left: -40px" >
            </div><br><br>
            <a href="empresa.php">
            <button class="btn" style="margin-top: 83px">Cadastrar vaga</button>
            </a>
        </div>
        <div class="card">
            <div class="locked">
            <img src="../components/images/analise.png" alt="Imagem de vagas" width="130px" height="130px" style="margin-left: -40px" >
            </div><br><br>
            <a href="curriculo_clt.php">
            <button class="btn" style="margin-top: 83px">Curriculo CLT</button>
            </a>    
        </div>
        <div class="card">
            <div class="locked">
            <img src="../components/images/estagio.png" alt="Imagem de vagas" width="130px" height="130px" style="margin-left: -40px" >
            </div><br><br>
            <a href="curriculo_estagio.php">
            <button class="btn" style="margin-top: 83px">Curriculo Estágio</button>
            </a>    
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="section">
        <h2>Tudo que o seu RH precisa, em um só lugar:</h2>
        <div class="grid">
            <div class="card2">
                <img src="../components/images/imagem6.jpg" alt=" imagem 6">
                <div class="overlay">Recrutamento</div>
                <div class="hover-text">Descubra profissionais com as competências ideais e aumente a produtividade em todas as etapas.</div>
            </div>
            <div class="card2">
                <img src="../components/images/imagem7.png" alt="imagem 7">
                <div class="overlay"> Admissão</div>
                <div class="hover-text">Acelere o processo de contratação e libere o fluxo de trabalho da sua equipe de recursos humanos.</div>
            </div>
            <div class="card2">
                <img src="../components/images/imagem8.jpg" alt="imagem 7">
                <div class="overlay"> Educação </div>
                <div class="hover-text"> Capacite os profissionais da linha de frente com um treinamento simples e intuitivo.</div>
            </div>  
            <div class="card2">
                <img src="../components/images/imagem9.jpg" alt="imagem 7">
                <div class="overlay">Networking</div>
                <div class="hover-text">Fortaleça suas conexões profissionais e expanda suas oportunidades de negócio com uma rede de contatos eficaz.</div>
            </div>  
            <div class="card2">
                <img src="../components/images/imagem10.png" alt="imagem 7">
                <div class="overlay">Perfomance</div>
                <div class="hover-text"> Otimize o desempenho da sua equipe e alcance resultados extraordinários com eficiência e precisão.</div>
            </div>        
        </div> 
    </div>

    <div class="carousel">
        <button class="prev" onclick="moveSlide(-1)">&#10095;</button> 
        <div class="carousel-inner">
            <img src="../components/images/imagem1.png" alt="imagem1">
            <img src="../components/images/imagem2.png" alt="imagem2">
            <img src="../components/images/imagem3.png" alt="imagem3">
        </div>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>                                                                                                                                                                  

    <h1>Como a Guaru Empregos pode te ajudar?</h1>

    <div class="container-2">
        <div class="box">
            <img src="../components/images/imagem4.jpg" alt="imagem 4">
            <h2>Fique por dentro</h2>
            <p><strong> A Guaru empregos conhece o mercado de trabalho e sabe muito bem como introduzir voce nele</strong></p>
            <p>Nossos assinantes se destacam porque ultilizam soluções que os deixam de cara com a sua vaga dos sonhos</p>
        </div> 
        <div class="box">
            <img src="../components/images/imagem5.jpg" alt="imagem 5">
            <h2>Fique por dentro</h2>
            <p><strong> A Guaru empregos conhece o mercado de trabalho e sabe muito bem como introduzir voce nele</strong></p>
            <p>Nossos assinantes se destacam porque ultilizam soluções que os deixam de cara com a sua vaga dos sonhos</p>
        </div> 
    </div>


    <div class="container-3">
        <div class="box-2 title">
            <h2>Oque é a Guaru Empregos?</h2>
            <img src="../components/images/logo_guaru.jpeg" alt="logotipo" width="200" height="200" style=" margin-left: -30px;">
        </div>
        <div class="box-2 content">
            <p>É o lugar onde você encontra emprego para todos. E é para todos mesmo! Já são mais de 40 anos ajudando as pessoas que mais precisam a conquistar uma oportunidade na maior metrópole do país, e junto com ela a dignidade e a concretização de sonhos.
               E ainda queremos mais! Queremos divulgar vagas de todo o Brasil de uma maneira simples, para que todos possam ter acesso a elas, sem complicação. Queremos aproximar os candidatos às vagas de emprego com os empregadores, estimulando uma ligação íntegra e honesta entre eles.
               E por tudo isso que nossa busca por soluções e ferramentas é incansável. Estamos sempre nos reinventando para tornar as oportunidades acessíveis e para que cada vez mais pessoas conquistem seu tão sonhado emprego.</p>
        </div>
    </div>

</body>
</html>
