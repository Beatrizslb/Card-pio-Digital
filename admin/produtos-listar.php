<?php
require 'config.inc.php';

echo "<h2 style='color:#732E08;'>Lista de Produtos</h2>";
echo "<p><a href='?pg=produtos-cadastrar' class='btn'>Adicionar Novo Produto</a></p>";

$sql = "SELECT * FROM produtos ORDER BY categoria, nome";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($dados = mysqli_fetch_assoc($result)) {
        echo "<div style='display:flex; align-items:center; gap:15px; margin-bottom:15px;'>";

        if (!empty($dados['imagem']) && file_exists($dados['imagem'])) {
            echo "<img src='{$dados['imagem']}' alt='Imagem do produto' style='width:80px; height:80px; object-fit:cover; border-radius:8px; border:1px solid #ccc;'>";
        } else {
            echo "<div style='width:80px; height:80px; background:#f0f0f0; display:flex; align-items:center; justify-content:center; color:#999; border-radius:8px;'>Sem foto</div>";
        }


        echo "<div>";
        echo "<strong>{$dados['nome']}</strong> ({$dados['categoria']})<br>";
        echo "Preço: R$ " . number_format($dados['preco'], 2, ',', '.') . "<br>";
        echo "<a href='?pg=produtos-editar&id={$dados['id']}'>Editar</a> | ";
        echo "<a href='?pg=produtos-excluir&id={$dados['id']}'>Excluir</a>";
        echo "</div>";

        echo "</div><hr>";
    }
} else {
    echo "<p>Nenhum produto cadastrado ainda.</p>";
}
?>
