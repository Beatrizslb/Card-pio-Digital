<?php
include_once('config.inc.php');

// só executa o INSERT se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['cliente'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO clientes (cliente, cidade, estado) 
            VALUES ('$nome', '$cidade', '$estado')";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo "<p style='color:green;'>Cliente cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar: " . mysqli_error($conexao) . "</p>";
    }
}
?>

<div>
    <h2>Cadastro de Cliente</h2>
    <form action="?pg=clientes-cadastro-forms" method="post">
        <label>Nome:</label>
        <input type="text" name="cliente" required><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" required><br>
        <label>Estado:</label>
        <input type="text" name="estado"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</div>
