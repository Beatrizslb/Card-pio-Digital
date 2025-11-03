<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['admin'])) {
    // Redireciona para login se não estiver logado
    header("Location: login.php?erro=2");
    exit;
}
?>
