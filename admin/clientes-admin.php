<?php
require "config.inc.php";

echo "<p><a href='?pg=clientes-cadastro-forms.php' class='btn'>Cadastrar Cliente</a></p>";
echo "<h2>Lista de Clientes</h2>";

$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) > 0){
    while($dados = mysqli_fetch_array($resultado)){
        echo "<td>";
        if(!empty($dados['imagem'])){
            echo "<img src='uploads/clientes/".$dados['imagem']."' width='60' height='60' style='object-fit: cover; border-radius: 50%;'>";
        } else {
            echo "<img src='uploads/clientes/sem-foto.png' width='60' height='60' style='object-fit: cover; border-radius: 50%;'>";
        }
        echo "</td>";

        echo "Id: ".$dados['id']." | ";
        echo "Nome: ".$dados['cliente']." | ";
        echo "Cidade: ".$dados['cidade']." | ";
        echo "Estado: ".$dados['estado']." | ";
        echo "| <a href='?pg=clientes-altera-forms&id=$dados[id]'>Alterar</a>";
        echo "| <a href='?pg=clientes-excluir&id=$dados[id]'>Excluir</a>";
        echo "<hr>";
    }
} else {
    echo "<p style='color:#D2691E; font-weight:bold;'>Nenhum cliente cadastrado ainda.</p>";
}
?>
