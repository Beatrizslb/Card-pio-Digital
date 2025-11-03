<?php
// Configuração do banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'projeto_1c';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verifica conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>
