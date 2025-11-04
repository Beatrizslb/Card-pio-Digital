<?php
include_once('config.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['cliente'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $pasta = "uploads/clientes/";
    $imagem_nome = null;

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($extensao, $tipos_permitidos)) {
            $novo_nome = uniqid("cliente_") . "." . $extensao;
            $destino = $pasta . $novo_nome;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                $imagem_nome = $novo_nome;
            }
        }
    }

    $sql = "INSERT INTO clientes (cliente, cidade, estado, imagem)
            VALUES ('$nome', '$cidade', '$estado', " . ($imagem_nome ? "'$imagem_nome'" : "NULL") . ")";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        echo "<p style='color:green;'>Cliente cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar: " . mysqli_error($conexao) . "</p>";
    }
}
?>
