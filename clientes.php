<?php
include_once "topo.php"; // já importa o CSS
require_once "admin/config.inc.php";

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    echo "<h2>Nossa família de Clientes</h2>";
    echo "<div class='clientes-grid'>"; // container grid

    while($dados = mysqli_fetch_assoc($resultado)){
        $imagem = !empty($dados['imagem']) ? "admin/uploads/clientes/".$dados['imagem'] : "admin/uploads/clientes/sem-foto.png";

        echo "<div class='cliente-card'>";
        echo "<img src='$imagem' alt='".htmlspecialchars($dados['cliente'])."'>";
        echo "<p><strong>Nome:</strong> ".htmlspecialchars($dados['cliente'])."</p>";
        echo "<p><strong>Cidade:</strong> ".htmlspecialchars($dados['cidade'])."</p>";
        echo "<p><strong>Estado:</strong> ".htmlspecialchars($dados['estado'])."</p>";
        echo "</div>";
    }

    echo "</div>"; // fecha clientes-grid
} else {
    echo "<p class='mensagem-erro'>Nenhum cliente cadastrado</p>";
}

include_once "rodape.php";
?>
