<?php
// Conexão com o banco de dados (substitua as credenciais conforme necessário)
$servername = "clinicadrhenriquefurtado.com.br";
$username = "u887045081_ponto_teste";
$password = "Chf-1953";
$dbname = "u887045081_ponto_teste";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados enviados pelo JS
$data = json_decode(file_get_contents('php://input'));

if (!empty($data->rosto)) {
    // Verificar se o rosto já está registrado
    $rosto = $data->rosto;
    $query = "SELECT nome FROM usuarios WHERE rosto = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $rosto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Rosto encontrado no banco de dados
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        echo json_encode(['nome' => $nome]);
    } else {
        // Rosto não encontrado, solicitar nome para registro
        echo json_encode(['registro' => true]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Dados inválidos']);
}

$conn->close();
?>
