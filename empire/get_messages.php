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

// Consulta SQL para buscar mensagens ordenadas por data
$sql = "SELECT user_id, message, created_at FROM messages ORDER BY created_at DESC LIMIT 50";
$result = $conn->query($sql);

// Retornar mensagens como JSON
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
echo json_encode($messages);

// Fechar conexão
$conn->close();
?>
