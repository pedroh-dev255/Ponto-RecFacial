<?php

// Configurações do banco de dados
$host = 'clinicadrhenriquefurtado.com.br'; // Host do banco de dados
$usuario = 'u887045081_ponto_teste'; // Usuário do banco de dados
$senha = 'Chf-1953'; // Senha do banco de dados
$banco = 'u887045081_ponto_teste'; // Nome do banco de dados

// Tentar conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se conectado, retornar mensagem de sucesso
    $response = [
        'connected' => true,
        'message' => 'Conexão bem-sucedida.'
    ];
    echo json_encode($response);
} catch (PDOException $e) {
    // Se houver erro, retornar mensagem de erro
    $response = [
        'connected' => false,
        'error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
