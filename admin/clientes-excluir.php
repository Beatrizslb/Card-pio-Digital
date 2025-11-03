<?php
    require_once 'config.inc.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($conexao, $sql)){
        echo "<h2>Cliente Excluido com sucesso</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }else{
        echo "<h2>Erro ao excluir</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }
?>