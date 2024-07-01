<?php

$host = 'clinicadrhenriquefurtado.com.br'; // Host do banco de dados
$usuario = 'u887045081_ponto_teste'; // Usuário do banco de dados
$senha = 'Chf-1953'; // Senha do banco de dados
$banco = 'u887045081_ponto_teste'; // Nome do banco de dados


try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar todos os usuários
    $stmt = $pdo->query("SELECT * FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($usuarios);
} catch (PDOException $e) {
    $response = [
        'success' => false,
        'error' => 'Erro ao obter usuários: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>
