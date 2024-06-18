<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function gerarCodigoVerificacao() {
    // Gerar um código aleatório
    $codigo_binario = random_bytes(16);

    // Converter o código para Base64
    $codigo_base64 = base64_encode($codigo_binario);

    // Remover caracteres especiais
    $codigo_base64 = strtr($codigo_base64, '+/', '-_');

    // Limitar o tamanho do código (opcional)
    $codigo_base64 = substr($codigo_base64, 0, 10); // Por exemplo, limitar a 10 caracteres

    return $codigo_base64;
}

function enviarCodigoVerificacao($email, $codigo) {
    $mail = new PHPMailer(true);

    try {
            //Configurações do servidor
            $mail->SMTPDebug = 2;                                 
            $mail->isSMTP();                                       
            $mail->Host = 'smtp.gmail.com';  // Substitua pelo seu servidor SMTP
            $mail->SMTPAuth = true;                               
            $mail->Username = 'guedesg226@gmail.com';  // Substitua pelo seu email
            $mail->Password = 'vdlx whae ryon xwkk';  // Substitua pela sua senha
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;

        $mail->setFrom('seu_email@gmail.com', 'Guilherme');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Redefinição de senha';
        $mail->Body = "Seu código de verificação é: $codigo";

        $mail->send();
        // Armazenar o código e o horário de envio na sessão
        $_SESSION['codigo_verificacao'] = $codigo;
        $_SESSION['hora_envio'] = time(); // Armazena o tempo atual em segundos

        // Redirecionar o usuário para a página de redefinição de senha
        header("Location: verificar_cod_email.php");
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');
    $email = $_POST['email'];

    $sql = $conexao->prepare("SELECT id FROM Login WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        $sql->bind_result($id);
        $sql->fetch();

        $codigo = bin2hex(random_bytes(16));

        // Obter a data e hora atuais
        date_default_timezone_set('America/Sao_Paulo');
        $data_hora_envio = date('Y-m-d H:i:s');

        // Atualizar o banco de dados com o código de verificação e a data/hora de envio
        $sql_update = $conexao->prepare("UPDATE Login SET codigo_verificacao = ?, tempo_envio = ? WHERE email = ?");
        $sql_update->bind_param("sss", $codigo, $data_hora_envio, $email);
        $sql_update->execute();

        // Enviar o código de verificação por e-mail
        enviarCodigoVerificacao($email, $codigo);
        
        header("location: verificar_cod_email.php");
    } else {
        echo "Endereço de e-mail não encontrado.";
    }

    $sql->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/solicitar_redefinicao.css">
    <title>Solicitar Redefinição de Senha</title>
</head>
<body>
    <div class="container">
        <h1>Redefinição de Senha</h1>
        
        <form action="" method="post">
            <label for="email">Endereço de E-mail:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <input type="submit" value="Enviar Código"><br><br>
            <a href="../index.html" class="voltar">Voltar</a>
        </form>
    </div>
</body>
</html>
