<?php
include_once('config.inc.php');

// só executa o INSERT se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['cliente'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // diretorio onde as imagens serão salvas
    $pasta = "admin/uploads/clientes/";
    $imagem_nome = null;

    // verifica se uma imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($extensao, $tipos_permitidos)) {
            // gera um nome único para o arquivo
            $novo_nome = uniqid("cliente_") . "." . $extensao;
            $destino = $pasta . $novo_nome;

            // move o arquivo para a pasta de uploads
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                $imagem_nome = $novo_nome;
            } else {
                echo "<p style='color:red;'>Erro ao mover o arquivo de imagem!</p>";
            }
        } else {
            echo "<p style='color:red;'>Tipo de arquivo não permitido. Envie JPG, PNG, GIF ou WEBP.</p>";
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

<link rel="stylesheet" href="assets/css/formularios.css">

<div class="formulario">
    <h2>Cadastro de Cliente</h2>
    <form action="clientes-cadastro.php" method="post" enctype="multipart/form-data">
        <label>Nome:</label>
        <input type="text" name="cliente" required>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <label>Estado:</label>
        <input type="text" name="estado">

        <label>Foto:</label>
        <input type="file" name="imagem" accept="image/*">

        <input type="submit" value="Cadastrar">
    </form>
</div>
