<?php
    require_once "admin/config.inc.php";

    $sql = "SELECT * FROM clientes";
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){
        echo "<h3>Clientes</h3>";
        while($dados = mysqli_fetch_array($resultado)){
            echo "<p>Nome: $dados[cliente]</p>";
            echo "<p>Cidade: $dados[cidade]</p>";
            echo "<p>Estado: $dados[estado]</p>";
            echo "<hr>";
        }
    }else{
        echo "<h3>Nenhum cliente cadastrado</h3>";
    }
?>