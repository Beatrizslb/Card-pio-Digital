<?php
require "config.inc.php";

$id = $_REQUEST['id'];

$sql = "SELECT * FROM clientes WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    $dados = mysqli_fetch_array($resultado);
    $nome = $dados["cliente"];
    $cidade = $dados["cidade"];
    $estado = $dados["estado"];
    $imagem = $dados["imagem"];
?>

<link rel="stylesheet" href="assets/css/formularios.css">

<div class="formulario">
    <h2>Alterar Cliente</h2>
    <form action="?pg=clientes-altera" method="post"  class="forms" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$id?>">

    <label>Nome:</label>
    <input type="text" name="cliente" value="<?=$nome?>" required><br>

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?=$cidade?>" required><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="<?=$estado?>"><br>

    <label>Foto:</label>
    <?php if(!empty($imagem)): ?>
        <img src="uploads/clientes/<?=$imagem?>" width="60" height="60" style="object-fit: cover; border-radius:50%;"><br>
    <?php endif; ?>
    <input type="file" name="imagem" accept="image/*"><br><br>

    <input type="submit" value="Salvar Alterações">
</form>
</div>
<?php
}else{
    echo "<h2>Nenhum cliente encontrado</h2>";
}
?>
