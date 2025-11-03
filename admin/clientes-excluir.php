<?php
require_once 'config.inc.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']); // garante que seja número

    // --- Buscar o cliente para pegar o nome da imagem ---
    $sql_busca = "SELECT imagem FROM clientes WHERE id = '$id'";
    $result = mysqli_query($conexao, $sql_busca);

    if($result && mysqli_num_rows($result) > 0){
        $dados = mysqli_fetch_assoc($result);
        $imagem = $dados['imagem'];

        // --- Deletar a imagem da pasta se existir ---
        if(!empty($imagem) && file_exists("uploads/clientes/".$imagem)){
            unlink("uploads/clientes/".$imagem);
        }

        // --- Deletar o cliente do banco ---
        $sql_del = "DELETE FROM clientes WHERE id = '$id'";
        if(mysqli_query($conexao, $sql_del)){
            echo "<h2>Cliente excluído com sucesso</h2>";
            echo "<a href='?pg=clientes-admin'>Voltar</a>";
        } else {
            echo "<h2>Erro ao excluir cliente</h2>";
            echo "<a href='?pg=clientes-admin'>Voltar</a>";
        }
    } else {
        echo "<h2>Cliente não encontrado</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }
} else {
    echo "<h2>ID inválido</h2>";
    echo "<a href='?pg=clientes-admin'>Voltar</a>";
}
?>
