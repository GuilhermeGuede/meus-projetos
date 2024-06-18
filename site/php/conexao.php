<?php
if (!defined('HOST')) {
    define('HOST', '127.0.0.1');
}

if (!defined('USUARIO')) {
    define('USUARIO', 'root');
}

if (!defined('SENHA')) {
    define('SENHA', '');
}

if (!defined('DB')) {
    define('DB', 'testee');
}

// Conexão usando mysqli
$mysqli = new mysqli(HOST, USUARIO, SENHA, DB);

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

// Verifica se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
} else {
    // Conexão mysqli estabelecida com sucesso
}

try {
    // Conexão usando PDO
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DB.";charset=utf8", USUARIO, SENHA);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
