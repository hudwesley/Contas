<?php
    define("DB_SERVER", "127.0.0.1");  // Nome ou endereço (IP) do servidor
    define("DB_USERNAME", "root"); // Nome do usuário
    define("DB_PASSWORD", "");  // Senha de acesso ao servidor do banco de dados
    define("DB_NAME", "contas");  // Nome do banco de dados

    // Criar um objeto de conexão usando constantes
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar a conexão
    if($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }
?>
