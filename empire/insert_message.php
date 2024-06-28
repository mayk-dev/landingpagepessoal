<?php
// Configurações de conexão com o banco de dados
$mysql_host = 'viaduct.proxy.rlwy.net';
$mysql_user = 'root';
$mysql_password = 'ZlOJSFNSBCXNOxRQpwJVaCvlzZGixmNZ';
$mysql_database = 'railway';
$mysql_port = 59613;

// Conectar ao banco de dados
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database, $mysql_port);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$user_id = $_POST['user_id'];
$message = $_POST['message'];

// Preparar e executar consulta SQL
$stmt = $conn->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
$stmt->bind_param("is", $user_id, $message);
$stmt->execute();

// Fechar consulta e conexão
$stmt->close();
$conn->close();
?>
