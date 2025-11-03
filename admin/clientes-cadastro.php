<?php
    include 'auth.php';
    require_once "config.inc.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cliente = $_REQUEST["cliente"];
        $cidade = $_REQUEST["cidade"];
        $estado = $_REQUEST["estado"];    
    }else{
        echo "<h2>Envio de dados não permitido</h2>";
    }
   
    $sql = "INSERT INTO clientes (cliente, cidade, estado) 
            VALUES('$cliente', '$cidade', '$estado')";

    $inserir = mysqli_query($conexao, $sql);

    if($inserir){
        echo "<h2>Cadastrado com sucesso</h2>";
        echo "<a href='?pg=clientes-admin'>Voltar</a>";
    }else{
        echo "Cadastrado não realizado.";
    }
?>