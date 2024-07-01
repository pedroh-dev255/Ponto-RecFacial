<?php

// Configurações do banco de dados
$host = 'clinicadrhenriquefurtado.com.br'; // Host do banco de dados
$usuario = 'u887045081_ponto_teste'; // Usuário do banco de dados
$senha = 'Chf-1953'; // Senha do banco de dados
$banco = 'u887045081_ponto_teste'; // Nome do banco de dados


// Receber dados do POST
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['nome']) || !isset($data['imagem_rosto'])) {
    $response = [
        'success' => false,
        'error' => 'Dados incompletos fornecidos.'
    ];
    echo json_encode($response);
    exit;
}

$nome = $data['nome'];
$imagemRosto = $data['imagem_rosto'];

// Tentar conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inserir registro na tabela de usuários
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, imagem_rosto) VALUES (:nome, :imagemRosto)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':imagemRosto', $imagemRosto);
    $stmt->execute();

    $response = [
        'success' => true,
        'message' => 'Usuário registrado com sucesso.'
    ];
    echo json_encode($response);
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'error' => 'Erro ao registrar usuário: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>
