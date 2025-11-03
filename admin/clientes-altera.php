<?php
require_once 'config.inc.php';

$id = $_POST['id'];
$nome = $_POST['cliente'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

// --- Upload da imagem ---
$pasta = "uploads/clientes/";
$imagem_nome = null;

if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0){
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $tipos_permitidos = ['jpg','jpeg','png','gif','webp'];

    if(in_array($extensao, $tipos_permitidos)){
        $novo_nome = uniqid("cliente_").".".$extensao;
        $destino = $pasta . $novo_nome;

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
            $imagem_nome = $novo_nome;
        }
    }
}

// --- Monta o SQL ---
$sql = "UPDATE clientes SET cliente = '$nome', cidade = '$cidade', estado = '$estado'";

if($imagem_nome){
    $sql .= ", imagem = '$imagem_nome'";
}

$sql .= " WHERE id = '$id'";

// --- Executa ---
if(mysqli_query($conexao, $sql)){
    echo "<br><h2>Cliente alterado com sucesso!</h2>";
    echo "<a href='?pg=clientes-admin'>Voltar</a>";
}else{
    echo "<h3>Falha ao alterar: " . mysqli_error($conexao) . "</h3>";
}
?>
