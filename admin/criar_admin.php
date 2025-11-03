<!-- <?php
include 'config.inc.php';

$usuario = 'admin';
$senha = password_hash('1234', PASSWORD_DEFAULT); // senha: 1234

// Verifica se o admin já existe
$sql = "SELECT * FROM admins WHERE usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Cria o admin
    $sql = "INSERT INTO admins (usuario, senha) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    echo "Administrador criado com sucesso!";
} else {
    echo "Administrador já existe!";
}
?> -->
